<?php
echo "<pre>";
$data=$this->getCategoryGroup();
?>

<button type="submit" class='btn btn-primary' id="submin" name="submit" onclick="dataUpload(this)" >Update</button>

<dir>
	<table class="table table-striped" border="1">
		<thead class="bg-dark text-white" >
			<tr>
				<th>GroupId</th>
				<th>GroupName</th>
				<th>ProductPrice</th>
				<th>GroupPrice</th>
			</tr>
		</thead>

		<?php foreach ($data->getData() as $key => $value){ ?>      		
              <?php  if($value ->entityId){
              	         $variable="Exist";
              	      }else{
              	      	 $variable="New";
              	      } ?>

     		<tr>
 				<td><?php echo $value->groupId ;?></td>
				<td><?php echo $value->name ;?></td>
				<td><?php echo $value->price ;?></td>
				<td><input type="text" name='groupPrice[<?php echo $variable ;?>][<?php echo $value->groupId ;?>]' value="<?php echo $value->groupprice;?>"></td>
			</tr>
	 	<?php } ?>	
	</table>
</dir>
</form>

<script type="text/javascript">
	
   function dataUpload(button)
   {
      var form=$(button).closest('form');

      form.attr('action','<?php echo $this->getUrl('save','admin\product\\groupPrice',null,true) ;?>');
   }

</script>