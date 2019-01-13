<?php
require_once '../modelos/Referencia.php';
$referencia = new Referencia('ajBKSCLT0','2',100.00);
echo $referencia-> get_referencia();
?>
