<?php
namespace Controller\Admin;
  ob_start();

 \Mage::loadFileByClassName('Controller\\Core\\Admin');


 class Product extends \Controller\Core\Admin{

	 protected $products=[];
   protected $productObj=null;
  

	 public function gridAction(){

      try
      { $pager=\Mage::getController('Controller\Core\Pager');
        $id=$this->getRequest()->getGet('page');
        $pager->setCurrentPage($id);   
            $layout=$this->getLayout();
            $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Product\\Grid')->setPager($pager),'grid');
            echo $layout->toHtml();

      }
        catch(Exception $e)
        {

         echo $e->getMessage();

        }

   }
   public function setProductObj($obj = null)
   {
           
          if(!$obj)
          {
           
           $this->productObj=\Mage::getModel('Model\\Product');
           return $this;    
          
          }

        $this->productObj=$obj;
        return $this;  

   }

   public function getProductObj()
   {
    
       if(!$this->productObj)
       {

          $this->setProductObj();
       }

       return $this->productObj;

   }


   public function setProduct($pro){

   	   $this->products=$pro;

   	   return $this;

   }
 

   public function getProduct()
   {


     return $this->products; 
        
   }

   public function formAction()
   {

      try
      {     
             $tableRow=\Mage::getModel('Model\\Product');

            $layout=$this->getLayout();
            $layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Product\\Edit')->setTableRow($tableRow),'edit');
            echo $layout->toHtml();

      }

      catch(Exception $e)
      { 
        $e->getMessage(); 
      }

     

   }


   public function editAction(){

       try{ 
            $tableRow=\Mage::getModel('Model\\Product');
            
            $id=$this->getRequest()->getGet('id');
            $tableRow->load($id);
            $layout=$this->getLayout();
            $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Product\\Edit')->setTableRow($tableRow),'edit');

           echo $layout->toHtml();

       } catch(Exception $e){ 

      echo $e->getMessage();
      
      }

                       
   }
   
   public function saveAction()
   { 
  
       try{

        date_default_timezone_set("Asia/Kolkata");
         
        if($this->getRequest()->isPost())
        {
          $pre= \Mage::getModel('Model\\Product');
          $id=$this->getRequest()->getGet('id');
                                                       
           if($this->getRequest()->getPost('Update')!=null)
           {
             $productAtt=$this->getRequest()->getPost('productAtt');

              if($productAtt)
              {
                 $pre->load($id);
                 
                 if(!$pre->getData())
                 {
                    throw new Exception("Error NOO DATA FOUND", 1);
                    
                 }
                  $data=[];
                 foreach ($productAtt as $key => $value) 
                 {
                     if(is_array($value))
                     {
                        $data[$key]=implode(',',$value);
                     }else{
                       $data[$key]=$value;
                     }

                 }

                 $pre->setData($data); 
                   
                  if($pre->save())
                  {
                    $this->getMessage()->setSuccess('updated');

                  }
               
                    $this->redirect('edit',null,null,true);

              }
           }

       if($this->getRequest()->getPost('s')!=null){

        $message=\Mage::getModel('Model\\Admin\\Message');

             if($id)
             {

           $pre->load($id);
           if(!$pre->getData())
           {
              throw new Exception("Error Processing Request", 1);
              
           }
           $pre->setData($this->getRequest()->getPost('product'));
           $pre->updateddate=date('d-F-Y');

           if($pre->save())
           {

            $message->setSuccess('Update Successfully');
           }

           $this->redirect('grid');

             }else{

              $pre->setData($this->getRequest()->getPost('product'));
           
              $pre->createddate=date('d-F-Y');

              if($pre->save())
              {
                 $message->setSuccess('Insert Successfully');
              }

              $this->redirect('grid');

             }
        }
      }
      } catch(Exception $e){ 

        
      echo $e->getMessage();
      

      }

   }
   public function deleteAction(){

       try{

      $id= (int) $this->getRequest()->getGet('id');

      if(!$id){

       throw new Exception("Error Request id in null");
       
      }

        $pre=\Mage::getModel('Model\\Product');

        if($pre->delete($id))
        {
           $message=\Mage::getModel('Model\\Admin\\Message');
           $message->setSuccess('Delete Successfully');
        }
    
        $this->redirect('grid');

      } catch (Exception $e)
       {
           echo $e->getMessage();
       }
   }

   public function saveImageAction()
      {
       if($this->getRequest()->getPost('s')!=null)
       {    echo 'h1';
           if($id=$this->getRequest()->getGet('id'))
             {  echo 'h2';
                   $types=['jpg','png','jpeg'];
                   $imageName=$_FILES['image']['name'];
                   $imageTmp=$_FILES['image']['tmp_name'];
                   $imageType=explode('.',$imageName);
                   $imageType=end($imageType);
                   $des="images/".$imageName;

                   if(in_array(strtolower($imageType),$types))
                   {

                       move_uploaded_file($imageTmp,$des);

                  $model=\Mage::getModel('Model\\Product')->setPrimaryKey('imgId')->setTableName('productimg');

                  $model->productId=$id;

                  $model->image=$des;

                  $model->save(); 

                   }


                  $this->redirect('edit',null,null,true);
                                   
               }
 
             }  

       }

        public function saveGridAction()
       {

        try{

       if($this->getRequest()->getPost('update')!=null)
       {   
           $model=\Mage::getModel('Model\\Product')->setPrimaryKey('imgId')->setTableName('productimg');
           if($id=$this->getRequest()->getGet('id'))
             { 
                 
                 $id=$this->getRequest()->getGet('id');
                 
                   foreach ($this->getRequest()->getPost('lable') as $key => $value) 
                   {

                   $model->update(['lable'=>$value],['imgId'=>$key]);

                   }
                   

                   $small=explode(',',$this->getRequest()->getPost('small'));
                   $collection = $model->fetchAll("select imgId from productimg where small='yes' AND productId=".$id);
                   foreach ($collection->getData() as $key => $value) 
                   {

                   $model->update(['small'=>'no'],['imgId'=>$value->imgId]);
                   }
                   $model->update(['small'=>'yes'],['imgId'=>end($small)]);


                  $thumb=explode(',',$this->getRequest()->getPost('thumb'));
                  $collection = $model->fetchAll("select imgId from productimg where thumb='yes' AND productId=".$id);
                  foreach ($collection->getData() as $key => $value) {

                  $model->update(['thumb'=>'no'],['imgId'=>$value->imgId]);

                  }
                  $model->update(['thumb'=>'yes'],['imgId'=>end($thumb)]);



                  $base=explode(',',$this->getRequest()->getPost('base'));
                  $collection = $model->fetchAll("select imgId from productimg where base='yes' AND productId=".$id);
                  foreach ($collection as $key => $value) {

                  $model->update(['base'=>'no'],['imgId'=>$value->imgId]);
                  }
                  $model->update(['base'=>'yes'],['imgId'=>end($base)]);



                 $collection = $model->fetchAll('select imgId from productimg where gallery!="no" AND productId='.$id);
                  foreach ($collection->getData() as $key => $value) 
                 {
                  
                 $model->update(['gallery'=>'no'],['imgId'=>$value->imgId]);

                 }

                 $gallery= $this->getRequest()->getPost('gallery') ;  

                 if($gallery)
                 {
                 foreach ($gallery as $key => $value) 
                 {
                  
                 if($model->update(['gallery'=>'yes'],['imgId'=>$value]))
                 {
                    $message=\Mage::getModel('Model\\Admin\\Message');

                    $message->setSuccess('Updated Success-fully');

                 }


                 }

                 }

                                   
               }
                
                 $this->redirect('edit',null,null,true);

             }  

       }catch(Exception $e)
       {
           $message=\Mage::getModel('Model\\Admin\\Message');
           $message->setFailer($e->getMessage());
           $this->redirect('grid');
       }

     }

     public function deleteMediaAction()
     {
          if($this->getRequest()->isPost()){
               
               $checkbox=$this->getRequest()->getPost('remove');

               if($checkbox)
               {
                  foreach ($checkbox as $imgId) {
                      
                      $image=\Mage::getModel('Model\\Product')->setTableName('productimg')->setPrimaryKey('imgId');

                      $fileName=$image->load($imgId)->image;
                      
                      unlink($fileName);

                      $image->delete();
                  }
 
               }  

             $this->redirect('edit',null,null,true);  
          }
     }

    public function filterAction()
   {
      $Filter=\Mage::getModel('Model\Core\filter');

      $Filter->setFilter($this->getRequest()->getPost('filter'));

      $this->redirect('grid');
   }
   
   }
?>