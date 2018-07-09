<?php 
require_once "config.php";
require "classes/carros.class.php";
$carro=new Carros($pdo);
 ?>
<table border="1" width="100%">
	<tr style="background-color: #ddd;font-size: 20px;">
		<th>Dom</th>
		<th>Seg</th>
		<th>Ter</th>
		<th>Qua</th>
		<th>Qui</th>
		<th>Sex</th>
		<th>Sab</th>
	</tr>
	<?php 
	
	for($l=0;$l< $linhas;$l++): $car=array(); ?>
		<tr>
			<?php for($q=0;$q< 7;$q++): 
			$t=strtotime(($q+($l*7)).'days',strtotime($data_inicio));
			$w=date('Y-m-d',$t);
			?>
			<td><?php 
			echo '<strong><center>'.date('d/m',$t).'</center></strong>'; 
			$w=strtotime($w);
			foreach ($lista as $item) {
				$dr_inicio=strtotime($item['dt_inicio']);
				$dr_fim=strtotime($item['dt_fim']);
				if($w>=$dr_inicio && $w<=$dr_fim){
					$car=$carro->selCar($item['id_car']);
					echo $car.'-('.$item['pessoa'].')'.'<br>';
				}
			}
			?></td>
		<?php endfor; ?>
		</tr>
	<?php endfor; ?>	
</table>