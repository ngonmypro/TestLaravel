<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- CSS only -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- JS, Popper.js, and jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container"><br>
      @if(count($errors) > 0)
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">x</button>
          Upload Validation Error<br><br>
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
        <img src="/images/test/{{ Session::get('path') }}" width="400">
        @endif

        <br><br>
      <form enctype="multipart/form-data" action="{{url('/uploadfile')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <table class="table">
            <tr>
              <td width="40%" align="right">Select file upload.</td>
              <td width="30"><input type="file" name="select_image"></td>
              <td width="30%" align="left"><input type="submit" name="upload" class="btn btn-primary" value="Upload"></td>
            </tr>
            <tr>
              <td width="40%" align="right"></td>
              <td width="30"><span class="text-text-muted">jpg, png, gif</span></td>
              <td width="30%" align="left"></td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </body>
</html>
