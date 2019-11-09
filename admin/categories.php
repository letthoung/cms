<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xs-6">
                            <!-- Add a category query -->
                            <?php
                                if (isset($_POST['submit-1'])){
                                    $cat_title = $_POST['cat_title'];
                                    if (empty($cat_title)){
                                        echo "<h3>This field should be filled</h3>";
                                    } else {
                                        $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}')";
                                        $create_category_query = mysqli_query($connection,$query);
                                        if (!$create_category_query){
                                            die("QUERY FAILED!". mysqli_error($connection));
                                        }
                                    }
                                }
                            ?>
                            
                            <!-- Add categories form -->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit-1" value="Add">
                                </div>
                            </form>
                            
                            <br><br>
                
                            
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
                                        echo "<h3>This field should be filled</h3>";
                                    } else {
                                        $query = "UPDATE categories SET cat_title = $update_cat_title WHERE cat_id = $edit_id";
                                        $update_category_query = mysqli_query($connection,$query);
                                        if (!$update_category_query){
                                            die("QUERY FAILED!". mysqli_error($connection));
                                        }
                                    }
                                }
                            ?>
                            
                        </div>
                        
                        
                        
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                   <!-- Show the table of category id and category title
                                        This is automatically run when the web page is rendered -->
                                    <?php
                                        $query = "SELECT * FROM categories";
                                        $select_all_categories_query = mysqli_query($connection,$query);
                                        while ($row = mysqli_fetch_assoc($select_all_categories_query)){
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            echo "<tr>";
                                            echo "<td>{$cat_id}</td>";
                                            echo "<td>{$cat_title}</td>";
                                            echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
                                            echo "<td><a href='categories.php?edit={$cat_id}'>EDIT</a></td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                    
                                    <!-- Delete categories -->
                                    <?php
                                        if (isset($_GET['delete'])){
                                            $delete_id = $_GET['delete'];
                                            $query = "DELETE FROM categories WHERE cat_id = {$delete_id}";
                                            $delete_query = mysqli_query($connection,$query);
                                            if(!$delete_query){
                                                die("QUERY FAILED! ". mysqli_error($connection));
                                            }
                                            header("location: categories.php");
                                        }
                                        
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>