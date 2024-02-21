<?php

use Illuminate\Support\Str;

return [
    'production' => false,
    'baseUrl' => '',
    'title' => 'Debugbar For Ruby on Rails',
    'description' => 'Rails debugging dev tools for faster development. Inspect your request details (queries, logs, cache, jobs and more).',
    'githubRepo' => 'https://github.com/julienbourdeau/debugbar',
    'navigation' => require_once('navigation.php'),
    'collections' => [
        'docs' => [
            'path' => 'docs/{slug}',
            'extends' => '_layouts.docs',
            'section' => 'content',
            'map' => function ($post) {
                return App\DocPage::fromItem($post);
            },
        ],
    ],
    'getSeoTitle' => function ($page) {
        if ($page->seo_title) {
            return $page->seo_title;
        }

        return $page->title.' | Ruby On Rails Debugbar';
    },
    'activePage' => function ($page, $section, $mode = 'contains'): bool {
        // $path = ltrim($page->getPath(), '/');
        $path = $page->getPath();
        $cb = match ($mode) {
            'exact' => fn ($s) => $path === $s,
            'contains' => fn ($s) => Str::contains($path, $s),
            'starts_with' => fn ($s) => str_starts_with($path, $s),
        };

        return collect($section)->contains($cb);
    },
    'getDocsToc' => function ($page) {
        global $docsToc;

        return clone $docsToc;
    },
    'screenshot' => function ($page, $img, $alt = 'debugbar screenshot') {
        return "<img src='/assets/screenshots/$img.png' alt='$alt' class='' />";
    },
];
