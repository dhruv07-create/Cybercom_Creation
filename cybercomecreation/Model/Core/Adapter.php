<?php
namespace Model\Core;

      class Adapter
      {

		private $config=[

			'host'=>'localhost',
			'user'=>'root',
			'password'=>'',
			'database'=>'new'

	      ];

       private $con='';

     public function connection()
     {

	    $con=new \mysqli($this->config['host'],$this->config['user'],$this->config['password'],$this->config['database']);

	    if($con->connect_error)
      {
	    
	      die("connection error:".$con->connect_error);

	    }
        
	    $this->setConnection($con);

      return $this;
     }
  
   public function setConnection(\mysqli $q)
   {
 
      $this->con=$q;

   }
   public function getConnection()
   {
             
      return $this->con;

   }
  

   public function isConnected()
   {
 
     if(!$this->con)
     {
      
      return false;
   
     }else
     {

      return true;

     }


   }




   public function insert($q)
   {
 
       $bol=$this->getConnection()->query($q);

       if($bol)
       {
          
         return $this->getConnection()->insert_id;
         
       }else
       {

        return false;

       }

   }


   public function update($q)
   {


   $bol=$this->getConnection()->query($q);

       if($bol)
       {
          
         return true;

       }else
       {

        return false;

       }
    }


   public function delete($q)
   {
 
    $bol=$this->getConnection()->query($q);

       if($bol)
       {
          
         return true;
         
       }else
       {

        return false;

       }

   }

   public function fetchPairs($query)
   {
       $r=$this->getConnection()->query($query);

       $rows=$r->fetch_all();
       
       $column=array_column($rows,'0');
       $value=array_column($rows,'1');

       return array_combine($column, $value);
      

   }
   public function fetchRow($q)
   {
 
     $bol=$this->getConnection()->query($q);

     if(!$bol)
     {
      return null;
     }

     return $bol->fetch_assoc();

    
   }

   public function fetchOne($sq)
   {
      $result=$this->getConnection()->query($sq);

      return $result->num_rows;
   }

  public function fetchAll($q)
  {
 
     $bol=$this->getConnection()->query($q);

     return $bol->fetch_all(MYSQLI_ASSOC);
      
   }



}


?>