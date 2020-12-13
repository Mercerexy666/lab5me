<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
        <?
            if((isset($_POST['id']))&&(isset($_POST['index']))){
                $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
                $index = htmlentities(mysqli_real_escape_string($link, $_POST['index']));
                switch($index){
                    case "game":
                        if((isset($_POST['name']))&&(isset($_POST['genre']))&&(isset($_POST['dev']))&&(isset($_POST['publisher']))&&(isset($_POST['volume']))){
                            $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                            $genre = htmlentities(mysqli_real_escape_string($link, $_POST['genre']));
                            $dev = htmlentities(mysqli_real_escape_string($link, $_POST['dev']));
                            $publisher = htmlentities(mysqli_real_escape_string($link, $_POST['publisher']));
                            $volume = htmlentities(mysqli_real_escape_string($link, $_POST['volume']));
                            if((strlen($name)==0)||(strlen($genre)==0)||(strlen($dev)==0)||(strlen($publisher)==0)||(strlen($volume)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "UPDATE $database.$index SET name = '$name', zhanr = '$genre', developer = '$dev', izdatel = '$publisher', volume = '$volume' WHERE $database.$index.id = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "digital":
                        if((isset($_POST['name']))&&(isset($_POST['url']))){
                            $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                            $url = htmlentities(mysqli_real_escape_string($link, $_POST['url']));
                            if((strlen($url)==0)||(strlen($name)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "UPDATE $database.$index SET name = '$name', url = '$url' WHERE $database.$index.id = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "dkey":
                        if((isset($_POST['date_b']))&&(isset($_POST['date_e']))&&(isset($_POST['game']))&&(isset($_POST['digital']))&&(isset($_POST['cost']))&&(isset($_POST['dkey']))){
                            $date_b = htmlentities(mysqli_real_escape_string($link, $_POST['date_b']));
                            $date_e = htmlentities(mysqli_real_escape_string($link, $_POST['date_e']));
                            $game = htmlentities(mysqli_real_escape_string($link, $_POST['game']));
                            $digital = htmlentities(mysqli_real_escape_string($link, $_POST['digital']));
                            $cost = htmlentities(mysqli_real_escape_string($link, $_POST['cost']));
                            $dkey = htmlentities(mysqli_real_escape_string($link, $_POST['dkey']));
                            if(($game=="")||($digital=="")){
                                die("Ошибка значения пусты");
                            }
                            $query = "UPDATE $database.$index SET date_b = '$date_b', date_e = '$date_e', game = '$game', digital = '$digital', cost = '$cost', dkey = '$dkey' WHERE $database.$index.id = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                }
            }
        ?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>