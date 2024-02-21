---
extends: _layouts.base
seo_title: "Debugbar Documentation: Powerful devtools for Ruby on Rails"
---
@section('main')
  <div class="w-full prose prose-stone">
    <h1>Documentation</h1>
    <p>The debugbar is a gem you install in your Rails project. You can test it on this website, at the bottom of the page. This project is inspired by what you get in the PHP world, with the
      <a href="https://github.com/barryvdh/laravel-debugbar">Laravel debugbar</a> for instance.</p>

    <div class="mt-6 max-w-[80%] flex md:items-center space-y-4 md:space-y-0 md:space-x-6 flex-col justify-start md:flex-row">
      @foreach([
        ['label' => 'Getting Started', 'url' => '/docs/installation'],
        ['label' => 'How It Works', 'url' => '/docs/how-it-works'],
        ] as $l)

        <a href="{{ $l['url'] }}" class="no-underline rounded-md bg-stone-100 px-2.5 py-1.5 text-sm font-semibold text-stone-600 shadow-md hover:bg-stone-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stone-600">
          {{ $l['label'] }}
        </a>
      @endforeach

        <a target="_blank" href="https://github.com/julienbourdeau/debugbar" class="no-underline inline-flex items-center gap-x-1.5 rounded-md bg-stone-100 px-2.5 py-1.5 text-sm font-semibold text-stone-600 shadow-md hover:bg-stone-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stone-600">
          Source Code
          <svg class="-ml-0.5 size-4" data-slot="icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M6.22 8.72a.75.75 0 0 0 1.06 1.06l5.22-5.22v1.69a.75.75 0 0 0 1.5 0v-3.5a.75.75 0 0 0-.75-.75h-3.5a.75.75 0 0 0 0 1.5h1.69L6.22 8.72Z"></path>
            <path d="M3.5 6.75c0-.69.56-1.25 1.25-1.25H7A.75.75 0 0 0 7 4H4.75A2.75 2.75 0 0 0 2 6.75v4.5A2.75 2.75 0 0 0 4.75 14h4.5A2.75 2.75 0 0 0 12 11.25V9a.75.75 0 0 0-1.5 0v2.25c0 .69-.56 1.25-1.25 1.25h-4.5c-.69 0-1.25-.56-1.25-1.25v-4.5Z"></path>
          </svg>
        </a>

    </div>

  </div>

  <div class="mt-20">
    <h2 class="text-2xl font-bold">Table of content</h2>

    <div class="mt-6 space-y-6 md:space-y-0 md:flex md:flex-wrap md:justify-between">

      @foreach($page->getDocsToc() as $name => $items)
        <div class="">

          <h3 class="mb-2.5 font-semibold text-lg">{{ $name }}</h3>

          <ul class="space-y-1.5">
            @foreach($items as $p)
              <li>
                @if($p['disabled'])
                  <span>{{ $p['title'] }}</span>
                @else
                  <a href="{{ $p['url'] }}" class="hover:text-orange-600">{{ $p['title'] }}</a>
                @endif
              </li>
            @endforeach
          </ul>

        </div>
      @endforeach

    </div>
  </div>
@endsection
