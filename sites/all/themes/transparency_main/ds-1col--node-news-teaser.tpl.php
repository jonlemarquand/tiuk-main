<?php

/**
 * @file
 * Display Suite 1 column template.
 */
?>
<?php
$img_url = $node->field_featured_image['und'][0]['uri'];
$style='news_thumb';
$img=image_style_url($style, $img_url);
//$style="background-image: url('/sites/all/themes/transparency_main/images/tri.png'), linear-gradient(90deg, rgba(124, 22, 58, .8), rgba(0, 159, 227, .8)), url('".$img."')";

$style="background-image: url('/sites/all/themes/transparency_main/images/tri.png'), url('".$img."')";
$styleLarge="background: linear-gradient(0deg,rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url('".$img."'); background-size: cover; background-position: center;";

$categories='';
$featureTemplate=false;
if(isset($node->field_category_term['und'][0])){
    $term=taxonomy_term_load($node->field_category_term['und'][0]['tid']);
    $categories=$term->name;
    if($node->field_category_term['und'][0]['tid']==38){
        $featureTemplate=true;
        $style="background-image: url('".$img."')";

    }
}
$user=user_load($node->uid);
$username=$user->name;
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

$col=3;
if(arg(0)=='news'){
    //$col=4;
}
if($featureTemplate){
?>
<div class="w-col w-col-6 w-col-medium-6 w-col-small-small-stack" >
      <div >
        <a class="link-block w-inline-block" href="<?php print $node_url;?>">
          <div class="blogbox large test"  style="<?php print $styleLarge;?>">
            <div class="blogboxtag">FEATURE</div>
            <h3 class="herohead"><?php print $title;?></h3>
            <div class="blogboxtag"><?php print $username;?> / <?php print date('dS M Y',$node->created);?> / <?php print $categories;?></div>
            <div><?php print render($content['body']);?></div>
          </div>
        </a>
      </div>
    </div>
<?php }else{?>
<div class="w-col w-col-<?php print $col;?>">
  <a class="_10pad link-block w-inline-block" href="<?php print $node_url;?>">
    <div class="bbd blogbox grad" style="<?php print $style;?>" ></div>
    <div class="blogboxdesc">
      <div class="blogboxtag wbg">
          <?php print $username;?> / <?php print date('dS M Y',$node->created);?> / <?php print $categories;?>
        </div>
      <h3><?php print $newTitle;?></h3>
    </div>
  </a>
</div>
<?php }?>

