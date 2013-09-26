Launch-Soon
===========

[![Build Status](https://travis-ci.org/JamesChevalier/Launch-Soon.png?branch=master)](https://travis-ci.org/JamesChevalier/Launch-Soon)
[![Code Climate](https://codeclimate.com/github/JamesChevalier/Launch-Soon.png)](https://codeclimate.com/github/JamesChevalier/Launch-Soon)
[![Coverage Status](https://coveralls.io/repos/JamesChevalier/Launch-Soon/badge.png?branch=master)](https://coveralls.io/r/JamesChevalier/Launch-Soon?branch=master)

Launch-Soon is a Heroku-ready rails site that provides a viral launching soon page to collect users before your actual launch date.

You can deploy to Heroku, and immediately begin collecting email addresses in your MailChimp list. The site provides a unique URL to each user that signs up, which keeps track of how many people they refer. The referral count and code are also stored in your MailChimp list, so that you can segment your users based on their referrals.

Launch-Soon uses Foundation to provide you a fully responsive website with no extra effort.

You can see an example at http://launch-soon-example.herokuapp.com


What You'll Need
----------------

* A MailChimp account with a list named "Interested" and a couple custom fields
* A Google Analytics Web Property ID (UA-#######-##)
* A Twitter account


How To Get It Going
-------------------

###Get the code
1. Open Terminal
2. Copy Launch-Soon locally with `git clone git@github.com:JamesChevalier/Launch-Soon.git launchsoon`
3. Change directory into Launch-Soon with `cd launchsoon`

###Configure MailChimp
1. Get your MailChimp API Key by clicking the `Add A Key` button at https://admin.mailchimp.com/account/api/ and copying the key out of the `API Key` column
2. Go to https://admin.mailchimp.com/lists/
3. Click the `Create List` button
4. Name the list anything you'd like, and the rest of the information is up to you as well
5. Go back to https://admin.mailchimp.com/lists/, and select `Settings` from the List's pulldown on the far right
6. Select `List name & defaults`
7. Copy the `List ID` that's at the top of the right column
8. Paste this text into the quotes for "MAILCHIMP_LIST_ID" within the `config/initializers/launch_soon.rb` file
9. Go back to https://admin.mailchimp.com/lists/, and select `Settings` from the List's pulldown on the far right
10. Select `List fields and *|MERGE|* tags`
11. Change Field Labels to read:
 * Change `First Name` to `Referral Code`, and change `FNAME` to `RCODE`
 * Change `Last Name` to `Referral Count`, and change `LNAME` to `RCOUNT`

###Configure Launch-Soon
1. Run `rake secret` and replace the secret_token in `config/initializers/secret_token.rb` with the result of this command
2. Edit `config/initializers/launch_soon.rb` accordingly
3. Optionally, replace `app/assets/images/background.jpg` with your own background image
 * Make sure your background image has the same filename, `background.jpg`
 * Your image should be fairly large (like 1280x800) to accommodate any size screen
4. Optionally, replace `public/favicon.ico` with your own Favicon file

###Deploy it
1. Commit your configuration changes with `git add .; git commit -m "Update Config"`
2. Create your Heroku app with `heroku create`
3. Deploy Launch-Soon to Heroku with `git push heroku master`


Other Info
----------

Check out the `doc/README_FOR_APP.md` file for more information.
