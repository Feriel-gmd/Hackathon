<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAY - الأمن الغذائي</title>
    <link rel="stylesheet" href="part1.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="auth.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Additional styles for donation section */
        .donation-section {
            padding: 40px 0;
            background-color: var(--background-color);
            margin-top: 40px;
        }
        
        .donation-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .donation-header h2 {
            font-size: 2.5rem;
            color: var(--primary-color);
            position: relative;
            display: inline-block;
        }
        
        .donation-header h2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .donation-form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .donation-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .donation-form .full-width {
            grid-column: 1 / -1;
        }
        
        .donation-form label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: var(--primary-color);
        }
        
        .donation-form input,
        .donation-form select,
        .donation-form textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .donation-form input:focus,
        .donation-form select:focus,
        .donation-form textarea:focus {
            border-color: var(--primary-color);
            outline: none;
        }
        
        .donation-form button {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 10px;
        }
        
        .donation-form button:hover {
            background-color: #1b5e20;
        }
        
        /* Success and error messages */
        .message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        /* Specific styles for the additional comments textarea */
        #city-answer {
            height: 120px;
            width: 100%;
            resize: vertical;
            min-height: 100px;
            max-height: 200px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <span class="logo-text">FAY</span>
            </div>
            <ul class="nav-links">
                <li><a href="#food-security-slider">الامن الغذائي</a></li>
                <li><a href="#tips-section">نصائح</a></li>
                <li><a href="#donation-section">التبرع</a></li>
                <li><a href="#challenges">التحديات</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"><i class="fas fa-user"></i> حساب</a>
                    <ul class="dropdown-menu">
                        <?php if(isset($_SESSION['user_id'])): ?>
                            <li><a href="#"><i class="fas fa-user-circle"></i> مرحباً <?php echo htmlspecialchars($_SESSION['user_name']); ?></a></li>
                            <li><a href="#"><i class="fas fa-history"></i> سجل تبرعاتي</a></li>
                            <li><a href="#"><i class="fas fa-cog"></i> إعدادات الحساب</a></li>
                            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> خروج</a></li>
                        <?php else: ?>
                            <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> تسجيل الدخول</a></li>
                            <li><a href="register.php"><i class="fas fa-user-plus"></i> انشاء حساب</a></li>
                            <li><a href="forgot_password.php"><i class="fas fa-key"></i> نسيت كلمة المرور</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

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
                <img src="img/img.jpg" alt="Food Security Challenge" />
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

    <script src="part1.js"></script>
</body>
</html> 