$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "../gettemplatedata.php", //the script to call to get data
    dataType: "json",
    success: function (
      data //on recieve of reply
    ) {
      // console.log(data.length);
      // console.log(data);
      for (let index = 0; index < data.length; index++) {
        i = index + 1;
        $("#templatetable tbody").append(
          '<tr><th scope="row">' +
            i +
            "</th><td>" +
            data[index].template_name +
            "</td><td>" +
            data[index].template_body_text +
            '</td><td><!--<button type="button" class="btn btn-primary m-2"><i class="fa fa-eye"></i></button><button type="button" class="btn btn-success m-2"><i class="fa fa-edit"></i></button>--><button type="button" class="btn btn-danger m-2"><i class="fa fa-trash"></i></button></td></tr>'
        );
      }
    },
    error: function (er) {
      console.log(er);
      console.log(er.responseText);
    },
  });

  $.ajax({
    type: "POST",
    url: "../getdomaindata.php", //the script to call to get data
    dataType: "json",
    success: function (
      data //on recieve of reply
    ) {
      // console.log(data.length);
      // console.log(data);
      // console.log(data[0].domains);
      for (let index = 0; index < data.length; index++) {
        i = index + 1;
        $("#domaintable tbody").append(
          '<tr><th scope="row">' +
            i +
            "</th><td>" +
            data[index].domains +
            '</td><td><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></td><tr>'
        );
      }
    },
    error: function (er) {
      console.log(er);
      console.log(er.responseText);
    },
  });

  $("#adddomain").click(function() {
    domain = $("#domain").val();
    if (domain == "") {
      $("#domain").addClass("is-invalid");
      $("#msgd").addClass("invalid-feedback");
      $("#msgd").html('Enter domomain');
    } else {
      $("#domain").removeClass("is-invalid");
      $("#msgd").removeClass("invalid-feedback");
      $("#domain").addClass("is-valid");
      $("#msgd").addClass("valid-feedback");
      $("#msgd").html('Looks Good!');
      $.ajax({
        type: "POST",
        url: "adddomain.php", //the script to call to get data
        dataType: "json",
        data: {
          domain: domain
      },
        success: function (
          data //on recieve of reply
        ) {
          console.log(data);
        },
        error: function (er) {
          console.log(er);
          console.log(er.responseText);
        },
      });
    }
  });

  $("#addtemplate").click(function() {
    templatename = $("#templatename").val();
    templatebody = $("#templatebody").val();
    $.ajax({
      type: "POST",
      url: "addtemplate.php", //the script to call to get data
      dataType: "json",
      data: {
        templatename: templatename,
        templatebody: templatebody
    },
      success: function (
        data //on recieve of reply
      ) {
        console.log(data);
      },
      error: function (er) {
        console.log(er);
        console.log(er.responseText);
      },
    });
  });
});
