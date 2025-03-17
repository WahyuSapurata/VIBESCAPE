@php
    $path = explode('/', Request::path());
    $role = auth()->user()->role;

    $dashboardRoutes = [
        'admin' => 'admin.dashboard-admin',
        'user' => 'user.dashboard-user',
    ];

    $isActive = in_array($role, array_keys($dashboardRoutes)) && isset($path[1]) && $path[1] === 'dashboard-' . $role;
    $activeColor = $isActive ? 'color: #F4BE2A' : 'color: #FFFFFF';
@endphp

<div class="aside-menu bg-primary flex-column-fluid" style="background: linear-gradient(to bottom, #193030, #4b5a55be);">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y mb-5 mb-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
        data-kt-scroll-offset="0">
        <script>
            // Ambil elemen menu menggunakan JavaScript
            var menu = document.getElementById('kt_aside_menu_wrapper');

            // Set tinggi maksimum dan penanganan overflow menggunakan JavaScript
            if (menu) {
                menu.style.maxHeight = '88vh'; // Set tinggi maksimum
            }
        </script>
        <!--begin::Menu-->
        <div class="menu menu-column mt-2 menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="kt_aside_menu" data-kt-menu="true" style="gap: 3px;">

            <div class="menu-item">
                <a class="menu-link {{ $isActive ? 'active' : ($module = 'Persetujun PO') }}"
                    href="{{ route($dashboardRoutes[$role]) }}">
                    <span class="menu-icon">
                        <span class="svg-icon svg-icon-2">
                            <img src="{{ $isActive ? url('assets/media/icons/aside/dashboardact.svg') : url('assets/media/icons/aside/dashboarddef.svg') }}"
                                alt="">
                        </span>
                    </span>
                    <span class="menu-title" style="{{ $activeColor }}">Dashboard</span>
                </a>
            </div>

            @if ($role === 'admin')
                {{-- <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'header' ? 'active' : '' }}"
                        href="{{ route('admin.header') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <img src="{{ isset($path[1]) && $path[1] === 'header' ? url('assets/media/icons/aside/kategoriact.svg') : url('assets/media/icons/aside/kategoridef.svg') }}"
                                    alt="">
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'header' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Manajemen
                            Header</span>
                    </a>
                </div>
                <!--end::Menu item--> --}}

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'iklan' ? 'active' : '' }}"
                        href="{{ route('admin.iklan') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <img src="{{ isset($path[1]) && $path[1] === 'iklan' ? url('assets/media/icons/aside/pajakact.svg') : url('assets/media/icons/aside/pajakdef.svg') }}"
                                    alt="">
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'iklan' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Manajemen
                            Iklan</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'data-user' ? 'active' : '' }}"
                        href="{{ route('admin.data-user') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <img src="{{ isset($path[1]) && $path[1] === 'data-user' ? url('assets/media/icons/aside/adminact.svg') : url('assets/media/icons/aside/admindef.svg') }}"
                                    alt="">
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'data-user' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Manajemen
                            User</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'artikel' ? 'active' : '' }}"
                        href="{{ route('admin.artikel') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <img src="{{ isset($path[1]) && $path[1] === 'artikel' ? url('assets/media/icons/aside/masterdataact.svg') : url('assets/media/icons/aside/masterdatadef.svg') }}"
                                    alt="">
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'artikel' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Manajement
                            Artikel</span>
                    </a>
                </div>
                <!--end::Menu item-->
            @endif

            @if ($role === 'user')
                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'artikel' ? 'active' : '' }}"
                        href="{{ route('user.artikel') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <img src="{{ isset($path[1]) && $path[1] === 'artikel' ? url('assets/media/icons/aside/masterdataact.svg') : url('assets/media/icons/aside/masterdatadef.svg') }}"
                                    alt="">
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'artikel' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Manajement
                            Artikel</span>
                    </a>
                </div>
                <!--end::Menu item-->
            @endif

        </div>
        <!--end::Menu-->
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function() {
            // $(".menu-link").hover(function(){
            //     $(this).css("background", "#282EAD");
            // }, function(){
            //     $(this).css("background", "none");
            // });
        });
    </script>
@endsection
