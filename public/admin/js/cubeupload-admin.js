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

$('[data-target="hideMessage"]').click( function(){
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

$('[data-target="unHideMessage"]').click( function()
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

$('[data-target="markMessageRead"]').click( function()
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

$('[data-target="deleteMessage"]').click( function()
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

function reduceUnreadMessages()
{
	var $unreadMessagesBadge = $('[data-type="unreadMessagesBadge"]');
	var unreadMessages = $unreadMessagesBadge.text();

	if( unreadMessages > 1 )
		$unreadMessagesBadge.text( unreadMessages -1 );
	else if( unreadMessages == 1 )
		$unreadMessagesBadge.hide();
}