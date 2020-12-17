	function getURLVar(key) {
		var value = [];
		var query = String(document.location).split('?');
		if (query[1]) {
			var part = query[1].split('&');
			for (i = 0; i < part.length; i++) {
				var data = part[i].split('=');
				if (data[0] && data[1]) {
					value[data[0]] = data[1];
				}
			}
			if (value[key]) {
				return value[key];
			} else {
				return '';
			}
		}
	}

	$(document).ready(function() {
		$('button[type=\'submit\']').on('click', function() {
			$("form[id*='form-']").submit();
		});
		$('.text-danger').each(function() {
			var element = $(this).parent().parent();
			if (element.hasClass('form-group')) {
				element.addClass('has-error');
			}
		});
		$('#menu a[href]').on('click', function() {
			sessionStorage.setItem('menu', $(this).attr('href'));
		});
		if (!sessionStorage.getItem('menu')) {
			$('#menu #dashboard').addClass('active');
		} else {
			$('#menu a[href=\'' + sessionStorage.getItem('menu') + '\']').parents('li').addClass('active open');
		}

		if (localStorage.getItem('column-left') == 'active') {
			$('#button-menu i').replaceWith('<i class="fa fa-dedent fa-lg"></i>');
			$('#column-left').addClass('active');
			$('#menu li.active').has('ul').children('ul').addClass('collapse in');
			$('#menu li').not('.active').has('ul').children('ul').addClass('collapse');
		} else {
			$('#button-menu i').replaceWith('<i class="fa fa-indent fa-lg"></i>');
			$('#menu li li.active').has('ul').children('ul').addClass('collapse in');
			$('#menu li li').not('.active').has('ul').children('ul').addClass('collapse');
		}
		$('#button-menu').on('click', function() {
			if ($('#column-left').hasClass('active')) {
				localStorage.setItem('column-left', '');
				$('#button-menu i').replaceWith('<i class="fa fa-indent fa-lg"></i>');
				$('#column-left').removeClass('active');
				$('#menu > li > ul').removeClass('in collapse');
				$('#menu > li > ul').removeAttr('style');
			} else {
				localStorage.setItem('column-left', 'active');
				$('#button-menu i').replaceWith('<i class="fa fa-dedent fa-lg"></i>');
				$('#column-left').addClass('active');
				$('#menu li.open').has('ul').children('ul').addClass('collapse in');
				$('#menu li').not('.open').has('ul').children('ul').addClass('collapse');
			}
		});
		$('#menu').find('li').has('ul').children('a').on('click', function() {
			if ($('#column-left').hasClass('active')) {
				$(this).parent('li').toggleClass('open').children('ul').collapse('toggle');
				$(this).parent('li').siblings().removeClass('open').children('ul.in').collapse('hide');
			} else if (!$(this).parent().parent().is('#menu')) {
				$(this).parent('li').toggleClass('open').children('ul').collapse('toggle');
				$(this).parent('li').siblings().removeClass('open').children('ul.in').collapse('hide');
			}
		});
		$(document).on('click', '[data-toggle=\'tooltip\']', function(e) {
			$('body > .tooltip').remove();
		});
			$('[data-toggle=\'image\']').on('click', function() {
				var $element = $(this);
				var $button = $(this);
				var $icon   = $button.find('> i');
				$('#modal-image').remove();
				var url = 'filemanager/admin?token=' + getURLVar('token') + '&target=' + $element.parent().find('input').attr('id') + '&thumb=' + $element.attr('id');
				$.ajax({
					url: url,
					dataType: 'html',
					beforeSend: function() {
						$button.prop('disabled', true);
						if ($icon.length) {
							$icon.attr('class', 'fa fa-circle-o-notch fa-spin');
						}
					},
					complete: function() {
						$button.prop('disabled', false);
						if ($icon.length) {
							$icon.attr('class', 'fa fa-pencil');
						}
					},
					success: function(html) {
						$('body').append('<div id="modal-image" class="modal">' + html + '</div>');
						$('#modal-image').modal('show');
					}
				});
				// $element.popover('destroy');
			});
		$(document).on('click', '[data-toggle=\'imagex\']', function(e) {
			var $element = $(this);
			var $popover = $element.data('bs.popover');
			e.preventDefault();
			$('[data-toggle="image"]').popover('destroy');
			if ($popover) {
				return;
			}
			$element.popover({
				html: true,
				placement: 'right',
				trigger: 'manual',
				content: function() {
					return '<button type="button" id="button-image" class="btn btn-primary"><i class="fa fa-pencil"></i></button> <button type="button" id="button-clear" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>';
				}
			});
			$element.popover('show');
			$('#button-clear').on('click', function() {
				$element.find('img').attr('src', $element.find('img').attr('data-placeholder'));
				$element.parent().find('input').val('');
				$element.popover('destroy');
			});
		});
		$('[data-toggle=\'tooltip\']').tooltip({container: 'body', html: true});
		$(document).ajaxStop(function() {
			$('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
		});
		$.event.special.remove = {
			remove: function(o) {
				if (o.handler) {
					o.handler.apply(this, arguments);
				}
			}
		}
		$('[data-toggle=\'tooltip\']').on('remove', function() {
			$(this).tooltip('destroy');
		});
	});
	(function($) {
		$.fn.autocomplete = function(option) {
			return this.each(function() {
				var $this = $(this);
				var $dropdown = $('<ul class="dropdown-menu" />');
				this.timer = null;
				this.items = [];
				$.extend(this, option);
				$this.attr('autocomplete', 'off');
				$this.on('focus', function() {
					this.request();
				});
				$this.on('blur', function() {
					setTimeout(function(object) {
						object.hide();
					}, 200, this);
				});
				$this.on('keydown', function(event) {
					switch(event.keyCode) {
						case 27:
							this.hide();
							break;
						default:
							this.request();
							break;
					}
				});
				this.click = function(event) {
					event.preventDefault();
					var value = $(event.target).parent().attr('data-value');
					if (value && this.items[value]) {
						this.select(this.items[value]);
					}
				}
				this.show = function() {
					var pos = $this.position();
					$dropdown.css({
						top: pos.top + $this.outerHeight(),
						left: pos.left
					});
					$dropdown.show();
				}
				this.hide = function() {
					$dropdown.hide();
				}
				this.request = function() {
					clearTimeout(this.timer);
					this.timer = setTimeout(function(object) {
						object.source($(object).val(), $.proxy(object.response, object));
					}, 200, this);
				}
				this.response = function(json) {
					var html = '';
					var category = {};
					var name;
					var i = 0, j = 0;
					if (json.length) {
						for (i = 0; i < json.length; i++) {
							this.items[json[i]['value']] = json[i];
							if (!json[i]['category']) {
								html += '<li data-value="' + json[i]['value'] + '"><a href="#">' + json[i]['label'] + '</a></li>';
							} else {
								name = json[i]['category'];
								if (!category[name]) {
									category[name] = [];
								}
								category[name].push(json[i]);
							}
						}
						for (name in category) {
							html += '<li class="dropdown-header">' + name + '</li>';
							for (j = 0; j < category[name].length; j++) {
								html += '<li data-value="' + category[name][j]['value'] + '"><a href="#">&nbsp;&nbsp;&nbsp;' + category[name][j]['label'] + '</a></li>';
							}
						}
					}
					if (html) {
						this.show();
					} else {
						this.hide();
					}
					$dropdown.html(html);
				}
				$dropdown.on('click', '> li > a', $.proxy(this.click, this));
				$this.after($dropdown);
			});
		}
	})(window.jQuery);
