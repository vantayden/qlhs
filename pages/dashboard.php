<?php
$title = 'Quản trị hệ thống';
include('../includes/user.php');
if(!$user->logged())
	header('Location: dang-nhap');
include('../includes/header.php');
include('../includes/topnav.php');
?>


    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
<?php
include('../includes/footer.php');
?>