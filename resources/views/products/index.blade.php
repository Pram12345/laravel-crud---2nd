<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Laravel crud application</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Products</a>
    
    
    
  </div>
</nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                <a href=" {{ route('products.create') }}" class="btn  mt-2 btn-info">Product Create</a>
               
            </div>
        </div>

        <table class="table">
  <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
            <td>{{ $loop->index+1}}</td>
            <td><a href="products/{{ $product->id }}/show" class="text-dark text-decoration-none">{{ $product->name }}</a></td>
            <!-- <td></td> -->
            <td>{{ $product->description }}</td>
            <td><img src="{{ asset('products/'.$product->image) }}" width="50" height="50" class="rounded-circle"></td>
            <td ><a href="products/{{ $product->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
            
                <!-- <a href="products/{{ $product->id }}/delete" class="btn btn-danger btn-sm"></a> -->
                <form method="POST" class="d-inline" action="products/{{ $product->id }}/delete ">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button></form>
                    </td>
            </tr>
            
            @endforeach
            
      
   
  </tbody>
</table>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>