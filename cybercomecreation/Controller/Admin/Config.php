<?php
namespace Controller\Admin;
                                                       
class Config extends \Controller\Core\Admin
{
	public function saveAction()
    {
    	try {

           $ConfigData=$this->getRequest()->getPost();
    		
          if($this->getRequest()->isPost())
          {  
            echo '1';
          	 $modelConfig=\Mage::getModel("Model\\Config");
             $Configgroup=\Mage::getModel("Model\\Configgroup");
             
             if($id=$this->getRequest()->getGet('id'))
             {  
              echo '2';
                if(array_key_exists('Exist',$ConfigData))
                {
                 echo '3';
                $existingData=$ConfigData['Exist'];
                $Configgroup->load($id);
                $configs=$Configgroup->getConfigs();
                $configIds=[];
 
             foreach ($configs->getData() as $key => $config)
                {
                   $configIds[]=$config->configId;
                }   
             foreach ($existingData as $key => $value) 
             {
                 $configIds=array_diff($configIds, [$key]);
                if($modelConfig->update($value,['configId'=>$key]))
                {
                  $this->getMessage()->setSuccess('Update|Insert Successfully');
                }
             }

                if($configIds)
                {
                   foreach ($configIds as $key => $configId) 
                   {
                     if($modelConfig->delete($configId))
                     {
                      echo '5';
                         $this->getMessage()->setSuccess('Update|Insert Successfully');
                     }
                  }
                }

               } 

             //new  Data

              if(array_key_exists('New',$ConfigData))
              {
                 echo 4;
                  $newConfigData=$ConfigData['New']['title'];

                  foreach ($newConfigData as $key => $option) 
                  {    
                    $modelConfig=\Mage::getModel('Model\\Config');

                      $modelConfig->groupId=$id;
                      $modelConfig->title=$option;
                      $modelConfig->value=$ConfigData['New']['value'][$key];
                      $modelConfig->code=$ConfigData['New']['code'][$key];
                      $modelConfig->createddate=date('d-Y-m');

                      if($modelConfig->save())
                      {
                        echo 6;
                        $this->getMessage()->setSuccess('Update|Insert Successfully');
                      }
                  }
              }
             }

             }
           $this->redirect('edit','admin\Configgroup',null,true);  
    	} catch (Exception $e) {
    		  $this->getMessage()->setFailer($e->getMessage());

          $this->redirect('grid');
    	}
    }
	
}
?>