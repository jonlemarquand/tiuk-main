<?php
/**
 * @file
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $picture: The authors picture of the node output from
 *   theme_user_picture().
 * - $date: Formatted creation date (use $created to reformat with
 *   format_date()).
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $submitted: themed submission information output from
 *   theme_node_submitted().
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $teaser: Flag for the teaser state.
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 */
?>
<?php
$img_url = $node->field_featured_image['und'][0]['uri'];
$style='slider_1920x';
$categories='';
$featureTemplate=false;
if(isset($node->field_category_term['und'][0])){
    $categories=l($node->field_category_term['und'][0]['taxonomy_term']->name, 'taxonomy/term/'.$node->field_category_term['und'][0]['tid'], array('attributes'=>array('class'=>array('newslink'))));
    //print $node->field_category_term['und'][0]['taxonomy_term']->tid;
    if($node->field_category_term['und'][0]['taxonomy_term']->tid==38){
        $featureTemplate=true;
    }
}
if($featureTemplate){
?>
<div class="featurenav">
    <a class="featnavlink" href="#S1">1</a>
    <?php foreach($node->field_feature_content['und'] as $ky=>$feature){?>
    <a class="featnavlink" href="#S<?php print ($ky+2);?>"><?php print ($ky+2);?></a>
    <?php }?>
    
</div>
<div class="featurehead" id="S1" style="background-image: linear-gradient(0deg, #000, transparent 70%), url(<?php print image_style_url($style, $img_url);?>)">
    <div class="container">
      <div class="newsheadblox">
        <div class="sectioncall"><?php print $categories;?> <?php print date('dS M Y',$node->created);?></div>
        <div class="tinysplit whitets"></div>
        <h1 class="headline"><?php print $title;?></h1>
          <div class="tagrow">
            <?php if (isset($node->field_tags['und'][0])){
                        foreach($node->field_tags['und'] as $term){        
                            //print_r($term);
                            print l($term['taxonomy_term']->name.'/', 'taxonomy/term/'.$term['tid'], array('attributes'=>array('class'=>array('tag','w-button'))));
            ?>
                        
            <?php }}?>
            </div>
          <div class="tinysplit whitets"></div>
        <div><em>share:</em></div>
        <div class="sharebox"><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/fbs.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/tws.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/in2.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/tms.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/res.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/ems.png"></a></div>
        <a class="start w-inline-block" href="#S2">
          <div class="featlink">Start</div><img src="/sites/all/themes/transparency_main/images/Arrow_1.png" width="30"></a>
      </div>
    </div>
  </div>
    <?php 
   // print_r($node->field_feature_content);
    $items = field_get_items('node', $node, 'field_feature_content');
   
    
    foreach ($items as $ky=>$item) {
        $fc = field_collection_field_get_entity($item);
        $fcCover='';
        $fcbody='';
        $fcStyle='';
        $fcClass='';
        if(isset($fc->field_body['und'])){
            $fcbody='<div class="_600pxwidth">'.$fc->field_body['und'][0]['value'].'</div>';
        }
        if(isset($fc->field_title['und'])){
            $fcbody='<div class="bigimagerow w-row">
                      <div class="w-col w-col-6">
                        <div class="bigimagediv">
                          <div>'.$fc->field_title['und'][0]['value'].'</div>
                        </div>
                      </div>
                      <div class="w-col w-col-6"></div>
                    </div>';
        }
        if(isset($fc->field_style['und'])){
            if($fc->field_style['und'][0]['value']=='black'){
               $fcClass='black-statement'; 
            }
            if($fc->field_style['und'][0]['value']=='white'){
               $fcClass='whitesection'; 
            }
        }
        if(isset($fc->field_cover['und'])){
            $fcImg_url = $fc->field_cover['und'][0]['uri'];
            $fcClass.=' big-image-section';
            $fcStyle='background-image: linear-gradient(0deg, #000, transparent 70%), url('.image_style_url($style, $fcImg_url).')';
            //$fcCover=$fc->field_cover['und'][0]['value'];
        }

        //print_r($fc);
?>

    <div class="<?php print $fcClass;?>" style="<?php print $fcStyle;?>" id="S<?php print ($ky+2);?>">
        <?php print $fcbody;?>
      </div>
    <?php }?>

  
<?php }else{?>
<div class="_2 newsheader" style="background-image: linear-gradient(90deg, rgba(255, 44, 120, .7), rgba(8, 118, 209, .7)), url('<?php print image_style_url($style, $img_url) ?>')">
    <div class="container">
      <div class="newsheadblox">
        <div class="sectioncall"><?php print $categories;?> <?php print date('dS M Y',$node->created);?></div>
        <div class="tinysplit whitets"></div>
        <h1 class="headline"><?php print $title;?></h1>
        <div class="tagrow">
            <?php if (isset($node->field_tags['und'][0])){
                        foreach($node->field_tags['und'] as $term){        
                            //print_r($term);
                            print l($term['taxonomy_term']->name.'/', 'taxonomy/term/'.$term['tid'], array('attributes'=>array('class'=>array('tag','w-button'))));
            ?>
                        
            <?php }}?>
            </div>
        <div class="tinysplit whitets"></div>
        <div><em>share:</em></div>
        <div class="sharebox"><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/fbs.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/tws.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/in2.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/tms.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/res.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/ems.png"></a></div>
      </div>
    </div>
  </div>

<?php
$block = block_load('block', '4');
$outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
print render($outBlock);

$blockMediaContact = block_load('block', '10');
$outBlockMC=_block_get_renderable_array(_block_render_blocks(array($blockMediaContact)));

?>

<div class="pagebody">
    <div class="container">
      <div class="contentrow flip w-row">
        <div class="bipcol w-col w-col-3 w-col-medium-3">
          <div class="sidemenu" data-ix="revealmenu">
              <?php  
              
              print render($content['field_author']);
              print '<div class="mediacontact">'.render($outBlockMC).'</div>';
              if(isset($node->field_blocks['und'][0])){
                foreach($node->field_blocks['und'] as $ky=>$field_blocks){ ?>
                    <div class="mediacontact">
                      <?php print $field_blocks['value'];?>
                    </div>
              <?php }}?>
           </div>
           
           
          <h3>Related Publication</h3>
              <?php  foreach($node->field_resources['und'] as $ky=>$field_blocks){ 
                            $title=$field_blocks['entity']->title;
                            $body=$field_blocks['entity']->body['und'][0]['value'];
                            $url=file_create_url($field_blocks['entity']->field_pdf['und'][0]['uri']);
                            $img_url = $field_blocks['entity']->field_cover['und'][0]['uri'];  // 
                            $style = 'resources';                            
              ?>
          <div class="teaserResources w-inline-block">
          <a class="link-block slidelink w-inline-block" href="<?php print $url;?>">
            <div class="blogbox rep">
              <h3 class="heading"><?php print $title;?></h3>
              <div class="blogboxtag">Publication</div><img class="reportimage" src="<?php print image_style_url($style, $img_url) ?>"></div>
              <div class="blogboxdesc reportdesc">
              <div class="field field-name-body field-type-text-with-summary field-label-hidden">
              <?php print render($body);?>
              </div>
              <div class="blogbutton">Read More</div>
            </div>
          </a>
          </div>
              <?php }
            ?>
        </div>
        <div class="w-col w-col-9 w-col-medium-9">
          <div class="rich-guide w-richtext">
            <?php print render($content['body']);?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }?>