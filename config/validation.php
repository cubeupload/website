<?php

return [
	'user_reg' =>
		[
			'name' => 'min:4|required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'username' => 'required|min:2|max:20|unique:users'
		],
	'admin' =>
		[
			'user_edit' =>
			[
				'id' => 'required|exists:users',
				'name' => 'required',
				'email' => 'required|email|max:255|unique:users',
				'username' => 'required|min:2|max:20|unique:users',
				'password' => 'confirmed|min:6'
			],
			'user_new' =>
			[
				'name' => 'required',
				'email' => 'required|email|max:255|unique:users',
				'username' => 'required|min:2|max:20|unique:users',
				'password' => 'required|confirmed|min:6'
			]
		]
];