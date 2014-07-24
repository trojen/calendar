<?php

define("ControllerPath", "core/");
define('ROOT', 'http://localhost:8888/calendar/');

define("DB_NAME","calendar_sys");
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","root");

function pd($what)
{
  echo("<pre>");
  print_r($what);
  echo("</pre>");
  die();
}
function ps($what)
{
  echo("<pre>");
  print_r($what);
  echo("</pre>");
}

?>