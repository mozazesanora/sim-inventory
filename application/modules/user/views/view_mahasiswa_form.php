<?php $this->load->view('themes/backend/header') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/themes/backend/plugins/datatables/jquery.dataTables.min.css">
<?php $this->load->view('themes/backend/sidebar') ?>
<div class="content-wrapper">
	<section class="content-header">
	    <h1>
	      Data Mahasiswa
	      <small>Contoh CRUD Menggunakan Codeigniter HMVC</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="<?php echo site_url('user/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
	      <li class="active">Data Mahasiswa</li>
	    </ol>
	</section>
  	<!-- Main content -->
	<section class="content">
		<div class="row" id="dashboard">
	      	<div class="col-md-12">
	      		<div class="box box-primary box-solid">
		          	<div class="box-header with-border">
			            <h3 class="box-title">Daftar Kinerja</h3>
			            <div class="box-tools pull-right">
			              <a onclick="window.history.back();" class="btn btn-danger" type="button">
			                <span>Kembali</span>
			              </a>
			            </div>
		        	</div>
		        	<div class="box-body">
		        		<form class="form-horizontal" action="<?php echo $url?>" method="post" id="form" enctype="multipart/form-data">
		        			<div class="form-group">
				                <label class="control-label col-sm-2">Nama Mahasiswa</label>
				                <div class="col-sm-5">
				                  <input class="form-input form-control" name="post[mahasiswa_nama]" placeholder="Isi Nama Mahasiswa" type="text" required value='<?php echo @$data->mahasiswa_nama ?>'>
				                </div>
			            	</div>
				            <div class="form-group">
				                <label class="control-label col-sm-2">NIM</label>
				                <div class="col-sm-5">
				                  <input class="form-input form-control" name="post[mahasiswa_nim]" placeholder="Isi Nim Mahasiswa" type="text" value='<?php echo @$data->mahasiswa_nim ?>' required>
				                </div>
				            </div>
				            <div class="form-group">
				                <label class="control-label col-sm-2">Alamat</label>
				                <div class="col-sm-5">
				                  <textarea id='ckeditor' class="form-input form-control" name="post[mahasiswa_alamat]" required=""><?php echo @$data->mahasiswa_alamat ?></textarea>
				                </div>
				            </div>
				            <div class="form-group">
						        <label class="control-label col-sm-2">Foto Mahasiswa </label>
						        <div class="col-sm-6">
						            <input type="file" class="form-input form-control" name="file">
						            <div id='bukti_keterangan'>
						              	<b>NB:</b> Maks. <b>5MB</b>. Filetype JPG|JPEG|PNG
						            </div>
						        </div>
						        <?php if (@$data->mahasiswa_foto){ ?>
						        <div class="col-sm-3">
						        	<img width="120px" height="160px" src="<?php echo base_url()?>uploads/mahasiswa/foto/<?php echo $data->mahasiswa_foto ?>">
						        </div>
						        <?php }?>
						    </div>
						    <div class="form-group">
				                <div class="col-sm-10 col-sm-offset-2">
				                  <button class="btn btn-primary" type="submit">Proses</button> 
				                </div>
				            </div>
		        		</form>
		        	</div>
		    	</div>
	      	</div>
	    </div>
	</section>
</div>
<?php $this->load->view('themes/backend/footer-script'); ?>
<script type="text/javascript" src="<?php echo base_url() ?>public/themes/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/themes/backend/plugins/datatables/dataTables.bootstrap.min.js"></script>
<?php $this->load->view('themes/backend/footer'); ?>