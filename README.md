# 📰 Khabar X - Modern News Portal

<p align="center">
  <img src="public/images/khabar%20x%20.png" alt="Khabar X Logo" width="200">
</p>

<p align="center">
  <strong>A Modern, Professional News Portal built with Laravel & Vue.js</strong>
  <br>
  <em>Extra • Express • Exclusive</em>
</p>

<p align="center">
  <a href="#features">Features</a> •
  <a href="#requirements">Requirements</a> •
  <a href="#installation">Installation</a> •
  <a href="#usage">Usage</a> •
  <a href="#project-structure">Structure</a> •
  <a href="#contributing">Contributing</a> •
  <a href="#license">License</a>
</p>

---

## 🎯 About Khabar X

**Khabar X** is a comprehensive news portal platform designed for modern journalism and content management. Built with Laravel 11 and featuring a responsive frontend, it provides a complete solution for publishing, managing, and distributing news content with professional features like newsletter subscriptions, advertisement management, and reader engagement tools.

Whether you're running a regional news outlet or a national publication, Khabar X provides the tools you need to succeed in digital publishing.

---

## ✨ Features

### 📰 **Article Management**
- Create, edit, publish, and archive articles
- Rich text editor with HTML support
- Article categorization and tagging
- SEO-friendly URLs and metadata
- Featured articles and trending content
- Author attribution and publication dates
- Article versioning and history

### 🏷️ **Category Management**
- Organize content by categories
- Create subcategories for better organization
- Category-specific content filtering
- Custom category slugs

### 📢 **Advertisement System**
- Multiple ad positions (Header, Footer, Sidebar)
- Campaign scheduling
- Click tracking and analytics
- Image and link management
- Ad performance metrics

### 👥 **Subscriber Management**
- Newsletter subscription system
- Email-based subscriber list
- Subscriber statistics and growth tracking
- CSV export functionality
- Duplicate prevention

### 💌 **Contact & Messaging**
- Contact form on frontend
- Message inbox management
- Message review and archiving
- Admin notification system

### 🔐 **User Management**
- Role-based access control (Admin, Editor, Author)
- User authentication with Laravel Breeze
- Email verification
- Profile management
- Secure password handling

### 🎨 **Frontend Features**
- Responsive design for all devices
- Dark mode support
- Search functionality
- Province/location-based filtering
- Category browsing
- Social media integration ready
- Newsletter subscription in footer
- Professional UI with Tailwind CSS

### 📊 **Admin Dashboard**
- Statistics overview (Articles, Categories, Ads, Messages, Subscribers)
- Quick action buttons
- Visual metrics and KPIs
- User-friendly interface

---

## 🔧 Requirements

### System Requirements
- **PHP**: ^8.2
- **Laravel**: ^11.0
- **MySQL**: ^8.0 or PostgreSQL ^14
- **Composer**: Latest version
- **Node.js**: ^18.0 (for frontend build)
- **npm** or **yarn**: Latest version

### Optional
- Redis (for caching and queues)
- Supervisor (for queue workers)

---

## 📥 Installation

### Step 1: Clone Repository
```bash
git clone https://github.com/yourusername/khabar-x.git
cd khabar-x
```

### Step 2: Install Dependencies
```bash
# PHP dependencies
composer install

# Node.js dependencies
npm install
```

### Step 3: Environment Setup
```bash
# Copy example environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Configure Database
Edit `.env` and set your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=khabar_x
DB_USERNAME=root
DB_PASSWORD=
```

### Step 5: Run Migrations
```bash
# Run all migrations
php artisan migrate

# Seed sample data (optional)
php artisan db:seed
```

### Step 6: Build Frontend
```bash
# Development
npm run dev

# Production
npm run build
```

### Step 7: Create Admin User
```bash
php artisan tinker

# Inside tinker:
>>> \App\Models\User::create([
    'name' => 'Admin User',
    'email' => 'admin@khabarx.com',
    'password' => bcrypt('password'),
    'email_verified_at' => now(),
]);
```

### Step 8: Start Development Server
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

---

## 🚀 Usage

### For Readers
1. Visit the homepage to browse latest news
2. Filter articles by category or province
3. Search for specific topics
4. Subscribe to newsletter in the footer
5. Contact the news outlet using the contact form

### For Admins

#### Creating an Article
1. Go to Admin Panel → Articles
2. Click "नयाँ लेख" (New Article)
3. Fill in title, content, select category
4. Add featured image
5. Set publication status
6. Click "Publish"

#### Managing Subscribers
1. Go to Admin Panel → Subscribers
2. View all subscribers or search by email
3. Add new subscribers manually
4. Edit or delete subscriber information
5. Export subscriber list as CSV

#### Managing Advertisements
1. Go to Admin Panel → Advertises
2. Create new advertisement campaign
3. Upload ad image
4. Set redirect link and position
5. Monitor ad performance

#### Viewing Messages
1. Go to Admin Panel → Messages
2. Review contact form submissions
3. Mark as resolved or archive
4. Delete old messages

---

## 📁 Project Structure

