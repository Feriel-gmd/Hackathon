class AgricultureHelper {
  constructor() {
    this.data = null;
    this.init();
  }

  async init() {
    await this.loadData();
    this.setupEventListeners();
    this.updateCrops();
  }

  async loadData() {
    try {
      const response = await fetch('plant_advice_data.json');
      this.data = await response.json();
      
      if (!this.data.التربة || typeof this.data.التربة !== 'object') {
        throw new Error('Invalid data structure');
      }
    } catch (error) {
      console.error('Failed to load data:', error);
      this.showError('فشل تحميل البيانات الزراعية');
    }
  }

  setupEventListeners() {
    document.getElementById('soil').addEventListener('change', () => this.updateCrops());
    document.getElementById('type').addEventListener('change', () => this.togglePlantOptions());
    document.getElementById('analyzeBtn').addEventListener('click', () => this.analyzeInputs());
  }

  togglePlantOptions() {
    const type = document.getElementById('type').value;
    document.getElementById('fruitsGroup').style.display = type === 'فاكهة' ? 'block' : 'none';
    document.getElementById('vegetablesGroup').style.display = type === 'خضر' ? 'block' : 'none';
    this.updateCrops();
  }

  updateCrops() {
    if (!this.data) return;
    
    const soil = document.getElementById('soil').value;
    const type = document.getElementById('type').value;
    
    if (!this.data.التربة[soil]) {
      this.showError(`لا توجد بيانات لتربة ${soil}`);
      return;
    }

    const fruits = this.data.التربة[soil].فاكهة || [];
    const vegetables = this.data.التربة[soil].خضر || [];
    
    this.populateDropdown('fruit', fruits);
    this.populateDropdown('vegetable', vegetables);
  }

  populateDropdown(elementId, items) {
    const dropdown = document.getElementById(elementId);
    dropdown.innerHTML = items.length > 0
      ? items.map(item => `<option value="${item}">${item}</option>`).join('')
      : '<option value="" disabled>لا توجد خيارات</option>';
  }

  analyzeInputs() {
  if (!this.data) {
    this.showError('البيانات غير متاحة بعد');
    return;
  }

  const soil = document.getElementById('soil').value;
  const type = document.getElementById('type').value;
  const date = document.getElementById('plantingDate').value;

  if (!soil || !type || !date) {
    this.showError('يرجى ملء جميع الحقول المطلوبة بما في ذلك موعد الغرس');
    return;
  }

  const season = this.getSeasonFromDate(date);

  if (type === 'غير محدد') {
    return this.suggestCropsBySeason(soil, season);
  }

  const plant = type === 'فاكهة' 
    ? document.getElementById('fruit').value 
    : document.getElementById('vegetable').value;

  if (!plant) {
    this.showError('يرجى اختيار المحصول');
    return;
  }

  const details = this.data.التربة[soil]?.تفاصيل?.[plant];
  if (!details) {
    this.showError('لا توجد بيانات متاحة لهذه التوليفة');
    return;
  }

  this.displayResults(plant, soil, details, season);
}


  displayResults(plant, soil, details, season = null) {
  const resultHTML = `
    <div class="result-card">
      <h3>نصائح زراعة ${plant} في تربة ${soil}${season ? ` خلال ${season}` : ''}</h3>
      ${details.مدة_النمو ? `
      <div class="result-detail">
        <i class="fas fa-hourglass-start"></i>
        <span>مدة النمو: ${details.مدة_النمو}</span>
      </div>` : ''}
      ${details.الري ? `
      <div class="result-detail">
        <i class="fas fa-tint"></i>
        <span>احتياجات الري: ${details.الري}</span>
      </div>` : ''}
      ${details.المواد?.length > 0 ? `
      <div class="result-detail">
        <i class="fas fa-flask"></i>
        <span>المواد المطلوبة: ${details.المواد.join('، ')}</span>
      </div>` : ''}
      ${details.نصائح?.length > 0 ? `
      <div class="tips-section">
        <h4>النصائح الزراعية:</h4>
        <ul>
          ${details.نصائح.map(tip => `<li>${tip}</li>`).join('')}
        </ul>
      </div>` : ''}
    </div>
  `;
  document.getElementById('results').innerHTML = resultHTML;
}


  suggestCrops() {
    const soil = document.getElementById('soil').value;
    const crops = [
      ...(this.data.التربة[soil]?.خضر || []),
      ...(this.data.التربة[soil]?.فاكهة || [])
    ];
    
    const html = crops.length > 0
      ? `<div class="suggestion">
           <h3>المحاصيل المناسبة لتربة ${soil}:</h3>
           <ul>${crops.map(c => `<li>${c}</li>`).join('')}</ul>
         </div>`
      : '<div class="warning">لا توجد محاصيل مقترحة لهذه التربة</div>';
    
    document.getElementById('results').innerHTML = html;
  }

  showError(message) {
    const html = `
      <div class="error-message">
        <i class="fas fa-exclamation-triangle"></i>
        ${message}
      </div>
    `;
    document.getElementById('results').innerHTML = html;
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
  const seasonalCrops = this.data.المواسم[season] || [];
  const soilCrops = [
    ...(this.data.التربة[soil]?.خضر || []),
    ...(this.data.التربة[soil]?.فاكهة || [])
  ];

  const suitableCrops = soilCrops.filter(crop => seasonalCrops.includes(crop));

  const html = suitableCrops.length > 0
    ? `<div class="suggestion">
         <h3>اقتراحات للزراعة في تربة ${soil} خلال ${season}:</h3>
         <ul>${suitableCrops.map(c => `<li>${c}</li>`).join('')}</ul>
       </div>`
    : `<div class="warning">لا توجد محاصيل مقترحة لهذه التربة خلال ${season}</div>`;

  document.getElementById('results').innerHTML = html;
}

}

window.addEventListener('DOMContentLoaded', () => new AgricultureHelper());

