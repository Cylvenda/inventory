# G10 Inventory Management System

A comprehensive PHP-based inventory management system designed to help businesses efficiently track and manage their stock, suppliers, employees, and orders.

## 🚀 Features

### Core Functionality
- **Multi-Role User Management**: Support for Admin, Owner, Manager, and Seller roles
- **Product Management**: Organize products by brands and categories
- **Inventory Tracking**: Real-time stock monitoring with low-stock alerts
- **Order Processing**: Complete order management from creation to completion
- **Supplier Management**: Track and manage supplier information
- **Employee Management**: User account management with role-based access
- **Dashboard Analytics**: Visual stock summaries and key metrics

### User Roles & Permissions
- **Admin**: Full system access and configuration
- **Owner**: Business oversight and reporting
- **Manager**: Inventory and employee management
- **Seller**: Order processing and basic inventory operations

## 🛠️ Technology Stack

- **Backend**: PHP 8.2.12
- **Database**: MySQL/MariaDB 10.4.32
- **Frontend**: HTML5, CSS3, JavaScript
- **AJAX**: For dynamic content loading
- **Database Management**: phpMyAdmin 5.2.1

## 📋 Prerequisites

Before installing the G10 Inventory Management System, ensure you have:

- **Web Server**: Apache/Nginx
- **PHP**: Version 8.0 or higher
- **MySQL/MariaDB**: Version 10.4 or higher
- **phpMyAdmin**: For database management (optional but recommended)

## 🔧 Installation

### 1. Clone/Download the Project
```bash
git clone <repository-url>
# or download and extract the ZIP file
```

### 2. Database Setup
1. Start your MySQL/MariaDB server
2. Open phpMyAdmin or your preferred database management tool
3. Import the database schema:
   ```sql
   # Navigate to Config/inventory.sql and import it
   # This will create the 'inventory' database with all required tables
   ```

### 3. Configuration
1. Update database connection settings in `Config/conn.php`:
   ```php
   $servername = 'localhost';  // Your database server
   $username = 'root';         // Your database username
   $password = '';             // Your database password
   $dbname = 'inventory';      // Database name
   ```

### 4. Web Server Setup
1. Copy the project files to your web server directory (e.g., `htdocs` for XAMPP)
2. Ensure proper file permissions
3. Start your web server

### 5. Access the System
- Open your web browser
- Navigate to `http://localhost/inventory` (adjust path as needed)
- Use the default login credentials (see Default Users section)

## 👥 Default Users

The system comes with pre-configured user accounts:

| Role | Email | Password | Phone |
|------|-------|----------|-------|
| Admin | admin@g10.com | admin123 | 255780598902 |
| Owner | owner@g10.com | owner123 | 255780598902 |
| Manager | manager@g10.com | manager123 | 255655990092 |
| Seller | saler@g10.com | saler123 | 255655990092 |

> **Security Note**: Change these default passwords immediately after installation!

## 📁 Project Structure

```
inventory/
├── Admin/                  # Admin panel pages
│   ├── Dashboard.php      # Main dashboard
│   ├── Products.php       # Product management
│   ├── Orders.php         # Order management
│   ├── Employees.php      # Employee management
│   ├── Suppliers.php      # Supplier management
│   ├── Brand.php          # Brand management
│   └── Category.php       # Category management
├── Ajax/                  # AJAX handlers
├── Config/                # Configuration files
│   ├── conn.php          # Database connection
│   ├── auth.php          # Authentication
│   ├── handlers.php      # Form handlers
│   └── inventory.sql     # Database schema
├── Home/                  # Public pages
├── img/                   # Images and icons
├── include/               # Shared components
├── php_action/           # PHP action handlers
├── style/                # CSS stylesheets
├── index.php             # Login page
└── .htaccess            # Apache configuration
```

## 🗄️ Database Schema

### Core Tables
- **brands**: Product brands (Samsung, iPhone, etc.)
- **categories**: Product categories linked to brands
- **products**: Product inventory with pricing and stock
- **employees**: User accounts with role-based access
- **suppliers**: Supplier contact information
- **placed_orders**: Customer orders
- **order_items**: Individual items within orders

### Key Relationships
- Products belong to categories
- Categories belong to brands
- Orders contain multiple order items
- Orders are processed by employees

## 🎯 Usage Guide

### Getting Started
1. **Login**: Use the credentials above to access the system
2. **Dashboard**: View stock summaries and key metrics
3. **Setup**: Add your brands, categories, and initial products
4. **Operations**: Start processing orders and managing inventory

### Managing Products
1. Navigate to **Admin > Brand** to add product brands
2. Go to **Admin > Category** to create categories under brands
3. Use **Admin > Products** to add individual products with:
   - Product name and pricing
   - Stock quantity
   - Product images
   - Category assignment

### Processing Orders
1. Access **Admin > New Order** to create customer orders
2. Add products to the order
3. Apply discounts if needed
4. Process payment (Cash/Cheque)
5. View order history in **Admin > Orders**

### User Management
- **Admin > Employees**: Add/manage user accounts
- Assign appropriate roles based on responsibilities
- Monitor user activity and permissions

## 🔒 Security Features

- **Password Hashing**: All passwords are securely hashed using PHP's password_hash()
- **Session Management**: Secure session handling for user authentication
- **Role-Based Access**: Different permission levels for different user roles
- **SQL Injection Protection**: Prepared statements and input validation

## 🚨 Troubleshooting

### Common Issues

**Database Connection Error**
- Verify database credentials in `Config/conn.php`
- Ensure MySQL/MariaDB service is running
- Check if the 'inventory' database exists

**Login Issues**
- Verify user credentials against the employee table
- Check if the user status is active (status = 1)
- Clear browser cache and cookies

**File Upload Problems**
- Check file permissions on the `img/` directory
- Verify PHP upload settings (upload_max_filesize, post_max_size)

## 🔄 Updates & Maintenance

### Regular Maintenance
- **Backup Database**: Regular backups of the inventory database
- **Update Dependencies**: Keep PHP and MySQL updated
- **Monitor Logs**: Check error logs for issues
- **Security Updates**: Apply security patches promptly

### Adding Features
The system is designed to be extensible. Common enhancements include:
- Barcode scanning integration
- Advanced reporting and analytics
- Email notifications
- API endpoints for mobile apps

## 👨‍💻 Developer

**Brayan Mlawa** ([@Cylvenda](https://github.com/Cylvenda))
- Lead Developer & System Architect
- GitHub: [github.com/Cylvenda](https://github.com/Cylvenda)

## 📞 Support

For technical support or feature requests:
- Check the troubleshooting section above
- Review the code documentation
- Contact the developer: [@Cylvenda](https://github.com/Cylvenda)

## 📄 License

This project is developed for educational purposes. Please ensure compliance with applicable licenses when using in production environments.

## 🙏 Acknowledgments

- Built with PHP and MySQL
- Uses modern web development practices
- Designed for small to medium-sized businesses

---

**Version**: 1.0  
**Last Updated**: June 2025  
**Compatibility**: PHP 8.0+, MySQL 5.7+

---
- Developed by **Brayan Mlawa** ([@Cylvenda](https://github.com/Cylvenda))
