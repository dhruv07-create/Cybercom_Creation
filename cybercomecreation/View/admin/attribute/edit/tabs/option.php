<?php

$options=$this->getOption();
?>

<div>
	<input value="Upload" type="submit" onclick="uploaddata(this)" class="btn btn-success" name="submin">
    <input onclick="addRow()" class="btn btn-success" value="Add" type="button" name="add" ><br>
   
	<table id="existingOption" >
		<tbody>
 
      <?php  foreach ($options->getData() as $key => $option): ?>
		  <tr>
			<td><input type="text" value="<?php echo $option->name ;?>" name='Exist[<?php echo $option->optionId; ?>][name]'></td>
			<td><input type="number" value="<?php echo $option->sortOrder ;?>" name='Exist[<?php echo $option->optionId; ?>][sortOrder]'></td>
			<td><input class="btn btn-danger" type="button" onclick="remove(this)" name="remove" value="Remove" ></td>
		   </tr>
	  <?php endforeach; ?>   
		</tbody>
	</table>
</div>
</form>


  <div style="display:none;" >
   <table id="newOption" >  
   	  <tbody>
	  <tr>
		<td><input type="text" name='New[name][]' ></td>
		<td><input type="number" name='New[sortOrder][]' ></td>
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
	form.attr('action','<?php echo $this->getUrl('save','admin\attribute\\option',null,true) ; ?>');
}

 function addRow()
 { 
	var newOption=document.getElementById('newOption');

 	var existingOption=document.getElementById('existingOption').children[0];
 	existingOption.prepend(newOption.children[0].children[0].cloneNode(true));

   
 }

</script>
 