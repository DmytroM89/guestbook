guestbook.controller('authorsCtrl', function($scope, $http){
    $http.get('/api/authors').success(function(res){
        $scope.authors = res;
    });

    $scope.addNewAuthor = function() {
        //console.log($scope.authorObj);

        $http.post('/api/author/new', $scope.authorObj)
            .success(function(res) {
                if(res.status == "success") {
                    $scope.authors = res.result;
                }
            });
    }
});
