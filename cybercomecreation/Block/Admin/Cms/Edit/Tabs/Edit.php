<?php
namespace Block\Admin\Cms\Edit\Tabs;

\Mage::loadFileByClassName("Block\\Core\\Table");

  class Edit extends \Block\Core\Table
  {
  	  protected $cms='';
  		public function __construct()
  		{
  			$this->setTemplate('./View/admin/cms/edit/tabs/form.php');
  		}

  		public function setCms(\Model\Cms $cms=null)
  		{
  			if(!$cms)
  			{
  				$cms=\Mage::getModel('Model\\Cms');
  				if($id=$this->getRequest()->getGet('id'))
  				{
  					$cms->load($id);
  				}
  				 
  			}

  		  $this->cms=$cms;
  		  return $this;	
  		}

  		public function getCms()
  		{
  			if(!$this->cms)
  			{
  				$this->setCms($this->getTableRow());
  			}
  		  return $this->cms;	
  		}
  }

?>