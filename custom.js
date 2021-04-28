$(document).ready(function () {
  var tempData;
  $.ajax({
    type: "POST",
    url: "getdomaindata.php", //the script to call to get data
    dataType: "json",
    success: function (
      data //on recieve of reply
    ) {
      // console.log(data.length);
      // console.log(data);
      // console.log(data[0].domains);
      for (let index = 0; index < data.length; index++) {
        $("#domains").append(
          "<option value='" +
            data[index].domains +
            "'>" +
            data[index].domains +
            "</option>"
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
    url: "gettemplatenames.php", //the script to call to get data
    dataType: "json",
    success: function (
      data //on recieve of reply
    ) {
      // console.log(data.length);
      // console.log(data);
      tempData = data;
      for (let index = 0; index < data.length; index++) {
        $("#selectTemplate").append(
          "<option value='" +
            data[index].template_name +
            "'>" +
            data[index].template_name +
            "</option>"
        );
      }
    },
    error: function (er) {
      console.log(er);
      console.log(er.responseText);
    },
  });

  $("#selectDomain").change(function () {
    domainValue = $("#selectDomain").val();
    if (domainValue == "") {
      $("#selectDomain").removeClass("is-valid");
      $("#msg3").removeClass("valid-feedback");
      $("#selectDomain").addClass("is-invalid");
      $("#msg3").addClass("invalid-feedback");
      $("#msg3").html("Select any domomain");
    } else {
      $("#selectDomain").removeClass("is-invalid");
      $("#msg3").removeClass("invalid-feedback");
      $("#selectDomain").addClass("is-valid");
      $("#msg3").addClass("valid-feedback");
      $("#msg3").html("Looks Good !");
    }
  });

  $("#selectTemplate").change(function () {
    template_name = $("#selectTemplate").val();
    if (template_name == "") {
      $("#selectTemplate").removeClass("is-valid");
      $("#msg4").removeClass("valid-feedback");
      $("#selectTemplate").addClass("is-invalid");
      $("#msg4").addClass("invalid-feedback");
      $("#msg4").html("Select any domomain");
    } else {
      $("#selectTemplate").removeClass("is-invalid");
      $("#msg4").removeClass("invalid-feedback");
      $("#selectTemplate").addClass("is-valid");
      $("#msg4").addClass("valid-feedback");
      $("#msg4").html("Looks Good !");
    }

    var versionArray = [];
    $.ajax({
      type: "POST",
      url: "gettemplateversions.php", //the script to call to get data
      dataType: "json",
      data: {
        templatename: template_name,
      },
      success: function (
        data //on recieve of reply
      ) {
        console.log(data.length);
        console.log(data);
        for (let index = 0; index < data.length; index++) {
          versionArray.push(data[index].template_version);
        }
        // console.log(versionArray);
        preview(versionArray);
      },
      error: function (er) {
        console.log(er);
        console.log(er.responseText);
      },
    });
    function preview(versionArray) {
      var name = $("#sendersname").val();
      var mail = $("#sendersmail").val();
      var domain=$("#selectDomain").val();
      switch (domain) {
        case "insider@theemortgage.com":
            signatureForDomain = "Thank you! TheEMortgage.com Support";
            break;
    
        case "guide@incentiveshow.com":
            signatureForDomain = "Thanks, and please respond with any other questions you may have - IncentiveShow.com Team";
            break;
    
        case "insider@cshowcase.com":
            signatureForDomain = "Thanks - reply if you still need assistance! - CShowCase.com Support";
            break;
    
        case "outlooks@occucom.com":
            signatureForDomain = "Hope this was helpful! Occucom Support";
            break;
    
        case "yourguide@webwad.com":
            signatureForDomain = "Thanks - WebWad.com Support";
            break;
    
        case "salute@bestvamortgagerates.com":
            signatureForDomain = "Please reply and let me know if this helped - BestVAMortgageRates.com Support";
            break;
    
        case "experts@bestworldfinancial.com":
            signatureForDomain = "Thank you for your inquiry - BestWorldFinancial.com Support Team";
            break;
    
        case "advisors@cruisincompany.com":
            signatureForDomain = "Always glad to help! CruisinCompany.com Support";
            break;
    
        case "insider@myownauto.com":
            signatureForDomain = "Thank you again! MyOwnAuto.com Support";
            break;
    
        case "yourguide@homeservicesnet.com":
            signatureForDomain = "Let me know if you have any more questions - HomeServicesNet.com Support";
            break;
    
        case "info@contralabel.com":
            signatureForDomain = "Thank you - please reply with any more queries! ContraLabel.com Support Team";
            break;
    
        case "hellohello@forwardpositive.com":
            signatureForDomain = "Thanks, have a great day! - The ForwardPositive.com Team";
            break;
    
        case "heretohelp@nothnaglemortgage.com":
            signatureForDomain = "I hope this helped! Please reply and let me know. NothNagleMortgage.com Support Team";
            break;
    
        case "citizen@survivalsystemsint.com":
            signatureForDomain = "Hopefully this was helpful - please let me know! SurvivalSystemsInt.com Support";
            break;
    
        case "hereforyou@newlifeseries.com":
            signatureForDomain = "Thank you - Let us know if you need anything more! NewLifeSeries.com Support Team";
    }
    
    switch (domain) {
    
        case "insider@theemortgage.com":
            addressSpecificToEmailAccount = "3556 S 5600 W # 1 - 1139 Salt Lake City 84120, Utah";
            break;
    
        case "guide@incentiveshow.com":
            addressSpecificToEmailAccount = "34 N Franklin Ave, Suite #687 1402 Pinedale, 89241, Wyoming";
            break;
    
        case "insider@cshowcase.com":
            addressSpecificToEmailAccount = "100- 24th Street W. # 1- 2002 Billings 11205 Montana";
            break;
    
        case "outlooks@occucom.com":
            addressSpecificToEmailAccount = "9 N River Road #402 - Auburn 04210 Maine";
            break;
    
        case "yourguide@webwad.com":
            addressSpecificToEmailAccount = "27708 Tomball Parkway 1003 Tomball, 77375, Texas";
            break;
    
        case "salute@bestvamortgagerates.com":
            addressSpecificToEmailAccount = "526 North St Cloud St. Suite #506 Allentown PA  18104";
            break;
    
        case "experts@bestworldfinancial.com":
            addressSpecificToEmailAccount = "100- 24th Street W. # 1- 2002 Billings 11205 Montana";
            break;
    
        case "advisors@cruisincompany.com":
            addressSpecificToEmailAccount = "100- 24th Street W. # 1- 2002 Billings 11205 Montana";
            break;
    
        case "insider@myownauto.com":
            addressSpecificToEmailAccount = "2501 NE 23 Road, Suite # A 138 Oklahoma 73111 Oklahoma";
            break;
    
        case "yourguide@homeservicesnet.com":
            addressSpecificToEmailAccount = "9 N River Road #402 - Auburn 04210 Maine";
            break;
    
        case "info@contralabel.com":
            addressSpecificToEmailAccount = "115 E​lm Street | Suite I 3​08 | Farmi​ngton, MN | 55​024";
            break;
    
        case "hellohello@forwardpositive.com":
            addressSpecificToEmailAccount = "5307 Victoria Drive #395 Vancouver, BC V5P 3V6";
            break;
    
        case "heretohelp@nothnaglemortgage.com":
            addressSpecificToEmailAccount = "34 N Franklin Ave, Suite #687 1402 Pinedale, 89241, Wyoming";
            break;
    
        case "citizen@survivalsystemsint.com":
            addressSpecificToEmailAccount = "115 Elm Suite # I-308 Farmington 55024 Minnesota";
            break;
    
        case "hereforyou@newlifeseries.com":
            addressSpecificToEmailAccount = "34 N Franklin Ave, Suite #687 1402 Pinedale, 89241, Wyoming";
    }
      var signatureForDomain;
      var addressSpecificToEmailAccount;
      templateVersion =
        versionArray[Math.floor(Math.random() * versionArray.length)];
      fullTemplateName = template_name + templateVersion;
      console.log(fullTemplateName);
      $.ajax({
        type: "POST",
        url: "gettemplatebody.php", //the script to call to get data
        dataType: "json",
        data: {
          templatename: template_name,
          templateversion: templateVersion
        },
        success: function (
          data //on recieve of reply
        ) {
          console.log(data.length);
          console.log(data);
          body = data[0].template_body_text;

          body = body.replace("[[Name]]", name);
          body = body.replace("[[ToAddress]]", mail);
          body = body.replace("[[SignatureForDomain]]", signatureForDomain);
          body = body.replace("[[InsertAddressSpecificToEmailAccount]]", addressSpecificToEmailAccount);

          $("#preview").html(body);
        },
        error: function (er) {
          console.log(er);
          console.log(er.responseText);
        },
      });
    }
  });

  $("#sendmail").click(function () {
    if ($("#sendersname").val() == "") {
      $("#sendersname").removeClass("is-valid");
      $("#msg1").removeClass("valid-feedback");
      $("#sendersname").addClass("is-invalid");
      $("#msg1").addClass("invalid-feedback");
      $("#msg1").html("Enter Name !");
      return false;
    } else {
      $("#sendersname").removeClass("is-invalid");
      $("#msg1").removeClass("invalid-feedback");
      $("#sendersname").addClass("is-valid");
      $("#msg1").addClass("valid-feedback");
      $("#msg1").html("Looks Good !");
      sname = $("#sendersname").val();
    }
    if ($("#sendersmail").val() == "") {
      $("#sendersmail").removeClass("is-valid");
      $("#msg2").removeClass("valid-feedback");
      $("#sendersmail").addClass("is-invalid");
      $("#msg2").addClass("invalid-feedback");
      $("#msg2").html("Select any domomain");
      return false;
    } else {
      $("#sendersmail").removeClass("is-invalid");
      $("#msg2").removeClass("invalid-feedback");
      $("#sendersmail").addClass("is-valid");
      $("#msg2").addClass("valid-feedback");
      $("#msg2").html("Looks Good !");
      mail = $("#sendersmail").val();
    }
    if ($("#selectDomain").val() == "") {
      $("#selectDomain").removeClass("is-valid");
      $("#msg3").removeClass("valid-feedback");
      $("#selectDomain").addClass("is-invalid");
      $("#msg3").addClass("invalid-feedback");
      $("#msg3").html("Select any domomain");
      return false;
    } else {
      $("#selectDomain").removeClass("is-invalid");
      $("#msg3").removeClass("invalid-feedback");
      $("#selectDomain").addClass("is-valid");
      $("#msg3").addClass("valid-feedback");
      $("#msg3").html("Looks Good !");
      dname = $("#selectDomain").val();
    }
    if ($("#selectTemplate").val() == "") {
      $("#selectTemplate").removeClass("is-valid");
      $("#msg4").removeClass("valid-feedback");
      $("#selectTemplate").addClass("is-invalid");
      $("#msg4").addClass("invalid-feedback");
      $("#msg4").html("Select any domomain");
      return false;
    } else {
      $("#selectTemplate").removeClass("is-invalid");
      $("#msg4").removeClass("invalid-feedback");
      $("#selectTemplate").addClass("is-valid");
      $("#msg4").addClass("valid-feedback");
      $("#msg4").html("Looks Good !");
      tname = $("#selectTemplate").val();
    }

    console.log(sname, mail, dname, tname);
    $("#alert").removeClass("show");
    $("#sendmail").html(
      'Sending Mail...<div id="loader" class="spinner-border spinner-border-sm text-light ml-2"  role="status"><span class="sr-only">Loading...</span></div>'
    );

    $.ajax({
      type: "POST",
      url: "sendmail.php", //the script to call to get data
      data: {
        name: sname,
        mail: mail,
        domain: dname,
        template: tname,
      },
      dataType: "json",
      success: function (
        data //on recieve of reply
      ) {
        // console.log(data.length);
        console.log(data);
        if (data == 1) {
          $("#sendmail").html("Send Mail");
          $("#alert").addClass("show");
          $("#selectTemplate").removeClass("is-valid");
          $("#msg4").removeClass("valid-feedback");
          $("#selectDomain").removeClass("is-valid");
          $("#msg3").removeClass("valid-feedback");
          $("#sendersmail").removeClass("is-valid");
          $("#msg2").removeClass("valid-feedback");
          $("#sendersname").removeClass("is-valid");
          $("#msg1").removeClass("valid-feedback");
          $("#msg1").html("");
          $("#msg2").html("");
          $("#msg3").html("");
          $("#msg4").html("");
        }
      },
      error: function (er) {
        console.log(er);
        console.log(er.responseText);
        $("#sendmail").html("Send Mail");
      },
    });
  });

  $("#alertclose").click(function () {
    $("#alert").removeClass("show");
  });
});
