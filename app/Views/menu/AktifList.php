<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/flash_data') ?>

<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Tables</a></li>
    <li class="active">Managed Tables</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">DATA Status Pegawai<small class="text-capitalize"> Master Status Pegawai</small></h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Data Status Pegawai - Perumdam Tirta Mayang Kota Jambi</h4>
                <a href="#" data-target='#modaltambah' data-toggle="modal"><span class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</span></a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width='50'>NO</th>
                                <th>Kode</th>
                                <th>Status Pegawai</th>
                                <th width='70px'>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($Aktif as $row) {
                                echo "<tr class='clickedrow' data-id='" . $row->KdAktif . "'>";
                                echo "<td class='text-center'>" . $no . "</td>";
                                echo "<td>" . $row->KdAktif . "</td>";
                                echo "<td>" . $row->Aktif . "</td>";
                                echo "<td>";
                                echo "<span><a data-id='" . $row->id . "' data-toggle='modal' data-target='#modaledit' class='btn btn-info btn-icon btn-sm' ><i class='fa fa-pencil fa-lg'></i></a></span> ";
                                echo "<span><a onClick='return confirm(`Apakah anda yakin ingin menghapus data ini ?`)' href='Aktif/delete/" . $row->id . "' type='button' class='btn btn-danger btn-icon btn-sm' title='delete'><i class='fa fa-trash-o fa-lg'></i></a></span> ";
                                echo "</tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
</div>

<div id="modaltambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Tambah</span> Silahkan isi data di bawah untuk menambah data .</h5>
            </div>
            <form role="form" action="Aktif/add" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Kode</label>
                        <input type="text" class="form-control" name="KdAktif" value="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status Aktif</label>
                        <input type="text" class="form-control" name="Aktif" value="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-green"> Tambah Data </button>
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modaledit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="label label-inverse"> # Edit</span> Silahkan isi data di bawah untuk update data .</h5>
            </div>
            <form role="form" action="Aktif/edit" method="post" enctype="multipart/form-data">
                <div class="modal-body hasiledit">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-green"> Edit Data </button>
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    table {
        overflow: auto;
    }

    /* 

    .table tbody tr {
        cursor: pointer;
    }

    .table tbody tr:hover td {
        background-color: #aeaeae;
    }
         */
</style>

<script>
    $(document).ready(function() {
        TableManageDefault.init();
    });

    $('#modaledit').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            url: '<?= base_url('Aktif/modaledit') ?>',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                $('.hasiledit').html(data);
            }
        })
    });
</script>
<?= $this->endSection() ?>