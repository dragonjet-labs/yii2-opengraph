<?php
namespace dragonjet\opengraph;
use Yii;

class TwitterCard {
	public $card;
	public $site;
	public $site_id;
	public $creator;
	public $creator_id;
	/*public $data1;
	public $label1;
	public $data2;
	public $label2;
	public $app_name_iphone;
	public $app_id_iphone;
	public $app_url_iphone;
	public $app_name_ipad;
	public $app_id_ipad;
	public $app_url_ipad;
	public $app_name_googleplay;
	public $app_id_googleplay;
	public $app_url_googleplay;*/
	
	public function __construct(){
		// Load default values
		$this->card = null;
		$this->site = null;
		$this->site_id = null;
		$this->creator = null;
		$this->creator_id = null;
	}
	
	public function set($metas=[]){
		// Massive assignment by array
		foreach($metas as $property=>$content){
			if(property_exists($this, $property)){
				$this->$property = $content;
			}
		}
	}
	
	public function registerTags(){
		$this->checkTag('card');
		$this->checkTag('site');
		$this->checkTag('site_id');
		$this->checkTag('creator');
		$this->checkTag('creator_id');
	}
	
	private function checkTag($property){
		if($this->$property!==null){
			$property = str_replace('_', ':', $property);
			Yii::$app->controller->view->registerMetaTag([
				'property' => 'twitter:'.$property,
				'content' => $this->$property,
			], 'twitter:'.$property);
		}
	}
	
}