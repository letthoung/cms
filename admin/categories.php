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
                            <?php add_category(); ?>
                            
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
                
                            
                            <!-- Update a category -->
                            <?php
                                if (isset($_GET['edit'])){
                                    include "includes/update_categories.php";
                                }
                            ?>
                            
                        </div>
                        
                        
                        <!-- Display the table of categories with ID -->
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
                                        find_all_categories();
                                    ?>
                                    
                                    <!-- Delete a category -->
                                    <?php
                                        delete_category();
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