---
slug: "http"
toc_section: "Features"
title: 'HTTP calls'
subtitle: "Show HTTP requests made by Rails while processing your requests"
seo_title: 
seo_description: 
#disabled: true
---

Sometimes your application will call external APIs to complete the request. I always found it annoying 
that they wouldn't show up in the browser devtools to inspect the headers, params, and response. It makes perfect
sense that it's not in the browser devtools, but we're so used to the tools, I wish I could see them there.

If you ever felt that way, you'll enjoy this feature. The debugbar will show you all the HTTP requests 
made by Rails while processing your requests.

{!! $page->screenshot('http', "Screenshot of HTTP queries in the debugbar") !!}

## Configuration

This feature relies on the [`httplog`](https://github.com/trusche/httplog) gem. The gem is not included by default,
so you need to add it to your Gemfile. If you don't already have it, make sure to add it in development only.

```ruby
group :development do
  gem 'httplog'
end
```

The debugbar gem will automatically configure the logger to output the HTTP calls in the debugbar.

If you're using the `httplog` gem in production, double check that the debugbar isn't enabled in production or it will
mess with your configuration.
