<?php

// ambil data di url
$id = $_GET['Edit'];
$ambil = $koneksi->query("select * from user where id=$id");
$data = $ambil->fetch_assoc();
?>

<center>
    <h2>Edit Pengguna</h2>
</center>

<form action="proses/config.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id']; ?>>

    <label for="">Photo</label><br>
    <img src=" ../assets/imgu/<?= $data['gbr']; ?>" width="100">
    <input type="file" name="gbr" class="form-control" value="<?= $data['gbr']; ?>">
    <p></p>

    <label for="">Nama</label><br>
    <input name="nama" class="form-control" value="<?= $data['nama']; ?>" placeholder="Nama Tidak Boleh Kosong" required>
    <p></p>


    <label for="">Username</label><br>
    <input name="username" class="form-control" value="<?= $data['username']; ?>" placeholder="Username Tidak Boleh Kosong" required>
    <p></p>

    <label for="">Email</label><br>
    <input type="email" name="email" class="form-control" value="<?= $data['email']; ?>" placeholder="Email Tidak Boleh Kosong" required>
    <p></p>

    <label for="">Password Lama </label><br>
    <input type="password" class="form-control" value="<?= $data['password']; ?>" required disabled>
    <p></p>

    <label for="">Password Baru </label><br>
    <input type="password" name="password" class="form-control" placeholder="Masukkan Password Baru" required>
    <p></p>

    <label for="">Level</label><br>
    <select name="level" class="form-control" required>
        <option disabled> Pilih </option>
        <option <?php if ($data['level'] == "admin") : ?> selected="selected" <?php endif; ?>>admin</option>
        <option <?php if ($data['level'] == "user") : ?> selected="selected" <?php endif; ?>>user</option>
    </select>
    <p></p>

    <label for="">No Hp</label><br>
    <input name="no_hp" class="form-control" value="<?= $data['no_hp']; ?>" placeholder="No Hp Tidak Boleh Kosong" required>
    <p></p>

    <center>
        <button type="submit" class="btn btn-success" name="edit_user"> <i class="glyphicon glyphicon-ok-sign"></i> Edit post</button>
    </center>
</form>