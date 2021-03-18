<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/Js/jQuery-3.6.0.js') ;?>" ></script>
  <script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/Js/mage.js') ;?>" ></script>
</head>
   
   <div align="center" style="margin-top:10px;" >
 <table border="0" cellspacing="0" style="width: 100%" >
   <tr>
   	
    <td style="height: 60px;background-color: #555555" >
    	
      <?php echo $this->getChild('header')->toHtml(); ?>

    </td>
   </tr>
   <tr>
     <td><?php echo $this->createBlock('Block\\Core\\Layout\\Message')->toHtml(); ?></td>
   </tr>
   <tr>
   	
   	 <td  style="overflow: auto;padding: 20px" align="center" id="content"  >
      <?php echo $this->getChild('content')->toHtml(); ?>
   	 </td>

   </tr>
   <tr>
   	
     <td style="height: 50px" >
          
      <?php echo $this->getChild('footer')->toHtml() ; ?>


     </td>

   </tr>

 </table>

 </div>

</body>
</html>
