<center>
  <h2>Tes Download</h2>
</center>
<p></p>

<table class="table table-striped table-bordered table-hover" id="tables">
  <thead>
    <tr>
      <th>Id</th>
      <th>Judul</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php $ambil = $koneksi->query("select * from tes_d"); ?>
    <?php while ($data = $ambil->fetch_assoc()) { ?>

      <tr>
        <td>
          <?= $nomor; ?>
        </td>
        <td><?= $data['judul']; ?></td>
        <td>
          <div class="btn-group-vertical">
            <a href="index.php?page=cari&judul=<?= $data['judul']; ?>" class="btn btn-success btn-sm"> <i class="glyphicon glyphicon-download"></i> Download</a>
          </div>
        </td>
      </tr>
      <?php $nomor++; ?>
    <?php } ?>

  </tbody>
</table>