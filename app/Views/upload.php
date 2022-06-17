<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('content') ?>
	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Upload Gambar </h2>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
    	<div class="col-lg-12">
    		 <!-- Success Upload -->
	        <?php if(!empty(session()->getFlashdata('berhasil'))){ ?>
	            <div class="alert alert-success">
	                <?php echo session()->getFlashdata('berhasil');?>
	            </div>
	        <?php } ?>
	        <div class="alert alert-error">
	        <?php 
	            $errors = $validation->getErrors();
	            if(!empty($errors))
	            {
	                echo $validation->listErrors('list');
	            }
	        ?>
            </div>
    		<?= form_open_multipart(base_url('upload/proses')); ?>
    		<div class="row">
    			<div class="col-md-4">
    				<label>Judul</label>
    				<div class="form-group">
                   		 <input type="text" name="judul" class="form-control"> 
                	</div>	
    			</div>
    			<div class="col-md-4">
    				<label>File</label>
    				<div class="form-group">
                   		 <input type="file" name="file_upload" class="with-validation-filepond"> 
                	</div>	    			
                </div>
                <div class="col-12 col-md-6">
                
            </div>
    			<div class="col-md-4">
    				<label>Aksi</label>
    				<div class="form-group">
                   		  <?= form_submit('Send', 'Simpan') ?> 
                	</div>	
    			</div>
    		</div>
    		<?= form_close() ?>
    	</div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
			<table class="table table-bordered">
		        <tr>
		            <th>No</th>
		            <th>Judul</th>
		            <th>Gambar</th>
		        </tr>
		        	<?php foreach($gambar as $row):?>
		        <tr>
		        	<td><?=$row['id'];?></td>
		            <td><?=$row['judul'];?></td>
		            <td><img src="<?=base_url('assets/images/'.$row['gambar']);?>" width="100"></td>
		        </tr>
		        <?php endforeach;?>
		    </table>
		</div>
	</div>
<?= $this->endSection() ?>