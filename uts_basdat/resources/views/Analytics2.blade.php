<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bola Talent Hub</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/css/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.css">
    <link rel="stylesheet" href="assets/css/Filter.css">
    <link rel="stylesheet" href="assets/css/Growing-Search-Bar-Animated-Text-Input.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/News-Cards-4-Columns-v2.css">
    <link rel="stylesheet" href="assets/css/News-Cards.css">
    <link rel="stylesheet" href="assets/css/Newsletter-v2.css">
    <link rel="stylesheet" href="assets/css/NZDropdown---Status.css">
    <link rel="stylesheet" href="assets/css/Responsive-News-Card-Slider-styles.min.css">
    <link rel="stylesheet" href="assets/css/Responsive-News-Card-Slider.css">
    <link rel="stylesheet" href="assets/css/Single-Advisor-Profile.css">
    <link rel="stylesheet" href="assets/css/x-dropdown.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        #chart-container {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }
    </style>
</head>

<body style="margin-top: 0px;">
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav" style="background: rgb(255,255,255);">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon" style="background: rgb(55, 99, 244);"><i class="fa fa-soccer-ball-o" style="font-size: 14px;"></i></span><span>Bola Talent Hub</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Statistics">Statistics</a></li>
                    <li class="nav-item"><a class="nav-link active" href="Analytics">Analytics</a></li>
                    <li class="nav-item"><a class="nav-link" href="News1">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container px-4 mx-auto">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation"><a class="nav-link active" href="#tab-1" role="tab" data-bs-toggle="tab">Pemain</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="#tab-2" role="tab" data-bs-toggle="tab">Tim</a></li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active" role="tabpanel">
                <div class="p-6 m-20 bg-white  shadow">
                    <form action="{{ route('chart_update') }}" method="GET" id="orderByForm">
                        @csrf
                        <label for="orderBy">Urutkan berdasarkan:</label>
                        <select name="order_by" id="order_by">
                            <option value="jumlah__Gol" @if(request('order_by') == 'jumlah__Gol') selected @endif>
                                Jumlah Gol
                            </option>
                            <option value="jumlah__Assist" @if(request('order_by') == 'jumlah__Assist') selected @endif>
                                Jumlah Assist
                            </option>
                            <option value="jumlah_Kartu_Kuning" @if(request('order_by') == 'jumlah_Kartu_Kuning') selected @endif>
                                Jumlah Kartu Kuning
                            </option>
                            <option value="jumlah_Kartu_Merah" @if(request('order_by') == 'jumlah_Kartu_Merah') selected @endif>
                                Jumlah Kartu Merah
                            </option>
                            <option value="jumlah_Tekel" @if(request('order_by') == 'jumlah_Tekel') selected @endif>
                                Jumlah Tekel
                            </option>
                            <option value="jumlah_Penyelamatan" @if(request('order_by') == 'jumlah_Penyelamatan') selected @endif>
                                Jumlah Penyelamatan
                            </option>
                            <option value="jumlah_Clean_Sheet" @if(request('order_by') == 'jumlah_Clean_Sheet') selected @endif>
                                Jumlah Clean Sheet
                            </option>
                            <option value="jumlah_Pertandingan" @if(request('order_by') == 'jumlah_Pertandingan') selected @endif>
                                Jumlah Pertandingan
                            </option>
                            <!-- Tambahkan opsi lain sesuai kebutuhan -->
                        </select>
                        <!-- <button type="submit">Tampilkan</button> -->
                    </form>
                    {!! $chart->container() !!}
                    <form action="{{ route('chart_update') }}" method="GET" id="groupByForm">
                        @csrf
                        <label for="group_by">Distribusi berdasarkan:</label>
                        <select name="group_by" id="group_by">
                            <option value="Gaji" @if(request('group_by') == 'Gaji') selected @endif>
                                Gaji
                            </option>
                            <option value="Harga" @if(request('group_by') == 'Harga') selected @endif>
                                Harga
                            </option>
                            <!-- Tambahkan opsi lain sesuai kebutuhan -->
                        </select>
                        <!-- <button type="submit">Tampilkan</button> -->
                    </form>
                    {!! $chartpie->container() !!}
                    <form action="{{ route('chart_update') }}" method="GET" id="TahunForm" >
                        @csrf
                        <label for="Tahun">Distribusi berdasarkan:</label>
                        <select name="Tahun" id="Tahun">
                            <option value="Usia" @if(request('Tahun') == 'Usia') selected @endif>
                                Usia
                            </option>
                            <option value="contract" @if(request('Tahun') == 'contract') selected @endif>
                                Kontrak
                            </option>
                            <!-- Tambahkan opsi lain sesuai kebutuhan -->
                        </select>
                        <!-- <button type="submit">Tampilkan</button> -->
                    </form>
                    {!! $chartpie2->container() !!}
                    <div id="chart-container"></div>

                </div>
            </div>
            <div id="tab-2" class="tab-pane" role="tabpanel">
                <div class="p-6 m-20 bg-white  shadow">
                    {!! $MKS->container() !!}
                    {!! $Asal->container() !!}

                </div>
            </div>
        </div>


    </div>
    <footer class="bg-primary-gradient">
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last item social">
                    <div class="fw-bold d-flex align-items-center mb-2"><span class="bs-icon-sm bs-icon-circle bs-icon-primary d-flex justify-content-center align-items-center bs-icon me-2"><i class="fa fa-soccer-ball-o" style="font-size: 14px;"></i></span><span>Bola Talent Hub</span></div>
                    <p class="text-muted copyright">Bingung cari pemain ya?<br>Kami Solusinya</p>
                </div>
            </div>
            <hr>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">Copyright © 2023 Brand</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                        </svg></li>
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                        </svg></li>
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                        </svg></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
    <script src="assets/js/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Responsive-News-Card-Slider.js"></script>
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
    <script src="{{ $chartpie->cdn() }}"></script>
    {{$chartpie->script()}}
    <script src="{{ $chartpie2->cdn() }}"></script>
    {{$chartpie2->script()}}
    <script src="{{ $MKS->cdn() }}"></script>
    {{$MKS->script()}}
    <script src="{{ $Asal->cdn() }}"></script>
    {{$Asal->script()}}
    <script src="{{ $Heatmap->cdn() }}"></script>
    {{$Heatmap->script()}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateURL() {
                var currentURL = window.location.href.split('?')[0]; // Mendapatkan URL saat ini tanpa parameter

                var order_by = $('#order_by').val(); // Mendapatkan nilai dari dropdown order_by
                var group_by = $('#group_by').val(); // Mendapatkan nilai dari dropdown group_by
                var tahun = $('#Tahun').val(); // Mendapatkan nilai dari dropdown Tahun

                var newURL = currentURL + '?_token=LPzK4k67Ttbz22GFbfAU5s1ll2YEDLREFIWT7Agz';

                // Menambahkan nilai order_by ke URL jika tidak kosong
                if (order_by !== '') {
                    newURL += '&order_by=' + order_by;
                }

                // Menambahkan nilai group_by ke URL jika tidak kosong
                if (group_by !== '') {
                    newURL += '&group_by=' + group_by;
                }

                // Menambahkan nilai Tahun ke URL jika tidak kosong
                if (tahun !== '') {
                    newURL += '&Tahun=' + tahun;
                }

                window.location.href = newURL; // Mengarahkan ke URL baru
            }

            // Ketika dropdown order_by diubah
            $('#order_by').change(function() {
                updateURL(); // Memanggil fungsi untuk memperbarui URL
            });

            // Ketika dropdown group_by diubah
            $('#group_by').change(function() {
                updateURL(); // Memanggil fungsi untuk memperbarui URL
            });

            // Ketika dropdown Tahun diubah
            $('#Tahun').change(function() {
                updateURL(); // Memanggil fungsi untuk memperbarui URL
            });
        });
    </script>
    <script src="https://fastly.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
    <script>
        var dom = document.getElementById('chart-container');
        var myChart = echarts.init(dom, null, {
            renderer: 'canvas',
            useDirtyRect: false
        });
        var app = {};

        var option;

        // Mengambil data dari Laravel Controller dan Model
        var dataPemain = <?php echo json_encode(App\Models\FactPemainSepakBola::all()->toArray()); ?>;

        // Memformat data untuk digunakan dalam ECharts dengan menambahkan Nama_Pemain ke setiap titik data
        var formattedData = dataPemain.map(item => ({
            name: item.Nama_Pemain,
            value: [item.Usia, item.Harga],
            Usia: item.Usia, // Menambahkan data Usia untuk ditampilkan di tooltip
            Harga: item.Harga // Menambahkan data Harga untuk ditampilkan di tooltip
        }));

        // Mendapatkan nilai terkecil dari data untuk menentukan rentang sumbu x dan y
        var minValueX = Math.min(...dataPemain.map(item => item.Usia));
        var minValueY = Math.min(...dataPemain.map(item => item.Harga));

        // Menambahkan sedikit offset pada nilai minimum sumbu x dan y
        var xOffset = (Math.abs(minValueX) * 0.05); // Misalnya, menambah 5% dari nilai minimum sebagai offset
        var yOffset = (Math.abs(minValueY) * 0.05); // Misalnya, menambah 5% dari nilai minimum sebagai offset

        option = {
            xAxis: {
                min: minValueX - xOffset, // Menetapkan rentang minimum untuk sumbu x dengan offset
                name: 'Usia' // Menambahkan label pada sumbu x untuk Usia
            },
            yAxis: {
                min: minValueY - yOffset, // Menetapkan rentang minimum untuk sumbu y dengan offset
                name: 'Harga' // Menambahkan label pada sumbu y untuk Harga
            },
            series: [
                {
                    symbolSize: 10, // Mengurangi ukuran titik pada scatter plot
                    data: formattedData.map(item => ({
                        name: item.name,
                        value: item.value,
                        Usia: item.Usia, // Menambahkan data Usia untuk ditampilkan di tooltip
                        Harga: item.Harga // Menambahkan data Harga untuk ditampilkan di tooltip
                    })),
                    type: 'scatter',
                    label: {
                        show: false // Nonaktifkan label
                    },
                    emphasis: {
                        focus: 'series', // Memberi fokus pada series saat titik diklik
                        label: {
                            show: true,
                            color: 'black', // Mengubah warna teks menjadi hitam
                            textStyle: {
                                color: 'black' // Mengubah warna teks menjadi hitam
                            },
                            formatter: function (params) {
                                return (
                                    params.data.name + '\n' +
                                    'Usia: ' + params.data.Usia + '\n' +
                                    'Harga: Rp ' + params.data.Harga.toLocaleString('id-ID')
                                );
                            }
                        }
                    }
                }
            ]
        };

        if (option && typeof option === 'object') {
            myChart.setOption(option);
        }

        window.addEventListener('resize', myChart.resize);
    </script>



