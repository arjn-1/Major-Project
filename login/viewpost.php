<!DOCTYPE html>
<html>
    <head>
        <style>
            .styling{
                color: white;
                font-size: large;
            }
            body{
                background-color: #ff3535e3;
            }
           
        </style>
        <title>User Profile</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="name.css" />  
        <link rel="stylesheet" href="style2.css"> 
    </head>
    <body>
        <div id="profile">
            <br>

            <!-- <center> -->
            <h1><strong>Uploaded Posts : </strong></h1>
            <br>
            <hr class="myname">
            
            
        </div>
        <br><br>
        


<?php

include("config.php");
$query = "SELECT * FROM POSTS";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total != 0){
     
    ?>

    <table class="hello2">
        <tr>
            <th class="hello3"> Name    </th>

            <th class="hello3"> Description    </th>
            <th class="hello3"> Image    </th>
        </tr>
    
    

<?php
    while($result = mysqli_fetch_assoc($data))
    {
       echo "<tr>
       <td>".$result['name']."</td>
       <td>".$result['description']."</td>
       <td><img src='".$result['image']."' height = '200' width = '200'/></td>
       </tr>";
    }
}
else{
   echo "NO RECORD FOUND";
}


?>
</table>
<br><br><br><br>

<a class="styling4" href="welcome.php">back</a>
<br><br>
<a class="styling4" href="addpost.php">To Add New Post</a>


        </body>
            </html>




