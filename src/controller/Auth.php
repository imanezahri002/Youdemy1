<?php
include __DIR__ . '/../../vendor/autoload.php';
use src\model\User;

$msg1 = $msg2 = $msg3 = $msg4 = $msg5 = $msg6 = $msg7 = $msg8 = "";


if (isset($_POST["register"])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];
    $role = isset($_POST["role"]) ? $_POST["role"] : "";
    $roles=$_POST["role"];
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    if (empty($firstName)) {
        $msg1 = "First Name is required.";
    }

    if (empty($lastName)) {
        $msg2 = "Last Name is required.";
    }

    if (empty($email)) {
        $msg3 = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg4 = "Invalid email format.";
    }

    if (empty($password)) {
        $msg5 = "Password is required.";
    } elseif (strlen($password) < 6) {
        $msg6 = "Password must be at least 6 characters.";
    }

    if ($password !== $Cpassword) {
        $msg7 = "Passwords do not match.";
    }

    if (empty($role)) {
        $msg8 = "Role is required.";
    }

    // Si des erreurs existent, rediriger vers la page avec les messages dans l'URL
    if ($msg1 || $msg2 || $msg3 || $msg4 || $msg5 || $msg6 || $msg7 || $msg8) {
        // Rediriger avec les messages dans l'URL
        header("Location: ../view/inscription.php?msg1=$msg1&msg2=$msg2&msg3=$msg3&msg4=$msg4&msg5=$msg5&msg6=$msg6&msg7=$msg7&msg8=$msg8&f=$firstName");
        exit;
    }
    $user=new User($firstName,$lastName,$email,$hashedpassword,$roles,null);
    try{
        $user -> add();
    }catch (Exception $th) {
        $existencemail= $th->getMessage();
        header("location: ../view/inscription.php?er=$existencemail");
    }
}
if (isset($_POST["login"])){
    $emailLog=$_POST["emailLog"];
    $passwordLog=$_POST["passwordLog"];
    $client=new User(null,null,$emailLog,$passwordLog,null,null);
    $client->login();

}



?>