$(document).on("click",".item_modal",(e)=>{
            $("#item_modal").modal();
            $(".save_text").html("保存");
            let item_id = e.target.id;
            $('input[name="item_id"]').val(item_id);

            $.ajax({
            url:"./item_info_modal.php",
            method:"post",
            data:{
                item_id:item_id
            }
            }).done((data)=>{

                let item_obj = JSON.parse(data);
                console.log(item_obj);
                $(".edit_item_src").attr("src",item_obj["url"]);
                $(".edit_item_name").val(item_obj["item_name"]);
                $(".item_category").val(item_obj["category"]);
                $(".indate").val(item_obj["indate"]);
                $(".end_date").val(item_obj["end_date"]);

            });

        });
$(document).on("click","#save_iteminfo",()=>{

    $(".save_text").html("保存完了しました。");
     let item_id = $('input[name="item_id"]').val();
     let edit_item_name=$('input[name="edit_item_name"]').val();
     // let user_email=$('input[name="edit_user_email"]').val();
     let edit_item_src=$('.edit_item_src').attr("src");
     let item_category=$('input[name="item_category"]').val();
     let indate=$('input[name="indate"]').val();
     let end_date=$('input[name="end_date"]').val();
     console.log(item_id);
     console.log(item_category);
    $.ajax({
        url:"./item_update.php",
        method:"post",
        data:{
            item_id:item_id,
            edit_item_name:edit_item_name,
            edit_item_src:edit_item_src,
            item_category:item_category,
            indate:indate,
            end_date:end_date
        }
    }).done((data)=>{
        console.log("done");
        console.log(data);
        $.ajax({
            url:"item_list.php",
            method:"post",
            data:{
                item_id:item_id
            }
        }).done((data)=>{
            console.log(data);
            $("#item_list").html(data);
        });
    });
});