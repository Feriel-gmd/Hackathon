<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAY - الأمن الغذائي</title>
    <link rel="stylesheet" href="css/part1.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/auth.css" />
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/fix-overlap.css">
    <link rel="stylesheet" href="css/weather.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Image Slider Section with Text -->
    <section id="food-security-slider" class="slider-section">
        <div class="slider">
            <div class="slider-text">
                <h2><i class="fas fa-seedling"></i> الامن الغذائي</h2>
                <p>
                    الأمن الغذائي هو حالة يتمكن فيها جميع الأشخاص، في جميع الأوقات، من الوصول إلى طعام كافٍ وآمن ومغذٍ لتلبية احتياجاتهم الغذائية وتفضيلاتهم من أجل حياة نشطة وصحية. يشمل ذلك ليس فقط توفر الطعام، ولكن أيضًا قدرة الأشخاص على تحمله والحصول عليه، واستخدامه بشكل صحيح من خلال التغذية الجيدة والنظافة، واستقرار هذه الظروف على مر الزمن. يعد الأمن الغذائي أمرًا أساسيًا لرفاهية الأفراد والتنمية المستدامة للمجتمعات، خاصة في المناطق المتأثرة بالفقر أو تغير المناخ أو الصراع.
                </p>
            </div>
            <div class="slider-images">
                <img src="images/img1.png" alt="Slide 1" class="slide active" />
                <img src="images/img2.png" alt="Slide 2" class="slide" />
                <img src="images/img3.jpeg" alt="Slide 3" class="slide" />
            </div>
        </div>
    </section>

    <!-- Tips Section Title -->
    <section class="tips-title-section">
        <h2 class="section-title"><i class="fas fa-lightbulb"></i> نصائح</h2>
    </section>

    <!-- Tips Section (Cards) -->
    <section id="tips-section" class="card-section">
        <div class="card-container">
            <div class="card">
                <div class="card-image">
                    <img src="images/3.jpg" alt="Card 1" />
                </div>
                <div class="card-text">
                    <h3>الزراعة المستدامة</h3>
                    <p>تبني تقنيات مثل الزراعة العضوية يعزز إنتاج طعام آمن ويحافظ على الموارد الطبيعية، مما يضمن توفر الغذاء بشكل مستدام.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="images/2.jpg" alt="Card 2" />
                </div>
                <div class="card-text">
                    <h3>الزراعة الحضرية</h3>
                    <p>تشجيع الزراعة في المدن يوفر مصدرًا مباشرًا للغذاء الطازج ويقلل الاعتماد على الإمدادات المستوردة، مما يعزز الأمن الغذائي المحلي.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="images/1.jpg" alt="Card 3" />
                </div>
                <div class="card-text">
                    <h3>زيادة التنوع الزراعي</h3>
                    <p>تنويع المحاصيل يعزز توافر الغذاء ويقلل من خطر فشل المحاصيل. كيف يساهم في الأمن الغذائي؟ يضمن توافر الغذاء في جميع الظروف المناخية.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Smart Farming Assistant Section -->
