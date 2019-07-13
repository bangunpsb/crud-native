<center>
    <h2>Tambahkan Pengguna</h2>
</center>
<form action="proses/config.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="">
    <label for="">Photo</label><br>
    <input type="file" name="gbr" class="form-control" required>
    <p></p>
    <label for="">Nama</label><br>
    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Pengguna . ." maxlength="200" required>
    <p></p>
    <label for="">Username</label><br>
    <input type="text" name="username" class="form-control" placeholder="Masukan Username Pengguna . ." maxlength="200" required>
    <label for="">Email</label><br>
    <input type="email" name="email" class="form-control" placeholder="Masukan Email Pengguna . ." maxlength="100" required>
    <label for="">Password</label><br>
    <input type="password" name="password" class="form-control" placeholder="Masukan Password Pengguna . ." required>
    <label for="">Level</label><br>
    <select name="level" class="form-control" required>
        <option disabled selected value=""> Pilih </option>
        <option> admin </option>
        <option> user </option>
    </select>
    <p></p>
    <label for="">No Hp</label><br>
    <input id="no_hp" type="number" name="no_hp" class="form-control" placeholder="Masukan No Hp Pengguna . ." maxlength="999999999999" required>
    <p></p>
    <center>
        <button type="submit" class="btn btn-success" name="simpanuser"> <i class="glyphicon glyphicon-ok-sign"></i> Simpan User</button>
        <button class="btn btn-danger" name="batal"> <i class="glyphicon glyphicon-remove-sign"></i> Batal</button>
    </center>
</form>