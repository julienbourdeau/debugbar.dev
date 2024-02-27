## Debugbar.dev website

---

👉 [https://debugbar.dev](https://debugbar.dev) 👈

---


This site is built with:
* [Jigsaw](http://jigsaw.tighten.co/), a static site generator for Laravel.
* [Tailwind CSS](https://tailwindcss.com/), a utility-first CSS framework.
* [Alpine.js](https://alpinejs.dev/), a minimal framework for composing JavaScript behavior in your markup.
* [Torchlight](https://torchlight.dev/), a code highlighting tool.

When new changes are pushed to the main branch, a [GitHub Action](.github/workflows/deploy.yml) is triggered to build the site 
and deploy it to the `static` branch. This branch is then deployed on [CloudFlare Pages](https://pages.cloudflare.com/).


[![Hero image](./source/assets/debugbar-graph-img.png?raw=true "The debugbar.dev documentation website")]((https://debugbar.dev))
