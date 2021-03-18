<?php

$inputTypes=$this->getInputTypeOption();
$backEndTypes=$this->getBackendTypeOption();
$attribute=$this->getAttribute();
?>

Name:
<input  value="<?php echo $attribute->name ;?>" type="text" name="attribute[name]"><br><br>
Code:
<input  value="<?php echo $attribute->code ;?>" type="text" name='attribute[code]'><br><br>
InputeType:
<select name='attribute[inputType]'>
	<?php  foreach($inputTypes as $key => $value):?>
<option value="<?php  echo $key;?>" <?php if($key==$attribute->inputType){ echo 'selected';} ?> ><?php  echo $value;?></option>
	<?php  endforeach;?>	
</select><br><br>
BackEndType:
<select name='attribute[backendType]'>
	<?php  foreach($backEndTypes as $key => $value):?>
<option value="<?php  echo $key;?>" <?php if($key==$attribute->backendType){ echo 'selected';} ?> ><?php  echo $value;?></option>
	<?php  endforeach;?>	
</select><br><br>
ShortOrder:
<input  value="<?php echo $attribute->sortOrder ;?>" type="number"  name="attribute[sortOrder]"><br><br>

<input onclick="save(this)" type="submit" name="submit">
</form>

<script type="text/javascript">
	
  function save(button)
  {
  	  var form=$(button).closest('form');
      form.attr('action','<?php echo $this->getUrl('save',null,['id'=>$attribute->attributeId],true) ;?>');
  }

</script>