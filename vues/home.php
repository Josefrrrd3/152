					  <div class="padding">
					  	<div class="full col-sm-9">

					  		<!-- content -->
					  		<div class="row">

					  			<!-- main col left -->
					  			<div class="col-sm-5">

					  				<div class="panel panel-default">
					  					<div class="panel-thumbnail"><img src="media/img/bg_5.jpg" class="img-responsive"></div>
					  					<div class="panel-body">
					  						<p class="lead">CFPT</p>
					  						<p>45 Followers, 13 Posts</p>

					  						<p>
					  							<img src="media/img/uFp_tsTJboUY7kue5XAsGAs28.png" height="28px" width="28px">
					  						</p>
					  					</div>
					  				</div>


					  				<div class="panel panel-default">
					  					<div class="panel-heading"><a href="#" class="pull-right">View all</a>
					  						<h4>Bootstrap Examples</h4>
					  					</div>
					  					<div class="panel-body">
					  						<div class="list-group">
					  							<a href="#" class="list-group-item">Modal / Dialog</a>
					  							<a href="#" class="list-group-item">Datetime Examples</a>
					  							<a href="#" class="list-group-item">Data Grids</a>
					  						</div>
					  					</div>
					  				</div>

					  				<div class="well">
					  					<form class="form-horizontal" role="form">
					  						<h4>What's New</h4>
					  						<div class="form-group" style="padding:14px;">
					  							<textarea class="form-control" placeholder="Update your status"></textarea>
					  						</div>
					  						<button class="btn btn-primary <?= ($uc == 'Post') ? "active" : "" ?>" type="button"> Post</button>
					  						<ul class="list-inline">
					  							<li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li>
					  							<li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li>
					  							<li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li>
					  						</ul>
					  					</form>
					  				</div>

					  			</div>

					  			<!-- main col right -->
					  			<div class="col-sm-7">

					  				<div class="panel panel-default">
					  					<div class="panel-heading">
					  						<h1>Bienvenu</h1>
					  					</div>
					  				</div>

					  				<div class="panel panel-default">
					  					<div class="panel-thumbnail"><img src="media/img/bg_4.jpg" class="img-responsive"></div>
					  					<div class="panel-body">
					  						<p class="lead">Social Good</p>
					  						<p>1,200 Followers, 83 Posts</p>

					  						<p>
					  							<img src="media/img/photo.jpg" height="28px" width="28px">
					  							<img src="media/img/photo.png" height="28px" width="28px">
					  							<img src="media/img/photo_002.jpg" height="28px" width="28px">
					  						</p>
					  					</div>
					  				</div>

					  			</div>
					  		</div>
					  		<!--/row-->

					  		<!--post modal-->
					  		<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
					  			<div class="modal-dialog">
					  				<div class="modal-content">
					  					<div class="modal-header">
					  						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					  						Nouveau Post
					  					</div>
					  					<div class="modal-body">
					  						<form class="form center-block">
					  							<div class="form-group">
					  								<textarea class="form-control input-lg" autofocus="" placeholder="Que veux tu partager?"></textarea>
					  							</div>
					  						</form>
					  					</div>
					  					<div class="modal-footer">
					  						<div>
					  							<button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">BoostPost</button>
					  							<button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Publish</button>
					  							<ul class="pull-left list-inline">
												  <label name="fileToUpload" class="imageUpload" for="fileToUpload">
												  
					  								<li><a class="imageUpload href=""><i class="imageUpload glyphicon glyphicon-picture"></i></a></li>
													  </label>
					  								<li><a href=""><i class="glyphicon glyphicon-star"></i></a></li>
					  								<li><a href=""><i class="glyphicon glyphicon-globe"></i></a></li>
					  								<li><a href=""><i class="glyphicon glyphicon-list-alt"></i></a></li>
					  								<input id="fileToUpload" type="file" name="fileToUpload" style="display: none;">
					  							</ul>
					  						</div>
					  					</div>
					  				</div>
					  			</div>
					  		</div>