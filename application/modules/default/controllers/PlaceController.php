<?php

class PlaceController extends Zend_Controller_Action
{
	public function init ()
	{
		$option = array("layout" => "layout",
				"layoutPath" => APPLICATION_PATH . "/layouts/scripts/viettourguide");
		Zend_Layout::startMvc($option);
	
		$this->model = new Cp_Model_Article();
	
	}
	
	public function viewPlaceAction()
	{
		$id = $this->_request->getParam('id');
		if($id != '')
		{
			$place_model = new Cp_Model_Place();
			$row = $place_model->getPlaceById($id);
			$this->view->place = $row["data"];
		}else
		{
			echo 'invalid request';
		}
	}
}