```
khabar-x/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/              # Admin controllers
│   │   │   ├── Frontend/           # Frontend controllers
│   │   │   └── ProfileController.php
│   │   └── Requests/               # Form request validation
│   ├── Models/                     # Database models
│   ├── Mail/                       # Mailable classes
│   └── Providers/                  # Service providers
├── database/
│   ├── migrations/                 # Database migrations
│   ├── seeders/                    # Database seeders
│   └── factories/                  # Model factories
├── resources/
│   ├── views/
│   │   ├── admin/                  # Admin views
│   │   ├── components/             # Reusable components
│   │   └── frontend/               # Frontend pages
│   ├── css/                        # Stylesheets
│   └── js/                         # JavaScript files
├── routes/
│   ├── web.php                     # Web routes
│   ├── api.php                     # API routes
│   ├── auth.php                    # Authentication routes
│   └── console.php                 # Console routes
├── public/
│   ├── assets/                     # Static assets
│   ├── images/                     # Image files
│   └── index.php                   # Application entry point
├── config/                         # Configuration files
├── storage/                        # Application storage
├── tests/                          # Test files
├── vendor/                         # Composer dependencies
├── .env.example                    # Example environment file
├── artisan                         # Artisan CLI
├── composer.json                   # PHP dependencies
├── package.json                    # Node.js dependencies
├── vite.config.js                  # Vite configuration
└── README.md                       # This file
```

---

## 🗄️ Database Schema

### Key Tables

#### Users
- Admin users with roles and permissions

#### Articles
- News articles with content, metadata, and relationships

#### Categories
- Article categories and classification

#### Advertises
- Advertisement campaigns and placements

#### Subscribers
- Newsletter subscriber email addresses

#### Messages
- Contact form submissions

#### Personal Access Tokens
- API token authentication

---

## 🔐 Security

### Features
- **CSRF Protection**: All forms are protected with CSRF tokens
- **Authentication**: Secure user authentication with Laravel Breeze
- **Authorization**: Role-based access control
- **Input Validation**: Form request validation on all inputs
- **SQL Injection Prevention**: Using Eloquent ORM and parameterized queries
- **XSS Protection**: HTML escaping in Blade templates
- **Password Security**: Bcrypt password hashing
- **Rate Limiting**: API and form rate limiting

### Best Practices
- Keep `.env` file out of version control
- Regularly update dependencies: `composer update`
- Use strong passwords for all accounts
- Enable two-factor authentication when available
- Keep backups of database and uploaded files

---

## 🎨 Customization

### Branding
- Edit logo in `public/images/`
- Update site name in `config/app.php`
- Modify colors in CSS variables
- Update contact information in footer

### Email Configuration
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@khabarx.com
```

### Localization
- Nepali language is configured by default
- Located in `resources/lang/ne/`
- Add more languages in `resources/lang/`

---

## 📊 Performance Optimization

### Caching
- Database query caching
- View caching
- Route caching for production

### Frontend
- Asset minification
- Image optimization
- Lazy loading for images
- CSS/JS bundling with Vite

### Database
- Proper indexing
- Query optimization
- Pagination implementation

---

## 🐛 Troubleshooting

### Common Issues

**Storage Permission Error**
```bash
php artisan storage:link
chmod -R 775 storage bootstrap/cache
```

**Migration Failed**
```bash
php artisan migrate:reset
php artisan migrate
```

**NPM Build Errors**
```bash
rm -rf node_modules package-lock.json
npm install
npm run dev
```

**Database Connection Error**
- Verify database is running
- Check `.env` credentials
- Create database: `CREATE DATABASE khabar_x;`

---

## 🚀 Deployment

### Using Shared Hosting
1. Upload files via FTP
2. Create MySQL database
3. Set `.env` file with database credentials
4. Run migrations: `php artisan migrate`
5. Set proper file permissions

### Using Docker
```dockerfile
# Example Dockerfile provided in deployment guide
```

### Environment Variables
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

---

## 📝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/amazing-feature`
3. Commit changes: `git commit -m 'Add amazing feature'`
4. Push to branch: `git push origin feature/amazing-feature`
5. Open a Pull Request

### Development Guidelines
- Follow PSR-12 PHP coding standards
- Write meaningful commit messages
- Test your changes thoroughly
- Update documentation

---

## 📄 License

This project is open-source software licensed under the MIT license. See the [LICENSE](LICENSE) file for details.

---

## 🤝 Support

For support and questions:

- 📧 Email: khabarx701@gmail.com
- 📱 Phone: +977-9845278509
- 🌐 Website: [Khabar X](https://khabarx.com)
- 📞 Contact Form: [Contact Us](https://khabarx.com/contact)

---

## 🙏 Credits

**Khabar X** is built with:
- [Laravel](https://laravel.com) - PHP Framework
- [Vue.js](https://vuejs.org) - JavaScript Framework
- [Tailwind CSS](https://tailwindcss.com) - CSS Framework
- [Laravel Breeze](https://laravel.com/docs/starter-kits#breeze) - Authentication
- [Bootstrap](https://getbootstrap.com) - UI Components

Special thanks to all contributors and the Laravel community.

---

## 📈 Roadmap

### Planned Features
- [ ] Newsletter email campaigns
- [ ] Advanced analytics and reporting
- [ ] Multi-language support
- [ ] Mobile app integration
- [ ] Social media auto-posting
- [ ] Comment system with moderation
- [ ] Related articles suggestions
- [ ] RSS feed generation
- [ ] SEO optimization tools
- [ ] API with OAuth2 authentication

---

## 📊 Statistics

- **Framework**: Laravel 11
- **PHP Version**: ^8.2
- **Database**: MySQL/PostgreSQL
- **Frontend**: Vue.js + Tailwind CSS
- **Build Tool**: Vite
- **Authentication**: Laravel Breeze
- **Total Tables**: 12+
- **Supported Languages**: Nepali, English (expandable)

---

<p align="center">
  <strong>Made with ❤️ for the news industry</strong>
  <br>
  <sub>Khabar X © 2026 | All rights reserved</sub>
</p>

---

## 📚 Additional Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Blade Templating](https://laravel.com/docs/blade)
- [Eloquent ORM](https://laravel.com/docs/eloquent)
- [API Documentation](https://laravel.com/docs/api-authentication)

---

**Last Updated**: June 10, 2026
**Version**: 1.0.0
**Maintainer**: Khabar X Team

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
