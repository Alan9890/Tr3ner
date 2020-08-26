<!DOCTYPE html>
<?php //PHP SQLITE connection
  $db = new PDO("sqlite:tr5nr.sqlite");
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $_SESSION["id_user"]=0;
  $date = date('Y-m-d H:i:s');
  session_start();
  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Proximos viajes</title>

    <meta name="Trener solved" content="Code problem solution">
    <meta name="Alan Navarro" content="">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
			     Proximos viajes
			</h3>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>
									Horarios
								</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-active">
                <th scope="row">Tiempo</th>
								<td>
									Hora de llegada <!--AQUI VA A SER UN INPUT -->
								</td>

                <?php
                    try {
                      $res = $db -> query('SELECT * FROM horario WHERE origen='.$_SESSION["id_origen"].' AND direccion='.$_SESSION["id_destino"]);
                      //$res = $db -> query('select * from estacion where codigo=1');
                      foreach ($res as $row) {
                        print '<tr class="table active"><td>'.$row['hora']. '</td></tr>';

                        $_SESSION['Proximo']=$row['hora'];
                      }
                    }
                    catch(PDOException $e) {
                      echo ("exception " . $e->getMessage());
                    }
                ?>
              </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
  <div class="col-md-12">
    <ul class="nav nav-pills">
      <li class="nav-item">
         <a class="nav-link" href="index.php">Viaje <span class="badge badge-light">42</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="datos.php">Mis datos <span class="badge badge-light">16</span></a>
      </li>
    </ul>
  </div>
  <dl>
    <dt>
      Description
    </dt>
    <dd>
      Tr5ner test web development
    </dd>
  </dl>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
