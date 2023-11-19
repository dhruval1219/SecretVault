<?php
    $user_=$_POST['uname'];
    $pass_=$_POST['psw1'];

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

    $query = "SELECT * FROM users WHERE user = '$user_'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        echo "<script>
        alert('Username taken!');
        window.location.href='register.html';
        </script>";
    } else {
        $sql = "INSERT INTO Users VALUES ('$user_', '$pass_')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('New login created successfully!');
                window.location.href='login.html';
                </script>";
        }
    }

    $conn->close();
?>