$.ajaxSetup( 
	{ 
		headers: {
			'X-CSRF-Token': cubeupload.csrf_token
		}
	}
);

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

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


$('[name="username"]').on('input', function()
{
	var txt = $('[name="username"]').val();
	if( txt != '')
		$('#usernameHelpBlock').html( cubeupload.env.image_user_url + '/' + txt + '/image.png<br /><em><small>You can use this URL for your images (but you don\'t have to!)</small></em>');
	else
		$('#usernameHelpBlock').html('');
});

$('.cube-imgthumb').hover(
	function()
	{
		$(this).find('.caption').removeClass('hidden');
	},
	function()
	{
		$(this).find('.caption').addClass('hidden');
	}
);


// Notices

$('.noticeClose').click( function() 
{
	var noticeId = $(this).data('notice-id');
	$.post( '/ajax/util/close-notice', { id: noticeId } );
});


$('[data-action="sendMessage"]').click( function(e)
{
	var $form = $('#contactForm');
	
	$.post( '/ajax/messages', $form.serialize() )
	.done( function(data)
	{
		$('#contactThanks').unhide();
		$('#contactSubmit').hide();
		
	})
	.fail( function()
	{
		alert('Something went wrong (super descriptive)');
	});
	
	e.preventDefault();
});