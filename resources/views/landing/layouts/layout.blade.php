<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('LOGO vibescape_hitam.png') }}" />
    <title>{{ config('app.name') . ' | ' . $module }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="News5 a clean, modern and pixel-perfect multipurpose blogging HTML5 website template.">
    <meta name="keywords"
        content="saas, saas template, site template, software, startup, digital product, html5, landing, marketing, bootstrap, uikit3, agency, ai, digital agency, it solutions, nodejs">
    <link rel="canonical" href="https://unistudio.co/html/News5">
    <meta name="theme-color" content="#2757fd">

    <!-- Open Graph Tags -->
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="News5">
    <meta property="og:description"
        content="Full-featured, professional-looking news, editorial and magazine website template.">
    <meta property="og:url" content="https://unistudio.co/html/news5/">
    <meta property="og:site_name" content="News5">
    <meta property="og:image" content="https://unistudio.co/html/news5/assets/images/common/seo-image.jpg">
    <meta property="og:image:width" content="1180">
    <meta property="og:image:height" content="600">
    <meta property="og:image:type" content="image/png">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="News5">
    <meta name="twitter:description"
        content="Full-featured, professional-looking news, editorial and magazine website template.">
    <meta name="twitter:image" content="https://unistudio.co/html/news5/assets/images/common/seo-image.jpg">

    <link rel="canonical" href="https://unistudio.co/html/news5/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- preload head styles -->
    <link rel="preload" href="{{ asset('assets-landing/css/unicons.min.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets-landing/css/swiper-bundle.min.css') }}" as="style">

    <!-- preload footer scripts -->
    <link rel="preload" href="{{ asset('assets-landing/js/libs/jquery.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets-landing/js/libs/scrollmagic.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets-landing/js/libs/swiper-bundle.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets-landing/js/libs/anime.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets-landing/js/helpers/data-attr-helper.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets-landing/js/helpers/swiper-helper.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets-landing/js/helpers/anime-helper.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets-landing/js/helpers/anime-helper-defined-timelines.js') }}"
        as="script">
    <link rel="preload" href="{{ asset('assets-landing/js/uikit-components-bs.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets-landing/js/app.js') }}" as="script">

    <!-- app head for bootstrap core -->
    <script src="{{ asset('assets-landing/js/app-head-bs.js') }}"></script>

    <!-- include uni-core components -->
    <link rel="stylesheet" href="{{ asset('assets-landing/js/uni-core/css/uni-core.min.css') }}">

    <!-- include styles -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/unicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/prettify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/swiper-bundle.min.css') }}">

    <!-- include main style -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/theme/demo-three.min.css') }}">

    <!-- include scripts -->
    <script src="{{ asset('assets-landing/js/uni-core/js/uni-core-bundle.min.js') }}"></script>
</head>

<body class="uni-body panel bg-white text-gray-900 dark:bg-black dark:text-gray-200 overflow-x-hidden">

    @include('landing.layouts.header')

    <!-- Wrapper start -->
    <div id="wrapper" class="wrap overflow-hidden-x">

        @yield('content')

    </div>

    <!-- Wrapper end -->

    @include('landing.layouts.footer')

    <!-- include jquery & bootstrap js -->
    <script defer src="{{ asset('assets-landing/js/libs/jquery.min.js') }}"></script>
    <script defer src="{{ asset('assets-landing/js/libs/bootstrap.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- include scripts -->
    <script defer src="{{ asset('assets-landing/js/libs/anime.min.js') }}"></script>
    <script defer src="{{ asset('assets-landing/js/libs/swiper-bundle.min.js') }}"></script>
    <script defer src="{{ asset('assets-landing/js/libs/scrollmagic.min.js') }}"></script>
    <script defer src="{{ asset('assets-landing/js/helpers/data-attr-helper.js') }}"></script>
    <script defer src="{{ asset('assets-landing/js/helpers/swiper-helper.js') }}"></script>
    <script defer src="{{ asset('assets-landing/js/helpers/anime-helper.js') }}"></script>
    <script defer src="{{ asset('assets-landing/js/helpers/anime-helper-defined-timelines.js') }}"></script>
    <script defer src="{{ asset('assets-landing/js/uikit-components-bs.js') }}"></script>

    <!-- include app script -->
    <script defer src="{{ asset('assets-landing/js/app.js') }}"></script>

    <script>
        // Schema toggle via URL
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const getSchema = urlParams.get("schema");
        if (getSchema === "dark") {
            setDarkMode(1);
        } else if (getSchema === "light") {
            setDarkMode(0);
        }
    </script>

    @yield('script')
</body>

</html>
