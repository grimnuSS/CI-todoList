<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CI-ToDoList</title>

    <style type="text/css">
        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
            text-decoration: none;
        }

        a:hover {
            color: #97310e;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
            min-height: 96px;
        }

        p {
            margin: 0 0 10px;
            padding: 0;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }

        .todo-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .todo-table th,
        .todo-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .todo-table th {
            background-color: #f2f2f2;
        }

        .todo-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .todo-table tbody tr:hover {
            background-color: #e0e0e0;
        }

        .todo-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .error {
            color: #ff0000;
            font-size: 12px;
            margin-top: 5px;
        }

        .btn-submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        .todoList h3 {
            margin: 0;
            padding: 0 0 10px 0;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
        }
    </style>
</head>

<body>

    <div id="container">
        <h1>TodoList</h1>

        <div id="body">
            <div class="todoList">
                <h3>Todo Create</h3><br>
                <form action="<?php echo base_url("todo/save") ?>" method="POST" class="todo-form">
                    <div class="form-group">
                        <label for="todo">Todo:</label>
                        <input type="text" name="todo" value="<?php echo isset($form_error) ? set_value('todo') : "" ?>" class="form-control">
                        <?php
                        if (isset($form_error)) {
                            echo '<div class="error">' . form_error('todo') . '</div>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="endTime">End Time:</label>
                        <input type="date" name="endTime" value="<?php echo isset($form_error) ? set_value('endTime') : "" ?>" class="form-control">
                        <?php
                        if (isset($form_error)) {
                            echo '<div class="error">' . form_error('endTime') . '</div>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn-submit">
                    </div>
                </form>
            </div>
            <div class="todoList">
                <h3>Todo List</h3>
                <table class="todo-table">
                    <thead>
                        <tr>
                            <th>Todo</th>
                            <th>End Time</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($todos as $todo): ?>
                            <tr>
                                <td><?php echo $todo->todo ?></td>
                                <td><?php echo $todo->endTime ?></td>
                                <td><?php echo $todo->createdAt ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br><br>
            </div>
        </div>
    </div>

</body>

</html>
