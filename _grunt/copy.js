module.exports = function (grunt) {

	grunt.config('copy', {

		themes: {
			files: [{
				expand: true,
				cwd: 'src/_themes/<%= config.themeName %>/',
				src: '**',
				dest: 'dist/<%= config.theme %>/<%= config.themeName %>'
			}]
		},
		plugins: {
			files: [{
				expand: true,
				cwd: 'src/_plugins/',
				src: '**',
				dest: 'dist/<%= config.plugins %>'
			}]
		},
		js: {
			files: [{
				expand: true,
				cwd: 'src/_js',
				src: ['*.min.js'],
				dest: 'dist/_js'
			}]
		}

	});

	grunt.loadNpmTasks('grunt-contrib-copy');
};



