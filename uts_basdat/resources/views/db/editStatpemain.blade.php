<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><i class="fa fa-soccer-ball-o" style="font-size: 14px;"></i></span><span>Bola Talent Hub</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Kompetisi</a></li>
                    <li class="nav-item"><a class="nav-link" href="/tim_db">Tim</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pemain_db">Pemain</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/stat_pemain_db">Stat_pemain</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pertandingan_db">Pertandingan</a></li>
                    <li class="nav-item"><a class="nav-link" href="/stat_tim_db">Stat_tim</a></li>
                    <li class="nav-item"><a class="nav-link" href="/news_db">News</a></li>
                </ul>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    </div><button class="btn btn-primary shadow" type="submit" name="logout" style="background: rgb(208,12,0);">Log Out</button>

                    <!-- <button type="submit" class="dropdown-item py-1 d-flex align-items-center justify-content-between" name="logout">
                        <span>Log Out</span>
                        <i class="mdi mdi-logout ml-1"></i>
                    </button> -->
                </form> 
            </div>
        </div>
    </nav>
    <h1 style="content: center" class="mb-0">Edit Statistik Pemain</h1>
<form  action="{{ route('stat_pemain.update',$data->ID_Statistik) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label for="ID_Statistik" class="form-label">Id Statistik</label>
            <input type="text" name="ID_Statistik" class="form-control"  value="{{ $data->ID_Statistik }}">
        </div>
        <div class="col mb-3">
            <label for="Jumlah_Pertandingan" class="form-label">Menit bermain</label>
            <input type="text" name="Jumlah_Pertandingan" class="form-control"  value="{{ $data->Menit_bermain }}">
        </div>
        <div class="col mb-3">
            <label for="Jumlah_Gol" class="form-label">Jumlah Gol</label>
            <input type="text" name="Jumlah_Gol" class="form-control"  value="{{ $data->Jumlah_Gol }}">
        </div>
        <div class="col mb-3">
            <label for="Jumlah_Assist" class="form-label">Jumlah Assist</label>
            <input type="text" name="Jumlah_Assist" class="form-control"  value="{{ $data->Jumlah_Assist }}">
        </div>
        <div class="col mb-3">
            <label for="Kartu_Kuning" class="form-label">Kartu Kuning</label>
            <input type="text" name="Kartu_Kuning" class="form-control"  value="{{ $data->Kartu_Kuning }}">
        </div>
        <div class="col mb-3">
            <label for="Kartu_Merah" class="form-label">Kartu Merah</label>
            <input type="text" name="Kartu_Merah" class="form-control"  value="{{ $data->Kartu_Merah }}">
        </div>
        <div class="col mb-3">
            <label for="Penyelamatan" class="form-label">Penyelamatan</label>
            <input type="text" name="Penyelamatan" class="form-control"  value="{{ $data->Penyelamatan }}">
        </div>
        <div class="col mb-3">
            <label for="Clean_Sheet" class="form-label">Kartu Kuning</label>
            <input type="text" name="Kartu_Kuning" class="form-control"  value="{{ $data->Kartu_Kuning }}">
        </div>
        <div class="col mb-3">
            <label for="Kartu_Kuning" class="form-label">Clean Sheet</label>
            <input type="text" name="Clean_Sheet" class="form-control"  value="{{ $data->Clean_Sheet }}">
        </div>
        <div class="col mb-3">
            <label for="Tahun" class="form-label">Jumlah Pertandingan</label>
            <input type="text" name="Tahun" class="form-control"  value="{{ $data->Jumlah_Pertandingan }}">
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-warning" name="submit">Update</button>
        </div>
    </div>
</form>
</body>
</html>

