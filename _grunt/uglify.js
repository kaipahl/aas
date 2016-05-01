'use strict';

module.exports = function (grunt) {
	grunt.config('uglify', {

		dist: {
			options: {},
			files: [{
				src: 'src/_js/aas.js',
				dest: 'dist/_js/aas.min.js'
			}]
		}

	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
};

