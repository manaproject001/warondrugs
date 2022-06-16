<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
<?php echo view('v_alert');?>

    <div class="page-header">
        <h3 class="page-title" onclick="myFunct()"> Jenis Narkoba </h3>
        <button type="button" class="nav-link btn btn-success create-new-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Input Jenis Narkoba</button>
        
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pelaku</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Pelaku</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Data Jenis Narkoba</h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Jenis Narkoba</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($jenisnarkoba as $jenis) : ?>
                            <tr>
                                <td><?= $no; $no++ ?></td>
                                <td><?= $jenis['jenis_narkoba'] ?></td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#edit<?=$jenis['id_jenis_narkoba']?>" type="button" class="btn btn-warning btn-sm btn-icon-text">
                                        <i class="mdi mdi-pencil btn-icon-prepend"></i> Edit 
                                    </button>
                                    <a type="button" class="btn btn-danger btn-sm btn-icon-text" data-href="<?= base_url('admin/data/jenis_narkoba/'.$jenis['id_jenis_narkoba'].'/delete') ?>" onclick="confirmToDelete(this)">
                                        <i class="mdi mdi-close btn-icon-prepend"></i> Hapus 
                                    </a>
                                    <div class="modal fade" id="edit<?=$jenis['id_jenis_narkoba']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Input Data jenis Narkoba</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-sample" action="<?=base_url('admin/data/jenis_narkoba/'.$jenis['id_jenis_narkoba'].'/edit')?>" method="post" id="text-editor">
                                                <div class="mb-3">
                                                    <label for="jenis_narkoba" class="col-form-label">Nama jenis narkoba:</label>
                                                    <input type="text" class="form-control" id="jenis_narkoba" name="jenis_narkoba" value="<?=$jenis['jenis_narkoba']?>">
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="status" value="simpan" class="btn btn-success">Simpan</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="h2">Anda yakin ingin menghapus?</h2>
        <p>Data akan hilang</p>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Data jenis Narkoba</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-sample" action="<?=base_url('admin/data/jenis_narkoba/create')?>" method="post" id="text-editor">
          <div class="mb-3">
            <label for="jenis_narkoba" class="col-form-label">Nama jenis narkoba:</label>
            <input type="text" class="form-control" id="jenis_narkoba" name="jenis_narkoba">
          </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="status" value="simpan" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function confirmToDelete(el){
    $("#delete-button").attr("href", el.dataset.href);
    $("#confirm-dialog").modal('show');
}
</script>
<script>
      function myFunct(){
        <?php echo 'swal("Good job!", "You clicked the button!", "success")';
        ?>
        
      }
    </script>

<?= $this->endSection() ?>