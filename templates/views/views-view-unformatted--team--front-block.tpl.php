<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="row">
<?php foreach ($rows as $id => $row): ?>
<?php 
if (!$classes_array[$id]) { 
  $classes_array[$id] = 'col-xs-12 col-sm-6 col-md-4';
} else {
  $classes_array[$id] .= ' col-xs-12 col-sm-6 col-md-4';
}
?>
  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
</div>


