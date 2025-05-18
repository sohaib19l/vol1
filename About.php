<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<link rel="stylesheet" href="assets/css/form.css">
<style>
  body {
    background: #1a1a2e; 
    font-family: 'Montserrat', sans-serif;
  }
  
  @font-face {
    font-family: 'product sans';
    src: url('assets/css/Product Sans Bold.ttf');
  }
  
  h1 {
    font-size: 46px !important;
    margin-bottom: 20px;  
    font-family: 'product sans' !important;
    font-weight: bolder;
    color: #00ff9d;
    text-align: center;
  }
  
  .about-container {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    background-color: rgba(22, 33, 62, 0.95) !important;
    padding: 40px;
    margin-top: 60px;
    margin-bottom: 60px;
    border-radius: 10px;
    border: 1px solid #4ecca3;
  }
  
  .about-section {
    color: #e6e6e6;
    margin-bottom: 30px;
  }
  
  .about-section h2 {
    color: #4ecca3;
    font-family: 'Montserrat', sans-serif;
    font-size: 26px;
    margin-bottom: 20px;
  }
  
  .about-section p {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 15px;
  }
  
  .team-section {
    margin-top: 40px;
    text-align: center;
  }
  
  .team-member {
    background-color: rgba(26, 26, 46, 0.7);
    border: 1px solid #4ecca3;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    transition: all 0.3s ease;
  }
  
  .team-member:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
  }
  
  .team-member img {
    height: 120px;
    width: 120px;
    border-radius: 50%;
    border: 3px solid #4ecca3;
    margin-bottom: 15px;
  }
  
  .team-member h3 {
    color: #00ff9d;
    font-size: 22px;
    margin-bottom: 5px;
  }
  
  .team-member p {
    color: #e6e6e6;
    font-size: 14px;
  }
  
  .feature-icon {
    font-size: 40px;
    color: #4ecca3;
    margin-bottom: 15px;
  }
  
  .feature-title {
    color: #00ff9d;
    font-size: 20px;
    margin-bottom: 10px;
  }
  
  .feature-description {
    color: #e6e6e6;
    font-size: 14px;
  }
  
  .feature-box {
    background-color: rgba(26, 26, 46, 0.7);
    border: 1px solid #4ecca3;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
  }
  
  .feature-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
  }
  
  footer {
    bottom: 0;
    width: 100%;
    height: 2.5rem;           
    background: #16213e;
    color: #4ecca3;
    border-top: 1px solid #4ecca3;
  }
</style>

<main>
  <div class="container">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 about-container">
        <h1>About Online Flight Booking</h1>
        
        <div class="about-section">
          <h2>Our Story</h2>
          <p>Welcome to Online Flight Booking, your trusted partner for all your travel needs. Established in 2022, we have been committed to providing our customers with the best flight booking experience possible. Our platform offers a seamless way to search, compare, and book flights to destinations worldwide.</p>
          <p>What started as a small project has grown into a comprehensive flight booking service that prides itself on user-friendly design, competitive prices, and excellent customer service. We believe that travel should be accessible to everyone, and our mission is to make that happen.</p>
        </div>
        
        <div class="about-section">
          <h2>Our Mission</h2>
          <p>Our mission is to simplify the travel booking process while providing our customers with the best value for their money. We strive to offer a reliable, efficient, and user-friendly platform that allows travelers to book flights with confidence and ease.</p>
        </div>
        
        <div class="about-section">
          <h2>Why Choose Us?</h2>
          <div class="row text-center mt-5">
            <div class="col-md-4 mb-4">
              <div class="feature-box">
                <div class="feature-icon">
                  <i class="fas fa-search"></i>
                </div>
                <h3 class="feature-title">Easy Search</h3>
                <p class="feature-description">Our advanced search engine helps you find the best flights based on your preferences in just a few clicks.</p>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="feature-box">
                <div class="feature-icon">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <h3 class="feature-title">Best Prices</h3>
                <p class="feature-description">We compare prices from multiple airlines to ensure you get the best deal possible for your journey.</p>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="feature-box">
                <div class="feature-icon">
                  <i class="fas fa-headset"></i>
                </div>
                <h3 class="feature-title">24/7 Support</h3>
                <p class="feature-description">Our dedicated customer support team is available round the clock to assist you with any queries.</p>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="feature-box">
                <div class="feature-icon">
                  <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Secure Booking</h3>
                <p class="feature-description">Your personal and payment information is always protected with our advanced security measures.</p>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="feature-box">
                <div class="feature-icon">
                  <i class="fas fa-mobile-alt"></i>
                </div>
                <h3 class="feature-title">Mobile Friendly</h3>
                <p class="feature-description">Book your flights on the go with our responsive website that works seamlessly on all devices.</p>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="feature-box">
                <div class="feature-icon">
                  <i class="fas fa-plane"></i>
                </div>
                <h3 class="feature-title">Wide Selection</h3>
                <p class="feature-description">Access to a vast network of airlines and routes to destinations worldwide.</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="about-section team-section">
          <h2>Meet Our Team</h2>
          <div class="row justify-content-center mt-4">
            <div class="col-md-4">
              <div class="team-member">
                <img src="/api/placeholder/120/120" alt="Sujoy Dcunha">
                <h3>Sujoy Dcunha</h3>
                <p>Founder & Lead Developer</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-member">
                <img src="/api/placeholder/120/120" alt="Christina Pereira">
                <h3>Christina Pereira</h3>
                <p>UI/UX Designer</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-member">
                <img src="/api/placeholder/120/120" alt="Mark Coutinho">
                <h3>Mark Coutinho</h3>
                <p>Customer Relations</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="about-section">
          <h2>Contact Us</h2>
          <p>Have questions or suggestions? We'd love to hear from you! Use our <a href="feedback.php" style="color: #00ff9d;">feedback form</a> to get in touch with us or send us an email at <span style="color: #00ff9d;">support@onlineflightbooking.com</span>.</p>
        </div>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>
  
  <?php subview('footer.php'); ?>
</main>

<footer>
  <em><h5 class="text-light text-center p-0 brand mt-2">
        <img src="assets/images/airtic.png" 
          height="40px" width="40px" alt="">				
      Online Flight Booking</h5></em>
  <p class="text-light text-center">&copy; <?php echo date('Y');?> - Developed By Berkane Sohaib , Bouberrima ilyes</p>
</footer>