<?php
function escribirLog ($textoAAgregar) {
  //error_log(__DIR__);
  $textoAAgregar .= file_get_contents(__DIR__.'/../error.log');
  file_put_contents(__DIR__.'/../error.log', $textoAAgregar);
}
