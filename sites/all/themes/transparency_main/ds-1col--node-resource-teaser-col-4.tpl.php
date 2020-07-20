<?php

/**
 * @file
 * Display Suite 1 column template.
 */
?>
<?php
$url='#';
if(isset($node->field_pdf['und'][0])){
    $url=file_create_url($node->field_pdf['und'][0]['uri']);
}else if(isset($node->field_link['und'][0])){
    //print_r($node->field_link['und'][0]);
    $url=file_create_url($node->field_link['und'][0]['url']);
}
if(isset($node->field_cover['und'][0]['uri'])){
    $img_url = $node->field_cover['und'][0]['uri'];  // 
    $style = 'resources';
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

?>
<div class="w-col w-col-4">
<a class="_10pad link-block w-inline-block" href="<?php print $node_url?>">
    <div class="blogbox rep">
      <h3><?php print $newTitle;?></h3>
      <div class="blogboxtag">Publication</div>
        <?php if(isset($node->field_cover['und'][0])){?>
        <img class="reportimage" src="<?php print image_style_url($style, $img_url) ?>">
        <?php }?>
    </div>
    <div class="blogboxdesc reportdesc">
      <?php print render($content['body']);?>
      <div class="blogbutton">Read More</div>
    </div>
  </a>
</div>