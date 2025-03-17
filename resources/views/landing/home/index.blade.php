@php
    use Carbon\Carbon;
    Carbon::setLocale('id');
    $formattedDate = Carbon::parse($artikel_pilihan->tanggal_pulbukasi)->diffForHumans();
@endphp
@extends('landing.layouts.layout')
@section('content')
    <!-- Section start -->

    <div class="section panel overflow-hidden py-2 bg-gray-25 dark:bg-gray-900 uc-dark">
        <div class="section-outer panel">
            <div class="container container-expand">
                <div class="section-inner panel vstack gap-4">
                    <div class="section-content">
                        <div class="block-layout grid-overlay-layout">
                            <div class="block-content">
                                <div class="row child-cols-12 md:child-cols-6 g-1 col-match">
                                    <div>
                                        @if ($artikel_pilihan)
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle  vstack gap-2 lg:gap-3 h-100 rounded overflow-hidden">
                                                    <div class="post-media panel overflow-hidden h-100">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 h-100 d-none md:d-block">
                                                            <canvas class="h-100 w-100"></canvas>
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('public/thumbnail/' . $artikel_pilihan->thumbnail) }}"
                                                                alt="{{ $artikel_pilihan->judul_artikel }}"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9 d-block md:d-none">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('public/thumbnail/' . $artikel_pilihan->thumbnail) }}"
                                                                alt="{{ $artikel_pilihan->judul_artikel }}"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="position-cover bg-gradient-to-t from-black to-transparent opacity-90">
                                                    </div>
                                                    <div
                                                        class="post-header panel vstack justify-end items-start gap-1 sm:gap-2 p-2 sm:p-4 position-cover text-white">
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div>
                                                                <div class="post-category hstack gap-narrow fw-semibold">
                                                                    <a class="fw-medium text-none text-primary dark:text-primary-400"
                                                                        href="{{ route('detail-kategori', ['params' => $artikel_pilihan->kategori]) }}">{{ $artikel_pilihan->kategori }}</a>
                                                                </div>
                                                            </div>
                                                            <div class="sep d-none md:d-block">|</div>
                                                            <div class="d-none md:d-block">
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>{{ $formattedDate }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h3
                                                            class="post-title h5 sm:h4 xl:h3 m-0 max-w-600px text-white text-truncate-2">
                                                            <a class="text-none text-white"
                                                                href="{{ route('detail-artikel', ['params' => $artikel_pilihan->uuid]) }}">{{ $artikel_pilihan->judul_artikel }}</a>
                                                        </h3>
                                                        <div>
                                                            <div
                                                                class="post-meta panel hstack justify-between fs-7 fw-medium text-white text-opacity-60">
                                                                <div class="meta">
                                                                    <div class="hstack gap-2">
                                                                        <div>
                                                                            <div class="post-author hstack gap-1">
                                                                                <a href="#"
                                                                                    data-uc-tooltip="Sarah Eddrissi"><img
                                                                                        src="{{ asset('assets-landing/images/avatars/14.png') }}"
                                                                                        alt="Sarah Eddrissi"
                                                                                        class="w-24px h-24px rounded-circle"></a>
                                                                                <a href="#"
                                                                                    class="text-black dark:text-white text-none fw-bold">{{ $author->name }}</a>
                                                                            </div>
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
                                        @else
                                            <div class="card text-center shadow-sm mx-auto" style="width: max-content">
                                                <div class="card-body">
                                                    <i class="bi bi-box-seam display-6 text-muted"></i>
                                                    <h5 class="card-title mt-3 text-muted">Tidak ada data</h5>
                                                    <p class="text-muted">Silakan tambahkan data terlebih dahulu.
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="panel">
                                            <div class="row child-cols-6 g-1">
                                                @forelse ($artikel_latest as $index => $latest)
                                                    <div class="{{ $index >= 2 ? 'd-none lg:d-block' : '' }}">
                                                        <article
                                                            class="post type-post panel uc-transition-toggle vstack gap-2 lg:gap-3 rounded overflow-hidden">
                                                            <div class="post-media panel overflow-hidden">
                                                                <div
                                                                    class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1 sm:ratio-4x3">
                                                                    <img class="media-cover image image uc-transition-scale-up uc-transition-opaque"
                                                                        src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                                        data-src="{{ asset('public/thumbnail/' . $latest->thumbnail) }}"
                                                                        alt="{{ $latest->judul_artikel }}"
                                                                        data-uc-img="loading: lazy">
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="position-cover bg-gradient-to-t from-black to-transparent opacity-90">
                                                            </div>
                                                            <div
                                                                class="post-header panel vstack justify-start items-start flex-column-reverse gap-1 p-2 position-cover text-white">
                                                                <h3
                                                                    class="post-title h6 sm:h5 lg:h6 xl:h5 m-0 max-w-600px text-white text-truncate-2">
                                                                    <a class="text-none text-white"
                                                                        href="{{ route('detail-artikel', ['params' => $latest->uuid]) }}">{{ $latest->judul_artikel }}</a>
                                                                </h3>
                                                                <div
                                                                    class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                                    <div>
                                                                        <div
                                                                            class="post-category hstack gap-narrow fw-semibold">
                                                                            <a class="fw-medium text-none text-primary dark:text-primary-400"
                                                                                href="{{ route('detail-kategori', ['params' => $latest->kategori]) }}">{{ $latest->kategori }}</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sep d-none md:d-block">|</div>
                                                                    <div class="d-none md:d-block">
                                                                        <div class="post-date hstack gap-narrow">
                                                                            <span>{{ Carbon::parse($latest->tanggal_pulbukasi)->diffForHumans() }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="{{ route('detail-artikel', ['params' => $latest->uuid]) }}"
                                                                class="position-cover"></a>
                                                        </article>
                                                    </div>
                                                @empty
                                                    <div class="card text-center shadow-sm mx-auto"
                                                        style="width: max-content">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="image-links-panel panel overflow-hidden pt-2 swiper-parent">
        <div class="container max-w-xl">
            <div class="panel">
                <div class="swiper overflow-unset"
                    data-uc-swiper="items: 3.25; gap: 8; center: true; freeMode: true; center-bounds: true; disable-class: d-none;"
                    data-uc-swiper-s="items: 6;" data-uc-swiper-l="items: 8; gap: 16;">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div
                                class="panel uc-transition-toggle vstack text-center overflow-hidden rounded border border-white border-opacity-10">
                                <figure
                                    class="featured-image m-0 ratio ratio-3x4 rounded-0 overflow-hidden bg-gray-25 dark:bg-gray-800">
                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                        src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                        data-src="{{ asset('panel/politik.jpg') }}" alt="Politik"
                                        data-uc-img="loading: lazy">
                                    <a href="{{ route('detail-kategori', ['params' => 'Politik']) }}"
                                        class="position-cover" data-caption="Politik"></a>
                                </figure>
                                <div class="overlay position-cover z-0 bg-black bg-opacity-50"></div>
                                <div
                                    class="position-absolute bottom-0 vstack justify-end gap-1 lg:gap-2 h-3/4 w-100 p-2 bg-gradient-to-t from-orange-600 to-transparent">
                                    <span class="fs-5 lg:fs-4 fw-bold text-white m-0">Politik</span>
                                    <a href="{{ route('detail-kategori', ['params' => 'Politik']) }}"
                                        class="btn btn-2xs border-white border-opacity-25 fs-7 text-white rounded-1">Visit</a>
                                </div>
                                <a class="position-cover text-none z-1"
                                    href="{{ route('detail-kategori', ['params' => 'Politik']) }}"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                class="panel uc-transition-toggle vstack text-center overflow-hidden rounded border border-white border-opacity-10">
                                <figure
                                    class="featured-image m-0 ratio ratio-3x4 rounded-0 overflow-hidden bg-gray-25 dark:bg-gray-800">
                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                        src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                        data-src="{{ asset('panel/travel.jpg') }}" alt="Travel"
                                        data-uc-img="loading: lazy">
                                    <a href="{{ route('detail-kategori', ['params' => 'Travel']) }}"
                                        class="position-cover" data-caption="Travel"></a>
                                </figure>
                                <div class="overlay position-cover z-0 bg-black bg-opacity-50"></div>
                                <div
                                    class="position-absolute bottom-0 vstack justify-end gap-1 lg:gap-2 h-3/4 w-100 p-2 bg-gradient-to-t from-lime-600 to-transparent">
                                    <span class="fs-5 lg:fs-4 fw-bold text-white m-0">Travel</span>
                                    <a href="{{ route('detail-kategori', ['params' => 'Travel']) }}"
                                        class="btn btn-2xs border-white border-opacity-25 fs-7 text-white rounded-1">Visit</a>
                                </div>
                                <a class="position-cover text-none z-1"
                                    href="{{ route('detail-kategori', ['params' => 'Travel']) }}"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                class="panel uc-transition-toggle vstack text-center overflow-hidden rounded border border-white border-opacity-10">
                                <figure
                                    class="featured-image m-0 ratio ratio-3x4 rounded-0 overflow-hidden bg-gray-25 dark:bg-gray-800">
                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                        src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                        data-src="{{ asset('panel/film.jpg') }}" alt="Film"
                                        data-uc-img="loading: lazy">
                                    <a href="{{ route('detail-kategori', ['params' => 'Film']) }}" class="position-cover"
                                        data-caption="Film"></a>
                                </figure>
                                <div class="overlay position-cover z-0 bg-black bg-opacity-50"></div>
                                <div
                                    class="position-absolute bottom-0 vstack justify-end gap-1 lg:gap-2 h-3/4 w-100 p-2 bg-gradient-to-t from-red-600 to-transparent">
                                    <span class="fs-5 lg:fs-4 fw-bold text-white m-0">Film</span>
                                    <a href="{{ route('detail-kategori', ['params' => 'Film']) }}"
                                        class="btn btn-2xs border-white border-opacity-25 fs-7 text-white rounded-1">Visit</a>
                                </div>
                                <a class="position-cover text-none z-1"
                                    href="{{ route('detail-kategori', ['params' => 'Film']) }}"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                class="panel uc-transition-toggle vstack text-center overflow-hidden rounded border border-white border-opacity-10">
                                <figure
                                    class="featured-image m-0 ratio ratio-3x4 rounded-0 overflow-hidden bg-gray-25 dark:bg-gray-800">
                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                        src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                        data-src="{{ asset('panel/Opini Publik.jpg') }}" alt="Opini Publik"
                                        data-uc-img="loading: lazy">
                                    <a href="{{ route('detail-kategori', ['params' => 'Opini Publik']) }}"
                                        class="position-cover" data-caption="Opini Publik"></a>
                                </figure>
                                <div class="overlay position-cover z-0 bg-black bg-opacity-50"></div>
                                <div
                                    class="position-absolute bottom-0 vstack justify-end gap-1 lg:gap-2 h-3/4 w-100 p-2 bg-gradient-to-t from-green-600 to-transparent">
                                    <span class="fs-5 lg:fs-4 fw-bold text-white m-0">Opini Publik</span>
                                    <a href="{{ route('detail-kategori', ['params' => 'Opini Publik']) }}"
                                        class="btn btn-2xs border-white border-opacity-25 fs-7 text-white rounded-1">Visit</a>
                                </div>
                                <a class="position-cover text-none z-1"
                                    href="{{ route('detail-kategori', ['params' => 'Opini Publik']) }}"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                class="panel uc-transition-toggle vstack text-center overflow-hidden rounded border border-white border-opacity-10">
                                <figure
                                    class="featured-image m-0 ratio ratio-3x4 rounded-0 overflow-hidden bg-gray-25 dark:bg-gray-800">
                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                        src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                        data-src="{{ asset('panel/AI.jpg') }}" alt="AI"
                                        data-uc-img="loading: lazy">
                                    <a href="{{ route('detail-kategori', ['params' => 'AI']) }}" class="position-cover"
                                        data-caption="AI"></a>
                                </figure>
                                <div class="overlay position-cover z-0 bg-black bg-opacity-50"></div>
                                <div
                                    class="position-absolute bottom-0 vstack justify-end gap-1 lg:gap-2 h-3/4 w-100 p-2 bg-gradient-to-t from-blue-600 to-transparent">
                                    <span class="fs-5 lg:fs-4 fw-bold text-white m-0">AI</span>
                                    <a href="{{ route('detail-kategori', ['params' => 'AI']) }}"
                                        class="btn btn-2xs border-white border-opacity-25 fs-7 text-white rounded-1">Visit</a>
                                </div>
                                <a class="position-cover text-none z-1"
                                    href="{{ route('detail-kategori', ['params' => 'AI']) }}"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                class="panel uc-transition-toggle vstack text-center overflow-hidden rounded border border-white border-opacity-10">
                                <figure
                                    class="featured-image m-0 ratio ratio-3x4 rounded-0 overflow-hidden bg-gray-25 dark:bg-gray-800">
                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                        src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                        data-src="{{ asset('panel/Startup.jpg') }}" alt="Startup"
                                        data-uc-img="loading: lazy">
                                    <a href="{{ route('detail-kategori', ['params' => 'Startup']) }}"
                                        class="position-cover" data-caption="Startup"></a>
                                </figure>
                                <div class="overlay position-cover z-0 bg-black bg-opacity-50"></div>
                                <div
                                    class="position-absolute bottom-0 vstack justify-end gap-1 lg:gap-2 h-3/4 w-100 p-2 bg-gradient-to-t from-teal-600 to-transparent">
                                    <span class="fs-5 lg:fs-4 fw-bold text-white m-0">Startup</span>
                                    <a href="{{ route('detail-kategori', ['params' => 'Startup']) }}"
                                        class="btn btn-2xs border-white border-opacity-25 fs-7 text-white rounded-1">Visit</a>
                                </div>
                                <a class="position-cover text-none z-1"
                                    href="{{ route('detail-kategori', ['params' => 'Startup']) }}"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                class="panel uc-transition-toggle vstack text-center overflow-hidden rounded border border-white border-opacity-10">
                                <figure
                                    class="featured-image m-0 ratio ratio-3x4 rounded-0 overflow-hidden bg-gray-25 dark:bg-gray-800">
                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                        src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                        data-src="{{ asset('panel/Finansial.jpg') }}" alt="Finansial"
                                        data-uc-img="loading: lazy">
                                    <a href="{{ route('detail-kategori', ['params' => 'Finansial']) }}"
                                        class="position-cover" data-caption="Finansial"></a>
                                </figure>
                                <div class="overlay position-cover z-0 bg-black bg-opacity-50"></div>
                                <div
                                    class="position-absolute bottom-0 vstack justify-end gap-1 lg:gap-2 h-3/4 w-100 p-2 bg-gradient-to-t from-purple-600 to-transparent">
                                    <span class="fs-5 lg:fs-4 fw-bold text-white m-0">Finansial</span>
                                    <a href="{{ route('detail-kategori', ['params' => 'Finansial']) }}"
                                        class="btn btn-2xs border-white border-opacity-25 fs-7 text-white rounded-1">Visit</a>
                                </div>
                                <a class="position-cover text-none z-1"
                                    href="{{ route('detail-kategori', ['params' => 'Finansial']) }}"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                class="panel uc-transition-toggle vstack text-center overflow-hidden rounded border border-white border-opacity-10">
                                <figure
                                    class="featured-image m-0 ratio ratio-3x4 rounded-0 overflow-hidden bg-gray-25 dark:bg-gray-800">
                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                        src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                        data-src="{{ asset('panel/umkm & startup.jpeg') }}" alt="UMKM & Startup"
                                        data-uc-img="loading: lazy">
                                    <a href="{{ route('detail-kategori', ['params' => 'UMKM & Startup']) }}"
                                        class="position-cover" data-caption="UMKM & Startup"></a>
                                </figure>
                                <div class="overlay position-cover z-0 bg-black bg-opacity-50"></div>
                                <div
                                    class="position-absolute bottom-0 vstack justify-end gap-1 lg:gap-2 h-3/4 w-100 p-2 bg-gradient-to-t from-pink-600 to-transparent">
                                    <span class="fs-5 lg:fs-4 fw-bold text-white m-0">UMKM & Startup</span>
                                    <a href="{{ route('detail-kategori', ['params' => 'UMKM & Startup']) }}"
                                        class="btn btn-2xs border-white border-opacity-25 fs-7 text-white rounded-1">Visit</a>
                                </div>
                                <a class="position-cover text-none z-1"
                                    href="{{ route('detail-kategori', ['params' => 'UMKM & Startup']) }}"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section end -->

    <!-- Section start -->
    <div class="section panel overflow-hidden">
        <div class="section-outer panel py-5 lg:py-8">
            <div class="container max-w-xl">
                <div class="section-inner">
                    <div class="block-layout grid-layout vstack gap-3 lg:gap-4 panel overflow-hidden">
                        <div class="block-header panel">
                            <h2 class="h5 lg:h4 fw-medium m-0 text-inherit hstack">
                                <a class="text-none dark:text-white hover:text-primary duration-150"
                                    href="#">Teknologi & Inovasi</a>
                                <i class="icon-2 lg:icon-3 unicon-chevron-right opacity-40"></i>
                            </h2>
                        </div>
                        <div class="block-content">
                            <div class="panel row child-cols-12 md:child-cols gy-4 md:gx-3 xl:gx-4">
                                <div class="col-12 md:col-6 lg:col-7">
                                    @if ($k_teknologi[0])
                                        <div class="h-100">
                                            <article
                                                class="post type-post panel uc-transition-toggle vstack gap-2 lg:gap-3 h-100 overflow-hidden uc-dark">
                                                <div class="post-media panel overflow-hidden h-100">
                                                    <div
                                                        class="featured-image bg-gray-25 dark:bg-gray-800 h-100 d-none md:d-block">
                                                        <canvas class="h-100 w-100"></canvas>
                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                            src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                            data-src="{{ asset('public/thumbnail/' . $k_teknologi[0]->thumbnail) }}"
                                                            alt="{{ $k_teknologi[0]->judul_artikel }}"
                                                            data-uc-img="loading: lazy">
                                                    </div>
                                                    <div
                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1 d-block md:d-none">
                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                            src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                            data-src="{{ asset('public/thumbnail/' . $k_teknologi[0]->thumbnail) }}"
                                                            alt="{{ $k_teknologi[0]->judul_artikel }}"
                                                            data-uc-img="loading: lazy">
                                                    </div>
                                                </div>
                                                <div
                                                    class="position-cover bg-gradient-to-t from-black to-transparent opacity-90">
                                                </div>
                                                <div
                                                    class="post-header panel vstack justify-end items-start gap-1 sm:gap-2 p-2 sm:p-4 position-cover text-white">
                                                    <div
                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                        <div>
                                                            <div class="post-category hstack gap-narrow fw-semibold">
                                                                <a class="fw-medium text-none text-primary dark:text-primary-400"
                                                                    href="{{ route('detail-kategori', ['params' => $k_teknologi[0]->kategori]) }}">{{ $k_teknologi[0]->kategori }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="sep d-none md:d-block">|</div>
                                                        <div class="d-none md:d-block">
                                                            <div class="post-date hstack gap-narrow">
                                                                <span>{{ Carbon::parse($k_teknologi[0]->tanggal_pulbukasi)->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3
                                                        class="post-title h5 lg:h4 m-0 max-w-600px text-white text-truncate-2">
                                                        <a class="text-none text-white"
                                                            href="{{ route('detail-artikel', ['params' => $k_teknologi[0]->uuid]) }}">{{ $k_teknologi[0]->judul_artikel }}</a>
                                                    </h3>
                                                    <div>
                                                        <div
                                                            class="post-meta panel hstack justify-between fs-7 fw-medium text-white text-opacity-60">
                                                            <div class="meta">
                                                                <div class="hstack gap-2">
                                                                    <div>
                                                                        <div class="post-author hstack gap-1">
                                                                            <a href="page-author.html"
                                                                                data-uc-tooltip="{{ $k_teknologi[0]->author }}"><img
                                                                                    src="{{ asset('assets-landing/images/avatars/14.png') }}"
                                                                                    alt="{{ $k_teknologi[0]->author }}"
                                                                                    class="w-24px h-24px rounded-circle"></a>
                                                                            <a href="page-author.html"
                                                                                class="text-black dark:text-white text-none fw-bold">{{ $k_teknologi[0]->author }}</a>
                                                                        </div>
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
                                    @else
                                        <div class="card text-center shadow-sm mx-auto" style="width: max-content">
                                            <div class="card-body">
                                                <i class="bi bi-box-seam display-6 text-muted"></i>
                                                <h5 class="card-title mt-3 text-muted">Tidak ada data</h5>
                                                <p class="text-muted">Silakan tambahkan data terlebih dahulu.
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <div class="row child-cols-12 g-4 sep-x">
                                        @forelse ($k_teknologi->skip(1) as $teknologi)
                                            <div>
                                                <article class="post type-post panel uc-transition-toggle">
                                                    <div class="row child-cols g-2" data-uc-grid>
                                                        <div class="col-auto">
                                                            <div
                                                                class="post-media panel overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                <div
                                                                    class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                        src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                                        data-src="{{ asset('public/thumbnail/' . $teknologi->thumbnail) }}"
                                                                        alt="{{ $teknologi->judul_artikel }}"
                                                                        data-uc-img="loading: lazy">
                                                                </div>
                                                                <a href="{{ route('detail-artikel', ['params' => $teknologi->uuid]) }}"
                                                                    class="position-cover"></a>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div
                                                                    class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                                    <div>
                                                                        <div
                                                                            class="post-category hstack gap-narrow fw-semibold">
                                                                            <a class="fw-medium text-none text-primary dark:text-primary-400"
                                                                                href="{{ route('detail-kategori', ['params' => $teknologi->kategori]) }}">{{ $teknologi->kategori }}</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sep d-none md:d-block">|</div>
                                                                    <div class="d-none md:d-block">
                                                                        <div class="post-date hstack gap-narrow">
                                                                            <span>{{ Carbon::parse($teknologi->tanggal_pulbukasi)->diffForHumans() }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h3 class="post-title h6 lg:h5 m-0 text-truncate-2">
                                                                    <a class="text-none hover:text-primary duration-150"
                                                                        href="{{ route('detail-artikel', ['params' => $teknologi->uuid]) }}">{{ $teknologi->judul_artikel }}</a>
                                                                </h3>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section end -->

    <!-- Section start -->
    <div class="section panel overflow-hidden">
        <div class="section-outer panel">
            <div class="container max-w-xl">
                <div class="section-inner">
                    @if ($iklan[0])
                        <a class="text-none d-flex" style="justify-content: center;" href="{{ $iklan[0]->link }}"
                            target="_blank" rel="nofollow">
                            <img class="d-none md:d-block" src="{{ asset('public/iklan/' . $iklan[0]->thumbnail) }}"
                                alt="{{ $iklan[0]->judul_iklan }}">
                            <img class="d-block md:d-none" src="{{ asset('public/iklan/' . $iklan[0]->thumbnail) }}"
                                alt="{{ $iklan[0]->judul_iklan }}">
                        </a>
                    @else
                        <div class="card text-center shadow-sm mx-auto" style="width: max-content">
                            <div class="card-body">
                                <i class="bi bi-box-seam display-6 text-muted"></i>
                                <h5 class="card-title mt-3 text-muted">Tidak ada data</h5>
                                <p class="text-muted">Silakan tambahkan data terlebih dahulu.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Section start -->

    <!-- Section start -->
    <div class="section panel overflow-hidden">
        <div class="section-outer panel py-5 lg:py-8">
            <div class="container max-w-xl">
                <div class="section-inner">
                    <div class="row child-cols-12 lg:child-cols-6 g-4 lg:gx-6 xl:gy-8" data-uc-grid>
                        <div>
                            <div class="block-layout grid-layout vstack gap-3 lg:gap-4 panel overflow-hidden">
                                <div class="block-header panel">
                                    <h2 class="h5 lg:h4 fw-medium m-0 text-inherit hstack">
                                        <a class="text-none dark:text-white hover:text-primary duration-150"
                                            href="#">Gaya Hiduo</a>
                                        <i class="icon-2 lg:icon-3 unicon-chevron-right opacity-40"></i>
                                    </h2>
                                </div>
                                <div class="block-content">
                                    <div class="row child-cols-6 g-2 gy-3 md:gx-3 md:gy-4">
                                        @forelse ($k_gayahidup as $gayahidup)
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1 lg:gap-2">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('public/thumbnail/' . $gayahidup->thumbnail) }}"
                                                                alt="{{ $gayahidup->judul_artikel }}"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{ route('detail-artikel', ['params' => $gayahidup->uuid]) }}"
                                                            class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-1">
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div>
                                                                <div class="post-category hstack gap-narrow fw-semibold">
                                                                    <a class="fw-medium text-none text-primary dark:text-primary-400"
                                                                        href="{{ route('detail-kategori', ['params' => $gayahidup->kategori]) }}">{{ $gayahidup->kategori }}</a>
                                                                </div>
                                                            </div>
                                                            <div class="sep d-none md:d-block">|</div>
                                                            <div class="d-none md:d-block">
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>{{ Carbon::parse($gayahidup->tanggal_pulbukasi)->diffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h3 class="post-title h6 lg:h5 m-0 text-truncate-2 mb-1">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="{{ route('detail-artikel', ['params' => $gayahidup->uuid]) }}">{{ $gayahidup->judul_artikel }}</a>
                                                        </h3>
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
                        <div>
                            <div class="block-layout grid-layout vstack gap-3 lg:gap-4 panel overflow-hidden">
                                <div class="block-header panel">
                                    <h2 class="h5 lg:h4 fw-medium m-0 text-inherit hstack">
                                        <a class="text-none dark:text-white hover:text-primary duration-150"
                                            href="#">Hiburan</a>
                                        <i class="icon-2 lg:icon-3 unicon-chevron-right opacity-40"></i>
                                    </h2>
                                </div>
                                <div class="block-content">
                                    <div class="row child-cols-6 g-2 gy-3 md:gx-3 md:gy-4">
                                        @forelse ($k_hiburan as $hiburan)
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1 lg:gap-2">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('public/thumbnail/' . $hiburan->thumbnail) }}"
                                                                alt="{{ $hiburan->judul_artikel }}"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{ route('detail-artikel', ['params' => $hiburan->uuid]) }}"
                                                            class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-1">
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div>
                                                                <div class="post-category hstack gap-narrow fw-semibold">
                                                                    <a class="fw-medium text-none text-primary dark:text-primary-400"
                                                                        href="{{ route('detail-kategori', ['params' => $hiburan->kategori]) }}">{{ $hiburan->kategori }}</a>
                                                                </div>
                                                            </div>
                                                            <div class="sep d-none md:d-block">|</div>
                                                            <div class="d-none md:d-block">
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>{{ Carbon::parse($hiburan->tanggal_pulbukasi)->diffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h3 class="post-title h6 lg:h5 m-0 text-truncate-2 mb-1">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="{{ route('detail-artikel', ['params' => $hiburan->uuid]) }}">{{ $hiburan->judul_artikel }}</a>
                                                        </h3>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section end -->

    <!-- Section start -->
    <div class="section panel overflow-hidden swiper-parent uc-dark">
        <div class="section-outer panel py-5 lg:py-8 bg-gray-25 dark:bg-gray-800 dark:text-white">
            <div class="container max-w-xl">
                <div class="section-inner panel vstack gap-4">
                    <div class="section-header panel">
                        <h2 class="h5 lg:h4 fw-medium m-0 text-inherit hstack" style="justify-content: space-between">
                            <a class="text-none dark:text-white hover:text-primary duration-150"
                                href="#">{{ $namachannel }}</a>
                            <div class="fs-5">
                                <script src="https://apis.google.com/js/platform.js"></script>
                                <div class="g-ytsubscribe" data-channelid="UC2o13QIB9_NODrWigTgvQrw"
                                    data-layout="default" data-count="default"></div>
                            </div>
                        </h2>
                    </div>
                    <div class="section-content">
                        <div class="swiper"
                            data-uc-swiper="items: 2; gap: 16; autoplay: 2500; dots: .dot-nav; next: .nav-next; prev: .nav-prev; disable-class: opacity-40;"
                            data-uc-swiper-s="items: 3;" data-uc-swiper-m="gap: 24;"
                            data-uc-swiper-l="items: 3; gap: 32;">
                            <div class="swiper-wrapper">
                                @foreach ($idpideo as $c)
                                    <div class="swiper-slide">
                                        <div>
                                            <article class="post type-post panel vstack gap-1 lg:gap-2">
                                                <div class="post-media panel overflow-hidden">
                                                    <div class="featured-video bg-gray-700 ratio ratio-16x9">
                                                        @if (!empty($c['id']))
                                                            <iframe width="560" height="315"
                                                                class="card-rounded mw-100"
                                                                src="https://www.youtube.com/embed/{{ $c['id'] }}"
                                                                title="YouTube video player" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen loading="lazy"></iframe>
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="has-video-overlay position-absolute top-0 end-0 w-150px h-150px bg-gradient-45 from-transparent via-transparent to-black opacity-50">
                                                    </div>
                                                    <span
                                                        class="cstack has-video-icon position-absolute top-0 end-0 fs-6 w-40px h-40px text-white">
                                                        <i class="icon-narrow unicon-play-filled-alt"></i>
                                                    </span>
                                                </div>
                                                <div class="post-header panel vstack gap-1">
                                                    <div
                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                        <div>
                                                            <div class="post-category hstack gap-narrow fw-semibold">
                                                                <a class="fw-medium text-none text-primary dark:text-primary-400"
                                                                    href="#">{{ $c['channelTitle'] }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="sep d-none md:d-block">|</div>
                                                        <div class="d-none md:d-block">
                                                            <div class="post-date hstack gap-narrow">
                                                                <span>{{ Carbon::parse($c['publish'])->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3 class="post-title h6 lg:h5 m-0 text-truncate-2 mb-1">
                                                        <a class="text-none hover:text-primary duration-150"
                                                            href="#">{{ $c['title'] }}</a>
                                                    </h3>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="hstack gap-1 mt-4">
                                <div
                                    class="swiper-nav nav-prev btn btn-alt-primary bg-transparent dark:text-white rounded-0 p-0 border w-32px lg:w-40px h-32px lg:h-40px shadow-sm">
                                    <i class="icon-1 unicon-chevron-left"></i>
                                </div>
                                <div
                                    class="swiper-nav nav-next btn btn-alt-primary bg-transparent dark:text-white rounded-0 p-0 border w-32px lg:w-40px h-32px lg:h-40px shadow-sm">
                                    <i class="icon-1 unicon-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section end -->

    <!-- Section start -->
    <div class="section panel overflow-hidden">
        <div class="section-outer panel py-5 lg:py-8">
            <div class="container max-w-xl">
                <div class="section-inner">
                    <div class="block-layout grid-layout vstack gap-3 lg:gap-4 panel overflow-hidden">
                        <div class="block-header panel">
                            <h2 class="h5 lg:h4 fw-medium m-0 text-inherit hstack">
                                <a class="text-none dark:text-white hover:text-primary duration-150"
                                    href="#">Ekonomi & Bisnis</a>
                                <i class="icon-2 lg:icon-3 unicon-chevron-right opacity-40"></i>
                            </h2>
                        </div>
                        <div class="block-content">
                            <div class="panel row child-cols-12 md:child-cols gy-4 md:gx-3 xl:gx-4">
                                <div class="col-12 md:col-6 lg:col-7">
                                    @if ($k_ekonomi[0])
                                        <div class="h-100">
                                            <article
                                                class="post type-post panel uc-transition-toggle vstack gap-2 lg:gap-3 h-100 overflow-hidden uc-dark">
                                                <div class="post-media panel overflow-hidden h-100">
                                                    <div
                                                        class="featured-image bg-gray-25 dark:bg-gray-800 h-100 d-none md:d-block">
                                                        <canvas class="h-100 w-100"></canvas>
                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                            src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                            data-src="{{ asset('public/thumbnail/' . $k_ekonomi[0]->thumbnail) }}"
                                                            alt="{{ $k_ekonomi[0]->judul_artikel }}"
                                                            data-uc-img="loading: lazy">
                                                    </div>
                                                    <div
                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1 d-block md:d-none">
                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                            src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                            data-src="{{ asset('public/thumbnail/' . $k_ekonomi[0]->thumbnail) }}"
                                                            alt="{{ $k_ekonomi[0]->judul_artikel }}"
                                                            data-uc-img="loading: lazy">
                                                    </div>
                                                </div>
                                                <div
                                                    class="position-cover bg-gradient-to-t from-black to-transparent opacity-90">
                                                </div>
                                                <div
                                                    class="post-header panel vstack justify-end items-start gap-1 sm:gap-2 p-2 sm:p-4 position-cover text-white">
                                                    <div
                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                        <div>
                                                            <div class="post-category hstack gap-narrow fw-semibold">
                                                                <a class="fw-medium text-none text-primary dark:text-primary-400"
                                                                    href="{{ route('detail-kategori', ['params' => $k_ekonomi[0]->kategori]) }}">{{ $k_ekonomi[0]->kategori }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="sep d-none md:d-block">|</div>
                                                        <div class="d-none md:d-block">
                                                            <div class="post-date hstack gap-narrow">
                                                                <span>{{ Carbon::parse($k_ekonomi[0]->tanggal_pulbukasi)->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3
                                                        class="post-title h5 lg:h4 m-0 max-w-600px text-white text-truncate-2">
                                                        <a class="text-none text-white"
                                                            href="{{ route('detail-artikel', ['params' => $k_ekonomi[0]->uuid]) }}">{{ $k_ekonomi[0]->judul_artikel }}</a>
                                                    </h3>
                                                    <div>
                                                        <div
                                                            class="post-meta panel hstack justify-between fs-7 fw-medium text-white text-opacity-60">
                                                            <div class="meta">
                                                                <div class="hstack gap-2">
                                                                    <div>
                                                                        <div class="post-author hstack gap-1">
                                                                            <a href="page-author.html"
                                                                                data-uc-tooltip="{{ $k_ekonomi[0]->author }}"><img
                                                                                    src="{{ asset('assets-landing/images/avatars/14.png') }}"
                                                                                    alt="{{ $k_ekonomi[0]->author }}"
                                                                                    class="w-24px h-24px rounded-circle"></a>
                                                                            <a href="page-author.html"
                                                                                class="text-black dark:text-white text-none fw-bold">{{ $k_ekonomi[0]->author }}</a>
                                                                        </div>
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
                                    @else
                                        <div class="card text-center shadow-sm mx-auto" style="width: max-content">
                                            <div class="card-body">
                                                <i class="bi bi-box-seam display-6 text-muted"></i>
                                                <h5 class="card-title mt-3 text-muted">Tidak ada data</h5>
                                                <p class="text-muted">Silakan tambahkan data terlebih dahulu.
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <div class="row child-cols-12 g-4 sep-x">
                                        @forelse ($k_ekonomi->skip(1) as $ekonimi)
                                            <div>
                                                <article class="post type-post panel uc-transition-toggle">
                                                    <div class="row child-cols g-2" data-uc-grid>
                                                        <div class="col-auto">
                                                            <div
                                                                class="post-media panel overflow-hidden max-w-150px min-w-100px lg:min-w-150px">
                                                                <div
                                                                    class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                        src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                                        data-src="{{ asset('public/thumbnail/' . $ekonimi->thumbnail) }}"
                                                                        alt="{{ $ekonimi->judul_artikel }}"
                                                                        data-uc-img="loading: lazy">
                                                                </div>
                                                                <a href="{{ route('detail-artikel', ['params' => $ekonimi->uuid]) }}"
                                                                    class="position-cover"></a>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="post-header panel vstack justify-between gap-1">
                                                                <div
                                                                    class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                                    <div>
                                                                        <div
                                                                            class="post-category hstack gap-narrow fw-semibold">
                                                                            <a class="fw-medium text-none text-primary dark:text-primary-400"
                                                                                href="{{ route('detail-kategori', ['params' => $ekonimi->kategori]) }}">{{ $ekonimi->kategori }}</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sep d-none md:d-block">|</div>
                                                                    <div class="d-none md:d-block">
                                                                        <div class="post-date hstack gap-narrow">
                                                                            <span>{{ Carbon::parse($ekonimi->tanggal_pulbukasi)->diffForHumans() }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h3 class="post-title h6 lg:h5 m-0 text-truncate-2">
                                                                    <a class="text-none hover:text-primary duration-150"
                                                                        href="{{ route('detail-artikel', ['params' => $ekonimi->uuid]) }}">{{ $ekonimi->judul_artikel }}</a>
                                                                </h3>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section end -->

    <!-- Section start -->
    <div class="section panel overflow-hidden">
        <div class="section-outer panel">
            <div class="container max-w-xl">
                <div class="section-inner">
                    @if ($iklan[1])
                        <a class="text-none d-flex" style="justify-content: center;" href="{{ $iklan[1]->link }}"
                            target="_blank" rel="nofollow">
                            <img class="d-none md:d-block" src="{{ asset('public/iklan/' . $iklan[1]->thumbnail) }}"
                                alt="{{ $iklan[1]->judul_iklan }}">
                            <img class="d-block md:d-none" src="{{ asset('public/iklan/' . $iklan[1]->thumbnail) }}"
                                alt="{{ $iklan[1]->judul_iklan }}">
                        </a>
                    @else
                        <div class="card text-center shadow-sm mx-auto" style="width: max-content">
                            <div class="card-body">
                                <i class="bi bi-box-seam display-6 text-muted"></i>
                                <h5 class="card-title mt-3 text-muted">Tidak ada data</h5>
                                <p class="text-muted">Silakan tambahkan data terlebih dahulu.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Section start -->

    <!-- Section start -->
    <div id="latest-news" class="latest-news section panel overflow-hidden">
        <div class="section-outer panel py-5 lg:py-8">
            <div class="container max-w-xl">
                <div class="section-inner panel vstack gap-4">
                    <div class="section-header panel vstack items-center justify-center text-center gap-1">
                        <h2 class="h5 lg:h4 fw-medium m-0 text-inherit hstack">
                            <span>Latest news</span>
                        </h2>
                    </div>
                    <div class="section-content">
                        <div
                            class="row child-cols-12 sm:child-cols-6 md:child-cols-4 lg:child-cols-3 g-2 gy-4 md:g-3 md:gy-5 xl:g-4 xl:gy-6">
                            @forelse ($latest_news as $item_news)
                                <div>
                                    <article class="post type-post panel uc-transition-toggle vstack gap-1 lg:gap-2">
                                        <div class="post-media panel overflow-hidden">
                                            <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                    src="{{ asset('assets-landing/images/common/img-fallback.png') }}"
                                                    data-src="{{ asset('public/thumbnail/' . $item_news->thumbnail) }}"
                                                    alt="{{ $item_news->judul_artikel }}" data-uc-img="loading: lazy">
                                            </div>
                                            <a href="{{ route('detail-artikel', ['params' => $item_news->uuid]) }}"
                                                class="position-cover"></a>
                                        </div>
                                        <div class="post-header panel vstack gap-1">
                                            <div
                                                class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                <div>
                                                    <div class="post-category hstack gap-narrow fw-semibold">
                                                        <a class="fw-medium text-none text-primary dark:text-primary-400"
                                                            href="{{ route('detail-kategori', ['params' => $item_news->kategori]) }}">{{ $item_news->kategori }}</a>
                                                    </div>
                                                </div>
                                                <div class="sep d-none md:d-block">|</div>
                                                <div class="d-none md:d-block">
                                                    <div class="post-date hstack gap-narrow">
                                                        <span>{{ Carbon::parse($item_news->tanggal_pulbukasi)->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="post-title h6 lg:h5 m-0 text-truncate-2 mb-1">
                                                <a class="text-none hover:text-primary duration-150"
                                                    href="{{ route('detail-artikel', ['params' => $item_news->uuid]) }}">{{ $item_news->judul_artikel }}</a>
                                            </h3>
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
        </div>
    </div>

    <!-- Section end -->
@endsection
@section('script')
    <script>
        $(function() {
            viewHome();
        });

        function viewHome() {
            const token = @json(csrf_token());
            const endpoint = @json(route('view-home'));

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
