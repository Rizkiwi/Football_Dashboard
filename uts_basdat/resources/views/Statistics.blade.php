<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Services - Brand</title>
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
        #dropdownTrigger .x-drop-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100%; /* Mengisi tinggi elemen parent */
        }
        .clickable-row_1 {
            cursor: pointer;
        }
        .clickable-row:hover {
            background-color: #f0f0f0; /* Ganti dengan kode warna abu-abu yang diinginkan */
        }
        .kontrak-info {
            display: flex;
            flex-direction: column;
        }

        .kontrak-info p {
            margin-bottom: 5px;
            line-height: 1.5; /* Sesuaikan line-height sesuai kebutuhan */
        }

        .kontrak-info strong {
            display: inline-block;
            width: 120px; /* Sesuaikan lebar sesuai kebutuhan */
        }

        .kontrak-info span {
            display: inline-block;
            margin-left: 10px; /* Sesuaikan margin sesuai kebutuhan */
        }


    </style>

</head>

<body style="/*background: url(&quot;design.jpg&quot;);*/background-position: 0 -60px;margin-top: 0px;">
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav" style="background: rgb(255,255,255);">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon" style="background: rgb(55, 99, 244);"><i class="fa fa-soccer-ball-o" style="font-size: 14px;"></i></span><span>Bola Talent Hub</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="Statistics">Statistics</a></li>
                    <li class="nav-item"><a class="nav-link" href="Analytics">Analytics</a></li>
                    <li class="nav-item"><a class="nav-link" href="News1">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="py-5">
        <div class="d-flex justify-content-center h-100" style="--bs-body-font-weight: bold;--bs-body-font-size: 0.2rem;"></div>
        <div class="container">
            <div class="card" id="TableSorterCard">
                <div id="dropdownTrigger" class="x-dropdown dropdown">
                    <div class="text-start x-drop-btn" aria-expanded="false" data-bs-toggle="dropdown" style="padding-right: 0px;padding-left: 0px;"><span style="font-size: 18px;">Tampilkan Filter</span><i class="material-icons" style="font-size: 28px;">keyboard_arrow_down</i></div>
                </div>
                <form method="get" action="{{ route('Statistics') }}">
                    <div class="row-sembunyi" style="display: none;">
                        <div class="row table-topper align-items-center" style="margin-left: 5px;padding-right: 5px;padding-top: 10px;margin-bottom: 35px;">
                            <div class="col" style="width: 360px;height: 90px;">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <h4 style="--bs-body-font-size: 1 px;">Usia</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Min</label> <input type="text"  name="minAge" id="minAge" value="{{ request('minAge') }}" class="form-control" style="height: 40px;width: 80px;"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Max</label> <input type="text" name="maxAge" id="maxAge" value="{{ request('maxAge') }}"class="form-control" style="width: 80px;height: 40px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 style="--bs-body-font-size: 1 px;">Tinggi</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Min</label><input type="text" name="minHeight" id="minHeight" value="{{ request('minHeight') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Max</label><input type="text" name="maxHeight" id="maxHeight" value="{{ request('maxHeight') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col" style="width: 360px;height: 90px;">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <h4 style="--bs-body-font-size: 1 px;">Berat</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Min</label><input type="text" name="minWeight" id="minWeight" value="{{ request('minWeight') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Max</label><input type="text" name="maxWeight" id="maxWeight" value="{{ request('maxWeight') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <!-- <div class="row">
                                                    <div class="col">
                                                        <h4 style="--bs-body-font-size: 1 px;">Posisi</h4>
                                                    </div>
                                                </div> -->
                                                <div class="row">
                                                    <div class="col">
                                                    <h4 style="--bs-body-font-size: 1 px;">Posisi</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label" style="font-size: 14px;">Pilih Posisi</label>
                                                            <select class="form-select" name="position" id="position">
                                                                <option value="" {{ request('position') === '' ? 'selected' : '' }}>Semua</option>
                                                                <option value="Kiper" {{ request('position') === 'Kiper' ? 'selected' : '' }}>Kiper</option>
                                                                <option value="Bek" {{ request('position') === 'Bek' ? 'selected' : '' }}>Bek</option>
                                                                <option value="Gelandang" {{ request('position') === 'Gelandang' ? 'selected' : '' }}>Gelandang</option>
                                                                <option value="Penyerang" {{ request('position') === 'Penyerang' ? 'selected' : '' }}>Penyerang</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row table-topper align-items-center" style="margin-left: 0px;padding-left: 5px;margin-right: 0px;padding-right: 5px;margin-bottom: 30px;">
                            <div class="col" style="width: 360px;height: 90px;">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <h4 style="--bs-body-font-size: 1 px;">Gol</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Min</label><input type="text" name="minGol" id="minGol" value="{{ request('minGol') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Max</label><input type="text" name="maxGol" id="maxGol" value="{{ request('maxGol') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 style="--bs-body-font-size: 1 px;">Assist</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Min</label><input type="text" name="minAssist" id="minAssist" value="{{ request('minAssist') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Max</label><input type="text" name="maxAssist" id="maxAssist" value="{{ request('maxAssist') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col" style="width: 360px;height: 90px;">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <h4 style="--bs-body-font-size: 1 px;">Saves</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Min</label><input type="text" name="minSaves" id="minSaves" value="{{ request('minSaves') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Max</label><input type="text" name="maxSaves" id="maxSaves" value="{{ request('maxSaves') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 style="--bs-body-font-size: 1 px;">Cleansheets</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Min</label><input type="text" name="minCleanSheets" id="minCleanSheets" value="{{ request('minCleanSheets') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Max</label><input type="text" name="maxCleanSheets" id="maxCleanSheets" value="{{ request('maxCleanSheets') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row table-topper align-items-center" style="margin-left: 0px;padding-left: 5px;margin-right: 0px;padding-right: 5px;margin-bottom: 30px;">
                            <div class="col" style="width: 360px;height: 90px;">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <h4 style="--bs-body-font-size: 1 px;">Tekel</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Min</label><input type="text" name="minTekel" id="minTekel" value="{{ request('minTekel') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mb-3"><label class="form-label" style="font-size: 14px;">Max</label><input type="text" name="maxTekel" id="maxTekel" value="{{ request('maxTekel') }}" class="form-control" style="width: 80px;height: 40px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                            </div>
                            <div class="col" style="width: 360px;height: 90px;">
                                <div class="row">
                                </div>
                            </div>
                        </div>
                        <div class="row table-topper align-items-center" style="margin-left: 0px;padding-left: 0px;">
                            <div class="col-4 text-start" style="margin: 0px;padding: 5px 15px;"><button class="btn btn-primary btn-sm reset" type="submit" style="padding: 5px;margin: 2px;background: rgb(44,162,25);">Submit</button></div>
                        </div>

                    </div>
                </form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 400px;background: rgba(55,99,244,0.8);color: rgb(255,255,255); cursor: pointer;">Nama <i class="fa fa-sort"></i></th>
                                        <th style="width: 70px;background: rgba(55,99,244,0.8);color: rgb(255,255,255); cursor: pointer;">Usia<i class="fa fa-sort"></i></th>
                                        <th style="width: 90px;background: rgba(55,99,244,0.8);color: rgb(255,255,255);cursor: pointer;">Tinggi<i class="fa fa-sort"></i></th>
                                        <th style="width: 70px;background: rgba(55,99,244,0.8);color: rgb(255,255,255);cursor: pointer;">Berat<i class="fa fa-sort"></i></th>
                                        <th style="width: 100px;background: rgba(55,99,244,0.8);color: rgb(255,255,255);cursor: pointer;">Posisi<i class="fa fa-sort"></i></th>
                                        <th style="width: 70px;background: rgba(55,99,244,0.8);color: rgb(255,255,255);cursor: pointer;">Gol<i class="fa fa-sort"></i></th>
                                        <th style="width: 90px;background: rgba(55,99,244,0.8);color: rgb(255,255,255);cursor: pointer;">Assist<i class="fa fa-sort"></i></th>
                                        <th style="width: 90px;background: rgba(55,99,244,0.8);color: rgb(255,255,255);cursor: pointer;">Tekel<i class="fa fa-sort"></i></th>
                                        <th style="width: 90px;background: rgba(55,99,244,0.8);color: rgb(255,255,255);cursor: pointer;">Saves<i class="fa fa-sort"></i></th>
                                        <th style="width: 100px;background: rgba(55,99,244,0.8);color: rgb(255,255,255);cursor: pointer;">Cleansheets<i class="fa fa-sort"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($statistics))
                                        @foreach ($statistics as $item => $statistic)
                                        <tr class="clickable-row">
                                        <td class="clickable-row_1" data-toggle="modal" data-target="#Kontrakdetails{{ $statistic->Nama_Pemain }}" data-id="{{ $statistic->ID_Pemain }}">{{$statistic->Nama_Pemain}}</td>
                                        <td>{{$statistic->Usia}}</td>
                                        <td>{{$statistic->Tinggi_Badan}}</td>
                                        <td>{{$statistic->Berat_Badan}}</td>
                                        <td>{{$statistic->Posisi_Pemain}}</td>
                                        <td>{{$statistic->Jumlah_Gol}}</td>
                                        <td>{{$statistic->Jumlah_Assist}}</td>
                                        <td>{{$statistic->Tekel}}</td>
                                        <td>{{$statistic->Penyelamatan}}</td>
                                        <td>{{$statistic->Clean_Sheet}}</td>
                                            <!-- Tombol Details -->
                                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Kontrakdetails{{ $statistic->Nama_Pemain }}" data-id="{{ $statistic->ID_Pemain }}">
                                                Detail Kontrak
                                            </button> -->

                                            <!-- Modal -->
                                            <div class="modal fade" id="Kontrakdetails{{ $statistic->Nama_Pemain }}" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel{{ $statistic->Nama_Pemain }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="kontrak{{ $statistic->Nama_Pemain }}">Details Kontrak - {{ $statistic->Nama_Pemain }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color: grey; color: white; border: 1px solid white; width: 30px; height: 30px; text-align: center; line-height: 24px;">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="getDetails">
                                                            @php
                                                                $kontrak = DB::table('kontrak')
                                                                    ->select(
                                                                        'ID_Kontrak',
                                                                        'Mulai_Kontrak',
                                                                        'Akhir_Kontrak',
                                                                        'Harga',
                                                                        'Gaji',
                                                                        'Agent',
                                                                        'ID_Pemain'
                                                                    )
                                                                    ->where('ID_Pemain', $statistic->ID_Pemain)
                                                                    ->first();
                                                            @endphp
                                                            @php
                                                                $berita = DB::table('news')
                                                                    ->where(function($query) use ($statistic) {
                                                                        $query->where('Judul', 'like', '%' . $statistic->Nama_Pemain . '%')
                                                                            ->orWhere('isi_berita', 'like', '%' . $statistic->Nama_Pemain . '%');
                                                                    })
                                                                    ->get();
                                                            @endphp


                                                            @if ($kontrak)
                                                                <div class="kontrak-info">
                                                                    <p><strong>Mulai Kontrak</strong> <span>: {{ $kontrak->Mulai_Kontrak }}</span></p>
                                                                    <p><strong>Akhir Kontrak</strong> <span>: {{ $kontrak->Akhir_Kontrak }}</span></p>
                                                                    <p><strong>Harga</strong> <span>: Rp {{ number_format($kontrak->Harga, 0, ',', '.') }}</span></p>
                                                                    <p><strong>Gaji</strong> <span>: Rp {{ number_format($kontrak->Gaji, 0, ',', '.') }}</span></p>
                                                                    <p><strong>Agent</strong> <span>: {{ $kontrak->Agent }}</span></p>
                                                                </div>
                                                                @if ($berita->count() > 0)
                                                                    <div class="berita-info">
                                                                        <h6>Berita Terkait</h6>
                                                                        <ul>
                                                                            @foreach ($berita as $item)
                                                                                {{ $item->Judul }}
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @else
                                                                    <p><strong>Tidak ada berita terkait untuk pemain ini.</strong></p>
                                                                @endif


                                                            @else
                                                                <p><strong>Belum ada data kontrak untuk pemain ini.</strong></p>
                                                            @endif
                                                        </div>
                                                        <!-- <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>    
                                        @endforeach  
                                    @else
 
                                    @endif 
                                </tbody>
                            </table>

                            {!! $statistics->appends(Request::except('page'))->render() !!}
                        </div>
                    </div>
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
    
    
    <script>
            // Dapatkan tombol dropdown
            var dropdownTrigger = document.getElementById("dropdownTrigger");

            // Dapatkan elemen row yang akan diubah visibilitasnya
            var hiddenRow = document.querySelector(".row-sembunyi");

            // Status awal elemen row (tersembunyi)
            var isRowVisible = false;

            // Fungsi untuk menampilkan atau menyembunyikan elemen row
            function toggleRowVisibility() {
                isRowVisible = !isRowVisible; // Toggle status

            // Ubah visibilitas berdasarkan status
            if (isRowVisible) {
                hiddenRow.style.display = "block";
            } else {
                hiddenRow.style.display = "none";
            }
        }

            // Tambahkan event listener ke tombol dropdown
            dropdownTrigger.addEventListener("click", toggleRowVisibility);

            $(function() {
            $("#myTable").tablesorter({ sortList: [[0,0], [1,0]] });
        });
    </script>
        
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".clickable-row").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>

        
        
</body>

</html>