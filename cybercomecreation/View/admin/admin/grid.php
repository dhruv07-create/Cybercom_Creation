<?php

  $data=$this->getCollection();
  $columns=$this->getColumns();
  $actions=$this->getActions();
  $buttons=$this->getButtons();


 ?>

<html>
  
<body>
   
  <content>
  
   <div style="margin-top: 10px;">
       <h5 style="float: left;" ><?php echo $this->getTitle(); ?></h5><br>
       <hr>
       <?php 
       if($buttons){        
       foreach($buttons as $button): ?>
       <a  href="<?php echo $this->getButtonUrl($button['method']); ?>"  style="float: right;" ><button style="border:0px" <?php echo $button['class']; ?> ><?php echo $button['lable'] ; ?></button></a>
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
     <?php 
     foreach($actions as $action): ?>
      <a href="<?php echo $this->getMethodUrl($value,$action['method']);?>" <?php echo $action['class']; ?> ><?php echo $action['lable'] ;?></a>
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

</body>

</html>