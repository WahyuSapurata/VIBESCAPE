<!--  Search modal -->
<div id="uc-search-modal" class="uc-modal-full uc-modal" data-uc-modal="overlay: true">
    <div class="uc-modal-dialog d-flex justify-center bg-white text-dark dark:bg-gray-900 dark:text-white"
        data-uc-height-viewport="">
        <button
            class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all"
            type="button">
            <i class="unicon-close"></i>
        </button>
        <div class="panel w-100 sm:w-500px px-2 py-10">
            <h3 class="h1 text-center">Search</h3>

            <div class="hstack gap-1 mt-4 border-bottom p-narrow dark:border-gray-700">
                <span class="d-inline-flex justify-center items-center w-24px sm:w-40 h-24px sm:h-40px opacity-50">
                    <i class="unicon-search icon-3"></i>
                </span>
                <input type="search" autocomplete="off" id="search-article" name="q"
                    class="form-control-plaintext ms-1 fs-6 sm:fs-5 w-full dark:text-white"
                    placeholder="Type your keyword.." aria-label="Search" autofocus>
            </div>

            <ul id="search-results" class="list-group mt-2 uc-nav uc-navbar-dropdown-nav"></ul>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#search-article').on('keyup', function() {
                        let query = $(this).val(); // Ambil nilai input

                        if (query.length > 1) { // Mulai pencarian setelah 2 karakter
                            $.ajax({
                                url: "{{ route('search') }}",
                                type: "GET",
                                data: {
                                    q: query
                                },
                                success: function(response) {
                                    let results = response.data; // Ambil data dari JSON response
                                    let html = "";

                                    if (results.length > 0) {
                                        results.forEach(article => {
                                            html += `<li class="list-group-item">
                                            <a href="/detail-artikel/${article.uuid}">
                                                ${article.judul_artikel}
                                            </a>
                                         </li>`;
                                        });
                                    } else {
                                        html =
                                            '<li class="list-group-item text-muted">No results found.</li>';
                                    }

                                    $('#search-results').html(html); // Tampilkan hasil pencarian
                                },
                                error: function(xhr) {
                                    console.error('Error:', xhr.responseText);
                                }
                            });
                        } else {
                            $('#search-results').html(""); // Kosongkan hasil jika input dihapus
                        }
                    });
                });
            </script>

        </div>
    </div>
</div>

