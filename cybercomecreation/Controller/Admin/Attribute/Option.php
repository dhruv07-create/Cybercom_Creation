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

           $optionData=$this->getRequest()->getPost();
    		
          if($this->getRequest()->isPost())
          {  
            echo '1';
          	 $modelOption=\Mage::getModel("Model\\Attribute\\Option");
             $attribute=\Mage::getModel("Model\\Attribute");
             
             if($id=$this->getRequest()->getGet('id'))
             {  
              echo '2';
                if(array_key_exists('Exist',$optionData))
                {
                 echo '3';
                $existingData=$optionData['Exist'];
                $attribute->load($id);
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
                      echo '5';
                         $this->getMessage()->setSuccess('Update|Insert Successfully');
                     }
                  }
                }

               } 

             //new  Data

              if(array_key_exists('New',$optionData))
              {
                 echo 4;
                  $newOptionData=$optionData['New']['name'];

                  foreach ($newOptionData as $key => $option) 
                  {    
                    $modelOption=\Mage::getModel('Model\\Attribute\\Option');

                      $modelOption->attributeId=$id;
                      $modelOption->name=$option;
                      $modelOption->sortOrder=$optionData['New']['sortOrder'][$key];

                      if($modelOption->save())
                      {
                        echo 6;
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