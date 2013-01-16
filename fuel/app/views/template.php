<html>
  <head>
	<title><?= isset($title) ? $title : 'Blog' ?></title>

	<?= Casset::render_css() ?>
  </head>

  <body>

  	<?php if(isset($notice)): ?>
  		<p><?= $notice->type ?>: <?= $notice->message ?></p>
	<?php endif; ?>

  	<?= $content ?>

  </body>

</html>