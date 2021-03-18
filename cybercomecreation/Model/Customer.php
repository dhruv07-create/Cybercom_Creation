<?php
namespace Model;
\Mage::loadFileByClassName('Model\\Core\\Adapter');
\Mage::loadFileByClassName('Model\\Core\\Table');


class Customer extends Core\Table{

    const STATUS_AVAILABLE=1;
    const STATUS_NOT_AVAILABLE=2;

    public function __construct()
    {

          $this->setPrimaryKey("customerId");
          $this->setTableName("customer");

    }

  public function getStatusOption()
  {
   
     return [
         self::STATUS_AVAILABLE=>'Available',
         self::STATUS_NOT_AVAILABLE=>'Not-Available',
     ];

  }


  







  
   /*public function save(){

        if(!array_key_exists('id',$this->getData())){

             $key=array_keys($this->getData());

             $value=array_values($this->getData());

            $key=implode(",",$key);
           
            $value="'".implode("','",$value)."'";


             $uq="insert into ".$this->getTableName()." (".$key.") values (".$value.");";

             $this->getAdapter()->connection()->insert($uq);


        }elseif (array_key_exists('id',$this->getData())) {
            
           $id=$this->data['id'];

       	     unset($this->data['id']);

            foreach ($this->data as $key => $value) {
         
           $q="update ".$this->getTableName()." set ".$key."='".$value."' where ".$this->getPrimaryKey()."=".$id." ;";

             if(!$this->getAdapter()->connection()->update($q)){ echo "Not Running";}

         }
           
        }

   }



    public function setData(array $array ){
    
      $this->data=array_merge($this->data,$array);

    }

    public function getData(){
 
       if(!$this->data){ $this->setData(); }

       return $this->data;
    }
   
   

    public function setAdapter(){

     $this->adapter=new Adapter();

     return $this;

    }


    public function getAdapter(){

     if(!$this->adapter){
     	$this->setAdapter();
     }

     return $this->adapter;

    }

    public function __set($key,$value){

       $this->data[$key]=$value;

    }

    public function __get($key){

    	return $this->data[$key];
    }    

    public function getTableName(){

    	return $this->tableName;
    }


    public function getPrimaryKey(){

    	return $this->primaryKey;
    }

    public function load($id){

      $id=(int) $id;

      $q="select * from ".$this->getTableName()." where ".$this->getPrimaryKey()."=".$id;

       $answer = $this->fetchRow($q);

       if(!$answer) { return false; }

       return $answer;
    }

    public function fetchRow($qu){

       $result = $this->getAdapter()->connection()->fetchRow($qu);  

       if(!$result){ return false; }

        return $result;
    }

    public function fetchAll(){

        $q='select * from '.$this->getTableName();

       $answer = $this->getAdapter()->connection()->fetchAll($q);

        if(!$answer){ return false; }

       return $answer;

    }

    public function delete($id){
    	
    	$id=(int)$id;

    	$q="delete from ".$this->getTableName()." where ".$this->getPrimaryKey()."=".$id;

    	$this->getAdapter()->connection()->delete($q);
 		
    }


}*/

}

?>