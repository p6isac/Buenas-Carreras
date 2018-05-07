<?php
  include "escuelas.php";
  include "estados.php";
  include "carreras.php";
  include "lista.php";

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
<html lang="es" >

  <html>
	<head>
		<title>Buenos Carreras</title>
		<meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">

    <script src="./js/autocomplete.js" charset="utf-8"></script>
	</head>

  <style>

        /* Style the buttons that are used to open and close the accordion panel */
      .accordion {
          background-color: #eee;
          color: #444;
          cursor: pointer;
          padding: 18px;
          width: 100%;
          text-align: left;
          border: none;
          outline: none;
          transition: 0.4s;
      }

      /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
      .active, .accordion:hover {
          background-color: #A2D9CE;
      }

      /* Style the accordion panel. Note: hidden by default */
      .panel {
          padding: 0 18px;
          background-color: white;
          display: none;
          overflow: hidden;
      }

</style>

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
            Ubicación:
            <?php echo $estados[$escuela["estado"]] ?>
          </span>
         
        </div>

        <h1 align="left">Carreras que se imparten:</h1>
        <?php
        foreach ($carreras as $clave => $carrera) {

          if($carrera["universidad"]==$escuela["nombre"]){

              if( empty($_GET["carrera"]) || $carrera["carrera"] == $_GET["carrera"]){

              echo"    <button class='accordion'>Nombre: ".$lista[$carrera["carrera"]]."</button>
                    <div class='panel'>
                      <p><strong>Descripción:</strong></BR>".$carrera["descripcion"]."</p></br>
                      <p><strong>Características del Aspirante:</strong></BR>".$carrera["carasteristicas"]."</p></br>
                      <p><strong>Campo y mercado de trabajo:</strong></BR>".$carrera["campo de trabajo"]."</p>
                    </div>";

                }
              }
            } 
      ?>
    
      </article>
    
    <div style="width: 100vw; text-align: center; margin-top: 1em;">
      <a href="./filtro.php" class="btn" style='margin-top: 2em;'>Volver</a>
    </div>

    <script type="text/javascript">
      let a = <?php echo json_encode($escuelas); ?>;
      new Autocomplete(document.getElementById("buscador"), a.map((el)=>el.nombre));

      //----------------------collapside-----------------------

      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
              /* Toggle between adding and removing the "active" class,
              to highlight the button that controls the panel */
              this.classList.toggle("active");

              /* Toggle between hiding and showing the active panel */
              var panel = this.nextElementSibling;
              if (panel.style.display === "block") {
                  panel.style.display = "none";
              } else {
                  panel.style.display = "block";
              }
          });
      }

    </script>

	</body>


</html>
