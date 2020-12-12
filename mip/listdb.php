<html>
<head>
    <style type=text/css>
    tr
    {
        max-height: 150px;
        border: 2px solid rgb(96, 107, 122);
    }
    td
    {
        width: 33.33%;
    }
    img
    {
        width:300px;
        height:200px;
    }
    

    </style>
</head>
<body>
    

<?php
    $name=$_GET['name'];
    session_start();
    include("seriesdb.php");
    $query = "SELECT * FROM series WHERE name LIKE '%$name%' LIMIT 5";
    $exe = MySQLi_query($conn, $query);
    if($name=="")
    {   
        $rs=mysqli_query($conn,"select * from series");
        if(mysqli_num_rows($rs)<1)
        {
            echo "<tr>No Any Series In Database.</tr>";
        }
        else
        {
            $g="GENRE :-> ";
            $d="DESCRIPTION :-> ";
            while($resulth=mysqli_fetch_array($rs))
            {
                //$d="DESCRIPTION :-> ";
                echo "<tr><td>".$resulth['name']."</td>
                    <td><img src=".$resulth['path']."></td>
                    <td>".$g.$resulth['genre']."<br>".$d."<br>".$resulth[intro]."</td></tr>";
            }
        } 
    }
    else if(mysqli_num_rows($exe)<1)
    {
        echo "<tr>No Any Series From This Name.</tr>";
    }
    else
    {
        $g="GENRE :-> ";
        $d="DESCRIPTION :-> ";
        while($resulth=mysqli_fetch_array($exe))
        {
        echo "<tr><td>".$resulth['name']."</td>
            <td><img src=".$resulth['path']."></td>
            <td>".$g.$resulth['genre']."<br>".$d."<br>".$resulth[intro]."</td></tr>";
        }
    }
        
    
?>
</body>
</html>