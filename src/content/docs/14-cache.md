---
slug: "cache"
toc_section: "Features"
title: 'Cache'
subtitle: "Debug your cache usage"
seo_title:
seo_description:
---

If you use `Rails.cache`, you will see the calls in the list here.

For example, the following code will show 3 entries with the same transaction id. One read, cache is not found, so we generate the value and then write it.

```ruby
Rails.cache.fetch "nb_total_posts" do
  Post.count
end
```

![Screenshot of cache in the debugbar](/assets/screenshots/cache.png)
