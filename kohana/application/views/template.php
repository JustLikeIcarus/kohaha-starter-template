<!DOCTYPE html>
<html lang="en">
	<head>
		<?= Partial::factory('template/head') ?>
	</head>
	<body>
		<?= Partial::factory('template/nav')->set('site_name', $site_name) ?>
		<div class="container">
			<?= $content ?>
		</div><!-- /.container -->
		<?= Partial::factory('template/js') ?>
	</body>
</html>
