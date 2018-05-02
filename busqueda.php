<?php
  include "escuelas.php";
  include "estados.php";
  if(empty($_GET["busqueda"])){
    header("Location: ./filtro.php");
  }

  foreach ($escuelas as $key => $value) {
    if($value["nombre"] == $_GET["busqueda"])
      $escuela = $value;
  }
  if(empty($escuela))
    header("Location: ./filtro.php");

?>


<!DOCTYPE html>
<html lang="en" >

<body>

  <html>
	<head>
		<title>Buenos catalogos</title>
		<meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">

    <script src="./js/autocomplete.js" charset="utf-8"></script>
	</head>

	<body>
	   <?php include "header.php" ?>

    <section id="escuela">
      <article>
        <h2><?php echo $escuela["nombre"] ?></h2>
        <figure>
          <img alt= <?php echo "Logo de ".$escuela['nombre'] ?> src=<?php echo $escuela["img"] ?>>
        </figure>
        <div class="" height="100%">
          <p>
            <?php echo $escuela["descripcion"] ?>
          </p>
          <span>
            Ubicacion:
            <?php echo $estados[$escuela["estado"]] ?>
          </span>
        </div>
      </article>
    </section>
    <div style="width: 100vw; text-align: center; margin-top: 1em;">
      <a href="./" class="btn" style='margin-top: 2em;'>Volver</a>
    </div>

    <script type="text/javascript">
      let a = <?php echo json_encode($escuelas); ?>;
      new Autocomplete(document.getElementById("buscador"), a.map((el)=>el.nombre));
    </script>

	</body>


</html>
