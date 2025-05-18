<?php
echo "<h1>نظام حجز الرحلات يعمل بنجاح!</h1>";
echo "<p>هذه صفحة اختبار للتأكد من أن السيرفر يعمل بشكل صحيح.</p>";

// عرض معلومات المسار الحالي
echo "<div style='background:#f1f1f1; padding:10px; margin:10px 0;'>";
echo "<p><strong>معلومات تشخيصية:</strong></p>";
echo "<p>المسار الحالي: " . __DIR__ . "</p>";
echo "<p>اسم المضيف: " . $_SERVER['HTTP_HOST'] . "</p>";
echo "<p>مسار السكريبت: " . $_SERVER['SCRIPT_NAME'] . "</p>";
echo "</div>";

// روابط التنقل
echo "<h2>روابط الوصول:</h2>";
echo "<ul style='list-style-type:none; padding:10px; background:#e0f7ff;'>";

// رابط الصفحة الرئيسية
echo "<li style='margin:10px;'><a href='index.php' style='padding:10px; background:#4CAF50; color:white; text-decoration:none; border-radius:5px;'>الصفحة الرئيسية</a></li>";

// روابط متعددة لصفحة تسجيل الدخول بأشكال مختلفة
echo "<li style='margin:10px;'><a href='views/login.php' style='padding:10px; background:#2196F3; color:white; text-decoration:none; border-radius:5px;'>تسجيل الدخول (المسار النسبي)</a></li>";

echo "<li style='margin:10px;'><a href='/Sohaib-PHP/views/login.php' style='padding:10px; background:#2196F3; color:white; text-decoration:none; border-radius:5px;'>تسجيل الدخول (المسار المطلق)</a></li>";

// إضافة رابط مباشر لملف login.php الجديد
echo "<li style='margin:10px;'><a href='" . "http://" . $_SERVER['HTTP_HOST'] . "/Sohaib-PHP/views/login.php" . "' style='padding:10px; background:#FF5722; color:white; text-decoration:none; border-radius:5px;'>تسجيل الدخول (الرابط الكامل)</a></li>";

// إضافة رابط لصفحة تسجيل الدخول البسيطة
echo "<li style='margin:10px;'><a href='views/login_simple.php' style='padding:10px; background:#9C27B0; color:white; text-decoration:none; border-radius:5px;'>تسجيل الدخول (النسخة البسيطة)</a></li>";

echo "<li style='margin:10px;'><a href='login_test.php' style='padding:10px; background:#607D8B; color:white; text-decoration:none; border-radius:5px;'>تسجيل الدخول (نسخة اختبارية)</a></li>";
echo "</ul>";

// التحقق من وجود الملفات المهمة
echo "<h2>التحقق من الملفات:</h2>";
echo "<div style='background:#f9f9f9; padding:10px;'>";

$files_to_check = [
    'views/login.php',
    'helpers/helper.php',
    'helpers/init_conn_db.php',
    'index.php'
];

foreach ($files_to_check as $file) {
    if (file_exists($file)) {
        echo "<p style='color:green;'>✓ الملف $file موجود</p>";
    } else {
        echo "<p style='color:red;'>✗ الملف $file غير موجود</p>";
    }
}

echo "</div>";
?> 