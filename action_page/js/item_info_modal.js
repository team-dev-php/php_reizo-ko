$(document).on("click",".item_modal",()=>{
            $("#item_modal").modal();
            // $(".save_text").html("保存");
            let item_id = $(this).attr('id');
            // $(document).ready(function() { // documentのロード完了後に
            //   $('').each(function() { // #hogeがあれば
            //     console.log($(this));      // 情報表示
            //   });
            // });

            console.log(item_id);
            $.ajax({
            url:"./item_info_modal.php",
            method:"post",
            data:{
                item_id:item_id
            }
            }).done((data)=>{
                // グラフ作成用オブジェクトデータ取得
                console.log(JSON.parse(data));
                

            });

        });
        // $("#profile_save").on("click",()=>{
        //     console.log("cliked");
        //     console.log($('#edit_img_src').val());

        //     $(".save_text").html("保存完了しました。");
        //      let user_id = $('input[name="user_id"]').val();
        //      let user_nickname=$('input[name="edit_user_name"]').val();
        //      // let user_email=$('input[name="edit_user_email"]').val();
        //      let icon=$('#edit_img_src').val();
        //      let favorite_dish=$('input[name="favorite_dish"]').val();
        //      let belong_to=$('input[name="belong_to"]').val();
        //      let address=$('input[name="address"]').val();
        //      // console.log(user_nickname);
        //      // console.log(user_id);
        //     $.ajax({
        //         url:"./profile_edit.php",
        //         method:"post",
        //         data:{
        //             user_id:user_id,
        //             user_nickname:user_nickname,
        //             // user_email:$('input[name="edit_user_email"]').val(),
        //             icon:$('#edit_img_src').val(),
        //             favorite_dish:$('input[name="favorite_dish"]').val(),
        //             belong_to:$('input[name="belong_to"]').val(),
        //             address:$('input[name="address"]').val()
                   
        //         }
        //     }).done((data)=>{
        //         console.log("done");
        //         $(".update_name").html(user_nickname);
        //         // $(".update_email").html(user_email);
        //         $(".user_icon").attr("src",icon);
        //         $(".update_favorite_dish").html(favorite_dish);
        //         $(".update_belong_to").html(belong_to);
        //         $(".update_address").html(address);
        //         $(".edit_user_name").html(user_nickname);

        //         // alert("保存完了しました。");
        //     });
        // });