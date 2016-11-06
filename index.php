<?php
include_once '../../Clases/Acceso/ValidaAcceso.php';
include_once '../../Clases/Datos/Conexion.php'; 
include_once '../../Clases/Acceso/accPuente.php'; 
?>

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

  
  <!-- aside -->
  <aside id="aside" class="app-aside modal fade " role="menu">
    <div class="left">
      <div class="box bg-white">
        <div class="navbar md-whiteframe-z1 no-radius blue">
            <!-- brand -->
             <img src="images/aduanalogo.jpg" style="display:inline" height="65px">
              <span class="m-l inline" style="display:inline"><b>ADUANAS OSORNO</b></span>
            <!-- / brand -->
        </div>
        <div class="box-row">
          <div class="box-cell scrollable hover">
            <div class="box-inner">
              <div class="p hidden-folded blue-50" style="background-image:url(images/bg.png); background-size:cover">
                <div class="rounded w-64 bg-white inline pos-rlt">
                  <img src="images/a3.jpg" class="img-responsive rounded">
                </div>
                <a class="block m-t-sm" ui-toggle-class="hide, show" target="#nav, #account">
                  <span class="block font-bold">Pamela Jara</span>
                  <span class="pull-right auto">
                    <i class="fa inline fa-caret-down"></i>
                    <i class="fa none fa-caret-up"></i>
                  </span>
                  pame29jara@gmail.com
                </a>
              </div>
              <div id="nav">
                <nav ui-nav>
                  <ul class="nav">
                    <li class="nav-header m-v-sm hidden-folded">
                  
                    </li>
                    <li>
                      <a md-ink-ripple>
                        <span class="pull-right text-muted">
                          <i class="fa fa-caret-down"></i>
                        </span>
                        <i class="pull-right up"><b class="badge no-bg"></b></i>
                        <i class="icon mdi-action-settings-input-svideo i-20"></i>
                        <span class="font-normal">Ingresos</span>
                      </a>
                      <ul class="nav nav-sub">
                        <li>
                          <a md-ink-ripple href="index.php">Entradas - Salidas</a>
                        </li>
                        
                      </ul>
                    </li>
                    <li>
                      <a md-ink-ripple>
                        <span class="pull-right text-muted">
                          <i class="fa fa-caret-down"></i>
                        </span>
                        <i class="icon mdi-action-subject i-20"></i>
                        <span class="font-normal">Estadìstivas</span>
                      </a>
                      <ul class="nav nav-sub">
                        <li>
                          <a md-ink-ripple href="diario.php">Diario</a>
                        </li>
                        
                        <li>
                          <a md-ink-ripple href="mensual.php">Mensual</a>
                        </li>
                      </ul>
                    </li>
                        
                     <li>
                      <a md-ink-ripple>
                        <span class="pull-right text-muted">
                          <i class="fa fa-caret-down"></i>
                        </span>
                        <i class="icon mdi-toggle-radio-button-on i-20"></i>
                        <span class="font-normal">Funcionario</span>
                      </a>
                      <ul class="nav nav-sub">
                        <li>
                          <a md-ink-ripple href="perfil.php">Perfil</a>
                        </li>
                        <li>
                          <a md-ink-ripple href="registrar.php">Registrar</a>
                        </li>
                      </ul>
                  
                    </li>
                   
                  
                      
         
  </aside>
  <!-- / aside -->
  


  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="box">
          <!-- Content Navbar -->
    <div class="navbar md-whiteframe-z1 no-radius blue">
      <!-- Open side - Naviation on mobile -->
      <a md-ink-ripple  data-toggle="modal" data-target="#aside" class="navbar-item pull-left visible-xs visible-sm"><i class="mdi-navigation-menu i-24"></i></a>
      <!-- / -->
      <!-- Page title - Bind to $state's title -->
      <div class="navbar-item pull-left h4"></div>
      <!-- / -->
      <!-- Common tools -->
      <ul class="nav nav-sm navbar-tool pull-right">
        <li>
          <a md-ink-ripple ui-toggle-class="show" target="#search">
            <i class="mdi-action-search i-24"></i>
          </a>
        </li>
        <li>
          <a md-ink-ripple data-toggle="modal" data-target="#user">
            <i class="mdi-social-person-outline i-24"></i>
          </a>
        </li>
        <li class="dropdown">
          <a md-ink-ripple data-toggle="dropdown">
            <i class="mdi-navigation-more-vert i-24"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-scale pull-right pull-up text-color">
            <li><a href>Single-column view</a></li>
            <li><a href>Sort by date</a></li>
            <li><a href>Sort by name</a></li>
            <li class="divider"></li>
            <li><a href>Help &amp; feedback</a></li>
          </ul>
        </li>
      </ul>
      <div class="pull-right" ui-view="navbar@"></div>
      <!-- / -->
      <!-- Search form -->
      <div id="search" class="pos-abt w-full h-full blue hide">
        <div class="box">
          <div class="box-col w-56 text-center">
            <!-- hide search form -->
            <a md-ink-ripple class="navbar-item inline"  ui-toggle-class="show" target="#search"><i class="mdi-navigation-arrow-back i-24"></i></a>
          </div>
          <div class="box-col v-m">
            <!-- bind to app.search.content -->
            <input class="form-control input-lg no-bg no-border" placeholder="Search" ng-model="app.search.content">
          </div>
          <div class="box-col w-56 text-center">
            <a md-ink-ripple class="navbar-item inline"><i class="mdi-av-mic i-24"></i></a>
          </div>
        </div>
      </div>
      <!-- / -->
    </div>
    <!-- Content -->
       <div class="box-row">
        <div class="box-cell">
          <div class="box-inner padding">
            

