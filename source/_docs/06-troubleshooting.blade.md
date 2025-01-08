---
slug: "troubleshooting"
toc_section: Getting Started
title: 'Troubleshooting'
subtitle: "Errors I've seen reported and how to (maybe) fix them"
seo_title:
seo_description: 
---


## Ensure Puma (or else) is running in single mode

If you're missing some requests, it's typically because your server runs with multiple processes.

It's now supported to run Puma (or other servers) in cluster mode, but you need some configuration.
Run your server in single mode first to ensure everything works or check out the [cluster mode documentation](/docs/puma-cluster-mode).

## ActionCable and websocket

### Websocket connection failed

> WebSocket connection to 'ws://127.0.0.1:3000/_debugbar/cable' failed:

It might be that 127.0.0.1 doesn't work for you. Try using `localhost` instead. See [issue #14](https://github.com/julienbourdeau/debugbar/issues/14)

```erb
<%= debugbar_body cable: {url: "ws://localhost:3000"} %>
```

### Check `cable.yml`

Have a look at your `config/cable.yml` file to ensure everything is correct.
It happened to me that I wasn't using a valid adapter (don't ask me why).

### Request forgery protection

Make sure the frontend is allowed to connect to ActionCable. 

The debugbar sets `action_cable.disable_request_forgery_protection = true` automatically, but it could be overridden or configured elsewhere.

```ruby
Rails::Application.configure do
  config.action_cable.disable_request_forgery_protection = true
  # OR
  # config.action_cable.allowed_request_origins = [
  #   %r{http://your-site-here*}, %r{https://your-site-here*}
  # ]
end
```

### 

## Shared backend

The debugbar only works if you're the only user of the backend, otherwise the data will be mixed.

For example, let's say 2 people are working on the SPA frontend, both using a shared hosted staging environment for the backend. The debugbar will show the data from both users. I intend to [support this feature](/docs/upcoming-features).
