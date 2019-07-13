<?php
session_start();
session_destroy();
?>

<!-- mengalihkan halaman sambil mengirim pesan logout -->
<div align="center">
    <h2>Anda telah berhasil logout..</h2>
    Silahkan klik <a href="../index.php?pesan=logout">disini</a> untuk login kembali
</div>