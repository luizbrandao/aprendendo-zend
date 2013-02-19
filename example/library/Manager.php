<?php

class Example_Manager{
	public function getProducts(){
		$db = new Zend_Registry::get('Zend_Db');
		$sql = 'select * from products';
		return $db->fetchAll($sql);
	}

	public function getProduct($id){
		if(!Zend_Validate::is($id, 'Int')){
			throw new Exception("Invalid input");
		}
		$db = Zend_Registry::get('Zend_Db');
		$sql = "selec * from products where id = '$id'";
		$result = $db->fetchAll($sql);
		if (count($result) != 1) {
			throw new Exception("Invalid product ID: ".$id);
		}
		return $result;
	}
}