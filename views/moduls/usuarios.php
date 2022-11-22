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

            <?php
              
              //creating object to bring all the user information
              $usuarios = ControladorUsuarios::ctrMostrarUsuarios();

              //returns an array, we are ok!!
              //var_dump($usuarios);

              //using for each to show the array
              foreach($usuarios as $key => $value)
              {
                //testing array values
                //var_dump($value["nombre"]);

                echo '
                <tr>
                  <td>'.$value["usuarioid"].'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>';//closing first echo
                  
                  //validating if the image is empty
                  if($value["foto"] != "")
                  {
                    //showing photo from the database
                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else
                  {
                    //showing the default image
                    echo '<td><img src="views/img/users/default/user.png" class="img-thumbnail" width="40px"></td>';

                  }
                  
                  echo'
                  <td>'.$value["role"].'</td>';
                  
                  if($value["estado"] != 0)
                  {
                    //the class btnActivar will be use in usuarios.js
                    //with the attr idUsuario I'm getting the user id, this value will be use in usuarios.js
                    //with the attr estadoUsuario I'm getting the user state, 0 means deactive
                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["usuarioid"].'" estadoUsuario="0">Activado</button></td>';
                  }else
                  {
                    //the class btnActivar will be use in usuarios.js
                    //with the attr idUsuario I'm getting the user id, this value will be use in usuarios.js
                    //with the attr estadoUsuario I'm getting the user state, 1 means active
                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["usuarioid"].'" estadoUsuario="1">Desactivado</button></td>';
                  }
                  
                  echo'
                  <td>'.$value["ultimo_login"].'</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["usuarioid"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pen"></i></button>
                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </td>
                </tr>
                ';
              }
            
            ?>

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
                
                <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Ingresar Usuario" required>

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


<!-- MODAL EDITAR USUARIO -->
<div class="modal fade" id="modalEditarUsuario">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form method="POST" enctype="multipart/form-data">

        <div class="modal-header" style="background: #343a40; color:white">

          <h4 class="modal-title">Editar Usuario</h4>
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
                
                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- Usuario -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                
                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>

            <!-- Password -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                
                <input type="password" class="form-control input-lg" name="editarPass" placeholder="Escriba la nueva contrasena">

                <!-- this input contains the current password it will hidden -->
                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- Perfil -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                
                <select class="form-control input-lg" name="editarPerfil" required>

                  <option value="" id="editarPerfil"></option>
                  <option value="Administrador">Administrador</option>
                  <option value="Medico">Médico</option>
                  <option value="Asistente">Asistente</option>

                </select>

              </div>

            </div>

            <!-- Foto -->
            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>
              <input type="file" class="nuevaFoto" name="editarFoto">
              <p class="help-block">Peso maximo de la foto 5MB</p>
              <img src="views/img/users/default/user.png" class="img-thumbnail previsualizar" width="100px">

              <!-- Sending the current image -->
              <input type="hidden" id="fotoActual" name="fotoActual">

            </div>

          </div>

        </div>

        <div class="modal-footer justify-content-between">

          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Modificar Usuario</button>

        </div>

        <!-- adding PHP object that will helps us to save the user -->
        <?php
          
          //this variable will instantiate the class controladorUsuarios
          $editarUsuario = new ControladorUsuarios();

          //from that class we are going execute the method that's going to save the users
          $editarUsuario -> ctrEditarUsuario();

        ?>

      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->