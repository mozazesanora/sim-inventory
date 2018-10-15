<?php $this->load->view('themes/backend/header') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/themes/backend/plugins/datatables/jquery.dataTables.min.css">
<?php $this->load->view('themes/backend/sidebar') ?>
<div class="content-wrapper">
	<section class="content-header">
	    <h1>
	      Data Administrator
	      <small>Contoh CRUD Menggunakan Codeigniter HMVC</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="<?php echo site_url('user/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
	      <li class="active">Data Administrator</li>
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
				                <label class="control-label col-sm-2">Username</label>
				                <div class="col-sm-4">
				                  <input class="form-control" name="post[admin_username]" placeholder="input username" value="<?php echo @$data->admin_username?>" type="text" required>
				                </div>
				            </div>
				            <div class="form-group">
				                <label class="control-label col-sm-2">Alias</label>
				                <div class="col-sm-5">
				                  <input class="form-control" name="post[admin_alias]" placeholder="input alias" value="<?php echo @$data->admin_alias?>" type="text" required>
				                </div>
				            </div>
				            <div class="form-group">
				                <label class="control-label col-sm-2">Password</label>
				                <div class="col-sm-5">
				                  <input class="form-control" name="post[admin_password]" placeholder="input password" value="<?php echo @$data->admin_password?>" type="password" required>
				                  <input type="hidden" value="<?php echo @$data->admin_password?>" name="pass_lama">
				                </div>
				            </div>
				            <div class="form-group">
				                <label class="control-label col-sm-2">Level</label>
				                <div class="col-sm-4">
				                    <select class="form-control" name="post[admin_level_id]" required>
				                    	<option value="">-- Pilih --</option>
				                    	<?php for ($i=1; $i <= 3; $i++) { ?>
				                    	<option value="<?php echo $i ?>" <?php echo $i==@$data->admin_level_id?"selected":""; ?> ><?php echo adminLevel($i); ?></option>
				                    	<?php } ?>
				                    </select>
				                </div>
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