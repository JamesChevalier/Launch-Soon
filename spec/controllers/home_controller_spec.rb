require 'spec_helper'

describe HomeController do
  describe "GET index" do
    it "renders index" do
      get :index
      response.should be_success
    end
  end

  describe "GET interested" do
    context "with an email address" do
      it "renders interested" do
        get 'interested', {:email => Faker::Internet.email}
        response.should be_success
      end
    end

    context "without an email address" do
      it "redirects to the homepage" do
        get 'interested'
        response.should redirect_to(root_url)
      end
    end
  end
end
