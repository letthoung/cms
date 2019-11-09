<?php

function add_categories(){
    global $connection;
    if (isset($_POST['submit-1'])){
        $cat_title = $_POST['cat_title'];
        if (empty($cat_title)){
            echo "<h4>This field should be filled</h4>";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}')";
            $create_category_query = mysqli_query($connection,$query);
            if (!$create_category_query){
                die("QUERY FAILED!". mysqli_error($connection));
            }
        }
    }
}
?>