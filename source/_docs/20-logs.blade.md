---
slug: "logs"
toc_section: "Features"
title: 'Logs (experimental)'
subtitle: "Same as Rails.logger, but per request"
seo_title: 
seo_description: 
---

If you're used to tail the logs, you'll love this feature. It's the same logs, but per request and easily accessible.

In a typical setup, you might have background job running while the frontend just made 3 requests. The logs are all entangled together, and it's hard to find what you're looking for.

**This feature is experimental.** It works but I'd like better filtering, better display and a better way to set it up. For now, this feature is not shown on the demo at the bottom of this page.

{!! $page->screenshot('logs', "Screenshot of logs in the debugbar") !!}

## Configuration

First, set up the minimum log level to be added to the debugbar panel.
```ruby
Debugbar.configure do |config|
  config.min_log_level = ::Logger::Severity::WARN
end
```

Second, you need to configure the logger manually. This is the part that I'm hoping to be able to do automcatically in the future.

```ruby
# config/environments/development.rb
# You can reuse the logger you already have
existing_logger = ActiveSupport::Logger.new("log/#{Rails.env}.log") 
# or existing_logger = ActiveSupport::Logger.new(STDOUT)

broadcast = ActiveSupport::BroadcastLogger.new(existing_logger)
debugbar_logger = Debugbar::SimpleLogger.new(Debugbar.config.min_log_level)
broadcast.broadcast_to(debugbar_logger)
config.logger = broadcast
```
