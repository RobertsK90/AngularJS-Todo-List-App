(function(){
    angular
        .module("todoList")
        .controller("TodoListCtrl", ['$http', function TodoListCtrl($http){
            var scope = this;

            $http.get('todos').success(function(todos){
                scope.todos = todos;
            });

            scope.todoCount = function() {
                var count = 0;

                angular.forEach(scope.todos, function(todo){
                    count += todo.completed ? 0 : 1;
                });

                return count;
            };

            scope.addTodo = function() {
                var todo = {
                   text: scope.newTodoText,
                   completed : false
                };

                scope.todos.push(todo);
                scope.newTodoText = '';

                $http.post('todos', todo);
            };

            scope.removeTodo = function(index) {
                var id = scope.todos[index].id;
                scope.todos.splice(index,1);


                $http.delete('todos/'+ id);
            };


            scope.move = function(index, dir) {

                if (dir === 'up') {
                    if (index === 0) {
                        return;
                    }
                    index = index - 1;
                }
                if (dir === 'down') {
                    if (index === scope.todos.length -1) {
                        return;
                    }
                }

                var todo = scope.todos[index];

                scope.todos.splice(index+2, 0, todo);
                scope.todos.splice(index,1);




            };



        }]);

}());

