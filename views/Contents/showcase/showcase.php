<?php
    include_once "./pagination/pagination.php";
    include_once "./pagination/db_function.php";
    $array = array(
        'current_page' => isset($_GET['page']) ? $_GET['page'] : '1',
        'total_record' => get_total_number($conn,'showcase_id','showcases'),
        'limit' => 5,
        'range' => 10,
        'link_full' => "./admin.php?feature=showcase&page={page}",
        'link_first' => "./admin.php?feature=showcase",
    );
    $paging = new Pagination();
    $paging->init($array);
    $limit = $paging->get_config('limit');
    $start = $paging->get_config('start');
    $member = json_decode(get_all_record($conn,'showcases',$limit,$start));
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manager Showcase
            </h1>
            <ol class="breadcrumb">
                <li><a href="./admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#" readonly>Showcase</a></li>
                <li class="active">Manager Banner</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Showcase</h3>
                            <button class="btn btn-md btn-primary add-new-btn" style="float: right" data-toggle="modal" data-target="#myModal" aria-hidden="true">Add new</button>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th style="width: 25%">Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>HomePage</th>
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
                                            <td class="showcase_id-form"><?=$value->showcase_id?></td>
                                            <td class="img-form"><img src="<?=$value->showcase_image?>" alt="img" width="100%"></td>
                                            <td class="name-form"><?=$value->showcase_name?></td>
                                            <td class="desc-form"><?=$value->showcase_description?></td>
                                            <td class="homepage-form"><?=$value->showcase_home?></td>
                                            <td><?= $value->created_at?></td>
                                            <td><?= $value->updated_at?></td>
                                            <td><button class="btn btn-primary btn-md modify-btn" data-toggle="modal" data-target="#myModal" aria-hidden="true">Modify</button></td>
                                            <td><a onclick=" return confirm('Are you sure ?')" class="btn btn-danger btn-md" href="./Contents/showcase/delete.php?showcase_id=<?=$value->showcase_id?>">Delete</a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="paging" class="text-center">
                            <?php echo $paging->html(); ?>
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
                                            <input type="text" id="showcase_id" value="" name="showcase_id" hidden>
                                            <div class="form-group">
                                                <label for="name">Showcase Name</label>
                                                <input type="text" class="form-control" id="showcase_name" name="showcase_name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Showcase Description</label>
                                                <textarea col="30" row="10" class="form-control" id="showcase_description" name="showcase_description" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="homepage">Homepage</label>
                                                <input type="url" class="form-control" id="showcase_homepage" name="showcase_homepage" required>
                                            </div>
                                            <div class="form-group" id="form-modal-image">
                                                <label for="image">Showcase Image</label>
                                                <input type="file" id="image" name="image" accept=".jpg,.png" required>
                                            </div>
                                            <?php
                                                if(isset($_POST['submit']))
                                                {
                                                    $showcase_id = isset($_POST['showcase_id']) ? $_POST['showcase_id'] : 0;
                                                    $showcase_name = isset($_POST['showcase_name']) ? $_POST['showcase_name'] : '';
                                                    $showcase_description = isset($_POST['showcase_description']) ? $_POST['showcase_description'] : '';
                                                    $showcase_home = isset($_POST['showcase_homepage']) ? $_POST['showcase_homepage'] : '';

                                                    if($showcase_id == 0)
                                                    {
                                                        $uploaddir = ".././uploads/showcases/";
                                                        $uploadfile = $uploaddir . basename($_FILES['image']['name']);

                                                        move_uploaded_file($_FILES['image']["tmp_name"], $uploadfile);

                                                        $sql = "INSERT INTO showcases (showcase_name,showcase_description,showcase_home,showcase_image)
                                                                VALUES ('$showcase_name','$showcase_description','$showcase_home','$uploadfile')";
                                                        $query = $conn->prepare($sql);
                                                        $query->execute();
                                                    }
                                                    else{
                                                        $sql = "UPDATE showcases
                                                        SET showcase_name = '$showcase_name', showcase_description = '$showcase_description', showcase_home = '$showcase_home', updated_at = now()
                                                        WHERE showcase_id = $showcase_id ";
                                                        $query = $conn->prepare($sql);
                                                        $query->execute();
                                                    }
                                                    header("Location: ./admin.php?feature=showcase");
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
                var showcase_id = row.find(".showcase_id-form").text();
                var img_src = row.find(".img-form").children().attr("src");
                var name = row.find(".name-form").text();
                var description = row.find(".desc-form").text();
                var homepage = row.find(".homepage-form").text();

                $("#showcase_id").attr("value", showcase_id);
                $("#modal-image").attr("src",img_src);
                $("#modal-image").removeClass("hidden");
                $("#form-modal-image").addClass("hidden");
                $("#image").removeAttr("required");
                $("#showcase_name").val(name);
                $("#showcase_description").val(description);
                $("#showcase_homepage").val(homepage);
            });
            $(".add-new-btn").click(function () {
               $("#showcase_id").attr("value", 0);
                $("#modal-image").addClass("hidden");
                $("#form-modal-image").removeClass("hidden");
                $("#image").prop("required",true);
                $("#showcase_name").val("");
                $("#showcase_description").val("");
                $("#showcase_homepage").val("");
            });
        });
    </script>
<?php
?>