<section class="agriculture-assistant-section" style="background-color: #f8f8f8;">
    <div class="container">
        <h2 style="color:#2E7D32; text-align: center;"><i class="fas fa-leaf"></i> مساعد الزراعة الذكي</h2>
        
        <div class="form-section" style="background: #fff; padding: 20px; border-radius: 10px;">
            <div class="form-group">
                <label for="soil">نوع التربة</label>
                <select id="soil">
                    <option value="رملية">رملية</option>
                    <option value="طينية">طينية</option>
                    <option value="طفالية">طفالية</option>
                    <option value="طباشيرية">طباشيرية</option>
                    <option value="حامضية">حامضية</option>
                </select>
            </div>

            <div class="form-group">
                <label for="type">نوع الزرع</label>
                <select id="type">
                    <option value="غير محدد">غير محدد</option>
                    <option value="خضر">خضر</option>
                    <option value="فاكهة">فاكهة</option>
                </select>
            </div>

            <div class="form-group" id="fruitsGroup" style="display: none;">
                <label for="fruit">اختر الفاكهة</label>
                <select id="fruit">
                    <option value="تفاح">تفاح</option>
                    <option value="موز">موز</option>
                    <option value="برتقال">برتقال</option>
                    <option value="عنب">عنب</option>
                    <option value="رمان">رمان</option>
                    <option value="مشمش">مشمش</option>
                    <option value="مانجا">مانجا</option>
                    <option value="أفوكادو">أفوكادو</option>
                    <option value="ميرينغ">ميرينغ</option>
                    <option value="كمثرى">كمثرى</option>
                </select>
            </div>

            <div class="form-group" id="vegetablesGroup" style="display: none;">
                <label for="vegetable">اختر الخضار</label>
                <select id="vegetable">
                    <option value="طماطم">طماطم</option>
                    <option value="خيار">خيار</option>
                    <option value="بطاطا">بطاطا</option>
                    <option value="جزر">جزر</option>
                    <option value="فلفل">فلفل</option>
                    <option value="بامية">بامية</option>
                    <option value="قرنبيط">قرنبيط</option>
                    <option value="ملفوف">ملفوف</option>
                    <option value="كرنب">كرنب</option>
                    <option value="بصل">بصل</option>
                </select>
            </div>

            <div class="form-group">
                <label for="plantingDate">موعد الغرس</label>
                <input type="date" id="plantingDate">
            </div>

            <div class="form-group">
                <label for="notes">تفاصيل إضافية</label>
                <textarea id="notes" rows="3" placeholder="مثل الموقع، الظروف البيئية..."></textarea>
            </div>

            <div class="form-group">
                <button id="analyzeBtn">نصائح زراعية</button>
            </div>
            
            <div id="results" style="background:#eef; padding: 20px; margin-top: 20px; border-radius: 10px;"></div>
        </div>
    </div>
</section>

<section id="weather-section" class="section-weather">
    <div class="container">
        <h2 class="section-title"><i class="fas fa-cloud-sun"></i> حالة الطقس</h2>
        <div class="weather-container">
            <div class="weather-input">
                <div class="input-group">
                    <input type="text" id="city" class="form-control" placeholder="أدخل اسم المدينة">
                    <button onclick="getWeather()" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                        عرض الطقس
                    </button>
                </div>
            </div>
            <div class="weather-content">
                <div id="weather-loading" class="weather-loading" style="display: none;">
                    <i class="fas fa-spinner fa-spin loading-spinner"></i>
                    <p>جاري تحميل معلومات الطقس...</p>
                </div>
                <div id="weather-info" class="weather-info"></div>
                <div id="weather-advice" class="weather-advice"></div>
                <div id="weather-error" class="error-message" style="display: none;">
                    <i class="fas fa-exclamation-circle error-icon"></i>
                    <div class="error-content">
                        <h4>خطأ</h4>
                        <p>حدث خطأ أثناء جلب معلومات الطقس. يرجى المحاولة مرة أخرى.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="forecast" class="section-weather">
    <div class="container">
        <h2 class="section-title"><i class="fas fa-calendar-alt"></i> توقعات الأيام القادمة</h2>
        <div id="daily-forecast" class="forecast-container"></div>
    </div>
