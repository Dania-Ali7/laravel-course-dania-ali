<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Quickstart - Basic</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                Course Management System
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="offset-md-2 col-md-8">


            <div class="card">
                @if(isset($course))
                    <div class="card-header">
                        Update Course
                    </div>
                    <div class="card-body">
                        <form action="/courses/update" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $course->id }}">

                            <div class="mb-3">
                                <label for="course-name" class="form-label">Course Name</label>
                                <input type="text" name="name" id="course-name" class="form-control" value="{{ $course->name }}" required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-info">
                                    <i class="fa-solid fa-pen-to-square me-2"></i>Update Course
                                </button>
                                <a href="/courses" class="btn class-link btn-secondary ms-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="card-header">
                        New Course
                    </div>
                    <div class="card-body">
                        <form action="/store" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="course-name" class="form-label">Course Name</label>
                                <input type="text" name="name" id="course-name" class="form-control" required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus me-2"></i>Add Course
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    Current Registered Courses
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th style="text-align: center; width: 250px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td style="text-align: center;">

                                        <form action="/courses/edit/{{ $course->id }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-sm text-dark me-1">
                                                <i class="fa fa-edit me-1"></i>Edit
                                            </button>
                                        </form>

                                        <form action="/courses/delete/{{ $course->id }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger  btn-sm">
                                                <i class="fa fa-trash me-1"></i>Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
