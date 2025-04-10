class AgricultureHelper {
  constructor() {
    this.data = null;
    console.log('AgricultureHelper initialized');
    this.init();
  }

  async init() {
    console.log('Initializing AgricultureHelper');
    await this.loadData();
    this.setupEventListeners();
    this.updateCrops();
  }

  async loadData() {
    try {
      console.log('Loading data from js/plant_advice_data.json');
      const response = await fetch('js/plant_advice_data.json');
      this.data = await response.json();
      console.log('Data loaded successfully:', this.data);
      
      if (!this.data.التربة || typeof this.data.التربة !== 'object') {
        throw new Error('Invalid data structure');
      }
    } catch (error) {
      console.error('Failed to load data:', error);
      this.showError('فشل تحميل البيانات الزراعية');
    }
  }

  setupEventListeners() {
    console.log('Setting up event listeners');
    const soilSelect = document.getElementById('soil');
    const typeSelect = document.getElementById('type');
    const analyzeBtn = document.getElementById('analyzeBtn');
    
    if (soilSelect) {
      soilSelect.addEventListener('change', () => this.updateCrops());
      console.log('Soil select event listener added');
    } else {
      console.error('Soil select element not found');
    }
    
    if (typeSelect) {
      typeSelect.addEventListener('change', () => this.togglePlantOptions());
      console.log('Type select event listener added');
    } else {
      console.error('Type select element not found');
    }
    
    if (analyzeBtn) {
      analyzeBtn.addEventListener('click', () => this.analyzeInputs());
      console.log('Analyze button event listener added');
    } else {
      console.error('Analyze button element not found');
    }
  }

  togglePlantOptions() {
    const type = document.getElementById('type').value;
    const fruitsGroup = document.getElementById('fruitsGroup');
    const vegetablesGroup = document.getElementById('vegetablesGroup');
    
    if (type === 'فاكهة') {
      fruitsGroup.style.display = 'block';
      vegetablesGroup.style.display = 'none';
    } else if (type === 'خضر') {
      fruitsGroup.style.display = 'none';
      vegetablesGroup.style.display = 'block';
    } else {
      // Handle "غير محدد" option
      fruitsGroup.style.display = 'none';
      vegetablesGroup.style.display = 'none';
    }
    
    this.updateCrops();
  }

  updateCrops() {
    if (!this.data) {
      console.log('Data not loaded yet');
      return;
    }
    
    const soil = document.getElementById('soil').value;
    const type = document.getElementById('type').value;
    
    if (!soil) {
      console.log('No soil type selected');
      return;
    }
    
    if (!this.data.التربة[soil]) {
      console.error(`No data found for soil type: ${soil}`);
      return;
    }

    const fruits = this.data.التربة[soil].فاكهة || [];
    const vegetables = this.data.التربة[soil].خضر || [];
    
    this.populateDropdown('fruit', fruits);
    this.populateDropdown('vegetable', vegetables);
  }

  populateDropdown(elementId, items) {
    const dropdown = document.getElementById(elementId);
    if (!dropdown) {
      console.error(`Dropdown element not found: ${elementId}`);
      return;
    }
    
    if (!items || items.length === 0) {
      dropdown.innerHTML = '<option value="" disabled>لا توجد خيارات</option>';
      return;
    }
    
    dropdown.innerHTML = items.map(item => `<option value="${item}">${item}</option>`).join('');
  }

  analyzeInputs() {
    console.log('Analyzing inputs...');
    const soilType = document.getElementById('soil').value;
    const plantType = document.getElementById('type').value;
    
    // Handle "غير محدد" option
    if (plantType === 'غير محدد') {
      this.suggestCrops();
      return;
    }
    
    const specificPlant = plantType === 'فاكهة' 
      ? document.getElementById('fruit').value 
      : document.getElementById('vegetable').value;
    const plantingDate = document.getElementById('plantingDate').value;
    const notes = document.getElementById('notes').value;

    console.log('Input values:', {
      soilType,
      plantType,
      specificPlant,
      plantingDate,
      notes
    });

    // Validate required fields
    if (!soilType) {
      this.showError('الرجاء اختيار نوع التربة');
      return;
    }
    
    if (!plantType) {
      this.showError('الرجاء اختيار نوع المحصول');
      return;
    }
    
    if (!specificPlant) {
      this.showError('الرجاء اختيار نوع المحصول المحدد');
      return;
    }

    try {
      const soilData = this.data.التربة[soilType];
      if (!soilData) {
        console.error('Soil data not found for:', soilType);
        this.showError(`لم يتم العثور على بيانات التربة المحددة: ${soilType}`);
        return;
      }

      const plantCategory = plantType === 'فاكهة' ? 'فاكهة' : 'خضر';
      const plantData = soilData[plantCategory];
      
      if (!plantData || !plantData.includes(specificPlant)) {
        console.error('Plant data not found:', {
          soilType,
          plantCategory,
          specificPlant,
          availablePlants: plantData
        });
        this.showError(`لم يتم العثور على بيانات المحصول المحدد: ${specificPlant}`);
        return;
      }

      // Get plant details from the data
      const plantDetails = soilData.تفاصيل[specificPlant] || {
        مدة_النمو: 'غير محدد',
        الري: 'غير محدد',
        المواد: ['غير محدد'],
        نصائح: ['لا توجد نصائح متاحة']
      };

      // Get season based on planting date if provided
      const season = plantingDate ? this.getSeasonFromDate(plantingDate) : null;
      
      console.log('Found plant details:', {
        soilType,
        plantCategory,
        specificPlant,
        plantDetails,
        season
      });

      this.displayResults(specificPlant, soilType, plantDetails, season);
    } catch (error) {
      console.error('Error analyzing inputs:', error);
      this.showError('حدث خطأ أثناء تحليل المدخلات. الرجاء المحاولة مرة أخرى.');
    }
  }

  displayResults(plant, soil, details, season = null) {
    console.log('Displaying results for:', plant, soil, details, season);
    const resultsDiv = document.getElementById('results');
    if (!resultsDiv) {
      console.error('Results div not found');
      return;
    }
    
    const resultHTML = `
      <div class="result-card">
        <h3 class="result-title">
          <i class="fas fa-leaf"></i>
          نصائح زراعة ${plant} في تربة ${soil}
          ${season ? `<span class="season-badge">${season}</span>` : ''}
        </h3>
        
        <div class="result-details">
          ${details.مدة_النمو ? `
          <div class="result-detail">
            <i class="fas fa-hourglass-start"></i>
            <div class="detail-content">
              <h4>مدة النمو</h4>
              <p>${details.مدة_النمو}</p>
            </div>
          </div>` : ''}
          
          ${details.الري ? `
          <div class="result-detail">
            <i class="fas fa-tint"></i>
            <div class="detail-content">
              <h4>احتياجات الري</h4>
              <p>${details.الري}</p>
            </div>
          </div>` : ''}
          
          ${details.المواد?.length > 0 ? `
          <div class="result-detail">
            <i class="fas fa-flask"></i>
            <div class="detail-content">
              <h4>المواد المطلوبة</h4>
              <ul class="materials-list">
                ${details.المواد.map(material => `<li>${material}</li>`).join('')}
              </ul>
            </div>
          </div>` : ''}
          
          ${details.نصائح?.length > 0 ? `
          <div class="result-detail tips-section">
            <i class="fas fa-lightbulb"></i>
            <div class="detail-content">
              <h4>النصائح الزراعية</h4>
              <ul class="tips-list">
                ${details.نصائح.map(tip => `<li>${tip}</li>`).join('')}
              </ul>
            </div>
          </div>` : ''}
        </div>
      </div>
    `;
    
    resultsDiv.innerHTML = resultHTML;
    resultsDiv.style.display = 'block';
    console.log('Results displayed successfully');
  }

  suggestCrops() {
    const soil = document.getElementById('soil').value;
    
    if (!soil) {
      this.showError('الرجاء اختيار نوع التربة');
      return;
    }
    
    if (!this.data.التربة[soil]) {
      this.showError(`لم يتم العثور على بيانات التربة المحددة: ${soil}`);
      return;
    }
    
    const fruits = this.data.التربة[soil].فاكهة || [];
    const vegetables = this.data.التربة[soil].خضر || [];
    
    const html = `
      <div class="result-card">
        <h3 class="result-title">
          <i class="fas fa-seedling"></i>
          المحاصيل المناسبة لتربة ${soil}
        </h3>
        
        <div class="result-details">
          ${fruits.length > 0 ? `
          <div class="result-detail">
            <i class="fas fa-apple-alt"></i>
            <div class="detail-content">
              <h4>الفواكه المناسبة</h4>
              <ul class="materials-list">
                ${fruits.map(fruit => `<li>${fruit}</li>`).join('')}
              </ul>
            </div>
          </div>` : ''}
          
          ${vegetables.length > 0 ? `
          <div class="result-detail">
            <i class="fas fa-carrot"></i>
            <div class="detail-content">
              <h4>الخضروات المناسبة</h4>
              <ul class="materials-list">
                ${vegetables.map(vegetable => `<li>${vegetable}</li>`).join('')}
              </ul>
            </div>
          </div>` : ''}
          
          ${fruits.length === 0 && vegetables.length === 0 ? `
          <div class="error-message">
            <div class="error-icon">
              <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="error-content">
              <h4>تنبيه</h4>
              <p>لا توجد محاصيل مقترحة لهذه التربة</p>
            </div>
          </div>` : ''}
        </div>
      </div>
    `;
    
    const resultsDiv = document.getElementById('results');
    if (resultsDiv) {
      resultsDiv.innerHTML = html;
      resultsDiv.style.display = 'block';
    }
  }

  showError(message) {
    const html = `
      <div class="error-message">
        <div class="error-icon">
          <i class="fas fa-exclamation-circle"></i>
        </div>
        <div class="error-content">
          <h4>تنبيه</h4>
          <p>${message}</p>
        </div>
      </div>
    `;
    const resultsDiv = document.getElementById('results');
    if (resultsDiv) {
      resultsDiv.innerHTML = html;
      resultsDiv.style.display = 'block';
    }
  }

  getSeasonFromDate(dateStr) {
    const month = new Date(dateStr).getMonth() + 1;
    if ([12, 1, 2].includes(month)) return 'شتاء';
    if ([3, 4, 5].includes(month)) return 'ربيع';
    if ([6, 7, 8].includes(month)) return 'صيف';
    if ([9, 10, 11].includes(month)) return 'خريف';
    return null;
  }

  suggestCropsBySeason(soil, season) {
    if (!soil || !season) {
      this.showError('الرجاء اختيار نوع التربة والموسم');
      return;
    }
    
    if (!this.data.التربة[soil]) {
      this.showError(`لم يتم العثور على بيانات التربة المحددة: ${soil}`);
      return;
    }
    
    const seasonalCrops = this.data.المواسم[season] || [];
    const soilCrops = [
      ...(this.data.التربة[soil]?.خضر || []),
      ...(this.data.التربة[soil]?.فاكهة || [])
    ];

    const suitableCrops = soilCrops.filter(crop => seasonalCrops.includes(crop));
    
    // Get season icon
    let seasonIcon = 'fas fa-sun';
    if (season === 'شتاء') seasonIcon = 'fas fa-snowflake';
    else if (season === 'ربيع') seasonIcon = 'fas fa-seedling';
    else if (season === 'خريف') seasonIcon = 'fas fa-leaf';

    const html = `
      <div class="result-card">
        <h3 class="result-title">
          <i class="${seasonIcon}"></i>
          اقتراحات للزراعة في تربة ${soil} خلال ${season}
        </h3>
        
        <div class="result-details">
          ${suitableCrops.length > 0 ? `
          <div class="result-detail">
            <i class="fas fa-list"></i>
            <div class="detail-content">
              <h4>المحاصيل المناسبة</h4>
              <ul class="materials-list">
                ${suitableCrops.map(crop => `<li>${crop}</li>`).join('')}
              </ul>
            </div>
          </div>` : `
          <div class="error-message">
            <div class="error-icon">
              <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="error-content">
              <h4>تنبيه</h4>
              <p>لا توجد محاصيل مقترحة لهذه التربة خلال ${season}</p>
            </div>
          </div>`}
        </div>
      </div>
    `;

    const resultsDiv = document.getElementById('results');
    if (resultsDiv) {
      resultsDiv.innerHTML = html;
      resultsDiv.style.display = 'block';
    }
  }
}

