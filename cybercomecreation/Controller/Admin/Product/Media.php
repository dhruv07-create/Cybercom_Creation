<?php
namespace Controller\Admin\Product;
\Mage::loadFileByClassName('Controller\\Core\\Admin');
 
 class Media extends \Controller\Core\Admin
 {
 	  public function saveImageAction()
      {
         
       if($this->getRequest()->getPost('s')!=null)
       {    
           if($id=$this->getRequest()->getGet('id'))
             {  
                  $model=\Mage::getModel('Model\\ProductMedia');
                   $types=['jpg','png','jpeg','jfif'];
                   $imageName=$_FILES['image']['name'];
                   $imageTmp=$_FILES['image']['tmp_name'];
                   $imageType=explode('.',$imageName);
                   $imageType=end($imageType);
                   $des='media/product'.$imageName;


                   if(in_array(strtolower($imageType),$types))
                   {

                       move_uploaded_file($imageTmp,$des);

                     
                  $model->productId=$id;

                  $model->image=$des;

                  $model->save();

                   $imgId=$model->imgId; 
              
                   $imageName=explode('.',$imageName);
                   $imageName[count($imageName)-2]=$imageName[count($imageName)-2].''.$imgId;
                   $imageName=implode('.',$imageName);

                   rename($des,'media/product'.$imageName);
                   $des='media/product'.$imageName;
                   $model->image=$des;

                   $model->save();
             
               
                   }
                
                
                 $this->redirect('edit','admin\product',null,true);
                                   
               }
 
             }  

       }

        public function saveGridAction()
       {

        try{

       if($this->getRequest()->getPost('update')!=null)
       {   
           $model=\Mage::getModel('Model\\ProductMedia');
           if($id=$this->getRequest()->getGet('id'))
             { 
                 
                 $id=$this->getRequest()->getGet('id');

                  

                   foreach ($this->getRequest()->getPost('image')['lable'] as $key => $value) 
                   {

                       $model->update(['lable'=>$value],['imgId'=>$key]);

                   }
                   

                   $small=$this->getRequest()->getPost('image')['small'];
                   $collection = $model->fetchAll("select imgId from productimg where small='yes' AND productId=".$id);
                   foreach ($collection->getData() as $key => $value) 
                   {

                   $model->update(['small'=>'no'],['imgId'=>$value->imgId]);
                   }
                   $model->update(['small'=>'yes'],['imgId'=>$small]);


                  $thumb=$this->getRequest()->getPost('image')['thumb'];
                  $collection = $model->fetchAll("select imgId from productimg where thumb='yes' AND productId=".$id);
                  foreach ($collection->getData() as $key => $value) {

                  $model->update(['thumb'=>'no'],['imgId'=>$value->imgId]);

                  }
                  $model->update(['thumb'=>'yes'],['imgId'=>$thumb]);



                  $base=$this->getRequest()->getPost('image')['base'];
                  $collection = $model->fetchAll("select imgId from productimg where base='yes' AND productId=".$id);
                  foreach ($collection as $key => $value) {

                  $model->update(['base'=>'no'],['imgId'=>$value->imgId]);
                  }
                  $model->update(['base'=>'yes'],['imgId'=>$base]);



                 $collection = $model->fetchAll('select imgId from productimg where gallery!="no" AND productId='.$id);
                  foreach ($collection->getData() as $key => $value) 
                 {
                  
                 $model->update(['gallery'=>'no'],['imgId'=>$value->imgId]);

                 }

                 $gallery= $this->getRequest()->getPost('image')['gallery'] ;  

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
                
                 $this->redirect('edit','admin\product',null,true);

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
                      
                      $image=\Mage::getModel('Model\\ProductMedia');

                      $fileName=$image->load($imgId)->image;
                      
                      unlink($fileName);

                      $image->delete();
                  }
 
               }  

             $this->redirect('edit','admin\product',null,true);  
          }
     }
 }
?>