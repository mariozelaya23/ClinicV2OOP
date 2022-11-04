<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>SAC</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Ingresar al Sistema</p>

      <form method="post"><!-- removing action method, action method is not used on OOP -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="ingPassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
        
        <!-- creating object $login, this object will instantiate the a controller object ControladorUsuarios() (which is a class) -->
        <!-- with that now we have access to the class methods, with the simbol -> I'm triggering the method ctrIngresoUsuario() -->
        <?php
          
          $login = new ControladorUsuarios();
          $login -> ctrIngresoUsuario();

        ?>

      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->