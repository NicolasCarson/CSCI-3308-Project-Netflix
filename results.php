<?php
$host = "127.0.0.1";
$user = "root";                    
$pass = "";                                 
$db = "Netflix"; 

$aGenre = $_POST['genre'];
if(empty($aGenre))
{
     echo("You didn't select any genres.");
}
else
{
     $N = count($aGenre);
     
     echo("You selected $N door(s): ");
     for($i=0; $i < $N; $i++)
     {
          echo($aGenre[$i] . " ");
     }
}


/*
foreach($_POST['genre'] as $genre)
{
  echo $genre;
     
}
*/

//title trailer poster rating description
$conn = mysqli_connect($host, $user, $pass, $db) or die(mysql_error());

$sql = "SELECT title FROM films";

$result = mysqli_query($conn, $sql);

//while ($row = $result->fetch_assoc()) {
//	foreach ($row as $title) {
		//echo $title . "\n";
//	}
//}
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
    <phpp><?php echo $trailer?></p>
    <phpp><?php echo $poster?></p>
    <phpp><?php echo $rating?></p>
    <phpp><?php echo $description?></p>
</body>
</html>



