---
slug: introduction
toc_section: Getting Started
title: Introduction
subtitle: Why would you need this tool?
seo_title: 
seo_description: 
---

This tool is a **development tool**, it shows a panel at the bottom of the page showing information about your request to the Ruby on Rails backend.

The ruby ecosystem has a lot of great tools for debugging. Discovering `pry` was a fantastic moment for me. I was able to explore my application in ways I didn't think were possible. Yet, I always missed what I was used to in PHP with the [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar).

## #1 Information grouped by request

I usually tail the logs of my application. I can see the requests coming in, `puts` debug messages, see the SQL queries... 

But everything is mixed together. A typical SPA frontend will make multiple requests so everything is printed together in the terminal. Now, add your background jobs making DB queries and printing their own stuff too.

When looking at this documentation, you might be thinking _"I already have this information in my logs!"_. Yes, you do. But with the debugbar it's grouped by request and much easier to use.

## #2 Visible in the same window

I hate switching constantly between the browser, and the terminal where I tail the logs. I want to see the debugging information in the same window.

We use the browser devtools constantly, I think it's a natural way to work.

## #3 Easy to use

I like the terminal as much as the next developer, but it's very limiting. I want to be able to collapse/expand information, search, click buttons...
