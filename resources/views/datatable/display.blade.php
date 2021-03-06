<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DataTables : Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  </head>
  <body>
    <div class="container"><br>
      <h1 align="center"> DataTables : Laravel</h1>
      <table class="table table-striped" id="table">
        <thead>
          <tr>
            <th></th>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
          </tr>
        </thead>
      </table>
    </div>

    <script type="text/javascript">
      $(function() {
        $("#table").DataTable({
          ajax: '{{ url('index')}}',
          columns: [
            { data:   "active",
              render: function ( data, type, row ) {
                if ( type === 'display' ) {
                 return '<input type="checkbox" class="editor-active">';
               }
               return data;
             },
             className: "dt-body-center"
            },
                   { data: 'id' , name: 'id'},
                   { data: 'fname' , name: 'fname'},
                   { data: 'lname' , name: 'lname'}
                 ]
        });
      });
    </script>

  </body>
</html>
