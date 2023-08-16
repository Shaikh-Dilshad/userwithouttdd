<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  @include('Users.nav')

    <div class="container">
        <div class="text-end">
             <a href="{{ route('Users.userlist') }}" class="btn btn-dark mt-2">Back</a>
        </div>
        <h1>Edit your Users</h1>

    </div>
    <div class="container">
        
        <form method="POST" action="{{ Route('Users.update',$edit->id) }}" enctype="multipart/form-data">
            @csrf
                @method('PUT')
                <div class="form-group ">
              <label for="exampleFormControlInput1">Name</label>
              <input type="text"  value="{{ $edit->name }}"  class="form-control"  name='name' id="exampleFormControlInput1" placeholder="Enter a Title">
             
            </div>
            <div class="form-group ">
              <label for="exampleFormControlInput1">email</label>
              <input type="text"  value="{{ $edit->email }}"  class="form-control"  name='email' id="exampleFormControlInput1" placeholder="Enter a Title">
             
            </div>
            <div class="form-group ">
              <label for="exampleFormControlInput1">phone</label>
              <input type="text"  value="{{ $edit->phone }}"  class="form-control"  name='number' id="exampleFormControlInput1" placeholder="Enter a Title">
             
            </div>
                <button  type="submit"   class="btn btn-dark ">Submit</button>
            
          </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>