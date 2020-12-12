<?php
    session_start();
    include("seriesdb.php");
    $x=1;
    if(!isset($_SESSION['login']))
    {
        $x=0;
        header("Location: login.php");
        exit;
    }
    $pname=$_SESSION['name'];
    $type =$_SESSION['type'];
    if($_SESSION['type']!='admin')
    {
        echo '<script>alert("Only admin user type can use this page.")</script>';
        header("Location: home.php");
        exit;
    }
    if(isset($_POST['submit']))
    {

        $name=$_POST['name'];
        $pic=$_FILES['img'];
        $desc=$_POST['desc'];
        $genre=$_POST['genre'];
        $rs=mysqli_query($conn,"select * from series where name='$name'");
        if (mysqli_num_rows($rs)>0)
        {
            echo '<script>alert("This Series already exists.")</script>';

        }
        else if ( imgvalid()==1 )
        {
            $path='image/';
            $target = $path .$name. basename($pic['name']);
            move_uploaded_file($pic['tmp_name'],$target);
            $query="insert into series (name,genre,path,intro) values ('$name','$genre','$target','$desc')";
            $rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");

            echo '<script>if(confirm("Series details uploaded successfully.\n Upload Another Series ")){location.replace("upload.php")} else {location.replace("home.php")}</script>';
        }

    }

    function imgvalid()
    {
        $uploadOk=1;
        if(isset($_FILES['img']))
        {   
            
            $pic = $_FILES['img'];
            $path="image/".$name.$pic['name'];


            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            if($check !== false)
            {
                $uploadOk = 1;
            } else 
            {
                echo '<script>alert("File is not an image.")</script>';
                $uploadOk = 0;
            }

            if ($_FILES["img"]["size"] > 1000000)
            {
                echo '<script>alert("Sorry, your file is too large.Only file size smaller than 1 mb allowed.")</script>';
                $uploadOk = 0;
            }
            // Allow certain file formats
            $imageFileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" 
                && $imageFileType != "jpeg"&& $imageFileType != "gif" ) 
            {
                echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
                $uploadOk = 0;
            }

            return $uploadOk;
            


        }
        else
        {
            echo '<script>alert("Please upload the image file.")</script>';
            $uploadOk = 0;
            return $uploadOk;
            
        }
    }
    
        
    
?>