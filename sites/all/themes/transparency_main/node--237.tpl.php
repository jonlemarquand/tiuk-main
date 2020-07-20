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
<div class="backpage thanks">
    <div class="container">
      <div class="newsheadblox">
        <h1 class="headline"><?php print $title;?></h1>
        <div class="tinysplit whitets"></div>
        <div><em>share:</em></div>
        <div class="sharebox"><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/fbs.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/tws.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/in2.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/tms.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/res.png"></a><a class="shareicon w-inline-block" href="#"><img src="/sites/all/themes/transparency_main/images/ems.png"></a></div>
      </div>
    </div>
  </div>
<?php
$block = block_load('mailchimp_signup', 'quarterly_newsletter_');
$outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
print render($outBlock);
?>
<div class="pagebody">
    <div class="container">
      <div class="team-intro"><?php print render($content['body']);?></div>
      <?php
        $block = block_load('views', 'people-block');
         $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
         print render($outBlock);
        $block = block_load('views', 'people-block_1');
         $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
         print render($outBlock);
        $block = block_load('views', 'people-block_2');
         $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
         print render($outBlock);
        $block = block_load('views', 'people-block_3');
         $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
         print render($outBlock);
        $block = block_load('views', 'people-block_4');
         $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
         print render($outBlock);
        $block = block_load('views', 'people-block_5');
         $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
         print render($outBlock);
        $block = block_load('views', 'people-block_6');
         $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
         print render($outBlock);
        $block = block_load('views', 'people-block_7');
         $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
         print render($outBlock);
        $block = block_load('views', 'people-block_8');
         $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
         print render($outBlock);
        ?>
    </div>
  </div>
  