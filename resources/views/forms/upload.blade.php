<link href="{{ asset('css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />

<input type="file" id="imageUpload" name="imageUpload" multiple>

@section('scripts')

	@parent
	<script src="{{ asset('js/fileinput.min.js') }}"></script>

@stop