<?php     
   $parent=$this->getParentCategorys();
?>


 <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="<?php echo $this->getUrl('view','home'); ?>">Home</a></li>
              <?php foreach ($parent->getData() as $parentCategory):?>
              
              <li><a href="<?php echo $this->getUrl('view','category',['id'=>$parentCategory->categoryId]); ?>"><?php echo $parentCategory->name; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
  
              <?php foreach ($this->getCategoryChildren($parentCategory)->getData() as $childCategory):?>
                     
                  <li><a href='<?php echo $this->getUrl('view','category',['id'=>$childCategory->categoryId ]); ?>'><?php echo $childCategory->name; ?></a></li>

              <?php endforeach;?>   
                
                </ul>
              </li>

              <?php endforeach;?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>