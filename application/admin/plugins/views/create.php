
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
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">New Plugin</div>
												<div class="card-body">
													<div class="form-group mb-3">
														<label for="name">Browse Plugin</label>
														<input type="file" class="form-control" id="name" placeholder="Page Title" value="<?=set_value('title')?>" name="title">
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Row end -->
								</div>
							</div>
						</form>
