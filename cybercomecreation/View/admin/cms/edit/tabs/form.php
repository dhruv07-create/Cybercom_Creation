 <?php
 
 $cms=$this->getCms();

 ?>

 <div class="container my-2">
        <h2>Content</h2>
        <form action="<?php echo $this->getUrl('save',null,['id'=>$cms->pageId])  ; ?>" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Title</span>
                <input type="text" value="<?php echo $cms->title ;?>" class="form-control" placeholder="cms Name" name="cms[title]">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Indentifire</span>
                <input type="text" class="form-control" placeholder="cms Name" value="<?php echo $cms->identifier ;?>" name="cms[identifier]">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">content</span>
                <textarea id="editor" name="cms[content]" ><?php echo $cms->content ;?></textarea>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select class="form-select" id="inputGroupSelect01" name="cms[status]">
                    <option>select</option>
                    <option value="enabled" <?php if($cms->status=='enabled'){ echo 'selected';} ?> >Enable</option>
                    <option value="disabled" <?php if($cms->status=='disabled'){echo 'selected';} ?> >disable</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="save">
        </form>
    </div>

    <script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
    </script>
</body>

</html>