<?php

    session_start();
    include("logindb.php");

    
    if(!isset($_SESSION['login']))
    {
        $x=0;
        header("Location: login.php");
        exit;
    
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
        height:100% ;
        width: 12%;
    }
    #logo1
    {
        width: 90%;
        height:100%
    }
    #search
    {   
        position:absolute;
        
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
        
        display:inline;

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
        background-color: rgb(144, 162, 185);
        display: block;
        top: 44%;
        left: 0%;
        width: 100%;
        height: 900px;
        position: absolute;
        border: 2px solid black;
        padding: 2px;
        text-align: center;
        overflow-y: auto;
        

    }
    #div4
    {
        
        display: none;
        top: 8%;
        right: 0%;
        width: 20%;
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
        top: 195%;
        left: 0%;
        width: 100%;
        height: 30%;
        position: relative;
        padding: 2px;
        text-align: center;

    }
    table
    {
        
        width: 100%;
        border: 2px solid black;
    }
    tr
    {
        max-height: 100px;
        border: 2px solid rgb(96, 107, 122);
    }
    td
    {

        width: 33.33%;
        border: 2px solid  rgb(96, 107, 122);
    }

    #home,#pro,#upload,#logout
    {
        width: 99%;
        height: 25%;
        background-color: rgb(247, 211, 144);
        border: 3px solid  rgb(150, 110, 36);
        border-radius: 10px;
        font-weight: bold;
        font-size: 22px;
        
    }
    
   
    
    


    </style>
</head>

<body onload="sug('')">

    <div id="div1">
        
        <a href="home.php"><img id="logo" src="logo.jpg" alt="TWSp" width="12%" height="100%"></a>
        
            
        <input id="search" onkeyup="sug(this.value)" type="text" size="50" placeholder="Search Series">    
        <button id="proset" onclick="hide()" type="button" >
            Welcome <?php echo $name ; ?>

        </button>
            
        
        

    </div>
    <div id="div2">
        <img id="logo1" src="d2.jpg" alt="Girl in a jacket" width="90%" height="100%">     
    </div>
    <div id="div3">
        <table id="series">
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </table>
   
                
    </div>
    <div id="div4">
        <button id="home" onclick=location.href="home.php" type="button" >
            Home

        </button>
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

<script type="text/javascript">
    function sug(str)
    {
        var req=new XMLHttpRequest();
       
        req.open("get","http://localhost/mip/listdb.php?name="+str,true);
        req.send();
        
        req.onreadystatechange=function(){
            
            if (req.readyState==4 && req.status==200)
            {                  
                document.getElementById("series").innerHTML=req.responseText;
            }
        }
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