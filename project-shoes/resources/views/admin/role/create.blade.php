@extends('admin.admin')
@section('main')


<h1>danh sách quyền</h1>

<hr>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
<link href="{{ asset('css/admin_product.css') }}" rel="stylesheet">
<div class="" ng-app="role" ng-controller="roleController">
    <form action="{{route('admin.role.store')}}" method="POST" role="form">
        @csrf
        <div class="form-group">
            <label for="">tên nhóm quyền</label>
            <input type="text" class="form-control" name="name" placeholder="">
        </div>
        <div class="form-group" style="height: 300px; overflow-y: auto">
        
            <label for="">Route</label>
            <input type="text" class="form-control" ng-model="rname" placeholder="input role name">
            <div class="checkbox" ng-repeat="r in roles | filter:rname">
                <label for="">
                    <input type="checkbox" class="role-item"  ng-model="role"name="route[]" value="@{{r}}">
                    @{{r}}
                </label>
            </div>
            
        </div>
        <div class="d-grid mx-auto">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <label for="">
                <input type="checkbox" ng-model="role" id="check-all">check all
            </label>
        </div>
    </form>
</div>



@stop()
@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.0/angular.min.js"></script>
<script type="text/javascript">
    var app = angular.module('role',[]);
    app.controller('roleController',function($scope){
        var roles = '<?php echo json_encode($routes) ;?>';
        $scope.roles = angular.fromJson(roles);
        

        
    })



</script>
@stop()