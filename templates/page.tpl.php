<div class="container">
<?php print render($page['header']); ?>
</div>
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



<main>
  <div class="container-fluid bg-green">
    <h1><span><?php print $title; ?></span></h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <?php print render($page['before_content']); ?>
        <?php if ($tabs): ?>
        <?php print render($tabs); ?>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print render($page['after_content']); ?>
      </div>
      <div class="col-md-3">
        <?php print render($page['sidebar_first']); ?>
      </div>
    </div>
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
