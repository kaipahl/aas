/*global QUnit */

'use strict';

QUnit.test( 'Does jQuery exist', function( assert ){
	var jqueryVersion = $.fn.jquery;
	assert.equal(jqueryVersion, '1.11.3')
});

QUnit.test( 'Does HTML exist', function( assert ){
	var links = $('BODY').html();
	assert.equal(links.length, 182)
});

QUnit.test( 'Does DOM exist', function( assert ){
	var links = document.querySelectorAll('.motorsport');
	assert.equal(links.length, 9)
});