<!--  Menu panel -->
<div id="uc-menu-panel" data-uc-offcanvas="overlay: true;">
    <div class="uc-offcanvas-bar bg-white text-dark dark:bg-gray-900 dark:text-white">
        <header class="uc-offcanvas-header hstack justify-between items-center pb-4 bg-white dark:bg-gray-900">
            <div class="uc-logo">
                <a href="{{ route('home') }}" class="h5 text-none text-gray-900 dark:text-white">
                    <img width="70px" class="d-block dark:d-none"
                        src="{{ asset('LOGO vibescape_logotype hitam.png') }}" alt="Vibescape">
                    <img width="70px" class="d-none dark:d-block"
                        src="{{ asset('LOGO vibescape_logotype putih.png') }}" alt="Vibescape">
                </a>
            </div>
            <button
                class="uc-offcanvas-close p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all"
                type="button">
                <i class="unicon-close"></i>
            </button>
        </header>

        <div class="panel">
            <div id="search-panel" class="form-icon-group vstack gap-1 mb-3" data-uc-sticky="">
                <input type="search" autocomplete="off" id="search-article-mobile" name="q"
                    class="form-control form-control-md fs-6" placeholder="Type your keyword.." aria-label="Search"
                    autofocus>
                <span class="form-icon text-gray">
                    <i class="unicon-search icon-1"></i>
                </span>
            </div>

            <ul id="search-results-mobile" class="list-group mt-2 uc-nav uc-navbar-dropdown-nav"></ul>

            <script>
                $(document).ready(function() {
                    $('#search-article-mobile').on('keyup', function() {
                        let query = $(this).val(); // Ambil nilai input

                        if (query.length > 1) { // Mulai pencarian setelah 2 karakter
                            $.ajax({
                                url: "{{ route('search') }}",
                                type: "GET",
                                data: {
                                    q: query
                                },
                                success: function(response) {
                                    let results = response.data; // Ambil data dari JSON response
                                    let html = "";

                                    if (results.length > 0) {
                                        results.forEach(article => {
                                            html += `<li class="list-group-item">
                                            <a href="/detail-artikel/${article.uuid}">
                                                ${article.judul_artikel}
                                            </a>
                                         </li>`;
                                        });
                                    } else {
                                        html =
                                            '<li class="list-group-item text-muted">No results found.</li>';
                                    }

                                    $('#search-results-mobile').html(html); // Tampilkan hasil pencarian
                                },
                                error: function(xhr) {
                                    console.error('Error:', xhr.responseText);
                                }
                            });
                        } else {
                            $('#search-results-mobile').html(""); // Kosongkan hasil jika input dihapus
                        }
                    });
                });
            </script>

            <ul class="nav-y gap-narrow fw-bold fs-5" data-uc-nav>
                <li class="uc-parent">
                    <a href="#">Navigasi Berita</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="{{ route('detail-kategori', ['params' => 'Berita']) }}">Berita</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Politik']) }}">Politik</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Ekonomi']) }}">Ekonomi</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Sosial']) }}">Sosial</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Teknologi']) }}">Teknologi</a>
                        </li>
                    </ul>
                </li>
                <li class="uc-parent">
                    <a href="#">Gaya Hidup</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="{{ route('detail-kategori', ['params' => 'Fashion']) }}">Fashion</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Kesehatan']) }}">Kesehatan</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Kecantikan']) }}">Kecantikan</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Mental Health']) }}">Mental
                                Health</a></li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Kuliner']) }}">Kuliner</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Travel']) }}">Travel</a>
                        </li>
                    </ul>
                </li>
                <li class="uc-parent">
                    <a href="#">Hiburan</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="{{ route('detail-kategori', ['params' => 'Film']) }}">Film</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Musik']) }}">Musik</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Selebriti']) }}">Selebriti</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Seni & Budaya']) }}">Seni
                                & Budaya</a></li>
                    </ul>
                </li>
                <li class="uc-parent">
                    <a href="#">Opini & Feature</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="{{ route('detail-kategori', ['params' => 'Opini Publik']) }}">Opini
                                Publik</a></li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Feature Eksklusif']) }}">Feature
                                Eksklusif</a></li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Wawancara Eksklusif']) }}">Wawancara
                                Eksklusif</a></li>
                    </ul>
                </li>
                <li class="uc-parent">
                    <a href="#">Teknologi & Inovasi</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="{{ route('detail-kategori', ['params' => 'Startup']) }}">Startup</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'AI']) }}">AI</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Gadget']) }}">Gadget</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Digital Lifestyle']) }}">Digital
                                Lifestyle</a></li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Cyber Security']) }}">Cyber
                                Security</a></li>
                    </ul>
                </li>
                <li class="uc-parent">
                    <a href="#">Ekonomi & Bisnis</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="{{ route('detail-kategori', ['params' => 'Analisis Pasar']) }}">Analisis
                                Pasar</a></li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Finansial']) }}">Finansial</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Investasi']) }}">Investasi</a>
                        </li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'UMKM & Startup']) }}">UMKM
                                & Startup</a></li>
                    </ul>
                </li>
                <li class="uc-parent">
                    <a href="#">Trending & Populer</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="{{ route('detail-kategori', ['params' => 'Berita Terpopuler']) }}">Berita
                                Terpopuler</a></li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Topik Trending']) }}">Topik
                                Trending</a></li>
                        <li><a href="{{ route('detail-kategori', ['params' => 'Konten Viral']) }}">Konten
                                Viral</a></li>
                    </ul>
                </li>
                {{-- <li><a href="#">Latest</a></li> --}}

                <li class="hr opacity-10 my-1"></li>
                {{-- <li><a href="sign-in.html">Sign in</a></li>
                <li><a href="sign-up.html">Create an account</a></li> --}}
            </ul>
            <ul class="social-icons nav-x mt-4">
                <li>
                    <a href="#"><i class="unicon-logo-medium icon-2"></i></a>
                    <a href="#"><i class="unicon-logo-x-filled icon-2"></i></a>
                    <a href="#"><i class="unicon-logo-instagram icon-2"></i></a>
                    <a href="#"><i class="unicon-logo-pinterest icon-2"></i></a>
                </li>
            </ul>
            <div class="py-2 hstack gap-2 mt-4 bg-white dark:bg-gray-900" data-uc-sticky="position: bottom">
                <div class="vstack gap-1">
                    <span class="fs-7 opacity-60">Select theme:</span>
                    <div class="darkmode-trigger" data-darkmode-switch="">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider fs-5"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  Favorites modal -->
