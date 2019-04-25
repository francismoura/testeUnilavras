<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . '/view/_includes/header.php');
require_once($root . '/controller/UserController.php')
?>
<body>
<nav class="navbar navbar-dark bd-navbar bg-dark" style="padding: 30px" xmlns="">
    <a class="btn btn-link" id="btnHome" style="margin-right: 20px;" href=''>Sair</a>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <legend style="text-align: center">FORMULÁRIO DE SOLICITAÇÃO DE SERVIÇO</legend>
        <form name="form_cadastro" id="form_cadastro" style="margin: 30px 0">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                </div>
            </div>
            <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Enviar">
        </form>
    </div>

    <div class="row justify-content-center" id="respostaFetch" type="hidden">

    </div>

    <div class="row">
        <div>
            <h1 align="center">Solicitação</h1>
        </div>
        <div class="table-responsive" id="div-table"></div>
    </div>
</div>

<script src="/public/js/registerForm.js"></script>

</body>
</html>