<?php require_once('conexion/conexionbd.php'); ?>
<?php date_default_timezone_set('America/Lima'); ?>
<?php //mysql_set_charset('utf8'); ?>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8">  //-->
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
	$theValue;
  //$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtUsu'])) {
  $loginUsername=$_POST['txtUsu'];
  $password=$_POST['txtCla'];
  $MM_fldUserAuthorization = "tipo";		//catOpe
  $MM_redirectLoginSuccess = "sistema.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  	
  $LoginRS__query=sprintf("SELECT login, clave, tipo FROM operadores WHERE login=%s AND clave=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
  //var_dump($LoginRS__query); die("Final....");
  $LoginRS = $cnx->query($LoginRS__query);
  $loginFoundUser = $LoginRS->num_rows;

  if ($loginFoundUser) {
    
    //$loginStrGroup  = mysql_result($LoginRS,0,'tipo');
	$loginStrGroup_row = $LoginRS->fetch_array(MYSQLI_BOTH);
	$loginStrGroup = $loginStrGroup_row['tipo'];
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ORMD 055A</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">    
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css"/> 
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Animate css -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css"/> 
    <!-- Progress bar  -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-progressbar-3.3.4.css"/> 
     <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="style.css" rel="stylesheet">

    <link href="css/estiloSitio.css" rel="stylesheet">

    <script src="js/ajaxUnico.js"></script>

    <!-- Fonts -->

    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Lato for Title -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>    
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <!-- BEGAIN PRELOADER -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <!-- END PRELOADER -->

  <!-- SCROLL TOP BUTTON -->
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header -->
  <header id="header">
    <!-- header top search -->
    <div class="header-top">
      <div class="container">
        <form action="">
          <div id="search">
          <input type="text" placeholder="Type your search keyword here and hit Enter..." name="s" id="m_search" style="display: inline-block;">
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
        </form>
      </div>
    </div>
    <!-- header bottom -->
    <div class="header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="header-contact">
              <ul>
                <li>
                  <div class="phone">
                    <i class="fa fa-phone"></i>
                    975495097
                  </div>
                </li>
                <li>
                  <div class="mail">
                    <i class="fa fa-envelope"></i>
                    ormd-055a@hotmail.com
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="header-login">
              <a class="login modal-form" data-target="#login-form" data-toggle="modal" href="#">Login / Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header -->
  
  <!-- Start login modal window -->
  <div aria-hidden="false" role="dialog" tabindex="-1" id="login-form" class="modal leread-modal fade in">
    <div class="modal-dialog">
      <!-- Start login section -->
      <form ACTION="<?php echo $loginFormAction; ?>" id="login-form2" method="POST">
      <div id="login-content" class="modal-content" style="border: 1px dashed orange;">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><i class="fa fa-unlock-alt"></i>Login</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <input type="text" placeholder="User name" class="form-control" id="txtUsu" name="txtUsu">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" id="txtCla" name="txtCla">
            </div>
             <div class="loginbox">
              <label><input type="checkbox"><span>Remember me</span></label>
              <button class="btn signin-btn" type="button" onClick="document.getElementById('login-form2').submit()">
                SIGN IN
              </button>
            </div>                    
          </form>
        </div>
        <div class="modal-footer footer-box">
          <a href="#">Forgot password ?</a>
          <span>No account ? 
            <a id="signup-btn" href="#">Sign Up.</a>
          </span>            
        </div>
      </div>
      </form> 
      <!-- Start signup section -->
      <div id="signup-content" class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><i class="fa fa-lock"></i>Sign Up</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <input placeholder="Name" class="form-control">
            </div>
            <div class="form-group">
              <input placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <div class="signupbox">
              <span>Already got account? <a id="login-btn" href="#">Sign In.</a></span>
            </div>
            <div class="loginbox">
              <label><input type="checkbox"><span>Remember me</span><i class="fa"></i></label>
              <button class="btn signin-btn" type="button">SIGN UP</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End login modal window -->

  <!-- BEGIN MENU -->
  
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <section id="titulo" >

          OFICINA DE REGISTRO MILITAR 055-A AREQUIPA
          </section>
          <!-- IMG BASED LOGO  -->
           <!-- <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="index.php">Inicio</a></li>
            <li><a href="include/service.html">Eventos</a></li>           
            <li><a href="include/portfolio.html">Contacto</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">OR Provinciales<span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href=include/blog-ormp-camana.html>ORMP 56-A(CAMANA)</a></li>
                <li><a href=include/blog-ormp-caylloma.html > ORMP 60-A(CAYLLOMA)</a></li>
                <li><a href=include/blog-ormp-islay.html >ORMP 55-B(ISLAY)</a></li>
                <li><a href=include/blog-ormp-caraveli.html >ORMP 57-A(CARAVELI)</a></li>
                <li><a href=include/blog-ormp-la-union.html >ORMP 58-A(LA UNION)</a></li>
                <li><a href=include/blog-ormp-condesuyos.html >ORMP 59-B(CONSDESUYOS)</a></li>
                <li><a href=include/blog-ormp-castilla.html >ORMP 59-A(CASTILLA)</a></li>
              </ul>
            </li>
          </ul>                     
        </div><!--/.nav-collapse -->
      </div>     
    

  <!-- END MENU --> 

  <!-- Start slider -->
  <section id="slider">
    <div class="main-slider" >
      <div class="single-slide">
        <img src="assets/images/ormda/fondo01.jpg" alt="img">
        <div class="slide-content" >
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="slide-article">
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="slider-img wow fadeInUp">
                  <img src="assets/images/ormda/militar.png" alt="business man">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="single-slide">
        <img src="assets/images/ormda/fondo02.jpg" alt="img">
        <div class="slide-content">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="slide-article">
                </div>
              </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>          
    </div>
  </section>
  <!-- End slider -->

  <!-- Start Feature -->
  <section id="feature">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-area">
            <h2 class="title">Servicio Militar Voluntario en el Ejército del Perú</h2>
            <span class="line"></span>
            <p></p>Si eres peruano de nacimiento y tienes entre 18 a 30 años de edad, puedes prestar el Servicio Militar Voluntario, amparado en la Ley N° 29248, y ejercer tu derecho así como tu deber constitucional de participar en la Defensa Nacional a través del Ejército del Perú.
          </div>
        </div>
        
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Feature -->

  <!-- Start about  -->
  
  <!-- end about -->

  <!-- Start counter -->
  
  <!-- End counter -->


  <!-- Start Service -->
  
  <!-- End Service -->

  <!-- Start Pricing table -->
 
  <!-- End Pricing table -->  

  <!-- Start Pricing table -->
  
  <!-- End Pricing table -->
  
  <!-- Start Testimonial section -->
  <section id="testimonial">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
             
            </div>
            <div class="col-md-12">
              <!-- Start testimonial slider -->
              <div class="testimonial-slider">
                <!-- Start single slider -->
               
                <!-- Start single slider -->
                
                <!-- Start single slider -->
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6"></div>        
      </div>
    </div>
  </section>
  <!-- End Testimonial section -->

  <!-- Start Clients brand -->
  <section id="clients-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="clients-brand-area">
            <ul class="clients-brand-slide">
              <li class="col-md-3">
                <div class="single-brand">
                  <img src="assets/images/ormda/GOBPERU.png" alt="img" width="230px" height="120px">
                </div>
              </li>
              <li class="col-md-3">
                <div class="single-brand">
                  <img src="assets/images/ormda/arequipaa.png" alt="img" width="185px" height="145px">
                </div>
              </li>
              <li class="col-md-3">
                <div class="single-brand">
                  <img src="assets/images/ormda/logoorma-removebg-preview.png" alt="img" width="170px" height="145px">
                </div>
              </li>
              <li class="col-md-3">
                <div class="single-brand">
                  <img src="assets/images/ormda/EJERCITOPERU.png" alt="img" width="147px" height="133px">
                </div>
              </li>
               <li class="col-md-3">
                <div class="single-brand">
                  <img src="assets/images/ormda/GOBPERU.png" alt="img" width="230px" height="120px">
                </div>
              </li>
              <li class="col-md-3">
                <div class="single-brand">
                  <img src="assets/images/ormda/arequipaa.png" alt="img" width="185px" height="145px">
                </div>
              </li>
              <li class="col-md-3">
                <div class="single-brand">
                  <img src="assets/images/ormda/logoorma-removebg-preview.png" alt="img" width="170px" height="145px">
                </div>
              </li>
              <li class="col-md-3">
                <div class="single-brand">
                  <img src="assets/images/ormda/EJERCITOPERU.png" alt="img" width="147px" height="133px">
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Clients brand -->

  <!-- Start latest news -->
  <section id="latest-news">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-area">
            <h2 class="title">LEY DEL SERVICIO MILITAR</h2>
            <span class="line"></span>
          </div>
        </div>
        <div class="col-md-12">
          <div class="latest-news-content">
            <div class="row">
              <!-- start single latest news -->
              <div class="col-md-4">
                <article class="blog-news-single">
                  <div class="blog-news-img">
                    <a href="include/blog-single-with-right-sidebar.html"><img src="assets/images/ormda/primera-imagen.jpg" alt="image"></a>
                  </div>
                  <div class="blog-news-title">
                    <h2><a href="include/blog-single-with-right-sidebar.html">LEY 29248 LEY DEL SERVICIO MILITAR</a></h2>
                    <p>ARTÍCULO 23.- DE LA INSCRIPCIÓN EN EL
RENIEC Y EN EL REGISTRO MILITAR </p>
                  </div>
                  <div class="blog-news-details">
                    <p>EL PERUANO, AL CUMPLIR LOS DIECISIETE
                        (17) AÑOS DE EDAD, SE INSCRIBE
                        OBLIGATORIAMENTE EN EL REGISTRO
                        MILITAR. DICHA INSCRIPCIÓN PODRÁ
                        REALIZARLA EN LAS OFICINAS DE
                        INSCRIPCIÓN DEL REGISTRO MILITAR O EN
                        LAS OFICINAS DEL RENIEC.
</p>
                    <a class="blog-more-btn" href="https://www.gob.pe/568-servicio-militar-voluntario">Más información<i class="fa fa-long-arrow-right"></i></a>
                  </div>
                </article>
              </div>
              <!-- start single latest news -->
              <div class="col-md-4">
                <article class="blog-news-single">
                  <div class="blog-news-img">
                    <a href="include/blog-single-with-right-sidebar.html"><img src="assets/images/ormda/segunda-imagen.jpg" alt="image"></a>
                  </div>
                  <div class="blog-news-title">
                    <h2><a href="include/blog-single-with-right-sidebar.html">DERECHOS Y BENEFICIOS</a></h2>
                    <p>ART 54.- DE LOS DERECHOS Y BENEFICIOS</p>
                  </div>
                  <div class="blog-news-details">
                    <p>• ALIMENTACIÓN DIARIA, DOTACIÓN COMPLETA
                            DE PRENDAS, PRESTACIONES DE SALUD,
                            ASIGNACIÓN ECONÓMICA MENSUAL, VIÁTICOS
                            Y PASAJES PARA COMISIONES, SEGURO DE
                            VIDA, FACILIDADES PARA INICIAR, CONTINUAR
                            Y CULMINAR ESTUDIOS.
                    </p>
                    <p>
                            • DESCUENTO DE HASTA 50% EN LA INSCRIPCIÓN
                            Y PAGO DE INGRESO A LAS ESCUELAS DE
                            FORMACIÓN DE LAS FFAA Y PNP
                            </p>
                    <p>
                            • BONIFICACIÓN DE 20% SOBRE LA NOTA FINAL,
                            PARA POSTULANTES A LAS ESCUELAS DE
                            FORMACIÓN DE LAS FFAA Y PNP.</p>
                    <a class="blog-more-btn" href="https://elcomercio.pe/respuestas/servicio-militar-en-el-peru-como-es-cuales-son-sus-requisitos-y-que-beneficios-ofrece-pedro-castillo-anuncio-28-de-julio-jovenes-que-no-estudien-ni-trabajen-revtli-noticia/">Más información <i class="fa fa-long-arrow-right"></i></a>
                  </div>
                </article>
              </div>
              <!-- start single latest news -->
              <div class="col-md-4">
                <article class="blog-news-single">
                  <div class="blog-news-img">
                    <a href="include/blog-single-with-right-sidebar.html"><img src="assets/images/ormda/instituto.jpg" alt="image"></a>
                  </div>
                  <div class="blog-news-title">
                    <h2><a href="include/blog-single-with-right-sidebar.html">BECA 18 PARA LICENCIADOS DE LAS FFAA</a></h2>
                  
                  </div>
                  <div class="blog-news-details">
                    <p>• SER LICENCIADO DEL SERVICIO MILITAR DE LAS FFAA.</p>
                    <p>• TENER HASTA 24 AÑOS A LA FECHA DE POSTULACIÓN.</p>
                    <p>• HABER INGRESADO A UNA INSTITUCIÓN EN EDUCACIÓN SUPERIOR ELEGIBLE DE
CUALQUIER REGIÓN DEL PAÍS PARA INICIAR ESTUDIOS.</p>
<p>• LOS POSTULANTES DEBEN HABER CONCLUIDO SATISFACTORIAMENTE LA EDUCACIÓN
SECUNDARIA EN UNA IE PÚBLICA Y/O PRIVADA, CON EL SIGUIENTE PROMEDIO</p>
<p>• PARA LA CARRERA UNIVERSITARIA TENER UN PROMEDIO MÍNIMO DE 14.00.</p>
<p>• PARA LA CARRERA TÉCNICA TENER UN PROMEDIO MÍNIMO DE 13.00.</p>
                    <a class="blog-more-btn" href="">Más información<i class="fa fa-long-arrow-right"></i></a>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End latest news -->

  <!-- Start subscribe us -->
  <section id="subscribe">
    <div class="subscribe-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="subscribe-area">
              <h2 class="wow fadeInUp"> MÁS INFORMACIÓN</h2>
              <form action="" class="subscrib-form wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
              <span class="line"></span>
            <p></p>955882122
            <p></p>JOHAN ALEXIS ENCISO RIQUEROS
            <p></p>TTE CRL CAB
            <p></p>JEFE DE LA ORMD 055-A
          </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End subscribe us -->

  <!-- Start footer -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="footer-left">
            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="footer-right">
            <a href="https://www.facebook.com/people/ORMD-055A-Arequipa/100064473021289/"><i class="fa fa-facebook"></i></a>
            <a href="https://www.facebook.com/people/ORMD-055A-Arequipa/100064473021289/"><i class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com/people/ORMD-055A-Arequipa/100064473021289/"><i class="fa fa-google-plus"></i></a>
            <a href="https://www.facebook.com/people/ORMD-055A-Arequipa/100064473021289/"><i class="fa fa-linkedin"></i></a>
            <a href="https://www.facebook.com/people/ORMD-055A-Arequipa/100064473021289/"><i class="fa fa-pinterest"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End footer -->

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- Slick Slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>    
  <!-- mixit slider -->
  <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>
 <!-- counter -->
  <script src="assets/js/waypoints.js"></script>
  <script src="assets/js/jquery.counterup.js"></script>
  <!-- Wow animation -->
  <script type="text/javascript" src="assets/js/wow.js"></script> 
  <!-- progress bar   -->
  <script type="text/javascript" src="assets/js/bootstrap-progressbar.js"></script>  

 
  <!-- Custom js -->
  <script type="text/javascript" src="assets/js/custom.js"></script>
  
  </body>
</html>