<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/history-bp.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script>
        $module = angular.module("mymodule", []);
        $module.controller("mycontroller", function($scope, $http, $filter) {
            $scope.jsonArray;

            $scope.doFetchAll = function(uid, dateFrom, dateTo) {

                var dateFrom = $filter('date')(dateFrom, "yyyy-MM-dd");
                var dateTo = $filter('date')(dateTo, "yyyy-MM-dd");
                $http.get("angular-fetch-bp.php?uid=" + uid + "&dateFrom=" + dateFrom + "&dateTo=" + dateTo).then(okFx, notOk);

                function okFx(response) {
                    $scope.jsonArray = response.data;
                }

                function notOk(response) {
                    alert(response.data);
                }
            }
        });

        $(document).ready(function() {
            $("#fetch").click(function() {
                $("#table1").css("display", "table");
            });
        });

    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller">
    <div class=form-row>
        <div class="col-md-12 header text-center bp-title">
            <div class="d-inline-block header-text">BP History</div>
        </div>
    </div>
    <div class="bp-background">
        <div class="row">
            <div class="col-lg-3">
                <label for="uid">User Id</label>
                <input type="text" id="uid" name="uid" class="form-control" ng-model="uid" ng-init="uid='<?php echo $_SESSION["activeuser"];?>'" value='<?php echo $_SESSION["activeuser"];?>' disabled>
            </div>
            <div class="col-lg-3">
                <label for="dateFrom">Date from</label>
                <input name="dateFrom" id="dateFrom" type="date" ng-model="dateFrom" class="form-control">
            </div>
            <div class="col-lg-3">
                <label for="dateTo">Date to</label>
                <input type="date" name="dateTo" id="dateTo" ng-model="dateTo" class="form-control">
            </div>
            <div class="col-lg-3">
                <label for="">&nbsp;</label>
                <div class="btn btn-dark form-control" id="fetch" ng-click="doFetchAll(uid,dateFrom,dateTo);">Fetch</div>
            </div>
        </div>
        <center>
            <table class="mt-5 table table-bordered" id="table1">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>Sr no</th>
                        <th>Date of record</th>
                        <th>Systolic pressure</th>
                        <th>Diastolic pressure</th>
                        <th>Pulse</th>
                    </tr>
                </thead>
                <tr ng-repeat="obj in jsonArray |orderBy:colName|filter:googler">
                    <td>{{$index+1}}</td>
                    <td>{{obj.dateofrecord}}</td>
                    <td>{{obj.syst}}</td>
                    <td>{{obj.dia}}</td>
                    <td>{{obj.pulse}}</td>
                </tr>
            </table>
        </center>
    </div>

</body>

</html>
