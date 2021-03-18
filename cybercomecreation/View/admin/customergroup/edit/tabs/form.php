 <?php 
   $result=$this->getCatogoryGroup();
?>

     Name:
   <input type="text" name="group[name]"value="<?php echo $result->name ; ?>" ><br><br>  
   <input type="submit" name="s" class="btn btn-success">

  </form> 


