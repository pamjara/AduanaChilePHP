<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Aduana Chile</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../libs/assets/font-awesome/css/font-awesome.css" type="text/css" />
  <link rel="stylesheet" href="../libs/jquery/waves/dist/waves.css" type="text/css" />
  <link rel="stylesheet" href="styles/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="styles/app.min.css" type="text/css" />


</head>
<body>
<div >
  

  <div class="center-block w-xxl w-auto-xs p-v-md">
    <div class="navbar">
      <div class="navbar-brand m-t-lg text-center">
       

         <img src="images/aduanalogo.jpg" style="display:inline" height="50px">
              <span class="m-l inline" style="display:inline"><b>ADUANAS OSORNO</b></span>
      </div>
    </div>
    <div class="p-lg panel md-whiteframe-z1 text-color m">
      <div class="m-b">
        RECUPERAR CONTRASEÑA
        <p class="text-xs m-t">Ingrese su correo electronico</p>
      </div>
      <form name="reset">
        <div class="md-form-group">
          <input type="email" ng-model="email" class="md-input"  id="txtMail" required>
          <label> Email</label>
        </div>
        <button md-ink-ripple type="submit" class="md-btn md-raised pink btn-block p-h-md" >Enviar</button>
      </form>
    </div>
    <p id="alerts-container"></p>
    <div class="p-v-lg text-center"><a href="login.php" class="md-btn">Volver</a></div>    
  </div>



</div>

<script src="scripts/app.min.js"></script>



</body>
</html>
