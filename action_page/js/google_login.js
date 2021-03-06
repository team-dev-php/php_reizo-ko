      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
        $("#signin_btn").css("display","none");
        $("#user-name").html("<h3>Hello "+profile.getGivenName()+"</h3>");
        $("input[name='user_name']").val(profile.getName());
        $("input[name='user_email']").val(profile.getEmail());
        // $("#connected4o1hzjnrynxt").html(profile.getName()+"さんこんちは");
        $.ajax({
            url:"./logincheck.php",
            method:"post",
            data:{
                user_name:profile.getName(),
                user_email:profile.getEmail(),
                icon:profile.getImageUrl()
            }
          }).done(()=>{
            console.log("proflie情報をSession変数に代入完了!");
            // var url = window.location.href;
            // url = url.replace("login.php","");
            // window.location.href = url + "/mypage.php";
          });
      };