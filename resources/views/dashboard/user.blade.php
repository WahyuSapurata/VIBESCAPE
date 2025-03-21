@extends('layouts.layout')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row">
                <!--Begin Admin-->
                <div class="col-xl-12">
                    <!--begin::Engage Widget 11-->
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body d-flex p-0">
                            <div class="flex-grow-1 p-7 pt-15 card-rounded flex-grow-1 bgi-no-repeat"
                                style="background-position: calc(100% + 0.5rem) bottom;
                                    background-size: 25% auto;
                                    background-image: url(https://taurungka.makassarkota.go.id/admin/assets/media/svg/illustrations/Group-131.png)">
                                <h2 class="text-dark font-weight-bolder">
                                    Selamat Datang !
                                </h2>
                                <h3 class="text-dark pb-5 font-weight-bolder">

                                </h3>
                                <p class="text-dark-50 pb-5 font-size-h5">
                                    Ini adalah halaman dashboard admin website.
                                    <br />Segala sesuatu konten yang ada akan
                                    <br />diinput lewat dashboard admin anda.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--end::Engage Widget 11-->
                </div>
            </div>
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-2 rounded-circle"
                                style="display: flex; align-items: center; position: absolute; top: 0; right: 0;">
                                <svg id="user" xmlns="http://www.w3.org/2000/svg" height="3em" width="59px"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        #user {
                                            fill: #f4be2a
                                        }
                                    </style>
                                    <path
                                        d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" />
                                </svg>
                            </div>
                            <div class="fs-5 fw-bolder text-center text-capitalize">USER</div>
                            <div class="text-center fw-bold fs-1">{{ $t_user }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-2 rounded-circle"
                                style="display: flex; align-items: center; position: absolute; top: 0; right: 0;">
                                <svg id="artikel" xmlns="http://www.w3.org/2000/svg" height="3em" width="59px"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        #artikel {
                                            fill: #1188f8
                                        }
                                    </style>
                                    <path
                                        d="M128 0c13.3 0 24 10.7 24 24V64H296V24c0-13.3 10.7-24 24-24s24 10.7 24 24V64h40c35.3 0 64 28.7 64 64v16 48V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192 144 128C0 92.7 28.7 64 64 64h40V24c0-13.3 10.7-24 24-24zM400 192H48V448c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V192zM329 297L217 409c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47 95-95c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                            </div>
                            <div class="fs-5 fw-bolder text-center text-capitalize">ARTIKEL</div>
                            <div class="text-center fw-bold fs-1">{{ $t_artikel }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-2 rounded-circle"
                                style="display: flex; align-items: center; position: absolute; top: 0; right: 0;">
                                <svg id="komentar" xmlns="http://www.w3.org/2000/svg" height="3em"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        #komentar {
                                            fill: #06e7f7
                                        }
                                    </style>
                                    <path
                                        d="M144 208c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zM256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z" />
                                </svg>
                            </div>
                            <div class="fs-5 fw-bolder text-center text-capitalize">KOMENTAR</div>
                            <div class="text-center fw-bold fs-1">{{ $t_komentar }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!--begin::Title-->
                        <div class="d-flex gap-5 p-3">
                            <select name="filter_month" class="form-select" data-control="select2" id="filter_month_select"
                                data-placeholder="Silahkan pilih bulan">
                            </select>

                            <select name="filter_year" class="form-select" data-control="select2" id="filter_year_select"
                                data-placeholder="Silahkan pilih tahun">
                            </select>
                        </div>
                        <!--end::Title-->
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Total Pengunjung</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart" height="100vh"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('script')
    <script>
        let control = new Control();

        const generateSchoolYears = (startYear) => {
            const currentYear = new Date().getFullYear();
            const years = [];

            for (let year = startYear; year <= currentYear; year++) {
                years.push({
                    id: year,
                    text: year
                });
            }

            years.reverse(); // Balik urutan agar tahun terbaru di atas
            return years;
        };

        const generateMonths = () => {
            return [{
                    id: 1,
                    text: 'Januari'
                }, {
                    id: 2,
                    text: 'Februari'
                },
                {
                    id: 3,
                    text: 'Maret'
                }, {
                    id: 4,
                    text: 'April'
                },
                {
                    id: 5,
                    text: 'Mei'
                }, {
                    id: 6,
                    text: 'Juni'
                },
                {
                    id: 7,
                    text: 'Juli'
                }, {
                    id: 8,
                    text: 'Agustus'
                },
                {
                    id: 9,
                    text: 'September'
                }, {
                    id: 10,
                    text: 'Oktober'
                },
                {
                    id: 11,
                    text: 'November'
                }, {
                    id: 12,
                    text: 'Desember'
                }
            ];
        };

        const dataYears = generateSchoolYears(2000);
        const dataMonths = generateMonths();

        var ctx = document.getElementById('myAreaChart').getContext('2d');

        // Inisialisasi Select2 dengan data
        $('#filter_year_select').select2({
            data: dataYears
        }).val(new Date().getFullYear()).trigger('change'); // Pilih tahun sekarang secara default

        $('#filter_month_select').select2({
            data: dataMonths
        }).val(new Date().getMonth() + 1).trigger('change'); // Pilih bulan sekarang secara default


        let myChart;

        // Fungsi untuk mengambil data berdasarkan filter
        const fetchData = async (year, month) => {
            try {
                const res = await $.ajax({
                    url: '/user/chart',
                    method: 'GET',
                    data: {
                        year,
                        month
                    }
                });

                if (res.success === true) {
                    let labels = res.message.daily.labels;
                    let data = res.message.daily.data;

                    if (myChart) {
                        myChart.destroy(); // Hapus chart lama jika ada
                    }

                    myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Total Views',
                                data: data,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                } else {
                    console.error('Gagal mengambil data:', res.message);
                }
            } catch (error) {
                console.error('Gagal melakukan permintaan AJAX:', error);
            }
        };

        // Event listener saat select berubah
        $('#filter_year_select, #filter_month_select').on('change', function() {
            const year = $('#filter_year_select').val();
            const month = $('#filter_month_select').val();
            fetchData(year, month);
        });

        // Ambil data pertama kali tanpa filter
        fetchData();
    </script>
@endsection
