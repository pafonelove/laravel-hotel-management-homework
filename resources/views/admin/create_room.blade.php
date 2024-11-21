<!DOCTYPE html>
<html>
  <head> 
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
    <div class="d-flex align-items-stretch">

      @include('admin.sidebar')
      <div class="page-content">
      	<div class="page-header">
      		<div class="container-fluid">
      			<div class="div_center">
      				<h1 style="font-size: 30px; font-weight: bold;">Add Room</h1>
      				<!-- Форма добавления новой комнаты на сайт бронирования. -->
      				<form action="{{url('add_room')}}" method="Post" enctype="multipart/form-data">
      					@csrf
      					<div class="div_deg">
      						<label>Room Title</label>
      						<input type="text" name="title">
      					</div>
      					<div class="div_deg">
      						<label>Description</label>
      						<textarea name="description"></textarea>
      					</div>
      					<div class="div_deg">
      						<label>Price</label>
      						<input type="number" name="price">
      					</div>
      					<div class="div_deg">
      						<label>Room Type</label>
      						<select name="type">
      							<option selected value="regular">Regular</option>
      							<option value="premium">Premium</option>
      							<option value="delux">Delux</option>
      						</select>
      					</div>
      					<div class="div_deg">
      						<label>Free Wi-Fi</label>
      						<select name="wifi">
      							<option selected value="yes">Yes</option>
      							<option value="no">No</option>
      						</select>
      					</div>
      					<div class="div_deg">
      						<label>Upload Image</label>
      						<input type="file" name="image">
      					</div>
      					<div class="div_deg">
      						<input class="btn btn-primary" type="submit" value="Add Room">
      					</div>
      				</form>
      			</div>
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