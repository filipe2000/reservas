<?php
class Reservas{
	private $pdo;
	public function __construct($pdo){
		$this->pdo=$pdo;
	}
	public function getReservas($data_inicio,$data_fim)
	{
		$array = array();
		$sql="select * from tb_reservas where (NOT(dt_inicio > :fim OR dt_fim < :inicio))";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue('fim',$data_fim);
		$sql->bindValue('inicio',$data_inicio);
		$sql->execute();
		if($sql->rowCount()>0){
			$array= $sql->fetchAll();
	}

	return $array;		
	}
	public function verificarDisp($carro,$dt_ini,$dt_fim){
		$sql="select * from tb_reservas where id_car = :carro and
		(NOT(dt_inicio > :fim OR dt_fim < :inicio))";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":carro",$carro);
		$sql->bindValue(":inicio",$dt_ini);
		$sql->bindValue(":fim",$dt_fim);
		$sql->execute();
		if($sql->rowCount()>0){
			return false;
		}else{
			return true;
		}
	}
	public function reservar($carro,$dt_ini,$dt_fim,$pessoa){
		$sql="insert into tb_reservas set id_car= :carro, dt_inicio= :dt_ini, dt_fim= :dt_fim,pessoa= :pessoa";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":carro",$carro);
		$sql->bindValue(":dt_ini",$dt_ini);
		$sql->bindValue(":dt_fim",$dt_fim);
		$sql->bindValue(":pessoa",$pessoa);
		$sql->execute();
	}
}

?>