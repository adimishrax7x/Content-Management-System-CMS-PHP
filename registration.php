<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
<?php

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $message="";
    if(!empty($username) && !empty($email) && !empty($password)){


        $username = mysqli_real_escape_string($connection,$username);
        $email =  mysqli_real_escape_string($connection,$email);
        $password =  mysqli_real_escape_string($connection,$password);
        
        $password=password_hash($password,PASSWORD_BCRYPT,array('cost'=> 10));

    
    
        $query="INSERT INTO users(user_name,user_email,user_password,user_role) ";
        $query.="VALUES('{$username}','{$email}','{$password}','Subscriber')";
    
        $insert_suscriber_reg_query = mysqli_query($connection,$query);    
        
        if(! $insert_suscriber_reg_query){
            echo "ERROR" .mysqli_error($connection) ;
        }
        
        $message="REGISTRATION SUCCESSFUL";


    }else     if(empty($username) && empty($email) && empty($password)){

        $message="REGISTRATION FAILED";
    }
   


    
   

}

?>

    <!-- Navigation -->
    
    <?php  include "includes/nav.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h4 class="text-center  bg-success lead"> <?php echo $message ?> </h4>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
