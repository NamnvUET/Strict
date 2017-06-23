<?php
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manager Social Links
            </h1>
            <ol class="breadcrumb">
                <li><a href="./admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Social Links</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Social NetWork Links</h3>
                            <button class="btn btn-md btn-primary add-new-btn" style="float: right" data-toggle="modal" data-target="#myModal" aria-hidden="true">Add new</button>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <th>Social Network</th>
                                <th style="width: 25%">Link</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Chọn sửa</th>
                                <th>Chọn xóa</th>
                                </thead>
                                <tbody>
                                <?php
                                $queryData = $conn->prepare("SELECT * FROM social_links");
                                $queryData->execute();
                                $result = $queryData->fetchALL();
                                //var_dump($result);
                                foreach ($result as $value) {
                                    # code...
                                    ?>
                                    <tr style="">
                                        <td class="social_network-form"><strong><?=$value['social_network']?></strong></td>
                                        <td class="links-form"><a href="<?=$value['link']?>"><?=$value['link']?></a></td>
                                        <td class="created_at-form"><?=$value['created_at']?></td>
                                        <td class="updated_at-form"><?=$value['updated_at']?></td>
                                        <td><button class="btn btn-success btn-md modify-btn" data-toggle="modal" data-target="#myModal" aria-hidden="true">Modify link</button></td>
                                        <td><a onclick=" return confirm('Are you sure ?')" class="btn btn-danger btn-md" href="./Contents/socials/delete.php?social_network=<?=$value['social_network']?>">Delete</a></td>

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
                                <div class="col-xs-12">
                                    <form role="form" enctype="multipart/form-data" method="POST">
                                        <div class="box-body" id="form-body">
                                            <input type="text" value="" id="input-modal" hidden name="input-modal">
                                            <div class="form-group">
                                                <label for="social">Social NetWork</label>
                                                  <input type="text" class="form-control" id="social" name="social" placeholder="Go to font-awesome.io/icons, search name of icon (facebook,twitter,pinterest)" required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="link">Link</label>
                                                <input type="url" class="form-control" id="link" name="link" placeholder="http:/facebook.com/xxx http://twitter.com/xxx " required>
                                            </div>
                                        </div>
                                        <?php
                                        if(isset($_POST['submit']))
                                        {
                                            $input_value = isset($_POST['input_modal']) ? $_POST['input_modal'] : '';
                                            $social_network = isset($_POST['social']) ? $_POST['social'] : '';
                                            $link = isset($_POST['link']) ? $_POST['link'] : '';

                                            if($input_value == 'addnew')
                                            {
                                                $sql = "INSERT INTO social_links (social_network,link)
                                                        VALUES ('$social_network','$link')";
                                                $query = $conn->prepare($sql);
                                                $query->execute();
                                            }
                                            else{
                                                $sql = "UPDATE social_links
                                                        SET link = '$link', updated_at = now()
                                                        WHERE social_network = '$social_network' ";
                                                $query = $conn->prepare($sql);
                                                $query->execute();
                                            }
                                            header("Location: ./admin.php?feature=social");
                                        }
                                        ?>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary" name="submit">Modify</button>
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
                var social_network = row.find(".social_network-form").text();
                var link = row.find(".links-form").text();
                $("#input-modal").attr("value", "modify");
                $("#social").attr("readonly", true);
                $("#social").val(social_network);
                $("#link").removeAttr("required");
                $("#link").val(link);
            });
            $(".add-new-btn").click(function () {
                $("#input-modal").attr("value", "addnew");
               $("#social").attr("readonly", false);
                $("#social").prop("required", true);
                $("#social").val("");
                $("#link").prop("required", true);
                $("#link").val("");
            });
        });
    </script>
<?php
?>