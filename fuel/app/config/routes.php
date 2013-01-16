<?php
return array(
	'_root_'  => 'blog/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route

	'add' => 'blog/add',

	'(:any)' => 'blog/view/$1',
);