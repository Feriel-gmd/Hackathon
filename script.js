const API_KEY = 'c2ff2d85c6749b4e412a459c1bbfe0f5';
  let weatherData = [];

  // تحميل بيانات النصائح
  fetch('weather_advice.json')
      .then(response => response.json())
      .then(data => {
          weatherData = data.map(item => ({
              ...item,
              weather: item.weather.trim().toLowerCase(),
              temperature: parseFloat(item.temperature),
              humidity: parseFloat(item.humidity),
              wind_speed: parseFloat(item.wind_speed)
          }));
          console.log("بيانات النصائح جاهزة");
      })
      .catch(error => console.error("خطأ في تحميل البيانات:", error));

  // دالة حساب التشابه النصي
  function calculateStringSimilarity(str1, str2) {
      const words1 = new Set(str1.split(' '));
      const words2 = new Set(str2.split(' '));
      const common = [...words1].filter(word => words2.has(word)).length;
      const maxLen = Math.max(str1.length, str2.length);
      return (common / maxLen) * 0.6 + (1 - Math.abs(str1.length - str2.length)/maxLen) * 0.4;
  }

  // دالة الحصول على النصائح المطورة
  function getAgriculturalAdvice(description, temperature, humidity, windSpeedKmh) {
      const normalizedDesc = description.trim().toLowerCase();
      
      // حساب الدرجات لكل مدخل
      const scored = weatherData.map(item => {
          // تشابه الوصف
          const descScore = calculateStringSimilarity(normalizedDesc, item.weather);
          
          // تشابه العوامل العددية
          const tempScore = Math.max(0, 1 - Math.abs(item.temperature - temperature)/20);
          const humidityScore = Math.max(0, 1 - Math.abs(item.humidity - humidity)/50);
          const windScore = Math.max(0, 1 - Math.abs(item.wind_speed - windSpeedKmh)/30);
          
          // حساب الدرجة الكلية مع وزن العوامل
          const totalScore = 
              descScore * 0.4 +
              tempScore * 0.3 +
              humidityScore * 0.2 +
              windScore * 0.1;
          
          return { ...item, score: totalScore };
      });

      // اختيار أفضل 3 نتائج
      scored.sort((a, b) => b.score - a.score);
      
      // إذا كانت أفضل نتيجة أعلى من 60% تشابه
      if (scored[0]?.score > 0.6) {
          return scored[0].advice;
      }
      
      // نصائح عامة إذا لم توجد مطابقة جيدة
      return [
          "الري حسب احتياجات النبات",
          "الحماية من التقلبات الجوية",
          "الفحص الدوري للنباتات"
      ];
  }

  // دالة عرض النتائج
  function displayResults(description, temperature, humidity, windSpeed) {
      const advice = getAgriculturalAdvice(description, temperature, humidity, windSpeed);
      
      document.getElementById('weather').innerHTML = `
          <h3>حالة الطقس الحالية:</h3>
          <p>الحالة: ${description}</p>
          <p>الحرارة: ${temperature.toFixed(1)}°C</p>
          <p>الرطوبة: ${humidity}%</p>
          <p>سرعة الرياح: ${windSpeed.toFixed(1)} كم/ساعة</p>
      `;

      document.getElementById('advice').innerHTML = `
          <h3>النصائح الزراعية:</h3>
          <ul class="advice-list">
              ${advice.map(item => `<li>${item}</li>`).join('')}
          </ul>
      `;
  }

  // دالة الحصول على بيانات الطقس
  function getWeather() {
      const city = document.getElementById('city').value.trim();
      if (!city) return alert("أدخل اسم المدينة!");

      fetch(`https://api.openweathermap.org/data/2.5/forecast?q=${city}&units=metric&lang=ar&appid=${API_KEY}`)
          .then(response => {
              if (!response.ok) throw new Error('فشل في الحصول على البيانات');
              return response.json();
          })
          .then(data => {
              const today = data.list[0];
              const windSpeedKmh = today.wind.speed * 3.6; // تحويل من m/s إلى km/h
              
              displayResults(
                  today.weather[0].description,
                  today.main.temp,
                  today.main.humidity,
                  windSpeedKmh
              );

              // عرض التوقعات للأيام القادمة
              const forecastDiv = document.getElementById('daily-forecast');
              forecastDiv.innerHTML = '';
              
              for (let i = 7; i < data.list.length; i += 8) {
                  const item = data.list[i];
                  const date = new Date(item.dt * 1000);
                  forecastDiv.innerHTML += `
                      <div class="daily-item">
                          <h4>${date.toLocaleDateString('ar-EG')}</h4>
                          <p>${item.weather[0].description}</p>
                          <p>الحرارة: ${item.main.temp}°C</p>
                      </div>
                  `;
              }
          })
          .catch(error => {
              console.error(error);
              document.getElementById('weather').innerHTML = '<p>لا يمكن الحصول على بيانات الطقس</p>';
          });
  }