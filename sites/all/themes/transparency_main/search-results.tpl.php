<?php
/**
 * @file
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependent to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 */
?>
<?php  
    $items_per_page = 10;
      if (!isset($current_page )) {
    $current_page = isset($_GET['page']) ? $_GET['page'] + 1 : 1;
  }
    $total = 0;
    if (!empty ($GLOBALS['pager_total_items'])) {
      $total = $GLOBALS['pager_total_items'][0];
    }
    $start = 10*$current_page-9;
    $end = $items_per_page * $current_page;
    if ($end>$total) $end = $total;
    if ($total > 1) {
        $message = '<p>'. t('Displaying @start - @end of @total results', array('@start' => $start, '@end' => $end, '@total' => $total)) .'</p>';
    }
    else {
    $message = '<p>'. t('Displaying @start - @end of @total result', array('@start' => $start, '@end' => $end, '@total' => $total)) .'</p>';
  }
  ?>
  <div class="pagebody">
    <div class="container">
      <h2 class="section-head" data-ix="show-side">Search Results: <?php print arg(2);?></h2>
    </div>
    <div class="container">
      <div class="contentrow search w-row">
        <div class="bipcol w-col w-col-3 w-col-medium-3" id="searchBox">
          <div>
            <div class="form-wrapper sidefw ">
              <form class="form" data-name="Email Form" id="email-form" name="email-form">
                  <input id="searchVal" class="nom text-field w-input" data-name="Search" id="Search-2" maxlength="256" name="Search" placeholder="Search..." type="text" value="<?php print arg(2);?>">
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
          <h2 class="tab-head" id="Read1"><?php print $total;?> Results</h2>
            
<?php if ($search_results) : ?>
  
  <h2><?php print t('Search results');?></h2>
  <ol class="search-results <?php print $module; ?>-results">
    <?php print $message; ?>
    <?php print $search_results; ?>
  </ol>
  <?php print $pager; ?>
<?php else : ?>
  <h2><?php print t('Your search yielded no results');?></h2>
  <?php print search_help('search#noresults', drupal_help_arg()); ?>
<?php endif; ?>

            
            </div>
    </div>
  </div>