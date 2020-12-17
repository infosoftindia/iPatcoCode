function readURL(input, output) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $(output).attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function readURLMultiple(input, output) {
  if (input.files) {
    $(output).html("");
    var count_file = input.files.length;
    $(".count_image").html(count_file + " files selected");
    var filesAmount = input.files.length;
    for (i = 0; i < filesAmount; i++) {
      var reader = new FileReader();
      reader.onload = function (event) {
        $($.parseHTML("<img>"))
          .attr("src", event.target.result)
          .appendTo(output)
          .addClass("col-md-4 col-lg-4 col-12 thumbnail-h-100");
      };
      reader.readAsDataURL(input.files[i]);
    }
  }
}

function show_Modal(url, output) {
  $.post(url, function (data) {
    $(output).html(data);
  });
}

function hitURLandPaste(event, url, output) {
  var input = $(event).val();
  $.get(url, { id: input }, function (data) {
    $(output).html(data);
  });
}


$("[data-href]").click(function () {
  var href = $(this).data("href");
  var title = $(this).data("title");
  $("#admin_model_title").html(title);
  $("#admin_model_body").html("");
  $.get(href, function (data) {
    $("#admin_model_body").html(data);
  });
});
