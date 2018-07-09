<?php

require "config.php";
require "classes/reservas.class.php";


$reservas=new Reservas($pdo);

?>
<h1>Reservas</h1>
<a href="reservar.php">Add reserva</a><hr>
<form method="GET">
	<select name="ano">
		<?php 	for($a=date('Y');$a>=2010;$a--):	 ?>
			<option><?php echo $a; ?></option>
		<?php endfor; ?>	
	</select>
	<select name="mes">
		<?php 	for($m=1;$m<=12;$m++):	 ?>
			<option><?php echo $m; ?></option>
		<?php endfor; ?>	
	</select>
	<input type="submit" value="Mostrar">
</form>

<?php
if(empty($_GET['ano'])){
	exit;
}
$data=$_GET['ano'].'-'.$_GET['mes'];
$dia1=date('w',strtotime($data));//dia da semana que inicia
$dias=date('t',strtotime($data));//qtd de dias no mes
$linhas=ceil(($dia1+$dias)/7);
$dia1=-$dia1;
$data_inicio=date('Y-m-d',strtotime($dia1.'days', strtotime($data)));
$data_fim=date('Y-m-d',strtotime((($dia1+($linhas*7)-1)).'days',strtotime($data)));

$lista=$reservas->getReservas($data_inicio,$data_fim);
/*
foreach ($lista as $item) {
	$data1=date('d/m/Y', strtotime($item['dt_inicio']));
	$data2=date('d/m/Y', strtotime($item['dt_fim']));
	echo $item['pessoa'].' reservou o carro '.$item['id_car'].' entre '.$data1.' e '.$data2.'<hr>';
}*/

require "calendario.php";
?>

