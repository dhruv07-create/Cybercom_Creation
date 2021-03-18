<?php
  
  namespace Block\Admin\Customer;
\Mage::loadFileByClassName('Block\\Core\\Table');

	class Grid extends \Block\Core\Table{

        protected $customerData=null;

        protected $collection='';

        public function __construct(){

        	$this->setTemplate('./View/admin/customer/grid.php');
      
        }


       public function setCustomers( \Model\Customer\Collection $collection = null ){
      
       		if(!$collection){

      $collection=\Mage::getModel('Model\\Customer')->fetchAll("select c.customerId,c.firstname,ca.address,c.lastname,c.email,c.password,cg.name groupname,c.status,c.createddate,c.updateddate from customer c join customer_group cg on c.groupId=cg.groupId join customer_address ca on c.customerId=ca.customerId where ca.addresstype='billing' ;");

       			}
       			 $this->collection=$collection;

       			 return $this;
       		}

       public function getCustomers(){

              if(!$this->collection){

              	   $this->setCustomers();
              }

              return $this->collection;
       }
	}

?>