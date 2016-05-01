module.exports = function (grunt) {

	grunt.config('postcss', {

		options: {
			map: false,
			/*
			map: {
				inline: false,
				annotation: 'dist/_css'
			},
			*/
			processors: [
				require('autoprefixer')({
					browsers: [ 'last 3 version', 'ie 9' ]
				})
			]
		},
		dist: {
			files: [ {
				src: 'src/_scss/aas2013.css',
				dest: 'dist/_css/aas2013.css'
			} ]
		}

	});

	grunt.loadNpmTasks('grunt-postcss');
};
