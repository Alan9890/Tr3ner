
<?php

  $db = new PDO("sqlite:tr5nr.sqlite");
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $codig=2;
  try {

    $res = $db -> query('select * from estacion where codigo='.$codig);


    print '<table>';
    foreach ($res as $row) {

      print '<tr><td>' . $row['codigo'] . '</td><td>' . $row['nombre'] . '</td></tr>';

    }
    print '</table>';

  }
  catch(PDOException $e) {

    print ("exception " . $e->getMessage());

  }

  //print "<p><a href='05_select_values_with_param.html'>Select</a> values with parameter";

?>
