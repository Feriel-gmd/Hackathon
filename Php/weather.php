<section id="weather-section" class="section-weather container">
    <div class="weather-container">
        <h2 class="section-title"><i class="fas fa-cloud-sun"></i> حالة الطقس</h2>
        <div class="weather-input">
            <div class="input-group">
                <div class="search-wrapper">
                    <input type="text" id="city" class="form-control" placeholder="أدخل اسم المدينة">
                    <i class="fas fa-search search-icon"></i>
                </div>
                <button onclick="getWeather()" class="btn btn-primary">
                    عرض الطقس
                </button>
            </div>
        </div>
        <div class="weather-content">
            <div id="weather-info" class="weather-info"></div>
            <div id="weather-advice" class="weather-advice"></div>
            <div id="weather-error" class="error-message d-none">
                <i class="fas fa-exclamation-circle error-icon"></i>
                <div class="error-content">
                    <h4>خطأ</h4>
                    <p>حدث خطأ أثناء جلب معلومات الطقس. يرجى المحاولة مرة أخرى.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section id="forecast" class="section-weather">
    <div class="container">
        <h2 class="section-title"><i class="fas fa-calendar-alt"></i> توقعات الأيام القادمة</h2>
        <div id="daily-forecast" class="forecast-container"></div>
    </div>
</section>

    -->