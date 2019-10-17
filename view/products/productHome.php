<?php
include "../../database/Database.php";
include "../layout/header.php";
include "../../model/Product.php";

$conn = new Database();
$connection = $conn->connect();

if (isset($_POST['submit'])) {
    echo "Done";
    Product::deleteProduct($connection, $_POST['id']);

}
?>

<!--<h1>Hello</h1>-->
<?php
$Products = new Product ();
$allData = $Products->getAllProducts($connection);
//var_dump($allData);?>
<div class="container" style="margin-top: 20px;">
    <table border="1" class="table" style=" text-align: center">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
            <th>Category ID</th>
            <th>DATE CREATED</th>
            <th>DELETE</th>
            <th>UPDATE</th>

        </tr>
<?php
for($i = 0 ; $i < count($allData); $i++){?>

        <tr >
<!--            --><?php //for($j = 0 ; $j < count($allData[$i]) ; $j++){?>
                <td><?php echo $allData[$i]['id']?></td>
                <td><?php echo $allData[$i]['name']?></td>
                <td><?php echo $allData[$i]['description']?></td>
                <td><?php echo $allData[$i]['price'] . " JD"?></td>
                <td><?php echo $allData[$i]['category_id']?></td>
                <td><?php echo $allData[$i]['created']?></td>
                <td><form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST"> <input type="hidden" name="id" value="<?php echo $allData[$i]['id']?>"> <input type="submit" name="submit" value="delete" class ="btn btn-danger" style="width: 100%"></form></td>
                <td><form action="updateProduct.php?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $allData[$i]['id']?>">
                        <input type="hidden" name="name" value="<?php echo $allData[$i]['name']?>">
                        <input type="hidden" name="description" value="<?php echo $allData[$i]['description']?>">
                        <input type="hidden" name="price" value="<?php echo $allData[$i]['price']?>">
                        <input type="hidden" name="created" value="<?php echo $allData[$i]['created']?>">

                        <input type="submit" name="update" value="update" class ="btn btn-warning" style="width: 100%"></form></td>

            <!--            --><?php //} ?>

        </tr>


    <?php } ?>
    </table>
</div>
<?php include "../layout/footer.php" ?>