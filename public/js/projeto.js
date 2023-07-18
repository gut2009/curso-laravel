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

$('#mascara_valor').mask('#.##0,00', { reverse: true });


$("#cep").blur(function () {
    var cep = $(this).val().replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            $("#logradouro").val("");
            $("#bairro").val(" ");
            $("#endereco").val(" ");
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                if (!("erro" in dados)) {
                    $("#logradouro").val(dados.logradouro.toUpperCase());
                    $("#bairro").val(dados.bairro.toUpperCase());
                    $("#endereco").val(dados.localidade.toUpperCase());
                }
                else {
                    alert("CEP não encontrado de forma automatizado digite manualmente ou tente novamente.");
                }
            });
        }
    }
});

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