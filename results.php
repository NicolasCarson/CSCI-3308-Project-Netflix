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
}
//title trailer poster rating description
$conn = mysqli_connect($host, $user, $pass, $db) or die(mysql_error());

?>

<html>

<?php
for($i=0; $i < $N; $i++)
{
     $sql = "SELECT filmID FROM films_genres WHERE genreID=$aGenre[$i]";
     $result = mysqli_query($conn, $sql);
     $num_films = $result->num_rows;
     $index = rand(0, $num_films-1);
     mysqli_data_seek($result, $index);
     $row = mysqli_fetch_assoc($result);
     $filmID = $row['filmID'];
     
     $sql = "SELECT name from genres WHERE genreID=$aGenre[$i]";
     $genre_name = mysqli_fetch_array(mysqli_query($conn, $sql));
     $genre = $genre_name[0];
     
     $sql = "SELECT * from films WHERE filmID=$filmID";
     $film_details = mysqli_query($conn, $sql);
     mysqli_data_seek($film_details, 0);
     $row = mysqli_fetch_assoc($film_details);
     $title = $row['title'];
     $trailer = $row['trailer'];
     $poster = $row['poster'];
     $rating = $row['rating'];
     if($rating < 0.0) {
         $rating = "Not Available";
     } else {
         $rating = (string)$rating . " / 10";
     }
     $description = $row['description'];
?>


    <style type="text/css">
         body{
              background-color: #141414;
              margin:0;
              padding:0;
              height:100%;
         }
        
         h1{
              color: red;
              font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
              display: block;
              font-size: 40px;
              padding-left: 30px;
              padding-right: 10px;
              perspective: 100px;
              perspective-origin: 50% 0;
              transform-origin: 0 0;
              transform: scaleX(80) rotateY(89.5deg);
          }
          
         p{
              color: white;
              font-size: 20px;
              display: block;
              font-family: arial;
          }
          
          poster img{
              padding-left: 20px;
              padding-right: 2px;
              padding-bottom: 5px;
              float: left;
              width:30%;
          }
          
          genre{
              color:white;
              font-size: 16px;
              width: 40%;
              font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
              position: relative;
              float:right ;
              padding-left:20px;
              padding-right:25%;
          }
          
          rating{
              color:red;
              font-size: 16px;
              width: 40%;
              font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
              position: relative;
              float:right ;
              padding-left:20px;
              padding-right:25%;
          }
          
          description{
              color:white;
              font-size: 16px;
              width: 40%;
              font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
              position: relative;
              float:right;
              padding-left:20px;
              padding-right:25%;
          }
          
        </style>
    <body>
         <h1><?php echo $title?></h1>
         <poster><img src="<?php echo $poster?>"></poster>
         <genre><i>Genre: </i> <?php echo $genre?><br/></genre>
         <rating><i>IMDB rating: </i><?php echo $rating?></rating>
         <description><i>Summary:</i> <?php echo $description?></description>
<?php   if(!empty($trailer)) { ?>
        <iframe title="YouTube video player" class="youtube-player" type="text/html" 
              width="640" height="170" src="<?php echo $trailer?>"
              frameborder="0" allowFullScreen></iframe>
<?php } ?>
         <iframe type="text/html" width="100%" height="70px" frameborder="0"></iframe>
    </body>

<?php
}
?>
</html>
