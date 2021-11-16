var app = angular.module('Admin', []);
app.controller('Admin', function($scope,$http) {
    
   $scope.loadFile = function (files) {  
  
        $scope.$apply(function () {  
  
            $scope.selectedFile = files[0];  
                console.log($scope.selectedFile);
        })  
  
    } 
    $scope.handleFile = function () {  
  
        var file = $scope.selectedFile;  
  
        if (file) {  
  
            var reader = new FileReader();  
  
            reader.onload = function (e) {  
  
                var data = e.target.result;  
  
                var workbook = XLSX.read(data, { type: 'binary' });  
  
                var first_sheet_name = workbook.SheetNames[0];  
  
                var dataObjects = XLSX.utils.sheet_to_json(workbook.Sheets[first_sheet_name]);  
  
                console.log(dataObjects);  
                angular.forEach(dataObjects, function(value, key) {
                    var data = {"Cauhoi":value.Cauhoi,"Traloi": value.Traloi}; 
                   $scope.ImportCauhoi(data);
                });
                $scope.ReadCauhoi();
            }  
  
            reader.onerror = function (ex) {  
  
            }  
  
            reader.readAsBinaryString(file);  
        }  
    } 
   
   
 $scope.ReadCauhoi = function()
 {
    var headers = { 
    'Authorization': 'Bearer c2hhMjU2OjUxOmVlMGIzOWIzNjg3MjkzMTY2MWEzNDk4YmVjMDRkYmEwZmRmNTYzY2RhYjVmNGQzZDNhNjg5MDA3MjQyMzJiNTE='
  };
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/cauhois",{headers:headers})
    .then(function(res) {
        $scope.ListCauhoi = res.data.data;
        console.log(res.data.data);
    });
 }
  $scope.CreateCauhoi = function()
 {
     var headers = { 
        'Authorization': 'Bearer c2hhMjU2OjUxOmVlMGIzOWIzNjg3MjkzMTY2MWEzNDk4YmVjMDRkYmEwZmRmNTYzY2RhYjVmNGQzZDNhNjg5MDA3MjQyMzJiNTE='
      };
     var data = {"name": "kiet","Cauhoi": "fgđfgdfgdf","Traloi": "aliasdfsdfs","ordering": 1,"published": 1};   
        $http.post("https://tazagroup.vn/api/index.php/v1/hrms/cauhois",data,{headers:headers})
        .then(function(res) {
            $scope.ReadCauhoi();
            console.log(res);
        });
 }
$scope.ImportCauhoi = function(data)
 {
     var headers = { 
        'Authorization': 'Bearer c2hhMjU2OjUxOmVlMGIzOWIzNjg3MjkzMTY2MWEzNDk4YmVjMDRkYmEwZmRmNTYzY2RhYjVmNGQzZDNhNjg5MDA3MjQyMzJiNTE='
      };
     var data = data;  
        $http.post("https://tazagroup.vn/api/index.php/v1/hrms/cauhois",data,{headers:headers})
        .then(function(res) {
           // $scope.ReadCauhoi();
            //console.log(res);
        });
 } 
});