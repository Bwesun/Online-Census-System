 <?php

if(isset($_POST['sub'])){
$image=$_POST['pic'];
  $filename=$_FILES['pic']['name'];
  move_uploaded_file($_FILES['pic']['tmp_name'], "images/".$_FILES['pic']['name']);

if($image==''){
echo "nothing";
}else{
    echo "Image!";
}
}

    ?>
    <form method="post" enctype="multipart/form-data">
<input type="file" onchange="previewFile()" name="pic"><br>
<input type="submit" name="sub" value="Submit">
</form>
<img src="" height="200" alt="Image preview...">
<script type="text/javascript">
function previewFile() {
  var preview = document.querySelector('img');
  var file = document.querySelector('input[type=file]').files[0];
  var reader = new FileReader();

  // when user select an image, `reader.readAsDataURL(file)` will be triggered
  // reader instance will hold the result (base64) data
  // next, event listener will be triggered and we call `reader.result` to get
  // the base64 data and replace it with the image tag src attribute
  reader.addEventListener("load", function() {
    console.log('before preview');
    preview.src = reader.result;
    console.log('after preview');
  }, false);

  if (file) {
    console.log('inside if');
    reader.readAsDataURL(file);
  } else {
    console.log('inside else');
  }

  /*
  FLOW OF THE RESULT:
  
  inside if
  before preview
  after preview
  */
}
</script>