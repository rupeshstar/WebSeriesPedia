<?php
    session_start();
    
    include("updb.php");

?>
<html>

<head>
    <meta charset="utf-8"/>
    <title>The Web Series Pedia</title>
    <style type=text/css>

    
    body
    {
        background-color: rgb(250, 204, 144); 
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
    
    #div3
    {
        
        display: block;
        top: 9%;
        left: 0%;
        width: 100%;
        height: 100%;
        position: absolute;
        padding: 2px;
        text-align: center;
        border: 2px solid peru;

    }
    table
    {
        position: absolute ;
        top: 05%;
        left: 28%;
        border: 2px solid rgb(204, 150, 50);
    }
    td
    {   
        width: 200px;
        height: 60px;
        border: 1px solid rgb(204, 150, 50);
    }
    textarea
    {
        resize: none;
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
    #pro,#home,#logout
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
        <button id="proset" onclick="hide()" type="button" >
            Welcome <?php echo $pname ; ?>

        </button>
        
        

    </div>
    <div id="div2">

    </div>
    <div id="div3">
        <form action=" " method="POST" enctype="multipart/form-data">
            <table>
                <tr><th colspan="2" align="middle">Upload Series Details</th></tr>
                <tr>
                    <td>Name Of Series </td>
                    <td><input type="text" name="name" class="" required="true" minlength="2" size="31" ></td>
                </tr>
                <tr>
                    <td>Genre</td>
                    <td><input type="text" name="genre" class="" required="true" minlength="3" size="31" ></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="desc" id="desc" cols="45" rows="10" required="true" minlength="15" ></textarea></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="img" class="" required=" true"></td>
                </tr>
                <tr>
                    <td colspan="2" align="middle"><input type="submit" name="submit" class="" value="Submit"></td>
                </tr>
            </table>
        </form>
        
                
    </div>
    <div id="div4">
        <button id="home" onclick=location.href="home.php" type="button" >
            Home

        </button>
        <button id="pro" onclick=location.href="profile.php" type="button" >
            Profile

        </button>
        <br>
        
        <button id="logout" onclick=location.href="logout.php" type="button" >
            Log out

        </button>
        
    </div>


</body>
<script>
    
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
            window.location.replace("login.php");
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

        }
        
        
    }
    

</script>

</html>