<?php

class Cp_Model_Place extends Zend_Db_Table_Abstract {
	protected $db;
	protected $_name="dbo_travel_place";
    protected $_primary="place_id";
    public function __construct(){
        $this->db=Zend_Registry::get('db');
        parent::__construct();
    }
	
	public function getall() {
		$sql=$this->db->query("select * from dbo_travel_place");
        return $sql->fetchAll();
	}
	
	public function getPlaceById($id)
	{
		return $this->find($id);//for multi key find($id,$id2);
	}

}
