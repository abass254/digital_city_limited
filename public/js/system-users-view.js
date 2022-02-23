jq(function() {
    jq('button.enable-permissions').click(function(){
        jq('button.enable-permissions').prop('disabled', true);
        jq('button.cancel-permissions').prop('disabled', false);
        jq('button.save-permissions').prop('disabled', false);
        jq('table.users-permission input').prop('disabled', false);
    });

    jq('button.cancel-permissions').click(function(){
        jq('button.enable-permissions').prop('disabled', false);
        jq('button.cancel-permissions').prop('disabled', true);
        jq('button.save-permissions').prop('disabled', true);
        jq('table.users-permission input').prop('disabled', true);
    });

    jq('button.save-permissions').click(function(){
        jq('#permissions-form').submit();
    });
});