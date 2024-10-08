<?php

use App\Models\GlobalModel;
use App\Models\PegawaiModel;

$pegawaiModel = new PegawaiModel();
$globalModel = new GlobalModel();
$pegawai = $pegawaiModel->where('NIK', session()->get('username'))->first();
$levelManagement = $globalModel->getLevelManagement(session()->get('level'))->getResult();
$variables = array_column($levelManagement, 'menu');
?>

<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="template/color-admin-master/assets/img/user-13.jpg" alt="" /></a>
                </div>
                <div class="info">
                    <?= session()->get('username') ?>
                    <small><?= @$pegawai->Nama ?></small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <?php
            $dashboard = in_array('dashboard', $variables) ?? true;
            if ($dashboard or session()->get('level') == 1) {
            ?>
                <li>
                    <a href="<?= base_url() ?>">
                        <!-- <b class="caret pull-right"></b> -->
                        <i class="fa fa-laptop bg-blue"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            <?php
            }
            $master = in_array('master', $variables) ?? true;
            if ($master or session()->get('level') == 1) {
            ?>
                <li class="has-sub">
                    <a href="javascript:;">
                        <span class="caret pull-right"></span>
                        <i class="fa fa-inbox bg-red"></i>
                        <span>Master</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="Agama">Agama</a></li>
                        <li><a href="Departemen">Departemen</a></li>
                        <li><a href="Goldarah">Golongan Darah</a></li>
                        <li><a href="StatusKeluarga">Hubungan Keluarga</a></li>
                        <li><a href="Jabatan">Jabatan</a></li>
                        <li><a href="TingkatDidik">Pendidikan</a></li>
                        <li><a href="StatusPegawai">Status Kepegawaian</a></li>
                        <li><a href="Aktif">Status Aktif</a></li>
                    </ul>
                </li>
            <?php
            }
            $keluarga = in_array('keluarga', $variables) ?? true;
            if ($keluarga or session()->get('level') == 1) {
            ?>
                <li>
                    <a href="Keluarga">
                        <i class="fa fa-users bg-info"></i>
                        <span>Riwayat Keluarga</span>
                        <!-- <span class="label label-theme m-l-5">NEW</span> -->
                    </a>
                </li>
            <?php
            }
            $pendidikan = in_array('pendidikan', $variables) ?? true;
            if ($pendidikan or session()->get('level') == 1) {
            ?>
                <li>
                    <a href="Pendidikan">
                        <i class="fa fa-graduation-cap bg-grey"></i>
                        <span>Riwayat Pendidikan</span>
                        <!-- <span class="label label-theme m-l-5">NEW</span> -->
                    </a>
                </li>
            <?php
            }
            $pelatihan = in_array('pelatihan', $variables) ?? true;
            if ($pelatihan or session()->get('level') == 1) {
            ?>
                <li>
                    <a href="Pelatihan">
                        <i class="fa fa-book bg-warning"></i>
                        <span>Riwayat Pelatihan/Diklat</span>
                        <!-- <span class="label label-theme m-l-5">NEW</span> -->
                    </a>
                </li>
            <?php
            }
            $pegawaiMenu = in_array('pegawai', $variables) ?? true;
            if ($pegawaiMenu or session()->get('level') == 1) {
            ?>
                <li>
                    <?php echo session()->get('level') == 3 ? "<a href='pegawai/detail/" . session()->get('username') . "'>" : "<a href='pegawai'>" ?>
                    <i class="fa fa-user bg-purple"></i>
                    <span>Data Pegawai</span>
                    <!-- <span class="label label-theme m-l-5">NEW</span> -->
                    </a>
                </li>
            <?php
            }
            $kepegawaian = in_array('kepegawaian', $variables) ?? true;
            if ($kepegawaian or session()->get('level') == 1) {
            ?>
                <li class="has-sub">
                    <a href="javascript:;">
                        <span class="caret pull-right"></span>
                        <i class="fa fa-inbox bg-yellow"></i>
                        <span>Kepegawaian</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="TrJabatan">Jabatan</a></li>
                        <li><a href="Berkala">Berkala</a></li>
                    </ul>
                </li>
            <?php
            }
            $laporan = in_array('laporan', $variables) ?? true;
            if ($laporan or session()->get('level') == 1) {
            ?>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-file-o bg-green"></i>
                        <span>Laporan
                    </a>
                    <ul class="sub-menu">
                        <li><a href="form_elements.html">Biodata Saya</a></li>
                    </ul>
                </li>
            <?php }
            $Admin = in_array('Admin', $variables) ?? true;
            if ($Admin or session()->get('level') == 1) {
            ?>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-file-o bg-black"></i>
                        <span>Admin
                    </a>
                    <ul class="sub-menu">
                        <li><a href="Level">Hak Akses</a></li>
                    </ul>
                </li>
            <?php } ?>
            <!-- begin sidebar minify button -->
            <!-- <li>
                <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
            </li> -->
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>

<div class="sidebar-bg"></div>