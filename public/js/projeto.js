function deleteRegistroPaginacao(rotaURL, idDoRegistro) {
    if (confirm('Deseja confirmar a exclusão?')) {
      $.ajax({
          url: rotaURL,
          method: 'DELETE',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: { 
              id: idDoRegistro,
          },
          beforeSend: function () {
              $.blockUI({
                  message: 'Carregando...',
                  timeout: 2000,
              });
          },
    }).done(function (data) {
      $.unblockUI();
      if (data.success == true) {
        window.location.reload();
      } else {
        alert('Não foi possível buscar os dados');
      }
    }).fail(function (data) {
      $.unblockUI();
      alert('Não foi possível excluir');
    });
  }
}

$('#mascara_valor').mask('#.##0,00', { reverse: true})