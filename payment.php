<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<link rel="stylesheet" href="assets/css/form.css">
<style>
/* تحسينات أساسية */
body {
  background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
  font-family: 'Montserrat', sans-serif;
}

/* تحسين حقول الإدخال */
input {
  border: 0px !important;
  border-bottom: 2px solid #4ecca3 !important;
  color: #e6e6e6 !important;
  border-radius: 0px !important;
  font-weight: bold !important;
  margin-bottom: 20px;
  background-color: rgba(26, 26, 46, 0.7) !important;
  padding: 12px 10px;
  transition: all 0.3s ease;
}

input:focus {
  box-shadow: 0 5px 15px rgba(0, 255, 157, 0.1) !important;
  border-bottom: 2px solid #00ff9d !important;
  background-color: rgba(26, 26, 46, 0.9) !important;
}

/* تحسين التسميات */
label {
  color: #4ecca3 !important;
  font-size: 16px;
  font-weight: 500;
  letter-spacing: 1px;
  transition: all 0.3s ease;
  text-transform: uppercase;
}

.input-group-addon {
  background-color: transparent;
  border-left: 0;
}

/* تحسين البطاقة */
.card-body {
  box-shadow: 0 10px 30px 0 rgba(0, 0, 0, 0.3);
  background: linear-gradient(135deg, rgba(22, 33, 62, 0.97) 0%, rgba(26, 26, 46, 0.97) 100%) !important;
  border: 1px solid #4ecca3;
  border-radius: 15px;
  padding: 30px;
  transition: all 0.3s ease;
}

.card-body:hover {
  box-shadow: 0 15px 35px 0 rgba(0, 255, 157, 0.2);
  transform: translateY(-5px);
}

@font-face {
  font-family: 'product sans';
  src: url('assets/css/Product Sans Bold.ttf');
}

/* تحسين العنوان الرئيسي */
h1 {
  font-size: 50px !important;
  margin-bottom: 30px;
  font-family: 'product sans' !important;
  font-weight: bolder;
  color: #00ff9d;
  text-shadow: 0 0 10px rgba(0, 255, 157, 0.3);
  letter-spacing: 2px;
}

.cc-number.identified {
  background-repeat: no-repeat;
  background-position-y: 3px;
  background-position-x: 99%;
}

.one-card > div {
  height: 150px;
  background-position: center center;
  background-repeat: no-repeat;
}

.two-card > div {
  height: 80px;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: contain;
  width: 48%;
}

.two-card div.amex-cvc-preview {
  float: right;
}

textarea:focus, 
textarea.form-control:focus, 
input.form-control:focus, 
input[type=text]:focus, 
input[type=password]:focus, 
input[type=email]:focus, 
input[type=number]:focus, 
[type=text].form-control:focus, 
[type=password].form-control:focus, 
[type=email].form-control:focus, 
[type=tel].form-control:focus, 
[contenteditable].form-control:focus {
  box-shadow: none;
  border-bottom: 2px solid #00ff9d !important;
}

