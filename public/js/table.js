$(document).ready(function() {
  $("#QCtblsearch").keyup(function() {
    search_QCtable($(this).val());
  });

  function search_QCtable(value) {
    // The Choice of Searching
    var selected = $("#choice")
      .children("option:selected")
      .val();
    var selection;
    if (selected == "empname") selection = 1;
    if (selected == "dept") selection = 5;
    if (selected == "empid") selection = 2;
    // Chech if there is data
    $("#Display tr").each(function() {
      var found = "false";
      var x = $(this).find("td:eq(" + selection + ")");
      // Check the Lower Case letters
      if (
        x
          .text()
          .toLowerCase()
          .indexOf(value.toLowerCase()) >= 0
      ) {
        found = "true";
      }
      if (found == "true") {
        $(this).show();
      } else {
        $(this).hide();
        $("#must").show();
      }
    });
  }
});