<div id="uc-favorites-modal" data-uc-modal="overlay: true">
    <div class="uc-modal-dialog lg:max-w-500px bg-white text-dark dark:bg-gray-800 dark:text-white rounded">
        <button
            class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all"
            type="button">
            <i class="unicon-close"></i>
        </button>
        <div class="panel vstack justify-center items-center gap-2 text-center px-3 py-8">
            <i class="icon icon-4 unicon-bookmark mb-2 text-primary dark:text-white"></i>
            <h2 class="h4 md:h3 m-0">Saved articles</h2>
            <p class="fs-5 opacity-60">You have not yet added any article to your bookmarks!</p>
            <a href="index.html" class="btn btn-sm btn-primary mt-2 uc-modal-close">Browse articles</a>
        </div>
    </div>
</div>

<!--  Newsletter modal -->
<div id="uc-newsletter-modal" data-uc-modal="overlay: true">
    <div class="uc-modal-dialog w-800px bg-white text-dark dark:bg-gray-900 dark:text-white rounded overflow-hidden">
        <button
            class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all"
            type="button">
            <i class="unicon-close"></i>
        </button>
        <div class="row md:child-cols-6 col-match g-0">
            <div class="d-none md:d-flex">
                <div class="position-relative w-100 ratio-1x1">
                    <img class="media-cover"
                        src="{{ asset('assets-landing/images/demo-three/common/newsletter.jpg') }}"
                        alt="Newsletter image">
                </div>
            </div>
            <div>
                <div class="panel vstack self-center p-4 md:py-8 text-center">
                    <h3 class="h3 md:h2">Subscribe to the Newsletter</h3>
                    <p class="ft-tertiary">Join 10k+ people to get notified about new posts, news and tips.</p>
                    <div class="panel mt-2 lg:mt-4">
                        <form class="vstack gap-1">
                            <input type="email"
                                class="form-control form-control-sm w-full fs-6 bg-white dark:border-white dark:border-gray-700 dark:text-dark"
                                placeholder="Your email address..">
                            <button type="submit" class="btn btn-sm btn-primary">Subscribe</button>
                        </form>
                        <p class="fs-7 mt-2">Do not worry we don't spam!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  GDPR modal -->
<div id="uc-gdpr-notification" class="uc-gdpr-notification uc-notification uc-notification-bottom-left lg:m-2">
    <div class="uc-notification-message">
        <a id="uc-close-gdpr-notification" class="uc-notification-close" data-uc-close></a>
        <h2 class="h5 ft-primary fw-bold -ls-1 m-0">GDPR Compliance</h2>
        <p class="fs-7 mt-1 mb-2">We use cookies to ensure you get the best experience on our website. By continuing to
            use our site, you accept our use of cookies, <a href="page-privacy.html"
                class="uc-link text-underline">Privacy Policy</a>, and <a href="page-terms.html"
                class="uc-link text-underline">Terms of Service</a>.</p>
        <button class="btn btn-sm btn-primary" id="uc-accept-gdpr">Accept</button>
    </div>
