<!-- /. NAV SIDE  -->

<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2>Admin Dashboard</h2>
        </div>
    </div>

    <!-- /. ROW  -->
    <!-- query count user -->
    <?php $sql = $koneksi->query("select count(nama) as jumlah from user"); ?>
    <?php while ($data = $sql->fetch_assoc()) { ?>
        <?php $jumlah = $data['jumlah']; ?>
    <?php } ?>

    <!--query count news  -->
    <?php $sql = $koneksi->query("select count(judul) as total from posting"); ?>
    <?php while ($data = $sql->fetch_assoc()) { ?>
        <?php $total = $data['total']; ?>
    <?php } ?>

    <!-- Pesan(notif) -->
    <?php $sql = $koneksi->query("select count(pesan) as jp from pesan"); ?>
    <?php while ($data = $sql->fetch_assoc()) { ?>
        <?php $jp = $data['jp']; ?>
    <?php } ?>


    <hr />
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-group"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"> <?= $jumlah; ?></p>
                    <p class="text-muted">User</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?= $total ?></p>
                    <p class="text-muted">News</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?= $jp; ?></p>
                    <p class="text-muted">Message</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">XXX</p>
                    <p class="text-muted">XXX</p>
                </div>
            </div>
        </div>
    </div>
    <p></p>
    <div id='calendar'></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid']
            });
            calendar.render();
        });
    </script>