<?php
include 'conn/conect.php';
session_start();
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$pass = filter_input(INPUT_POST, 'pass', FILTER_DEFAULT);
// echo $email;
// echo $pass;
try {
    $sth = $conn->prepare('select *from usuarios where email = :email and pass = :pass');
    $sth->bindValue("email", $email);
    // $sth->bindValue("pass", MD5($pass));
    $sth->bindValue("pass", $pass);
    $sth->execute();
    if ($sth->rowCount() > 0):
        // echo "Usuário Encontrado na Base de Dados";
        $_SESSION['email'] = $email;
        header('Location: ' . $base . '/admin/home.php');
    else :
        if (isset($_SESSION['email'])) {
            unset($_SESSION['email']);
        }
        echo "Não existe o Usuário na Base de Dados";
    endif;
} catch (PDOException $e) {
    echo $e->getMessage();
}