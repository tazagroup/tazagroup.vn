$('.owl-carousel').owlCarousel({
    loop:true,
    center: true,
      URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash',
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:1,
            nav:false,
            loop:false
        }
    }
})

var app = angular.module('Site', ['ui.filters', 'kendo.directives']);
app.filter('FKD', function () {
  return function (input) {
      if(input == 0){return 'text-white fa-user-clock';}
      else if(input==1){return'text-white fa-user-check';}
      else {return'text-white fa-user-times';}

  }
});
app.filter('FKDBT', function () {
  return function (input) {
      if(input == 0){return 'btn-info';}
      else if(input==1){return'btn-success disabled';}
      else {return'btn-danger disabled';}

  }
});
app.filter('FTK', function () {
  return function (input, data) {
    var result = '';
    angular.forEach(data, function (v) {
      if (v.id === input) {
        result = v.Ten;
      }
    })
    return result;
  };
});
app.controller('Site', function ($scope, $http, $filter) {
    
  $scope.ScanQR = function () {
      function onScanSuccess(decodedText, decodedResult) {
        $scope.QrResult = decodedText;   
        $scope.OnInit();
        $scope.ReadTKXuatkho(decodedText);
        html5QrcodeScanner.clear();
      }
      var html5QrcodeScanner = new Html5QrcodeScanner("reader", {fps: 10,qrbox: 250});
     html5QrcodeScanner.render(onScanSuccess);
    };
    $scope.CKScanQR = function (data) {
      function onScanSuccess(decodedText, decodedResult) {
        $scope.CKQrResult = decodedText;   
        $scope.ReadTKChuyenkho(decodedText,data);
        html5QrcodeScanner.clear();
      }
      var html5QrcodeScanner = new Html5QrcodeScanner("ckqr-"+data.id, {fps: 10,qrbox: 250});
     html5QrcodeScanner.render(onScanSuccess);
    };  
    
  //function begin    
  function Thongbao(type, data) {
    const notyf = new Notyf();
    return type == 1 ? notyf.error({
       position: {
          x: "right",
          y: "top"
        },
        message: data,
        duration: 4000,
        icon: {
          className: "fas fa-exclamation-circle",
          tagName: "span",
          color: "#fff"
        }
      })
      : notyf.success({
        position: {
          x: "right",
          y: "top"
        },
        message: data,
        duration: 4000,
        icon: {
          className: "fas fa-check-circle",
          tagName: "span",
          color: "#fff"
        }

      })
  }

  function getdata(data) {
    var result = []
    angular.forEach(data, function (value, key) {
      value.attributes.created = new Date(value.attributes.created);
      result.push(value.attributes);
    });
    return result;
  }  
  //function End   
//Oninit Var Begin
   $scope.minDate= new Date();
   $scope.headers = {'Authorization': 'Bearer c2hhMjU2OjcyOmUzNGExYmY5YTViZGRhMzE4OWFkYTgzZDIyMDM3ZWY3MWQ5NjRkNzM1NWU0MjE5NGE3NmE1NmYwYjIwMWNkZTM='};
//Oninit Var End


  $scope.Phantrang = function (data) {
    $scope.hientai = 1;
    $scope.Sltrang = 100;
    $scope.fromitem = 0;
    $scope.toitem = $scope.fromitem + $scope.Sltrang;
    $scope.totalItems = data.length;
    $scope.sotrang = Math.ceil($scope.totalItems / $scope.Sltrang);
    $scope.Pagination = [];
    var value;
    for (var i = 0; i < $scope.sotrang; i++) {
      value = {
        'id': i,
        'value': i + 1
      };
      $scope.Pagination.push(value);
    }
    //console.log($scope.Pagination );
  }
  $scope.Pagechose = function (dulieu) {
    $scope.hientai = dulieu + 1;
    $scope.fromitem = (dulieu * $scope.Sltrang);
    $scope.toitem = $scope.fromitem + $scope.Sltrang;
  }

  $scope.idCN = "1";
  $scope.OnInit = function () {
    $scope.Fnks = [];
    $scope.Fxks = [];
    $scope.Fcks = [];
    $scope.Fckcts = [];
    $scope.ReadNguyenvatlieu();
    $scope.ReadNhapkho();
    $scope.ReadXuatkho();
    $scope.ReadTonkho();
    $scope.ReadChuyenkho();
  }


$scope.Listcongty=[{id:1,Ten:"Kho Tổng"},{id:2,Ten:"Chi Nhánh Bình Thạnh"},{id:3,Ten:"Chi Nhánh Quận  10"},{id:4,Ten:"Chi Nhánh Thủ Đức"},{id:5,Ten:"Chi Nhánh Gò Vấp"},{id:6,Ten:"Chi Nhánh Đà Nẵng"},{id:7,Ten:"Chi Nhánh Nha Trang"}];
$scope.Listtrangthai=[
    {id:0,Ten:"Chưa Xử lý"},
    {id:1,Ten:"Đã Chuyển"},
    {id:2,Ten:"Đã Nhân"},
    
];
  //Kho Begin
  //Nhap Kho Begin  
  $scope.addFnk = function () {
    var newFnk = {};
    $scope.Fnks.push(newFnk);
  }
  $scope.removeFnk = function (Fnk) {
    var index = $scope.Fnks.indexOf(Fnk);
    $scope.Fnks.splice(index, 1);
  }
  
  $scope.ReadNhapkho = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/crms/nhapkhos?filter[idCN]=" + $scope.idCN, {headers:$scope.headers})
      .then(function (res) {
        $scope.ListNhapkho = [];
        var data = getdata(res.data.data);
        var list = [];
        var unique = $filter('unique')(data, 'PhieuNhap');
        var max = unique.reduce((acc, uni) => acc = acc > uni.PhieuNhap ? acc : uni.PhieuNhap, 0);
        $scope.PhieuNhap = max + 1;
        // console.log(unique);
        angular.forEach(unique, function (value1, key1) {
          var x = [];
          var SLN = 0;
          var TT = 0;
          angular.forEach(data, function (value2, key2) {

            if (value1.PhieuNhap == value2.PhieuNhap) {
              x.push(value2);
              SLN += parseInt(value2.SoluongNhap);
              TT += parseInt(value2.GiaNhap);
              //console.log(value2);
            }
          });
          var y = {
            'PhieuNhap': value1.PhieuNhap,
            'SLN': SLN,
            'TT': TT,
            'dulieu': x,
            'Ngaytao': new Date(value1.created),
            'Nguoitao': value1.Nguoitao
          };
          $scope.ListNhapkho.push(y);
        });
        ////console.log(data);
        // console.log($scope.ListNhapkho);
      });
  }

  $scope.CreateNhapkho = function (dulieu) {
    if ($scope.idCN == "99999") {
      Thongbao(1, 'Vui lòng chọn chi nhánh');
    } else {
      angular.forEach(dulieu, function (value, key) {
         value.idNVL = value.NVL.id;
        var data = {
          "idCN": $scope.idCN,
          "PhieuNhap": $scope.PhieuNhap,
          "idNVL": value.idNVL,
          "SoluongNhap": value.SoluongNhap,
          "GiaNhap": value.GiaNhap,
          "HanSD": $filter('date')(value.HanSD, "yyyy-MM-dd"),
          "Ghichu": value.Ghichu,
          "qrcode":"NVL:"+value.idNVL+";SL:"+value.SoluongNhap+";Gianhap:"+value.GiaNhap+";HSD:"+$filter('date')(value.HanSD, "yyyy-MM-dd")
        };
     //   console.log(data);
        $http.post("https://tazagroup.vn/api/index.php/v1/crms/nhapkhos", data, {headers: $scope.headers})
          .then(function (res) {
            value.idNhap = res.data.data.id;
            Thongbao(0,'Nhập hàng thành công');
           $scope.LastTonkho(value, 1);
           // console.log(res);
          }, function (res) {
            //console.log(res);
          });
      });
    }

  }
  //Nhap kho End

  //Xuat Kho Begin 
   
  $scope.ReadTKXuatkho = function(qrcode)
  {    
     $http.get("https://tazagroup.vn/api/index.php/v1/crms/tonkhos?filter[idCN]=" + $scope.idCN +"&filter[qrcode]=" + qrcode +"&page[limit]=1", {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = getdata(res.data.data);
         console.log(data);
         if(data.length==0){Thongbao(1,"Chọn mã sản phẩm chưa nhập kho")}
         else {
         var check = 0;
        angular.forEach($scope.Fxks, function (value,key) {
            console.log(value);
             if(value.idNhap == data[0].idNhap) 
                 { check++; }
          });
         if(check!=0){Thongbao(1,'Xuất trùng sản phẩm')}
         else{ var newFxk = data[0];$scope.Fxks.push(newFxk);}
         }    
     });  

      
  }
  $scope.addFxk = function () {
    var newFxk = {};
    $scope.Fxks.push(newFxk);
  }
  $scope.removeFxk = function (Fxk) {
    var index = $scope.Fxks.indexOf(Fxk);
    $scope.Fxks.splice(index, 1);
  }
  $scope.ReadXuatkho = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/crms/xuatkhos?filter[idCN]=" + $scope.idCN, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.ListXuatkho = [];
        var data = getdata(res.data.data);
        var list = [];
        var unique = $filter('unique')(data, 'PhieuXuat');
        var max = unique.reduce((acc, uni) => acc = acc > uni.PhieuXuat ? acc : uni.PhieuXuat, 0);
        $scope.PhieuXuat = max + 1;
        // //console.log($scope.PhieuXuat);
        angular.forEach(unique, function (value1, key1) {
          var x = [];
          var SLX = 0;
          var TT = 0;
          angular.forEach(data, function (value2, key2) {

            if (value1.PhieuXuat == value2.PhieuXuat) {
              x.push(value2);
              SLX += parseInt(value2.SoluongXuat);
              TT += parseInt(value2.GiaXuat);
            }
          });
          //            var y = {'PhieuXuat':value1.PhieuXuat,'dulieu':x};
          var y = {
            'PhieuXuat': value1.PhieuXuat,
            'SLX': SLX,
            'TT': TT,
            'dulieu': x,
            'Ngaytao': new Date(value1.created),
            'Nguoitao': value1.Nguoitao
          };
          $scope.ListXuatkho.push(y);
        });
        ////console.log(data);
        ////console.log($scope.ListXuatkho);
      });
  }

  $scope.CreateXuatkho = function (dulieu) {
    if ($scope.idCN == "99999") {
            Thongbao(1,"Vui Lòng Chọn Chi Nhánh");
    } else {
      angular.forEach(dulieu, function (value, key) {
          value.SoluongXuat=value.SLX;
        var data = {
          "idCN": $scope.idCN,
          "PhieuXuat": $scope.PhieuXuat,
          "idNhap": value.idNhap,
          "SoluongXuat": value.SLX,
          "GiaXuat": value.GiaXuat,
        };
        console.log(data);
        $http.post("https://tazagroup.vn/api/index.php/v1/crms/xuatkhos", data, {
            headers: $scope.headers
          })
          .then(function (res) {
            $scope.LastTonkho(value, 0);
            Thongbao(0,"Đã Xuất Kho")
            console.log(res);
          }, function (res) {
            console.log(res);
          });
      });
    }

  }
 //$scope.checkedxk = false;
  $scope.CheckSLXK = function (SLX, SLT) {
    if (SLX > SLT) {
     $scope.checkedxk = true;
      Thongbao(1, "Quá Số Lượng Tồn Kho");
    }
    else{
       $scope.checkedxk = false; 
    }
  }

  //Xuat kho End  

  //Ton Kho Begin 

  $scope.ReadTonkho = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/crms/tonkhos?filter[idCN]=" + $scope.idCN, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.ListTonKho = [];
        var data = getdata(res.data.data);
        $scope.ListTonKhoDetail = data;
        var list = [];
        var unique = $filter('unique')(data, 'idNhap');
        //console.log(data);
        //  console.log(unique);
        angular.forEach(unique, function (value1) {
          var x = [];
          var SLX = 0;
          var SLN = 0;
          var SLT = 0;
          var TT = 0;
          angular.forEach(data, function (value2) {

            if (value1.idNhap == value2.idNhap) {
              SLN += parseInt(value2.SoluongNhap);
              SLX += parseInt(value2.SoluongXuat);
              x.push(value2);
            }
          });
          var y = {HanSD:value1.HanSD,
            'idNhap': value1.idNhap,
            'TenSP': value1.TenSP,
            'DVT': value1.DVT,
            'SLN': SLN,
            'SLX': SLX,
            'SLT': parseInt(SLN - SLX),
            'dulieu': x,
            'Nguoitao': value1.Nguoitao
          };
          $scope.ListTonKho.push(y);
        });
        ////console.log(data);
     //   console.log($scope.ListTonKho);

      });
  }

  $scope.LastTonkho = function (value, type) {
    $http.get("https://tazagroup.vn/api/index.php/v1/crms/tonkhos?filter[idCN]=" + $scope.idCN + "&filter[idNhap]=" + value.idNhap + "&page[limit]=1", {headers: $scope.headers})
      .then(function (res) {
        var dulieu = getdata(res.data.data);
        dulieu.length == "0" ? value.SoluongTon = 0 : value.SoluongTon = dulieu[0].SoluongTon;
        $scope.CreateTonkho(value, type);
      });
  }

  $scope.CreateTonkho = function (dulieu, type) {
    //console.log(dulieu);
    var data;
    type == 1 ? data = {
      "idCN": $scope.idCN,
      "idNhap": dulieu.idNhap,
      "GiaNhap": dulieu.GiaNhap,
      "SoluongNhap": dulieu.SoluongNhap,
      "SoluongTon": (dulieu.SoluongTon + dulieu.SoluongNhap)
    } : data = {
      "idCN": $scope.idCN,
      "idNhap": dulieu.idNhap,
      "GiaXuat": dulieu.GiaXuat,
      "SoluongXuat": dulieu.SoluongXuat,
      "SoluongTon": (dulieu.SoluongTon - dulieu.SoluongXuat)
    };
    $http.post("https://tazagroup.vn/api/index.php/v1/crms/tonkhos", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        $('.modal').modal('hide');
        $scope.OnInit();
        console.log(res);

      }, function (res) {
        console.log(res);
      });
  }
  //Ton kho End   


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
        var workbook = XLSX.read(data, {
          type: 'binary'
        });
        var first_sheet_name = workbook.SheetNames[0];
        var dataObjects = XLSX.utils.sheet_to_json(workbook.Sheets[first_sheet_name]);
        console.log(dataObjects);
        angular.forEach(dataObjects, function (value, key) {
          var data = {
            "MaSP": value.MaSP,
            "TenSP": value.TenSP,
            "DVT": value.DVT,
            "Chucnang": value.Chucnang,
            "Cachsudung": value.Cachsudung,
            "Luuy": value.Luuy,
            "Quytrinh": value.Quytrinh,
          };
          $scope.ImportNguyenvatlieu(data);
        });
        const notyf = new Notyf();
        notyf.success({
          message: 'Import Thành Công',
          duration: 4000,
          icon: false
        })
        $scope.OnInit();
      }
      reader.onerror = function (ex) {}
      reader.readAsBinaryString(file);
    }
  }
  $scope.ImportNguyenvatlieu = function (data) {
    var data = data;
    $http.post("https://tazagroup.vn/api/index.php/v1/crms/nguyenvatlieus", data, {
        headers: $scope.headers
      })
      .then(function (res) {});
  }
  $scope.ReadNguyenvatlieu = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/crms/nguyenvatlieus?page%5Boffset%5D=0&page%5Blimit%5D=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.ListNguyenvatlieu = getdata(res.data.data);
        $scope.Phantrang($scope.ListNguyenvatlieu);
      });
  }
  //NVL End

  //Chuyen Kho Begin
  $scope.addFck = function () {
    var newFck = {};
    $scope.Fcks.push(newFck);
  }
  $scope.removeFck = function (Fck) {
    var index = $scope.Fcks.indexOf(Fck);
    $scope.Fcks.splice(index, 1);
  }
  
  $scope.addFckct = function () {
    var newFckct = {};
    $scope.Fckcts.push(newFckct);
  }
  $scope.removeFckct = function (Fckct) {
    var index = $scope.Fckcts.indexOf(Fckct);
    $scope.Fckcts.splice(index, 1);
  }  
  $scope.ReadChuyenkho = function () {
    $scope.idCNNhan = $scope.idCN;
    $scope.idCNChuyen = "99999";
    $http.get("https://tazagroup.vn/api/index.php/v1/crms/chuyenkhos?filter[idCN]=" + $scope.idCN, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.ListChuyenkho = [];
        var data = getdata(res.data.data);
        //console.log(data);
        var list = [];
        var unique = $filter('unique')(data, 'PhieuChuyen');
        var max = unique.reduce((acc, uni) => acc = acc > uni.PhieuChuyen ? acc : uni.PhieuChuyen, 0);
        $scope.PhieuChuyen = max + 1;
        //console.log(unique);
        angular.forEach(unique, function (value1, key1) {
          //console.log(value1);
          var x = [];
          angular.forEach(data, function (value2, key2) {

            if (value1.PhieuChuyen == value2.PhieuChuyen) {
                value2.Trangthai=value2.Trangthai || 0;
              x.push(value2);
            }
          });
          var y = {
            'data': value1,
            'dulieu': x
          };
          $scope.ListChuyenkho.push(y);
        });
        //console.log(data);
       //  console.log($scope.ListChuyenkho);
      });
  }

  $scope.CreateChuyenkho = function (dulieu) {

    if ($scope.idCN == "99999" || $scope.idCNChuyen == "99999") {
        Thongbao(1,"Vui Lòng Chọn Chi Nhánh");
    } else {
      angular.forEach(dulieu, function (value, key) {
        var data = {
          "idCNNhan": $scope.idCNNhan,
          "idCNChuyen": $scope.idCNChuyen,
          "PhieuChuyen": $scope.PhieuChuyen,
          "idNVL": value.idNVL,
          "SoluongChuyen": value.SoluongChuyen,
        };
        ////console.log(data);
        $http.post("https://tazagroup.vn/api/index.php/v1/crms/chuyenkhos", data, {
            headers: $scope.headers
          })
          .then(function (res) {
            $('.modal').modal('hide');
            Thongbao(0,"Thêm Phiếu Chuyển Kho Thành Công");
            $scope.OnInit();
            console.log(res);
          }, function (res) {
            console.log(res);
          });
      });
    }

  }

  $scope.PheDuyet = function (dulieu,kd) {
      if(kd==2&&dulieu.Ghichu=='')
          {
            Thongbao(1,"Ghi chú lý do từ chối")  
          }
      else{
      var data = {"KiemDuyet": kd,"Ghichu": dulieu.Ghichu};
      //console.log(data);
      $http.patch("https://tazagroup.vn/api/index.php/v1/crms/chuyenkhos/"+dulieu.id, data, {
          headers: $scope.headers
        })
        .then(function (res) {
          $('.modal').modal('hide');
          $scope.OnInit();
     //     console.log(res);
        }, function (res) {
      //    console.log(res);
        });
      }
  }
  
  $scope.ReadTKChuyenkho = function(qrcode,dulieu)
  {    
     $http.get("https://tazagroup.vn/api/index.php/v1/crms/tonkhos?filter[idCN]=" + $scope.idCN +"&filter[qrcode]=" + qrcode +"&page[limit]=1", {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = getdata(res.data.data);
         console.log(data);
         if(data.length==0)
         {Thongbao(1,"Chọn mã sản phẩm chưa nhập kho")}
        else {
        var check = 0;
        if(dulieu.idNVL != data[0].idNVL)
                {
                   check =1;
                }
        else{
        angular.forEach($scope.Fckcts, function (value,key) {
            console.log(value);
             if(value.idNhap == data[0].idNhap) 
                 { check =2; }
          });
        }
        if(check==1)
            {
                Thongbao(1,'Xuất Sai Sản Phẩm');
            }       
        else if(check==2)
            {
                Thongbao(1,'Xuất trùng sản phẩm');
            }
         else{ var newFckct = data[0];$scope.Fckcts.push(newFckct);}
         }    
     });  
 
  }
  //Chuyen Kho End
  //Chuyen Kho Chi Tiet Begin
$scope.CreateChuyenkhoCT = function (dulieu,dulieu2) {
      angular.forEach(dulieu, function (value, key) {
        var data = {
          "idChuyen": dulieu2.id,
          "idNhap": dulieu2.idNhap,
          "Soluong": value.SLX,
        };
        console.log(data);
        $http.post("https://tazagroup.vn/api/index.php/v1/crms/chuyenkhocts", data, {
            headers: $scope.headers
          })
          .then(function (res) {
            Thongbao(0,"Đã Chuyển Kho")
            console.log(res);
          }, function (res) {
            console.log(res);
          });
      });

  }

  //Kho End


});
