<?php

	Breadcrumbs::register('/admin', function( $breadcrumbs )
	{
		$breadcrumbs->push('Dashboard', '/admin');
	});


	// Start - Users Breadcrumbs

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

	// End - Users Breadcrumbs


	// Start - Messages Breadcrumbs

	Breadcrumbs::register('/admin/messages', function( $breadcrumbs )
	{
		$breadcrumbs->parent('/admin');
		$breadcrumbs->push('Messages', '/admin/messages');
	});

	Breadcrumbs::register('/admin/messages/category', function( $breadcrumbs, $category )
	{
		$breadcrumbs->parent('/admin/messages');
		$breadcrumbs->push( ucfirst( $category ), '/admin/messages/category/' . $category);
	});

	Breadcrumbs::register('/admin/messages/hidden', function( $breadcrumbs )
	{
		$breadcrumbs->parent('/admin/messages');
		$breadcrumbs->push( 'Archive', '/admin/messages/hidden');
	});

	// End - Messages Breadcrumbs


	// Start - Images Breadcrumbs


	// End - Images Breadcrumbs


	// Start - Notices Breadcrumbs


	// End - Notices Breadcrumbs