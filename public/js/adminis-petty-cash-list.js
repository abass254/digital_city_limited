String.prototype.toAccounting = function() {
    var str =  parseFloat(this).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
  
    if (str.charAt(0) == '-'){
        return '(' + str.substring(1,40) + ')';
    }
    else {
        return str;
    }
  };

jq(function() {
    if (message != ""){
        setTimeout(
            function() {
              toastr.error('Failed to load the specified petty cash voucher.', 'Load Failed');
            },
        1000);
    }

    jq('.pickadate').pickadate({
        format: 'dd/mm/yyyy'
    });

    tbl = $("#queue-table").DataTable({
        responsive: true,
        "order": [[ 1, "desc" ]],
        'columnDefs': [{
            "orderable": false,
            "targets": [0]
        }, {
            className: "dt-nowrap", 
            "targets": [2]
        }, {
            className: "text-center p-0 pt-50",
            "targets": [4]
        }, {
            className: "text-right",
            "targets": [5]
        }, {
            className: "text-right dt-nowrap",
            "orderable": false,
            "targets": [6]
        }],
        "displayLength": 25,
        "language": {
            "emptyTable": "No Petty Cash found",
            "zeroRecords": "No Petty Cash matched the criteria"
        }
    });

    jq('#flags').change(function(){
        jq('#queue-filter').keyup();
    });

    jq('#queue-filter').keyup(function(){
        var selct = (jq('#flags').val() == "" ? "" : jq('#flags :selected').text());

        jq('div.dataTables_filter input').val(jq(this).val() + " " + selct);
        jq('div.dataTables_filter input').keyup();
    });

    jq('#queue-table').on('click', 'a.redirect-link', function(){
        toastr.info('This Action is currently disabled.', 'Action disabled');
    });

    jq('#queue-table').on('click', 'a.inline-filter-text', function(){
        jq('#queue-filter').val(jq(this).html().trim()).keyup();
    });

    jq('i.get-queue').click(function(){
        GetPettyCash();
    });

    jq('input.pickadate').change(function(){
        GetPettyCash();
    });

    /* Add Petty Cash */
    jq('a.btn-add-petty-cash').click(function(){
        jq("table.petty-cash-details tbody tr").each(function(i, row) {
            if (i <= 2){
                jq(this).removeClass('hidden');
            }
            else{
                if (!jq(this).hasClass('hidden')){
                    jq(this).addClass('hidden');
                }
            }
            
            jq(this).find('td:eq(0) input').val('');
            jq(this).find('td:eq(1) input').val('');
        });

        jq('#modal-add-petty-cash').modal('show');
    });

    jq('button.btn-petty-cash-add-row').click(function(){
        if (jq('table.petty-cash-details tbody tr.hidden').length > 0){
          jq('table.petty-cash-details tbody tr.hidden:first').removeClass('hidden');
        }
        else {
          toastr.error('Failed to add rows. Maximum allowed rows have already been added.', 'Add Row failed');
        }
    });

    jq('table.petty-cash-details tbody tr td').on('blur change', 'input.pc-amts', function(){
        var totals = 0;

        jq("table.petty-cash-details tbody tr").not(".hidden").each(function(i, row) {
            var amnt = jq(this).find('td:eq(1) input').val().trim();            
            if (jq.isNumeric(amnt)) {
                totals += eval(amnt);
            }
        });

        jq('table.petty-cash-details tfoot tr:eq(0) th:eq(2)').html(totals.toString().toAccounting());
    });

    jq('#bt-add-petty-cash').click(function(){
        var counts = 0;
        var totals = jq('table.petty-cash-details tfoot tr:eq(0) th:eq(2)').html().replace(',','').trim();
        
        if (jq('#pettycash-add-form input#PettyCash_Receiver').val() == ""){
            toastr.error('The name of the receiver/payee can not be blank', "Verification Failed");
            return;
        }

        if (!(jq.isNumeric(totals) && eval(totals) > 0)){
            toastr.error('Invalid running totals for Petty Cash', "Verification Failed");
            return;
        }

        jq("table.petty-cash-details tbody tr").not(".hidden").each(function(i, row) {
            var desc = jq(this).find('td:eq(0) input').val().trim();
            var amnt = jq(this).find('td:eq(1) input').val().trim();

            if (desc == "" && amnt != ""){
                toastr.error('The description in row ' + eval(i+1) + ' invalid. Description can not be blank', "Verification Failed");
                counts++;
            }
            
            if ((!jq.isNumeric(amnt) || eval(amnt) <= 0) && desc != ""){
                toastr.error('Invalid amount in row ' + eval(i+1) + '. Amount must be more than Zero', "Verification Failed");
                counts++;
            }
        });

        if (counts != 0){
            return false;
        }

        jq('#pettycash-add-form').submit();
    });
});

function GetPettyCash() {
    jq.ajax({
        dataType: "json",
        url: '/Administration/GetPettyCash',
        data: {
            "start": jq("#start-date").val(),
            "ended": jq("#ended-date").val()
        },
        success: function(results) {
            tbl.clear().draw();
            
            jq.each(results, function(i, pc) {
                var icons = '<a href="/administration/petty-cash/view?pc=' + pc.uuid + '"> <i class="feather icon-airplay td-action"></i></a> <a class="pointer redirect-link" data-uuid="' + pc.uuid + '"> <i class="feather icon-x danger td-action"></i></a>';
                var stats = '<div class="chip chip-' + (pc.flag.id == 0 ? "light" : (pc.flag.id == 1 ? "success" : (pc.flag.id == 2 ? "danger" : "warning"))) + '"><div class="chip-body"><div class="chip-text">' + (pc.dispenseOn == null ? pc.flag.name.toUpperCase() : 'DISBURSED') + '</div></div></div>';

                if (canEdit == true && pc.flag.id == 0){
                    icons = '<a href="/administration/petty-cash/edit?pc=' + pc.uuid + '"> <i class="feather icon-edit-1 dark td-action"></i></a> ' + icons;
                }

                tbl.row.add([
                    pc.date,
                    pc.id,
                    "<a class='inline-filter-text' href='#'>" + pc.receiver.toUpperCase() + "</a>",
                    pc.description,
                    stats,
                    pc.amount.toString().toAccounting(),
                    icons
                ]).draw(false);
            })
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        }
    }); 
}