<?php

  $rsult=$this->getCustomer();
  $collection=$this->getCustomers();
  $arra = $this->getCustomer()->getStatusOption();
?>



   Group:
   <select name="customer[groupId]">
   <?php  foreach ($collection->getData() as $key => $value) {?>
     <option value="<?php echo $value->groupId ; ?>" <?php if($rsult->groupId ==$value->groupId){echo 'selected' ;}  ?> ><?php echo $value->name; ?></option>
    <?php } ?> 
   </select><br><br>
   FirstName:
   <input type="text" name="customer[firstname]" value="<?php echo $rsult->firstname ;?>" ><br><br>
    LastName:
   <input type="text" name="customer[lastname]" value="<?php echo $rsult->lastname ;?>" ><br><br>
    Email:
   <input type="text" name="customer[email]" value="<?php echo $rsult->email ;?>" ><br><br>
    Password:
   <input type="text" name="customer[password]" value="<?php echo $rsult->password ;?>" ><br><br>
   Status:<br>
    <select name="customer[status]" >
       
       <option>Select</option>

       <?php foreach ($arra as $key => $value) { ?>

        <option value="<?php echo $key ; ?>" <?php if($rsult->status == $key){ echo 'selected' ; } ?> ><?php echo $value ; ?></option>

        
       <?php } ?>

    </select>
      <br><br>
     
 <a href="<?php echo $this->getUrl('grid'); ?>" class='btn btn-danger'>Clear</a>&nbsp;&nbsp;
 <input type="submit" name="s" class="btn btn-primary" >
</form>


  