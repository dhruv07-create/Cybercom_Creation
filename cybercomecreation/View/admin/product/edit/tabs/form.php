 <?php 
   $result=$this->getProduct();
   $array=$result->getStatusOption();
   
?>

    Sku:
   <input type="text" name="product[sku]" value="<?php echo $result->sku ; ?>" ><br><br>
    Name:
   <input type="text" name="product[name]"value="<?php echo $result->name ; ?>" ><br><br>
    Price:
   <input type="text" name="product[price]" value="<?php echo $result->price ; ?>"><br><br>
    Discount:
   <input type="text" name="product[discount]"value="<?php echo $result->discount ; ?>" ><br><br>
   Quantity:
   <input type="text" name="product[quantity]" value="<?php echo $result->quantity ; ?>"><br><br>
   Description:
   <input type="text" name="product[description]" value="<?php echo $result->description ; ?>" ><br><br>
   Status:<br>   
   <select name="product[status]" >
    <option > select </option>

    <?php foreach ($array as $key => $value) {?>

      <option <?php if($result->status == $key){ echo 'selected'; } ?>  value="<?php echo $key ; ?>" ><?php echo $value; ?> </option>

    <?php }?>
   </select>
   <br><br>
   
   <input type="submit" name="s" value="submit" class="btn btn-success">
  
   </form>


  