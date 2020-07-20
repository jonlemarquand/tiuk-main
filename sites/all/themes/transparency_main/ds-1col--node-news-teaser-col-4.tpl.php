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
if(isset($node->field_author['und'][0])){
    $author=node_load($node->field_author['und'][0]['target_id']);
    //print_r($node->field_author);
    //$user=user_load($node->uid);
    $username=$author->title;
}

$newTitle = call_user_func(function($phrase, $max_chars) {
  $wordCounts = strlen($phrase);
  if($wordCounts > 80) {
    $shortTitle = substr($phrase, 0, 80);
    $phrase_array = explode(' ',$shortTitle);
    $phrase = implode(' ',array_slice($phrase_array, 0, count($phrase_array) - 1)).'...';
  }
  return $phrase;
}, $title, 80);

$col=4;
$img=image_style_url($style, $img_url);
//$style="background-image: url('/sites/all/themes/transparency_main/images/tri.png'), linear-gradient(90deg, rgba(124, 22, 58, .8), rgba(0, 159, 227, .8)), url('".$img."')";

$style="background-image: url('/sites/all/themes/transparency_main/images/tri.png'), url('".$img."')";

if($categories == "About TI UK"){
?>
<div class="w-col w-col-<?php print $col;?>">
  <a class="_10pad link-block w-inline-block" href="<?php print $node_url;?>">
    <div class="bbd blogbox grad" style="<?php print $style;?>" ></div>
    <div class="blogboxdesc">
    <div class="blogboxtag wbg">
          Read More About:
        </div>
      <h3><?php print $newTitle;?></h3>
    </div>
  </a>
</div>
<?php }else{?>
<div class="w-col w-col-<?php print $col;?>">
  <a class="_10pad link-block w-inline-block" href="<?php print $node_url;?>">
    <div class="bbd blogbox grad" style="<?php print $style;?>" ></div>
    <div class="blogboxdesc">
      <div class="blogboxtag wbg">
          <?php print $username;?> / <?php print date('dS M Y',$node->created);?>
        </div>
      <h3><?php print $newTitle;?></h3>
    </div>
  </a>
</div>
<?php }?>