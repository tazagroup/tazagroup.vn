var App = angular.module('App', []);
App.controller('trangchu', function($scope , $http ,$window, $filter) {
 
 $scope.Connguoitaza =[
  {id:1,img:'',content:'1.	Mình làm việc ở đây được 5 năm nhưng chưa lúc nào thấy chán vì con người ở đây siêu dễ thương, buồn vui hay khó khăn gì là chia sẻ như anh chị em ruột thịt.'},
  {id:2,img:'',content:'2.	Mình làm ở công ty thấy rất thích, môi trường năng động toàn bạn trẻ chạc tuổi nhau nên cũng rất hợp gu'},
  {id:3,img:'',content:'3.	Sếp tâm lý, đồng nghiệp dễ thương, công việc phù hợp, mọi người đều máu lửa, chiến hết mình'},
  {id:4,img:'',content:'4.	Ở đâu cũng có áp lực cả, chỉ là mình dám đối mặt, chấp nhận thử thách và đủ bản lĩnh để vượt qua nó hay không thôi. Tôi đã làm được và bạn cũng vậy!'},
  {id:5,img:'',content:'5.	Thỏa sức sáng tạo là những gì mình có thể làm ở đây, ai có cùng sở thích thì lập team về với nhau nhé'},
  {id:6,img:'',content:'6.	Qua đợt mưa bão 2020, mình mới cảm nhận được tình người ấm áp dưới mái nhà Taza Group. Không biết nói gì hơn hai chữ CẢM ƠN!'},
  {id:7,img:'',content:'7.	Nhân viên mỗi tháng còn được voucher 2 triệu đi làm đẹp, đầu tư cho công việc đã đành lại còn đầu tư cho nhan sắc của nhân viên nữa, thích thế còn gì bằng.'},
  {id:8,img:'',content:'8.	Mới vào làm gần được 3 tháng nhưng rất thích môi trường ở đây, mọi người ai cũng trẻ trung, năng động, sẵn sàng support lẫn nhau để đạt hiệu quả cao nhất.'},  
  {id:9,img:'',content:'1.	Mình làm việc ở đây được 5 năm nhưng chưa lúc nào thấy chán vì con người ở đây siêu dễ thương, buồn vui hay khó khăn gì là chia sẻ như anh chị em ruột thịt.'},
  {id:10,img:'',content:'2.	Mình làm ở công ty thấy rất thích, môi trường năng động toàn bạn trẻ chạc tuổi nhau nên cũng rất hợp gu'},
  {id:11,img:'',content:'3.	Sếp tâm lý, đồng nghiệp dễ thương, công việc phù hợp, mọi người đều máu lửa, chiến hết mình'},
  {id:12,img:'',content:'4.	Ở đâu cũng có áp lực cả, chỉ là mình dám đối mặt, chấp nhận thử thách và đủ bản lĩnh để vượt qua nó hay không thôi. Tôi đã làm được và bạn cũng vậy!'},
  {id:13,img:'',content:'1.	Mình làm việc ở đây được 5 năm nhưng chưa lúc nào thấy chán vì con người ở đây siêu dễ thương, buồn vui hay khó khăn gì là chia sẻ như anh chị em ruột thịt.'},
  {id:14,img:'',content:'2.	Mình làm ở công ty thấy rất thích, môi trường năng động toàn bạn trẻ chạc tuổi nhau nên cũng rất hợp gu'},
  {id:15,img:'',content:'3.	Sếp tâm lý, đồng nghiệp dễ thương, công việc phù hợp, mọi người đều máu lửa, chiến hết mình'},
  {id:16,img:'',content:'4.	Ở đâu cũng có áp lực cả, chỉ là mình dám đối mặt, chấp nhận thử thách và đủ bản lĩnh để vượt qua nó hay không thôi. Tôi đã làm được và bạn cũng vậy!'},   
 ];
 
	$scope.hoten ='';
 	$scope.sdt ='';
 	$scope.dichvu ='';
	$scope.dangkytv = function(iduser,name,sdt,LinkBaiViet) {

 }; 
  
  $scope.FormDangKyShow = function() {
   $http.post("administrator/index.php?option=com_taza&task=Khachhang.Show&format=raw")  
    .then(function(data) { 
 	$scope.FDKs = data.data.details; 
  // console.log(data);

    }); 
  }; 

});