<?php
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manager Subpages
            </h1>
            <ol class="breadcrumb">
                <li><a href="./admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View List Subpages</li>
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
                                <th>Content</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Chọn sửa</th>
                                <th>Chọn xóa</th>
                                </thead>
                                <tbody>
                                <?php
                                $queryData = $conn->prepare("SELECT * FROM subpages");
                                $queryData->execute();
                                $result = $queryData->fetchALL();
                                //var_dump($result);
                                foreach ($result as $value) {
                                    # code...
                                    ?>
                                    <tr>
                                        <td class="subpage_id-form"><?=$value['subpage_id']?></td>
                                        <td class="icon-form"><img src="<?=$value['icon']?>" alt="img"></td>
                                        <td class="title-form"><?=$value['title']?></td>
                                        <td class="content-form"><?=$value['content']?></td>
                                        <td><?= $value['created_at']?></td>
                                        <td><?= $value['updated_at']?></td>
                                        <td><button class="btn btn-primary btn-md modify-btn" data-toggle="modal" data-target="#myModal" aria-hidden="true">Modify</button></td>
                                        <td><a onclick=" return confirm('Are you sure ?')" class="btn btn-danger btn-md" href="./Contents/subpages/delete.php?subpage_id=<?=$value['subpage_id']?>">Delete</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
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
                                <div class="col-xs-12 text-center">
                                    <img src="#" alt="img" id="modal-image">
                                </div>
                                <div class="col-xs-12">
                                    <form role="form" enctype="multipart/form-data" method="POST">
                                        <div class="box-body" id="form-body">
                                            <input type="text" id="subpage_id" value="" name="subpage_id" hidden>
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea col="30" row="10" class="form-control" id="content" name="content" required></textarea>
                                            </div>
                                            <div class="form-group" id="form-modal-image">
                                                <label for="image">Image</label>
                                                <input type="file" id="image" name="image" accept=".jpg,.png" required>
                                            </div>
                                            <?php
                                            if(isset($_POST['submit']))
                                            {
                                                $subpage_id = isset($_POST['subpage_id']) ? $_POST['subpage_id'] : 0;
                                                $title = isset($_POST['title']) ? $_POST['title'] : '';
                                                $content = isset($_POST['content']) ? $_POST['content'] : '';

                                                if($subpage_id == 0)
                                                {
                                                    $uploaddir = ".././uploads/subpage_icon/";
                                                    $uploadfile = $uploaddir . basename($_FILES['image']['name']);

                                                    move_uploaded_file($_FILES['image']["tmp_name"], $uploadfile);

                                                    $sql = "INSERT INTO subpage (title,content,icon)
                                                                VALUES ('$title','$content','$uploadfile')";
                                                    $query = $conn->prepare($sql);
                                                    $query->execute();
                                                }
                                                else{
                                                    $sql = "UPDATE subpage
                                                        SET title = '$title', content = '$content', updated_at = now()
                                                        WHERE subpage_id = $subpage_id ";
                                                    $query = $conn->prepare($sql);
                                                    $query->execute();
                                                }
                                                header("Location: ./admin.php?feature=subpage");
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
                var banner_id = row.find(".subpage_id-form").text();
                var img_src = row.find(".icon-form").children().attr("src");
                var title = row.find(".title-form").text();
                var content = row.find(".content-form").text();

                $("#subpage_id").attr("value", banner_id);
                $("#modal-image").attr("src",img_src);
                $("#modal-image").removeClass("hidden");
                $("#form-modal-image").addClass("hidden");
                $("#image").removeAttr("required");
                $("#title").val(title);
                $("#content").val(content);
            });
            $(".add-new-btn").click(function () {
                $("#subpage_id").attr("value", 0);
                $("#modal-image").addClass("hidden");
                $("#form-modal-image").removeClass("hidden");
                $("#image").prop("required",true);
                $("#title").val("");
                $("#content").val("");
            });
        });
    </script>
<?php
?>