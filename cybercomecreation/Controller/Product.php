<?php 
namespace Controller; 

  class Product extends Core\Customer
  {
  	 public function viewAction()
     {
      $id=$this->getRequest()->getGet('id');
      $layout=$this->getLayout();
      $content=$layout->getContent();
      $product=\Mage::getModel('Model\Product');
      $product->load($id);
      $content->addChild(\Mage::getBlock('Block\Customer\product\product')->setProduct($product));
      echo $layout->toHtml();    
    }

     public function filterAction()
     {
          $front=$this->getRequest()->getPost('category');

          $Frontfilter=\Mage::getModel("Model\\Customer\\FilterFront");
           
          $Frontfilter->setFilter($front); 

          $this->redirect('view',"category",null,true);    
       }
  }

?>