</div>

<!--  Bottom Actions Sticky -->
<div class="backtotop-wrap position-fixed bottom-0 end-0 z-99 m-2 vstack">
    <div class="darkmode-trigger cstack w-40px h-40px rounded-circle text-none bg-gray-100 dark:bg-gray-700 dark:text-white"
        data-darkmode-toggle="">
        <label class="switch">
            <span class="sr-only">Dark mode toggle</span>
            <input type="checkbox">
            <span class="slider fs-5"></span>
        </label>
    </div>
    <a class="btn btn-sm bg-primary text-white w-40px h-40px rounded-circle" href="to_top" data-uc-backtotop>
        <i class="icon-2 unicon-chevron-up"></i>
    </a>
</div>

<!-- Header start -->
<header class="uc-header header-three uc-navbar-sticky-wrap z-999"
    data-uc-sticky="sel-target: .uc-navbar-container; cls-active: uc-navbar-sticky; cls-inactive: uc-navbar-transparent; end: !*;">
    <nav class="uc-navbar-container fs-6 z-1">
        <div class="uc-top-navbar panel z-3 min-h-32px lg:min-h-48px mx-2 rounded-bottom overflow-hidden bg-gray-800 text-white uc-dark d-none md:d-block"
            data-uc-navbar=" animation: uc-animation-slide-top-small; duration: 150;">
            <div class="position-cover blend-color"
                data-src="{{ asset('assets-landing/images/demo-three/topbar-abstract.jpg') }}" data-uc-img></div>
            <div class="container max-w-xl">
                <div class="hstack panel z-1">
                    <div class="uc-navbar-left gap-2 lg:gap-3">
                        <div class="trending-ticker panel swiper-parent max-w-600px">
                            <div class="swiper hstack gap-1 min-h-40px"
                                data-uc-swiper="items: 1; autoplay: 3000; parallax: true; pause-mouse: false; reverse: false; prev: .swiper-prev; next: .swiper-next; effect: fade; fade: true;">
                                <div class="hstack gap-narrow">
                                    <i class="icon-1 unicon-fire text-warning"></i>
                                    <span class="fs-6 fw-bold dark:text-white">Trending:</span>
                                </div>
                                <div class="swiper-wrapper">
                                    @php
                                        $artikel_populer = App\Models\Artikel::select(
                                            Illuminate\Support\Facades\DB::raw(
                                                'artikels.*, COUNT(views.id) as total_view',
                                            ),
                                        )
                                            ->whereNotNull('tanggal_pulbukasi')
                                            ->leftJoin('views', 'artikels.uuid', '=', 'views.uuid_artikel')
                                            ->groupBy(
                                                'artikels.id',
                                                'artikels.uuid',
                                                'artikels.uuid_user',
                                                'artikels.kategori',
                                                'artikels.judul_artikel',
                                                'artikels.konten',
                                                'artikels.tanggal_pulbukasi',
                                                'artikels.thumbnail',
                                                'artikels.publikasi',
                                                'artikels.set_artikel',
                                                'artikels.created_at',
                                                'artikels.updated_at',
                                            )
                                            ->orderByDesc('total_view')
                                            ->take(4)
                                            ->get();
                                    @endphp
                                    @forelse ($artikel_populer as $item)
                                        <div class="swiper-slide">
                                            <article class="post type-post">
                                                <h6 class="post-title fs-6 ft-primary fw-medium m-0 opacity-75 dark:text-white"
                                                    data-swiper-parallax-y="-24">
                                                    <a class="text-none"
                                                        href="{{ route('detail-artikel', ['params' => $item->uuid]) }}">{{ $item->judul_artikel }}</a>
                                                </h6>
                                            </article>
                                        </div>
                                    @empty
                                        <div class="swiper-slide">
                                            <article class="post type-post">
                                                <h6 class="post-title fs-6 ft-primary fw-medium m-0 opacity-75 dark:text-white"
                                                    data-swiper-parallax-y="-24">
                                                    <a class="text-none" href="#">Tidak ada artikel
                                                        populer</a>
                                                </h6>
                                            </article>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uc-navbar-right gap-2 lg:gap-3">
                        <div class="uc-navbar-item">
                            <ul class="uc-social-header nav-x gap-1 d-none lg:d-flex dark:text-white">
                                <li>
                                    <a href="#tw"
                                        class="w-32px h-32px cstack border rounded-circle hover:bg-primary transition-colors duration-200"><i
                                            class="icon icon-1 unicon-logo-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#in"
                                        class="w-32px h-32px cstack border rounded-circle hover:bg-primary transition-colors duration-200"><i
                                            class="icon icon-1 unicon-logo-x"></i></a>
                                </li>
                                <li>
                                    <a href="#yt"
                                        class="w-32px h-32px cstack border rounded-circle hover:bg-primary transition-colors duration-200"><i
                                            class="icon icon-1 unicon-logo-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="uc-navbar-item">
                            <a class="uc-account-trigger btn btn-sm border-0 p-0 duration-0 dark:text-white"
                                href="#uc-newsletter-modal" data-uc-toggle>
                                <i class="icon icon-2 fw-medium unicon-email"></i>
                            </a>
                        </div>
                        <div class="uc-navbar-item">
                            <a class="uc-search-trigger icon-2 cstack text-none text-dark dark:text-white"
                                href="#uc-search-modal" data-uc-toggle>
                                <i class="icon icon-2 fw-bold unicon-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uc-center-navbar panel z-2">
            <div class="container max-w-xl">
                <div class="uc-navbar min-h-72px lg:min-h-80px text-gray-900 dark:text-white"
                    data-uc-navbar=" animation: uc-animation-slide-top-small; duration: 150;">
                    <div class="uc-navbar-left">
                        <div class="d-block lg:d-none">
                            <a class="uc-menu-trigger" href="#uc-menu-panel" data-uc-toggle></a>
                        </div>
                        <div class="uc-logo d-none md:d-block text-dark dark:text-white">
                            <a href="{{ route('home') }}">
                                <img class="w-100px d-block dark:d-none"
                                    src="{{ asset('LOGO vibescape_logotype hitam.png') }}" alt="Vibescape">
                                <img class="w-100px d-none dark:d-block"
                                    src="{{ asset('LOGO vibescape_logotype putih.png') }}" alt="Vibescape">
                            </a>
                        </div>
                        <ul class="uc-navbar-nav gap-3 ft-tertiary fs-5 fw-medium ms-4 d-none lg:d-flex"
                            style="--uc-nav-height: 80px">
                            <li>
                                <a href="#">Navigasi Berita <span data-uc-navbar-parent-icon></span></a>
                                <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 hide-scrollbar"
                                    data-uc-drop=" offset: 0; animation: uc-animation-slide-top-small; duration: 150;">
                                    <div class="row child-cols col-match g-3">
                                        <div>
                                            <ul class="uc-nav uc-navbar-dropdown-nav">
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Berita']) }}">Berita</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Politik']) }}">Politik</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Ekonomi']) }}">Ekonomi</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Sosial']) }}">Sosial</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Teknologi']) }}">Teknologi</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">Gaya Hidup <span data-uc-navbar-parent-icon></span></a>
                                <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 hide-scrollbar"
                                    data-uc-drop=" offset: 0; animation: uc-animation-slide-top-small; duration: 150;">
                                    <div class="row child-cols col-match g-3">
                                        <div>
                                            <ul class="uc-nav uc-navbar-dropdown-nav">
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Fashion']) }}">Fashion</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Kesehatan']) }}">Kesehatan</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Kecantikan']) }}">Kecantikan</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Mental Health']) }}">Mental
                                                        Health</a></li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Kuliner']) }}">Kuliner</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Travel']) }}">Travel</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">Hiburan <span data-uc-navbar-parent-icon></span></a>
                                <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 hide-scrollbar"
                                    data-uc-drop=" offset: 0; animation: uc-animation-slide-top-small; duration: 150;">
                                    <div class="row child-cols col-match g-3">
                                        <div>
                                            <ul class="uc-nav uc-navbar-dropdown-nav">
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Film']) }}">Film</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Musik']) }}">Musik</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Selebriti']) }}">Selebriti</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Seni & Budaya']) }}">Seni
                                                        & Budaya</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">Opini & Feature <span data-uc-navbar-parent-icon></span></a>
                                <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 hide-scrollbar"
                                    data-uc-drop=" offset: 0; animation: uc-animation-slide-top-small; duration: 150;">
                                    <div class="row child-cols col-match g-3">
                                        <div>
                                            <ul class="uc-nav uc-navbar-dropdown-nav">
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Opini Publik']) }}">Opini
                                                        Publik</a></li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Feature Eksklusif']) }}">Feature
                                                        Eksklusif</a></li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Wawancara Eksklusif']) }}">Wawancara
                                                        Eksklusif</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">Teknologi & Inovasi <span data-uc-navbar-parent-icon></span></a>
                                <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 hide-scrollbar"
                                    data-uc-drop=" offset: 0; animation: uc-animation-slide-top-small; duration: 150;">
                                    <div class="row child-cols col-match g-3">
                                        <div>
                                            <ul class="uc-nav uc-navbar-dropdown-nav">
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Startup']) }}">Startup</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'AI']) }}">AI</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Gadget']) }}">Gadget</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Digital Lifestyle']) }}">Digital
                                                        Lifestyle</a></li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Cyber Security']) }}">Cyber
                                                        Security</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">Ekonomi & Bisnis <span data-uc-navbar-parent-icon></span></a>
                                <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 hide-scrollbar"
                                    data-uc-drop=" offset: 0; animation: uc-animation-slide-top-small; duration: 150;">
                                    <div class="row child-cols col-match g-3">
                                        <div>
                                            <ul class="uc-nav uc-navbar-dropdown-nav">
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Analisis Pasar']) }}">Analisis
                                                        Pasar</a></li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Finansial']) }}">Finansial</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Investasi']) }}">Investasi</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'UMKM & Startup']) }}">UMKM
                                                        & Startup</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">Trending & Populer <span data-uc-navbar-parent-icon></span></a>
                                <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 hide-scrollbar"
                                    data-uc-drop=" offset: 0; animation: uc-animation-slide-top-small; duration: 150;">
                                    <div class="row child-cols col-match g-3">
                                        <div>
                                            <ul class="uc-nav uc-navbar-dropdown-nav">
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Berita Terpopuler']) }}">Berita
                                                        Terpopuler</a></li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Topik Trending']) }}">Topik
                                                        Trending</a></li>
                                                <li><a
                                                        href="{{ route('detail-kategori', ['params' => 'Konten Viral']) }}">Konten
                                                        Viral</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            {{-- <li><a href="blog-category.html">News</a></li> --}}
                        </ul>
                    </div>
                    <div class="uc-navbar-center">
                        <div class="uc-logo d-block md:d-none text-dark dark:text-white">
                            <a href="{{ route('home') }}">
                                <img class="w-100px d-block dark:d-none"
                                    src="{{ asset('LOGO vibescape_logotype hitam.png') }}" alt="Vibescape">
                                <img class="w-100px d-none dark:d-block"
                                    src="{{ asset('LOGO vibescape_logotype putih.png') }}" alt="Vibescape">
                            </a>
                        </div>
                    </div>
                    <div class="uc-navbar-right">
                        <div class="uc-navbar-item">
                            <div class="uc-modes-trigger icon-2 text-dark dark:text-white" data-darkmode-toggle="">
                                <label class="switch">
                                    <span class="sr-only">Dark mode toggle</span>
                                    <input type="checkbox">
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Header end -->
