<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Document</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">
    <div class="content">
      
     
       <h3>محاصيل تُعتبر تحديًا أمام الأمن الغذائي في الجزائر:</h3>
       <br>
       <ul>
        <li> القمح (اللين والصلب):</li>
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
      <img src="img/img.jpg" alt="Sample Image" />
    </div>
  </div>

  <div class="donation-header">
    <h2>التبرع</h2>
  </div>

  <div class="donation-form-container">
    <form class="donation-form"  method="post" action="donate.php">
      <label for="donation-type">بماذا سوف تتبرع؟</label>
      <input type="text" id="donation-type" name="donation-type" placeholder="....حبوب ,فواكه, خضر" required/>

      <label for="weight">الوزن</label>
      <input type="text" id="weight" name="weight" placeholder="كغ" required />

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

      <label for="city-answer">اي اضافات؟</label>
      <textarea id="city-answer" name="city-answer" rows="7" cols="70" maxlength="600" placeholder="اكتب اضافتك هنا..."></textarea>

      <button type="submit">ارسال</button>
    </form>
  </div>

  <script src="script.js"></script>
</body>
<footer class="footer">
  <div class="footer-container">
    <div class="footer-section">
      <h4>عن المشروع</h4>
      <p>المشروع الافضل لدعم الأمن الغذائي </p>
    </div>
    <div class="footer-section">
      <h4>روابط سريعة</h4>
      <ul>
        <li><a href="#">الصفحة الرئيسية</a></li>
        <li><a href="#">من نحن؟</a></li>
        <li><a href="#">التبرع</a></li>
        <li><a href="#">اتصل بنا</a></li>
      </ul>
    </div>
    <div class="footer-section">
      <h4>تواصل معنا</h4>
      <p> البريد الالكتروني: @email.com</p>
      <p>الهاتف: 0123 456 789</p>

    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2025 جميع الحقوق محفوظة</p>
  </div>
</footer>

</html>
