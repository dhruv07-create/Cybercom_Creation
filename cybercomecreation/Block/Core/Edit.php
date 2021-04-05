<?php
namespace Block\Core;

\Mage::loadFileByClassName('Block\\Core\\Table');

class Edit extends \Block\Core\Table
{
	private $tableRow='';
	private $tabClass='';
	private $tab='';

	public function __construct()
	{
		$this->setTemplate('./View/core/edit.php');
	}

   public function getTabContent()
    {

      $tab=$this->getRequest()->getGet('tab');
      $tabBlock=$this->getTabModel();
      $tabs=$tabBlock->getTabs();
  
      if(!$tab)
      {
          $tab=$tabBlock->getDefaultTab();
      }

      if(!array_key_exists($tab,$tabs))
      {  
         return null;
      }

     $blockName=$tabs[$tab]['block']; 
     \Mage::loadFileByClassName($blockName);
     $blockObj=\Mage::getBlock($blockName)->setTableRow($this->getTableRow());

     echo $blockObj->toHtml(); 
    }

    public function setTabModel($tab = null)
    {
    	if(!$tab)
    	{
    		$tab=\Mage::getBlock($this->getTabClass());
    	}

    	$tab->setTableRow($this->getTableRow());

    	$this->tab=$tab;
    	return $this;

    }

    public function getTabModel()
    {
    	if(!$this->tab)
    	{
    		$this->setTabModel();
    	}
      return $this->tab;	
    }

     public function getTabHtml()
     {         
     	 return $this->getTabModel()->toHtml();
     }

    public function setTableRow(\Model\Core\Table $tableRow)
      {
               $this->tableRow=$tableRow;
               return $this; 	  
      }

    public function getTableRow()
        {
        	return $this->tableRow;
        }    

     public function getFormUrl()
         {
            return $this->getUrl('save',null,null,true);
         }    
                                                      
     public function setTabClass($tabClass)
	     {  
	     	$this->tabClass=$tabClass;	
	     	return $this;	
	     }    

	 public function getTabClass()
	      {
	      	 return $this->tabClass;
	      }     
}


?>