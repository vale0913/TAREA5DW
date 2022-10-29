<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <title>Crud_Alumnos</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">Tarea Erickson V11</h1>
          <hr style="background-color: black; color:black; height: 1px;">
        </div> 
      </div>
      <div class="row">
        <div class="col-md-12 mt-2">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ingresar Alumno
          </button>

          <!-- Modal Insert -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ingreso de Alumnos</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="" method="post" id="form">
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" id="nombre" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Apellido</label>
                    <input type="text" id="apellido" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Direccion</label>
                    <input type="text" id="direccion" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">DPI</label>
                    <input type="text" id="dpi" class="form-control" title="El dpi valido consta de 13 digitos" maxlenght="15">
                  </div>
                  <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="tel" id="movil" class="form-control" pattern="[0-9]{9}" title="Un numero valido consta de 8 digitos">
                  </div>
                  <div class="form-group">
                    <label for="">Correo Electronico</label>
                    <input type="text" id="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Estado</label>
                    <select name="inactivo" id="inactivo" class="form-control chosen-select">
                    <option value="">Seleccione un estado...</option>
                    <option value="0">Activa</option>
                    <option value="1">Inactiva</option>
                    </select>
                  </div>
                </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrar">Cerrar</button>
                  <button type="button" class="btn btn-primary" id="guarda">Guardar Cambios</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal edit -->
          <div class="modal fade" id="edit_Modal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel2">Edicion de Alumnos</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="" method="post" id="edit_form">
                    <input type="hidden" id="edit_modal_id" value="">
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" id="edit_nombre" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Apellido</label>
                    <input type="text" id="edit_apellido" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Direccion</label>
                    <input type="text" id="edit_direccion" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">DPI</label>
                    <input type="text" id="edit_dpi" class="form-control" title="El dpi valido consta de 13 digitos" maxlenght="15">
                  </div>
                  <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="tel" id="edit_movil" class="form-control" pattern="[0-9]{9}" title="Un numero valido consta de 8 digitos">
                  </div>
                  <div class="form-group">
                    <label for="">Correo Electronico</label>
                    <input type="text" id="edit_email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Estado</label>
                    <select name="inactivo" id="edit_inactivo" class="form-control chosen-select">
                    <option value="">Seleccione un estado...</option>
                    <option value="0">Activa</option>
                    <option value="1">Inactiva</option>
                    </select>
                  </div>
                </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrar">Cerrar</button>
                  <button type="button" class="btn btn-primary" id="actualiza">Actualizar Cambios</button>
                </div>
              </div>
            </div>
          </div>
        </div> <!--clase col-md-->   
      </div>  
        <div class="row">
          <div class="col-md-12 mt-3">
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Direccion</th>
                  <th>Dpi</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Fecha Creacion</th>
                  <th>Usuario</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody id="tbody">

              </tbody>
            </table>
          </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script>
      $(document).on("click","#guarda", function(e){
        e.preventDefault();
        
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var direccion = $("#direccion").val();
        var movil = $("#movil").val();
        var email = $("#email").val();
        var inactivo = $("#inactivo").val();
        var dpi = $("#dpi").val();
        var user = '1';
        

        $.ajax({
          url: "<?php echo base_url(); ?>insert",
          type: "post",
          dataType: "json",
          data: {
            nombre: nombre,
            apellido: apellido,
            direccion: direccion,
            movil: movil,
            email: email,
            inactivo: inactivo,
            user: user,
            dpi: dpi          
          },
          success: function(data){   
            
            if(data.message=="Alumno Agregado"){
              
              fetch();
              $('#exampleModal').modal('hide');
              $("#form")[0].reset();
              
              Command: toastr["success"](data.message)
              toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "2500",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }
            }else{
              Command: toastr["warning"]('No se puede agregar ya que falta uno o mas campos')
              toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "2500",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }
            }       
          }          
        });
        $("#form")[0].reset();
      });

      function fetch(){
        $.ajax({
          url: "<?php echo base_url();?>fetch",
          type: "post",
          dataType: "json",
          success: function(data){
            var tbody="";
            for(var key in data){
              tbody += "<tr>";
              tbody += "<td>"+data[key]['alumno']+"</td>";
              tbody += "<td>"+data[key]['nombre']+"-"+data[key]['apellido']+"</td>";
              tbody += "<td>"+data[key]['direccion']+"</td>";
              tbody += "<td>"+data[key]['dpi']+"</td>";
              tbody += "<td>"+data[key]['movil']+"</td>";
              tbody += "<td>"+data[key]['email']+"</td>";
              tbody += "<td>"+data[key]['fecha_creacion']+"</td>";
              tbody += "<td>"+data[key]['user']+"</td>";
                if(data[key]['inactivo']==0){
                  tbody += "<td>"+"Activo"+"</td>";
                }else{
                  tbody += "<td>"+"Inactivo"+"</td>";
                }
              tbody += `<td> 
                          <a href="#" id="del" class="btn btn-sm btn-outline-danger" value="${data[key]['alumno']}">Borrar</a> 
                          <a href="#" id="edit" class="btn btn-sm btn-outline-info" value="${data[key]['alumno']}">Editar</a>
                        </td>`;
              tbody += "/<tr>";
            }
            $("#tbody").html(tbody);
          }
        });
      }
      fetch();

      $(document).on("click", "#del", function(e){
        e.preventDefault();
        var del_id = $(this).attr("value");
        if(del_id == ""){
          $('#exampleModal').modal('hide');
              Command: toastr["error"]('Error al borrar')
              toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "2500",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }
        }else{
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger mr-2'
            },
            buttonsStyling: false
          });

          swalWithBootstrapButtons.fire({
            title: 'Esta seguro de borrar?',
            text: "No se puede recuperar esta informacion!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Borrar!',
            cancelButtonText: 'Cancelar!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {

              $.ajax({
                url: "<?php echo base_url();?>eliminar",
                type: "post",
                dataType: "json",
                data:{
                  del_id: del_id
                },
                success: function(data){
                  
                  if(data.responce == "success"){
                    swalWithBootstrapButtons.fire(
                      'Eliminado!',
                      'El estudiante fue eliminado',
                      'success'
                    )
                    fetch();
                  }

                }
              });
              
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelado',
                'El estudiante no fue eliminado',
                'error'
              )
            }
          });
        }
      });
     
      $(document).on("click", "#edit", function(e) {
        e.preventDefault();

        var edit_id = $(this).attr("value");
        if (edit_id == "") {
            alert("Edit id required");
        } else {
            $.ajax({
              url: "<?php echo base_url();?>edit",
              type: "post",
              dataType: "json",
              data: {
                edit_id: edit_id
              },
              success: function(data){
                if(data.responce == "success"){
                  $('#edit_Modal').modal('show');
                  $('#edit_modal_id').val(data.post.alumno);
                  $('#edit_nombre').val(data.post.nombre);
                  $('#edit_apellido').val(data.post.apellido);
                  $('#edit_direccion').val(data.post.direccion);
                  $('#edit_dpi').val(data.post.dpi);
                  $('#edit_movil').val(data.post.movil);
                  $('#edit_email').val(data.post.email);
                  $('#edit_inactivo').val(data.post.inactivo);

                }else{
                  Command: toastr["error"]('Error al actualizar')
                  toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "2500",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                  }
                }
                

              }
            });
        }
    });

    $(document).on("click", "#actualiza", function(e){
      e.preventDefault();
      var edit_id = $("#edit_modal_id").val();
      var edit_nombre = $("#edit_nombre").val();
      var edit_apellido = $("#edit_apellido").val();
      var edit_direccion = $("#edit_direccion").val();
      var edit_dpi = $("#edit_dpi").val();
      var edit_movil = $("#edit_movil").val();
      var edit_email = $("#edit_email").val();
      var edit_user = '1';
      var edit_inactivo = $("#edit_inactivo").val();
      console.log(edit_movil);
      if(edit_id == "" || edit_nombre == "" || edit_apellido == "" || edit_direccion == "" || edit_dpi == "" || edit_movil == "" || edit_email == "" || edit_inactivo == null){
          Swal.fire(
            'No podemos actualizar',
            'parece que se te ha olvidado uno o mas datos',
            'question'
          )
      }else{
        $.ajax({
          url: "<?php echo base_url();?>update",
          type: "post",
	        dataType: "json",
          data:{
            edit_id: edit_id,
            edit_nombre: edit_nombre,
            edit_apellido: edit_apellido,
            edit_direccion: edit_direccion,
            edit_movil: edit_movil,
            edit_email: edit_email,
            edit_inactivo: edit_inactivo,
            edit_dpi: edit_dpi,
            edit_user: edit_user
          },
          success: function(data){
            if(data.messagge == "Alumno Actualizado"){ 
              fetch();             
              $('#edit_Modal').modal('hide');
              
              Command: toastr["error"]('No se pudo actualizar')
              toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "2500",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
              }
              
            }else{
              $('#edit_Modal').modal('hide');
              Command: toastr["success"](data.message)
              toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "2500",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
              }
              fetch();
            }  
          }
        });
      }
      $("#form")[0].reset();
    });
    </script>
  </body>
</html>
