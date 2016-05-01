'use strict';

module.exports = function (grunt) {
	grunt.config('sass', {

		dev: {
			options: {
				debugInfo: true,
				lineNumbers: true,
				style: 'expanded',
				sourcemap: 'auto'
			},
			files: [{
				src: 'src/_scss/aas2013.scss',
				dest: 'src/_scss/aas2013.css'
			}]
		},
		dist: {
			options: {
				debugInfo: false,
				lineNumbers: false,
				style: 'compressed',
				sourcemap: 'none'
			},
			files: [{
				src: 'src/_scss/aas2013.scss',
				dest: 'src/_scss/aas2013.css'
			}]
		}

	});

	grunt.loadNpmTasks('grunt-contrib-sass');
};



