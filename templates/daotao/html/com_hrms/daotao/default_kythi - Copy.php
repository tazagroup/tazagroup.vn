<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100" ng-init="OninitCauhoi()">
  <div class="container" ng-init='inputs1=[{"id":"1","dapan":"sadasd"},{"id":"2","dapan":"sdasd"},{"id":"3","dapan":"sdfsfsd"},{"id":"4"}]'>
	<button ng-click="Capnhatlaicauhoi()">Cập Nhật</button>	
      
      
      <div ng-repeat="x in FixCH">{{$index+1}} - {{x.Dapan}}</div>
      {{inputs1}}
      {{Test}}
      <div class="text-center" ng-click="addinput()">
             <button class="btn btn-primary"><i class="fas fa-plus-circle"></i></button>
                        </div>
      
    <div class="form-check d-flex p-0 mb-3" ng-repeat="i1 in inputs1"> 
      <input class="form-control" ng-model="i1.id">
      <input class="form-control" ng-model="i1.dapan">
   </div>  
  </div>
</div>
