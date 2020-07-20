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
    <?php //print $content ?>
    <div class="container menucontainer">
        <div class="centrerow w-row">
          <div class="w-col w-col-9 w-col-medium-6">
            <h3 class="donatehead">Everyone pays the price of corruption.<br>Support us today to create lasting change.</h3>
          </div>
          <div class="w-col w-col-3 w-col-medium-6 CheckOut">
            <div>
              <h3 class="menuhead"><a class="menu-link">Donate</a></h3>
              <div>Make a donation:</div>
              <div class="w-tabs" data-duration-in="300" data-duration-out="100">
                <?php
                       $block2 = block_load('views', 'donate-block_1');
                     $outBlockx=_block_get_renderable_array(_block_render_blocks(array($block2)));
                    print render($outBlockx);
                  
                   //$block = block_load('commerce_quick_purchase', 'commerce_quick_purchase_block');
                    // $outBlock=_block_get_renderable_array(_block_render_blocks(array($block)));
                  //print render($outBlock);
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
