var locale = {
    firstDayOfWeek: 1,
    weekdays: {
      shorthand: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
      longhand: ['Chủ Nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'],         
    }, 
    months: {
      shorthand: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
      longhand: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
    },
  }
$("#DLDV").flatpickr({
    enableTime: true,
    time_24hr: true,
    locale: locale,
    minDate: new Date()
});
$("#RVDV").flatpickr({
    enableTime: true,
    time_24hr: true,
    locale: locale,
    minDate: new Date()
});
$("#NgayBD").flatpickr({
    enableTime: true,
    time_24hr: true,
    locale: locale,
});
$("#NgayKT").flatpickr({
    enableTime: true,
    time_24hr: true,
    locale: locale,
});
$("#NgayTK").flatpickr({
    enableTime: true,
    time_24hr: true,
    locale: locale,
});
$("#NgayRV").flatpickr({
    enableTime: true,
    time_24hr: true,
    locale: locale,
});
$("#NgayHT").flatpickr({
    enableTime: true,
    time_24hr: true,
    locale: locale,
});

var app = angular.module('Site', ['ui.filters', 'localytics.directives', 'ngSanitize', 'ui.tinymce','ngCookies']);
app.filter('level', function () {
  return function (input) {
    var result = '';
    for (var i = 0; i <= input; i++) {

      result += "-";
    }
    return result;
  }
});
app.filter('dateDeadline', function() {
        return function( items, fromDate, toDate ) {
            var filtered = [];
            var from_date = new Date(fromDate);
            var to_date = new Date(toDate);
       var to_date = new Date(new Date(toDate).getTime() + 86400000);
        if (!fromDate && !toDate) {
            return items;
        }
            angular.forEach(items, function(item) {
                var date = new Date(item.Deadline);
                if(date > from_date && date < to_date) {
                    filtered.push(item);
                }
            });
            return filtered;
        };
    });

app.filter('dateReview', function() {
        return function( items, fromDate, toDate ) {
            var filtered = [];
            var from_date = new Date(fromDate);
            var to_date = new Date(toDate);
       var to_date = new Date(new Date(toDate).getTime() + 86400000);
        if (!fromDate && !toDate) {
            return items;
        }
            angular.forEach(items, function(item) {
                var date = new Date(item.Review);
                if(date > from_date && date < to_date) {
                    filtered.push(item);
                }
            });
            return filtered;
        };
    });
