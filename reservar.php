<?php
require "config.php";
require "classes/carros.class.php";
require "classes/reservas.class.php";
 $reservas= new Reservas($pdo);
 $carros= new Carros($pdo);
 if(!empty($_POST['carro'])){
 	$carro=addslashes($_POST['carro']);
 	$dt_ini=explode('/',addslashes($_POST['data_inicio']));
 	$dt_fim=explode('/',addslashes($_POST['data_fim']));
 	$pessoa=addslashes($_POST['pessoa']);

 	$dt_ini=$dt_ini[2].'-'.$dt_ini[1].'-'.$dt_ini[0];
 	$dt_fim=$dt_fim[2].'-'.$dt_fim[1].'-'.$dt_fim[0];
 	if($reservas->verificarDisp($carro,$dt_ini,$dt_fim)){
 		$reservas->reservar($carro,$dt_ini,$dt_fim,$pessoa);
 		header("Location: index.php");
 				
 	}else{
 		echo "Este carro já está reservado neste período!";
 	}
 }

?>
<h1>Reservas</h1>
<hr>
<form method="post">
	Carro:<br/>
	<select name="carro">
		<?php
		$lista=$carros->getCarros();
		foreach ($lista as $car):
		?>
		<option value="<?php echo $car['id_car']; ?>">
			<?php echo $car['nome_car']; ?>
		</option>
		<?php	
		endforeach;	
		
		?>
	</select><br/>
	Data inicio:<br/>
	<input type="text" name="data_inicio"></input><br/>
	Data fim:<br/>
	<input type="text" name="data_fim"></input><br/>
	Reservador:<br/>
	<input type="text" name="pessoa"></input><br/>
	<input type="submit" value="Reservar"></input><a href="index.php"><-Voltar</a>
</form>