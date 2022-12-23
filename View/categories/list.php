<?php view('static/header'); ?>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= URL.'cikis'; ?>" class="nav-link">Çıkış Yap</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php view('static/sidebar'); ?>
  <div class="content-wrapper p-5">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header ">
                    <h3 class="card-title ">Kategoriler</h3>
                    <div class="card-tools">
                    <a href="<?= url('categories/add') ?>" class="btn btn-sm btn-dark">Ekle</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    
                    <?php echo get('message') ? '<div class="alert alert-'.get('type').'">'.get('message').'</div>' : null ?>

                    <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Başlık</th>
                            <th>Oluşturma tarihi</th>
                            <th>Güncelleme tarihi</th>
                            <th style="width: 40px">işlem</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1; foreach($data as $key => $value): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $value['title']; ?></td>
                        <td>
                            <?= $value['created_date'];?>
                        </td>
                        <td>
                            <?= $value['updated_date'];?>
                        </td>
                        <td>
                            <div class=" btn-group btn-group-sm">
                                <a class="btn btn-sm btn-danger" href="<?= url('categories/remove/'.$value['id']) ?>">
                                    Sil
                                </a>
                                <a class="btn btn-sm btn-warning" href="<?= url('categories/edit/'.$value['id']) ?>">
                                    Güncelle
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php view('static/footer'); ?>
</div>
<script src="<?= assets('plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= assets('js/adminlte.min.js'); ?>"></script>
</body>
</html>