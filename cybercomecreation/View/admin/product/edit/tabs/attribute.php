<?php 
 $attributes = $this->getAttributes()->getData();
 $product=$this->getTableRow();
 ?>

<?php foreach ($attributes as $attribute): ?>

    <?php if($attribute->inputType=='select'): ?>
         <?php echo $attribute->name.":"; ?>
    	<select class="form-control col-8" name="productAtt[<?php echo $attribute->code; ?>]" >
    		<option disabled><?php echo $attribute->name ;?></option>		
    		<?php foreach($attribute->getOptions()->getData() as $option): ?>
                <option value="<?php echo $option->optionId; ?>" <?php $code=$attribute->code; if($option->optionId==$product->$code){ echo 'selected'; } ?> ><?php echo $option->name; ?></option>
            <?php endforeach; ?>	

    	</select><br>

    <?php elseif($attribute->inputType=='textarea'):  ?> 
    
          <input class="form-control col-8" type="text" value="<?php $code=$attribute->code; echo $product->$code ;?>" placeholder="<?php echo $attribute->name ;?>" name="productAtt[<?php echo $attribute->code; ?>]"><br><br>
    
    <?php elseif($attribute->inputType=='multi'): ?> 

           <select class='form-control col-8' name="productAtt[<?php echo $attribute->code; ?>][]" multiple > 
    		<option disabled><?php echo $attribute->name ;?></option>
    		<?php foreach($attribute->getOptions()->getData() as $option): ?>
                <option value="<?php echo $option->optionId; ?>" <?php $co=$attribute->code; if(in_array($option->optionId,explode(',', $product->$co))) { echo "selected" ; }?> ><?php echo $option->name; ?></option>
            <?php endforeach; ?>	

    	</select><br><br>    	

    <?php elseif($attribute->inputType=='radio'): ?>

        <?php foreach ($attribute->getOptions()->getData() as $option):?>
            <?php echo $option->name ?>
        	<input  type="radio" value="<?php echo $option->optionId ;?>"  name="productAtt[<?php echo $attribute->code; ?>]" <?php $code=$attribute->code; if($option->optionId == $product->$code) {echo 'checked' ; } ?> >
        <?php endforeach; ?>	
        <br><br>
    <?php elseif($attribute->inputType=='checkbox'): ?>ch
         <?php echo $attribute->name.":"; ?>
        <?php foreach ($attribute->getOptions()->getData() as $option):?>
             <?php echo $option->name; ?>
        	<input  type="checkbox" <?php $co=$attribute->code; if(in_array($option->optionId,explode(',', $product->$co))) { echo "checked" ; } ?> value="<?php echo $option->optionId ;?>" name="productAtt[<?php echo $attribute->code; ?>][]">
        <?php endforeach; ?><br><br>	
        
    <?php endif; ?>
    
<?php endforeach; ?>	
  <br><br>
  <input type="submit" name="Update" value="Update" class="btn btn-secondary"> 

</form>

 