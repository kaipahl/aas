'use strict';

/* jshint -W024 */
/* jshint expr:true */

var jq;

// Test is running inside browser
if (typeof $ !== 'undefined' ) {
	jq = $;
} else {
	var fs = require('fs');
	var chai = require('chai');
	var expect = chai.expect;
	var jsdom = require('jsdom');
	var window = jsdom.jsdom().defaultView;
	require('jsdom-global')(); // needed?
	jq = require('jquery')(require('jsdom').jsdom().defaultView);
}


describe('Check HTML', function() {
	var links = jq('BODY').html();

	it ('... should load the HTML into the test', function() {
		expect (links.length).to.be.above(45782);
	});

});

describe('Check different sports', function() {

	it ('... should have all motorsport shows', function() {
		var motorsports = jq('.motorsport');
		expect ( motorsports.length).to.equal(9);
	});

	it ('... should have all nonexotic shows', function() {
		var nonexotic = jq('.nonexoten');
		expect ( nonexotic.length).to.equal(96);
	});

});

describe('Check different channels', function() {

	it ('... should have all EURO1 shows', function() {
		var euro1 = jq('.euro-1');
		expect ( euro1.length).to.equal(10);
	});

	it ('... should have all DAZN shows', function() {
		var dazn = jq('.dazn');
		expect ( dazn.length).to.equal(36);
	});

	it ('... should have all streams', function() {
		var streams = jq('.stream');
		expect ( streams.length).to.equal(100);
	});

});
