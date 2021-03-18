<?php
  
  $rsult=$this->getAdmin();

  $status=$this->getAdmin()->getStatusOption();

?>

   Name:
   <input type="text" name="admin[name]" value="<?php echo $rsult->name ;?>" ><br><br>
    Password:
   <input type="text" name="admin[password]" value="<?php echo $rsult->password ;?>" ><br><br>
   Status:<br>
   <select name="admin[status]" >
     
     <option>select</option>

     <?php foreach($status as $key=>$value){ ?>

       <option value="<?php echo $key; ?>" <?php if($rsult->status == $key){ echo "selected"; }  ?>  ><?php echo $value ; ?></option>

   <?php  }?>

   </select>
   <br><br>
     
   <input type="submit" name="s" class="btn btn-primary" >

 </form>

   