<!-- create.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script  data-src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
  </head>
  <body>
    @if(session()->has('success'))
          <div class="alert_hide alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <p> {{  __(session()->get('success') ,['name' => session()->get('screen')]) }} </p>
          </div>         
          <!-- success alert-->
        @endif
    <div class="container">
      <h2>Add User </h2><br/>
      <form method="post" action="{{url('/users_info/store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4 {{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" name="name">
            @if ($errors->has('name'))<span class="help-block"> <small>{{
            $errors->first('name') }}</small>
            </span> @endif
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4 {{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="Email">Email:</label>
              <input type="text" class="form-control" name="email">
              @if ($errors->has('email'))<span class="help-block"> <small>{{
              $errors->first('email') }}</small>
              </span> @endif
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4 {{ $errors->has('number') ? ' has-error' : '' }}">
              <label for="Number">Phone Number:</label>
              <input type="text" class="form-control" name="number">
              @if ($errors->has('number'))<span class="help-block"> <small>{{
              $errors->first('number') }}</small>
              </span> @endif
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4 {{ $errors->has('country') ? ' has-error' : '' }}">
            <strong>country </strong>  
            <input class="date form-control"  type="text" name="country"> 
            @if ($errors->has('country'))<span class="help-block"> <small>{{
              $errors->first('country') }}</small>
              </span> @endif  
         </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4 {{ $errors->has('date') ? ' has-error' : '' }}">
            <strong>D.O.B : </strong>  
            <input class="date form-control"  type="text" id="datepicker" name="date">
            @if ($errors->has('date'))<span class="help-block"> <small>{{
              $errors->first('date') }}</small>
              </span> @endif   
         </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
    <script type="text/javascript">  
        $('#datepicker').datepicker({ 
            autoclose: true,   
            format: 'dd-mm-yyyy'  
         });  
    </script>
  </body>
</html>
