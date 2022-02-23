jq(function() {
    tbl = $("#queue-table").DataTable({
        responsive: true,
        "order": [[ 3, "asc" ]],
        'columnDefs': [{
            "orderable": false,
            "targets": [0],
            "visible": false
        }, {
            className: "text-center",
            "orderable": false,
            "targets": [1],
        }, {
            className: "dt-nowrap", 
            "targets": [2]
        }, {
            className: "dt-nowrap", 
            "targets": [3]
        }, {
            className: "text-center",
            "orderable": false,
            "targets": [4]
        }, {
            className: "dt-nowrap", 
            "targets": [8]
        }],
        "displayLength": 25,
        "language": {
            "emptyTable": "No Petty Cash found",
            "zeroRecords": "No Petty Cash matched the criteria"
        }
    });

    jq('#search-form select').change(function(){
        jq('#queue-filter').keyup();
    });

    jq('#queue-filter').keyup(function(){
        var roles = (jq('select.roles').val() == "" ? "" : jq('select.roles :selected').text().trim());
        var stats = (jq('select.stats').val() == "" ? "" : jq('select.stats :selected').text().trim());
        var depts = (jq('select.depts').val() == "" ? "" : jq('select.depts :selected').text().trim());

        jq('div.dataTables_filter input').val(jq(this).val() + " " + roles + " " + stats + " " + depts);
        jq('div.dataTables_filter input').keyup();
    });

    jq('#queue-table').on('click', 'a.redirect-link', function(){
        toastr.info('This Action is currently disabled.', 'Action disabled');
    });

    jq('#queue-table').on('click', 'a.inline-filter-text', function(){
        jq('#queue-filter').val(jq(this).html().trim()).keyup();
    });
});