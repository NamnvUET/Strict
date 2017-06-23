<?php
include_once "./pagination/pagination.php";
include_once "./pagination/db_function.php";
$array = array(
    'current_page' => isset($_GET['page']) ? $_GET['page'] : '1',
    'total_record' => get_total_number($conn,'banner_id','banners'),
    'limit' => 5,
    'range' => 10,
    'link_full' => "./admin.php?feature=banner&page={page}",
    'link_first' => "./admin.php?feature=banner",
);
$paging = new Pagination();
$paging->init($array);
$limit = $paging->get_config('limit');
$start = $paging->get_config('start');
$member = json_decode(get_all_record($conn,'banners',$limit,$start));
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manager Banner
            </h1>
            <ol class="breadcrumb">
                <li><a href="./admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#" readonly>Banner</a></li>
                <li class="active">View List Banner</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Banner</h3>
                            <button class="btn btn-md btn-primary add-new-btn" style="float: right" data-toggle="modal" data-target="#myModal" aria-hidden="true">Add new</button>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th style="width: 25%">Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Chọn sửa</th>
                                <th>Chọn xóa</th>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($member as $value) {
                                    # code...
                                    ?>
                                    <tr>
                                        <td class="banner_id-form"><?=$value->banner_id?></td>
                                        <td class="img-form"><img src="<?=$value->image?>" alt="img" width="100%"></td>
                                        <td class="title-form"><?=$value->title?></td>
                                        <td class="desc-form"><?=$value->description?></td>
                                        <td><?= $value->created_at?></td>
                                        <td><?= $value->updated_at?></td>
                                        <td><button class="btn btn-primary btn-md modify-btn" data-toggle="modal" data-target="#myModal" aria-hidden="true">Modify</button></td>
                                        <td><a onclick=" return confirm('Are you sure ?')" class="btn btn-danger btn-md" href="./Contents/banner/delete.php?banner_id=<?=$value->banner_id?>">Delete</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="paging text-center">
                            <?php echo $paging->html()?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12">
                                    <img src="#" alt="img" width="100%" id="modal-image">
                                </div>
                                <div class="col-xs-12">
                                    <form role="form" enctype="multipart/form-data" method="POST">
                                        <div class="box-body" id="form-body">
                                            <input type="text" id="banner_id" value="" name="banner_id" hidden>
                                            <div class="form-group">
                                                <label for="title">Title Banner</label>
                                                <input type="text" class="form-control" id="title" name="title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea col="30" row="10" class="form-control" id="description" name="description" required></textarea>
                                            </div>
                                            <div class="form-group" id="form-modal-image">
                                                <label for="image">Image Banner</label>
                                                <input type="file" id="image" name="image" accept=".jpg,.png"  required>
                                            </div>
                                            <?php
                                            if(isset($_POST['submit']))
                                            {
                                                $banner_id = isset($_POST['banner_id']) ? $_POST['banner_id'] : 0;
                                                $title = isset($_POST['title']) ? $_POST['title'] : '';
                                                $description = isset($_POST['description']) ? $_POST['description'] : '';

                                                if($banner_id == 0)
                                                {
                                                    $uploaddir = ".././uploads/banners/";
                                                    $uploadfile = $uploaddir . basename($_FILES['image']['name']);

                                                    move_uploaded_file($_FILES['image']["tmp_name"], $uploadfile);

                                                    $sql = "INSERT INTO banners (title,description,image)
                                                                VALUES ('$title','$description','$uploadfile')";
                                                    $query = $conn->prepare($sql);
                                                    $query->execute();
                                                }
                                                else{
                                                    $sql = "UPDATE banners
                                                        SET title = '$title', description = '$description', updated_at = now()
                                                        WHERE banner_id = $banner_id ";
                                                    $query = $conn->prepare($sql);
                                                    $query->execute();
                                                }
                                                header("Location: ./admin.php?feature=banner");
                                            }
                                            ?>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-->
    </div>
    <!-- /.content-wrapper-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".modify-btn").click(function () {
                var row = $(this).parent().parent();
                var banner_id = row.find(".banner_id-form").text();
                var img_src = row.find(".img-form").children().attr("src");
                var title = row.find(".title-form").text();
                var description = row.find(".desc-form").text();

                $("#banner_id").attr("value", banner_id);
                $("#modal-image").attr("src",img_src);
                $("#modal-image").removeClass("hidden");
                $("#form-modal-image").addClass("hidden");
                $("#image").removeAttr("required");
                $("#title").val(title);
                $("#description").val(description);
            });
            $(".add-new-btn").click(function () {
                $("#banner_id").attr("value", 0);
                $("#modal-image").addClass("hidden");
                $("#form-modal-image").removeClass("hidden");
                $("#image").prop("required",true);
                $("#title").val("");
                $("#description").val("");
            });
        });
    </script>
<?php
?>