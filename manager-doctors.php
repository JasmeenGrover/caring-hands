<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/manager-doctor.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script>
        $module = angular.module("mymodule", []);
        $module.controller("mycontroller", function($scope, $http) {
            $scope.jsonArray;

            $scope.doFetchAll=function() {
                $http.get("angular-fetch-doctors.php").then(okFx, notOk);
                function okFx(response) {
                    $scope.jsonArray = response.data;
                }
                function notOk(response) {
                    alert(response.data);
                }
            }

            $scope.doDelete = function(uid) {
                $http.get("angular-delete-doctors.php?uid=" + uid).then(okFx, notOk);
                function okFx(response) {
                    alert(response.data);
                    $scope.doFetchAll();
                }
                function notOk(response) {
                    alert(response.data);
                }
            }

            $scope.doSort = function(colm) {
                $scope.colName = colm;
            }

        });
    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="doFetchAll();">
  <!-- ng-app="mymodule" ng-controller="mycontroller" ng-init="fetchCities();" -->
  <div class="manager-title">
Doctor Manager
  </div>
  <div class="manager-background">
        <h3>
            All records
        </h3>
        <p>
            Search in user id field : <input type="text" ng-model="googler.uid">
        </p>
        <div class="btn btn-success" ng-click="doFetchAll();">Fetch All Records</div>

        <table width="600" border="1" rules="all">
            <tr>
                <th>Sr. number</th>
                <th ng-click="doSort('uid');">User ID</th>
                <th ng-click="doSort('dname');">Doctor Name</th>
                <th ng-click="doSort('contact');">Contact</th>
                <th>Operations</th>
            </tr>
            <tr ng-repeat="obj in jsonArray |orderBy:colName|filter:googler">
                <td>{{$index+1}}</td>
                <td>{{obj.uid}}</td>
                <td>{{obj.dname}}</td>
                <td>{{obj.contact}}</td>
                <td align="center"><input type="button" value="Delete" ng-click="doDelete(obj.uid);"></td>
            </tr>
        </table>
    </div>
</body>

</html>
