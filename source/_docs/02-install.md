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
As of today, you should only run the debugbar in development.

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
    <%= debugbar_head  if defined? Debugbar %> <!-- [tl! focus] -->
  </head>
    
  <body>
    ...
    <%= debugbar_body if defined? Debugbar %> <!-- [tl! focus] -->
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

## Puma configuration

**It's recommended to run Puma in single mode**! Rails use single mode by default in dev but if you
modified it, set `WEB_CONCURRENCY` env var to 0. Puma cluster mode [requires extra configuration](/docs/puma-cluster-mode).

## Troubleshooting

If you run into any error, please open a GitHub issue with as much information as possible. 
There is also a dedicated [Troubleshooting section](/docs/troubleshooting/).  
