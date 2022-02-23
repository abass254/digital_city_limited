String.prototype.toAccounting = function() {
    var str = parseFloat(this).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
    if (str.charAt(0) == '-') {
        return '(' + str.substring(1, 40) + ')';
    }
    else {
        return str;
    }
};

jq(function() {
    jq('button.btn-print').click(function(){
        window.print();
    });

    jq('li.edit-action').click(function(){
        window.location.href = "/administration/petty-cash/edit?pc=" + uuid;
    });

    jq('li.email-action').click(function(){
        toastr.error('Action to email the Petty Cash is currently not enabled.', "Email Failed");
    });

    /* Approvals */
    jq('#bt-approve').click(function(){
        var status = jq('#approval-form select.status').val();
        var notes = jq('#approval-form textarea.notes').val();

        if (status == ''){
            toastr.error('Kindly provide an option the Voucher status', "Verification Failed");
            return;
        }

        if (status > 1 && notes == ''){
            toastr.error('Kindly provide the reason for Voucher cancellation/rejection', "Verification Failed");
            return;
        }

        jq('#approval-form').submit();
    });

    /* Payments */
    jq('li.payment-action').click(function(){
        jq("table.payment-details tbody tr").each(function(i, row) {
            if (i == 0){
                jq(this).removeClass('hidden');
            }
            else{
                if (!jq(this).hasClass('hidden')){
                    jq(this).addClass('hidden');
                }
            }
            
            jq(this).find('td:eq(0) select').val(2);
            jq(this).find('td:eq(1) input').val('');
            jq(this).find('td:eq(2) input').val('');
            jq(this).find('td:eq(3) input').val('');
        });

        jq('#modal-payment').modal('show');
    });

    jq('table.payment-details tbody tr td').on('blur change', 'input.pd-amts', function(){
        var totals = 0;

        jq("table.payment-details tbody tr").not(".hidden").each(function(i, row) {
            var amnt = jq(this).find('td:eq(3) input').val().trim();            
            if (jq.isNumeric(amnt)) {
                totals += eval(amnt);
            }
        });

        jq('table.payment-details tfoot tr:eq(0) th:eq(2)').html(totals.toString().toAccounting());
    });

    jq('button.btn-payment-add-row').click(function(){
        if (jq('table.payment-details tbody tr.hidden').length > 0){
          jq('table.payment-details tbody tr.hidden:first').removeClass('hidden');
        }
        else {
          toastr.error('Failed to add rows. Maximum allowed rows have already been added.', 'Add Row failed');
        }
    });

    jq('#bt-payment').click(function(){
        var counts = 0;
        var totals = 0;

        jq("table.payment-details tbody tr").not(".hidden").each(function(i, row) {
            var mode = jq(this).find('td:eq(0) select').val();
            var refs = jq(this).find('td:eq(1) input').val().trim();
            var amnt = jq(this).find('td:eq(3) input').val().trim();
            
            if (mode != 2 && refs == ""){
                toastr.error('Reference number in row ' + eval(i+1) + ' cannot be blank', "Verification Failed");
                counts++;
            }
            
            if (!jq.isNumeric(amnt) || eval(amnt) <= 0){
                toastr.error('Invalid amount in row ' + eval(i+1) + '. Amount must be more than Zero', "Verification Failed");
                counts++;
            }
            else {
                totals += eval(amnt);
            }
        });

        if (totals != amts){
            toastr.error('Amount paid of $' + totals.toString().toAccounting() + ' cannot be more than Petty Cash Amount of $' + amts.toString().toAccounting(), "Verification Failed");
            counts++;
        }

        if (counts != 0){
            return false;
        }

        jq('#payment-form').submit();
    });
});
