<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plantilla</title>

        <!-- Bootstrap -->
        <?php
            echo $this->Html->css('bootstrap.min');
            echo $this->Html->css('default');
            echo $this->Html->css('studyweb');
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row banner">
                <div class="col-xs-2"></div>
                <div class="col-xs-1">
                    <?php echo $this->Html->link(
                            $this->Html->image('elcultural.logo.png', array('alt' => "El Cultural", 'border' => '0')),
                            '/',
                            array('escape' => false)
                        );
                    ?>
                </div>
                <div class="col-xs-2">
                    <h2>El Cultural <small>American School</small></h2>
                </div>
                <div class="col-xs-7"></div>
            </div>
            <div class="row data-nav">
                <div class="col-xs-1"></div>
                <div class="col-xs-2">Código</div>
                <div class="col-xs-2">Nombre Completo</div>
                <div class="col-xs-2">Grado</div>
                <div class="col-xs-3"></div>
                <div class="col-xs-2">
                    <?php echo $this->Html->link(
                            $this->Html->image("cerrar-sesion.png", array("alt" => "Cerrar Sesión", "border" => "0")),
                            "/",
                            array("escape" => false)
                        );
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-10">
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#">
                                <div class="icon icon-asistencias icon-medium"></div>
                                Asistencias
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon icon-matricula icon-medium"></div>
                                Ficha Matrícula
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Horarios",
                                "action" => "horarioAlumno"
                            )); ?>">
                                <div class="icon icon-horario icon-medium"></div>
                                Horario
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon icon-cursos icon-medium"></div>
                                Cursos
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon icon-notas icon-medium"></div>
                                Notas
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon icon-agenda icon-medium"></div>
                                Agenda
                            </a>
                        </li>
                        <li>
                            <?php 
                                echo $this->Html->link(
                                        $this->Html->tag("div","",array("class" => "icon icon-mensajes icon-medium")) . 
                                        "Mensajes", 
                                        array("controller" => "Mensajes", "action" => "registrar"),
                                        array("escape" => false)
                                );
                            ?>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon icon-cuenta icon-medium"></div>
                                Estado Cuenta
                            </a>
                        </li>
                    </ul>
                    <ol class="breadcrumb">
                        <li><a href="#">Inicio</a></li>
                        <li class="active">Asistencias</li>
                    </ol>
                    <div id="content">
                        <?php echo $this->Session->flash(); ?>

                        <?php echo $this->fetch('content'); ?>
                
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="panel panel-danger">
                        <div class="panel-heading">Novedades</div>
                        <div class="panel-body">
                            <ul>
                                <li>Novedad 1</li>
                                <li>Novedad 2</li>
                                <li>Novedad 3</li>
                                <li>Novedad 4</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content">Copyright 2014 - El Cultural American School - Todos los derechos reservados</div>
        </div>

        <?php
            echo $this->Html->script("jquery-1.11.1.min");
            echo $this->Html->script("bootstrap.min");
        ?>
        <?php echo $this->fetch('script'); ?>
	<!-- Js writeBuffer -->
	<?php
            if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
            // Writes cached scripts
	?>
    </body>
</html>