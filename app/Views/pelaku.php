<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Daftar Pelaku </h3>
        <a class="nav-link btn btn-success create-new-button" href="<?=site_url('admin/pelaku/tambah')?>">+ Input Pelaku</a>
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
                <h4 class="card-title">Data Pelaku</h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Profil</th>
                        <th>Jenis Narkoba</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($pelakus as $pelaku) : ?>
                            <tr>
                                <td><?= $no; $no++ ?></td>
                                <td><?= $pelaku['nama'] ?></td>
                                <td><?= $pelaku['jenis_kelamin'] ?></td>
                                <td><?= $pelaku['profil'] ?></td>
                                <td><?php $no=1; foreach ($details as $detail) : ?>
                                    <?= $detail['id_jenis_narkoba'] ?>
                                    <?php endforeach ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/pelaku/'.$pelaku['id_pelaku'].'/edit') ?>" type="button" class="btn btn-warning btn-sm btn-icon-text">
                                        <i class="mdi mdi-pencil btn-icon-prepend"></i> Edit 
                                    </a>
                                    <a type="button" class="btn btn-danger btn-sm btn-icon-text" data-href="<?= base_url('admin/pelaku/'.$pelaku['id_pelaku'].'/delete') ?>" onclick="confirmToDelete(this)">
                                        <i class="mdi mdi-close btn-icon-prepend"></i> Hapus 
                                    </a>
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
        <h2 class="h2">Are you sure?</h2>
        <p>The data will be deleted and lost forever</p>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<script>
function confirmToDelete(el){
    $("#delete-button").attr("href", el.dataset.href);
    $("#confirm-dialog").modal('show');
}
</script>
<?= $this->endSection() ?>