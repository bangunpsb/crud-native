<?php
include '../../proses/koneksi.php';
?>

<!-- POSTINGAN -->
<!-- TAMBAH POSTINGAN -->
<?php
if (isset($_POST["simpan"])) {
    $gbrp = $_FILES['photo']['name'];
    $lokasi = $_FILES['photo']['tmp_name'];
    move_uploaded_file($lokasi, "../assets/gbr/$gbrp");
    session_start();
    $idp = $_POST["idp"];
    $judul = $_POST["judul"];
    $isi_berita = $_POST["isi_berita"];
    $level = $_POST["level"];
    $tanggal = $_POST["tanggal"];
    $simpan = mysqli_query($koneksi, "insert into posting values('$idp','$judul','$isi_berita','$level','$gbrp','$tanggal')");

    if (!$simpan) {
        echo "<script>window.location='../index.php?page=post&status=g_simpan' </script>";
    } else {
        echo "<script>window.location='../index.php?page=post&status=b_simpan' </script>";
    }
}
?>

<!-- Hapus Postingan -->
<?php
if (isset($_GET['hapuspost'])) {
    $idp = $_GET['hapuspost'];
    $hapus = mysqli_query($koneksi, "delete from posting where idp='$idp'");

    if (!$hapus) {
        echo "<script>window.location='../index.php?page=posting&status=g_hapus' </script>";
    } else {
        echo "<script>window.location='../index.php?page=posting&status=b_hapus' </script>";
    }
}
?>

<!-- Edit Postingan -->
<?php
if (isset($_POST['edit'])) {
    $namaphoto = $_FILES['photo']['name'];
    $lokasi = $_FILES['photo']['tmp_name'];

    $idp = $_POST['idp'];
    $judul = $_POST['judul'];
    $isi_berita = $_POST['isi_berita'];
    $level = $_POST['level'];
    $tanggal = $_POST['tanggal'];

    if (!empty($lokasi)) {
        move_uploaded_file($lokasi, "../assets/gbr/$namaphoto");
        $edit = mysqli_query($koneksi, "update posting set judul='$judul',isi_berita='$isi_berita',level='$level',photo='$namaphoto',tanggal='$tanggal' where idp= '$idp'");
    } else {
        $edit = mysqli_query($koneksi, "update posting set judul='$judul',isi_berita='$isi_berita',level='$level',tanggal='$tanggal' where idp= '$idp'");
    }

    if (!$edit) {
        echo "<script>window.location='../index.php?page=posting&status=g_edit' </script>";
    } else {
        echo "<script>window.location='../index.php?page=posting&status=b_edit' </script>";
    }
}
?>



<!--USER  -->
<!-- Simpan User -->
<?php
if (isset($_POST["simpanuser"])) {
    $gbr = $_FILES['gbr']['name'];
    $lokasi = $_FILES['gbr']['tmp_name'];
    move_uploaded_file($lokasi, "../../assets/imgu/$gbr");
    session_start();
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $level = $_POST["level"];
    $no_hp = $_POST["no_hp"];

    $simpan = mysqli_query($koneksi, "insert into user values('$id','$gbr','$nama','$username','$email','$password','$level','$no_hp')");

    if (!$simpan) {
        echo "<script>window.location='../index.php?page=useradd&status=g_simpan' </script>";
    } else {
        echo "<script>window.location='../index.php?page=useradd&status=b_simpan' </script>";
    }
}
?>

<!-- Hapus User -->
<?php
if (isset($_GET['hapususer'])) {
    $id = $_GET['hapususer'];
    $hapus = mysqli_query($koneksi, "delete from user where id='$id'");

    if (!$hapus) {
        echo "<script>window.location='../index.php?page=user&status=g_hapus' </script>";
    } else {
        echo "<script>window.location='../index.php?page=user&status=b_hapus' </script>";
    }
}
?>

<!-- Edit User -->
<?php
if (isset($_POST["edit_user"])) {
    $gbr = $_FILES['gbr']['name'];
    $lokasi = $_FILES['gbr']['tmp_name'];
    move_uploaded_file($lokasi, "../../assets/imgu/$gbr");
    session_start();
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $level = $_POST["level"];
    $no_hp = $_POST["no_hp"];

    $edit = mysqli_query($koneksi, "UPDATE user set gbr ='$gbr',nama='$nama',username='$username',email='$email',password='$password',level='$level',no_hp='$no_hp' where id='$id'");

    if (!$edit) {
        echo "<script>window.location='../index.php?page=user&status=g_edit' </script>";
    } else {
        echo "<script>window.location='../index.php?page=user&status=b_edit' </script>";
    }
}
?>



<!-- Pesan -->
<!-- Hapus Pesan -->
<?php
if (isset($_GET['hapuspesan'])) {
    $idm = $_GET['hapuspesan'];
    $hapus = mysqli_query($koneksi, "delete from pesan where idm='$idm'");

    if (!$hapus) {
        echo "<script>window.location='../index.php?page=msg&status=g_hapus' </script>";
    } else {
        echo "<script>window.location='../index.php?page=msg&status=b_hapus' </script>";
    }
}
?>


<!-- Tes Download -->

<?php
if (isset($_GET['judul'])) {
    $judul = $_GET['judul'];
    $lokasi = "../assets/word/";
    $file = $lokasi . $_GET['judul'];

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: private');
        header('Pragma: private');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);

        exit;
    } else {
        $_SESSION['pesan'] = "Oops! File - $filename - not found ...";
        header("location:index.php?page=cari");
    }
}
?>
