 <ul class="nav nav-tabs aa-products-tab">
     <li class="active"><a href="#popular" data-toggle="tab">Brand</a></li>
       </ul>
<section id="aa-client-brand" style="background: white">
    <div class="container" style='background: white' >
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              <?php foreach ($this->getBrands()->getData() as $key => $brand) { ?>
                
              <li><a href="#"><img style="width: 100px;height: 100px" src="<?php echo $brand->image; ?>" alt="java img"></a></li> 
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>