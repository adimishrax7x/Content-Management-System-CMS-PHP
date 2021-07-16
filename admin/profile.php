<?php include "adminincludes/header.php" ;?>

<body>


<?php

if (isset($_SESSION['user_name'])){
    $username =$_SESSION['user_name'];


    $query="SELECT * from users where user_name ='{$username}'";
    $edit_user_profile_query = mysqli_query($connection,$query);

        //validateQuery($edit_user_profile_query);
    while ($row = mysqli_fetch_assoc($edit_user_profile_query)){
        $user_id=$row['user_id'];
        $user_name=$row['user_name'];
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_role=$row['user_role'];
        $user_randSalt=$row['user_randSalt'];
     
    }
}

?>


<?php

if(isset($_POST['edit_user'])){
    
    //$user_id= $_POST['user_id'];
    $user_role= $_POST['user_role'];

    $user_name = $_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_password= $_POST['user_password'];

    $user_firstname= $_POST['user_firstname'];
    $user_lastname= $_POST['user_lastname'];
    
   // $user_randSalt=$_POST['user_randSalt'];

     $user_image= $_FILES['user_image']['name'];
    // $post_image_temp=$_FILES['post_image']['tmp_name'];

   
    

        // move_uploaded_file($post_image_temp,"../images/$post_image");

        $query="INSERT INTO users(user_name,user_email,user_password,user_firstname,user_lastname,user_role) ";
        $query.="VALUES('{$user_name}','{$user_email}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_role}')";

        $query = "UPDATE users SET ";
        $query .="user_firstname='{$user_firstname}' ,";
        $query .="user_lastname='{$user_lastname}' ,";
        $query .="user_name='{$user_name}' ,";
        $query .="user_email='{$user_email}' ,";
        $query .="user_password='{$user_password}' ,";
        $query .="user_role='{$user_role}' ";
        $query.="WHERE user_name='{$username}' ";



        $update_user_query_admin = mysqli_query($connection,$query);    
        
        validateQuery($update_user_query_admin);
        
       

}

?>


    <div id="wrapper">

    <?php include "adminincludes/nav.php" ;?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            WELCOME TO ADMIN
                            <small>Mr User</small>
                        </h1>

                   


<form action="" method="post" enctype='multipart/form-data'>


<div class="form-group">
    <label for="user_firstname">Enter First Name :</label>
    <input type="text" class="form-control" value="<?php echo $user_firstname ;?> "name="user_firstname" placeholder="Enter First Name">
</div>
<div class="form-group">
<label for="user_lastname">Enter Last Name :</label>
    <input type="text" class="form-control" value="<?php echo $user_lastname;?>" name="user_lastname" placeholder="Enter Last Name ">
</div>


</select>

 <div class="form-group">
    <label for="user_image">Upload Image</label>
    <input type="file" class="form-control" name="user_image"  >
</div> 


<div class="form-group">
<label for="user_role">Enter user Role :</label>
<select  name="user_role" value="<?php echo $user_role;?>" >

<option value="<?php echo $user_role;?>" selected disabled hidden>
<?php echo $user_role;?> </option>
          <option value="admin">admin</option>
<option value="subscriber">subscriber</option>

</select>
</div>

<div class="form-group">
    <label for="user_name">Enter Username :</label>
    <input type="text" class="form-control" value="<?php echo $user_name;?>" name='user_name' placeholder="Enter Username">
</div>

<div class="form-group">
    <label for="user_email">Enter Email :</label>
    <input type="email" class="form-control" value="<?php echo $user_email;?>" name="user_email" placeholder="Enter Email">
</div>

<div class="form-group">
    <label for="user_password">Enter password :</label>
    <input type="password" class="form-control" value="<?php echo $user_password;?>" name="user_password" placeholder="Enter password">
</div>

<div class="form-group">
    <input type="submit" name="edit_user" class="btn btn-dark">
</div>
</form>

                    </div>
                </div> 
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



        <?php include "adminincludes/footer.php" ;?>
