<?php
/**
 * @file
 * Contains theme preprocess functions
 */
 
 /**
  * Override or insert variables into the html template.
  */

/**
 * Implementation of hook_preprocess_views_view_unformatted().
 */
function transparency_main_preprocess_views_view_unformatted(&$variables) {
  _transparency_main_views_search_api_excerpt_cache($variables['view']->result);
}

function _transparency_main_views_search_api_excerpt_cache(array &$results = NULL) {
  static $excerpts = array();

  if ($results) {
    foreach ($results as $result) {
      $excerpts[$result->search_api_id] = $result->search_api_excerpt;
    }
  } else {
    return !empty($excerpts)? $excerpts : FALSE;
  }
}

function _transparency_main_taxonomy_tree($vid,$page=false){
    $terms=taxonomy_get_tree($vid);
    
    $output='';
    foreach($terms as $term){
        if(arg(0)==$page){
            $class='';
            $curr='';
            if(isset($_GET['field_tags_tid'])){
                 $curr=$_GET['field_tags_tid'];
            }
            if($curr==$term->tid){
                $class='current';
            }
            if($vid==1){
                if($term->tid!=16){
                    $output.='<a class="w-dropdown-link" href="'.$page.'?field_category_term_tid_1='.$term->tid.'">'.$term->name.'</a>';
                }
                
            }else{
               $output.='<a id="term-'.$term->tid.'" class="'.$class.' termTag tag w-button" href="'.$page.'?field_tags_tid='.$term->tid.'" rel="'.$term->tid.'">'.$term->name.'/</a>'; 
            }
            
        }else{
            $output.='<a id="term-'.$term->tid.'" class="termTag tag w-button" href="#" rel="'.$term->tid.'">'.$term->name.'/</a>';
        }
        
    }
    return $output;
}
/**
 * Implementation of hook_preprocess_node().
 */


