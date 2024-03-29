<!-- File: /app/View/Articulos/edit.ctp -->
<?php 
    $this->html->addCrumb('Artículos', '/Articulos');
    $this->html->addCrumb('Editar', '/Articulos/editar');
    
    $this->assign("title", "Alumnos - Editar");
?>

<h2>Artículos <small>Editar</small></h2>

<?php
    echo $this->Html->script('ckeditor/ckeditor');
    
    echo $this->Form->create("Articulo", array("type" => "file"));
    echo $this->Form->input("idArticulo", array("type" => "hidden"));
   echo $this->Html->para("lead", "Ingrese los datos del Artìculo:");
    echo $this->Form->input("titulo", array(
        "label" => "Tìtulo",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->label("descripcion", "Descripción");
    echo $this->Form->textarea('descripcion', array(
        'class' => 'ckeditor'
    ));
    echo $this->Form->input("foto", array(
        "label" => "Foto",
        "div" => "formField",
        "type" => "file"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Artículos", array("controller" => "Articulos", "action" => "index"));
?>