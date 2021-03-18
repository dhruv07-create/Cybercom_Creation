<?php
namespace Controller\Core;

\Mage::loadFileByClassName('Controller\\Core\\Abstracts');

   
class Customer extends Abstracts
{
 
  public function setLayout(\Block\Core\Layout $layout = null)
  {
       if(!$layout)
       {
          $layout=\Mage::getBlock('Block\\Customer\\Layout');
       }     

      $this->layout=$layout;
      return $this;
  }

   public function setMessage()
   {
       $this->message=\Mage::getModel('Model\\Customer\\Message');
       return $this;
   }

}


?>