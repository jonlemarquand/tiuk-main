<?php

/**
 * @file
 * Display Suite 1 column template.
 */
?>
<?php
if(isset($node->field_featured_image['und'][0]['uri'])){
   $img_url = $node->field_featured_image['und'][0]['uri'];
   $style='search'; 
    $col=9;
}else{
    $col=12;
}

?>
<<?php print $ds_content_wrapper; print $layout_attributes; ?> class="ds-1col <?php print $classes;?> clearfix">
    <div class="resultblock">
            <div class="w-row">
                <?php if(isset($node->field_featured_image['und'][0]['uri'])){?>
              <div class="w-col w-col-3 w-col-small-3">
                  
                  
                  <img class="image" src="<?php print image_style_url($style, $img_url) ?>">
                </div>
              <?php }?>
              <div class="w-col w-col-<?php print $col;?> w-col-small-<?php print $col;?>">
                <div>
                    <?php if (isset($node->field_tags['und'][0])){
                        foreach($node->field_tags['und'] as $term){        
                            //print_r($term);
                            print l($term['taxonomy_term']->name.'/', 'taxonomy/term/'.$term['tid'], array('attributes'=>array('class'=>array('tag','w-button'))));
                        ?>

                        <?php }}?>
                    
                    
                  </div>
                  <a class="recommendlink" href="<?php print $node_url;?>"><?php print $node->title;?></a>
                <div class="italics"><?php print date('d M Y',$node->created);?></div>
                <div><?php print $snippet; ?></div>
                    <?php print $excerpt; ?>
              </div>
            </div>
          </div>
</<?php print $ds_content_wrapper ?>>



