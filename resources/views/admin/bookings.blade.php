<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
    	.table_deg {
    		border: 2px solid white;
    		margin: auto;
    		width: 100%;
    		text-align: center;
    		margin-top: 40px;
    	}

    	.th_deg {
    		background-color: skyblue;
    		padding: 15px;
    	}

    	tr {
    		border: 3px solid white;
    	}

    	td {
    		padding: 10px;
    	}
    </style>
  </head>
  <body>
    <header class="header">   
      @include('admin.header')
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          	<table class="table_deg">
  				<tr>
  					<th class="th_deg">Room_id</th>
  					<th class="th_deg">Customer Name</th>
  					<th class="th_deg">E-mail</th>
  					<th class="th_deg">Phone</th>
  					<th class="th_deg">Arrival Date</th>
  					<th class="th_deg">Departure Date</th>
  					<th class="th_deg">Status</th>
  					<th class="th_deg">Room Title</th>
  					<th class="th_deg">Price</th>
  					<th class="th_deg">Image</th>
  					<th class="th_deg">Delete</th>
  					<th class="th_deg">Update Status</th>
  				</tr>
  				<!-- Отображение зарегистрированных броней из БД. -->
  				@foreach($data as $data)
	  				<tr>
	  					<td>{{$data->room_id}}</td>
	  					<td>{{$data->name}}</td>
	  					<td>{{$data->email}}</td>
	  					<td>{{$data->phone}}</td>
	  					<td>{{$data->start_date}}</td>
						<td>{{$data->end_date}}</td>
						<!-- Подсветка поля Status в зависимости от статуса брони в БД. -->
						<td>
							@if($data->status == 'approved')
								<span style="color: skyblue;">Approved</span>
							@endif
							@if($data->status == 'rejected')
								<span style="color: red;">Rejected</span>
							@endif
							@if($data->status == 'waiting')
								<span style="color: yellow;">Waiting</span>
							@endif
						</td>
						<td>{{$data->room->room_title}}</td>
						<td>${{$data->room->price}}</td>
						<td>
							<img style="width: 200px;" src="/room/{{$data->room->image}}">
						</td>
						<!-- Удалить строку из БД по id. -->
						<td>
							<a onclick="return confirm('Are you sure to delete this (Вы уверены, что хотите удалить запись)?')" class="btn btn-danger" href="{{url('delete_booking', $data->id)}}">Delete</a>
						</td>
						<!-- Кнопки подтверждения и отклонения брони. -->
						<td>
							<span style="padding: 10px;">
								<a class="btn btn-success" href="{{url('approve_book', $data->id)}}">Approve</a>
							</span>
							<a class="btn btn-warning" href="{{url('reject_book', $data->id)}}">Reject</a>
						</td>
	  				</tr>
  				@endforeach
  			</table>
          </div>
        </div>
      </div>
        <footer class="footer">
          @include('admin.footer')
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admin/vendor/chart.js/Chart.min.js"></script>
    <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admin/js/charts-home.js"></script>
    <script src="admin/js/front.js"></script>
  </body>
</html>