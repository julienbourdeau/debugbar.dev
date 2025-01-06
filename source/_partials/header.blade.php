<div x-data="{open: false}" >
  <div class="px-2 md:px-0 py-2 flex items-center justify-between">
    {{--  LEFT--}}
    <div>
      <a href="/" class="text-stone-900 hover:text-orange-600">
        @include('_partials.logo')
      </a>
    </div>

    {{--  RIGHT--}}

    {{--  Menu button--}}
    <div class="-mr-2 flex items-center md:hidden">
      <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
        <svg x-show="!open" class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="open" class="h-6 w-6" style="display:none;" stroke="currentColor" fill="none" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    {{--  desktop nav--}}
    <div class="hidden py-3 md:flex items-center space-x-8 font-semibold">
      @foreach($page->navigation as $nav)
        <a href="{{ $nav->url }}"
           title="{{ $nav->title }}"
           class="inline-flex items-center gap-x-1.5 hover:text-orange-600" @if($nav->external) target="_blank" @endif>
          {{ $nav->label }}

          @if($nav->external)
            <svg class="-ml-0.5 size-4" data-slot="icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M6.22 8.72a.75.75 0 0 0 1.06 1.06l5.22-5.22v1.69a.75.75 0 0 0 1.5 0v-3.5a.75.75 0 0 0-.75-.75h-3.5a.75.75 0 0 0 0 1.5h1.69L6.22 8.72Z"></path>
              <path d="M3.5 6.75c0-.69.56-1.25 1.25-1.25H7A.75.75 0 0 0 7 4H4.75A2.75 2.75 0 0 0 2 6.75v4.5A2.75 2.75 0 0 0 4.75 14h4.5A2.75 2.75 0 0 0 12 11.25V9a.75.75 0 0 0-1.5 0v2.25c0 .69-.56 1.25-1.25 1.25h-4.5c-.69 0-1.25-.56-1.25-1.25v-4.5Z"></path>
            </svg>
          @endif
        </a>
      @endforeach
    </div>
  </div>

  {{--  mobile nav--}}
  <div x-show="open" @click.away="open = false" class="md:hidden shadow-lg" style="display: none;">
    <div class="block pt-2 pb-3">
      @foreach($page->navigation as $nav)
        <a href="{{ $nav->url }}"
           class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium  transition duration-150 ease-in-out hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-stone-800 focus:bg-stone-50 focus:border-stone-300"
           @if($nav->external) target="_blank" @endif
        >
          <div class="inline-flex items-center gap-x-1.5">
            {{ $nav->label }}

            @if($nav->external)
              <svg class="-ml-0.5 size-4" data-slot="icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M6.22 8.72a.75.75 0 0 0 1.06 1.06l5.22-5.22v1.69a.75.75 0 0 0 1.5 0v-3.5a.75.75 0 0 0-.75-.75h-3.5a.75.75 0 0 0 0 1.5h1.69L6.22 8.72Z"></path>
                <path d="M3.5 6.75c0-.69.56-1.25 1.25-1.25H7A.75.75 0 0 0 7 4H4.75A2.75 2.75 0 0 0 2 6.75v4.5A2.75 2.75 0 0 0 4.75 14h4.5A2.75 2.75 0 0 0 12 11.25V9a.75.75 0 0 0-1.5 0v2.25c0 .69-.56 1.25-1.25 1.25h-4.5c-.69 0-1.25-.56-1.25-1.25v-4.5Z"></path>
              </svg>
            @endif
          </div>
        </a>
      @endforeach
    </div>
  </div>
</div>
