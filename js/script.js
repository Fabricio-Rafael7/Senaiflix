$(document).ready(function() {

    function limpaFormularioCEP() {
        $("#endereco").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }

    $("#cep").blur(function() {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep !== "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {
                $("#endereco").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {
                        $("#endereco").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade); // Ajuste: propriedade correta
                        $("#uf").val(dados.uf);
                    } else {
                        limpaFormularioCEP();
                        alert("CEP não encontrado.");
                    }
                });
            } else {
                limpaFormularioCEP();
                alert("Formato de CEP inválido.");
            }
        } else {
            limpaFormularioCEP();
        }
    });
});


function confirmarRemocao() {
    return confirm('Tem certeza de que deseja remover este usuário?');
}
