<!-- <div class="col-md-12"> -->
<?php
$session = \Config\Services::session();

if ($session->getFlashdata('sukses')) {
?>
    <div class="alert alert-success fade in">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        <i class="fa fa-info fa-2x pull-left"></i>
        Sukses : <?php echo $session->getFlashdata('sukses') ?>
    </div>
<?php } else if ($session->getFlashdata('gagal')) { ?>
    <div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        <i class="fa fa-info fa-2x pull-left"></i>
        Gagal : <?php echo $session->getFlashdata('gagal') ?>
    </div>
<?php } ?>
<!-- </div> -->