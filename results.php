
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

?>

<html>
<style type="text/css">
     body{
          background-color: #141414;
          margin:0;
          padding:0;
          height:100%;
     }
     phph1{
          color: red;
          font-family: arial black;
          display: block;
          font-size: 40px;
          padding-left: 20px;
          padding-right: 10px;
          perspective: 100px;
          perspective-origin: 50% 0;
          transform-origin: 0 0;
          transform: scaleX(80) rotateY(89.5deg);
      }
      phpp{
          color: red;
          font-size: 20px;
          display: block;
          font-family: arial black;
      }
  </style>
<body>
    <phph1><?php echo $genre ?></h1>
    <phpp>To be filled out once we have data. :)</p>
</body>
</html>



