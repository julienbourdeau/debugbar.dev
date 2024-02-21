@php
  $title = $page->getSeoTitle() ?? $page->title;
  $description = $page->seo_description ?? $page->description;
  $seoGraphImg = url('/assets/debugbar-graph-img.png');
  $canonicalUrl = $page->getUrl();
@endphp

<title>{{ $title }}</title>
<meta property="og:title" content="{{ $title }}" />

@isset($description)
  <meta name="description" content="{{ $description }}">
  <meta property="og:description" content="{{ $description }}" />
@endisset

<link rel="canonical" href="{{ $canonicalUrl }}"/>
<meta property="og:url" content="{{ $canonicalUrl }}" />

<meta name="twitter:creator" content="@julienbourdeau" />

@if($seoGraphImg)
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="image" content="{{ $seoGraphImg }}" />
  <meta itemprop="image" content="{{ $seoGraphImg }}" />
  <meta name="twitter:image" content="{{ $seoGraphImg }}" />
  <meta property="og:image" content="{{ $seoGraphImg }}" />
@endif
