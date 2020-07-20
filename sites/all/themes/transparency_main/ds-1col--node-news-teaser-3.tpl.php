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

$categories='';
$featureTemplate=false;
if(isset($node->field_category_term['und'][0])){
    $term=taxonomy_term_load($node->field_category_term['und'][0]['tid']);
    $categories=$term->name;
    if($node->field_category_term['und'][0]['tid']==38){
        $featureTemplate=true;
        $style="background-image: linear-gradient(90deg, #005daa, rgba(0, 93, 170, 0)),url('".$img."')";

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

$col=3;
if(arg(0)=='news'){
    //$col=4;
}
?>

<div class="hero">
    <div class="herofloat">
      <div class="sectioncall">FEATURE:</div>
      <h3 class="herohead"><?php print $title;?></h3>
      <div class="blogboxtag"><?php print $username;?> / <?php print date('dS M Y',$node->created);?> / <?php print $categories;?></div>
      <div><?php print render($content['body']);?></div><a class="blogbutton w-button" href="<?php print $node_url;?>">Read more</a></div>
    <div class="w-row">
      <div class="herocol hleft w-col w-col-6 w-col-small-6 w-col-tiny-6"></div>
      <div class="herocol hright w-col w-col-6 w-col-small-6 w-col-tiny-6" style="<?php print $style;?>"></div>
    </div>
  </div>

