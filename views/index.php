<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/assets/css/default.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <section id="enviando-form">
        <div class="wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <span>Aguarde, estamos enviando seu contato.</span>
        </div>
    </section>


    <header>
        <img src="/assets/images/banners/3.png" alt="Banner">
    </header>

    <main>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-lg-6">
                    <h1>Preencha o formulário</h1>

                    <form method="POST" action="/enviar-contato" id="formulario-contato" class="w-100">
                        <div class="form-group">
                            <select name="horarioVaiVir" id="horarioVaiVir" class="form-control">
                                <option disabled selected>Selecione um horário</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Noite">Noite</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nome" class="form-control" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefone" class="form-control telefone" placeholder="Telefone">
                        </div>
                        <button type="submit" class="btn btn-success w-100">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>



    <script src="/assets/js/libs/mask/dist/jquery.mask.min.js"></script>
    <script src="/assets/js/libs/validate/dist/jquery.validate.min.js"></script>
    <script src="/assets/js/configs.js"></script>
</body>

</html>

<?php
if (isset($_SESSION["custom_message"])) {
    unset($_SESSION["custom_message"]);
}

?>