<?php
require("../includes/acess_db.php");

if (isset($_POST['btn-atualizar'])) {
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone']; 
    $curso = $_POST['curso'];
    $cpf = $_POST['cpf']; 
    $email = $_POST['email'];
    $data_nasc = $_POST['data_nasc']; 

   $query = "UPDATE alunos SET 
              nome = :nome, 
              telefone = :telefone, 
              curso = :curso, 
              cpf = :cpf, 
              email = :email, 
              data_nasc = :data_nasc 
              WHERE matricula = :matricula";

    if ($connection) {
        $stmt = $connection->prepare($query);
        $stmt->execute([
            ':nome'      => $nome,
            ':telefone'  => $telefone,
            ':curso'     => $curso,
            ':cpf'       => $cpf,
            ':email'     => $email,
            ':data_nasc' => $data_nasc,
            ':matricula' => $matricula
        ]);
        header("Location: ../pages/consulta_aluno.php?atualizado=1");
        exit();
    } else {
        echo "Erro ao atualizar.";
    }
}