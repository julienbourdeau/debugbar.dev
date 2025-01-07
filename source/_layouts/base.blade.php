@extends('_layouts.plain')

@section('body')

  <div class="mt-6 lg:mt-8 mb-0.5 mx-2 md:mx-4 px-2 md:px-4 lg:px-8 lg:mb-1 text-right text-sm lg:mx-auto lg:container">

    Current version: <a class="font-bold font-mono hover:text-amber-600" target="_blank" href="https://rubygems.org/gems/debugbar">
      {{ $page->currentVersion }}
    </a>
  </div>

  <div class="mx-2 md:mx-4 p-2 md:p-4 lg:px-8 lg:mx-auto lg:container bg-white border rounded rounded-tr-xl shadow">

    <header class="mb-16">
      @include ('_partials.header')
    </header>

    <div class="main-section mb-24">

      <div>
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl md:-top-80" aria-hidden="true">
          <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-stone-800 to-red-400 opacity-10 md:left-[calc(50%-30rem)] md:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>

        <div>
          @yield('main')
        </div>
      </div>

    </div>

  </div>

  <footer class="mb-24 mx-2 md:mx-4 py-2 lg:mx-auto lg:container">
    @include('_partials.footer')
  </footer>

@endsection
