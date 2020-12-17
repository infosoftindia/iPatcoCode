
						<style>
							.custom-file {
								width: 100% !important;
							}
							.thumbnail-h-180{
								max-height: 180px !important;
								width: 100% !important;
								object-fit: cover;
								border: 1px solid #179978;
								border-radius: 5px;
								margin-bottom: 5px;
							}

							.thumbnail-h-100{
								height: 100px;
								object-fit: cover;
								padding: 3px;
								border-radius: 10px;
							}
							.mh-150px{
								min-height: 150px;
							}
						</style>
						<form method="POST" enctype="multipart/form-data">
							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Author</div>
												<div class="card-body">
													<div class="form-group mb-3">
														<label for="name">Name</label>
														<input type="text" class="form-control" id="name" placeholder="Name" value="<?=set_value('name') != ''?set_value('name'):$comment['comments_name']?>" name="name">
													</div>
													<div class="form-group mb-3">
														<label for="email">Email</label>
														<input type="text" class="form-control" id="email" placeholder="Email" value="<?=set_value('email') != ''?set_value('email'):$comment['comments_email']?>" name="email">
													</div>
													<div class="form-group mb-3">
														<label for="url">Website</label>
														<input type="text" class="form-control" id="url" placeholder="Website" value="<?=set_value('url') != ''?set_value('url'):$comment['comments_url']?>" name="url">
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Message</div>
												<div class="card-body">
													<div class="form-row">
														<div class="form-group col-md-12">
															<textarea class="form-control" id="message" rows="2" placeholder="Message" name="message"><?=set_value('message') != ''?set_value('message'):$comment['comments_message']?></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Row end -->
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
									<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">More Information</div>
												<div class="card-body">
													<div class="form-group">
														<label for="status">Status</label>
														<select class="form-control form-control-sm" id="status" name="status">
															<option value="1" <?=$comment['comments_status'] == '1'?'selected':''?>>Approved</option>
															<option value="0" <?=$comment['comments_status'] == '0'?'selected':''?>>Pending</option>
														</select>
													</div>
													<button type="submit" class="btn btn-success btn-sm">Save Comment</button>
												</div>
											</div>
										</div>
									</div>
									<!-- Row end -->
								</div>
							</div>
						</form>
