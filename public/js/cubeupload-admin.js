var omniSearchId = 0;

$('#userDetail').on( 'show.bs.modal', function(e)
{
	var $modal = $(this)
	$.get('/admin/users/detail/' + $(e.relatedTarget).data('userid'), function( data )
	{
		UserViewModel
		.id( data.id )
		.name( data.name )
		.username( data.username )
		.email( data.email );
	});
});

$('#userSave').click( function(){
	var payload = {};
	$userDetailForm = $('#userDetailForm');

	//alert($userDetailForm.serialize());

	$.post('/admin/users', $userDetailForm.serialize())
	.done( function(data)
	{
		//alert(data);
	});
});

$('[data-action="hideMessage"]').click( function(){
	var $btn = $(this);
	var $panel = $btn.parent().parent().parent();
	var msgId = $btn.data('messageid');
	$.post('/admin/messages/hide/' + msgId)
	.done( function(data)
	{
		reduceUnreadMessages();
		$panel.fadeOut();
	});
});

$('[data-action="unHideMessage"]').click( function()
{
	var $btn = $(this);
	var $panel = $btn.parent().parent().parent();
	var msgId = $btn.data('messageid');
	$.post('/admin/messages/un-hide/' + msgId)
	.done( function(data)
	{
		$panel.fadeOut();
	});
});

$('[data-action="markMessageRead"]').click( function()
{
	var $btn = $(this);
	var $newLabel = $btn.parent().parent().find('[data-type="newLabel"]');
	var msgId = $btn.data('messageid');

	$.post('/admin/messages/mark-read/' + msgId)
	.done( function(data)
	{
		$newLabel.hide();
		$btn.hide();

		reduceUnreadMessages();
	});
});

$('[data-action="deleteMessage"]').click( function()
{
	var $btn = $(this);
	var $panel = $btn.parent().parent().parent();
	var msgId = $btn.data('messageid');
	$.post('/admin/messages/soft-delete/' + msgId)
	.done( function(data)
	{
		$panel.fadeOut();
	});
});

$('[data-action="saveDetails"]').click( function()
{
	var $form = $('#userDetailsForm');
	var id = $form.data('userid');
	var $btn = $(this);

	$btn.attr('disabled', 'disabled');
	$form.prepend('<div id="savingLabel" class="label label-info pull-right">Saving...</div>');

	$.post('/admin/users/edit-details/' + id, $('#userDetailsForm').serialize() )
	.done( function(data)
	{
		$('#savingLabel').removeClass('label-info').addClass('label-success').text('Done!').fadeOut(2000);
	})
	.fail( function()
	{
		$('#savingLabel').removeClass('label-info').addClass('label-danger').text('Failed!').fadeOut(2000);
	})
	.always( function()
	{
		$btn.removeAttr('disabled');
	});
});

$('[data-action="saveSettings"]').click( function()
{
	var id = $('#userSettingsForm').data('userid');
	$.post('/admin/users/edit-settings/' + id, $('#userSettingsForm').serialize() )
	.done( function(data)
	{
		alert(data);
	});
});

function reduceUnreadMessages()
{
	var $unreadMessagesBadge = $('[data-type="unreadMessagesBadge"]');
	var unreadMessages = $unreadMessagesBadge.text();

	if( unreadMessages > 1 )
		$unreadMessagesBadge.text( unreadMessages -1 );
	else if( unreadMessages == 1 )
		$unreadMessagesBadge.hide();
}

function submitForm( formSelector, action)
{
	var $form = $(formSelector);
	var id = $form.data('id');
	var $btn = $(this);

	$btn.attr('disabled', 'disabled');
	$form.prepend('<div id="savingLabel" class="label label-info pull-right">Saving...</div>');

	$.post( action + '/' + id, $form.serialize() )
	.done( function(data)
	{
		$('#savingLabel').removeClass('label-info').addClass('label-success').text('Done!').fadeOut(2000);
	})
	.fail( function()
	{
		$('#savingLabel').removeClass('label-info').addClass('label-danger').text('Failed!').fadeOut(2000);
	})
	.always( function()
	{
		$btn.removeAttr('disabled');
	});
}

$('#text').change( function()
{
	$('[data-notice-text]').html( $(this).val() );
});

$('#dismissable').change( function()
{
	var checked = $(this).is(':checked');

	if( checked )
		$('[data-notice-close]').show();
	else
		$('[data-notice-close]').hide();
});

$('#style').change( function()
{
	$('#notice').attr('class', 'alert alert-' + $(this).val() );
});

$('[data-action="deleteNotice"]').click( function()
{
	$.post('/admin/notices/delete/' + $('#noticeForm').data('id'))
	.done( function()
	{
		window.location.href='/admin/notices';
	});
});

$('[data-action="saveNotice"]').click( function()
{
	submitForm( '#noticeForm', '/admin/notices/edit');
});


function queueOmniSearch( query )
{
	omniSearchId = setTimeout( function() { 
		$.post('/admin/search', { "query": query } )
		.done( function( data )
		{
			$('#userSearchResults').html(data.users);
			$('#imageSearchResults').html(data.images);
			omniSearchId = 0;
			console.log('search finished');
		})
	}, 800)
}

$('[data-action="submitOmniSearch"]').submit( function(e)
{
	var query = $('#omniSearch').val();
	if( omniSearchId == 0)
	{
		// No search queued, make one
		console.log('no search making new one');
		queueOmniSearch( query );
	}
	else
	{
		// Clear the old search and get another one started.
		console.log('cleared a search!');
		clearTimeout( omniSearchId )
		queueOmniSearch( query );
	}

	e.preventDefault();
});

$('#omniSearch').keyup( function()
{
	var query = $(this).val();

	if( query != "" )
		$('#searchButton').removeClass('disabled');
	else
		$('#searchButton').addClass('disabled');
});

