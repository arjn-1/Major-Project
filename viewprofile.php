<?php
session_start();
//require_once("welcome.php");//
require_once("config.php");//Here the connection file i included so that it can be used in this current page.


?>

<?php
$query = " SELECT * FROM `users` WHERE id = '{$_SESSION['id']}' ";
$run_query = mysqli_query($conn, $query);
    
if(mysqli_num_rows($run_query) == 1){
while($result = mysqli_fetch_assoc($run_query)){
$user_username = $result['username'];
$user_fullname = $result['fullname'];
$user_phone = $result['phone'];
$user_gender = $result['gender'];
$user_city = $result['city'];
$user_state = $result['state'];
$user_age = $result['age'];
$user_address = $result['address'];
$user_pin = $result['pin'];
}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Profile</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="name.css" />   
    </head>
    <body>
        <div id="profile">
            <!-- <center> -->
            <h1><strong>User Information : </strong></h1><hr><br><br>
            <p class="name"><strong>Email: </strong><?php echo $user_username; ?></p><br><br>
            <p class="name"><strong>Name: </strong><?php echo $user_fullname; ?></p><br><br>
            <p class="name"><strong>Phone: </strong><?php echo $user_phone; ?></p><br><br>
            <p class="name"><strong>Age: </strong><?php echo $user_age; ?></p><br><br>
            <p class="name"><strong>Gender: </strong><?php echo $user_gender; ?></p><br><br>
            <p class="name"><strong>Address:</strong> <?php echo $user_address; ?></p><br><br>
            <p class="name"><strong>City: </strong><?php echo $user_city; ?></p><br><br>
            <p class="name"><strong>State: </strong><?php echo $user_state; ?></p><br><br>
            <p class="name"><strong>Pin Code: </strong><?php echo $user_pin; ?></p><br><br>
        
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <!-- <input type="submit" name="back_btn" value="Back" href="welcome.php"> -->
                <br><br> <a class="styling" href="Profile_update.php"><strong>Update Information</strong></a><br><br>
                    <a class="styling" href="welcome.php"><strong>back</strong></a>
                    
                </form>
            </p>
<!-- </center> -->
        </div>
    </body>
</html>
