<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List MDL</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design Lite JavaScript -->
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>

<body>
    <main class="container">
        <!-- Form for add task -->
        <form action="{{ url('/') }}" method="post">
            @csrf
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="sample3" name="Task" required>
                <label class="mdl-textfield__label" for="sample3">Write a task...</label>
                <br> <br>

                <!-- Raised button with ripple -->
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                    Add
                </button>
            </div>
        </form>

        <!-- Show task in database -->
        <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Task</th>
                    <th>Action</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->task }}</td>
                    <td>
                        <form action=""></form>
                    </td>
                </tr>
                @endforeach
                <tr>
            </tbody>
        </table>


    </main>
</body>

</html>