app.filter('dateNgaytao', function() {
        return function( items, fromDate, toDate ) {
            var filtered = [];
            var from_date = new Date(fromDate);
            var to_date = new Date(new Date(toDate).getTime() + 86400000);
        if (!fromDate && !toDate) {
            return items;
        }
            angular.forEach(items, function(item) {
                var date = new Date(item.Ngaytao);
                if(date > from_date && date < to_date) {
                    filtered.push(item);
                }
            });
            return filtered;
        };
    });

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
app.filter('Fimg', function () {
  return function (input, data) {
    var result = '';
    angular.forEach(data, function (v) {
      if (parseInt(v.id) === parseInt(input)) {
        result = v.img;
      }
    })
    return result;
  };
});
app.filter('Fname', function () {
  return function (input, data) {
    var result = '';
    angular.forEach(data, function (v) {
      if (parseInt(v.id) === parseInt(input)) {
        result = v.name;
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
app.controller('Site', function ($scope, $http, $filter, $sce,$timeout,$cookies) {
$scope.LuuAnhien = function (data) {
    $cookies.put("anhien", JSON.stringify(data));  
    Thongbao(0,"Đã Lưu Cấu Hình");
} ;
 $scope.GetAnhien = function() {
    $scope.tieude =  ($cookies.get('anhien'))? JSON.parse($cookies.get('anhien')):{
      "td1":true,    
      "td2":true,    
      "td3":true,    
      "td4":true,    
      "td5":true,    
      "td6":true,    
      "td7":true,    
      "td8":true,    
      "td9":true,    
      "td10":true,    
      "td11":true,    
      "td12":true,    
      "td13":true,    
      "td14":true,    
      "td15":true,    
      "td16":true,    
    };
     //$scope.tieude =   $cookies.get('anhien');
};       
 $scope.SetCookies = function (data) {
    $cookies.put("dauviec", data);  
} ;   
 $scope.GetCookies = function() {
     $scope.StateDV =    $cookies.get('dauviec');
};    
    
  $scope.tinymceOptions = {
    language: 'vi',
    entity_encoding: "raw",
    menubar: false,
    plugins: 'link image fullscreen lists imagetools code preview media',
    default_link_target: "_blank",
    toolbar: 'insertfile undo redo | bold underline italic | alignleft aligncenter alignright | bullist numlist insert/edit link image |outdent indent fullscreen image_upload code preview media',
    branding: false,
    image_class_list: [{
        title: 'Reponsive',
        value: 'img-fluid m-auto'
      },
      {
        title: '75%',
        value: 'img-fluid w-75 m-auto'
      },
      {
        title: '50%',
        value: 'img-fluid w-50 m-auto'
      },
      {
        title: '25%',
        value: 'img-fluid w-25 m-auto'
      },
    ],
    //images_upload_url: 'https://tazagroup.vn/index.php?option=com_hrms&task=Tailieu.uploadFile&format=raw',
    image_title: true,
    automatic_uploads: true,
    file_picker_types: 'image',
    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
      input.onchange = function () {
        var file = this.files[0];
        var fd = new FormData();
        fd.append('file', file);
        console.log(fd);
        $http.post("/index.php?option=com_hrms&task=Tailieu.uploadFileEditor&format=raw", fd, {
            transformRequest: angular.identity,
            headers: {
              'Content-Type': undefined,
              'Process-Data': false
            }
          })
          .then(function (res) {
            console.log(res);
            $scope.linkfile = res.data;
            cb(res.data, {
              title: file.name
            });
            Thongbao(0, 'Upload Hình Thành Công');
          }, function (res) {
            console.log(res);
            Thongbao(1, geterror(res));
          });

      };

      input.click();
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
  }
  //Oninit Var Begin
  $scope.XemPDF = function (url) {
    $scope.url = $sce.trustAsResourceUrl('https://tazagroup.vn/tailieu/' + url + '#toolbar=0&scrollbar=0');
  }

  $scope.test = [{
    khoi: "CGO",
    Phong: "Marketing",
    Vitri: "Content",
    File: "File.pdf",
    Ngay: "28/07/2021",
    Tinhtrang: "Hết Hiệu Lực",
    Ghichu: "No"
  }, ]

  $scope.addinput = function () {
    var newinput = {};
    $scope.inputs.push(newinput);
  }
  $scope.resetinput = function () {
    $scope.inputs = [];
  }
  $scope.delinput = function (input) {
    var index = $scope.inputs.indexOf(input);
    $scope.inputs.splice(index, 1);
  }
  $scope.Lammoi = function () {
        $scope.dl ={};
        $scope.SNT ={};
        $scope.Review ={};
        $scope.timkiem = {};
  }

  $scope.Oninit = function () {
//    $scope.dl={'from':new Date('2020','12','01'),'to':new Date('2021','11','31')};
//    $scope.SNT={'from':'','to':''};
    $scope.GetCookies();  
    $scope.inputs = [];
    $scope.GetAnhien();  
    $scope.minDate = new Date();
    $scope.headers = {
      'Authorization': 'Bearer c2hhMjU2OjcyOmUzNGExYmY5YTViZGRhMzE4OWFkYTgzZDIyMDM3ZWY3MWQ5NjRkNzM1NWU0MjE5NGE3NmE1NmYwYjIwMWNkZTM='
    };
    //Cai Dat Begin   
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/caidats?page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = getdata(res.data.data);
     //   console.log(data);
        $scope.RCaidat = getdata(res.data.data);
        $scope.Danhgia = (data.find(result => result.id === 10)).Dulieu;
        $scope.Uutien = (data.find(result => result.id === 6)).Dulieu;
        $scope.TTThongbao = (data.find(result => result.id === 7)).Dulieu;
        $scope.Trangthaiviec = (data.find(result => result.id === 8)).Dulieu;
        $scope.Gioitinh = (data.find(result => result.id === 9)).Dulieu;
        $scope.Bophan = (data.find(result => result.id === 11)).Dulieu;
        $scope.Vitri = (data.find(result => result.id === 12)).Dulieu;
        $scope.Loaihinhhop = (data.find(result => result.id === 14)).Dulieu;
        $scope.Khoi = (data.find(result => result.id === 15)).Dulieu;
        $scope.Phong = (data.find(result => result.id === 16)).Dulieu;
        $scope.TTLotrinh = (data.find(result => result.id === 17)).Dulieu;
        $scope.Congty = (data.find(result => result.id === 18)).Dulieu;
        $scope.Maviec = (data.find(result => result.id === 19)).Dulieu;
        $scope.TTCongviec = (data.find(result => result.id === 20)).Dulieu;
        $scope.TTDuyet = (data.find(result => result.id === 21)).Dulieu;
      });
   $scope.ReadListNhanVien();   
      
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
       // console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.UpdateCaidat = function (Caidat, Dulieus) {
      console.log(Dulieus);
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
       // console.log(res);
        Thongbao(1, geterror(res));
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
        //console.log(res);
        Thongbao(1, geterror(res));
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
  function geterror(data) {  
    return data.data.errors[0].title;
  } 
  function checkngay(date)
    {
        date1 = new Date();
        date2 = new Date(date);   
       var d1= new Date(date1.getFullYear(),date1.getMonth(),date1.getDate(),date1.getHours(),0,0,0);
       var d2= new Date(date2.getFullYear(),date2.getMonth(),date2.getDate(),date2.getHours(),0,0,0);
        var d3 =d1.getTime() - d2.getTime();
        if(d3>0)
            {
                result = 1;
            }
        else if(d3===0){ result = 3;}
        else { result = 2}
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
    $('.modal').modal('hide');
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
        //console.log(res);
        Thongbao(0, "Tạo Câu Hỏi Thành Công");
      }, function (res) {
       // console.log(res);
        Thongbao(1, geterror(res));
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
        console.log(res);
        Thongbao(0, "Cập Nhật Câu Hỏi Thành Công");
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.DeleteCauhoi = function (data) {
    $http.delete("https://tazagroup.vn/api/index.php/v1/hrms/cauhois/" + data.id, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.OninitCauhoi();
        console.log(res);
        Thongbao(0, "Xóa Câu Hỏi Thành Công")
      }, function (res) {
        Thongbao(1, geterror(res));
      });
  }
  $scope.ImportCauhoi = function (data) {

  }
  //Cauhoi End  

  $scope.LoadChart = function (dulieu) {
    OrgChart.templates.ula.field_2 = '<foreignobject class="node" x="20" y="10" width="200" height="100">{val}</foreignobject>';
    var chart = new OrgChart(document.getElementById("tree"), {
      layout: OrgChart.normal,
      toolbar: {
        layout: true,
        zoom: true,
        fit: true,
        expandAll: true
      },
      mouseScrool: OrgChart.action.ctrlZoom,
      scaleInitial: 0.4,
      template: "ula",
      tags: {
        "Chỉ Huy Vận Hành": {
          subLevels: 0
        },
        "normal": {
          layout: OrgChart.normal,
          subLevels: 0
        },
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
      sender.toolbarUI.showLayout();
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

        var data = [{
            "id": "BDH",
            "Họ Tên": "Ban Giám Đốc Và Giám Đốc CGO",
            "pid": 1,
            tags: ["normal"]
          },
          {
            "id": "KhoiBackoffice",
            "Họ Tên": "Khối Backoffice",
            "pid": "BDH",
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
            "tags": ["Group"],
            "Chức Vụ": "NGUYỄN TRUNG THÀNH",
            "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
          }, {
            "id": 13,
            "Họ Tên": "Giám Đốc Khối CGO",
            "stpid": "KhoiCGO",
            "Chức Vụ": "TRẦN MỸ DUYÊN",
            "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
          }, {
            "id": 12,
            "Họ Tên": "Giám Đốc Khối Dịch Vụ",
            "stpid": "KhoiDV",
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
          }, {
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
          }
        ];
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
  
 $scope.OninitNhanVien = function () {
    $scope.Oninit();
    $scope.ReadListNhanVien();
    $scope.Nhanvien = {
      'Title': 'Tạo mới',
      'CRUD': 0
    };
    $('.modal').modal('hide');
  }
  $scope.ReadListNhanVien = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/users?page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.RListNV = [];
        var data = getdata(res.data.data);
        angular.forEach(data, function (v) { 
        v.name = v.name +' ('+ $filter('Ftitle')(v.idVitri,$scope.Vitri)+')';
        $scope.RListNV.push(v);
     });
        console.log($scope.RListNV);

      });
  } 

  //Danh Sach Nhan Vien End

  
  //Lịch họp Begin  
  $scope.Oninitlichhop = function (initialDate,iduser) {
   $scope.iduser =  iduser;
   var iDate =   (initialDate != "")? $filter('date')(new Date(initialDate), "yyyy-MM-dd") : $filter('date')(new Date(), "yyyy-MM-dd");
    $scope.Oninit();
    $scope.ReadLichhop('calendar', '', 1,iDate,'');
    $scope.Lichhop = {
      'Title': 'Tạo mới',
      'idChutri':$scope.iduser,
      'CRUD': 0
    };
      
    $('.modal').modal('hide');
    $scope.isdisabled = false;   
  }
  $scope.CreateLichhop = function (dulieu) {
    var data = {
      "idLoaihinh": dulieu.idLoaihinh,
      "idCty": dulieu.idCty,
      "Tieude": dulieu.Tieude,
      "idChutri": dulieu.idChutri,
      "idThamgia": JSON.stringify(dulieu.idThamgia),
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
      "TShow":(dulieu.TShow === true)? 1:0 ,
      "DKkhac": dulieu.DKkhac,
      "Nguyennhan": dulieu.Nguyennhan,
    };
    // console.log(data);
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/lichhops", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        Thongbao(0,"Tạo Lịch Thành Công");
        var idLich = res.data.data.id;
        var data1 = {
            "Tieude": dulieu.Tieude,
            "idCty": dulieu.idCty,
            "idLich": idLich,
            "Uutien": 0,
            "Deadline": $filter('date')(dulieu.Hoanthanh, "yyyy-MM-dd HH:mm:ss"),
            "Review": $filter('date')(dulieu.Review, "yyyy-MM-dd HH:mm:ss"),
            "idThamgia": dulieu.idThamgia,
            "Ghichu": dulieu.Noidung
          };
        $scope.CreateGroupViec(data1, dulieu.idChutri); 
       $scope.Oninitlichhop(data.NgayBD,'');
      }, function (res) {
        Thongbao(1, geterror(res));
       // console.log(res);
      });
  }
  $scope.UpdateLichhop = function (dulieu) {
    var data = {
      "idLoaihinh": dulieu.idLoaihinh.toString(),
      "idCty": dulieu.idCty.toString(),
      "Tieude": dulieu.Tieude,
      "idChutri": dulieu.idChutri.toString(),
      "idThamgia": JSON.stringify(dulieu.idThamgia),
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
      "TShow":(dulieu.TShow === true)? 1:0,
      "Nguyennhan": dulieu.Nguyennhan,
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lichhops/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        Thongbao(0, "Cập Nhật Thành Công");
        $scope.Oninitlichhop(dulieu.NgayBD,$scope.iduser);
      }, function (res) {
        console.log(res);
      });
     var data2 = {
        "Tieude": dulieu.Tieude,
        "idThamgia": JSON.stringify(dulieu.idThamgia),
        "idCty" :dulieu.idCty,
        "Uutien" :dulieu.Uutien,
       // "Ghichu" :dulieu.Noidung,
        "Deadline": $filter('date')(dulieu.Hoanthanh, "yyyy-MM-dd HH:mm:ss"),
        "Review": $filter('date')(dulieu.Review, "yyyy-MM-dd HH:mm:ss"),
    };  
      $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/gtodos/"+dulieu.idTodo,data2, {headers: $scope.headers})
      .then(function (res) {
//        console.log(res);
      }, function (res) {
        console.log(res);
      }); 
      
//   $timeout(function() {   
//        location.reload();
//   },500)   
      
      
  }

 $scope.XoaLichhop = function (dulieu) {
    var data = {"published": 1,};
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lichhops/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        Thongbao(0, "Hủy Thành Công");
        $scope.Oninitlichhop(dulieu.NgayBD,$scope.iduser);
      }, function (res) {
        console.log(res);
      }); 
      $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/gtodos/"+dulieu.idTodo,data, {headers: $scope.headers})
      .then(function (res) {
        console.log(res);
      }, function (res) {
        console.log(res);
      });   
      
  } 
  
  
  
  
  $scope.DropLichhop = function (data) {
    var dulieu = $scope.RLichs.find(result => result.id === parseInt(data.event.id));
    dulieu.TShow =  (dulieu.TShow === true)? 1:0 ;
    dulieu.NgayBD = $filter('date')(data.event.start.toISOString(), "yyyy-MM-dd HH:mm:ss");
    dulieu.NgayKT = $filter('date')(data.event.start.toISOString(), "yyyy-MM-dd HH:mm:ss");
    console.log(dulieu);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lichhops/" + dulieu.id, dulieu, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Đổi Lịch Thành Công");
        $scope.Oninitlichhop(dulieu.NgayBD,$scope.idChutri1);
      }, function (res) {
        console.log(res);
      });
  }


  $scope.ReadLichhop = function (id, view, header,initialDate,iduser) {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/lichhops?filter[published]=0&filter[idChutri] ="+iduser+"&page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = getdata(res.data.data);
//        console.log(data);
        
        $scope.RLichs = [];
        $scope.LoadLichs(data, id, view, header,initialDate);
        angular.forEach(data, function (v) {  
           v.TShow = (v.TShow === 1)? true:false;
           v.NgayBD = new Date(v.NgayBD);
           v.NgayKT = new Date(v.NgayKT);
           v.Trienkhai = new Date(v.Trienkhai);
           v.Review = new Date(v.Review);
        //  v.Review = (v.Review===null)?'':'fix Lỗi';
           v.Hoanthanh = new Date(v.Hoanthanh);
           v.idThamgia = JSON.parse(v.idThamgia);;
           $scope.RLichs.push(v);
        });
   //      console.log($scope.RLichs);
//         console.log(data);
      });
  }
 
  
  
  $scope.LoadLichs = function (dulieu, id, view, header,initialDate) {
    var events = [];
    angular.forEach(dulieu, function (value, key) {
      var list = {
        'id': value.id,
        'title': value.Tieude,
        'start': value.NgayBD,
        'end': value.NgayKT,
        color: 'white',
        className: 'text-white bg-danger d-flex flex-column'
      };
      var list1 = {
        'id': value.id,
        'title': value.Tieude,
        'start': value.Trienkhai,
        'end': value.Trienkhai,
        color: 'white',
        className: 'text-white bg-info d-flex flex-column'
      };
      var list2 = {
        'id': value.id,
        'title': value.Tieude,
        'start': value.Review,
        'end': value.Review,
        color: 'white',
        className: 'text-white bg-warning d-flex flex-column'
      };
      var list3 = {
        'id': value.id,
        'title': value.Tieude,
        'start': value.Hoanthanh,
        'end': value.Hoanthanh,
        color: 'white',
        className: 'text-white bg-success d-flex flex-column'
      };
      events.push(list);
        if(value.TShow===0)
            {
      events.push(list1);
      events.push(list2);
      events.push(list3);
            }
    });
    var headerToolbar = (header != 0) ? {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    } : '';
    var calendar = new FullCalendar.Calendar(document.getElementById(id), {
      headerToolbar: headerToolbar,
      initialView: view,
      initialDate: initialDate,
      locale: 'vi',
      buttonIcons: false, // show the prev/next text
      weekNumbers: true,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      dateClick: function (info) {
       var date = new Date();
       var today = new Date(date.setDate(date.getDate() - 1));
        $scope.isdisabled = false;
        if (info.date.getTime() < today.getTime()) {
          Thongbao(1, "Không Được Thêm Lịch Trong Quá Khứ")
        } else {

          var Modallichhop = new bootstrap.Modal(document.getElementById('modal-lichhop'), {
            keyboard: false,
            backdrop: 'static'
          });
          Modallichhop.show();
          $scope.Lichhop = {
            'Title': 'Tạo mới',
            'idChutri':$scope.iduser,
            'NgayBD': $filter('date')(info.date, "yyyy-MM-dd hh:mm"),
            'NgayKT': $filter('date')(info.date, "yyyy-MM-dd hh:mm")
          };
          $scope.$digest();
        }
      },
      dayMaxEvents: true, // allow "more" link when too many events
      eventClick: function (event) {
        $scope.EventClick(event);
       // console.log(event);
      },
      eventDrop: function (info) {
          if (confirm("Bạn Quyết Định Đổi Lịch Họp?")) {
            $scope.DropLichhop(info);
          }
            else {info.revert();}
  
      },        
eventContent: function(arg) {
//  console.log(arg);
  let end = (arg.event.end  ==null)?'': ' - ' + $filter('date')(arg.event.end, "HH:mm");
  let el2 = document.createElement('div');
  let el3 = document.createElement('div');
  el2.className = 'fc-event-time';
  el2.innerHTML = $filter('date')(arg.event.start, "HH:mm")+ end;
  el3.className = 'fc-event-title';
  el3.style = 'white-space: normal';
  el3.innerHTML = arg.event.title;   
  let arrayOfDomNodes = [ el2,el3 ]
  return { domNodes: arrayOfDomNodes }
},        
 events: events,
    });
    calendar.render(); 
  $('.nav-pills li a').click(function(){
      calendar.render();
    });     
  }
  
  $scope.EventClick = function (data) {
    $scope.Lichhop = $scope.RLichs.find(result => result.id === parseInt(data.event.id));
    $scope.Lichhop.idLoaihinh = $scope.Lichhop.idLoaihinh.toString();
    $scope.Lichhop.idCty = $scope.Lichhop.idCty.toString();
    $scope.Lichhop.Title = "Cập Nhật";
    $scope.Lichhop.CRUD = 1;
    $scope.Lichhop.NgayBD = $filter('date')($scope.Lichhop.NgayBD, "yyyy-MM-dd hh:mm");
    $scope.Lichhop.NgayKT = $filter('date')($scope.Lichhop.NgayKT, "yyyy-MM-dd hh:mm");
    $scope.Lichhop.Trienkhai = $filter('date')($scope.Lichhop.Trienkhai, "yyyy-MM-dd hh:mm");
    $scope.Lichhop.Review = $filter('date')($scope.Lichhop.Review, "yyyy-MM-dd hh:mm");
    $scope.Lichhop.Hoanthanh = $filter('date')($scope.Lichhop.Hoanthanh, "yyyy-MM-dd hh:mm");
//    console.log($scope.Lichhop);
    var Modallichhop = new bootstrap.Modal(document.getElementById('modal-lichhop'), {
      keyboard: false,
      backdrop: 'static'
    });
    Modallichhop.show();
    $scope.$digest();
  }


  //Lịch họp End  
  //Đầu Việc Begin 
  $scope.Oninitdauviec = function (initialDate,iduser) {
      $scope.iduser = iduser;
     var iDate =   (initialDate != "")? $filter('date')(new Date(initialDate), "yyyy-MM-dd") : $filter('date')(new Date(), "yyyy-MM-dd");    
    $scope.Oninit();
    $scope.ReadGviec();
    $scope.ReadLichhop('calendar1', '', 1,iDate,iduser);  
    $scope.Dauviec = {
      'Maviec':'',
      'Title': 'Tạo mới',
      'CRUD': 0,
      'idThamgia' : [iduser]
    }; 
      $scope.Lichhop = {
      'Title': 'Tạo mới',
      'idChutri':$scope.iduser,
      'CRUD': 0
    };    
    $('.modal').modal('hide');
  }
