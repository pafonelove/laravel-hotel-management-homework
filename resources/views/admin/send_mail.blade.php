<!DOCTYPE html>
<html>
  <head>
  	<base href="/public">
    @include('admin.css')
    <style type="text/css">
   		label {
   			display: inline-block;
   			width: 200px;
   		}

   		.div_deg {
   			padding-top: 30px;
   		}

   		.div_center {
   			text-align: center;
   			padding-top: 40px;
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
          	<center>
          		<h1 style="font-size: 30px; font-weight: bold;">Mail send to {{$data->name}}</h1>
          		<!-- Форма для отправки сообщения пользователю на электронную почту. -->
          		<form action="{{url('mail', $data->id)}}" method="Post">
  					@csrf
  					<div class="div_deg">
  						<label>Greeting</label>
  						<input type="text" name="greeting">
  					</div>
  					<div class="div_deg">
  						<label>Mail Body</label>
  						<textarea name="body"></textarea>
  					</div>
  					<div class="div_deg">
  						<label>Action Text</label>
  						<input type="text" name="action_text">
  					</div>
  					<div class="div_deg">
  						<label>Action Url</label>
  						<input type="text" name="action_url">
  					</div>
  					<div class="div_deg">
  						<label>End Line</label>
  						<input type="text" name="endline">
  					</div>
  					<div class="div_deg">
  						<input class="btn btn-primary" type="submit" value="Send Mail">
  					</div>
  				</form>	
          	</center>
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