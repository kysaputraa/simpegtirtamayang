<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>TM - Login SIMPEG</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="template/color-admin-master/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/css/animate.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/css/style.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="template/color-admin-master/assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <style>
        .backgroundlogin {
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body class="pace-top bg-white">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="images/tm2.jpg" class="backgroundlogin" data-id="login-cover-image" alt="" />
                </div>
                <div class="news-caption">
                    <h4 class="caption-title"><i class="fa fa-diamond text-success"></i> SIMPEG</h4>
                    <p>
                        Sistem Informasi Kepegawai Perumdam Tirta Mayang Kota Jambi
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <!-- <span class="logo"></span> -->
                        SIMPEG
                        <small>Sistem Informasi Manajemen Kepegawaian</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <?php echo $this->include('layout/flash_data') ?>
                    <form action="ceklogin" method="POST" enctype="multipart/form-data" class="margin-bottom-0">
                        <div class="form-group m-b-15">
                            <input type="text" class="form-control input-lg" placeholder="Username" name="username" required />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" class="form-control input-lg" placeholder="Password" name="password" required />
                        </div>
                        <div class="checkbox m-b-30">
                            <label>
                                <input type="checkbox" /> Remember Me
                            </label>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Masuk</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            SIMPEG - Tirta Mayang Kota Jambi
                        </div>
                        <hr />
                        <p class="text-center">
                            &copy; TM - Kota Jambi
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->

    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="template/color-admin-master/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
    <script src="template/color-admin-master/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="template/color-admin-master/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="template/color-admin-master/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
		<script src="template/color-admin-master/assets/crossbrowserjs/html5shiv.js"></script>
		<script src="template/color-admin-master/assets/crossbrowserjs/respond.min.js"></script>
		<script src="template/color-admin-master/assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
    <script src="template/color-admin-master/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="template/color-admin-master/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="template/color-admin-master/assets/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script>
    </script>
</body>

</html>