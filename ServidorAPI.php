<?php
session_start();
include_once '../Clases/Datos/Conexion.php';
include_once '../Clases/Acceso/accPuente.php';

$jSon = array();


    if(isset($_POST['hdnTipo'])){
        $Typo =$_POST['hdnTipo']; 
        
        $Puente = new accPuente();
        
        if($Typo=="ValidarAcceso"){
             $Usuario	=$_POST['txtNick'];
             $Clave	    =$_POST['txtClave'];  

             if($Usuario =="" || $Clave ==""){
                    $jSon['Clase']   = "bg-warning";
                    $jSon['Mensaje'] = "Faltan datos para el Ingreso al Sistema";
             }else{
                try {
                  $Arr =    $Puente->ValidarAcceso($Usuario, $Clave);

                  if(count($Arr)>0){
                        $Puente->GeneraSession($Arr);
                        $jSon['Clase'] = "bg-succe6ss";
                        $jSon['Mensaje'] ="Usuario Validado";
                 
                  }else{
                        $jSon['Clase'] = "bg-error";
                        $jSon['Mensaje'] ="Usuario NO Validado";
                  }
                  } catch (Exception $exc) {
                      $jSon['Clase'] = "bg-error";
                      $jSon['Mensaje'] =$exc->getTraceAsString();
                  }
             }
        }else if ($Typo =="ValidarCampo"){
             $Campo	=$_POST['txtCampo'];
             $Valor	    =$_POST['txtValor']; 
             if($Campo=="UsrRut"){
                 $Valor = FormateaRutaNumerico($Valor);
             }
              try {
                  if($Puente->ConsultaExisteValor("usuario", $Campo, $Valor)>0){
                      $jSon['Clase'] = "bg-warning";  
                  } else{
                    $jSon['Clase'] = "bg-success";         
                  }
             
             } catch (Exception $exc) {
                 $jSon['Clase'] = "error";
                 $jSon['Mensaje'] =$exc->getTraceAsString();
             }
            
            
        }else if($Typo =="ActualizarUsuario"){
                $Nombre = $_POST["txtNombre"];
                $Apellido = $_POST["txtApellido"];
                $Mail = $_POST["txtMail"];
                $Fono = $_POST["txtFono"]; 
 
            if($Nombre=="" || $Apellido=="" || $Mail=="" || $Fono==""){
                 $jSon['Clase']   = "bg-warning";
                 $jSon['Mensaje'] = "Falta Información en el formulario, por favor verificar";
            }else{
                try {

                    $Puente->ActualizarUsuario( $Nombre, $Apellido, $Mail, $Fono, $_SESSION['Usuario']);
   
                $_SESSION['Mail']       = $Mail;
                $_SESSION['Nombre']     = $Nombre;
                $_SESSION['Apellido']   =$Apellido;
                $_SESSION['Fono']       = $Fono;

                    $jSon['Mensaje'] ="Se actualizaron sus datos de perfil";
                    $jSon['Clase'] = "bg-success"; 
                } catch (Exception $exc) {
                    $jSon['Clase'] = "error";
                    $jSon['Mensaje'] =$exc->getTraceAsString();
                }        
            } 
        }else if($Typo=="CargaTipoCultivos"){
        try {

                  $jSon =  $Puente->CargaTipoCultivos();  
                print_r($jSon); 
                } catch (Exception $exc) {
                    $jSon['Clase'] = "error";
                    $jSon['Mensaje'] =$exc->getTraceAsString();
                }        
        }else if($Typo =="ActualizarClave"){
                $Clave = $_POST["txtClave"]; 
 
            if($Clave==""){
                 $jSon['Clase']   = "bg-warning";
                 $jSon['Mensaje'] = "Falta Información en el formulario, por favor verificar";
            }else{
                try {

                    $Puente->ActualizarClave( $Clave, $_SESSION['Usuario']); 
                    $jSon['Mensaje'] ="Se actualizaron su contraseña";
                    $jSon['Clase'] = "bg-success"; 
                } catch (Exception $exc) {
                    $jSon['Clase'] = "error";
                    $jSon['Mensaje'] =$exc->getTraceAsString();
                }        
            }  

 }else if ($Typo =="GuardarRegistro"){ 
                $NRegistro = $_POST["txtNRegistro"];
                $TipoIngreso = $_POST["slcTipoIngreso"];
                $Patente = $_POST["txtPatente"];
                $TipoCarga = $_POST["slcTipoCarga"];
                $Kilos = $_POST["txtKilos"];
                $Pasajeros = $_POST["txtPasajeros"]; 
                $Dus = $_POST["txtDus"]; 
                $Fecha = $_POST["txtFecha"]; 
 
            if($NRegistro=="" || $TipoIngreso=="" || $Patente=="" || $TipoCarga=="" || $Kilos=="" || $Pasajeros=="" || $Dus==""||$Fecha==""){
                 $jSon['Clase']   = "bg-warning";
                 $jSon['Mensaje'] = "Falta Información en el formulario, por favor verificar";
            }else{

             try {
                
                $Puente->GuardarRegistro($NRegistro, $TipoIngreso, $Patente, $TipoCarga, $Kilos, $Pasajeros, $Dus, $Fecha);
                    $jSon['Mensaje'] ="Se guardo el registro";
                    $jSon['Clase'] = "bg-success"; 
                } catch (Exception $exc) {
                    $jSon['Clase'] = "error";
                    $jSon['Mensaje'] =$exc->getTraceAsString();
                }        
            }


            
}else if($Typo=="ListarIngresos"){
            $jSon = $Puente->listarIngresos();



            
}else if ($Typo =="GuardarUsuario"){ 
                $Rut = ( $_POST["txtRut"]);
                $Nick = $_POST["txtNick"];
                $Nombre = $_POST["txtNombre"];
                $Apellido = $_POST["txtApellido"];
                $Cargo = $_POST["txtCargo"];
                $Celular = $_POST["txtFono"];
                $Email = $_POST["txtMail"]; 
 
            if($Rut=="" || $Nick=="" || $Nombre=="" || $Apellido=="" || $Cargo=="" || $Celular=="" || $Email=="" ){
                 $jSon['Clase']   = "btn btn-success";
                 $jSon['Mensaje'] = "Falta Información en el formulario, por favor verificar";
            }else{
                try {
                    $Clave  = generaClaveAleatoria();
                    $mail    = generaMail($Nombre, $Clave, $Nick);
                    //Titulo
                    $titulo = "Control de Acceso Aduana";
                    //cabecera
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                    //dirección del remitente 
                    $headers .= "From: Fernando Fidler < noreply@AduanaChile.cl >\r\n"; 
                    //Enviamos el mensaje a tu_dirección_email 
                    $bool = mail($Mail,$titulo,$mail,$headers); 
                    //aduana_invernadero	aduana_usuario

                    $Puente->GuardarUsuario($Rut, $Nombre, $Nick, $Apellido, $Cargo, $Celular, $Email, $Clave);
                    $jSon['Mensaje'] ="Se ha creado el usuario y se envio informacion de acceso a su correo electronico";
                    $jSon['Clase'] = "btn-success"; 
                } catch (Exception $exc) {
                    $jSon['Clase'] = "error";
                    $jSon['Mensaje'] =$exc->getTraceAsString();
                }        
            }
     }else if($Typo=="RecuperarClave"){
             $Mail = $_POST["txtMail"]; 
            if($Mail==""){
                 $jSon['Clase']   = "bg-warning";
                 $jSon['Mensaje'] = "Falta Información en el formulario, por favor verificar";
            }else{
                try {
                    $Arr    = $Puente->obtieneNombreClaveNickUsuarioSegunMail($Mail);
                     
                    $Clave  = $Arr["UsrClave"];
                    $Usuario  = $Arr["UsrAlias"];
                    $Nick  = $Arr["UsrNick"];

                    $mail    = generaMailRecupera($Nombre, $Clave, $Nick);
                    //Titulo
                    $titulo = "Control de Acceso Aduanas Osorno";
                    //cabecera
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                    //dirección del remitente 
                    $headers .= "From: Fernando Fidler < noreply@aduanasOosrno.cl >\r\n"; 
                    //Enviamos el mensaje a tu_dirección_email 
                    $bool = mail($Mail,$titulo,$mail,$headers);  
 
                    $jSon['Mensaje'] ="Se envio la contraseña al e-mail <b>" .$Mail."</b>";
                    $jSon['Clase'] = "bg-success"; 
                } catch (Exception $exc) {
                    $jSon['Clase'] = "error";
                    $jSon['Mensaje'] =$exc->getTraceAsString();
                }        
            }
        }
        
      print json_encode($jSon);
    }

  function FormateaRutaNumerico($Rut){
        if($Rut==""){
            return "";
        }else{
            $ArRut = explode("-", $Rut);
            return str_replace(".", "", $ArRut[0]);
        }
    }
    
    function ConvierteaRut($Rut){
        return $this->TransformarMiles($Rut)."-".$this->AgregarDv($Rut);
    }
    
    function AgregarDv($rut){
        $rut = strrev($rut);
        $s=0;
        $d="";
        $aux = 1;
        for($i=0;$i<strlen($rut);$i++){
            $aux++;
            $s += intval($rut[$i])*$aux;if($aux == 7){
                $aux=1;
                }
        }
        $digit = 11-$s%11;
        if($digit == 11){
            $d = 0;
        }elseif($digit == 10){
            $d = "K";     
        }else{
            $d = $digit;
        }
        return $d;
    } 
        
    function TransformarMiles($Numero){
        return number_format($Numero, 0, ",", ".");
    }

