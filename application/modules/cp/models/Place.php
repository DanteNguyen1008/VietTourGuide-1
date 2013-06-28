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
		$sql=$this->db->query("select * from dbo_travel_place ORDER BY RAND() LIMIT 8");
        return $sql->fetchAll();
	}
	
	public function getPlaceById($id)
	{
		return $this->find($id);//for multi key find($id,$id2);
	}
	
	public function getPlaceByLanscapeName($name)
	{
		$select = $this->db->select()
			->from(array('p' => 'dbo_travel_place'), array('place_id','place_name','description','image_path'))
			->join(array('l' => 'dbo_place_lanscape'), 'p.place_id = l.place_id', array())
			->join(array('t' => 'dbo_lanscape_type'), 't.type_name = l.landscape_type_name', array())
			->where('t.type_name = ?',$name)
			->order('RAND()');
			
		$stmt =	$this->db->query($select);
		return $stmt->fetchAll();
	}

}
