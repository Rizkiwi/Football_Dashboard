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
        .news-card {
            transition: transform 0.3s, cursor 0.3s;
        }

        .news-card:hover {
            transform: scale(1.02);
            cursor: pointer;
        }


    </style>
</head>

<body style="/*background: url(&quot;design.jpg&quot;);*/background-position: 0 -60px;padding-top: 0px;margin-top: 0px;">
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav" style="background: rgb(255,255,255);">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><i class="fa fa-soccer-ball-o" style="font-size: 14px;"></i></span><span>Bola Talent Hub</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="index">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Statistics">Statistics</a></li>
                    <li class="nav-item"><a class="nav-link" href="Analytics">Analytics</a></li>
                    <li class="nav-item"><a class="nav-link" href="News1">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="py-5">
        <div class="row text-center d-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
            <div class="col">
                <section class="py-5">
                    <h1 class="text-center mb-4">Hot Ball News</h1>
                    <div class="container">
                        <div class="row filtr-container">
                            @php
                                $news = \App\Models\News::orderBy('created_at', 'desc')->take(3)->get();
                            @endphp

                            @foreach($news as $berita)
                                <div class="col-md-6 col-lg-4 filtr-item" data-category="1,3" data-toggle="modal" data-target="#newsDetails{{ $berita->ID_Berita }}">
                                    <div class="card border-dark news-card">
                                        <div class="card-header bg-dark text-light">
                                            <h5 class="m-0">{{ $berita->Judul }}</h5>
                                        </div>
                                        <img class="img-fluid card-img w-100 d-block rounded-0" src="{{ asset('news/' . $berita->gambar_berita) }}" style="height: 237px;">
                                        <div class="card-body">
                                            <p class="card-text">{{ substr(strip_tags($berita->isi_berita), 0, 100) }}...</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal News -->
                                <div class="modal fade" id="newsDetails{{ $berita->ID_Berita }}" tabindex="-1" role="dialog" aria-labelledby="newsModalLabel{{ $berita->ID_Berita }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 100%; width: 100%;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div style="text-align: center; width: 100%;">
                                                    <h4 class="modal-title font-weight-bold" id="news{{ $berita->ID_Berita }}">{{ $berita->Judul }}</h4>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color: grey; color: white; border: 1px solid white; width: 30px; height: 30px; text-align: center; line-height: 24px;">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="getNewsDetails{{ $berita->ID_Berita }}">
                                                @php
                                                    $newsDetail = DB::table('news')
                                                        ->select(
                                                            'ID_Berita',
                                                            'penulis',
                                                            'Judul',
                                                            'isi_berita',
                                                            'gambar_berita',
                                                            'created_at'
                                                        )
                                                        ->where('ID_Berita', $berita->ID_Berita)
                                                        ->first();
                                                @endphp

                                                @if ($newsDetail)
                                                    <!-- Menampilkan gambar di bagian atas -->
                                                    <img src="{{ asset('news/' . $newsDetail->gambar_berita) }}" alt="Gambar Berita" style="width:100%; height:auto;">

                                                    <!-- Informasi berita dengan tata letak rata kiri kanan -->
                                                    <div>
                                                        @php
                                                            $tanggal = strftime('%A, %e %B %Y', strtotime($newsDetail->created_at));

                                                        @endphp
                                                        <p>{{ $tanggal }}</p>
                                                        <div  style="text-align: justify;">
                                                            <p><strong>{{ $newsDetail->penulis }}</strong> - {{ $newsDetail->isi_berita }}</p>
                                                        </div>
                                                    </div>
                                                    <!-- ... -->
                                                @else
                                                    <p><strong>Belum ada detail berita untuk ID tersebut.</strong></p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>



                    <!-- <div class="container">
                        <div class="row filtr-container">
                            <div class="col-md-6 col-lg-4 filtr-item" data-category="1,3">
                                <div class="card border-dark">
                                    <div class="card-header bg-dark text-light">
                                        <h5 class="m-0">Timnas Indonesia Gilas Brunei Darussalam</h5>
                                    </div><img class="img-fluid card-img w-100 d-block rounded-0" src="assets/img/indo-1_f0793bf.jpg" style="height: 237px;">
                                    <div class="card-body">
                                        <p class="card-text">Timnas Indonesia kalahkan Brunie dengan agregat 12-0 dalam pertandingan ronde 1 kualifikasi Piala dunia zona Asia<br></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 filtr-item" data-category="1,3">
                                <div class="card border-dark">
                                    <div class="card-header bg-dark text-light">
                                        <h5 class="m-0">2 Minggu lagi Piala Dunia u-17 diadakan di Indonesia</h5>
                                    </div><img class="img-fluid card-img w-100 d-block rounded-0" src="assets/img/pildun%20u-17.jpeg" style="height: 237px;">
                                    <div class="card-body">
                                        <p class="card-text">Kurang 2 minggu lagi ajang tertingg sepak bola dunia kelompok umur 17 tahun akan dibuka di Gelora Bung Tomo Surabaya<br></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 filtr-item" data-category="1,3">
                                <div class="card border-dark">
                                    <div class="card-header bg-dark text-light">
                                        <h5 class="m-0">Indonesia akan berhadapan dengan Irak</h5>
                                    </div><img class="img-fluid card-img w-100 d-block rounded-0" src="assets/img/timnas-indonesia-u-20-vs-irak-4_169.jpeg" style="height: 237px;">
                                    <div class="card-body">
                                        <p class="card-text">Lolos ke Ronde 2 Kualifikasi Piala Dunia, Indonesia akan berjumpa dengan Irak, November mendatang.<br></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </section>
            </div>
        </div>
        <div class="row text-center d-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="margin-right: 3px;">
          <div class="col text-center justify-content-xl-center align-items-xl-start" style="padding-right: 27px;margin-right: -20px;margin-left: -100px;margin-top: -90px;">
              <h1>Top Player</h1>
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th>No.</th>
                              <th>Nama Pemain</th>
                              <th>G</th>
                              <th>A</th>
                              <th>P</th>
                          </tr>
                      </thead>
                      <tbody>
                          @if ($topPlayers)
                          <tr>
                              <td>1</td>
                              <td>{{ $topPlayers->Nama_Pemain }}</td>
                              <td>{{ $topPlayers->Total_Gol }}</td>
                              <td>{{ $topPlayers->Total_Assist }}</td>
                              <td>{{ $topPlayers->Total_Pertandingan }}</td>
                          </tr>
                          @endif
                      </tbody>
                  </table>
              </div>
          </div>
            <div class="col" style="margin-right: 203px;">
              <h1>Top 5 Standings</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Tim</th>
                                <th>T</th>
                                <th>M</th>
                                <th>S</th>
                                <th>K</th>
                                <th>GM</th>
                                <th>GK</th>
                                <th>Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($klasemen as $key => $tim)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $tim->Nama_Tim }}</td>
                                <td>{{ $tim->T }}</td>
                                <td>{{ $tim->M }}</td>
                                <td>{{ $tim->S }}</td>
                                <td>{{ $tim->K }}</td>
                                <td>{{ $tim->GM }}</td>
                                <td>{{ $tim->GK }}</td>
                                <td>{{ $tim->Poin }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
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
</body>

</html>