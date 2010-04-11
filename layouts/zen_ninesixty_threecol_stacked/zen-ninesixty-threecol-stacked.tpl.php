<?php
// $Id: zen-ninesixty-threecol-stacked.tpl.php,v 1.1 2010/04/11 08:42:36 amitaibu Exp $
/**
 * @file
 * Template for a 2 column panel layout.
 *
 * This template provides a two column panel display layout, with
 * additional areas for the top and the bottom.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['top']: Content in the top row.
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 *   - $content['bottom']: Content in the bottom row.
 */
?>

<?php
  // Define the grid for each panel column.
  // We assume there's a side block of 4 grids, which leaves us with 12 grids.
  $grid = array(
    'top'    => 12,
    'left'   => 4,
    'middle' => 4,
    'right'  => 4,
    'bottom' => 12,
  );
?>

<div class="panel-gizra-ninesixty-basic clear-block panel-display" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="panel-col-top panel-panel grid-<?php print $grid['top']; ?> alpha omega">
    <div class="inside"><?php print $content['top']; ?></div>
  </div>

  <!-- Add a wrapping grid, so the left, middle and right panels column will
  be placed properly. -->
  <div class="center-wrapper grid-<?php print $grid['left'] + $grid['middle'] + $grid['right']; ?> alpha omega">
    <div class="panel-col-first panel-panel grid-<?php print $grid['left']; ?> alpha">
      <div class="inside"><?php print $content['left']; ?></div>
    </div>

    <div class="panel-col-last panel-panel grid-<?php print $grid['middle']; ?>">
      <div class="inside"><?php print $content['middle']; ?></div>
    </div>

    <div class="panel-col-last panel-panel grid-<?php print $grid['right']; ?> omega">
      <div class="inside"><?php print $content['right']; ?></div>
    </div>
  </div>
  <div class="panel-col-bottom panel-panel grid-<?php print $grid['bottom']; ?> alpha omega">
    <div class="inside"><?php print $content['bottom']; ?></div>
  </div>
</div>