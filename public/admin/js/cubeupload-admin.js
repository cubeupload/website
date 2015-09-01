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