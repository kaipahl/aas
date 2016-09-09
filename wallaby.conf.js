module.exports = function (wallaby) {
	return {
		debug: true,
		files: [
			'src/_js/aas.js',
			{ 'pattern' : 'src/_js/jquery-1.11.3.min.js', 'instrument': false },
			'tests/spec/qunit.html'
		],

		tests: [,
			'tests/spec/aastoggler.test.js'
		],

		testFramework: 'qunit'
	};
};
