<?php
namespace Controller\Core;

// \Mage::loadFileByClassName('Block\\Core\\Layout');

   
class Abstracts
{


    protected $request=NULL;
    protected $layout=NULL;
    protected $message=NULL;

  public function __construct()
  {

   $this->setRequest();
   $this->setLayout();
   $this->setMessage();

  }

  public function setRequest()
  {

     $request=\Mage::getModel('Model\\Core\\Request');

     $this->request=$request;

     return $this;

  }

  public function getRequest()
  {

     return $this->request;

  }

  public function setLayout(\Block\Core\Layout $layout = null)
  { 
       if(!$layout)
       {

          $layout=\Mage::getBlock('Block\\Core\\Layout');

       }     

    $this->layout=$layout;
    return $this;
  }

  public function getLayout()
  {

      if(!$this->layout)
        {

          $this->setLayout();
          
        }  
        return $this->layout;
  }

  public function redirect($action = null , $controller = null,$parameter=null,$checkpara=false)
  {
    $url=$this->getUrl($action,$controller,$parameter,$checkpara);

    header("Location: $url");

  }

   
   public function getUrl($actionName=null,$controllerName=null,$parameter=null,$checkpara=false)
   {

       $final=$this->getRequest()->getGet(); 
      
      if(!$checkpara)
      {
         $final=[];
      }

      if($actionName==null)
      {

      	$actionName=$this->getRequest()->getGet('a');

      }

      if($controllerName==null)
      {

      	$controllerName=$this->getRequest()->getGet('c');

      }

      $final['a']=$actionName;
      $final['c']=$controllerName;

      if(is_array($parameter))
      {

      $final=array_merge($final,$parameter);

      }

      $final=http_build_query($final);
      
        return "http://localhost/cybercomecreation/index.php?$final";       

   }

   public function renderLayout()
   {
       echo $this->getLayout()->toHtml();
   }

   public function setMessage()
   {
       $this->message=\Mage::getModel('Model\\Core\\Message');
       return $this;
   }

   public function getMessage()
   {
     if(!$this->message)
     {
        $this->setMessage();
     }

     return $this->message; 
   }


}


?>