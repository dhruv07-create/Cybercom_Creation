<!DOCTYPE html>
<html>
   
   <?php echo $this->createBlock('Block\\Customer\\Layout\\Head')->toHtml() ; ?>

   <div align="center" style="margin-top:10px;" >
 <table border="0" cellspacing="0" style="width: 100%" >
   <tr>
   	
    <td style="height: 60px;background-color: #555555" >
    	
      <?php echo $this->getChild('header')->toHtml(); ?>

    </td>
   </tr>
   <tr>
     <td><?php echo $this->createBlock('Block\\Customer\\Layout\\Message')->toHtml(); ?></td>
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
