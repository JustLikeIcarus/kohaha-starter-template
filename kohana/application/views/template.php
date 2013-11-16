<!DOCTYPE html>
<html lang="en">
  <head>
		<?= Partial::factory('template/head') ?>
  </head>
  <body>
		<?= Partial::factory('template/nav') ?>
		<div class="container">
			<?= $content ?>
    </div><!-- /.container -->
		<?= Partial::factory('template/js') ?>
  </body>
</html>
