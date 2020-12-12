<?php
    session_start();
    include("logindb.php");
    
    if(isset($_POST['login']))
    {
        $userid=$_POST['username'];
        $password=$_POST['password'];
        $type=$_POST['type'];
        $rs=mysqli_query($conn,"select * from register where username='$userid' and password='$password' and type='$type'");
        if(mysqli_num_rows($rs)<1)
        {
            echo '<script>alert("Invalid Username or password.")</script>';
        }
        else
        {
          $_SESSION["login"]=$userid;
          $_SESSION["type"]=$type;
        }
    
    }
    
    if (isset($_SESSION["login"]) )
    {
        header("Location: home.php");
        exit;
    }
    if(isset($_POST['signup']))
    {

        $userid=$_POST['username'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $type=$_POST['type'];
        $rs=mysqli_query($conn,"select * from register where username='$userid'");
        if (mysqli_num_rows($rs)>0)
        {
            echo '<script>alert("Username already exists.")</script>';

        }
        else
        {

            $query="insert into register(username,name,password,email,type) values('$userid','$name','$password','$email','$type')";
            $rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");

            echo '<script>if(confirm("Account created successfully.\nGo to Login Page")){location.replace("login.php")}</script>';
        }

    }

    if(isset($_POST['submit']))
    {
        $userid=$_POST['username'];
        $password=$_POST['password'];
        $rs=mysqli_query($conn,"select * from register where username='$userid'");
        if(mysqli_num_rows($rs)<1)
        {
            echo '<script>alert("Username does not exist.")</script>';
        }
        else
        {
          $query="update register set password='$password' where username='$userid'";
          $rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
          echo '<script>if(confirm("Updated successfully.\nGo to Login Page")){location.replace("login.php")}</script>';
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
        background-color:  gray; 
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
    form
    {   
        position:absolute;
        
        display: inline;
    }
    
    #div2
    {
        background-color: rgb(121, 116, 116);
        display: block;
        top: 8%;
        left: 0%;
        width: 100%;
        height: 35%;
        position: absolute;
        padding: 2px;
        text-align: center;

    }
    #div3
    {
        
        display: block;
        top: 44%;
        left: 25%;
        width: 50%;
        height: 75%;
        position: absolute;
        padding: 2px;
        
       

    }
    #div4
    {
        
        display: none;
        top: 44%;
        left: 50%;
        width: 50%;
        height: 75%;
        position: absolute;
        padding: 2px;
        
    }
    #div5
    {
        
        display: none;
        top: 44%;
        left: 50%;
        width: 50%;
        height: 75%;
        position: absolute;
        padding: 2px;
        
       

    }
    
    #div6
    {
        background-color: black;
        display: block;
        top: 121%;
        left: 0%;
        width: 100%;
        height: 30%;
        position: absolute;
        
        padding: 2px;
        text-align: center;

    }
    table
    {
        
        width: 100%;
        table-layout: fixed
    }
    td
    {
        
        height: 50px;
        
    }
    th
    {
        text-align: center;
        height: 50px;
        font-size: 30px;
        font-family: 'Times New Roman', Times, serif;
        text-decoration: solid black;
    }
    #enter,#signup
    {
        height: 45px;
        width:110px;
    }
    #submit
    {
        height: 45px;
        width:150px;   
    }
    
    
   
    
    


    </style>
</head>

<body >

    <div id="div1">
        
        <a href="home.php"><img id="logo" src="logo.jpg" alt="TWSp" width="12%" height="100%"></a>
        
        
        

    </div>
    <div id="div2">
        <img id="" src="logo1.jpg" alt="Girl in a jacket" width="90%" height="100%">     
    </div>
    <div id="div3">
        
        <form action="" method="post">
            <table>
                <tr><th colspan="2" align="middle">Sign In</th></tr>
                <tr>
                    <td><label>Username</label></td>
                    <td><input type="text" name="username" class="form-control" required="true" ></td>
                </tr>
                <tr>
                    <td><label>Password</label></td>
                    <td><input type="password" name="password" class="form-control" required="true" ></td>
                </tr>
                <tr>
                    <td><label>User Type</label></td>
                    <td><select type="type" name="type" class="form-control">
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                        
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="middle"><input id = "enter" type="submit" class="" value="Login" name="login"></td>
                </tr>
            </table>
            <p>Don't have an account? <a onclick =change("div3","div4") href="javascript:void(0);">Sign up now</a>.</p>
            <p>Forget Password? <a onclick =change("div3","div5") href="javascript:void(0);">Change Password</a>.</p>
        </form>
                
    </div>
    <div id="div4">
        <form action=" " method="post">
            <table>
                <tr><th colspan="2" align="middle">Sign Up</th></tr>
                <tr>
                    <td><label>Name</label></td>
                    <td><input type="text" name="name" class="form-control" required="true" minlength="2" ></td>
                </tr>
                <tr>
                    <td><label>Username</label></td>
                    <td><input type="text" name="username" class="form-control" required="true" minlength="2" ></td>
                </tr>
                <tr>
                    <td><label>Password</label></td>
                    <td><input type="password" name="password" class="form-control" required="true" minlength="4"></td>
                </tr>
                <tr>
                    <td><label>Email Id</label></td>
                    <td><input type="email" name="email" class="form-control" required="true" ></td>
                </tr>
                <tr>
                    <td><label>User Type</label></td>
                    <td><select type="type" name="type" class="form-control">
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                        
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="middle"><input id = "signup" type="submit" class="" value="Sign Up" name="signup"></td>
                </tr>
            </table>
            <p>Already have an account? <a onclick =change("div4","div3") href="javascript:void(0);">Sign in now</a>.</p>
        </form>
    </div>
    <div id="div5">
        <form action=" " method="post" onsubmit="return checkPwEquals()">
            <table>
                <tr><th colspan="2" align="middle">Change Password</th></tr>
                <tr>
                    <td><label>Username</label></td>
                    <td><input type="text" name="username" class="form-control" required="true" ></td>
                </tr>
                <tr>
                    <td><label>Password</label></td>
                    <td><input type="password" id="pass" name="password" class="form-control" required="true" ></td>
                </tr>
                <tr>
                    <td><label>Confirm Password</label></td>
                    <td><input type="password" id="newpass" name="cpassword" class="form-control" required="true" ></td>
                </tr>
                <tr>
                    <td colspan="2" align="middle"><input id = "submit" type="submit" class="" value="Change Password" name="submit"></td>
                </tr>
            </table>
            <p>Go To <a onclick =change("div5","div3") href="javascript:void(0);">Sign in now</a>.</p>
        </form>
    </div>
    <div id="div6">
        <a href=" ">FAQ</a><br>
        <a href=" ">Contact us</a>

        
    </div>


</body>
<script>
    function change(id1,id2)
    {
        var x = document.getElementById(id1);
        var y = document.getElementById(id2);
        
        x.style.display = "none";
        y.style.left = "25%"
        y.style.display = "block";
    }
    function checkPwEquals()
    {
        var pw1=document.getElementById("pass").value.trim();
        var pw2=document.getElementById("newpass").value.trim();

        if(pw1!=pw2){
            alert("Confirm password is different than password.");
            return false;
        }


        return true;
    }

</script>

</html>