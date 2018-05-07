<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
<style>
body, html {
    height: 100%;
    margin: 0;
}

.hero-image {
  background-image: url("Resources/Images/carrera.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
 
}

.hero-text {
  text-align: center;
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}

.footer {
 
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}

#info{

  font-size: 30px;

  text-align: right;



}

</style>
</head>

<body>
  <div>

  <?php include "header.php" ?>

  </div>

<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px">Encuentra la carrera de tus sueños!!</h1>
    <p>Da click en el botón</p>
    <button onclick="window.location.href='/Buenas-Carreras/filtro.php'">CONTINUAR</button>
  </div>
</div>

<section>
    <article>

        <p id="info">
        "Hemos creado un sistema que te ayudara a encontrar la carrera de tus sueños en cualquier estado de la de la república, te ofrecemos eficiencia, facilidad y claridad en tu busqueda, que esperas encuentra tu mejor opción!!"
        </p>
    </article>
   
  </section> 

  <aside>
    

        <img src="Resources/Images/sueno.jpg">
      
  </aside>

  <footer class="footer">
    <p>2018 Copyright Text</p>
    <p>Preparatoria 6 Antonio Caso</p>
    
  </footer>
</body>
</html>