/* تحسين زر الدفع */
.btn-lg {
  font-size: 18px;
  color: #1a1a2e;
  background: linear-gradient(135deg, #4ecca3 0%, #00ff9d 100%) !important;
  border: none;
  outline: none;
  padding: 12px 20px;
  cursor: pointer;
  transition: 0.5s all ease;
  border-radius: 50px;
  font-weight: 600;
  letter-spacing: 1px;
  box-shadow: 0 5px 15px rgba(0, 255, 157, 0.3);
}

.btn-lg:hover {
  background: linear-gradient(135deg, #00ff9d 0%, #4ecca3 100%) !important;
  color: #1a1a2e;
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(0, 255, 157, 0.4);
}

.btn-lg:active {
  transform: translateY(0);
}

footer {
  bottom: 0;
  width: 100%;
  height: 2.5rem;
  background: linear-gradient(90deg, #16213e 0%, #1a1a2e 100%);
  color: #4ecca3;
  border-top: 1px solid #4ecca3;
  padding: 15px 0;
}

/* تحسين أيقونات البطاقات */
.icon-container {
  display: flex;
  justify-content: space-between;
  margin: 15px 0;
}

.icon-container i {
  transition: all 0.3s ease;
  opacity: 0.7;
}

.icon-container i:hover {
  transform: scale(1.1);
  opacity: 1;
}

/* إضافة خط فاصل جذاب */
hr {
  border-color: rgba(78, 204, 163, 0.3);
  margin: 25px 0;
}

/* تحسين مظهر الـ popover */
.popover {
  background-color: #16213e;
  border: 1px solid #4ecca3;
}

.popover-header {
  background-color: #1a1a2e;
  color: #4ecca3;
  border-bottom: 1px solid #4ecca3;
}

.popover-body {
  color: #e6e6e6;
}

/* تحسين مظهر رسائل الخطأ */
.invalid-feedback {
  color: #ff6b6b;
  font-size: 14px;
  margin-top: -15px;
  margin-bottom: 15px;
}

/* تأثيرات إضافية للعناصر */
.form-group {
  position: relative;
  margin-bottom: 25px;
}

/* تحسين كامل للـ container */
.container-fluid {
  padding-top: 50px;
  padding-bottom: 50px;
}

/* تأثيرات الحركة عند التحميل */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in-up {
  animation: fadeInUp 0.5s ease-out forwards;
}

/* تعديلات إضافية لتنسيق الفورم */
.form-control {
  height: 50px;
}

.form-control::placeholder {
  color: rgba(230, 230, 230, 0.5);
}

/* ليبل متحرك */
.animate-label {
  font-size: 14px;
  transform: translateY(-20px);
  color: #00ff9d !important;
}
</style>
<?php if(isset($_SESSION['userId'])) {   ?> 
<main>
<?php
  if(isset($_GET['error'])) {
    if($_GET['error'] === 'sqlerror') {
        echo"<script>alert('Database error')</script>";
    } else if($_GET['error'] === 'noret') {
      echo"<script>alert('No return flight available')</script>";
    } else if($_GET['error'] === 'mailerr') {
      echo"<script>alert('Mail error')</script>";
    }
  }
?>
<div class="container-fluid py-3">
  <div class="row">
    <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto animate-fade-in-up">
      <h1 class="text-center text-light">PAY INVOICE</h1>
      <div id="pay-invoice" class="card">
        <div class="card-body">
          <label for="fname">Accepted Cards</label>
          <div class="icon-container">
            <i class="fa fa-cc-visa fa-3x" style="color:navy;"></i>
            <i class="fa fa-cc-amex fa-3x" style="color:blue;"></i>
            <i class="fa fa-cc-mastercard fa-3x" style="color:red;"></i>
            <i class="fa fa-cc-discover fa-3x" style="color:orange;"></i>
            <i class="fa fa-cc-stripe fa-3x" style="color:blue;"></i>
          </div>
          <hr>
          <form action="includes/payment.inc.php" method="post" 
              novalidate="novalidate" class="needs-validation">

            <div class="form-group">
              <label for="cc-number" class="control-label mb-1">Card number</label>
              <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" required autocomplete="off">
              <span class="invalid-feedback">Enter a valid 12 to 16 digit card number</span>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="cc-exp" class="control-label mb-1">Expiration</label>
                  <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" required placeholder="MM / YY" autocomplete="cc-exp">
                  <span class="invalid-feedback">Enter the expiration date</span>
                </div>
              </div>
              <div class="col-6 p-0">
                <label for="x_card_code" class="control-label mb-1">CVV</label>
                <div class="row">
                  <div class="col pr-0">
                    <input id="x_card_code" name="x_card_code" type="password" class="form-control cc-cvc" required autocomplete="off">
                  </div>
                  <div class="col pr-0">                            
                    <span class="invalid-feedback order-last">Enter the 3-digit code on back</span>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fa-question-circle fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="CVV" 
                          data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>"
                          data-trigger="hover"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <br/>

            <div class='form-row'>
              <div class='col-md-12 mb-2'>
                <button id="payment-button" type="submit" name="pay_but" class="btn btn-lg btn-primary btn-block">
                  <i class="fa fa-lock fa-lg"></i>&nbsp;
                  <span id="payment-button-amount">Pay </span>
                  <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
<?php subview('footer.php'); ?> 
<script>
// تحريك الليبل عند التركيز على الحقل
$(document).ready(function(){
  // تأثير التلاشي عند تحميل الصفحة
  $("#pay-invoice").addClass("animate-fade-in-up");
  
  $('.input-group input').focus(function(){
    me = $(this);
    $("label[for='"+me.attr('id')+"']").addClass("animate-label");
  });
  
  $('.input-group input').blur(function(){
    me = $(this);
    if (me.val() == ""){
      $("label[for='"+me.attr('id')+"']").removeClass("animate-label");
    }
  });
  
  // تحريك الليبل أيضًا للحقول العادية (غير المجموعات)
  $('.form-control').focus(function(){
    let id = $(this).attr('id');
    $("label[for='"+id+"']").addClass("animate-label");
  });
  
  $('.form-control').blur(function(){
    let id = $(this).attr('id');
    if ($(this).val() == ""){
      $("label[for='"+id+"']").removeClass("animate-label");
    }
  });
  
  // تحقق إذا كان الحقل يحتوي على قيمة عند تحميل الصفحة
  $('.form-control').each(function(){
    if($(this).val() !== ''){
      let id = $(this).attr('id');
      $("label[for='"+id+"']").addClass("animate-label");
    }
  });
});

// تفعيل popover
$(function () {
  $('[data-toggle="popover"]').popover()
})

// التحقق من صحة بيانات البطاقة عند النقر على زر الدفع
$("#payment-button").click(function(e) {
  var form = $(this).parents('form');
  
  var cvv = $('#x_card_code').val();
  var regCVV = /^[0-9]{3,4}$/;
  var CardNo = $('#cc-number').val();
  var regCardNo = /^[0-9]{12,16}$/;
  var date = $('#cc-exp').val().split('/');
  var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
  var regYear = /^20|21|22|23|24|25|26|27|28|29|30|31$/;
  
  if (form[0].checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
  }
  else {
    if (!regCardNo.test(CardNo)) {
      $("#cc-number").addClass('required');
      $("#cc-number").focus();
      alert("Enter a valid 10 to 16 card number");
      return false;
    }
    else if (!regCVV.test(cvv)) {
      $("#x_card_code").addClass('required');
      $("#x_card_code").focus();
      alert("Enter a valid CVV");
      return false;
    }
    else if (!regMonth.test(date[0]) && !regMonth.test(date[1])) {
      $("#cc_exp").addClass('required');
      $("#cc_exp").focus();
      alert("Enter a valid exp date");
      return false;
    }
    
    form.submit();
  }
  
  form.addClass('was-validated');
});

// إضافة تأثيرات نقرة للأزرار
$('.btn').on('mousedown', function(){
  $(this).css('transform', 'translateY(2px)');
});

$('.btn').on('mouseup mouseleave', function(){
  $(this).css('transform', '');
});

// تحديد نوع البطاقة تلقائيًا
$('#cc-number').on('input', function(){
  let cardNum = $(this).val().replace(/\s+/g, '');
  
  // إزالة جميع الفئات
  $(this).removeClass('visa mastercard amex discover');
  
  // تحديد نوع البطاقة
  if(cardNum.startsWith('4')){
    $(this).addClass('visa');
  } else if(cardNum.startsWith('5')){
    $(this).addClass('mastercard');
  } else if(cardNum.startsWith('3')){
    $(this).addClass('amex');
  } else if(cardNum.startsWith('6')){
    $(this).addClass('discover');
  }
});
</script>
<?php } ?>