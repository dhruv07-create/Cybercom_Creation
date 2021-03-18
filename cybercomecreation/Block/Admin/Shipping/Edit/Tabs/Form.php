<?php
namespace Block\Admin\Shipping\Edit\Tabs;
\Mage::loadFileByClassName('Block\\core\\Table');
class Form extends \Block\core\Table
{
    private $modelObj=null;

  public function __construct()
  {
    $this->setTemplate('./View/admin/shipping/edit/tabs/form.php');
  }

  public function setShipping(\Model\Shipping $modelObj = null)
  {
    if(!$modelObj)
    {
       $modelObj=\Mage::getModel('Model\\Shipping');
       if($id=$this->getRequest()->getGet('id'))
       {  
        $modelObj->load($id);
       }
    }
      $this->modelObj=$modelObj;
      return $this;

  }

  public function getShipping()
  {
        if(!$this->modelObj)
        {
          $this->setShipping($this->getTableRow());
        }

        return $this->modelObj;
  }
}
?>