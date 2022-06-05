<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['cadnome'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Necessário preeencher o campo nome!</div>"];
} elseif (empty($dados['cademail'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Necessário preeencher o campo e-mail!</div>"];
} elseif (empty($dados['cadsenha'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Necessário preeencher o campo senha!</div>"];
}else {

    $querey_usuario_pes = "SELECT id FROM usuarios WHERE email=:email LIMIT 1";
    $result_usuario = $conn->prepare($querey_usuario_pes);
    $result_usuario->bindParam(':email', $dados['cademail'], PDO::PARAM_STR);
    $result_usuario->execute();
    
    if (($result_usuario) AND ($result_usuario->rowCount() != 0)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-alert' role='alert'>Erro: E-mail já está cadastrado!</div>"];
    }else{
        $query_usuario = "INSERT INTO usuarios (nome, email, senha) VALUE(:nome, :email, :senha)";
    $cad_usuario = $conn -> prepare($query_usuario);
    $cad_usuario->bindParam(':nome', $dados['cadnome'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':email', $dados['cademail'], PDO::PARAM_STR);
    $senha_cript = password_hash($dados['cadsenha'], PASSWORD_DEFAULT);
    $cad_usuario->bindParam(':senha', $senha_cript, PDO::PARAM_STR);
    
    $cad_usuario->execute();

    if($cad_usuario->rowCount()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'> Usuário cadastrado com sucesso!</div>"];
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-success' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];
    }
    }

    

    
}

echo json_encode($retorna);
