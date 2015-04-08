<!DOCTYPE html>
<html ng-app="todoList">
<head>
    <meta charset="utf-8">
    <title>Angular Todo List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"
</head>

<body ng-controller="TodoListCtrl as vm">
    <div class="container">
        <h4 class="list-group-item title">Todos <small>({{vm.todoCount()}} things left to do)</small>
            <span class="glyphicon glyphicon-search"></span><input type="text" size="13" placeholder="Search" class="search pull-right" ng-model="todo.search" />

        </h4>
        <div class="list-group-item" ng-repeat="todo in vm.todos | filter:todo.search">
                <input type="checkbox" ng-model="todo.completed">
                <input type="text" ng-model="todo.text" class="todo" ng-class="{strike:todo.completed}" ng-disabled="true">
                {{todo.completed}}{{vm.hideFinished}}
                <a href="" ng-click="vm.move($index, 'up')" title="move up"><span class="glyphicon glyphicon-arrow-up"></span></a>
                <a href="" ng-click="vm.move($index, 'down')" title="move down"><span class="glyphicon glyphicon-arrow-down"></span></a>
                <a href="" ng-click="vm.removeTodo($index)" title="remove item"><span class="glyphicon glyphicon-remove"></span></a>

        </div>

        <div class="list-group-item" ng-show="vm.newTodoText">
            <input type="checkbox" disabled="true">
            <input type="text" disabled="true" class="todo" placeholder="{{vm.newTodoText}}">
        </div>

        <form ng-submit="vm.addTodo()" class="list-group-item">
            <input type="text" placeholder="Enter new task" ng-model="vm.newTodoText" >
            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/todoListCtrl.js"></script>
</body>


</html>