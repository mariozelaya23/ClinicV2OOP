//uploading the user picture

$(".nuevaFoto").change(function(){

    //storing in image variable the information of the file to uploaded (input type="file"), is the index 0 because is one picture
    var imagen = this.files[0];
    // console.log("imagen", imagen);

    //validating image format jpg or png
    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png")
    {
        //cleaning the input
        $(".nuevaFoto").val("");

        Swal.fire({
            icon: 'error',
            title: 'La imagen debe estar en formato JPG o PNG!!',
            showConfirmButton: true,
            confirmButtonText: 'Cerrar',
            closeOnConfirm: false
        })
     //validating image size   
    }else if(imagen["size"] > 5000000)
    {
        //cleaning the input
        $(".nuevaFoto").val("");

        Swal.fire({
            icon: 'error',
            title: 'La imagen no debe de pesar mas de 5MB!!',
            showConfirmButton: true,
            confirmButtonText: 'Cerrar',
            closeOnConfirm: false
        })
    }else
    {
        //FileReader javascript class to read files
        var datosImgen = new FileReader;

        //reading the image (variable imagen above) as URL
        datosImgen.readAsDataURL(imagen);

        //when image is load, we use event
        $(datosImgen).on("load", function(event){

            //creating image route
            var rutaImagen = event.target.result;

            //<img src="views/img/users/default/user.png" class="img-thumbnail previsualizar" width="100px">
            //previsualize image
            $(".previsualizar").attr("src", rutaImagen)
        })
    }

})


//EDITAR USUARIO
$(".btnEditarUsuario").click(function(){

    //storing in a variable what btnEditarUsuario brings in the attribute idUsuario
    var idUsuario = $(this).attr("idUsuario");
    //testing with the javascript console if the user id it's been shown on the console
    // console.log("idUsuario", idUsuario);

    //preparing everything to use ajax to bring data from the database
    //creating a new variable FormData, then appending the POST variable to the variable above
    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    //ajax
    $.ajax({

        //ajax file route
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        //on respuesta we bring what comes from the database
        success: function(respuesta)
        {
            //testing what respuesta brings
            // console.log("respuesta", respuesta);

            //printing the values from usuarios.ajax.php -> ajaxEditarUsuario() -> asked to -> ctrMostrarUsuario($item, $valor), from public function, this bring json values
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["role"]);

            //keeping the user picture in value just in case the user does not change the role when editing (hidden input)
            $("#fotoActual").val(respuesta["fotoActual"]);

            //keeping the role in value just in case the user does not change the role when editing
            $("#editarPerfil").val(respuesta["role"]);

            //keeping the password in value just in case the user does not change the role when editing (hidden input)
            $("#passwordActual").val(respuesta["password"]);

            //bringing the image
			if(respuesta["foto"] != "")
			{
				$(".previsualizar").attr("src", respuesta["foto"]);
			}
        }

    });

})