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
                    <a href="<?= url('todo/add') ?>" class="btn btn-sm btn-dark">Ekle</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    
                    <?php echo get('message') ? '<div class="alert alert-'.get('type').'">'.get('message').'</div>' : null ?>
                    
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Kategori</th>
                            <th>Başlangıç</th>
                            <th>Bitiş</th>
                            <th>İlerleme</th>
                            <th style="width: 40px">işlem</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1; foreach($data as $key => $value): ?>
                    <tr id="row_<?= $value['id']; ?>">
                        <td><?= $value['title']; ?></td>
                        <td><?= $value['category_title']; ?></td>
                        <td>
                            <?= $value['start_date'];?>
                        </td>
                        <td>
                            <?= $value['end_date'];?>
                        </td>
                        <td>
                          <?= $value['progress'];?>%
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger " style="width: <?= $value['progress'];?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-<?= status($value['status'])['color'] ?>"><?= status($value['status'])['title'] ?></span></td>
                        <td>
                            <div class=" btn-group btn-group-sm">
                                <button type="button" class="btn btn-sm btn-danger" onclick="removeTodo(<?= $value['id'] ?>)">
                                    Sil
                                </button>
                                <a class="btn btn-sm btn-warning" href="<?= url('todo/edit/'.$value['id']) ?>">
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
<script src="<?= assets('plugins/sweetalert2/sweetalert2.all.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

  function removeTodo(id){
      let formData = new FormData();

      formData.append('id',id);
      axios.post('<?= url('api/removetodo') ?>',formData).then(res => {

        if (res.data.id) {
           let row = document.getElementById('row_'+res.data.id);
           row.remove();
        }

      swal.fire(
      res.data.title,
      res.data.msg,
      res.data.status);

      console.log(res)
      }).catch(err => console.log(err))
  }

</script>
</body>
</html>