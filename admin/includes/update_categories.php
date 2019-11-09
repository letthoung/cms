<!-- Edit categories form -->
<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>

        <!-- Get the item selected to edit, then display the item in the input box -->
        <?php
            if (isset($_GET['edit'])){
                $edit_id = $_GET['edit'];
                $query = "SELECT * FROM categories WHERE cat_id = $edit_id";
                $edit_query = mysqli_query($connection,$query);
                while ($row = mysqli_fetch_assoc($edit_query)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
        ?>

        <input value="<?php echo $cat_title; ?>" type="text" class="form-control" name="update_category">

        <?php
                }
            }
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit-2" value="Update">
    </div>
</form>


<!-- Update a category query -->
<?php
    if (isset($_POST['submit-2'])){
        $update_cat_title = $_POST['update_category'];
        if (empty($update_cat_title)){
            echo "<h4>This field should be filled</h4>";
        } else {
            $query = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE cat_id = $edit_id";
            $update_category_query = mysqli_query($connection,$query);
            if (!$update_category_query){
                die("QUERY FAILED!". mysqli_error($connection));
            }
        }
    }
?>