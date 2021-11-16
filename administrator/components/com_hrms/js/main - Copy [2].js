var app = angular.module('Admin', ['ui.tinymce']);
app.controller('Admin', function($scope,$http) {
   
  $scope.tinymceOptions = {
    plugins: 'link image code',
    toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code'
  };
 $scope.tinymceModel ="<p>CREATE TABLE IF NOT EXISTS `ggurw_hrms_kehoach` (</p><p>&nbsp; `id` int unsigned NOT NULL AUTO_INCREMENT,</p><p>&nbsp; `idUser` int(11) NOT NULL DEFAULT '0',</p><p>&nbsp; `Noidung` text NULL,</p><p>&nbsp; `Muctieu` text NULL,</p><p>&nbsp; `Thuchien` text NULL,</p><p>&nbsp; `Ghichu` text NULL,</p><p>&nbsp; `Loai` tinyint NULL,</p><p>&nbsp; `Trangthai` tinyint NOT NULL DEFAULT 0,</p><p>&nbsp; `published` tinyint NOT NULL DEFAULT 0,</p><p>&nbsp; `ordering` int NOT NULL DEFAULT 0,</p><p>&nbsp; `created` datetime NOT NULL,</p><p>&nbsp; `created_by` int unsigned NOT NULL DEFAULT 0,</p><p>&nbsp; `modified` datetime NOT NULL,</p><p>&nbsp; `modified_by` int unsigned NOT NULL DEFAULT 0,</p><p>&nbsp; PRIMARY KEY (`id`)</p><p>) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;</p>";   
 $scope.SQL = '';
  $scope.CreateAPI = function(x,y)
 {
      //console.log(x,y);
     var data = {"x": x,"y": y};   
        $http.post("https://tazagroup.vn/administrator/index.php?option=com_hrms&task=hrm.CreateApi&format=raw",data)
        .then(function(res) {
            console.log(res);
        });
 }    
    
    
    
    
    
    
    
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