<?php

  $category=$this->getCategory();

  $status=$this->getCategory()->getStatusOption();

  $categoryOption=$this->getCategoryOption();
  
?>



    ParentId:
    <select name="category[parentId]" > 
    <option value="0">Select</option>

    <?php foreach($categoryOption as $categoryId => $pathName): ?>
        
        if($category->categoryId != $categoryId){
       <option value="<?php echo $categoryId ; ?>" <?php if($category->parentId==$categoryId){ echo 'selected' ;} ?> ><?php echo $pathName; ?></option>
     }

     <?php endforeach; ?> 

   </select><br><br>
   Name:
   <input type="text" name="category[name]" value="<?php echo $category->name ;?>" ><br><br>
   Featured:
   <select name='category[featured]' >

      <?php foreach(['yes','no'] as $value): ?> 
       <option value="<?php echo $value ;?>" <?php if($value==$category->featured) { echo 'selected'; } ?> ><?php echo $value ;?></option>
      <?php endforeach; ?> 
   </select>

   <br><br>
   Status:

   <select name="category[status]">
    
    <option value="" >select</option>
    
     <?php foreach ($status as $key => $value) { ?> 

      <option value="<?php echo $key; ?>" <?php if($category->status == $key){ echo 'selected' ;  } ?> > <?php echo $value ; ?> </option> 

     <?php }?>

  </select>
   <br><br>
   Details:
   <input type="text" name="category[description]" value="<?php echo $category->description ;?>" ><br><br>

    <input type="file" name="image"><br><br>

   <input type="submit" name="s" class="btn btn-success" >
 </form>


