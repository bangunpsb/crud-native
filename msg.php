<center>
    <h2>MESSAGE</h2>
</center>

<?php $sql = $koneksi->query("select count(pesan) as jumlah from pesan where status=0"); ?>
<?php while ($data = $sql->fetch_assoc()) { ?>
    <?php $jumlah = $data['jumlah']; ?>
<?php } ?>
<nav>
    <a href="#" class="btn btn-info">
        <span class="glyphicon glyphicon-print"></span> Print
    </a>|
    <a href="#" class="btn btn-danger">
        <span class="fa fa-envelope-o"></span> Message <?= $jumlah; ?>
    </a>
</nav>
<p></p>
<table class="table table-striped table-bordered table-hover" id="tables">
    <thead>
        <tr>
            <th>No</th>
            <th>Pengirim</th>
            <th>Email Pengirim</th>
            <th>No Hp Pengirim</th>
            <th>Pesan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("select idm,nama,email,phone,pesan from pesan where status=1"); ?>
        <?php while ($data = $ambil->fetch_assoc()) { ?>

            <tr>
                <td>
                    <?= $nomor; ?>
                </td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['email']; ?></td>
                <td><?= $data['phone']; ?></td>
                <td><?= $data['pesan']; ?></td>
                <td>
                    <div class="btn-group-vertical">

                        <a href="proses/config.php?hapuspesan=<?= $data['idm']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Hapus?')"> <i class="glyphicon glyphicon-trash"></i> Hapus Pesan</a>
                    </div>
                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>

    </tbody>
</table>