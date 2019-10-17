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
    $created = $_POST['created'];
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
//    $created = $_POST['created'];
    $category = new Category();
    $category->setName($_POST['name']);
    $category->updateCategory($connection, $_POST['ID'] );
    echo "Done";
    header("Location: categoryHome.php");
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

        <input name="ID" type="hidden"  aria-describedby="emailHelp"
               value = "<?php echo $id?>">

        <!--    </fieldset>-->

        <input type="submit" name="submit"  value="update"/>

    </form>
</div>
<?php include "../layout/footer.php" ?>
