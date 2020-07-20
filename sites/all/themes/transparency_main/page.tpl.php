<?php
/**
 * @file
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. themes/simpleclean.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
  <div class="top-bar" id="Top">
    <div class="dropdown w-dropdown" data-delay="0">
      <div class="dropdown-toggle w-dropdown-toggle">
        <div>OUR GLOBAL MOVEMENT</div>
        <div class="icon w-icon-dropdown-toggle"></div>
      </div>
      <nav class="w-dropdown-list">
          <?php print fa2_render_menu('menu-global-menu');?>
       </nav>   
    </div>
    <div class="socialicons w-clearfix">
          <a class="sociallink w-inline-block" href="https://www.instagram.com/transparencyuk" target="_blank"><img src="/sites/all/themes/transparency_main/images/insta-web.png"></a>
          <a class="sociallink w-inline-block" href="https://www.facebook.com/transparencyuk/" target="_blank"><img src="/sites/all/themes/transparency_main/images/fb.png"></a>
          <a class="sociallink w-inline-block" href="https://www.linkedin.com/company/1161884" target="_blank"><img src="/sites/all/themes/transparency_main/images/linkedin-web2.png"></a>
          <a class="sociallink w-inline-block" href="https://twitter.com/TransparencyUK" target="_blank"><img src="/sites/all/themes/transparency_main/images/tw.png"></a>
      </div>
  </div>
  <div class="navsec">
    <div class="navbar w-nav" data-animation="default" data-collapse="medium" data-duration="400"><a class="brand w-nav-brand" href="/"><img height="50" src="/sites/all/themes/transparency/images/tiuk.jpg"></a>
      <nav class="nav-menu w-nav-menu" role="navigation">
        <?php print fa2_render_menu('menu-main-site-menu');?>
        </nav>
      <div class="menu-button w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
<div class="menusystem" id="NAV">
    <?php print fa2_subrender_menu('menu-main-site-menu');?>
</div>
  


<?php if ($page['header']): ?>
  <div id="header-interior" class="wrap">
    <?php print render($page['header']); ?>
  </div>
<?php endif; ?>
<?php if ($page['highlighted']): ?>
    <div id="highlighted">
          <?php print render($page['highlighted']); ?>
    </div>
<?php endif; ?>

<?php if ($page['pre-content']): ?>
    <div class="pre-content">
          <?php print render($page['pre-content']); ?>
    </div>
<?php endif; ?>

 <?php if ($tabs): ?>
    <div class="tabs tabsx"><?php print render($tabs); ?></div>
  <?php endif; ?>
  <?php if ($show_messages): ?>
    <?php print $messages; ?>
  <?php endif; ?>
  <?php print render($page['help']); ?>
  <?php if ($action_links): ?>
    <ul class="action-links">
      <?php print render($action_links); ?>
    </ul>
  <?php endif; ?>

<?php if ($page['sidebar_first']){ ?>
  <div class="blogsection">
    <div class="container">
        <div class="w-row">
            <div class="w-col w-col-9">
              <?php print render($page['content']); ?>
            </div>
            <div class="w-col w-col-3">
              <?php print render($page['sidebar_first']); ?>
            </div>
        </div>
    </div>
</div>
<?php }else{?>
    <?php print render($page['content']); ?>
<?php } ?>



<?php if ($page['post-content']): ?>
    <div class="blogsection">
          <?php print render($page['post-content']); ?>
    </div>
<?php endif; ?>

  <div class="footer">
    <div class="container">
      <div class="w-row">
          <?php print render($page['footer']); ?>
        
      </div>
    </div>
  </div>

