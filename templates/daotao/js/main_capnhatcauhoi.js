     document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('Lichbieu');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'vi',
        });
        calendar.render();
      });



//var app = angular.module('myapp', ['ui.filters', 'localytics.directives', 'ngSanitize', 'ui.tinymce', 'ngCookies','infinite-scroll','checklist-model','thatisuday.dropzone']);

$('.close-yotube').click(function () {
  var el = $('.noidung iframe').remove();
});

var app = angular.module('App', ['ui.filters', 'localytics.directives', 'ngSanitize', 'ui.tinymce', 'ngCookies', 'thatisuday.dropzone']);
Dropzone.autoDiscover = false;
//Active Menu Begin
var url = window.location.href.split('/');
var href = url[url.length - 1];
var el = document.querySelector("a[href='/" + href + "']");
(el != null) ? el.classList.add('active'): '';
//Active Menu End
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
$("#DKTK").flatpickr({
  enableTime: true,
  time_24hr: true,
  locale: locale,
  minDate: new Date()
});
$("#LHBD").flatpickr({
  enableTime: true,
  time_24hr: true,
  locale: locale,
  minDate: new Date()
});
$("#LHKT").flatpickr({
  enableTime: true,
  time_24hr: true,
  locale: locale,
  minDate: new Date()
});

$("#TLNDeadline").flatpickr({
  enableTime: true,
  time_24hr: true,
  locale: locale,
  minDate: new Date()
});

function Thongbao(a, o) {
  const e = new Notyf;
  return 1 == a ? e.error({
    position: {
      x: "right",
      y: "top"
    },
    message: o,
    duration: 4e3,
    icon: {
      className: "fas fa-exclamation-circle",
      tagName: "span",
      color: "#fff"
    }
  }) : e.success({
    position: {
      x: "right",
      y: "top"
    },
    message: o,
    duration: 4e3,
    icon: {
      className: "fas fa-check-circle",
      tagName: "span",
      color: "#fff"
    }
  })
}

const nest = (items, id = 0, link = 'pid') => items.filter(item => item[link] === id).map(item => ({
  ...item,
  children: nest(items, item.id)
}));
const flatten = data => data.flatMap(({
  children,
  ...o
}) => [o, ...flatten(children)]);

app.config(function (dropzoneOpsProvider) {
  dropzoneOpsProvider.setOptions({
    url: '/index.php?option=com_hrms&task=Tailieu.uploadMultiFile&format=raw',
    acceptedFiles: 'image/jpeg, images/jpg, image/png',
    addRemoveLinks: true,
    dictDefaultMessage: 'Click to add or drop photos',
    dictRemoveFile: 'Xóa File',
    dictResponseError: 'Could not upload this photo',
  });
});
app.filter('FMT', function () {
  return function (items, input, param) {
    var result = [];
    if (input === undefined || input === '') {
      result = items;
    } else {
      angular.forEach(Object.entries(input), function (v1) {
        console.log(v1[0]);
        angular.forEach(items, function (v2) {
          if (parseInt(v1[1]) === parseInt(v2[param])) {
            result.push(v2);
          }
        });
      });
    }
    return result;
  }
});

app.filter('FABC', function () {
  return function (item) {
    var result = 0;
    switch (item) {
      case 1:
        result = 'A';
        break;
      case 2:
        result = 'B';
        break;
      case 3:
        result = 'C';
        break;
      case 4:
        result = 'D';
        break;
      case 5:
        result = 'E';
        break;
      case 6:
        result = 'F';
        break;
      case 7:
        result = 'G';
        break;
      case 8:
        result = 'H';
        break;
      default:
        result = 0;
    }
    return result;
  }
});

