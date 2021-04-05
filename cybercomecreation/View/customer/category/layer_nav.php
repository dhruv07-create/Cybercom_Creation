<?php
 $categorys=$this->getCategoryChildren();
 $attributes=$this->getAttributes();
 $filter=\Mage::getModel('Model\Customer\FilterFront')->getFilters();

?>

       
<form action="<?php echo $this->getUrl('filter','product',null,true) ; ?>" method="POST">
<div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <?php if($categorys): ?>
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                <?php $co=0; ?>
               <?php foreach($categorys->getData() as $key =>$category):?> 
                <li><input type="checkbox" value="<?php echo $category->categoryId ; ?>" <?php if(isset($filter['category']) && is_array($filter['category'])){ if(in_array($category->categoryId,$filter['category'])){ echo 'checked';}} ?> name="category[category][]"> <?php echo $category->name; ?></li>
               <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
            <!-- single sidebar -->
             <?php if($attributes->getData()): ?>
              <div class="aa-sidebar-widget">
            <?php  foreach ($attributes->getData() as $key => $attribute):?>
                <h3><?php echo $attribute->name; ?></h3>
                <ul class="aa-catg-nav">
                 <?php foreach($attribute->getOptions()->getData() as $key =>$Option):?> 
                  <li><input type="checkbox" <?php $code=$attribute->code; if(isset($filter['attribute']) && is_array($filter['attribute']) && isset($filter['attribute']["{$attribute->code}"]) && is_array($filter['attribute']["{$attribute->code}"]) && in_array($Option->optionId,$filter['attribute']["{$attribute->code}"])){ echo 'checked';} ?> value="<?php echo $Option->optionId ; ?>" name="category[attribute][<?php echo $attribute->code ; ?>][]"> <?php echo $Option->name; ?></li>
                 <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>    
              </div>
          <?php endif; ?>                
     <input type="submit" name="s" class='btn btn-primary' >
            </div>
          </aside>
        </div>
      </div>
    </div>
  </form>
</section>











 