<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	  <script
	  src="https://code.jquery.com/jquery-3.4.1.min.js"
	  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <title>Ajax ToDo List</title>
  </head>
  <body>
	<br>
  	<div class="container">
  		<div class="row">
			  <div class="col-lg-offset-3 col-lg-6">
			  	<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">ToDo List <a href="#" class="pull-right" data-toggle="modal" data-target="#exampleModal" id="addNew"><span class="glyphicon glyphicon-plus"></span></a></h3>
				  </div>
				  <div class="panel-body" id="items">
				    <ul class="list-group">
					  @foreach($items as $item)
						<li class="list-group-item ourItem" data-toggle="modal" data-target="#exampleModal">{{ $item->item }}</li>
						<input type="hidden" name="id" id="ourItemId" value="{{$item->id}}">
					  @endforeach
					</ul>

				  </div>
				</div>
			  </div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title" id="title">Add New Item</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <input type="text" placeholder="Write item here" id="addItem" class="form-control">
			        <p id="itemId"></p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="display: none;" id="delete">Delete</button>
			        <button type="button" class="btn btn-primary" style="display: none;" id="saveChanges">Save changes</button>
			        <button type="button" class="btn btn-primary" id="addButton" data-dismiss="modal">Add Item</button>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		{{ csrf_field() }}
		

    <!-- Optional JavaScript -->
    <script>
    	$(document).ready(function(){
    			$(document).on('click', '.ourItem', function(event){
    				var text = $(this).text();
    				var id = $(this).find('#ourItemId').val();
    				$('#title').text('Edit Item');
    				$('#delete').show(200);
    				$('#saveChanges').show(200);
    				$('#addButton').hide(200);
    				$('#addItem').val(text);
    				$('#itemId').val(id);
    		});

    		$(document).on('click', '#addNew', function(event){
    				var text = $(this).text();
    				$('#title').text('Add New Item');
    				$('#delete').hide(200);
    				$('#saveChanges').hide(200);
    				$('#addButton').show(200);
    				$('#addItem').val("");
    			});

    		$('#addButton').click(function(event){
	    			var text = $('#addItem').val();
	    			$.post('list', {'text': text, '_token': $('input[name=_token]').val()}, function(data){
	    				console.log(data);
	    				$('#items').load(location.href+' #items');
	    			});
	    		});

    		$('#delete').click(function(event){
	    			var id = $('#itemId').val();
	    			$.post('delete', {'id': id, '_token': $('input[name=_token]').val()}, function(data){
	    				console.log(data);
	    				$('#items').load(location.href+' #items');
	    			});
	    		});
    		});
    </script>
  </body>
</html>