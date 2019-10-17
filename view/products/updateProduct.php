<?php
include "../../database/Database.php";
include "../layout/header.php";
include "../../model/Product.php";
include "../../model/Category.php";


$conn = new Database();
$connection = $conn->connect();
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $created = $_POST['created'];
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
//    $created = $_POST['created'];
    $product = new Product();
    $product->setName($_POST['name']);
    $product->setPrice($_POST['price']);
    $product->setDescription($_POST['description']);
    $product->setCategoryId($_POST['category-id']);
    $product->updateProduct($connection, $_POST['ID'] );
    echo "Done";
    header("Location: productHome.php");
}
?>
<div>
<!--<h1>HELLO</h1>-->
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
<!--    <fieldset class="form-group">-->
<!--        <legend class="col-form-label col-sm-2 pt-0 text-muted font-weight-bold">Add product</legend>-->
        <div class="form-group">
            <label for="name">Product Name</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                   placeholder="Enter name" value = "<?php echo $name ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input name="description" type="text" class="form-control" id="description"
                   aria-describedby="emailHelp"
                   placeholder="Enter description"
                   value = "<?php echo $description ?>">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input name="price" type="number" min="1" class="form-control" id="price" aria-describedby="emailHelp"
                   placeholder="Enter price"
                   value = "<?php echo $price?>">

        </div>
             <input name="ID" type="hidden"  aria-describedby="emailHelp"
           value = "<?php echo $id?>">

        <div class="form-group">
            <label for="category">Category</label>
            <select name="category-id" id="category" class="custom-select mb-3">
                <option selected>Category</option>
                <?php
                $Categories = new Category();
                $allData = $Categories->getCategories($connection);
                //                        var_dump($Categories->getCategories());
                for ($i = 0 ; $i < count($allData) ; $i++){
                    ?>

                    <option value="<?php echo $allData[$i]['id']?>"><?php echo $allData[$i]['name']  ?></option>
                <?php } ?>
            </select>
        </div>
<!--    </fieldset>-->

    <input type="submit" name="submit"  value="update"/>

</form>
</div>
<?php include "../layout/footer.php" ?>
