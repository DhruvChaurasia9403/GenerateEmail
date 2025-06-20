# XKCDMailer 🎯

A PHP-based email subscription system that sends users a random XKCD comic every 24 hours via email. It includes email verification, unsubscription, and CRON job automation—all without using a database!

---

## 🚀 Features

- ✅ Email verification using a 6-digit code  
- ✅ Daily XKCD comic delivery using a CRON job  
- ✅ Unsubscribe mechanism with confirmation  
- ✅ Emails sent in **HTML format**  
- ✅ All emails stored in `registered_emails.txt` (no database)

---

## 📁 Project Structure

project-root/
│
├── src/
│ ├── index.php # Main email subscription and verification form
│ ├── functions.php # Core backend logic
│ ├── unsubscribe.php # Unsubscribe logic & confirmation
│ ├── cron.php # Fetch & send XKCD comics daily
│ └── setup_cron.sh # Shell script to register CRON job
│
├── registered_emails.txt # Email storage (plaintext file)
├── README.md # This file

yaml
Copy
Edit

---

## 🧠 How It Works

1. ✉️ User submits email through the form  
2. 🔐 A 6-digit verification code is emailed to them  
3. ✅ Once verified, the email is stored in `registered_emails.txt`  
4. ⏰ A CRON job runs every 24 hours to fetch and email a random XKCD comic  
5. ❌ Each comic email includes an unsubscribe link, requiring verification before removal

---

## 🛠 Setup Instructions

### 1️⃣ Clone the Repository


git clone https://github.com/<your-username>/XKCDMailer.git
cd XKCDMailer/src
2️⃣ Setup the CRON Job
bash
Copy
Edit
chmod +x setup_cron.sh
./setup_cron.sh
This script will schedule a CRON job that executes cron.php every 24 hours.

📩 Email Templates
🔐 Verification Email
Subject: Your Verification Code

html
Copy
Edit
<p>Your verification code is: <strong>123456</strong></p>
📬 XKCD Comic Email
Subject: Your XKCD Comic

html
Copy
Edit
<h2>XKCD Comic</h2>
<img src="image_url_here" alt="XKCD Comic">
<p><a href="#" id="unsubscribe-button">Unsubscribe</a></p>
❌ Unsubscribe Confirmation Email
Subject: Confirm Un-subscription

html
Copy
Edit
<p>To confirm un-subscription, use this code: <strong>654321</strong></p>
🧪 Required Input Fields & IDs
Feature	Input name	Button id
Email submission	email	submit-email
Code verification	verification_code	submit-verification
Unsubscribe email	unsubscribe_email	submit-unsubscribe
Unsubscribe code	verification_code	submit-verification

⚠️ Rules Followed
✅ No hardcoded emails or codes

✅ No database usage

✅ All code inside src/ only

✅ HTML-formatted emails only

✅ Working CRON job implementation

📌 Tech Used
PHP (v8.3 recommended)

CRON scheduler

Plaintext file for data storage

👨‍💻 Author
Dhruv Chaurasia

GitHub: DhruvChaurasia9403

📎 Bonus: Test Locally
Use PHP's built-in server:

bash
Copy
Edit
php -S localhost:8000
[Then open: http://localhost:8000/src](http://localhost/xkcd-DhruvChaurasia9403/src/)

📦 Optional APK / Deployment
If you have a mobile version or want to share the build, upload the .apk under Releases and add the link below:

markdown
Copy
Edit
📥 [Download APK](https://github.com/your-repo/releases/tag/v1.0.0)
vbnet
Copy
Edit
