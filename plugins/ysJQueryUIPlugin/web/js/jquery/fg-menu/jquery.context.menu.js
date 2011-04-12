// jQuery Context Menu Plugin
//
// Version 1.00
//
// Cory S.N. LaViska
// A Beautiful Site (http://abeautifulsite.net/)
//
// Visit http://abeautifulsite.net/notebook/80 for usage and more information
//
// Terms of Use
//
// This software is licensed under a Creative Commons License and is copyrighted
// (C)2008 by Cory S.N. LaViska.
//
// For details, visit http://creativecommons.org/licenses/by/3.0/us/
//
if(jQuery)( function() {
	$.extend($.fn, {

		contextMenu: function(o, callback) {
			// Defaults
			if( o.menu == undefined ) return false;
			if( o.inSpeed == undefined ) o.inSpeed = 150;
			if( o.outSpeed == undefined ) o.outSpeed = 75;
			// 0 needs to be -1 for expected results (no fade)
			if( o.inSpeed == 0 ) o.inSpeed = -1;
			if( o.outSpeed == 0 ) o.outSpeed = -1;
			// Loop each context menu
			$(this).each( function() {
				var el = $(this);
				var offset = $(el).offset();
				// Add contextMenu class
				$('#' + o.menu).addClass('contextMenu');
				// Simulate a true right click
				$(this).mousedown( function(e) {
					var evt = e;
					$(this).mouseup( function(e) {
						var srcElement = $(this);
						$(this).unbind('mouseup');
						if( evt.button == 2 ) {
							// Hide context menus that may be showing
							$(".contextMenu").hide();
							// Get this context menu
							var menu = $('#' + o.menu);

							if( $(el).hasClass('ui-state-disabled') ) return false;

							// Detect mouse position
							var d = {}, x, y;
							if( self.innerHeight ) {
								d.pageYOffset = self.pageYOffset;
								d.pageXOffset = self.pageXOffset;
								d.innerHeight = self.innerHeight - 200;
								d.innerWidth = self.innerWidth - 200;
							} else if( document.documentElement &&
								document.documentElement.clientHeight ) {
								d.pageYOffset = document.documentElement.scrollTop;
								d.pageXOffset = document.documentElement.scrollLeft;
								d.innerHeight = document.documentElement.clientHeight;
								d.innerWidth = document.documentElement.clientWidth;
							} else if( document.body ) {
								d.pageYOffset = document.body.scrollTop;
								d.pageXOffset = document.body.scrollLeft;
								d.innerHeight = document.body.clientHeight;
								d.innerWidth = document.body.clientWidth;
							}
							(e.pageX) ? x = e.pageX : x = e.clientX + d.scrollLeft;
							(e.pageY) ? y = e.pageY : x = e.clientY + d.scrollTop;

							// Show the menu
							$(document).unbind('click');
              topLayout = $('.ui-layout-pane-north').css('height');
              leftLayout = $('.ui-layout-pane-west').css('width');
              topLayout = (topLayout != undefined && $('.ui-layout-pane-north').css('display') != 'none') ? topLayout.substring(0,topLayout.length - 2) : 0;
              leftLayout = (leftLayout != undefined && $('.ui-layout-pane-west').css('display') != 'none') ? leftLayout.substring(0,leftLayout.length - 2) : 0;
							$(menu).css({ top: y - topLayout , left: x - leftLayout  }).fadeIn(o.inSpeed);
							// ui-state-hover events
							$(menu).find('A').mouseover( function() {
								$(menu).find('LI.ui-state-hover').removeClass('ui-state-hover');
								$(this).parent().addClass('ui-state-hover');
							}).mouseout( function() {
								$(menu).find('LI.ui-state-hover').removeClass('ui-state-hover');
							});

							// Keyboard
							$(document).keypress( function(e) {
								switch( e.keyCode ) {
									case 38: // up
										if( $(menu).find('LI.ui-state-hover').size() == 0 ) {
											$(menu).find('LI:last').addClass('ui-state-hover');
										} else {
											$(menu).find('LI.ui-state-hover').removeClass('ui-state-hover').prevAll('LI:not(.ui-state-disabled)').eq(0).addClass('ui-state-hover');
											if( $(menu).find('LI.ui-state-hover').size() == 0 ) $(menu).find('LI:last').addClass('ui-state-hover');
										}
									break;
									case 40: // down
										if( $(menu).find('LI.ui-state-hover').size() == 0 ) {
											$(menu).find('LI:first').addClass('ui-state-hover');
										} else {
											$(menu).find('LI.ui-state-hover').removeClass('ui-state-hover').nextAll('LI:not(.ui-state-disabled)').eq(0).addClass('ui-state-hover');
											if( $(menu).find('LI.ui-state-hover').size() == 0 ) $(menu).find('LI:first').addClass('ui-state-hover');
										}
									break;
									case 13: // enter
										$(menu).find('LI.ui-state-hover A').trigger('click');
									break;
									case 27: // esc
										$(document).trigger('click');
									break
								}
							});

							// When items are selected
							$('#' + o.menu).find('A').unbind('click');
							$('#' + o.menu).find('LI:not(.ui-state-disabled) A').click( function() {
								$(document).unbind('click').unbind('keypress');
								$(".contextMenu").hide();
								// Callback
								if( callback ) callback( $(this).attr('href').substr(1), $(srcElement), {x: x - offset.left, y: y - offset.top, docX: x, docY: y} );
								return false;
							});

							// Hide bindings
							setTimeout( function() { // Delay for Mozilla
								$(document).click( function() {
									$(document).unbind('click').unbind('keypress');
									$(menu).fadeOut(o.outSpeed);
									return false;
								});
							}, 0);
						}
					});
				});

				// Disable text selection
				if( $.browser.mozilla ) {
					$('#' + o.menu).each( function() { $(this).css({ 'MozUserSelect' : 'none' }); });
				} else if( $.browser.msie ) {
					$('#' + o.menu).each( function() { $(this).bind('selectstart.disableTextSelect', function() { return false; }); });
				} else {
					$('#' + o.menu).each(function() { $(this).bind('mousedown.disableTextSelect', function() { return false; }); });
				}
				// Disable browser context menu (requires both selectors to work in IE/Safari + FF/Chrome)
				$(el).add('UL.contextMenu').bind('contextmenu', function() { return false; });

			});
			return $(this);
		},

		// Disable context menu items on the fly
		disableContextMenuItems: function(o) {
			if( o == undefined ) {
				// Disable all
				$(this).find('LI').addClass('ui-state-disabled');
				return( $(this) );
			}
			$(this).each( function() {
				if( o != undefined ) {
					var d = o.split(',');
					for( var i = 0; i < d.length; i++ ) {
						$(this).find('A[href="' + d[i] + '"]').parent().addClass('ui-state-disabled');

					}
				}
			});
			return( $(this) );
		},

		// Enable context menu items on the fly
		enableContextMenuItems: function(o) {
			if( o == undefined ) {
				// Enable all
				$(this).find('LI.ui-state-disabled').removeClass('ui-state-disabled');
				return( $(this) );
			}
			$(this).each( function() {
				if( o != undefined ) {
					var d = o.split(',');
					for( var i = 0; i < d.length; i++ ) {
						$(this).find('A[href="' + d[i] + '"]').parent().removeClass('ui-state-disabled');

					}
				}
			});
			return( $(this) );
		},

		// Disable context menu(s)
		disableContextMenu: function() {
			$(this).each( function() {
				$(this).addClass('ui-state-disabled');
			});
			return( $(this) );
		},

		// Enable context menu(s)
		enableContextMenu: function() {
			$(this).each( function() {
				$(this).removeClass('ui-state-disabled');
			});
			return( $(this) );
		},

		// Destroy context menu(s)
		destroyContextMenu: function() {
			// Destroy specified context menus
			$(this).each( function() {
				// Disable action
				$(this).unbind('mousedown').unbind('mouseup');
			});
			return( $(this) );
		}

	});
})(jQuery);