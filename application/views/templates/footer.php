		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
			

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">
				<div class="container">

					<div class="row col-mb-30">

						<div class="col-md-6 text-center text-md-left">
							Copyrights &copy; 2020 All Rights Reserved by Salee Colour PCL.<br>
							<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
						</div>

						<div class="col-md-6 text-center text-md-right">
							<div class="d-flex justify-content-center justify-content-md-end">
								<a href="#" class="social-icon si-small si-borderless si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-pinterest">
									<i class="icon-pinterest"></i>
									<i class="icon-pinterest"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-vimeo">
									<i class="icon-vimeo"></i>
									<i class="icon-vimeo"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-github">
									<i class="icon-github"></i>
									<i class="icon-github"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-yahoo">
									<i class="icon-yahoo"></i>
									<i class="icon-yahoo"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-linkedin">
									<i class="icon-linkedin"></i>
									<i class="icon-linkedin"></i>
								</a>
							</div>

							<div class="clear"></div>

							<i class="icon-envelope2"></i> test <span class="middot">&middot;</span> <i class="icon-headphones"></i> test <span class="middot">&middot;</span> <i class="icon-skype2"></i> test
						</div>

					</div>

				</div>
			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->

		</div><!-- #wrapper end -->

		<!-- Go To Top
	============================================= -->
		<div id="gotoTop" class="icon-angle-up"></div>

		<!-- JavaScripts
	============================================= -->
		<script src="<?= base_url('assets/') ?>js/jquery.js"></script>
		<script src="<?= base_url('assets/') ?>js/plugins.min.js"></script>

		<!-- Star Rating Plugin -->
		<script src="<?= base_url('assets/') ?>js/components/star-rating.js"></script>

		<!-- Footer Scripts
	============================================= -->
		<script src="<?= base_url('assets/') ?>js/functions.js"></script>

		<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
		<script src="<?= base_url('assets/') ?>include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="<?= base_url('assets/') ?>include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

		<script src="<?= base_url('assets/') ?>include/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
		<script src="<?= base_url('assets/') ?>include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
		<script src="<?= base_url('assets/') ?>include/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
		<script src="<?= base_url('assets/') ?>include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script src="<?= base_url('assets/') ?>include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
		<script src="<?= base_url('assets/') ?>include/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
		<script src="<?= base_url('assets/') ?>include/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
		<script src="<?= base_url('assets/') ?>include/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>

		<!-- Bootstrap File Upload Plugin -->
		<script src="<?= base_url('assets/') ?>js/components/bs-filestyle.js"></script>


		<!-- Bootstrap Data Table Plugin -->
		<script src="<?= base_url('assets/') ?>js/components/bs-datatable.js"></script>



		<!-- Custom js -->
		<script src="<?= base_url('assets/') ?>js/custom/control.js"></script>
		<script src="<?= base_url('assets/') ?>js/custom/function.js"></script>
		<script src="<?= base_url('assets/') ?>js/main.js"></script>



		<script>
			var tpj = jQuery;
			tpj.noConflict();
			var $ = jQuery.noConflict();

			tpj(document).ready(function() {

				var apiRevoSlider = tpj('#rev_slider_ishop').show().revolution({
					sliderType: "standard",
					jsFileLocation: "include/rs-plugin/js/",
					sliderLayout: "fullwidth",
					dottedOverlay: "none",
					delay: 9000,
					navigation: {},
					responsiveLevels: [1200, 992, 768, 480, 320],
					gridwidth: 1140,
					gridheight: 500,
					lazyType: "none",
					shadow: 0,
					spinner: "off",
					autoHeight: "off",
					disableProgressBar: "on",
					hideThumbsOnMobile: "off",
					hideSliderAtLimit: 0,
					hideCaptionAtLimit: 0,
					hideAllCaptionAtLilmit: 0,
					debugMode: false,
					fallbacks: {
						simplifyAll: "off",
						disableFocusListener: false,
					},
					navigation: {
						keyboardNavigation: "off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation: "off",
						onHoverStop: "off",
						touch: {
							touchenabled: "on",
							swipe_threshold: 75,
							swipe_min_touches: 1,
							swipe_direction: "horizontal",
							drag_block_vertical: false
						},
						arrows: {
							style: "ares",
							enable: true,
							hide_onmobile: false,
							hide_onleave: false,
							tmp: '<div class="tp-title-wrap">	<span class="tp-arr-titleholder">{{title}}</span> </div>',
							left: {
								h_align: "left",
								v_align: "center",
								h_offset: 10,
								v_offset: 0
							},
							right: {
								h_align: "right",
								v_align: "center",
								h_offset: 10,
								v_offset: 0
							}
						}
					}
				});

				apiRevoSlider.on("revolution.slide.onloaded", function(e) {
					SEMICOLON.slider.sliderDimensions();
				});



				// tinymce.init({
				// 	selector: '#kb_detail , #kb_cause , #kb_action , #kb_conclusion',
				// 	menubar: false,
				// 	setup: function(editor) {
				// 		editor.on('change', function(e) {
				// 			editor.save();
				// 		});
				// 	}
				// });





			}); //ready



			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
				'use strict';
				window.addEventListener('load', function() {
					// Fetch all the forms we want to apply custom Bootstrap validation styles to
					var forms = document.getElementsByClassName('needs-validation');
					// Loop over them and prevent submission
					var validation = Array.prototype.filter.call(forms, function(form) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
					});
				}, false);
			})();
		</script>

		</body>

		</html>