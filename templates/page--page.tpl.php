<?php print render($page['header']); ?>
<!-- Navigation -->
<nav id="main-menu" class="navbar navbar-default">
  <div class="container">
<div class="row">
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-main-menu">
        <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" href="<?php print base_path(); ?>">
        <img src="<?php print $logo; ?>" class="img-responsive">
      </a>
    </div>
</div>

<div class="row">
    <div class="collapse navbar-collapse" id="navbar-main-menu">
      <?php print render($primary_nav); ?>
    </div>
</div>

  </div>
</nav>
<!-- End Navigation -->

<?php if ($messages): ?>
<aside id="messages">
<div class="container">
    <?php print $messages; ?>
  </div>
</aside>
<?php endif; ?>



<main class="page">
<?php if (isset($banner)): ?>
  <?php $bg = 'style = "background-image: url(' . $banner . ');"'; ?>
<?php endif; ?>
<div class="container-fluid bg-green" <?php if(isset($banner)) { print $bg;} ?>>
    <h1><?php print $title; ?></h1>
  </div>
  <?php if ($tabs): ?>
  <aside id="tabs">
    <div class="container tabs">
      <?php print render($tabs); ?>
    </div>
  </aside>
  <?php endif; ?>
  <div class="container">
    <?php print render($page['before_content']); ?>
    <?php print render($page['content']); ?>
    <?php print render($page['after_content']); ?>
  </div>
</main>

<footer>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <?php print render($page['footer_firstcolumn']); ?>
        </div>
        <div class="col-md-4">
          <?php print render($page['footer_secondcolumn']); ?>
        </div>
        <div class="col-md-4">
          <?php print render($page['footer_thirdcolumn']); ?>
        </div>
      </div>
    </div>
  </section>
  <section>
    <?php print render($page['footer']); ?>
  </section>
</footer>
