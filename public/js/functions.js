function ajaxErrors(jqXHR, textStatus) {
  //pageLoader.classList.remove('page-loader--show');
  if (jqXHR.status === 0) {
    swal.fire("Sin Conexion", "Verifique su conexion a internet!", "error");
  } else if (jqXHR.status == 404) {
    swal.fire("Error (404)", "No se encontro la pagina solicitada!", "error");
  } else if (jqXHR.status == 500) {
    swal.fire("Error (500)", "Hubo un Error en el Servidor!", "error");
  } else if (textStatus === 'parsererror') {
    swal.fire("Error", 'Requested JSON parse failed.', "error");
  } else if (textStatus === 'timeout') {
    swal.fire("Error", 'Time out error.', "error");
  } else if (textStatus === 'abort') {
    swal.fire("Error", 'Ajax request aborted.', "error");
  } else {
    swal.fire("Error", 'Uncaught Error: ' + jqXHR.responseText, "error");
  }
  $('#spinner').modal('hide');
}

// ---------------------------------------------------------------------------
function cargaVistaModal(vista, tipoModal = '', datos = null) {
  $('#spinner').modal('show');
  $.ajax({
    url     : vista,
    type    : 'POST',
    data    : {
      'datos' : datos,
    },
    headers : {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    success : function(data) {
      $('#tipo-modal').removeClass();
      switch(tipoModal) {
        case 'sm':
          var clases = 'modal-dialog modal-dialog-centered modal-sm';
          break;
        case 'lg':
          var clases = 'modal-dialog modal-dialog-centered modal-lg';
          break;
        case 'xl':
          var clases = 'modal-dialog modal-dialog-centered modal-xl';
          break;
        default:
          var clases = 'modal-dialog modal-dialog-centered';
          break;
      };
      $('#spinner').modal('hide');
      $('#tipo-modal').addClass(clases);
      $('.modal-content').html(data);
    },
  })
  .done(function() {
    $('#ventanaModal').modal('show');
  })
  .fail(ajaxErrors);
}

// ---------------------------------------------------------------------------
function cargaVistaModalGet(vista, tipoModal = '', datos = null) {
  $('#spinner').modal('show');
  $.ajax({
    url     : vista,
    type    : 'GET',
    headers : {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    success : function(data) {
      $('#tipo-modal').removeClass();
      switch(tipoModal) {
        case 'sm':
          var clases = 'modal-dialog modal-dialog-centered modal-sm';
          break;
        case 'lg':
          var clases = 'modal-dialog modal-dialog-centered modal-lg';
          break;
        case 'xl':
          var clases = 'modal-dialog modal-dialog-centered modal-xl';
          break;
        default:
          var clases = 'modal-dialog modal-dialog-centered';
          break;
      };
      $('#spinner').modal('hide');
      $('#tipo-modal').addClass(clases);
      $('.modal-content').html(data);
    },
  })
  .done(function() {
    $('#ventanaModal').modal('show');
  })
  .fail(ajaxErrors);
}

// ---------------------------------------------------------------------------
function sendData(metodo, form, csrf, ret) {

  var formData = new FormData($("#"+form)[0]);
  $.ajax({
    url         : metodo,
    type        : 'POST',
    data        : formData,
    cache       : false,
    contentType : false,
    processData : false,
    headers     : {
      'X-CSRF-TOKEN': csrf,
    },
    success     : function(resp) {
      if(resp == 'OK') {
        userUpdated(ret);
      }
    }
  });
}

// ---------------------------------------------------------------------------
function userUpdated(ret) {
  Swal.fire({
    timer: 2000,
    title: 'Usuario actualizado',
    icon: 'success',
    confirmButtonText: 'Ok',
    timerProgressBar: true,
  }).then((result) => {
    if(result.value || result.dismiss === swal.DismissReason.timer) {
      window.location.replace(ret);
    }
  })
}