'use strict';

/* jshint -W024 */
/* jshint expr:true */

/**
if (typeof process === 'object') {
	// Initialize node environment
	global.expect = require('chai').expect;
	require('jsdom-global')();
} else {
	window.expect = window.chai.expect;
	window.require = function () {  };
}


before(function () {
	this.jsdom = require('jsdom-global')();
	global.$ = global.jQuery = require('jquery');
});

after(function () {
	this.jsdom();
});

 */
// var chai = require('chai');
// var expect = chai.expect;
// var jsdom = require('jsdom-global');

// var jsdom = require('jsdom-global')();
// global.$ = global.jQuery = require('jquery');


// console.log(global.$);

describe('Check jQuery', function() {
	var jqueryVersion = $.fn.jquery;

	it ('... should show jQuery-Version', function() {
		expect (jqueryVersion).to.equal('1.11.3');
	});

});

describe('Check HTML', function() {
	var links = $('BODY').html();

	it ('... should load the HTML into the test', function() {
		expect (links.length).to.be.above(45782);
	});

});

describe('Check DOM', function() {
	var links = document.querySelectorAll('.motorsport');

	it ('... should have some links', function() {
		expect ( links.length).to.equal(9);
	});

});
