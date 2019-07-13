<center>
    <h2>Tambahkan Postigan</h2>
</center>
<!-- CK EDITOR -->
<script type="text/javascript" src="assets/helper/ckedit/ckeditor5-build-classic/ckeditor.js"></script>
<form action="proses/config.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idp" value="">
    <label for="">Judul</label><br>
    <input type="text" name="judul" class="form-control" required>
    <p></p>
    <label for="">Isi Berita</label><br>
    <textarea name="isi_berita" id="isi_berita" class="form-control"></textarea>
    <p></p>
    <label for="">Di Post Oleh</label><br>
    <select name="level" class="form-control" required>
        <option disabled selected value=""> Pilih </option>
        <option> Admin </option>
        <option> User </option>
    </select>
    <p></p>
    <label for="">Gambar Post</label><br>
    <input type="file" name="photo" class="form-control">
    <p></p>
    <label for="">Pada Tanggal</label><br>
    <input type="date" name="tanggal" class="form-control" required>
    <p></p>
    <center>
        <button type="submit" class="btn btn-success" name="simpan"> <i class="glyphicon glyphicon-ok-sign"></i> Simpan post</button>
        <button class="btn btn-danger" name="batal"> <i class="glyphicon glyphicon-remove-sign"></i> Batal</button>
    </center>
</form>

<script>
    ClassicEditor
        .create(document.querySelector('#isi_berita'))
        .catch(error => {
            console.error(error);
        });
</script>