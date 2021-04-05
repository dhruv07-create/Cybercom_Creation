
<?php

 spl_autoload_register(__NAMESPACE__ .'\Mage::loadFileByClassName');
      
 class Mage{

   public static function init(){

     //self::loadFileByClassName("Controller\\Core\\Front");

        Controller\Core\Front::init();
         
   }

   

   public static function prepareClassName($key,$namespace)
   {
      $classname=$key." ".$namespace;
      $classname= str_replace("\\"," ",$classname);
      $classname=ucwords($classname);
      $classname= str_replace(" ","\\",$classname);
      return $classname;
   
   }

   public static function getModel($classname){
      
     // self::loadFileByClassName($classname);
      $classname=str_replace("\\", ' ', $classname);
      $classname=ucwords($classname);
      $classname=str_replace(' ','\\',$classname);
     
      return new $classname();
   }

    public static function getController($classname){
      
     // self::loadFileByClassName($classname);
      $classname=str_replace('\\', ' ', $classname);
      $classname=ucwords($classname);
      $classname=str_replace(' ', '\\', $classname);

      return new $classname();
   }

    public static function getBlock($classname,$ton = false){
      
      if(!$ton)
      { 
     // self::loadFileByClassName($classname);
      $classname=str_replace('\\', ' ', $classname);
      $classname=ucwords($classname);
      $classname=str_replace(' ','\\',$classname);
      return new $classname();
     }

      $value=self::getRegistery($classname);

      if($value)
      {
         return $value;
      }

     // self::loadFileByClassName($classname);
      $classname=str_replace('\\', ' ', $classname);
      $classname=ucwords($classname);
      $classname=str_replace(' ','\\',$classname);
      $value=new $classname(); 
      self::setRegistery($classname,$value);
      return $value;
   }

   public static function loadFileByClassName($classname){
 
      $classname=str_replace('\\', ' ', $classname);
      $classname=ucwords($classname);
      $classname=str_replace(' ','/', $classname).".php";

      require_once $classname; 
 }

 public static function setRegistery($key,$value)
 {
    $GLOBALS[$key]=$value;
 }

 public static function getRegistery($key,$optional = null)
 {
     if(array_key_exists($key, $GLOBALS))
     {
        return $GLOBALS[$key];
     }
    return $optional; 
 }

 public function getBaseDir($subDir=null)
 {
     if(!$subDir)
     {
       return getcwd();
     }
      return getcwd().DIRECTORY_SEPARATOR.$subDir;

 }


}

 Mage::init();




?>


