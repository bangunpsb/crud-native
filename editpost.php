<?php

// ambil data di url
$idp = $_GET['Edit'];
$ambil = $koneksi->query("select * from posting where idp=$idp");
$data = $ambil->fetch_assoc();
var_dump($data);
?>

<center>
    <h2>Edit Postingan</h2>
</center>

<form action="proses/config.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idp" value="<?= $data['idp']; ?>>

    <label for="">Judul</label><br>
    <input type=" text" name="judul" class="form-control" value="<?= $data['judul']; ?>" required>
    <p></p>

    <label for="">Isi Berita</label><br>
    <textarea name="isi_berita" id="isi_berita" class="form-control" required><?= $data['isi_berita']; ?></textarea>
    <p></p>

    <label for="">Di Post Oleh</label><br>
    <select name="level" class="form-control" required>
        <option disabled> Pilih </option>
        <option <?php if ($data['level'] == "Admin") : ?> selected="selected" <?php endif; ?>>Admin</option>
        <option <?php if ($data['level'] == "User") : ?> selected="selected" <?php endif; ?>>User</option>
    </select>
    <p></p>

    <label for="">Gambar Post</label><br>
    <img src="assets/gbr/<?= $data['photo']; ?>" width="100">
    <input type="file" name="photo" class="form-control">
    <p></p>

    <label for="">Pada Tanggal</label><br>
    <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal']; ?>" required>
    <p></p>

    <center>
        <button type="submit" class="btn btn-success" name="edit"> <i class="glyphicon glyphicon-ok-sign"></i> Edit post</button>
    </center>
</form>