<center>
    <h2>POSTINGAN</h2>
</center>
<nav>
    <a href="#" class="btn btn-info">
        <span class="glyphicon glyphicon-print"></span> Print
    </a> |
    <a href="index.php?page=post" class="btn btn-primary">Posting <i class="glyphicon glyphicon-plus"></i></a>
</nav>
<p></p>
<table class="table table-striped table-bordered table-hover" id="tables">
    <thead>
        <tr>
            <th>Id</th>
            <th>Judul</th>
            <th>Isi Berita</th>
            <th>Dipost</th>
            <th>Waktu</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("select * from posting"); ?>
        <?php while ($data = $ambil->fetch_assoc()) { ?>

            <tr>
                <td>
                    <?= $nomor; ?>
                </td>
                <td><?= $data['judul']; ?></td>
                <td><?= $data['isi_berita']; ?></td>
                <td><?= $data['level']; ?></td>
                <td><?= $data['tanggal']; ?></td>
                <td>
                    <img src="assets/gbr/<?= $data['photo']; ?>" width="50">
                </td>
                <td>
                    <div class="btn-group-vertical">
                        <a href="proses/config.php?hapuspost=<?= $data['idp']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Hapus?')"> <i class="glyphicon glyphicon-trash"></i> Hapus</a>
                        <a href="index.php?page=editpost&Edit=<?= $data['idp']; ?>" class="btn btn-warning btn-sm"> <i class="glyphicon glyphicon-pencil"></i> Edit</a>
                    </div>
                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>

    </tbody>
</table>

<!-- CK EDITOR -->
<!-- <script>
    ClassicEditor
        .create(document.querySelector('#isi_berita'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script> -->