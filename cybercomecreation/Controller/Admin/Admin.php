<?php
namespace Controller\Admin;

      ob_start();

\Mage::loadFileByClassName('Controller\\Core\\Admin');


class Admin extends \Controller\Core\Admin 
{

  private $admin=null;

    public function gridAction()
    {
  
    try{

        $layout=$this->getLayout(); 
        $layout->setTemplate('./View/core/layout/one_column.php');
        $layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Admin\\Grid'),'grid');
        echo $layout->toHtml();
          
         /*$grid=\Mage::getModel('Block\\Admin\\Admin\\Grid')->toHtml();
        $responce=[
           'message'=>'Successfully',
           'element'=>[
            'selectore'=>'#content',
            'html'=>$grid
          ]
        ];

        header('Content-Type:Application/json');

        echo json_encode($responce);
         */    
          
      } catch (Exception $e) 
      {

      echo $e->getMessage();
      
    }


   }


   public function setModelObj($admin =null)
   {

       if(!$admin)
       {
         
         $this->admin=\Mage::getModel('Model\\Admin');

         return $this;

       }

    return $this->admin=$admin;

    return $this;

   }

   public function getModelObj()
   {

       if(!$this->admin)
       {
         
         $this->setModelObj();

       }

    return $this->admin;

   }

   public function formAction()
   {
          $id=$this->getRequest()->getGet('id');
          $tableRow=\Mage::getModel('Model\\Admin');
          $layout= $this->getLayout();
          $layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Admin\\Edit',true)->setTableRow($tableRow),'edit');
        //  $layout->getLeft()->addChild(\Mage::getBlock('Block\\Admin\\Admin\\Edit\\Tabs'),'left');
          echo  $layout->toHtml();  

/*         $edit=\Mage::getModel('Block\Admin\Admin\Edit\Tabs\Form')->toHtml();
        $responce=[
           'message'=>'Successfully',
           'element'=>[
            'selectore'=>'#content',
            'html'=>$edit
          ]
        ];

        header('Content-Type:Application/json');

        echo json_encode($responce);
*/
   }

   public function editAction()
   {

     try 
     {
          $id=$this->getRequest()->getGet('id');
          $tableRow=\Mage::getModel('Model\\Admin');
          $tableRow->load($id);
          $layout= $this->getLayout();
          $layout->getContent()->addChild(\Mage::getBlock('Block\\Admin\\Admin\\Edit')->setTableRow($tableRow),'edit');
        //  $layout->getLeft()->addChild(\Mage::getBlock('Block\\Admin\\Admin\\Edit\\Tabs'),'left');
          echo  $layout->toHtml();  

        /* $edit=\Mage::getModel('Block\\Admin\\Admin\\Edit\\Tabs\\Form')->toHtml();
         $left=\Mage::getModel('Block\\Admin\\Admin\\Edit\\Tabs')->toHtml();

        $responce=[
           'message'=>'Successfully',
           'element'=>[

            [
            'selectore'=>'#content',
            'html'=>$edit
            ],
            [
              'selectore'=>'#left',
              'html'=>$left
            ]
          ]
        ];

        header('Content-Type:Application/json');

        echo json_encode($responce);*/


         

     } catch (Exception $e) 
     {

        $this->redirect('grid');
       
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

              date_default_timezone_set('Asia/Kolkata');

                $pro= $this->getModelObj();

                 if($id=$this->getRequest()->getGet('id'))
                 {

                 $pro->setData($this->getRequest()->getPost('admin')); 

                 $primary=$pro->getPrimaryKey();

                 $pro->$primary=$id;     

             if($pro->save())
              {

             $session= new \Model\Admin\Message();
             $session->setSuccess('Update Successfully');
                
              }

               echo  'edit';


              $this->redirect('grid');

            }else
            {
             
               $pro->setData($this->getRequest()->getPost('admin'));
               $pro->createddate=date('Y-F-d');

               if($pro->save())
               {

               $session=\Mage::getModel('Model\\Admin\\Message');
               $session->setSuccess('Insert Successfully');
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

    try
    {
 
   	 $id= (int) $this->getRequest()->getGet('id');

       if(!$id)
       {

            $session=\Mage::getModel('Model\\Admin\\Message');
            $session->setFailer('ID not found for Delete Operation');

          throw new Exception();

       }

        $pre=\Mage::getModel('Model\\Admin');
      
        if($pre->delete($id))
          {
             $session=\Mage::getModel('Model\\Admin\\Message');
             $session->setSuccess('Delete Successfully');
          }        
 
        $this->redirect('grid');

        } catch (Exception $e) 
        {

         $this->redirect('grid');
      
        }


   }

}

?>