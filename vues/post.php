<div class="padding container">
    <div class="full col-sm-9">
        <h1>Nouveau Post</h1>
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
				<!-- /top nav -->
				<div class="padding">
					<div class="full col-sm-9">
						<!-- content -->
						<div class="row">
							<!-- main col right -->
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control"  name="commentaire" id="commentaire" rows="5"></textarea>	
								</div>
								<div class="form-group">
									<input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload[]" accept="image/png, image/gif, image/jpeg" multiple/>
								</div>
								<button type="submit" name="action" value="submit" class="btn btn-primary">Submit</button>
							</div>
							<?= $message ?>
						</div>
					</div>
				</div><!-- /padding -->
				</form>
</div>