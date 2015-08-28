<link href="{{ asset('css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />

<input type="file" id="imageUpload" name="imageUpload" multiple>

@section('scripts')

	<script src="{{ asset('js/fileinput.min.js') }}"></script>
	<script src="{{ asset('js/cubeupload-fileinput.js') }}"></script>

@stop