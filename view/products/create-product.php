<?php
include "../../database/Database.php";
include "../layout/header.php";
include "../../model/Product.php";
include "../../model/Category.php";


// connect to database
$conn = new Database();
$connection = $conn->connect();

$is_created = "";

if (isset($_POST['add-product'])) {

    $product = new Product();
    $product->setName($_POST['name']);
    $product->setPrice($_POST['price']);
    $product->setDescription($_POST['description']);
    $product->setCategoryId($_POST['category-id']);
    $is_created = $product->create($connection);
}


//for ($i = 0 ; $i < count($allData) ; $i++)
//{
//    echo $allData[$i]['name'];}
//?>
    <div class="container mt-3 w-75">
        <?php
        if ($is_created != "") {
            if ($is_created) {
                echo "<div class='alert alert-success'>Product was created.</div>";
            } else {
                echo "<div class='alert alert-warning'>Unable to create a new product.</div>";
            }
        }
        ?>
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <fieldset class="form-group">
                <legend class="col-form-label col-sm-2 pt-0 text-muted font-weight-bold">Add product</legend>
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input name="description" type="text" class="form-control" id="description"
                           aria-describedby="emailHelp"
                           placeholder="Enter description">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input name="price" type="number" min="1" class="form-control" id="price" aria-describedby="emailHelp"
                           placeholder="Enter price">
                </div>

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
            </fieldset>

            <button name="add-product" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php include "../layout/footer.php" ?>