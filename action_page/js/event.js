//========受け取った食材＆所有者リストを使って、レシピをスクレイピング========//
function cook(){



    let count_show_hide=3;
    let plusnum = 0;

    let foods_container = [['山田','えび','2017年7月10日'],['大島','ジャガイモ', '2017年7月1日'],['佐藤','わかめ', '2017年7月10日'],['大島','鶏肉','2017年7月10日'],['鈴本', '栗', '2017年7月10日'],['前田', 'トマト', '2017年7月10日'],['大島','牛肉', '2017年7月10日'],['大島', 'ハム', '2017年7月10日'],['山田','きゅうり', '2017年7月10日']];

    //    let foods_container = [['山田','エビ','2017年7月10日'],['高橋','ジャガイモ', '2017年7月1日'],['佐藤','わかめ', '2017年7月10日']];

    let userName = '山田'
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

    //イベント照合用
    let userf = [];

    //ユーザーの食材からレシピを出す場合
    if (usersFood.length != 0){
        for(let i = 0; i < usersFood.length; i++){
            ordered.push(usersFood[i][1]);
            userf.push(usersFood[i][1]);
        }
    }

    //全員の食材からレシピを出す場合
        if (friendsFood.length != 0){
            for (let e = 0; e < friendsFood.length; e++){
                ordered.push(friendsFood[e][1])
            }
        }
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

        $('#row'+i).append(a);

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


        let sutday;

                // 今日
                var day = new Date();

                // 10日後
                day.setDate(day.getDate() + (4 + plusnum));

                let y = day.getFullYear();
                let m = day.getMonth() + 1;
                let d = day.getDate();
                let w = day.getDay();
                let wd = ["日", "月", "火", "水", "木", "金", "土"];

                sutday = y + "年" + m + "月" + d  + "日" + "(" + wd[w] + ")";


                plusnum ++;

        $('#head'+i).html("<div class = date>"+sutday+"</div>");

        //$('#row'+i).prepend(head2);
        //$('#head2'+i).append(a3);
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
                $('#head'+idNum).css("background-image", "url("+img+")");

                //$('#a3'+idNum).text(foodsArray[idNum-1]+"を使った簡単レシピ（"+countresult+"品）");
                //$('#a3'+idNum).attr("href", cook_url);
                //$('#a3'+idNum).attr("target", "_blank");

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
                    $('#head'+idNum).append("<div class = dish_title>"+data[0]+"</div><br/>"+"<div id = summ"+idNum + " class = summary>"+"〜"+data[1]+"〜"+"</div>");

                    let join = $("<div>", {
                        addClass : "join",
                        id:"join"+ idNum,
                        on:{click: function(){
                            modal();
                        }
                           }
                    });

                    let participant = $("<div>", {
                        addClass : "participant",
                        id:"participant"+ idNum,
                        on:{click: function(){
                            modal2();
                        }
                           }
                    });

                    $('#a'+idNum).append(join);
                    $('#a'+idNum).append(participant);
                    $('.join').text("このイベントに参加する");
                    $('.participant').text("参加者一覧");


                    let zairyo = [];
                    let zairyoP = data[3];
                    let amountP = data[4];




//一人分算出
                    let halfamount = [];
                    for (let h = 0; h<data[4].length;h++){
                        if (data[4][h].includes("カップ")){
                            console.log(data[4][h]);
                            let num = data[4][h].replace("カップ","");
                            if(num.includes("/")){
                                let fnum = num.slice(0,1);
                                fnum = Number(fnum);
                                let snum = num.slice(2,3);
                                snum = Number(snum);
                                num = fnum/snum;
                                num = num/2;
                            }

                            if(num == 0.5){
                                num = "1/2";
                            }else if(num == 0.25){
                                num = "1/4";
                            }else if(num == 0.33){
                                num = "1/3";
                            }else if(num == 0.2){
                                num = "1/5";
                            }else if(num == 0.125){
                                num = "1/8";
                            }

                            halfamount.push(data[3][h]);
                            halfamount.push(num+"カップ");

                        }
                        if (data[4][h].includes("ｇ")){
                            console.log(data[4][h]);
                            let num = data[4][h].replace("ｇ","");
                            if(num.includes("缶")){
                                num = data[4][h]+"/2";
                                halfamount.push(data[3][h]);
                                halfamount.push(num);
                            }else{
                                num = num.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
                                    return String.fromCharCode(s.charCodeAt(0) - 65248);
                                });

                                num = num/2;

                                if(num == 0.5){
                                    num = "1/2";
                                }else if(num == 0.25){
                                    num = "1/4";
                                }else if(num == 0.33){
                                    num = "1/3";
                                }else if(num == 0.2){
                                    num = "1/5";
                                }else if(num == 0.125){
                                    num = "1/8";
                                }

                                halfamount.push(data[3][h]);
                                halfamount.push(num+"g");
                            }
                        }
                        if (data[4][h].includes("本")){
                            console.log(data[4][h]);
                            let num = data[4][h].replace("本","");
                            if(num.includes("/")){
                                let fnum = num.slice(0,1);
                                fnum = Number(fnum);
                                let snum = num.slice(2,3);
                                snum = Number(snum);
                                num = fnum/snum;
                                num = num/2;
                            }

                            if(num == 0.5){
                                num = "1/2";
                            }else if(num == 0.25){
                                num = "1/4";
                            }else if(num == 0.33){
                                num = "1/3";
                            }else if(num == 0.2){
                                num = "1/5";
                            }else if(num == 0.125){
                                num = "1/8";
                            }
                            halfamount.push(data[3][h]);
                            halfamount.push(num+"本");
                        }
                        if (data[4][h].includes("枚")){
                            console.log(data[4][h]);
                            let num = data[4][h].replace("枚","");
                            num = num.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
                                return String.fromCharCode(s.charCodeAt(0) - 65248);
                            });

                            num = Number(num);
                            num = num/2;

                            if(num == 0.5){
                                num = "1/2";
                            }else if(num == 0.25){
                                num = "1/4";
                            }else if(num == 0.33){
                                num = "1/3";
                            }else if(num == 0.2){
                                num = "1/5";
                            }else if(num == 0.125){
                                num = "1/8";
                            }


                            halfamount.push(data[3][h]);
                            halfamount.push(num+"枚");

                        }
                        if (data[4][h].includes("個")){
                            console.log(data[4][h]);
                            let num = data[4][h].replace("個","");
                            num = num.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
                                return String.fromCharCode(s.charCodeAt(0) - 65248);
                            });

                            if(num.includes("/")){
                                let fnum = num.slice(0,1);
                                fnum = Number(fnum);
                                let snum = num.slice(2,3);
                                snum = Number(snum);
                                num = fnum/snum;
                                num = num/2;
                            }

                            if(num == 0.5){
                                num = "1/2";
                            }else if(num == 0.25){
                                num = "1/4";
                            }else if(num == 0.33){
                                num = "1/3";
                            }else if(num == 0.2){
                                num = "1/5";
                            }else if(num == 0.125){
                                num = "1/8";
                            }

                            halfamount.push(data[3][h]);
                            halfamount.push(num+"個");

                        }
                    }

                    console.log(halfamount);
                    let halfinteg = [];
                    let halfamt = [];

                    for (let l = 0; l < halfamount.length; l+=2){
                        halfinteg.push(halfamount[l]);
                        halfamt.push(halfamount[l+1]);
                    }

                    console.log(halfinteg);
                    console.log(halfamt);



                    halfinteg = halfinteg.join("<br>");
                    halfamt = halfamt.join("<br>");



