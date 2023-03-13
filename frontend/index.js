$(document).ready(function () {
  // toggle read more
  $("#readmore").click(function (e) {
    e.preventDefault();
    $("#show_readmore").slideToggle();
  });
  $("#readmore_b").change(function () {
    if (this.checked) {
      $("#readmore_bb").modal("show");
    } else {
      $("#readmore_bb").modal("hide");
    }
  });
  // career
  $("#morecheck").click(function () {
    $("#morecareer").css("display", "block");
  });

  $("#career1").click(function () {
    $("#morecareer").css("display", "none");
  });
  $("#career2").click(function () {
    $("#morecareer").css("display", "none");
  });
  $("#career3").click(function () {
    $("#morecareer").css("display", "none");
  });
  // program
  $("#file1").click(function () {
    if (this.checked) {
      $("#file2").attr("disabled", true);
      $("#file3").attr("disabled", true);
    } else {
      $("#file2").removeAttr("disabled");
      $("#file3").removeAttr("disabled");
    }
  });
  $("#file2").click(function () {
    if (this.checked) {
      $("#file1").attr("disabled", true);
      $("#file3").attr("disabled", true);
    } else {
      $("#file1").removeAttr("disabled");
      $("#file3").removeAttr("disabled");
    }
  });
  $("#file3").click(function () {
    if (this.checked) {
      $("#file1").attr("disabled", true);
      $("#file2").attr("disabled", true);
    } else {
      $("#file1").removeAttr("disabled");
      $("#file2").removeAttr("disabled");
    }
  });
});
