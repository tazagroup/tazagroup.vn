<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100" ng-init="OninitTailieu();ReadTailieu()">
  <div class="container">
		<div>
			<div style="text-align:center;" id="startUpload" ng-show="showBtns">
				<button ng-click="dzMethods.processQueue();">Start Uploading</button>
				<button ng-click="dzMethods.removeAllFiles();">Remove All Files</button>
				<button ng-click="dzMethods.removeFile(lastFile);">Remove Last File</button>
				<button ng-click="getDropzone();">Get getDropzone instance</button>
				<button ng-click="getFiles();">Get total files</button>
			</div>
			<div id="dropzone2" class="dropzone sm" options="dzOptions" methods="dzMethods" callbacks="dzCallbacks" ng-dropzone></div>
		</div>
  </div>
</div>