$scope.CreateGroupViec = function (dulieu, id) {     
    console.log(dulieu);
    var data = {
        "Tieude": dulieu.Tieude,
        "idCty" :dulieu.idCty,
        "idLich":dulieu.idLich,
        "idThamgia":JSON.stringify(dulieu.idThamgia),
        "idGiao" :id,
        "Uutien" :dulieu.Uutien,
        "Ghichu" :dulieu.Ghichu,
        "Deadline": $filter('date')(dulieu.Deadline, "yyyy-MM-dd HH:mm:ss"),
        "Review": $filter('date')(dulieu.Review, "yyyy-MM-dd HH:mm:ss"),
    };
    console.log(data);
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/gtodos", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.UpdateMaviec(res.data.data.attributes);
         Thongbao(0, "Tạo Việc Thành Công")
      }, function (res) {
        Thongbao(1, geterror(res));
        console.log(res);
      });
  } 
  
 $scope.UpdateMaviec = function (data) {
    var Maviec = $filter('Ftitle')(data.idCty,$scope.Maviec)+ data.ordering;
    var dulieu = {"MaViec": Maviec};
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/gtodos/"+data.id,dulieu, {
                headers: $scope.headers
      })
      .then(function (res) {
       // console.log(res);
        $scope.Oninitdauviec('',$scope.iduser);
      }, function (res) {
        console.log(res);
      });
  }  
