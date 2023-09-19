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

  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }

$("#cep").blur(function () {
    var cep = $(this).val().replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            $("#endereco").val(""); //logradouro
            $("#complemento").val(""); //complemento
            $("#bairro").val(" "); //bairro
            $("#cidade").val(" "); //localidade
            $("#uf").val(" "); //uf
            $("#cep").val(" "); //cep
            
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                if (!("erro" in dados)) {
                    $("#endereco").val(dados.logradouro.toUpperCase());
                    $("#complemento").val(dados.complemento.toUpperCase());
                    $("#bairro").val(dados.bairro.toUpperCase());
                    $("#cidade").val(dados.localidade.toUpperCase());
                    $("#uf").val(dados.uf.toUpperCase());
                    $("#cep").val(dados.cep.toUpperCase());
                }
                else {
                    alert("CEP não encontrado de forma automatizado digite manualmente ou tente novamente.");
                }
            });
        }
    }
});

// function excluirQualquer() {

// if(confirm('Deseja excluir o registro???'))

//     $('.excluir-qualquer').click(function() {
//     var idQualquer = $(this).data('id');
    
//     // Altera o conteúdo e o ID do modal de acordo com o item selecionado
//     $('#modal-excluir-qualquer .modal-body').html('Tem certeza que deseja excluir o item ' + idQualquer + '?');
//     $('#modal-excluir-qualquer').attr('data-id', idQualquer);
    
//     // Abre o modal
//     $('#modal-excluir-qualquer').modal('show');
//   });
  
//   $('#modal-excluir-qualquer .btn-confirmar').click(function() {
//     var idQualquer = $('#modal-excluir-qualquer').attr('data-id');
    
//     // Fecha o modal
//     $('#modal-excluir-qualquer').modal('hide');
    
//     // Remove o código do modal da página
//     $('#modal-excluir-qualquer').remove();
    
//     // Exibe a mensagem de sucesso ou erro
//     // ...
//   });

// }

/*  VER app\Models\Componentes.php --> outra forma
    Esta abaixo não funcionou. Na paginação inclui ponto indevidamente
// $('#mascara_valor').mask('#.##0,00', { reverse: true });
*/

/*

function mask($val, $mask)
{
    $maskared = '';
    $k = 0;
    for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
        if ($mask[$i] == '#') {
            if (isset($val[$k])) {
                $maskared .= $val[$k++];
            }
        } else {
            if (isset($mask[$i])) {
                $maskared .= $mask[$i];
            }
        }
    }

    return $maskared;
}
*/

/*
EXEMPLO DE USO
mask($cnpj, '##.###.###/####-##');

echo mask($cnpj, '##.###.###/####-##').'<br>';
echo mask($cpf, '###.###.###-##').'<br>';
echo mask($cep, '#####-###').'<br>';
echo mask($data, '##/##/####').'<br>';
echo mask($data, '##/##/####').'<br>';
echo mask($data, '[##][##][####]').'<br>';
echo mask($data, '(##)(##)(####)').'<br>';
echo mask($hora, 'Agora são ## horas ## minutos e ## segundos').'<br>';
echo mask($hora, '##:##:##');
*/