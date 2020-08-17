<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container"><br>
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Multiple Upload </h1><br>
          <div class="form-group">
            <div class="file-loading">
              <input id="image-file" type="file" name="file" accept="image/*" data-min-file-count="1" multiple>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">
    $("#image-file").fileinput({
      uploadUrl: "{{route('image.upload')}}",
      theme: 'fa',
      uploadExtraData:function() {
        return{
          _token: "{{csrf_token()}}",
        }
      },
      allowedFileExtensions: ['jpg','png','gif'],
      maxFileSize: 2048
    });
  </script>
</html>
