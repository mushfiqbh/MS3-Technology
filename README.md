# MS3 Technology - Corporate Website

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind-4.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3.15-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-7.0-646CFF?style=for-the-badge&logo=vite&logoColor=white)

A modern, responsive corporate website built with Laravel 12, featuring a sleek design, admin panel, and comprehensive content management system.

[Features](#features) • [Installation](#installation) • [Usage](#usage) • [Tech Stack](#tech-stack) • [License](#license)

</div>

---

## 📋 Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Admin Panel](#admin-panel)
- [Database Schema](#database-schema)
- [Development](#development)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## 🌟 Overview

MS3 Technology is a full-featured corporate website built with Laravel 12 and modern frontend technologies. The platform showcases company services, team expertise, client portfolio, career opportunities, and company activities with a beautiful, responsive design optimized for all devices.

### Key Highlights

- ✨ Modern, gradient-rich UI with dark mode support
- 🎨 Fully responsive design (mobile-first approach)
- 🔐 Secure admin panel with authentication
- 📊 Comprehensive content management system
- 🚀 Fast performance with Vite and optimized assets
- ♿ Accessible and SEO-friendly
- 🎭 Smooth animations and transitions

---

## ✨ Features

### Public Pages

#### 🏠 Home Page
- Dynamic hero section with video background
- Interactive features showcase with list layout
- Floating tech stack animations (8 technologies)
- Client logos carousel
- Company statistics display
- Recent activities preview
- Solutions overview

#### 👥 Expert Team
- Team member profiles with photos
- Expertise areas and qualifications
- Social media links
- Responsive grid layout

#### 🤝 Clients
- Client portfolio showcase
- Logo display with hover effects
- Company information

#### 📅 Activities
- Activity listings with image galleries
- Detailed activity pages
- Date and description
- Multiple image support per activity

#### 💼 Careers
- Job listings with detailed descriptions
- Application form integration
- Job requirements and qualifications
- Salary range display

#### 🔧 Solutions
- Service/solution showcase
- Detailed solution pages with:
  - Solution description
  - Key features (4 highlighted benefits)
  - Client testimonials
  - Call-to-action sections
- Slug-based routing

#### 📞 Contact
- Contact form
- Company information display
- Social media links

#### 📄 Legal Pages
- **About Us**: Company overview, mission, vision, values, team
- **Privacy Policy**: Comprehensive data protection information
- **Terms of Service**: Legal terms and conditions

#### 💬 Consultation
- Consultation booking form
- Expert selection
- Appointment scheduling

### Admin Panel

#### 🔐 Authentication
- Secure login system
- Session management
- CSRF protection

#### 📊 Dashboard
- Activity management (CRUD)
- Expert management (CRUD)
- Client management (CRUD)
- Career management (CRUD)
- Solution management (CRUD)
- Consultation requests management
- Settings management (hero video)

#### 🖼️ Media Management
- Image upload for activities (multiple images)
- Logo upload for clients and experts
- File validation and optimization

---

## 🛠 Tech Stack

### Backend
- **Framework**: Laravel 12.0
- **PHP**: 8.2+
- **Database**: SQLite (easily changeable to MySQL/PostgreSQL)
- **Authentication**: Laravel's built-in auth system

### Frontend
- **CSS Framework**: Tailwind CSS 4.0
- **JavaScript**: Alpine.js 3.15
- **Icons**: Font Awesome 6.5.1
- **Build Tool**: Vite 7.0
- **Animations**: Custom CSS animations + Tailwind transitions

### Development Tools
- **Laravel Tinker**: 2.10.1
- **Laravel Pint**: 1.24 (Code styling)
- **Laravel Sail**: 1.41 (Docker environment)
- **Faker**: 1.24 (Test data generation)
- **PHPUnit**: 11.5.3 (Testing)

---

## 📁 Project Structure

```
MS3-Technology/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AdminController.php      # Admin panel logic
│   │       ├── AuthController.php       # Authentication
│   │       └── PublicPageController.php # Public pages
│   └── Models/
│       ├── Activity.php
│       ├── ActivityImage.php
│       ├── Career.php
│       ├── Client.php
│       ├── Consultation.php
│       ├── Expert.php
│       ├── Solution.php
│       └── User.php
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/
│   │   ├── app.css                      # Main styles
│   │   └── navbar.css                   # Navbar styles
│   ├── js/
│   │   └── app.js                       # Alpine.js setup
│   └── views/
│       ├── components/
│       │   └── heading.blade.php        # Reusable heading
│       ├── home/
│       │   ├── activities.blade.php
│       │   ├── features.blade.php       # Features + Tech stack
│       │   └── solutions.blade.php
│       ├── layout/
│       │   ├── admin.blade.php          # Admin layout
│       │   ├── app.blade.php            # Public layout
│       │   └── navbar.blade.php         # Navigation
│       ├── pages/
│       │   ├── activities.blade.php
│       │   ├── careers.blade.php
│       │   ├── careerDetails.blade.php
│       │   ├── clients.blade.php
│       │   ├── experts.blade.php
│       │   ├── home.blade.php
│       │   └── solution-details.blade.php
│       └── public-pages/
│           ├── about-us.blade.php
│           ├── contact.blade.php
│           ├── privacy-policy.blade.php
│           └── terms-of-service.blade.php
├── routes/
│   └── web.php                          # All routes
├── public/
│   ├── images/                          # Static images
│   └── storage/                         # Symlink to storage
├── storage/
│   └── app/
│       └── public/                      # Uploaded files
├── composer.json
├── package.json
├── vite.config.js
└── README.md
```

---

## 🎨 Admin Panel

### Accessing the Admin Panel

Navigate to `/admin/login` and log in with admin credentials.

### Admin Dashboard Features

#### 1. **Activity Management**
- Create new activities with multiple images
- Edit existing activities
- Delete activities
- Set activity dates

#### 2. **Expert Management**
- Add team members
- Upload profile photos
- Set expertise areas
- Add social media links

#### 3. **Client Management**
- Upload client logos
- Associate clients with solutions
- Manage client information

#### 4. **Career Management**
- Post job openings
- Set salary ranges
- Define requirements
- Manage applications

#### 5. **Solution Management**
- Create solution pages
- Set slugs for SEO-friendly URLs
- Add icons and descriptions

#### 6. **Consultation Requests**
- View incoming consultation requests
- Track consultation status

#### 7. **Settings**
- Configure hero video URL
- Manage site-wide settings

---

## 🗄 Database Schema

### Main Tables

- **users**: Admin users
- **experts**: Team members
- **clients**: Client companies
- **solutions**: Services/solutions
- **activities**: Company activities
- **activity_images**: Activity photo gallery
- **careers**: Job postings
- **consultations**: Consultation requests
- **client_solution**: Pivot table (many-to-many)
- **settings**: Site configuration

---

## 🎯 Features in Detail

### Floating Tech Stack Animation

The homepage features an innovative floating tech stack visualization:

- **8 Technologies**: Laravel, React, Vue.js, Node.js, Python, Docker, AWS, Angular
- **3 Animation Patterns**: Different floating trajectories
- **Interactive**: Hover to scale and rotate
- **Glassmorphism**: Modern glass effect design
- **Responsive**: Adapts to all screen sizes

### Responsive Features List

- Vertical list layout on the left
- Clean, horizontal card design
- Hover effects with border highlight
- Icons with gradient backgrounds
- Arrow indicators on interaction

### Modern UI Elements

- **Gradient Backgrounds**: Multi-color gradients throughout
- **Dark Mode**: Full dark mode support
- **Glassmorphism**: Backdrop blur effects
- **Smooth Animations**: CSS transitions and keyframes
- **Loading States**: Skeleton loaders
- **Toast Notifications**: User feedback

---

## 🌐 Browser Support

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Opera (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

---

## 📱 Mobile Responsiveness

The application is fully responsive with breakpoints:

- **Mobile**: < 640px
- **Tablet**: 640px - 1024px
- **Desktop**: > 1024px

All components adapt seamlessly across devices.

---

## 🔒 Security Features

- CSRF protection on all forms
- Password hashing (Bcrypt)
- SQL injection prevention (Eloquent ORM)
- XSS protection (Blade templating)
- File upload validation
- Secure session management

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📝 License

This project is licensed under the **MIT License** - see the LICENSE file for details.

---

## 👨‍💻 Author

**MS3 Technology**

- **Email**: ms3technology@gmail.com
- **GitHub**: [@mushfiqbh](https://github.com/mushfiqbh)
- **Version**: 1.2.0

---

## 📞 Contact

For questions, suggestions, or support:

- **Email**: ms3technology@gmail.com
- **Website**: [MS3 Technology](https://ms3technology.com)
- **Issue Tracker**: [GitHub Issues](https://github.com/mushfiqbh/MS3-Technology/issues)

---

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP Framework
- [Tailwind CSS](https://tailwindcss.com) - Utility-first CSS framework
- [Alpine.js](https://alpinejs.dev) - Lightweight JavaScript framework
- [Font Awesome](https://fontawesome.com) - Icon library
- [Vite](https://vitejs.dev) - Next generation frontend tooling

---

<div align="center">

**Made with ❤️ by MS3 Technology**

⭐ Star this repository if you find it helpful!

</div>