window.addEventListener('DOMContentLoaded', () => new AgricultureHelper());

async function getWeather() {
    const city = document.getElementById('city').value;
    if (!city) {
        showWeatherError('الرجاء إدخال اسم المدينة');
        return;
    }

    const weatherInfo = document.getElementById('weather-info');
    const weatherAdvice = document.getElementById('weather-advice');
    const weatherError = document.getElementById('weather-error');

    // Clear previous results and errors
    weatherInfo.innerHTML = '';
    weatherAdvice.innerHTML = '';
    weatherError.style.display = 'none';

    // Show loading state
    weatherInfo.innerHTML = `
        <div class="weather-loading">
            <div class="loading-spinner">
                <i class="fas fa-spinner fa-spin"></i>
            </div>
            <p>جاري تحميل بيانات الطقس...</p>
        </div>
    `;

    try {
        const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=YOUR_API_KEY&units=metric&lang=ar`);
        const data = await response.json();

        if (data.cod === '404') {
            showWeatherError('لم يتم العثور على المدينة');
            return;
        }

        // Get weather icon based on weather condition
        const weatherIcon = getWeatherIcon(data.weather[0].id);
        const weatherClass = getWeatherClass(data.weather[0].id);

        // Display current weather with animation
        weatherInfo.innerHTML = `
            <div class="weather-card ${weatherClass}">
                <div class="weather-header">
                    <div class="weather-icon">
                        <i class="${weatherIcon}"></i>
                    </div>
                    <div class="weather-title">
                        <h3>${data.name}</h3>
                        <p class="weather-description">${data.weather[0].description}</p>
                    </div>
                </div>
                <div class="weather-metrics">
                    <div class="metric-item">
                        <i class="fas fa-temperature-high"></i>
                        <div class="metric-content">
                            <span class="metric-value">${Math.round(data.main.temp)}°C</span>
                            <span class="metric-label">درجة الحرارة</span>
                        </div>
                    </div>
                    <div class="metric-item">
                        <i class="fas fa-tint"></i>
                        <div class="metric-content">
                            <span class="metric-value">${data.main.humidity}%</span>
                            <span class="metric-label">الرطوبة</span>
                        </div>
                    </div>
                    <div class="metric-item">
                        <i class="fas fa-wind"></i>
                        <div class="metric-content">
                            <span class="metric-value">${data.wind.speed}</span>
                            <span class="metric-label">م/ث سرعة الرياح</span>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Provide agricultural advice with animation
        const advice = await getWeatherAdvice(data);
        weatherAdvice.innerHTML = `
            <div class="advice-card">
                <div class="advice-header">
                    <i class="fas fa-lightbulb"></i>
                    <h3>نصائح زراعية</h3>
                </div>
                <div class="advice-content">
                    ${advice.map(tip => `
                        <div class="advice-item">
                            <i class="fas fa-check-circle"></i>
                            <p>${tip}</p>
                        </div>
                    `).join('')}
                </div>
            </div>
        `;

        // Add animation classes after a small delay
        setTimeout(() => {
            document.querySelector('.weather-card').classList.add('animate-in');
            document.querySelector('.advice-card').classList.add('animate-in');
        }, 100);

    } catch (error) {
        showWeatherError('حدث خطأ أثناء جلب بيانات الطقس');
        console.error('Weather API Error:', error);
    }
}

