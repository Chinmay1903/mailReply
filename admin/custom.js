$(document).ready(function () {
  templatedata();
  domaindata();
  addtemplatelist();

  function templatedata() {
    $("#templatetable > tbody").empty();
    $.ajax({
      type: "POST",
      url: "../gettemplatedata.php", //the script to call to get data
      dataType: "json",
      success: function (
        data //on recieve of reply
      ) {
        // console.log(data.length);
        console.log(data);
        for (let index = 0; index < data.length; index++) {
          i = index + 1;
          $("#templatetable tbody").append(
            '<tr><th scope="row">' +
              i +
              '</th><td id="tempname">' +
              data[index].template_name +
              '</th><td id="tempversion">' +
              data[index].template_verson +
              '</td><td id="tempbody">' +
              data[index].template_body_text +
              '</td><td><!--<button type="button" class="btn btn-primary m-2"><i class="fa fa-eye"></i></button>--><button id="tempedit" type="button" class="btn btn-success m-2" data-toggle="modal"data-target="#edittemplateModal"><i class="fa fa-edit"></i></button><button id="tempdelete" type="button" class=" btn btn-danger m-2"><i class="fa fa-trash"></i></button></td></tr>'
          );
        }
      },
      error: function (er) {
        console.log(er);
        console.log(er.responseText);
      },
    });
  }

  function domaindata() {
    $("#domaintable > tbody").empty();
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
              '</th><td id="domainname">' +
              data[index].domains +
              '</td><td><button id="domainedit" type="button" class="btn btn-success m-2" data-toggle="modal"data-target="#editdomainModal" ><i class="fa fa-edit"></i></button><button type="button" id="domaindelete" class="btn btn-danger"><i class="fa fa-trash"></i></button></td><tr>'
          );
        }
      },
      error: function (er) {
        console.log(er);
        console.log(er.responseText);
      },
    });
  }

  $("#adddomain").click(function () {
    $("#domainalert").removeClass("show");
    domain = $("#domain").val();
    if (domain == "") {
      $("#domain").addClass("is-invalid");
      $("#msgd").addClass("invalid-feedback");
      $("#msgd").html("Enter domomain");
    } else {
      $("#domain").removeClass("is-invalid");
      $("#msgd").removeClass("invalid-feedback");
      $("#domain").addClass("is-valid");
      $("#msgd").addClass("valid-feedback");
      $("#msgd").html("Looks Good!");
      $.ajax({
        type: "POST",
        url: "adddomain.php", //the script to call to get data
        dataType: "json",
        data: {
          domain: domain,
        },
        success: function (
          data //on recieve of reply
        ) {
          console.log(data);
          $("#domain").removeClass("is-valid");
          $("#msgd").removeClass("valid-feedback");
          $("#msgd").html("");
          $("#domain").val("");
          $("#adddomainModal").modal("hide");
          domaindata();
        },
        error: function (er) {
          console.log(er);
          console.log(er.responseText);
        },
      });
    }
  });

  function addtemplatelist() {
    $("#templatenamelist").empty();
    // $("#templatename").append("<option value=''>Choose Template Name...</option>");
    $.ajax({
      type: "POST",
      url: "../gettemplatenames.php", //the script to call to get data
      dataType: "json",
      success: function (
        data //on recieve of reply
      ) {
        // console.log(data.length);
        console.log(data);
        tempData = data;
        for (let index = 0; index < data.length; index++) {
          $("#templatenamelist").append(
            "<option value='" +
              data[index].template_name +
              "'>" +
              data[index].template_name +
              "</option>"
          );
        }
        // $("#templatenamelist").append("<option value='newname'>Click To Enter New Name</option>");
      },
      error: function (er) {
        console.log(er);
        console.log(er.responseText);
      },
    });
  }

  // $("#templatename").change(function () {
  //   if($("#templatename").val()=="newname")
  //   {
  //     $('#addtempinput').html('');
  //     $('#addtempinput').html('<label for="templatename">Enter New Template Name</label><input id="templatename" type="email" class="form-control"placeholder="Enter Template Name"><div id="msgt1" class=""></div>');
  //     $("#addversioninput").addClass("hide");
  //   }
  // });

  $("#addtemplate").click(function () {
    $("#templatealert").removeClass("show");
    templatename = $("#templatename").val();
    templatebody = $("#templatebody").val();
    templateversion = $("#templateversion").val();
    if (templatename == "") {
      $("#templatename").addClass("is-invalid");
      $("#msgt1").addClass("invalid-feedback");
      $("#msgt1").html("Enter Template Name");
    } else {
      $("#templatename").removeClass("is-invalid");
      $("#msgt1").removeClass("invalid-feedback");
      $("#templatename").addClass("is-valid");
      $("#msgt1").addClass("valid-feedback");
      $("#msgt1").html("Looks Good!");
    }
    if (templateversion == "") {
      $("#templateversion").addClass("is-invalid");
      $("#msgt2").addClass("invalid-feedback");
      $("#msgt2").html("Enter Template Name");
    } else {
      $("#templateversion").removeClass("is-invalid");
      $("#msgt2").removeClass("invalid-feedback");
      $("#templateversion").addClass("is-valid");
      $("#msgt2").addClass("valid-feedback");
      $("#msgt2").html("Looks Good!");
    }

    if (templatebody == "") {
      $("#templatebody").addClass("is-invalid");
      $("#msgt3").addClass("invalid-feedback");
      $("#msgt3").html("Enter Template Body");
    } else {
      $("#templatebody").removeClass("is-invalid");
      $("#msgt3").removeClass("invalid-feedback");
      $("#templatebody").addClass("is-valid");
      $("#msgt3").addClass("valid-feedback");
      $("#msgt3").html("Looks Good!");
    }
    if (templatebody != "" && templatename != "" && templateversion != "") {
      $.ajax({
        type: "POST",
        url: "addtemplate.php", //the script to call to get data
        dataType: "json",
        data: {
          templatename: templatename,
          templatebody: templatebody,
          templateversion: templateversion,
        },
        success: function (
          data //on recieve of reply
        ) {
          console.log(data);
          $("#templatename").removeClass("is-valid");
          $("#msgt1").removeClass("valid-feedback");
          $("#msgt1").html("");
          $("#templateversion").removeClass("is-valid");
          $("#msgt2").removeClass("valid-feedback");
          $("#msgt2").html("");
          $("#templatebody").removeClass("is-valid");
          $("#msgt3").removeClass("valid-feedback");
          $("#msgt3").html("");
          $("#templatename").val("");
          $("#templatebody").val("");
          $("#templateversion").val("");
          $("#addtemplateModal").modal("hide");
          templatedata();
        },
        error: function (er) {
          console.log(er);
          console.log(er.responseText);
        },
      });
    }
  });

  $("#templatetable").on("click", "#tempdelete", function () {
    var button = $(this),
    tr = button.closest("tr");
    // find the ID stored in the .groupId cell
    var templatename = tr.find("td#tempname").text();
    var templateversion = tr.find("td#tempversion").text();
    console.log("clicked button with templatename", templatename , templateversion);

    // your PHP script expects GROUP_ID so we need to pass it one
    var data = { templatename: templatename , templateversion: templateversion};

    // ask confirmation
    if (confirm("Are you sure you want to delete this Template?")) {
      console.log("sending request");
      // delete record only once user has confirmed
      $.post(
        "deletetemplate.php",
        data,
        function (res) {
          console.log("received response", res);
          // we want to delete the table row only we received a response back saying that it worked
          if (res === 1) {
            console.log("deleting TR");
            tr.remove();
          }
        },
        "json"
      );
    }
  });

  $("#domaintable").on("click", "#domaindelete", function () {
    var button = $(this),
      tr = button.closest("tr");
    // find the ID stored in the .groupId cell
    var domain = tr.find("td#domainname").text();
    console.log("clicked button with domain", domain);

    // your PHP script expects GROUP_ID so we need to pass it one
    var data = { domain: domain };

    // ask confirmation
    if (confirm("Are you sure you want to delete this Domain?")) {
      console.log("sending request");
      // delete record only once user has confirmed
      $.post(
        "deletedomain.php",
        data,
        function (res) {
          console.log("received response", res);
          // we want to delete the table row only we received a response back saying that it worked
          if (res == 1) {
            console.log("deleting TR");
            tr.remove();
          }
        },
        "json"
      );
    }
  });

  var olddomain;

  $("#domaintable").on("click", "#domainedit", function () {
    var button = $(this),
      tr = button.closest("tr");
    // find the ID stored in the .groupId cell
    olddomain = tr.find("td#domainname").text();
    console.log("clicked button with domain", olddomain);
    $("#cdomain").val(olddomain);
  });

  var oldtemplatename;
  var oldtemplatebody;
  var oldtemplateversion;

  $("#templatetable").on("click", "#tempedit", function () {
    var button = $(this),
      tr = button.closest("tr");
    // find the ID stored in the .groupId cell
    oldtemplatename = tr.find("td#tempname").text();
    oldtemplatebody = tr.find("td#tempbody").text();
    oldtemplateversion = tr.find("td#tempversion").text();
    console.log("clicked button with templatename", oldtemplatename);
    $("#ctemplatename").val(oldtemplatename);
    $("#ctemplatebody").val(oldtemplatebody);
    $("#ctemplateversion").val(oldtemplateversion);
  });

  $("#edittemplate").click(function () {
    console.log(oldtemplatename);
    templatename = $("#ctemplatename").val();
    templatebody = $("#ctemplatebody").val();
    templateversion = $("#ctemplateversion").val();
    if (templatename == "") {
      $("#ctemplatename").addClass("is-invalid");
      $("#cmsgt1").addClass("invalid-feedback");
      $("#cmsgt1").html("Enter Template Name");
    } else {
      $("#ctemplatename").removeClass("is-invalid");
      $("#cmsgt1").removeClass("invalid-feedback");
      $("#ctemplatename").addClass("is-valid");
      $("#cmsgt1").addClass("valid-feedback");
      $("#cmsgt1").html("Looks Good!");
    }
    if (templateversion == "") {
      $("#ctemplateversion").addClass("is-invalid");
      $("#cmsgt2").addClass("invalid-feedback");
      $("#cmsgt2").html("Enter Template Body");
    } else {
      $("#ctemplateversion").removeClass("is-invalid");
      $("#cmsgt2").removeClass("invalid-feedback");
      $("#ctemplatebody").addClass("is-valid");
      $("#cmsgt2").addClass("valid-feedback");
      $("#cmsgt2").html("Looks Good!");
    }
    if (templatebody == "") {
      $("#ctemplatebody").addClass("is-invalid");
      $("#cmsgt3").addClass("invalid-feedback");
      $("#cmsgt3").html("Enter Template Body");
    } else {
      $("#ctemplatebody").removeClass("is-invalid");
      $("#cmsgt3").removeClass("invalid-feedback");
      $("#ctemplatebody").addClass("is-valid");
      $("#cmsgt3").addClass("valid-feedback");
      $("#cmsgt3").html("Looks Good!");
    }
    if (templatebody != "" && templatename != "" && templateversion != "") {
      $.ajax({
        type: "POST",
        url: "updatetemplatedata.php", //the script to call to get data
        dataType: "json",
        data: {
          templatename: oldtemplatename,
          templateversion: oldtemplateversion,
          changedtemplatename: templatename,
          changedtemplatebody: templatebody,
          changedtempplateversion: templateversion,
        },
        success: function (
          data //on recieve of reply
        ) {
          console.log(data);
          $("#ctemplatename").removeClass("is-valid");
          $("#cmsgt1").removeClass("valid-feedback");
          $("#cmsgt1").html("");
          $("#ctemplateversion").removeClass("is-valid");
          $("#cmsgt2").removeClass("valid-feedback");
          $("#cmsgt2").html("");
          $("#ctemplatebody").removeClass("is-valid");
          $("#cmsgt").removeClass("valid-feedback");
          $("#cmsgt").html("");
          $("#ctemplatename").val("");
          $("#ctemplatebody").val("");
          $("#ctemplateversion").val("");
          $("#editdomainModal").modal("hide");
          templatedata();
        },
        error: function (er) {
          console.log(er);
          console.log(er.responseText);
        },
      });
    }
  });

  $("#editdomain").click(function () {
    console.log(olddomain);
    domain = $("#cdomain").val();
    if (domain == "") {
      $("#cdomain").addClass("is-invalid");
      $("#cmsgd").addClass("invalid-feedback");
      $("#cmsgd").html("Enter domomain");
    } else {
      $("#cdomain").removeClass("is-invalid");
      $("#cmsgd").removeClass("invalid-feedback");
      $("#cdomain").addClass("is-valid");
      $("#cmsgd").addClass("valid-feedback");
      $("#cmsgd").html("Looks Good!");
      $.ajax({
        type: "POST",
        url: "updatedomaindata.php", //the script to call to get data
        dataType: "json",
        data: {
          domain: olddomain,
          changeddomain: domain,
        },
        success: function (
          data //on recieve of reply
        ) {
          console.log(data);
          $("#cdomain").removeClass("is-valid");
          $("#cmsgd").removeClass("valid-feedback");
          $("#cmsgd").html("");
          $("#cdomain").val("");
          $("#editdomainModal").modal("hide");
          domaindata();
        },
        error: function (er) {
          console.log(er);
          console.log(er.responseText);
        },
      });
    }
  });
});
