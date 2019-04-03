<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
ini_set("display_errors", 0 );
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <title>Login</title>

        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/paper-dashboard.css'); ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/demo.css'); ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="<?= base_url('assets/css/themify-icons.css'); ?>" rel="stylesheet">

    </head>
    <body>

        <div id="wrapper">
            <br />
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-footer">
                    <div class="panel-heading">
                        <h3 class="panel-title">Por favor, faça login</h3>
                    </div>
                    <div class="panel-body">
                        <?php if ($loginfail != null) { ?>
                            <div class="alert alert-<?php echo $loginfail["class"]; ?>">
                                <?php echo $loginfail["message"]; ?>
                            </div>
                        <?php } ?>
                        <form method="post" action="<?= base_url('login/signin');?>" >
                            <fieldset>
                                <div class="form-group">
                                    <input required="true" class="form-control" placeholder="Nome de usuário" id="username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input required="true" class="form-control" placeholder="Senha" id="password" name="password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-wd btn-success btn-block">Entrar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

        <!--   Core JS Files   -->
    <script src="<?= base_url('assets/js/jquery-1.10.2.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/bootstrap-checkbox-radio.js'); ?>"></script>
    <script src="<?= base_url('assets/js/chartist.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-notify.js'); ?>"></script>
    <script src="<?= base_url('assets/js/paper-dashboard.js'); ?>"></script>
    <script src="<?= base_url('assets/js/demo.js'); ?>"></script>

</html>
