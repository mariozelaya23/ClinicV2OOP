<!-- Content Wrapper. Contains page content -->  <!-- CONTENT -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Administrar Usuarios</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>

      </div>

      <div class="card-body">
        
        <table id="dtUsuarios" class="table table-bordered table-striped table1">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Ultimo login</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Mario Zelaya</td>
              <td>marioz</td>
              <td><img src="views/img/users/default/user.png" class="img-thumbnail" width="40px"></td>
              <td>Administrador</td>
              <td><button class="btn btn-success btn-xs">Activado</button></td>
              <td></td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"><i class="fa fa-pen"></i></button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>

      </div>
      <!-- /.card-body -->
    
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper --> <!-- CONTENT -->


<!-- MODAL AGREGAR USUARIO -->
<div class="modal fade" id="modalAgregarUsuario">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form method="POST" enctype="multipart/form-data">

        <div class="modal-header" style="background: #343a40; color:white">

          <h4 class="modal-title">Agregar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body">

          <div class="card-body">

            <!-- Nombre -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>

              </div>

            </div>

            <!-- Usuario -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                
                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" required>

              </div>

            </div>

            <!-- Password -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                
                <input type="password" class="form-control input-lg" name="nuevoPass" placeholder="Ingresar Contrasena" required>

              </div>

            </div>

            <!-- Perfil -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                
                <select class="form-control input-lg" name="nuevoPerfil" required>

                  <option value="">Seleccionar Perfil</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Medico">Médico</option>
                  <option value="Asistente">Asistente</option>

                </select>

              </div>

            </div>

            <!-- Foto -->
            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>
              <input type="file" class="nuevaFoto" name="nuevaFoto">
              <p class="help-block">Peso maximo de la foto 5MB</p>
              <img src="views/img/users/default/user.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <div class="modal-footer justify-content-between">

          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Usuario</button>

        </div>

        <!-- adding PHP object that will helps us to save the user -->
        <?php
          
          //this variable will instantiate the class controladorUsuarios
          $crearUsuario = new ControladorUsuarios();

          //from that class we are going execute the method that's going to save the users
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

