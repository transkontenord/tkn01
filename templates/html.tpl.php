<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if lt IE 9]>
    <script src="<?php print base_path() . path_to_theme(); ?>/a/j/html5shiv/dist/html5shiv.min.js"></script>
    <script src="<?php print base_path() . path_to_theme(); ?>/a/j/html5shiv/dist/html5shiv-printshiv.min.js"></script>
  <![endif]-->
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic,300,300italic' rel='stylesheet' type='text/css'>
</head>
<body class="<?php (drupal_is_front_page()) ? print "front" : print "no-front"; ?>">
<?php print $page_top; ?>
<?php print $page; ?>
<?php print $page_bottom; ?>
</body>
</html>
