'use strict';

// Console-Logs disablen wenn nicht vorhanden
if (typeof(console) === 'undefined') {
    console = {
        info : function() {},
        dir : function() {},
        error : function() {},
        log : function() {}
    };
}

/**
 * Umschalter zwischen den einzelnen Sendungstypen
 */
var aasToggler = {

	$clickedEl: {},

	init: function() {
		this.tagProgrammes();
		this.addToggler();
		this.bindEvents();
	},

	bindEvents: function() {
		$('.toggler SELECT').change(function(ev) {
			aasToggler.$clickedEl = $(ev.target);
			aasToggler.clickedOffsetV = aasToggler.$clickedEl.offset().top - $(document).scrollTop();
			var selectedProgrammes = $(this).val();
			if (selectedProgrammes === 'all') {
				aasToggler.showAllProgrammes();
			} else {
				aasToggler.filterProgrammes(selectedProgrammes);
			}
		});
	},

	/**
	 * Taggt alle Sendungen im .programmes-Block mit CSS-Klassen
	 * je nach Sportart/Programmtyp
	 */
	tagProgrammes: function() {
		$('.programmes P').each(function() {
			var content = $(this).text();

			var pattFootball = /^[\240]?\d?\dh\d\d((\s|[\240])–(\s|[\240])\d?\dh\d\d)?(\s|[\240])(Fußball|U17|U20|Bundesliga|DFB|U19|U21|Zweite|Dritte|WM|EM|Euro|Talk: Dopp|Premier|Talk: sky90|Primera |Football Focus|J-League|Premjer|Championship:|SPL|Eredivisie|Ligue 1|Ligue1|Campeonato|Champions League|Europa League|College Soccer|Match of the Day|MLS|FA-Cup|FAcup|Carling|Championship|Serie A|Super Lig|Talk: Zeigler|Talk: Die Spiel|The Football League|Talk: ZDF-Sport|Talk: Samstag|Talk: Talk und)/i;
			if (pattFootball.test(content)) {
				$(this).addClass('fussball');
			}

			var pattFeatures = /^\d?\dh\d\d((\s|[\240])–(\s|[\240])\d?\dh\d\d)? (Doku|Talk|Film|Magazin|Football Focus|Sport Inside|NASCAR-Magazin|Die Sport-Report|Fußball: Match|Fußball: Foot)/i;
			if (pattFeatures.test(content)) {
				$(this).addClass('features');
			}

			var pattUSSport = /^\d?\dh\d\d((\s|[\240])–(\s|[\240])\d?\dh\d\d)? (NFL|MLB|NHL|NBA|CFL|College|NASCAR|Baseball|Doku: 30|Lacrosse|Eishockey\/NHL|Basketball\/NBA|American Football|Canadian Football)/i;
			if (pattUSSport.test(content)) {
				$(this).addClass('ussport');
			}

			var pattMotorsport = /^\d?\dh\d\d((\s|[\240])–(\s|[\240])\d?\dh\d\d)? (Formel|NASCAR|Motorsport|MotoGP|Superbike|DTM|WTCC|BTCC)/i;
			if (pattMotorsport.test(content)) {
				$(this).addClass('motorsport');
			}

			var pattExoten = /^\d?\dh\d\d((\s|[\240])–(\s|[\240])\d?\dh\d\d)? (Formel 1:|Formel 3|Formel3|Motorsport|MotoGP|Superbike|DTM|WTCC|U17|U20|Dritte|Fußball\/AUT|Bundesliga:|Bundesliga\/|DFB|U19|U21|Zweite|WM|EM|Euro|Fußball|Talk: Dopp|Premier|Talk: sky90|Talk: Zeigler|Talk: Das aktuelle|Talk: Fantalk|Magazin: Match|Magazin: The Football|Primera |Championship:|Eredivisie|Ligue 1|Champions League\:|Europa League|Match of the Day|FA-Cup|FAcup|Carling|Serie A|Championship|Talk: Die Spiel|The Football League|Talk: ZDF-Sport|Talk: Samstag|Talk: Talk und|NFL|MLB|NHL|NBA|CFL|College Football|College Basketball|Baseball|Tennis|DEL|HBL|BBL|Golf|Handball|Basketball|Wintersport\/Biathlon|Wintersport\/Ski|Wintersport\/Bob|Wintersport\/Nord|Wintersport\/Rodeln|Wintersport\/Lang|Wintersport live|Eishockey\/WM|Eishockey\/NHL|Eishockey\/DEL|Snooker|Radsport|Magazin|Show)/i;
			if (pattExoten.test(content)) {
				$(this).addClass('nonexoten');
			}

			var pattTeamsport = /^\d?\dh\d\d((\s|[\240])–(\s|[\240])\d?\dh\d\d)? (HBL|BBL|DVL|Volleyball|Handball|Hockey|Basketball\/(?!NBA|D-League|Summer League)|DEL|Eishockey\/DEL|Eishockey\/EBEL|Eishockey\/CHL|Eishockey\/WM|Eishockey:|KHL|Rugby|American Football|Australian Football|Floor|Bandy|Baseball\/Bundesliga)/i;
			if (pattTeamsport.test(content)) {
				$(this).addClass('teamsport');
			}

			var pattWintersport = /^\d?\dh\d\d((\s|[\240])–(\s|[\240])\d?\dh\d\d)? (Snowboard|Ski|Wintersport|Curling|DEL|NHL|KHL|AHL|Eis|Bandy|Extreme Sports\/Winter)/i;
			if (pattWintersport.test(content)) {
				$(this).addClass('wintersport');
			}

			var pattKneipensport = /^\d?\dh\d\d((\s|[\240])–(\s|[\240])\d?\dh\d\d)? (Snooker|Billiard|Darts|Poker)/i;
			if (pattKneipensport.test(content)) {
				$(this).addClass('kneipensport');
			}

			var pattKleinball = /^\d?\dh\d\d((\s|[\240])–(\s|[\240])\d?\dh\d\d)? (Tennis|Golf|Squash|Badminton)/i;
			if (pattKleinball.test(content)) {
				$(this).addClass('kleinballsport');
			}


			var pattESPN = /ESPN.*$/i;
			if (pattESPN.test(content)) {
				$(this).addClass('espn').addClass('tv-pay').addClass('pay');
			}

			var pattSky = /SKY.*$/i;
			if (pattSky.test(content)) {
				$(this).addClass('sky').addClass('tv-pay').addClass('pay').addClass('tv');
			}

			var pattEuro1 = /EURO1/;
			if (pattEuro1.test(content)) {
				$(this).addClass('euro-1').addClass('euro').addClass('tv').addClass('tv-free').addClass('free');
			}

			var pattEuro2 = /EURO2/;
			if (pattEuro2.test(content)) {
				$(this).addClass('euro-2').addClass('euro').addClass('tv').addClass('tv-pay').addClass('pay');
			}

			var pattEuroplayer = /eurosportplayer/;
			if (pattEuroplayer.test(content)) {
				$(this).addClass('euro').addClass('stream').addClass('pay');
			}

			var pattEspnplayer = /espnplayer/;
			if (pattEspnplayer.test(content)) {
				$(this).addClass('espn').addClass('stream').addClass('pay');
			}

			var pattDazn = /DAZN/;
			if (pattDazn.test(content)) {
				$(this).addClass('dazn').addClass('stream').addClass('pay');
			}

			var pattSportdigital = /sportdigital/;
			if (pattSportdigital.test(content)) {
				$(this).addClass('sportdigital').addClass('tv').addClass('pay');
			}

			var pattFreeTv = /(ARD|ZDF|NDR|BR|WDR|SWR|HR|MDR|EURO\/|EUROS|SPORT1\/|RTL|SAT|BBC|ITV|Direct|Servus|ORFsport|MAXX|RTL Nitro|n-tv).*$/i;
			if (pattFreeTv.test(content)) {
				$(this).addClass('tv-free').addClass('tv');
			}

			var pattPayTv = /(FUN).*$/i;
			if (pattPayTv.test(content)) {
				$(this).addClass('tv-pay').addClass('tv');
			}

			var pattStream = /(irgendwo|stream|laola1|tv\.sport1\.de|ran|DAZN|\.de|eurosportplayer|gamepass|MLB\.tv|NHL\.tv|NBA League|spox).*/i;
			if (pattStream.test(content)) {
				$(this).addClass('stream');
			}

			var pattStreamPay = /(FIGHTING|DAZN|eurosportplayer|gamepass|espnplayer|MLB\.tv|NHL\.tv|NBA\.TV).*/i;
			if (pattStreamPay.test(content)) {
				$(this).addClass('stream').addClass('pay');
			}
		});
	},

	/**
	 * Generiert SELECT-Menüs, baut sie im DOM ein
	 */
	addToggler: function() {

		var
			keySports = {
				'features': 'Features',
				'exoten': 'Exoten',
				'fussball': 'Fußball',
				'teamsport': 'Teamsport (Non-Fußball, Non-US-Sport)',
				'ussport': 'US-Sport',
				'motorsport': 'Motorsport',
				'wintersport': 'Wintersport',
				'kneipensport': 'Kneipensport',
				'kleinballsport': 'Kleinballsport'
			},
			keyChannels = {
				// 'tv': 'TV',
				// 'tv-free': 'Free-TV',
				// 'euro': 'Eurosport',
				// 'stream': 'Streams',
				'dazn': '- DAZN' // ,
				// 'spde': '- SportDeutschland'
			};
		var htmlWrapperPrefix = '<ul class="toggler">';
		var htmlWrapperSuffix = '</ul>';

		var selectSportsHtml = '<li>';
		selectSportsHtml += '<label>Nur bestimmten Sport anzeigen</label>';
		selectSportsHtml += '<select>';
		selectSportsHtml += '<option value="all" selected="selected">Allen Sport anzeigen</option>';
		for (var sport in keySports) {
			if (keySports.hasOwnProperty(sport)) {
				selectSportsHtml += '<option value="'+sport+'">'+keySports[sport]+'</option>';
			}
		}
		selectSportsHtml += '</select>';
		selectSportsHtml += '</li>';

		var selectChannelsHtml = '<li>';
		selectChannelsHtml += '<label>Nur bestimmte Sender anzeigen</label>';
		selectChannelsHtml += '<select>';
		selectChannelsHtml += '<option value="all" selected="selected">Alle Sender anzeigen</option>';
		for (var channel in keyChannels) {
			if (keyChannels.hasOwnProperty(channel)) {
				selectChannelsHtml += '<option value="'+channel+'">'+keyChannels[channel]+'</option>';
			}
		}
		selectChannelsHtml += '</select>';
		selectChannelsHtml += '</li>';

		var htmlStr = htmlWrapperPrefix + selectSportsHtml + selectChannelsHtml + htmlWrapperSuffix;

		$('.programmes H3').after(htmlStr);
	},


	/**
	 * Anhand des Keys werden alle Sendungen aus- bzw. eingeblendet
	 * indem CSS-Klasse 'filtered' angefügt oder entfernt wird.
	 *
	 * @param  {string} aKey Key für Sportart (siehe SELECT-Menü)
	 */
	filterProgrammes: function(aKey) {
		var selectorStr = '.programmes P';
		var keySelector = '.'+aKey;
		$('.toggler SELECT').val(aKey);

		if (aKey === 'exoten') {
			$(selectorStr).not('.nonexoten').removeClass('filtered');
			$(selectorStr + '.nonexoten').addClass('filtered');
		} else {
			$(selectorStr + keySelector).removeClass('filtered');
			$(selectorStr).not(keySelector).addClass('filtered');
		}
		aasToggler.rescroll();

	},

	/**
	 * Alle Sendungen einblenden indem CSS-Klasse 'filtered' entfernt wird
	 */
	showAllProgrammes: function() {
		var selectorStr = '.programmes P';
		$('.toggler SELECT').val('all');
		$(selectorStr).removeClass('filtered');
		aasToggler.rescroll();
	},

	/**
	 * Positionierung der Seite, damit die Seite auf der gleichen vPos
	 * bleibt, unabhängig von Zahl ein-/ausgeblendeter Sendungen.
	 */
	rescroll: function() {
		var newOffsetV = aasToggler.$clickedEl.offset().top;
		$(document).scrollTop(newOffsetV - aasToggler.clickedOffsetV);
	}

};



