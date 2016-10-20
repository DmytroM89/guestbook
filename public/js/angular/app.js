var guestbook = angular.module('authors', [
    'ngRoute'
]);

guestbook.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});
