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
	});