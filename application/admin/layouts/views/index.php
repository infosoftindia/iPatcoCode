
			<?=$header?>
			<!-- BEGIN .app-container -->
			<div class="app-container">
				<?=$sidebar?>
				<!-- BEGIN .app-main -->
				<div class="app-main">
					<?=$pagetitle?>
					<!-- BEGIN .main-content -->
					<div class="main-content">
						<?=alert('info', 'msg')?>
						<?=alert('danger', 'error')?>
						<?=alert('success', 'success')?>
						<?=alert('warning', 'warning')?>
						<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Welcome to iPatco CMS. A developer friendly free modular open source codebase CMS.
						</div>
						<?=$page?>
					</div>
				</div>
				<!-- END: .app-main -->
			</div>
			<!-- END: .app-container -->
		<?=$footer?>