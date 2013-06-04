class HomeController < ApplicationController

  def index
    @ref = params["ref"]
  end

  def interested
    require 'digest'
    return redirect_to root_url if params['email'].blank?
    @ref           = params['ref']
    email          = params['email']
    @referral_code = Digest::MD5.hexdigest(email)
    begin
      h            = Hominid::API.new(MAILCHIMP_API_KEY)
    rescue => e
      flash.now[:alert] = "There was a problem connecting to MailChimp"
      return render :index
    end

    list          = h.find_list_by_name('Interested')
    list_members  = h.list_members(list['id']) if list

    # If email exists in the list, then render their stats page
    # Otherwise, increment RCODE for the referring user
    list_members['data'].group_by{|u| u['email']}.keys.in_groups_of(50, false).each do |users|
      members_info = h.list_member_info(list['id'], users)
      members_info['data'].each do |member_info|
        if member_info['email'] == email
          @referral_count       = member_info['merges']['RCOUNT']
          @referral_code        = member_info['merges']['RCODE']
          return render :stats
          break
        elsif member_info['merges']['RCODE'] == @ref
          referral_count = member_info['merges']['RCOUNT']
          updated_count = referral_count.to_i + 1
          h.list_update_member(list['id'], member_info['email'], {'RCOUNT' => updated_count})
          # Add the email to Mailchimp, since it wasn't already in the list
          begin
            h.list_subscribe(list['id'], email, {'RCODE' => @referral_code, 'RCOUNT' => 0}, 'text', false, true, true, false)
          rescue => e
            flash.now[:alert] = "There was a problem connecting to MailChimp"
            render :index
          end
          break
        end
      end
    end
  end
end
