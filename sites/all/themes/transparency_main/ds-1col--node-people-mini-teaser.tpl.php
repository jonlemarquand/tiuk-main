<?php

/**
 * @file
 * Display Suite 1 column template.
 */
?>
<div class="w-col w-col-3">
  <div class="teamcard">
    <h3><?php print $title;?></h3>
    <div class="team-drop w-dropdown" data-delay="0">
      <div class="team-drop-toggle w-dropdown-toggle">
        <div><?php print render($content['field_title']);?></div>
        <div class="icon w-icon-dropdown-toggle"></div>
      </div>
      <nav class="tea-drop-list w-dropdown-list">
        <div><?php print render($content['body']);?></div>
      </nav>
    </div>
  </div>
</div>
