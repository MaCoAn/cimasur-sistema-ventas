<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Cimasur</title>
    <!-- Bootstrap Core CSS -->
    <?php echo link_tag('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>
    <!-- page css -->
    <?php echo link_tag('css/pages/login-register-lock.css'); ?>
    <!-- Custom CSS -->
    <?php echo link_tag('css/style.css'); ?>
    
    <!-- You can change the theme colors from here -->
    <?php echo link_tag('css/colors/default-dark.css'); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== 
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Pro</p>
        </div>
    </div>
     ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url('<?php echo base_url('assets/images/background/login-register.jpg');?>')">
            <div class="login-box card">
            <img src="<?php echo base_url();?>/assets/images/cimasur_logo_back.png" alt="homepage" class="dark-logo" />
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="<?php echo base_url();?>login/iniciarSesion"  method="POST">
                        <h3 class="box-title m-b-20">Iniciar Sesión</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Usuario" name="nickname"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Contraseña" name="password"> </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div>
                                    <?php echo $mensajeLogin?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Entrar</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php echo link_tag('assets/plugins/jquery/jquery.min.js'); ?>
    <!-- Bootstrap tether Core JavaScript -->
    <?php echo link_tag('assets/plugins/bootstrap/js/popper.min.js'); ?>
    <?php echo link_tag('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>
    
</body>

</html>