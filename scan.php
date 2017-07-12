  <h2>Scan</h2>

  <form action="reader.php" method="post" enctype="multipart/form-data">
		<div class="scan_wrap">
			<div class="img_wrap">
	        <input type="file" name="file" id="upfile" accept="image/*" capture="camera" />
	        
	        <img id="img" class="img-responsive" src="" alt="" width="50%">
	        <!-- <input type="hidden" name= 'file' id = file> -->
	    </div>
			<p class="save_btn"><input type="submit" name="save" value="保存"/></p>
		</div>
  </form>
 <!-- <input type="file" accept="image/*" capture="camera"> -->

  <script>

		$('#upfile').change(function() {


			if (this.files.length > 0) {
				// 選択されたファイル情報を取得
				var file = this.files[0];

				// readerのresultプロパティに、データURLとしてエンコードされたファイルデータを格納
				var reader = new FileReader();
				reader.readAsDataURL(file);

				reader.onload = function() {
					$('#img').attr('src', reader.result);
					// $('#file').val(reader.result);
          // crop();
				}
			}


 });

  </script>