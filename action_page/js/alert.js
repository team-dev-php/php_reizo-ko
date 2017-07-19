//========受け取った食材＆所有者リストを使って、レシピをスクレイピング========//
function cook(){


    let count_show_hide=3;
    let foods_container = [['山田','えび','2017年7月10日'],['高橋','ジャガイモ', '2017年7月1日'],['佐藤','わかめ', '2017年7月10日'],['川田','鶏肉','2017年7月10日'],['鈴本', '栗', '2017年7月10日'],['前田', 'トマト', '2017年7月10日'],['大島','牛肉', '2017年7月10日'],['北川', 'ハム', '2017年7月10日'],['佐藤','きゅうり', '2017年7月10日']];

    //    let foods_container = [['山田','エビ','2017年7月10日'],['高橋','ジャガイモ', '2017年7月1日'],['佐藤','わかめ', '2017年7月10日']];

    let userName = '佐藤'
    let usersFood = [];
    let friendsFood = [];
    let foodsArray = [];


    //ユーザーのアイテムと、友達のアイテムで分ける


    for(let i = 0; i < foods_container.length; i++){
        if(foods_container[i][0] == userName){
            usersFood.push(foods_container[i]);
        }else{
            friendsFood.push(foods_container[i])
        }
    }
    console.log(usersFood);
    console.log('friendsFood'+friendsFood);


    let ordered = [];

    //ユーザーの食材からレシピを出す場合
    if (usersFood.length != 0){
        for(let i = 0; i < usersFood.length; i++){
            ordered.push(usersFood[i][1]);
        }
    }

    //全員の食材からレシピを出す場合
//    if (friendsFood.length != 0){
//        for (let e = 0; e < friendsFood.length; e++){
//            ordered.push(friendsFood[e][1])
//        }
//    }
    //-------------------------------------

    foodsArray = ordered;
    console.log(foodsArray);


//------------------------必要な分、htmlのタグを生成----------------------//
    let rowNum = foodsArray.length +1;
    console.log("rowNum" + rowNum);

    for (let i = 1; i < rowNum; i++) {
        let row = $("<div>", {
            addClass: "menu_hide",
            id:"row"+ i
        });


        $('#box').append(row);

            let img = $("<img>", {
                addClass: "img",
                id:"img"+ i
            });
            let a = $("<a>", {
                target: "_blank",
                addClass: "a",
                id:"a"+ i,
                style:"text-decoration:none"
            });

            $('#row'+i).append(img).append(a);

            let label = $("<label>", {
                for:"Panel"+ i,
                id:"label"+ i
            });

            let input = $("<input>", {
                type: "checkbox",
                addClass: "on-off",
                id:"Panel"+ i
            });

            let ul = $("<ul>", {
                addClass: "index",
                id:"ul"+ i
            });

            let li = $("<li>", {
                id:"li"+ i
            });

            let li2 = $("<label>", {
                for: "Panel"+i,
                addClass : "linkholder",
                id:"li2"+ i
            });

            let pt = $("<p>", {
                id:"p"+ i
            });

            let a2 = $("<a>", {
                addClass: "linka",
                id:"a2"+ i
            });

//            let div = $("<div>", {
//                addClass : "button-link",
//                id:"div"+ i,
//                on:{click: function(){
//                }}
//            });

            let head = $("<div>", {
                addClass : "head",
                id:"head"+ i,
                on:{click: function(){
                    show_hide();
                }
                   }
            });

            let head2 = $("<div>", {
                addClass : "head2",
                id:"head2"+ i,
            });

            let a3 = $("<a>", {
               addClass : "moresee",
               id:"a3"+ i,
            });

        let countArray = [];
        for (let c = 0; c < foodsArray.length; c++){
            countArray.push(2);
        }
        function show_hide(){
            let index = i-1;
            if(countArray[index] % 2 == 0){
                $("#row"+i).removeClass().addClass("menu");
                countArray[index]++;
            }else{
                $("#row"+i).removeClass().addClass("menu_hide");
                countArray[index]++;
            }
        }

            $('#row'+i).before(head);
            $('#head'+i).html("もうすぐ"+foodsArray[i-1]+"の消費期限です！（残り２日）");
            $('#row'+i).prepend(head2);
            $('#head2'+i).append(a3);
            //$('#row'+i).append(div);
            $('#row'+i).append(label);
            $('#label'+ i).text("この料理のレシピを見る");
            $('#label'+ i).addClass("labela");
            //$('#div'+ i).text("このイベントに参加する");
            $('#row'+ i).append(input);
            $('#row'+ i).append(ul);
            $('#ul'+ i).append(li);
            $('#ul'+ i).append(li2);
            $('#li'+ i).append(pt);
            $('#li2'+ i).text("[レシピを閉じる]");

    }

    //------------------------必要な分、htmlのタグを生成以上----------------------//

    for (let f = 0; f < foodsArray.length; f++){
        let cook_url;
        let link;
        let img;
        let countresult;
        let idNum = f + 1;

        let keyword = foodsArray[f];
        cook_url = "http://www.kikkoman.co.jp/homecook/search/select_search.html?free_word="+ keyword +"&site_type=J";


            //==========外部サイトからレシピをスクレイピング==========//

            $.ajax({
                type: 'get',
                url: "cook_info.php",
                data: {url: cook_url},
                async:true,
                dataType: 'json',
                success: function(data){
                    link = data[0].replace(".jpg","/index.html");
                    link = link.replace("/img","");
                    link = "http://www.kikkoman.co.jp"+link;
                    img = "http://www.kikkoman.co.jp"+data[0];
                    //料理の画像データと料理の詳細ページのリンク取得
                    let idx = data[1].indexOf("件");
                    countresult = data[1].slice(0,idx);
                    $('#a3'+idNum).text(foodsArray[idNum-1]+"を使った簡単レシピ（"+countresult+"品）");
                    $('#a3'+idNum).attr("href", cook_url);
                    $('#a3'+idNum).attr("target", "_blank");

                    console.log(data);

                    ajax2();
                }
            });
    function ajax2(){
                $.ajax({
                    type: 'get',
                    url: "cook_detail.php",
                    data: {url: link},
                    async:true,
                    dataType: 'json',
                    success: function(data){
                        console.log(data);

                        let url = link;
                        $('#img'+idNum).attr('src', img);

                        //$('#a'+idNum+"_"+idNum2).attr('href', url);

                        console.log("[data]"+data);
                        console.log("[link]"+link);
                        $('#a'+idNum).append("<div class = dish_title>"+data[0]+"</div><br/>"+"<div class = summary>"+"〜"+data[1]+"〜"+"</div>"+"<div class = miniblock>調理時間<div class = whitebox1></div></div>"+"<div class = miniblock>エネルギー<div class = whitebox2></div></div>"+"<div class = miniblock>塩分<div class = whitebox3></div></div>");


                        let zairyo = [];
                        let zairyoP = data[3];
                        let amountP = data[4];

                        for(let g = 0; g<zairyoP.length; g++){
                            zairyoP[g] = "<div class = integ>"+zairyoP[g]+"</div>"
                        }

                        for(let g = 0; g<amountP.length; g++){
                            amountP[g] = "<div class = amt>"+amountP[g]+"</div>"
                        }

                        for(let g = 0; g<zairyoP.length; g++){
                            let a = zairyoP[g].replace("<div class = integ>","");
                            let b = a.replace("</div>","");
                            zairyo.push(b);
                        }


                        let share_amt = 0;

                        for(let r = 0; r<foods_container.length; r++){
                            for(let g = 0; g<zairyo.length; g++){
                                if(foods_container[r][1].includes(zairyo[g])== true){
                                    zairyoP[g] = "<div class = hisinteg>"+foods_container[r][0]+"さんの</div><div class = hisinteg>"+zairyoP[g]+"</div>";
                                    share_amt++;

                                    //console.log("a" + foods_container[r][1]);
                                    //console.log("b" + zairyo[g]);
                                }
                            }
                            console.log(zairyoP);
                        }

                        let ingredient = zairyoP.join("<br>");
                        let amount = amountP.join("<br>");
                        console.log(ingredient);

                        let how = data[5].join("<br><br>");

                        $('#a'+idNum+" .whitebox1").text(data[2][0]);
                        $('#a'+idNum+" .whitebox2").text(data[2][1]);
                        $('#a'+idNum+" .whitebox3").text(data[2][2]);
                        //$('#p'+idNum+"_"+idNum2).html(mixArray[f][g]);
                        $('#p'+idNum).html("<p class = futari>材料２人分</p><div class = int_amt_flex><div class = ingredient>"+ingredient+"</div><div class = amount>"+amount+"</div></div><p class = futari>つくり方</p><p class = how>"+ how +"</p>");

                    }
                });
            }
    }


            //==========外部サイトからレシピをスクレイピング==========//




    $(".have").on('click', function(){
        let a = $(this).attr("value");

        alert(a);
    });

    $(function(){

        //モーダルウィンドウを出現させるクリックイベント
        $(".button-link").click( function(){

            //キーボード操作などにより、オーバーレイが多重起動するのを防止する
            $( this ).blur() ;    //ボタンからフォーカスを外す
            if( $( "#modal-overlay" )[0] ) return false ;        //新しくモーダルウィンドウを起動しない (防止策1)
            //if($("#modal-overlay")[0]) $("#modal-overlay").remove() ;        //現在のモーダルウィンドウを削除して新しく起動する (防止策2)

            //オーバーレイを出現させる
            $( "body" ).append( '<div id="modal-overlay"></div>' ) ;
            $( "#modal-overlay" ).fadeIn() ;

            //コンテンツをセンタリングする
            centeringModalSyncer() ;

            //コンテンツをフェードインする
            $( "#modal-content" ).fadeIn();

            //[#modal-overlay]、または[#modal-close]をクリックしたら…
            $( "#modal-overlay,#modal-close" ).unbind().click( function(){

                //[#modal-content]と[#modal-overlay]をフェードアウトした後に…
                $( "#modal-content,#modal-overlay" ).fadeOut( "fast" , function(){

                    //[#modal-overlay]を削除する
                    $('#modal-overlay').remove() ;

                });

            });

        });

        //リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
        $( window ).resize( centeringModalSyncer ) ;

        //センタリングを実行する関数
        function centeringModalSyncer() {

            //画面(ウィンドウ)の幅、高さを取得
            var w = $( window ).width() ;
            var h = $( window ).height() ;

            // コンテンツ(#modal-content)の幅、高さを取得
            // jQueryのバージョンによっては、引数[{margin:true}]を指定した時、不具合を起こします。
            //        var cw = $( "#modal-content" ).outerWidth( {margin:true} );
            //        var ch = $( "#modal-content" ).outerHeight( {margin:true} );
            var cw = $( "#modal-content" ).outerWidth();
            var ch = $( "#modal-content" ).outerHeight();

            //センタリングを実行する
            $( "#modal-content" ).css( {"left": ((w - cw)/2) + "px","top": ((h - ch)/2) + "px"} ) ;

        }

    });


    $(function(){
        let now = new Date();
        let y = now.getFullYear();
        let m = now.getMonth() + 1;
        let d = now.getDate();
        let w = now.getDay();
        let wd = ["日", "月", "火", "水", "木", "金", "土"];

        $("#d1").text(y + "年" + m + "月" + (d + 1) + "日" + "(" + wd[w + 1] + ")");
        $("#d2").text(y + "年" + m + "月" + (d + 2) + "日" + "(" + wd[w + 2] + ")");
        $("#d3").text(y + "年" + m + "月" + (d + 3) + "日" + "(" + wd[w + 3] + ")");
    });
}

cook();
