<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <a href="/" class="btn btn-info">Create user</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Country</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @if($usersList != null && count($usersList) > 0)
      @foreach($usersList as $user)
      <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['name']}}</td>
        <td>{{$user['date']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['phone_number']}}</td>
        <td>{{$user['country']}}</td>
        <td><a href="/users_info/edit/{{$user['id']}}" class="btn btn-warning">Edit</a></td>
        <td><a href="/users_info/delete/{{$user['id']}}" class="btn btn-danger">Delete</a></td>
      </tr>
      @endforeach
      @else
      <tr>
        <td>{{'No records found'}}</td>
      </tr>
      @endif
    </tbody>
  </table>
  </div>
  </body>
</html>