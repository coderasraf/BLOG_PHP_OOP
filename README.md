# Blog CMS (OOP PHP)

A dynamic blog with a full admin panel, built in object-oriented PHP and MySQL. Admins can manage posts, categories, pages, users, site settings and contact messages.

![PHP](https://img.shields.io/badge/PHP-OOP-777BB4?logo=php&logoColor=white) ![MySQL](https://img.shields.io/badge/MySQL-mysqli-4479A1?logo=mysql&logoColor=white) ![jQuery](https://img.shields.io/badge/jQuery-Nivo_Slider-0769AD?logo=jquery&logoColor=white)

## Overview

Built in May 2021 as a learning project while following the Bangla "Training with Live Project" PHP blog course. It covers a typical small CMS: public blog front end plus an authenticated admin area.

## Features

**Front end**

- Homepage post list with Nivo image slider and sidebar (categories, latest posts)
- Single post page with related posts
- Posts by category, static pages and keyword search
- Contact form that stores messages in the database
- Dynamic page titles and meta keywords
- Switchable color theme (default / green) chosen from the admin panel
- Pretty URLs via `.htaccess` and a custom 404 page

**Admin panel (`/admin`)**

- Login, logout, change password and forgot-password email
- Role-based users: Admin, Author, Editor (only admins can add users)
- Post CRUD with image upload, tags and author
- Category CRUD and static page management
- Inbox: view, reply to (via `mail()`) and archive contact messages
- Site settings: title, slogan and logo, social media links, footer copyright text, theme selection
- User list and profile editing

## Tech Stack

- PHP (OOP classes, sessions)
- MySQL via mysqli
- HTML/CSS, jQuery, Nivo Slider, Font Awesome 4.5
- Apache with mod_rewrite (XAMPP/WAMP/LAMP)

## Getting Started

1. Copy the project to your web root, e.g. `htdocs/BLOG_PHP_OOP`.
2. Create a database named `db_blog` and import `Database/db_blog.sql` (phpMyAdmin or `mysql -u root -p db_blog < Database/db_blog.sql`).
3. Update the credentials and site constants in `config/config.php` (`DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`, `TITLE`, `KEYWORDS`).
4. Make sure `admin/uploads/` is writable for post images.
5. Visit `http://localhost/BLOG_PHP_OOP/` and log in to the admin panel at `/admin/login.php`. Create your own admin user rather than relying on the sample accounts in the dump.

## Project Structure

```text
index.php, post.php, posts.php, page.php, search.php, contact.php, 404.php
config/config.php     # DB and site constants
lib/Database.php      # mysqli wrapper
helpers/Format.php    # Validation and formatting helpers
inc/                  # header, slider, sidebar, footer
scripts/              # Dynamic meta, CSS (theme) and JS includes
theme/                # default.css, green.css
Database/db_blog.sql  # Schema and sample data
admin/                # Dashboard, CRUD pages, inbox, settings, lib/, inc/
```

## Credits

Admin template and course structure from the "Training with Live Project" PHP course.

## Author

Built by **Ashraf Siddik**, Shopify developer & CRO specialist.
- Website: [ashraf-siddik.com](https://ashraf-siddik.com)
- GitHub: [@coderasraf](https://github.com/coderasraf)
