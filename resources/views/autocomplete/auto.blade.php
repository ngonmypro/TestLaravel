<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Auto Complete Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- JS, Popper.js, and jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <br>
      <h1>AutoComplete Laravel</h1><br>
      <div class="form-group">
        <label class=""><b>Provinces</b></label>
        <input type="text" name="city_name" id="city_name" class="form-control input-lg" placeholder="Input Provinces">
        <div id="cityList">
        </div>
      </div>
      {{ csrf_field() }}
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#city_name').keyup(function() {
          var query = $(this).val();
          // console.log(query);
            if (query != '') {
              var _token = $('input[name="_token"]').val();
            }
          $.ajax({
            url: "{{route('autocomplete.show')}}",
            method: "post",
            data: {query: query,
                _token: _token},
            success:function(data) {
              $('#cityList').fadeIn();
              $('#cityList').html(data);
            }
          });
        });
      });

      $(document).on('click', 'li', function() {
        $('#cityList').fadeOut();
        $('#city_name').val($(this).text());
      });
    </script>
  </body>
</html>
