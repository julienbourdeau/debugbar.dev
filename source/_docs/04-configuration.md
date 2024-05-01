---
slug: configuration
toc_section: Getting Started
title: Configuration
subtitle: "Configure the Debugbar depending on your needs"
seo_title:
seo_description: 
---

There are a few things you can configure in the Debugbar. The configuration happens in two places:

* in `config/initializers/debugbar.rb` for the general gem configuration
* in a `script` tag in your page for some specific configuration


## Enable/disable the Debugbar

You can enable/disable the Debugbar by setting the `enabled` option in the initializer:

```ruby
Debugbar.configure do |config|
  config.enabled = false
end
```

## Ignoring requests

Once the debugbar is enabled, every request will be monitored and the debugbar will be displayed. You can ignore some requests by setting the `ignore_request` option in the initializer. This is typically useful to ignore some requests that are not relevant to you.

By default, the debugbar will ignore all requests starting with `/assets` or `/_debugbar`.

```ruby
Debugbar.configure do |config|
  # Ignore all requests starting with /admin
  config.ignore_request = -> (env) { env['PATH_INFO'].start_with? '/admin' }

  # Only log request to the API
  config.ignore_request = -> (env) { not env['PATH_INFO'].start_with? '/api/v1' }

  # Ignore requests to admin, assets and debugbar
  config.ignore_request = -> (env) do
    [Debugbar.config.prefix, "/assets", "/admin"].any? do |pfx|
      env['PATH_INFO'].start_with? pfx
    end
  end
end
```

## Using a different buffer

Whenever a request is made to the backend, the debugbar will store the data in a buffer. By default, the buffer is an in-memory buffer. You can use a different buffer by setting the `buffer_adapter` option in the initializer. So far, there is only a memory buffer and a `null` buffer.

A persisted buffer is coming to support Puma in cluster mode. Custom adapters will also be available.

```ruby
Debugbar.configure do |config|
  config.buffer_adapter = :memory  # Use a memory buffer
  config.buffer_adapter = :null    # Use a null buffer
end
```

## Enable/disable a feature

This is showed in the features] section, but generally, you can enable/disable a feature in the initializer.
By default, all features are enabled if the underlying module is available. For example, Active Record is enabled if the `ActiveRecord` module is available.

```ruby
Debugbar.configure do |config|
  config.active_record = false
  config.cache = true
end
```

## Changing URL and port

By default, the frontend will connect to localhost:3000. If you use another port or a domain, you need to pass the URL to the frontend.
If you use http polling, [checkout this page](/docs/polling-mode).

With the ERB helper, you can pass a hash to override [any configuration defined here](https://github.com/julienbourdeau/debugbar/blob/166e5def8/client/src/models/Config.ts#L3-L15).

```erb
<%= debugbar_body  cable: {url: "ws://something.test:3030"} %>
```

If you don't use the helper, you must define a `_debugbarConfigOptions` object. 

```js
window._debugbarConfigOptions = {
    cable: {
      url: 'ws://something.test:3030'
    },
}
```

### Using SSL

The configuration requires you to pass the entire URL so if you use SSL locally, so you can to use `wss` instead of `ws`. Us

```erb
<%= debugbar_body  cable: {url: "wss://localhost:3000"} %>
```

```js
window._debugbarConfigOptions = {
    cable: {
      url: 'wss://localhost:3000'
    },
}
```

## Using another prefix

All endpoints added by the debugbar are prefixed with `/_debugbar`.
It's unlikely that you'll need to change the prefix, but if you do, you can set the `prefix` option in the initializer.

If you change it, it also needs to be changed in the frontend configuration

```ruby
Debugbar.configure do |config|
  config.prefix = '/custom-prefix'
end
```

```erb
<%= debugbar_body  prefix: "/custom-prefix" %>
```

## Debugbar appearance

### Custom default height

If you're working on a fairly big screen, you can configure the default height of the debugbar when it opens.
Pass a value in pixel.

```erb
<%= debugbar_body height: 800 %>
```

### Minimized by default

If you prefer, the debugbar can load minimized by default, so you just see the little ruby logo at the bottom left of the screen.

```erb
<%= debugbar_body minimized: true %>
```

## Frontend configuration without the helper

If you are [not using the ERB view helper](https://debugbar.dev/docs/installation/) to render the debugbar 
(typically because you have an SPA and the shell isn't rendered by Rails), there are some configuration that will might be missing.

```html
<script type="text/javascript" data-turbo-permanent>
  window._debugbarConfigOptions = {
    activeRecord: {
      adapter: "pgsql",
    },
  }
</script>
```
