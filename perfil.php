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
            <input class="form-control input-lg no-bg no-border" placeholder="Search">
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
            

<div class="padding-out">
  <div class="p-h-md p-v bg-white box-shadow pos-rlt">
    <h3 class="no-margin">Funcionario</h3>
  </div>
  <div class="box">
    <div class="col-md-3">
      <div style="background:url(images/a3.jpg) center center; background-size:cover">
        <div class="p-lg bg-white-overlay text-center">
          <a href class="w-xs inline">
            <img src="images/a3.jpg" class="img-circle img-responsive">
          </a>
          <div class="m-b m-t-sm h2">
            <span class="text-black">Pamela Jara</span>
          </div>
          
        </div>
      </div>
     
    <div class="col-md-12 b-l bg-white bg-auto">
      <div class="p-md bg-light lt b-b font-bold">Mi Perfil</div>
      <form role="form" class="p-md col-md-6">
        
      
          
 
       <div class="col-sm-12">
        <div class="md-form-group float-label">
          <input class="md-input" ng-model="user.firstName"  id="txtFono" required>
          <label>Celular</label>
        </div>
      </div>
                 
         
       <div class="col-sm-12">
        <div class="md-form-group float-label">
          <input class="md-input" ng-model="user.firstName" required>
          <label>Cambiar Contraseña</label>
        </div>
      </div>
          
         
       <div class="col-sm-12">
        <div class="md-form-group float-label">
          <input class="md-input" ng-model="user.firstName" required>
          <label>Nueva Contraseña</label>
        </div>
      </div>
          
       
        <button type="submit" class="btn btn-success m-t">Guardar</button>
      </form>
    </div>
  </div>
</div>



          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / content -->

  

<script src="scripts/app.min.js"></script>

</body>
</html>
