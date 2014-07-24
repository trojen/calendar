  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<form id="calendar_event">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Create New Event</h4>
        </div>
        <div class="modal-body">
        	<div class="form-group">
        		<label for="title">Time</label>
	        	<div class="row">
					<div class="col-lg-3">
						<input id="start_time" type="text" class="form-control" placeholder="start time">
					</div>
					<div class="col-lg-3">
						<input id="end_time" type="text" class="form-control" placeholder="end time">
					</div>
  				</div>
         		</div>
    			<div class="form-group">
    				<label for="title">title</label>
    				<input id="title" class="form-control" type="text" placeholder="Default input">
    			</div>
    			<div class="form-group">
    				<label for="title">Location</label>
    				<input id="location" class="form-control" type="text" placeholder="Default input">
    			</div>
    			<div class="form-group">
    				<label for="exampleInputFile">Body</label>
    				<textarea id="body" class="form-control" rows="3"></textarea>
    			</div>
          <div id="form_result"></div>
        </div>
        <div class="modal-footer">
          <a href='#' type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
          <a href='#' type="submit" id="submit_event" class="btn btn-primary">Save</a>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </form>
  </div><!-- /.modal -->
    <!-- Modal -->
  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<form id="calendar_event">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Update Event</h4>
        </div>
        <div class="modal-body">
        	<div class="form-group">
        		<label for="title">Time</label>
	        	<div class="row">
					<div class="col-lg-3">
						<input id="start_time_update" type="text" class="form-control" placeholder="start time">
					</div>
					<div class="col-lg-3">
						<input id="end_time_update" type="text" class="form-control" placeholder="end time">
					</div>
				</div>
       		</div>
			<div class="form-group">
				<label for="title">title</label>
				<input id="title_update" class="form-control" type="text" placeholder="Default input">
			</div>
			<div class="form-group">
				<label for="title">Location</label>
				<input id="location_update" class="form-control" type="text" placeholder="Default input">
			</div>
			<div class="form-group">
				<label for="exampleInputFile">Body</label>
				<textarea id="body_update" class="form-control" rows="3"></textarea>
			</div>
      <div class="form-group label-success">
        <label  id="form_result2" class="control-label" for="inputSuccess"></label>
      </div>
        </div>
        <div class="modal-footer">
          <a href='#' type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
          <a href='#' type="submit" id="update_event" class="btn btn-primary">Update</a>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </form>
  </div><!-- /.modal -->