function getWeatherIcon(weatherId) {
    // Weather icon mapping based on OpenWeatherMap weather codes
    if (weatherId >= 200 && weatherId < 300) return 'fas fa-bolt';
    if (weatherId >= 300 && weatherId < 400) return 'fas fa-cloud-rain';
    if (weatherId >= 500 && weatherId < 600) return 'fas fa-cloud-showers-heavy';
    if (weatherId >= 600 && weatherId < 700) return 'fas fa-snowflake';
    if (weatherId >= 700 && weatherId < 800) return 'fas fa-smog';
    if (weatherId === 800) return 'fas fa-sun';
    if (weatherId > 800) return 'fas fa-cloud';
    return 'fas fa-cloud';
}

function getWeatherClass(weatherId) {
    // Weather class mapping for different weather conditions
    if (weatherId >= 200 && weatherId < 300) return 'weather-thunder';
    if (weatherId >= 300 && weatherId < 400) return 'weather-drizzle';
    if (weatherId >= 500 && weatherId < 600) return 'weather-rain';
    if (weatherId >= 600 && weatherId < 700) return 'weather-snow';
    if (weatherId >= 700 && weatherId < 800) return 'weather-fog';
    if (weatherId === 800) return 'weather-clear';
    if (weatherId > 800) return 'weather-clouds';
    return 'weather-default';
}

