<!doctype html>
<html lang="es">

<head>
    <title>To do list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container ">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif(session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
            @endif
            <form action="{{ url('/') }}" method="post" class="form">
                @csrf
                <div class="mb-3 ">
                    <label
                        for="Task"
                        class="col-4 col-form-label">Task </label>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Add a task" aria-label="Add a task" name="task" aria-describedby="basic-addon2" required>
                        <input type="submit" class="input-group-text btn btn-success" id="basic-addon2" value="Add">
                    </div>
                </div>
            </form>


            <div
                class="table-responsive-sm">
                <table
                    class="table table-striped table-hover table-borderless table-primary align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Task</th>
                            <th> </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach($tasks as $task)
                        <tr class="table-primary">
                            @if(session('editTaskId') == $task->id)
                            <td>
                                <form action="{{ route('task.update', $task->id) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <div class="input-group mb-1 ">
                                        <input type="text" class="form-control" aria-describedby="basic-addon2" value="{{$task->task}}" name="taskUpdate">

                                        <input type="submit" value="Update" class="input-group-text btn btn-warning" id="basic-addon2">
                                    </div>
                            <td></td>
                            </form>
                            </td>
                            @else
                            <td>{{$task -> task}}</td>

                            <td>
                                <form action="{{ route('task.edit', $task->id) }}" method="get">
                                    @csrf
                                    <input type="submit" value="Edit task" class="btn btn-secondary">
                                </form>
                            </td>
                            @endif



                            <td>
                                <form action="{{ route('task.destroy' , $task->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>


        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>