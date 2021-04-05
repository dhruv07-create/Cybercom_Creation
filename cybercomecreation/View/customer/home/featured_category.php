<?php 
$feturedCategorys=$this->getFeaturedCategorys()->getData();
?>


<section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Featured-Category</a></li>
                                
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                      <?php foreach ($feturedCategorys as $key => $category):?>
                    <li>
                      <figure>
                        <a class="aa-product-img" href="<?php echo $this->getUrl('view','category',['id'=>$category->categoryId]); ?>"><img width="260px" src="<?php echo $category->getBase()->image ?>" alt="polo shirt img"></a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="<?php echo $this->getUrl('view','category',['id'=>$category->categoryId]); ?>"><?php echo $category->name ; ?></a></h4>
                          </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                    </li>
                     <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div>
          </section>
