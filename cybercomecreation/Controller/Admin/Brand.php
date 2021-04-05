<?php
 namespace Controller\Admin;
     ob_start();

  \Mage::loadFileByClassName('Controller\\Core\\Admin');


 class Brand extends \Controller\Core\Admin 
 {

   	protected $category1=[];
    protected $brand=null;


   public function gridAction()
   {
  
    try {
        $pager=\Mage::getController('Controller\Core\Pager');
        $id=$this->getRequest()->getGet('page');
        $pager->setCurrentPage($id);
        $layout1= $this->getLayout();
        $layout1->getContent()->addChild( \Mage::getBlock('Block\\Admin\\Brand\\Grid')->setPager($pager),'grid');
       echo $layout1->toHtml();
          
      } catch (Exception $e) 
      {

      echo $e->getMessage();
      
     }


   }


   public function setModelObj($brand =null)
   {

       if(!$brand)
       {
         
         $this->brand=\Mage::getModel('Model\\Brand');

         return $this;

       }

    return $this->brand=$brand;

    return $this;

   }

   public function getModelObj()
   {

       if(!$this->brand)
       {
         
         $this->setModelObj();

       }

    return $this->brand;

   }

   public function formAction()
   {
          $rowData=\Mage::getModel('Model\\Brand');
          $edit=\Mage::getBlock('Block\\Admin\\Brand\\Edit')->setTableRow($rowData);
          $layout= $this->getLayout();
          $layout->getContent()->addChild($edit,'edit');
         echo $layout->toHtml();  
   }

   public function editAction()
   {

     try 
     {     
            $id=$this->getRequest()->getGet('id');
            $rowData=\Mage::getModel('Model\\Brand');
            $rowData->load($id);
            $edit=\Mage::getBlock('Block\\Admin\\Brand\\Edit')->setTableRow($rowData);
            $layout= $this->getLayout();
            $layout->getContent()->addChild($edit,'edit');
            echo $layout->toHtml(); 
             
     } catch (Exception $e) 
     {

        $this->redirect('grid','Admin\\brand');
       
     }

   }

   public function saveAction()
   {
        try 
     {
         if($this->getRequest()->isPost())
         {    echo "<pre>";

            if($this->getRequest()->getPost('s')!=null)
            {

              $message=\Mage::getModel('Model\\Admin\\Message');

                $pro= $this->getModelObj();

                 if($id=$this->getRequest()->getGet('id'))
                 {

                   $pro->load($id);

                   $pro->name=$this->getRequest()->getPost('name'); 

                    $types=['jpg','png','jpeg','jfif'];
                 $imageName=$_FILES['brand']['name'];
                 $imageTmp=$_FILES['brand']['tmp_name'];
                 $imageType=explode('.',$imageName);
                 $imageType=end($imageType);
                 $des='media/brand/'.$imageName;

                 if(in_array(strtolower($imageType),$types))
                   {

                    move_uploaded_file($imageTmp,$des);
                    
                    $pro->image=$des;
 
                   }
                    

                   if($pro->save())
                   {
                       $message->setSuccess('Update Successfully');
                   } 

             $this->redirect('grid');

            }else
            {  
               
               $pro->name=$this->getRequest()->getPost('name'); 
               $date=date("d-F-Y");
               $pro->createddate=$date;
                $types=['jpg','png','jpeg','jfif'];
                 $imageName=$_FILES['brand']['name'];
                 $imageTmp=$_FILES['brand']['tmp_name'];
                 $imageType=explode('.',$imageName);
                 $imageType=end($imageType);
                 $des='media/brand/'.$imageName;

                 if(in_array(strtolower($imageType),$types))
                   {

                    move_uploaded_file($imageTmp,$des);

                   $pro->image=$des;

                   }

              if($pro->save())
              {
                 $message->setSuccess('Insert Successfully');
              }
           

               $this->redirect('grid');
            }

            } 
           }  

     } catch (Exception $e) 
     {

        $this->redirect('grid');
       
     }
   }

   public function deleteAction()
   {

    try {
 
   	 $id= (int) $this->getRequest()->getGet('id');
     $message=\Mage::getModel('Model\\Admin\\Message');

       if(!$id)
       {
            $session->setFailer('ID not found for Deletion Operation');

          throw new Exception();

       }

        $pre=\Mage::getModel('Model\\brand');
        $pre->load($id);
        $image=$pre->image;    
      
        if($pre->delete())
          { 
            unlink($image);
            $message->setSuccess('Successfully Deletion Operation');
          }        
          
        $this->redirect('grid');
        
        } catch (Exception $e) 
        {

         $this->redirect('grid');
      
        }


   }

   public function filterAction()
   {    
       $filter=\Mage::getModel('Model\Core\Filter'); 
         
        $filter->setFilter($this->getRequest()->getPost('filter'));
          
          print_r($filter->getFilters());

      $this->redirect('grid');
   }
 
}


?>