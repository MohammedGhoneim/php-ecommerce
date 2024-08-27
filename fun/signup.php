<!-- sgin up php -->
<?php

	@$pro = $_GET['pro'];
	session_start();
	if(isset($_POST['name'],$_POST['email'],$_POST['password'])){
		$new_name = trim($_POST['name']);
		$new_email =trim( $_POST['email']);
		$new_password = trim($_POST['password']);
		@$gender = isset($_POST['gender']) && $_POST['gender'] !== "" ? trim($_POST['gender']) : 1;
		
		if ($new_name === "") {
			$error = "Name cannot be empty";
        header("location:../login.php?signup=$error");

        } elseif ($new_email === "") {
			$error = "Email cannot be empty";
        header("location:../login.php?signup=$error");

        } elseif ($new_password === "") {
			$error = "Password cannot be empty";
        header("location:../login.php?signup=$error");
        }
         else {
            include("../admin/fun/conn.php");
			$select_check = "SELECT * FROM users WHERE email = '$new_email' && pr = 4";
            $result_check = $con -> query($select_check);
            $num_check = $result_check -> num_rows ;
            $row_check = $result_check -> fetch_assoc();
            if($num_check>0){
                $his_name = $row_check['username'];
                $id_user=$row_check['id'];
                $error = "Welcome: <span style='color:black;'>$his_name</span> you are already here login now";
                header("location:../login.php?signup=$error&&id=$id_user");

            }else{

                    
                // @$new_m_password = md5($password);
                $insert = "INSERT INTO `users`( `username`, `email`, `password`, `pr`, `gender`) VALUES ('$new_name','$new_email','$new_password',4,'$gender')";
                 $con -> query($insert);
                // edit ?  
                 $select_user = "SELECT * FROM users ORDER BY id DESC  LIMIT 1";
                 $result_user= $con -> query($select_user);
                 $row_user = $result_user -> fetch_assoc();
                 $num_user = $result_user -> num_rows;
                 if($num_user>0){
                     $_SESSION['username'] = $new_name;
                     $id_user = $row_user['id'];
                    $_SESSION['userid'] = $id_user;


                 }else{
                    echo "feeld";
                 }
            }
		 	
            
            if(isset($_SESSION['username'],$_SESSION['userid'])){
                if(isset($_GET['pro']) && $_GET['pro']=== $pro){
                    $pro = $_GET['pro'];
                    header("location:cart-pro.php?pro=$pro");
                }else{
                    header("location:../index.php");
                }
            }

			
			
		 }

		
	
	}else{
		$error = "Required fields are missing";
        header("location:../login.php?signup=$error");
	

	}

   
?>


<!--/sgin up php -->

