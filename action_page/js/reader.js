
            function retry(){
                    alert("カメラのリンクに飛ぶ");
                    //location.href = "";
            }



            //=================micro soft computer vision API====================//
            function processImage(img_url) {
                // console.log(img_url);
                $("#loading").show();
                //microsoft Computer Vision APIのKey
                var subscriptionKey = "253edd3abc2e4083a529927d9b1950ac";
                var uriBase = "https://westcentralus.api.cognitive.microsoft.com/vision/v1.0/ocr";
                var params = {
                    "language": "unk",
                    "detectOrientation ": "true",
                };

                //srcにurlを指定して、画像を表示する
                // var sourceImageUrl = document.getElementById("inputImage").value;
                // document.querySelector("#sourceImage").src = sourceImageUrl;

                // img_urlで持ってきた$barcode=画像のURLを代入
                var sourceImageUrl = img_url;

                // Perform the REST API call.
                $.ajax({
                    url: uriBase + "?" + $.param(params),

                    // Request headers.
                    beforeSend: function(jqXHR){
                        jqXHR.setRequestHeader("Content-Type","application/json");
                        jqXHR.setRequestHeader("Ocp-Apim-Subscription-Key", subscriptionKey);
                    },
                    type: "POST",
                    // Request body.
                    data: '{"url": ' + '"' + sourceImageUrl + '"}',
                }).done(function(data) {
                    // Show formatted JSON on webpage.
                    //ここにバーコードの数字が入る
                    let wordsArray = data.regions[0].lines[0].words;

                    //この配列にバーコードの数字を格納
                    let numArray = [];

                    for(let i = 0; i < wordsArray.length; i++){
                        numArray.push(wordsArray[i].text);
                    }
                    let num = numArray.join(""); //格納された数字を統合して文字列にする。
                    $("#numberArea").val(num);



                    //==========外部サイトでJANコードを検索、商品名をスクレイピング==========//

                    //JANコード検索してくれるurlをPOSTする。
                    //検索結果からスクレイピングした商品名をGETする。
                    let jan_url = "http://www.janken.jp/goods/jk_catalog_syosai.php?jan="+num;

                    $.ajax({
                        type: 'get',
                        url: "item_info.php",
                        data: {url: jan_url},
                        async:false,
                        success: function(data){
                            let name = data.replace(/<("[^"]*"|'[^']*'|[^'">])*>/g,'');
                            //モーダルに値(item_name,category,end_date)を入れておく
                            $("#mordal_item_name").val(name);
                            // $("#mordal_item_category").val(name);
                            var now = new Date();
                             //default消費期限値…本日から7日後
                            now.setDate(now.getDate() + 7);
                            var year = now.getFullYear();
                            var mon = now.getMonth()+1; //１を足すこと
                            var day = now.getDate();
                            let end_date = year+"-"+mon+"-"+day;
                            $('#myModal').modal();
                            $("#mordal_item_name").val(name);
                            $("#item_name").val(name);
                            $("#item_end_date").val(end_date);
                            $("#mordal_end_date").val(end_date);
                        }
                    });
                    //========googleのcustom search APIで検索結果から商品画像を取得========//

                    let search_data = "https://www.googleapis.com/customsearch/v1?key=AIzaSyC_89rrj-YSKjko1pVgQyqIqdLkBwkrKMA&cx=016327561336931600638:eog4mtqwlfm&searchType=image&q=" + num;

                    $.ajax({
                        url: search_data, //読み込むファイルを指定
                        cache: false, //キャッシュを保存するかの指定
                        success: function(html){
                            //データ取得後に実行する処理
                            let checker = html.items;
                            if(typeof checker === "undefined"){
                                $("#sourceImage").attr("src","http://whisper1111.sakura.ne.jp/noimage.png");
                                $('#regist_bt').removeClass().addClass("regist_bt_run btn btn-block btn-danger");
                                $("#loading").fadeOut();
                                $(".item_info").show();
                                // $('#scan_bt').removeClass().addClass("scan_bt_off");
                         }else{
                             let item_image = html.items[0].link;
                             $("#sourceImage").attr("src",item_image);
                             //$("#img_src").val(item_image);//ここでモーダルのhiddenになってるinputタグに代入
                             // $("#item_name").val(item_name);
                             // $("#category").val(category);
                             // $("#item_end_date").val(item_name);
                             $('#regist_bt').removeClass().addClass("regist_bt_run btn btn-block btn-danger");
                             $("#loading").fadeOut();
                             $(".item_info").show();
                             // $('#scan_bt').removeClass().addClass("scan_bt_off");
                         }
                        }
                    });
                })

                //========================エラーの表示========================//
                    .fail(function(jqXHR, textStatus, errorThrown) {
                    // Display error message.
                    var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
                    errorString += (jqXHR.responseText === "") ? "" : (jQuery.parseJSON(jqXHR.responseText).message) ?
                        jQuery.parseJSON(jqXHR.responseText).message : jQuery.parseJSON(jqXHR.responseText).error.message;
                    alert(errorString);
                });
            };
