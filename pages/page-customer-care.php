<?php
/* Template name: Customer Care */
get_header();

//DB configuration
$domain = $_SERVER['SERVER_NAME'];
$dbName = 'assetwisec_dcpn';
$dbHost = 'localhost';

$dbUsername = 'assetwisec_dcpn';
$dbPassword = 'Asw12345';

//connect with the database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$sql = "select max(idRepair) from AssetComfy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $newidRepair = $row["max(idRepair)"] + 1;
  }
}

$conn->close();
?>

<style>
  #loader {
    background-color: rgba(0,0,0,0.7);
    position: fixed;
    top: 0;
    left: 0;
    z-index: 99;
    width: 100%;
    height: 100%;
    display: none;
  }
  .lds-ellipsis {
    display: inline-block;
    position: relative;
    width: 64px;
    height: 64px;
    left: 50%;
    top: 50%;
    margin-left: -32px;
    margin-top: -32px;
  }
  .lds-ellipsis div {
    position: absolute;
    top: 27px;
    width: 11px;
    height: 11px;
    border-radius: 50%;
    background: #fff;
    animation-timing-function: cubic-bezier(0, 1, 1, 0);
  }
  .lds-ellipsis div:nth-child(1) {
    left: 6px;
    animation: lds-ellipsis1 0.6s infinite;
  }
  .lds-ellipsis div:nth-child(2) {
    left: 6px;
    animation: lds-ellipsis2 0.6s infinite;
  }
  .lds-ellipsis div:nth-child(3) {
    left: 26px;
    animation: lds-ellipsis2 0.6s infinite;
  }
  .lds-ellipsis div:nth-child(4) {
    left: 45px;
    animation: lds-ellipsis3 0.6s infinite;
  }
  @keyframes lds-ellipsis1 {
    0% {
      transform: scale(0);
    }
    100% {
      transform: scale(1);
    }
  }
  @keyframes lds-ellipsis3 {
    0% {
      transform: scale(1);
    }
    100% {
      transform: scale(0);
    }
  }
  @keyframes lds-ellipsis2 {
    0% {
      transform: translate(0, 0);
    }
    100% {
      transform: translate(19px, 0);
    }
  }

</style>

<div id="loader">
  <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
