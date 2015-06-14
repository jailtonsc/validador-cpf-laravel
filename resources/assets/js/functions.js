/**
 * FUNÇÕES JAVASCRIPT
 */
$(document).ready(function () {
    //ATIVA O BREADCRUMBS
    $(document).on('click', '.salvar', function (){

        var valid = $('#form').validator('validate');

        //SE A VALIDAÇÃO ESTIVER OK
        if (!valid[0].checkValidity()) {
            return;
        }
    }).on('focus', '.mask_data', function () {
            $(".mask_data").setMask("99/99/9999");
            $(".data").datepicker({
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior'
            });
        }).on('focus', '.mask_cpf', function () {
            $(".mask_cpf").setMask("999.999.999-99");
        }).on('focus', '.mask_hora', function () {
            $(".mask_hora").setMask("99:99");
        }).on('focus', '.mask_cep', function () {
            $(".mask_cep").setMask("99999-999");
        }).on('focus', '.mask_celular', function () {
            $('.mask_celular').setMask('(99) 9999-9999');
        }).on('focus', '.mask_telefone', function () {
            var valor = $(this).val();

            $(this).unsetMask();
            if (valor[5] == '9') {
                $(this).setMask('(99) 99999-9999');
            } else {
                $(this).setMask('(99) 9999-9999');
            }
        }).on('keyup', '.mask_telefone', function () {
            var valor = $(this).val();

            $(this).unsetMask();
            if (valor[5] == '9') {
                $(this).setMask('(99) 99999-9999');
            } else {
                $(this).setMask('(99) 9999-9999');
            }
        }).on('focus', '.mask_moeda', function () {
            $('.mask_moeda').maskMoney({symbol: '', decimal: ',', thousands: '.'});
        }).on('focus', '.mask_percentage', function () {
            $('.mask_percentage').maskMoney({symbol: '', decimal: ',', thousands: '.', suffix: '%'});
        }).
        //CARRAGE O COMBOBOX INFORMADO
        on('change', '.combobox', function () {
            var url = $(this).attr('data-url');
            var comboDestino = $('#' + $(this).attr('data-combo-destino'));
            var estado = $(this).val();

            comboDestino.html('<option value="">Carregando...</option>');
            $.post(url, {valor: estado, _token: $('input[name="_token"]').val()}, function (data) {
                comboDestino.html('<option value="">Selecione um Registro</option>');
                $.each(data, function (item, obj) {
                    comboDestino.append($("<option />").val(obj.id).text(obj.nome));
                });
            });
        }).on('click', '.newsletter_salvar', function (){
            if ($('#form_newsletter #email').val() == ''){
                alert('Informe um e-mail.');
                return false;
            }

            $.post('/newsletter', $('#form_newsletter').serialize(), function (data) {
                alert('E-mail cadastrado com sucesso.');
            }).fail(function(data) {
                var errors = $.parseJSON(data.responseText);
                alert(errors.email[0]);
                $('#form_newsletter #email').val('');
            });
        });
});


/**
 * #############################################################
 * ################ TODAS AS FUNÇÔES ###########################
 * #############################################################
 */

function ajax(form, url, tipo){
    $.ajax({
        url: url,
        data: $('#'+form).serialize(),
        type: tipo,
        beforeSend: function () {
            //$('#loading').attr('style', 'display: block');
        },
        complete: function () {
            //$('#loading').removeAttr('style');
        },
        success: function (data) {
            //VERIFICA SE A OPERAÇÃO FOI REALIZADA
            if (data.success) {
                openDialog('S', data.message, null, urlSuccess);
            } else {
                //RETORNA O ERRO PARA OS OBJETOS
                $.each(data.errors, function (i, item) {
                    //FOCA O CURSOR NO PRIMEIRO ERRO
                    if (i == 0) {
                        //MOSTRA O CAMPO DO PRIMEIRO ERRO
                        document.getElementById(item.field).scrollIntoView(false);
                        openDialog('E', data.message, null, null);
                    }

                    var group = $('input[name="' + item.field + '"]').closest('div.form-group').addClass('has-error');
                    var block = group.find('.help-block.with-errors');
                    block.data('bs.validator.originalContent') === undefined && block.data('bs.validator.originalContent', block.html())
                    block.empty().append(item.message);
                });
            }
        }
    });
}


function database(form, url, urlSuccess, param) {

    if (param == undefined){
        param = $(form).serialize();
    }
    var valid = $(form).validator('validate');

    //SE A VALIDAÇÃO ESTIVER OK 
    if (valid[0].checkValidity()) {

        $.ajax({
            url: url,
            data: param,
            type: 'post',
            beforeSend: function () {
                $('#loading').attr('style', 'display: block');
            },
            complete: function () {
                $('#loading').removeAttr('style');
            },
            success: function (data) {
                //VERIFICA SE A OPERAÇÃO FOI REALIZADA
                if (data.success) {
                    openDialog('S', data.message, null, urlSuccess);
                } else {
                    //RETORNA O ERRO PARA OS OBJETOS
                    $.each(data.errors, function (i, item) {
                        //FOCA O CURSOR NO PRIMEIRO ERRO
                        if (i == 0) {
                            //MOSTRA O CAMPO DO PRIMEIRO ERRO
                            document.getElementById(item.field).scrollIntoView(false);
                            openDialog('E', data.message, null, null);
                        }

                        var group = $('input[name="' + item.field + '"]').closest('div.form-group').addClass('has-error');
                        var block = group.find('.help-block.with-errors');
                        block.data('bs.validator.originalContent') === undefined && block.data('bs.validator.originalContent', block.html())
                        block.empty().append(item.message);
                    });
                }
            }
        });
    } else {
        //$(form).find(":invalid").first().focus();
        openDialog('E', 'Ocorreu um erro na operação.', null, null);
    }
}