async function getWeatherAdvice(weatherData) {
    const temp = weatherData.main.temp;
    const humidity = weatherData.main.humidity;
    const windSpeed = weatherData.wind.speed;
    const weatherCondition = weatherData.weather[0].description;

    let advice = [];

    // Temperature advice
    if (temp < 10) {
        advice.push('درجات الحرارة منخفضة، احمِ محاصيلك من الصقيع');
    } else if (temp > 35) {
        advice.push('درجات الحرارة مرتفعة، قم بري المحاصيل بشكل متكرر');
    }

    // Humidity advice
    if (humidity > 80) {
        advice.push('الرطوبة مرتفعة، راقب ظهور الأمراض الفطرية');
    } else if (humidity < 30) {
        advice.push('الرطوبة منخفضة، زد من ري المحاصيل');
    }

    // Wind advice
    if (windSpeed > 20) {
        advice.push('الرياح قوية، تجنب رش المبيدات');
    }

    // Weather condition specific advice
    if (weatherCondition.includes('ممطر')) {
        advice.push('تأجيل الري لتجنب تشبع التربة');
    } else if (weatherCondition.includes('عاصف')) {
        advice.push('تثبيت النباتات باستخدام دعامات');
    }

    // If no specific advice, provide general advice
    if (advice.length === 0) {
        advice.push('الظروف الجوية مناسبة للزراعة');
    }

    return advice;
}

function showWeatherError(message) {
    const weatherError = document.getElementById('weather-error');
    weatherError.innerHTML = `
        <div class="error-message animate-in">
            <div class="error-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="error-content">
                <h4>تنبيه</h4>
                <p>${message}</p>
            </div>
        </div>
    `;
    weatherError.style.display = 'block';
}
