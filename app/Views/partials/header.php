<div id="header" class="header navbar navbar-default navbar-fixed-top">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <div class="collapse navbar-collapse pull-left" id="top-navbar">
            <ul class="nav navbar-nav">
                <li>
                    <a href="javascript:;" data-click="sidebar-minify"><i class="fa fa-bars" style="font-size: 20px"></i></a>
                </li>
            </ul>
        </div>
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
            <a href="#" class="navbar-brand"><span class="navbar-logo"></span> SIMPEG</a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- end mobile sidebar expand / collapse button -->

        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-right">
            <li>
                <div class="navbar-form full-width">
                    <div class="form-group">
                        <input type="text" class="form-control searchnama" placeholder="Cari Pegawai" />
                        <button type="submit" class="btn btn-search">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                    <i class="fa fa-bell-o"></i>
                    <span class="label">5</span>
                </a>
                <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                    <li class="dropdown-header">Notifications (5)</li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left">
                                <i class="fa fa-bug media-object bg-red"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">Server Error Reports</h6>
                                <div class="text-muted f-s-11">3 minutes ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left">
                                <img src="template/color-admin-master/assets/img/user-1.jpg" class="media-object" alt="" />
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">John Smith</h6>
                                <p>
                                    Quisque pulvinar tellus sit amet sem scelerisque
                                    tincidunt.
                                </p>
                                <div class="text-muted f-s-11">25 minutes ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left">
                                <img src="template/color-admin-master/assets/img/user-2.jpg" class="media-object" alt="" />
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">Olivia</h6>
                                <p>
                                    Quisque pulvinar tellus sit amet sem scelerisque
                                    tincidunt.
                                </p>
                                <div class="text-muted f-s-11">35 minutes ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left">
                                <i class="fa fa-plus media-object bg-green"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">New User Registered</h6>
                                <div class="text-muted f-s-11">1 hour ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left">
                                <i class="fa fa-envelope sidebar-menu bg-blue"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">New Email From John</h6>
                                <div class="text-muted f-s-11">2 hour ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-footer text-center">
                        <a href="javascript:;">View more</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="template/color-admin-master/assets/img/user-13.jpg" alt="" />
                    <span class="hidden-xs"><?= session()->get('username') ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInLeft">
                    <li class="arrow"></li>
                    <li><a href="pegawai/detail/<?= session()->get('username') ?>">Edit Profile</a></li>
                    <!-- <li>
                        <a href="javascript:;"><span class="badge badge-danger pull-right">2</span>
                            Inbox</a>
                    </li>
                    <li><a href="javascript:;">Calendar</a></li>
                    <li><a href="javascript:;">Setting</a></li> -->
                    <li class="divider"></li>
                    <li><a href="logout">Log Out</a></li>
                </ul>
            </li>
        </ul>
        <!-- end header navigation right -->
    </div>
    <!-- end container-fluid -->
</div>

<script>
    $('.searchnama').keypress(function(e) {
        if (e.which == 13) {
            var inputan = $(this).val();
            var link = "<?= base_url('pegawai/pencarian/') ?>";
            // alert(link + inputan);
            window.location.href = link + inputan;
        }
    });
</script>