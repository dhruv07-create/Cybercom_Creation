<?php 
namespace Controller; 

\Mage::loadFileByClassName('Controller\\Core\\Customer');

  class Category extends Core\Customer
  {
  	 public function viewAction(){
      $id=$this->getRequest()->getGet('id');
      $layout=$this->getLayout();
      $content=$layout->getContent();
      $category=\Mage::getModel('Model\Category');
      $category->load($id);
      $content->addChild(\Mage::getBlock('Block\Customer\Category\category')->setCategory($category));
      echo $layout->toHtml();    
  }
  }

?>
