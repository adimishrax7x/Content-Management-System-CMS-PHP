<?php


if(isset($_GET['edit_user'])){
    $the_user_id = $_GET['edit_user'];

    $query="SELECT * from users where user_id =$the_user_id";
    $edit_user_query = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_assoc($edit_user_query)){
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

        // $query="INSERT INTO users(user_name,user_email,user_password,user_firstname,user_lastname,user_role) ";
        // $query.="VALUES('{$user_name}','{$user_email}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_role}')";


        $query ="SELECT user_randSalt from users";
        $select_randSalt_query=mysqli_query($connection,$query);
    
        if(!$select_randSalt_query){
    
            die("Query Failed  ".mysqli_error($connection));
    
        }
    
        $row=mysqli_fetch_array($select_randSalt_query);
        $salt=$row['user_randSalt'];
        $hashed_password=crypt($user_password,$salt);

        $query = "UPDATE users SET ";
        $query .="user_firstname='{$user_firstname}' ,";
        $query .="user_lastname='{$user_lastname}' ,";
        $query .="user_name='{$user_name}' ,";
        $query .="user_email='{$user_email}' ,";
        $query .="user_password='{$hashed_password}' ,";
        $query .="user_role='{$user_role}' ";
        $query.="WHERE user_id='{$the_user_id}' ";



        $update_user_query_admin = mysqli_query($connection,$query);    
        
        validateQuery($update_user_query_admin);
        
       

}

?>


<form action="" method="post" enctype='multipart/form-data'>


<div class="form-group">
    <label for="user_firstname">Enter First Name :</label>
    <input type="text" class="form-control" value="<?php echo $user_firstname ;?> "name="user_firstname" placeholder="Enter First Name">
</div>
<div class="form-group">
<label for="user_lastname">Enter Last Name :</label>
    <input type="text" class="form-control" value="<?php echo $user_lastname;?>" name="user_lastname" placeholder="Enter Last Name ">
</div>

<!-- <div class="form-group">
    <label for="user_role">Enter user Role :</label>
<select class="form-control" name="user_role" >
    <option value="none" selected disabled hidden>
          Select a category 
    <?php
    //     $query="SELECT * from users";
    //     $select_user_roles = mysqli_query($connection,$query); 
    //     validateQuery($select_user_roles);       

                               
    //     while ($row = mysqli_fetch_assoc($select_user_roles)){
    //     $user_role=$row['user_role'];
    //     $user_id=$row['user_id'];
    
    //     echo "<option value='{$user_id}'>{$user_role}</option>";
    // }
    ?>
 

</select>
-->
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