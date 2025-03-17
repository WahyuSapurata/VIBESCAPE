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
                    <li><span class="opacity-50">{{ $module }}</span></li>
                </ul>
            </div>
        </div>

        <div class="section py-3 sm:py-6 lg:py-9">
            <div class="container max-w-xl">
                <div class="panel vstack gap-3 sm:gap-6 lg:gap-9">
                    <header class="page-header panel vstack text-center">
                        <h1 class="h3 lg:h1">Category: {{ $module }}</h1>
                        <span class="m-0 opacity-60">
                            Showed {{ $data->count() }} posts out of {{ $data->total() }} total under
                            <br class="d-block lg:d-none">
                            "{{ $module }}" category.
                        </span>
                    </header>
                    <div class="row g-4 xl:g-8">
                        <div class="col">
                            <div class="panel text-center">
                                <div
                                    class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 col-match gy-4 xl:gy-6 gx-2 sm:gx-4">
                                    @forelse ($data as $item)
                                        <div>
                                            <article class="post type-post panel vstack gap-2">
                                                <div class="post-image panel overflow-hidden">
                                                    <figure
                                                        class="featured-image m-0 ratio ratio-16x9 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                            src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                            data-src="{{ asset('public/thumbnail/' . $item->thumbnail) }}"
                                                            alt="{{ $item->judul_artikel }}" data-uc-img="loading: lazy">
                                                        <a href="{{ route('detail-artikel', ['params' => $item->uuid]) }}"
                                                            class="position-cover"
                                                            data-caption="{{ $item->judul_artikel }}"></a>
                                                    </figure>
                                                    <div
                                                        class="post-category hstack gap-narrow position-absolute top-0 start-0 m-1 fs-7 fw-bold h-24px px-1 rounded-1 shadow-xs bg-white text-primary">
                                                        <a class="text-none"
                                                            href="{{ route('detail-kategori', ['params' => $item->kategori]) }}">{{ $item->kategori }}</a>
                                                    </div>
                                                    <div
                                                        class="position-absolute top-0 end-0 w-150px h-150px rounded-top-end bg-gradient-45 from-transparent via-transparent to-black opacity-50">
                                                    </div>
                                                    <span
                                                        class="cstack position-absolute top-0 end-0 fs-6 w-40px h-40px text-white">
                                                        <i class="icon-narrow unicon-play-filled-alt"></i>
                                                    </span>
                                                </div>
                                                <div class="post-header panel vstack gap-1 lg:gap-2">
                                                    <h3 class="post-title h6 sm:h5 xl:h4 m-0 text-truncate-2 m-0">
                                                        <a class="text-none"
                                                            href="{{ route('detail-artikel', ['params' => $item->uuid]) }}">{{ $item->judul_artikel }}</a>
                                                    </h3>
                                                    <div>
                                                        <div
                                                            class="post-meta panel hstack justify-center fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                            <div class="meta">
                                                                <div class="hstack gap-2">
                                                                    <div>
                                                                        <div class="post-author hstack gap-1">
                                                                            <a href="#"
                                                                                data-uc-tooltip="Jason Blake"><img
                                                                                    src="{{ asset('assets-landing/images/avatars/14.png') }}"
                                                                                    alt="Jason Blake"
                                                                                    class="w-24px h-24px rounded-circle"></a>
                                                                            <a href="#"
                                                                                class="text-black dark:text-white text-none fw-bold">{{ $item->author }}</a>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div class="post-date hstack gap-narrow">
                                                                            <span>{{ Carbon::parse($item->tanggal_pulbukasi)->translatedFormat('d M, Y') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <a href="#"
                                                                            class="post-comments text-none hstack gap-narrow">
                                                                            <i class="icon-narrow unicon-chat"></i>
                                                                            <span>{{ $item->t_komentar }}</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="actions">
                                                                <div class="hstack gap-1"></div>
                                                            </div>
                                                        </div>
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
                                @if ($data->hasPages())
                                    <div
                                        class="nav-pagination pt-3 mt-6 lg:mt-9 border-top border-gray-100 dark:border-gray-800">
                                        <ul class="nav-x uc-pagination hstack gap-2 justify-center ft-secondary"
                                            data-uc-margin="">
                                            {{-- Tombol Previous --}}
                                            @if ($data->onFirstPage())
                                                <li class="uc-disabled"><span
                                                        class="icon icon-1 unicon-chevron-left"></span>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ $data->previousPageUrl() }}"><span
                                                            class="icon icon-1 unicon-chevron-left"></span></a>
                                                </li>
                                            @endif

                                            {{-- Nomor Halaman --}}
                                            @foreach ($data->links()->elements[0] as $page => $url)
                                                @if ($page == $data->currentPage())
                                                    <li><a href="{{ $url }}"
                                                            class="uc-active">{{ $page }}</a></li>
                                                @else
                                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                @endif
                                            @endforeach

                                            {{-- Tombol Next --}}
                                            @if ($data->hasMorePages())
                                                <li>
                                                    <a href="{{ $data->nextPageUrl() }}"><span
                                                            class="icon icon-1 unicon-chevron-right"></span></a>
                                                </li>
                                            @else
                                                <li class="uc-disabled"><span
                                                        class="icon icon-1 unicon-chevron-right"></span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter -->
    </div>

    <!-- Wrapper end -->
@endsection
