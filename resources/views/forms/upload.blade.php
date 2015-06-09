<link href="{{ asset('css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />

<input type="file" id="imageUpload" name="imageUpload">


@section('body_end')
	<script src="{{ asset('js/fileinput.min.js') }}"></script>
	<script>
		$("#imageUpload").fileinput(
		{
			uploadUrl: 'upload', 
			minFileCount: 1,
			maxFileCount: 50,
			ajaxSettings:{ headers:{'X-CSRF-Token': cubeupload.csrf_token }},
			otherActionButtons: '<button class="cube-get-codes btn btn-xs btn-default" {dataKey} title="Get codes" type="button"><i class="glyphicon glyphicon-share text-info"></i></button>',
			layoutTemplates: {
		    main1: '{preview}\n' +
		        '<div class="kv-upload-progress hide"></div>\n' +
		        '<div class="input-group {class}">\n' +
		        '   {caption}\n' +
		        '   <div class="input-group-btn">\n' +
				'	<button class="cube-share-button btn btn-default hidden" title="Get share codes for all uploaded images" type="button"><i class="glyphicon glyphicon-share"></i> Share</button>\n' +
		        '       {remove}\n' +
		        '       {cancel}\n' +
		        '       {upload}\n' +
		        '       {browse}\n' +
		        '   </div>\n' +
		        '</div>'
				}
		});

		$('#imageUpload').on('fileloaded', function(event, file, previewId, index, reader) {

			$('#'+previewId).find('.cube-get-codes').addClass('hidden');
		});

		$('#imageUpload').on('fileuploaded', function()
		{
			$('.cube-share-button').removeClass('hidden');
		});
	</script>
@stop