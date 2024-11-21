<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
    	.table_deg {
    		border: 2px solid white;
    		margin: auto;
    		width: 80%;
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
      					<th class="th_deg">Room Title</th>
      					<th class="th_deg">Description</th>
      					<th class="th_deg">Price</th>
      					<th class="th_deg">Wi-Fi</th>
      					<th class="th_deg">Room Type</th>
      					<th class="th_deg">Image</th>
      					<th class="th_deg">Delete</th>
      					<th class="th_deg">Update</th>
      				</tr>
      				
      				<!-- Парсинг данных из БД на страницу. -->
      				@foreach($data as $data)
      				<tr>
      					<td>{{$data->room_title}}</td>
      					<td>{!! Str::limit($data->description,150) !!}</td>
      					<td>${{$data->price}}</td>
      					<td>{{$data->wifi}}</td>
      					<td>{{$data->room_type}}</td>
      					<td>
      						<img width="100" src="room/{{$data->image}}">
      					</td>
      					<td>
      						<!-- Удалить строку из БД по id. -->
      						<a onclick="return confirm('Are you sure to delete this (Вы уверены, что хотите удалить)?')" class="btn btn-danger" href="{{url('delete_room', $data->id)}}">Delete</a>
      					</td>
      					<td>
      						<!-- Обновить данные в записи БД. -->
      						<a class="btn btn-warning" href="{{url('update_room', $data->id)}}">Update</a>
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