<?php $this->load->view('themes/backend/header') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/themes/backend/plugins/datatables/jquery.dataTables.min.css">
<?php $this->load->view('themes/backend/sidebar') ?>
<div class="content-wrapper">
	<section class="content-header">
	    <h1>
	      Dashboard
	      <small>Contoh CRUD Menggunakan Codeigniter HMVC</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li class="active"><a href="<?php echo site_url('user/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
	    </ol>
	</section>
  	<!-- Main content -->
	<section class="content">
		<div class="row" id="dashboard">
	      	<div class="col-md-12">
	      	</div>
	    </div>
	 </section>
</div>
<?php $this->load->view('themes/backend/footer-script'); ?>
<script type="text/javascript" src="<?php echo base_url() ?>public/themes/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/themes/backend/plugins/datatables/dataTables.bootstrap.min.js"></script>
<?php $this->load->view('themes/backend/footer'); ?>