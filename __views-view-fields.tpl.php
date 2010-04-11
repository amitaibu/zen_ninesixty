<?php
// $Id: __views-view-fields.tpl.php,v 1.2 2010/04/11 08:44:25 amitaibu Exp $
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<?php
  // The total grid, that should wrap the elements.
  $total = 12;

  // Set the grid of each column. We can key the array with nid, title, body,
  // but by using numeric keys, we allow changing the fields in the Views
  // without harming the theme override.
  // You may specify an empty value, and this will allow grouping elements
  // together under the same 960 CSS declarations.
  // In the following example elements 1, 2, 3 will be placed together in
  // grid-8.
  $ids = array(
    '0' => 'grid-4 alpha',
    '1' => 'grid-8 omega',
    '2' => '',
    '3' => '',
  );
  // Get the ID keys.
  $ids_keys = array_flip(array_keys($fields));
?>

<div class="grid-<?php print $total; ?> alpha omega views-row-wrapper">
  <?php foreach ($fields as $id => $field): ?>
    <?php if (!empty($field->separator)): ?>
      <?php print $field->separator; ?>
    <?php endif; ?>

    <?php if (!empty($ids[$ids_keys[$id]])): ?>
      <div class="<?php print $ids[$ids_keys[$id]]; ?>">
    <?php endif; ?>

    <<?php print $field->inline_html;?> class="views-field-<?php print $field->class;?>">
      <?php if ($field->label): ?>
        <label class="views-label-<?php print $field->class; ?>">
          <?php print $field->label; ?>:
        </label>
      <?php endif; ?>
        <?php
        // $field->element_type is either SPAN or DIV depending upon whether or not
        // the field is a 'block' element type or 'inline' element type.
        ?>
        <<?php print $field->element_type; ?> class="field-content"><?php print $field->content; ?></<?php print $field->element_type; ?>>
    </<?php print $field->inline_html;?>>

    <?php if (!isset($ids[$ids_keys[$id] + 1])): ?>
      </div>
    <?php elseif (!empty($ids[$ids_keys[$id] + 1])): ?>
      </div>
    <?php endif; ?>

  <?php endforeach; ?>
</div>