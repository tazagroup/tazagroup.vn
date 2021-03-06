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
      'Header': "Th??m M???i",
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
        Thongbao(0, "Th??m C??i ?????t Th??nh C??ng")
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
        Thongbao(0, "C???p Nh???t C??i ?????t Th??nh C??ng")
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
    $scope.Caidat.Header = "C???p Nh???t";
    $scope.Dulieus = $scope.Caidat.Dulieu;
  }
  $scope.DeleteCaidat = function (id) {
    $http.delete("https://tazagroup.vn/api/index.php/v1/hrms/caidats/" + id, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.Oninit();
        Thongbao(0, "X??a C??i ?????t Th??nh C??ng")
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
      'Title': 'T???o m???i',
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
    $scope.Cauhoi.Title = "C???p Nh???t";
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
        Thongbao(0, "T???o C??u H???i Th??nh C??ng");
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
        Thongbao(0, "C???p Nh???t C??u H???i Th??nh C??ng");
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
        "Ban ??i???u H??nh": {
          template: "diva",
        },
        "Ban ??i???u H??nh 1": {
          template: "diva",
          layout: OrgChart.treeRightOffset,
        },    
        "Ch??? Huy V???n H??nh": {
          template: "ula",

          subLevels: 0
        },
        "Ch??? Huy V???n H??nh 1": {
          template: "ula",
          subLevels: 1
        },
        "Ch??? Huy V???n H??nh 2": {
          template: "ula",
          subLevels: 2
        },
        "Ch??? Huy V???n H??nh 3": {
          template: "ula",
          subLevels: 3
        },
        "V???n H??nh": {
          template: "olivia"
        },
        "Nh??n Vi??n": {
          template: "olivia"
        },
         "Ban Gi??m ?????c V?? Gi??m ?????c CGO": {
          template: "olivia"
        },     
        "partner": {
          template: "isla"
        }
      },


      nodeBinding: {
        field_0: "H??? T??n",
        field_1: "Ch???c V???",
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
            'H??? T??n': v.Chucvu,
            pid: v.idParent,
            tags: [tagv],
            'Ch???c V???': v.name,
            Photo: "https://tazagroup.net/images/tazagroup-logo.png"
          };
          //var dt = { id: v.id,'H??? T??n': v.name, pid: v.idParent,tags: [tagv], 'Ch???c V???': v.Chucvu, Photo: "https://tazagroup.net/images/tazagroup-logo.png" };
          dulieu.push(dt);
        });
        // console.log(dulieu);
        
        var data = [
        {
          "id": "BDH",
          "H??? T??n": "Ban Gi??m ?????c V?? Gi??m ?????c CGO",
          "pid": 1,
          tags: ["Ban Gi??m ?????c V?? Gi??m ?????c CGO"]
        },    
       {
          "id": "KhoiBackoffice",
          "H??? T??n": "Kh???i Backoffice",
          "pid": "BDH",
          "tags": ["Nh??n Vi??n"]
        },  
        {
          "id": "KhoiCGO",
          "H??? T??n": "Kh???i CGO",
          "pid": "BDH",
          "tags": ["Nh??n Vi??n"]
        },        
        {
          "id": "KhoiDV",
          "H??? T??n": "Kh???i Dich V???",
          "pid": "BDH",
          "tags": ["Nh??n Vi??n"]
        },      
        {
          "id": "Timona",
          "H??? T??n": "Timona",
          "pid": "BDH",
          "tags": ["Nh??n Vi??n"]
        },         
        {
          "id": "Sharyn",
          "H??? T??n": "Sharyn",
          "pid": "BDH",
          "tags": ["Nh??n Vi??n"]
        },           
            {
          "id": 32,
          "H??? T??n": "Sharyn",
          "stpid": "Sharyn",
          "tags": ["Ban ??i???u H??nh"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 31,
          "H??? T??n": "Ph??ng ????o T???o",
          "pid": 14,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 30,
          "H??? T??n": "V???n h??nh/ ki???m so??t n???i b???",
          "pid": 14,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 29,
          "H??? T??n": "C?? S??? H??? T???ng",
          "pid": 14,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": "PH???M NG???C MINH T??",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 28,
          "H??? T??n": "Nh??n Vi??n Content 2",
          "pid": 25,
          "tags": ["Nh??n Vi??n"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 27,
          "H??? T??n": "Nh??n Vi??n Content 1",
          "pid": 25,
          "tags": ["Nh??n Vi??n"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 26,
          "H??? T??n": "LEAD DIGITAL MKT",
          "pid": 23,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 25,
          "H??? T??n": "LEAD CONTENT",
          "pid": 23,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 24,
          "H??? T??n": "SALE ADMIN",
          "pid": 5,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": "TR???N HO??NG MAI",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 23,
          "H??? T??n": "MAKETING MANAGER",
          "pid": 22,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 22,
          "H??? T??n": "MARKETING DIRECTOR",
          "pid": 13,
          "tags": ["Ch??? Huy V???n H??nh 1"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 21,
          "H??? T??n": "LEAD DESIGN MEDIA",
          "pid": 22,
          "tags": ["Ch??? Huy V???n H??nh 1"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 20,
          "H??? T??n": "Leader SEO - IT",
          "pid": 22,
          "tags": ["Ch??? Huy V???n H??nh 1"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 19,
          "H??? T??n": "Leader SOL H???c Vi???n",
          "pid": 13,
          "tags": ["Ch??? Huy V???n H??nh 3"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 18,
          "H??? T??n": "ISO",
          "pid": 14,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": "NGUY???N TH??? OANH",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 17,
          "H??? T??n": "Thu Mua",
          "pid": 14,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": "B??I TH??? DI???M QU???NH",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 16,
          "H??? T??n": "Kho",
          "pid": 14,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": "NGUY???N B??NH PH????NG",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 15,
          "H??? T??n": "K??? To??n",
          "pid": 14,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": "????? NG???C HUY???N",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 14,
          "H??? T??n": "Ph?? T???ng Gi??m ?????c - Gi??m ?????c Kh???i Back Office",
          "stpid": "KhoiBackoffice",
          "tags": ["Ban ??i???u H??nh 1"],
          "Ch???c V???": "NGUY???N TRUNG TH??NH",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 13,
          "H??? T??n": "Gi??m ?????c Kh???i CGO",
          "stpid": "KhoiCGO",
          "tags": ["Ban ??i???u H??nh"],
          "Ch???c V???": "TR???N M??? DUY??N",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 12,
          "H??? T??n": "Gi??m ?????c Kh???i D???ch V???",
          "stpid":"KhoiDV",
          "tags": ["Ban ??i???u H??nh"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 11,
          "H??? T??n": "Ph?? T???ng Gi??m - Gi??m ?????c H???c Vi???n Timona",
          "stpid": "Timona",
          "tags": ["Ban ??i???u H??nh"],
          "Ch???c V???": "NGUY???N TH??? KI???U OANH",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },
        {
          "id": 10,
          "H??? T??n": "TR??? L?? TG??",
          "pid": 3,
          "tags": ["partner"],
          "Ch???c V???": "L?? PHI HO??NG",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 9,
          "H??? T??n": "Nh??n Vi??n Telesale 1",
          "pid": 8,
          "tags": ["Nh??n Vi??n"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 8,
          "H??? T??n": "Leader Telesale",
          "pid": 13,
          "tags": ["Ch??? Huy V???n H??nh 3"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 7,
          "H??? T??n": "CDCN B??nh Th???nh",
          "pid": 11,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 6,
          "H??? T??n": "GDCN G?? V???p",
          "pid": 12,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, 
          {
          "id": 52,
          "H??? T??n": "GDCN Th??? ?????c",
          "pid": 12,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },
           {
          "id": 53,
          "H??? T??n": "GDCN Qu???n 10",
          "pid": 12,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },            
            {
          "id": 5,
          "H??? T??n": "Tr??? L?? (CGO)",
          "pid": 13,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 4,
          "H??? T??n": "H??nh Ch??nh Nh??n S???",
          "pid": 14,
          "tags": ["Ch??? Huy V???n H??nh"],
          "Ch???c V???": "????? TH??? M??? TRANG",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, 
        {
          "id": 3,
          "H??? T??n": "T???ng Gi??m ?????c",
          "stpid": "BDH",
          "tags": ["Ban ??i???u H??nh"],
          "Ch???c V???": "TR???N TH??? T??? UY??N",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },{
          "id": 93,
          "H??? T??n": "Ph?? T???ng Gi??m ?????c",
          "pid": 3,
          "Ch???c V???": "NGUY???N TH??? KI???U OANH",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },
 {
          "id": 96,
          "H??? T??n": "Tr??? L?? P.TG??",
          "pid": 93,
          "Ch???c V???": "L?? TH??? THU H???NG",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },           
{
          "id": 95,
          "H??? T??n": "Ph?? T???ng Gi??m ?????c",
          "pid": 3,
          "Ch???c V???": "NGUY???N TRUNG TH??NH",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, 
  {
          "id": 94,
          "H??? T??n": "Gi??m ?????c Kh???i CGO",
          "pid": 3,
          "Ch???c V???": "TR???N TH??? M??? DUY??N",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },
    {
          "id": 97,
          "H??? T??n": "Tr??? L?? G??K",
          "pid": 94,
          "Ch???c V???": "NGUY???N TH??? KIM NG??N",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        },          
            
        {
          "id": 2,
          "H??? T??n": "Tr??? l?? (CTHDQT)",
          "pid": 1,
          "tags": ["partner"],
          "Ch???c V???": null,
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }, {
          "id": 1,
          "H??? T??n": "Ch??? T???ch H???i ?????ng Qu???n Tr???",
          "pid": "directors",
          "tags": ["Management"],
          "Ch???c V???": "TR???N TH??? T??? UY??N",
          "Photo": "https://tazagroup.net/images/tazagroup-logo.png"
        }];
console.log(data);
        $scope.LoadChart(data);
      });

  }
  //H??? S?? Begin
  $scope.ReadHoso = function (id) {
    $http.get("https://tazagroup.vn/api/index.php/v1/users/" + id, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.Rhoso = res.data.data.attributes;
        console.log($scope.Rhoso);
      });
  }
  //H??? S?? End
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

  //L???ch h???p Begin  
  $scope.Oninitlichhop = function () {
    $scope.Oninit();
    $scope.ReadLichhop('calendar', '', 1);
    $scope.ReadListNhanVien();
    $scope.Lichhop = {
      'Title': 'T???o m???i',
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
        Thongbao(0, "C???p Nh???t Th??nh C??ng");
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
          'Title': 'T???o m???i',
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
    $scope.Lichhop.Title = "C???p Nh???t";
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

  //L???ch h???p End  
  //?????u Vi???c Begin 
  $scope.Oninitdauviec = function () {
    $scope.Oninit();
    $scope.ReadLichhop('calendar1', 'listWeek', 0);
    $scope.ReadDauviec();
    $scope.ReadListNhanVien();
    $scope.Dauviec = {
      'Title': 'T???o m???i',
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
        Thongbao(0, "T???o Vi???c Th??nh C??ng")
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
  //?????u Vi???c End 

  //Tin Nh???n Begin 
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
        TT != 1 ? Thongbao(0, "???? x??c nh???n vi???c") : Thongbao(1, "???? H???y Vi???c");
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
  //Tin Nh???n End   


});
