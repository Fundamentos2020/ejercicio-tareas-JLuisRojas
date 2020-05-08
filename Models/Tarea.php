<?php

class Tarea {
  private $_id;
  private $_titulo;
  private $_descripcion;
  private $_fecha_limite;
  private $_completada;
  private $_categoria_id;

  public function __constructor($id, $titulo, $descripcion, $fecha_limite, $completada, $categoria_id) {
    $_id = $id;
    $_titulo = $titulo;
    $_descripcion = $descripcion;
    $_fecha_limite = $fecha_limite;
    $_completada = $completada;
    $_categoria_id = $categoria_id;
  }
}

?>
