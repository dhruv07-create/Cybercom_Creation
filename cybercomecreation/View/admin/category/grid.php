<?php

   $data=$this->getCategorys();
   $ob=\Mage::getModel('Model\Category');
   $status=$ob->getStatusOption();
     
?>
<?php 
 $pager = $this->getPager(); 
 ?>



  <content>

   <div style="margin-top: 10px;">
    
    <h5 style="float: left;" >Category</h5><br>
    <hr><br>
    <a  href="<?php echo $this->getUrl('form'); ?>" style="float: right;" ><button style="border:0px" class="btn btn-primary">AddCategory</button></a><br><br>
    
   <table  border="1" cellspacing="0" class='table table-striped' >
   	
    <thead class='thead-dark' >  
        <tr>

     <th>Id</th>
     <th>Name</th>
     <th>Featured</th>
     <th>Status</th>
     <th>Description</th>
     <th>pathId</th>
     <th>CreatedDate</th>
     <th>Image</th>
     <th>Change</th> 
       </tr>
   
   </thead>
    
    <?php

      foreach ($data->getData() as $key=>$value) {
    ?>
    
    <tr>

      <td><?php echo $value->categoryId;?></td>
      <td><?php echo $this->getName($value);?></td>
      <td><?php echo $value->featured; ?></td>
      <td><?php echo $status[$value->status];?></td>
      <td><?php echo $value->description;?></td>
      <td><?php echo $value->pathId;?></td>
      <td><?php echo $value->createddate;?></td>
      <td><img src="<?php echo $value->image;?>"></td>
      <td>
      	 
      	<a href="<?php echo $this->getUrl('edit',null,['id'=>$value->categoryId]); ?>"><button class="btn btn-primary" >Edit</button></a> 
      	<a href="<?php  echo $this->getUrl('delete',null,['id'=>$value->categoryId]);  ?>"><button class="btn btn-danger" >Delete.</button></a> 

      </td>

    
    </tr>

    <?php
 
     }
  
    ?>

   </table>

     </div>

</div>

 </content>
<?php if($pager->getStart()): ?>
<a class="btn btn-secondary" href="<?php echo $this->getUrl(null,null,['page'=>$pager->getStart()],true); ?>" >START</a>
<?php endif; ?> 
<?php if($pager->getPrevious()): ?>
<a class="btn btn-secondary"  href="<?php echo $this->getUrl(null,null,['page'=>$pager->getPrevious()],true); ?>">PREVIOUS</a>
<?php endif; ?>
<?php if($pager->getNext()): ?>
<a class="btn btn-secondary" href="<?php echo $this->getUrl(null,null,['page'=>$pager->getNext()],true); ?>">NEXT</a>
<?php endif; ?>
<?php if($pager->getEnd()): ?>
<a class="btn btn-secondary" href="<?php echo $this->getUrl(null,null,['page'=>$pager->getEnd()],true); ?>">END</a>
<?php endif; ?>

</body>
</html>