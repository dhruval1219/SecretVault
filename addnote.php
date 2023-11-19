<!DOCTYPE html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/navigationbar.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/login.css">
    <!-- <link rel="stylesheet" href="css/add.css"> -->
</head>

<body>

    <!-- Header -->
    <center>
        <div class="header">
            <p class="static">SecretVault</p>
        </div>
    </center>

    <!-- Navigation Bar -->
    <div class="topnav">
        <a href="home.html" id="navElement">Home</a>
        <a href="aboutme.html" id="navElement">About Me</a>
        <a href="checklist.html" id="navElement">Checklist</a>
        <a class="active" href="login.html" id="navElement">Log out</a>
    </div>

    <!-- <div>Add Note</div> -->

    <form method="POST">
        <div class="container">
            <label for="name"><b>Name</b></label><br>
            <input type="text" placeholder="Enter Name" name="name" required><br>

            <label for="note"><b>Note</b></label><br>
            <input type="text" placeholder="Note" name="note" required><br>

            <center><button type="submit" name="submit">Add</button></center>
        </div>
    </form>
    
</body>
</html>

<?php
    $servername = "localhost";
    $username = "dpatel175";
    $password = "dpatel175";
    $dbname = "dpatel175";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $user_ = $_GET['user'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $name = $_POST['name'];     
        $note = $_POST['note'];    
        $url = "viewdb.php?user=" . $user_;

        $sql = "INSERT INTO SecretVault_SecretNote (User, Name, SecretNote) VALUES ('$user_', '$name', '$note')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('New note added!');
                window.location.href='$url';
                </script>";
        }
        else{
            echo "<script>
            alert('Error!');
            window.location.href='$url';
            </script>";
        }
    }
?>