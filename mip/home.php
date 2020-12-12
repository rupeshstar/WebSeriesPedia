<?php

    session_start();
    include("logindb.php");

    
    if(!isset($_SESSION['login']))
    {
        $x=0;
    
    }
    else
    {
        $x=1;
        $userid=$_SESSION['login'];
        $name;
        $email;
        $sql = "SELECT * FROM register WHERE username='$userid'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) 
            {
                    
                $name=$row["name"];
                $type=$row["type"];
            }
            $_SESSION["name"]=$name;
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
        background-color:  rgb(3, 3, 34); 
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
    #proset
    {
        position:absolute;
        right: 25px;
        width: 16%;
        height: 70%;
        background-color: rgb(204, 150, 50);
        border-radius: 8px;
        font-size: 18px;
        color: black;
        
        display:none;

    }
    
    #login
    {
        display: inline;
        position:absolute;
        right: 25px;
        width: 8%;
        height: 70%;
        background-color: rgb(204, 150, 50);
        border-radius: 8px;
        font-size: 20px;
        color: black;

    }
    #div2
    {
        
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
        left: 15%;
        width: 70%;
        height: 75%;
        position: absolute;
        background-color: rgb(204, 150, 50);;
        padding: 2px;
        text-align: center;

    }
    #div4
    {
        
        display: none;
        top: 8%;
        right: 0%;
        width: 17%;
        height: 25%;
        position: absolute;
        background-color: rgb(247, 211, 144);
        padding: 0px;
        text-align: center;

    }
    #div5
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
    .mySlides
    {
        display: none;
        width: 100%;
        height:100%;
    }
    #pro,#upload,#logout
    {
        width: 99%;
        height: 33%;
        background-color: rgb(247, 211, 144);
        border: 3px solid  rgb(150, 110, 36);
        border-radius: 10px;
        font-weight: bold;
        font-size: 22px;
        
    }

    
   
    
    


    </style>
</head>

<body onload="pageelement()">

    <div id="div1">
        
        <a href="home.php"><img id="logo" src="logo.jpg" alt="TWSp" width="12%" height="100%"></a>
        
        
       
            
            

            <button id="list" onclick="sessioncheck()" type="button" >
                List

            </button>
            <button id="login" onclick=location.href="login.php" type="button" >
                Log In

            </button>
            <button id="proset" onclick="hide()" type="button" >
                Welcome <?php echo $name ; ?>

            </button>
        
        

    </div>
    <div id="div2">
        <img id="" src="d2.jpg" alt="Girl in a jacket" width="90%" height="100%">     
    </div>
    <div id="div3">
        <img class="mySlides" src="image/demons.jpg" >
        <img class="mySlides" src="image/got.jpg" >
        <img class="mySlides" src="image/kota.jpg" >
                
    </div>
    <div id="div4">
        <button id="pro" onclick=location.href="profile.php" type="button" >
            Profile

        </button>
        <br>
        <button id="upload" onclick="upload()" type="button" >
            Upload Series

        </button>
        
        <button id="logout" onclick=location.href="logout.php" type="button" >
            Log out

        </button>
        
    </div>

    <div id="div5">
        <a href=" ">FAQ</a><br>
        <a href=" ">Contact us</a>

        
    </div>

</body>
<script>
    var myIndex = 0;
    carousel();
    
    function carousel()
    {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
      x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 3000); // Change image every 3 seconds
    }
    function hide()
    {
        var x = document.getElementById("div4");
        if (x.style.display === "none") 
        {
            x.style.display = "block";
        } 
        else
        {
            x.style.display = "none";
        }
    }
    function sessioncheck()
    {
        var y="<?php echo $x; ?>";
        if(y == 0)
        {
            alert("Please Login First.");
        }
        else
        {
            window.location.replace("list.php");
        }

    }
    function pageelement()
    {
        var y="<?php echo $x; ?>";
        if (y==1)
        {
            document.getElementById("proset").style.display="inline";
            document.getElementById("login").style.display="none";

        }
        
        
    }
    function upload()
    {
        var type="<?php echo $type; ?>";
        if(type=="admin")
        {
            window.location.replace("upload.php");
        }
        else
        {
            alert("Only an admin type user can upload.");   

        }
    }
    

</script>

</html>