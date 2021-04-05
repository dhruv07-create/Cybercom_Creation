<?php
namespace Controller\Admin\Category;
\Mage::loadFileByClassName('Controller\\Core\\Admin');
 
 class Image extends \Controller\Core\Admin
 {
 	  public function saveImageAction()
      {
         
       if($this->getRequest()->getPost('s')!=null)
       {    
           if($id=$this->getRequest()->getGet('id'))
             {  
                  $model=\Mage::getModel('Model\Category\Image');
                   $types=['jpg','png','jpeg','jfif'];
                   $imageName=$_FILES['image']['name'];
                   $imageTmp=$_FILES['image']['tmp_name'];
                   $imageType=explode('.',$imageName);
                   $imageType=end($imageType);
                   $des='media/category/'.$imageName;


                   if(in_array(strtolower($imageType),$types))
                   {

                       move_uploaded_file($imageTmp,$des);

                     
                  $model->categoryId=$id;

                  $model->image=$des;

                  $model->save();

                   $imgId=$model->imageId; 
                    
                   $imageName=explode('.',$imageName);
                   $imageName[count($imageName)-2]=$imageName[count($imageName)-2].''.$imgId;
                   $imageName=implode('.',$imageName);

                   rename($des,'media/category/'.$imageName);
                   $des='media/category/'.$imageName;
                   $model->image=$des;

                   $model->save();
             
               
                   }
                
                
                 $this->redirect('edit','admin\Category',null,true);
                                   
               }
 
             }  

       }

        public function saveGridAction()
       {

        try{

       if($this->getRequest()->getPost('update')!=null)
       {   
           $model=\Mage::getModel('Model\\Category\\Image');
           if($id=$this->getRequest()->getGet('id'))
             { 

                   $icon=$this->getRequest()->getPost('image')['icon'];
                   $collection = $model->fetchAll("select imageId from categoryimg where icon='y' AND categoryId=".$id);
                   foreach ($collection->getData() as $key => $value) 
                   {

                   $model->update(['icon'=>'n'],['imageId'=>$value->imageId]);
                   }
                   $model->update(['icon'=>'y'],['imageId'=>$icon]);


                  $base=$this->getRequest()->getPost('image')['base'];
                  $collection = $model->fetchAll("select imageId from categoryimg where base='y' AND categoryId=".$id);
                  foreach ($collection->getData() as $key => $value) {

                  $model->update(['base'=>'n'],['imageId'=>$value->imageId]);

                  }
                  $model->update(['base'=>'y'],['imageId'=>$base]);

                  //banner             
                $collection = $model->fetchAll('select imageId from categoryimg where banner!="n" AND categoryId='.$id);
                foreach ($collection->getData() as $key => $value) 
                 {
                  
                 $model->update(['banner'=>'n'],['imageId'=>$value->imageId]);

                 }


                 $banner= $this->getRequest()->getPost('image')['banner'] ;  

                 if($banner)
                 {
                 foreach ($banner as $key => $value) 
                 {
                  
                 if($model->update(['banner'=>'y'],['imageId'=>$value]))
                 {
                    $message=\Mage::getModel('Model\\Admin\\Message');

                    $message->setSuccess('Updated Success-fully');

                 }
                 }
                 }
       
                  //active
                 $collection = $model->fetchAll('select imageId from categoryimg where active!="n" AND categoryId='.$id);
                foreach ($collection->getData() as $key => $value) 
                 {
                  
                 $model->update(['active'=>'n'],['imageId'=>$value->imageId]);

                 }


                 $active= $this->getRequest()->getPost('image')['active'] ;  

                 if($active)
                 {
                 foreach ($active as $key => $value) 
                 {
                  
                 if($model->update(['active'=>'y'],['imageId'=>$value]))
                 {
                    $message=\Mage::getModel('Model\\Admin\\Message');

                    $message->setSuccess('Updated Success-fully');

                 }
                 }
                 }
               }
                
                 $this->redirect('edit','admin\Category',null,true);

             }  

       }catch(Exception $e)
       {
           $message=\Mage::getModel('Model\\Admin\\Message');
           $message->setFailer($e->getMessage());
           $this->redirect('grid');
       }

     }

     public function deleteImageAction()
     {
          if($this->getRequest()->isPost()){
               
               $checkbox=$this->getRequest()->getPost('remove');

               if($checkbox)
               {
                  foreach ($checkbox as $imageId) {
                      
                      $image=\Mage::getModel('Model\Category\Image');

                      $fileName=$image->load($imageId)->image;
                      
                      unlink($fileName);

                      $image->delete();
                  }
 
               }  

             $this->redirect('edit','admin\Category',null,true);  
          }
     }
 }
?>