# QR Menu

Digital restaurant menu — each table gets a QR code that opens the menu; an admin panel
manages products, QR codes and users.

**PHP · MySQL · Bootstrap admin panel**

---

## Project structure

```
index.php                 Public menu
login.php / logout.php    Admin authentication
admin/
├── produk.php            Product list · add · edit
├── qrcode.php            QR codes per table · add · detail
└── users.php             Admin users · add · edit
database.php              PDO connection
```

---

## Features

- 🍽️ Public menu page reachable by scanning a table's QR code
- ➕ CRUD for products (name, price, description, image)
- 🔳 QR code generation per table, printable and viewable in detail
- 👤 Multiple admin accounts

---

## Running locally

Requires PHP 8.x and MySQL.

1. Create a database and import the schema (check `database.php` for the expected name)
2. Set the credentials in `database.php`
3. Serve with Apache/Nginx, or `php -S localhost:8000`

> ⚠️ Check that `database.php` holds no committed credentials before sharing this
> repository publicly. If it does, move them to environment variables and rotate them.
