<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script>
        $module=angular.module("mymodule",[]);
        $module.controller("mycontroller",function($scope,$http){
            $scope.jsonArray;
            $scope.doFetchAll=function(){
                $http.get("angular-fetch-patients.php").then(okFx, notOk);
                function okFx(response) {
                    $scope.jsonArray = response.data;
                }
                function notOk(response) {
                    alert(response.data);
                }
            }
            $scope.doDelete=function(uid){
                $http.get("angular-delete-patients?uid="+uid).then(okFx,notOk);
                function okFx(response){
                    alert(response.data);
                    $scope.doFetchAll();
                }
                function notOk(response){
                    alert(response.data);
                }
            }
            $scope.doSort=function(colm){
                $scope.colName = colm;
            }
        });
    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller">
    <center>
       <div class="btn btn-success" ng-click="doFetchAll();">Fetch All Records</div>
        <h1>
            All records
        </h1>
        <p>
            Search in user id field : <input type="text" ng-model="googler.uid">
        </p>
        <table width="600" border="1" rules="all">
            <tr>
                <th>Sr. number</th>
                <th ng-click="doSort('uid');">User ID</th>
                <th ng-click="doSort('name');">Patient Name</th>
                <th ng-click="doSort('contact');">Contact</th>
                <th>Operations</th>
            </tr>
            <tr ng-repeat="obj in jsonArray| orderBy:colName| filter:googler">
                <td>{{$index+1}}</td>
                <td>{{obj.uid}}</td>
                <td>{{obj.name}}</td>
                <td>{{obj.contact}}</td>
                <td align="center"><input type="button" value="Delete" ng-click="doDelete(obj.uid);"></td>
            </tr>
        </table>
    </center>
</body>

</html>
