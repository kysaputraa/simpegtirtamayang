<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>SIMPEG | Tirta Mayang</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <base href="<?= base_url() ?>">

    <!-- ================== BEGIN BASE CSS STYLE ================== -->

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="template/color-admin-master/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/css/animate.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/css/style.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <!-- <link href="template/color-admin-master/assets/ionicons.min.css" rel="stylesheet" /> -->
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- Datatable -->
    <link href="template/color-admin-master/assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="template/color-admin-master/assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
    <!-- Datatable  -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="template/color-admin-master/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
    <script src="template/color-admin-master/assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- d3 chart -->
    <!-- <link href="template/color-admin-master/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
    <script src="template/color-admin-master/assets/js/chart-d3.demo.min.js"></script> -->

    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"> </script>

</head>

<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <?= $this->include('partials/header') ?>

        <!-- end #header -->

        <!-- begin #sidebar -->
        <?= $this->include('partials/sidebar') ?>
        <!-- end #sidebar -->

        <!-- begin #content -->
        <div id="content" class="content" style="background-color: #cccccc; font-weight: bold;">
            <?= $this->renderSection('content') ?>
        </div>
        <!-- end #content -->

        <div class="footer navbar-fixed-bottom text-center" style="background-color: #ffffff;">
            Perumdam Tirta Mayang Kota Jambi
        </div>

        <!-- begin theme-panel -->
        <!-- <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active">
                        <a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a>
                    </li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">
                        Sidebar Styling
                    </div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">
                        Sidebar Gradient
                    </div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control input-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">
                        Content Styling
                    </div>
                    <div class="col-md-7">
                        <select name="content-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">black</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- end theme-panel -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->

    <script src="template/color-admin-master/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="template/color-admin-master/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="template/color-admin-master/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="template/color-admin-master/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="template/color-admin-master/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- Datatable -->
    <script src="template/color-admin-master/assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
    <script src="template/color-admin-master/assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="template/color-admin-master/assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="template/color-admin-master/assets/js/table-manage-default.demo.min.js"></script>
    <script src="template/color-admin-master/assets/js/apps.min.js"></script>
    <!-- Datatable -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="template/color-admin-master/assets/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- chart js -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.2/d3.min.js"></script>
    <script src="template/color-admin-master/assets/plugins/nvd3/build/nv.d3.js"></script>
    <script src="template/color-admin-master/assets/js/chart-d3.demo.min.js"></script>
    <script src="template/color-admin-master/assets/js/apps.min.js"></script> -->
    <!-- chart js -->

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
</body>

</html>

<style>
    .nav li:hover {
        background-color: #eeeeee;
    }

    .nav li:hover ul {
        background-color: #fff;
    }

    .nav li:hover ul li a:hover {
        color: #000000;
        background-color: #fff;
    }

    .object-fit-cover {
        object-fit: cover;
    }

    .object-fit-scale-down {
        object-fit: scale-down;
    }
</style>