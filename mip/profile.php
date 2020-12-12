<?php

    session_start();
    include("logindb.php");


    if(!isset($_SESSION['login']))
    {
        header("Location: login.php");
        exit;
    }


    $userid=$_SESSION['login'];
    $name;
    $email;
    $sql = "SELECT name,email,type FROM register WHERE username='$userid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
        $name=$row["name"];
        $email= $row["email"];
        $type=$row["type"];
        }
    } 
    else 
    {
        echo "Data not found!";
    }
    
    
    
    
    if(isset($_POST['update_name']))
    {
        $userid=$_SESSION['login'];
        $name=$_POST['name'];
        $sql = "UPDATE register SET name='$name' WHERE username='$userid'";
        if($conn->query($sql)==FALSE)
            echo "Error updating record: ".$conn->error;
    }
    
    if(isset($_POST['update_email']))
    {
        $userid=$_SESSION['login'];
        $email=$_POST['email'];
        $sql = "UPDATE register SET email='$email' WHERE username='$userid'";
        if($conn->query($sql)==FALSE)
            echo "Error updating record: ".$conn->error;
    }
    
    
    if(isset($_POST['update_username']))
    {
        $userid=$_SESSION['login'];
        $username=$_POST['username'];
    
        if($userid!=$username)
        {
            $sql=mysqli_query($conn,"select * from users where username='$username'");
            if (mysqli_num_rows($sql)>0)
            {
                echo '<script>alert("Username already exists.")</script>';
    
            }else
            {
                $_SESSION['login']=$username;
                //$userid=$_SESSION['login'];
                $sql = "UPDATE register SET username='$username' WHERE username='$userid'";
                header('Location: profile.php');
                if($conn->query($sql)==FALSE)
                {
                echo "Error updating record: ".$conn->error;
                }
        
            }
        }
    }
    
    
    
    if(isset($_POST['update_password']))
    {
        $userid=$_SESSION['login'];
        $oldpw=$_POST['oldpassword'];
        $newpw=$_POST['newpassword'];
    
        $sql=mysqli_query($conn,"select * from register where username='$userid' and password='$oldpw'");
        if (mysqli_num_rows($sql)>0)
        {
            $sql = "UPDATE register SET password='$newpw' WHERE username='$userid'";
            if($conn->query($sql)==FALSE)
                echo "Error updating record: ".$conn->error;
    
        }
        else
        {
        echo '<script>alert("Kindly enter correct old password.")</script>';
        }
    
    
    }
    







