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

?>
<div class="eventheader" style="background-image:linear-gradient(90deg, #0876d1, rgba(102, 51, 212, .59)), url('<?php print image_style_url($style, $img_url) ?>')">
    <div class="container">
      <div class="newsheadblox">
          
        <div class="eventhead w-row">
          <div class="eventleft w-col w-col-9">
            <div class="sectioncall"><a href="#" class="newslink">Event</a></div>
            <div class="tinysplit whitets"></div>
            <h1 class="headline"><?php print $title;?></h1>
            <div class="tinysplit whitets"></div>
            <div class="tagrow">
                <?php if (isset($node->field_tags['und'][0])){
                        foreach($node->field_tags['und'] as $term){        
                            //print_r($term);
                            print '<a href="events?field_tags_tid='.$term['tid'].'" class="tag w-button">'.$term['taxonomy_term']->name.'</a>';
                            //print l($term['taxonomy_term']->name.'/', 'taxonomy/term/'.$term['tid'], array('attributes'=>array('class'=>array('tag','w-button'))));
                    ?>
                        
                    <?php }}?>
              </div>
            <div><em>share:</em></div>
            <div class="sharebox">
              <a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/fbs.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/tws.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/in2.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/tms.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/res.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/ems.png"></a>
              </div>
          </div>
          <div class="column-2 w-col w-col-3">
            <div class="greyback">
              <div class="sectioncall">DATE AND TIME</div>
              <div class="evententry"><?php print date('D dS M Y',strtotime($node->field_date['und'][0]['value']));?><br><?php print date('H:i',strtotime($node->field_date['und'][0]['value']));?> – <?php print date('H:i',strtotime($node->field_date['und'][0]['value2']));?> BST</div>
              <div class="sectioncall">LOCATION</div>
              <div class="evententry"><?php print render($content['field_location']);?></div>
                <?php 
                    if(isset($node->field_link['und'][0])){
                        print l('REGISTER FOR EVENT', 'https://www.eventbrite.co.uk/e/doing-good-without-bribery-tickets-32891938674', array('attributes'=>array('class'=>array('submit-button','w-button'),'target'=>array('_blank'))));
                    }
               ?>
               
              </div>
          </div>
        </div>   
          
          
      </div>
    </div>
  </div>


<?php
$blockMediaContact = block_load('block', '10');
$outBlockMC=_block_get_renderable_array(_block_render_blocks(array($blockMediaContact)));

?>

<div class="pagebody">
    <div class="container">
      <div class="contentrow flip w-row">
        <div class="bipcol w-col w-col-3 w-col-medium-3">
          <div class="sidemenu" data-ix="revealmenu">
              <?php  
              print '<div class="mediacontact">'.render($outBlockMC).'</div>';
              if(isset($node->field_blocks['und'][0])){
              foreach($node->field_blocks['und'] as $ky=>$field_blocks){ ?>
                    <div class="mediacontact">
                      <?php print $field_blocks['value'];?>
                    </div>
              <?php }}?>
           </div>
            <?php   if(isset($node->field_resources['und'][0])){?>
           
          <h3>Related Publication</h3>
              <?php  foreach($node->field_resources['und'] as $ky=>$field_blocks){ 
                            $title=$field_blocks['entity']->title;
                            $body=$field_blocks['entity']->body['und'][0]['value'];
                            $url=file_create_url($field_blocks['entity']->field_pdf['und'][0]['uri']);
                            $img_url = $field_blocks['entity']->field_cover['und'][0]['uri'];  // 
                            $style = 'resources';
              ?>
          <a class="link-block slidelink w-inline-block" href="page.html">
            <div class="blogbox rep">
              <h3 class="heading"><?php print $title;?></h3>
              <div class="blogboxtag">Publication</div><img class="reportimage" src="<?php print image_style_url($style, $img_url) ?>"></div>
            <div class="blogboxdesc reportdesc">
              <div><?php print $body;?></div>
            </div>
          </a>
              <?php }}?>
        </div>
        <div class="w-col w-col-9 w-col-medium-9">
          <div class="rich-guide w-richtext">
            <?php print render($content['body']);?>
               
              <figure class="w-richtext-figure-type-video w-richtext-align-fullwidth" style="padding-bottom: 320px;">
            <?php print render($content['field_location_google_maps']);?>
              </figure>
              <?php if(isset($node->field_link['und'][0])){?>
              <p>
              <a class="submit-button w-button" href="<?php print $node->field_link['und'][0]['url'];?>" target="_blank">REGISTER FOR EVENT</a></p>
              <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
$block = block_load('block', '4');
$outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
print render($outBlock);
?>