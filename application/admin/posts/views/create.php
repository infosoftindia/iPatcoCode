
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
						</style>
						<form method="POST" enctype="multipart/form-data">
							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
									<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">General Information</div>
												<div class="card-body">
													<div class="form-group mb-3">
														<label for="name">Post Title</label>
														<input type="text" class="form-control" id="name" placeholder="Post Title" value="<?=set_value('title')?>" name="title">
													</div>
													<div class="form-group  mb-3">
														<label for="short_desc">Excert Description</label>
														<textarea class="form-control" id="short_desc" rows="2" placeholder="Excert Description" name="short_desc"><?=set_value('short_desc')?></textarea>
													</div>
													<div class="form-group  mb-3">
														<label for="desc">Description</label>
														<textarea class="form-control editor" id="desc" rows="6" placeholder="Product Description" name="description"><?=set_value('description')?></textarea>
													</div>
													
													<div class="form-group  mb-3">
														<label for="desc">Address</label>
														<input type="text" class="form-control" id="autocomplete" name="address_raw">
														<input type="hidden" name="address" id="address_value">
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
															<input type="text" class="form-control" id="keyword" placeholder="Meta Keywords" value="<?=set_value('keyword')?>" name="keyword">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="meta_desc">Meta Description</label>
															<textarea class="form-control" id="meta_desc" rows="2" placeholder="Meta Description" name="meta_desc"><?=set_value('meta_desc')?></textarea>
														</div>
													</div>
													<button type="submit" class="btn btn-success ">Save Post</button>
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
												<div class="card-header">Categories</div>
												<div class="card-body">
													<div class="form-group">
														<select class="form-control selectF" name="category[]" multiple style="width: 100%">
															<?php if($categories){ foreach($categories as $category){ ?>
																<option value="<?=$category->categories_id?>"><?=$category->categories_name?></option>
															<?php } } ?>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Tags</div>
												<div class="card-body">
													<div class="form-group">
														<select class="form-control selectF" name="tags[]" multiple style="width: 100%">
															<?php if($tags){ foreach($tags as $tag){ ?>
																<option value="<?=$tag->tags_id?>"><?=$tag->tags_name?></option>
															<?php } } ?>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<div class="card">
												<div class="card-header">Status</div>
												<div class="card-body">
													<div class="form-group">
														<label for="status">Status</label>
														<select class="form-control form-control-sm" id="status" name="status">
															<option value="1" <?=set_value('status') == '1'?'selected':''?>>Active</option>
															<option value="0" <?=set_value('status') == '0'?'selected':''?>>Inactive</option>
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
													<label class="btn btn-info btn-block"> Browse
														<input type="file" id="file2" class="custom-file-input" name="userfile" onchange="readURL(this, '#img_thumbnail');" hidden>
														<span class="custom-file-control"></span>
													</label>
													<input type="hidden" name="profile" value="" id="input-image" />
												</div>
											</div>
										</div>
									</div>
									<!-- Row end -->
								</div>
							</div>
						</form>
