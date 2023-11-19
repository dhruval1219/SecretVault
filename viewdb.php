<!DOCTYPE html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/navigationbar.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/viewdb.css">
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
</body>
<script>
    function login() {
        var user = "<?php echo $_GET['user']?>";
        window.location="addlogin.php?user=".concat(user);;
    }
    function key() {
        var user = "<?php echo $_GET['user']?>";
        window.location="addkey.php?user=".concat(user);;
    }
    function note() {
        var user = "<?php echo $_GET['user']?>";
        window.location="addnote.php?user=".concat(user);;
    }
</script>

</html>

<center>
    <?php
    $user_ = $_GET['user'];

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

    echo "<div class='welcome'>Welcome, $user_!</div>";
    echo "<div class='heading'>Logins</div>";

    $sql = "SELECT * FROM SecretVault_Login WHERE User like '$user_'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $id = 1;
        echo "<Table><th><td class='tableheading'>Name</td><td class='tableheading'>Username</td><td class='tableheading'>Password</td></th>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td class='id'>" . $id . "</td><td class='namecol'>" . $row['Name'] . "</td><td class='logincol'>" . $row['Username'] . "</td><td class='logincol'>" . $row['Password'] . "</td></tr>";
            $id++;
        }
        echo "</table><br>";
        echo "<button onclick='login()'> Add login </button>";
    } else {
        echo "No logins saved<br><br>";
        echo "<button onclick='login()'> Add login </button>";
    }

    echo "<div class='heading'>Secret Key</div>";

    $sql = "SELECT * FROM SecretVault_SecretKey WHERE User like '$user_'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $id = 1;
        echo "<Table><th><td class='tableheading'>Name</td><td class='tableheading'>Secret Key</td></th>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td class='id'>" . $id . "</td><td class='namecol'>" . $row['Name'] . "</td><td>" . $row['SecretKey'] . "</td></tr>";
            $id++;
        }
        echo "</table><br>";
        echo "<button onclick='key()'> Add key </button>";
    } else {
        echo "No secret key saved<br><br>";
        echo "<button onclick='key()'> Add key </button>";
    }

    echo "<div class='heading'>Secret Note</div>";

    $sql = "SELECT * FROM SecretVault_SecretNote WHERE User like '$user_'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $id = 1;
        echo "<Table><th><td class='tableheading'>Name</td><td class='tableheading'>Secret Note</td></th>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td class='id'>" . $id . "</td><td class='namecol'>" . $row['Name'] . "</td><td>" . $row['SecretNote'] . "</td></tr>";
            $id++;
        }
        echo "</table><br>";
        echo "<button onclick='note()'> Add note </button>";
    } else {
        echo "No notes found<br><br>";
        echo "<button onclick='note()'> Add note </button>";
    }
    
    ?>
</center>