function fa2_render_menu($menu_name){
    $menu=menu_tree($menu_name);
    $out='';
    switch($menu_name){
        case 'menu-global-menu':
            foreach($menu as $mitem){
                if(isset($mitem['#href'])){
                    $out.= l($mitem['#title'], $mitem['#href'], array('attributes' => array('class' => array('w-dropdown-link'))));
                }
            }
            break;
        case 'menu-main-site-menu':
            foreach($menu as $mitem){
                if(isset($mitem['#href'])){
                    //print_r($mitem);
                    if($mitem['#localized_options']['attributes']['rel']=='searchdrop'){
                        $out.='<div class="nav-link searchlink" data-ix="searchdrop"></div>';
                    }else if($mitem['#localized_options']['attributes']['rel']=='donatedrop'){
                        $out.='<a class="donate nav-link w-nav-link" data-ix="donatedrop" href="#">'.$mitem['#title'].'</a>';
                    }else{
                        $out.='<a class="nav-link w-nav-link" data-ix="'.$mitem['#localized_options']['attributes']['rel'].'" href="#">'.$mitem['#title'].'</a>';
                    }
                }
            }
            break;
    }
    //print_r($menu);
    return $out;
}
function fa2_subrender_menu($menu_name){
    $menu=menu_tree($menu_name);
    $out='';
    $style='menu';
    foreach($menu as $mitem){
        if(isset($mitem['#localized_options']['attributes']['rel'])){
            $rel=$mitem['#localized_options']['attributes']['rel'];
             switch($rel){
                 case 'donatedrop':
                     $out.= '<div class="donatedrop">';
                     $block = block_load('block', '5');
                     $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
                     $out.= render($outBlock);
                     $out.= '</div>';
                     break;
                 case 'searchdrop':
                     $out.= '<div class="searchbar">';
                     $block = block_load('block', '6');
                     $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
                     $out.= render($outBlock);
                     $out.= '</div>';
                     break;
                 case 'wadrop':
                     $out.= '<div class="wearemenu">';
                     $out.= '<div class="container menucontainer">';
                     $out.= '<div class="w-row">';
                     if(isset($mitem['#below'])){
                         $out.= subload($mitem['#below']);
                     }
                     $out.='<div class="w-col w-col-3"><img class="menuimage" src="/sites/all/themes/transparency_main/images/contact.jpg">
            <h3 class="menuhead"><a href="/contact" class="menu-link">Contact us</a></h3>
            <div><a href="/media-contact" class="menu-link">Media Contact</a></div>
            <div><a href="/reporting-corruption" class="menu-link">Reporting Corruption</a></div>
            <div>+ 44 (0)20 3096 7676</div><a class="menu-link" href="mailto:info@transparency.org.uk">info@transparency.org.uk</a></div>';
                     $out.= '</div>';
                     $out.= '</div>';
                     $out.= '</div>';
                     break;
                 case 'owdrop':
                     $out.= '<div class="dropmenu">';
                     $out.= '<div class="container menucontainer">';
                     $out.= '<div class="w-row work-3-col">';
                     if(isset($mitem['#below'])){
                         $out.= subload($mitem['#below']);
                    }
                     $out.= '</div>';
                     $out.= '</div>';
                     $out.= '</div>';
                     break;
                 case 'cordrop':
                     $out.= '<div class="cormenu">';
                     $out.= '<div class="container menucontainer">';
                     $out.= '<div class="w-row">';
                     if(isset($mitem['#below'])){
                         $out.= subload($mitem['#below']);
                    }
                     $out.= '</div>';
                     $out.= '</div>';
                     $out.= '</div>';
                     break;
                 case 'pubdrop':
                     $out.= '<div class="pubmenu">';
                     $out.= '<div class="container menucontainer">';
                     $out.= '<div class="w-row">';
                     $block = block_load('views', 'publications-block_1');
                     $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
                     $out.= render($outBlock);
                     $out.='';
                     $out.= '</div>';
                     $out.= '</div>';
                     $out.= '</div>';
                     break;
                 case 'newsdrop':
                     $out.= '<div class="newsmenu">';
                     $out.= '<div class="container menucontainer">';
                     $out.= '<div class="w-col w-col-4">
            <h3 class="menuhead"><a href="/news" class="menu-link">Features and Blogs</a></h3>
            <a class="see-all-block small w-inline-block" href="/news">
              <div>VIEW ALL</div><img class="moreimage" src="/sites/all/themes/transparency_main/images/Open2.png" width="50">
              </a>';
                     $block = block_load('views', 'news-block_1');
                     $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
                     $out.= render($outBlock);
                     $out.='</div>
          <div class="w-col w-col-4">
            <h3 class="menuhead"><a href="/category/press-release" class="menu-link">PRESS Releases</a></h3>
            <a class="see-all-block small w-inline-block" href="/category/press-release">
              <div>VIEW ALL</div><img class="moreimage" src="/sites/all/themes/transparency_main/images/Open2.png" width="50"></a>';
                     $block = block_load('views', 'news-block_5');
                     $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
                     $out.= render($outBlock);
                     $out.= '</div>';
                     $out.='<div class="w-col w-col-4">
            <div class="menucallout">
              <h3 class="menuhead"><a href="#" class="menu-link">Media Contact</a></h3>
              <div><strong>Press Office</strong>&nbsp;<br><a href="#" class="featlink">press@transparency.org.uk&nbsp;</a><br>+ 44 (0)20 3096 7695&nbsp;<br><br><strong>Out of hours:</strong><br>Weekends; Weekdays (17.30-21.30): +44 (0)79 6456 0340</div>
            </div></div>';
                     $out.= '</div>';
                     $out.= '</div>';
                     break;
                 case 'eventdrop':
                     $out.= '<div class="eventsmenu">';
                     $out.= '<div class="container menucontainer">';
                     $out.= '<div class="w-row">';
                     $block = block_load('views', 'events-block_1');
                     $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
                     $out.= render($outBlock);
                     $out.='<div class="w-col w-col-3 w-col-small-6">
            <a class="see-all-block w-inline-block" href="/events">
              <div>VIEW ALL EVENTS</div><img class="moreimage" src="/sites/all/themes/transparency_main/images/Open2.png" width="50"></a>
          </div>
          <div class="w-col w-col-3 w-col-small-6"></div>';
                     $out.= '</div>';
                     $out.= '</div>';
                     $out.= '</div>';
                     break;
                 case 'joindrop':
                     $out.= '<div class="joinmenu">';
                     $out.= '<div class="container menucontainer">';
                     $out.= '<div class="w-row">';
                     
                     $out.='<div class="w-clearfix w-col w-col-3 w-col-small-3">
                     <img class="menuimage" src="/sites/all/themes/transparency_main/images/twitter.jpg">
                            <h3 class="menuhead"><a href="#" class="menu-link">Follow</a></h3>
                            <div>Join us on social media:</div>
                            <div class="left socialicons w-clearfix">
          <a class="sociallink w-inline-block" href="https://www.instagram.com/transparencyuk" target="_blank"><img src="/sites/all/themes/transparency_main/images/insta-web.png"></a>
          <a class="sociallink w-inline-block" href="https://www.facebook.com/transparencyuk/" target="_blank"><img src="/sites/all/themes/transparency_main/images/fb.png"></a>
          <a class="sociallink w-inline-block" href="https://www.linkedin.com/company/1161884" target="_blank"><img src="/sites/all/themes/transparency_main/images/linkedin-web2.png"></a>
          <a class="sociallink w-inline-block" href="https://twitter.com/TransparencyUK" target="_blank"><img src="/sites/all/themes/transparency_main/images/tw.png"></a>
      </div>
                          </div>
                          <div class="w-clearfix w-col w-col-3 w-col-small-3">
                     <img class="menuimage" src="/sites/all/themes/transparency_main/images/megaphone.jpg">
                            <h3 class="menuhead"><a href="#" class="menu-link">Join</a></h3>
                            <a href="/friends" class="menu-link">Friends of Transparency International UK</a>
                          </div>
                          <div class="w-col w-col-3 w-col-small-3"><img class="menuimage" src="/sites/all/themes/transparency_main/images/donate.jpg">
                    <h3 class="menuhead"><a href="#" class="menu-link">Donate</a></h3>
                    <div>Make a donation:</div>
                    <div class="w-tabs" data-duration-in="300" data-duration-out="100">
                      
                      <div class="w-tab-content">';
                       $block2 = block_load('views', 'donate-block_1');
                     $outBlockx=_block_get_renderable_array(_block_render_blocks(array($block2)));
                    $out.= render($outBlockx);
                      //$block = block_load('commerce_quick_purchase', 'commerce_quick_purchase_block');
                     //$outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
                     //$out.= render($outBlock);
                      $out.=' 
                      </div>
                    </div></div>
                    ';

                    if(isset($mitem['#below'])){
                      $out.= subload($mitem['#below']);
                 }
                     $out.= '</div>';
                     $out.= '</div>';
                     $out.= '</div>';
                     $out.= '</div>';

                     
                     break;
             }
            
        }
    }
    return $out;
   
}
function subload($submenu, $col=3){
    $out='';
    $style='menu';
   foreach($submenu as $smitem){
                           
        if(isset($smitem['#href'])){
            $ndx=explode('/',$smitem['#href']);

            if($ndx[0]=='node' && is_numeric($ndx[1])){
                $nodex=node_load($ndx[1]);
                //print_r($nodex);
            }
            $img_url = $nodex->field_featured_image['und'][0]['uri'];

            $out.='<div class="w-col w-col-'.$col.'">
                  <img class="menuimage" src="'.image_style_url($style, $img_url).'">
                <h3 class="menuhead">'.l($nodex->title, 'node/'.$nodex->nid, array('attributes' => array('class' => array('menu-link')))).'</h3>';
            if(isset($nodex->field_sub_page['und'][0])){
                //print_r($nodex->field_sub_page['und']);
                foreach($nodex->field_sub_page['und'] as $ky=>$field_page){ 
                    $sPage=node_load($field_page['target_id']);
                    $out.=l($sPage->title, 'node/'.$sPage->nid, array('attributes' => array('class' => array('menu-link'))));
                }
            }
            $out.='</div>';

        }
    } 
    return $out;
}
function transparency_main_preprocess_html(&$vars) {
  // Add conditional CSS for IE6.
  drupal_add_css(path_to_theme() . '/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  //drupal_add_js(drupal_get_path('theme', 'transparency') . '/js/jquery-1.10.1.min.js');
}
function transparency_main_js_alter(&$javascript) {
  //$javascript[drupal_get_path('theme', 'transparency') . '/js/jquery-1.10.1.min.js']['group'] = -500;
  //$javascript[drupal_get_path('theme', 'transparency') . '/js/jquery-1.10.1.min.js']['weight'] = -500;
	$viewport = array(
	  '#tag' => 'meta', 
	  '#attributes' => array(
		'name' => 'viewport', 
		'content' => 'width=device-width, initial-scale=1, maximum-scale=1',
	  ),
	);
	 
	drupal_add_html_head($viewport, 'viewport');
}

/**
 * Format submitted by in articles
 */
function transparency_main_preprocess_node(&$vars) {
  $node = $vars['node'];
  $vars['date'] = format_date($node->created, 'custom', 'd M Y');

  if (variable_get('node_submitted_' . $node->type, TRUE)) {
    $vars['display_submitted'] = TRUE;
    $vars['submitted'] = t('By @username on !datetime', array('@username' => strip_tags(theme('username', array('account' => $node))), '!datetime' => $vars['date']));
    $vars['user_picture'] = theme_get_setting('toggle_node_user_picture') ? theme('user_picture', array('account' => $node)) : '';
    
    // Add a footer for post
    $account = user_load($vars['node']->uid);
    $vars['transparency_main_postfooter'] = '';
    if (!empty($account->signature)) {  
      $postfooter = "<div class='post-footer'>" . $vars['user_picture'] . "<h3>" . check_plain(format_username($account)) . "</h3>";
      $cleansignature = strip_tags($account->signature);
      $postfooter .= "<p>" . check_plain($cleansignature) . "</p>";
      $postfooter .= "</div>";
      $vars['transparency_main_postfooter'] = $postfooter;
    } 
  }
  else {
    $vars['display_submitted'] = FALSE;
    $vars['submitted'] = '';
    $vars['user_picture'] = '';
  }
  
  // Remove Add new comment from teasers on frontpage
  
  if ($vars['is_front']) {
    unset($vars['content']['links']['comment']['#links']['comment-add']);
    unset($vars['content']['links']['comment']['#links']['comment_forbidden']);
  }
  
    
    $excerpts = _transparency_main_views_search_api_excerpt_cache();
  if ($excerpts) {
    $excerpt = $excerpts['entity:node/' . $variables['node']->nid . ':en']; // langcode!
    
    if ($excerpt) {
      $variables['search_api_excerpt'] = [
        '#format' => 'simple',
        '#text' => $excerpt,
        '#type' => 'processed_text',
        '#langcode' => 'en', // langcode !
      ];
    }
  }
    
}

/**
 * Format submitted by in comments
 */
function transparency_main_preprocess_comment(&$vars) {
  $comment = $vars['elements']['#comment'];
  $node = $vars['elements']['#node'];
  $vars['created']   = format_date($comment->created, 'custom', 'd M Y');
  $vars['changed']   = format_date($comment->changed, 'custom', 'd M Y');
  $vars['submitted'] = t('By @username on !datetime at about @time.', array('@username' => strip_tags(theme('username', array('account' => $comment))), '!datetime' => $vars['created'], '@time' => format_date($comment->created, 'custom', 'H:i')));
}

/**
 * Change button to Post instead of Save
 */
function transparency_main_form_comment_form_alter(&$form, &$form_state, &$form_id) {
 $form['actions']['submit']['#value'] = t('Post');
 $form['comment_body']['#after_build'][] = 'configure_comment_form'; 
}
function transparency_main_status_messages($display = NULL) {

  //_exclude_message("Thank you for applying for an account. Your account is currently pending approval by the site administrator.<br />In the meantime, your password and further instructions have been sent to your e-mail address."); // success status message from user/register form

  //if (_exclude_message("Find this message.","error")) drupal_set_message("testing status replace","error");

  //return theme_status_messages($display);
}
function transparency_main_form_alter(&$form, &$form_state, $form_id) {
    //print_r($_SESSION['messages']['status'][0]);
     
    if($form_id=='commerce_checkout_form_checkout'){
        $changeTitle=preg_replace('/Order total/','Total donated',$form['cart_contents']['cart_contents_view']['#markup']);
        $form['cart_contents']['cart_contents_view']['#markup']=$changeTitle;
        if(isset($_SESSION['messages']['status'])){
           $message=$_SESSION['messages']['status'][0];
            if(strpos($message, 'your cart')){
                unset($_SESSION['messages']);
                drupal_set_message('Thank you for your donation');
            }
        }
        
    }
    if($form_id=='commerce_checkout_form_review'){
        //drupal_set_message('<pre>'.print_r($form,true).'</pre>');
        $form['help']['#markup']='Review your donation before continuing';
        $form['checkout_review']['review']['#data']['cart_contents']['title']='Review';
        $form['checkout_review']['review']['#data']['cart_contents']['data']=preg_replace('/Order total/','Donation',$form['checkout_review']['review']['#data']['cart_contents']['data']);
    }
    if($form_id=='commerce_cart_add_to_cart_form_5'){
        
        //print_r($form['line_item_fields']['commerce_donate_amount']['und']['#options']);
        foreach($form['line_item_fields']['commerce_donate_amount']['und']['#options'] as $key=>$options){
            $form['line_item_fields']['commerce_donate_amount']['und']['#options'][$key]='£'.$key;
        }
        $form['#submit'][] = 'goToCheckOut';
    }
}
function goToCheckOut(){
    drupal_goto('checkout');
}
