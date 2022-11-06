// DATA TABLES ACTIVATION
// THIS IS FOR THE CLASS TABLE1, BUT ON THE WRAPPER SECTION YOU NEED TO USE THE TABLE ID
$(function () {
    $(".table1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#dtUsuarios_wrapper .col-md-6:eq(0)');
    // $('#dtUsuarios').DataTable({
    //   "paging": false,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });