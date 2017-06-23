<?php
    include_once "./pagination/pagination.php";
    include_once "./pagination/db_function.php";
    $array = array(
        'current_page' => isset($_GET['page']) ? $_GET['page'] : '1',
        'total_record' => get_total_number($conn,'message_id','contact_message'),
        'limit' => 5,
        'range' => 10,
        'link_full' => "./admin.php?feature=contact&page={page}",
        'link_first' => "./admin.php?feature=contact",
    );
    $paging = new Pagination();
    $paging->init($array);
    $limit = $paging->get_config('limit');
    $start = $paging->get_config('start');
    $member = json_decode(get_all_record($conn,'contact_message',$limit,$start));
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manager Contact Message
            </h1>
            <ol class="breadcrumb">
                <li><a href="./admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#" readonly>Message</a></li>
                <li class="active">View List Message</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Message</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Fullname</th>
                                <th style="width: 13%">Email</th>
                                <th style="width: 25%">Message</th>
                                <th>Subcribe</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>More Detail</th>
                                <th>Chọn xóa</th>
                                </thead>
                                <tbody>
                                <?php

                                foreach ($member as $value) {
                                    # code...
                                    ?>
                                    <tr style="">
                                        <td class="message_id-form"><?=$value->message_id?></td>
                                        <td class="fullname-form"><?=$value->fullname?></td>
                                        <td class="email-form" style="word-break: break-all"><?=$value->email?></td>
                                        <td class="message-form" style="text-overflow: ellipsis; overflow: hidden"><?=$value->message?></td>
                                        <td class="is_subcribe-form">
                                            <?php
                                                if($value->is_subcribe == 0)
                                                {
                                                    echo "No";
                                                }
                                                else{
                                                    echo "Subcribed";
                                                }
                                            ?>
                                        </td>
                                        <td><?= $value->created_at?></td>
                                        <td><?= $value->updated_at?></td>
                                        <td><button class="btn btn-primary btn-md modify-btn" data-toggle="modal" data-target="#myModal" aria-hidden="true">Detail</button></td>
                                        <td><a onclick=" return confirm('Are you sure ?')" class="btn btn-danger btn-md" href="./Contents/contact/delete.php?message_id=<?=$value->message_id?>">Delete</a></td>
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
                                    <form role="form" enctype="multipart/form-data" method="POST">
                                        <div class="box-body" id="form-body">
                                            <input type="text" id="message_id" value="" name="message_id" hidden>
                                            <div class="form-group">
                                                <label for="fullname">Fullname</label>
                                                <input type="text" class="form-control" id="fullname" name="fullname" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea col="30" row="20" class="form-control" id="message" name="message" readonly></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="subcribe">Subcribe: </label>
                                                <select name="subcribe" id="subcribe">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
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
                var message_id = row.find(".message_id-form").text();
                var fullname = row.find(".fullname-form").text();
                var email = row.find(".email-form").text();
                var message = row.find(".message-form").text();
                var is_subcribe = row.find(".is_subcribe-form").text().trim();

                if(is_subcribe == "No")
                {
                    is_subcribe = 0;
                }
                else{
                    is_subcribe = 1;
                }

                $("#message_id").attr("value", message_id);
                $("#fullname").val(fullname);
                $("#email").val(email);
                $("#message").val(message);

                $("#subcribe option[value=" + is_subcribe + "]").prop('selected', true);

            });
        });
    </script>
<?php
?>