app.filter('level', function () {
  return function (input) {
    var result = '';
    for (var i = 0; i < input; i++) {

      result += "- ";
    }
    return result;
  }
});
app.filter('dateDeadline', function () {
  return function (items, fromDate, toDate) {
    var filtered = [];
    var from_date = new Date(fromDate);
    var to_date = new Date(toDate);
    var to_date = new Date(new Date(toDate).getTime() + 86400000);
    if (!fromDate && !toDate) {
      return items;
    }
    angular.forEach(items, function (item) {
      var date = new Date(item.Deadline);
      if (date > from_date && date < to_date) {
        filtered.push(item);
      }
    });
    return filtered;
  };
});
app.filter('dateNgaytao', function () {
  return function (items, fromDate, toDate) {
    var filtered = [];
    var from_date = new Date(fromDate);
    var to_date = new Date(toDate);
    var to_date = new Date(new Date(toDate).getTime() + 86400000);
    if (!fromDate && !toDate) {
      return items;
    }
    angular.forEach(items, function (item) {
      var date = new Date(item.Deadline);
      if (date > from_date && date < to_date) {
        filtered.push(item);
      }
    });
    return filtered;
  };
});
app.filter('dateReview', function () {
  return function (items, fromDate, toDate) {
    var filtered = [];
    var from_date = new Date(fromDate);
    var to_date = new Date(toDate);
    var to_date = new Date(new Date(toDate).getTime() + 86400000);
    if (!fromDate && !toDate) {
      return items;
    }
    angular.forEach(items, function (item) {
      var date = new Date(item.Review);
      if (date > from_date && date < to_date) {
        filtered.push(item);
      }
    });
    return filtered;
  };
});
app.filter('dateNgaytao', function () {
  return function (items, fromDate, toDate) {
    var filtered = [];
    var from_date = new Date(fromDate);
    var to_date = new Date(new Date(toDate).getTime() + 86400000);
    if (!fromDate && !toDate) {
      return items;
    }
    angular.forEach(items, function (item) {
      var date = new Date(item.Ngaytao);
      if (date > from_date && date < to_date) {
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
app.filter('Flama', function () {
  return function (input) {
    var lookup = {
        M: 1000,
        CM: 900,
        D: 500,
        CD: 400,
        C: 100,
        XC: 90,
        L: 50,
        XL: 40,
        X: 10,
        IX: 9,
        V: 5,
        IV: 4,
        I: 1
      },
      roman = '',
      i;
    for (i in lookup) {
      while (input >= lookup[i]) {
        roman += i;
        input -= lookup[i];
      }
    }
    return roman;
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
app.filter('FTailieu', function () {
  return function (input, data) {
    var result = '';
    angular.forEach(data, function (v) {
      if (v.id === input) {
        result = v.MaTL + " - " + v.Tentailieu;
      }
    })
    return result;
  };
});
app.filter('FTOC', function () {
  return function (input, data) {
    var result = '';;
    angular.forEach(data, function (v) {
      if (v.Toc === input) {
        result = v.Tenchude;
      }
    })
    return result;
  };
});
app.filter('Fduyet', function () {
  return function (input, data) {
    var result = false;
    angular.forEach(data, function (v) {
      if (v === input) {
        result = true;
      }
    })
    return result;
  };
});
app.filter('FCChudecon', function () {
  return function (input, data) {
    var result = 0;
    angular.forEach(data, function (v) {
      if (parseInt(v.pid) === parseInt(input)) {
        result++;
      }
    })
    return result;
  };
});
app.filter('FSTailieu', function () {
  return function (input, data) {
    var result = 0;
    var x = [];
    x.push(input);
    var y = flatten(x).map(el => el.id);
    angular.forEach(y, function (v1) {
      angular.forEach(data, function (v2) {
        if (parseInt(v2.idChude) === parseInt(v1)) {
          result++;
        }
      })

    })
    return result;
  };
});
app.filter('FKiemduyet', function () {
  return function (input, data) {
    var result = [];
    angular.forEach(data, function (v1) {
      angular.forEach(input, function (v2) {
        if (parseInt(v1) === parseInt(v2.id)) {
          result.push(v2);
        }
      })

    })
    return result;
  };
});
app.filter('FTenchude', function () {
  return function (input, data) {
    var result = '';
    angular.forEach(data, function (v) {
      if (parseInt(v.id) === parseInt(input)) {
        result = v.Tenchude;

      }
    })
    return result;
    console.log(result);
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

app.filter('FCustom', function () {
  return function (input, cus, data) {
    var result = '';
    angular.forEach(data, function (v) {
      if (parseInt(v.id) === parseInt(input)) {
        result = v[cus];
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
app.filter('counter', [function () {
  return function (seconds) {
    return new Date(1970, 0, 1).setSeconds(seconds);
  };
}])
app.controller("Test", function ($scope, $http, $scope, $http, $filter, $sce, $timeout, $interval, $cookies) {
  $scope.LuuAnhien = function (data) {
    $cookies.put("anhien", JSON.stringify(data));
    Thongbao(0, "Đã Lưu Cấu Hình");
  };
  $scope.localStorage = (localStorage.getItem('States') !== null) ? JSON.parse(localStorage.getItem('States')) : {
    "TabCH": 0,
    "TabTLN": 0,
    "MenuCD": 0,
    "Chontrang": 0,
    "SLitem": 25,
    CDActive: {
      "CD21": false
    },
    CDCHActive: {
      "CD21": false
    }
  };
  // console.log($scope.localStorage);
  $scope.Store = function (key, value) {
    $scope.localStorage[key] = value;
    localStorage.setItem('States', JSON.stringify($scope.localStorage));
  }
  $scope.RemoveStorage = function (key) {
    delete $scope.localStorage[key];
    localStorage.setItem('States', JSON.stringify($scope.localStorage));
  }
  $scope.GetAnhien = function () {
    $scope.tieude = ($cookies.get('anhien')) ? JSON.parse($cookies.get('anhien')) : {
      "td1": true,
      "td2": true,
      "td3": true,
      "td4": true,
      "td5": true,
      "td6": true,
      "td7": true,
      "td8": true,
      "td9": true,
      "td10": true,
      "td11": true,
      "td12": true,
      "td13": true,
      "td14": true,
      "td15": true,
      "td16": true,
    };
    //$scope.tieude =   $cookies.get('anhien');
  };

  $scope.propertyName = 'id';
  $scope.reverse = true;
  $scope.sortflag = true;
  $scope.sortBy = function (propertyName) {
    $scope.sortflag = !$scope.sortflag;
    $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
    $scope.propertyName = propertyName;
  };


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

  function Groupdata(data) {
    var result = [];
    var unique = $filter('unique')(data, 'Nhom');
    angular.forEach(unique, function (value1) {
      var x = [];
      angular.forEach(data, function (value2) {
        if (value1.Nhom == value2.Nhom) {
          x.push(value2);
        }
      });
      var y = {
        'dulieu': x,
        'Nhom': value1.Nhom
      };
      result.push(y);
    });
    return result;
  }
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
  $scope.Oninit = function () {

    if ($scope.localStorage.TrangHT != '') {
      var x = $scope.localStorage.TrangHT;
      $scope.Store('TrangHT', '');
      $timeout(function () {
        window.location.href = x;
      }, 0)

    }

    $scope.SLitem = $scope.localStorage.SLitem || 25;
    $scope.SLHienthi = [{
      value: 25,
      title: '25'
    }, {
      value: 50,
      title: '50'
    }, {
      value: 75,
      title: '75'
    }, {
      value: 100,
      title: '100'
    }, {
      value: 99999,
      title: 'All'
    }];
    $scope.minDate = new Date();
    $scope.GetAnhien();

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
        $scope.TTTailieu = (data.find(result => result.id === 22)).Dulieu;
        $scope.ListPhanquyen = (data.find(result => result.id === 23)).Dulieu;
        $scope.ListPhanquyen1 = Groupdata($scope.ListPhanquyen);
        //        console.log(Groupdata($scope.ListPhanquyen));
        $scope.ListHieuluc = (data.find(result => result.id === 24)).Dulieu;
        $scope.ListCapdo = (data.find(result => result.id === 25)).Dulieu;
        $scope.ListTagsTLN = (data.find(result => result.id === 26)).Dulieu;
      });
    $scope.ReadListNhanVien();
  }


  $scope.ReadListNhanVien = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/users?page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.RListNV = [];
        var data = getdata(res.data.data);
        angular.forEach(data, function (v) {
          let x = ($filter('Ftitle')(v.idVitri, $scope.Vitri) == '') ? '' : '(' + $filter('Ftitle')(v.idVitri, $scope.Vitri) + ')';
          v.name = v.name + x;
          $scope.RListNV.push(v);
        });
        // console.log($scope.RListNV);
      });
  }


  $scope.ReadPQ = function (idUser) {
    if (idUser == 0) {
      var url = window.location.href;
      $scope.Store('TrangHT', url);
      $timeout(function () {
        window.location.href = "/dao-tao";
      }, 0)

    } else {
      // console.log(idUser);
      $scope.Oninit();
      $scope.ReadNhomnguoidung(); 
      $scope.idUser = parseInt(idUser);
      $http.get("https://tazagroup.vn/api/index.php/v1/hrms/nhomnguoidungs?filter[published]=0&filter[idUser]=" + idUser + "&page[offset]=0&page[limit]=*", {
          headers: $scope.headers
        })
        .then(function (res) {
          var data = JSON.parse(res.data.data[0].attributes.Phanquyen);
          $scope.Quyen = ($cookies.get('Quyen')) ? JSON.parse($cookies.get('Quyen')) : data;
          $scope.idNhom = res.data.data[0].id;
          console.log(res.data.data);
        }, function (res) {
          console.log(res);
          Thongbao(1, geterror(res));
        });
    }

  }
  $scope.SetQuyen = function (id) {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/nhomnguoidungs/" + id, {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = JSON.parse(res.data.data.attributes.Phanquyen);
        $cookies.put("Quyen", JSON.stringify(data));
        Thongbao(0, "Đã Lưu Phân Quyền");
        $timeout(function () {
          location.reload();
        }, 500)
        console.log(data);
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });

  }
  $scope.CreateChude = function (dulieu) {
    if (dulieu.level == 2) {
      Thongbao(1, "Giới hạn 3 cấp Chủ đề");
    } else {
      var data = '';
      dulieu.pid == 0 ? data = {
        "Tenchude": dulieu.Tenchude,
        "idTao": $scope.idUser,
      } : data = {
        "pid": dulieu.pid,
        "level": parseInt(dulieu.level) + 1,
        "Tenchude": dulieu.Tenchude,
        "idTao": $scope.idUser,
      };
      console.log(dulieu);
      $http.post("https://tazagroup.vn/api/index.php/v1/hrms/chudes", data, {
          headers: $scope.headers
        })
        .then(function (res) {
          $scope.UpdateToc(dulieu.Toc, res.data.data.attributes);
          console.log(res.data.data.attributes.id);
          Thongbao(0, 'Tạo Chủ Đề Thành Công');
        }, function (res) {
          console.log(res);
          Thongbao(1, geterror(res));
        });
    }
  }
  $scope.UpdateToc = function (Toc, dulieu) {
    var data = '';
    dulieu.pid == 0 ? data = {
      "Toc": $filter('Flama')(dulieu.ordering)
    } : data = {
      "Toc": Toc + '.' + dulieu.ordering
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/chudes/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        // Thongbao(0, "Cập nhật thành công");
        $scope.OninitTailieu();
      }, function (res) {
        console.log(res);
      });

  }

  $scope.UpdateChude = function (dulieu) {
    var data = {
      'Tenchude': dulieu.Tenchude,
      'pid': dulieu.pid
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/chudes/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Cập nhật thành công");
        $scope.OninitTailieu();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.DeleteChude = function (dulieu) {
    var data = {
      'published': 1
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/chudes/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Xóa Thành Công");
        $scope.OninitTailieu();
      }, function (res) {
        console.log(res);
      });
  }

  $scope.ReadChude = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/chudes?filter[published]=0&page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = getdata(res.data.data);
        $scope.RChude = data;
        $scope.RFChude = [];
        angular.forEach(data, function (v) {
          if (v.level === 0)
            $scope.RFChude.push(v);
        });
        $scope.categories = nest(data);
      });

  }


  //    $scope.ReadTLCD = function (data) {
  //        var x = [];
  //        x.push(data);
  //       var y = flatten(x); 
  ////        console.log(y.map(el => el.id));
  //    $scope.RTailieu = [];   
  //    $scope.RDuyetTailieu = [];
  //    angular.forEach(y, function (v) {   
  //            //console.log(v.id);
  //           $http.get("https://tazagroup.vn/api/index.php/v1/hrms/tailieunguons?filter[published]=0&filter[idChude]="+v.id+"&page[offset]=0&page[limit]=*", {
  //        headers: $scope.headers
  //      })
  //      .then(function (res) {
  //        var data = getdata(res.data.data);
  //    angular.forEach(data, function (v) {   
  //        v.idGTG = JSON.parse(v.idGTG);
  //        v.idDuyet = JSON.parse(v.idDuyet);
  //        v.Tags = JSON.parse(v.Tags);
  //        v.Trangthai = v.Trangthai;
  //        v.Ngaytao = new Date(v.Ngaytao); 
  //        v.Deadline = new Date(v.Deadline); 
  //        v.Ngayhieuluc = new Date(v.Ngayhieuluc); 
  //        v.DKTK = new Date(v.DKTK); 
  //     if(v.Trangthai === 2)
  //         {$scope.RTailieu.push(v);}
  //        $scope.RDuyetTailieu.push(v);
  //     });
  //            // $scope.Phantrang($scope.RDuyetTailieu);
  //      });
  //     });
  //  }   

  $scope.LocTLN = function (data, t) {
    $scope.Store('CDActive', t);
    //console.log(t);  
    $scope.RATailieu = $scope.TailieuGoc;
    var x = [];
    x.push(data);
    var y = flatten(x).map(el => el.id);
    var Loc = [];
    angular.forEach(y, function (v1) {
      angular.forEach($scope.RATailieu, function (v2) {
        if (parseInt(v2.idChude) == parseInt(v1)) {
          Loc.push(v2);
        }
      });
    });
    $scope.RATailieu = Loc;
    $scope.Store('CDHientai', data);
    $scope.Phantrang($scope.RATailieu, $scope.localStorage.SLitem, $scope.localStorage.Chontrang);

  }

  $scope.ResetTailieu = function () {
    $scope.RemoveStorage('CDHientai');
    $scope.RemoveStorage('CDActive');
    $scope.ReadTailieu();

  }

  $scope.editChude = function (data) {
    console.log(data);
    $scope.Chude = $scope.RChude.find(result => result.id === data.id);
    $scope.Chude.CRUD = 1;
  }
  $scope.editChudecon = function (data) {
    console.log(data);
    $scope.Chude.CRUD = 0;
    $scope.Chude.pid = data.id;
    $scope.Chude.path = data.path;
    $scope.Chude.level = data.level;
    $scope.Chude.Toc = data.Toc;
  }

  // Tai Lieu Begin
  $scope.OninitTailieu = function (idUser) {
    $scope.Oninit();
    $scope.ReadTailieu();
    //$scope.t = $scope.localStorage.CDActive; 
    $scope.ReadChude();
    $scope.Tailieu = {
      'Title': 'Tạo mới',
      'CRUD': 0
    };
    $scope.FilePDF = {};
    $scope.Chude = {
      'Title': 'Tạo mới',
      'CRUD': 0,
      'pid': 0,
      'path': '',
      'level': 0
    };
    $scope.linkfile = {};
    $('.modal').modal('hide');
  }
  $scope.SetPDF = function (data) {
    $("#iframe_div iframe").remove();
    $timeout(function () {
      var file_src = 'https://docs.google.com/viewer?url=https://tazagroup.vn' + data.flink + '&embedded=true';
      $('<iframe>').attr('src', file_src).attr('height', '500px').attr('width', '100%').attr('toolbar', '0').appendTo('#iframe_div');
      $scope.FilePDF.Title = data.name;
    }, 500)


  }
  $scope.ReSetPDF = function () {
    $scope.FilePDF.Link = $sce.trustAsResourceUrl('https://docs.google.com/viewer');
  }
  $scope.CreateTailieu = function (dulieu) {
    var data = {
      "Tentailieu": dulieu.Tentailieu,
      "idRoot": dulieu.idRoot,
      "idChude": dulieu.idChude,
      "idTG": dulieu.idTG,
      "DKTK": $filter('date')(dulieu.DKTK, "yyyy-MM-dd HH:mm:ss"),
      "Deadline": $filter('date')(dulieu.Deadline, "yyyy-MM-dd HH:mm:ss"),
      "Lienket": JSON.stringify($scope.Lienket),
      "idGTG": JSON.stringify(dulieu.idGTG),
      "Mota": dulieu.Mota,
      "Ghichu": dulieu.Ghichu,
      "idDuyet": JSON.stringify(dulieu.idDuyet),
      "Tags": JSON.stringify(dulieu.Tags),
      "idTao": $scope.idUser,
    };
    console.log(data);
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/tailieunguons", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.UpdateMaTL(res.data.data.attributes, dulieu.TocTL);
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.loadFile = function (files) {
    $scope.$apply(function () {
      $scope.selectedFile = files[0];
      console.log($scope.selectedFile);
    })
  }

  $scope.UpdateMaTL = function (data, MaTL) {
    console.log(data, MaTL);
    var MaTL = MaTL + '.' + data.ordering;
    var dulieu = {
      "MaTL": MaTL
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/tailieunguons/" + data.id, dulieu, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.OninitTailieu();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.Uploadfile = function () {
    if (typeof $scope.selectedFile === 'undefined') {
      Thongbao(1, 'Vui Lòng Chọn File');
    } else {
      const fsize = Math.round(($scope.selectedFile.size / 1024));
      if (fsize > 10240) {
        Thongbao(1, 'Kích Thước File Quá 10MB');
      } else {
        var fd = new FormData();
        fd.append('file', $scope.selectedFile);
        console.log(fd);
        $http.post("/index.php?option=com_hrms&task=Tailieu.uploadFile&format=raw", fd, {
            transformRequest: angular.identity,
            headers: {
              'Content-Type': undefined,
              'Process-Data': false
            }
          })
          .then(function (res) {
            console.log(res);
            $scope.linkfile = res.data;
            Thongbao(0, 'Upload Tài Liệu Thành Công');
          }, function (res) {
            console.log(res);
            Thongbao(1, geterror(res));
          });

      }
    }

  }

  $scope.UpdateTailieu = function (dulieu) {
    var data = {
      "Tentailieu": dulieu.Tentailieu,
      "idRoot": dulieu.idRoot,
      "idChude": dulieu.idChude,
      "idTG": dulieu.idTG,
      "MaTL": dulieu.Toc + '.' + dulieu.ordering,
      "idGTG": JSON.stringify(dulieu.idGTG),
      "DKTK": $filter('date')(dulieu.DKTK, "yyyy-MM-dd HH:mm:ss"),
      "Deadline": $filter('date')(dulieu.Deadline, "yyyy-MM-dd HH:mm:ss"),
      "Mota": dulieu.Mota,
      "Lienket": JSON.stringify($scope.Lienket),
      "Ghichu": dulieu.Ghichu,
      "idDuyet": JSON.stringify(dulieu.idDuyet),
      "Tags": JSON.stringify(dulieu.Tags),
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/tailieunguons/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Cập Nhật Thành Công");
        $scope.OninitTailieu();
        //$scope.ReadTailieu();
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }

  $scope.UpdateidRoot = function (x) {
    angular.forEach(x, function (v) {
      var data = {
        "idRoot": v.Toc
      };
      console.log(v);
      $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/tailieunguons/" + v.id, data, {
          headers: $scope.headers
        })
        .then(function (res) {
          // console.log(res);
          // Thongbao(0, "Cập Nhật Thành Công");
          //$scope.OninitTailieu();
          //$scope.ReadTailieu();
        }, function (res) {
          //  console.log(res);
          //  Thongbao(1, geterror(res));
        });

    });

  }

  $scope.Delete = function (dulieu) {
    var data = {
      "published": 1
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/tailieunguons/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Xóa Thành Công");
        $scope.OninitTailieu();
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.UpdateTTDuyet = function (id, Trangthai) {
    var data = {
      "Trangthai": Trangthai,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/tailieunguons/" + id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Chuyển Trạng Thái Thành Công");
        $scope.OninitTailieu();
        $scope.ReadTailieu();
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.UpdateHoanthanh = function (id, TTTailieu) {
    var data = {
      "TTTailieu": TTTailieu,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/tailieunguons/" + id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Chuyển Trạng Thái Thành Công");
        $scope.OninitTailieu();
        $scope.ReadTailieu();
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.UpdateHieuluc = function (id, TTHieuluc) {
    var data = {
      "TTHieuluc": TTHieuluc,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/tailieunguons/" + id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Chuyển Trạng Thái Thành Công");
        $scope.OninitTailieu();
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.UpdateNgayhieuluc = function (dulieu) {
    console.log(dulieu);
    var data = {
      "Ngayhieuluc": $filter('date')(dulieu.Ngayhieuluc, "yyyy-MM-dd HH:mm:ss"),
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/tailieunguons/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Cập Nhật Thành Công");
        $scope.OninitNhomnguoidung();
      }, function (res) {
        console.log(res);
      });
  }

  //  $scope.ReadTailieu = function () {
  //    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/tailieunguons?filter[published]=0&page[offset]=0&page[limit]=*", {
  //        headers: $scope.headers
  //      })
  //      .then(function (res) {
  //        $scope.RTailieu = [];
  //        $scope.RDuyetTailieu = [];
  //    var data = getdata(res.data.data);
  //    $scope.RTongTL = data;     
  //    angular.forEach(data, function (v) {
  //       v.TG = JSON.parse(v.idGTG);
  //        v.TG[v.TG.length] = v.idTG;
  //        v.idGTG = JSON.parse(v.idGTG);
  //        v.idDuyet = JSON.parse(v.idDuyet);
  //        v.Tags = JSON.parse(v.Tags);
  //        v.Trangthai = v.Trangthai;
  //        v.Ngaytao = new Date(v.Ngaytao); 
  //        v.Deadline = new Date(v.Deadline); 
  //        v.Ngayhieuluc = new Date(v.Ngayhieuluc); 
  //        v.DKTK = new Date(v.DKTK); 
  //     if(v.Trangthai === 2)
  //         {$scope.RTailieu.push(v);}
  //        $scope.RDuyetTailieu.push(v);
  //     }); 
  //      });
  //      
  //  }

  $scope.ReadTailieu = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/tailieunguons?filter[published]=0&page[offset]=0&page[limit]=*", {
      headers: $scope.headers
    }).then(function (res) {
      var data = getdata(res.data.data);
      $scope.RATailieu = [];
      $scope.RTailieu = [];
      angular.forEach(data, function (v) {
        v.TG = JSON.parse(v.idGTG) || [];
        v.TG[v.TG.length] = v.idTG;
        v.idGTG = JSON.parse(v.idGTG);
        v.idDuyet = JSON.parse(v.idDuyet);
        v.Lienket = JSON.parse(v.Lienket);
        v.Tags = JSON.parse(v.Tags);
        v.Trangthai = v.Trangthai;
        v.Ngaytao = new Date(v.Ngaytao);
        v.Deadline = new Date(v.Deadline);
        v.Ngayhieuluc = new Date(v.Ngayhieuluc);
        v.DKTK = new Date(v.DKTK);
        if (v.Trangthai === 2) {
          $scope.RTailieu.push(v);
        }
        $scope.RATailieu.push(v);
      });
      $scope.TailieuGoc = $scope.RATailieu;
      // console.log($scope.TailieuGoc); 
      ($scope.localStorage.TabTLN == 0) ? $scope.Phantrang($scope.RTailieu, $scope.localStorage.SLitem, $scope.localStorage.Chontrang): $scope.Phantrang($scope.RATailieu, $scope.localStorage.SLitem, $scope.localStorage.Chontrang);
      (typeof $scope.localStorage.CDHientai === 'undefined') ? '' : $scope.LocTLN($scope.localStorage.CDHientai, $scope.localStorage.CDActive);

    })
  }


  $scope.editTailieu = function (data) {
    var Toc = $scope.RChude.find(result => result.id === data.idChude).Toc;
    $scope.Tailieu = data;
    $scope.Tailieu.DKTK = $filter('date')(data.DKTK, "yyyy-MM-dd hh:mm");
    $scope.Tailieu.Toc = $scope.RChude.find(result => result.id === data.idChude).Toc;
    $scope.Tailieu.idRoot = $scope.RChude.find(result => result.Toc === Toc.split(".")[0]).id;
    console.log($scope.Tailieu);
    console.log(data);
    //    $timeout(function() {   
    //       $scope.UpdateTailieu($scope.Tailieu);
    //       $scope.$apply();            
    //   },500) 

  }
  $scope.editTailieucon = function (data) {
    //console.log(data);
    $scope.Tailieu.idChude = data.id;
    $scope.Tailieu.TocTL = data.Toc;
    $scope.Tailieu.idRoot = $scope.RChude.find(result => result.Toc === data.Toc.split(".")[0]).id;
    $scope.Tailieu.idTG = $scope.idUser;
    // console.log($scope.Tailieu);
  }
  $scope.Phantrang = function (data, item, Chontrang) {
    $scope.SLitem = item;
    $scope.from = 0;
    $scope.limit = parseInt($scope.from) + parseInt($scope.SLitem);
    $scope.Chontrang = Chontrang || 0;
    $scope.TongSL = data.length;
    $scope.Sotrang = Math.ceil($scope.TongSL / $scope.SLitem);
    $scope.Pagination = [];
    for (var i = 0; i < $scope.Sotrang; i++) {
      $scope.Pagination.push(i);
    }
    $scope.Pagechose(Chontrang);
    $scope.Store('SLitem', item);
  }

  $scope.Pagechose = function (dulieu) {
    $scope.Store('Chontrang', dulieu);
    var dulieu = dulieu || 0;
    $scope.Hientai = dulieu + 1;
    $scope.from = (dulieu * $scope.SLitem);
    $scope.limit = parseInt($scope.from) + parseInt($scope.SLitem);
    //  console.log(dulieu);   
  }

  //// Tai Lieu End           
  // Thu Muc Begin
  $scope.OninitCauhoi = function () {
    $scope.ReadChude();
    $scope.ReadCauhoi();
    $scope.ReadTailieu();
    $scope.inputs = [];
    $scope.Cauhoi = {
      'Title': 'Tạo mới',
      'CRUD': 0
    };
    $('.modal').modal('hide');
  }
  $scope.CheckDapan = function (data) {
    angular.forEach($scope.inputs, function (v) {
      v.check = 0;
      if (v.id == data.id) {
        v.check = 1;
      }
    });
    $scope.Cauhoi.Dapan.data = angular.copy(data);
  };

  $scope.CreateCauhoi = function (dulieu) {
    var MaTL = $scope.TailieuGoc.find(result => result.id === dulieu.idTL).MaTL;
    console.log(MaTL);
    var data = {
      "idTL": dulieu.idTL,
      "idRoot": dulieu.idRoot,
      "idChude": dulieu.idChude,
      "Cauhoi": dulieu.Cauhoi,
      "Tags": JSON.stringify(dulieu.Tags),
      "Traloi": JSON.stringify(angular.copy($scope.inputs)),
      "Dapan": JSON.stringify(dulieu.Dapan),
      "Capdo": dulieu.Capdo,
      "idDuyet": JSON.stringify(dulieu.idDuyet),
      "Ghichu": dulieu.Ghichu,
      "idTao": $scope.idUser,

    };
    console.log(data);
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/nganhangcauhois", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.UpdateMaCH(res.data.data.attributes, MaTL);
        Thongbao(0, 'Tạo Thành Công');
      }, function (res) {
        console.log(res);
        Thongbao(1, res.data.errors[0].title);
      });
  }
  $scope.UpdateCauhoi = function (dulieu) {
    var MaTL = $scope.TailieuGoc.find(result => result.id === dulieu.idTL).MaTL;
    $scope.UpdateMaCH(dulieu, MaTL);
    var data = {
      "idTL": dulieu.idTL,
      "idRoot": dulieu.idRoot,
      "idChude": dulieu.idChude,
      "Cauhoi": dulieu.Cauhoi,
      "Tags": JSON.stringify(dulieu.Tags),
      "Traloi": JSON.stringify(angular.copy($scope.inputs)),
      "Dapan": JSON.stringify(dulieu.Dapan),
      "Capdo": dulieu.Capdo,
      "idDuyet": JSON.stringify(dulieu.idDuyet),
      "Ghichu": dulieu.Ghichu,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/nganhangcauhois/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        //  console.log(res);
        Thongbao(0, "Cập Nhật Thành Công");
        $scope.OninitCauhoi();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.UpdateTTDuyetCH = function (id, Trangthai) {
    var data = {
      "Trangthai": Trangthai,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/nganhangcauhois/" + id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Chuyển Trạng Thái Thành Công");
        $scope.OninitCauhoi();
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }


  $scope.UpdateMaCH = function (data, MaCH) {
    // console.log(data,MaCH);
    var MaCH = MaCH + '.' + data.ordering;
    var dulieu = {
      "MaCH": MaCH
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/nganhangcauhois/" + data.id, dulieu, {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.OninitCauhoi();
      }, function (res) {
        console.log(res);
      });
  }

  $scope.DeleteCauhoi = function (dulieu) {

    var data = {
      "published": 1
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/nganhangcauhois/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Xóa Thành Công");
        $scope.OninitCauhoi();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.ReadCauhoi = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/nganhangcauhois?filter[published]=0&page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.RCauhoi = [];
        $scope.RACauhoi = [];
        var data = getdata(res.data.data);
        //         console.log(data);
        angular.forEach(data, function (v) {
          v.Traloi = JSON.parse(v.Traloi) || [];
          v.idDuyet = JSON.parse(v.idDuyet);
          v.Tags = JSON.parse(v.Tags) || [];
          v.Dapan = JSON.parse(v.Dapan) || [];
          v.Capdo = parseInt(v.Capdo);
          v.Trangthai = v.Trangthai.toString();
          v.Ngaytao = new Date(v.Ngaytao);
          if (v.Trangthai === 2) {
            $scope.RCauhoi.push(v);
          }
          $scope.RACauhoi.push(v);
        });
        // $scope.FidTLCauhoi = $filter('unique')($scope.RACauhoi, 'idTL');    
        $scope.Cauhoigoc = $scope.RACauhoi;
        $scope.FixCH = angular.copy($scope.RACauhoi);
       $scope.FixCH1 = [];
        angular.forEach($scope.FixCH, function (v) {
         if(v.Dapan.type==0) 
         {
          
          let xx = [];
          let yy = Object.values(v.Dapan);
            
       angular.forEach(yy, function (v1, k) {
            xx.push({
              value: v1
            });
          });
//          v.Dapan1 = xx[1];
//          v.Dapan2 = v.Traloi.find(result => result.value === v.Dapan1.value);     
//          v.Dapan3 = {type:0,data:v.Dapan2};  
             
//       console.log(v.id,JSON.stringify(v.Dapan3));
//          var data = {"Dapan": JSON.stringify(v.Dapan3)};  
//       $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/nganhangcauhois/" + v.id, data, {
//        headers: $scope.headers
//      })
//      .then(function (res) {
//         console.log(res);
//        //Thongbao(0, "Cập Nhật Thành Công");
//      }, function (res) {
//        console.log(res);
//      }); 
             
         $scope.FixCH1.push(v);   
         }
        });
            
//    angular.forEach(yy, function (v1, k) {
//            xx.push({
//              id: k + 1,
//              value: v1
//            });
//          });
       // console.log($scope.FixCH);
        console.log($scope.FixCH1);
        
        
        
        ($scope.localStorage.TabCH == 0) ? $scope.Phantrang($scope.RCauhoi, $scope.localStorage.SLitem, $scope.localStorage.Chontrang): $scope.Phantrang($scope.RACauhoi, $scope.localStorage.SLitem, $scope.localStorage.Chontrang);

        (typeof $scope.localStorage.CDCHHientai === 'undefined') ? '' : $scope.Loccauhoi($scope.localStorage.CDCHHientai, $scope.localStorage.CDCHActive);
      });

  }
  
//  $scope.Capnhatlaicauhoi = function()
//  {
//    angular.forEach($scope.FixCH, function (v) {  
//       console.log(v.id,JSON.stringify(v.Traloi));
//          var data = {"Traloi": JSON.stringify(v.Traloi)};  
//       $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/nganhangcauhois/" + v.id, data, {
//        headers: $scope.headers
//      })
//      .then(function (res) {
//         console.log(res);
//        //Thongbao(0, "Cập Nhật Thành Công");
//      }, function (res) {
//        console.log(res);
//      });  
//        
//     });
//  }
  
  $scope.Loccauhoi = function (data, t) {
    $scope.Store('CDCHActive', t);
    //console.log(t);  
    $scope.RACauhoi = $scope.Cauhoigoc;
    //console.log($scope.RACauhoi);  
    var x = [];
    x.push(data);
    var y = flatten(x).map(el => el.id);
    var Loc = [];
    angular.forEach(y, function (v1) {
      angular.forEach($scope.RACauhoi, function (v2) {
        if (parseInt(v2.idChude) == parseInt(v1)) {
          Loc.push(v2);
        }
      });
    });
    $scope.RACauhoi = Loc;
    $scope.Store('CDCHHientai', data);

  }
  $scope.ResetCauhoi = function () {
    $scope.RemoveStorage('CDCHHientai');
    $scope.RemoveStorage('CDCHActive');
    $scope.ReadCauhoi();

  }
  $scope.LoadCD = function (idTL) {
    $scope.Cauhoi.idRoot = $scope.TailieuGoc.find(result => result.id === idTL).idRoot;
    $scope.Cauhoi.idChude = $scope.TailieuGoc.find(result => result.id === idTL).idChude;
    console.log($scope.Cauhoi);
  }
  $scope.editCauhoi = function (data) {
    $scope.inputs = angular.copy(data.Traloi);
    $scope.Cauhoi = data;
    console.log($scope.inputs);
    // $scope.Cauhoi = $scope.RACauhoi.find(result => result.id === data.id);
    $scope.Cauhoi.idRoot = $scope.TailieuGoc.find(result => result.id === data.idTL).idRoot;
    $scope.Cauhoi.idChude = $scope.TailieuGoc.find(result => result.id === data.idTL).idChude;
    $scope.Cauhoi.CRUD = 2;
  }

  $scope.removeCauhoi = function (data) {
    $scope.Cauhoi = data;
    $scope.Cauhoi.CRUD = 0;
  }
  $scope.DemoCauhoi = function (data) {
    $scope.Demo = data;
  }
  $scope.copyCauhoi = function (data) {
    $scope.Cauhoi = angular.copy(data);
    $scope.Cauhoi.Cauhoi = '';
    $scope.Cauhoi.MaCH = '';
    $scope.Cauhoi.Traloi = {};
    $scope.Cauhoi.Dapan = {};
    $scope.Cauhoi.CRUD = 1;
  }
  $scope.inputs = [];
  $scope.addinput = function () {
    var newinput = {};
    $scope.inputs.push(newinput);
  }
  $scope.resetinput = function () {
    $scope.inputs = [];
  }
  $scope.delinput = function (input) {
    var index = $scope.inputs.indexOf(input);
    // var index1= $scope.Cauhoi.Traloi.indexOf(input);
    $scope.inputs.splice(index, 1);
    // $scope.Cauhoi.Traloi.splice(index1, 1);
  }
  $scope.addCauhoi = function () {
    $scope.Cauhoi.CRUD = 1;
  }
  $scope.resetCauhoi = function () {
    $scope.OninitCauhoi();
  }


  //// Thu Muc End

  // Nhom Nguoi Dung Begin
  $scope.OninitNhomnguoidung = function () {
    $scope.Oninit();
    $scope.ReadNhomnguoidung();
    $scope.Nhomnguoidung = {
      'Title': 'Tạo mới',
      'CRUD': 0,
      'Parent': 0
    };
    $('.modal').modal('hide');
    $scope.Phanquyen = {};
  }
  $scope.CreateNhomnguoidung = function (dulieu) {
    var data = '';
    dulieu.Parent == 0 ? data = {
      "Tennhom": dulieu.Tennhom,
      "Mota": dulieu.Mota,
      "Phanquyen": JSON.stringify($scope.Phanquyen),
      "idTao": $scope.idUser,
    } : data = {
      "pid": dulieu.Parent.id,
      "level": parseInt(dulieu.Parent.level) + 1,
      "Tennhom": dulieu.Tennhom,
      "Mota": dulieu.Mota,
      "Phanquyen": JSON.stringify($scope.Phanquyen),
      "idTao": $scope.idUser,
    };

    console.log(data);
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/nhomnguoidungs", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.OninitNhomnguoidung();
        Thongbao(0, 'Tạo Nhóm Thành Công');
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.UpdateNhomnguoidung = function (dulieu) {
    var data = '';
    dulieu.Parent == 0 ? data = {
      "Tennhom": dulieu.Tennhom,
      "Mota": dulieu.Mota,
    } : data = {
      "pid": dulieu.Parent.id,
      "level": parseInt(dulieu.Parent.level) + 1,
      "Tennhom": dulieu.Tennhom,
      "Mota": dulieu.Mota,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/nhomnguoidungs/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Cập Nhật Thành Công");
        $scope.OninitNhomnguoidung();
      }, function (res) {
        console.log(res);
      });
  }

  $scope.UpdatePQ = function (id, dulieu) {
    var data = {
      "Phanquyen": JSON.stringify(dulieu)
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/nhomnguoidungs/" + id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Cập Nhật Thành Công");
        $scope.OninitNhomnguoidung();
      }, function (res) {
        console.log(res);
      });
  }

  $scope.DeleteNhomnguoidung = function (dulieu) {
    var data = {
      "published": 1
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/nhomnguoidungs/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Xóa Thành Công");
        $scope.OninitNhomnguoidung();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.ThemNguoidung = function (dulieu, idNguoidung) {
    var data = {
      "idNguoidung": JSON.stringify(idNguoidung)
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/nhomnguoidungs/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Thêm Người Dùng Thành Công");
        $scope.OninitNhomnguoidung();
      }, function (res) {
        console.log(res);
      });
  }


  $scope.ReadNhomnguoidung = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/nhomnguoidungs?filter[published]=0&page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        var data = getdata(res.data.data);
        $scope.RNhomnguoidung = [];
        angular.forEach(data, function (v) {
          v.Ngaytao = new Date(v.Ngaytao);
          v.idNguoidung = JSON.parse(v.idNguoidung);
          v.Phanquyen = JSON.parse(v.Phanquyen);
          $scope.RNhomnguoidung.push(v);
        });
        $scope.NhomDuyet = $scope.RNhomnguoidung.find(result => result.id === 15).idNguoidung;
        $scope.NhomGV = $scope.RNhomnguoidung.find(result => result.id === 7).idNguoidung;
          //console.log($scope.RNhomnguoidung);
      });

  }
  $scope.editNhomnguoidung = function (data) {
    $scope.Nhomnguoidung = $scope.RNhomnguoidung.find(result => result.id === data.id);
    $scope.Nhomnguoidung.Title = "Cập Nhật";
    $scope.Nhomnguoidung.CRUD = 1;
  }
  $scope.editPhanquyen = function (data) {
    console.log(data);
    $scope.Phanquyen = data.Phanquyen;
  }
  //// Nhom Nguoi Dung End    


  // Đề Thi Begin
  $scope.OninitDethi = function () {
    $scope.Oninit();
    $scope.ReadTailieu();
    $scope.ReadCauhoi();
    $scope.ReadDethi();
    $scope.RCHDT = [];
    $scope.Dethi = {
      'CRUD': 0,
      idCH: []
    };
    $('.modal').modal('hide');
  }

  $scope.addDethi = function () {
    $scope.Dethi.CRUD = 1;
  }
  $scope.resetDethi = function () {
    $scope.OninitDethi();
  }


  $scope.CreateDethi = function (dulieu) {
    var data = {
      "Tendethi": dulieu.Chude,
      "idChude": dulieu.idChude,
      "idCH": JSON.stringify(dulieu.idCH),
      "idDuyet": JSON.stringify(dulieu.idDuyet),
      "Ghichu": dulieu.Ghichu,
      "idTao": $scope.idUser
    };
    console.log(data);
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/dethis", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.OninitDethi();
        Thongbao(0, 'Tạo Đề Thi Thành Công');
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }

  $scope.ReadDethi = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/dethis?filter[published]=0&page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.RDethi = [];
        $scope.RADethi = [];
        $scope.Dethigoc = [];
        var data = getdata(res.data.data);
        angular.forEach(data, function (v) {
          v.idDuyet = JSON.parse(v.idDuyet) || [];
          v.idCH = JSON.parse(v.idCH) || {};
          v.Ngaytao = new Date(v.Ngaytao);
          v.Trangthai = v.Trangthai.toString();
          v.Ngaytao = new Date(v.Ngaytao);
          v.Tendethi = v.Tenchude + '- Đề Số ' + v.ordering;
          if (v.Trangthai === 2) {
            $scope.RDethi.push(v);
          }
          $scope.RADethi.push(v);
          $scope.Dethigoc.push(v);
        });
        // $scope.FidTLCauhoi = $filter('unique')($scope.RACauhoi, 'idTL');    
        ($scope.localStorage.TabDT == 0) ? $scope.Phantrang($scope.RDethi, $scope.localStorage.SLitem, $scope.localStorage.Chontrang): $scope.Phantrang($scope.RADethi, $scope.localStorage.SLitem, $scope.localStorage.Chontrang);
      });

  }

  $scope.Locdethi = function (data, t) {
    $scope.Store('CDDTActive', t);
    //console.log(t);  
    $scope.RADethi = $scope.Dethigoc;
    //console.log($scope.RACauhoi);  
    var x = [];
    x.push(data);
    var y = flatten(x).map(el => el.id);
    var Loc = [];
    angular.forEach(y, function (v1) {
      angular.forEach($scope.RADethi, function (v2) {
        if (parseInt(v2.idChude) == parseInt(v1)) {
          Loc.push(v2);
        }
      });
    });
    $scope.RADethi = Loc;
    $scope.Store('CDDTHientai', data);

  }

  $scope.ResetDethi = function () {
    $scope.RemoveStorage('CDDTHientai');
    $scope.RemoveStorage('CDDTActive');
    $scope.ReadDethi();

  }

  $scope.UpdateDethi = function (dulieu) {
    var data = {
      "Tendethi": dulieu.Chude,
      "idChude": dulieu.idChude,
      "idCH": JSON.stringify(dulieu.idCH),
      "idDuyet": JSON.stringify(dulieu.idDuyet),
      "Ghichu": dulieu.Ghichu,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/dethis/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Cập Nhật Thành Công");
        $scope.OninitDethi();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.DeleteDethi = function (dulieu) {
    var data = {
      "published": 1
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/dethis/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Xóa Thành Công");
        $scope.OninitDethi();
      }, function (res) {
        console.log(res);
      });
  }

  $scope.UpdateTTDuyetDT = function (id, Trangthai) {
    var data = {
      "Trangthai": Trangthai,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/dethis/" + id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Chuyển Trạng Thái Thành Công");
        $scope.OninitDethi();
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }

  $scope.editDethi = function (data) {
    $scope.ResetCauhoi();
    $timeout(function () {
      $scope.Dethi = data;
      $scope.Dethi.CRUD = 2;
      //      console.log(data);
      angular.forEach(data.idCH, (v) => {
        var x = $scope.Cauhoigoc.find(result => result.id === v.idCH);
        x.Diem = v.Diem;
        $scope.RCHDT.push(x);
        $scope.RACauhoi = $scope.RACauhoi.filter(item => item.id !== v.idCH);
      });
    }, 500)

  }
  $scope.ShowCauhoi = function (data) {
    console.log(data);
    $scope.Dethiso = data.ordering;
    $scope.RCauhoiindethi = [];
    angular.forEach(data.idCH, (v) => {
      var x = $scope.Cauhoigoc.find(result => result.id === v.idCH);
      //   console.log(x);
      x.Diem = v.Diem;
      $scope.RCauhoiindethi.push(x);
    });

    //  console.log($scope.RCauhoiindethi);
  }
  $scope.AddToDethi = function (data) {
    if (data.Diem == '' || data.Diem <= 0 || data.Diem === undefined) {
      Thongbao(1, "Chưa Nhập Điểm");
    } else {
      $scope.RCHDT.push(data);
      $scope.Dethi.idCH.push({
        idCH: data.id,
        Diem: data.Diem
      });
      $scope.RACauhoi = $scope.RACauhoi.filter(item => item.id !== data.id);
      //      console.log($scope.RACauhoi);
      //      console.log($scope.RCHDT);
      //      console.log($scope.Dethi.idCH);
    }
  }

  $scope.Suadiem = function (data) {
    var SD = {
      idCH: data.id,
      Diem: parseInt(data.Diem)
    };
    $scope.Dethi.idCH = $scope.Dethi.idCH.map(u => u.idCH !== SD.idCH ? u : SD);
    //      console.log(SD);
    //      console.log(data);
    //      console.log($scope.Dethi.idCH);

  }

  $scope.RemoveFromDethi = function (data) {
    $scope.RCHDT = $scope.RCHDT.filter(item => item.id !== data.id);
    $scope.Dethi.idCH = $scope.Dethi.idCH.filter(item => item.idCH !== data.id);
    $scope.RACauhoi.push(data);
    //      console.log($scope.RACauhoi);
    //      console.log($scope.RCHDT);
    //      console.log($scope.Dethi.idCH);
  }

  $scope.removeDethi = function (data) {
    $scope.Dethi = data;
    $scope.Dethi.CRUD = 0;
  }
  $scope.selectAll = function () {
    angular.forEach($scope.checked, function (item) {
      item = $scope.selectedAll;
    });
  };

  //// Đề Thi Dung End     

  //Lớp Học Begin
  $scope.OninitLophoc = function () {
    $scope.Oninit();
    $scope.ReadTailieu();
    $scope.ReadDethi();
    $scope.ReadCauhoi();
    $scope.ReadBaihoc();
    $scope.ReadChude();
    $timeout(function () {
      $scope.ReadLophoc();
    }, 1000)

    $scope.RCHDT = [];
    $scope.Lophoc = {
      'Title': "Tạo Mới Lớp Học",
      'CRUD': 0,
      idCH: []
    };
    $('.modal').modal('hide');
  }
  $scope.resetLophoc = function () {
    $scope.OninitLophoc();
  }
  $scope.CreateLophoc = function (dulieu) {
    var d = new Date();
    var idHV = [];
    var idGV = [];
    angular.forEach(dulieu.idHV, function (v) {
      idHV.push({
        id: v,
        Giovao: '',
        Giora: '',
        Checkin: 0,
        StepHV: 0,
        Nopbai: 0,
        Type: "HV",
      });
    });
    angular.forEach(dulieu.idGV, function (v) {
      idGV.push({
        id: v,
        Giovao: '',
        Giora: '',
        Checkin: 0,
        StepHV: 0,
        Type: "GV",
      });
    });
    var data = {
      "Tenlop": dulieu.Tenlop,
      "MaLop": d.getTime(),
      "idBH": dulieu.idBH,
      "idDT": dulieu.idDT,
      "Batdau": $filter('date')(dulieu.Batdau, "yyyy-MM-dd HH:mm:ss"),
      "Ketthuc": $filter('date')(dulieu.Ketthuc, "yyyy-MM-dd HH:mm:ss"),
      "Mota": dulieu.Mota,
      "idGV": JSON.stringify(idGV),
      "idDuyet": JSON.stringify(dulieu.idDuyet),
      "idHV": JSON.stringify(idHV),
      "Ghichu": dulieu.Ghichu,
      "idTao": $scope.idUser
    };
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/lophocs", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.OninitLophoc();
        Thongbao(0, 'Tạo Thành Công');
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.ReadLophoc = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/lophocs?filter[published]=0&page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.RLophoc = [];
        $scope.RALophoc = [];
        var data = getdata(res.data.data);
        angular.forEach(data, function (v) {
          v.idDuyet = JSON.parse(v.idDuyet) || [];
          v.Danhgia = JSON.parse(v.Danhgia) || [];
          v.idHV = JSON.parse(v.idHV) || [];
          v.idGV = JSON.parse(v.idGV) || [];
          v.Ngaytao = new Date(v.Ngaytao);
          v.Trangthai = v.Trangthai.toString();
          v.Ngaytao = new Date(v.Ngaytao);
          v.Batdau = new Date(v.Batdau);
          v.Ketthuc = new Date(v.Ketthuc);
          v.Mota = $sce.trustAsHtml(v.Mota);
          v.Baihoc = $scope.Baihocgoc.find(result => result.id === v.idBH);
          if (v.Trangthai === 2) {
            $scope.RLophoc.push(v);
          }
          $scope.RALophoc.push(v);
        });
        // $scope.FidTLCauhoi = $filter('unique')($scope.RACauhoi, 'idTL');    
        $scope.Lophocgoc = $scope.RALophoc;
 //       console.log($scope.Lophocgoc);
        ($scope.localStorage.TabDT == 0) ? $scope.Phantrang($scope.RLophoc, $scope.localStorage.SLitem, $scope.localStorage.Chontrang): $scope.Phantrang($scope.RALophoc, $scope.localStorage.SLitem, $scope.localStorage.Chontrang);
      });

  }
  $scope.Loclophoc = function (data, t) {
    $scope.Store('CDDTActive', t);
    //console.log(t);  
    $scope.RALophoc = $scope.Lophocgoc;
    //console.log($scope.RACauhoi);  
    var x = [];
    x.push(data);
    var y = flatten(x).map(el => el.id);
    var Loc = [];
    angular.forEach(y, function (v1) {
      angular.forEach($scope.RALophoc, function (v2) {
        if (parseInt(v2.idChude) == parseInt(v1)) {
          Loc.push(v2);
        }
      });
    });
    $scope.RALophoc = Loc;
    $scope.Store('CDDTHientai', data);

  }
  $scope.ResetLophoc = function () {
    $scope.RemoveStorage('CDDTHientai');
    $scope.RemoveStorage('CDDTActive');
    $scope.ReadLophoc();

  }
  $scope.UpdateLophoc = function (dulieu) {
    var idHV = [];
    var idGV = [];
    angular.forEach(dulieu.idHV, function (v) {
      idHV.push({
        id: v,
        Giovao: '',
        Giora: '',
        Checkin: 0,
        StepHV: 0,
        Nopbai: 0,
        Type: "HV",
      });
    });
    angular.forEach(dulieu.idGV, function (v) {
      idGV.push({
        id: v,
        Giovao: '',
        Giora: '',
        Checkin: 0,
        StepHV: 0,
        Type: "GV"
      });
    });
    var data = {
      "Tenlop": dulieu.Tenlop,
      "idBH": dulieu.idBH,
      "idDT": dulieu.idDT,
      "Batdau": $filter('date')(dulieu.Batdau, "yyyy-MM-dd HH:mm:ss"),
      "Ketthuc": $filter('date')(dulieu.Ketthuc, "yyyy-MM-dd HH:mm:ss"),
      "Mota": dulieu.Mota,
      "idGV": JSON.stringify(idGV),
      "idDuyet": JSON.stringify(dulieu.idDuyet),
      "idHV": JSON.stringify(idHV),
      "Ghichu": dulieu.Ghichu,
      "idTao": $scope.idUser
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lophocs/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Cập Nhật Thành Công");
        $scope.OninitLophoc();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.DeleteLophoc = function (dulieu) {
    var data = {
      "published": 1
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lophocs/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Xóa Thành Công");
        $scope.OninitLophoc();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.UpdateTTDuyetLH = function (id, Trangthai) {
    var data = {
      "Trangthai": Trangthai,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lophocs/" + id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);

        Thongbao(0, "Chuyển Trạng Thái Thành Công");
        $scope.OninitLophoc();
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.editLophoc = function (data) {
    let NewidHV = [];
    let NewidGV = [];
    angular.forEach(data.idHV, function (v) {
      NewidHV.push(v.id);
    });
    angular.forEach(data.idGV, function (v) {
      NewidGV.push(v.id);
    });
    $scope.Lophoc = data;
    $scope.Lophoc.idHV = NewidHV;
    $scope.Lophoc.idGV = NewidGV;
    $scope.Lophoc.Batdau = $filter('date')(data.Batdau, "yyyy-MM-dd HH:mm:ss");
    $scope.Lophoc.Ketthuc = $filter('date')(data.Ketthuc, "yyyy-MM-dd HH:mm:ss");
    $scope.Lophoc.CRUD = 1;
    $scope.Lophoc.Title = "Chỉnh Sửa Lớp Học";
  }
  $scope.AddToLophoc = function (data) {
    if (data.Diem == '' || data.Diem <= 0 || data.Diem === undefined) {
      Thongbao(1, "Chưa Nhập Điểm");
    } else {
      $scope.RCHDT.push(data);
      $scope.Lophoc.idCH.push({
        idCH: data.id,
        Diem: data.Diem
      });
      $scope.RACauhoi = $scope.RACauhoi.filter(item => item.id !== data.id);
      //      console.log($scope.RACauhoi);
      //      console.log($scope.RCHDT);
      //      console.log($scope.Lophoc.idCH);
    }
  }
  $scope.RemoveFromLophoc = function (data) {
    $scope.RCHDT = $scope.RCHDT.filter(item => item.id !== data.id);
    $scope.Lophoc.idCH = $scope.Lophoc.idCH.filter(item => item.idCH !== data.id);
    $scope.RACauhoi.push(data);
    //      console.log($scope.RACauhoi);
    //      console.log($scope.RCHDT);
    //      console.log($scope.Lophoc.idCH);
  }
  $scope.XemNoidung = function (data) {
    $scope.ViewNoidung = data;

  }
  $scope.LoadLH = function (idTL) {
    $scope.Lophoc.idRoot = $scope.TailieuGoc.find(result => result.id === idTL).idRoot;
    $scope.Lophoc.idChude = $scope.TailieuGoc.find(result => result.id === idTL).idChude;
    console.log($scope.Lophoc);
  }
  $scope.removeLophoc = function (data) {
    $scope.Lophoc = data;
    $scope.Lophoc.CRUD = 0;
  }
  $scope.selectAll = function () {
    angular.forEach($scope.checked, function (item) {
      item = $scope.selectedAll;
    });
  };
  $scope.OninitLoadLophoc = function (id) {
    $scope.ReadCauhoi();  
    $scope.ReadDethi();
    $timeout(function () {
      $scope.ReadBaihoc();
    }, 500)
    $timeout(function () {
      $scope.LoadLophoc(id);
    }, 1000)

  }
   $scope.CauhoiKTLH = [];  
  $scope.LoadLophoc = function (id) { 
    var Malop = window.location.hash.slice(1);
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/lophocs?filter[MaLop]=" + Malop + "&page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.CheckUserHV = false;
        var data = getdata(res.data.data)[0];
         $scope.ReadKiemtra(data.id);
        data.idHV = JSON.parse(data.idHV) || [];
        data.Danhgia = JSON.parse(data.Danhgia) || [];
        data.idGV = JSON.parse(data.idGV) || [];
        data.Mota = $sce.trustAsHtml(data.Mota);
        data.Baihoc = $scope.Baihocgoc.find(result => result.id === data.idBH);
        data.Current = Array.from(new Set(data.idHV.concat(data.idGV)));
        $scope.HocvienHT = data.Current.find(result => result.id === id);
        angular.forEach(data.Current, function (v) {
          if (v.id == $scope.idUser) {
            $scope.CheckUserHV = true;
          }
        });
        $scope.RSLophoc = data;
        angular.forEach(data.Baihoc.Dethi.idCH, function (v) {
            let y = $scope.Cauhoigoc.find(result => result.id === v.idCH);
            y.Diem = v.Diem;
            $scope.CauhoiKTLH.push(y);
        }); 
  //      console.log(data);
      });

  };
  $scope.CheckinLophoc = function (lophoc, id) {
    if ($scope.HocvienHT.Checkin == 1) {
      Thongbao(1, "Đã check in rồi ! Đừng Gian Lận");
    } else {
      if ($scope.HocvienHT.Type == 'HV') {
        let newidHV = angular.copy(lophoc.idHV).map(obj => obj.id === id ? {
          ...obj,
          Checkin: 1,
          Giovao: new Date(),
          StepHV: 1
        } : obj);
        var data = {
          "idHV": JSON.stringify(newidHV)
        };
      } else {
        let newidGV = angular.copy(lophoc.idGV).map(obj => obj.id === id ? {
          ...obj,
          Checkin: 1,
          Giovao: new Date(),
          StepHV: 1
        } : obj);
        var data = {
          "idGV": JSON.stringify(newidGV)
        };
      }
     // console.log(data);
      $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lophocs/" + lophoc.id, data, {
          headers: $scope.headers
        })
        .then(function (res) {
          Thongbao(0, "Điểm Danh Thành Công");
          $scope.OninitLoadLophoc(id);
        }, function (res) {
          console.log(res);
        });
    }
  };
  $scope.Danhgialophoc = function (sao, review, lophoc, id) {
    if (sao < 4 && review === undefined) {
      Thongbao(1, "Vui Lòng Nhập Đánh Giá");
    } else {
      let newidHV = angular.copy(lophoc.idHV).map(obj => obj.id === id ? {
        ...obj,
        StepHV: 3
      } : obj);
      lophoc.Danhgia.push({
        id: id,
        SoSao: sao,
        Binhluan: review
      });
      var data = {
        "idHV": JSON.stringify(newidHV),
        "Danhgia": JSON.stringify(lophoc.Danhgia)
      };
      console.log(data);
      $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lophocs/" + lophoc.id, data, {
          headers: $scope.headers
        })
        .then(function (res) {
          //console.log(res);
          Thongbao(0, "Đánh Giá Thành Công");
          $timeout(function () {
            location.reload();
          }, 500)
        }, function (res) {
          console.log(res);
        });
    }
    console.log(sao, review, lophoc, id);
  };
  $scope.counter = 3600;
  $scope.Showcounter = false; 
  $scope.StartKiemTra = function (lophoc, hv) {
    $scope.Lambai = !$scope.Lambai;
    $scope.BaiKiemtra = {
      idLop: lophoc.id,
      idHV: hv.id,
      Traloi:[]
    };
    $scope.CheckKiemtra = true;
  //  console.log(lophoc.Baihoc.Dethi.idCH);
    let newidHV = angular.copy(lophoc.idHV).map(obj => obj.id === hv.id ? {
      ...obj,
      StepHV: 2
    } : obj);
    var data = {
      "idHV": JSON.stringify(newidHV)
    };
    //console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lophocs/" + lophoc.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        Thongbao(0, "Bắt Đầu Làm Kiểm Tra");
        $timeout(function () {
          $scope.Showcounter = true;
          var intervalTime = null;
          intervalTime = $interval(function () {
            $scope.counter--;
            // console.log($scope.counter--); 
            if ($scope.counter == 0) {
              $interval.cancel(intervalTime);
              intervalTime = null;
              Thongbao(1, "Hết Giờ Làm bài");
              $timeout(function () {
                $scope.HoanthanhKTLH($scope.BaiKiemtra);
              }, 1000)
            }
          }, 1000);
        }, 1000)

      }, function (res) {
        console.log(res);
      });
  };
  $scope.CheckTL ={};  
  $scope.HVTL = function (idCH,DAHV) {
      let item = {idCH:idCH,idTL:DAHV};
      let x = $scope.BaiKiemtra.Traloi.find(result => result.idCH === idCH);  
      (x===undefined)?$scope.BaiKiemtra.Traloi.push(item):$scope.BaiKiemtra.Traloi = $scope.BaiKiemtra.Traloi.map(x => (x.idCH === item.idCH) ? item : x);    
      console.log($scope.BaiKiemtra);
      console.log($scope.CheckTL);
      
  }; 
    
    
    
  $scope.HoanthanhKTLH = function (dulieu, hv, lophoc) {
      console.log(dulieu);
    var data = {
      "idLop": dulieu.idLop,
      "idHV": dulieu.idHV,
      "Loai": 1,
      //    "Batdau": $filter('date')(dulieu.Batdau, "yyyy-MM-dd HH:mm:ss"),
      //    "Ketthuc": $filter('date')(dulieu.Ketthuc, "yyyy-MM-dd HH:mm:ss"),
      "Noidung": JSON.stringify(angular.copy(dulieu.Traloi)),
      "idTao": $scope.idUser
    };

    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/kiemtras", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        let newidHV = angular.copy(lophoc.idHV).map(obj => obj.id === hv.id ? {
          ...obj,
          Nopbai: 1,
          StepHV: 2
        } : obj);
        var data = {
          "idHV": JSON.stringify(newidHV)
        };
        //console.log(data);
        $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/lophocs/" + lophoc.id, data, {
            headers: $scope.headers
          })
          .then(function (res) {
            Thongbao(0, "Đã Nộp Bài");
            $scope.OninitLoadLophoc(hv.id);
            $scope.Showcounter = true;
            $scope.CheckKiemtra = false;
            $scope.Showcounter = false;
          }, function (res) {
            console.log(res);
          });


      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });

  };
  $scope.ReadKiemtra = function (idLop) {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/kiemtras?filter[published]=0&filter[idLop]="+idLop+"&page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.RKiemtra = [];
        var data = getdata(res.data.data);
        angular.forEach(data, function (v) {
          v.Noidung = JSON.parse(v.Noidung);
          $scope.RKiemtra.push(v);   
        });
      console.log($scope.RKiemtra);
      });

  }
    
    
    
  $scope.VChamdiem = function (hv) {
      //console.log(hv);
      $scope.BailamHV = []
     let x =  $scope.RKiemtra.find(result => result.idHV === hv.id).Noidung;
      $scope.BailamHV = $scope.CauhoiKTLH.map((item, i) => Object.assign({}, item, x[i]));
      console.log($scope.BailamHV);
  };
    
    

  //Lớp Học End

  //Bài Học Begin    
  $scope.OninitBaihoc = function () {
    $scope.Oninit();
    $scope.ReadTailieu();
    $scope.ReadCauhoi();
    $timeout(function () {
       $scope.ReadDethi();
     }, 200)
    $timeout(function () {
      $scope.ReadBaihoc();
    }, 1000)
    $scope.RCHDT = [];
    $scope.Baihoc = {
      'Title': "Tạo Mới Lớp Học",
      'CRUD': 0,
      idCH: []
    };
    $('.modal').modal('hide');
  }
  $scope.resetBaihoc = function () {
    $scope.OninitBaihoc();
  }
  $scope.CreateBaihoc = function (dulieu) {
    var data = {
      "Tenbaihoc": dulieu.Tenbaihoc,
      "idTL": dulieu.idTL,
      "idDT": dulieu.idDT,
      "Noidung": dulieu.Noidung,
      "idDuyet": JSON.stringify(dulieu.idDuyet),
      "Ghichu": dulieu.Ghichu,
      "idTao": $scope.idUser
    };
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/baihocs", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.OninitBaihoc();
        Thongbao(0, 'Tạo Thành Công');
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.ReadBaihoc = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/baihocs?filter[published]=0&page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.RBaihoc = [];
        $scope.RABaihoc = [];
        var data = getdata(res.data.data);
        angular.forEach(data, function (v) {
          v.idDuyet = JSON.parse(v.idDuyet) || [];
          v.Trangthai = v.Trangthai.toString();
          v.Ngaytao = new Date(v.Ngaytao);
          v.Noidung = $sce.trustAsHtml(v.Noidung);
          v.Dethi = $scope.Dethigoc.find(result => result.id === v.idDT);
          if (v.Trangthai === 2) {
            $scope.RBaihoc.push(v);
          }
          $scope.RABaihoc.push(v);
        });
        // $scope.FidTLCauhoi = $filter('unique')($scope.RACauhoi, 'idTL');    
        $scope.Baihocgoc = $scope.RABaihoc;
        //console.log($scope.Baihocgoc);
        ($scope.localStorage.TabDT == 0) ? $scope.Phantrang($scope.RBaihoc, $scope.localStorage.SLitem, $scope.localStorage.Chontrang): $scope.Phantrang($scope.RABaihoc, $scope.localStorage.SLitem, $scope.localStorage.Chontrang);
      });

  }
  $scope.Locbaihoc = function (data, t) {
    $scope.Store('CDDTActive', t);
    //console.log(t);  
    $scope.RABaihoc = $scope.Baihocgoc;
    //console.log($scope.RACauhoi);  
    var x = [];
    x.push(data);
    var y = flatten(x).map(el => el.id);
    var Loc = [];
    angular.forEach(y, function (v1) {
      angular.forEach($scope.RABaihoc, function (v2) {
        if (parseInt(v2.idChude) == parseInt(v1)) {
          Loc.push(v2);
        }
      });
    });
    $scope.RABaihoc = Loc;
    $scope.Store('CDDTHientai', data);

  }
  $scope.ResetBaihoc = function () {
    $scope.RemoveStorage('CDDTHientai');
    $scope.RemoveStorage('CDDTActive');
    $scope.ReadBaihoc();

  }
  $scope.UpdateBaihoc = function (dulieu) {
    var data = {
      "Tenbaihoc": dulieu.Tenbaihoc,
      "idTL": dulieu.idTL,
      "idDT": dulieu.idDT,
      "Noidung": dulieu.Noidung,
      "idDuyet": JSON.stringify(dulieu.idDuyet),
      "Ghichu": dulieu.Ghichu,
      "idTao": $scope.idUser
    };
    console.log(data, dulieu.id);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/baihocs/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Cập Nhật Thành Công");
        $scope.OninitBaihoc();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.UpdateDuyetBaihoc = function (id, Trangthai) {
    var data = {
      "Trangthai": Trangthai,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/baihocs/" + id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);

        Thongbao(0, "Chuyển Trạng Thái Thành Công");
        $scope.OninitBaihoc();
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.DeleteBaihoc = function (dulieu) {
    var data = {
      "published": 1
    };
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/baihocs/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Xóa Thành Công");
        $scope.OninitBaihoc();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.editBaihoc = function (data) {
    console.log(data);
    $scope.Baihoc = data;
    $scope.Baihoc.Batdau = $filter('date')(data.Batdau, "yyyy-MM-dd HH:mm:ss");
    $scope.Baihoc.Ketthuc = $filter('date')(data.Ketthuc, "yyyy-MM-dd HH:mm:ss");
    $scope.Baihoc.CRUD = 1;
    $scope.Baihoc.Title = "Chỉnh Sửa Bài Học";
  }
  $scope.removeBaihoc = function (data) {
    console.log(data);
    $scope.Baihoc = data;
    $scope.Baihoc.CRUD = 0;
  }
  $scope.ShowDethi = function (data) {
    console.log(data);
    $scope.Dethiso = data.Dethi.ordering;
    $scope.RCauhoiindethi = [];
    angular.forEach(data.Dethi.idCH, (v) => {
      var x = $scope.Cauhoigoc.find(result => result.id === v.idCH);
      console.log(x);
      x.Diem = v.Diem;
      $scope.RCauhoiindethi.push(x);
    });

    //  console.log($scope.RCauhoiindethi);
  }
  $scope.CloseYoutube = function (data) {
    $("iframe").each(function () {
      var src = $(this).attr('src');
      $(this).attr('src', src);
    });
  }

  //Bài Học End    


  //Kỳ Thi Begin 

  $scope.OninitKythi = function () {
    $scope.Oninit();
    $scope.ReadDethi();
    $scope.ReadCauhoi();
    $scope.ReadNhomnguoidung();
    $timeout(function () {
      $scope.ReadKythi();
    }, 1000)

    $scope.Kythi = {
      'Title': 'Tạo mới',
      'CRUD': 0
    };
    $('.modal').modal('hide');
    $scope.ListHinhthuc = [{
        id: 1,
        Title: 'Online'
      },
      {
        id: 2,
        Title: 'Offline'
      },
      {
        id: 3,
        Title: 'Bài Học'
      }
    ]
  }
  $scope.CreateKythi = function (dulieu) {
    var data = {
      "idDT": dulieu.idDT,
      "Tenkythi": dulieu.Tenkythi,
      "Hinhthuc": dulieu.Hinhthuc,
      "Lanthi": dulieu.Lanthi,
      "Batdau": $filter('date')(dulieu.Batdau, "yyyy-MM-dd HH:mm:ss"),
      "Ketthuc": $filter('date')(dulieu.Ketthuc, "yyyy-MM-dd HH:mm:ss"),
      "idVitri": JSON.stringify(dulieu.idVitri),
      "idDuyet": JSON.stringify(dulieu.idDuyet),
      "idHV": JSON.stringify(dulieu.idHV),
      "idTao": $scope.idUser,
    };

    console.log(data);
    $http.post("https://tazagroup.vn/api/index.php/v1/hrms/kythis", data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        $scope.OninitKythi();
        Thongbao(0, 'Tạo Thành Công');
      }, function (res) {
        console.log(res);
        Thongbao(1, geterror(res));
      });
  }
  $scope.ReadKythi = function () {
    $http.get("https://tazagroup.vn/api/index.php/v1/hrms/kythis?filter[published]=0&page[offset]=0&page[limit]=*", {
        headers: $scope.headers
      })
      .then(function (res) {
        $scope.RKythi = [];
        $scope.RAKythi = [];
        var data = getdata(res.data.data);
        angular.forEach(data, function (v) {
          v.idVitri = JSON.parse(v.idVitri) || [];
          v.idDuyet = JSON.parse(v.idDuyet) || [];
          v.idHV = JSON.parse(v.idHV) || [];
          v.Trangthai = v.Trangthai.toString();
          v.Ngaytao = new Date(v.Ngaytao);
          v.Batdau = new Date(v.Batdau);
          v.Ketthuc = new Date(v.Ketthuc);
          v.Dethi = $scope.Dethigoc.find(result => result.id === parseInt(v.idDT));
          if (v.Trangthai === 2) {
            $scope.RKythi.push(v);
          }
          $scope.RAKythi.push(v);
        });
        // $scope.FidTLCauhoi = $filter('unique')($scope.RACauhoi, 'idTL');    
        $scope.Kythigoc = $scope.RAKythi;
//        console.log($scope.Kythigoc);
        ($scope.localStorage.TabKT == 0) ? $scope.Phantrang($scope.RKythi, $scope.localStorage.SLitem, $scope.localStorage.Chontrang): $scope.Phantrang($scope.RAKythi, $scope.localStorage.SLitem, $scope.localStorage.Chontrang);
      });

  }

  $scope.UpdateKythi = function (dulieu) {
    var data = '';
    dulieu.Parent == 0 ? data = {
      "Tennhom": dulieu.Tennhom,
      "Mota": dulieu.Mota,
    } : data = {
      "pid": dulieu.Parent.id,
      "level": parseInt(dulieu.Parent.level) + 1,
      "Tennhom": dulieu.Tennhom,
      "Mota": dulieu.Mota,
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/kythis/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Cập Nhật Thành Công");
        $scope.OninitKythi();
      }, function (res) {
        console.log(res);
      });
  }
  $scope.DeleteKythi = function (dulieu) {
    var data = {
      "published": 1
    };
    console.log(data);
    $http.patch("https://tazagroup.vn/api/index.php/v1/hrms/kythis/" + dulieu.id, data, {
        headers: $scope.headers
      })
      .then(function (res) {
        console.log(res);
        Thongbao(0, "Xóa Thành Công");
        $scope.OninitKythi();
      }, function (res) {
        console.log(res);
      });
  }

  $scope.editKythi = function (data) {
    console.log(data);
    $scope.Kythi = data;
    $scope.Kythi.Batdau = $filter('date')(data.Batdau, "yyyy-MM-dd HH:mm:ss");
    $scope.Kythi.Ketthuc = $filter('date')(data.Ketthuc, "yyyy-MM-dd HH:mm:ss");
    $scope.Kythi.CRUD = 1;
    $scope.Kythi.Title = "Chỉnh Sửa Kỳ Thi";
  }

  $scope.removeKythi = function (data) {
    console.log(data);
    $scope.Kythi = data;
    $scope.Kythi.CRUD = 0;
  }
  //Kỳ Thi End 

  //Dashboard
  $scope.OninitDashboard = function () {
    $scope.Oninit();
    $scope.ResetTailieu();
    $scope.ResetCauhoi();
    $scope.ResetDethi();
    $scope.ResetBaihoc();
    $scope.ResetLophoc();
    $scope.ReadTailieu();
    $timeout(function () {
      $scope.ReadCauhoi();
    }, 500)
    $timeout(function () {
      $scope.ReadDethi();
    }, 600)
    $timeout(function () {
      $scope.ReadBaihoc();
    }, 700)
    $timeout(function () {
      $scope.ReadKythi();
    }, 800)
    $scope.ReadNhomnguoidung();
  }
  //Dashboard


  $scope.showBtns = false;
  $scope.lastFile = null;
  $scope.Lienket = [];
  $scope.getDropzone = function () {
    console.log($scope.dzMethods.getDropzone());
  };
  $scope.getFiles = function () {
    console.log($scope.dzMethods.getAllFiles());
    alert('Check console log.');
  };

  $scope.dzOptions = {
    url: '/index.php?option=com_hrms&task=Tailieu.uploadMultiFile&format=raw',
    dictDefaultMessage: 'Thêm File Tải Lên',
    acceptedFiles: 'image/*,application/pdf',
    parallelUploads: 5,
    autoProcessQueue: false,
    addRemoveLinks: true,
    //autoDiscover = false
  };
  $scope.dzMethods = {};
  $scope.dzCallbacks = {
    'addedfile': function (file) {
      $scope.showBtns = true;
      $scope.lastFile = file;
    },
    'removedfile': function (file) {
      console.log(file);
    },
    'success': function (file, res) {
      $scope.Lienket.push(JSON.parse(res));
      console.log($scope.Lienket);
      console.log(res);
    },
    'error': function (file, xhr) {
      console.warn('File failed to upload from dropzone 2.', file, xhr);
    }
  };


})