# Laravel_ecommerce
I built a simple online store using Laravel and Livewire. I used this project to learn how to make interactive sites with PHP.

# Simple Laravel E-commerce Shopping Cart

A robust, single-page-application (SPA) feel e-commerce system built with **Laravel 10**, **Livewire**, and **Tailwind CSS**. This project features real-time stock management, database transactions, background job processing for email notifications, and automated daily reporting.

## 🚀 Features

* **User Authentication:** Secure login and registration using Laravel Breeze.
* **Product Dashboard:** Browse products with real-time stock visibility.
* **Dynamic Shopping Cart:**
    * Add items, update quantities, and remove items without page reloads.
    * Cart data is stored in the database (persistent across devices).
    * Real-time "Red Dot" notification count in the navigation bar.
* **Smart Checkout:**
    * Atomic Database Transactions ensure order integrity.
    * Automatic stock deduction upon purchase.
* **Background Jobs & Queues:**
    * **Low Stock Alert:** Automatically emails the admin when product stock drops below 5.
    * **Async Processing:** Checkout is instant; emails are sent in the background.
* **Task Scheduling:**
    * **Daily Sales Report:** A Cron job runs every evening at 20:00 to email a summary of the day's sales.
* **UI/UX:**
    * Global "Toast" notifications (popups) for success/error messages.
    * Responsive design for Desktop and Mobile.

## 🛠️ Tech Stack

* **Backend:** Laravel 10 (PHP 8.1+)
* **Frontend:** Livewire 3, Blade Templates
* **Styling:** Tailwind CSS
* **Database:** MySQL
* **Queue Driver:** Database / Sync
* **Mail Driver:** SMTP (Gmail) / Log
* **Database Name:**laravel_ecommerce

---

```bash
git clone [https://github.com/YOUR_USERNAME/laravel_ecommerce.git](https://github.com/YOUR_USERNAME/laravel_ecommerce.git)
cd laravel_ecommerce
