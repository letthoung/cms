<?php
    if($_GET['edit_id']){
        $id = $_GET['edit_id'];
        $query = "SELECT * FROM posts WHERE post_id = {$id}";
        $get_all_posts_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($get_all_posts_query)){
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
        }
    }

?>



<form action="" method="post" enctype="multipart/form-data">    


    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category</label>
        <br>
        <select name="post_category" id="post_category">
        <?php
            $query = "SELECT * FROM categories";
            $edit_query = mysqli_query($connection,$query);
            confirm_query($edit_query);
            while ($row = mysqli_fetch_assoc($edit_query)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                if ($post_category_id == $cat_id)
                    echo "<option value='{$cat_id}' selected>{$cat_title}</option>";
                else
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
        ?>
        </select>
        
    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
    </div>
    
    <div class="form-group">
        <select name="post_status" id="">
            <?php
                if ($post_status == 'published'){
                    echo "<option value='published' selected>Published</option>";
                    echo "<option value='draft'>Draft</option>";
                } else if ($post_status == 'draft'){
                    echo "<option value='published'>Published</option>";
                    echo "<option value='draft' selected>Draft</option>";
                }
            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value='<?php echo $post_tags; ?>' type="text" class="form-control" name="post_tags">
    </div>

    
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control"name="post_content" id="body" cols="30" rows="10">
            <?php echo $post_content; ?>
        </textarea>
    </div>
    
    
    <!--<div class="form-group">
    <label for="users">Users</label>
    <select name="post_user" id="">




    </select>

    </div>-->

    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
</form>


