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
$pagex="OVERVIEW";
$subpage='';
$num=0;
$sPage=array();
$sBody='';
if(isset($node->field_sub_page['und'][0])){
    foreach($node->field_sub_page['und'] as $ky=>$field_page){ 
        $sPage[$num]=node_load($field_page['target_id']);
        if(arg(2)==$sPage[$num]->title){
            if(isset($sPage[$num]->body['und'][0])){
                $sBody=$sPage[$num]->body['und'][0]['value'];

            }
            $img_url = $sPage[$num]->field_featured_image['und'][0]['uri'];
        }
        $num++;
    }
}


if((arg(2))){
    $subtitle=$title;
    $maintitle=arg(2);
    $pagex=arg(2);
    /*switch(arg(2)){
        case 'best-practice':
            $pagex="Best Practice Guidelines";
            break;
        case 'guidance':
            $pagex="Guidance";
            break;
    }   */
    $subpage=arg(2);
}else{
    $subtitle=$pagex;
    $maintitle=$title;
    $img_url = $node->field_featured_image['und'][0]['uri']; 
}

$style='slider_1920x';
?>

<div class="overviewhead" style='background-image:url(<?php print image_style_url($style, $img_url) ?>)'>
    <div class="container">
      <div class="overviewheadbox">
        <div class="sectioncall"><?php print $subtitle;?></div>
        <div class="tinysplit"></div>
        <h1 class="headline"><?php print $maintitle;?></h1>
        <div class="tinysplit"></div>
        <div><em>share:</em></div>
        <div class="sharebox"><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/fbs.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/tws.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/in2.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/tms.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/res.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/ems.png"></a></div>
        <div class="ovboxcontainer">
            <?php foreach($sPage as $sNode){ 
            $simg_url = $sNode->field_featured_image['und'][0]['uri']; 
            $sstyle='page_thumb';
            $linkRul=$node_url.'/'.$sNode->title;
            if(isset($sNode->field_url_redirect['und'][0]['url'])){
                $linkRul=$sNode->field_url_redirect['und'][0]['url'];
            }
            ?>
          <a class="ov1 ovbox w-inline-block" href="<?php print $linkRul;?>"  style='background-image:linear-gradient(90deg, rgba(0, 93, 170, .8), rgba(0, 159, 227, .8)), url(<?php print image_style_url($sstyle, $simg_url) ?>)'>
            <h3><?php print $sNode->title;?></h3>
            <div class="blogboxtag"><?php print $title;?></div>
          </a>
            <?php }?>
         
        </div>
      </div>
    </div>
  </div>
  <div class="pagebody">
    <div class="container">
      <div class="contentrow w-row">
        <div class="bipcol w-col w-col-3 w-col-medium-3">
          <div class="sidemenu">
            <h3><?php print $title;?> TOPICS</h3>
              <a class="bipbutton w-button" href="<?php print $node_url;?>">OVERVIEW</a>
              <?php foreach($sPage as $sNode){ 
                        $linkRul=$node_url.'/'.$sNode->title;
                        if(isset($sNode->field_url_redirect['und'][0]['url'])){
                            $linkRul=$sNode->field_url_redirect['und'][0]['url'];
                        }

              
                    ?>
                <a class="bipbutton w-button" href="<?php print $linkRul;?>"><?php print $sNode->title;?></a>
              <?php }?>
            <?php  
               if(isset($node->field_blocks['und'][0])){
              foreach($node->field_blocks['und'] as $ky=>$field_blocks){ ?>
            <div class="mediacontact">
              <?php print $field_blocks['value'];?>
            </div>
              <?php }}?>
            
          </div>
        </div>
        <div class="w-col w-col-9 w-col-medium-9">
        <?php if($pagex=='OVERVIEW'){?>
            <?php print render($content['body']);?>
        <?php }else{?>
            <?php print $sBody;?>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>

