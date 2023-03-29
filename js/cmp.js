$(function () {
  //Campaigns Registration
  //----------------------
  const campReg = $('#campaign-register');

  campReg.submit(function (e) {
    e.preventDefault();
    $('.loading').fadeIn();
    let data = {
      'action': 'submit_cmp',
      'registerInfo' : {
        'register' : [{
          "name": $('#name').val(),
          "surname": $('#surname').val(),
          "ref": $('#ref').val(),
          "tel": $('#tel').val(),
          "email": $('#email').val(),
          "refId": $('#refId').val(),
          "mailingList": $('#mailingList').val(),
          "thankYouImg": $('#thank_you_img').val(),
          "cmp_name": $('#cmp_name').val(),
          "sms_text": $('#smsText').val()
        }],
        'addi' : '',
        'select_project_list' : '',
        'selectedProjects': []
      }
    };

    let addiArray = [];

    let selectedProj = $('.projectSelector').find($('input[type="checkbox"]:checked'));

    if (selectedProj.length) {
      $.each(selectedProj, function () {
        data.registerInfo.selectedProjects.push({'project': {'name' : $(this).data('dbname'), 'code': $(this).data('projectcode')}});
      });
    } else {
      alert('กรุณาเลือกอย่างน้อย 1 โครงการ');
      $('.loading').hide();
      return;
    }

    $.each($('.inpg'), function (i, obj) {
      let x = $(obj).attr('data-type');
      switch (x) {
        case 'checkbox' :
          let resC = getCheckboxValue(obj);
          addiArray.push(resC);
          break;
        case 'checkbox-project' :
          let resP = getProjectCheckboxValue(obj);
          data.registerInfo.select_project_list = resP;
          break;
        case 'dropdown' :
          let dv = getDropdownVal(obj);
          let fdv = Object.assign({}, dv);
          addiArray.push(dv);
          break;
        case 'text' :
          let val = '';
          if ($(obj).find('textarea').val().length === 0) {
            val = $(obj).find('.db_label').text()+': -';
          } else {
            val = $(obj).find('.db_label').text()+' : '+$(obj).find('textarea').val()
          }
          addiArray.push((val));
          break;
        default:
          console.log('Has no Input Group');
          break;
      }
    });

    let addiString = '';

    for (let i = 0; i < addiArray.length; i++) {
      let d = addiArray[i];
      addiString+=d+'<br>';
    }

    data.registerInfo.addi = addiString;

    let jsonData = JSON.parse(JSON.stringify(data));

    //Final Data
    //----------
    //console.log(data);return;

    function goToThankyouPage() {
      var currentLocation = window.location.href;
      var c = currentLocation.split('/');
      c.splice(-1, 1);
      c = c.join('/');
      if(currentLocation.indexOf('lang=en') !== -1) {
        document.location.href = c + '/thank-you/?lang=en';
      } else if (currentLocation.indexOf('lang=zh') !== -1) {
        document.location.href = c + '/thank-you/?lang=zh';
      } else {
        // console.log(c + '/thank-you/');
        // return false
        document.location.href = c + '/thank-you/';
      }
    }

    $.ajax({
      cache: false,
      type: "POST",
      url: submitCmp.ajax_url,
      data : jsonData,
      success: function (response) {
        //console.log(response);
        //return false;
        goToThankyouPage();
      },
      error: function (xhr, status, error) {
        console.log('Status: ' + xhr.status);
        console.log('Error: ' + xhr.responseText);
      }
    });

    //Get Title
    function getInpGTitle(obj) {
      let t = $(obj).find('.db_label');
      return t.text();
    }

    //Get value from Project selector checkboxes
    function getProjectCheckboxValue (obj) {
      let checked = $(obj).find(':checked');
      let checkedSet = '';
      $.each(checked, function (i) {
        i+=1;
        if(i<checked.length) {
          checkedSet+=$(this).data('pname')+', ';
        } else {
          checkedSet+=$(this).data('pname');
        }

      });

      return checkedSet;
    }

    //Get value from checkbox
    function getCheckboxValue (obj) {
      //var checkboxVal = '';
      let checked = $(obj).find(':checked');
      let checkedSet = $(obj).find('.db_label').text()+' : ';

      if (checked.length === 0) {
        checkedSet+='-';
      } else {
        $.each(checked, function (i) {
          i+=1;
          if(i<checked.length) {
            checkedSet+=$(this).attr('value')+', ';
          } else {
            checkedSet+=$(this).attr('value');
          }
        });
      }

      return checkedSet;
    }

    //Get value from dropdown
    function getDropdownVal(obj) {
      let title = $(obj).find('.db_label').text();
      let selectD = $(obj).find('button').text();
      return title+' : '+selectD.trim();
    }
  });

  campReg.find('.dropdown-menu a').on('click touch', function (e) {
    e.preventDefault();
    var c = $(this);
    var l = c.text();
    var n = c.attr('data-val');
    var cd = c.parents('.dropdown-menu').attr('aria-labelledby');
    var cdn = cd.replace('-dropdown', '');
    $('#'+cdn).val(n);
    $('#'+cd).text(l);
  })
});