<div class="card" >
  <div class="card card-heading bg-dark">
    <h2>INGRESOS</h2>
  </div>
  <div class="card-body">
    <div class="row row-sm">
      <div class="col-sm-4">
          <div class="md-form-grou float-label"><BR>
             <select class="md-input has-value"  id="slcTipoIngreso" >
                  <option value=""></option>

                  <option value="Entrada">Entrada</option>
                  <option value="Salida">Salida</option>
                  
              </select>
          <label >Tipo Ingreso</label>
              
          </div>  
      </div>
      <div class="col-sm-4">
          <div class="md-form-group  float-label">
            <input type=number class="md-input"  id="txtNRegistro" >
            <label>Nº Registro</label>
          </div>
      </div>
      <div class="col-sm-4">
          <div class="md-form-group  float-label">
            <input class="md-input"  id="txtPatente" >
            <label>Patente</label>
          </div>
      </div>
      <div class="col-sm-4">
          <div class="md-form-grou float-label"><BR>
             <select class="md-input has-value"  id="slcTipoCarga" >
                  <option value=""></option>

                  <option value="Zona Austral">Zona Austral</option>
                  <option value="Imp Chile">Imp Chile</option>
                  <option value="Imp Ext">Imp Ext</option>
                  <option value="Lastre Chile">Lastre Chile</option>
                  <option value="Lastre Ext">Lastre Ext</option>
                  <option value="Transito Int Chile">Transito Int Chile</option>
                  <option value="Transito Int Ext">Transito Int Ext</option>
                  <option value="A pie">A pie</option>
                  <option value="Bicicleta">Bicicleta</option>
              </select>
          <label >Tipo Carga</label>
              
          </div>  
      </div>
      <div class="col-sm-4">
          <div class="md-form-group  float-label">
            <input  type=number class="md-input"  id="txtKilos"  >
            <label>K.B.</label>
          </div>
      </div>
    
  
  
  
          <div class="col-sm-4">
          <div class="md-form-group  float-label">
            <input  type=number class="md-input"  id="txtPasajeros" >
            <label>Pasajeros</label>
          </div>
          </div>
  
        <div class="col-sm-4">
        <div class="md-form-group  float-label">
          <input type=number class="md-input"  id="txtDus" >
          <label>DUS</label>
        </div>
      </div>
        
        <div class="col-sm-4">
        <div class="md-form-group float-label">
          <input type=date class="md-input"  id="txtFecha" required>
          <label>Fecha</label>
        </div>
      </div>

    <div class="contenedor">
    <div class="col-sm-4">
    <div class="form-group">
     <button md-ink-ripple="" class="btn btn-fw btn-dark"  id="btnSellos">Sellos 
     <a href="#openmodal" class="open"</a></button>
   	</div>
  	</div>
	  </div>





  <section id="openmodal" class="modalDialog">
  <section class="modal">
  <a href="#close" class="close" >X</a>
  <div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<label>Cantidad</label>
								<input type="text" class="form-control" id="txtcantidad">
							</div>
              <div class="col-sm-4">
								<label>Sellos</label>
								<input type="text" class="form-control" id="txtNsellos">
							</div>
              
							<div class="col-sm-8">
								<label>Sello Nulos</label>
								<input type="text" class="form-control" id="txtNulas">
							</div>
						</div>
					</div> 
