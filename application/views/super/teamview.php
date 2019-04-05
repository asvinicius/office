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
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <?php if($team){ ?>
                                <div class="image">
                                </div>
                                <div class="content">
                                    <div class="author">
                                      <img class="avatar border-white" src="<?php echo $team['shield'] ?>" alt="..."/>
                                      <h4 class="title"><?php echo $team['name'] ?><br />
                                          <small><?php echo $team['coach'] ?></small>
                                      </h4>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <div class="col-md-8">
                                    <h4 class="title">Rodadas</h4>
                                </div>
                                <div class="col-md-4">
                                    <a type="btn" class="btn btn-wd btn-info btn-block" href="#">Increver em todas</a>
                                </div>
                            </div>
                            <div class="content">
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover">
                                        <?php if ($spins) { ?>
                                            <thead>
                                                <th title="Status"></th>
                                                <th title="Rodada">Rodada</th>
                                                <th title="Times">Times</th>
                                                <th title="Situação">Situação</th>
                                                <th title="Opções">Opções</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($spins as $spin) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php 
                                                                if($spin->status == 1){
                                                                    ?><i class="ti-unlock icon-success" title="Rodada aberta"></i><?php
                                                                }else{
                                                                    if($spin->status == 2){
                                                                        ?><i class="ti-unlock icon-warning" title="Rodada em andamento"></i><?php
                                                                    }else{
                                                                        if($spin->status == 0){
                                                                            ?><i class="ti-lock icon-danger" title="Rodada fechada"></i><?php
                                                                        }
                                                                    }
                                                                }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $spin->spinid ?></td>
                                                        <td><?php echo $spin->numteams ?></td>
                                                        <td><?php echo "#" ?></td>
                                                        <td>
                                                            <?php if($spin->status != 0){ ?>
                                                                <a href="<?= base_url('spin/subscribeteam/'.$spin->spinid.'-'.$team['teamid']); ?>" title="Inscrever na rodada" class="icon-success" onclick="return confirm('Confirma a incrição na RODADA <?php echo $spin->spinid ?>?');">
                                                                    <i class="ti-plus"></i>
                                                                </a>
                                                            <?php } ?>
                                                            <a href="<?= base_url('spindetail/detail/'.$spin->spinid); ?>" title="Ver rodada" class="icon-success">
                                                                <i class="ti-pencil-alt"></i>
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
