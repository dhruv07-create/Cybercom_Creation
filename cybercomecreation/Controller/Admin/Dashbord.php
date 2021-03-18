<?php
namespace Controller\Admin;
  \Mage::loadFileByClassName('Controller\\Core\\Admin');

 class Dashbord extends \Controller\Core\Admin {


      public function HomeAction(){

              $layout=$this->getLayout();
              $layout->setTemplate('./View/core/layout/one_column.php');
              $layout->getContent()->addChild(\Mage::getModel('Block\\Admin\\Dashbord\\Home'),'dashbord');
              echo $layout->toHtml();

             /* $dashbord=\Mage::getModel('Block\\Admin\\Dashbord\\Home')->toHtml();

             $responce=[
             
                'element'=>[
                  
                    'selectore'=>'#content',
                    'html'=>$dashbord
                ]
             ]; 

             header('Content-Type:application/json');

             echo json_encode($responce);*/
      }

      public function indexAction()
      {
          $layout=$this->getLayout();
          echo $layout->toHtml();
      }

      public function testAction()
      {
          $model=\Mage::getModel('Model\\Category');

          /*$model->fetchAll('');*/
      }

 }

?>