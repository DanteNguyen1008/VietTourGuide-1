<?php

class IndexController extends Zend_Controller_Action {

	public function init() {
		$option = array("layout" => "layout", "layoutPath" => APPLICATION_PATH . "/layouts/scripts/viettourguide");
		$this -> view -> template_path = $this -> view -> baseUrl() . '/templates/viettourguide/';
		Zend_Layout::startMvc($option);
	}

	public function indexAction() {

		/*
		 $p = new Cp_Model_Product();
		 $order = array();
		 $filter = array();
		 $orWhere = array();

		 $order['field'] = 'date_create';
		 $order['dir'] = 'DESC';
		 $filter['publish'] = 1;
		 $filter['flag_homepage'] = 1;

		 $adapter = new Zend_Paginator_Adapter_DbSelect(
		 $p->gettall($filter, $order, $orWhere));

		 $paginator = new Zend_Paginator($adapter);
		 $paginator->setItemCountPerPage(10);
		 $page = $this->_request->getParam('page', 1);
		 $paginator->setCurrentPageNumber($page);

		 $this->view->paginator = $paginator;
		 $this->view->itemCount = $paginator->getCurrentItemCount();

		 $this->view->headTitle('Trang chủ - Địa Ốc Mỹ Hưng', 'SET');
		 $this->view->headScript()->appendFile(
		 $this->view->baseUrl('templates/canhosaigon/') .
		 'js/script.js', 'text/javascript');

		 $article_order = array();
		 $article_filter = array();
		 $article_filter['publish'] = 1;

		 $article = new Cp_Model_Article();
		 $article_adapter = new Zend_Paginator_Adapter_DbSelect(
		 $article->gettall($article_filter, $article_order));
		 $article_paginator = new Zend_Paginator($article_adapter);
		 $this->view->articles = $article_paginator;
		 $this->view->articles_itemCount = $article_paginator->getCurrentItemCount();*/
	}

	public function placeGridRenderAction() {
		$model_place = new Cp_Model_Place();

		$this -> view -> place_grid_data = $model_place -> getall();
	}

	public function mainMenuRenderAction() {
		//Load list place from database
		$model_lanscape_type = new Cp_Model_LanscapeType();

		$rs = $model_lanscape_type -> getall();
		$this -> view -> lanscape_data = $rs;
	}

	public function searchGridAction() {
		$lanscape_name = $this->_request->getParam('id');
		$model_place = new Cp_Model_Place();
		$this -> view ->place_list = $model_place->getPlaceByLanscapeName($lanscape_name);
	}

	public function menuRenderAction() {
		$model_pg = new Cp_Model_Productgroup();
		$bds_ban_id_adapter = new Zend_Paginator_Adapter_DbSelect($model_pg -> listall(99));

		$bds_ban_id = new Zend_Paginator($bds_ban_id_adapter);
		$bds_ban_id -> setItemCountPerPage();
		$page = $this -> _request -> getParam('page', 1);
		$bds_ban_id -> setCurrentPageNumber($page);

		$bds_mua_id_adapter = new Zend_Paginator_Adapter_DbSelect($model_pg -> listall(100));

		$bds_mua_id = new Zend_Paginator($bds_mua_id_adapter);
		$bds_mua_id -> setItemCountPerPage();
		$page = $this -> _request -> getParam('page', 1);
		$bds_mua_id -> setCurrentPageNumber($page);

		$this -> view -> bds_ban_id = $bds_ban_id;
		$this -> view -> bds_mua_id = $bds_mua_id;

	}

	public function renderSearchBoxAction() {
		$modelDistrict = new Cp_Model_District();
		$districts = $modelDistrict -> fetchAll();

		$modelPricerange = new Cp_Model_PriceRange();
		$priceranges = $modelPricerange -> fetchAll();

		$modelArearange = new Cp_Model_AreaRange();
		$arearanges = $modelArearange -> fetchAll();

		/* Nhóm sản phẩm */
		$filter = array();
		$filter['publish'] = 0;
		$model = new Cp_Model_Productgroup();
		$adapter = new Zend_Paginator_Adapter_DbSelect($model -> listall());
		$product_groups = new Zend_Paginator($adapter);
		$product_groups -> setItemCountPerPage();

		$this -> view -> product_group = $product_groups;
		$this -> view -> districts = $districts;
		$this -> view -> priceranges = $priceranges;
		$this -> view -> arearanges = $arearanges;
	}

	public function renderQuickContactAction() {

		$id = 17;

		$article_model = new Cp_Model_Article();
		$row = $article_model -> find($id) -> current();
		$this -> view -> row = $row;
	}

	public function renderPartnerAction() {
		$id = 19;

		$article_model = new Cp_Model_Article();
		$row = $article_model -> find($id) -> current();
		$this -> view -> row = $row;
	}

	public function renderTagscloudAction() {
		$id = 16;

		$article_model = new Cp_Model_Article();
		$row = $article_model -> find($id) -> current();
		$this -> view -> row = $row;
	}

	public function contactAction() {
		$id = 18;

		$article_model = new Cp_Model_Article();
		$row = $article_model -> find($id) -> current();
		$this -> view -> row = $row;
	}

	public function renderCopyrightAction() {

	}

}
