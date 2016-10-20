@extends('layouts.layout')


@section('content')
<div class="row" ng-app="authors" ng-controller="authorsCtrl">
    <h3>Authors</h3>
    <form action="" name="newAuthorForm" class="form-inline">
       <div class="form-group">
            <input type="text" id="newAuthor" class="form-control" ng-model="authorObj.name" required name="name">
        </div>
        <button type="button" class="btn btn-default addAuthor" ng-click="addNewAuthor()" ng-disabled="newAuthorForm.name.$error.required">Add Author</button>
        <br>
        <br>
        <p class="alert alert-danger" ng-show="newAuthorForm.name.$error.required">Введите имя!</p>
    </form>

    <div class="form-group">
        <input type="text" class="form-control" ng-model="search">
    </div>
    <br>
    [[ search ]]

    <div class="row">
        <ul>
            <li ng-repeat="author in authors | orderBy:'name' | filter:search">
                [[ author.name ]]
            </li>
        </ul>
    </div>
</div>


@endsection
