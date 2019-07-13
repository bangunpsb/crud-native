<center>
    <h2>PENGGUNA</h2>
</center>
<nav>
    <a href="#" class="btn btn-info">
        <span class="glyphicon glyphicon-print"></span> Print
    </a> |
    <a href="index.php?page=useradd" class="btn btn-primary">Pengguna <i class="glyphicon glyphicon-plus"></i></a>
</nav>
<p></p>
<table class="table table-striped table-bordered table-hover" id="tables">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Level</th>
            <th>No Hp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("select * from user"); ?>
        <?php while ($data = $ambil->fetch_assoc()) { ?>

            <tr>
                <td>
                    <?= $nomor; ?>
                </td>
                <td>
                    <img src="../assets/imgu/<?= $data['gbr']; ?>" width="50">
                </td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['username']; ?></td>
                <td><?= $data['email']; ?></td>
                <td><?= $data['level']; ?></td>
                <td><?= $data['no_hp']; ?></td>
                <td>
                    <div class="btn-group-vertical">
                        <a href="proses/config.php?hapususer=<?= $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Hapus?')"> <i class="glyphicon glyphicon-trash"></i> Hapus</a>
                        <a href="index.php?page=edituser&Edit=<?= $data['id']; ?>" class="btn btn-warning btn-sm"> <i class="glyphicon glyphicon-pencil"></i> Edit</a>
                    </div>
                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>

    </tbody>
</table>