<?php
require_once "config.php";//The require_once keyword is used to embed PHP code from another file. If the file is not found, a fatal error is thrown and the program stops. If the file was already included previously, this statement will not include it again.
$username = $password = $confirm_password = $phone = $address = $city = $state = $pin = $fullname = $age = $gender = "";//new empty variables 
$username_err = $password_err = $confirm_password_err = $err = "";//new variable 

if($_SERVER['REQUEST_METHOD'] == "POST"){// collect the value of input field
    //check if username is empty
    if(empty(trim($_POST["username"]))){//after removing white space from both side of the string to check if it is empty
        $username_err = "username cannot be blank";
        echo "username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);//returns a statement object or false if it is not created
        if($stmt){//if it is created
            mysqli_stmt_bind_param($stmt, "s", $param_username);//function is used to bind variables to the parameter markers of a prepared statement
            
            //set value of param  username
            $param_username = trim($_POST['username']);

            //try to execute the statement
            if(mysqli_stmt_execute($stmt)){//Executes previously prepared statement.that has been prepared at 13line
             mysqli_stmt_store_result($stmt);//stores the result
                if(mysqli_stmt_num_rows($stmt) == 1){//if that username matches to one in the table 
                    $username_err = "This username is already taken";
                    echo "This username is already taken";
                }
                else{
                    $username = trim($_POST['username']);//store that name clearing the white spaces from the string
                }
            }
            else{
                echo "something went wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);
//check for address
    if(empty(trim($_POST['address']))){//collect the value of address and if it is empty show
      $err = "Address cant be blank";
      echo "Address cannot be blank";
  }
  else{
    $address = trim($_POST['address']);//input the address after clearing white spaces
}

//check for phone
if(empty(trim($_POST['phone']))){//collect the value of phone no and if it is empty
  $err = "phone cant be blank";
  echo "phone cannot be blank";
}
else{
$phone = trim($_POST['phone']);//input the phone after clearing white spaces
}

//check for city
if(empty(trim($_POST['city']))){//collect the value of city and if it is empty
  $err = "city cant be blank";
  echo "city cannot be blank";
}
else{
$city = trim($_POST['city']);//input the city after clearing white spaces
}

//check for state
if(($_POST['state']) == "Choose..."){//collect the value of state and if it is empty
  $err = "state cant be blank";
  echo "state cannot be blank";
}
else{
$state = trim($_POST['state']);//input the state after clearing white spaces
}

//check for pin
if(empty(trim($_POST['pin']))){//collect the value of pin code and if it is empty
  $err = "pin can't be blank";
  echo "pin code can't be blank";
}
else{
$pin = trim($_POST['pin']);//input the pin code after clearing white spaces
}

//check for fullname
if(empty(trim($_POST['fullname']))){//collect the value of pin code and if it is empty
  $err = "fullname can't be blank";
  echo "fullname can't be blank";
}
else{
$fullname = trim($_POST['fullname']);//input the pin code after clearing white spaces
}

//check for gender
if(($_POST['gender']) == "Choose..."){//collect the value of state and if it is empty
  $err = "gender cant be blank";
  echo "gender cannot be blank";
}
else{
$gender = trim($_POST['gender']);//input the state after clearing white spaces
}

if(empty(trim($_POST['age']))){//collect the value of pin code and if it is empty
  $err = "age can't be blank";
  echo "age can't be blank";
}
elseif((trim($_POST['age'])) < 16)
{
  $err = "age cannot be less than 16";
  echo "age cannot be less than 16";
}
else{
$age = trim($_POST['age']);//input the pin code after clearing white spaces
}

//check for password
if(empty(trim($_POST['password']))){//collect the value of password and if it is empty
    $password_err = "Password cant be blank";
    echo "Password cant be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){//if the password is not empty but less than 5 char
    $password_err = "Password cannot be less tahan 5 chars";
    echo "Password cannot be less tahan 5 chars";
}
elseif(!preg_match("#[0-9]+#",$password)) {//preg match finds the first match in the string
  $passwordErr = "Your Password Must Contain At Least 1 Number!";
  echo "Your Password Must Contain At Least 1 Number!";
}
elseif(!preg_match("#[A-Z]+#",$password)) {
  $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
  echo "Your Password Must Contain At Least 1 Capital Letter!";
}
elseif(!preg_match("#[a-z]+#",$password)) {
  $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
  echo "Your Password Must Contain At Least 1 Lowercase Letter!";
}
else{
    $password = trim($_POST['password']);//input the password after clearing white spaces
}

//check for confirm passsword
if(trim($_POST['password']) != trim($_POST['confirm_password'])){//if the confirm password and password does not match
    $password_err = "Passwords should match";
    echo "Passwords do not match";
}

//if there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($err))//no errors were there
{
    $sql = "INSERT INTO users (username, address, gender,phone , fullname, age, city, state ,pin, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssssssssss" ,$param_username ,$param_address, $param_gender, $param_phone, $param_fullname ,$param_age ,$param_city ,$param_state ,$param_pin, $param_password);//to create two new parameter to store string
        //set these parameters
        
        $param_username = $username;
        $param_address = $address;
        $param_gender = $gender;
        $param_phone = $phone;
        $param_fullname = $fullname;
        $param_age = $age;
        $param_city = $city;
        $param_state = $state;
        $param_pin = $pin;
        $param_password = password_hash($password, PASSWORD_DEFAULT);//to hash the password using by default algorithm
        //try to execute the query
        if(mysqli_stmt_execute($stmt))//if the execution is successful got to login.php
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong ... cannot redirect";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   <!-- responsive-->

   <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
    
    <title>php login system</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark"><!--expand for resp collapsing and color schemes -->
  <a class="navbar-brand" href="#">Php Login System</a><!--for your company, product, or project name. -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown"><!--for grouping and hiding navbar contents by a parent breakpoint. -->
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container mt-4">
<h3>Please Register Here:</h3>
<hr>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="username" id="inputEmail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
    <label for="inputname">Full Name</label>
    <input type="text" class="form-control" id="inputname" name="fullname" placeholder="JOHN WATSON" required>
  </div>
  <div class="form-group col-md-6">
    <label for="inputage">Age</label>
    <input type="text" class="form-control" id="inputage" name="age" placeholder="12" required>
  </div>
  <div class="form-group col-md-4">
      <label for="inputgender">Gender</label>
      <select id="inputgender" name="gender" class="form-control">
        <option selected>Choose...</option>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
        </select>
    </div>
    <div class="form-group col-md-6">
    <label for="inputPhone">Phone No.</label>
    <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="12345 67890" pattern="[0-9]{5} [0-9]{5}" required>
  </div>
  <div class="form-group col-md-8">
    <label for="inputAddress2">Address </label>
    <input type="text" class="form-control" id="inputAddress2" name="address" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city" placeholder="new delhi, bombay, chennai ...">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" name="state" class="form-control">
        <option selected>Choose...</option>
        <option>Andhra Pradesh</option>
        <option>Arunachal Pradesh</option>
        <option>Assam</option>
        <option>Bihar</option>
        <option>Chhattisgarh</option>
        <option>Delhi</option>
        <option>Goa</option>
        <option>Gujarat</option>
        <option>Haryana</option>
        <option>Himachal Pradesh</option>
        <option>Jharkhand</option>
        <option>Karnataka</option>
        <option>Kerala</option>
        <option>Madhya Pradesh</option>
        <option>Maharashtra</option>
        <option>Manipur</option>
        <option>Meghalaya</option>
        <option>Mizoram</option>
        <option>Nagaland</option>
        <option>Odisha</option>
        <option>Punjab</option>
        <option>Rajasthan</option>
        <option>Sikkim</option>
        <option>Tamil Nadu</option>
        <option>Telangana</option>
        <option>Tripura</option>
        <option>Uttar Pradesh</option>
        <option>Uttarakhand</option>
        <option>West Bengal</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Pin Code</label>
      <input type="text" class="form-control" name="pin" id="inputZip" title="must contain a valid pin code">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group col-md-6">
      <label for="inputPassword4">Confirm Password</label> 
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" 
      title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>
<div id="message" class="container mb-4">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>5 characters</b></p>
</div>
<script type="text/javascript" src="./pswrd-valid.js"></script>
  </body>
</html>
