---
slug: "debugging-with-print"
toc_section: "Features"
title: 'Print debug messages'
subtitle: "Is there a better way to debug than printing messages?"
seo_title:
seo_description: 
---

I'll admit, the first thing I do when I want to debug something is to add a `puts` or `pp` statement in my code. I'm sure you do too.

This feature simply let you add messages to the debugbar to... debug.

### Usage examples

```ruby
# In a controller
class SomeController < ApplicationController
  before_action do
    Debugbar.msg("before_action", {params: params.permit!.to_h, callee: __callee__})
  end
  
  def index
    Debugbar.msg("Entering controller method", {something: something})
  end
end
```

```erb
<!-- In a view -->
<% Debugbar.msg("Rendering navigation") %>
```

{!! $page->screenshot('debugbar-msg', "Screenshot of debugbar with Debugging messages") !!}