</section>

   
    <!-- Challenges Section -->
    <section id="challenges" class="challenges-section">
        <div class="container">
            <div class="content">
                <h3>محاصيل تُعتبر تحديًا أمام الأمن الغذائي في الجزائر:</h3>
                <br>
                <ul>
                    <li>القمح (اللين والصلب):</li>
                    <p>الجزائر من أكبر مستوردي القمح في العالم</p>
                    <br>
                    <li>الحبوب بشكل عام (الشعير، الذرة):</li>
                    <p>يُستخدم جزء كبير منها في تغذية الماشية، مما يزيد الضغط.</p>
                    <br>
                    <li>السكر:</li>
                    <p>الجزائر تستورد أغلب السكر الأبيض من الخارج.</p>
                </ul>
            </div>
            <div class="image">
                <img src="images/img.jpg" alt="Food Security Challenge" />
            </div>
        </div>
    </section>

    <!-- Donation Section -->
    <section id="donation-section" class="donation-section">
        <div class="donation-header">
            <h2><i class="fas fa-hand-holding-heart"></i> التبرع</h2>
        </div>

        <?php if(isset($_SESSION['success_message'])): ?>
            <div class="message success-message">
                <?php 
                echo $_SESSION['success_message']; 
                unset($_SESSION['success_message']);
                ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="message error-message">
                <?php 
                echo $_SESSION['error_message']; 
                unset($_SESSION['error_message']);
                ?>
            </div>
        <?php endif; ?>

        <div class="donation-form-container">
            <form class="donation-form" method="post" action="donate.php">
                <div class="form-group">
                    <label for="donation-type">بماذا سوف تتبرع؟</label>
                    <input type="text" id="donation-type" name="donation-type" placeholder="....حبوب ,فواكه, خضر" required/>
                </div>

                <div class="form-group">
                    <label for="weight">الوزن</label>
                    <input type="text" id="weight" name="weight" placeholder="كغ" required />
                </div>

                <div class="form-group">
                    <label for="algeria-cities">الولاية</label>
                    <select name="algeria-cities" id="algeria-cities" required>
                        <option value="">--اختر مدينة--</option>
                        <option value="Adrar">أدرار</option>
                        <option value="Chlef">الشلف</option>
                        <option value="Laghouat">الأغواط</option>
                        <option value="Oum El Bouaghi">أم البواقي</option>
                        <option value="Batna">باتنة</option>
                        <option value="Béjaïa">بجاية</option>
                        <option value="Biskra">بسكرة</option>
                        <option value="Béchar">بشار</option>
                        <option value="Blida">البليدة</option>
                        <option value="Bouira">البويرة</option>
                        <option value="Tamanrasset">تمنراست</option>
                        <option value="Tébessa">تبسة</option>
                        <option value="Tlemcen">تلمسان</option>
                        <option value="Tiaret">تيارت</option>
                        <option value="Tizi Ouzou">تيزي وزو</option>
                        <option value="Algiers">الجزائر</option>
                        <option value="Djelfa">الجلفة</option>
                        <option value="Jijel">جيجل</option>
                        <option value="Sétif">سطيف</option>
                        <option value="Saïda">سعيدة</option>
                        <option value="Skikda">سكيكدة</option>
                        <option value="Sidi Bel Abbès">سيدي بلعباس</option>
                        <option value="Annaba">عنابة</option>
                        <option value="Guelma">قالمة</option>
                        <option value="Constantine">قسنطينة</option>
                        <option value="Médéa">المدية</option>
                        <option value="Mostaganem">مستغانم</option>
                        <option value="M'Sila">المسيلة</option>
                        <option value="Mascara">معسكر</option>
                        <option value="Ouargla">ورقلة</option>
                        <option value="Oran">وهران</option>
                        <option value="El Bayadh">البيض</option>
                        <option value="Illizi">إليزي</option>
                        <option value="Bordj Bou Arréridj">برج بوعريريج</option>
                        <option value="Boumerdès">بومرداس</option>
                        <option value="El Tarf">الطارف</option>
                        <option value="Tindouf">تندوف</option>
                        <option value="Tissemsilt">تيسمسيلت</option>
                        <option value="El Oued">الوادي</option>
                        <option value="Khenchela">خنشلة</option>
                        <option value="Souk Ahras">سوق أهراس</option>
                        <option value="Tipaza">تيبازة</option>
                        <option value="Mila">ميلة</option>
                        <option value="Aïn Defla">عين الدفلى</option>
                        <option value="Naâma">النعامة</option>
                        <option value="Aïn Témouchent">عين تموشنت</option>
                        <option value="Ghardaïa">غرداية</option>
                        <option value="Relizane">غليزان</option>
                    </select>
                </div>

                <div class="form-group full-width">
                    <label for="city-answer">اي اضافات؟</label>
                    <textarea id="city-answer" name="city-answer" rows="5" placeholder="اكتب اضافتك هنا..."></textarea>
                </div>

                <div class="form-group full-width">
                    <button type="submit"><i class="fas fa-paper-plane"></i> إرسال التبرع</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h4>عن المشروع</h4>
                <p>المشروع الافضل لدعم الأمن الغذائي </p>
            </div>
            <div class="footer-section">
                <h4>روابط سريعة</h4>
                <ul>
                    <li><a href="#food-security-slider">الصفحة الرئيسية</a></li>
                    <li><a href="#tips-section">نصائح</a></li>
                    <li><a href="#donation-section">التبرع</a></li>
                    <li><a href="#challenges">التحديات</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>تواصل معنا</h4>
                <p><i class="fas fa-envelope"></i> البريد الالكتروني: info@fay.org</p>
                <p><i class="fas fa-phone"></i> الهاتف: 0123 456 789</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 جميع الحقوق محفوظة</p>
        </div>
    </footer>

    <script src="js/form.js"></script>
    <script src="js/part1.js"></script>
    <script src="js/script.js"></script>
</body>
</html> 