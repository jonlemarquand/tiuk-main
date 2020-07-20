<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="pub-intro">
    <div class="container">
      <h1 class="headline">PUBLICATIONS</h1>
<?php
$today=date('d-m-Y') ;   
$yesterday=date('d-m-Y',strtotime($today."-1 day")) ;   
$last7=date('d-m-Y',strtotime($today."-7 day")) ;   
$last30=date('d-m-Y',strtotime($today."-30 day")) ;   
$year='01-01-'.date('Y',strtotime($today)) ;   
?>
    <div>SELECT A TAG TO REFINE YOUR NEWS:</div>
      <div class="tagrow">
            <a class="<?php if(!isset($_GET['field_tags_tid'])){   print 'current'; }?> tag w-button" href="/publications">ALL/</a><?php print _transparency_main_taxonomy_tree(2,'publications');?>   
        </div>
      <div class="newsoptrow w-row">
        <div class="w-col w-col-3">
          <div class="bipdrop w-dropdown" data-delay="0">
            <div class="bipbutton drop w-dropdown-toggle"><img class="image-2" src="/sites/all/themes/transparency_main/images/dateicon.png" width="20">
              <div class="inlinetext">Filter by date</div>
              <div class="w-icon-dropdown-toggle"></div>
            </div>
            <nav class="dropdown-list-2 w-dropdown-list">
                <a class="w-dropdown-link" href="/publications?created=<?php print $today;?>">Today</a>
                <a class="w-dropdown-link" href="/publications?created=<?php print $yesterday;?>">Yesterday</a>
                <a class="w-dropdown-link" href="/publications?created=<?php print $last7;?>">Last 7 Days</a>
                <a class="w-dropdown-link" href="/publications?created=<?php print $last30;?>">Last 30 Days</a>
                <a class="w-dropdown-link" href="/publications?created=<?php print $year;?>">This Year</a>
                <a class="w-dropdown-link" href="/publications">All Time</a>
              </nav>
          </div>
        </div>
        <div class="w-col w-col-3">
          <div class="bipdrop w-dropdown" data-delay="0">
            <div class="bipbutton drop w-dropdown-toggle"><img class="image-2" src="/sites/all/themes/transparency_main/images/dateicon.png" width="20">
              <div class="inlinetext">Filter by Document type</div>
              <div class="w-icon-dropdown-toggle"></div>
            </div>
            <nav class="dropdown-list-2 w-dropdown-list">
                <?php
                 $vocabulary = taxonomy_vocabulary_machine_name_load('Document Type');
                 $documentype = taxonomy_get_tree(4);
                    foreach ($documentype as $term) {
                        print '<a class="w-dropdown-link" href="/publications?field_document_type_tid='.$term->tid.'">'.$term->name.'</a>';
                    }
                ?>
                <a class="w-dropdown-link" href="/publications">All documents</a>
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
                <a class="w-dropdown-link" href="/publications?created=&sort_by=created&sort_order=DESC">Default</a>
                <a class="w-dropdown-link" href="/publications?created=&sort_by=created&sort_order=ASC">Oldest First</a>
                <a class="w-dropdown-link" href="/publications?created=&sort_by=created&sort_order=DESC">Newest First</a>
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
<div class="pinned">
    <div class="container w-clearfix"><a class="section-head white" href="#">HIGHLIGHTS</a>
      <div class="closebutton" data-ix="colapseexpand"><img class="cross" src="/sites/all/themes/transparency_main/images/WhiteCross2.png" width="20"></div>
      <div class="highrow w-row">
          <?php
          $block = block_load('views', 'publications-block');
          $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
          print render($outBlock);
          ?>
          </div>
    </div>
  </div>


<div class="blogsection">
    <div class="container"><a class="section-head" href="#">Publications</a>
      <div class="highrow w-row">
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>
</div>
    </div>
  </div>