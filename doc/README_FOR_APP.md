# brakeman

[Brakeman](http://brakemanscanner.org/) is an open source vulnerability scanner specifically designed for Ruby on Rails applications. It statically analyzes Rails application code to find security issues at any stage of development.

To run it, run `brakeman -o coverage/brakeman-report.html` in the Rails project directory, then open the `coverage/brakeman-report.html` file in your browser.


# bundler-audit

[bundler-audit](https://github.com/postmodern/bundler-audit) provides patch-level verification for Bundled apps. It checks for vulnerable versions of gems in `Gemfile.lock`, and prints advisory information based on what it finds.

To run it, run `bundle-audit` in the Rails project directory.


# rails_best_practices

[rails_best_practices](http://rails-bestpractices.com/) is a gem that checks your Rails app against the best practices stored at [http://rails-bestpractices.com/](http://rails-bestpractices.com/).

To run it, run `rails_best_practices` in the Rails project directory.


# simplecov

[SimpleCov](https://github.com/colszowka/simplecov) is a code coverage analysis tool for Ruby.

To run it, run `rspec` in the Rails project directory, then open the `coverage/index.html` file in your browser.
