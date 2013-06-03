Launch-Soon
===========

[![Code Climate](https://codeclimate.com/github/JamesChevalier/Launch-Soon.png)](https://codeclimate.com/github/JamesChevalier/Launch-Soon) [![Build Status](https://travis-ci.org/JamesChevalier/Launch-Soon.png?branch=master)](https://travis-ci.org/JamesChevalier/Launch-Soon)

Launch-Soon is a Heroku-ready rails site that provides a viral launching soon page to collect users before your actual launch date.

You can deploy to Heroku, and immediately begin collecting email addresses in your MailChimp list. The site provides a unique URL to each user that signs up, which keeps track of how many people they refer. The referral count and code are also stored in your MailChimp list, so that you can segment your users based on their referrals.

Launch-Soon uses Foundation to provide you a fully responsive website with no extra effort.

You can see an example at http://launch-soon-example.herokuapp.com


What You'll Need
--------------

* A MailChimp account with a list named "Interested" and a couple custom fields
* A Google Analytics Web Property ID (UA-#######-##)
* A Twitter account


How To Get It Going
----------

###Get the code
1. Open Terminal
2. Copy Launch-Soon locally with `git clone git@github.com:JamesChevalier/Launch-Soon.git launchsoon`
3. Change directory into Launch-Soon with `cd launchsoon`

###Configure MailChimp
1. Get your MailChimp API Key by clicking the `Add A Key` button at https://admin.mailchimp.com/account/api/ and copying the key out of the `API Key` column
2. Go to https://admin.mailchimp.com/lists/
3. Click the `Create List` button
4. Name the list `Interested` (the rest of the information is up to you)
5. Back at https://admin.mailchimp.com/lists/, click the Settings button for on the far right for the 'Interested' list
6. Select `List Fields and Merge Tags`
7. Change Field Labels to read:
 * Change `First Name` to `Referral Code`, and change `FNAME` to `RCODE`
 * Change `Last Name` to `Referral Count`, and change `LNAME` to `RCOUNT`

###Configure Launch-Soon
1. Edit `config/initializers/launch_soon.rb` accordingly
2. Optionally, replace `app/assets/images/background.jpg` with your own background image
 * Make sure your background image has the same filename, `background.jpg`
 * Your image should be fairly large (like 1280x800) to accommodate any size screen
3. Optionally, replace `public/favicon.ico` with your own Favicon file

###Deploy it
1. Commit your configuration changes with `git add .; git commit -m "Update Config"`
2. Create your Heroku app with `heroku create`
3. Deploy Launch-Soon to Heroku with `git push heroku master`

