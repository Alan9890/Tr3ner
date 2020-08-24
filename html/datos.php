<!DOCTYPE html>
<?php //PHP SQLITE connection
  $db = new PDO("sqlite:tr5nr.sqlite");
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
			     MIS DATOS
			</h3>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>
									Mis datos
								</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-active">
                <th scope="row">Tipo de usuario</th>
								<td>
                  <select>
                    <?php
                       try {
                         $res = $db -> query('select tipo from usuario');
                         //print '<table>';
                         foreach ($res as $row) {
                           echo '<option value="" selected= "selected?" onclick="this.parentNode.form.submit()">' .$row['tipo'] . '</option>';
                         }
                       }
                       catch(PDOException $e) {
                         print ("exception " . $e->getMessage());
                       }
                    ?>
                  </select>
             </td>
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
      Desarrllo nativo para web developer
    </dd>
  </dl>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
