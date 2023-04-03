$(document).ready(function () {
    // Cargar los datos por defecto al cargar la página
    cargarDatos("");
  
    // Asignar el evento de búsqueda al input de búsqueda
    $("#busqueda-mascotas").keyup(function () {
      var buscar = $(this).val();
      cargarDatos(buscar);
    });
  });
  
  function cargarDatos(buscar) {
    // Hacer la petición AJAX
    $.ajax({
      url: "ajax/carga_usuario.php",
      type: "GET",
      dataType: "json",
      data: { buscar: buscar },
      success: function (resultados) {
        // Limpiar la tabla antes de agregar los datos
        var tbody = $("#tabla-mascotas tbody");
        tbody.empty();
  
        // Agregar los datos a la tabla
        $.each(resultados, function (index, mascota) {
          var tr = $("<tr>");
          tr.append("<td>" + mascota.username + "</td>");
          tr.append("<td>" + mascota.password + "</td>");
          tr.append("<td>" + mascota.email + "</td>");
          tr.append("<td>" + mascota.telefono + "</td>");
          tr.append("<td>" + mascota.status + "</td>");
          tr.append("<td>" + mascota.id_roles + "</td>");
         
          tr.append(
            "<td><button data-bs-toggle='modal' data-bs-target='#exampleModal' class='editar-mascota' data-id='" +
              mascota.id_usuario +
              "'>Editar</button></td>"
          ); // Botón de edición
          tr.append(
            "<td><button class='eliminar-mascota' data-id='" +
              mascota.id_usuario +
              "'>Eliminar</button></td>"
          ); // Botón de eliminación
          tbody.append(tr);
        });
        // Asignar el evento de click al botón de edición
        $(".editar-mascota").click(function () {
          var idMascota = $(this).data("id");
          //************************************************************************************** */
          // Hacer la petición AJAX para obtener los datos de la mascota a editar
          $.ajax({
            url: "ajax/obtener_usuario.php?id=" + idMascota,
            type: "GET",
            dataType: "json",
            success: function (mascota) {
              // Llenar los campos del formulario con los datos de la mascota a editar
              $("#username").val(mascota.username);
              $("#password").val(mascota.password);
              $("#email").val(mascota.email);
              $("#telefono").val(mascota.telefono);
              $("#status").val(mascota.status);
              $("#id_roles").val(mascota.id_roles);
            
  
              // Cambiar el texto del botón de submit para indicar que se está editando
              $("button[type='submit']").text("Editar");
  
              // Agregar el atributo data-id al formulario para enviar el ID de la mascota a editar
              $("#form_mascotas").attr("data-id", idMascota);
            },
            error: function () {
              alert("Error al obtener los datos de la mascota");
            },
          });
        });
        /************************************************************************************************* */
        // Asignar el evento de click al botón de eliminación
        $(".eliminar-mascota").click(function () {
          var idUsuario = $(this).data("id");
  
          // Hacer la petición AJAX para eliminar el registro
          $.ajax({
            url: "eliminarusua.php?id=" + idUsuario,
            type: "GET",
            success: function () {
              alert("usuario eliminado exitosamente");
              // Recargar la tabla de mascotas para mostrar los cambios
              cargarDatos("");
            },
            error: function () {
              alert("Error al eliminar la mascota");
            },
          });
        });
      },
      error: function () {
        alert("Error al cargar los datos");
      },
    });
  }
  
  $("#form_mascotas").submit(function (event) {
    event.preventDefault(); // detiene el envío del formulario
    guardarMascota(); // llama a la función para guardar la mascota
  });
  function guardarMascota() {
    var datos = $("#form_mascotas").serialize(); // serializa los datos del formulario
    $.ajax({
      url: "gusuario.php", // archivo PHP para procesar los datos
      type: "post",

      data: datos,
      success: function (response) {
        alert("Usuario guardado exitosamente");
        $("#form_mascotas")[0].reset();
  
        // hacer algo en respuesta exitosa del servidor
        cargarDatos("");
      },
      error: function (xhr, status, error) {
        alert("Error al guardar la mascota");
        // manejar el error del servidor
      },
    });
  }
  