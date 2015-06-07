<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ asset('js/fileinput.min.js') }}"></script>
<!-- bootstrap.js below is only needed if you wish to the feature of viewing details
     of text file preview via modal dialog -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
<!-- optionally if you need translation for your language then include 
    locale file as mentioned below -->

<input type="file" id="imageUpload" name="imageUpload">

<script>
	$("#imageUpload").fileinput(
	{
		uploadUrl: 'upload', 
		ajaxSettings:{ headers:{'X-CSRF-Token': '{{ csrf_token() }}'}},
		uploadExtraData: {'test':'this is a test'}
	});

	$('#imageUpload').on('fileuploaded', function(event, data, previewId, index) {
    var form = data.form, files = data.files, extra = data.extra,
        response = data.response, reader = data.reader;

	console.log( form, files, extra, response, reader );
	});
</script>