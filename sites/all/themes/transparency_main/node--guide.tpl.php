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
//print arg(2);
$pagex="Quick Read";
$subpage='';
if((arg(2))){
    switch(arg(2)){
        case 'best-practice':
            $pagex="Best Practice Guidelines";
            break;
        case 'guidance':
            $pagex="Guidance";
            break;
    }   
    $subpage=arg(2);
}

?>
<div class="breadcrumbs">
    <div class="container">
      <div class="crumbs">You are currently:</div><a class="assessc crumbbutton w-button" href="/"><?php print $node->field_category['und'][0]['value'];?></a>
      <div class="crumbs">&gt;</div><a class="assessc2 crumbbutton w-button" href="<?php print $node_url;?>"><?php print $title;?></a>
      <div class="crumbs">&gt;</div><a class="assessc2 crumbbutton w-button" href="<?php print $node_url;?>/<?php print $subpage;?>"><?php print $pagex;?></a></div>
  </div>
  <div class="pagebody" id="Body">
    <div class="container whitebg">
      <h2 class="section-head" data-ix="show-side">RISK ASSESSMENT</h2>
      <div class="social-container w-clearfix">
          <a class="print w-inline-block" href="#"><img class="image" src="/sites/all/themes/transparency/images/print.png" width="30"><div>Print Page</div></a>
          <a class="print w-inline-block" href="#"><img class="image" src="/sites/all/themes/transparency/images/pdf-icon.png" width="30"><div>Download as PDF</div></a>
          <a class="print w-inline-block" href="#"><img class="image" src="/sites/all/themes/transparency/images/email.png" width="25"><div>Email</div></a>
          <a class="social w-inline-block" href="#"><img src="/sites/all/themes/transparency/images/in.png" width="30"></a><a class="social w-inline-block" href="#"><img src="/sites/all/themes/transparency/images/tw.png" width="30"></a>
          <a class="social w-inline-block" href="#"><img src="/sites/all/themes/transparency/images/fb.png" width="30"></a></div>
    </div>
    <div class="container">
      <div class="fixedcol w-row">
        <div class="bipcol w-col w-col-3 w-col-small-small-stack">
          <div class="mobilemenu">
            <div class="dropdown-3 w-dropdown" data-delay="0">
              <div class="dropdown-toggle-2 w-dropdown-toggle w-hidden-main w-hidden-medium">
                </div>
              <nav class="dropdown-list fullpage w-dropdown-list">
                  <a class="bipbutton w-button" href="#1">Introduction</a>
                  <a class="bipbutton w-button" href="#2">THe Six Stages of a risk Assessment Exercise</a>
                <div class="sidemenufix">
                    <a class="dropdown-link w-button" href="#3">Stage 1: Ensure top level<br>
