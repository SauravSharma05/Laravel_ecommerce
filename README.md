# 🛒 My Laravel E-commerce Project

Hi there! Welcome to my **Simple E-commerce Shopping Cart**. 

I built this project to demonstrate my skills with **Laravel 10**, **Livewire**, and **Tailwind CSS**. My goal wasn't just to make a pretty interface, but to build a backend that handles real-world scenarios correctly—like managing stock in real-time and ensuring data integrity during checkout.

## 💡 Why I Built This
I wanted to move beyond basic CRUD applications and tackle some specific challenges in e-commerce development:
* **State Management:** How to keep a cart persistent across devices without relying solely on sessions.
* **Data Integrity:** Ensuring that if two people buy the last item at the same time, the system handles it gracefully (Atomic Transactions).
* **Background Processing:** improved user experience by offloading email sending to background queues.

## 🌟 Key Features I Implemented

### 1. Dynamic Shopping Cart (SPA Feel)
I used **Livewire** to make the cart feel instant. You can add items, update quantities, and remove products without the page ever reloading. I also added a little "Red Dot" notification in the navbar that updates in real-time.

### 2. Smart Checkout Logic
The checkout process is wrapped in a **Database Transaction**. This means the Order creation, Order Item creation, and Stock deduction all happen as a single unit. If one part fails, everything rolls back. No "ghost orders" here!

### 3. Background Jobs & Queues
To keep the app fast, I set up a Queue system.
* **Low Stock Alert:** If a product's stock drops below 5 after a purchase, the system queues a job to email the admin. The user doesn't have to wait for this email to send—it happens in the background.

### 4. Automated Reporting
I set up a **Cron Job (Scheduler)**. Every evening at 8:00 PM, the system automatically queries that day's sales and emails a report to the admin.

---

## 🛠️ The Tech Stack

* **Framework:** Laravel 10
* **Frontend:** Livewire 3 + Blade
* **Styling:** Tailwind CSS (Responsive)
* **Database:** MySQL
* **Tools:** Vite, Alpine.js
* **Database Name:** laravel_ecommerce

---

## 🚀 How to Run This on Your Machine

If you want to test this out locally, here are the steps:

**1. Clone the repo**
```bash
git clone [https://github.com/YOUR_USERNAME/laravel_ecommerce.git](https://github.com/YOUR_USERNAME/laravel_ecommerce.git)
cd laravel_ecommerce
