LaunchSoon::Application.routes.draw do
  root :to => "home#index"
  match '/interested' => "home#interested"
end
