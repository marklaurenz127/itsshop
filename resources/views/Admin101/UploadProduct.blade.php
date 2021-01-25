<!DOCTYPE html>
<html>
<head>
	<title>Admin - Upload Product</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<form method="POST" class="uploadproduct" autocomplete="off">
<h3>Product name: </h3>
<input type="text" name="productname" id="productname" value="Product Name">	
<h3>Short Description: </h3>
<textarea cols="50" rows="10" name="shortdesc" id="shortdesc">
Product Description
</textarea>
<h3>Long Description: </h3>
<textarea cols="50" rows="10" name="longdesc" id="longdesc">
Product Description
</textarea>
<h3>SRP: </h3>
<input type="number" name="srp" id="srp" value="3">	
<h3>Price: </h3>
<input type="number" name="price" id="price" value="2">	
<h3>Category</h3>
<select name="category" id="category">
	<option value="Electronic Devices">Electronic Devices</option>
	<option value="Electronic Accessories">Electronic Accessories</option>
	<option value="TV & Home Appliances">TV & Home Appliances</option>
	<option value="Health & Beauty">Health & Beauty</option>
	<option value="Babies & Toys">Babies & Toys</option>
	<option value="Groceries & Pets">Groceries & Pets</option>
	<option value="Home & Living">Home & Living</option>
	<option value="Women's Fashion">Women's Fashion</option>
	<option value="Men's Fashion">Men's Fashion</option>
	<option value="Fashion Accessories">Fashion Accessories</option>
	<option value="Sports & Lifestyle">Sports & Lifestyle</option>
	<option value="Automotive & Motorcycles">Automotive & Motorcycles</option>
</select>
<input type="file" name="fileUpload" id="fileUpload">
<input type="submit" name="submit" value="submit">
</form>




<!-- Jquery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.0.js') }}"></script>
	<script src="{{ asset('js/jquery-ui.min.js') }}"></script>

	<script type="text/javascript">
	
	$(document).ready(function(){

		$('.uploadproduct').on('submit', function (event) {
			$.ajaxSetup({
	          headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
	      });
			event.preventDefault();
			$.ajax({
				url: "/admin/Uploadproduct",
				type: "POST",
				data: {
					productname: $('#productname').val(),
					shortdesc: $('#shortdesc').val(),
					longdesc: $('#longdesc').val(),
					srp: $('#srp').val(),
					price: $('#price').val(),
					category: $('#category').val(),
					fileUpload: $('#fileUpload').val()
				},
				dataType: "JSON",
				success: function (data) {
					alert(data)
				}
			});
		});

	});

</script>
</body>
</html>