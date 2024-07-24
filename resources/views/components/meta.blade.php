@props(['seo' => null, 'page' => null])
@php
    /**
     * @var \Wiroom\NovaSeo\Data\SeoMetaData $seo
     * @noinspection PhpMultipleClassDeclarationsInspection
     */
    if (isset($page) && $page && method_exists($page, 'getSeoMetaData')) {
        $seo = $page->getSeoMetaData();
    } elseif (!isset($seo) || !$seo || !$seo->title) {
        /** @noinspection PhpMultipleClassDeclarationsInspection */
        $seo = \Wiroom\NovaSeo\Data\SeoMetaData::from([
            'title' => config('app.name', 'Laravel'),
            'description' => null,
        ]);
    }
@endphp

<title>{{ $seo->title }}</title>
@if(config('nova-seo.seo_status'))
    <meta property="og:title" content="{{ $seo->title }}" />
    @if(isset($seo->description) && $seo->description)
        <meta name="description" content="{{ $seo->description }}" />
        <meta property="og:description" content="{{ $seo->description }}" />
    @endif

    @if(!empty($seo->image_url))
        <meta property="og:image" content="{{ $seo->image_url }}" />
    @endif

    @if(!empty($seo->canonical_url))
        <link rel="canonical" href="{{ url($seo->canonical_url) }}" />
    @endif

    @if($seo->robots_noindex)
        <meta name="robots" content="noindex" />
    @endif
    @if($seo->robots_nofollow)
        <meta name="robots" content="nofollow" />
    @endif
@else
    <meta name="robots" content="none" />
@endif