var aasComments = {

	init: function() {
		this.bindEvents();
	},

	bindEvents: function() {
		var $focusSwitch = $('.focus-switch');

		$focusSwitch.each(function() {
			aasComments.hasText($(this));
		});

		$focusSwitch.focus(function() {
			$(this).parent().toggleClass('focus');
			aasComments.hasText($(this));
		}).blur(function() {
			$(this).parent().toggleClass('focus');
			aasComments.hasText($(this));
		});

		$('.form-description-switcher').click(function() {
			var pointer = $(this).children('span').html();
			if (pointer === '»') {
				$(this).children('span').html('«');
			} else {
				$(this).children('span').html('»');
			}
			$(this).siblings('.column').toggleClass('hide');
		});
	},

	hasText: function(el) {
		if (el.val() === '') {
			el.parent().removeClass('hastext');
		} else {
			el.parent().addClass('hastext');
		}
	}

};


/**
 * Accordeon für Sidebar in der Mobile Ansicht
 * - Erkennt Mobile Ansicht ob Elsewhere-Nav display = block ist
 * - Hängt Klick-Event an .js-accordeon-title an
 * - Hängt Status (is-open/is-closed) an Parent .box an
 * - Klappt/Schliesst .box-content auf
 */
var aasAccordeon = {

	init: function() {
		if (this.isMobileView()) {
			this.bindEvents();
		}
	},

	isMobileView: function() {
		/* Alte Erkennung
		var floatLayout = $('.col-sidebar').css('float');
		if (floatLayout === 'none') {
			return true;
		} else {
			return false;
		}
		*/
		var isBlock = $('.nav-elsewhere .nav-item').eq(0).css('display');

		return isBlock === 'block';

	},

	bindEvents: function() {
		var $isAccordeonTitle = $('.js-accordeon-title');

		$isAccordeonTitle.each(function() {
			aasAccordeon.closeAccordeon($(this));
		});
		$isAccordeonTitle.click(function(ev){
			var $tgt = $(ev.target);
			var $parentBox = $tgt.parent('.box, .nav-elsewhere');

			if ($parentBox.hasClass('is-open')) {
				aasAccordeon.closeAccordeon($tgt);
			} else {
				aasAccordeon.openAccordeon($tgt);
			}
		});
	},

	closeAccordeon: function($el) {
		var $parentBox = $el.parent('.box, .nav-elsewhere');
		var $boxContent = $el.siblings('.box-content, .nav-items');
		$parentBox.addClass('is-closed').removeClass('is-open');
		$boxContent.hide();
	},

	openAccordeon: function($el) {
		var $parentBox = $el.parent('.box, .nav-elsewhere');
		var $boxContent = $el.siblings('.box-content, .nav-items');
		$parentBox.addClass('is-open').removeClass('is-closed');
		$boxContent.show();
	}
};


// ============================================== document.ready()
(function() {

	aasToggler.init();

	aasComments.init();

	aasAccordeon.init(); // Accordeaon für Sidebar in Mobile Ansicht

}(jQuery));
