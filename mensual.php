<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
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
  
      <!-- Horizontal form -->
	<div class="panel panel-flat">
	<div class="panel-heading">
        </div>

			<div class="panel-body">
			<form class="form-horizontal">
			<div class="form-group">
			
			</div>

				

 
  <!-- Horizontal form -->
			<div class="panel panel-flat">
			<div class="panel-heading">
			<h5 class="panel-title">SERVICIO NACIONAL DE ADUANAS</h5>
                                               <h4>SINTESIS MENSUAL </h4>
                                                <h4>TRAFICO DE FRONTERA </h4>
			<div class="heading-elements">
						
				                	</div>
			                	</div>

					<div class="panel-body">
				<form class="form-horizontal" action="#">
					<div class="form-group">
                                            <h4> TRÁFICO DE ENTRADA </h4>		

				<label class="control-label col-lg-4">VEHÍCULOS NACIONALES PARTICULARES</label>
						<div class="col-lg-2">   
					<input type="text" class="form-control">
							</div>
									
                                       </div>

					<div class="form-group">
					<label class="control-label col-lg-4">VEHÍCULOS NACIONALES TRANSPORTE DE PASAJEROS</label>
						<div class="col-lg-2">
					<input type="text" class="form-control">
						</div>
					</div>

				           <div class="form-group">
					<label class="control-label col-lg-4">VEHÍCULOS NACIONALES TRANSPORTE DE CARGA	</label>
						<div class="col-lg-2">
					<input type="text" class="form-control">
						</div>
					</div>

                                     <div class="form-group">
					<label class="control-label col-lg-4">SUB TOTAL	</label>
						<div class="col-lg-2">
					<input type="text" class="form-control">
						</div>
					</div>

						<div class="panel-body">
				<form class="form-horizontal" action="#">
					<div class="form-group">
                                            <h4> TRÁFICO DE SALIDA </h4>		

				<label class="control-label col-lg-4">VEHÍCULOS NACIONALES PARTICULARES</label>
						<div class="col-lg-2">
					<input type="text" class="form-control">
							</div>
									
                                       </div>

					<div class="form-group">
					<label class="control-label col-lg-4">VEHÍCULOS NACIONALES TRANSPORTE DE PASAJEROS</label>
						<div class="col-lg-2">
					<input type="text" class="form-control">
						</div>
					</div>

				           <div class="form-group">
					<label class="control-label col-lg-4">VEHÍCULOS NACIONALES TRANSPORTE DE CARGA	</label>
						<div class="col-lg-2">
					<input type="text" class="form-control">
						</div>
					</div>

                                     <div class="form-group">
					<label class="control-label col-lg-4">SUB TOTAL	</label>
						<div class="col-lg-2">
					<input type="text" class="form-control">
						</div>
					</div>
				
                                     <div class="form-group">
					<label class="control-label col-lg-4"> TOTAL GENERAL	</label>
						<div class="col-lg-2">
					<input type="text" class="form-control">
						</div>
					</div>
				
							<!-- /horizotal form -->

 
 <div class="form-group m-t-lg">
      <div class="col-sm-8 col-sm-offset-2">
        <button type="submit" class="btn btn-default">Cancelar</button>
        <button type="submit" class="btn btn-primary">Modificar</button>
        <button md-ink-ripple class="btn btn-fw btn-success">Guardar</button>
        <button md-ink-ripple class="btn btn-fw btn-danger">Eliminar</button>
          <button md-ink-ripple class="btn btn-fw btn-warning">imprimir</button>
      </div>
    </div>
  </form>

                            
            	</div>                
                           
<!-- /horizotal form -->

			
  

<script src="scripts/app.min.js"></script>

</body>
</html>