function generaClaveAleatoria(){
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $longitudCadena=strlen($cadena);
     
    $pass = "";
    $longitudPass=10;
     
    for($i=1 ; $i<=$longitudPass ; $i++){
        $pos=rand(0,$longitudCadena-1);
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}

function generaMailRecupera($Nombre, $Contraseña, $Nick){
$mail = <<<EOT
           <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
					
										
			    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,">
				<title>GreenHouse</title><style>
			        @import url(https://fonts.googleapis.com/css?family=Raleway:400,800,600,300,500,700,800italic,200);
			        @import url(https://fonts.googleapis.com/css?family=Lato:400,300,700,900);
		
                    html { width: 100%; }
                    body {margin:0; padding:0; width:100%; -webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
                    img { display: block !important; border:0; -ms-interpolation-mode:bicubic;}

                    .ReadMsgBody { width: 100%;}
                    .ExternalClass {width: 100%;}
                    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                    .images {display:block !important; width:100% !important;}

                    .Heading {font-family: Raleway, Segoe UI, Arial, Helvetica Neue, Helvetica, sans-serif !important;}	
                    .Content {font-family: Lato, Segoe UI, Arial, Helvetica Neue, Helvetica, sans-serif !important;}			
                    p {margin:0 !important; padding:0 !important;}			
                    
                    a {font-family:'Lato', Arial, Helvetica Neue, Helvetica, sans-serif !important;}		
                    .button td, .button a  {font-family: Lato, Arial, Helvetica Neue, Helvetica, sans-serif !important;}
                    .button a:hover {text-decoration:none !important;}	


                    /* MEDIA QUIRES */

                    @media only screen and (max-width:640px)
                    {
                        body {width:auto !important;}
                        table[class=display-width] {width:100% !important;}	
                        .text-centre{ text-align: center !important; }
                        .hide-padding { padding: 0 !important; }
                        .hidden-height{height :0 !important;}
                        .height-space{height :30px !important;}
                        .hide-padding { padding:0 20px !important; }				
                        td[class=res-height] { height:40px !important; }
                        td[class=testi-height] { height:20px !important; }
                    }

                    @media only screen and (max-width:480px)
                    {
                        table[class=display-width] table {width:100% !important;}
                        table[class=display-width] .button-width .button {width:auto !important;}
                        td[class="height-hidden"] {display:none !important;}
                        
                        
                    }
		        </style>
					
										
				</head>
                <body marginwidth="0" marginheight="0" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;" offset="0" topmargin="0" leftmargin="0"><table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%" data-thumb="http://190.107.177.240/~aduana/GreenHouse/assets/images/logoGhouse.jpg" data-module="Header Menu" data-bgcolor="Header Menu BG" class="">			
			<tbody><tr>
				<td align="center">
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="display-width" width="100%">
						<tbody><tr>
							<td align="center" style="padding:0 30px;">	
								<table align="center" border="0" cellpadding="0" cellspacing="0" class="display-width" width="600">
									<tbody><tr>
										<td class="height-space" height="20"></td>
									</tr>	
									<tr>
										<td>  
											<table align="left" border="0" cellpadding="0" cellspacing="0" width="250" class="display-width" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
												<tbody><tr>
												   <td align="center" class="Heading" style="color:#333333; font-family:Segoe UI, Helvetica Neue, Arial, Verdana, Trebuchet MS, sans-serif; font-size:30px; font-weight:600;line-height:36px; text-transform:capitalize; letter-spacing:1px;" data-color="Title" data-size="Title" data-min="12" data-max="40">
														Green House
													</td>
												</tr>												
											</tbody></table>

											<table align="left" border="0" cellpadding="0" cellspacing="0" class="display-width" width="1" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
												<tbody><tr>
													<td height="15" width="1"></td>
												</tr>
											</tbody></table>	
														
											<table align="right" border="0" cellpadding="0" cellspacing="0" class="display-width" width="37%" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;width:auto;">
												<tbody><tr>
													<td valign="middle">
														<table align="center" border="0" cellspacing="0" cellpadding="0" style="width:auto !important;" class="">												
															<tbody><tr>
																<td class="hidden-height" height="13" style="line-height:13px;"></td>
															</tr>
															<tr>													
																<td align="left" valign="middle" class="Content" style="color:#333333;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:14px;font-weight:400;letter-spacing:1px;line-height:24px;text-transform:uppercase;">
																	<span href="#" style="color:#333333;text-decoration:none;" data-color="Header Menus" data-size="Header Menus" data-min="10" data-max="26">
																		Control
																	</span>
																</td>
																<td width="10">&nbsp;</td>
																<td align="left" valign="middle" class="Content" style="color:#333333;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:14px;font-weight:400;letter-spacing:1px;line-height:24px;text-transform:uppercase;">
																	<span href="#" style="color:#333333;text-decoration:none;" data-color="Header Menus" data-size="Header Menus" data-min="10" data-max="26">
																		Monitoreo
																	</span>
																</td>
																<td width="10">&nbsp;</td>
																<td align="left" valign="middle" class="Content" style="color:#333333;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:14px;font-weight:400;letter-spacing:1px;line-height:24px;text-transform:uppercase;">
																	<span href="#" style="color:#333333;text-decoration:none;" data-color="Header Menus" data-size="Header Menus" data-min="10" data-max="26">
																		Productividad
																	</span>
																</td>					
															</tr>
															<tr>
																<td class="hidden-height" height="13"></td>
															</tr>
														</tbody></table>
													</td>
												</tr>												
											</tbody></table>
										</td>
									</tr>
									<tr>
										<td class="height-space" height="20" style="line-height:20px;"></td>
									</tr>
								</tbody></table>
							</td>
						</tr>
					</tbody></table>
				</td>
			</tr>			
		</tbody></table><table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%" data-thumb="http://www.evethemes.com/demo/bluebee/thumb/section-3.jpg" data-module="About Email" data-bgcolor="Section-1 BG" class="">
			
				<tbody><tr>
					<td align="center">
						<!--SECTION TABLE-680-->
						<table align="center" border="0" cellpadding="0" cellspacing="0" class="display-width" width="100%">
								
								<tbody><tr>
									<td align="center" style="padding:0 30px;">
										<!--SECTION TABLE-600-->
										<table align="center" border="0" cellpadding="0" cellspacing="0" class="display-width" width="600">
											
												<tbody><tr>
													<td height="50" style="line-height:50px;"></td>
												</tr>
												<tr>
													<td align="center" class="Heading" style="color:#333333; font-family:Segoe UI, Helvetica Neue, Arial, Verdana, Trebuchet MS, sans-serif; font-size:30px; font-weight:600;line-height:36px; text-transform:capitalize; letter-spacing:1px;" data-color="Title" data-size="Title" data-min="12" data-max="40">
														Clave de Acceso
													</td>
												</tr>
												<tr>
													<td height="30" style="line-height:30px;"></td>
												</tr>
												<tr>
													<td align="center" class="Content" style="color:#666666; font-family:Segoe UI, Helvetica Neue, Arial, Verdana, Trebuchet MS, sans-serif; font-size:15px; line-height:25px;" data-color="Content" data-size="Content" data-min="12" data-max="30">
														te informamos que se solicitó una recuperación de clave de acceso a nuestras plataformas GreenHouse, la cual te la detallamos a continuación:<br><br>Nick : <b>$Nick</b><br>Clave:<b>$Clave</b> .
														<br><br><br>
													</td>
												</tr>
												<tr>
													<td height="20" style="line-height:20px;"></td>
												</tr> 
												<tr>
													<td height="50" style="line-height:50px;"></td>
												</tr>
												
										</tbody>
                                        </table> 
									</td>
								</tr>							
								
						</tbody>
                        </table> 
					</td>
				</tr>					
				
		</tbody>
        </table>
        </body>
        </html>
EOT;
return $mail;    
}
function generaMail($Nombre, $Contraseña, $usuario){
$mail = <<<EOT
           <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
					
										
			    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,">
				<title>GreenHouse</title><style>
			        @import url(https://fonts.googleapis.com/css?family=Raleway:400,800,600,300,500,700,800italic,200);
			        @import url(https://fonts.googleapis.com/css?family=Lato:400,300,700,900);
		
                    html { width: 100%; }
                    body {margin:0; padding:0; width:100%; -webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
                    img { display: block !important; border:0; -ms-interpolation-mode:bicubic;}

                    .ReadMsgBody { width: 100%;}
                    .ExternalClass {width: 100%;}
                    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                    .images {display:block !important; width:100% !important;}

                    .Heading {font-family: Raleway, Segoe UI, Arial, Helvetica Neue, Helvetica, sans-serif !important;}	
                    .Content {font-family: Lato, Segoe UI, Arial, Helvetica Neue, Helvetica, sans-serif !important;}			
                    p {margin:0 !important; padding:0 !important;}			
                    
                    a {font-family:'Lato', Arial, Helvetica Neue, Helvetica, sans-serif !important;}		
                    .button td, .button a  {font-family: Lato, Arial, Helvetica Neue, Helvetica, sans-serif !important;}
                    .button a:hover {text-decoration:none !important;}	


                    /* MEDIA QUIRES */

                    @media only screen and (max-width:640px)
                    {
                        body {width:auto !important;}
                        table[class=display-width] {width:100% !important;}	
                        .text-centre{ text-align: center !important; }
                        .hide-padding { padding: 0 !important; }
                        .hidden-height{height :0 !important;}
                        .height-space{height :30px !important;}
                        .hide-padding { padding:0 20px !important; }				
                        td[class=res-height] { height:40px !important; }
                        td[class=testi-height] { height:20px !important; }
                    }

                    @media only screen and (max-width:480px)
                    {
                        table[class=display-width] table {width:100% !important;}
                        table[class=display-width] .button-width .button {width:auto !important;}
                        td[class="height-hidden"] {display:none !important;}
                        
                        
                    }
		        </style>
					
										
				</head>
                <body marginwidth="0" marginheight="0" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;" offset="0" topmargin="0" leftmargin="0"><table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%" data-thumb="http://190.107.177.240/~aduana/GreenHouse/assets/images/logoGhouse.jpg" data-module="Header Menu" data-bgcolor="Header Menu BG" class="">			
			<tbody><tr>
				<td align="center">
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="display-width" width="100%">
						<tbody><tr>
							<td align="center" style="padding:0 30px;">	
								<table align="center" border="0" cellpadding="0" cellspacing="0" class="display-width" width="600">
									<tbody><tr>
										<td class="height-space" height="20"></td>
									</tr>	
									<tr>
										<td>  
											<table align="left" border="0" cellpadding="0" cellspacing="0" width="250" class="display-width" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
												<tbody><tr>
												   <td align="center" class="Heading" style="color:#333333; font-family:Segoe UI, Helvetica Neue, Arial, Verdana, Trebuchet MS, sans-serif; font-size:30px; font-weight:600;line-height:36px; text-transform:capitalize; letter-spacing:1px;" data-color="Title" data-size="Title" data-min="12" data-max="40">
														Green House
													</td>
												</tr>												
											</tbody></table>

											<table align="left" border="0" cellpadding="0" cellspacing="0" class="display-width" width="1" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
												<tbody><tr>
													<td height="15" width="1"></td>
												</tr>
											</tbody></table>	
														
											<table align="right" border="0" cellpadding="0" cellspacing="0" class="display-width" width="37%" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;width:auto;">
												<tbody><tr>
													<td valign="middle">
														<table align="center" border="0" cellspacing="0" cellpadding="0" style="width:auto !important;" class="">												
															<tbody><tr>
																<td class="hidden-height" height="13" style="line-height:13px;"></td>
															</tr>
															<tr>													
																<td align="left" valign="middle" class="Content" style="color:#333333;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:14px;font-weight:400;letter-spacing:1px;line-height:24px;text-transform:uppercase;">
																	<span href="#" style="color:#333333;text-decoration:none;" data-color="Header Menus" data-size="Header Menus" data-min="10" data-max="26">
																		Control
																	</span>
																</td>
																<td width="10">&nbsp;</td>
																<td align="left" valign="middle" class="Content" style="color:#333333;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:14px;font-weight:400;letter-spacing:1px;line-height:24px;text-transform:uppercase;">
																	<span href="#" style="color:#333333;text-decoration:none;" data-color="Header Menus" data-size="Header Menus" data-min="10" data-max="26">
																		Monitoreo
																	</span>
																</td>
																<td width="10">&nbsp;</td>
																<td align="left" valign="middle" class="Content" style="color:#333333;font-family:'Segoe UI',sans-serif,Arial,Helvetica,Lato;font-size:14px;font-weight:400;letter-spacing:1px;line-height:24px;text-transform:uppercase;">
																	<span href="#" style="color:#333333;text-decoration:none;" data-color="Header Menus" data-size="Header Menus" data-min="10" data-max="26">
																		Productividad
																	</span>
																</td>					
															</tr>
															<tr>
																<td class="hidden-height" height="13"></td>
															</tr>
														</tbody></table>
													</td>
												</tr>												
											</tbody></table>
										</td>
									</tr>
									<tr>
										<td class="height-space" height="20" style="line-height:20px;"></td>
									</tr>
								</tbody></table>
							</td>
						</tr>
					</tbody></table>
				</td>
			</tr>			
		</tbody></table><table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%" data-thumb="http://www.evethemes.com/demo/bluebee/thumb/section-3.jpg" data-module="About Email" data-bgcolor="Section-1 BG" class="">
			
				<tbody><tr>
					<td align="center">
						<!--SECTION TABLE-680-->
						<table align="center" border="0" cellpadding="0" cellspacing="0" class="display-width" width="100%">
								
								<tbody><tr>
									<td align="center" style="padding:0 30px;">
										<!--SECTION TABLE-600-->
										<table align="center" border="0" cellpadding="0" cellspacing="0" class="display-width" width="600">
											
												<tbody><tr>
													<td height="50" style="line-height:50px;"></td>
												</tr>
												<tr>
													<td align="center" class="Heading" style="color:#333333; font-family:Segoe UI, Helvetica Neue, Arial, Verdana, Trebuchet MS, sans-serif; font-size:30px; font-weight:600;line-height:36px; text-transform:capitalize; letter-spacing:1px;" data-color="Title" data-size="Title" data-min="12" data-max="40">
														Bienvenid@ <b>$Nombre</b>
													</td>
												</tr>
												<tr>
													<td height="30" style="line-height:30px;"></td>
												</tr>
												<tr>
													<td align="center" class="Content" style="color:#666666; font-family:Segoe UI, Helvetica Neue, Arial, Verdana, Trebuchet MS, sans-serif; font-size:15px; line-height:25px;" data-color="Content" data-size="Content" data-min="12" data-max="30">
														desde ya, le damos la mas cordial bienvenida a nuestra plataforma web ADUANA.<br>
														La clave de acceso que hemos creado para su usuario <b>$Usuario</b> es <b>$Clave</b> . Por favor una vez que ingrese al sistema, modifique y actualice su clave de acceso a la plataforma Aduana.
														<br><br><br>
													</td>
												</tr>
												<tr>
													<td height="20" style="line-height:20px;"></td>
												</tr> 
												<tr>
													<td height="50" style="line-height:50px;"></td>
												</tr>
												
										</tbody>
                                        </table> 
									</td>
								</tr>							
								
						</tbody>
                        </table> 
					</td>
				</tr>					
				
		</tbody>
        </table>
        </body>
        </html>
EOT;
return $mail;
}

?>