<?php $sess = $this->auth->getSessAdmin(); ?>
<?php $myLevel = $this->auth->myLevel() ?>
<!-- Left side column. contains the logo and sidebar -->
<?php $seg2 = $this->uri->segment(1) ?>
<?php $seg3 = $this->uri->segment(2) ?>
<?php $seg4 = $this->uri->segment(3) ?>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url() ?>public/themes/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $sess['sess_nama'] ?></p>
        <p><small><sup>CRUD</sup>HMVC</small></p>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION </li>
      <li class="<?php echo ($seg3 == 'dashboard' ? 'active' : '') ?>">
        <a href="<?php echo site_url('user/dashboard') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
        </a>
      </li>
      <li class="treeview 
        <?php echo ($seg3 == 'mahasiswa' ? 'active' : '') ?>">
        <a href="#">
          <i class="fa fa-gears"></i>
          <span>Master Data</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo ($seg3 == 'mahasiswa' ? 'active' : '')?>" ><a href="<?php echo site_url('user/mahasiswa') ?>"><i class="fa fa-circle-o"></i>Data Mahasiswa</a></li>
        </ul>
      </li>
      <li class="header">MENU TAMBAHAN</li>
      <?php if ($myLevel==1): ?>
      <li class="<?php echo ($seg3 == 'admin' ? 'active' : '') ?>">
        <a href="<?php echo site_url('user/admin') ?>">
          <i class="fa fa-user"></i> <span>Administrator</span></i>
        </a>
      </li>  
      <?php endif ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>