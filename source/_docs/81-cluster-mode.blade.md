---
slug: "puma-cluster-mode"
toc_section: Advanced
title: With Puma in cluster mode
subtitle: If you must use Puma in cluster mode in development, the configuration is a bit more complex.
seo_title:
seo_description:
---

It's recommended to use the debugbar with an application server running into a single process (Puma single mode). 

If for some reason, you're stuck with using cluster mode in dev, this feature is for you. I guess one good reason
to run in cluster mode in dev is to be as close as possible as production.

By default, all requests made are stored in memory. Once you have multiple processes, each processes hold their own list of requests and isolated memories.
We need to store requests somewhere shared. The debugbar relies on `Rails.cache` to share the list. Keep in mind that if you're using the memory store, 
you'll run into the same issue! Feel free to use any persistent cache store like Redis, Memcache, SolidCable or simply the file store.

```ruby
# config/environments/development.rb
Rails.application.configure do
  # ...
  config.cache_store = :file_store, Rails.root.join("tmp/cache") # [tl! focus] 
end
```

The same way, ActionCable runs with async driver by default which holds the connections in memory. So once your debugbar 
is connected to one node, you'll only see all the requests but the push is only triggered once you hit this node. 
You can use the Redis or SolidCable adapter to share the connections between all the nodes.
I'd typically use the same configuration in development and production.

```yaml
# config/cable.yml
development:
  adapter: solid_cable
  connects_to:
    database:
      writing: cable
  polling_interval: 0.1.seconds
  message_retention: 10.minutes
```

If the debugbar detects that Puma runs in cluster mode, it will check the rest of the config and display a warning in the logs.

{!! $page->screenshot('cluster-mode-warning', "Screenshot of the terminal with warning logs") !!}
