<?php

/**
 * @file
 * Display Suite 1 column template.
 */
?>
<?php
$categories='';
if(isset($node->field_category_term['und'][0])){
    $term=taxonomy_term_load($node->field_category_term['und'][0]['tid']);
    $categories=$term->name;
}
$user=user_load($node->uid);
$username=$user->name;

?>



<a class="link-block w-inline-block" href="<?php print $node_url;?>">
  <div class="latestbox">
    <div class="blogboxtag"><?php print $categories;?> / <?php print date('dS M Y',$node->created);?></div>
    <h3><?php print $title;?></h3>
  </div>
</a>