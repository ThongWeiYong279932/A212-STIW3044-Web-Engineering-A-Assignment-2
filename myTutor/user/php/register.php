<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "mytutor";

 try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (PDOException $e) {
     echo $sql . "<br>" . $e->getMessage();
 }

if(isset($_POST['submit'])){
    $email = addslashes($_POST['email']);
    $password = sha1($_POST['password']);
    $name = addslashes($_POST['username']);
    $phoneNo = $_POST['phoneNo'];
    $address = addslashes($_POST['address']);
    $sqlRegister = "INSERT INTO `tbl_users`(`user_name`, `user_email`, `user_password`, `user_phone_number`, `user_home_address`) 
    VALUES ('$name', '$email', '$password', $phoneNo, '$address')";
    try{
        $conn->exec($sqlRegister);
        if (file_exists($_FILES["profileImage"]["tmp_name"]) || is_uploaded_file($_FILES["profileImage"]["tmp_name"])) {
            $last_id = $conn->lastInsertID();
            uploadImage($last_id);
            echo "<script>alert('Registration Success')</script>";
            echo "<script>window.location.replace('login.php')</script>";
        }
    }catch(PDOException $e){
        echo "<script>alert('Registration Failed')</script>";
        echo "<script>window.location.replace('register.php')</script>";
    }
}

function uploadImage($filename){
    $target_dir = "../resources/userProfile/";
    $target_file = $target_dir.$filename.".png";
    move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css//w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../javaScripts/register.js"></script>
    <title>MyTutor User Registration</title>
</head>

<body>
    <header class="w3-header w3-blue w3-center w3-padding-32">
        <h3>MyTutor User Registration Page</h3>
    </header>

    <div>
        <p class="w3-container w3-padding w3-blue w3-center w3-margin">Registration Form</p>
    </div>

    <div style="display: flex;justify-content: center">
        <div class="w3-padding-32 w3-margin" style="width:600px;margin:auto;text-allign:center;">
            <form name="registrationForm" action="register.php" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to register with the following credentials')">
                <p>
                    <label class="w3-text-blue"><b>Email</b></label>
                    <input class="w3-input w3-round w3-border" type="email" name="email" id="idemail" placeholder="Input your Email" required>
                </p>
                <p>
                    <label class="w3-text-blue"><b>Password</b></label>
                    <input class="w3-input w3-round w3-border" type="password" name="password" id="idpassword" placeholder="Input your Password" required>
                </p>
                <p>
                    <img class="w3-image w3-margin w3-center" src="../resources/user icon.png" style="height:100%;width:400px;">
                    <input type="file" name="profileImage" id="idimage" onchange="previewFile()" required>
                </p>
                <p>
                    <label class="w3-text-blue"><b>Name</b></label>
                    <input class="w3-input w3-round w3-border" type="text" name="username" id="idname" placeholder="Input your Name" required>
                </p>
                <p>
                    <label class="w3-text-blue"><b>Phone Number</b></label>
                    <input class="w3-input w3-round w3-border" type="tel" name="phoneNo" id="idphoneNo" maxlength="11" placeholder="Input your Phone Number" required>
                </p>
                <p>
                    <label class="w3-text-blue"><b>Home Address</b></label>
                    <textarea class="w3-input w3-round w3-border" type="text" name="address" id="idaddress" rows="4" width="100%" placeholder="Input your Address" required></textarea>
                </p>
                <p class="w3-center">
                    <input class="w3-button w3-round w3-border w3-blue" type="submit" name="submit" id="idsubmit" value="Register">
                </p>
            </form>
            <div style="text-align:center">
                <a class="w3-text-blue" href="login.php">Already have an account? Please Login</a>
            </div>
        </div>
    </div>

    <footer class="w3-footer w3-center w3-blue"><p>MyTutor</p></footer>

</body>
</html>