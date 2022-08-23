<!DOCTYPE html>
<html>
<head>
    <title>Client Side Image Preview</title>
</head>
<body style="background: lightgrey">
<center>
    <br/><br/><br/>

    <?php

if(isset($_POST['sub'])){
$image=$_POST['pic'];

if($image==''){
echo "nothing";
}else{
    echo "Image!";
}
}
    ?>
    helloo
    <img id="preview" src="noimage.jpg" width="250px" height="220px"/><br/>
    <form method="post" enctype="multipart/form-data">
    <input type="file" id="image" style="display: none;" name="pic" />
    <!--<input type="hidden" style="display: none" value="0" name="remove" id="remove">-->
    <a href="javascript:changeProfile()">Change</a> |
    <a style="color: red" href="javascript:removeImage()">Remove</a>
    <input type="submit" name="sub" value="Submit">
</form>
</center>
<script src="include/jquery/jquery.min.js"></script>
<script>
    function changeProfile() {
        $('#image').click();
    }
    $('#image').change(function () {
        var imgPath = this.value;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            readURL(this);
        else
            alert("Please select image file (jpg, jpeg, png).")
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
//              $("#remove").val(0);
            };
        }
    }
    function removeImage() {
        $('#preview').attr('src', 'noimage.jpg');
//      $("#remove").val(1);
    }
</script>
</body>
</html>
