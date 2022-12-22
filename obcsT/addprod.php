<?php
$conn=mysqli_connect('localhost','root','','elect_db');
if(isset($_POST['save'])){
	$prod_name= $_POST['prodname'];
	 $prod_price= $_POST['prodprice'];
	 $prod_descr= $_POST['descr'];
    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    $folder = "./product_images/" . $filename;


 if(empty($prod_name)||empty($prod_price)||empty($prod_descr)||empty($folder))
	{
		$error="FILL ALL FIELD";
	}
	else{  

    $sql="INSERT INTO product(prod_id,prod_name,prod_price,prod_image,prod_descript)
                       VALUES('NULL','$prod_name','$prod_price','$folder','$prod_descr')";
    $query=mysqli_query($conn,$sql);
    if( $query){
    	header("location:index.php");
    }else{die(mysqli_erro($conn));}

    if (move_uploaded_file($tempname, $folder)) {
        $message = "<h3>  Image uploaded successfully!</h3>";
    } else {
        $message = "<h3>  Failed to upload image!</h3>";
    }
  }}

?>

	<div class="container" style="padding: 10px;">
		<div class="row py-3">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
						<h3>Add New Product</h3>
					</div>
					<div class="card-body">
						<?php if(!empty($error)){
							echo '
                         <div class="error">
                              <h2>'. $error .'</h2>
                              </div>';
                            }
                           if(!empty($message)){
	                           echo '
                            <div class="message">
                              <h3>'. $message .'</h3>
                              </div>';
                          }?>
					<form action="#" method="post"  enctype="multipart/form-data">
						<div class="row py-3">
						<div class="col-md-6">
						<div class="form-group">
							<label>Product Name</label>
								<div class="form-group">
								<input type="text" class="form-control" name="prodname" placeholder="Product Name">
									</div>
								</div>
							</div>
							<div class="row py-3">
							<div class="col-md-6">
								  <label>Product Price</label>
									  <div class="form-group">
										 <input type="text" class="form-control" name="prodprice" placeholder="Productprice">
								     </div>
							</div>
							</div>
							<div class="row py-2">
						<div class="col-md-6">
						<div class="form-group">
							<label>Product description</label>
								<div class="form-group">
								<input type="text" class="form-control" name="descr" placeholder="description">
									</div>
								</div>
							</div>
							<div class="row py-3">
								<div class="col-md-4">
								<div class="form-group">
                                <label for="image">Attach image</label>
                                 <input type="file" name="fileToUpload" class="form-control-file" id="image" >
                                 </div>
                             </div>
                                  </div>
                             

                             
                             <div class="row py-3">
                                 <div class="col-md-3">
									<input type="submit" class="btn btn-primary form-control" value="Save" name="save">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>









	</div>
</body>
</html>
