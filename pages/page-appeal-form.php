<?php
/* Template name: appeal-form */

if (isset($_POST['submitted'])) {
  //Mail Appeal Form to ..
  if(trim($_POST['asw_appealMail']) === '') {
    $apMailError = 'โปรดเลือกประเภทเรื่องติดต่อ.';
    $hasError = true;
  } else {
    $apMail = trim($_POST['asw_appealMail']);
  }
  //Client Type
  $type = $_POST['asw_type'];
  //Check mail
  if(trim($_POST['asw_email']) === '')  {
    $emailError = 'โปรดใส่อีเมล';
    $hasError = true;
  } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['asw_email']))) {
    $emailError = 'กรุณาใส่อีเมลให้ถูกต้อง';
    $hasError = true;
  } else {
    $email = trim($_POST['asw_email']);
  }
  //Topic
  if(trim($_POST['asw_topic']) === '') {
    $topicError = 'โปรดระบุชื่อเรื่อง';
    $hasError = true;
  } else {
    $topic = trim($_POST['asw_topic']);
  }
  //Department
  $department = $_POST['asw_department'];
  //Description
  if(trim($_POST['asw_description']) === '') {
    $descError = 'โปรดระบุชื่อเรื่อง';
    $hasError = true;
  } else {
    $desc = trim($_POST['asw_description']);
  }
  //Name
  $name = $_POST['asw_name'] .' '. $_POST['asw_lastName'];
  $address = $_POST['asw_address'];
  $tel = $_POST['asw_tel'];
  //file
  $file = $_FILES['asw_file'];
  $upload_overrides = array(
    'test_form' => false
  );
  $movefile = wp_handle_upload($file, $upload_overrides);
  $filePath = '';
  if ( $movefile && ! isset( $movefile['error'] ) ) {
    $filePath = $movefile['file'];
  }

  //Send mail
  if(!isset($hasError)) {
    //$emailTo = $apMail;
    $emailTo = 'jokerdez13@gmail.com';
    $subject = '[แบบฟอร์มร้องเรียนธรรมาภิบาล] เรื่อง : ' . $topic;
    $body = "ผู้ร้องเรียน: $type <br/>ชื่อผู้ร้องเรียน: $name <br/>ที่อยู่: $address <br/>โทรศัพท์: $tel <br/>Email: $email <br/>หน่วยงานที่ต้องการร้องเรียน: $department <br/>รายละเอียด: $desc";
    $headers = "From: ร้องเรียนธรรมาภิบาล &lt;".$apMail."&gt;\r\n" . "Reply-To: " . $email;
    //var_dump($headers);
    wp_mail($apMail, $subject, $body, $headers,$filePath);
    $emailSent = true;
  }
}
get_header();
?>
  <link href="<?php echo get_template_directory_uri() ?>/styles/appeal-form.css" rel="stylesheet" type="text/css"/>
  <script src='https://www.google.com/recaptcha/api.js'></script>

  <div id="appeal-form">
    <section id="hero-image">
    </section>
    <div class="sec-topicbar">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center">
            <div class="topicbar-left">
              <?php echo __('ASSETWISE <span class="t-grey">การกำกับดูแลกิจการที่ดี</span>', 'Appeal form page'); ?>
            </div>
            <div class="topicbar-right hidden-xxs">
              <img alt="" src="<?php echo get_template_directory_uri() ?>/images/customer-care/infobar-logo.png"/>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="ap-form" class="container">
      <form method="post" name="asw_classic" action="<?php the_permalink(); ?>" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-12">
            <h2 id="headtext"><?php echo __('แจ้งเรื่องร้องเรียน เบาะแสการกระทําผิดและการทุจริตถึงประธานกรรมการตรวจสอบ
              ประธานเจ้าหน้าที่บริหาร ฝ่ายตรวจสอบภายใน', 'Appeal form page'); ?></h2>
            <hr>
            <p id="warning-message"><?php echo __('*กรุณากรอกข้อมูลให้ครบถ้วน ทั้งนี้บริษัทจะปกปิดสถานะของผู้แจ้งเบาะแสเป็นความลับ
              และมีมาตรฐานการคุ้มครองความปลอดภัย', 'Appeal form page'); ?></p>
          </div>
        </div>
				<?php
				$label_class = 'col-sm-3 col-md-2';
				$input_class = 'col-sm-9 col-md-10';
				?>
        <div class="form-group row">
          <div><br></div>
          <label class="<?php echo $label_class; ?> col-form-label"><?php echo __('ประเภทเรื่องติดต่อ', 'Appeal form page'); ?><span
                style="color: red;">*</span></label>
          <div class="<?php echo $input_class; ?>">
            <input type="hidden" value="info@assetwise.co.th" name="asw_appealMail" id="appealMail">
            <div id="appeal_type_dropdown_wrapper" class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="appeal_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span id="text"><?php echo __('เลือกประเภทเรื่องติดต่อ', 'Appeal form page'); ?></span> <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="appeal_dropdown">
                <li><a href="#" data-appeal-mail="contactcenter@assetwise.co.th"><?php echo __('ขอข้อมูลโครงการ', 'Appeal form page'); ?></a></li>
                <li><a href="#" data-appeal-mail="contactcenter@assetwise.co.th"><?php echo __('ติดต่อฝ่ายขาย', 'Appeal form page'); ?></a></li>
                <li><a href="#" data-appeal-mail="procurement@assetwise.co.th"><?php echo __('ติดต่องานจัดซื้อจัดจ้าง', 'Appeal form page'); ?></a></li>
                <li><a href="#" data-appeal-mail="land@assetwise.co.th"><?php echo __('เสนอขายที่ดิน', 'Appeal form page'); ?></a></li>
                <li><a href="#" data-appeal-mail="contactcenter@assetwise.co.th"><?php echo __('รับเรื่องแจ้งซ่อม แจ้งปัญหา', 'Appeal form page'); ?></a></li>
                <li><a href="#" data-appeal-mail="info@assetwise.co.th"><?php echo __('เรื่องอื่นๆ', 'Appeal form page'); ?></a></li>
                <li><a href="#" data-appeal-mail="cg@assetwise.co.th"><?php echo __('ร้องเรียนธรรมาภิบาล', 'Appeal form page'); ?></a></li>
                <li><a href="#" data-appeal-mail="pdpa.cpo@assetwise.co.th"><?php echo __('ติดต่อขอดูหรือลบข้อมูล', 'Appeal form page'); ?></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="<?php echo $label_class; ?> col-form-label"><?php echo __('ผู้ร้องเรียน', 'Appeal form page'); ?><span
                style="color: red;">*</span></label>
          <div class="<?php echo $input_class; ?>">
            <div class="form-check form-check-inline row">
							<?php
                $opt_in_class = 'col-xs-6 col-sm-4 col-md-2';
                $clientTxt = __('ลูกค้า', 'Appeal form page');
                $personTxt = __('บุคคลทั่วไป', 'Appeal form page');
                $compTxt = __('คู่ค้า/ผู้รับเหมา', 'Appeal form page');
                $employeeTxt = __('พนักงาน', 'Appeal form page');
                $naTxt = __('ไม่ระบุ', 'Appeal form page');
              ?>
              <div class="<?php echo $opt_in_class; ?>">
                <input class="form-check-input" type="radio" name="asw_type" id="type-customer" value="<?php echo $clientTxt; ?>" checked>
                <label class="form-check-label" for="type-customer"><?php echo $clientTxt; ?></label>
              </div>
              <div class="<?php echo $opt_in_class; ?>">
                <input class="form-check-input" type="radio" name="asw_type" id="type-person" value="<?php echo $personTxt; ?>">
                <label class="form-check-label" for="type-person"><?php echo $personTxt; ?></label>
              </div>
              <div class="<?php echo $opt_in_class; ?>">
                <input class="form-check-input" type="radio" name="asw_type" id="type-coordinate" value="<?php echo $compTxt; ?>">
                <label class="form-check-label" for="type-coordinate"><?php echo $compTxt; ?></label>
              </div>
              <div class="<?php echo $opt_in_class; ?>">
                <input class="form-check-input" type="radio" name="asw_type" id="type-crew" value="<?php echo $employeeTxt; ?>">
                <label class="form-check-label" for="type-crew"><?php echo $employeeTxt; ?></label>
              </div>
              <div class="<?php echo $opt_in_class; ?>">
                <input class="form-check-input" type="radio" name="asw_type" id="type-na" value="<?php echo $naTxt; ?>">
                <label class="form-check-label" for="type-na"><?php echo $naTxt; ?></label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="<?php echo $label_class; ?> col-form-label"><?php echo __('อีเมล', 'Appeal form page'); ?><span style="color: red;">*</span></label>
          <div class="<?php echo $input_class; ?>">
            <input type="email" name="asw_email" class="form-control" placeholder="<?php echo __('กรอกอีเมล', 'Appeal form page'); ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="<?php echo $label_class; ?> col-form-label"><?php echo __('ชื่อเรื่อง', 'Appeal form page'); ?><span style="color: red;">*</span></label>
          <div class="<?php echo $input_class; ?>">
            <input type="text" name="asw_topic" class="form-control" placeholder="<?php echo __('กรอกชื่อเรื่อง', 'Appeal form page'); ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="<?php echo $label_class; ?> col-form-label"><?php echo __('หน่วยงาน / <br class="hidden-xs">โครงการที่ต้องการร้องเรียน', 'Appeal form page'); ?></label>
          <div class="<?php echo $input_class; ?>">
            <input type="text" name="asw_department" class="form-control"
                   placeholder="<?php echo __('กรอกชื่อหน่วยงานหรือโครงการที่ต้องการร้องเรียน', 'Appeal form page'); ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="<?php echo $label_class; ?> col-form-label"><?php echo __('รายละเอียด', 'Appeal form page'); ?><span style="color: red;">*</span></label>
          <div class="<?php echo $input_class; ?>">
            <textarea rows="3" name="asw_description" placeholder="<?php echo __('กรอกรายละเอียด', 'Appeal form page'); ?>" required></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="<?php echo $label_class; ?>" id="textUpload"><?php echo __('เอกสารแนบ', 'Appeal form page'); ?></label>
          <div class="<?php echo $input_class; ?> form-inline">
            <input type="file" name="asw_file" id="file" class="form-control-file">
            <label for="file" id="choose" style="margin-right: 10px;">choose file</label>
            <label hidden style="color: grey;font-weight: lighter;padding-right: 15px" id="messageUpload">file was
              selected</label>
            <div class="form-group" id="desUpload">
              <img src="<?php echo get_template_directory_uri(); ?>/images/customer-care/clip.png" alt="">
              <label><span style="color: darkred;"><?php echo __('แนบไฟล์</span> (ขนาดไม่เกิน2MB)', 'Appeal form page'); ?></label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="<?php echo $label_class; ?> col-form-label"><?php echo __('ชื่อ', 'Appeal form page'); ?></label>
          <div class="<?php echo $input_class; ?>">
            <input type="text" name="asw_name" class="form-control" placeholder="<?php echo __('กรอกชื่อ', 'Appeal form page'); ?>">
          </div>
        </div>
        <div class="form-group row">

          <label class="col-sm-2 col-form-label"><?php echo __('นามสกุล', 'Appeal form page'); ?></label>
          <div class="col-sm-10">
            <input type="text" name="asw_lastName" class="form-control" placeholder="<?php echo __('กรอกนามสกุล', 'Appeal form page'); ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label"><?php echo __('ที่อยู่', 'Appeal form page'); ?></label>
          <div class="col-sm-10">
            <input type="text" name="asw_address" class="form-control" placeholder="<?php echo __('กรอกที่อยู่', 'Appeal form page'); ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label"><?php echo __('โทรศัพท์', 'Appeal form page'); ?></label>
          <div class="col-sm-10">
            <input type="tel" name="asw_tel" class="form-control" placeholder="<?php echo __('กรอกเบอร์โทรศัพท์', 'Appeal form page'); ?>">
          </div>
        </div>
        <div class="col-sm-12 text-center">
          <div class="g-recaptcha" data-sitekey="6LekZGcUAAAAAMhp5Wcfay6SPCZxTtZcwFEFgCD4"></div>
        </div>
        <div class="col-xs-12 col-sm-12 text-center">
          <div id="send-btn-wrapper">
<!--            <input id="submitBtn" name="asw_submitted" type="submit" value="--><?php //echo __('ส่งข้อมูล', 'Appeal form page'); ?><!--">-->
            <button id="submitBtn" type="submit">Send email</button>
          </div>
        </div>
      <input type="hidden" name="submitted" id="submitted" value="true" />
      </form>
    </div>
  </div>
  <script type="text/javascript">
    //console.log(document.getElementsByClassName('g-recaptcha').value);
    $(function () {
      const appeal_type_selector = $('#appeal_type_dropdown_wrapper').find('a');
      const appeal_btn = $('#appeal_dropdown #text');
      const appeal_type = $('input#appealMail');
      const fileUpload = $('input#file');
      appeal_type_selector.on('click touch', function (e) {
        e.preventDefault();
        appeal_btn.text($(this).text());
        appeal_type.val($(this).attr('data-appeal-mail'));
      });
      fileUpload.on('change', function (e) {
        isUpload();
      });
    });
    function validateFormDesktop() {
      let email = document.getElementsByName('email');
      let topic = document.getElementsByName('topic');
      let description = document.getElementsByName('description');
      let appealFormSubmit = document.getElementById('submitBtn');

      appealFormSubmit.attr('<?php echo __('กำลังส่งข้อมูล', 'Appeal form page'); ?>');

      if (email.value === "") {
        alert("<?php echo __('กรุณาใส่อีเมล์', 'Appeal form page'); ?>");
        email.focus();
        return false;
      }
      if (topic.value === "") {
        alert("<?php echo __('กรุณาใส่ชื่อเรื่อง', 'Appeal form page'); ?>");
        topic.focus();
        return false;
      }
      if (description.value === "") {
        alert("<?php echo __('กรุณาระบุหมายเลขโทรศัพท์ของท่านค่ะ', 'Appeal form page'); ?>");
        description.focus();
        return false;
      }
    }
    function isUpload() {
      if (window.File && window.FileReader && window.FileList && window.Blob) {
        //get the file size and file type from file input field
        let fsize = $('#file')[0].files[0].size;

        if (fsize > 2000000) {
          $('#messageUpload').hide();
          $('#file').val('');
          alert("ไฟล์มีขนาดใหญ่เกินไป");
          return false;
        }
        else {
          $('#messageUpload').show();
        }
      }
    }
  </script>
<?php
get_sidebar();
get_footer();
