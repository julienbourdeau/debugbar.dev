---
slug: "how-it-works"
toc_section: Getting Started
title: 'How It Works'
subtitle: 'Some technical details about how the debugbar works'
seo_title:
seo_description: 
---

The debugbar is organized in 2 main parts:
- The backend: a Rack middleware that collects data about the current request and stores it in a buffer
- The frontend: a Vue 3 app that renders the data

## The full cycle

Generally speaking, the debugbar works like this. Remember that you need to include the debugbar view in your layout.

1. In your browser, you load the first page of your app.
2. The request goes through all the Rack middleware, including the debugbar middleware.
3. This triggers the gem to start tracking the request.
4. On its way out, the response also goes back through all the Rack middleware.
5. At this point, we store what we collected. Nothing is sent in this response.
6. The frontend is displayed in the browser.
7. The debugbar is loaded (since you included it in your layout).
8. On load, the debugbar connects to your backend via a websocket, using ActionCable.
9. The backend pushes the data to the frontend, and the Vue app renders it.

Now, if you make another full page reload, the cycle starts again.

If you make a XHR request, like in an SPA or Hotwire app, it will be a little different.

1. At this point, the debugbar is already loaded in the browser and connected to the backend.
2. A new request is made to the backend, via XHR.
3. It goes through the Rack middleware again, the same data is collected.
4. But when the response is sent back, the backend pushes this new data to the frontend directly.
5. The new request is visible in the select box of the debugbar.

{!! $page->screenshot('selectbox', "Screenshot of the select field to choose the request") !!}
