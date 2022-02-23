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
  // Validate steps wizard & Show form
  var form = jq(".steps-validation").show();
  jq(".steps-validation").steps({
      headerTag: "h6",
      bodyTag: "fieldset",
      transitionEffect: "fade",
      titleTemplate: '<span class="step">#index#</span> #title#',
      labels: {
          finish: 'Submit'
      },
      onStepChanging: function (event, currentIndex, newIndex) {
          if (currentIndex > newIndex) {
              return true;
          }

          if (currentIndex ==1){
            GenerateStepsSummary();
          }
          
          if (currentIndex < newIndex) {
              form.find(".body:eq(" + newIndex + ") label.error").remove();
              form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
          }
          form.validate().settings.ignore = ":disabled,:hidden";
          return form.valid();
      },
      onFinishing: function (event, currentIndex) {
          form.validate().settings.ignore = ":disabled";
          return form.valid();
      },
      onFinished: function (event, currentIndex) {
          form.submit();
      }
  });
  
  // Initialize validation
  jq(".steps-validation").validate({
      ignore: 'input[type=hidden]', // ignore hidden fields
      errorClass: 'danger',
      successClass: 'success',
      highlight: function (element, errorClass) {
          jq(element).removeClass(errorClass);
      },
      unhighlight: function (element, errorClass) {
          jq(element).removeClass(errorClass);
      },
      errorPlacement: function (error, element) {
          error.insertAfter(element);
      },
      rules: {
          email: {
              email: true
          }
      }
  });

  jq('.pickadate').pickadate({
    format: 'dd/mm/yyyy'
  });

  jq('#Subs_Parent_Donor_Id').change(function(){
    GetDonorProjects();
  });

  jq('#Subs_Parent_Id').change(function(){
    GetProjectSubs();
    GetProjectGrants();
  });  
  
  jq('#Subs_Id').change(function(){
    GetProjectObjectives();
  });

  jq('select.objective-code').change(function(){
    var idnt = jq(this).val();
    var account = jq(this).closest('tr').find('select.account-code');

    account.find('option').remove();
    account.append('<option value="">Loading..</option>');
  
    jq.ajax({
      dataType: "json",
      url: '/Finance/GetProjectAccounts',
      data: {
          "idnt": idnt
      },
      success: function(results) {
        account.find('option').remove();
  
        jq.each(results, function(i, opt) {
          account.append('<option value="' + opt.value + '">' + opt.text + '</option>');
        });
      },
      error: function(xhr, ajaxOptions, thrownError) {
          console.log(xhr.status);
          console.log(thrownError);
      }
    });
  });

  jq('input.req-qnty, input.req-cost').change(function(){
    var qnty = jq(this).closest('tr').find('input.req-qnty').val();
    var cost = jq(this).closest('tr').find('input.req-cost').val();

    var amts = eval(qnty)*eval(cost);
    jq(this).closest('tr').find('input.req-amts').val(amts.toString().toAccounting());
  });

  jq('form').submit( function(event) {
    toastr.success('Successfully posted Purchase Request.', 'PR Added');
  }); 
});

function GetDonorProjects() {
  var main = jq('#Subs_Parent_Id');
  var subs = jq('#Subs_Id');
  var idnt = jq('#Subs_Parent_Donor_Id').val();

  main.find('option').remove();
  subs.find('option').remove();

  if (idnt == ""){
    main.append('<option value="">MAIN PROJECT</option>');
    subs.append('<option value="">SUB PROJECT</option>');

    return;
  }

  main.append('<option value="">Loading..</option>');
  subs.append('<option value="">Loading..</option>');

  jq.ajax({
      dataType: "json",
      url: '/Finance/GetDonorProjects',
      data: {
          "idnt": idnt
      },
      success: function(results) {
        main.find('option').remove();
        subs.find('option').remove();
        
        main.append('<option value="">MAIN PROJECT</option>');
        subs.append('<option value="">SUB PROJECT</option>');

        jq.each(results, function(i, opt) {
          main.append('<option value="' + opt.value + '">' + opt.text + '</option>');
        });
      },
      error: function(xhr, ajaxOptions, thrownError) {
          console.log(xhr.status);
          console.log(thrownError);
      }
  }); 
}

