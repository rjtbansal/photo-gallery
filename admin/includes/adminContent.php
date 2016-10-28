 <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>
                        <?php
                            //$user=new User(); //needed when we dont use static method
                            $users=User::getAllUsers();
                            while($row=mysqli_fetch_array($users)){
                                echo $row['username'].'<br>';
                            }
                            $get_user_by_id=User::getUserById(1);
                            echo $get_user_by_id['username'];
                        ?>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->