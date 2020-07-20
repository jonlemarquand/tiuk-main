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
<?php
$term = taxonomy_term_load(arg(2));
$name = $term->name;
?>
  <div class="pagebody">
    <div class="container">
      <h2 class="section-head" data-ix="show-side"><?php print $name;?></h2>

        
    </div>
    <div class="container">
      <div class="contentrow search w-row">
        <div class="bipcol w-col w-col-3 w-col-medium-3" id="searchBox">
          <div>
            <div class="form-wrapper sidefw ">
              <form class="form" data-name="Email Form" id="email-form" name="email-form">
                  <input id="searchVal" class="nom text-field w-input" data-name="Search"  maxlength="256" name="Search" placeholder="Search..." type="text" value="">
                  <a  id="searchNow" class="button w-button" href="/search/node/"></a>
            </form>
            </div>
            <div class="bipdrop w-dropdown" data-delay="0">
              <div class="bipbutton drop w-dropdown-toggle"><img class="image-2" src="/sites/all/themes/transparency_main/images/tagicon.png" width="20">
                <div class="inlinetext">Filter by CATEGORY (ALL)</div>
                <div class="w-icon-dropdown-toggle"></div>
              </div>
              <nav class="dropdown-list-2 w-dropdown-list">
                  <a class="nodeTypex w-dropdown-link" href="#" rel="type:news">News</a>
                  <a class="nodeTypex w-dropdown-link" href="#" rel="type:news term:16">Press Release</a>
                  <a class="nodeTypex w-dropdown-link" href="#" rel="type:resource">Publication</a>
                  <a class="nodeTypex w-dropdown-link" href="#" rel="type:event">Event</a>
                  <a class="nodeTypex w-dropdown-link" href="#" rel="type:page">Page</a></nav>
            </div>
            
            <div class="tagrow tr-search">
                <a class="current all tag w-button" rel='all'>ALL/</a><?php print _transparency_main_taxonomy_tree(2);?>
              </div>
              <a id="search" class="pinksb searchbutton w-button" href="/search/node/">SEARCH</a>
              <a id="reset" class="searchbutton w-button" href="#">RESET</a>
            <div class="menucallout side">
              <h3 class="menuhead"><a href="/guidance" class="menu-link">Media Contact</a></h3>
              <div><strong>Harvey Gavin</strong>&nbsp;<br><a href="#" class="featlink">harvey.gavin@transparency.org.uk&nbsp;</a><br>+ 44 (0)20 3096 7695&nbsp;<br><br><strong>Out of hours:</strong><br>Weekends; Weekdays (17.30-21.30): +44 (0)79 6456 0340</div>
            </div>
          </div>
        </div>
        <div class="w-col w-col-9 w-col-medium-9">
          <h2 class="tab-head" id="Read1"><?php //print $total;?> Results</h2>
            

            

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