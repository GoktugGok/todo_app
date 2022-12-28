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
                <div class="card-header">
                  <h3 class="card-title">Profiliniz</h3>
                </div>
                <?php echo get_session('error') ? '<div class="alert alert-'.$_SESSION['error']['type'].'">'.$_SESSION['error']['message'].'</div>' : null ?>

                <form id="profile" action="" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="isim">İsim</label>
                      <input type="text" class="form-control" id="isim">
                    </div>
                    <div class="form-group">
                      <label for="soyisim">Soyisim</label>
                      <input type="text" class="form-control" id="description">
                    </div>
                    <div class="form-group">
                      <label for="email">E-Posta</label>
                      <input type="text" class="form-control" id="email">
                    </div>

                    
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                  </div>
                </form>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Şifrenizi Değiştirin</h3>
                </div>
                <?php echo get_session('error') ? '<div class="alert alert-'.$_SESSION['error']['type'].'">'.$_SESSION['error']['message'].'</div>' : null ?>

                <form id="password_change" action="" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="old_password">Geçerli Şifreniz</label>
                      <input type="password" class="form-control" id="old_password">
                    </div>
                    <div class="form-group">
                      <label for="password">Yeni Şifreniz</label>
                      <input type="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                      <label for="password_again">Tekrar Şifreniz</label>
                      <input type="password" class="form-control" id="email">
                    </div>

                    
                  </div>

                  <div class="card-footer">
                    <button type="submit" name="submit" value="1" class="btn btn-primary">Güncelle</button>
                  </div>
                </form>
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
<script src="<?= assets('plugins/sweetalert2/sweetalert2.all.js');?>"></script>
<script src="<?= assets('js/adminlte.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

  const todo = document.getElementById('todo');

  let progress = document.getElementById('progress');

  progress.addEventListener('change',(e) =>{
    console.log(progress.value);
  })

  todo.addEventListener('submit',(e) => {

    let title = document.getElementById('title').value;
    let description = document.getElementById('description').value; 
    let category_id = document.getElementById('category_id').value;
    let color = document.getElementById('color').value;
    let start_date = document.getElementById('start_date').value;
    let end_date = document.getElementById('end_date').value;
    let start_date_time = document.getElementById('start_date_time').value;
    let end_date_time = document.getElementById('end_date_time').value;
    let status = document.getElementById('status').value;
    let progress = document.getElementById('progress').value;



    let formData = new FormData();

    formData.append('title',title);
    formData.append('description',description);
    formData.append('category_id',category_id);
    formData.append('color',color);
    formData.append('start_date',start_date);
    formData.append('end_date',end_date);
    formData.append('start_date_time',start_date_time);
    formData.append('end_date_time',end_date_time);
    formData.append('status',status);
    formData.append('progress',progress);

    
    
    axios.post('<?= url('api/addtodo') ?>',formData).then(res => {

      if(res.data.redirect){
        window.location.href = res.data.redirect;
      }else{
        swal.fire(
        res.data.title,
        res.data.msg,
        res.data.status
      );
      }
      console.log(res)
    }).catch(err => console.log(err))

    e.preventDefault();
  })

</script>
</body>
</html>