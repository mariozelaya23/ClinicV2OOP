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