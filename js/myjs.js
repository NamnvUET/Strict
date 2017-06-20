$(document).ready(function () {
    //Scroll Event
    $(".links a").click(function () {
        name = $(this).attr('href');
        var scroll1 = $(name).position().top;
        $('html, body').stop().animate({scrollTop:scroll1}, 800);
    });

    //Zoom image event
    $("a.zoom-item").click(function () {
        var src = $(this).parents(".portfolio--content").children(".img").attr("src");
        var showcase_id = $(this).parents(".portfolio--content").children(".img").attr("alt");
        $("#modal-image").attr("src",src);
        $(this).parents(".row").find(".active").removeClass("active");
        $(this).parents(".portfolio--content").addClass("active");
        showDetail(showcase_id);
    });

    //Validate Form
    $("#form-id").submit(function () {
        var name = $("#fullname").val();
        var email = $("#email").val();
        var message = $("#message").val();

        var flag = true;

        if(name == "")
        {
            $("#fullname_errors").text("Bạn chưa nhập tên!");
            flag = false;
        }

        if(email == "")
        {
            $("#email_errors").text("Bạn chưa nhập email!");
            flag = false;
        }
        if(email != ""){
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var result =  re.test(email);
            if(result == false)
            {
                $("#email_errors").text("Email sai định dạng");
                flag = false;
            }
        }
        if(message == "")
        {
            $("#message_errors").text("Bạn chưa nhập message");
            flag = false;
        }

        return flag;
    });

    //View previous image
    $("#pre_button").click(function () {
        var current_content = $(".list-image").find(".active");
        var pre_content = current_content.prev();
        if(pre_content.html() == undefined)
        {
            pre_content = $(".portfolio--content").last();
        }
        var pre_image_src = pre_content.children(".img").attr("src");
        var showcase_id = pre_content.children(".img").attr("alt");
        $("#modal-image").fadeOut(function(){
            $("#modal-image").attr("src",pre_image_src);
            showDetail(showcase_id);
        });
        $("#modal-image").fadeIn(1000);
        current_content.removeClass("active");
        pre_content.addClass("active");
        return false;
    });

    //View next image
    $("#next_button").click(function () {
        var current_content = $(".list-image").find(".active");
        var next_content = current_content.next();
        if(next_content.html() == undefined)
        {
            next_content = $(".portfolio--content").first();
        }
        var next_image_src = next_content.children(".img").attr("src");
        var showcase_id = next_content.children(".img").attr("alt");
        $("#modal-image").fadeOut(function () {
            $("#modal-image").attr("src",next_image_src);
            showDetail(showcase_id);
        });
        $("#modal-image").fadeIn(1000);
        current_content.removeClass("active");
        next_content.addClass("active");
        return false;
    });

    //Set active class carousel
    $(".image-carousel").first().addClass("active");

    //Display Detail with XMLHttp AJAX
    function showDetail(showcase_id) {
        $.ajax({
           url: "./views/Contents/showcase/getInfo.php",
            type: "get",
            dataType: "json",
            data: {
              showcase_id : showcase_id
            },
            success: function(result){
                var html = '';
                html += "<strong>" + result['showcase_name'] + "</strong>";
                html += "<br>" + "<br>";
                html += "<p>" + result['showcase_description'] + "<\p>";
                $("#modal-detail").html(html);
            }
        });
    }
});
