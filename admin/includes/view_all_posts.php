<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_GET['delete'])){
                $delete_id = $_GET['delete'];
                $query = "DELETE FROM posts WHERE post_id = {$delete_id}";
                $delete_query = mysqli_query($connection, $query);
                
                if(!$delete_query){
                    die("QUERY FAILED!! " . mysqli_error($connection));
                }
            }
        
        
            $query = "SELECT * FROM posts";
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

                echo "<tr>
                        <td>{$post_id}</td>
                        <td>{$post_author}</td>
                        <td>{$post_title}</td>
                        <td>{$post_category_id}</td>
                        <td>{$post_status}</td>
                        <td><img alt='images' class='img-responsive' style='max-width: 200px;' src='../images/{$post_image}'></td>
                        <td>{$post_tags}</td>
                        <td>{$post_comment_count}</td>
                        <td>{$post_date}</td>
                        <td><a href='posts.php?delete={$post_id}'>DELETE</a></td>
                       </tr>";
            }
        ?>
    </tbody>
</table>