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
							<li class="imageUpload"><i style="cursor: pointer;" class="imageUpload glyphicon glyphicon-picture"></i></li>
						</label>
						<input id="fileToUpload" multiple accept=".jpg,.jpeg,.png" type="file" name="fileToUpload[]" onchange="validateFileType()">
						<li><a href=""><i class="glyphicon glyphicon-star"></i></a></li>
						<li><a href=""><i class="glyphicon glyphicon-globe"></i></a></li>
						<li><a href=""><i class="glyphicon glyphicon-list-alt"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--post modal-->
<hr>
<div class="row" id="footer">
	<div class="col-sm-6"> </div>
	<div class="col-sm-6">
		<p>
			<a href="#" class="pull-right">José Ferreira Copyright 2022</a>
		</p>
	</div>	
</div>
<hr>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('[data-toggle=offcanvas]').click(function() {
			$(this).toggleClass('visible-xs text-center');
			$(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
			$('.row-offcanvas').toggleClass('active');
			$('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
			$('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
			$('#btnShow').toggle();
		});
	});
</script>
<script type="text/javascript">
    function validateFileType(){
        var fileName = document.getElementById("fileToUpload").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
        }   
    }
</script>
</body>
</html>