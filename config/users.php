<?php

	return [

		'default_settings' => [
			'url_shortener' => 'bitly',
			'retain_filenames' => 'retain',
			'thumbnails' => [
				'forum_thumb', 'forum_full', 'html_thumb', 'html_full'
			]
		],

		/*
			Super Users

			List of user IDs whose settings and details can only be changed by themselves.
			This is similar to the super admins feature in vBulletin.
		*/
		'super_users' => [1]
	];