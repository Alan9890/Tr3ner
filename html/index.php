<!DOCTYPE html>
<?php //PHP SQLITE connection
  $db = new PDO("sqlite:tr5nr.sqlite");
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  session_start(); //Iniciaamos la sesion

  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alan9890 Trener!</title>

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
			     Tr3ner
			</h3>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>
									Viaje
								</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-active">
                <th scope="row">Origen</th>
								<td>
                  <form action="" type='submit' method='POST'>
                    <select name="origen" id="origen" onchange="this.form.submit()">
                      <?php
                         try {
                           $res = $db -> query('SELECT * FROM estacion');
                           foreach ($res as $row) {
                             echo '<option value='.$row['codigo'].'>' .$row['nombre'] . '</option>';
                           }
                         }
                         catch(PDOException $e) {
                           echo ("exception " . $e->getMessage());
                         }
                         if(isset($_POST['origen'])){
                           if(!empty($_POST['origen'])) {
                             $selected = $_POST['origen'];
                             $_SESSION["id_origen"]= $selected;
                           } else {
                             echo 'Please select the value';
                           }
                         }
                      ?>
                    </select>
                  </form>
                  <td>
                    <?php
                      $res = $db -> query('select * from Estacion where codigo='.$_SESSION["id_origen"]);
                    foreach ($res as $row) {
                      print "Selected:".$row['nombre'];
                    }
                    ?>
                  </td>
               </td>
							</tr>
							<tr class="table-active">
                <th scope="row">Destino</th>
                <td>
                  <form action="" type='submit' method='POST'>
                    <select name="destino" id="destino" onchange="this.form.submit()">
                      <?php
                         try {
                           $res = $db -> query('SELECT * FROM estacion');
                           foreach ($res as $row) {
                             echo '<option value='.$row['codigo'].'>' .$row['nombre'] . '</option>';
                           }
                         }
                         catch(PDOException $e) {
                           echo ("exception " . $e->getMessage());
                         }
                         if(isset($_POST['destino'])){
                           if(!empty($_POST['destino'])) {
                             $selected = $_POST['destino'];
                             $_SESSION["id_destino"]= $selected;
                           } else {
                             echo 'Please select the value';
                           }
                         }
                      ?>
                    </select>
                  </form>
                  <td>
                    <?php
                      $res = $db -> query('select * from Estacion where codigo='.$_SESSION["id_destino"]);
                    foreach ($res as $row) {
                      print "Selected:".$row['nombre'];
                    }
                    ?>
                  </td>
						</tbody>
            <table class="table">
              <thead>
                <tr>
                  <th>
                    Datos
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-active">
                  <th scope="row">Proximo</th>
                  <td>VALOR ACTUAL</td>
                  <td>
                    <form method="get" action="proximos.php">
                      <button type="submit" class="btn btn-success">Ver proximos...
                      </form>
                  </td>
                </tr>
                <tr class="table-active">
                  <th scope="row">Costo estudiante</th>
                  <td>
                    PRINT
                  </td>
                  <td>
                    <form method="get" action="proximos.php">
                      <button type="submit" class="btn btn-success">Ver proximos...
                      </form>
                  </td>
                </tr>
                <tr class="table-active">
                  <th scope="row">Tiempo de viaje</th>
                  <td>
                    MINUTAJE
                  </td>
                  <td>
                  </td>
                </tr>
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
      Desarrllo nativo para web developer
    </dd>
  </dl>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
