---
slug: "known-limitations"
toc_section: Getting Started
title: Known Limitations
subtitle: The Rails debugbar is under active development and has some known limitations.
seo_title:
seo_description: 
---

## Single process server

Currently, the debugbar only support backend running a single process. 

For example with Puma, you must run in _single mode_ (default) and not _cluster mode_! Make sure `WEB_CONCURRENCY` set to `0`. You can edit your `config/puma.rb` file to set the number of threads to 1, but it's recommended to rely on the environment variable.

See [Upcoming Features](/docs/upcoming-features) section for some technical details.

## Shared backend

The debugbar only works if you're the only user of the backend. If you have multiple users, the data will be mixed. 

For example, let's say 2 people are working on the SPA frontend, both using a shared hosted staging environment for the backend. The debugbar will show the data from both users.

I intend to [add this feature](/docs/upcoming-features).
