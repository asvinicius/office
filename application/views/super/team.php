<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Times</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/paper-dashboard.css'); ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/demo.css'); ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="<?= base_url('assets/css/themify-icons.css'); ?>" rel="stylesheet">

    </head>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="header">
                                    <div class="col-md-9">
                                        <form  method="post" action="<?= base_url('team/search');?>" >
                                            <div class="col-md-9">
                                                <input required="true" class="form-control" placeholder="Pesquisar" title="Nome do time ou cartoleiro" id="searchtxt" name="searchtxt" type="text" autofocus>
                                            
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-wd btn-success btn-block"><i class="ti-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-3">
                                        <a type="btn" class="btn btn-wd btn-info btn-block" href="<?= base_url('newteam'); ?>">Adicionar time</a>
                                    </div>

                                </div>
                            </div>
                            <div class="content">
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover">
                                        <?php if ($teams) { ?>
                                            <thead>
                                                <th title="Escudo"></th>
                                                <th title="Nome">Nome</th>
                                                <th title="Cartoleiro">Cartoleiro</th>
                                                <th title="Selecionar">Ações</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($teams as $team) { ?>
                                                    <tr>
                                                        <td><img src="<?php echo $team ->shield ?>" width="50" alt="..."/></td>
                                                        <td><?php echo $team->name ?></td>
                                                        <td><?php echo $team->coach ?></td>
                                                        <td>
                                                            <a href="" title="Inscrever em rodadas" class="icon-success">
                                                                <i class="ti-pencil-alt"></i>
                                                            </a>
                                                            <a href="" title="Excluir" class="icon-danger">
                                                                <i class="ti-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="<?= base_url('assets/js/jquery-1.10.2.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/bootstrap-checkbox-radio.js'); ?>"></script>
        <script src="<?= base_url('assets/js/chartist.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap-notify.js'); ?>"></script>
        <script src="<?= base_url('assets/js/paper-dashboard.js'); ?>"></script>
        <script src="<?= base_url('assets/js/demo.js'); ?>"></script>

</html>
