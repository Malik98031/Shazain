
<?php include 'connect.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>view product</title>
</head>
<body>
<?php include'header.php' ?>
<div class="container">
 <section class="display_product">
     <table>

         <thead>
            <th>sl no</th>
            <th>image</th>
            <th>name</th>
            <th>price</th>
            <th>Action</th>
         </thead>
        <tbody>
            <?php 
            $display_product=mysqli_query($conn,"select * from `products`");
            $num=1;
            if(mysqli_num_rows($display_product)>0){
                while($row=mysqli_fetch_assoc($display_product)){
            ?>
                    <tr>
            <td><?php echo $num ?></td>
            <td><image src="images/<?php echo $row['image'] ?>"alt=<?php echo $row['name'] ?> ></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td>
                <a href=" delete.php?delete=<?php echo $row['id'] ?> " class="delete_product_btn"><i class="fas fa-trash"></i></a>
                <a href="" class="update_product_btn"><i class="fas fa-edit"></i></a>
            </td>

            </tr>
            <?php
            $num++;
                }
            }else{
                echo "no";
            }
            ?>
           
        </tbody>

     </table>
 </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>