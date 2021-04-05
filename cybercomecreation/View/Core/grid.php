<?php

  $data=$this->getCollection();
  $columns=$this->getColumns();
  $actions=$this->getActions();
  $buttons=$this->getButtons();
  $pager=$this->getPager();

 ?>

<html>
  
  <form action='<?php echo $this->getUrl('filter');  ?>' method="post" >
<body>
   
  <content>
   <div style="margin-top: 10px;">
       <h5 style="float: left;" ><?php echo $this->getTitle(); ?></h5><br>
       <hr>
       <button type="submit" style="float: right;" class="btn btn-success" >Filter</button>
       <?php 
       if($buttons){        
       foreach($buttons as $button): ?>
       <a  href="<?php echo $this->getButtonUrl($button['method']); ?>"  style="float: right;" <?php echo $button['class'];  ?> ><?php echo $button['lable'] ; ?></a>
       <?php endforeach; 
          }
       ?>
       <br><br>

   <table  border="1" cellspacing="0" class='table table-striped'>

      <thead class='thead-dark ' >
      <tr>
    <?php 
     if($columns){
    foreach ($columns as $key => $column):?>
     <th align="center" ><?php echo $column['lable']; ?></th>    
    <?php endforeach; 
        }
    ?>  
     <?php if($actions):?>
     <th>action</th>
     <?php endif; ?>
    </tr>
    </thead>
    
    <tr>
    <?php 
     if($columns){
    foreach ($columns as $key => $column): 
      if($column['type']!='image'): ?>
     <th><input type="text" name="filter[<?php echo $column['type'];?>][<?php echo $column['field']; ?>]" value="<?php echo $this->getFilter()->getFilterValue($column['type'],$column['field']); ?>" ></th>
    <?php else:?>
     <th></th>
    <?php endif; endforeach; 
        }
    ?>  
    <td></td>
    <?php

       foreach ($data->getData() as $value) { ?>
        
    <tr>

      <?php 
      if($columns){
      foreach($columns as $key=>$column): 
        if($column['type']=='image'):
      ?>
      <td><img src="<?php echo $this->getFieldValue($value,$column['field']);?>"></td>
      <?php else: ?>
      <td><?php echo $this->getFieldValue($value,$column['field']);?></td>
     <?php endif;?>
     <?php endforeach; 
      } 
     ?>
    
    <?php if($actions){ ?> 
     <td>
     <?php foreach($actions as $action): ?>
      
    <?php if(@$action['ajex']): ?>

      <a href="javascript:void(0)" onclick="<?php echo $this->getMethodUrl($value,$action['method']);?>" <?php echo $action['class']; ?> ><?php echo $action['lable'] ;?></a>

      <?php else: ?>
      <a href="<?php echo $this->getMethodUrl($value,$action['method']);?>" <?php echo $action['class']; ?> ><?php echo $action['lable'] ;?></a>
   
    <?php endif; ?>
     
     <?php endforeach;?>
    </td>

  <?php }?>
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
<a class="btn btn-secondary" href="<?php echo $this->getUrl(null,null,['page'=>$pager->getEnd()],true); ?>" >END</a>
<?php endif; ?>


</body>
 </form>
</html>