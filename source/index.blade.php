---
extends: _layouts.base
seo_title: "Debugbar: Powerful devtools for Ruby on Rails"
---
@section('main')

  <div class="py-8 md:py-16">
    <div class="w-full text-center">
      <h1 class="text-xl font-bold tracking-tight text-gray-900 md:text-4xl">
        Powerful debugbar for Ruby on Rails
      </h1>
      <p class="mt-6 text-lg leading-8 text-gray-600">
        Get a better understanding of your application performance and behavior with the debugbar.
      </p>
      <div class="mt-10 flex items-center justify-center gap-x-6">

        <button class="try-button"
                onclick="document.querySelector('#__debugbar-shadow-root').shadowRoot.querySelector('#debubgbar-header > div:nth-child(1) > div > button:nth-child(4)').click()"
        >

          <span class="text inline-flex items-center gap-x-1.5">
            Try It Now

            <svg class="-ml-0.5 size-4" data-slot="icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M7.25 1.75a.75.75 0 0 1 1.5 0v1.5a.75.75 0 0 1-1.5 0v-1.5ZM11.536 2.904a.75.75 0 1 1 1.06 1.06l-1.06 1.061a.75.75 0 0 1-1.061-1.06l1.06-1.061ZM14.5 7.5a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 .75-.75ZM4.464 9.975a.75.75 0 0 1 1.061 1.06l-1.06 1.061a.75.75 0 1 1-1.061-1.06l1.06-1.061ZM4.5 7.5a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 .75-.75ZM5.525 3.964a.75.75 0 0 1-1.06 1.061l-1.061-1.06a.75.75 0 0 1 1.06-1.061l1.061 1.06ZM8.779 7.438a.75.75 0 0 0-1.368.366l-.396 5.283a.75.75 0 0 0 1.212.646l.602-.474.288 1.074a.75.75 0 1 0 1.449-.388l-.288-1.075.759.11a.75.75 0 0 0 .726-1.165L8.78 7.438Z"></path>
            </svg>
          </span>

{{--            <span class="shimmer"></span>--}}
        </button>

        <a href="/docs/introduction" class="text-sm font-semibold leading-6 text-gray-900 hover:text-orange-600">
          Learn more <span aria-hidden="true">→</span>
        </a>
      </div>
    </div>
    <div class="mt-16 flow-root md:mt-24">
      {!! $page->screenshot('home', "Screenshot of the Rails Debugbar") !!}
    </div>
  </div>


@endsection
