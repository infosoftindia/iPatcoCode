
	<form method="POST" action="<?=admin_url('posts/tags/update/'.$tag->tags_id)?>">
		<div class="form-group mb-3">
			<label for="name">Tag Name</label>
			<input type="text" class="form-control" id="name" placeholder="Tag Name" value="<?=$tag->tags_name?>" name="name">
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="description">Tag Description</label>
				<textarea class="form-control" id="description" rows="2" placeholder="Tag Description" name="description"><?=$tag->tags_description?></textarea>
			</div>
		</div>
		<button type="submit" class="btn btn-success ">Update Tag</button>
	</form>

