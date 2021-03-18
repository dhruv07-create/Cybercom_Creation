<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::loadFileByClassName('Block\\Core\\Table');

class Form extends \Block\Core\Table
{
	private $modelObj='';
       private $collection=null;
	 public function __construct()
	 {
	 	 $this->setTemplate('./View/admin/customer/edit/tabs/form.php');
	 }

	   public function setCustomer($model =null )
       {
 
 			if(!$model)
 			{
 				$model= \Mage::getModel('Model\\Customer');

 				 if($id=$this->getRequest()->getGet('id'))
 				  {
	 				$model->load($id);

	 			  }	
 			}

 			$this->modelObj=$model;

 			return $this;
       }

       public function getCustomer()
       {

       		if(!$this->modelObj)
       		{
              $this->setCustomer($this->getTableRow());
       		}

       	  return $this->modelObj;	
       }

        public function setCustomers(\Model\Customergroup\Collection $collection = null ){

         if(!$this->collection)
        {
               $collection=\Mage::getModel('Model\\Customergroup')->fetchAll();
        }
           $this->collection=$collection;

              return $this;   
   }

   public function getCustomers()
   {
           if(!$this->collection)
              {
                       $this->setCustomers();
              }      

           return $this->collection;   
   }
}

?>