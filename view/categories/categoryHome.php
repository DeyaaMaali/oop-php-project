<?php
include "../../database/Database.php";
include "../layout/header.php";
include "../../model/Product.php";
include "../../model/Category.php";


$conn = new Database();
$connection = $conn->connect();

if (isset($_POST['submit'])) {
    echo "Deleted";
    Category::deleteCategory($connection, $_POST['id']);

}

?>

<?php
$category = new Category();
$allData = $category ->getAllCategories($connection);
//var_dump($allData);?>
<div class="container" style="margin-top: 20px">
<table border="1" class="table" style="text-align: center">
    <tr>
        <th>ID</th>
        <th>NAME</th>
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
            <td><?php echo $allData[$i]['created']?></td>
            <td><form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST"> <input type="hidden" name="id" value="<?php echo $allData[$i]['id']?>"> <input type="submit" name="submit" style="width: 100%" value="delete" class ="btn btn-danger"></form></td>
            <td><form action="updateCategory.php?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $allData[$i]['id']?>">
                    <input type="hidden" name="name" value="<?php echo $allData[$i]['name']?>">
                    <input type="hidden" name="created" value="<?php echo $allData[$i]['created']?>">

                    <input type="submit" name="update" value="update" style="width: 100%" class ="btn btn-warning"></form></td>

            <!--            --><?php //} ?>

        </tr>


    <?php } ?>
</table>
</div>
<?php include "../layout/footer.php" ?>