?>
<html>

    <head>
        <meta charset="utf-8"/>
        <title>The Web Series Pedia</title>
        <style type=text/css>

        
        body
        {
            background-color:  white; 
            overflow-y: auto; 
            
            
        }
        #div1
        {
            background-color: black;
            display: block;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 7%;
            position: absolute;
            border: 2px solid black;
            padding: 5px;
        }
        #logo
        {
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        
        }
       
        #list
        {
            position:absolute;
            left: 170px;
            width: 8%;
            height: 70%;
            background-color: rgb(204, 150, 50);
            border-radius: 8px;
            font-size: 20px;
            color: black;
            display: inline;

        }
        
        #logout
        {
            position:absolute;
            right: 25px;
            width: 8%;
            height: 70%;
            background-color: rgb(204, 150, 50);
            border-radius: 8px;
            font-size: 20px;
            color: black;
            
            display: inline;

        }
        
        
    
        
        


        </style>
    </head>

    <body>

        <div id="div1">
            
                <a href="home.php"><img id="logo" src="logo.jpg" alt="TWSp" width="12%" height="100%"></a>
            
                <button id="list" onclick=location.href="list.php" type="button" >
                    List

                </button>
                <button id="logout" onclick=location.href="logout.php" type="button" >
                    Logout

                </button>
                
        </div>
        <br>
        <br>
        <br>

        <h1 style="text-align: center;">Welcome <?php echo $name; ?>!</h1>
    
        <div class="wrapper">
        
        <div>
                

                <div class="form-group">
                    
                    <label>Full Name </label>
                    <p id="pname"><?php echo $name;?></p>
                    <button id="edit-name" onclick="show_nameform()">Edit</button>
                    <form style="display: none;" id="form_name" action="" method="post">
                        <input type="text" name="name" class="form-control" minlength="3" required="true" value="<?php echo $name; ?>">
                        <input type="submit" name="update_name" value="Update">
                        <input type="submit" value="Cancel" onclick="hide_nameform()">
                    </form>
                    <br>
                    <br>
                
                </div>
                <br>  

                <div class="form-group">
                    
                    <label>Email </label>
                    <p id="pemail"><?php echo $email;?></p>
                    <button id="edit-email" onclick="show_emailform()">Edit</button>
                    <form  style="display: none;" id="form_email"  action="" method="post">
                        <input type="text" name="email" class="form-control" required="true" value="<?php echo $email; ?>">
                        <input type="submit" name="update_email" value="Update">
                        <input type="submit" value="Cancel" onclick="hide_emailform()">
                    </form>
                    <br>
                    <br>
                
                </div>
                <br>


                <div class="form-group">
                    
                    <label>Username </label>
                    <p id="pusername"><?php echo $userid;?></p>
                    <button id="edit-username" onclick="show_usernameform()">Edit</button>
                    <form  style="display: none;" id="form_username"  action="" method="post">
                        <input type="text" name="username" class="form-control" minlength="3" required="true" value="<?php echo $userid; ?>">
                        <input type="submit" name="update_username" value="Update">
                        <input type="submit" value="Cancel" onclick="hide_usernameform()">
                    </form>
                    <br>
                    <br>
                
                </div>
                <br> 

                <div class="form-group">
                    
                    <label>Password </label>
                    <button id="edit-password" onclick="show_passwordform()">Edit</button>
                
                    <form  style="display: none;" id="form_password"  action="" method="post" onsubmit="return checkPwEquals()">
                        <input type="password" name="oldpassword" class="form-control" minlength="4" required="true" placeholder="Password">
                        <input type="password" name="newpassword" id="newp" class="form-control" minlength="4" required="true" placeholder="New Password">
                        <input type="password" name="confirmnewpassword" id="confirmnewp" class="form-control" minlength="4" required="true" placeholder="Confirm New Password">
                        <input type="submit" name="update_password" value="Update">
                        <input type="button" value="Cancel" onclick="hide_passwordform()">
                    </form>
                    <br>
                    <br>
                
                </div> 
                <br>

                <div class="form-group">
                    
                    <label>User Type </label>
                    <p id="type"><?php echo $type;?></p>
                    <br>
                    <br>
                
                </div>
                <br> 

            </div>


            <a href="delete_pro.php"> Delete Profile</a>
                    
        </div>    


    </body>
    <script>
        function show_nameform()
        {
            document.getElementById('pname').style.display="none";
            document.getElementById('edit-name').style.display="none";
            document.getElementById('form_name').style.display="block";
        }

        function hide_nameform()
        {
            document.getElementById('form_name').style.display="none";
            document.getElementById('pname').style.display="block";
            document.getElementById('edit-name').style.display="block";
        }


        function show_emailform()
        {
            document.getElementById('pemail').style.display="none";
            document.getElementById('edit-email').style.display="none";
            document.getElementById('form_email').style.display="block";
        }

        function hide_emailform()
        {
            document.getElementById('form_email').style.display="none";
            document.getElementById('pemail').style.display="block";
            document.getElementById('edit-email').style.display="block";
        }

        

        function show_usernameform()
        {
            document.getElementById('pusername').style.display="none";
            document.getElementById('edit-username').style.display="none";
            document.getElementById('form_username').style.display="block";
        }

        function hide_usernameform()
        {
            document.getElementById('form_username').style.display="none";
            document.getElementById('pusername').style.display="block";
            document.getElementById('edit-username').style.display="block";
        }


        function show_passwordform()
        {
            
            document.getElementById('edit-password').style.display="none";
            document.getElementById('form_password').style.display="block";
        }

        function hide_passwordform()
        {
            
            document.getElementById('edit-password').style.display="block";
            document.getElementById('form_password').style.display="none";
        }

        function checkPwEquals()
        {
            var pw1=document.getElementById("newp").value.trim();
            var pw2=document.getElementById("confirmnewp").value.trim();

            if(pw1!=pw2){
                alert("Confirm new password is different than new password.");
                return false;
            }


            return true;
        }
    </script>

</html>