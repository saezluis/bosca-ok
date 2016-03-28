<!DOCTYPE html>
<html lang="es">
  <head>
    <title> </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="tema/js/scripts.js"></script>	
    <style>
      .wrap{
          position:absolute;
          top:50%;
          left: 50%;
          margin-top: -100px;
          margin-left: -100px;
      }

      h2{
        font-weight: 400;
        font-size: 0.9em;
        text-align: center;
      }

      form#logg{
        background: #fff;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
      }

      form#logg label, input[type="text"],input[type="password"]{
        width: 90%;
        padding: 5px;
        font-family: 'Open Sans', sans-serif;
        font-size: 1em;
      }

      form#logg label{
          width: 100%;
          display: block;
          text-align: left;
      }

      form#logg input[type="text"],input[type="password"]{
        margin-bottom: 0.6em;
      }

      form#logg input[type="submit"]{
        color: #fff;
          background: #E65524;
          width: 100%;
          padding: 8px;
          text-align:center;
          border: none;
          cursor: pointer;
          width: 95%;
          margin-bottom: 0.6em;   
          transition: .3s all;
          font-size: 1em;

      }

      form#logg input[type="submit"]:hover{
        background: #272822;
      }
    </style>
  </head>
  <body>
  <div class="wrap">
    <figure>
      <img src="img/logo.png" alt="">
    </figure>
	  <h2>Login Administrador</h2>
	     <br>
      <form id="logg" method="post" action="checklogin.php" class="login">
        <label for="myusername">Usuario</label>
        <input name="myusername" type="text" id="myusername">
        <label for="mypassword">Contraseña</label>
        <input name="mypassword" type="password" id="mypassword">
        <input type="submit" id="submit" value="Entrar">
      </form>
  </div><!--fin .wrap -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/login.js"></script>
  </body>
</html>