<!-- <script>
    var dom = document.getElementById('chart-container');
    var myChart = echarts.init(dom, null, {
        renderer: 'canvas',
        useDirtyRect: false
    });
    var app = {};

    var option;

    // Mengambil data dari Laravel Controller dan Model
    var dataPemain = <?php echo json_encode(App\Models\FactPemainSepakBola::select('Usia', 'Harga', 'Nama_Pemain')->get()); ?>;

    // Memformat data untuk digunakan dalam ECharts dengan menambahkan Nama_Pemain ke setiap titik data
    var formattedData = dataPemain.map(item => ({
        name: item.Nama_Pemain,
        value: [item.Usia, item.Harga],
        Usia: item.Usia, // Menambahkan data Usia untuk ditampilkan di tooltip
        Harga: item.Harga // Menambahkan data Harga untuk ditampilkan di tooltip
    }));

    // Mendapatkan nilai terkecil dari data untuk menentukan rentang sumbu x dan y
    var minValueX = Math.min(...dataPemain.map(item => item.Usia));
    var minValueY = Math.min(...dataPemain.map(item => item.Harga));

    // Menambahkan sedikit offset pada nilai minimum sumbu x dan y
    var xOffset = (Math.abs(minValueX) * 0.05); // Misalnya, menambah 5% dari nilai minimum sebagai offset
    var yOffset = (Math.abs(minValueY) * 0.05); // Misalnya, menambah 5% dari nilai minimum sebagai offset

    option = {
        xAxis: {
            min: minValueX - xOffset, // Menetapkan rentang minimum untuk sumbu x dengan offset
            name: 'Usia' // Menambahkan label pada sumbu x untuk Usia
        },
        yAxis: {
            min: minValueY - yOffset, // Menetapkan rentang minimum untuk sumbu y dengan offset
            name: 'Harga' // Menambahkan label pada sumbu y untuk Harga
        },
        series: [
            {
                symbolSize: 10, // Mengurangi ukuran titik pada scatter plot
                data: formattedData,
                type: 'scatter',
                label: {
                    show: false // Nonaktifkan label
                },
                emphasis: {
                    focus: 'series', // Memberi fokus pada series saat titik diklik
                    label: {
                        show: true,
                        color: 'black', // Mengubah warna teks menjadi hitam
                        textStyle: {
                            color: 'black' // Mengubah warna teks menjadi hitam
                        },
                        formatter: function (params) {
                            return params.data.name; // Menampilkan Nama_Pemain saat titik diklik
                        }
                    }
                },
                tooltip: {
                    formatter: function (params) {
                        return (
                            'Nama: ' + params.data.name + '<br/>' +
                            'Usia: ' + params.data.Usia + '<br/>' +
                            'Harga: ' + params.data.Harga
                        );
                    }
                }
            }
        ]
    };

    if (option && typeof option === 'object') {
        myChart.setOption(option);
    }

    window.addEventListener('resize', myChart.resize);
</script> -->



</body>

</html>