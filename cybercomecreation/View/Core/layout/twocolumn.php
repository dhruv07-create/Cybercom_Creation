<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/Js/jQuery-3.6.0.js') ;?>" ></script>
  <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/Js/mage.js') ;?>" ></script>
</head>
<body >

  <table style="margin-left: 8px;width: 100%" >
  	
   <tr>
     <td colspan="2" height="60px" style="background-color: #555555;" >
     	
       <?php echo $this->getChild('header')->toHtml(); ?>

     </td>
   </tr>
   
    <tr>
     <td colspan="2" ><?php echo $this->createBlock('Block\\Core\\Layout\\Message')->toHtml(); ?></td>
   </tr>

   <tr>

   	 <td id='left' >
          <?php echo $this->getChild('left')->toHtml();  ?>

   	  </td>
   	 <td style="padding: 20px;" id="content">
   	 	
          <?php echo  $this->getChild('content')->toHtml();  ?>
 
   	 </td>
   </tr>

   <tr>
   	  
   	  <td colspan="2" height="60px" >
   	  	
        <?php  echo $this->getChild('footer')->toHtml();  ?>

   	  </td>

   </tr>
 
  </table>
 <div>
</body>
</html>