function excluir(url, urlSuccess, msg, htmlPrimeiroBt, method) {
    if (msg == undefined){
        msg = 'Tem certeza que deseja excluir o registro?';
    }

    if (htmlPrimeiroBt  == undefined){
        htmlPrimeiroBt = '<i class="ace-icon fa fa-trash-o bigger-110"></i>&nbsp; Excluir';
    }

    $("#dialog").html('<p class="bigger-110 bolder center grey">'+msg+'</p>');
    $("#dialog").removeClass('hide').dialog({
        resizable: false,
        modal: true,
        title: '<div class="widget-header"><h4 class="smaller"><i class="ace-icon fa fa-exclamation-triangle red"></i> Confirme a operação.</h4></div>',
        title_html: true,
        buttons: [
            {
                html: htmlPrimeiroBt,
                "class": "btn btn-danger btn-xs",
                click: function () {
                    $(this).dialog("close");
                    $.ajax({
                        url: url,
                        data: $('#form').serialize(),
                        type: method,
                        beforeSend: function () {
                            $('#loading').attr('style', 'display: block');
                        },
                        complete: function () {
                            $('#loading').removeAttr('style');
                        },
                        success: function (data) {
                            //VERIFICA SE A OPERAÇÃO FOI REALIZADA
                            if (data.success) {
                                openDialog('S', data.message, null, urlSuccess);
                                return true;
                            } else {
                                openDialog('E', data.message, null, null);
                                return false;
                            }
                        }
                    });
                }
            },
            {
                html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancelar",
                "class": "btn btn-xs",
                click: function () {
                    $(this).dialog("close");
                    return false;
                }
            }
        ]
    });
}

function carregar(id, url, param, type){
    $.ajax({
        url: url,
        data: param,
        type: type,
        beforeSend: function () {
            $('#loading').attr('style', 'display: block');
        },
        complete: function () {
            $('#loading').removeAttr('style');
        },
        success: function (data) {
            $(id).html(data);
            eventos();
        }
    });
}

function validCpf(obj) {
    str = $(obj).val().replace('.', '');
    str = str.replace('.', '');
    str = str.replace('-', '');

    cpf = str;
    var numeros, digitos, soma, i, resultado, digitos_iguais;
    digitos_iguais = 1;
    if (cpf.length < 11) {
        obj.setCustomValidity('CPF inválido.');
        return false;
    }
    for (i = 0; i < cpf.length - 1; i++) {
        if (cpf.charAt(i) != cpf.charAt(i + 1)) {
            digitos_iguais = 0;
            break;
        }
    }
    if (!digitos_iguais) {
        numeros = cpf.substring(0, 9);
        digitos = cpf.substring(9);
        soma = 0;
        for (i = 10; i > 1; i--) {
            soma += numeros.charAt(10 - i) * i;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) {
            return false;
        }
        numeros = cpf.substring(0, 10);
        soma = 0;
        for (i = 11; i > 1; i--) {
            soma += numeros.charAt(11 - i) * i;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1)) {
            obj.setCustomValidity('CPF inválido.');
            return false;
        }
        obj.setCustomValidity('');
    } else {
        obj.setCustomValidity('CPF inválido.');
        return false;
    }
}


function calcularIdade(obj) {
    var dataNasc = $(obj).val();
    var idadeMin = $(obj).attr('data-age-min');

    var dataAtual = new Date();
    //Ex: Tue Mar 27 2012 09:43:24
    var anoAtual = dataAtual.getFullYear();
    var mesAtual = dataAtual.getMonth() + 1;
    var anoNascParts = dataNasc.split('/');

    var diaNasc = anoNascParts[0];
    var mesNasc = anoNascParts[1];
    var anoNasc = anoNascParts[2];

    var idade = anoAtual - anoNasc;

    //se mês atual for menor que o nascimento,não faz aniversario ainda.
    if (mesAtual < mesNasc) {
        idade--;
    } else {
        //se tiver no mes do nasc,verificar o dia
        if (mesAtual <= mesNasc) {
            if (dataAtual.getDay() < diaNasc) {
                //se a data atual for menor que o dia de nascimento,quer dizer que ele ainda não fez aniversario
                idade--;
            }
        }
    }
    if (parseInt(idade) < parseInt(idadeMin)) {
        obj.setCustomValidity('Idade mínima de ' + idadeMin + '.');
        return false;
    }
    obj.setCustomValidity('');
    return true;
}


