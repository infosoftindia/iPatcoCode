<style>
	
</style>
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Comments</div>
									<div class="card-body">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th width="5%">#</th>
													<th width="20%">Author</th>
													<th width="45%">Comments</th>
													<th width="20%">Post</th>
													<th width="10%">Date</th>
												</tr>
											</thead>
											<tbody>
												<?php if($comments){ $count = 1; foreach($comments as $comment){ ?>
												<tr class="table-row">
													<td><?=$count++?></td>
													<td>
														<?=$comment['comments_name']?>
														<p><small class="table-small"><?=$comment['comments_email']?><br><?=$comment['comments_url']?></small></p>
													</td>
													<td>
														<?=$comment['comments_message']?>
														<p><small class="table-small">
															<a href="<?=admin_url('comments/edit/'.$comment['comments_id'])?>" class="mr-1 text-primary">Edit</a>
															<?=($comment['comments_status'] == 0)?'<a href="'.admin_url('comments/approve/'.$comment['comments_id']).'" class="mr-1 text-success">Approve</a>':''?>
															<a href="<?=admin_url('comments/delete/'.$comment['comments_id'])?>" class="mr-1 text-danger">Delete</a>
															<a href="javascript:;" data-toggle="modal" data-target="#myModal" onclick="show_Modal('<?=admin_url('comments/reply/'.$comment['comments_id'])?>', '#modal_Output')" class="mr-1 text-info">Reply</a>
														</small>&nbsp;</p>
													</td>
													<td><?=$comment['posts_title']?></td>
													<td>
														<div><?=($comment['comments_status'] == '1')?'Approved':'Pending';?></div>
														<div><small><?=date(getenv('DateFormat'), strtotime($comment['comments_created']))?></small></div>
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
										<h4 class="modal-title">Reply Comment</h4>
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

