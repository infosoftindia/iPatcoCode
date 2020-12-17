<style>
	
</style>
						<div class="row gutters">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
								<div class="card">
									<div class="card-header">Add New Tag</div>
									<div class="card-body">
										<form method="POST">
											<div class="form-row">
												<div class="form-group col-md-12">
													<label for="name">Tag Name</label>
													<input type="text" class="form-control" id="name" placeholder="Tag Name" value="<?=set_value('name')?>" name="name">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-12">
													<label for="description">Tag Description</label>
													<textarea class="form-control" id="description" rows="2" placeholder="Tag Description" name="description"><?=set_value('description')?></textarea>
												</div>
											</div>
											<button type="submit" class="btn btn-success ">Save Tag</button>
										</form>
									</div>
								</div>
							</div>
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
								<div class="card">
									<div class="card-header">Manage Tags</div>
									<div class="card-body">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th width="">#</th>
													<th width="">Tag Name</th>
												</tr>
											</thead>
											<tbody>
												<?php if($tags){ $count = 1; foreach($tags as $tag){ ?>
												<tr class="table-row">
													<td><?=$count++?></td>
													<td>
														<?=$tag->tags_name?>
														<p><small class="table-small">
															<a href="javascript:;" data-toggle="modal" data-target="#myModal" onclick="show_Modal('<?=admin_url('posts/tags/edit/'.$tag->tags_id)?>', '#modal_Output')" class="mr-1 text-success">Edit</a>
															<a href="<?=admin_url('posts/tags/delete/'.$tag->tags_id)?>" class="mr-1 text-danger">Delete</a>
															<a href="<?=admin_url('tag/'.$tag->tags_name)?>" class="mr-1 text-info">View</a>
														</small>&nbsp;</p>
													</td>
												</tr>
												<?php } } ?>
											</tbody>
										</table>
										<div class="text-right">
											<ul class="pagination pagination-sm float-right">
												<li class="page-item"><a class="page-link" href="#">Previous</a></li>
												<li class="page-item"><a class="page-link active" href="#">1</a></li>
												<li class="page-item"><a class="page-link" href="#">2</a></li>
												<li class="page-item"><a class="page-link" href="#">3</a></li>
												<li class="page-item"><a class="page-link" href="#">Next</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="myModal">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Edit Tag</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body" id="modal_Output">
										Modal body..
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>

