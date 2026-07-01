<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$apiKey = "YOUR_API_KEY";
$city = "Delhi";

$url = "https://api.weatherapi.com/v1/current.json?key=$apiKey&q=$city";

$response = @file_get_contents($url);

$weather = null;

if ($response !== false) {
    $weather = json_decode($response, true);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?> 👋</h2>

    <p style="text-align:center; margin-bottom:25px;">
        You have successfully logged in.
    </p>

    <?php if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){ ?>

        <a href="manage_users.php">
            <button type="button">👥 Manage Users</button>
        </a>

        <br><br>

    <?php } ?>

    <a href="profile.php">
    <button type="button">👤 My Profile</button>
</a>

<br><br>

    <a href="weather.php">
        <button type="button">🌤 View Weather</button>
    </a>

    <br><br>

    <a href="logout.php">
        <button type="button">🚪 Logout</button>
    </a>

</div>

</body>
</html>