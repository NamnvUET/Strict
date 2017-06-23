<?php
    ob_start();
    include_once "./views/PDO_Connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strict</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">

    <!--Font-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato" type="text/css">

    <!--My CSS-->
    <link rel="stylesheet" href="./scss/style.css">

    <!-- Javascript -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="js/myjs.js"></script>

    <!--Media Query-->
    <link rel="stylesheet" href="./scss/mediaquery.css">

    <!--Font awesome-->
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- HEADER -->
    <header>
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">
                            <img src="./image/logo.png" alt="logo_item">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- END HEADER-->
    <!-- BANNER -->
    <section id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php
            $queryData = $conn->prepare("SELECT title,description,image FROM banners");
            $queryData->execute();
            $result = $queryData->fetchALL();
            $active = 1;
            //var_dump($result);
            foreach ($result as $value) {
                $src = substr($value['image'],3);
                ?>
                <div class="item image-carousel" style="background-image: url('<?=$src?>')">
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h1><?=$value['title']?></h1>
                                    <hr/>
                                    <p><?=$value['description']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="container links">
                <div class="row">
                    <div class="col-xs-12">
                        <a class="call-btn" href="#call_btn_link" > Call to action</a>
                        </br>
                        <a  href="#simple_and_pure_design" class="fa fa-angle-down fa-3x" aria-hidden="true"></a>
                    </div>
                </div>
            </div>
            <a id="simple_and_pure_design"></a>
        </div>

        <!-- Left Right Controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>
    <!-- END BANNER -->
    <!-- SIMPLE AND PURE DESIGN -->
    <section class="page--header text-center">
        <div class="container">
            <h2 id="page-title">Simple & pure design.</h2>
            <p id="page-content">
                Designers everywhere gush with admiration upon seeing a web design and exclaim "its beatiful, it's so clean!".
                The are countless number of webdesign round-ups dedicated to 'clean' design and it is a term thrown around quite a bit
                in the web design communit. It can be easy to spot a good example of clean design.
            </p>
        </div>
    </section>
    <!-- END SIMPLE AND PURE DESIGN-->
    <!-- FEATURE-->
    <section class="page--feature">
        <div class="container">
            <div class="row">
                <?php
                    $queryData = $conn->prepare("SELECT * FROM subpages where is_publish = 1 LIMIT 3");
                    $queryData->execute();
                    $result = $queryData->fetchALL();
                    foreach ($result as $value) {
                        $src = substr($value['icon'], 3);
                        ?>
                            <div class="col-sm-4">
                                <img src="<?= $src ?>" alt="icon image">
                                <h3><?= $value['title']?></h3>
                                <p><?= $value['content']?></p>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- END FEATURE-->
    <!-- PORTFOLIO -->
    <section class="container portfolio">
        <div class="portfolio--title">
            <h3>Showcase your work like a pro.</h3>
            <p>Contact me if you like my work</p>
        </div>
        <div class="portfolio--main">
            <div class="row list-image">
                <?php
                    $queryData = $conn->prepare("SELECT * FROM showcases LIMIT 6");
                    $queryData->execute();
                    $result = $queryData->fetchALL();
                    foreach ($result as $value) {
                        $src = substr($value["showcase_image"], 3);
                        ?>
                        <div class="col-sm-6 col-md-4 portfolio--content">
                            <img src="<?= $src ?>" alt="<?= $value['showcase_id']?>" class="img">
                            <div class="overlay flex-container">
                                <a class="fa fa-search-plus flex-item zoom-item" data-toggle="modal"
                                   data-target="#myModal" aria-hidden="true"></a>
                                <a class="fa fa-link flex-item" aria-hidden="true" href="<?=$value['showcase_home']?>"></a>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <a id="call_btn_link"></a>
        </div>
    </section>
    <!-- END PORTFOLIO-->
    <!-- STAY WITH US-->
    <section class="form--box" id="stay_with_us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form--title">
                        <h3>Stay with us</h3>
                        <p>We ensure quailty & support</p>
                    </div>

                    <form action="./views/Contents/contact/save.php" id="form-id" method="POST">
                        <div class="form-group name">
                            <input type="text" name="fullname" placeholder="Full Name" class="form-control" id="fullname">
                            <span type="hidden" id="fullname_errors"></span>
                        </div>
                        <div class="form-group email">
                            <input type="text" name="email" placeholder="Email Address" class="form-control" id="email">
                            <span type="hidden" id="email_errors"></span>
                        </div>
                        <div class="form-group messsage">
                            <textarea name="message" cols="30" rows="10" placeholder="Message" class="form-control" id="message"></textarea>
                            <span type="hidden" id="message_errors"></span>
                        </div>
                        <div class="form--submit">
                            <div class="row">
                                <div class="col-md-6" id="remember_me">
                                    <input type="checkbox" name="check" id="form--checbox">
                                    <label for="form--checbox">Subscribe Newsletter</label>
                                </div>
                                <div class="col-md-6" id="submit_btn">
                                    <button type="submit" name="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END STAY WITH US-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6 copyright">
                    <span>Copyright 2014 STRICT</span>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6 social">
                    <?php
                    $sql = "SELECT social_network,link from social_links limit 6";
                    $queryData = $conn->prepare($sql);
                    $queryData->execute();
                    $result = $queryData->fetchALL();
                    foreach ($result as $value) {
                        ?>
                            <a class="fa fa-<?=$value['social_network']?>" aria-hidden = "true" href="<?=$value['link']?>"></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="#" alt="image1" class="img" id="modal-image">
                            </div>
                            <div class="col-xs-12">
                                <div id="modal-detail">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

                <a class="fa fa-chevron-left fa-2x prev" href="" aria-hidden="true" id="pre_button"></a>
                <a class="fa fa-chevron-right fa-2x next" href="" aria-hidden="true" id="next_button"></a>
            </div>
        </div>
    </div>
</body>
</html>