'use strict';

module.exports = function (grunt) {

	grunt.config('watch', {

		css: {
			files: ['src/_scss/**/*.scss'],
			tasks: ['buildCss'],
			options: {
				livereload: true
			}
		},
		theme: {
			files: ['src/_themes/<%= config.themeName %>/**/*.php'],
			tasks: ['buildThemes']
		},
		js: {
			files: ['src/_js/**/*.js'],
			tasks: ['buildJs']
		}



	});

	grunt.loadNpmTasks('grunt-contrib-watch');
};
