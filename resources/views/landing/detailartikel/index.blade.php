@php
    use Carbon\Carbon;
    Carbon::setLocale('id');
@endphp
@extends('landing.layouts.layout')
@section('content')
    <!-- Wrapper start -->
    <div id="wrapper" class="wrap overflow-hidden-x">
        <div class="breadcrumbs panel z-1 py-2 bg-gray-25 dark:bg-gray-100 dark:bg-opacity-5 dark:text-white">
            <div class="container max-w-xl">
                <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
                    <li><a href="index.html">Home</a></li>
                    <li><i class="unicon-chevron-right opacity-50"></i></li>
                    <li><a href="blog-category.html">{{ $data->kategori }}</a></li>
                    <li><i class="unicon-chevron-right opacity-50"></i></li>
                    <li><span class="opacity-50">{{ $data->judul_artikel }}</span></li>
                </ul>
            </div>
        </div>

        <article class="post type-post single-post py-4 lg:py-6 xl:py-9">
            <div class="container max-w-xl">
                <div class="post-header">
                    <div class="panel vstack gap-4 md:gap-6 xl:gap-8 text-center">
                        <div
                            class="panel vstack items-center max-w-400px sm:max-w-500px xl:max-w-md mx-auto gap-2 md:gap-3">
                            <h1 class="h4 sm:h2 lg:h1 xl:display-6">{{ $data->judul_artikel }}
                            </h1>
                            <ul class="post-share-icons nav-x gap-1 dark:text-white">
                                <li>
                                    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                        href="#"><i class="unicon-logo-facebook icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                        href="#"><i class="unicon-logo-x-filled icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                        href="#"><i class="unicon-logo-linkedin icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                        href="#"><i class="unicon-logo-pinterest icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                        href="#"><i class="unicon-email icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                        href="#"><i class="unicon-link icon-1"></i></a>
                                </li>
                            </ul>
                        </div>
                        <figure class="featured-image m-0">
                            <figure
                                class="featured-image m-0 ratio ratio-2x1 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                    src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                    data-src="{{ asset('public/thumbnail/' . $data->thumbnail) }}"
                                    alt="{{ $data->judul_artikel }}" data-uc-img="loading: lazy">
                            </figure>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="panel mt-4 lg:mt-6 xl:mt-9">
                <div class="container max-w-lg">
                    <div class="post-content panel fs-6 md:fs-5">
                        {!! $data->konten !!}
                        {{-- <p>{{ trim(strip_tags(html_entity_decode($data->konten))) }}</p> --}}
                    </div>
                    <div
                        class="post-footer panel vstack sm:hstack gap-3 justify-between justifybetween border-top py-4 mt-4 xl:py-9 xl:mt-9">
                        <ul class="post-share-icons nav-x gap-narrow">
                            <li class="me-1"><span class="text-black dark:text-white">Share:</span></li>
                            <li>
                                <a class="btn btn-md btn-outline-gray-100 p-0 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                    href="#"><i class="unicon-logo-facebook icon-1"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-md btn-outline-gray-100 p-0 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                    href="#"><i class="unicon-logo-x-filled icon-1"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-md btn-outline-gray-100 p-0 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                    href="#"><i class="unicon-email icon-1"></i></a>
                            </li>
                            <li>
                                <a class="btn btn-md btn-outline-gray-100 p-0 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                    href="#"><i class="unicon-link icon-1"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-grid gap-2">
                        <h4 class="h5 xl:h4 mb-5 xl:mb-6">Comments ({{ $komentar->count() }})</h4>

                        @forelse ($komentar as $item_komentar)
                            <div
                                class="post-author panel py-4 px-3 sm:p-3 xl:p-4 bg-gray-25 dark:bg-opacity-10 rounded lg:rounded-2">
                                <div class="row g-4 items-center">
                                    <div class="col-12 sm:col-5 xl:col-3">
                                        <figure
                                            class="featured-image m-0 ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                data-src="{{ asset('assets-landing/images/demo-three/posts/post-author.jpg') }}"
                                                alt="{{ $item_komentar->author }}" data-uc-img="loading: lazy">
                                        </figure>
                                    </div>
                                    <div class="col">
                                        <div class="panel vstack items-start gap-2 md:gap-3">
                                            <h4 class="h5 lg:h4 m-0">{{ $item_komentar->author }}</h4>
                                            <p class="fs-6 lg:fs-5">{{ $item_komentar->komentar }}</p>
                                            <ul class="nav-x gap-1 text-gray-400 dark:text-white">
                                                <li>
                                                    <a href="#medium"><i class="icon-2 unicon-logo-medium"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#twitter"><i class="icon-2 unicon-logo-x-filled"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#instagram"><i class="icon-2 unicon-logo-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card text-center shadow-sm mx-auto" style="width: max-content">
                                <div class="card-body">
                                    <i class="bi bi-box-seam display-6 text-muted"></i>
                                    <h5 class="card-title mt-3 text-muted">Tidak ada Komentar</h5>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="post-related panel border-top pt-2 mt-8 xl:mt-9">
                        <h4 class="h5 xl:h4 mb-5 xl:mb-6">Trending topic:</h4>
                        <div class="row child-cols-6 md:child-cols-3 gx-2 gy-4 sm:gx-3 sm:gy-6">
                            @forelse ($artikel_populer as $populer)
                                <div>
                                    <article class="post type-post panel vstack gap-2">
                                        <figure
                                            class="featured-image m-0 ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                data-src="{{ asset('public/thumbnail/' . $populer->thumbnail) }}"
                                                alt="{{ $populer->judul_artikel }}" data-uc-img="loading: lazy">
                                            <a href="{{ route('detail-artikel', ['params' => $populer->uuid]) }}"
                                                class="position-cover" data-caption="{{ $populer->judul_artikel }}"></a>
                                        </figure>
                                        <div class="post-header panel vstack gap-1">
                                            <h5 class="h6 md:h5 m-0">
                                                <a class="text-none"
                                                    href="{{ route('detail-artikel', ['params' => $populer->uuid]) }}">{{ $populer->judul_artikel }}</a>
                                            </h5>
                                            <div class="post-date hstack gap-narrow fs-7 opacity-60">
                                                <span>{{ Carbon::parse($populer->tanggal_pulbukasi)->translatedFormat('d M, Y') }}</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @empty
                                <div class="card text-center shadow-sm mx-auto" style="width: max-content">
                                    <div class="card-body">
                                        <i class="bi bi-box-seam display-6 text-muted"></i>
                                        <h5 class="card-title mt-3 text-muted">Tidak ada data</h5>
                                        <p class="text-muted">Silakan tambahkan data terlebih dahulu.
                                        </p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Newsletter -->
    </div>

    <!-- Wrapper end -->
@endsection
@section('script')
    <script>
        $(function() {
            viewArtikel();
        });

        function viewArtikel() {
            const token = @json(csrf_token());
            const endpoint = @json(route('view-artikel', ['params' => $data->uuid]));

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });

            $.ajax({
                type: 'POST',
                url: endpoint,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success == true) {
                        console.log('telah di lihat');
                    } else {
                        console.log('gagal di lihat');
                    }
                },
            });
        }
    </script>
@endsection
