<?php
namespace Block\Admin\Cms;
\Mage::loadFileByClassName('Block\\Core\\Table');

 class Grid extends \Block\Core\Table
 {

 	    protected $cms='';

 	    public function __construct()
 	    {
 	    	$this->setTemplate("./View/admin/Cms/Grid.php");
 	    }


 	    public function setCmsData(\Model\Cms $cms=null)
 	    {
 	    	if(!$cms)
 	    	{
 	    		 $cms=\Mage::getModel("Model\\Cms")->fetchAll();
 	    	}
         $this->cms=$cms;

         return $this;

 	    }

 	    public function getCmsData()
 	    {
 	    	if(!$this->cms)
 	    	{
 	    		$this->setCmsData();
 	    	} 
 	      return $this->cms;	
 	    }
 }

?>