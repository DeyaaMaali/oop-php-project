<?php
include "../../database/Database.php";
include "../layout/header.php";
include "../../model/Product.php";
include "../../model/Category.php";


$conn = new Database();
$connection = $conn->connect();

if (isset($_POST['add-category'])) {

    $category = new Category();
    $category->setName($_POST['name']);
    $is_created = $category->create($connection);
}

?>

<!--<h1>Hello</h1>-->
<div class="container mt-3 w-75">
    <?php
//    if ($is_created != "") {
//        if ($is_created) {
//            echo "<div class='alert alert-success'>Product was created.</div>";
//        } else {
//            echo "<div class='alert alert-warning'>Unable to create a new product.</div>";
//        }
//    }
//    ?>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <fieldset class="form-group">
            <legend class="col-form-label col-sm-2 pt-0 text-muted font-weight-bold">Add category</legend>
            <div class="form-group">
                <label for="name">Category Name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                       placeholder="Enter name">
            </div>
        </fieldset>

        <button name="add-category" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include "../layout/footer.php" ?>
