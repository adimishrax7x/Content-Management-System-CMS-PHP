
<?php

function insert_categories() 
{
    global $connection;

    if (isset($_POST['submit'])) {
                            
         $cat_title=$_POST['cat_title'];

        if($cat_title=="" || empty($cat_title)){
        echo "<h2>Please enter something</h2>";
        }else{

                    $query="INSERT INTO categories (cat_title)";
                    $query.="VALUES('{$cat_title}')";

                    $add_categories_query = mysqli_query($connection,$query);
                                
                    if(!$add_categories_query){
                    die('QUERY FAILED '.mysqli_error($connection)) ;
            }
        }
    }
}


function validateQuery($submitted_query){
    global $connection;

    if(!$submitted_query){
        die("QUERY FAILED  ".mysqli_error($connection));
    }
}