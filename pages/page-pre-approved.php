<?php
/* Template name: Pre-Approved */
get_header();
$highlight_items = get_field('highlight_items', get_the_ID());
$bank_int_rate = get_field('banks_interest_rate_listed', get_the_ID());
?>

<section id="pre-approved_section">
  <div class="container">
    <div class="header row">
      <div class="col-sm-10 col-sm-offset-1">
        <h2 class="page-title text-center">โปรแกรมคำนวณสินเชื่อบ้านเบื้องต้น</h2>
        <p class="text-center">การคำนวณเงินกู้นี้เป็นการประมาณการยอดเงินกู้ได้สูงสุด เพื่อแนะนำโครงการ หรือ บริการสินเชื่อที่เหมาะกับคุณ<br>ซึ่งขึ้นอยู่กับรายได้และระยะในการผ่อนของคุณ</p>
      </div>
    </div>
    <div class="calc-area row">
      <div class="col-sm-12">
        <ul class="nav nav-pills">
          <li role="presentation" class="active">
            <a href="#loan_capacity" data-toggle="pill" aria-controls="loan_capacity" role="tab">
              <svg id="calculator_1_" data-name="calculator (1)" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 200 200">
                <path id="Path_27" data-name="Path 27" d="M22.917,0A22.914,22.914,0,0,0,0,22.917V95.833H95.833V0Zm37.5,56.25H52.083v8.333a6.25,6.25,0,0,1-12.5,0V56.25H31.25a6.25,6.25,0,1,1,0-12.5h8.333V35.417a6.25,6.25,0,1,1,12.5,0V43.75h8.333a6.25,6.25,0,1,1,0,12.5Z" />
                <path id="Path_28" data-name="Path 28" d="M0,12.5V85.417a22.914,22.914,0,0,0,22.917,22.917H95.833V12.5ZM62.75,66.417a6.246,6.246,0,1,1-8.833,8.833l-6-6-6,6a6.249,6.249,0,0,1-8.833-8.842l6-6-6-6a6.252,6.252,0,0,1,8.842-8.842l6,6,6-6a6.252,6.252,0,0,1,8.842,8.842l-6,6Z" transform="translate(0 91.667)"/>
                <path id="Path_29" data-name="Path 29" d="M85.417,0H12.5V95.833h95.833V22.917A22.914,22.914,0,0,0,85.417,0ZM81.25,54.167H43.75a6.25,6.25,0,0,1,0-12.5h37.5a6.25,6.25,0,1,1,0,12.5Z" transform="translate(91.667)"/>
                <path id="Path_30" data-name="Path 30" d="M12.5,12.5v95.833H85.417a22.914,22.914,0,0,0,22.917-22.917V12.5ZM79.167,79.167h-37.5a6.25,6.25,0,0,1,0-12.5h37.5a6.25,6.25,0,1,1,0,12.5Zm0-25h-37.5a6.25,6.25,0,0,1,0-12.5h37.5a6.25,6.25,0,1,1,0,12.5Z" transform="translate(91.667 91.667)" />
              </svg>
              <p class="pill-title">คำนวนความสามารถในการกู้</p>
            </a>
          </li>
          <li role="presentation">
            <a href="#payments_ability" data-toggle="pill" aria-controls="payments_ability" role="tab">
              <svg id="edit" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 55.5 55.5">
                <path id="Path_31" data-name="Path 31" d="M32.953,0H6.359A6.356,6.356,0,0,0,0,6.359V42.2a6.356,6.356,0,0,0,6.359,6.359H23.426l.509-2.844a6.44,6.44,0,0,1,1.758-3.4l13.621-13.6V6.359A6.356,6.356,0,0,0,32.953,0ZM9.25,9.25H18.5a2.312,2.312,0,0,1,0,4.625H9.25a2.313,2.313,0,0,1,0-4.625ZM20.812,32.375H9.25a2.313,2.313,0,0,1,0-4.625H20.812a2.312,2.312,0,0,1,0,4.625Zm9.25-9.25H9.25a2.313,2.313,0,0,1,0-4.625H30.062a2.312,2.312,0,0,1,0,4.625Z" />
                <path id="Path_32" data-name="Path 32" d="M13.512,40.177a1.735,1.735,0,0,1-1.707-2.037l1.226-6.949a1.741,1.741,0,0,1,.481-.925L30.682,13.1c2.109-2.114,4.181-1.542,5.314-.409l2.861,2.861a4.049,4.049,0,0,1,0,5.723l-17.17,17.17a1.709,1.709,0,0,1-.925.481l-6.949,1.226a1.653,1.653,0,0,1-.3.028Zm6.949-2.96h.023Z" transform="translate(15.459 15.323)" />
              </svg>
              <p class="pill-title">คำนวนยอดผ่อนชำระต่อเดือน</p>
            </a>
          </li>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="loan_capacity">
            <div class="calc-area-pane">
              <div class="row">
                <div class="col-sm-6 left">
                  <h4>รายได้เฉลี่ยต่อเดือน</h4>
                  <form>
                    <label for="income_form1">รายได้ต่อเดือน * (รวมรายได้ผู้ร่วมกู้(ถ้ามี))</label>
                    <div class="input-group">
                      <input id="income_form1" type="number" class="form-control" placeholder="50,000">
                      <div class="input-group-append">
                        <span class="input-group-text">บาท</span>
                      </div>
                    </div>
                    <label for="dept_form1">ภาระหนี้ต่อเดือน</label>
                    <div class="input-group">
                      <input id="dept_form1" type="number" class="form-control" placeholder="0">
                      <div class="input-group-append">
                        <span class="input-group-text">บาท</span>
                      </div>
                    </div>
                    <label for="period_form1">ระยะเวลาที่ขอกู้ (ปี)*</label>
                    <div class="input-group">
                      <input id="period_form1" type="number" class="form-control" placeholder="30">
                      <div class="input-group-append">
                        <span class="input-group-text">ปี</span>
                      </div>
                    </div>
                    <div class="input-group actions_btn">
                      <button class="calc-btn btn" id="calc_btn">เริ่มคำนวน</button>
                      <button class="calc-btn btn" id="reset1">เริ่มใหม่</button>
                    </div>
                  </form>
                </div>
                <div class="col-sm-6 right">
                  <div class="result">
                    <img class="header_icon" src="<?=get_template_directory_uri() . '/images/pre-approved/result_header_icon.png';?>" alt="">
                    <h4 class="result-title">ผลการคำนวน</h4>
                    <p id="loan_cap_line1">
                      <span class="pre_text">ท่านสามารถกู้ได้</span>
                      <span class="value">0</span>
                    </p>
                    <p id="payment_cap_line1">
                      <span class="pre_text">ยอดผ่อนชำระต่อเดือน</span>
                      <span class="value">0</span>
                    </p>
                  </div>
                  <p class="remark"><strong>หมายเหตุ :</strong> ยอดดังกล่าวเป็นเพียงการคำนวนอย่างคร่าว ๆ เท่านั้น กรุณาติดต่อเจ้าหน้าที่เพื่อรับการวิเคราะห์และคำนวนวงเงินกู้ที่ถูกต้อง</p>
                </div>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="payments_ability">
            <div class="calc-area-pane">
              <div class="row">
                <div class="col-sm-6 left">
                  <h4>คำนวณยอดผ่อนชำระต่อเดือน</h4>
                  <form>
                    <label for="expected_limit">วงเงินที่ต้องการกู้</label>
                    <div class="input-group">
                      <input id="expected_limit" type="number" class="form-control" placeholder="3,500,000">
                      <small class="text-red hide">กรุณากรอกวงเงินที่ต้องการกู้</small>
                      <div class="input-group-append">
                        <span class="input-group-text">บาท</span>
                      </div>
                    </div>
                    <label for="payment_years">ระยะเวลาที่ต้องการผ่อนชำระ</label>
                    <div class="input-group">
                      <input id="payment_years" type="number" class="form-control" placeholder="30">
                      <small class="text-red hide">กรุณาระบุระยะเวลาที่ต้องการผ่อนชำระ</small>
                      <div class="input-group-append">
                        <span class="input-group-text">ปี</span>
                      </div>
                    </div>

                    <div class="bank_listed">
                      <div class="row">
                        <div class="col-xs-12 col-sm-7">
                          <label for="">ธนาคาร</label>
                          <div class="dropdown">
                            <button id="bank" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <img class="bank_button_img" src="<?=$bank_int_rate[0]['bank_logo'];?>" alt="<?=$bank_int_rate[0]['bank_name'];?>">
                              <span class="bank_button_name"><?=$bank_int_rate[0]['bank_name'];?></span>
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                              <?php foreach ($bank_int_rate as $bank) : ?>
                                <li>
                                  <button class="bank" data-interest="<?=$bank['interest_rate'];?>">
                                    <img src="<?=$bank['bank_logo'];?>" alt="<?=$bank['bank_name'];?>">
                                    <span><?=$bank['bank_name'];?></span>
                                  </button>
                                </li>
                              <?php endforeach; ?>
                            </ul>
                          </div>
                          <small>อัพเดทอัตราดอกเบี้ยเมื่อวันที่ 19 พ.ค. 2563</small>
                        </div>
                        <div class="col-xs-12 col-sm-5">
                          <label for="bank_rate">อัตราดอกเบี้ย</label>
                          <div class="input-group">
                            <div id="bank_rate"><?=$bank_int_rate[0]['interest_rate'];?></div>
                            <div class="input-group-append">
                              <span class="input-group-text">%</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="input-group actions_btn">
                      <a class="calc-btn btn" id="ability_calc_btn">เริ่มคำนวน</a>
                      <a class="calc-btn btn" id="ability_reset_btn">เริ่มใหม่</a>
                    </div>
                  </form>
                </div>
                <div class="col-sm-6 right">
                  <div class="result">
                    <img class="header_icon" src="<?=get_template_directory_uri() . '/images/pre-approved/result_header_icon.png';?>" alt="">
                    <h4 class="result-title">ผลการคำนวน</h4>
                    <p id="loan_ability_line">
                      <span class="pre_text">วงเงินกู้สูงสุด</span>
                      <span class="value">0</span>
                    </p>
                    <p id="payment_cap_line">
                      <span class="pre_text">ยอดผ่อนชำระต่อเดือน</span>
                      <span class="value">0</span>
                    </p>
                  </div>
                  <p class="remark"><strong>หมายเหตุ :</strong> ยอดดังกล่าวเป็นเพียงการคำนวนอย่างคร่าว ๆ เท่านั้น กรุณาติดต่อเจ้าหน้าที่เพื่อรับการวิเคราะห์และคำนวนวงเงินกู้ที่ถูกต้อง</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_sidebar();
get_footer();
?>
