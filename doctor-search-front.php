<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/doctor-search-front.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script>
        $module = angular.module("mymodule", []);
        $module.controller("mycontroller", function($scope, $http) {
            $scope.jsonArray;

            $scope.doFetchAll = function() {
                $http.get("angular-fetch-doctors-cities.php?city=" + $scope.selObject.city).then(okFx, notOk);

                function okFx(response) {

                    $scope.jsonArray = response.data;
                    //alert(JSON.stringify(response.data));
                }

                function notOk(response) {
                    alert(response.data);
                }
            }
            $scope.fetchCities = function() {
                $http.get("angular-fetch-cities.php").then(okFx, notOk);

                function okFx(response) {
                    $scope.jsonArray2 = response.data;
                    $scope.selObject = $scope.jsonArray2[0];
                    //alert(JSON.stringify(response.data));
                }

                function notOk(response) {
                    alert(response.data);
                }
            }
        });

    </script>

</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="fetchCities();">
  <div class="search-background">
    <div class="row">
        <div class="col-md-12 header header-text text-center search-title">
            <div class="">
                Search Doctors
            </div>
        </div>
    </div>
    <div class="mt-4" style="width:1500px;margin:auto">
        <div class="row mt-3 offset-3">
            <div class="col-md-6 d-flex flex-row">
                <label style="width:100px" for="" class="mt-1">Select city</label>
                <select name="" class="custom-select" ng-options="obj.city for obj in jsonArray2" ng-model="selObject"></select>
            </div>
            <div class="col-md-6">
                <div class="btn btn-dark" id="xyz" ng-click="doFetchAll();">Find Doctors</div>
            </div>
        </div>
        <div class="card align-items-center ml-5 mt-5 shadow-sm" id="abc" style="width: 20rem;" ng-repeat="obj in jsonArray |orderBy:colName | filter:googler">
            <img src="uploads/{{obj.ppic}}" style="width:100px;height:100px;" class="card-img-top mt-2">
            <div class="card-body text-center">
                Name : {{obj.dname}}<br>
                Contact : {{obj.contact}}<br>
                Email : {{obj.email}}<br>
                Specialization : {{obj.spl}}<br>
                Experience : {{obj.exp}}<br>
                Address : {{obj.address}}<br>
            </div>
        </div>
    </div>
  </div>
</body>

</html>
