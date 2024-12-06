<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List MDL</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design Lite JavaScript -->
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>

<body>
    <main class="">
        @if (session('success'))
        <!-- Deletable Chip -->
        <span class="mdl-chip mdl-chip--deletable"  style="display: flex; justify-content: center; align-items: center; margin: 5px 150px ; background-color:green; color: white ;">
            <span class="mdl-chip__text"> {{ session('success') }}</span>
        </span>
        @elseif (session('danger'))
        <!-- Deletable Chip -->
        <span class="mdl-chip mdl-chip--deletable"  style="display: flex; justify-content: center; align-items: center; margin: 5px 150px ; background-color: red; color: white ;">
            <span class="mdl-chip__text"> {{ session('success') }}</span>
        </span>
        @endif
        <div style="display: flex; justify-content: center; align-items: center; height: 20vh;">
            <!-- Form for adding a task -->
            <form action="{{ url('/') }}" method="post">
                @csrf
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="taskInput" name="Task" required>
                    <label class="mdl-textfield__label" for="taskInput">Write a task...</label>
                </div>
                <!-- FAB button with ripple -->
                <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
                    <i class="material-icons">add</i>
                </button>
            </form>
        </div>

        <div style="display: flex; justify-content: center; align-items: center;">
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
                        @if(session('editTaskId') == $task->id )
                        <td>
                            <form action="{{ route('task.update' , $task->id ) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input class="mdl-textfield__input" type="text" id="sample3" name="taskUpdate" value="{{ $task->task }}" required>
                        <td>
                            <!-- FAB button with ripple -->
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--cologreen">
                                <i class="material-icons">edit </i>
                            </button>
                        </td>
                        </form>
                        </td>
                        @else
                        <td>{{ $task->task }}</td>

                        <td>
                            <form action="{{ route('task.edit' , $task->id ) }}" method="get">
                                @csrf
                                <!-- FAB button with ripple -->
                                <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--cologreen" name="editTaskId">
                                    <i class="material-icons">edit </i>
                                </button>
                            </form>
                        </td>
                        @endif
                        <td>
                            <form action="{{ route('task.destroy' , $task->id ) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <!-- FAB button with ripple -->
                                <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </main>
</body>

</html>