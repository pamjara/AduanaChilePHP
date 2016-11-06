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
<div class="app">
  

  <div class="center-block w-xxl w-auto-xs p-v-md" style="width:450px"> 

    <div class="p-lg panel md-whiteframe-z1 text-color m">
        <img src="images/aduanalogo.jpg" style="display:inline">
          <span class="m-l inline" style="display:inline"><b>ADUANAS OSORNO</b></span>
          <HR/>
          <div class="m-b text-sm">
            Ingrese su cuenta de Aduanas
          </div>
      <form name="form" action='/index'>
        <div class="md-form-group float-label">
          <input type="text"   class="md-input" id="txtUsuario" name="txtNick" required>
        
          <label>Usuario</label>
        </div>
        
        <div class="md-form-group float-label">
          <input type="password" class="md-input"  id="txtClave" name="txtClave" required>
          <label>Contraseña</label>
        </div>      
        
        <button md-ink-ripple type="button" class="md-btn md-raised pink btn-block p-h-md"  id="btnAcceso" >Ingresar al Sistema</button>
      </form>
    </div>



     <p id="alerts-container"></p>
    <div class="p-v-lg text-center"><a href="recupera.php" class="md-btn">RECUPERAR CONTRASEÑA</a></div>    
  </div>
         
    
  </div>


<script src="libs/jquery/jquery.min.js"></script>

 <script>
        
        $(document).ready(function(){

			$(".validaBlur").blur(function(){
				var campo = $(this).attr("data-campo");
				var mensaje = $(this).attr("data-mensaje");
				var valor = $(this).val();
				var obj = $(this);
				if(valor!=""){
                   $.ajax({
                        type: 'POST',
                        url: "../../Actions/ServidorAPI.php",
                        data: {hdnTipo:"ValidarCampo", txtCampo:campo, txtValor:valor},
                        success: function(jSon) { 
							console.log(jSon);
							jSon = $.parseJSON(jSon); 
							
                           if(jSon.Clase!="bg-success"){ 
							crearNotificacion("Valida Formulario", mensaje, "bg-info", 1);
							 obj.select().focus();
						   }
                        }
                    }); 

				}


			});

            $("#btnAcceso").click(function(){
          
                if($("#txtUsuario").val() =="" || $("#txtClave").val()==""){

					crearNotificacion("Se ha detectado un Problema", "Ingrese sus datos de acceso, por favor", "bg-warning", 1);
              
                }else{
                   $.ajax({
                        type: 'POST',
                        url: "../../Actions/ServidorAPI.php",
                        data: {hdnTipo:"ValidarAcceso", txtNick:$("#txtUsuario").val(), txtClave:$("#txtClave").val()},
                        success: function(jSon) { 
							console.log(jSon);
							jSon = $.parseJSON(jSon); 
							
                           if(jSon.Clase=="bg-success"){
							   	location.href = 'index.php';
						   }else{
							crearNotificacion("Se ha detectado un Problema", jSon.Mensaje, "bg-warning", 1);
							   
						   }
                        }
                    });   
                }
            });
       $("#btnCancelarRegistro").click(function(){
					$("#txtRut").val("");
					$("#txtNick").val("");
					$("#txtNombre").val("");
					$("#txtApellido").val("");
					$("#txtMail").val("");
					$("#txtFono").val("");
			});

		$("#btnRecuperarClave").click(function(){
				if($("#txtMailRecupera").val() ==""){

					crearNotificacion("Se ha detectado un Problema", "Ingrese el E-Mail que quiere recuperar por favor", "bg-warning", 1);
              
                }else{
                   $.ajax({
                        type: 'POST',
                        url: "Actions/ServidorAPI.php",
                        data: {
							hdnTipo:"RecuperarClave",  
							txtMail:$("#txtMailRecupera").val()					
							},
                        success: function(jSon) { 
							console.log(jSon);
							jSon = $.parseJSON(jSon); 
					
							crearNotificacion("Green House", jSon.Mensaje, jSon.Clase, 1);
							$("#txtMailRecupera").val("");	
							$("#btnCancelarRecuperacion").click();
                        }
                    });   
                }

		});
		$("#btnGenerarRegistro").click(function(){
	 
				if($("#txtApellido").val() =="" || $("#txtMail").val()=="" || $("#txtFono").val()=="" || $("#txtRut").val() =="" || $("#txtNick").val()=="" || $("#txtNombre").val()==""){

					crearNotificacion("Se ha detectado un Problema", "Ingrese sus datos de acceso, por favor", "bg-warning", 1);
              
                }else{
                   $.ajax({
                        type: 'POST',
                        url: "Actions/ServidorAPI.php",
                        data: {
							hdnTipo:"GuardarUsuario", 
							txtRut:$("#txtRut").val(), 
							txtNick:$("#txtNick").val(),
							txtNombre:$("#txtNombre").val(),
							txtApellido:$("#txtApellido").val(),
							txtMail:$("#txtMail").val(),
							txtFono:$("#txtFono").val()							
							},
                        success: function(jSon) { 
							console.log(jSon);
							jSon = $.parseJSON(jSon); 
					
							crearNotificacion("Aduanas", jSon.Mensaje, jSon.Clase, 1);
							$("#btnCancelarRegistro").click();
                        }
                    });   
                }
			}); 
        });
            
        </script>

                                
              
<script src="scripts/app.min.js"></script>



</body>
</html>
