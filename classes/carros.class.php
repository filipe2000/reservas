<?php
class Carros{
	private $pdo;
	public function __construct($pdo){
		$this->pdo=$pdo;
	}	
	public function getCarros()
	{
		$array=array();
		$sql="select * from tb_carros";
		$sql=$this->pdo->query($sql);
		if($sql->rowCount()>0){
			$array=$sql->fetchAll();
		}
		return $array;
	}
	public function selCar($id){		
		$car="";
		$sql="select nome_car from tb_carros where id_car= :id";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue('id',$id);
		$sql->execute();
		if($sql->rowCount()>0){
			$sql=$sql->fetch();
			$car=$sql['nome_car'];
		}
		return $car;	
	}
}

?>