
			<!-- BEGIN .main-footer -->
			<footer class="main-footer fixed-btm">
				Copyright &copy; <?=date('Y')?> Powered by <span onclick="location.href='//ipatco.net'" style="cursor: pointer">iPatco CMS</span>
			</footer>
			<!-- END: .main-footer -->
		</div>
		<div id="popupBrowser"></div>
		
		
		<div class="modal fade" id="admin_model" tabindex="-1" role="dialog" aria-labelledby="admin_model_title" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="admin_model_title">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="admin_model_body"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		
		<!-- END: .app-wrap -->
		<?=$js?>
		<script>
			$(function(){
				var url = window.location;
				$('.unifyMenu li a').filter(function() {
					return this.href == url;
				}).addClass('current-page active').parent().addClass('selected');
				$('.unifyMenu li a').filter(function() {
					return this.href == url;
				}).parent().parent().parent().addClass('active selected');
				$('.unifyMenu li a').filter(function() {
					return this.href == url;
				}).parent().parent().removeClass('collapse');
			});
		</script>
	</body>
</html>