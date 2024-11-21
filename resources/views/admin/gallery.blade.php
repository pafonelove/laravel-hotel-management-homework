<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
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
          	<center>
	          	 <h1 style="font-size: 40px; font-weight: bolder; color: white;">Gallery</h1>
	          	 <!-- Отображение изображений из БД. -->
	          	 <div class="row">
		          	 @foreach($gallery as $gallery)
			          	 <div class="col-md-4">
			          	 	<img style="height: 200px!important; width: 300px!important;" src="/gallery/{{$gallery->image}}">
			          	 	<a class="btn btn-danger" href="{{url('delete_gallery', $gallery->id)}}">Delete Image</a>
			          	 </div>
		          	 @endforeach
	          	 </div>
	          	 <!-- Форма добавления изображения в галлерею админ-панели. -->
	          	 <form action="{{url('upload_gallery')}}" method="post" enctype="multipart/form-data">
	          	 	@csrf
	          	 	<div style="padding: 30px;">
	          	 		<label style="color: white; font-weight: bold;">Upload Image</label>
	          	 		<input type="file" name="image" required>
	          	 		<input class="btn btn-primary" type="submit" value="Add Image">
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