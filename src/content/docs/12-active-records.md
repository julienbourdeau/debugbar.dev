---
slug: "active-record"
toc_section: "Features"
title: 'Active Record'
subtitle: "Show SQL queries, timings and bindings in the Rails debugbar"
seo_title:
seo_description:
---

This is probably my favorite feature. It shows you all the SQL queries that were executed during the request. It's the same information
you would typically get in the logs, but it's not entangled with other requests, and it's easier to read.

![Screenshot of SQL queries in the debugbar](/assets/screenshots/queries.png)

The queries can be folded, reformatted and easily copied.

![Screenshot of SQL queries in the debugbar](/assets/screenshots/queries-2.png)

It will also highlight cached and async queries with a tag.

![Screenshot of SQL queries in the debugbar](/assets/screenshots/queries-3.png)
