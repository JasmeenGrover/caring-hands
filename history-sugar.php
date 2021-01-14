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
    <link rel="stylesheet" href="css/history-sugar.css">
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
                $http.get("angular-fetch-sugar.php?uid=" + uid + "&dateFrom=" + dateFrom + "&dateTo=" + dateTo).then(okFx, notOk);

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
                if ($("#type").prop("selectedIndex") == 1) {
                    $("#blood").css("display", "table");
                    $("#urine").css("display", "none");
                    $("#both").css("display", "none");
                } else if ($("#type").prop("selectedIndex") == 2) {
                    $("#urine").css("display", "table");
                    $("#blood").css("display", "none");
                    $("#both").css("display", "none");
                } else if ($("#type").prop("selectedIndex") == 3) {
                    $("#both").css("display", "table");
                    $("#blood").css("display", "none");
                    $("#urine").css("display", "none");
                }

            });

        });

    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller">
    <div class="form-row">
        <div class="col-md-12 header text-center sugar-title">
            <div class="d-inline-block header-text">Sugar History</div>
        </div>
    </div>
    <div class="sugar-background">
        <div class="row">
            <div class="col-lg-6">
                <label for="uid">User Id</label>
                <input type="text" id="uid" name="uid" ng-model="uid" class="form-control" ng-init="uid='<?php echo $_SESSION["activeuser"];?>'" value='<?php echo $_SESSION["activeuser"];?>' disabled>
            </div>
            <div class="col-lg-6">
                <label for="type">Type</label>
                <select class="custom-select" name="type" id="type">
                    <option value="select" selected disabled>Select</option>
                    <option value="blood sugar">Blood sugar</option>
                    <option value="urine sugar">Urine Sugar</option>
                    <option value="urine sugar">Both</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <label for="dateFrom">Date from</label>
                <input name="dateFrom" id="dateFrom" type="date" class="form-control" ng-model="dateFrom">
            </div>
            <div class="col-lg-4">
                <label for="dateTo">Date to</label>
                <input type="date" name="dateTo" id="dateTo" ng-model="dateTo" class="form-control">
            </div>
            <div class="col-lg-4">
                <label for="">&nbsp;</label>
                <div class="btn btn-dark form-control" id="fetch" ng-click="doFetchAll(uid,dateFrom,dateTo);">Fetch</div>
            </div>
        </div>
        <table id="blood" class="mt-5 table table-bordered">
            <thead class="thead-light">
                <tr class="text-center">
                    <th>Sr no</th>
                    <th>Date of record</th>
                    <th>Time of record</th>
                    <th>Sugartime</th>
                    <th>Blood sugar result</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tr ng-repeat="obj in jsonArray |orderBy:colName|filter:googler">
                <td>{{$index+1}}</td>
                <td>{{obj.dateofrecord}}</td>
                <td>{{obj.timerecord}}</td>
                <td>{{obj.sugartime}}</td>
                <td>{{obj.sugarresult}}</td>
                <td>{{obj.age}}</td>
            </tr>
        </table>
        <table id="urine" class="mt-5 table table-bordered">
            <thead class="thead-light">
                <tr class="text-center">
                    <th>Sr no</th>
                    <th>Date of record</th>
                    <th>Time of record</th>
                    <th>Medicinal intake</th>
                    <th>Urine sugar result</th>
                </tr>
            </thead>
            <tr ng-repeat="obj in jsonArray |orderBy:colName|filter:googler">
                <td>{{$index+1}}</td>
                <td>{{obj.dateofrecord}}</td>
                <td>{{obj.timerecord}}</td>
                <td>{{obj.medintake}}</td>
                <td>{{obj.urineresult}}</td>
            </tr>
        </table>
        <table id="both" class="mt-5 table table-bordered">
            <thead class="thead-light">
                <tr class="text-center">
                    <th>Sr no</th>
                    <th>Date of record</th>
                    <th>Time of record</th>
                    <th>Sugartime</th>
                    <th>Blood sugar result</th>
                    <th>Medicinal intake</th>
                    <th>Urine sugar result</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tr ng-repeat="obj in jsonArray |orderBy:colName|filter:googler">
                <td>{{$index+1}}</td>
                <td>{{obj.dateofrecord}}</td>
                <td>{{obj.timerecord}}</td>
                <td>{{obj.sugartime}}</td>
                <td>{{obj.sugarresult}}</td>
                <td>{{obj.medintake}}</td>
                <td>{{obj.urineresult}}</td>
                <td>{{obj.age}}</td>
            </tr>
        </table>
    </div>



</body>

</html>
