jq(function() {
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
            className: "text-center",
            "orderable": false,
            "targets": [4,6]
        }, {
            "visible": false,
            "targets": [7,8,9]
        }],
        "displayLength": 25,
        "language": {
            "emptyTable": "No Purchase Requests found",
            "zeroRecords": "No Purchase Requests matched the criteria"
        }
    });

    jq('#Project_Id').change(function(){
        jq('#queue-filter').keyup();
    });

    jq('#queue-filter').keyup(function(){
        var selct = (jq('#Project_Id').val() == "" ? "" : jq('#Project_Id :selected').text());

        jq('div.dataTables_filter input').val(jq(this).val() + " " + selct);
        jq('div.dataTables_filter input').keyup();
    });

    jq('#queue-table').on('click', 'a.redirect-link', function(){
        toastr.info('This Action is currently disabled.', 'Action disabled');
    });

    jq('i.get-queue').click(function(){
        GetPurchaseRequests();
    });

    jq('input.pickadate').change(function(){
        GetPurchaseRequests();
    });
});

function GetPurchaseRequests() {
    jq.ajax({
        dataType: "json",
        url: '/Finance/GetPurchaseRequests',
        data: {
            "start": jq("#start-date").val(),
            "ended": jq("#ended-date").val()
        },
        success: function(results) {
            tbl.clear().draw();
            
            jq.each(results, function(i, pr) {
                var apprvl = '<i class="feather ' + (pr.logisticsFlag.id == 0 ? "icon-minus" : (pr.logisticsFlag.id == 1 ? "icon-check success" : "icon-x danger")) + ' td-action"></i> ';
                apprvl += '<i class="feather ' + (pr.financeFlag.id == 0 ? "icon-minus" : (pr.financeFlag.id == 1 ? "icon-check success" : "icon-x danger")) + ' td-action"></i> ';
                apprvl += '<i class="feather ' + (pr.approvedFlag.id == 0 ? "icon-minus" : (pr.approvedFlag.id == 1 ? "icon-check success" : "icon-x danger")) + ' td-action"></i> ';

                var icons = '<a href="/finance/purchase-request/view?pr=' + pr.uuid + '"> <i class="feather icon-airplay td-action"></i></a> <a class="pointer redirect-link" data-idnt="' + pr.id + '"> <i class="feather icon-x danger td-action"></i></a>';

                tbl.row.add([
                    pr.date,
                    pr.id,
                    "<a class='blue-text' href='/projects/view?p=" + pr.project.uuid + "'>" + pr.project.name.toUpperCase() + "</a>",
                    pr.description.toUpperCase(),
                    apprvl,
                    pr.flag.name,
                    icons,
                    pr.project.parent.name,
                    pr.project.parent.donor.initials,
                    pr.project.parent.donor.name
                ]).draw(false);
            })
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        }
    }); 
}