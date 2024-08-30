<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <?php
        ob_start()
    ?>
    <header id="header" class="transparent-header-modern fixed-header-bg-white w-100">
                <div class="top-header bg-secondary">
                    <div class="container">
                        <div class="row">
                            
                                <div class="col-md-8">
                                <ul class="top-contact list-text-white  d-table">
                                    <li><a href="#"><i class="fas fa-phone-alt text-success mr-1"></i>+91 8000900001</a></li>
                                    <li><a href="#"><i class="fas fa-envelope text-success mr-1"></i> support@gmail.com</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4 ">
                                <div class="top-contact float-right">
                                    <ul class="list-text-white d-table">
                                    <li><i class="fas fa-user text-success mr-1"></i>
                                    <?php  if(isset($_SESSION['uemail']))
                                    { ?>
                                    <a href="logout.php">Logout</a>&nbsp;&nbsp;<?php } else { ?>
                                    <a href="login.php">Login</a>&nbsp;&nbsp;
                                    
                                    | </li>
                                    <li><i class="fas fa-user-plus text-success mr-1"></i><a href="register.php"> Register</li><?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-nav secondary-nav hover-success-nav py-2" >
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <nav class="navbar navbar-expand-lg navbar-light p-0"> <a class="navbar-brand position-relative" href="index.php"><img class="nav-logo" src="images/logo/restatelg.png" alt=""></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav d-flex justify-content-between w-100">
                                        <div class="d-flex">
                                            <li class="nav-item dropdown"> <a class="nav-link" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a></li>
                                            
                                            <li class="nav-item"> <a class="nav-link" href="about.php">About</a> </li>
                                            
                                            <li class="nav-item"> <a class="nav-link" href="contact.php">Contact</a> <li>										
                                            
                                            <li class="nav-item"> <a class="nav-link" href="property.php">Properties</a> </li>
                                            
                                            <li class="nav-item"> <a class="nav-link" href="agent.php">Agent</a> </li>
                                                
                                            <li class="nav-item"><a class="nav-item nav-link" style="border-radius:30px;" href="submitproperty.php">Submit Peoperty</a></li>
                                        </div>
                                        <div>
                                            <?php  if(isset($_SESSION['uemail'])){
                                                $uid=$_SESSION['uid'];
                                                $query=mysqli_query($con,"SELECT * FROM `user` WHERE uid='$uid'");
                                                while($row=mysqli_fetch_array($query))
                                                {
                                            ?>
                                            <li class="nav-item dropdown list-unstyled d-flex" >
                                                <div class="user_img">
                                                    <img src="admin/user/<?php echo $row['6'];?>" style="width:50px;height:50px;display:inline-flex;border-radius:50px;border:2px solid #333;object-fit:cover" >
                                                </div>
                                                <a class="nav-link dropdown-toggle text-dark d-flex align-items-center px-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'] ?></a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item"> <a class="nav-link text-dark" href="profile.php">Profile</a> </li>
                                                    <li class="nav-item"> <a class="nav-link text-dark" href="feature.php">Your Property</a> </li>
                                                    <li class="nav-item"> <a class="nav-link text-dark" href="logout.php">Logout</a> </li>	
                                                </ul>
                                            </li>
                                            <?php }}?>
                                        </div>

                                    </ul>
                                            
                                            
                                            

                                            
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

</body>
</html>
