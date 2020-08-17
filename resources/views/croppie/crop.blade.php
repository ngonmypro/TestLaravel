<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crop Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <div class="container"><br>
      <h2 align="center">Cropping and Upload</h2><br>
      <div class="panel panel-info">
        <!-- <div class="panel-heading"></div> -->
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4 text-center">
              <div id="upload-demo"></div>
            </div>
            <div class="col-md-4" style="padding:5%;">
              <strong>Select image to crop:</strong>
              <input type="file" id="image">
              <button class="btn btn-primary btn-block upload-image" style="margin-top:2%">Upload Image</button>
            </div>
            <div class="col-md-4">
              <div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  <script type="text/javascript">
  // set Token ให้ใช้ส่ง post ได้ทั้งหมด
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

    var resize = $('#upload-demo').croppie({
      enableExif: true, // แสดงรายละเอียดภาพ
      enableOrientation: true, // แสดงผล/กำหนด รูปภาพทั้งแนวตั้ง และแนวนอน
      viewport: { // กำหนดขนาดรูปภาพที่ต้องการ
        width: 200,
        height: 200,
        type: 'circle' // circle วงกลม, square สี่เหลี่ยม จะเป็นค่า default
      },
      boundary: {
        width: 300,
        height: 300,
        type: 'circle' // circle วงกลม, square สี่เหลี่ยม จะเป็นค่า default
      }
    });

    $('#image').on('change', function() {
      var reader = new FileReader();
      reader.onload = function(e) {
        resize.croppie("bind", {
          url: e.target.result
        });
      }
      reader.readAsDataURL(this.files[0]);
    });

    $('.upload-image').on('click', function() {
      resize.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(img) {
        $.ajax({
          url: "{{route('cropimage')}}",
          type: 'POST',
          data: {"image": img},
          success:function(data) {
            result = '<img src="'+img+'" />';
            $("#preview-crop-image").html(result);
          }
        })
      });
    });
  </script>
</html>
