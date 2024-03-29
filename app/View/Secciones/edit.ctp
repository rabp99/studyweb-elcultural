<!-- File: /app/View/Secciones/edit.ctp -->
<?php 
    $this->html->addCrumb('Secciones', '/Secciones');
    $this->html->addCrumb('Editar', '/Secciones/editar');
   
    $this->assign("title", "Secciones - Editar");
?>

<h2>Secciones <small>Editar</small></h2>

<?php
    echo $this->Form->create("Seccion");
    echo $this->Html->para("lead", "Modifique los datos de la Sección:");
    echo $this->Form->input("idSeccion", array("type" => "hidden"));
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->input('idGrado', array(
        "label" => "Grado",
        "div" => "formField",
        "options" => $grados
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Secciones", array("controller" => "Secciones", "action" => "index"));
?>