<?php

/**
 * @file
 * Display Suite 1 column template.
 */
?>
<?php
$img_url = $node->field_featured_image['und'][0]['uri'];
$style='news_thumb';

$categories='';
if(isset($node->field_category_term['und'][0])){
    $term=taxonomy_term_load($node->field_category_term['und'][0]['tid']);
    $categories=$term->name;
}
$user=user_load($node->uid);
$username=$user->name;

?>


<div class="w-col w-col-3 w-col-small-6">
    <a class="link-block w-inline-block" href="<?php print $node_url;?>">
      <div class="bbf blogbox" style="background-image: url('/sites/all/themes/transparency_main/images/tri.png'), linear-gradient(90deg, rgba(0, 159, 227, .8), rgba(82, 38, 177, .8)), url('<?php print image_style_url($style, $img_url) ?>')">
        <h3 class="cardhead"><?php print $title;?></h3>
        <div class="blogboxtag">EVENT <?php print date('l d M',strtotime($node->field_date['und'][0]['value']));?></div>
      </div>
      <div class="blogboxdesc">
        <div><?php print $node->field_location['und'][0]['value'];?>,<br>
            <?php print date('l d M',strtotime($node->field_date['und'][0]['value']))?>,<br>
            <?php print date('H:i',strtotime($node->field_date['und'][0]['value']));?> – <?php print date('H:i',strtotime($node->field_date['und'][0]['value2']));?></div>
        <div class="blogbutton">Read More</div>
      </div>
    </a>
  </div>