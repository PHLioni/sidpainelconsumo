<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="icon" type="imagem/png" href="../img/logo-claro-512.png" />
    <link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/usuario/cadastro.css">


</head>

<body id="bodyCadastro">
    <div class="container">
        <div class="container" id="containerCadastro">
            <img class="rounded mx-auto d-block" id="logoCadastro" src="<?= base_url('img/logo-claro-512.png') ?>">
            <h3>Cadastro de Usuário</h3>
            <?php
            echo form_open("autenticar/cadastrar");

            echo form_label("Nome", "nome");
            echo form_input(array(
                'name' => 'nome',
                'id' => 'nome',
                'class' => 'form-control',
                'maxlength' => '255'
            ));

            echo form_label("Sobrenome", "sobrenome");
            echo form_input(array(
                'name' => 'sobrenome',
                'id' => 'sobrenome',
                'class' => 'form-control',
                'maxlength' => '255'
            ));

            echo form_label("Usuario", "usuario");
            echo form_input(array(
                'name' => 'usuario',
                'id' => 'usuario',
                'class' => 'form-control',
                'maxlength' => '255'
            ));

            echo form_label("Senha", "senha");
            echo form_input(array(
                'name' => 'senha',
                'id' => 'usuario',
                'class' => 'form-control',
                'maxlength' => '255',
                'type' => 'password'
            ));

            echo form_button(array(
                'class' => 'btn btn-danger btn-block mt-2 mb-2',
                'content' => 'Cadastrar',
                'type' => 'submit',
            ));

            echo form_close();

            ?>
            <p class="alert-danger"><?= $this->session->flashdata('danger'); ?></p>
        </div>
    </div>
</body>
</html>