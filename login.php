<?php
    $user_=$_POST['uname'];
    $pass_=$_POST['psw'];
    
    $servername = "localhost";
    $username = "dpatel175";
    $password = "dpatel175";
    $dbname = "dpatel175";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql="SELECT * FROM Users WHERE user='$user_' and pass='$pass_'";
    // $sql = "SELECT * FROM USERS WHERE user LIKE '$user_' and pass LIKE '$pass_'";
    $result=mysqli_query($conn,$sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $url = "viewdb.php?user=" . urlencode($user_);
            header("Location: $url");
        } else {
            echo "<script>
                alert('Incorrect login!');
                window.location.href='login.html';
                </script>";
        }
    } else {
        header("Location: login.html");
    }
    $conn->close();
?>
