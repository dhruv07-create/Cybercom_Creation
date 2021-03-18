<?php
  
  $rsult=$this->getPayment();

  $status=$this->getPayment()->getStatusOption();

?>

    Name:
   <input type="text" name="payment[name]" value="<?php echo $rsult->name ;?>" ><br><br>
    Code:
   <input type="text" name="payment[code]" value="<?php echo $rsult->code ;?>" ><br><br>
    description:
   <input type="text" name="payment[description]" value="<?php echo $rsult->description ;?>" ><br><br>
   Status:<br>
   <select name="payment[status]" >
     
     <option>select</option>

     <?php foreach($status as $key=>$value){ ?>

       <option value="<?php echo $key; ?>" <?php if($rsult->status == $key){ echo "selected"; }  ?>  ><?php echo $value ; ?></option>

   <?php  }?>

   </select>
   <br>
     
   <input type="submit" name="s">

 </form>

   