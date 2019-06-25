$(document).ready(function(){
  var CpfCnpjMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length <= 11 ? '000.000.000-009' : '00.000.000/0000-00';
        },
    cpfCnpjpOptions = {
        onKeyPress: function(val, e, field, options) {
        field.mask(CpfCnpjMaskBehavior.apply({}, arguments), options);
      }
    };
    $('.cpfCnpjMask').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
    $('.cep').mask('99999-999');
    $('.dinheiro').mask('#.##0,00', {reverse: true});
    $('.tel').mask('9999-9999');
    $('.tel_ddd').mask('(99) 9999-9999');
    $('.phone_us').mask('(999) 999-9999');
    $('.mixed').mask('AAA 000-S0S');
  });