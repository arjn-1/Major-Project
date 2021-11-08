<?php
session_start();


if (!isset($_SESSION["username"])) {
    header("Location: welcome.php");
}

include 'config.php';
include 'welcome.php';
     
if (isset($_POST["update"])) {//when the update button is clicked
    $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $age = mysqli_real_escape_string($conn, $_POST["age"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $state = mysqli_real_escape_string($conn, $_POST["state"]);
    $pin = mysqli_real_escape_string($conn, $_POST["pin"]);

            $sql = "UPDATE users SET fullname='$fullname', phone='$phone', age='$age' , address='$address' , city='$city' , state='$state', pin='$pin' WHERE username='{$_SESSION["username"]}'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Profile Updated Successfully')</script>";
            } else {
                echo "<script>alert('Profile can not Updated.')</script>";
                echo  $conn->error;
            }
    
    }

?>


<html>
   <head>
       <title>Updation of profile</title>
       <style>
           body{
               background-color: white;        
           }
           input{
               width: 40%;
               height: 5%;
               border: 1px;
               padding: 8px 15px 8px 15px;
               margin: 10px 0px 10px 0px;
               box-shadow: 1px 1px 2px 1px grey;
           }
       </style>
   </head>

   <body>
       <center>
           <h1>Update Profile</h1>
           <form action="" method="POST">
               <!-- <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" required><br> -->
               <input type="text" name="fullname" placeholder="Enter new name or old name" required><br>
               <input type="text" name="phone" placeholder="Enter new phone no. or old phone no." pattern="[0-9]{5} [0-9]{5}" required><br>
               <input type="text" name="age" placeholder="Enter new age" required><br>
               <input type="text" name="address" placeholder="Enter the address" ><br>
               <input type="text" name="city" placeholder="Enter the city" ><br>
               <input type="text" name="state" placeholder="Enter the state"><br>
               <input type="text" name="pin" placeholder="Enter the pin code"><br>

               <input type="submit" name="update" value="UPDATE DATA">

           </form>
       </center>
   </body>
</html>

