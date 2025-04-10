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
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li><a href="discuss.php">ناقش</a></li>
                <?php endif; ?>
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
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>