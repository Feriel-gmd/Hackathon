
    <!-- Smart Farming Assistant Section -->
<section class="agriculture-assistant-section">
    <div class="container">
        <h2 ><i class="fas fa-leaf"></i> مساعد الزراعة الذكي</h2>
        <div class="form-section">
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
