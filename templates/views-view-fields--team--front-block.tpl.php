<?php //dpm($variables); ?>
<?php //dpm($row); ?>
<article class="equipo">
  <?php
    if ($row->field_field_team_member_photo):
      $uri = $row->field_field_team_member_photo[0]['raw']['uri'];
      $src = image_style_url('large', $uri);
  ?>
  <img src="<?php print $src; ?>">
  <?php endif; ?>
  <div class="caption">
  <h1><?php print $row->node_title; ?></h1>
  <?php if ($row->field_field_team_member_role): ?>
    <h2><?php print $variables['fields']['field_team_member_role']->content; ?></h2>
  <?php endif; ?>
  <?php if ($row->field_field_team_member_social): ?>
    <?php print $variables['fields']['field_team_member_social']->content; ?>
  <?php else: ?>
    <div>&nbsp;</div>
  <?php endif; ?>
  </div>
</article>
