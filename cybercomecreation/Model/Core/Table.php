<?php
namespace Model\Core;

\Mage::loadFileByClassName('Model\\Core\\Adapter');
\Mage::loadFileByClassName('Controller\\Core\\Admin');
   
  class Table 
  {

  	 protected $primarykey="categoryId";
     protected $tablename="category";
     protected $adapter='';
     protected $originalData = [];
     protected $data=[];
     
  	
  	function __construct()
  	{

  	}



   public function setOriginalData($setOriginalData)
   {
     $this->originalData = $setOriginalData;
     return $this;
   }

   public function getOriginalData()
   {
      return $this->originalData;
   }

public function getRow()
 {
    return clone $this;
 }   
    public function insert(array $data)
    {
      
       try 
       {
       
           $key=array_keys($data);

           $value=array_values($data);

           $key=implode(",", $key);

           $value="'".implode("','", $value)."'";

           $query="insert into {$this->getTableName()} ({$key}) values ({$value}); ";
           if($id = $this->getAdapter()->connection()->insert($query))
           {
               throw new \Exception("Insert Fail.");
               
           }

           $this->load($id);

           return $this;

        } catch (\Exception $e) 
           {
              $message=\Mage::getModel('Model\\Admin\\Message');
              $message->setFailer($e->getMessage());
              $redirect=\Mage::getController('Controller\\Core\\Admin');
              $redirect->redirect('grid');
           }
    }

    public function update(array $data ,array $condition )
    {
      try 
      {
           $con='';

           if(empty($condition))
           {

              return null;
           }

           if(count($condition)==1)
           {

              foreach ($condition as $key => $value) 
              {
                    
                    $con=$key.'='."'".$value."'";
              }
           }
 
                if(count($condition)>1)
                {
           
                     $count=0;
                    foreach ($condition as $key => $value) 
                    {
                         $count++;

                            if($count<count($condition))
                              {
                                $and='and';
                              }else
                              {
                                 $and='';
                              }
                        
                        $con=$con."{$key}='{$value}' {$and} ";
                   }
                }


            foreach ($data as $key => $value)
              {
  
                      $query="update {$this->getTableName()} set {$key}='{$value}' where {$con};";
                    

                      if(!$this->getAdapter()->connection()->update($query))
                      {
                          
                           throw new \Exception("Update Fail.");
                           
                      }                      
                }

            return $this; 
          } catch (\Exception $e) 
          {
                 $session=\Mage::getModel('Model\\Admin\\Message');
                 $session->setFailer($e->getMessage());
                 $redirect=\Mage::getController('Controller\\Core\\Admin');
                 $redirect->redirect('grid');    
          }    
    }

    public function save()
    {
         try{
          $primarykey=$this->getPrimaryKey(); 
          if(array_key_exists($primarykey,$this->getData()))
          {
             unset($this->data[$primarykey]);
          }

          $id=$this->$primarykey;

	 		if(!$id)
      {

               $key=array_keys($this->getData());

               $key=implode(',',$key);

               $value=array_values($this->getData());

               $value="'".implode("','", $value)."'";

         $query="insert into ".$this->getTableName()." (".$key.") values (".$value.")"; 
        
         if(!$id=$this->getAdapter()->connection()->insert($query))
          {  
             throw new \Exception('Insert Fail.');
          } 


       }elseif($id)
       {
            // $this->data=array_filter($this->data) ;

        print_r($this->data);

            foreach ($this->data as $key => $value) 
            {

               $key.":".$value."<br>";
         
           echo  $q="update ".$this->getTableName()." set ".$key."='".$value."' where ".$this->getPrimaryKey()."=".$id." ;";

             if(!$this->getAdapter()->connection()->update($q))
              { 
                throw new \Exception("Update Fail.");
              }

           }

       }
     $this->load($id);
     $this->unsetData();

     return $this;

   }catch(\Exception $e)
   {
       $session= \Mage::getModel('Model\\Admin\\Message');
       $session->setFailer($e->getMessage());
       $redirect=\Mage::getController('Controller\\Core\\Admin');
       $redirect->redirect('grid');

   }

	}
	 

   public function setAdapter(\Model\Core\Adapter $adapter = null)
   {
     
      if(!$adapter)
      {

          $adapter=\Mage::getModel('Model\\Core\\Adapter');  
          $adapter->connection();
      }

      $this->adapter=$adapter;

      return $this;

   }


   public function getAdapter()
   {

       if(!$this->adapter)
        { 
          $this->setAdapter();  
        }

       return $this->adapter;

   }

   public function setData(array $data1 )
   {

      $this->data=array_merge($this->data,$data1);

      return $this;
     
   }

   public function getData()
   {

     return $this->data;

   }


   public function setTableName($tablename){

      $this->tablename=$tablename;

      return $this;

   }


   public function getTableName()
   {

      return $this->tablename;

   }


   public function setPrimaryKey($primarykey)
   {

      $this->primarykey=$primarykey;

      return $this;

   }


   public function getPrimaryKey()
   {

      return $this->primarykey;

   }

     public function __set($key,$value)
     {

        $this->data[$key]=$value;

        return $this;

     } 
   

    public function __get($ans){

      if(array_key_exists($ans,$this->getData()))
      {
         return $this->getData()[$ans];
      }

      if(array_key_exists($ans,$this->getOriginalData()))
      {
        return $this->getOriginalData()[$ans];
      }
    		return null;
    }

    public function unsetData()
    {
     
          $this->data=[];

          return $this;
    }


    public function load($value,$key = null)
    {

      if(!$key)
      {

        $key=$this->getPrimaryKey();
      }

     $id=(int) $value;
  
    $q="select * from {$this->getTableName()} where {$key} =".$id;

     return $this->fetchRow($q);

    }

    public function fetchRow($q)
    {

       $resul=$this->getAdapter()->connection()->fetchRow($q);

        if(!$resul){
        	return false;
        }

        $this->setOriginalData($resul);

        return $this;
 
    }

  public function fetchAll($query = null){

      if(!$query){

     $query="select * from ".$this->getTableName().";";
      }

     $answer=$this->getAdapter()->connection()->fetchAll($query);

     if(!$answer)
     {
      \Mage::loadFileByClassName(get_class($this)."\Collection"); 
     $className=get_class($this)."\Collection";
     
    return $collection=\Mage::getModel($className);
      
     }

     $array=[];

     foreach($answer as $key=>$value){

         $key=new $this;

         $key->setData($value);
 
         $array[]=$key;


     }
     
    \Mage::loadFileByClassName(get_class($this)."\Collection"); 
     $className=get_class($this)."\Collection";
    $collection=\Mage::getModel($className);    
     $collection->setData($array);
     return $collection;    
     
  }

  public function delete($id = null)
  {
     try{

    $session=\Mage::getModel('Model\\Admin\\Message');
      if(!$id){
     
           $key = $this->getPrimaryKey(); 
           $id = $this->$key; 

      	}
        
      $id=(int) $id;

    echo  $query="delete from ".$this->getTableName()." where ".$this->getPrimaryKey()."=".$id;

      if(!$this->getAdapter()->connection()->delete($query))
      {
        throw new \Exception();
      }

      return true;

     }catch (\Exception $e)
     {
        $session->setFailer("Delete Query not Running");
        $redirect=\Mage::getController('Controller\\Core\\Admin');
        $redirect->redirect('grid');
     }
   }
   
  }

?>
