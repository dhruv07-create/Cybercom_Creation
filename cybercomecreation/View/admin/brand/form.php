 <?php 
   $result=$this->getBrand();
?>

   <form action="<?php echo $this->getUrl('save',null,null,true) ;?>" method='post' enctype='multipart/form-data' >
     Name:
   <input type="text" name="name"value="<?php echo $result->name ; ?>" ><br><br> 
     Image:
   <input type="file" name="brand"><br><br>  
   <input type="submit" name="s" class="btn btn-success">

  </form> 

