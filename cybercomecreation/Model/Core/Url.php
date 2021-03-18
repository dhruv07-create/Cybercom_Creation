<?php
namespace Model\Core;
class Url 
{
	protected $request=null;

	public function setRequest(Request $request=null)
	{
        if(!$request)
        {
        	$request=\Mage::getModel("Model\\Core\\Request");
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

}

?>