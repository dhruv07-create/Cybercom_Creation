<?php
  
  $rsult=$this->getConfigGroup();
?>

   Name:
   <input type="text" name="configgroup[name]" value="<?php echo $rsult->name ;?>" ><br><br>  
     
   <input type="submit" name="s" class="btn btn-primary" value="save">
   <?php /* <input disabled type="button" name="s" class="btn btn-primary" onclick="object.setForm(this).load()"  value="s"> */ ?>

 </form>

   