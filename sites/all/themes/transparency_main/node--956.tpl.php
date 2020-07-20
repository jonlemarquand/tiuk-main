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
<div id="node-<?php print $node->nid; ?>" class=" <?php print $classes; ?>"<?php print $attributes; ?>>
    <div class="donatedrop page">
        <div class="container menucontainer">
          <div class="tab-wrapper"><a class="tab-next w-button" href="#Top" style="display: block;">Next Step</a><a class="tab-next toptn w-button" href="#Top" style="display: block;">Next Step</a>
            <div class="w-tabs" data-duration-in="300" data-duration-out="100">
              <div class="tabsmenumember w-tab-menu">
                <a class="tablinkmember w-inline-block w-tab-link w--current bigTab b1"  data-itm="1" data-item="bigTab" data-w-tab="Tab 1">
                  <div>1</div>
                </a>
                <a class="tablinkmember w-inline-block w-tab-link bigTab b2" data-item="bigTab" data-itm="2" data-w-tab="Tab 2">
                  <div>2</div>
                </a>
                <a class="tablinkmember w-inline-block w-tab-link bigTab b3" data-item="bigTab" data-itm="3"  data-w-tab="Tab 3">
                  <div>3</div>
                </a>
                <a class="tablinkmember w-inline-block w-tab-link bigTab b4" data-item="bigTab"  data-itm="4" data-w-tab="Tab 4">
                  <div>4</div>
                </a>
                <a class="tablinkmember w-inline-block w-tab-link bigTab b5" data-item="bigTab" data-itm="5"  data-w-tab="Tab 5">
                  <div>5</div>
                </a>
                <!--<a class="tablinkmember w-inline-block w-tab-link bigTab" data-item="bigTab" data-w-tab="Tab 6">
                  <div>6</div>
                </a>-->
              </div>
                <div class="w-tab-content">
                    <?php
                  // We hide the comments and links now so that we can render them later.
                      hide($content['comments']);
                      hide($content['links']);
                      print render($content);
                    ?>
              </div>
           </div>
          </div>
        </div>  
    
  </div>
  </div>
