var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');
});

// Copy cubeupload resources to public
elixir(function(mix) {
	mix
	.copy('resources/assets/css', 'public/css')
	.copy('resources/assets/js', 'public/js')
	.copy('resources/assets/fonts', 'public/build/fonts')
	.copy('vendor/kartik-v/bootstrap-fileinput/css', 'public/css')
	.copy('vendor/kartik-v/bootstrap-fileinput/js', 'public/js')
	.copy('vendor/kartik-v/bootstrap-fileinput/img', 'public/img');
});

// Version all our stuff
elixir(function(mix) {
	mix.version(
	[
		'css/app.css',
		'css/cubeupload.css',
		'css/cubeupload-admin.css',
		'js/cubeupload.js',
		'js/cubeupload-admin.js',
		'js/cubeupload-fileinput.js'
	]);
});