$scope.editDauviec = function (data) {
    $scope.Dauviec = $scope.RNhomviec.find(result => result.id === data.id);
    $scope.Dauviec.idCty = $scope.Dauviec.idCty.toString();
    $scope.Dauviec.Deadline = $filter('date')($scope.Dauviec.Deadline, "yyyy-MM-dd HH:mm");
    $scope.Dauviec.Tieude = $scope.Dauviec.Tieude;
    $scope.Dauviec.Uutien = $scope.Dauviec.Uutien.toString();
    $scope.Dauviec.NgayBD = $filter('date')($scope.Dauviec.NgayBD, "yyyy-MM-dd hh:mm");
    $scope.Dauviec.NgayKT = $filter('date')($scope.Dauviec.NgayKT, "yyyy-MM-dd hh:mm");
    $scope.Dauviec.Trienkhai = $filter('date')($scope.Dauviec.Trienkhai, "yyyy-MM-dd hh:mm");
    $scope.Dauviec.Review = $filter('date')($scope.Dauviec.Review, "yyyy-MM-dd hh:mm");
    $scope.Dauviec.Hoanthanh = $filter('date')($scope.Dauviec.Hoanthanh, "yyyy-MM-dd hh:mm");  
    $scope.Dauviec.Title = 'Cập Nhật';
    $scope.Dauviec.CRUD = 1;
  }
    $scope.delDauviec = function (data) {
    $scope.Dauviec = $scope.RNhomviec.find(result => result.id === data.id);
    $scope.Dauviec.Tieude = $scope.Dauviec.Tieude;
  }
