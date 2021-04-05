<?php
namespace Block\Core;
\Mage::loadFileByClassName('Block\\Core\\Layout\\Message');
\Mage::loadFileByClassName('Model\\Core\\Url');
\Mage::loadFileByClassName('Model\\Admin\\Message');
 class Table  {

  protected $layout=null;
  protected $template='';
  protected $control=null;
  protected $children=[];
  protected $tabs=[];
  protected $message='';
  protected $request='';
  protected $defaultTab=null;
  private $tableRow='';
  protected $pager='';
  

   public function setPager($pager)
   {
      $this->pager=$pager;
      return $this;
   }
   
   public function getPager()
    {  
        return $this->pager;
    } 

   public function setTemplate($temp){

       $this->templete=$temp;

       return $this;

  }


 public function getTemplet(){

  	  return $this->templete;
  }
  

public function setDefaultTab($Tab)
{
     $this->defaultTab=$Tab;
}
public function getDefaultTab()
{
   return $this->defaultTab;
}

  public function toHtml()
  {
     ob_start();
  	 require_once $this->getTemplet();
     $content=ob_get_contents();
     ob_end_clean();
     return $content;
  }


   public function setController(\Controller\Core\Admin $control)
    {
       
          $this->control=$control;

          return $this;

   } 

   public function getController()
   { 
        
        return $this->control;

   }

   public function setChildren(array $array){

       $this->children=$array;

   }
   public function getChildren(){
           
      return $this->children;  
   }
   public function addChild(\Block\Core\Table $child ,$key=null){
    
         if(!$key){

            $key=get_class($child);
         }

       $this->children[$key]=$child;  
      
   }
   public function getChild($key){
 
        if(!array_key_exists($key,$this->children)){
           
           return null;
        }

        return $this->children[$key];
   }
   public function removeChild($key){

        if(!array_key_exists($key,$this->children)){
              return null;
        }         

         unset($this->children[$key]); 
   }

   public function setMessage()
   {
      $this->message=\Mage::getModel('Model\\Admin\\Message');
   }
  
   public function getMessage()
   {
       if(!$this->message)
       {
          $this->setMessage();
       }
      return $this->message; 
   }

   public function setTableRow(\Model\Core\Table $rowData)
   {
      $this->tableRow=$rowData;

      return $this;
   }
   public function getTableRow()
   {
      return $this->tableRow;
   }

   public function createBlock($classname)
   {
       return \Mage::getBlock($classname);
   }

   public function getUrl($actionName=null,$controllerName=null,$parameter=null,$checkpara=false)
   {
      return \Mage::getModel('Model\\Core\\Url')->getUrl($actionName,$controllerName,$parameter,$checkpara);
   } 

   public function setRequest(\Model\Core\Request $request = null)
   {
        if(!$request)
        {
            $request=\Mage::getModel('Model\\Core\\Request');
        }

        $this->request=$request;
        return $this;
   }
     
   public function getRequest()
   {
       if(!$this->request)
       {
          $this->setRequest();
       }

      return $this->request;
   }

   public function getTabs()
  {
    return $this->tabs;
  }
  
  public function setTabs(array $tabs)
  {
         $this->tabs=$tabs;

         return $this;
  }

  public function addTab($key,array $tab)
  {
         $this->tabs[$key]=$tab;

         return $this;
  }

  public function getTab($key)
  {
    if(!array_key_exists($key, $this->tabs))
    {
            return false;
    } 

    return $this->tabs[$key];
  }

  public function removeTab($key)
  {
      if(!array_key_exists($key, $this->tabs))
    {
            return false;
    } 

    unset($this->tabs[$key]);
  }

  public function baseUrl($url1)
   {
    $url='http://localhost/cybercomecreation/';
     $url=$url.''.$url1;
     return $url;
   } 

 }
  
?>