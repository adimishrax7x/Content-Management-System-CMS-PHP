<?php include "adminincludes/header.php" ;?>
<body>

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

                        <?php 
                        
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }
                        else $source = ' ';

                        switch($source){

                            case 'add_user':
                                include "adminincludes/add_user.php" ;
                                break;
                            
                                
                            case "edit_user":
                                include "adminincludes/edit_user.php" ;
                                break;

                            
                            case 3:
                                echo "3";
                                break;
                                    
                            case 4:
                                echo "4";
                                break;

                            default:
                                include "adminincludes/view_all_users.php" ;
                        }

                        
                        
                        ?>


                    </div>
                </div> 
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



        <?php include "adminincludes/footer.php" ;?>
