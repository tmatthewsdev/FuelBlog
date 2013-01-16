

		<h2>Add Blog Post</h2>

		<?= Form::open() ?>

			<p><input type="text" name="title"></p>
			<p><textarea name="body"></textarea></p>
			<p><button type="submit">Post</button></p>

		<?= Form::close() ?>