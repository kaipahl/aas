/*global module:false */
'use strict';

module.exports = function (grunt) {

	require('time-grunt')(grunt);

	grunt.loadTasks('_grunt');

	grunt.loadNpmTasks('grunt-newer');


	grunt.config('config', {
		app: 'app',
		dev: 'dev',
		src: 'src',
		dist: 'dist',
		test: 'test',
		plugins: 'drupal/wp-content/plugins',
		theme: 'drupal/wp-content/themes',
		themeName: 'aas-evolution2013'
	});


	/*
	 *  TASKS
	 */

	grunt.registerTask('buildPlugins', [
		'clean:plugins',
		'copy:plugins'
	]);

	grunt.registerTask('buildThemes', [
		'copy:themes'
	]);


    grunt.registerTask('buildJs', [
		'uglify:dist',
		'copy:js'
    ]);


    grunt.registerTask('buildCss', [
		'sass:dist',
		'postcss'
    ]);




};
