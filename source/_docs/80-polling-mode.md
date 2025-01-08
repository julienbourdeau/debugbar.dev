---
slug: "polling-mode"
toc_section: Advanced
title: Using HTTP polling
subtitle: If you cannot use websocket, you can use http polling, but it's not as nice.
seo_title:
seo_description:
---

If you cannot use websocket via ActionCable, the debugbar has a fallback mode using HTTP polling.
It's not as nice as the websocket, but it works.

If ActionCable isn't found, the debugbar will automatically switch to polling mode (only if using the ERB helper).

It's also possible to pause and resume polling to avoid all those calls in the browser Network tab when debugging.

## Configuration

With the ERB helper

```erb
<%= debugbar_body mode: :poll %>
```

You can configure the interval and the URL (if you don't use localhost:3000).

```erb
<%= debugbar_body mode: :poll, poll: {
      url: "http://custom.test:3030",
      interval: 1000
    }
%>
```

If you don't use the helper, you must define a `_debugbarConfigOptions` object.

```js
window._debugbarConfigOptions = {
  mode: "poll",
  poll: {
    url: "http://custom.test:3030",
    interval: 1000
  }
}
```
