<?php

$configs=$this->getConfig();
?>

<div>
	<input value="Upload" type="submit" onclick="uploaddata(this)" class="btn btn-success" name="submin">
    <input onclick="addRow()" class="btn btn-success" value="Add" type="button" name="add" ><br>
   
	<table id="existingconfig" >
		<tbody>
 
      <?php  foreach ($configs->getData() as $key => $config): ?>
		  <tr>
			<td><input type="text" value="<?php echo $config->title ;?>" name='Exist[<?php echo $config->configId; ?>][title]'></td>
			<td><input type="text" value="<?php echo $config->code ;?>" name='Exist[<?php echo $config->configId; ?>][code]'></td>
			<td><input type="text" value="<?php echo $config->value ;?>" name='Exist[<?php echo $config->configId; ?>][value]'></td>
			<td><input class="btn btn-danger" type="button" onclick="remove(this)" name="remove" value="Remove" ></td>
		   </tr>
	  <?php endforeach; ?>   
		</tbody>
	</table>
</div>
</form>


  <div style="display:none;" >
   <table id="newconfig" >  
   	  <tbody>
	  <tr>
		<td><input type="text" name='New[title][]' ></td>
		<td><input type="text" name='New[code][]' ></td>
		<td><input type="text" name='New[value][]' ></td>
		<td><input class="btn btn-danger" type="button" onclick="remove(this)"  name="remove" value="Remove" ></td>
	   </tr>
	  </tbody> 
   </table>
  </div>	   

<script type="text/javascript">

 function remove(button)
 {
     var tr= $(button).closest('tr');
     tr.remove(); 
 }

function uploaddata(button)
{
	var form=$(button).closest('form');
	form.attr('action','<?php echo $this->getUrl('save','admin\config',null,true) ; ?>');
}

 function addRow()
 { 
	var newconfig=document.getElementById('newconfig');

 	var existingconfig=document.getElementById('existingconfig').children[0];
 	existingconfig.prepend(newconfig.children[0].children[0].cloneNode(true));

   
 }

</script>
 