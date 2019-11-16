<?php

function confirm_query($query_result){
    global $connection;
    if(!$query_result){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function add_category(){
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

function find_all_categories(){
    global $connection;
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
}

function delete_category(){
    global $connection;
    if (isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$delete_id}";
        $delete_query = mysqli_query($connection,$query);
        if(!$delete_query){
            die("QUERY FAILED! ". mysqli_error($connection));
        }
        header("location: categories.php");
    }
}
?>