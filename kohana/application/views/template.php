<!DOCTYPE html>
<html lang="en">
  <head>
    <?= Partial::factory('partials/head') ?>
  </head>
  <body>
		<?= Partial::factory('template/nav') ?>
		<div class="container">
      <?= $content ?>
    </div><!-- /.container -->
	  <?= Partial::factory('template/js') ?>
  </body>
</html>
