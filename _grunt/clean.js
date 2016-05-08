module.exports = function (grunt) {

	grunt.config('clean', {
		plugins: ['dist/<%= config.plugins %>']
	});

	grunt.loadNpmTasks('grunt-contrib-clean');
};



