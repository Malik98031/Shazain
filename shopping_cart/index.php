
  <?php  include 'connect.php';
    if(isset($_POST['add_prodect'])){
     $product_name=$_POST['product_name'];
     $product_price=$_POST['product_price'];
     $product_image=$_FILES["product_image"]["name"];
     $product_image_temp_name=$_FILES["product_image"]["tmp_name"];
     $product_image_folder="images/".$product_image;


     $insert_query=mysqli_query($conn, "insert into `products` (name,price,image) values 
     ('$product_name','$product_price','$product_image')") or die("Insert query is failed");
     if($insert_query){
       move_uploaded_file($product_image_temp_name,$product_image_folder);
         $display_message= 'insert query is seeccfull';
 }else{
           $display_message ='there is some error inserting in the product';
 }
}

  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>



<body>

      <?php include('header.php') ?>
      
      <div class="container">
        <?php
        if(isset($display_message))
        echo "<div class='display_message'><span>$display_message</span><i class='fas fa-times' onclick= 'this.parentElement.style.display = `none`';> </i></div>";
        ?>
        
         <section>
               <h3 class="heading">Add products</h3>
                 <form action="" class="add_product" method="post" enctype="multipart/form-data">
                        <input type="text" name="product_name" placeholder="Enter prodect name" class="input_fields" required>
                        <input type="number" name="product_price" min="0" placeholder="Enter prodect price" class="input_fields" required>
                        <input type="file" name="product_image" class="input_fields" required accept="image/png ","jpg","ejpg">
                        <input type="submit" name="add_prodect" class="submit_btn" value="Add_prodects">
                </form>
         </section>
      </div>
      
    <script src="js/script/js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>