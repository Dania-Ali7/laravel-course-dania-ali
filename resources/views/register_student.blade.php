<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>{{ $title }}</h1>

    <form action="register" method="post">
        @csrf

        <label>Student Full Name:</label><br>
        <input type="text" name="student_name" placeholder="Enter full name" required>
        <br><br>
        <label>Academic Level:</label><br>
        <select name="level" id="level">
            @foreach($levels as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Submit Registration</button>
    </form>
</body>
</html>
