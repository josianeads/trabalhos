<?php
require_once "eletronico.php";
$eletronico = new eletronico("tv",2000,"1 ano","bivolt");
 echo "produto:". $eletronico->getnome()."<br>";
 echo "preço Compra: ". $eletronico->getpreco()."<br>";
 echo "garantia:". $eletronico->getGarantia()."<br>";
 echo "voltagem:". $eletronico->getVoltagem()."<br>";
 echo "preço venda:". $eletronico->precovenda()."<br>";




       