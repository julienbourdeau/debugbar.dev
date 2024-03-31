---
slug: installation
toc_section: Getting Started
title: Installation
subtitle: "Setup the Debugbar dev tools in your project"
seo_title: 
seo_description: 
---

## Require the `gem`

The debugbar is installed like any other gem. Add it to your Gemfile, then run `bundle install` to install it.

```ruby
gem 'debugbar'
```
We recommend installing it only as a development dependency.

```ruby
group :development do
  gem 'debugbar'
end
```

## Mount the engine

Open your `config/routes.rb` file and add the following line:

```ruby
if defined? Debugbar
  mount Debugbar::Engine => Debugbar.config.prefix
end
```

This adds a few endpoints to your application. You can change the prefix in the [configuration](/docs/configuration), if the url prefix conflicts with your app. Default prefix is `/_debugbar`.

## Render the debugbar

### With the ERB helper

In your layout, make sure the debugbar is rendered via the view helper.

```erb
<!DOCTYPE html>
<html>
  <head>
    ... 
    <%= debugbar_head %> <!-- [tl! focus] -->
  </head>
    
  <body>
    ...
    <%= debugbar_body %> <!-- [tl! focus] -->
  </body>
</html>
```

### Without the ERB helper

If your application doesn't use the `erb` view helper, you can render the debugbar manually. 
This can be useful if your frontend is an SPA and the shell isn't rendered by Rails.

In your `index.html` file, make sure the following code is added:

```html
<!DOCTYPE html>
<html>
  <head>
    ...
    <script defer src="/_debugbar/assets/script"></script> <!-- [tl! focus] -->
  </head>
  
  <body>
  
    <div id="__debugbar" data-turbo-permanent></div> <!-- [tl! focus] -->
    
    <!-- Optional configuration -->
    <script type="text/javascript" data-turbo-permanent>
      window._debugbarConfigOptions = {height: 300} 
    </script>
  </body>
</html>
```

Note that if you changed the route prefix in your configuration, you'll need to update the url in the script tag.

## ActionCable connection

### Authentication (Connection#connect)

If you are already using ActionCable in your app, you might authenticate users in `ApplicationCable::Connection`.
Please make sure that debugbar requests are allowed.

Example

```ruby
module ApplicationCable
  class Connection < ActionCable::Connection::Base
    def connect
      # Allow debugbar requests
      return if request&.path&.include?("_debugbar")

      # Authenticate the user like you already do
      # ...
    end
  end
end
```

### Request forgery protection
Make sure the frontend is allowed to connect to ActionCable. 
You can define the allowed origins or disable the request forgery protection in your `config/environments/development.rb` file.

```ruby
Algolia::Application.configure do
  config.action_cable.disable_request_forgery_protection = true
  # OR
  # config.action_cable.allowed_request_origins = [
  #   %r{http://your-site-here*}, %r{https://your-site-here*}
  # ]
end
```

Have a look at your `config/cable.yml` file to ensure you're using a valid adapter.
