<?php
require_once("welcome.php");
require_once("config.php");
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
        <link rel="stylesheet" type="text/css" href="css/form.css" />   
    </head>
    <body>
        <div id="profile">
            
            <p class="name">Name: <?php echo $user_fullname; ?></p>
            <p class="name">Phone: <?php echo $user_phone; ?></p>
            <p class="name">Phone: <?php echo $user_phone; ?></p>
            <p class="name">Age: <?php echo $user_age; ?></p>
            <p class="name">Gender: <?php echo $user_gender; ?></p>
            <p class="name">Address: <?php echo $user_address; ?></p>
            <p class="name">City: <?php echo $user_city; ?></p>
            <p class="name">State: <?php echo $user_state; ?></p>
            <p class="name">Pin Code: <?php echo $user_pin; ?></p>
        
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <!-- <input type="submit" name="back_btn" value="welcome.php" /> -->
                </form>
            </p>
        </div>
    </body>
</html>
