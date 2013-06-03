class HomeController < ApplicationController

  def index
    @ref = params["ref"]
  end

  def interested
    require 'digest'
    @userpresent = false
    @ref = params['ref']
    @email = params['email']
    @referral_code = Digest::MD5.hexdigest(@email)

    # No email was provided, redirect home
    if @email.blank?
      redirect_to "/"
    end

    # Connect to Mailchimp
    h = Hominid::API.new(MAILCHIMP_API_KEY)

    # Get the 'Interested' mailing list
    @list = h.find_list_by_name('Interested')
    if @list
      @list_members = h.list_members(@list['id'])
    end

    # Increment RCODE for the referring user
    unless @ref.blank?
      @list_members['data'].each do |u| # This would be more efficient if I went 50 at a time
        member_info = h.list_member_info(@list['id'], {'email' => u['email']}) # This can handle up to 50 emails
        if member_info['data'][0]['merges']['RCODE'] == @ref
          referral_count = member_info['data'][0]['merges']['RCOUNT']
          updated_count = referral_count.to_i + 1
          h.list_update_member(@list['id'], u['email'], {'RCOUNT' => updated_count})
          break
        end
      end
    end

    # If @email exists in the list, then redirect user to their stats page
    @list_members['data'].each do |u|
      if u['email'] == @email
        returning_member_info = h.list_member_info(@list['id'], {'email' => u['email']})
        @referral_count = returning_member_info['data'][0]['merges']['RCOUNT']
        @referral_code = returning_member_info['data'][0]['merges']['RCODE']
        @userpresent = true
        render :action => "stats"
        break
      end
    end

    # Add the email to Mailchimp, since it wasn't already in the list
    if @userpresent == false
      begin
        h.list_subscribe(@list['id'], @email, {'RCODE' => @referral_code, 'RCOUNT' => 0}, 'text', false, true, true, false)
      rescue Hominid::APIError => e
        @error_message = e
        render :action => "index"
      end
    end
  end

  def stats
  end

end
