$(document).on('change','#upfile',function() {
                    if (this.files.length > 0) {
                        // 選択されたファイル情報を取得
                        var file = this.files[0];
                        // console.log(file);

                        // readerのresultプロパティに、データURLとしてエンコードされたファイルデータを格納
                        var reader = new FileReader();
                        reader.readAsDataURL(file);

                        reader.onload = function() {
                            $('#sourceImage').attr('src', reader.result);
                            // $('#file').val(reader.result);
                            // crop();
                        }
                         // var files = this.dataTransfer.files;
                         // console.log(files);
                        var file_data = new FormData();

                        file_data.append('file',file);
                        var data = {file : file_data};

                        $.ajax({
                            url:"img_url_create.php",
                            method:'POST',
                            data:file_data,
                            processData: false,
                            contentType: false
                        }).done((img_src)=>{
                            console.log(img_src);
                            processImage(img_src); //ここでローディング始まる。

                        }).fail(function(jqXHR, textStatus, errorThrown){
                            // Display error message.
                            var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
                            errorString += (jqXHR.responseText === "") ? "" : (jQuery.parseJSON(jqXHR.responseText).message) ?
                                jQuery.parseJSON(jqXHR.responseText).message : jQuery.parseJSON(jqXHR.responseText).error.message;
                            alert(errorString);
                        });
                    }
                });



//登録画像カメラ読み込み用


$(document).on('change','#upfile2',function() {
                    if (this.files.length > 0) {
                        // 選択されたファイル情報を取得
                        var file = this.files[0];
                        // console.log(file);

                        // readerのresultプロパティに、データURLとしてエンコードされたファイルデータを格納
                        var reader = new FileReader();
                        reader.readAsDataURL(file);

                        reader.onload = function() {
                            $('#sourceImage2').attr('src', reader.result);
                            $("#img_src").val(reader.result);//ここでモーダルのhiddenになってるinputタグに代入
                            // $('#file').val(reader.result);
                            // crop();
                        }
                         // var files = this.dataTransfer.files;
                         // console.log(files);
                        var file_data = new FormData();

                        file_data.append('file',file);
                        var data = {file : file_data};

                        $.ajax({
                            url:"img_url_create.php",
                            method:'POST',
                            data:file_data,
                            processData: false,
                            contentType: false
                        }).done((img_src)=>{
                            console.log(img_src);
                            var now = new Date();
                             //default消費期限値…本日から7日後
                            now.setDate(now.getDate() + 7);
                            var year = now.getFullYear();
                            var mon = now.getMonth()+1; //１を足すこと
                            var day = now.getDate();
                            let end_date = year+"-"+mon+"-"+day;
                            $('#regist_bt').removeClass().addClass("regist_bt_run btn btn-block btn-danger");
                            $('#myModal').modal();
                            $("#item_end_date").val(end_date);
                            $("#mordal_end_date").val(end_date);



                        }).fail(function(jqXHR, textStatus, errorThrown){
                            // Display error message.
                            var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
                            errorString += (jqXHR.responseText === "") ? "" : (jQuery.parseJSON(jqXHR.responseText).message) ?
                                jQuery.parseJSON(jqXHR.responseText).message : jQuery.parseJSON(jqXHR.responseText).error.message;
                            alert(errorString);
                        });
                    }
                });
