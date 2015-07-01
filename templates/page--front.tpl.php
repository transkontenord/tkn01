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

<?php if ($page['slider']): ?>
<?php print render($page['slider']); ?>
<?php endif; ?>

<main>
  <?php if ($tabs): ?>
  <aside id="tabs">
    <div class="container tabs">
      <?php print render($tabs); ?>
    </div>
  </aside>
  <?php endif; ?>

  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="call-to-action">
            <div class="text col-md-9">
              <h2><?php print t('Transporte intermodal de vanguardia'); ?></h2>
              <p>La mejor calidad de una compañía líder al servicio del cliente.</p>
            </div>
            <div class="action col-md-3"><a class="btn btn-lg btn-success" href="/contact"><span><?php print t('Learn more'); ?></span></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container region-front">
    <div class="row">
      <div class="col-md-4">
        <?php print render($page['before_content_firstcolumn']); ?>
      </div>
      <div class="col-md-4">
        <?php print render($page['before_content_secondcolumn']); ?>
      </div>
      <div class="col-md-4">
        <?php print render($page['before_content_thirdcolumn']); ?>
      </div>
    </div>
  </div>

  <div class="container">
    <?php //print render($page['content']); ?>
  </div>
</main>

<footer>
  <section>
    <div class="container">
      <div class="row">
        <?php if ($page['footer_firstcolumn']): ?>
        <div class="col-sm-4">
          <?php print render($page['footer_firstcolumn']); ?>
        </div>
        <?php endif; ?>
        <?php if ($page['footer_secondcolumn']): ?>
        <div class="col-sm-4">
          <?php print render($page['footer_secondcolumn']); ?>
        </div>
        <?php endif; ?>
        <?php if ($page['footer_thirdcolumn']): ?>
        <div class="col-sm-4">
          <?php print render($page['footer_thirdcolumn']); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <section>
    <?php print render($page['footer']); ?>
  </section>
</footer>
