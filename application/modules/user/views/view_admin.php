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
			            <h3 class="box-title">Daftar Admin</h3>
			            <div class="box-tools pull-right">
			              <a href="<?php echo base_url()?>user/admin/action/" class="btn btn-primary" id="btnTambah" type="button">
			                <span>Tambah</span>
			              </a>
			            </div>
		        	</div>
		        	<div class="box-body">
		        		<?php echo showAlert($alert); ?>
		        		<table class="table table-bordered" id="datatables">
			                <thead>
			                  <th>#</th>
			                  <th>Alias</th>
			                  <th>Username</th>
			                  <th>Admin Level</th>
			                  <th style="width:210px">Action</th>
			                </thead>
		                	<tbody>
		                  <?php $no = 1; $total = 0; ?>
		                  <?php foreach($data as $d): ?>
			                <tr>
			                    <td><?php echo $no ?></td>
			                    <td><?php echo $d->admin_alias ?></td>
			                    <td><?php echo $d->admin_username ?></td>
			                    <td><?php echo adminLevel($d->admin_level_id) ?></td>
			                    <td>
			                      <a href="<?php echo base_url()?>user/admin/action/<?php echo $d->admin_username?>" class="label label-primary" >Edit</a>
			                      <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="<?php echo base_url()?>user/admin/delete/<?php echo $d->admin_username?>" class="label label-danger">Hapus</a>     
			                    </td>
			                </tr>
		                 	<?php $no++; ?>
		                	<?php endforeach ?>
		                	</tbody>
		              	</table>
		        	</div>
		    	</div>
	      	</div>
	    </div>
	 </section>
</div>
<?php $this->load->view('themes/backend/footer-script'); ?>
<script type="text/javascript" src="<?php echo base_url() ?>public/themes/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/themes/backend/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$("#datatables").dataTable();
</script>
<?php $this->load->view('themes/backend/footer'); ?>