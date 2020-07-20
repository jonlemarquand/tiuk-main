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
};
if(isset($node->field_featured_image['und'][0]['uri'])){
  $back_url = $node->field_featured_image['und'][0]['uri']; //
  $back_style='slider_1920x';
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
<?php if($teaser){?>
    <div class="teaserResources w-col w-col-3 w-col-small-6">
        <a class="link-block padded w-inline-block" href="<?php print $node_url?>">
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

<?php }else{?>

    <div class="reporthead"  style="background-image: url('<?php print image_style_url($back_style, $back_url) ?>')">
    <div class="container">
      <div class="reportheadbox">
        <div class="sectioncall"><a href="/publications" class="pinklink">PUBLICATION/</a>&nbsp;<?php print date('M Y',$node->created);?></div>
        <div class="tinysplit"></div>
        <h1 class="headline"><?php print $title;?></h1>
                <div class="pubblurb">
        <?php if(isset($node->field_cover['und'][0])){?>
        <img class="pub-image" src="<?php print image_style_url($style, $img_url)?>">
        <?php }?>
        <?php print render($content['body']);?></div>
        <div class="tinysplit"></div>
        <div><em>share:</em></div>
        <div class="sharebox"><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/fbs.png"></a><a class="shareicon w-inline-block"
  href="https://twitter.com/intent/tweet?text=<?php print $title ?>&url=<?php $path ?>&via=TransparencyUK"><img src="/sites/all/themes/transparency_main/images/tws.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/in2.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/tms.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/res.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/ems.png"></a></div>
          
          <a class="loadmore pdf w-button" data-ix="downloadpop" href="<?php print $url?>">DOWNLOAD AS PDF</a>
        <?php //print render($content['field_pdf']);?>
        </div>
        
    </div>
  </div>
  <div class="pagebody">
    <div class="container">
      <div class="fixedcol w-row">
        <div class="bipcol w-col w-col-3 w-col-small-small-stack">
          <div class="sidemenufix w-hidden-small w-hidden-tiny">
            <h1 class="fshead headline"><?php print $title;?></h1>
              <?php
                $sPage=array();
                $sBody='';
                $num=1;
                if(isset($node->field_sub_page['und'][0])){
                    foreach($node->field_sub_page['und'] as $ky=>$field_page){ 
                        $sPage[$num]=node_load($field_page['target_id']);
                        $num++;
                    }
                }
                foreach($sPage as $ky=>$sNode){ 
                    ?>
                    <a class="bipbutton w-button" href="#<?php print $ky?>"><?php print $sNode->title;?><span class="smalltext"></span></a>
              <?php }?>
            <?php if(isset($node->field_resources_links['und'][0])){?>
              <a class="bipbutton w-button" href="#R">RESOURCES</a>
              <?php }?>
              </div>
        </div>
        <div class="w-col w-col-9 w-col-small-small-stack"></div>
      </div>
      <div class="contentrow w-row">
        <div class="bipcol w-col w-col-3 w-col-medium-3">
          <div class="sidemenu" data-ix="revealmenu">
               <?php foreach($sPage as $ky=>$sNode){ 
                    ?>
                    <a class="bipbutton w-button" href="#<?php print $ky?>"><?php print $sNode->title;?><span class="smalltext"></span></a>
              <?php }?>
              <?php if(isset($node->field_resources_links['und'][0])){?>
              <a class="bipbutton w-button" href="#R">RESOURCES</a>
              <?php }?>
            <div class="mediacontact">
              <?php
                $blockMediaContact = block_load('block', '10');
                $outBlockMC=_block_get_renderable_array(_block_render_blocks(array($blockMediaContact)));
                print render($outBlockMC);
            ?>
            </div>
          </div>
        </div>
        <div class="w-col w-col-9 w-col-medium-9">
            <?php foreach($sPage as $ky=>$sNode){ 
                    ?>
            <div class="reportcontainer">
              
            <div class="reportsection" id="<?php print $ky?>">
              <h3 class="reportsectionhead"><?php print $ky?>. <?php print $sNode->title;?></h3>
              <div class="rich-guide w-richtext" id="Active">
                <?php print $sNode->body['und'][0]['value'];?>
              </div>
            </div>
            <div class="expandsect" data-ix="revealsection"><img class="cross" height="20" src="/sites/all/themes/transparency_main/images/WhiteCross.png" width="20"></div>
          </div>
           
              <?php }?>
            
          
          <?php if(isset($node->field_resources_links['und'][0])){?>
          <div class="reportcontainer" id="R">
            <h3 class="reportsectionhead">Resources</h3>
          </div>
          <div class="readingrow w-row">
              
              <?php 
                $items = field_get_items('node', $node, 'field_resources_links');
                foreach ($items as $item) {
                 $fc = field_collection_field_get_entity($item);
                 // Do something.
                ?>
                    <div class="boxReosurce">
                        <div class="resourcehead"><?php print $fc->field_title['und'][0]['value'];?></div>
                        <?php foreach($fc->field_links['und'] as $lnk){?>
                                <a class="recommendlink" href="<?php print $lnk['url'];?>" target="_blank"><?php print $lnk['title'];?></a>
                        <?php }?>
                    </div>
                <?php }?>
            
          </div>
            <?php }?>
        </div>
      </div>
    </div>
  </div>
<?php }?>
