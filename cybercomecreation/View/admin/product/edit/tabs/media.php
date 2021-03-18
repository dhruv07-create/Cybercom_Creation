<?php

$collection=$this->getMedia();

?>

<table border="2" class='form-group table table-striped'  >
	 
	 <tr>
	 	<td colspan="7" class='bg-dark text-white' >Media</td>
	 </tr>
	 <tr>
	 	<td>Image</td>
	 	<td>Lable</td>
	 	<td>Small</td>
	 	<td>Thumb</td>
	 	<td>Base</td>
	 	<td>Gallery</td>
	 	<td>Remove</td>
	 </tr>

	
    
       <input type="submit" value="Update" class="btn btn-success" onclick="updateGrid(this);" name="update">&nbsp;&nbsp;
       <input type="submit" value="Delete" class="btn btn-danger" onclick="deleteImg(this)" name="Delete">
        
 <?php foreach ($collection->getData() as $key => $value) {?>

     <tr>
	 	<td><img src="<?php echo $value->image ; ?>" height='100px' width='100px' ></td>
	 	<td><input type="text" value="<?php echo $value->lable ;?>" name="image[lable][<?php echo $value->imgId ;?>]"></td>
	 	<td><input type="radio" value="<?php echo $value->imgId ?>" <?php if($value->small=='yes'){echo 'checked';} ?>  name="image[small]"></td>
	 	<td><input type="radio" value="<?php echo $value->imgId ?>" <?php if($value->thumb=='yes'){echo 'checked';} ?> name="image[thumb]"></td>
	 	<td><input type="radio" value="<?php echo $value->imgId ?>" <?php if($value->base=='yes'){echo 'checked';} ?> name="image[base]"></td>
	 	<td><input type="checkbox" value="<?php echo $value->imgId ?>" <?php if($value->gallery=='yes'){echo 'checked';} ?> name="image[gallery][<?php echo $value->imgId ;?>]"></td>
	 	<td><input type="checkbox" value="<?php echo $value->imgId ?>" name="remove[]"></td>

	 </tr>     
  <?php } ?>

</table>
<br><br>
	
	<input type="file" name="image">

	<input type="submit" onclick="imageUpload(this)" value="update" class=" btn btn-success" name="s" >


</form>       

<script type="text/javascript">
	
  function imageUpload(button)
  {
  	
  	  var form =$(button).closest('form');

      form.attr('action',"<?php echo $this->getUrl('saveImage','admin\product\\media',null,true) ;?>")
  	 
  }
  function updateGrid(button)
  {

  	 var form=$(button).closest('form');

  	 form.attr('action',"<?php echo $this->getUrl('saveGrid','admin\product\\media',null,true) ;?>")
  }

  function deleteImg(button)
  {

  	var form=$(button).closest('form');

  	 form.attr('action',"<?php echo $this->getUrl('deleteMedia','admin\product\\media',null,true) ;?>")
  }


</script>