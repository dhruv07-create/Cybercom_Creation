<?php

$collection=$this->getCollection();

?>

<table border="2" class='form-group table table-striped'  >
	 
	 <tr>
	 	<td colspan="7" class='bg-dark text-white' >CategoryImage</td>
	 </tr>
	 <tr>
	 	<td>Image</td>
	 	<td>Icon</td>
	 	<td>Base</td>
	 	<td>Active</td>
	 	<td>Banner</td>
	 	<td>Remove</td>
	 </tr>

	
                                         
       <input type="submit" value="Update" class="btn btn-success" onclick="updateGrid(this);" name="update">&nbsp;&nbsp;
       <input type="submit" value="Delete" class="btn btn-danger" onclick="deleteImg(this)" name="Delete">
        
 <?php foreach ($collection->getData() as $key => $value) {?>

     <tr>
	 	<td><img src="<?php echo $value->image ; ?>" height='100px' width='100px' ></td>
	 	<td><input type="radio" value="<?php echo $value->imageId ?>" <?php if($value->icon=='y'){echo 'checked';} ?>  name="image[icon]"></td>
	 	<td><input type="radio" value="<?php echo $value->imageId ?>" <?php if($value->base=='y'){echo 'checked';} ?> name="image[base]"></td>
	 	<td><input type="checkbox" value="<?php echo $value->imageId ?>" <?php if($value->active=='y'){echo 'checked';} ?> name="image[active][<?php echo $value->imageId ;?>]"></td>
	 	<td><input type="checkbox" value="<?php echo $value->imageId ?>" <?php if($value->banner=='y'){echo 'checked';} ?> name="image[banner][<?php echo $value->imageId ;?>]"></td>
	 	<td><input type="checkbox" value="<?php echo $value->imageId ?>" name="remove[]"></td>

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

      form.attr('action',"<?php echo $this->getUrl('saveImage','admin\category\Image',null,true) ;?>")
  	 
  }
  function updateGrid(button)
  {

  	 var form=$(button).closest('form');

  	 form.attr('action',"<?php echo $this->getUrl('saveGrid','admin\category\image',null,true) ;?>")
  }

  function deleteImg(button)
  {

  	var form=$(button).closest('form');

  	 form.attr('action',"<?php echo $this->getUrl('deleteImage','admin\category\image',null,true) ;?>")
  }


</script>