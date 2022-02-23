jq(function() {
    if (message != ""){
        setTimeout(
            function() {
                toastr.error(message, 'Login Error');
            },
        500);
    }

    if (change == 1) {
        toastr.info('You are required to change your password before you continue', 'Authentication');

        setTimeout(
          function() {
            jq('#changepwd').modal('show')
          },
        500);
    }

    jq('#bt-change-pwd').click(function(){
        if (jq('#TypePass').val() != jq('#ConfirmPass').val()){
            toastr.error('Your new passwords do not match. Try again', 'Authentication');
            return;
        }

        if (jq('#OldPass').val() == jq('#TypePass').val()){
            toastr.error('Your new password can not be the same as the old password. Try again', 'Authentication');
            return;
        }

        var pass = jq('#TypePass').val();

        var strength = 1;
        var arr = [/.{5,}/, /[a-z]+/, /[0-9]+/, /[A-Z]+/];
        jQuery.map(arr, function(regexp) {
          if(pass.match(regexp))
             strength++;
        });

        if (strength < 4){
            toastr.error('Specified password is weak and can be easily bypassed. Try another', 'Authentication');
            return;
        }

        jq('#Password').val(jq('#TypePass').val());
        jq('#User_Password').val(jq('#OldPass').val());

        jq("form").submit();
    });
});