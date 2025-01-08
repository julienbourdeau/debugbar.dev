---
slug: "upcoming-features"
toc_section: Advanced
title: Upcoming features
subtitle: The features I want to add to the debugbar
seo_title: 
seo_description: 
---

## Debugbar as a browser extension

I think it's too much hassle to add the debugbar in your frontend. Other tools like Vue Devtools or Rails Panel are browser extensions. I didn't like it initially, but I think it makes a lot of sense.

## Running the debugbar in production or staging

One of the next feature I want to add is how to run the debugbar in production or staging.
It should be ignored for all request not coming from authorized users. If ignored, there should be no performance impact.

Running the debugbar in production will let you explore your application with real data!

Running the debugbar in staging can be useful if you have a frontend SPA and a backend API. The staging is the backend, and you only run the frontend locally.


## More collectors

### Hotwire

I'm not sure yet what there is to do here, but I'm super excited about Hotwire, and I'm sure there is tons of value to add there!

### Sidekiq

Active Job is super easy to support because there is an event dispatched. To support Sidekiq, I'll need to monkey patch the `perform_async` method (and related methods). I have POC working, but I need to make sure it's not too invasive.
