<?php

if(isset($_POST['add_user'])){
    
   
    $user_role= $_POST['user_role'];

    $user_name = $_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_password= $_POST['user_password'];

    $user_firstname= $_POST['user_firstname'];
    $user_lastname= $_POST['user_lastname'];
     $user_image= $_FILES['user_image']['name'];
   
     $password=password_hash($user_password,PASSWORD_BCRYPT,array('cost'=> 10));

        $query="INSERT INTO users(user_name,user_email,user_password,user_firstname,user_lastname,user_role) ";
        $query.="VALUES('{$user_name}','{$user_email}','{$password}','{$user_firstname}','{$user_lastname}','{$user_role}')";

        $insert_user_query_admin = mysqli_query($connection,$query);    
        
        validateQuery($insert_user_query_admin);
        
        echo "USER ADDED" . "<a href='users.php'>&nbsp VIEW USERS</a>" ;
}

?><a href=""></a>


<form action="" method="post" enctype='multipart/form-data'>


<div class="form-group">
    <label for="user_firstname">Enter First Name :</label>
    <input type="text" class="form-control" name="user_firstname" placeholder="Enter First Name">
</div>
<div class="form-group">
<label for="user_lastname">Enter Last Name :</label>
    <input type="text" class="form-control" name="user_lastname" placeholder="Enter Last Name ">
</div>

 <div class="form-group">
    <label for="user_image">Upload Image</label>
    <input type="file" class="form-control" name="user_image"  >
</div> 


<div class="form-group">
<label for="user_role">Enter user Role :</label>
<select  name="user_role" id="">

<option value="none" selected disabled hidden>
          Select a category </option>
          <option value="admin">admin</option>
<option value="subscriber">subscriber</option>

</select>
</div>

<div class="form-group">
    <label for="user_name">Enter Username :</label>
    <input type="text" class="form-control" name="user_name" placeholder="Enter Username">
</div>

<div class="form-group">
    <label for="user_name">Enter Email :</label>
    <input type="email" class="form-control" name="user_email" placeholder="Enter Email">
</div>

<div class="form-group">
    <label for="user_password">Enter password :</label>
    <input type="password" class="form-control" name="user_password" placeholder="Enter password">
</div>

<div class="form-group">
    <input type="submit" name="add_user" class="btn btn-dark">
</div>
</form>