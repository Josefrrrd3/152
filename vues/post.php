<div class="padding container">
    <div class="full col-sm-9">
        <h1>Nouveau Post</h1>
    </div>
    <form class="form center-block">
        <div class="modal-body">
            <div class="form-group">
                <textarea class="form-control input-lg"  autofocus="" placeholder="Que veux tu partager?"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <div>
                <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">BoostPost</button>
                <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Publish</button>
                <ul class="pull-left list-inline">
                    <label name="fileToUpload" class="imageUpload" for="fileToUpload">
                        <li class="imageUpload"><i style="cursor: pointer;" class="imageUpload glyphicon glyphicon-picture"></i></li>
                    </label>
                    <input id="fileToUpload" type="file" name="fileToUpload" style="display: none;">
                    <li><a href="#"><i class="glyphicon glyphicon-star imageUpload"></i></a></li>
                    <li><a href=""><i class="glyphicon glyphicon-globe"></i></a></li>
                    <li><a href=""><i class="glyphicon glyphicon-list-alt"></i></a></li>
                    <input id="fileToUpload" multiple  accept=".jpg,.jpeg,.png" type="file" name="fileToUpload" style="display: none;" onchange="validateFileType()">
                </ul>
            </div>
        </div>
    </form>
</div>