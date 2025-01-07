---
slug: "troubleshooting"
toc_section: Getting Started
title: 'Troubleshooting'
subtitle: "Errors I've seen reported and how to (maybe) fix them"
seo_title:
seo_description: 
---

## Websocket connection

> WebSocket connection to 'ws://127.0.0.1:3000/_debugbar/cable' failed:

It might be that 127.0.0.1 doesn't work for you. Try using `localhost` instead. See [issue #14](https://github.com/julienbourdeau/debugbar/issues/14)

```erb
<%= debugbar_body cable: {url: "ws://localhost:3000"} %>
```

## Ensure Puma (or else) is running in single mode

If you're missing some requests, it's typically because your server runs with multiple processes.

It's now supported to run Puma (or other servers) in cluster mode, but you need some configuration.
Run your server in single mode first to ensure everything works or check out the [cluster mode documentation](/docs/puma-cluster-mode).

## Check `cable.yml`

Have a look at your `config/cable.yml` file to ensure everything is correct.
It happened to me that I wasn't using a valid adapter (don't ask me why).
