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
				    <input type="text" placeholder="Write item here" id="addItem" class="form-control">
				    <button class="btn btn-primary form-control" id="addButton">Add Item</button>
				  </div>
				  <div class="panel-body items" id="items">
				    <ul class="list-group">
					  @foreach($items as $item)
						<li class="list-group-item ourItem">{{ $item->item }}</li>
					  @endforeach
					</ul>

				  </div>
				</div>
			  </div>
			</div>
		</div>
		{{ csrf_field() }}
		

    <!-- Optional JavaScript -->
    <script>
    	$(document).ready(function(){
    		$("#addButton").click(function(event){
    			var itemName = $("#addItem").val();
    			$.ajax({
    				url: "/practice",

    				data: {
			        text: itemName,
			        _token: $('input[name=_token]').val()
			    	},

			    	type: "POST",

			    	dataType : "json"
					})
    		});

    		$("#addButton").click(function(event){
    			$("#items").load(location.href + " #items");
    		});
    	});
    </script>
  </body>
</html>