<?php 
    require_once("includes/header.php");

    if($session->isSignedIn()){
        header('Location: index.php');
    }

    if(isset($_POST['submit'])){
        $username=trim($_POST['username']);
        $password=trim($_POST['password']);

        //method to check username and password 
        $user_found=User::verifyUser($username,$password);

        if($user_found){
            $session->login($user_found);
            header('Location: index.php');
        }
        else{
            $msg="Your username and/or password is incorrect";
            echo $msg;
        }
    }
    else{
        $username="";
        $password="";
    }

?>

<div class="col-md-4 col-md-offset-3">
    <form action="" method="post">
        <div class="form-group" >
            <label for="username">Username:</label>
            <input type="text" id="username" class="form-control" name="username">
        </div>
        <div class="form-group" >
            <label for="password">Password:</label>
            <input type="password" id="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>