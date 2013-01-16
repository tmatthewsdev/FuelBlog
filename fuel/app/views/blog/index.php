	
	<h2>Blog Posts</h2>

	<?php foreach ($blogs as $blog): ?>

		<div>

			<h3><?= Html::anchor($blog->url(), $blog->title()) ?></h3>

		</div>

	<?php endforeach; ?>