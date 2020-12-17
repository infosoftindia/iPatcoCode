
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
												<div class="card-header">General Information</div>
												<div class="card-body">
													<div class="form-group mb-3">
														<label for="name">Page Title</label>
														<input type="text" class="form-control" id="name" placeholder="Page Title" value="<?=set_value('title') != ''?set_value('title'):$post['posts_title']?>" name="title">
													</div>
													<div class="form-group mh-150px mb-3">
														<label for="desc" class="mb-3">Page Content</label>
														<textarea class="form-control editor" id="desc" rows="6" placeholder="Page Content" name="description"><?=set_value('description') != ''?set_value('description'):$post['pages_description']?></textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">SEO</div>
												<div class="card-body">
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="keyword">Meta Keywords</label>
															<input type="text" class="form-control" id="keyword" placeholder="Meta Keywords" value="<?=set_value('keyword') != ''?set_value('keyword'):$post['seo_keyword']?>" name="keyword">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="meta_desc">Meta Description</label>
															<textarea class="form-control" id="meta_desc" rows="2" placeholder="Meta Description" name="meta_desc"><?=set_value('meta_desc') != ''?set_value('meta_desc'):$post['seo_description']?></textarea>
														</div>
													</div>
													<button type="submit" class="btn btn-success ">Save Page</button>
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
															<option value="1">Active</option>
															<option value="0">Inactive</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Thumbnail Image</div>
												<div class="card-body">
													<img src="<?=$thumbnail?>" class="img-fluid thumbnail-h-180" id="img_thumbnail">
													<label class="btn btn-info btn-block" data-toggle="image"> Browse
														<input type="file" id="file2" class="custom-file-input" name="userfile" onchange="readURL(this, '#img_thumbnail');" hidden>
														<span class="custom-file-control"></span>
													</label>
													<input type="hidden" name="old_Picture" value="<?=$post['posts_cover']?>" id="input-image" />
												</div>
											</div>
										</div>
									</div>
									<!-- Row end -->
								</div>
							</div>
						</form>
