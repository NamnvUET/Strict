<?php
    include_once 'db.php';
    include_once 'pagination.php';

    $array = array(
        'current_page' => isset($_GET['page']) ? $_GET['page'] : '1',
        'total_record' => get_total_number($conn),
        'limit' => 2,
        'range' => 5,
        'link_full' => "index.php?page={page}",
        'link_first' => "index.php",
    );
    $paging = new Pagination();
    $paging->init($array);
//    var_dump($paging->get_config());
    $limit = $paging->get_config('limit');
    $start = $paging->get_config('start');
    $member = json_decode(get_all_record($conn,$limit,$start));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="content">
        <div id="list">
            <table border="1" cellspacing="0" cellpadding="5">
                <?php foreach ($member as $item){ ?>
                    <tr>
                        <td>
                            <?php echo $item->id; ?>
                        </td>
                        <td>
                            <?php echo $item->username; ?>
                        </td>
                        <td>
                            <?php echo $item->email; ?>
                        </td>
                        <td>
                            <?php echo $item->fullname; ?>
                        </td>
                        <td>
                            <?php echo $item->phone; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div id="paging">
            <?php echo $paging->html(); ?>
        </div>
    </div>
</body> 
</html>
<script>
//    $("#paging a").click(function () {
//       var url  =$(this).attr('href');
//        $.ajax({
//           url: url,
//            type: get,
//            dataType: json,
//            success: function (result) {
//
//            }
//        });
//    });
</script>



