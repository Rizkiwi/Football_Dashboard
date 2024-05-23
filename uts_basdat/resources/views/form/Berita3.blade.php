<!DOCTYPE html>
<html lang="en">

<head>
</head>
<body>

<form action="{{ route('storenews') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="gambar_berita">Gambar Berita:</label><br>
    <input type="file" id="gambar_berita" name="gambar_berita"><br><br>

    <label for="penulis">Penulis:</label><br>
    <input type="text" id="penulis" name="penulis"><br>

    <label for="Judul">Judul Berita:</label><br>
    <input type="text" id="Judul" name="Judul"><br>

    <label for="isi_berita">Isi Berita:</label><br>
    <textarea id="isi_berita" name="isi_berita" rows="4" cols="50"></textarea><br><br>

    <input type="submit" value="Submit">

</form>
</body>

</html>