commitment and oversight</a>
                    <a class="dropdown-link w-button" href="#4">Stage 2: Plan, scope and mobilise</a><a class="dropdown-link w-button" href="#5">Stage 3: Gather information</a>
                    <a class="dropdown-link w-button" href="#6">Stage 4: Identify the bribery risks</a><a class="dropdown-link w-button" href="#7">Stage 5: Evaluate and prioritise the risks</a><a class="dropdown-link w-button" href="#8">Stage 6: Use the output of risk assessmenT</a></div>
              </nav>
            </div>
          </div>
          <div class="sidemenufix w-hidden-small w-hidden-tiny">
            <?php 
                $num=1;
                foreach($node->field_guidance['und'] as $ky=>$field_guidance){ ?>
                    <a class="bipbutton w-button" href="<?php print $node_url;?>/guidance#<?php print $num;?>"><?php print ($field_guidance['entity']->title);?></a>
                    <?php 
                        $num++;
                     if(isset($field_guidance['entity']->field_chapter['und'][0])){
                          foreach($field_guidance['entity']->field_chapter['und'] as $key=>$subchapter){
                              $subNode=node_load($subchapter['target_id']);
                              $node->field_guidance['und'][$ky]['entity']->field_chapter['und'][$key]['entity']=$subNode;
                              ?>
                              <a class="dropdown-link w-button" href="<?php print $node_url;?>/guidance#<?php print $num;?>"><?php print ($subNode->title);?></a>
                        <?php      
                              $num++;
                          }
                     }
                    
                    }
                ?>
            </div>
        </div>
        <div class="w-col w-col-9 w-col-small-small-stack"></div>
      </div>
      <div class="contentrow w-row">
        <div class="bipcol w-col w-col-3 w-col-medium-3">
          <div class="sidemenu" data-ix="new-interaction">
              <a class="bipbutton w-button" href="<?php print $node_url;?>#Body">Quick Read</a>
              <a class="bipbutton w-button" href="<?php print $node_url;?>/best-practice#Body">Best Practice Guidelines</a>
              <a class="bipbutton w-button" href="<?php print $node_url;?>/best-practice#Body">Guidance</a>
            <div class="bipdroplist">
                <?php 
                $num=1;
                foreach($node->field_guidance['und'] as $ky=>$field_guidance){ ?>
                
                    <a class="dropdown-link linkhead w-button" href="<?php print $node_url;?>/guidance#<?php print $num;?>"><?php print ($field_guidance['entity']->title);?></a>
                   <?php 
                        $num++;
                     if(isset($field_guidance['entity']->field_chapter['und'][0])){
                          foreach($field_guidance['entity']->field_chapter['und'] as $key=>$subchapter){
                              $subNode=node_load($subchapter['target_id']);
                              $node->field_guidance['und'][$ky]['entity']->field_chapter['und'][$key]['entity']=$subNode;
                              ?>
                              <a class="dropdown-link" href="<?php print $node_url;?>/guidance#<?php print $num;?>"><?php print ($subNode->title);?></a>
                        <?php      
                              $num++;
                          }
                     }
                    
                    }
                ?>
                </div>
              <a class="bipbutton w-button" href="<?php print $node_url;?>/resources#Body">Resources</a>
              </div>
        </div>
        <div class="w-col w-col-9 w-col-medium-9">
          <h2 class="tab-head"><?php print $pagex;?></h2>
          <div class="rich-guide w-richtext" id="Resources">
            <?php  
              switch($pagex){
                  case "Quick Read":
                            print render($content['body']);
                            break;
                  case 'Best Practice Guidelines':
                      foreach($node->field_best_practice['und'] as $field_best_practice){
                      ?>
                        <div class="bestpracticeblock">
                            <div class="centrerow w-row">
                              <div class="w-col w-col-1 w-col-small-1 w-col-tiny-1"><img src="/sites/all/themes/transparency/images/tick.png"></div>
                              <div class="w-col w-col-11 w-col-small-11 w-col-tiny-11">
                                <div class="text-block"><?php print $field_best_practice['value'];?></div>
                              </div>
                            </div>
                          </div>
                    <?php
                      }
                      break;
                  case "Guidance":
                      $num=1;
                        foreach($node->field_guidance['und'] as $ky=>$field_guidance){
                            
                      ?>
                        <div class="tophead">
                            <h2 class="tab-head" id="<?php print $num;?>"><?php print $field_guidance['entity']->title;?></h2>
                          </div>
                          <div class="rich-guide w-richtext" id="BriberyAndKickbacks">
                            <?php print $field_guidance['entity']->body['und'][0]['value'];?>
                          </div>
                          <div class="divider"></div>
              
              
                        
                    <?php $num++;
                            if(isset($field_guidance['entity']->field_chapter['und'][0])){
                              foreach($field_guidance['entity']->field_chapter['und'] as $key=>$subchapter){
                                  $subNode=($subchapter['entity']);
                                  
                                  ?>
                                    <div class="tophead">
                                        <h2 class="tab-head" id="<?php print $num;?>"><?php print $subNode->title;?></h2>
                                      </div>
                                      <div class="rich-guide w-richtext" id="BriberyAndKickbacks">
                                        <?php print $subNode->body['und'][0]['value'];?>
                                      </div>
                                      <div class="divider"></div>
              
                                  
                                <?php      
                                  $num++;
                              }
                            }
                            
                      }
                        break;
              } 
              ?>
            
          </div>
          <h2 class="tab-head">CONTINUE READING</h2>
          <div class="readingrow w-row">
            <div class="w-col w-col-6"><a class="a recommendlink" href="back-page.html">Best Practice</a><a class="a recommendlink" href="back-page.html">Guidance</a><a class="a recommendlink" href="back-page.html">Resources</a><a class="a recommendlink" href="#">Public Reporting Indicators</a></div>
            <div class="w-col w-col-6"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