</section>
</section>
     



 <br>
  <br>
   <br>
    <br>
<div class="form-group m-t-lg">
      <div class="col-sm-8 col-sm-offset-2">
        <button type="button" class="btn btn-default" id= "btnCancelarRegistro">Cancelar</button>
        <button type="submit" class="btn btn-primary">Modificar</button>
        <button type="button" md-ink-ripple class="btn btn-fw btn-success"id="btnGuardarRegistro">Guardar</button>
        <button md-ink-ripple class="btn btn-fw btn-danger">Eliminar</button>
          <button md-ink-ripple class="btn btn-fw btn-warning">imprimir</button>
      </div>
    </div>
 <br>
  <br>


<div class="col-sm-12">
 <div class="md-form-group float-label">
<h4>Registros Guardados</h4>
 
  <div class="table-responsive">
    <table class="table table-bordered bg-white"   id="Table" >
      <thead>
        <tr>
          <th>Nº</th>
          <th>Tipo Ingreso</th>
          <th>Patente</th>
          <th>Tipo Carga</th>
          <th>K.B.</th>
          <th>Pasajeros</th>
          <th>DUS</th>
          <th>Fecha</th>
       </tr>
    </thead>
    <tbody id="tbIngresos">
    
    </tbody>
  </table>
  </div>
  </div>
 </form>
</div>
  </div>

   </div>

  
<script src="libs/jquery/jquery.min.js"></script>
 
  <script>
  $(document).ready(function(){
	$("#btnGuardarRegistro").click(function(){
	    
				if($("#txtNRegistro").val() ==""|| $("#slcTipoIngreso").val()=="" || $("#txtPatente").val()=="" || $("#slcTipoCarga").val()=="" || $("#txtKilos").val() =="" || $("#txtPasajeros").val()=="" || $("#txtDus").val()=="" || $("#txtFecha").val()==""){

					crearNotificacion("Se ha detectado un Problema", "Complete los Datos, por favor", "bg-warning", 1);
              
                }else{
                   $.ajax({
                        type: 'POST',
                        url: "../../Actions/ServidorAPI.php",
                        data: {
                              hdnTipo:"GuardarRegistro", 
                              txtNRegistro:$("#txtNRegistro").val(),
                              slcTipoIngreso:$("#slcTipoIngreso").val(),
                              txtPatente:$("#txtPatente").val(), 
                              slcTipoCarga:$("#slcTipoCarga").val(),
                              txtKilos:$("#txtKilos").val(),
                              txtPasajeros:$("#txtPasajeros").val(),
                              txtDus:$("#txtDus").val(),
                              txtFecha:$("#txtFecha").val()							
                              },
                        success: function(jSon) { 
							console.log(jSon);
							jSon = $.parseJSON(jSon); 
					
							crearNotificacion("aduana", jSon.Mensaje, jSon.Clase, 1);
							$("#btnCancelarRegistro").click();
                        }
                    });   
                }
			}); 


function listaIngresos(){

                     $.ajax({
                        type: 'POST',
                        url: "../../Actions/ServidorAPI.php",
                        data: {
                              hdnTipo:"ListarIngresos" 						
                              },
                        success: function(jSon) { 
                          console.log(jSon);
                          jSon = $.parseJSON(jSon); 

                          var salida="";
                          for(a=0;a<jSon.length;a++){
                          salida +="<tr>"+
                                    "<td>"+jSon[a]["IdRegistros"]+"<td>"+
                                    "<td>"+jSon[a]["RegTipoRegistro"]+"<td>"+
                                    "<td>"+jSon[a]["RegPatente"]+"<td>"+
                                    "<td>"+jSon[a]["RegTipoCarga"]+"<td>"+
                                    "<td>"+jSon[a]["RegKilos"]+"<td>"+
                                    "<td>"+jSon[a]["RegPasajero"]+"<td>"+
                                    "<td>"+jSon[a]["RegDus"]+"<td>"+
                                    "<td>"+jSon[a]["RegFecha"]+"<td>"+
                                  "</tr>";                                    
                          }                                  
                        $("#tbIngresos").html(salida);
                        }
                    });   
        }
              listaIngresos();
               }); 

      
        </script>
  
  

<script src="scripts/app.min.js"></script>


</body>
</html>

