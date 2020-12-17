	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
			<div class="card">
				<div class="card-header">Reply Message</div>
				<div class="card-body">
					<form action="<?=admin_url('comments/save_reply/'.$id)?>" method="POST">
						<div class="form-row">
							<div class="form-group col-md-12">
								<textarea class="form-control" id="message" rows="3" placeholder="Reply Message" name="message"></textarea>
							</div>
							<button type="submit" class="btn btn-success btn-sm">Save Reply</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>