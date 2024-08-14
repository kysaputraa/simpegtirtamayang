<?php

use App\Models\PegawaiModel;

$pegawaiModel = new PegawaiModel();
$pegawai = $pegawaiModel->where('NIK', session()->get('username'))->first();
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
            <li>
                <a href="<?= base_url() ?>">
                    <!-- <b class="caret pull-right"></b> -->
                    <i class="fa fa-laptop bg-blue"></i>
                    <span>Dashboard</span>
                </a>

            </li>
            <?php if (session()->get('level') < 3) { ?>
                <li class="has-sub">
                    <a href="javascript:;">
                        <span class="caret pull-right"></span>
                        <i class="fa fa-inbox bg-red"></i>
                        <span>Master</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="agama">Agama</a></li>
                        <li><a href="goldarah">Golongan Darah</a></li>
                        <li><a href="TingkatDidik">Pendidikan</a></li>
                        <li><a href="StatusKeluarga">Hubungan Keluarga</a></li>
                        <li><a href="StatusPegawai">Status Kepegawaian</a></li>
                        <li><a href="Aktif">Status Aktif</a></li>
                        <li><a href="Jabatan">Jabatan</a></li>
                    </ul>
                </li>
            <?php } ?>
            <li>
                <a href="pegawai">
                    <i class="fa fa-user bg-purple"></i>
                    <span>Data Pegawai</span>
                    <!-- <span class="label label-theme m-l-5">NEW</span> -->
                </a>
            </li>
            <?php if (session()->get('level') < 3) { ?>
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
            <?php } ?>
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