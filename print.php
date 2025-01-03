<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f8f8;
      }
      .sign-up-page {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .overlap-wrapper {
        display: flex;
        flex-direction: row;
        width: 80%;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .overlap {
        display: flex;
        flex-direction: row;
        width: 100%;
      }
      .rectangle {
        background-color: #4a90e2;
        width: 50%;
        padding: 50px;
        color: #ffffff;
      }
      .navigation-footer {
        display: flex;
        flex-direction: column;
        padding: 20px;
        background-color: #f8f8f8;
      }
      .items, .items-2, .items-3 {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-bottom: 10px;
      }
      .text-wrapper, .text-wrapper-2, .text-wrapper-3, .text-wrapper-4, .text-wrapper-5, .text-wrapper-6, .text-wrapper-7, .text-wrapper-8, .text-wrapper-9, .text-wrapper-10, .text-wrapper-11 {
        font-size: 14px;
        color: #333333;
      }
      .social-icons {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-top: 20px;
      }
      .buttons-icon {
        width: 30px;
        height: 30px;
      }
      .divider {
        margin-top: 20px;
        width: 100%;
      }
      .right {
        width: 50%;
        padding: 50px;
      }
      .frame-2 {
        display: flex;
        flex-direction: column;
      }
      .overlap-group, .overlap-group-2, .overlap-2, .overlap-3 {
        margin-bottom: 20px;
      }
      .rectangle-2, .rectangle-3, .rectangle-4 {
        background-color: #ffffff;
        border: 1px solid #cccccc;
        padding: 10px;
        width: 100%;
      }
      .log-in {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-top: 20px;
      }
      .text-wrapper-11 {
        color: #4a90e2;
        cursor: pointer;
      }
    </style>
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="sign-up-page">
      <div class="overlap-wrapper">
        <div class="overlap">
          <div class="rectangle"></div>
          <div class="navigation-footer">
            <div class="items">
              <div class="frame"><div class="text-wrapper">About Us</div></div>
              <div class="div">Store</div>
              <div class="div">Blog</div>
              <div class="div">Help</div>
            </div>
            <div class="items-2">
              <div class="text-wrapper-2">Privacy Policy</div>
              <div class="div">Complaints Policy</div>
              <div class="div">Order Policy</div>
              <div class="div">Return Policy</div>
            </div>
            <div class="items-3">
              <div class="text-wrapper-2">Terms &amp; Conditions</div>
              <div class="div">Terms of Service</div>
              <div class="div">Partner Policy</div>
              <div class="div">Become an Affiliate</div>
            </div>
            <div class="social-icons">
              <div class="buttons-icon">
                <div class="icon"><img class="img" src="img/icon-2.svg" /></div>
              </div>
              <div class="buttons-icon">
                <div class="icon"><img class="icon-2" src="img/icon.svg" /></div>
              </div>
              <div class="buttons-icon">
                <div class="icon"><img class="icon-3" src="img/icon-3.svg" /></div>
              </div>
              <div class="buttons-icon">
                <div class="icon"><img class="img" src="img/image.svg" /></div>
              </div>
            </div>
            <img class="divider" src="img/divider.svg" />
            <div class="text-wrapper-3">© OnlyFoods</div>
          </div>
          <div class="div-wrapper"><div class="text-wrapper-4">OnlyFoods</div></div>
          <p class="sign-up-to-enjoy-the">Sign up to enjoy the best food<br />at the best prices.</p>
          <div class="right">
            <div class="frame-2">
              <div class="overlap-group">
                <div class="rectangle-2"></div>
                <div class="text-wrapper-5">Password</div>
              </div>
              <div class="overlap-2">
                <div class="rectangle-3"></div>
                <div class="text-wrapper-6">Sign Up</div>
              </div>
              <div class="overlap-group-2">
                <div class="rectangle-2"></div>
                <div class="text-wrapper-7">Username</div>
              </div>
              <div class="overlap-3">
                <div class="rectangle-4"></div>
                <div class="text-wrapper-8">Name</div>
              </div>
              <div class="text-wrapper-9">Create Your Account</div>
              <div class="log-in">
                <div class="text-wrapper-10">Already have an account?</div>
                <div class="text-wrapper-11">Log in</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
