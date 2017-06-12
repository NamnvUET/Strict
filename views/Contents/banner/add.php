<?php
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
       Add Banner Page
       <small>Please type correct infomation</small>
   </h1>
   <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Banner</a></li>
       <li class="active">Add</li>
   </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Banner Form</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="./Contents/banner/banner.php" enctype="multipart/form-data" method="POST">
          <div class="box-body">
            <input type="hidden" name="banner" value="add">
            <div class="form-group">
              <label for="title">Title Banner</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea col="30" row="10" class="form-control" id="description" name="description" placeholder="Enter description of banner"></textarea>
            </div>
            <div class="form-group">
              <label for="image">Image Banner</label>
              <input type="file" id="image" name="image" accept=".jpg,.png">

              <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </div>
        </form>
      </div>
</section>
<!-- /.content -->
</div>
<?php
?>