//-------------
                    $(".flexb").after()
                    $('.listinteg'+idNum).html(halfinteg);
                    $('.listamt'+idNum).html(halfamt);


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



                    let jugdeArray = 0;
                    //参加不可能なイベントのhead+iにdisplay:none
                    for(let r = 0; r<userf.length; r++){
                        for(let g = 0; g<zairyo.length; g++){
                            if(zairyo[g].includes(userf[r]) > 0){
                                jugdeArray++;
                                zairyoP[g] = "<div class = hisinteg></div><div class = hisinteg>"+zairyoP[g]+"(冷蔵庫に保存中です)</div>";
                        }
                        }
                    }
                        if(jugdeArray == 0){
                            $('#head'+idNum).css({"display": "none"});
                        }





                    let ingredient = zairyoP.join("<br>");
                    let amount = amountP.join("<br>");
                    let how = data[5].join("<br><br>");


                    //$('#p'+idNum+"_"+idNum2).html(mixArray[f][g]);
                    $('#p'+idNum).html("<div class = flexa><div class = miniblock><div class = centerT>調理時間</div><div class = whitebox1></div></div>"+"<div class = miniblock><div class = centerT>エネルギー</div><div class = whitebox2></div></div>"+"<div class = miniblock><div class = centerT>塩分</div><div class = whitebox3></div></div></div><p class = futari>材料２人分</p><div class = int_amt_flex><div class = ingredient>"+ingredient+"</div><div class = amount>"+amount+"</div></div><p class = futari>つくり方</p><p class = how>"+ how +"</p>");

                    $('#p'+idNum+" .whitebox1").text(data[2][0]);
                    $('#p'+idNum+" .whitebox2").text(data[2][1]);
                    $('#p'+idNum+" .whitebox3").text(data[2][2]);

                }
            });
        }
    }


    //==========外部サイトからレシピをスクレイピング==========//




    $(".have").on('click', function(){
        let a = $(this).attr("value");

        alert(a);
    });



        //モーダルウィンドウを出現させるクリックイベント
         function modal(){

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

        };

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





}

cook();
