<!DOCTYPE html>
<html>
    <head>
        <style>
            .styling{
                color: white;
                font-size: large;
            }
            body{
                background-color: #7dd1c2;
                /* background-image: linear-gradient(to right bottom, #ff3535e3, #3a0096c9,#ff3535e3 ); */
            }
        </style>
        <title>User Profile</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="name.css" />   
    </head>
    <body>
        <div id="profile">
            <!-- <center> -->
            <h1><strong>Uploaded Posts : </strong></h1><hr><br><br>
        


<?php

include("config.php");
$query = "SELECT * FROM POSTS";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total != 0){
     
    ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
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

<a class="styling" href="welcome.php">back</a>
<a class="styling" href="addpost.php">To Add New Post</a>

</div>
        </body>
            </html>




