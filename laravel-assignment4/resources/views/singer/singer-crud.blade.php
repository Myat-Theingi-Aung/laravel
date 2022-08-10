<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 8 Ajax CRUD Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('js/singer.js')}}"></script>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Laravel 8 Ajax CRUD Tutorial</h2>
        </div>
        <div class="col-md-12 mt-1 mb-2">
            <button type="button" id="addNewSinger" class="btn btn-success">Add</button>
        </div>
        <!--create-->
        <!-- show -->
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Singer Name</th>
                  <th scope="col">Age</th>
                  <th scope="col">Type</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody> 
                @foreach ($singers as $singer)
                <tr>
                    <td>{{ $singer->singer_id }}</td>
                    <td>{{ $singer->singer_name }}</td>
                    <td>{{ $singer->age }}</td>
                    <td>{{ $singer->type }}</td>
                    <td>{{ $singer->gender }}</td>
                    <td>
                       <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $singer->singer_id }}">Edit</a>
                      <a href="javascript:void(0)" class="btn btn-primary delete" data-id="{{ $singer->singer_id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
  
        </div>
    </div>        
</div>
<!-- boostrap model -->
    <div class="modal fade" id="singer-model" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ajaxSingerModel"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="addEditSingerForm" name="addEditSingerForm" class="form-horizontal" method="POST">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Singer Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="singer_name" value="" name="singer_name" value="" maxlength="50" required="">
                </div>
              </div>  
              <div class="form-group">
                <label for="age" class="col-sm-2 control-label">Age</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="age" name="age" value="" maxlength="50" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Type</label>
                <select class="" name="type" id="type" class="form-control">                       
                    <option value="Local">Local </option>
                    <option value="Internation">Internation</option>
                    <option value="Kpop">Kpop</option>                                     
                </select>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Gender</label>
                <div class="col-sm-12">
                    <input type="radio" id="male" class="gender" name="gender" value="Male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" class="gender" name="gender" value="Female">
                    <label for="female">Female</label>
                </div>
              </div>
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn-store btn btn-primary" id="btn-save" value="addNewSinger">Save changes
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->
</body>
</html>