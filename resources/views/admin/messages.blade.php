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
    
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          	<table class="table_deg">
  				<tr>
  					<th class="th_deg">Name</th>
  					<th class="th_deg">E-mail</th>
  					<th class="th_deg">Phone</th>
  					<th class="th_deg">Message</th>
  					<th class="th_deg">Send Message</th>
  				</tr>
      				
      				<!-- Парсинг данных из БД на страницу. -->
      			@foreach($data as $data)
      				<tr>
      					<td>{{$data->name}}</td>
      					<td>{{$data->email}}</td>
      					<td>{{$data->phone}}</td>
      					<td>{{$data->message}}</td>
      					<td>
      						<a class="btn btn-success" href="{{url('send_mail', $data->id)}}">Send mail</a>
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