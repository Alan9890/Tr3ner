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
                  <form action="" type='submit' method='POST'>
                    <select name="tipo_usuario" id="tipo_usuario" onchange="this.form.submit()">
                      <?php
                         try {
                           $res = $db -> query('SELECT * FROM usuario');
                           echo '<option value="">Select...</option>';

                           foreach ($res as $row) {
                             echo '<option value='.$row['codigo'].'>' .$row['tipo'] . '</option>';
                           }
                         }
                         catch(PDOException $e) {
                           echo ("exception " . $e->getMessage());
                         }
                         if(isset($_POST['tipo_usuario']) OR $_POST['tipo_usuario']=''){
                             $selected = $_POST['tipo_usuario'];
                             $_SESSION["id_user"]= $selected;
                         }

                      ?>
                    </select>
                  </form>
                  <td>
                    <?php
                      $res = $db -> query('SELECT * FROM usuario where codigo='.$_SESSION["id_user"]);
                    foreach ($res as $row) {
                      print "Selected:".$row['tipo'];
                      //print $date;
                    }
                    ?>
                  </td>
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
      Tr5ner test web development
    </dd>
  </dl>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
