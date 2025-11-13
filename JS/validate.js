$(document).ready(function () {
  $("#myForm").validate({
    rules: {
      nome: {
        required: true,
        somenteletras: true,
        minlength: 3,
      },
      email: {
        required: true,
      },
      assunto: {
        required: true,
        maxlength: 150,
        minlength: 5,
      },
      mensagem: {
        required: true,
        minlength: 5,
      },
    },

    messages: {
      nome: {
        required: "Por favor, insira seu nome.",
        minlength: "Por favor, insira pelo menos 3 letras.",
      },
      email: {
        required: "Por favor, insira seu e-mail.",
        email: "Seu e-mail precisa ter o formato nome@dominio.com",
      },
      assunto: {
        required: "Por favor, insira o assunto.",
      },
      mensagem: {
        required: "Por favor, insira sua mensagem.",
        minlength: "Mensagem muito curta. Digite pelo menos 5 caracteres.",
      },
    },

    errorPlacement: function (error, element) {
      error.insertAfter(element.closest(".estilo-label"));
    },

    submitHandler: function (form) {
      $.post("PHP/envia_form.php", $(form).serialize(), function (response) {
        $("#mensagemRetorno").html(response);
        form.reset();
      });

      return false;
    },
  });
});

$.validator.addMethod(
  "somenteletras",
  function (value, element) {
    return this.optional(element) || /^[a-zA-ZÀ-ÿ\s]+$/.test(value);
  },
  "Nome inválido. Use apenas letras e espaços."
);

$.validator.addMethod(
  "telefoneFormat",
  function (value, element) {
    return (
      this.optional(element) ||
      /^\(?\d{2}\)?[\s-]?9?\d{4}[\s-]?\d{4}$/.test(value)
    );
  },
  "Telefone inválido. Use o formato correto (ex: (DDD) 9XXXX-XXXX)."
);
