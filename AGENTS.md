# Agents

Static documentation site for [debugbar](https://github.com/julienbourdeau/debugbar) (a Ruby on Rails gem), built with Astro.

## Stack

- **Astro** (static output) — layouts in `src/layouts/`, components in `src/components/`, pages in `src/pages/`
- **Tailwind CSS v3** — config in `tailwind.config.js`, styles in `src/styles/`
- **Alpine.js** — used for mobile menu and docs TOC toggle (client-side only, directives live in component markup)
- **Shiki** — code syntax highlighting, `github-light` theme, configured in `astro.config.mjs`

## Commands

```
npm run dev      # Start dev server
npm run build    # Build static site to dist/
npm run preview  # Preview built site
```

## Content

Documentation pages live in `src/content/docs/` as markdown files with frontmatter (`slug`, `toc_section`, `title`, `subtitle`). File name prefix (e.g. `01-`, `10-`) controls ordering. Routes are generated as `/docs/{slug}`.

## Build-time data

`src/lib/build-helpers.ts` fetches at build time:
- CHANGELOG from GitHub (`julienbourdeau/debugbar`)
- Current gem version from RubyGems API

## Debugbar demo JS

`public/assets/debugbar/` contains the standalone debugbar JS bundle (built externally from the gem repo). It must not be processed by Astro — it's loaded as a plain `<script>` in `src/layouts/Plain.astro`.

## Deploy

CloudFlare Pages, auto-deploys on push to `master`. Build command: `npm run build`, output dir: `dist/`.
