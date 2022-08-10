<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema CRUD</title>
</head>
<body>
    <h1>Store Cinema Info</h1>
    <form action="{{ route('cinema.store') }}" method="post">
        <div class="">
            <label for="name">Cinema Name :</label>
            <input type="text" name="name">
        </div>
        <div class="">
            <label for="address">Address :</label>
            <input type="text" name="address">
        </div>
        <div class="">
            <label for="rating">Rating :</label>
            <input type="text" name="rating">
        </div>
        <div class="">
            <button>Add Info</button>
        </div>
    </form>
    
</body>
</html>