function GetProjectSubs() {
  var subs = jq('#Subs_Id');
  var idnt = jq('#Subs_Parent_Id').val();

  subs.find('option').remove();

  if (idnt == ""){
    subs.append('<option value="">SUB PROJECT</option>');
    return;
  }
  else {
    subs.append('<option value="">Loading..</option>');
  }

  jq.ajax({
      dataType: "json",
      url: '/Finance/GetProjectSubs',
      data: {
          "idnt": idnt
      },
      success: function(results) {
        subs.find('option').remove();
        subs.append('<option value="">SUB PROJECT</option>');

        jq.each(results, function(i, opt) {
          subs.append('<option value="' + opt.value + '">' + opt.text + '</option>');
        });
      },
      error: function(xhr, ajaxOptions, thrownError) {
          console.log(xhr.status);
          console.log(thrownError);
      }
  }); 
}

function GetProjectGrants() {
  var idnt = jq('#Subs_Parent_Id').val();
  var grants = jq('select.grant-code');

  grants.find('option').remove();

  if (idnt == ""){
    grants.append('<option value="">SELECT</option>');
    return;
  }
  else {
    grants.append('<option value="">Loading..</option>');
  }

  jq.ajax({
    dataType: "json",
    url: '/Finance/GetProjectGrants',
    data: {
        "idnt": idnt
    },
    success: function(results) {
      grants.find('option').remove();

      jq.each(results, function(i, opt) {
        grants.append('<option value="' + opt.value + '">' + opt.text + '</option>');
      });
    },
    error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
    }
  });
}

function GetProjectObjectives() {
  var idnt = jq('#Subs_Id').val();
  var projects = jq('select.objective-code');

  projects.find('option').remove();

  if (idnt == ""){
    projects.append('<option value="">SELECT</option>');
    return;
  }
  else {
    projects.append('<option value="">Loading..</option>');
  }

  jq.ajax({
    dataType: "json",
    url: '/Finance/GetProjectObjectives',
    data: {
        "idnt": idnt
    },
    success: function(results) {
      projects.find('option').remove();
      projects.append('<option value="">SELECT</option>');

      jq.each(results, function(i, opt) {
        projects.append('<option value="' + opt.value + '">' + opt.text + '</option>');
      });
    },
    error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
    }
  });
}

function GenerateStepsSummary(){
  jq('div.donor-summary span').text(jq('#Subs_Parent_Donor_Id :selected').text());
  jq('div.date-summary span').text(jq('#Request_Date').val());
  
  if (jq('#Request_Site').val().trim() == ""){
    jq('#Request_Site').val("GAALK/HQ")
  }

  jq('div.site-summary span').text(jq('#Request_Site').val());
  
  var tbody = jq('table.table-summary tbody');
  tbody.empty();

  jq('table.table-details tbody tr').not( ".hidden" ).each(function (i, row) {
    if (jq(this).find('td:eq(0) input').val().trim() == ''){
      return false;
    }

    var project = jq(this).find('td:eq(6) select').val();
    var account = jq(this).find('td:eq(7) select').val();
    var grantts = jq(this).find('td:eq(8) select').val();

    project = (project == "" ? "N/A" : jq(this).find('td:eq(6) select :selected').text().split(" ")[0].trim());
    account = (account == "" ? "N/A" : jq(this).find('td:eq(7) select :selected').text().split(" ")[0].trim());
    grantts = (grantts == "" ? "N/A" : jq(this).find('td:eq(8) select :selected').text().trim());

    var rows = '<tr><th>' + eval(i+1) + '</th>';
    rows += '<td>' + jq(this).find('td:eq(0) input').val().trim().toUpperCase() + '</td>';
    rows += '<td>' + jq(this).find('td:eq(1) input').val() + ' ' + jq(this).find('td:eq(2) input').val().trim().toUpperCase() + '</td>';
    rows += '<td>' + jq(this).find('td:eq(3) input').val().trim() + '</td>';
    rows += '<td>' + jq(this).find('td:eq(4) input').val().trim() + '</td>';
    rows += '<td>' + jq(this).find('td:eq(5) input').val().trim() + '</td>';
    rows += '<td>' + project + '</td>';
    rows += '<td>' + account + '</td>';
    rows += '<td>' + grantts + '</td>';
    rows += '</tr>'

    tbody.append(rows);
  });
}

function ValidatePurchaseRequestForm(){
  var error = false;

  if (jq('table.table-summary tbody tr').length == 0){
    toastr.error('No items description specified.', 'Verification failed');
    error = true;
    return false;
  }

  jq('table.table-summary tbody tr').each(function (i, row) {
    if (jq(this).find('td:eq(5)').text().trim() == 'N/A' || jq(this).find('td:eq(6)').text().trim() == 'N/A' || jq(this).find('td:eq(6)').text().trim() == ''){
      error = true;
      return false;
    }
  });
  
  if (error){
    toastr.error('Ensure project code and account are selected propoerly', 'Verification failed');
    return false;
  }

  return true;
}
