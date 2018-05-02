<?php
  include "estados.php";
  include "escuelas.php";
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

		<section id="filtro" <?php if(!empty($_GET["estado"])) echo "class='filtrado'"; ?> >
			<h2>Buscar por estado</h2>
      <?php if(!empty($_GET["estado"])){echo "<h3>Mostrando solo esuelas de ".$estados[$_GET['estado']]."</h3>";} ?>
      <form>
  			<select <?php if(empty($_GET["estado"])){echo "name='estado'";}else{echo "style='display:none;'";} ?> onchange='if(this.value != 0) { this.form.submit(); }'>
          <option value="0">Seleccionar</option>
          <?php
            foreach ($estados as $key => $value) {
              echo "<option value='$key'>$value</option>";
            }
          ?>
  			</select>
        <input type="submit" value="Borrar filtro" <?php if(empty($_GET["estado"])){echo "style='display: none;'";} ?> >
      </form>
		</section>

		<section id="resultados" class="cards">
      <?php
        foreach ($escuelas as $key => $escuela) {
          if( empty($_GET["estado"]) || $escuela["estado"] == $_GET["estado"]){
            echo "<article class='link-card' onclick='console.log(this.getElementsByTagName(\"form\")[0].submit())'>";
            echo "<form action='busqueda.php'><input type='hidden' name='busqueda' value='".$escuela["nombre"]."'></form>";
            echo "  <h3>";
      			echo $escuela["nombre"];
      			echo "	</h3>";
      			echo "	<figure>";
      			echo "		<img alt='Logo de ".$escuela["nombre"]."' src='".$escuela["img"]."'>";
      			echo "	</figure>";
      			echo "	<p>";
      			echo $escuela["descripcion"];
      			echo "	</p>";
            echo "<span>Ubicacion: ".$estados[$escuela["estado"]]."</span>";
      			echo "</article>";
          }
        }
      ?>
		</section>
    <script type="text/javascript">
      let a = <?php echo json_encode($escuelas); ?>;
      new Autocomplete(document.getElementById("buscador"), a.map((el)=>el.nombre));
    </script>

	</body>


</html>
