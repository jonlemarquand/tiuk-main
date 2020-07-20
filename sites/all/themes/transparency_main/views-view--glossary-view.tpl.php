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

<div class="pagebody">
    <div class="container whitebg">
      <h2 class="section-head">GLOSSARY</h2>
    </div>
    <div class="container">
      <div class="contentrow search w-row">
        <div class="w-col w-col-3 w-col-medium-3 w-col-small-small-stack w-col-tiny-tiny-stack">
          <div class="jumpblock" data-ix="show-side">
            <div class="jumptext"><strong>Jump to:</strong></div>
            <div class="w-clearfix"><a class="linkcloud" href="#A">A</a><a class="linkcloud" href="#B">B</a><a class="linkcloud" href="#C">C</a><a class="linkcloud" href="#D">D</a><a class="linkcloud" href="#E">E</a><a class="linkcloud" href="#F">F</a><a class="linkcloud" href="#G">G</a><a class="linkcloud" href="#H">H</a><a class="linkcloud" href="#I">I</a><a class="linkcloud" href="#J">J</a><a class="linkcloud" href="#K">K</a><a class="linkcloud" href="#L">L</a><a class="linkcloud" href="#M">M</a><a class="linkcloud" href="#N">N</a><a class="linkcloud" href="#O">O</a><a class="linkcloud" href="#P">P</a><a class="linkcloud" href="#Q">Q</a><a class="linkcloud" href="#R">R</a><a class="linkcloud" href="#S">S</a><a class="linkcloud" href="#T">T</a><a class="linkcloud" href="#U">U</a><a class="linkcloud" href="#V">V</a><a class="linkcloud" href="#W">W</a><a class="linkcloud" href="#X">X</a><a class="linkcloud" href="#Y">Y</a><a class="linkcloud" href="#Z">Z</a></div>
          </div><a class="top w-hidden-main w-inline-block" href="#Top"><img src="images/To-Top.png"></a></div>
        <div class="w-col w-col-9 w-col-medium-9 w-col-small-small-stack w-col-tiny-tiny-stack">
          <h2 class="tab-head" id="Read1">342 TERMS</h2>
          <?php print $rows; ?>
        </div>
      </div>
      <div class="fixedcol w-row">
        <div class="bipcol w-col w-col-3 w-col-small-small-stack">
          <div class="mobilemenu">
            <div class="fixed jumpblock">
              <div class="jumptext"><strong>Jump to:</strong></div>
              <div class="w-clearfix"><a class="linkcloud" href="#A">A</a><a class="linkcloud" href="#B">B</a><a class="linkcloud" href="#C">C</a><a class="linkcloud" href="#D">D</a><a class="linkcloud" href="#E">E</a><a class="linkcloud" href="#F">F</a><a class="linkcloud" href="#G">G</a><a class="linkcloud" href="#H">H</a><a class="linkcloud" href="#I">I</a><a class="linkcloud" href="#J">J</a><a class="linkcloud" href="#K">K</a><a class="linkcloud" href="#L">L</a><a class="linkcloud" href="#M">M</a><a class="linkcloud" href="#N">N</a><a class="linkcloud" href="#O">O</a><a class="linkcloud" href="#P">P</a><a class="linkcloud" href="#Q">Q</a><a class="linkcloud" href="#R">R</a><a class="linkcloud" href="#S">S</a><a class="linkcloud" href="#T">T</a><a class="linkcloud" href="#U">U</a><a class="linkcloud" href="#V">V</a><a class="linkcloud" href="#W">W</a><a class="linkcloud" href="#X">X</a><a class="linkcloud" href="#Y">Y</a><a class="linkcloud" href="#Z">Z</a></div>
            </div>
          </div>
        </div>
        <div class="w-col w-col-9 w-col-small-small-stack"></div>
      </div>
    </div>
  </div>
