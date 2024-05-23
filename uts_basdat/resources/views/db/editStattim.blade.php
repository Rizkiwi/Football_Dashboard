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
                    <li class="nav-item"><a class="nav-link" href="/stat_pemain_db">Stat_pemain</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pertandingan_db">Pertandingan</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/stat_tim_db">Stat_tim</a></li>
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
    <h1 style="content: center" class="mb-0">Edit Statistik Tim</h1>
<form  action="{{ route('stat_tim.update',$data->ID_Statistik_Tim) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label for="ID_Tim" class="form-label">Id Tim</label>
            <input type="text" name="ID_Tim" class="form-control"  value="{{ $data->ID_Tim }}">
        </div>
        <div class="col mb-3">
            <label for="Point" class="form-label">Point</label>
            <input type="text" name="Point" class="form-control"  value="{{ $data->Point }}">
        </div>
        <div class="col mb-3">
            <label for="Menang" class="form-label">Menang</label>
            <input type="text" name="Menang" class="form-control"  value="{{ $data->Menang }}">
        </div>
        <div class="col mb-3">
            <label for="Seri" class="form-label">Seri</label>
            <input type="text" name="Seri" class="form-control"  value="{{ $data->Seri }}">
        </div>
        <div class="col mb-3">
            <label for="Kalah" class="form-label">Kalah</label>
            <input type="text" name="Kalah" class="form-control"  value="{{ $data->Kalah }}">
        </div>
        <div class="col mb-3">
            <label for="Gol_Memasukkan" class="form-label">Gol Memasukkan</label>
            <input type="text" name="Gol_Memasukkan" class="form-control"  value="{{ $data->Gol_Memasukkan }}">
        </div>
        <div class="col mb-3">
            <label for="Gol_Kemasukkan" class="form-label">Gol Kemasukkan</label>
            <input type="text" name="Gol_Kemasukkan" class="form-control"  value="{{ $data->Gol_Kemasukkan }}">
        </div>
        <div class="col mb-3">
            <label for="Musim" class="form-label">Musim</label>
            <input type="text" name="Musim" class="form-control"  value="{{ $data->Musim }}">
        </div>
        <div class="col mb-3">
            <label for="ID_Kompetisi" class="form-label">ID Kompetisi</label>
            <input type="text" name="ID_Kompetisi" class="form-control"  value="{{ $data->ID_Kompetisi }}">
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

