<?php

$data=$this->getCmsData();

?>

<h5 style="float: left">CMS</h5><br>
<hr>

<a href="<?php echo $this->getUrl('form');?>" class="btn btn-primary" style='float: right;'>AddContent</a><br>

<div>
	<table class='table table-striped'>
		<thead class=" text-white bg-dark ">
			<tr>
				<th>PageId</th>
				<th>Identifier</th>
				<th>Tittle</th>
				<th>Content</th>
				<th>Status</th>
				<th>CreatedDate</th>
				<th>Operation</th>
			</tr>
		</thead>

      <?php foreach ($data->getData() as $key => $value) { ?>
      	
      	      <tr>
				<td><?php echo $value->pageId ;?></td>
				<td><?php echo $value->identifier ;?></td>
				<td><?php echo $value->title ;?></td>
				<td><?php echo $value->content ;?></td>
				<td><?php echo $value->status ;?></td>	
				<td><?php echo $value->createddate ;?></td>
				<td>
					
               <a href="<?php echo $this->getUrl('edit',null,['id'=>$value->pageId]) ;?>" class='btn btn-primary' >Edit</a>

               <a href="<?php echo $this->getUrl('delete',null,['id'=>$value->pageId]) ;?>" class='btn btn-danger' >Delete</a>

				</td>
             </tr>
       <?php } ?>


	</table>
</div>