$(document).ready(function() {
  "use strict"
  // init list view datatable
  var dataListView = $(".data-list-view").DataTable({
    responsive: false,
    columnDefs: [
      {
        orderable: true,
        targets: 0,
        checkboxes: { selectRow: true }
      }
    ],
    dom:
      '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
    oLanguage: {
      sLengthMenu: "_MENU_",
      sSearch: ""
    },
    aLengthMenu: [[10, 15, 20, 100], [10, 15, 20, 100]],
    select: {
      style: "multi"
    },
    order: [[1, "asc"]],
    bInfo: false,
    pageLength: 10,
    buttons: [
      {
        text: "<i class='feather icon-plus'></i> Add Project",
        action: function() {
          $(this).removeClass("btn-secondary");
          $(".add-new-data").addClass("show");
          $(".overlay-bg").addClass("show");
          $("#donor-idnt").val(0);
          $("#donor-name,#donor-initial,#donor-address,#donor-icon,#donor-notes").val("");
        },
        className: "btn-outline-primary boxed-shadow"
      }
    ],
    initComplete: function(settings, json) {
      $(".dt-buttons .btn").removeClass("btn-secondary")
    }
  });

  dataListView.on('draw.dt', function(){
    setTimeout(function(){
      if (navigator.userAgent.indexOf("Mac OS X") != -1) {
        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
      }
    }, 50);
  });

  // To append actions dropdown before add new button
  var actionDropdown = $(".actions-dropodown")
  actionDropdown.insertBefore($(".top .actions .dt-buttons"))


  // Scrollbar
  if ($(".data-items").length > 0) {
    new PerfectScrollbar(".data-items", { wheelPropagation: false })
  }

  // Close sidebar
  $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
    $(".add-new-data").removeClass("show")
    $(".overlay-bg").removeClass("show")
    $("#data-name, #data-price").val("")
    $("#data-category, #data-status").prop("selectedIndex", 0)
  })

  // On Edit
  $('.action-edit').on("click",function(e){
    e.stopPropagation();
    var uuid = jq(this).data('uuid');

    $("#donor-name,#donor-initial,#donor-address,#donor-icon,#donor-notes").val("");
    jq.ajax({
      dataType: "json",
      url: '/Projects/GetDonor',
      data: {
          "uuid": uuid
      },
      success: function(result) {
        $("#donor-idnt").val(result.id);
        $("#donor-name").val(result.name);
        $("#donor-initial").val(result.initials);
        $("#donor-address").val(result.address);
        $("#donor-icon").val(result.icon);
        $("#donor-notes").val(result.notes);

        $(".add-new-data").addClass("show");
        $(".overlay-bg").addClass("show");
      },
      error: function(xhr, ajaxOptions, thrownError) {
          console.log(xhr.status);
          console.log(thrownError);
      },
      complete: function() {
          //nothing todo
      }
    }); 
  });

  // On View
  $('.action-view').on("click", function(e){
    e.stopPropagation();
    window.location.href = "/projects/main/view?p=" + jq(this).data('uuid');
  });

  // On Delete
  $('.action-delete').on("click", function(e){
    e.stopPropagation();
    $(this).closest('td').parent('tr').fadeOut();
  });

  // No Action Last TD
  $('table.data-list-view tbody td:last-child').on("click", function(e){
    e.stopPropagation();
  });

  //On Save
  $('button.btn-save-donor').click(function(){
    //Submit Form
  });

  // mac chrome checkbox fix
  if (navigator.userAgent.indexOf("Mac OS X") != -1) {
    $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
  }
});