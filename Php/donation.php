
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