</div>

  <div id="customer-care">
    <section id="hero-image">
    </section>
    <div class="container-fluid nopadding sec-topicbar">
      <div class="container nopadding">
        <div class="col-xs-12 text-center">
          <div class="topicbar-left">
            <?php echo __('ASSETWISE <span class="t-grey">Customer Care</span>', 'Theme texts'); ?>
          </div>
          <div class="topicbar-right hidden-xxs">
            <img src="<?php echo get_template_directory_uri() ?>/images/customer-care/infobar-logo.png"/>
          </div>
        </div>
      </div>
    </div>
    <div id="cc-form" class="container">
      <?php
        $selectTypeText = __('กรุณาเลือกประเภทโครงการ', 'Customer care');
        $selectProjectText = __('กรุณาเลือกชื่อโครงการ', 'Customer care');
        $unitNoText = __('กรุณาระบุเลขที่ยูนิต', 'Customer care');
      ?>
      <form method="post" action="<?php echo esc_url(admin_url('submit-customer.php')); ?>" name="classic"
            onSubmit="return validateFormDesktop(this);" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="project-name"><?php echo $selectTypeText; ?></label>
              <div id="project-type" class="dropdown">
                <button class="btn select-custom dropdown-toggle" id="project-type" type="button"
                        data-toggle="dropdown">
                  <span class="txt"><?php echo $selectTypeText; ?></span>
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="project-type">
                  <li role="presentation"><a role="menuitem" tabindex="-1" type="Condominium" id="1" href="#">Condominium</a>
                  </li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" type="Single House / Town House" id="2"
                                             href="#">Single House / Town House</a></li>
                </ul>
              </div>
                <p id="project-type-error">คุณยังไม่ได้เลือกประเภทโครงการ</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="project-name"><?php echo $selectProjectText ?></label>
              <div id="project-name" class="dropdown">
                <button class="btn select-custom dropdown-toggle" name="" id="project-type" type="button"
                        data-toggle="dropdown">
                  <span class="txt"><?php echo $selectProjectText; ?></span>
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="project-name">
                  <li role="presentation">
                    <a role="menuitem" tabindex="-1" name="" href="#"><?php echo $selectProjectText; ?></a>
                  </li>
                </ul>
                <input type="hidden" name="projectNameSent" id="projectNameSent">
              </div>
                <p id="project-name-error">คุณยังไม่ได้เลือกชื่อโครงการ</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="project-unit"><?php echo $unitNoText; ?></label>
              <input type="hidden" name="idRepair" id="idRepair" value="<?php echo $newidRepair; ?>">
              <input type="text" class="form-control required" name="projectunit" id="project-unit" value=""
                     placeholder="<?php echo __('เลขที่ยูนิต', 'Customer care'); ?>"/>
              <small><?php echo $unitNoText; ?></small>
                <p id="project-unit-error">คุณยังไม่ได้ระบุเลขที่ยูนิต</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="name" class="req"><?php echo __('กรุณาระบุชื่อ และนามสกุลผู้แจ้ง', 'Customer care'); ?></label>
              <input type="text" name="resident-name" id="resident-name" value="" placeholder="<?php echo __('ชื่อ-นามสกุล', 'Customer care'); ?>"
                     class="required form-control"/>
                <p id="resident-name-error">คุณยังไม่ได้ชื่อและนามสกุล</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="phone" class="req"><?php echo __('กรุณาระบุเบอร์โทรศัพท์ของผู้แจ้ง', 'Customer care'); ?></label>
              <input type="tel" name="resident-phone" id="resident-phone" value="" placeholder="<?php echo __('เบอร์โทรศัพท์', 'Customer care'); ?>"
                     class="required form-control"/>
                <p id="resident-name-error">คุณยังไม่ได้ระบุเบอร์โทรศัพท์</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="phone" class="req"><?php echo __('กรุณาระบุอีเมล์แอดเดรสของผู้แจ้ง', 'Customer care'); ?></label>
              <input type="email" name="resident-email" id="resident-email" value="" placeholder="Email Address"
                     class="required form-control"/>
                <p id="resident-name-error">คุณยังไม่ได้ระบุอีเมลแอดเดรส</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="message" class="req"><?php echo __('กรุณาระบุรายการที่ต้องการแจ้ง', 'Customer care'); ?></label>
              <textarea id="message" name="message" placeholder="<?php echo __('รายการที่ต้องการแจ้ง', 'Customer care'); ?>" rows="5"
                        class="required form-control"></textarea>
                <p id="resident-name-error">คุณยังไม่ได้ระบุรายการที่ต้องการแจ้ง</p>
            </div>
          </div>
        </div>
        <div class="submit-row row justify-content-between">
          <div id="filesUpload" class="col-xs-12 col-sm-3">
            <label for="fileToUpload">
              <img src="<?php echo get_template_directory_uri(); ?>/images/customer-care/clip.png" alt="">
              <span><?php echo __('แนบไฟล์', 'Customer care'); ?></span>
            </label>
            <input type="file" multiple="multiple" name="fileToUpload" id="fileToUpload" onchange="fileSelected();"
                   accept="image/*" capture="camera"/>
          </div>
          <div class="col-xs-12 col-sm-3 pull-right">
            <div id="send-btn-wrapper">
              <input id="submitBtn" type="submit" value="<?php echo __('ส่งข้อมูล', 'Customer care'); ?>">
            </div>
          </div>
        </div>
          <div class="captcha row">
              <div class="col-sm-4 col-sm-offset-4">
                  <div class="g-recaptcha" data-sitekey="6LcYohIUAAAAAIZffDhI2a7eufXjENYH8sxcHZNv"></div>
              </div>
          </div>
      </form>
    </div>
  </div>

  <script type="text/javascript">
    function MM_swapImgRestore() { //v3.0
      var i, x, a = document.MM_sr;
      for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) x.src = x.oSrc;
    }

    function MM_preloadImages() { //v3.0
      var d = document;
      if (d.images) {
        if (!d.MM_p) d.MM_p = new Array();
        var i, j = d.MM_p.length, a = MM_preloadImages.arguments;
        for (i = 0; i < a.length; i++)
          if (a[i].indexOf("#") != 0) {
            d.MM_p[j] = new Image;
            d.MM_p[j++].src = a[i];
          }
      }
    }

    function MM_findObj(n, d) { //v4.01
      var p, i, x;
      if (!d) d = document;
      if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
        d = parent.frames[n.substring(p + 1)].document;
        n = n.substring(0, p);
      }
      if (!(x = d[n]) && d.all) x = d.all[n];
      for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
      for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
      if (!x && d.getElementById) x = d.getElementById(n);
      return x;
    }

    function MM_swapImage() { //v3.0
      var i, j = 0, x, a = MM_swapImage.arguments;
      document.MM_sr = new Array;
      for (i = 0; i < (a.length - 2); i += 3)
        if ((x = MM_findObj(a[i])) != null) {
          document.MM_sr[j++] = x;
          if (!x.oSrc) x.oSrc = x.src;
          x.src = a[i + 2];
        }
    }
  </script>

  <script type="text/javascript">
    function fileSelected() {

      var count = document.getElementById('fileToUpload').files.length;

      document.getElementById('details').innerHTML = "";

      for (var index = 0; index < count; index++) {

        var file = document.getElementById('fileToUpload').files[index];

        var fileSize = 0;

        if (file.size > 1024 * 1024)

          fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';

        else

          fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';

        document.getElementById('details').innerHTML += 'Name: ' + file.name + '<br>Size: ' + fileSize + '<br>Type: ' + file.type;

        document.getElementById('details').innerHTML += '<p>';

      }

    }

    function uploadFile() {

      var fd = new FormData();

      var count = document.getElementById('fileToUpload').files.length;

      for (var index = 0; index < count; index++) {

        var file = document.getElementById('fileToUpload').files[index];

        fd.append('myFile', file);

      }


      var projectnameMo = document.getElementById('projectname1').value;
      fd.append('myprojectnameMo', projectnameMo);

      var projectunitMo = document.getElementById('projectunitMobile').value;
      fd.append('myprojectunitMo', projectunitMo);

      var idRepairMo = document.getElementById('idRepairMobile').value;
      fd.append('myidRepairMo', idRepairMo);

      var nameMo = document.getElementById('nameMobile').value;
      fd.append('mynameMo', nameMo);

      var phoneMo = document.getElementById('phoneMobile').value;

      if (phoneMo == "") {
        alert("<?php echo __('กรุณาระบุหมายเลขโทรศัพท์ของท่านค่ะ', 'Customer care'); ?>");
        phone.focus;
        return false;
      }
      fd.append('myphoneMo', phoneMo);


      var emailMo = document.getElementById('emailMobile').value;
      fd.append('myemailMo', emailMo);

      var messageMo = document.getElementById('messageMobile').value;
      fd.append('mymessageMo', messageMo);


      var xhr = new XMLHttpRequest();

      xhr.upload.addEventListener("progress", uploadProgress, false);

      xhr.addEventListener("load", uploadComplete, false);

      xhr.addEventListener("error", uploadFailed, false);

      xhr.addEventListener("abort", uploadCanceled, false);

      xhr.open("POST", "AssetComfyMobileDo.php");

      xhr.send(fd);

    }

    function uploadProgress(evt) {

      if (evt.lengthComputable) {

        var percentComplete = Math.round(evt.loaded * 100 / evt.total);

        document.getElementById('progress').innerHTML = percentComplete.toString() + '%';

      } else {

        document.getElementById('progress').innerHTML = 'unable to compute';

      }

    }

    function uploadComplete(evt) {

      /* This event is raised when the server send back a response */

      alert(evt.target.responseText);

      location.replace("Thanks.html");
    }

    function uploadFailed(evt) {

      alert("There was an error attempting to upload the file.");

    }

    function uploadCanceled(evt) {

      alert("The upload has been canceled by the user or the browser dropped the connection.");

    }
  </script>

  <script type="text/javascript">

    $('#submitBtn').on('clcik', function () {

    });

    function validateFormDesktop() {
      var name = document.getElementById('name');
      var email = document.getElementById('email');
      var phone = document.getElementById('phone');
      var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
      var filMoblie = /^\d{8,10}$/;
      if (name.value === "") {
        alert("<?php echo __('กรุณาใส่ชื่อค่ะ', 'Customer care'); ?>");
        name.focus;
        return false;
      }
      if (email.value === "") {
        alert("<?php echo __('กรุณาใส่อีเมล์', 'Customer care'); ?>");
        email.focus;
        return false;
      }
      if (phone.value === "") {
        alert("<?php echo __('กรุณาระบุหมายเลขโทรศัพท์ของท่านค่ะ', 'Customer care'); ?>");
        phone.focus;
        return false;
      }
      if (!filter.test(email.value)) {
        alert("<?php echo __('กรุณาใส่อีเมล์ให้ถูกต้องค่ะ', 'Customer care'); ?>");
        email.focus;
        return false;
      }
      if (!phone.value.match(filMoblie)) {
        alert("<?php echo __('กรุณาระบุหมายเลขโทรศัพท์ของท่านให้ถูกต้องค่ะ', 'Customer care'); ?>");
        phone.focus();
        return false;
      }
    }
  </script>

  <script>
    $(function () {
      //Variables
      var project_type_list = $("#project-type");
      var project_name_list = $("#project-name");
      var condoList = {
        "atmoz15": "<?php echo __('Atmoz ลาดพร้าว 15', 'Customer care'); ?>",
        "brownhk": "<?php echo __('Brown ห้วยขวาง','Customer care'); ?>",
        "modiz32": "<?php echo __('Modiz รัชดา 32', 'Customer care'); ?>",
        "atmoz71": "<?php echo __('Atmoz ลาดพร้าว 71','Customer care'); ?>",
        "wynncc4": "<?php echo __('Wynn Condo ลาดพร้าว-โชคชัย 4','Customer care'); ?>",
        "modiz Interchange": "<?php echo __('Modiz Interchange วงเวียนหลักสี่','Customer care'); ?>",
        "brown67": "<?php echo __('Brown พหลโยธิน 67','Customer care'); ?>",
        "modiz Station": "<?php echo __('Modiz Station พหลโยธิน','Customer care'); ?>",
        "brown32": "<?php echo __('Brown รัชดา 32','Customer care'); ?>",
        "episode": "<?php echo __('Episode พหลฯ-สะพานใหม่','Customer care'); ?>",
        "wynn52": "<?php echo __('Wynn พหลโยธิน 52','Customer care'); ?>",
        "esta-bliss": "<?php echo __('Esta Bliss รามอินทรา','Customer care'); ?>",
        "h2": "<?php echo __('H2 รามอินทรา 21','Customer care'); ?>",
        "b-campus": "<?php echo __('B Campus ประชาชื่น','Customer care'); ?>",
        "modiz-18": "<?php echo __('Modiz ลาดพร้าว 18','Customer care'); ?>",
        "esta-sapanmai": "<?php echo __('Esta สะพานใหม่','Customer care'); ?>",
        "kavebu": "<?php echo __('Kave Condo รังสิต','Customer care'); ?>"
      };
      var houseList = {
        "the-honor": "<?php echo __('The Honor ลาดพร้าว 81', 'Customer care'); ?>",
        "the-ozone": "<?php echo __('The Ozone ปัญญารามอินทรา', 'Customer care'); ?>",
        "wise71": "<?php echo __('Wise 71 ลาดพร้าว 71', 'Customer care'); ?>",
        "jamjuree-park": "<?php echo __('Jamjuree Park รามอินทรา', 'Customer care'); ?>",
        "iplace": "<?php echo __('I-Place นาคนิวาส 48', 'Customer care'); ?>"
      };
      var sendBtn = $("#send-btn");
      var type_select = project_type_list.find("a");
      var name_select = project_name_list.find("ul");
      var form = $("#cc-form").find("form");
      var unit = form.find("#project-unit"),
        name = form.find("#name"),
        phone = form.find("#tel"),
        email = form.find("#email"),
        detail = form.find("#detail"),
        project_name = "",
        idRepair = $("#idRepair").attr("value"),
        message = form.find("#detail");

      //When select Project Type
      type_select.click(function () {
        event.preventDefault();
        project_type_list.find("button").find("span.txt").html(this.type).css("color", "black");
        updateProjectList(this.id);
      });

      //When select Project name
      name_select.on("click", "a", function () {
        event.preventDefault();
        project_name_list.find("span.txt").html(this.text).css("color", "black");
        project_name = this.text;
        console.log(this.text);
        $("#projectNameSent").val(this.text);
      });

      $('#submitBtn').on('click', function() {
        $('#loader').fadeIn();
      });

      //This will update Projects name dropdown list
      function updateProjectList(selectId) {
        var item = project_name_list.find("ul");
        item.empty();
        if (selectId === '1') {
          $.each(condoList, function (key, value) {
            item.append("<li><a name=" + key + ">" + value + "</a></li>");
          });
        } else if (selectId === '2') {
          $.each(houseList, function (key, value) {
            item.append("<li><a name=" + key + ">" + value + "</a></li>");
          });
        } else {
          return true;
        }
      }

    });
  </script>

<?php
get_sidebar();
get_footer();
