<?php




session_start();
$pro = $_GET['pro'];


if(isset($_POST['email'],$_POST['password'])){
    
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    
    if($email === ""){
            $error_login = "email cannot be empty";
            header("location:../login.php?login=$error_login");
        }elseif($password === ""){
            $error_login = "password cannot be empty";
            header("location:../login.php?login=$error_login");
        }else{
            include("../admin/fun/conn.php");
            $select = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
            $result = $con -> query($select);
            $num = $result -> num_rows;
            $row = $result -> fetch_assoc();
            if($num > 0 && $row['pr']==4){
            $_SESSION['username'] = $row['username'];
            $_SESSION['userid'] = $row['id'];
            if( isset($_GET['pro']) && $_GET['pro'] === $pro){
                $pro = $_GET['pro'];
            header("Location: cart-pro.php?pro=$pro");   
            }else{
            header("Location: ../index.php");   

            }
            }else{
                $error_login = "Sginup";
                header("location:../login.php?login=$error_login");
            }
    
    
        }
    }else{
        $error_login = "Required fields are missing";
        header("location:../login.php?login=$error_login");
    }






