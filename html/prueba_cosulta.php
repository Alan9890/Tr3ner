
<!DOCTYPE html>
<?PHP
session_start();
$db = new PDO("sqlite:tr5nr.sqlite");
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$codig=2;

function DB_Search($tabla, $id, $column){
  try {
    $res = $db -> query('SELECT * FROM'.$tabla.'WHERE'.$column=$id);
    foreach ($res as $row) {
      echo 'selecciono'.$row[$column];
    }
  }
  catch(PDOException $e) {
    echo ("exception " . $e->getMessage());
  }

}


DB_Search("estacion",1, "nombre");

?>
