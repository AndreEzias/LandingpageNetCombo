$(document).ready(function () {
    forms.listener();
    forms.init();
});

var config = {
    validate: {
        0: {
            rules: {
                email: {
                    required: true
                    , email: true
                }
                , cep: {
                    required : true
                }
                , cpf: {
                    required : true
                    ,cpfBR : true
                }
            }
            , submitHandler: function (form) {
                forms.postLead(form);
                return false
            }
        }
        , 1: {
            rules: {
                telefone: {
                    required : true
                    ,phone : true
                }
                ,telefone_2 : {
                    phone: true
                }
                , address: "required"
                , state : "required"
                , city:"required"
                , number: "required"
                , name: "required"
            }
            , submitHandler: function (form) {
                forms.postLead(form);
                return false
            }
        }
    }
    ,mask : {
        telefone: '(00) 0000-0000'
        ,celular: '(00) 00000-0000'
        ,cep:'00000-000'
        ,number :'0*'
        ,state : 'ZZ'
    }
};

var forms = {
    init: function () {
        forms.validate();
        $.validator.messages.required = "Este campo é obrigatório";

        $("[name='telefone'],[name='telefone_2']").on('keyup', function () {
            $(this).maskTo($(this).getPhoneType());
        });
    }
    , listener: function () {
        $("#form-send").click(function () {
            $("form:visible").submit();
            return false;
        });
    }
    , postLead: function (form) {
        //var step = $(form).data('step');
        $.ajax({
            url: '/data?'+$(form).serialize()
            , dataType: 'json'
            , type: 'post'
            , error: function (data) {
                console.log(data);
                forms.step[0].exec(data);
            }
            , success: function (data) {
                $(form).hide('slow');
                var step =data.step;
                forms.step[step].exec(data);
                result = data;
            }
        });
    }
    , validate: function () {
        $('form').each(function (index) {
            $(this).validate(config.validate[index]);
        })
    }
    , setAddress:function (address) {
        $.each(address, function (index,value) {
            $("#"+index+"_field").val(value);
        });
    }
    , step: {
        0: {
            exec: function (data) {
                var response = $("#response");
                response.removeClass('d-none');
                response.find(".title").text(data.msg);
                response.find(".text").text(data.text);
                $("#form-send").hide();
                $("#close").text("fechar");
            }
        }
        , 1: {
            exec: function (data) {
                var form = $("#form_" + data.step);
                form.removeClass('d-none');
                form.find('[name="id"]').val(data.id);
                forms.setAddress(data.address);
                $("#form-send").text("Enviar");
            }
        }
        , 2: {
            exec: function (data) {
                var response = $("#response");
                response.removeClass('d-none').append(data.conv);
                response.find(".title").text(data.msg);
                response.find(".text").text(data.text);
                response.append(data.conv);
                $("#form-send").hide();
                $("#close").text("fechar");
            }
        }
    }
};

$.validator.addMethod( "cpfBR", function( value ) {

    // Removing special characters from value
    value = value.replace( /([~!@#$%^&*()_+=`{}\[\]\-|\\:;'<>,.\/? ])+/g, "" );

    // Checking value to have 11 digits only
    if ( value.length !== 11 ) {
        return false;
    }

    var sum = 0,
        firstCN, secondCN, checkResult, i;

    firstCN = parseInt( value.substring( 9, 10 ), 10 );
    secondCN = parseInt( value.substring( 10, 11 ), 10 );

    checkResult = function( sum, cn ) {
        var result = ( sum * 10 ) % 11;
        if ( ( result === 10 ) || ( result === 11 ) ) {
            result = 0;
        }
        return ( result === cn );
    };

    // Checking for dump data
    if ( value === "" ||
        value === "00000000000" ||
        value === "11111111111" ||
        value === "22222222222" ||
        value === "33333333333" ||
        value === "44444444444" ||
        value === "55555555555" ||
        value === "66666666666" ||
        value === "77777777777" ||
        value === "88888888888" ||
        value === "99999999999"
    ) {
        return false;
    }

    // Step 1 - using first Check Number:
    for ( i = 1; i <= 9; i++ ) {
        sum = sum + parseInt( value.substring( i - 1, i ), 10 ) * ( 11 - i );
    }

    // If first Check Number (CN) is valid, move to Step 2 - using second Check Number:
    if ( checkResult( sum, firstCN ) ) {
        sum = 0;
        for ( i = 1; i <= 10; i++ ) {
            sum = sum + parseInt( value.substring( i - 1, i ), 10 ) * ( 12 - i );
        }
        return checkResult( sum, secondCN );
    }
    return false;

}, "Coloque um CPF válido por favor" );

jQuery.validator.addMethod('phone', function (value, element) {
    value = value.replace(/\(|\)|\s|-/g, "").trim();

    if (["00", "01", "02", "03", , "04", , "05", , "06", , "07", , "08", "09", "10"].indexOf(value.substring(0, 2)) != -1) {
        console.log('DDD Inválido');
        return (this.optional(element) || false);
    }

    if (value.length < 10 || value.length > 11) {
        console.log('Menos que 10 ou maior que 11');
        return (this.optional(element) || false);
    }

    if (value.length == 10) {
        if (["2", "3", "4", "5"].indexOf(value.substr(2, 1)) == -1) {
            console.log('Não é telefone');
            return (this.optional(element) || false);
        }
        if (eval(value.substr(2).split("").join("|")) == value.substr(3, 1)) {
            console.log("Números repetidos no telefone");
            return (this.optional(element) || false);
        }
    }

    if (value.length == 11) {
        if (value.substring(2, 3) != "9") {
            console.log('Não contém digito 9');
            return (this.optional(element) || false);
        }

        if (["4","5","6", "7", "8", "9"].indexOf(value.substring(3, 4)) == -1) {
            console.log('Dígito após o 9 é inválido');
            return (this.optional(element) || false);
        }
        if (eval(value.substr(3).split("").join("|")) == value.substr(3, 1)) {
            console.log("Números repetidos no celular");
            return (this.optional(element) || false);
        }

    }
    return (this.optional(element) || true);
}, 'Informe um número de telefone válido!');

$.fn.getPhoneType = function () {
    var number = $(this).val().replace(/\(|\)|\s|-/g, "");
    var count = typeof number !== 'undefined' ? number.length : 0;
    if (count >= 3) {
        var type = (number.substr(2, 1)) == 9 ? 'celular' : 'telefone';
        return type;
        console.log(type);
    }
};

$.fn.maskTo = function (type) {
    if (typeof type !== 'undefined')
        $(this).mask(config.mask[type]);
};