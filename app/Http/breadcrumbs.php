<?php

	Breadcrumbs::register('/admin', function( $breadcrumbs )
	{
		$breadcrumbs->push('Dashboard', '/admin');
	});

	Breadcrumbs::register('/admin/users', function( $breadcrumbs )
	{
		$breadcrumbs->parent('/admin');
		$breadcrumbs->push('Users', '/admin/users');
	});

	Breadcrumbs::register('/admin/users/show', function( $breadcrumbs, $user )
	{
		$breadcrumbs->parent('/admin/users');
		$breadcrumbs->push($user->username, '/admin/users/show/' . $user->id);
	});

	Breadcrumbs::register('/admin/users/edit', function( $breadcrumbs, $user )
	{
		$breadcrumbs->parent('/admin/users/show', $user);
		$breadcrumbs->push('Edit', '/admin/users/edit/' . $user->id);
	});

	Breadcrumbs::register('/admin/users/images', function( $breadcrumbs, $user )
	{
		$breadcrumbs->parent('/admin/users/show', $user);
		$breadcrumbs->push('Edit', '/admin/users/images/' . $user->id);
	});