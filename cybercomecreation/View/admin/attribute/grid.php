<?php
 
 $data=$this->getAttributes();

?>


<dir>

<h5 style='float: right;'>Attribute</h5><br>
<hr>

<a href="<?php echo $this->getUrl('form',null,['m'=>'a']); ?>" style='float: right;' class='btn btn-primary' >Add_Attribute</a>
<br>
<table class="table tabel-striped" border="1" >
	<tbody>
		<thead class='bg-dark text-white' > 
			<tr>
				<th>AttributeId</th>
				<th>EntityTypeId</th>
				<th>Name</th>
				<th>Code</th>
				<th>InputType</th>
				<th>BackendType</th>
				<th>SortOrder</th>
				<th>Action</th>
			</tr>
		</thead>	
        <?php foreach ($data->getData() as $key => $attribute): ?>
			<tr>
				<td><?php echo $attribute->attributeId ;?></td>
				<td><?php echo $attribute->entityTypeId ;?></td>
				<td><?php echo $attribute->name ;?></td>
				<td><?php echo $attribute->code ;?></td>
				<td><?php echo $attribute->inputType ;?></td>
				<td><?php echo $attribute->backendType ;?></td>
				<td><?php echo $attribute->sortOrder ;?></td>
				<td>
					
					<a href="<?php echo $this->getUrl('edit',null,['id'=>$attribute->attributeId,'m'=>'u']); ?>"><button class="btn btn-primary" >Edit</button></a> 
			      	<a href="<?php  echo $this->getUrl('delete',null,['id'=>$attribute->attributeId]);  ?>"><button class="btn btn-danger" >Delete.</button></a> 

				</td>
			</tr>
        <?php endforeach; ?> 	

	</tbody>
</table>
</dir>