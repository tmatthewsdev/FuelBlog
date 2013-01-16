	
		<h2>View &gt; <?= $blog->title() ?></h2>
		<span class="date"><?= $blog->date() ?></span>

		<p><?= $blog->body() ?></p>


		<ul>
			<?php foreach (($blog->comments()) as $comment): ?>

			<li><?= $comment->content() ?> by <?= $comment->author() ?> at <?= $comment->date() ?></li>

			<?php endforeach; ?>
		</ul>
