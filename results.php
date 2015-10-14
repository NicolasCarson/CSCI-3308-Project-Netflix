
<?php
$host = "127.0.0.1";
$user = "root";                    
$pass = "";                                 
$db = "netflix"; 
$port = 3306;

$genre = $_POST['Genre'];

echo $genre;

$conn = mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());

$sql = "SELECT * FROM movies";

$result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['Name'];
    }



?>
