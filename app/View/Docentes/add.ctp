<!-- File: /app/View/Docente/add.ctp -->
<?php 
    $this->html->addCrumb('Docentes', '/Docentes');
    $this->html->addCrumb('Nuevo', '/Docentes/Nuevo');
    
    $this->assign("title", "Docentes - Nuevo");
?>

<h2>Docentes <small>Nuevo</small></h2>

<?php
    echo $this->Form->create("Docente");
    echo $this->Html->para("lead", "Ingrese los datos del Docente:");
    echo $this->Form->input("nombres", array(
        "label" => "Nombres",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->input("apellidoPaterno", array(
        "label" => "Apellido Paterno",
        "div" => "formField"
    ));
    echo $this->Form->input("apellidoMaterno", array(
        "label" => "Apellido Materno",
        "div" => "formField"
    ));
    echo $this->Form->input("fechaNac", array(
        "label" => "Fecha de Nacimiento",
        "div" => "formField"
    ));
    echo $this->Form->input("direccion", array(
        "label" => "Dirección",
        "div" => "formField"
    ));
    echo $this->Form->input("User.username", array(
        "label" => "Nombre de Usuario",
        "div" => "formField"
    ));
    echo $this->Form->input("User.password", array(
        "label" => "Password",
        "div" => "formField"
    ));
    echo $this->Form->input("User.idGrupo", array(
        "label" => "Password",
        "div" => "formField",
        "type" => "hidden",
        "value" => "3"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Docentes", array("controller" => "Docentes", "action" => "index"));
?>