$scope.editBienban = function (data) {
    $scope.isdisabled =true;
    console.log(data);
    $scope.Lichhop = $scope.RLichs.find(result => result.id === data);
    if($scope.Lichhop.idChutri.toString() == $scope.iduser)
        {$scope.isdisabled =false;}
    console.log($scope.Lichhop.idChutri.toString(),$scope.iduser);
    $scope.Lichhop.idLoaihinh =  $scope.Lichhop.idLoaihinh.toString();
    $scope.Lichhop.idCty =  $scope.Lichhop.idCty.toString();
    $scope.Lichhop.NgayBD = $filter('date')($scope.Lichhop.NgayBD, "yyyy-MM-dd hh:mm");
    $scope.Lichhop.NgayKT = $filter('date')($scope.Lichhop.NgayKT, "yyyy-MM-dd hh:mm");
    $scope.Lichhop.Trienkhai = $filter('date')($scope.Lichhop.Trienkhai, "yyyy-MM-dd hh:mm");
    $scope.Lichhop.Review = $filter('date')($scope.Lichhop.Review, "yyyy-MM-dd hh:mm");
    $scope.Lichhop.Hoanthanh = $filter('date')($scope.Lichhop.Hoanthanh, "yyyy-MM-dd hh:mm");
    $scope.Lichhop.Title = "Cập Nhật";
    $scope.Lichhop.CRUD = 1;
  }    
    
 $scope.Checkreview = function()
    {
        $scope.Dauviec.Review = '0000-00-00 00:00:00';
    }
 $scope.UpdateDauviec = function (data) {
    console.log(data);
    var dulieu = {
        "Tieude": data.Tieude,
        "idThamgia": JSON.stringify(data.idThamgia),
        "idCty" :data.idCty,
        "Uutien" :data.Uutien,
        "Ghichu" :data.Ghichu,
        "Deadline": $filter('date')(data.Deadline, "yyyy-MM-dd HH:mm:ss"),
        "Review": $filter('date')(data.Review, "yyyy-MM-dd HH:mm:ss"),
    };  
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/gtodos/"+data.id,dulieu, {
                headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.Oninitdauviec('',$scope.iduser);
      }, function (res) {
        console.log(res);
      });
    var dulieu2 = {
        "Tieude": data.Tieude,
        "idThamgia": JSON.stringify(data.idThamgia),
        "idCty" :data.idCty,
       // "Noidung" :data.Ghichu,
        "Hoanthanh": $filter('date')(data.Deadline, "yyyy-MM-dd HH:mm:ss"),
    }; 
    if(data.idLich!=null){
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lichhops/" + data.idLich, dulieu2, {
        headers: $scope.headers
      })
      .then(function (res) {
        Thongbao(0, "Cập Nhật Thành Công");
      }, function (res) {
        console.log(res);
      }); 
    }
     
     
  }

 $scope.UpdateDauviec1 = function (data) {
    console.log(data);
    var dulieu = {
        "Tieude": data.Tieude,
        "idThamgia": JSON.stringify(data.idThamgia),
        "idCty" :data.idCty,
        "Uutien" :data.Uutien,
        "Ghichu" :data.Noidung,
        "Deadline": $filter('date')(data.Deadline, "yyyy-MM-dd HH:mm:ss"),
    };  
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/gtodos?&filter[idLich]="+data.id, {
        headers: $scope.headers
      })
      .then(function (res) {
    var id = getdata(res.data.data)[0].id;
    $timeout(function() {     

   },1000)      
         console.log(res);
        
      });   
     
  } 

 $scope.XoaDauviec = function (data) {
    var dulieu = {"published": 1,};  
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/gtodos/"+data.id,dulieu, {
                headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0,"Xóa dữ liệu thành công");
        $scope.Oninitdauviec('',$scope.iduser);
      }, function (res) {
        console.log(res);
      });
     $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lichhops/" + data.idLich, dulieu, {
        headers: $scope.headers
      })
      .then(function (res) {
      }, function (res) {
        console.log(res);
      });   
  } 
    
  
 $scope.propertyName = 'age';
  $scope.reverse = true;
    $scope.sortBy = function(propertyName) {
    $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
    $scope.propertyName = propertyName;
  };  

    
 $scope.ReadGviec = function () {

    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/gtodos?filter[published]=0&filter[idChutri]="+$scope.iduser+"&page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
       $scope.RNhomviec = [];
        var data = getdata(res.data.data);
        angular.forEach(data, function (v) {
        v.idThamgia = JSON.parse(v.idThamgia);
        v.Ngaytao = new Date(v.Ngaytao); 
       // v.Review = (v.Review===null)?'--': $filter('date')(new Date(v.Review), "HH:mm dd/MM/yy");    
        v.Review = (v.Review===null)?'abc': new Date(v.Review);  
        v.Deadline = new Date(v.Deadline);   
            $scope.RNhomviec.push(v);
       });
        console.log($scope.RNhomviec);
      });

  }
 
    $scope.UpdateTTViec = function (dv,Trangthai) {
        
      //console.log(checkngay(dv.Deadline));
       Trangthai =  (Trangthai===1)? checkngay(dv.Deadline) : Trangthai;
    var dulieu = {"Trangthai": Trangthai};
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/gtodos/"+dv.id,dulieu, {
                headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.Oninitdauviec('',$scope.iduser);
      }, function (res) {
        console.log(res);
      });
  }
     $scope.UpdateGhichu = function (id,Ghichu) {
         console.log(Ghichu);
    var dulieu = {"Ghichu": Ghichu};
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/gtodos/"+id,dulieu, {
                headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0,"Cập nhật ghi chú thành công");
        $scope.Oninitdauviec('',$scope.iduser);
      }, function (res) {
        console.log(res);
      });
  } 
     
  $scope.UpdateNoidung = function (id,Tieude) {
    var dulieu = {"Tieude": Tieude};
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/gtodos/"+id,dulieu, {
                headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0,"Cập nhật nội dung thành công");
        $scope.Oninitdauviec('',$scope.iduser);
      }, function (res) {
        console.log(res);
      });
  }  
      
  $scope.UpdateUTViec = function (id,Uutien) {
    var dulieu = {"Uutien": Uutien};
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/gtodos/"+id,dulieu, {
                headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.Oninitdauviec('','');
      }, function (res) {
        console.log(res);
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


  //Thư Mục Begin 
  $scope.OninitThumuc = function (LoaiTM) {
    $scope.Oninit();
    $scope.ReadThumuc(LoaiTM);
    $scope.Thumuc = {
      'Title': 'Tạo mới',
      'CRUD': 0,
      'Parent': 0,
      'LoaiTM': LoaiTM
    };
    $('.modal').modal('hide');
  }
  $scope.CreateThumuc = function (dulieu) {
    var data = '';
    dulieu.Parent == 0 ? data = {
      "Tieude": dulieu.Tieude,
      "Mota": dulieu.Mota,
      "LoaiTM": dulieu.LoaiTM,
    } : data = {
      "pid": dulieu.Parent.id,
      "path": dulieu.Parent.path,
      "toc": dulieu.Parent.toc,
      "level": parseInt(dulieu.Parent.level) + 1,
      "Tieude": dulieu.Tieude,
      "Mota": dulieu.Mota,
      "LoaiTM": dulieu.LoaiTM,
    };
    // console.log(data);
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/thumucs", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        // console.log(res);
        $http.get("https://tazagroup.vn/api/index.php/v1/hrms/thumucs?page[limit]=1", {
            headers: $scope.headers
          })
          .then(function (res) {
            var id = getdata(res.data.data)[0].id;
            var pathold = getdata(res.data.data)[0].path;
            var tocold = getdata(res.data.data)[0].toc;
            var ordering = getdata(res.data.data)[0].ordering;
            var path = pathold + id + "-";
            var toc = tocold + ordering + ".";
            var data = {
              "path": path,
              "toc": toc
            }
            //     console.log(data);
            $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/thumucs/" + id, data, {
                headers: $scope.headers
              })
              .then(function (res) {
                //   console.log(res);
                $scope.OninitThumuc(dulieu.LoaiTM);
                Thongbao(0, "Thêm Danh Mục Thành Công");
                setTimeout(function () {
                  location.reload();
                }, 5000);

              }, function (res) {
                Thongbao(1, geterror(res));
              });
          });
      }, function (res) {
        Thongbao(1, geterror(res));
      });
  }
  //  $scope.UpdateThumuc = function (dulieu) {
  //    var data = {
  //      "Trangthai": TT,
  //      "Ghichu": dulieu.Ghichu,
  //    };
  //    console.log(data);
  //    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/thumucs/" + dulieu.id, data, {
  //        headers: $scope.headers
  //      })
  //      .then(function (res) {
  //        console.log(res);
  //        TT != 1 ? Thongbao(0, "Đã xác nhận việc") : Thongbao(1, "Đã Hủy Việc");
  //        $scope.OninitTinnhan();
  //      }, function (res) {
  //        console.log(res);
  //      });
  //  }
  $scope.ReadThumuc = function (LoaiTM) {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/thumucs?filter[LoaiTM]=" + LoaiTM, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.Rthumucs = [];
        var data = getdata(res.data.data);
        $scope.RLthumucs = data;
        var unique = $filter('unique')(data, 'id');
        angular.forEach(unique, function (value1) {
          var x = [];
          angular.forEach(data, function (value2) {
            if (value1.id == value2.id) {
              x.push(value2);
            }
          });
          var y = {
            'dulieu': x,
            'data': value1
          };
          $scope.Rthumucs.push(y);
        });
      });

  }
  $scope.editThumuc = function (data) {
    $scope.Thumuc = $scope.RThumuc.find(result => result.id === data.id);
  }

  //Thư Mục End 

  //Tài Liệu Begin 
  $scope.OninitTailieu = function () {
    $scope.Oninit();
    // $scope.ReadTailieu();
    $('.modal').modal('hide');
  }
  $scope.loadFile = function (files) {
    $scope.$apply(function () {
      $scope.selectedFile = files[0];
      console.log($scope.selectedFile);
    })
  }
  $scope.editTailieu = function (data) {
    $scope.idDM = data;
  }
  $scope.CreateTailieu = function (dulieu) {
    var data = {
      "idTM": $scope.idDM,
      "Tieude": $scope.selectedFile.name,
      "Url": $scope.selectedFile.size + $scope.selectedFile.name,
    };
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/tailieus", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        $('#UpTailieu').submit();
        console.log(res);
      }, function (res) {

        console.log(res);
      });
  }


  //  $scope.UpdateTinnhan = function (TT, dulieu) {
  //    var data = {
  //      "Trangthai": TT,
  //      "Ghichu": dulieu.Ghichu,
  //    };
  //    console.log(data);
  //    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/tinnhans/" + dulieu.id, data, {
  //        headers: $scope.headers
  //      })
  //      .then(function (res) {
  //        console.log(res);
  //        TT != 1 ? Thongbao(0, "Đã xác nhận việc") : Thongbao(1, "Đã Hủy Việc");
  //        $scope.OninitTinnhan();
  //      }, function (res) {
  //        console.log(res);
  //      });
  //  }
  //  $scope.ReadTailieu = function (idTM) {
  //    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/tailieus?filter[idTM]="+idTM, {
  //        headers: $scope.headers
  //      })
  //      .then(function (res) {
  //        var data = getdata(res.data.data);
  //        $scope.Rtailieu = data;
  //         console.log(data);
  //      });
  //
  //  }
  //  $scope.editThongbao = function (data) {
  //    $scope.tn = $scope.Rtinnhan.find(result => result.id === data.id);
  //  }
  //Tài Liệu End  
  // Lộ Trình Begin
  $scope.OninitLotrinh = function (Type) {
    $scope.Type = Type;
    $scope.tieude = {
      "khoi": true,
      "phong": true,
      "vitri": true,
      "file": true,
      "ngay": true,
      "tinhtrang": true,
      "ghichu": true
    };
    $scope.Oninit();
    $scope.ReadLotrinh(Type);
    $('.modal').modal('hide');
  }

  $scope.CreateLotrinh = function (dulieu) {
    angular.forEach(dulieu, function (v) {
      var data = {
        "idKhoi": v.idKhoi,
        "idPhong": v.idPhong,
        "idBophan": v.idBophan,
        "idVitri": v.idVitri,
        "Ngaybanhanh": $filter('date')(v.Ngaybanhanh, "yyyy-MM-dd HH:mm:ss"),
        "Tinhtrang": v.Tinhtrang,
        "Tenfile": v.Tenfile,
        "Ghichu": v.Ghichu,
        "Type": $scope.Type,
      };
      $http.post("https://tazagroup.vn/api/index.php/v1/hrms/lotrinhs", data, {
          headers: $scope.headers
        })
        .then(function (res) {
          console.log(res);
          $scope.OninitLotrinh($scope.Type);
          Thongbao(0, 'Tạo Thành Công');
        }, function (res) {
          console.log(res);
          Thongbao(1, geterror(res));
        });
    });
  }
  $scope.UpdateLotrinh = function (TT, dulieu) {
    var data = {
      "Trangthai": TT,
      "Ghichu": dulieu.Ghichu,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lotrinhs/" + dulieu.id, data, {
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
  $scope.ReadLotrinh = function (Type) {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/lotrinhs?filter[Type]=" + Type, {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = getdata(res.data.data);
        $scope.RLotrinhs = data;
        console.log(data);
      });
  }
  $scope.editLotrinh = function (data) {
    $scope.Lotrinh = $scope.RLotrinhs.find(result => result.id === data.id);
    $scope.Lotrinh.Ngaybanhanh = new Date($scope.Lotrinh.Ngaybanhanh);
  }
// Lộ Trình End
//Kế Hoạch Begin  
  $scope.OninitKehoach = function () {
    $scope.Oninit();
    $scope.ReadKehoach();
    $scope.Kehoachngay = {'Loai':1};  
    $('.modal').modal('hide');
  }

  $scope.CreateKehoachngay = function (dulieu) {
    console.log(dulieu);
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/kehoachs", dulieu, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.OninitKehoach();
        Thongbao(0,'Tạo Kế Hoạch Ngày Thành Công');
      }, function (res) {
         console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.UpdateThumuc = function (TT, dulieu) {
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
  $scope.ReadKehoach = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/kehoachs", {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = getdata(res.data.data);
        $scope.RKehoach = data;
      });

  }
  $scope.editKehoach = function (data) {
    $scope.Kehoach = $scope.RKehoach.find(result => result.id === data.id);
  }
//Kế Hoạch End  
});
