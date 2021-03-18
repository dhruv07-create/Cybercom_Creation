<?php
  namespace Controller\Core;
  \Mage::loadFileByClassName('Model\\Core\\Request');

  class Front{

    public static function init()
    {
   
    	$req=\Mage::getModel('Model\\Core\\Request');

    	$controllerName=ucfirst($req->getControllerName());

    	$actionName=$req->getActionName()."Action";
      
        $controllerName=\Mage::prepareClassName('Controller',$controllerName);
        
        \Mage::loadFileByClassName($controllerName); 

        $controllerName='\\'.$controllerName;

        $controller=new $controllerName();

        $controller->$actionName(); 

        
    }

 }


?>