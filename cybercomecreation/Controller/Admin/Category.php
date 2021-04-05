<?php
 namespace Controller\Admin;
     ob_start();

  \Mage::loadFileByClassName('Controller\\Core\\Admin');


 class Category extends \Controller\Core\Admin 
 {

   	protected $category1=[];
    protected $product=null;


   public function gridAction()
   {
  
    try {
     $pager=\Mage::getController('Controller\Core\Pager');
        $id=$this->getRequest()->getGet('page');
        $pager->setCurrentPage($id);
        $layout1= $this->getLayout();
        $layout1->getContent()->addChild( \Mage::getBlock('Block\\Admin\\Category\\Grid')->setPager($pager),'grid');
       echo $layout1->toHtml();
          
      } catch (Exception $e) 
      {

      echo $e->getMessage();
      
     }


   }


   public function setModelObj($product =null)
   {

       if(!$product)
       {
         
         $this->product=\Mage::getModel('Model\\Category');

         return $this;

       }

    return $this->product=$product;

    return $this;

   }

   public function getModelObj()
   {

       if(!$this->product)
       {
         
         $this->setModelObj();

       }

    return $this->product;

   }



   public function setCategoryData($result)
   {

   	  $this->category1=$result;

   	  return $this;


   }


   public function getCategoryData()
   {

     return $this->category1;

   }




   public function formAction()
   {
          $rowData=\Mage::getModel('Model\\Category');
          $edit=\Mage::getBlock('Block\\Admin\\Category\\Edit')->setTableRow($rowData);
          $layout= $this->getLayout();
          $layout->getContent()->addChild($edit,'edit');
         echo $layout->toHtml();  
   }

   public function editAction()
   {

     try 
     {     
            $id=$this->getRequest()->getGet('id');
            $rowData=\Mage::getModel('Model\\Category');
            $rowData->load($id);
            $edit=\Mage::getBlock('Block\\Admin\\Category\\Edit')->setTableRow($rowData);
            $layout= $this->getLayout();
            $layout->getContent()->addChild($edit,'edit');
            echo $layout->toHtml(); 
             
     } catch (Exception $e) 
     {

        $this->redirect('grid','Admin\\category');
       
     }

   }

   public function saveAction()
   {
        try 
     {
         if($this->getRequest()->isPost())
         {

            if($this->getRequest()->getPost('s')!=null)
            {

              $message=\Mage::getModel('Model\\Admin\\Message');

                $pro= $this->getModelObj();

                 if($id=$this->getRequest()->getGet('id'))
                 {

                   $pro->load($id);

                   $categoryPath=$pro->pathId;

                   $pro->setData($this->getRequest()->getPost('category')); 

                    $types=['jpg','png','jpeg','jfif'];
                 $imageName=$_FILES['image']['name'];
                 $imageTmp=$_FILES['image']['tmp_name'];
                 $imageType=explode('.',$imageName);
                 $imageType=end($imageType);
                 $des='media/category/'.$imageName;

                 if(in_array(strtolower($imageType),$types))
                   {

                    move_uploaded_file($imageTmp,$des);
                    
                    $pro->image=$des;
 
                   }
                  

                   if($pro->save())
                   {
                       $message->setSuccess('Update Successfully');
                   } 

                 $pro->updatePathId();

                 $categoryPath=$categoryPath."=";

               $pro->updateChildrenPathIds($categoryPath);

             $this->redirect('grid');

            }else
            {
             
               $pro->setData($this->getRequest()->getPost('category'));
               $date=date("d-F-Y");
               $pro->createddate=$date;
                $types=['jpg','png','jpeg','jfif'];
                 $imageName=$_FILES['image']['name'];
                 $imageTmp=$_FILES['image']['tmp_name'];
                 $imageType=explode('.',$imageName);
                 $imageType=end($imageType);
                 $des='media/category/'.$imageName;

                 if(in_array(strtolower($imageType),$types))
                   {

                    move_uploaded_file($imageTmp,$des);

                   $pro->image=$des;

                   }

              if($pro->save())
              {
                 $message->setSuccess('Insert Successfully');
              }
           
               $pro->updatePathId();
               
               $this->redirect('grid');
            }

            } 
           }  

     } catch (Exception $e) 
     {

        $this->redirect('grid','category');
       
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

        $pre=\Mage::getModel('Model\\Category');
        $pre->load($id);
        $parent=$pre->parentId;
       
        $pathId=$pre->pathId;
        $image=$pre->image;    
      
        if($pre->delete())
          { 
            unlink($image);
            $message->setSuccess('Successfully Deletion Operation');
          }        
 
          $pathId=$pathId."="; 

         $qq="SELECT * from {$pre->getTableName()} where pathId LIKE '{$pathId}%'";
         
         $collection=$pre->fetchAll($qq);
        foreach ($collection->getData() as $key => $value) 
        {

              if($value)
              {
                 $value->parentId=$parent;
                 $value->save();
                 $value->updatePathId();
              }
          
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