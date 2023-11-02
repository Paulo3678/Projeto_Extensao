$(".telefone").mask("(00) 00000-0000");

$("#formulario-contato").validate({
  rules: {
    nome: { required: true },
    email: { required: true },
    telefone: { required: true, minlength: 15 },
  },
  messages: {
    nome: {
      required: "É preciso informa seu nome para continuar!",
    },
    email: {
      required: "É preciso informar seu email para continuar!",
    },
    horarioVaiVir: {
      required: "É preciso informar seu horário de preferência!",
    },
    telefone: {
      required: "É preciso informar seu telefone para continuar!",
      minlength:
        "O telefone deve conter ao menos 15 caracteres (00) 98888-8888",
    },
  },
  submitHandler: function (form) {
    document.querySelector("#enviando-form").classList.add("active");
    form.submit();
  },
});
