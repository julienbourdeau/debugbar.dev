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
