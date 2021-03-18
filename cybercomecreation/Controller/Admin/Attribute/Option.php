<?php
namespace Controller\Admin\Attribute;
\Mage::loadFileByClassName('Controller\\Core\\Admin');

/**
 * 			
 */
class Option extends \Controller\Core\Admin
{
	public function saveAction()
    {
    	try {

             echo "<pre>";

             print_r($_POST);
           $optionData=$this->getRequest()->getPost();
    		
          if($this->getRequest()->isPost())
          {
          	 $modelOption=\Mage::getModel('Model\\Attribute\\Option');
             $attribute=\Mage::getModel("Model\\Attribute");
             
             if($id=$this->getRequest()->getGet('id'))
             {
                if(array_key_exists('Exist',$optionData))
                {

                $existingData=$optionData['Exist'];
                $attribute->attributeId=$id;
                $options=$attribute->getOptions();
                $optionsId=[];

             foreach ($options->getData() as $key => $option)
                {
                   $optionsId[]=$option->optionId;
                }   
             foreach ($existingData as $key => $value) 
             {
                 $optionsId=array_diff($optionsId, [$key]);
                if($modelOption->update($value,['optionId'=>$key]))
                {
                  $this->getMessage()->setSuccess('Update|Insert Successfully');
                }
             }
                if($optionsId)
                {
                   foreach ($optionsId as $key => $optionId) 
                   {
                     if($modelOption->delete($optionId))
                     {
                         $this->getMessage()->setSuccess('Update|Insert Successfully');
                     }
                  }
                }

               } 

             //new  Data

              if(array_key_exists('New',$optionData))
              {

                  $newOptionData=$optionData['New']['name'];

                  foreach ($newOptionData as $key => $option) 
                  {
                      $modelOption->attributeId=$id;
                      $modelOption->name=$option;
                      $modelOption->sortOrder=$optionData['New']['sortOrder'][$key];

                      echo '<pre>';
                      print_r($modelOption);
                      if($modelOption->save())
                      {
                        $this->getMessage()->setSuccess('Update|Insert Successfully');
                      }
                  }
              }
             }

             }

           $this->redirect('edit','admin\attribute',null,true);  
          
    	} catch (Exception $e) {
    		  $this->getMessage()->setFailer($e->getMessage());

          $this->redirect('grid');
    	}
    }
	
}
?>