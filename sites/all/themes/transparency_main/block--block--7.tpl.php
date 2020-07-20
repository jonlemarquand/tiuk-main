<?php

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
    

<?php
$today=date('d-m-Y') ;   
$yesterday=date('d-m-Y',strtotime($today."-1 day")) ;   
$last7=date('d-m-Y',strtotime($today."-7 day")) ;   
$last30=date('d-m-Y',strtotime($today."-30 day")) ;   
$year='01-01-'.date('Y',strtotime($today)) ;   
?>
<div class="newsintro">
    <div class="container">
      <h1 class="headline">Features and Blogs</h1>
      <div>SELECT A TAG TO REFINE YOUR SEARCH:</div>
      <div class="tagrow">
            <a class="<?php if(!isset($_GET['field_tags_tid'])){   print 'current'; }?> tag w-button" href="/news">ALL/</a><?php print _transparency_main_taxonomy_tree(2,'news');?>   
        </div>
      <div class="newsoptrow w-row">
        <div class="w-col w-col-3">
          <div class="bipdrop w-dropdown" data-delay="0">
            <div class="bipbutton drop w-dropdown-toggle"><img class="image-2" src="/sites/all/themes/transparency_main/images/dateicon.png" width="20">
              <div class="inlinetext">Filter by date</div>
              <div class="w-icon-dropdown-toggle"></div>
            </div>
            <nav class="dropdown-list-2 w-dropdown-list">
                <a class="w-dropdown-link" href="/news?created=<?php print $today;?>">Today</a>
                <a class="w-dropdown-link" href="/news?created=<?php print $yesterday;?>">Yesterday</a>
                <a class="w-dropdown-link" href="/news?created=<?php print $last7;?>">Last 7 Days</a>
                <a class="w-dropdown-link" href="/news?created=<?php print $last30;?>">Last 30 Days</a>
                <a class="w-dropdown-link" href="/news?created=<?php print $year;?>">This Year</a>
                <a class="w-dropdown-link" href="/news">All Time</a>
              </nav>
          </div>
        </div>
         <div class="w-col w-col-3">
          <div class="bipdrop w-dropdown" data-delay="0">
            <div class="bipbutton drop w-dropdown-toggle"><img class="image-2" src="/sites/all/themes/transparency_main/images/tagicon.png" width="20">
              <div class="inlinetext">Filter by CATEGORY</div>
              <div class="w-icon-dropdown-toggle"></div>
            </div>
            <nav class="dropdown-list-2 w-dropdown-list">
                <?php print _transparency_main_taxonomy_tree(1);?>
              </nav>
          </div>
        </div>
       <div class="w-col w-col-3">
          <div class="bipdrop w-dropdown" data-delay="0">
            <div class="bipbutton drop w-dropdown-toggle"><img class="image-2" src="/sites/all/themes/transparency_main/images/Ordericon.png" width="20">
              <div class="inlinetext">ORDER BY</div>
              <div class="w-icon-dropdown-toggle"></div>
            </div>
            <nav class="dropdown-list-2 w-dropdown-list">
                <a class="w-dropdown-link" href="/news?created=&sort_by=created&sort_order=DESC">Default</a>
                <a class="w-dropdown-link" href="/news?created=&sort_by=created&sort_order=ASC">Oldest First</a>
                <a class="w-dropdown-link" href="/news?created=&sort_by=created&sort_order=DESC">Newest First</a>
              </nav>
          </div>
        </div>
        <div class="w-col w-col-3">
          <div class="form-wrapper sidefw">
            <form id="searchVal" class="form" data-name="Email Form" id="email-form" name="email-form"><input class="nom text-field w-input" data-name="Search" maxlength="256" name="Search" placeholder="Search..." type="text"><a class="button w-button" href="/search/node/"></a></form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

