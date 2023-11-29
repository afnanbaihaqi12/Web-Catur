<?php
session_start();
require_once 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$query = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$query->execute([$user_id]);
$user = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <h1>Selamat datang,
        <?php echo $user['username']; ?>!
    </h1>
    <p>Email:
        <?php echo $user['email']; ?>
    </p>

    <a href="edit_profile.php">Edit Profil</a>

    <br><br>
    <a href="login.php">Logout</a>
</body>

</html>