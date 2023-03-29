function formatCurrency(number) {
  number = parseFloat(number);
  return number.toFixed(2).replace(/./g, function (c, i, a) {
    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
  });
}

// คำนวนยอดผ่อนชำระต่อเดือน
function doCalculate(pa, y, r) {
  //let revenue = $("#txtrevenue").val();
  // let rate = r;
  // let loan = pa;
  // let year = y;

  let result = true;
  if (y === "") {
    result = false;
  }
  if (pa === "") {
    result = false;
  }
  if (result !== true) {
    alert('กรุณากรอกข้อมูลให้ครบถ้วน');
    return false;
  }

  let Year = parseInt(y);
  let month = Year * 12;
  let myloadamount = parseFloat(pa.replace(/,/g, ""));
  let interest = r;
  let Totalpricemonth = myloadamount * (interest / 100 / 12) / (1 - 1 / Math.pow((1 + (interest / 100 / 12)), month)); //เงินที่ต้องส่งทุกงวด
  let Totalincomes = formatCurrency(Totalpricemonth / 0.4);

  // $("#lblyear").html(Year);
  $("#loan_ability_line .value").html(myloadamount.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")); //ข้อมูลนี้ยังไม่แน่ใจ มีคำนวณเกี่ยวกับ รายรับต่อเดือนด้วยรึป่าว
  //$("#lblinstallment").html(Totalpricemonth.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
  $("#payment_cap_line .value").html(Totalpricemonth.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
  let loanForGetData = parseFloat(pa.replace(/,/g, "."));

  //$('#lbltotalincomes').html(Totalincomes);
}

// คำนวนความสามารถในการกู้
function doCalCLoanCap() {}

let bank_selector = $('.bank_listed .bank');
const bank_button = $('#bank');
const bank_rate = $('#bank_rate');
const ability_calc_btn = $('#ability_calc_btn');
const ability_reset_btn = $('#ability_reset_btn');
const payment_ability = $('#payments_ability');
let ex_lmt = payment_ability.find('#expected_limit');
let pa_y = payment_ability.find('#payment_years');
let b_r = payment_ability.find('#bank_rate');

bank_selector.on('click touch', function (e) {
  e.preventDefault();
  bank_button.find('.bank_button_name').html($(this).find('span').text());
  bank_button.find('.bank_button_img').attr('src', $(this).find('img').attr('src'));
  bank_rate.text($(this).data('interest'));
});

ability_calc_btn.on('click touch', function (e) {
  e.preventDefault();
  let pa = ex_lmt.val();
  let y = pa_y.val();
  let r = parseFloat(b_r.text());
  //console.log('pa: '+pa+', y: '+y+', r: '+r);
  doCalculate(pa, y, r);
});

ability_reset_btn.on('click touch', function (e) {
  e.preventDefault();
  ex_lmt.val('');
  pa_y.val('');
  $("#loan_ability_line .value").html('0');
  $("#payment_cap_line .value").html('0');
});

const loan_cap = $('#loan_capacity');
const income_mt = loan_cap.find('#income_form1');
const dept_mt = loan_cap.find('#dept_form1');
const p_mt = loan_cap.find('#period_form1');
const cap_calc_btn = $('#calc_btn');
const cap_reset_btn = $('#reset1');
const loan_cap_res = $('#loan_cap_line1');
const pay_cap_res = $('#payment_cap_line1');

cap_calc_btn.on('click touch', function (e) {
  e.preventDefault();
  let ic = income_mt.val();
  let dpt = dept_mt.val();
  let pt = 30;
  if(p_mt.val() !== '') {
    pt = p_mt.val();
  }
  // Find 70% of yearly income
  let yic = Math.round((ic*12)*0.7);
  // Find Annual Dept
  let ydpt = Math.round(dpt*12);
  // Find Annual Pay Capacity
  let apc = Math.round(yic - ydpt);
  // Find 30 years loan limit & Mount dept
  let llmt = Math.round(apc*pt);
  let mdpt = Math.round(apc/12);

  // console.log('Annual income = '+ic*12);
  // console.log('70% of annual income = '+Math.round(yic));
  // console.log('Annual dept = '+ydpt);
  // console.log('Annual pay capacity = '+apc);
  if (apc > Math.round(ic*0.3)) {
    //console.log('กู้ได้สูงสุด = '+llmt);
    loan_cap_res.find('.value').text(formatCurrency(llmt));
    //console.log('ผ่อนชำระต่อเดือน = '+mdpt);
    pay_cap_res.find('.value').text(formatCurrency(mdpt));
  } else {
    alert('ท่านไม่สามารถยื่นกู้ได้เนื่องจากความสามารถในการผ่อนชำระไม่เพียงพอ')
  }
});

cap_reset_btn.on('click touch', function (e) {
  e.preventDefault();
  income_mt.val('');
  dept_mt.val('');
  p_mt.val('');
  loan_cap_res.find('.value').html('0');
  pay_cap_res.find('.value').html('0');
});
