<?php
   session_start();
   $userName= "not connected";
   if(!isset($_SESSION['user_session']))
   {
    
    // header("Location: login.php");
    $logged =0;
    $userType = "Pas connecte";
   }
   else
   {
    $userType= $_SESSION['priviledges'];
    $userName= $_SESSION['name'];
    $logged=1;
   }
   ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <link rel="icon" href="img/logo/logo-noir.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>URaiL</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/mdb-blue.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.toast.min.css">
        <link rel="stylesheet" type="text/css" href="css/rotating-card.css">
        <link rel="stylesheet" type="text/css" href="css/ladda.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style>
            .google-maps {
                position: relative;
                padding-bottom: 75%; // This is the aspect ratio
                height: 0;
                overflow: hidden;
            }

            .google-maps iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100% !important;
                height: 100% !important;
            }

            .card {
                margin-top: 20px;
            }
        </style>
        <style>
            .bg-skin-lp {
                /*  background-image: url('https://mdbootstrap.com/img/Photos/Lightbox/Orignal/img%20%281%29.jpg'); */
                background-size: cover;
                background-color: #fff;
                background-repeat: no-repeat;
                background-position: center center;
                background-attachment: fixed;
            }
        </style>
    </head>

    <body class="fixed-sn mdb-skin bg-skin-lp" data-gr-c-s-loaded="true">
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <header>
            <!-- Sidebar navigation -->
            <ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar ps-container ps-theme-default" data-ps-id="63212618-f334-2f5b-5852-1a963a332334" style="transform: translateX(0px);">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light waves-effect waves-light" style="height:auto;">
                        <a href="" class="waves-effect waves-light logo-wrapper" style="height:auto;"> <img id="MDB-logo" src="img/logo/logo-train-blanc.png" class="img-fluid flex-center" alt="MDB Logo"></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!--Social-->
                <li>
                    <ul class="social">
                        <li><a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
                        <li><a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
                        <li><a class="icons-sm gplus-ic"><i class="fa fa-chrome"> </i></a></li>
                    </ul>
                </li>
                <!--/Social-->
                <!--Search Form-->
                <li>
                    <form class="search-form" role="search">
                        <div class="form-group waves-light waves-effect waves-light">
                        </div>
                    </form>
                </li>
                <!--/.Search Form-->
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li class=""><a class="linkbtn btnclosenav" id="Home"><i class="fa fa-home"></i> Supervision<i class="fa fa-angle-down rotate-icon"></i></a>
                        </li>
                        <li class="adminLinks" id="">
                            <a class="collapsible-header waves-effect arrow-r "><i class="fa fa-chevron-right"></i> Contrôle<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body" style="display: none;">
                                <ul>
                                    <li><a href="#" class="waves-effect linkbtn" id="API1">API <span class="text-info">1</span> </a>
                                    </li>
                                    <li><a href="#" class="waves-effect linkbtn" id="API2">API <span class="text-info">2</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="linkbtn btnclosenav" id="Statistiques"><i class="fa fa-pie-chart " ></i> Statistiques<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                            </div>
                        </li>
                        <li>
                            <a class="linkbtn btnclosenav" id="Entrees-Sorties"><i class="fa fa-list " ></i> Entrées - Sorties<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                            </div>
                        </li>
                        <li>
                            <a class="linkbtn btnclosenav" id="Alarmes"><i class="fa fa-exclamation-triangle " ></i> Alarmes<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                            </div>
                        </li>
                        <li class ='adminLinks'>
                            <a class="linkbtn btnclosenav " id="Parametres"><i class="fa fa-gear  " ></i> Paramètres<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                            </div>
                        </li>
                        <li>
                            <a class="linkbtn btnclosenav" id="About"><i class="fa fa-eye " ></i> A propos<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                            </div>
                        </li>
                        <li>
                            <a class="linkbtn btnclosenav" id="Contact"><i class="fa fa-envelope-o " ></i> Contact<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                            </div>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
                 <div class="sidenav-bg mask-light"></div>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></ul>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-xs-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto ">
                <p class="white-text h3-responsive">URaiL / <span id="breadcrumb">Home</span></p>

            </div>
            <ul class="nav navbar-nav ml-auto flex-row">
                 <li class="nav-item">
                   <a class="nav-link waves-effect waves-light  " id="connect"><i class="fa fa-circle light-green-text" id="connectCircle" ></i> <span class="hidden-sm-down " id="connectText" >Connecté</span></a>
                </li>
            </ul>
        </nav>
            <!-- /.Navbar -->
        </header>
        <!--/.Double navigation-->
        <!--Main layout-->
        <main id="maincontent">
            <!-- Content will be loaded here -->
        </main>
        <!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-gear mr-1"></i> Paramètres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user mr-1"></i> Connexion</a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                        <!--Body-->
                     <div class="modal-body" id="contenuModal">
                        <div class="row">
                            <div class="col-md-12 text-center">
                               <!--  <p style="font-size: 120px" class="fa fa-gear" ><p> -->
                                <hr>
                            </div>
                        </div>
                        <div class="row" style="margin-top:15px; height:40px;">
                            <div class="col-md-9">
                                <h4>Communication: <i class="fa fa-circle " id="etatComm"> <span></span></i></h4>
                            </div>
                            <!-- <div class="col-md-3">
                                <label class="switch">
                         <input type="checkbox">
                         <div class="slidersw round"></div> -->
                      <!-- </label> -->
                            </div>
                        <hr>
                        <div class="row" style="margin-top:15px; height:40px;">
                            <div class="col-md-9">
                                <h4>Activer la connection</h4>
                            </div>
                            <div class="col-md-3">
                                <label class="switch">
                         <input type="checkbox" id="activeConnect">
                         <div class="slidersw round"></div>
                      </label>
                            </div>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Fermer<i class="fa fa-times-circle ml-1"></i></button>
                        <!--  <button type="button" class="btn btn-primary">Ferme</button> -->
                    </div>
                    </div>
                   
                    <!--/.Panel 7-->

                    <!--Panel 8-->
                    <div class="tab-pane fade" id="panel8" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body" >
                          <div class="container" id="bodylogin">
                                <!-- On va charger ici le contenu du modal -->
                             <div class="row" >
                             <div class="col-md-4 offset-md-4" id="error"> </div></div>
                          </div>

                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Fermer <i class="fa fa-times-circle ml-1"></i></button>
                        </div>
                    </div>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>


    <!-- Modal -->
        <div class="drag-target" style="left: 0px; touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
        <div class="hiddendiv common"></div>

        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script type="text/javascript" src="js/tether.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/themesidnav.min.js"></script>
        <script type="text/javascript" src="js/opc.js"></script>
        <script type="text/javascript">


            

        </script>
        <script type="text/javascript">
        


            $(document).ready(function() {



                window.setInterval(function() {
                         $.ajax({
                             type : 'POST',
                             url  : 'api/getuserpriv.php',
                             // beforeSend: function()
                             // { 
                             //  $("#error").fadeOut();
                             //  $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
                             // },
                             success :  function(response)
                               {      
                                window.loggedAs = response;
                                if (loggedAs === "admin"){
                                    $(".opcAdmin").each(function(){
                                        $(this).prop('disabled', false);
                                    });
                                }
                                else{
                                    $(".opcAdmin").each(function(){
                                       $(this).prop('disabled', true);
                                    });
                                }
                               // setTimeout(' window.location.href = "index.php"; ',200);
                              },
                                error: function(request, status, errorThrown) {
                                    $.toast({
                                        heading: "erreur",
                                        text: "Une erreur s'est produite : " + request + status + errorThrown,
                                        showHideTransition: 'slide',
                                        position: "bottom-center",
                                        icon: 'error'
                                    });
                                }
                              
                              
                             });
                    

                        etatComm = localStorage.getItem("commOK");
                    if($("#activeConnect").is(':checked') && etatComm=="true"){


                        $("#connectCircle").removeClass("red-text");
                        $("#connectCircle").removeClass("orange-text");
                        $("#connectCircle").addClass("light-green-text");
                        $("#connectText").html("Connecté");
                        $(".adminLinks").each(function(){
                            $(this).show();
                        });
                    }
                    else if($("#activeConnect").is(':checked') && etatComm!=="true"){

                        $("#connectCircle").removeClass("red-text");
                        $("#connectCircle").removeClass("light-green-text");
                        $("#connectCircle").addClass("orange-text");
                        $("#connectText").html("Défaut comm");
                        $(".adminLinks").each(function(){
                            
                        });
                    }
                    else{

                        $("#connectCircle").removeClass("orange-text");
                        $("#connectCircle").removeClass("light-green-text");
                        $("#connectCircle").addClass("red-text");
                        $("#connectText").html("Déconnecté");
                        $(".adminLinks").each(function(){
                            $(this).hide();
                        });
                        
                    }
                     }, 500);
                $("#maincontent").load("Statistiques.php");
                setTimeout(function() {
                    $('body').addClass('loaded');
                }, 3000);

                var idlink;
                $(".linkbtn").click(function() {
                    console.log("toto"+ this.id)
                    if (this.id=="Alarmes"){
                        $('body').removeClass('loaded')
                    setTimeout(function() {
                    $('body').addClass('loaded');
                    }, 1500);
                }
                    idlink = $(this).attr("id");
                    $("#breadcrumb").html(idlink);
                    $("#maincontent").load(idlink + ".php");
                });

         

                $(function(){
                    
                    if ( <?php echo $logged ?> === 1 ) {
                        var userType= "<?php echo $userType; ?>";
                        $("#bodylogin").load("api/bodyDeconnect.html");
                        // $("#loggedAs").html(loggedAs);
                    }
                    else{
                        $("#bodylogin").load("api/bodyLogin.html");

                    }

                });
            });

        </script>
        <script type="text/javascript" src="js/jquery.toast.min.js"></script>
        <script>
            $(".button-collapse").sideNav({
                CloseOnClick: true
            });
            $(".btnclosenav").click(function() {
                $(".button-collapse").sideNav('hide');
            });

            var el = document.querySelector('.custom-scrollbar');
            Ps.initialize(el);
        </script>
        <script type="text/javascript" src="js/chart.js"></script>
        <script src="js/main.js"></script>
        <script src="js/ladda.jquery.js"></script>

        <script src="js/spin.js"></script>
        <script type="text/javascript" src="js/bootstrap-slider.min.js"></script>
        


        <script type="text/javascript">
          $("#connect").click(function(){

          $('#modalLRForm').modal('toggle');
          });
           function modalTroncon(idTroncon){
     

         };
        </script>
  <script type="text/javascript">
        $(document).on("click", "#btn-login", function(){
         // $("#modalLRForm #btn-login").click(function(){
         var data = $("#login-form").serialize();
         
         $.ajax({
         
         type : 'POST',
         url  : 'login_process.php',
         data : data,
         // beforeSend: function()
         // { 
         //  $("#error").fadeOut();
         //  $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
         // },
         success :  function(response)
           {      
          if(response=="ok"){
           <?php $username2 = "not connected";
             if(isset($_SESSION['user_session'])){
                $username2=$_SESSION['name']; }?>
                
           $("#bodylogin").load("api/bodyDeconnect.html")
           // setTimeout(' window.location.href = "index.php"; ',200);
          }
          else{
              $.toast({
                    heading: "erreur",
                    text: "Attention, "+ response,
                    showHideTransition: 'slide',
                    position: "bottom-center",
                    icon: 'error'
                });
            
          }
          }
         });
         return false;
         });
         /* login submit */
         
      </script>
    </body>

    </html>