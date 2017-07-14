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
                            processImage(img_src);

                        }).fail(function(jqXHR, textStatus, errorThrown){
                            // Display error message.
                            var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
                            errorString += (jqXHR.responseText === "") ? "" : (jQuery.parseJSON(jqXHR.responseText).message) ?
                                jQuery.parseJSON(jqXHR.responseText).message : jQuery.parseJSON(jqXHR.responseText).error.message;
                            alert(errorString);
                        });
                    }
                });