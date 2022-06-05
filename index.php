<?php
$_SESSION_START
//Gerar senha
//echo password_hash("123456", PASSWORD_DEFAULT);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shotcurt icon" href="imagens/favicon.ico" />
    <title>Sistema de Login</title>
</head>

<body>
    <div class="container text-center">
        <!-- Substituir o botão pelos dados do usuário     
    <div id="dados-usuario">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                Acessar
            </button>
        </div>-->
        <?php
        if (isset($_SESSION['id']) and (isset($_SESSION['nome']))) {
            echo "Bem vindo, " . $_SESSION['nome'] . "<br>";
            echo "<a href='sair.php'>Sair</a><br>";
        } else {
            echo "<div id='dados-usuario'>";
            echo "<button type='button' class='btn btn-outline-primary m-3' data-bs-toggle='modal' data-bs-target='#loginModal'>
            Acessar
            </button>";
            echo "<button type='button' class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#cadUsuarioModal'>
            Cadastrar
            </button>";
            echo "</div>";
        }
        ?>
        <div class="m-5">
            <span id="msgAlert"></span>
        </div>
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Área restrita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="login-usuario-form">
                        <span id="msgAlertErroLogin"></span>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Usuário:</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Digite o usuário">
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="col-form-label">Senha:</label>
                            <input type="password" name="senha" class="form-control" autocomplete="
                            on" id="senha" placeholder="Digite a senha">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-outline-primary bt-sm" id="login-usuario-btn" value="Acessar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cadUsuarioModal" tabindex="-1" aria-labelledby="cadUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadUsuarioModalLabel">Cadastrar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="cad-usuario-form">
                        <span id="msgAlertErroCad"></span>
                        <div class="mb-3">
                            <label for="cadnome" class="col-form-label">Usuário:</label>
                            <input type="text" id="cadnome" name="cadnome" class="form-control" placeholder="Digite o nome completo">
                        </div>
                        <div class="mb-3">
                            <label for="cademail" class="col-form-label">E-mail:</label>
                            <input type="text" id="cademail" name="cademail" class="form-control" placeholder="Digite seu melhor e-mail">
                        </div>
                        <div class="mb-3">
                            <label for="cadsenha" class="col-form-label">Senha:</label>
                            <input type="password" name="cadsenha" class="form-control" autocomplete="
                            on" id="cadenha" placeholder="Digite a senha">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-outline-success bt-sm" id="cad-usuario-btn" value="Cadastrar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
</body>

</html>