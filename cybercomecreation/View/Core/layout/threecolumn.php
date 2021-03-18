<!DOCTYPE html>
<html>
<body >
 
  <table border="2" style="margin-left: 8px" >
  	
   <tr>
     <td width="1200px" colspan="3" height="60px" bgcolor="#555555">
     	
       <?php echo $this->getChild('header')->toHtml(); ?>

     </td>
   </tr>
   <tr>
     <td colspan="3" >
          <?php echo $this->createBlock('Block_Core_Layout_Message')->toHtml(); ?>
     </td>
   </tr>

   <tr>  
   	 <td style="width: 20%" >
          <?php echo $this->getChild('left')->toHtml();  ?>
   	  </td>
   	 <td  style="padding:20px;width: 60%" >
   	 	
          <?php echo $this->getChild('content')->toHtml();  ?>


   	 </td>
   	 <td style="width: 20%">
          <?php echo $this->getChild('right')->toHtml(); ?>
   	 </td>
   </tr>

   <tr>
   	  
   	  <td colspan="3" height="60px" >
   	  	
           
        <?php echo $this->getChild('footer')->toHtml();  ?>

   	  </td>

   </tr>
 
  </table>

</body>
</html>