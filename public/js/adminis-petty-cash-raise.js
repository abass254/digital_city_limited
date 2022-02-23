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
  jq('.pickadate').pickadate({
    format: 'dd/mm/yyyy'
  });

  jq('input.pc-amts').change(function(){
    var total = 0.0;
    jq('table.petty-cash-details tbody tr').not('.hidden').each(function(index, tr) {
      var amt = jq(this).find('input.pc-amts').val().trim();
      if (jq.isNumeric(amt)){
        total += parseFloat(amt);
      }
    });

    jq('table.petty-cash-details tfoot tr th:eq(2)').html(total.toString().toAccounting());
  });

  jq('button.btn-add-row').click(function(){
    if (jq('table.petty-cash-details tbody tr.hidden').length > 0){
      jq('table.petty-cash-details tbody tr.hidden:first').removeClass('hidden');
    }
    else {
      toastr.info('Failed to add rows. Maximum allowd rows already added.', 'Add Row failed');
    }
  });

  jq('form').submit( function(event) {
    toastr.success('Posting the petty cash transaction..', 'Save');
  }); 
});

function ValidatePettyCashForm(){
  var error = false;

  jq('input.validate.required').filter(function() { return !this.value; }).addClass("form-error");
  jq('input.validate.required').filter(function() { return this.value; }).removeClass("form-error");

  if (jq('input.validate.required').filter(function() { return !this.value; }).length > 0){
    toastr.error('Ensure the Date and the Name of the Receiver are filled properly.', 'Verification failed');
    error = true;
    return false;
  }

  if (!parseFloat(jq('table.petty-cash-details tfoot tr th:eq(2)').html().replace(',',''))>0){
    toastr.error('No items description specified.', 'Verification failed');
    error = true;
    return false;
  }

  jq('table.petty-cash-details tbody tr').not('.hidden').each(function (i, row) {
    var descr = jq(this).find('input.pc-desc').val().trim();
    var amnts = jq(this).find('input.pc-amts').val().trim();

    if (descr == "" && amnts == 0){}
    else if (!(descr.length > 0 && parseFloat(amnts) > 0)){
      error = true;
      return false;
    }
  });
  
  if (error){
    toastr.error('Ensure description and corresponding amount have been filled propoerly', 'Verification failed');
    return false;
  }

  return true;
}
