

		<!-- jQuery first, then Tether, then other JS. -->
		<script src="http://code.jquery.com/jquery-3.1.0.min.js" crossorigin="anonymous"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<script src="<?=base_url()?>assets/js/tether.min.js"></script>
		<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>assets/vendor/unifyMenu/unifyMenu.js"></script>
		<script src="<?=base_url()?>assets/vendor/onoffcanvas/onoffcanvas.js"></script>
		<script src="<?=base_url()?>assets/js/moment.js"></script>
		<script src="<?=base_url()?>assets/custom.js"></script>
		<script src="<?=base_url()?>assets/js/common.js"></script>
		<script src="<?=base_url()?>assets/js/filemanager.js"></script>
		
		<script src="<?=base_url()?>assets/fselect/fSelect.js"></script>

		<!-- Sparkline JS -->
		<script src="<?=base_url()?>assets/vendor/sparkline/sparkline-retina.js"></script>
		<script src="<?=base_url()?>assets/vendor/sparkline/custom-sparkline.js"></script>

		<!-- Slimscroll JS -->
		<script src="<?=base_url()?>assets/vendor/slimscroll/slimscroll.min.js"></script>
		<script src="<?=base_url()?>assets/vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Chartist JS 
		<script src="<?=base_url()?>assets/vendor/chartist/js/chartist.min.js"></script>
		<script src="<?=base_url()?>assets/vendor/chartist/js/chartist-tooltip.js"></script>
		<script src="<?=base_url()?>assets/vendor/chartist/js/custom/custom-line-chart3.js"></script>
		<script src="<?=base_url()?>assets/vendor/chartist/js/custom/custom-area-chart.js"></script>
		<script src="<?=base_url()?>assets/vendor/chartist/js/custom/donut-chart2.js"></script>
		<script src="<?=base_url()?>assets/vendor/chartist/js/custom/custom-line-chart4.js"></script>-->
		<?=get_admin_footer()?>
		
		<script src="<?=base_url()?>assets/vendor/lobipanel/lobipanel.js"></script>
		<script src="<?=base_url()?>assets/vendor/lobipanel/lobipanel-custom.js"></script>
		<script src="https://cdn.tiny.cloud/1/yw1n0ic7w5r3u36daehf5bhxj2xo4wswx7x38xf2be70ca9y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCl0P9XhObCh2sQI49R7jKldEfZ1BKxfgk&callback=initAutocomplete&libraries=places&v=weekly" defer></script>

		<script>
			"use strict";
			let placeSearch;
			let autocomplete;
			const componentForm = {
				street_number: "short_name",
				route: "long_name",
				locality: "long_name",
				administrative_area_level_1: "short_name",
				country: "long_name",
				postal_code: "short_name"
			};

			function initAutocomplete() {
				autocomplete = new google.maps.places.Autocomplete(
					document.getElementById("autocomplete"), { types: ["geocode"], componentRestrictions: {country: 'au'} }
				);
				autocomplete.setFields(["address_component"]);
				autocomplete.addListener("place_changed", fillInAddress);
			}

			function fillInAddress() {
				const place = autocomplete.getPlace();
				var address = '';
				if (place.address_components) {
					address = [
						(place.address_components[0] && place.address_components[0].short_name || ''),
						(place.address_components[1] && place.address_components[1].short_name || ''),
						(place.address_components[2] && place.address_components[2].short_name || '')
					].join(' ');
					$('#fillin').val(address);
				}
				for (const component in componentForm) {
					document.getElementById(component).value = "";
					document.getElementById(component).disabled = false;
				}
				for (const component of place.address_components) {
					const addressType = component.types[0];
					if (componentForm[addressType]) {
						const val = component[componentForm[addressType]];
						document.getElementById(addressType).value = val;
					}
				}
			}

			function geolocate() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(position => {
						const geolocation = {
							lat: position.coords.latitude,
							lng: position.coords.longitude
						};
						const circle = new google.maps.Circle({
							center: geolocation,
							radius: position.coords.accuracy
						});
						autocomplete.setBounds(circle.getBounds());
					});
				}
			}
		</script>
		
		<script type="text/javascript">
			// function updateImp(id, val){
			// 	$('.iPatcoLoad').show();
			// 	$.post('<?=admin_url("accomodation/amenities_imp")?>', { id : id, status : val }, function(){
			// 		$('.iPatcoLoad').hide();
			// 	});
			// }
		$(document).ready(function(){
			$("#filer_input").filer({
				limit: null,
				maxSize: null,
				extensions: null,
				changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',
				showThumbs: true,
				theme: "dragdropbox",
				templates: {
					box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
					item: '<li class="jFiler-item">\
								<div class="jFiler-item-container">\
									<div class="jFiler-item-inner">\
										<div class="jFiler-item-thumb">\
											<div class="jFiler-item-status"></div>\
											<div class="jFiler-item-thumb-overlay">\
												<div class="jFiler-item-info">\
													<div style="display:table-cell;vertical-align: middle;">\
														<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
														<span class="jFiler-item-others">{{fi-size2}}</span>\
													</div>\
												</div>\
											</div>\
											{{fi-image}}\
										</div>\
										<div class="jFiler-item-assets jFiler-row">\
											<ul class="list-inline pull-left">\
												<li>{{fi-progressBar}}</li>\
											</ul>\
											<ul class="list-inline pull-right">\
												<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
											</ul>\
										</div>\
									</div>\
								</div>\
							</li>',
					itemAppend: '<li class="jFiler-item">\
									<div class="jFiler-item-container">\
										<div class="jFiler-item-inner">\
											<div class="jFiler-item-thumb">\
												<div class="jFiler-item-status"></div>\
												<div class="jFiler-item-thumb-overlay">\
													<div class="jFiler-item-info">\
														<div style="display:table-cell;vertical-align: middle;">\
															<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
															<span class="jFiler-item-others">{{fi-size2}}</span>\
														</div>\
													</div>\
												</div>\
												{{fi-image}}\
											</div>\
											<div class="jFiler-item-assets jFiler-row">\
												<ul class="list-inline pull-left">\
													<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
												</ul>\
												<ul class="list-inline pull-right">\
													<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
												</ul>\
											</div>\
										</div>\
									</div>\
								</li>',
					progressBar: '<div class="bar"></div>',
					itemAppendToEnd: false,
					canvasImage: true,
					removeConfirmation: true,
					_selectors: {
						list: '.jFiler-items-list',
						item: '.jFiler-item',
						progressBar: '.bar',
						remove: '.jFiler-item-trash-action'
					}
				},
				dragDrop: {
					dragEnter: null,
					dragLeave: null,
					drop: null,
					dragContainer: null,
				},
				uploadFile: {
					url: "./php/ajax_upload_file.php",
					data: null,
					type: 'POST',
					enctype: 'multipart/form-data',
					synchron: true,
					beforeSend: function(){},
					success: function(data, itemEl, listEl, boxEl, newInputEl, inputEl, id){
						var parent = itemEl.find(".jFiler-jProgressBar").parent(),
							new_file_name = JSON.parse(data),
							filerKit = inputEl.prop("jFiler");

						filerKit.files_list[id].name = new_file_name;

						itemEl.find(".jFiler-jProgressBar").fadeOut("slow", function(){
							$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
						});
					},
					error: function(el){
						var parent = el.find(".jFiler-jProgressBar").parent();
						el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
							$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");
						});
					},
					statusCode: null,
					onProgress: null,
					onComplete: null
				},
				files: null,
				addMore: false,
				allowDuplicates: true,
				clipBoardPaste: true,
				excludeName: null,
				beforeRender: null,
				afterRender: null,
				beforeShow: null,
				beforeSelect: null,
				onSelect: null,
				afterShow: null,
				onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){
					var filerKit = inputEl.prop("jFiler"),
						file_name = filerKit.files_list[id].name;

					$.post('./php/ajax_remove_file.php', {file: file_name});
				},
				onEmpty: null,
				options: null,
				dialogs: {
					alert: function(text) {
						return alert(text);
					},
					confirm: function (text, callback) {
						confirm(text) ? callback() : null;
					}
				},
				captions: {
					button: "Choose Files",
					feedback: "Choose files To Upload",
					feedback2: "files were chosen",
					drop: "Drop file here to Upload",
					removeConfirmation: "Are you sure you want to remove this file?",
					errors: {
						filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
						filesType: "Only Images are allowed to be uploaded.",
						filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
						filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
					}
				}
			});
		});

			var textInput = '';
			var imgInput = '';
			(function($) {
				$(function() {
					window.fs_test = $('.selectF').fSelect({
						numDisplayed: 3,
						overflowText: '{n} selected',
						noResultsText: 'No results found',
						searchText: 'Search',
						showSearch: true
					});
				});
			})(jQuery);
			tinymce.init({
				selector: '.editor',
				plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
				toolbar_mode: 'floating',
				height : "480"
			});
			
			// $('.browser').popupWindow({
			// 	windowURL:'<?=base_url("plugins/elfinder/elfinder.htm")?>', 
			// 	windowName:'iPatco File Browser',
			// 	height:490, 
			// 	width:950,
			// 	centerScreen:1,
			// 	resizable:0
			// });
			
			$('.browser').click(function(){
				// alert(textInput)
			});
			 
			function processFile(file){
				var textInput = $('.browser').data('text');
				var imgInput = $('.browser').data('img');
				var file = file.split(":").pop();
				$(textInput).val(file);
				$(imgInput).attr('src', file);
			}
			
		</script>
