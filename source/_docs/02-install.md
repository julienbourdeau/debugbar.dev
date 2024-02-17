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
    ...
    
    <%= debugbar_javascript %>
  </body>
</html>
```

### Without the EBR helper

If your application doesn't use the `erb` view helper, you can render the debugbar manually. This can be useful if your frontend is an SPA and the shell isn't rendered by Rails.

In your `index.html` file, make sure the following code is added:

```html
<div id="__debugbar"></div>

<script defer src="/_debugbar/assets/script"></script>

<script type="module">
  import sheet from '/_debugbar/assets/style' assert { type: 'css' };
  const debugbar = document.getElementById('__debugbar-shadow-root')
  debugbar.shadowRoot.adoptedStyleSheets = [sheet];
</script>
```

Note that if you changed the route prefix in your configuration, you'll need to update the url in the script tag.

## ActionCable connection

Make sure the frontend is allowed to connect to ActionCable. You can define the allowed origins in your `config/environments/development.rb` file.

```ruby
Algolia::Application.configure do
  config.action_cable.allowed_request_origins = [/http:\/\/*/, /https:\/\/*/]
end
```

Have a look at your `config/cable.yml` file to ensure you're using a valid adapter.
