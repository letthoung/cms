<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well"> 
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <form method="post" action="search.php">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search">SUBMIT</span>
                            </button>
                        </span>
                        </form><!-- search form -->
                    </div>
                    <!-- /.input-group -->
                </div>
                
                
                
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                               <?php
                                $query = "SELECT * FROM categories";
                                $select_all_categories_query = mysqli_query($connection,$query);
                                while ($row = mysqli_fetch_assoc($select_all_categories_query)){
                                    $cat_title = $row['cat_title'];
                                    echo "<li><a>{$cat_title}</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include 'includes/widget.php'; ?>

            </div>