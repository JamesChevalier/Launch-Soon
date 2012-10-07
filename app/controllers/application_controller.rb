class ApplicationController < ActionController::Base
  protect_from_forgery

  before_filter :setup

  def setup
    # Mailchimp API Key
    @mailchimp_api_key = 'API_KEY'

    # This site's domain name, including the www. if required (ie: google.com):
    @sitedomain = 'DOMAIN.TLD'

    # Title tag for the site:
    @sitetitle = 'Title'

    # Keywords for the site:
    @sitekeywords = 'key, words'

    # Description for the site, also used in Tweet so keep it short:
    @sitedescription = 'DESCRIPTION'

    # Blurb about site, displayed on main page:
    @siteblurb = 'BLURB'

    # Google Analytics code for the site:
    @sitegoogleanalytics = 'UA-#######-##'

    # Twitter name for site:
    @twittername = 'TWITTERUSERNAME'
  end

end
