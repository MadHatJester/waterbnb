<?php
if(isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['username'];
    $email = $_POST['usermail'];
    $type = $_POST['usertype'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($type) || empty($firstName) || empty($lastName)) {
        header("Location: ../signup.php?error=emptyfields&username=".$username."&usermail=".$email."&firstname=".$firstName."&lastname=".$lastName);
        exit();
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidmailusername");
        exit();
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&username=".$username."&firstname=".$firstName."&lastname=".$lastName);
        exit();
    }

    elseif (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidusername&usermail=".$email."&firstname=".$firstName."&lastname=".$lastName);
        exit();
    }

    elseif ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&username=".$username."&usermail=".$email."&firstname=".$firstName."&lastname=".$lastName);
        exit();
    }

    else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror1");
            exit();    
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&usermail=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO users (username, emailUsers, firstName, lastName, typeUsers, pwdUsers) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror2");
                    exit();    
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $firstName, $lastName, $type, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?signup=success");
                    exit();
                }
            }

        }

    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else {
    header("Location: ../signup.php");
    exit();
}
