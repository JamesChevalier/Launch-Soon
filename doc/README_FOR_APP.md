Launch-Soon
===========

Launch-Soon is a Heroku-ready rails site that provides a viral launching soon page to collect users before your actual launch date.

You can deploy to Heroku, and immediately begin collecting email addresses in your Mailchimp list. The site provides a unique URL to each user that signs up, which keeps track of how many people they refer. The referral count and code are also stored in your Mailchimp list, so that you can segment your users based on their referrals.

Launch-Soon uses Foundation to provide you a fully responsive website with no extra effort.

You can see an example at http://launch-soon-example.herokuapp.com


What You'll Need
--------------

* A Mailchimp account with a list named "Interested" and a couple custom fields
* A Google Analytics Web Property ID (UA-#######-##)
* A Twitter account


How To Get It Going
----------

###Get the code
1. Open Terminal
2. Copy Launch-Soon locally with `git clone git@github.com:JamesChevalier/Launch-Soon.git launchsoon`
3. Change directory into Launch-Soon with `cd launchsoon`

###Configure Launch-Soon
1. Get your Mailchimp API Key from https://admin.mailchimp.com/account/api/
2. Edit `app/controllers/application_controller.rb` accordingly
3. Optionally, replace `app/assets/images/background.jpg` with your own background image
 * Make sure your background image has the same filename, `background.jpg`
 * Your image should be fairly large, to accommodate any size screen. Something like 1280 × 800 should do.

###Configure Mailchimp
3. Go to https://admin.mailchimp.com/lists/
4. Click the `Create List` button
5. Name the list `Interested` (the rest of the information is up to you)
6. Back at https://admin.mailchimp.com/lists/, click the Settings button for on the far right for the 'Interested' list
7. Select `List Fields and Merge Tags`
8. Change Field Labels to read:
 * Change `First Name` to `Referral Code`, and change `FNAME` to `RCODE`
 * Change `Last Name` to `Referral Count`, and change `LNAME` to `RCOUNT`

###Deploy it
1. Commit your configuration changes with `git add .; git commit -m "Update Config"`
2. Create your Heroku app with `heroku create`
3. Deploy Launch-Soon to Heroku with `git push heroku master`

