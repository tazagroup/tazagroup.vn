var app = angular.module('Site', ['localytics.directives', 'ngSanitize']);
app.filter('Gioitinh', function () {
  return function (input, data) {
    var result = 0;
    angular.forEach(data, function (v) {
      if (v.id === input) {
        result = v.title;
      }
    })
    return result;
  };
});
app.filter('Ftitle', function () {
  return function (input, data) {
    var result = '';
    angular.forEach(data, function (v) {
      if (parseInt(v.id) === parseInt(input)) {
        result = v.Thuoctinh;
      }
    })
    return result;
  };
});
app.filter('FMaunen', function () {
  return function (input, data) {
    var result = 0;
    angular.forEach(data, function (v) {
      if (parseInt(v.id) === parseInt(input)) {
        result = v.Maunen;
      }
    })
    return result;
  };
});
app.filter('FMauchu', function () {
  return function (input, data) {
    var result = 0;
    angular.forEach(data, function (v) {
      if (parseInt(v.id) === parseInt(input)) {
        result = v.Mauchu;
      }
    })
    return result;
  };
});
app.filter('Fdanhgia', function () {
  return function (input, data) {
    var result = 0;
    angular.forEach(data, function (v) {
      if (v.id === input) {
        result = v.title;
      }
    })
    return result;
  };
});
app.controller('Site', function ($scope, $http, $filter) {
  //Oninit Var Begin
  $scope.Oninit = function () {
    $scope.minDate = new Date();
    $scope.headers = {
      'Authorization': 'Bearer c2hhMjU2OjUxOmVlMGIzOWIzNjg3MjkzMTY2MWEzNDk4YmVjMDRkYmEwZmRmNTYzY2RhYjVmNGQzZDNhNjg5MDA3MjQyMzJiNTE='
    };
    //Cai Dat Begin   
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/caidats?page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = getdata(res.data.data);
        $scope.RCaidat = getdata(res.data.data);
        $scope.Danhgia = (data.find(result => result.id === 10)).Dulieu;
        $scope.Uutien = (data.find(result => result.id === 6)).Dulieu;
        $scope.TTThongbao = (data.find(result => result.id === 7)).Dulieu;
        $scope.Trangthaiviec = (data.find(result => result.id === 8)).Dulieu;
        $scope.Gioitinh = (data.find(result => result.id === 9)).Dulieu;
        $scope.Bophan = (data.find(result => result.id === 11)).Dulieu;
        $scope.Vitri = (data.find(result => result.id === 12)).Dulieu;
        $scope.Loaihinhhop = (data.find(result => result.id === 14)).Dulieu;
        console.log($scope.Danhgia);
      });
  }
  $scope.OninitCaidat = function () {
    $scope.Oninit();
    $scope.Dulieus = [{}];
    $scope.Caidat = {
      'Header': "Thêm Mới",
      'CRUD': 0
    };

  }
  $scope.addDulieu = function () {
    var newDulieu = {};
    $scope.Dulieus.push(newDulieu);
  }
  $scope.delDulieu = function (Dulieu) {
    var index = $scope.Dulieus.indexOf(Dulieu);
    $scope.Dulieus.splice(index, 1);
  }

  //Cai Dat Begin    
  $scope.CreateCaidat = function (Caidat, Dulieus) {
    var data = {
      "Title": Caidat.Title,
      "Dulieu": Dulieus
    };
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/caidats", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        Thongbao(0, "Thêm Cài Đặt Thành Công")
        $scope.OninitCaidat();
        $('.modal').modal('hide');
      }, function (res) {
        console.log(res);
        Thongbao(1, res.data.errors[0].title);
      });
  }
  $scope.UpdateCaidat = function (Caidat, Dulieus) {
    var data = {
      "Title": Caidat.Title,
      "Dulieu": Dulieus
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/caidats/" + Caidat.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        Thongbao(0, "Cập Nhật Cài Đặt Thành Công")
        $scope.OninitCaidat();
        $('.modal').modal('hide');
      }, function (res) {
        console.log(res);
        Thongbao(1, res.data.errors[0].title);
      });
  }
  $scope.EditCaidat = function (data) {
    $scope.Caidat = $scope.RCaidat.find(result => result.id === data.id);
    $scope.Caidat.CRUD = 1;
    $scope.Caidat.Header = "Cập Nhật";
    $scope.Dulieus = $scope.Caidat.Dulieu;
  }
  $scope.DeleteCaidat = function (id) {
    $http.delete("https://tazagroup.vn/api/index.php/v1/hrms/caidats/" + id, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.Oninit();
        Thongbao(0, "Xóa Cài Đặt Thành Công")
        $('.modal').modal('hide');
      }, function (res) {
        console.log(res);
        Thongbao(1, res.data.errors[0].title);
      });
  }
  //Oninit Var End
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
  //function end         
  function getdata(data) {
    var result = []
    angular.forEach(data, function (value, key) {
      result.push(value.attributes);
    });
    return result;
  }
  //Cauhoi Begin  
  $scope.OninitCauhoi = function () {
    $scope.Oninit();
    $scope.ReadCauhoi();
    $scope.Cauhoi = {
      'Title': 'Tạo mới',
      'CRUD': 0
    };
  }
  $scope.ReadCauhoi = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/cauhois?page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.ListCauhoi = getdata(res.data.data);
      });
  }
  $scope.editcauhoi = function (data) {
    $scope.Cauhoi = $scope.ListCauhoi.find(result => result.id === data.id);
    $scope.Cauhoi.Title = "Cập Nhật";
    $scope.Cauhoi.CRUD = 1;
  }
  $scope.CreateCauhoi = function (data) {
    var data = {
      "Cauhoi": data.Cauhoi,
      "Traloi": data.Traloi,
      "idPhongban": data.idPhongban,
      "idVitri": data.idVitri
    };
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/cauhois", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.OninitCauhoi();
        $('.modal').modal('hide');
        console.log(res);
        Thongbao(0, "Tạo Câu Hỏi Thành Công");
      }, function (res) {
        console.log(res);
        Thongbao(1, res.data.errors[0].title);
      });
  }
  $scope.UpdateCauhoi = function (dulieu) {
    var data = {
      "Cauhoi": dulieu.Cauhoi,
      "Traloi": dulieu.Traloi,
      "idPhongban": dulieu.idPhongban,
      "idVitri": dulieu.idVitri
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/cauhois/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.OninitCauhoi();
        $('.modal').modal('hide');
        console.log(res);
        Thongbao(0, "Cập Nhật Câu Hỏi Thành Công");
      }, function (res) {
        console.log(res);
        Thongbao(1, res.data.errors[0].title);
      });
  }
  $scope.DeleteCauhoi = function (data) {
    $http.delete("https://tazagroup.vn/api/index.php/v1/hrms/cauhois/" + data.id, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.OninitCauhoi();
        console.log(res);
      });
  }
  $scope.ImportCauhoi = function (data) {

  }
  //Cauhoi End  

  $scope.LoadChart = function (dulieu) {
    OrgChart.templates.ula.field_2 = '<foreignobject class="node" x="20" y="10" width="200" height="100">{val}</foreignobject>';
            OrgChart.templates.group.link = '<path stroke-linejoin="round" stroke="#aeaeae" stroke-width="1px" fill="none" d="M{xa},{ya} {xb},{yb} {xc},{yc} L{xd},{yd}" />';
            OrgChart.templates.group.nodeMenuButton = '';
            OrgChart.templates.group.min = Object.assign({}, OrgChart.templates.group);
            OrgChart.templates.group.min.imgs = "{val}";
            OrgChart.templates.group.min.img_0 = "";
            OrgChart.templates.group.min.description = '<text width="230" text-overflow="multiline" style="font-size: 14px;" fill="#aeaeae" x="125" y="100" text-anchor="middle">{val}</text>';     
    var chart = new OrgChart(document.getElementById("tree"), {
      layout: OrgChart.normal, 
      scaleInitial: 0.4,
      template: "diva",
      tags: {
        "group": {
            template: "group",
              },   
        "Ban Điều Hành": {
          template: "diva",
        },
        "Ban Điều Hành 1": {
          template: "diva",
          layout: OrgChart.treeRightOffset,
        },    
        "Chỉ Huy Vận Hành": {
          template: "ula",

          subLevels: 0
        },
        "Chỉ Huy Vận Hành 1": {
          template: "ula",
          subLevels: 1
        },
        "Chỉ Huy Vận Hành 2": {
          template: "ula",
          subLevels: 2
        },
        "Chỉ Huy Vận Hành 3": {
          template: "ula",
          subLevels: 3
        },
        "Vận Hành": {
          template: "olivia"
        },
        "Nhân Viên": {
          template: "olivia"
        },
         "Ban Giám Đốc Và Giám Đốc CGO": {
          template: "olivia"
        },     
        "partner": {
          template: "isla"
        }
      },


      nodeBinding: {
        field_0: "Họ Tên",
        field_1: "Chức Vụ",
        //	field_2: "Detail",
        img_0: "Photo"
      },

    });
    nodes = dulieu;
    chart.on('init', function (sender) {
      //  sender.editUI.show(1);
    });

    chart.load(nodes);

  }
  $scope.ReadSodo = function () {
    $http.post("https://tazagroup.net/index.php?option=com_kata&task=Phongban.ReadPhongban&format=raw")
      .then(function (data) {
        //  console.log(data);
        $scope.PBS = data.data;
        var dulieu = [];
        var tagv = '';
        angular.forEach(data.data, function (v) {
          if (v.Tags == 0) {
            tagv = v.Phongban;
          } else {
            tagv = v.Tags;
          }
          var dt = {
            id: v.id,
            'Họ Tên': v.Chucvu,
            pid: v.idParent,
            tags: [tagv],
            'Chức Vụ': v.name,
            Photo: "https://tazagroup.net/images/tazagroup-logo.png"
          };
          //var dt = { id: v.id,'Họ Tên': v.name, pid: v.idParent,tags: [tagv], 'Chức Vụ': v.Chucvu, Photo: "https://tazagroup.net/images/tazagroup-logo.png" };
          dulieu.push(dt);
        });
        // console.log(dulieu);
        
        var data = [
        {
          "id": "BDH",
          "Họ Tên": "Ban Giám Đốc Và Giám Đốc CGO",
          "pid": 1,
          tags: ["Ban Giám Đốc Và Giám Đốc CGO"]
        },    
       {
          "id": "KhoiBackoffice",
          "Họ Tên": "Khối Backoffice",
          "pid": "BDH",
          "tags": ["Nhân Viên"]
        },  
        {
          "id": "KhoiCGO",
          "Họ Tên": "Khối CGO",
          "pid": "BDH",
          "tags": ["Nhân Viên"]
        },        
        {
          "id": "KhoiDV",
          "Họ Tên": "Khối Dich Vụ",
          "pid": "BDH",
          "tags": ["Nhân Viên"]
        },      
        {
          "id": "Timona",
          "Họ Tên": "Timona",
          "pid": "BDH",
          "tags": ["Nhân Viên"]
        },         
        {
          "id": "Sharyn",
          "Họ Tên": "Sharyn",
          "pid": "BDH",
          "tags": ["Nhân Viên"]
        },           
            {
          "id": 32,
          "Họ Tên": "Sharyn",
          "stpid": "Sharyn",
          "tags": ["Ban Điều Hành"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 31,
          "Họ Tên": "Phòng Đào Tạo",
          "pid": 14,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 30,
          "Họ Tên": "Vận hành/ kiểm soát nội bộ",
          "pid": 14,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 29,
          "Họ Tên": "Cơ Sở Hạ Tầng",
          "pid": 14,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": "PHẠM NGỌC MINH TÚ",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 28,
          "Họ Tên": "Nhân Viên Content 2",
          "pid": 25,
          "tags": ["Nhân Viên"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 27,
          "Họ Tên": "Nhân Viên Content 1",
          "pid": 25,
          "tags": ["Nhân Viên"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 26,
          "Họ Tên": "LEAD DIGITAL MKT",
          "pid": 23,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 25,
          "Họ Tên": "LEAD CONTENT",
          "pid": 23,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 24,
          "Họ Tên": "SALE ADMIN",
          "pid": 5,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": "TRẦN HOÀNG MAI",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 23,
          "Họ Tên": "MAKETING MANAGER",
          "pid": 22,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 22,
          "Họ Tên": "MARKETING DIRECTOR",
          "pid": 13,
          "tags": ["Chỉ Huy Vận Hành 1"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 21,
          "Họ Tên": "LEAD DESIGN MEDIA",
          "pid": 22,
          "tags": ["Chỉ Huy Vận Hành 1"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 20,
          "Họ Tên": "Leader SEO - IT",
          "pid": 22,
          "tags": ["Chỉ Huy Vận Hành 1"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 19,
          "Họ Tên": "Leader SOL Học Viện",
          "pid": 13,
          "tags": ["Chỉ Huy Vận Hành 3"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 18,
          "Họ Tên": "ISO",
          "pid": 14,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": "NGUYỄN THỊ OANH",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 17,
          "Họ Tên": "Thu Mua",
          "pid": 14,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": "BÙI THỊ DIỄM QUỲNH",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 16,
          "Họ Tên": "Kho",
          "pid": 14,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": "NGUYỄN BÌNH PHƯƠNG",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 15,
          "Họ Tên": "Kế Toán",
          "pid": 14,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": "ĐỖ NGỌC HUYỀN",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 14,
          "Họ Tên": "Phó Tổng Giám Đốc - Giám Đốc Khối Back Office",
          "stpid": "KhoiBackoffice",
          "tags": ["Ban Điều Hành 1"],
          "Chức Vụ": "NGUYỄN TRUNG THÀNH",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 13,
          "Họ Tên": "Giám Đốc Khối CGO",
          "stpid": "KhoiCGO",
          "tags": ["Ban Điều Hành"],
          "Chức Vụ": "TRẦN MỸ DUYÊN",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 12,
          "Họ Tên": "Giám Đốc Khối Dịch Vụ",
          "stpid":"KhoiDV",
          "tags": ["Ban Điều Hành"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 11,
          "Họ Tên": "Phó Tổng Giám - Giám Đốc Học Viện Timona",
          "stpid": "Timona",
          "tags": ["Ban Điều Hành"],
          "Chức Vụ": "NGUYỄN THỊ KIỀU OANH",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },
        {
          "id": 10,
          "Họ Tên": "TRỢ LÝ TGĐ",
          "pid": 3,
          "tags": ["partner"],
          "Chức Vụ": "LÊ PHI HOÀNG",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 9,
          "Họ Tên": "Nhân Viên Telesale 1",
          "pid": 8,
          "tags": ["Nhân Viên"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 8,
          "Họ Tên": "Leader Telesale",
          "pid": 13,
          "tags": ["Chỉ Huy Vận Hành 3"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 7,
          "Họ Tên": "CDCN Bình Thạnh",
          "pid": 11,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 6,
          "Họ Tên": "GDCN Gò Vấp",
          "pid": 12,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, 
          {
          "id": 52,
          "Họ Tên": "GDCN Thủ Đức",
          "pid": 12,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },
           {
          "id": 53,
          "Họ Tên": "GDCN Quận 10",
          "pid": 12,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },            
            {
          "id": 5,
          "Họ Tên": "Trợ Lý (CGO)",
          "pid": 13,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 4,
          "Họ Tên": "Hành Chính Nhân Sự",
          "pid": 14,
          "tags": ["Chỉ Huy Vận Hành"],
          "Chức Vụ": "ĐỖ THỊ MỸ TRANG",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, 
        {
          "id": 3,
          "Họ Tên": "Tổng Giám Đốc",
          "stpid": "BDH",
          "tags": ["Ban Điều Hành"],
          "Chức Vụ": "TRẦN THỊ TỐ UYÊN",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },{
          "id": 93,
          "Họ Tên": "Phó Tổng Giám Đốc",
          "pid": 3,
          "Chức Vụ": "NGUYỄN THỊ KIỀU OANH",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },
 {
          "id": 96,
          "Họ Tên": "Trợ Lý P.TGĐ",
          "pid": 93,
          "Chức Vụ": "LÝ THỊ THU HẰNG",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },           
{
          "id": 95,
          "Họ Tên": "Phó Tổng Giám Đốc",
          "pid": 3,
          "Chức Vụ": "NGUYỄN TRUNG THÀNH",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, 
  {
          "id": 94,
          "Họ Tên": "Giám Đốc Khối CGO",
          "pid": 3,
          "Chức Vụ": "TRẦN THỊ MỸ DUYÊN",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },
    {
          "id": 97,
          "Họ Tên": "Trợ Lý GĐK",
          "pid": 94,
          "Chức Vụ": "NGUYỄN THỊ KIM NGÂN",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },          
            
        {
          "id": 2,
          "Họ Tên": "Trợ lý (CTHDQT)",
          "pid": 1,
          "tags": ["partner"],
          "Chức Vụ": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 1,
          "Họ Tên": "Chủ Tịch Hội Đồng Quản Trị",
          "pid": "directors",
          "tags": ["Management"],
          "Chức Vụ": "TRẦN THỊ TỐ UYÊN",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }];
console.log(data);
        $scope.LoadChart(data);
      });

  }
  //Hồ Sơ Begin
  $scope.ReadHoso = function (id) {
    $http.get("https://tazagroup.vn/api/index.php/v1/users/" + id, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.Rhoso = res.data.data.attributes;
        console.log($scope.Rhoso);
      });
  }
  //Hồ Sơ End
  //Danh Sach Nhan Vien Begin
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
            "block": "0",
            "email": value.email,
            "groups": ["2"],
            "id": "0",
            "lastResetTime": "",
            "lastvisitDate": "",
            "name": value.name,
            "SDT": value.SDT,
            "Ngaysinh": value.Ngaysinh,
            "hinhanh": "",
            "CMND": value.CMND,
            "Diachi": value.Diachi,
            "Gioitinh": value.Gioitinh,
            "MaNV": value.MaNV,
            "idPhongban": value.idPB,
            "idVitri": value.idVitri,
            "Datein": value.Datein,
            "params": {
              "admin_language": "",
              "admin_style": "",
              "editor": "",
              "helpsite": "",
              "language": "",
              "timezone": ""
            },
            "password": "@Taza#Group*2021",
            "password2": "@Taza#Group*2021",
            "registerDate": "",
            "requireReset": "0",
            "resetCount": "0",
            "sendEmail": "0",
            "username": value.SDT
          };
          //  console.log(data);
          $scope.ImportUser(data);
        });
        $scope.ReadListNhanVien();
      }
      reader.onerror = function (ex) {}
      reader.readAsBinaryString(file);
    }
  }
  $scope.ImportUser = function (data) {
    var data = data;
    $http.post("https://tazagroup.vn/api/index.php/v1/users", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        //console.log(res);
      });
  }

  $scope.editnv = function (data) {
    $scope.nhansu = $scope.RListNV.find(result => result.id === data.id);
  }

  $scope.Phantrang = function (data, item) {
    $scope.item = item || 10;
    $scope.from = 1;
    $scope.limit = parseInt($scope.from) + parseInt($scope.item);
    $scope.chontrang = 0;
    $scope.totalItems = data.length;
    $scope.sotrang = Math.ceil($scope.totalItems / $scope.item);
    $scope.Pagination = [];
    var value;
    for (var i = 0; i < $scope.sotrang; i++) {
      value = {
        'id': i,
        'value': i + 1
      };
      $scope.Pagination.push(value);
    }
    // console.log($scope.Pagination );
  }
  $scope.Pagechose = function (dulieu) {
    $scope.hientai = dulieu + 1;
    $scope.from = (dulieu * $scope.item);
    $scope.limit = parseInt($scope.from) + parseInt($scope.item);
  }
  $scope.ReadListNhanVien = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/users?page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.RListNV = getdata(res.data.data);
        $scope.Phantrang($scope.RListNV, 10);
        //  console.log($scope.RListNV);


      });
  }

  //Danh Sach Nhan Vien End

  //Lịch họp Begin  
  $scope.Oninitlichhop = function () {
    $scope.Oninit();
    $scope.ReadLichhop('calendar', '', 1);
    $scope.ReadListNhanVien();
    $scope.Lichhop = {
      'Title': 'Tạo mới',
      'CRUD': 0
    };
    $('.modal').modal('hide');
  }

  $scope.CreateLichhop = function (dulieu) {
    var data = {
      "idLoaihinh": dulieu.idLoaihinh,
      "Tieude": dulieu.Tieude,
      "idChutri": dulieu.idChutri,
      "idThamgia": '"'+dulieu.idThamgia +'"',
      "NgayBD": $filter('date')(dulieu.NgayBD, "yyyy-MM-dd HH:mm:ss"),
      "NgayKT": $filter('date')(dulieu.NgayKT, "yyyy-MM-dd HH:mm:ss"),
      "Trienkhai": $filter('date')(dulieu.Trienkhai, "yyyy-MM-dd HH:mm:ss"),
      "Review": $filter('date')(dulieu.Review, "yyyy-MM-dd HH:mm:ss"),
      "Hoanthanh": $filter('date')(dulieu.Hoanthanh, "yyyy-MM-dd HH:mm:ss"),
      "Noidung": dulieu.Noidung,
      "HuongTK": dulieu.HuongTK,
      "KQTH": dulieu.KQTH,
      "KQMD": dulieu.KQMD,
      "BPDC": dulieu.BPDC,
      "Ngansach": dulieu.Ngansach,
      "DKkhac": dulieu.DKkhac,
      "Nguyennhan": dulieu.Nguyennhan,
    };
    var data1 = {
      "Tieude": dulieu.Tieude,
      "Uutien": 1,
      "Deadline": $filter('date')(dulieu.Hoanthanh, "yyyy-MM-dd HH:mm:ss"),
      "idGiao": 0,
      "idNhan": dulieu.idChutri,
    };
    // console.log(data);
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/lichhops", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.CreateDauviec(data1, dulieu.idChutri);
        $scope.Oninitlichhop();
      }, function (res) {
        Thongbao(1, res.data.errors[0].title);
        console.log(res);
      });
  }
  $scope.UpdateLichhop = function (dulieu) {
    var data = {
      "idLoaihinh": dulieu.idLoaihinh,
      "Tieude": dulieu.Tieude,
      "idChutri": dulieu.idChutri,
      "idThamgia": '"'+dulieu.idThamgia +'"',
      "NgayBD": $filter('date')(dulieu.NgayBD, "yyyy-MM-dd HH:mm:ss"),
      "NgayKT": $filter('date')(dulieu.NgayKT, "yyyy-MM-dd HH:mm:ss"),
      "Trienkhai": $filter('date')(dulieu.Trienkhai, "yyyy-MM-dd HH:mm:ss"),
      "Review": $filter('date')(dulieu.Review, "yyyy-MM-dd HH:mm:ss"),
      "Hoanthanh": $filter('date')(dulieu.Hoanthanh, "yyyy-MM-dd HH:mm:ss"),
      "Noidung": dulieu.Noidung,
      "HuongTK": dulieu.HuongTK,
      "KQTH": dulieu.KQTH,
      "KQMD": dulieu.KQMD,
      "BPDC": dulieu.BPDC,
      "Ngansach": dulieu.Ngansach,
      "DKkhac": dulieu.DKkhac,
      "Nguyennhan": dulieu.Nguyennhan,
    };
    //console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lichhops/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Cập Nhật Thành Công");
        $scope.Oninitlichhop();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.ReadLichhop = function (id, view, header) {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/lichhops?page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = getdata(res.data.data);
        $scope.LoadLichs(data, id, view, header);
        $scope.RLichs = data;
        // console.log($scope.RLichs);
      });
  }
  $scope.LoadLichs = function (dulieu, id, view, header) {
    var events = [];
    angular.forEach(dulieu, function (value, key) {
      var list = {
        'id': value.id,
        'title': value.Tieude,
        'start': value.NgayBD,
        'end': value.NgayKT
      };
      events.push(list);
    });
    var headerToolbar = (header != 0) ? {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    } : '';
    var calendar = new FullCalendar.Calendar(document.getElementById(id), {
      headerToolbar: headerToolbar,
      initialView: view,
      initialDate: new Date(),
      locale: 'vi',
      buttonIcons: false, // show the prev/next text
      weekNumbers: true,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      dateClick: function (info) {
        console.log(info.date);
        console.log(new Date(info.date));
        var Modallichhop = new bootstrap.Modal(document.getElementById('modal-lichhop'), {
          keyboard: false,
          backdrop: 'static'
        });
        Modallichhop.show();
        $scope.Lichhop = {
          'Title': 'Tạo mới',
          'NgayBD': info.date,
          'NgayKT': info.date
        };
        $scope.$digest();
      },
      eventDrop: function (info) {
        $scope.EventClick(info);
        info.revert();
      },
      dayMaxEvents: true, // allow "more" link when too many events
      eventClick: function (event) {
        $scope.EventClick(event);
      },
      events: events,
    });

    calendar.render();
  }
  $scope.EventClick = function (data) {
    $scope.Lichhop = $scope.RLichs.find(result => result.id === parseInt(data.event.id));
    $scope.Lichhop.Title = "Cập Nhật";
    $scope.Lichhop.CRUD = 1;
    $scope.Lichhop.NgayBD = new Date($scope.Lichhop.NgayBD);
    $scope.Lichhop.NgayKT = new Date($scope.Lichhop.NgayKT);
    $scope.Lichhop.Trienkhai = new Date($scope.Lichhop.Trienkhai);
    $scope.Lichhop.Review = new Date($scope.Lichhop.Review);
    $scope.Lichhop.Hoanthanh = new Date($scope.Lichhop.Hoanthanh);
    $scope.Lichhop.Ngansach = parseInt($scope.Lichhop.Ngansach);
    console.log('edit', data);
    var Modallichhop = new bootstrap.Modal(document.getElementById('modal-lichhop'), {
      keyboard: false,
      backdrop: 'static'
    });
    Modallichhop.show();
    $scope.$digest();
  }

  $scope.Loadbpdc = function (data) {
    tinymce.get("jform_bpdc").setContent(data);
  }
  $scope.Updatebpdc = function () {
    $scope.Lichhop.BPDC = tinymce.get("jform_bpdc").getContent();
  }
  $scope.LoadHuongTK = function (data) {
    tinymce.get("jform_huongtk").setContent(data);
  }
  $scope.UpdateHuongTK = function () {
    $scope.Lichhop.HuongTK = tinymce.get("jform_huongtk").getContent();
  }

  //Lịch họp End  
  //Đầu Việc Begin 
  $scope.Oninitdauviec = function () {
    $scope.Oninit();
    $scope.ReadLichhop('calendar1', 'listWeek', 0);
    $scope.ReadDauviec();
    $scope.ReadListNhanVien();
    $scope.Dauviec = {
      'Title': 'Tạo mới',
      'CRUD': 0
    };
    $('.modal').modal('hide');
  }

  $scope.CreateDauviec = function (dulieu, id) {
    var data = {
      "Tieude": dulieu.Tieude,
      "Uutien": dulieu.Uutien,
      "Deadline": $filter('date')(dulieu.Deadline, "yyyy-MM-dd"),
      "idGiao": id,
      "idNhan": dulieu.idNhan,
    };
    console.log(data);
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/todos", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Tạo Việc Thành Công")
        $scope.CreateTinnhan(dulieu, id);
        $scope.Oninitdauviec();
      }, function (res) {
        Thongbao(1, res.data.errors[0].title);
        console.log(res);
      });
  }
  $scope.ReadDauviec = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/todos?page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = getdata(res.data.data);
        $scope.RDauviec = data;
        //  console.log(data);
      });

  }
  //Đầu Việc End 

  //Tin Nhắn Begin 
  $scope.OninitTinnhan = function () {
    $scope.Oninit();
    $scope.ReadTinnhan();
    $('.modal').modal('hide');
  }

  $scope.CreateTinnhan = function (dulieu, id) {
    var data = {
      "idGui": id,
      "idNhan": dulieu.idNhan,
      "Tieude": dulieu.Tieude,
      "Noidung": dulieu.Noidung,
      "Ghichu": dulieu.Ghichu,
    };
    console.log(data);
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/tinnhans", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.Oninitdauviec();
      }, function (res) {
        // console.log(res);
      });
  }
  $scope.UpdateTinnhan = function (TT, dulieu) {
    var data = {
      "Trangthai": TT,
      "Ghichu": dulieu.Ghichu,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/tinnhans/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        TT != 1 ? Thongbao(0, "Đã xác nhận việc") : Thongbao(1, "Đã Hủy Việc");
        $scope.OninitTinnhan();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.ReadTinnhan = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/tinnhans", {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = getdata(res.data.data);
        $scope.Rtinnhan = data;
        var id = new Date();
        // console.log(data);
      });

  }
  $scope.editThongbao = function (data) {
    $scope.tn = $scope.Rtinnhan.find(result => result.id === data.id);
  }
  //Tin Nhắn End   


});
