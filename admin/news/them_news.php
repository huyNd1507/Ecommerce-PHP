<?php
    session_start();
    require_once '../../config/db.php';
    require_once('../../config/sql_cn.php');
    $sql_cate = "SELECT * FROM cate_news";
    $sql_author="SELECT * FROM useradmin";
    $query_cate = mysqli_query($connect, $sql_cate);
    $query_au =mysqli_query($connect,$sql_author);

    if(isset($_POST['sbm'])){
        $title = $_POST['title'];

        $thumbnail = $_FILES['thumbnail']['name'];
        $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];


        $shortt = $_POST['shortt'];
        $shortt=str_replace('"','\\"',$shortt);

        $content = $_POST['content'];
        $content=str_replace('"','\\"',$content);
        
        $id_cate = $_POST['id_cate'];
        $id_au =$_POST['id_author'];

        $created_at=$update_at=date('Y-m-d H:s:i');

         $sql='insert into post(title,thumbnail,shortt,content,created_at,update_at,id_author,id_cate) values("'.$title.'","'.$thumbnail.'","'.$shortt.'","'.$content.'","'.$created_at.'","'.$update_at.'","'.$id_au.'","'.$id_cate.'")';
        $query = mysqli_query($connect, $sql);
        // var_dump($sql);
        // die();
        move_uploaded_file($thumbnail_tmp, '../../uploads/'.$thumbnail);
        header('location: index.php');
    }
        if(isset($_POST['all_prd'])){
        unset($_POST['sbm']);
            }
            
    if (!isset($_SESSION['user'])) {
        // code...
        header('location:../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>them bài viết</title>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- note -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
	<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm bài viết mới:</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tiêu đề bài viết:</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label>Thumbnail:</label> <br>
                    <input type="file" name="thumbnail" >
                    <!-- <img src="../uploads/<?=$thumbnail?>" alt="" style="max-width: 160px;"> -->
                </div>

                <div class="form-group">
                    <label>Short text:</label>
                    <textarea name="shortt" rows="4" ></textarea>

                </div>
                <div class="form-group">
                    <label>Danh mục:</label>
                    <select class="form-control" name="id_cate" style="width: 50%; height: 100%;">
                        <?php
                            while ($row_cate = mysqli_fetch_assoc($query_cate)) {?>
                                <option value="<?php echo $row_cate['id']; ?>"><?php echo $row_cate['name']; ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tác giả:</label>
                    <select class="form-control" name="id_author" style="width: 50%; height: 100%;">
                        <?php
                            while ($row_au = mysqli_fetch_assoc($query_au)) {?>
                                <option value="<?php echo $row_au['id']; ?>"><?php echo $row_au['username']; ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nội dung bài viết:</label>
                    <textarea name="content" class="form-control" rows="5" id="content" ></textarea>
                </div>


                    <button name="sbm" class="btn btn-success">Thêm mới</button>
            </form>
            <a href="index.php" ><button class="btn " name="btn">Quay về</button></a>
        </div>
    </div>
<!--     	<script type="text/javascript" charset="utf-8">
		function updateThumbnail()
		{
			$('#newimg').attr('src',$('#thumbnail').val());
		}
	</script> -->
</div>
</body>
    <script type="text/javascript" charset="utf-8">
        $(function()
        {
            $('#content').summernote();
        })
    </script>
</html>
