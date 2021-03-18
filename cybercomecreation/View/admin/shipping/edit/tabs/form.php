<?php
 
 $data=$this->getShipping();

 $statusArray=$this->getShipping()->getStatusOption();

?>

    Name:
   <input type="text" name="shipping[name]" value="<?php echo $data->name ;?>" ><br><br>
    Code:
   <input type="text" name="shipping[code]" value="<?php echo $data->code ;?>" ><br><br>
    Amount:
   <input type="text" name="shipping[amount]" value="<?php echo $data->amount ;?>" ><br><br>
    Description:
   <input type="text" name="shipping[description]" value="<?php echo $data->description ;?>" ><br><br>
    Status: 
   <select name="shipping[status]">
       
       <option>select</option>

       <?php foreach ($statusArray as $key => $value) { ?>

            <option value="<?php echo $key ;?>" <?php if($data->status == $key) { echo 'selected'; } ?> ><?php echo $value ;?></option>

       <?php } ?>

   </select>  
 
   <br>
   <br>
     
   <input type="submit" name="s">
 </form>
