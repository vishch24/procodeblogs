-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2026 at 04:59 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `procodeblogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_meta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `img`, `slug`, `post_meta`, `post_desc`, `user_id`, `created_at`, `updated_at`) VALUES
(10, 'A Detailed Guide to SASS: The Powerful CSS Preprocessor', '1774515704.png', 'a-detailed-guide-to-sass-the-powerful-css-preprocessor', 'Learn SASS, the CSS preprocessor that enhances stylesheets with variables, nesting, mixins, and more. Discover how to set up and use SASS effectively in web development.', '<p data-pm-slice=\"1 1 []\">SASS (<em>Syntactically Awesome Stylesheets</em>) is a CSS preprocessor that enhances traditional CSS by adding features like variables, nesting, mixins, and functions. It simplifies and organizes stylesheets, making them easier to maintain and scale for large projects.</p>\r\n<h2 data-pm-slice=\"1 1 []\"><strong>What is SASS?</strong></h2>\r\n<p>SASS is an extension of CSS that enables developers to write more efficient, reusable, and manageable styles. It compiles into standard CSS, allowing browsers to interpret it correctly.</p>\r\n<h3 data-pm-slice=\"1 3 []\"><strong>Key Features of SASS</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li>\r\n<p><strong>Variables</strong> &ndash; Store values like colors, fonts, and dimensions for reuse.</p>\r\n</li>\r\n<li>\r\n<p><strong>Nesting</strong> &ndash; Organize CSS selectors hierarchically to mirror HTML structure.</p>\r\n</li>\r\n<li>\r\n<p><strong>Mixins</strong> &ndash; Define reusable code snippets to avoid repetition.</p>\r\n</li>\r\n<li>\r\n<p><strong>Inheritance</strong> &ndash; Extend styles from one selector to another.</p>\r\n</li>\r\n<li>\r\n<p><strong>Functions &amp; Operators</strong> &ndash; Perform calculations and dynamic styling.</p>\r\n</li>\r\n<li>\r\n<p><strong>Partials &amp; Import</strong> &ndash; Split stylesheets into manageable files and import them.</p>\r\n</li>\r\n</ul>\r\n<h2 data-pm-slice=\"1 3 []\"><strong>SASS vs CSS: Key Differences</strong></h2>\r\n<table style=\"width: 82.5893%; height: 145.6px;\">\r\n<tbody>\r\n<tr style=\"height: 21.2px;\">\r\n<th style=\"width: 18.5623%;\">Feature</th>\r\n<th style=\"width: 32.714%;\">CSS</th>\r\n<th style=\"width: 47.2691%;\">SASS</th>\r\n</tr>\r\n<tr style=\"height: 21.2px;\">\r\n<td style=\"width: 18.5623%;\">Variables</td>\r\n<td style=\"width: 32.714%;\">Not supported</td>\r\n<td style=\"width: 47.2691%;\">Supported (e.g., <code>$primary-color: blue;</code>)</td>\r\n</tr>\r\n<tr style=\"height: 21.2px;\">\r\n<td style=\"width: 18.5623%;\">Nesting</td>\r\n<td style=\"width: 32.714%;\">Not available</td>\r\n<td style=\"width: 47.2691%;\">Available (simplifies hierarchy)</td>\r\n</tr>\r\n<tr style=\"height: 21.2px;\">\r\n<td style=\"width: 18.5623%;\">Mixins</td>\r\n<td style=\"width: 32.714%;\">Not supported</td>\r\n<td style=\"width: 47.2691%;\">Supported (reusable styles)</td>\r\n</tr>\r\n<tr style=\"height: 21.2px;\">\r\n<td style=\"width: 18.5623%;\">Functions</td>\r\n<td style=\"width: 32.714%;\">Limited</td>\r\n<td style=\"width: 47.2691%;\">Extensive functions (e.g., darken(), lighten())</td>\r\n</tr>\r\n<tr style=\"height: 39.6px;\">\r\n<td style=\"width: 18.5623%;\">File Management</td>\r\n<td style=\"width: 32.714%;\">Single file or multiple CSS files</td>\r\n<td style=\"width: 47.2691%;\">Partials with <code>@import</code></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2 data-pm-slice=\"1 1 []\"><strong>Setting Up SASS</strong></h2>\r\n<p>SASS needs to be compiled into CSS before use. Here&rsquo;s how you can set it up:</p>\r\n<h3><strong>1. Install SASS</strong></h3>\r\n<p>Using npm:</p>\r\n<pre>&nbsp;</pre>\r\n<pre class=\"language-plaintext\"><code>npm install -g sass</code></pre>\r\n<pre>&nbsp;</pre>\r\n<p>Using command-line:</p>\r\n<pre>&nbsp;</pre>\r\n<pre class=\"language-plaintext\"><code>sass input.scss output.css</code></pre>\r\n<pre>&nbsp;</pre>\r\n<h3><strong>2. Watch Files for Automatic Compilation</strong></h3>\r\n<pre>&nbsp;</pre>\r\n<pre class=\"language-plaintext\"><code>sass --watch style.scss:style.css</code></pre>\r\n<pre>&nbsp;</pre>\r\n<p>This keeps updating the CSS file whenever changes are made.</p>\r\n<h2 data-pm-slice=\"1 1 []\"><strong>Core SASS Concepts with Examples</strong></h2>\r\n<h3><strong>1. Variables</strong></h3>\r\n<p>Variables store reusable values, making updates easier.</p>\r\n<pre class=\"language-css\"><code>$primary-color: #3498db;\r\n$font-stack: Helvetica, sans-serif;\r\n\r\nbody {\r\n  color: $primary-color;\r\n  font-family: $font-stack;\r\n}</code></pre>\r\n<h3 data-pm-slice=\"1 1 []\"><strong>2. Nesting</strong></h3>\r\n<p>Nesting allows writing cleaner and structured CSS.</p>\r\n<pre class=\"language-css\"><code>nav {\r\n  ul {\r\n    margin: 0;\r\n    padding: 0;\r\n    list-style: none;\r\n  }\r\n  li {\r\n    display: inline-block;\r\n  }\r\n}</code></pre>\r\n<h3 data-pm-slice=\"1 1 []\"><strong>3. Mixins</strong></h3>\r\n<p>Mixins enable reusable style blocks with dynamic values.</p>\r\n<pre class=\"language-css\"><code>@mixin button-style($bg-color, $text-color) {\r\n  background: $bg-color;\r\n  color: $text-color;\r\n  padding: 10px 20px;\r\n  border-radius: 5px;\r\n}\r\n\r\n.btn-primary {\r\n  @include button-style(blue, white);\r\n}</code></pre>\r\n<h3 data-pm-slice=\"1 1 []\"><strong>4. Extend/Inheritance</strong></h3>\r\n<p>Extend allows selectors to inherit styles.</p>\r\n<pre class=\"language-css\"><code>%button-base {\r\n  padding: 10px;\r\n  border-radius: 5px;\r\n}\r\n\r\n.btn {\r\n  @extend %button-base;\r\n  background: blue;\r\n}</code></pre>\r\n<h3 data-pm-slice=\"1 1 []\"><strong>5. Functions &amp; Operators</strong></h3>\r\n<p>Perform dynamic styling calculations.</p>\r\n<pre class=\"language-css\"><code>$base-size: 16px;\r\np {\r\n  font-size: $base-size * 1.5;\r\n}</code></pre>\r\n<h2 data-pm-slice=\"1 1 []\"><strong>Organizing SASS Files with Partials</strong></h2>\r\n<p>Using partials (files starting with <code>_</code>), we can split styles into multiple files and import them into a main file.</p>\r\n<p>Example folder structure:</p>\r\n<pre class=\"language-plaintext\"><code>styles/\r\n│── _variables.scss\r\n│── _mixins.scss\r\n│── _base.scss\r\n│── main.scss</code></pre>\r\n<p data-pm-slice=\"1 1 []\">Inside <code>main.scss</code>:</p>\r\n<pre class=\"language-css\"><code>@import \'variables\';\r\n@import \'mixins\';\r\n@import \'base\';</code></pre>\r\n<h2 data-pm-slice=\"1 3 []\"><strong>Advantages of Using SASS</strong></h2>\r\n<ul data-spread=\"false\">\r\n<li>\r\n<p><strong>Efficient and Organized Code</strong> &ndash; Modular and reusable styles.</p>\r\n</li>\r\n<li>\r\n<p><strong>Less Code Duplication</strong> &ndash; Reduces redundant CSS.</p>\r\n</li>\r\n<li>\r\n<p><strong>Better Maintenance</strong> &ndash; Easy updates with variables and mixins.</p>\r\n</li>\r\n<li>\r\n<p><strong>Cross-Browser Compatibility</strong> &ndash; Use mixins for vendor prefixes.</p>\r\n</li>\r\n</ul>\r\n<h2 data-pm-slice=\"1 1 []\"><strong>Conclusion</strong></h2>\r\n<p>SASS is a powerful tool that enhances CSS capabilities, making styling more efficient, modular, and scalable. Learning SASS can significantly improve front-end development workflow, saving time and reducing code repetition.</p>', 43, '2026-03-26 03:31:44', '2026-03-26 03:31:44'),
(11, 'SQL vs NoSQL: Understanding the Differences and Choosing the Right Database', '1774516293.jpg', 'sql-vs-nosql-understanding-the-differences-and-choosing-the-right-database', 'SQL vs NoSQL: Understand the key differences, pros & cons, and best use cases to choose the right database for your application. Learn about relational and non-relational databases.', '<p>Databases are fundamental to application development, and the choice between SQL (Structured Query Language) and NoSQL (Not Only SQL) databases can significantly impact performance, scalability, and flexibility. This blog explores the key differences between SQL and NoSQL databases, their pros and cons, and the best use cases for each.</p>\r\n<h2><strong>What is SQL?</strong></h2>\r\n<p>SQL databases are relational databases that use structured schemas to organize and store data. They follow a table-based format and use SQL for defining and manipulating data.</p>\r\n<h3><strong>Characteristics of SQL Databases</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>Structured Schema</strong> &ndash; Data is organized into tables with predefined schemas.</li>\r\n<li><strong>ACID Compliance</strong> &ndash; Ensures Atomicity, Consistency, Isolation, and Durability, making SQL databases reliable.</li>\r\n<li><strong>Structured Query Language (SQL)</strong> &ndash; Standard language for performing CRUD (Create, Read, Update, Delete) operations.</li>\r\n<li><strong>Relationships</strong> &ndash; Data is stored in related tables using foreign keys.</li>\r\n</ul>\r\n<h3><strong>Popular SQL Databases</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li>MySQL</li>\r\n<li>PostgreSQL</li>\r\n<li>Microsoft SQL Server</li>\r\n<li>Oracle Database</li>\r\n<li>MariaDB</li>\r\n</ul>\r\n<h3><strong>Advantages of SQL Databases</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>Reliability</strong> &ndash; Ensures data integrity and consistency.</li>\r\n<li><strong>Structured Queries</strong> &ndash; SQL allows powerful querying capabilities.</li>\r\n<li><strong>Joins &amp; Relationships</strong> &ndash; Ideal for applications requiring complex data relationships.</li>\r\n<li><strong>Standardization</strong> &ndash; SQL is widely adopted and well-documented.</li>\r\n</ul>\r\n<h3><strong>Disadvantages of SQL Databases</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>Scalability Issues</strong> &ndash; Scaling SQL databases horizontally is challenging.</li>\r\n<li><strong>Schema Rigidity</strong> &ndash; Requires predefined schemas, making changes complex.</li>\r\n<li><strong>Performance Constraints</strong> &ndash; Large data volumes can slow down queries.</li>\r\n</ul>\r\n<h2><strong>What is NoSQL?</strong></h2>\r\n<p>NoSQL databases are non-relational and provide a flexible way to store and retrieve data. They are designed for scalability and high-speed transactions, often used in big data applications.</p>\r\n<h3><strong>Characteristics of NoSQL Databases</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>Schema-less</strong> &ndash; Data can be stored in various formats (key-value, document, column-family, graph).</li>\r\n<li><strong>Eventual Consistency</strong> &ndash; Trades strong consistency for higher availability and performance.</li>\r\n<li><strong>Horizontal Scaling</strong> &ndash; Designed to scale out easily across distributed systems.</li>\r\n<li><strong>No Joins</strong> &ndash; Unlike SQL databases, NoSQL databases avoid joins to optimize performance.</li>\r\n</ul>\r\n<h3><strong>Types of NoSQL Databases</strong></h3>\r\n<ol start=\"1\" data-spread=\"false\">\r\n<li><strong>Key-Value Stores</strong> &ndash; Redis, DynamoDB</li>\r\n<li><strong>Document Stores</strong> &ndash; MongoDB, CouchDB</li>\r\n<li><strong>Column-Family Stores</strong> &ndash; Cassandra, HBase</li>\r\n<li><strong>Graph Databases</strong> &ndash; Neo4j, ArangoDB</li>\r\n</ol>\r\n<h3><strong>Advantages of NoSQL Databases</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>Scalability</strong> &ndash; Can handle large amounts of unstructured data.</li>\r\n<li><strong>Flexibility</strong> &ndash; No predefined schema, allowing dynamic data structures.</li>\r\n<li><strong>Speed</strong> &ndash; Optimized for quick read and write operations.</li>\r\n<li><strong>Big Data &amp; Real-Time Applications</strong> &ndash; Ideal for handling vast amounts of data efficiently.</li>\r\n</ul>\r\n<h3><strong>Disadvantages of NoSQL Databases</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>Data Consistency Challenges</strong> &ndash; May not always provide strong consistency.</li>\r\n<li><strong>Limited Query Capabilities</strong> &ndash; Lacks powerful query languages like SQL.</li>\r\n<li><strong>Less Standardization</strong> &ndash; Different NoSQL databases have different structures and approaches.</li>\r\n</ul>\r\n<h2><strong>SQL vs NoSQL: Key Differences</strong></h2>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<th>Feature</th>\r\n<th>SQL Databases</th>\r\n<th>NoSQL Databases</th>\r\n</tr>\r\n<tr>\r\n<td><strong>Structure</strong></td>\r\n<td>Table-based, predefined schema</td>\r\n<td>Schema-less, flexible data models</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Scalability</strong></td>\r\n<td>Vertical (scaling up with hardware)</td>\r\n<td>Horizontal (scaling out across multiple servers)</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Consistency</strong></td>\r\n<td>Strong ACID compliance</td>\r\n<td>Eventual consistency (in most cases)</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Query Language</strong></td>\r\n<td>SQL</td>\r\n<td>Varies (MongoDB Query Language, CQL, etc.)</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Relationships</strong></td>\r\n<td>Uses joins and foreign keys</td>\r\n<td>No joins, relies on denormalized data</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Best Use Cases</strong></td>\r\n<td>Transactional applications, banking, CRM, ERP</td>\r\n<td>Big data, IoT, social media, real-time analytics</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2><strong>When to Use SQL Databases?</strong></h2>\r\n<ul data-spread=\"false\">\r\n<li>Applications requiring <strong>data integrity and consistency</strong>, such as banking and finance.</li>\r\n<li><strong>Structured data</strong> storage with clear relationships (e.g., customer management systems, e-commerce platforms).</li>\r\n<li>Applications that <strong>require complex queries</strong> and reporting.</li>\r\n</ul>\r\n<h2><strong>When to Use NoSQL Databases?</strong></h2>\r\n<ul data-spread=\"false\">\r\n<li>When handling <strong>large volumes of unstructured or semi-structured data</strong> (e.g., social media, content management).</li>\r\n<li>When <strong>high availability and scalability</strong> are critical (e.g., real-time applications, big data processing).</li>\r\n<li><strong>Flexible data models</strong> where schema changes frequently (e.g., IoT, user-generated content).</li>\r\n</ul>\r\n<h2><strong>Conclusion</strong></h2>\r\n<p>Both SQL and NoSQL databases have their advantages and trade-offs. Choosing the right one depends on the nature of the application, data consistency requirements, and scalability needs.</p>\r\n<ul data-spread=\"false\">\r\n<li>If you need <strong>structured data, complex queries, and ACID compliance</strong>, go with an SQL database.</li>\r\n<li>If you need <strong>scalability, flexibility, and fast data retrieval</strong>, a NoSQL database may be the best option.</li>\r\n</ul>\r\n<p>Understanding these differences will help developers and businesses make informed decisions for efficient and scalable database solutions.</p>', 43, '2026-03-26 03:41:33', '2026-03-26 03:41:33'),
(12, 'The Ultimate Guide to Becoming a Full Stack Developer', '1774516824.jpg', 'the-ultimate-guide-to-becoming-a-full-stack-developer', 'Become a Full Stack Developer with this ultimate guide. Learn front-end, back-end, databases, deployment, and best practices to build scalable web applications.', '<p>A full stack developer is a professional skilled in both front-end and back-end development, capable of building complete web applications. They work with various technologies, including databases, servers, and client interfaces, ensuring seamless communication between the front-end and back-end components.</p>\r\n<h2><strong>Why Become a Full Stack Developer?</strong></h2>\r\n<ul data-spread=\"false\">\r\n<li><strong>High Demand</strong> &ndash; Full stack developers are sought after due to their versatility in handling multiple aspects of web development.</li>\r\n<li><strong>Better Pay</strong> &ndash; Companies value developers who can handle both front-end and back-end tasks, making them more competitive in the job market.</li>\r\n<li><strong>Flexibility</strong> &ndash; Ability to work on a variety of projects, including freelancing, startups, and large-scale applications.</li>\r\n<li><strong>Entrepreneurial Opportunities</strong> &ndash; Helps in developing complete products independently, allowing developers to create their own applications or services.</li>\r\n</ul>\r\n<h2><strong>Essential Skills Required</strong></h2>\r\n<h3><strong>1. Front-End Development</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>HTML, CSS, and JavaScript</strong> &ndash; Foundation of web development, used to create the structure, style, and interactivity of web pages.</li>\r\n<li><strong>Frontend Frameworks/Libraries</strong> &ndash; React.js, Angular, or Vue.js for interactive UI development.</li>\r\n<li><strong>Responsive Design</strong> &ndash; Ensuring web applications work seamlessly on different screen sizes and devices.</li>\r\n<li><strong>UI/UX Principles</strong> &ndash; Understanding user experience for designing intuitive and accessible applications.</li>\r\n<li><strong>CSS Preprocessors</strong> &ndash; Using tools like SASS or LESS to enhance styling capabilities.</li>\r\n</ul>\r\n<h3><strong>2. Back-End Development</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>Programming Languages</strong> &ndash; Expertise in Node.js, Python, Java, Ruby, or PHP for server-side development.</li>\r\n<li><strong>Backend Frameworks</strong> &ndash; Express.js, Django, Spring Boot, or Laravel to build efficient APIs and server-side logic.</li>\r\n<li><strong>RESTful APIs &amp; GraphQL</strong> &ndash; Enabling communication between the client-side and server-side applications.</li>\r\n<li><strong>Authentication &amp; Authorization</strong> &ndash; Secure login mechanisms using JWT, OAuth, or session-based authentication.</li>\r\n<li><strong>Caching Mechanisms</strong> &ndash; Improving performance using Redis, Memcached, or in-memory databases.</li>\r\n</ul>\r\n<h3><strong>3. Database Management</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>SQL Databases</strong> &ndash; MySQL, PostgreSQL for structured data storage and retrieval.</li>\r\n<li><strong>NoSQL Databases</strong> &ndash; MongoDB, Firebase for handling unstructured and scalable data.</li>\r\n<li><strong>ORM (Object Relational Mapping)</strong> &ndash; Using tools like Sequelize, Mongoose, or Hibernate for database interactions.</li>\r\n<li><strong>Database Optimization</strong> &ndash; Writing efficient queries, indexing, and normalization techniques to improve performance.</li>\r\n</ul>\r\n<h3><strong>4. Version Control &amp; Deployment</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>Git &amp; GitHub/GitLab</strong> &ndash; Managing source code with version control systems.</li>\r\n<li><strong>CI/CD Pipelines</strong> &ndash; Automating testing, building, and deployment processes using Jenkins, GitHub Actions, or CircleCI.</li>\r\n<li><strong>Cloud Services</strong> &ndash; AWS, Google Cloud, Azure for hosting and managing applications.</li>\r\n<li><strong>Containerization &amp; Orchestration</strong> &ndash; Using Docker &amp; Kubernetes for managing microservices and scalable deployments.</li>\r\n<li><strong>Server Management</strong> &ndash; Nginx, Apache for handling web server configurations.</li>\r\n</ul>\r\n<h2><strong>How to Become a Full Stack Developer</strong></h2>\r\n<h3><strong>Step 1: Learn the Basics</strong></h3>\r\n<p>Start with <strong>HTML, CSS, and JavaScript</strong>, and build small projects like portfolios, landing pages, and interactive UI components.</p>\r\n<h3><strong>Step 2: Master Front-End Development</strong></h3>\r\n<p>Choose a modern frontend framework like <strong>React.js</strong> or <strong>Angular</strong> and work on single-page applications (SPAs).</p>\r\n<h3><strong>Step 3: Learn Back-End Technologies</strong></h3>\r\n<p>Start with a backend language such as <strong>Node.js</strong> or <strong>Python</strong>, and build REST APIs for handling database interactions.</p>\r\n<h3><strong>Step 4: Work with Databases</strong></h3>\r\n<p>Learn SQL and NoSQL databases, understanding how to perform CRUD operations, optimize queries, and manage relational data.</p>\r\n<h3><strong>Step 5: Version Control and Collaboration</strong></h3>\r\n<p>Familiarize yourself with Git commands, repositories, branches, and pull requests for efficient teamwork.</p>\r\n<h3><strong>Step 6: Deploy Applications</strong></h3>\r\n<p>Deploy applications using <strong>Heroku, Netlify, AWS, or Digital Ocean</strong>, and automate deployment using CI/CD pipelines.</p>\r\n<h3><strong>Step 7: Build Real-World Projects</strong></h3>\r\n<p>Create and deploy full-stack applications such as e-commerce platforms, social media apps, and content management systems.</p>\r\n<h3><strong>Step 8: Keep Learning and Stay Updated</strong></h3>\r\n<p>Follow web development trends, contribute to open-source projects, and attend developer meetups or hackathons.</p>\r\n<h2><strong>Best Practices for Full Stack Development</strong></h2>\r\n<ul data-spread=\"false\">\r\n<li><strong>Write Clean &amp; Maintainable Code</strong> &ndash; Follow coding standards and best practices.</li>\r\n<li><strong>Use Responsive Design</strong> &ndash; Ensure applications function correctly on different devices.</li>\r\n<li><strong>Optimize Performance</strong> &ndash; Minimize load time, optimize database queries, and implement caching strategies.</li>\r\n<li><strong>Secure Applications</strong> &ndash; Implement encryption, authentication, and data validation to protect sensitive information.</li>\r\n<li><strong>Test Code Regularly</strong> &ndash; Use unit tests, integration tests, and end-to-end testing to ensure application reliability.</li>\r\n</ul>\r\n<h2><strong>Top Resources for Learning</strong></h2>\r\n<h3><strong>Online Courses &amp; Platforms</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>Udemy, Coursera, FreeCodeCamp, The Odin Project</strong> &ndash; Online platforms offering comprehensive full-stack development courses.</li>\r\n</ul>\r\n<h3><strong>Recommended Books</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>\"Eloquent JavaScript\"</strong> by Marijn Haverbeke.</li>\r\n<li><strong>\"You Don&rsquo;t Know JS\"</strong> series by Kyle Simpson.</li>\r\n<li><strong>\"The Pragmatic Programmer\"</strong> by Andrew Hunt and David Thomas.</li>\r\n<li><strong>\"Full Stack Development with MERN\"</strong> by Shama Hoque.</li>\r\n</ul>\r\n<h3><strong>Communities &amp; Forums</strong></h3>\r\n<ul data-spread=\"false\">\r\n<li><strong>Stack Overflow</strong> &ndash; Q&amp;A platform for coding-related discussions.</li>\r\n<li><strong>GitHub &amp; Dev.to</strong> &ndash; Networking and sharing projects with other developers.</li>\r\n<li><strong>Reddit Communities (r/webdev, r/learnprogramming)</strong> &ndash; Discussions and guidance for aspiring developers.</li>\r\n</ul>\r\n<h2><strong>Conclusion</strong></h2>\r\n<p>Becoming a full stack developer requires continuous learning and hands-on practice. By mastering both front-end and back-end technologies, developers can build robust, scalable applications and open doors to numerous career opportunities.</p>\r\n<p>Start by building small projects, expanding your skill set, and staying updated with industry trends. With dedication and persistence, you can become a proficient full stack developer and work on exciting, real-world applications!</p>', 43, '2026-03-26 03:50:24', '2026-03-26 03:50:24'),
(13, 'Mastering Git: A Detailed Guide for Beginners', '1774517731.jpg', 'mastering-git-a-detailed-guide-for-beginners', 'Learn Git from scratch with this detailed guide. Set up Git, manage branches, collaborate with remote repositories, and follow best practices for version control.', '<p>Git is a powerful distributed version control system used by developers to track changes in code, collaborate on projects, and maintain code history efficiently. In this guide, we will cover the basics of Git, its essential commands, and best practices.</p>\r\n<h2><strong>Why Use Git?</strong></h2>\r\n<p>Git offers several advantages, making it the most widely used version control system:</p>\r\n<ul data-spread=\"false\">\r\n<li><strong>Version Control</strong> &ndash; Keeps track of changes in your project.</li>\r\n<li><strong>Collaboration</strong> &ndash; Allows multiple developers to work on the same project.</li>\r\n<li><strong>Branching &amp; Merging</strong> &ndash; Enables working on new features without affecting the main codebase.</li>\r\n<li><strong>Backup &amp; Recovery</strong> &ndash; Provides a history of changes to revert if needed.</li>\r\n<li><strong>Widely Used</strong> &ndash; Supported by platforms like GitHub, GitLab, and Bitbucket.</li>\r\n</ul>\r\n<h2><strong>Installing Git</strong></h2>\r\n<p>Download and install Git from <a>Git\'s official website</a>. Verify installation:</p>\r\n<pre class=\"language-plaintext\"><code>git --version</code></pre>\r\n<h2><strong>Basic Git Commands</strong></h2>\r\n<h3><strong>Step 1: Configuring Git</strong></h3>\r\n<p>Set up your username and email:</p>\r\n<pre class=\"language-plaintext\"><code>git config --global user.name \"Your Name\"\r\ngit config --global user.email \"your.email@example.com\"</code></pre>\r\n<p>Check the configuration:</p>\r\n<pre class=\"language-plaintext\"><code>git config --list</code></pre>\r\n<h3><strong>Step 2: Initializing a Repository</strong></h3>\r\n<p>To start tracking a project with Git:</p>\r\n<pre class=\"language-plaintext\"><code>mkdir my-git-project\r\ncd my-git-project\r\ngit init</code></pre>\r\n<p>This initializes an empty Git repository in the project folder.</p>\r\n<h3><strong>Step 3: Adding and Committing Files</strong></h3>\r\n<p>Create a file and add it to Git:</p>\r\n<pre class=\"language-plaintext\"><code>echo \"Hello Git\" &gt; file.txt\r\ngit add file.txt</code></pre>\r\n<p>Commit the changes:</p>\r\n<pre class=\"language-plaintext\"><code>git commit -m \"Initial commit\"</code></pre>\r\n<h3><strong>Step 4: Checking Status and Logs</strong></h3>\r\n<p>View the status of your repository:</p>\r\n<pre class=\"language-plaintext\"><code>git status</code></pre>\r\n<p>See the commit history:</p>\r\n<pre class=\"language-plaintext\"><code>git log</code></pre>\r\n<h2><strong>Working with Branches</strong></h2>\r\n<h3><strong>Creating and Switching Branches</strong></h3>\r\n<p>Create a new branch:</p>\r\n<pre class=\"language-plaintext\"><code>git branch feature-branch</code></pre>\r\n<p>Switch to the new branch:</p>\r\n<pre class=\"language-plaintext\"><code>git checkout feature-branch</code></pre>\r\n<p>Or use the shorthand:</p>\r\n<pre class=\"language-plaintext\"><code>git switch feature-branch</code></pre>\r\n<h3><strong>Merging Branches</strong></h3>\r\n<p>Merge <code>feature-branch</code> into <code>main</code>:</p>\r\n<pre class=\"language-plaintext\"><code>git checkout main\r\ngit merge feature-branch</code></pre>\r\n<p>Resolve conflicts if any arise.</p>\r\n<h3><strong>Deleting a Branch</strong></h3>\r\n<p>After merging, delete the branch:</p>\r\n<pre class=\"language-plaintext\"><code>git branch -d feature-branch</code></pre>\r\n<h2><strong>Working with Remote Repositories</strong></h2>\r\n<h3><strong>Connecting to a Remote Repository</strong></h3>\r\n<p>To connect a local repository to a remote repository (e.g., GitHub):</p>\r\n<pre class=\"language-plaintext\"><code>git remote add origin https://github.com/your-username/your-repo.git</code></pre>\r\n<h3><strong>Pushing Code to GitHub</strong></h3>\r\n<p>Push your changes to the remote repository:</p>\r\n<pre class=\"language-plaintext\"><code>git push -u origin main</code></pre>\r\n<h3><strong>Cloning a Repository</strong></h3>\r\n<p>To clone an existing repository:</p>\r\n<pre class=\"language-plaintext\"><code>git clone https://github.com/user/repository.git</code></pre>\r\n<h3><strong>Pulling Changes from Remote</strong></h3>\r\n<p>To update your local repository with the latest changes:</p>\r\n<pre class=\"language-plaintext\"><code>git pull origin main</code></pre>\r\n<h2><strong>Undoing Changes</strong></h2>\r\n<h3><strong>Undo Last Commit</strong></h3>\r\n<p>If you made a mistake in the last commit:</p>\r\n<pre class=\"language-plaintext\"><code>git reset --soft HEAD~1</code></pre>\r\n<h3><strong>Reverting Changes</strong></h3>\r\n<p>To revert a commit:</p>\r\n<pre class=\"language-plaintext\"><code>git revert &lt;commit-hash&gt;</code></pre>\r\n<h3><strong>Stashing Changes</strong></h3>\r\n<p>If you need to save changes without committing:</p>\r\n<pre class=\"language-plaintext\"><code>git stash</code></pre>\r\n<p>Apply stashed changes:</p>\r\n<pre class=\"language-plaintext\"><code>git stash pop</code></pre>\r\n<h2><strong>Best Practices for Git</strong></h2>\r\n<ul data-spread=\"false\">\r\n<li><strong>Write Meaningful Commit Messages</strong> &ndash; Describe what changes were made.</li>\r\n<li><strong>Use Branching</strong> &ndash; Keep features separate from the main branch.</li>\r\n<li><strong>Pull Before Pushing</strong> &ndash; Avoid merge conflicts by pulling latest changes before pushing.</li>\r\n<li><strong>Commit Frequently</strong> &ndash; Small commits help in tracking changes better.</li>\r\n<li><strong>Review Changes Before Committing</strong> &ndash; Use <code>git diff</code> to check modifications.</li>\r\n</ul>\r\n<h2><strong>Conclusion</strong></h2>\r\n<p>Git is an essential tool for developers, enabling efficient collaboration and version control. By mastering Git commands and best practices, you can streamline your workflow and contribute effectively to projects.</p>\r\n<p>Ready to go deeper? Explore <strong>Git rebase, GitHub Actions, and advanced branching strategies</strong>!</p>', 43, '2026-03-26 04:05:31', '2026-03-26 04:05:31'),
(14, 'Getting Started with Node.js: A Beginner\'s Guide', '1774518570.jpg', 'getting-started-with-node-js-a-beginner-s-guide', 'Learn Node.js from scratch with this beginner-friendly guide. Set up your first Node.js project, build a web server, work with APIs, databases, and deploy your application.', '<p>Node.js is a powerful JavaScript runtime built on Chrome\'s V8 engine, enabling developers to run JavaScript on the server side. It is widely used for building scalable network applications, APIs, and full-stack web applications. This guide will introduce you to Node.js and help you set up your first Node.js project.</p>\r\n<h2><strong>Why Choose Node.js?</strong></h2>\r\n<p>Node.js offers several advantages that make it a popular choice among developers:</p>\r\n<ul data-spread=\"false\">\r\n<li><strong>Asynchronous &amp; Event-Driven</strong> &ndash; Non-blocking architecture ensures high performance.</li>\r\n<li><strong>Single Programming Language</strong> &ndash; Use JavaScript for both frontend and backend development.</li>\r\n<li><strong>High Performance</strong> &ndash; Built on Chrome&rsquo;s V8 engine for fast execution.</li>\r\n<li><strong>Large Ecosystem</strong> &ndash; Extensive package support via npm (Node Package Manager).</li>\r\n<li><strong>Scalability</strong> &ndash; Ideal for handling multiple simultaneous connections.</li>\r\n</ul>\r\n<h2><strong>Setting Up Node.js</strong></h2>\r\n<h3><strong>Step 1: Install Node.js</strong></h3>\r\n<p>Download and install Node.js from the <a>official website</a>. Verify installation by running:</p>\r\n<pre class=\"language-plaintext\"><code>node -v\r\nnpm -v</code></pre>\r\n<h3><strong>Step 2: Initialize a Node.js Project</strong></h3>\r\n<p>Create a new directory and initialize a Node.js project:</p>\r\n<pre class=\"language-plaintext\"><code>mkdir my-node-app\r\ncd my-node-app\r\nnpm init -y</code></pre>\r\n<p>This generates a <code>package.json</code> file that manages dependencies and project metadata.</p>\r\n<h2><strong>Building a Simple Node.js Server</strong></h2>\r\n<p>Node.js provides the built-in <code>http</code> module to create a basic web server:</p>\r\n<pre class=\"language-javascript\"><code>const http = require(\'http\');\r\n\r\nconst server = http.createServer((req, res) =&gt; {\r\n    res.writeHead(200, { \'Content-Type\': \'text/plain\' });\r\n    res.end(\'Hello, Node.js!\');\r\n});\r\n\r\nserver.listen(3000, () =&gt; {\r\n    console.log(\'Server is running on port 3000\');\r\n});</code></pre>\r\n<p>Run the script:</p>\r\n<pre class=\"language-plaintext\"><code>node server.js</code></pre>\r\n<p>Visit <code>http://localhost:3000/</code> in your browser to see the response.</p>\r\n<h2><strong>Using npm and Installing Packages</strong></h2>\r\n<p>Node.js relies on npm to manage packages. Install a package using:</p>\r\n<pre class=\"language-plaintext\"><code>npm install express</code></pre>\r\n<p>This installs Express.js, a popular web framework for Node.js.</p>\r\n<h2><strong>Building a Web Server with Express.js</strong></h2>\r\n<p>Express simplifies server creation. Install and use it as follows:</p>\r\n<pre class=\"language-javascript\"><code>const express = require(\'express\');\r\nconst app = express();\r\n\r\napp.get(\'/\', (req, res) =&gt; {\r\n    res.send(\'Hello, Express!\');\r\n});\r\n\r\napp.listen(3000, () =&gt; {\r\n    console.log(\'Express server running on port 3000\');\r\n});</code></pre>\r\n<p>Run the script and visit <code><a href=\"http://localhost:3000/\">http://localhost:3000/</a></code>.</p>\r\n<h2><strong>Working with APIs in Node.js</strong></h2>\r\n<p>Fetch data from an external API using the <code>axios</code> package:</p>\r\n<pre class=\"language-plaintext\"><code>npm install axios</code></pre>\r\n<pre class=\"language-javascript\"><code>const axios = require(\'axios\');\r\n\r\naxios.get(\'https://jsonplaceholder.typicode.com/posts\')\r\n    .then(response =&gt; console.log(response.data))\r\n    .catch(error =&gt; console.error(error));</code></pre>\r\n<h2><strong>Using Node.js with a Database</strong></h2>\r\n<h3><strong>Connecting to MongoDB</strong></h3>\r\n<p>Install <code>mongoose</code> to interact with MongoDB:</p>\r\n<pre class=\"language-plaintext\"><code>npm install mongoose</code></pre>\r\n<p>Connect and define a model:</p>\r\n<pre class=\"language-javascript\"><code>const mongoose = require(\'mongoose\');\r\n\r\nmongoose.connect(\'mongodb://localhost:27017/mydb\', { useNewUrlParser: true, useUnifiedTopology: true });\r\n\r\nconst User = mongoose.model(\'User\', { name: String, age: Number });\r\n\r\nconst newUser = new User({ name: \'John\', age: 30 });\r\nnewUser.save().then(() =&gt; console.log(\'User saved\'));</code></pre>\r\n<h2><strong>Node.js Middleware and Routing</strong></h2>\r\n<p>Express middleware functions process requests before sending responses.</p>\r\n<p>Middleware Example</p>\r\n<pre class=\"language-javascript\"><code>app.use((req, res, next) =&gt; {\r\n    console.log(`Request received: ${req.method} ${req.url}`);\r\n    next();\r\n});</code></pre>\r\n<p>Defining Routes</p>\r\n<pre class=\"language-javascript\"><code>app.get(\'/users\', (req, res) =&gt; {\r\n    res.json([{ id: 1, name: \'Alice\' }, { id: 2, name: \'Bob\' }]);\r\n});</code></pre>\r\n<h2><strong>Deploying a Node.js Application</strong></h2>\r\n<p>To deploy a Node.js application:</p>\r\n<ol start=\"1\" data-spread=\"false\">\r\n<li>Use <strong>PM2</strong> for process management:<br><br>\r\n<pre class=\"language-plaintext\"><code>npm install -g pm2\r\npm2 start server.js</code></pre>\r\n</li>\r\n<li>Deploy on cloud platforms like <strong>Heroku</strong>, <strong>AWS</strong>, or <strong>Vercel</strong>.</li>\r\n</ol>\r\n<h2><strong>Conclusion</strong></h2>\r\n<p>Node.js is a versatile and powerful tool for server-side development. With its event-driven architecture, extensive package ecosystem, and fast execution speed, it is ideal for building web applications, APIs, and microservices.</p>\r\n<p>Ready to go deeper? Explore <strong>WebSockets, GraphQL, and microservices architecture</strong> with Node.js!</p>', 43, '2026-03-26 04:19:30', '2026-03-26 04:19:30'),
(15, 'Getting Started with Django: A Beginner\'s Guide', '1774519257.png', 'getting-started-with-django-a-beginner-s-guide', 'Learn Django from scratch with this beginner-friendly guide. Set up your first Django project, understand models, views, URL routing, and the admin panel in Django.', '<p>Django is a powerful and popular Python framework used for web development. It is designed to help developers build secure, scalable, and maintainable applications quickly. In this guide, we will cover the fundamentals of Django and help you set up your first Django project.</p>\r\n<h2><strong>Why Choose Django?</strong></h2>\r\n<p>Django follows the \"batteries-included\" philosophy, providing a variety of built-in features to streamline development. Here&rsquo;s why developers prefer Django:</p>\r\n<ul data-spread=\"false\">\r\n<li><strong>Fast Development</strong> &ndash; Django follows the DRY (Don\'t Repeat Yourself) principle, reducing redundancy.</li>\r\n<li><strong>Secure</strong> &ndash; Comes with built-in security features like protection against SQL injection, CSRF, and XSS.</li>\r\n<li><strong>Scalable</strong> &ndash; Handles high traffic efficiently, making it ideal for large-scale applications.</li>\r\n<li><strong>Extensive Libraries</strong> &ndash; Includes pre-built modules for authentication, database management, and more.</li>\r\n<li><strong>Built-in ORM (Object-Relational Mapping)</strong> &ndash; Simplifies database interactions.</li>\r\n</ul>\r\n<h2><strong>Setting Up Django</strong></h2>\r\n<p>To start working with Django, follow these steps:</p>\r\n<h3><strong>Step 1: Install Python</strong></h3>\r\n<p>Ensure you have Python installed. You can check this by running:</p>\r\n<pre class=\"language-plaintext\"><code>python --version</code></pre>\r\n<p>If Python is not installed, download it from <a>Python\'s official website</a>.</p>\r\n<h3><strong>Step 2: Install Django</strong></h3>\r\n<p>Use <code>pip</code> to install Django:</p>\r\n<pre class=\"language-plaintext\"><code>pip install django</code></pre>\r\n<p>Verify the installation:</p>\r\n<pre class=\"language-plaintext\"><code>django-admin --version</code></pre>\r\n<h3><strong>Step 3: Create a Django Project</strong></h3>\r\n<p>To start a new Django project, use the following command:</p>\r\n<pre class=\"language-plaintext\"><code>django-admin startproject myproject\r\ncd myproject</code></pre>\r\n<h3><strong>Step 4: Run the Development Server</strong></h3>\r\n<p>Launch the built-in Django development server:</p>\r\n<pre class=\"language-plaintext\"><code>python manage.py runserver</code></pre>\r\n<p>Visit <code>http://127.0.0.1:8000/</code> in your browser to see your Django project running.</p>\r\n<h2><strong>Understanding Django\'s Structure</strong></h2>\r\n<p>When you create a Django project, you get the following directory structure:</p>\r\n<pre class=\"language-plaintext\"><code>myproject/\r\n│── manage.py\r\n│─t/\r\n│   │── __init__.py\r\n│   │── settings.py\r\n│   │── urls.py\r\n│   │── wsgi.py\r\n│   │── asgi.py</code></pre>\r\n<ul>\r\n<li><strong>manage.py</strong> &ndash; Command-line utility for managing the project.</li>\r\n<li><strong>settings.py</strong> &ndash; Contains project configurations.</li>\r\n<li><strong>urls.py</strong> &ndash; Defines URL patterns for routing.</li>\r\n<li><strong>wsgi.py/asgi.py</strong> &ndash; Entry points for WSGI and ASGI-compatible ers.</li>\r\n</ul>\r\n<h2><strong>Creating a Django App</strong></h2>\r\n<p>Django projects are organized into apps. To create an app, run:</p>\r\n<pre class=\"language-plaintext\"><code>python manage.py startapp myapp</code></pre>\r\n<p>This generates the following structure:</p>\r\n<pre class=\"language-plaintext\"><code>myapp/\r\n│── migrations/\r\n│── __init__.py\r\n│── admin.py\r\n│── apps.py\r\n│── models.py\r\n│── tests.py\r\n│── views.py</code></pre>\r\n<ul>trong>models.py</strong> &ndash; Defines database models.</li>\r\n<li><strong>views.py</strong> &ndash; Handles request/response logic.</li>\r\n<li><strong>admin.py</strong> &ndash; Configures Django&rsquo;s admin panel.</li>\r\n</ul>\r\n<p>Register the app in <code>settings.py</code>:</p>\r\n<pre class=\"language-python\"><code>INSTALLED_APPS = [\r\n    \'django.contrib.admin\',\r\n    \'django.contrib.auth\',\r\n    \'django.contrib.contenttypes\',\r\n    \'django.contrib.sessions\',\r\n    \'django.contrib.messages\',\r\n    \'django.contrib.staticfiles\',\r\n    \'myapp\',\r\n]</code></pre>\r\n<h2><strong>Defining Models in Django</strong></h2>\r\n<p>Models define the structure of database tables. Here&rsquo;s an example model:</p>\r\n<pre class=\"language-python\"><code>from django.db import models\r\n\r\nclass Post(models.Model):\r\n    title = models.CharField(max_length=200)\r\n    content = models.TextField()\r\n    created_at = models.DateTimeField(auto_now_add=True)</code></pre>\r\n<p>Run migrations to apply changes:</p>\r\n<pre class=\"language-plaintext\"><code>python manage.py makemigrations\r\npython manage.py migrate</code></pre>\r\n<h2><strong>Creating Views and URL Routing</strong></h2>\r\n<p>Define a view in <code>views.py</code>:</p>\r\n<pre class=\"language-python\"><code>from django.http import HttpResponse\r\n\r\ndef home(request):\r\n    return HttpResponse(\"Hello, Django!\")</code></pre>\r\n<p>Map it to a URL in <code>urls.py</code>:</p>\r\n<pre class=\"language-python\"><code>from django.urls import path\r\nfrom .views import home\r\n\r\nurlpatterns = [\r\n    path(\'\', home, name=\'home\'),\r\n]</code></pre>\r\n<h2><strong>Django Admin Panel</strong></h2>\r\n<p>Django includes an admin interface for managing database records. Create an admin user:</p>\r\n<pre class=\"language-plaintext\"><code>python manage.py createsuperuser</code></pre>\r\n<p>Access the admin panel at <code>http://127.0.0.1:8000/admin/</code>.</p>\r\n<h2><strong>Conclusion</strong></h2>\r\n<p>Django is an excellent framework for building modern web applications. By understanding its core concepts&mdash;models, views, URL routing, and the admin panel&mdash;you can start developing powerful web applications efficiently.</p>\r\n<p>Ready to take the next step? Explore Django&rsquo;s templating system, authentication features, and REST API development!</p>', 43, '2026-03-26 04:30:57', '2026-03-26 04:30:57'),
(16, 'Getting Started with React: A Beginner\'s Guide', '1774531228.png', 'getting-started-with-react-a-beginner-s-guide', 'Learn React from scratch with this beginner-friendly guide. Set up a React project, understand components, state, props, event handling, API calls, and lifecycle methods in React.js.', '<p>JavaScript frameworks have revolutionized web development, and React is one of the most popular choices among developers. Whether you\'re building a small interactive UI or a large-scale application, React provides flexibility, efficiency, and scalability. This guide will introduce you to React and help you set up your first React application with detailed explanations and examples.</p>\r\n<h2><strong>Why Choose React?</strong></h2>\r\n<p>React is a JavaScript library for building user interfaces, developed by Facebook. Here&rsquo;s why developers love React:</p>\r\n<ul data-spread=\"false\">\r\n<li><strong>Component-Based Architecture</strong> &ndash; Encourages reusability and modular development, making applications easier to maintain and scale.</li>\r\n<li><strong>Virtual DOM</strong> &ndash; Improves performance by reducing direct manipulation of the actual DOM, allowing only necessary updates.</li>\r\n<li><strong>Declarative Syntax</strong> &ndash; Makes UI development more predictable and easier to debug.</li>\r\n<li><strong>Strong Community Support</strong> &ndash; Extensive documentation and numerous third-party libraries available.</li>\r\n<li><strong>SEO-Friendly</strong> &ndash; Better rendering capabilities compared to other front-end frameworks, especially with server-side rendering (SSR) using Next.js.</li>\r\n<li><strong>Easy Integration</strong> &ndash; Can be used with various back-end technologies and other JavaScript libraries.</li>\r\n</ul>\r\n<h2><strong>Setting Up a React Application</strong></h2>\r\n<p>To get started with React, you need to set up a development environment. Follow these steps:</p>\r\n<h3><strong>Step 1: Install Node.js</strong></h3>\r\n<p>React requires Node.js for package management. Download and install it from <a>Node.js official site</a>. After installation, verify the installation using:</p>\r\n<pre class=\"language-plaintext\"><code>node -v\r\nnpm -v</code></pre>\r\n<h3><strong>Step 2: Create a React App</strong></h3>\r\n<p>Use Create React App (CRA) to set up a new project quickly:</p>\r\n<pre class=\"language-plaintext\"><code>npx create-react-app my-app\r\ncd my-app\r\nnpm start</code></pre>\r\n<p>This will start a local development server at <code><a href=\"http://localhost:3000\">http://localhost:3000</a></code>.</p>\r\n<h2><strong>Understanding React Components</strong></h2>\r\n<p>React applications are built using components, which can be either functional or class-based.</p>\r\n<h3><strong>Functional Component</strong></h3>\r\n<p>Functional components are simpler and recommended for most cases:</p>\r\n<pre class=\"language-javascript\"><code>function Welcome() {\r\n  return &lt;h1&gt;Hello, React!&lt;/h1&gt;;\r\n}</code></pre>\r\n<h3><strong>Class Component</strong></h3>\r\n<p>Class components are older but still used in some projects:</p>\r\n<pre class=\"language-javascript\"><code>import React, { Component } from \'react\';\r\n\r\nclass Welcome extends Component {\r\n  render() {\r\n    return &lt;h1&gt;Hello, React!&lt;/h1&gt;;\r\n  }\r\n}</code></pre>\r\n<h2><strong>State and Props in React</strong></h2>\r\n<h3><strong>Props (Properties)</strong></h3>\r\n<p>Props are used to pass data from a parent component to a child component.</p>\r\n<pre class=\"language-javascript\"><code>function Greeting(props) {\r\n  return &lt;h1&gt;Hello, {props.name}!&lt;/h1&gt;;\r\n}</code></pre>\r\n<p>Usage:</p>\r\n<pre class=\"language-javascript\"><code>&lt;Greeting name=\"John\" /&gt;</code></pre>\r\n<h3><strong>State</strong></h3>\r\n<p>State is used to manage dynamic data within a component.</p>\r\n<pre class=\"language-javascript\"><code>import React, { useState } from \'react\';\r\n\r\nfunction Counter() {\r\n  const [count, setCount] = useState(0);\r\n\r\n  return (\r\n    &lt;div&gt;\r\n      &lt;p&gt;Count: {count}&lt;/p&gt;\r\n      &lt;button onClick={() =&gt; setCount(count + 1)}&gt;Increment&lt;/button&gt;\r\n    &lt;/div&gt;\r\n  );\r\n}</code></pre>\r\n<h2><strong>Handling Events in React</strong></h2>\r\n<p>React handles events similarly to JavaScript but uses camelCase syntax.</p>\r\n<pre class=\"language-javascript\"><code>function ClickButton() {\r\n  function handleClick() {\r\n    alert(\'Button clicked!\');\r\n  }\r\n\r\n  return &lt;button onClick={handleClick}&gt;Click Me&lt;/button&gt;;\r\n}</code></pre>\r\n<h2><strong>React Lifecycle Methods</strong></h2>\r\n<p>React class components have lifecycle methods:</p>\r\n<ul data-spread=\"false\">\r\n<li><code>componentDidMount()</code> &ndash; Executes after the component is inserted into the DOM.</li>\r\n<li><code>componentDidUpdate()</code> &ndash; Executes when the component updates.</li>\r\n<li><code>componentWillUnmount()</code> &ndash; Executes before removing the component.</li>\r\n</ul>\r\n<p>With hooks, <code>useEffect</code> replaces lifecycle methods:</p>\r\n<pre class=\"language-javascript\"><code>import React, { useEffect } from \'react\';\r\n\r\nfunction Example() {\r\n  useEffect(() =&gt; {\r\n    console.log(\"Component mounted\");\r\n  }, []);\r\n\r\n  return &lt;div&gt;Hello, React!&lt;/div&gt;;\r\n}</code></pre>\r\n<h2><strong>React Router for Navigation</strong></h2>\r\n<p>For handling navigation in React applications, React Router is commonly used. Install it with:</p>\r\n<pre class=\"language-plaintext\"><code>npm install react-router-dom</code></pre>\r\n<p>Example of setting up routes:</p>\r\n<pre class=\"language-javascript\"><code>import React from \"react\";\r\nimport { BrowserRouter as Router, Route, Switch } from \"react-router-dom\";\r\nimport Home from \"./Home\";\r\nimport About from \"./About\";\r\n\r\nfunction App() {\r\n  return (\r\n    &lt;Router&gt;\r\n      &lt;Switch&gt;\r\n        &lt;Route exact path=\"/\" component={Home} /&gt;\r\n        &lt;Route path=\"/about\" component={About} /&gt;\r\n      &lt;/Switch&gt;\r\n    &lt;/Router&gt;\r\n  );\r\n}</code></pre>\r\n<h2><strong>Using API Calls in React</strong></h2>\r\n<p>React can fetch data from APIs using the <code>fetch()</code> method or <code>axios</code>.</p>\r\n<h3><strong>Using Fetch API</strong></h3>\r\n<pre class=\"language-javascript\"><code>import React, { useEffect, useState } from \'react\';\r\n\r\nfunction FetchData() {\r\n  const [data, setData] = useState([]);\r\n\r\n  useEffect(() =&gt; {\r\n    fetch(\'https://jsonplaceholder.typicode.com/posts\')\r\n      .then(response =&gt; response.json())\r\n      .then(data =&gt; setData(data));\r\n  }, []);\r\n\r\n  return (\r\n    &lt;ul&gt;\r\n      {data.map(post =&gt; (\r\n        &lt;li key={post.id}&gt;{post.title}&lt;/li&gt;\r\n      ))}\r\n    &lt;/ul&gt;\r\n  );\r\n}</code></pre>\r\n<h2><strong>Conclusion</strong></h2>\r\n<p>React is a powerful and flexible JavaScript library for building modern web applications. By understanding its core concepts&mdash;components, props, state, event handling, lifecycle methods, routing, and API calls&mdash;you can start building interactive and scalable UIs.</p>\r\n<p>Want to explore more? Check out hooks, context API, and advanced state management techniques with Redux!</p>', 43, '2026-03-26 07:50:28', '2026-03-26 07:50:28');
INSERT INTO `blogs` (`id`, `name`, `img`, `slug`, `post_meta`, `post_desc`, `user_id`, `created_at`, `updated_at`) VALUES
(17, 'Building a REST API with Laravel: A Step-by-Step Guide', '1775227093.png', 'building-a-rest-api-with-laravel-a-step-by-step-guide', 'Learn how to build a REST API using Laravel with this step-by-step guide. Includes API routes, controllers, database migrations, and testing using Postman or cURL.', '<p>APIs play a crucial role in modern web applications by enabling seamless communication between different systems. Laravel provides a robust and developer-friendly way to build RESTful APIs, making it a preferred choice for many developers. In this comprehensive guide, we will walk you through creating a simple REST API in Laravel, covering everything from installation to testing.</p>\r\n<h2><strong>Why Use Laravel for REST API Development?</strong></h2>\r\n<p>Laravel is an excellent choice for API development because of its powerful built-in features. Here&rsquo;s why Laravel stands out:</p>\r\n<ul data-spread=\"false\">\r\n<li><strong>Built-in API Routing</strong> &ndash; Laravel makes defining API routes easy and efficient.</li>\r\n<li><strong>Eloquent ORM</strong> &ndash; Simplifies database interactions with expressive syntax.</li>\r\n<li><strong>Authentication &amp; Authorization</strong> &ndash; Supports API authentication via Laravel Sanctum or Passport.</li>\r\n<li><strong>Error Handling &amp; Validation</strong> &ndash; Provides a structured way to handle errors and validate requests.</li>\r\n<li><strong>Middleware Support</strong> &ndash; Enhances security and functionality through middleware layers.</li>\r\n<li><strong>Laravel Resource Controllers</strong> &ndash; Provides predefined methods for RESTful operations.</li>\r\n</ul>\r\n<h2><strong>Step 1: Install Laravel</strong></h2>\r\n<p>If you haven&rsquo;t already installed Laravel, you can set up a new Laravel project using Composer. Open a terminal and run:</p>\r\n<pre class=\"language-plaintext\"><code>composer create-project --prefer-dist laravel/laravel api_project</code></pre>\r\n<p>Move into the newly created project directory:</p>\r\n<pre class=\"language-plaintext\"><code>cd api_project</code></pre>\r\n<p>Ensure your server is running by executing:</p>\r\n<pre class=\"language-plaintext\"><code>php artisan serve</code></pre>\r\n<p>This will start a local development server at <code><a href=\"http://127.0.0.1:8000\">http://127.0.0.1:8000</a></code>.</p>\r\n<h2><strong>Step 2: Configure the Database</strong></h2>\r\n<p>Laravel uses environment variables to configure the database connection. Open the <code>.env</code> file and update the following details according to your MySQL setup:</p>\r\n<pre class=\"language-plaintext\"><code>DB_CONNECTION=mysql  \r\nDB_HOST=127.0.0.1  \r\nDB_PORT=3306  \r\nDB_DATABASE=api_project  \r\nDB_USERNAME=root  \r\nDB_PASSWORD=</code></pre>\r\n<p>Now, run the following command to migrate the default Laravel tables:</p>\r\n<pre class=\"language-plaintext\"><code>php artisan migrate</code></pre>\r\n<h2><strong>Step 3: Create a Model and Migration</strong></h2>\r\n<p>Next, we will create a <code>Product</code> model along with a migration file to define the database schema.</p>\r\n<pre class=\"language-plaintext\"><code>php artisan make:model Product -m</code></pre>\r\n<p>Now, open the generated migration file in <code>database/migrations/</code> and define the structure of the <code>products</code> table:</p>\r\n<pre class=\"language-php\"><code>public function up()\r\n{\r\n    Schema::create(\'products\', function (Blueprint $table) {\r\n        $table-&gt;id();\r\n        $table-&gt;string(\'name\');\r\n        $table-&gt;text(\'description\');\r\n        $table-&gt;decimal(\'price\', 8, 2);\r\n        $table-&gt;timestamps();\r\n    });\r\n}</code></pre>\r\n<p>Run the migration command to apply the changes:</p>\r\n<pre class=\"language-plaintext\"><code>php artisan migrate</code></pre>\r\n<h2><strong>Step 4: Create a Controller</strong></h2>\r\n<p>Generate a resource controller to handle CRUD (Create, Read, Update, Delete) operations:</p>\r\n<pre class=\"language-plaintext\"><code>php artisan make:controller ProductController --api</code></pre>\r\n<p>Now, open <code>app/Http/Controllers/ProductController.php</code> and define the API methods:</p>\r\n<pre class=\"language-php\"><code>use App\\Models\\Product;\r\nuse Illuminate\\Http\\Request;\r\n\r\nclass ProductController extends Controller\r\n{\r\n    public function index() {\r\n        return Product::all();\r\n    }\r\n\r\n    public function store(Request $request) {\r\n        $validated = $request-&gt;validate([\r\n            \'name\' =&gt; \'required\',\r\n            \'description\' =&gt; \'required\',\r\n            \'price\' =&gt; \'required|numeric\'\r\n        ]);\r\n\r\n        return Product::create($validated);\r\n    }\r\n\r\n    public function show(Product $product) {\r\n        return $product;\r\n    }\r\n\r\n    public function update(Request $request, Product $product) {\r\n        $product-&gt;update($request-&gt;all());\r\n        return $product;\r\n    }\r\n\r\n    public function destroy(Product $product) {\r\n        $product-&gt;delete();\r\n        return response()-&gt;json([\'message\' =&gt; \'Product deleted successfully\']);\r\n    }\r\n}</code></pre>\r\n<h2><strong>Step 5: Define API Routes</strong></h2>\r\n<p>Edit <code>routes/api.php</code> to register API endpoints for the Product resource:</p>\r\n<pre class=\"language-php\"><code>use App\\Http\\Controllers\\ProductController;\r\n\r\nRoute::apiResource(\'products\', ProductController::class);</code></pre>\r\n<p>This will automatically create RESTful API routes for <code>index</code>, <code>store</code>, <code>show</code>, <code>update</code>, and <code>destroy</code> methods.</p>\r\n<h2><strong>Step 6: Test the API</strong></h2>\r\n<h3><strong>Using Laravel&rsquo;s Built-in Server</strong></h3>\r\n<p>Start Laravel&rsquo;s local development server if it&rsquo;s not already running:</p>\r\n<pre class=\"language-plaintext\"><code>php artisan serve</code></pre>\r\n<h3><strong>Testing with Postman or cURL</strong></h3>\r\n<h4><strong>Fetch All Products:</strong></h4>\r\n<pre class=\"language-plaintext\"><code>curl -X GET http://127.0.0.1:8000/api/products</code></pre>\r\n<p>Create a New Product:</p>\r\n<pre class=\"language-plaintext\"><code>curl -X POST http://127.0.0.1:8000/api/products -d \"name=New Product&amp;description=Awesome product&amp;price=99.99\"</code></pre>\r\n<p>Fetch a Single Product:</p>\r\n<pre class=\"language-plaintext\"><code>curl -X GET http://127.0.0.1:8000/api/products/1</code></pre>\r\n<p>Update a Product:</p>\r\n<pre class=\"language-plaintext\"><code>curl -X PUT http://127.0.0.1:8000/api/products/1 -d \"name=Updated Product&amp;price=89.99\"</code></pre>\r\n<p>Delete a Product:</p>\r\n<pre class=\"language-plaintext\"><code>curl -X DELETE http://127.0.0.1:8000/api/products/1</code></pre>\r\n<h2><strong>Conclusion</strong></h2>\r\n<p>Congratulations! You have successfully built a REST API using Laravel. This guide covered setting up Laravel, configuring the database, creating a model and controller, defining API routes, and testing with Postman or cURL.</p>\r\n<p>To enhance this API, consider adding authentication with Laravel Sanctum or Passport, pagination, and filtering options.</p>', 43, '2026-03-26 08:04:06', '2026-03-26 08:04:06'),
(18, 'Laravel vs Other PHP Frameworks: Why Laravel Stands Out?', '1775227083.png', 'laravel-vs-other-php-frameworks-why-laravel-stands-out', 'Discover why Laravel is the best PHP framework compared to CodeIgniter, Symfony, and Yii. Learn about Laravel\'s features like MVC, Eloquent ORM, Blade, and built-in authentication.', '<p data-start=\"129\" data-end=\"386\">Laravel has become one of the most widely used PHP frameworks, but how does it compare to other popular PHP frameworks like CodeIgniter, Symfony, and Yii? In this blog, we&rsquo;ll explore Laravel&rsquo;s strengths and why it&rsquo;s a preferred choice for many developers.</p>\r\n<h2 data-section-id=\"sswtgl\" data-start=\"388\" data-end=\"438\"><span role=\"text\"><strong data-start=\"391\" data-end=\"436\">Why Choose Laravel Over Other Frameworks?</strong></span></h2>\r\n<h3 data-section-id=\"1jche2b\" data-start=\"440\" data-end=\"480\"><span role=\"text\">1. <strong data-start=\"447\" data-end=\"478\">Elegant and Readable Syntax</strong></span></h3>\r\n<p data-start=\"481\" data-end=\"707\">Laravel offers a clean and expressive syntax that makes development faster and more enjoyable. Unlike CodeIgniter, which requires writing more boilerplate code, Laravel provides built-in features that streamline development.</p>\r\n<h3 data-section-id=\"9gk0uf\" data-start=\"709\" data-end=\"762\"><span role=\"text\">2. <strong data-start=\"716\" data-end=\"760\">MVC Architecture for Better Organization</strong></span></h3>\r\n<p data-start=\"763\" data-end=\"959\">Laravel follows the <strong data-start=\"783\" data-end=\"814\">Model-View-Controller (MVC)</strong> pattern, ensuring better code separation and organization. While Symfony also follows MVC, Laravel&rsquo;s implementation is more beginner-friendly.</p>\r\n<h3 data-section-id=\"1dxikne\" data-start=\"961\" data-end=\"1013\"><span role=\"text\">3. <strong data-start=\"968\" data-end=\"1011\">Built-in Authentication &amp; Authorization</strong></span></h3>\r\n<p data-start=\"1014\" data-end=\"1085\">Laravel provides authentication out of the box with a simple command:</p>\r\n<pre class=\"language-plaintext\"><code>php artisan make:auth</code></pre>\r\n<p data-start=\"1118\" data-end=\"1203\">Other frameworks like CodeIgniter require third-party libraries for authentication.</p>\r\n<h3 data-section-id=\"8qv1g1\" data-start=\"1205\" data-end=\"1239\"><span role=\"text\">4. <strong data-start=\"1212\" data-end=\"1237\">Powerful Eloquent ORM</strong></span></h3>\r\n<p data-start=\"1240\" data-end=\"1365\">Laravel&rsquo;s <strong data-start=\"1250\" data-end=\"1266\">Eloquent ORM</strong> makes database interactions easier and more intuitive than traditional SQL queries. For example:</p>\r\n<pre class=\"language-php\"><code>$users = User::where(\'status\', \'active\')-&gt;get();</code></pre>\r\n<p data-start=\"1426\" data-end=\"1508\">Symfony and Yii also have ORM options, but Laravel&rsquo;s Eloquent is simpler to use.</p>\r\n<h3 data-section-id=\"r8mq88\" data-start=\"1510\" data-end=\"1546\"><span role=\"text\">5. <strong data-start=\"1517\" data-end=\"1544\">Blade Templating Engine</strong></span></h3>\r\n<p data-start=\"1547\" data-end=\"1798\">Laravel&rsquo;s <strong data-start=\"1557\" data-end=\"1584\">Blade templating engine</strong> allows for reusable layouts and dynamic content rendering without sacrificing performance. Unlike plain PHP or Twig (used in Symfony), Blade provides features like template inheritance and conditional rendering.</p>\r\n<h3 data-section-id=\"ivh7qb\" data-start=\"1800\" data-end=\"1858\"><span role=\"text\">6. <strong data-start=\"1807\" data-end=\"1856\">Migration and Seeding for Database Management</strong></span></h3>\r\n<p data-start=\"1859\" data-end=\"1957\">With Laravel&rsquo;s <strong data-start=\"1874\" data-end=\"1900\">Migrations and Seeders</strong>, developers can manage database versions effortlessly:</p>\r\n<pre class=\"language-plaintext\"><code>php artisan migrate\r\nphp artisan db:seed</code></pre>\r\n<p data-start=\"2008\" data-end=\"2098\">Yii and Symfony also support migrations, but Laravel&rsquo;s implementation is more intuitive.</p>\r\n<h3 data-section-id=\"1uj3x0l\" data-start=\"2100\" data-end=\"2152\"><span role=\"text\">7. <strong data-start=\"2107\" data-end=\"2150\">Laravel Ecosystem and Community Support</strong></span></h3>\r\n<p data-start=\"2153\" data-end=\"2202\">Laravel comes with a rich ecosystem, including:</p>\r\n<ul data-start=\"2203\" data-end=\"2377\">\r\n<li data-section-id=\"1nilp89\" data-start=\"2203\" data-end=\"2257\"><strong data-start=\"2205\" data-end=\"2226\">Laravel Jetstream</strong> (authentication scaffolding)</li>\r\n<li data-section-id=\"1y83hd3\" data-start=\"2258\" data-end=\"2292\"><strong data-start=\"2260\" data-end=\"2276\">Laravel Nova</strong> (admin panel)</li>\r\n<li data-section-id=\"1qcmz4i\" data-start=\"2293\" data-end=\"2335\"><strong data-start=\"2295\" data-end=\"2314\">Laravel Horizon</strong> (queue monitoring)</li>\r\n<li data-section-id=\"198jvvr\" data-start=\"2336\" data-end=\"2377\"><strong data-start=\"2338\" data-end=\"2355\">Laravel Forge</strong> (server management)</li>\r\n</ul>\r\n<p data-start=\"2379\" data-end=\"2457\">Other PHP frameworks do not provide such an extensive set of built-in tools.</p>\r\n<h2 data-section-id=\"1pbivc6\" data-start=\"2459\" data-end=\"2478\"><span role=\"text\"><strong data-start=\"2462\" data-end=\"2476\">Conclusion</strong></span></h2>\r\n<p data-start=\"2479\" data-end=\"2766\">While all PHP frameworks have their strengths, <strong data-start=\"2526\" data-end=\"2548\">Laravel stands out</strong> due to its developer-friendly syntax, built-in features, and strong community support. If you&rsquo;re starting a new project or switching from another framework, Laravel is an excellent choice for modern web development.</p>', 43, '2026-03-26 08:14:09', '2026-03-26 08:14:09'),
(19, 'Introduction to Laravel: A Beginner\'s Guide', '1775227068.jpg', 'introduction-to-laravel-a-beginner-s-guide', 'Learn the basics of Laravel, a powerful PHP framework, with this beginner-friendly guide. Discover key features, installation steps, and how to create a simple blog in Laravel. Perfect for web developers looking to get started with Laravel!', '<p data-start=\"135\" data-end=\"451\">Laravel is one of the most popular PHP frameworks, known for its elegant syntax, powerful features, and developer-friendly environment. Whether you are a beginner or an experienced developer, Laravel simplifies web development by providing built-in tools for routing, authentication, database management, and more.</p>\r\n<h2 data-section-id=\"cgg18g\" data-start=\"453\" data-end=\"481\"><span role=\"text\"><strong data-start=\"456\" data-end=\"479\">Why Choose Laravel?</strong></span></h2>\r\n<ol data-start=\"483\" data-end=\"1060\">\r\n<li data-section-id=\"13w8avq\" data-start=\"483\" data-end=\"570\"><strong data-start=\"486\" data-end=\"504\">Elegant Syntax</strong> &ndash; Laravel&rsquo;s expressive and clean syntax makes coding enjoyable.</li>\r\n<li data-section-id=\"rm9gj7\" data-start=\"571\" data-end=\"670\"><strong data-start=\"574\" data-end=\"617\">Built-in Authentication &amp; Authorization</strong> &ndash; Secure user authentication is easy to implement.</li>\r\n<li data-section-id=\"x58r3d\" data-start=\"671\" data-end=\"783\"><strong data-start=\"674\" data-end=\"694\">MVC Architecture</strong> &ndash; Laravel follows the Model-View-Controller (MVC) pattern, making code more organized.</li>\r\n<li data-section-id=\"1tbwqsx\" data-start=\"784\" data-end=\"871\"><strong data-start=\"787\" data-end=\"803\">Eloquent ORM</strong> &ndash; Database operations are simplified with Laravel\'s powerful ORM.</li>\r\n<li data-section-id=\"16drjg4\" data-start=\"872\" data-end=\"959\"><strong data-start=\"875\" data-end=\"902\">Blade Templating Engine</strong> &ndash; Helps in creating dynamic views with minimal effort.</li>\r\n<li data-section-id=\"mumbnw\" data-start=\"960\" data-end=\"1060\"><strong data-start=\"963\" data-end=\"982\">Robust Security</strong> &ndash; Laravel protects against SQL injection, CSRF, and other security threats.</li>\r\n</ol>\r\n<h2 data-section-id=\"1er6ewt\" data-start=\"1062\" data-end=\"1094\"><span role=\"text\"><strong data-start=\"1065\" data-end=\"1092\">Key Features of Laravel</strong></span></h2>\r\n<ul data-start=\"1096\" data-end=\"1494\">\r\n<li data-section-id=\"ec8hm9\" data-start=\"1096\" data-end=\"1185\"><strong data-start=\"1098\" data-end=\"1110\">Routing:</strong> Laravel provides a simple and flexible way to define application routes.</li>\r\n<li data-section-id=\"1m2t4p3\" data-start=\"1186\" data-end=\"1271\"><strong data-start=\"1188\" data-end=\"1203\">Middleware:</strong> Allows filtering HTTP requests before they reach the application.</li>\r\n<li data-section-id=\"3evwzz\" data-start=\"1272\" data-end=\"1363\"><strong data-start=\"1274\" data-end=\"1299\">Migrations &amp; Seeding:</strong> Manage database structure easily without modifying SQL files.</li>\r\n<li data-section-id=\"heu0pz\" data-start=\"1364\" data-end=\"1430\"><strong data-start=\"1366\" data-end=\"1386\">Task Scheduling:</strong> Automate tasks using Laravel&rsquo;s scheduler.</li>\r\n<li data-section-id=\"iuxfq5\" data-start=\"1431\" data-end=\"1494\"><strong data-start=\"1433\" data-end=\"1445\">Testing:</strong> Built-in support for unit and feature testing.</li>\r\n</ul>\r\n<h2 data-section-id=\"runiat\" data-start=\"1496\" data-end=\"1533\"><span role=\"text\"><strong data-start=\"1499\" data-end=\"1531\">Getting Started with Laravel</strong></span></h2>\r\n<h3 data-section-id=\"1w3q8v\" data-start=\"1535\" data-end=\"1568\"><span role=\"text\"><strong data-start=\"1539\" data-end=\"1566\">Step 1: Install Laravel</strong></span></h3>\r\n<p data-start=\"1569\" data-end=\"1647\">To install Laravel, make sure you have PHP and Composer installed, then run:</p>\r\n<pre class=\"language-plaintext\"><code>composer create-project --prefer-dist laravel/laravel blog</code></pre>\r\n<h3 data-section-id=\"hweca\" data-start=\"1718\" data-end=\"1762\"><span role=\"text\"><strong data-start=\"1722\" data-end=\"1760\">Step 2: Run the Development Server</strong></span></h3>\r\n<p data-start=\"1763\" data-end=\"1818\">Navigate to your project folder and start the server:</p>\r\n<pre class=\"language-plaintext\"><code>php artisan serve</code></pre>\r\n<p data-start=\"1847\" data-end=\"1933\">Now, open <code data-start=\"1857\" data-end=\"1880\">http://127.0.0.1:8000</code> in your browser to see your Laravel project running.</p>\r\n<h3 data-section-id=\"16avod2\" data-start=\"1935\" data-end=\"1982\"><span role=\"text\"><strong data-start=\"1939\" data-end=\"1980\">Step 3: Create a Controller and Route</strong></span></h3>\r\n<p data-start=\"1983\" data-end=\"2011\">Generate a new controller:</p>\r\n<pre class=\"language-plaintext\"><code>php artisan make:controller BlogController</code></pre>\r\n<p>Define a route in <code data-start=\"2083\" data-end=\"2099\">routes/web.php</code>:</p>\r\n<pre class=\"language-php\"><code>use App\\Http\\Controllers\\BlogController;\r\n\r\nRoute::get(\'/blog\', [BlogController::class, \'index\']);</code></pre>\r\n<h3 data-section-id=\"of5m9o\" data-start=\"2212\" data-end=\"2250\"><span role=\"text\"><strong data-start=\"2216\" data-end=\"2248\">Step 4: Create a Simple View</strong></span></h3>\r\n<p data-start=\"2251\" data-end=\"2317\">Create a new Blade file inside <code data-start=\"2282\" data-end=\"2314\">resources/views/blog.blade.php</code>:</p>\r\n<pre class=\"language-markup\"><code>&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n    &lt;title&gt;My Laravel Blog&lt;/title&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n    &lt;h1&gt;Welcome to My Laravel Blog&lt;/h1&gt;\r\n    &lt;p&gt;This is a simple blog post.&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;\r\n</code></pre>\r\n<h2 data-section-id=\"1pbivc6\" data-start=\"2506\" data-end=\"2525\"><span role=\"text\"><strong data-start=\"2509\" data-end=\"2523\">Conclusion</strong></span></h2>\r\n<p data-start=\"2527\" data-end=\"2753\">Laravel makes web development efficient and enjoyable by offering a structured and feature-rich framework. Whether you\'re building a blog, an eCommerce site, or a complex web application, Laravel provides the tools you need.</p>', 43, '2026-03-26 08:20:03', '2026-03-26 08:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `cat_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `blog_id`, `cat_id`, `created_at`, `updated_at`) VALUES
(4, 10, 13, NULL, NULL),
(5, 10, 19, NULL, NULL),
(6, 11, 17, NULL, NULL),
(7, 11, 18, NULL, NULL),
(8, 12, 5, NULL, NULL),
(9, 12, 6, NULL, NULL),
(10, 12, 7, NULL, NULL),
(11, 12, 13, NULL, NULL),
(12, 12, 15, NULL, NULL),
(13, 13, 14, NULL, NULL),
(14, 13, 15, NULL, NULL),
(15, 13, 16, NULL, NULL),
(16, 14, 6, NULL, NULL),
(17, 14, 11, NULL, NULL),
(18, 15, 5, NULL, NULL),
(19, 15, 6, NULL, NULL),
(20, 16, 5, NULL, NULL),
(21, 16, 11, NULL, NULL),
(22, 16, 12, NULL, NULL),
(23, 16, 13, NULL, NULL),
(24, 16, 19, NULL, NULL),
(25, 17, 4, NULL, NULL),
(26, 17, 5, NULL, NULL),
(27, 17, 6, NULL, NULL),
(28, 17, 7, NULL, NULL),
(29, 17, 8, NULL, NULL),
(30, 17, 9, NULL, NULL),
(31, 18, 4, NULL, NULL),
(32, 18, 5, NULL, NULL),
(33, 18, 6, NULL, NULL),
(34, 18, 7, NULL, NULL),
(35, 18, 8, NULL, NULL),
(36, 18, 9, NULL, NULL),
(37, 18, 15, NULL, NULL),
(38, 19, 4, NULL, NULL),
(39, 19, 5, NULL, NULL),
(40, 19, 6, NULL, NULL),
(41, 19, 7, NULL, NULL),
(42, 19, 8, NULL, NULL),
(43, 19, 9, NULL, NULL),
(44, 19, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE `blog_tag` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tag`
--

INSERT INTO `blog_tag` (`id`, `blog_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(4, 10, 31, NULL, NULL),
(5, 10, 32, NULL, NULL),
(6, 10, 33, NULL, NULL),
(7, 11, 25, NULL, NULL),
(8, 11, 26, NULL, NULL),
(9, 11, 27, NULL, NULL),
(10, 11, 28, NULL, NULL),
(11, 12, 12, NULL, NULL),
(12, 12, 13, NULL, NULL),
(13, 12, 18, NULL, NULL),
(14, 13, 22, NULL, NULL),
(15, 13, 23, NULL, NULL),
(16, 13, 24, NULL, NULL),
(17, 14, 10, NULL, NULL),
(18, 14, 13, NULL, NULL),
(19, 14, 18, NULL, NULL),
(20, 14, 19, NULL, NULL),
(21, 14, 20, NULL, NULL),
(22, 14, 21, NULL, NULL),
(23, 15, 16, NULL, NULL),
(24, 15, 17, NULL, NULL),
(25, 16, 12, NULL, NULL),
(26, 16, 13, NULL, NULL),
(27, 16, 18, NULL, NULL),
(28, 17, 4, NULL, NULL),
(29, 17, 5, NULL, NULL),
(30, 17, 6, NULL, NULL),
(31, 17, 7, NULL, NULL),
(32, 17, 8, NULL, NULL),
(33, 17, 10, NULL, NULL),
(34, 17, 11, NULL, NULL),
(35, 17, 15, NULL, NULL),
(36, 18, 4, NULL, NULL),
(37, 18, 5, NULL, NULL),
(38, 18, 6, NULL, NULL),
(39, 18, 7, NULL, NULL),
(40, 18, 8, NULL, NULL),
(41, 18, 9, NULL, NULL),
(42, 19, 4, NULL, NULL),
(43, 19, 5, NULL, NULL),
(44, 19, 6, NULL, NULL),
(45, 19, 7, NULL, NULL),
(46, 19, 8, NULL, NULL),
(47, 19, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('0286dd552c9bea9a69ecb3759e7b94777635514b', 'i:1;', 1774512797),
('0286dd552c9bea9a69ecb3759e7b94777635514b:timer', 'i:1774512797;', 1774512797);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(4, 43, 'PHP Frameworks', '2026-03-26 02:57:59', '2026-03-26 02:57:59'),
(5, 43, 'Web Development', '2026-03-26 02:58:30', '2026-03-26 02:58:30'),
(6, 43, 'Backend Development', '2026-03-26 02:58:42', '2026-03-26 02:58:42'),
(7, 43, 'Full-Stack Development', '2026-03-26 02:58:53', '2026-03-26 02:58:53'),
(8, 43, 'Laravel Tutorials', '2026-03-26 02:59:05', '2026-03-26 02:59:05'),
(9, 43, 'PHP Development', '2026-03-26 03:01:04', '2026-03-26 03:01:04'),
(10, 43, 'Laravel vs CodeIgniter', '2026-03-26 03:01:29', '2026-03-26 03:01:29'),
(11, 43, 'JavaScript Frameworks', '2026-03-26 03:03:39', '2026-03-26 03:03:39'),
(12, 43, 'React Development', '2026-03-26 03:03:50', '2026-03-26 03:03:50'),
(13, 43, 'Frontend Development', '2026-03-26 03:04:04', '2026-03-26 03:04:04'),
(14, 43, 'Version Control', '2026-03-26 03:07:06', '2026-03-26 03:07:06'),
(15, 43, 'Software Development', '2026-03-26 03:07:17', '2026-03-26 03:07:17'),
(16, 43, 'Open Source Contribution', '2026-03-26 03:07:31', '2026-03-26 03:07:31'),
(17, 43, 'Database Management', '2026-03-26 03:09:09', '2026-03-26 03:09:09'),
(18, 43, 'SQL vs NoSQL', '2026-03-26 03:09:29', '2026-03-26 03:09:29'),
(19, 43, 'Web Design', '2026-03-26 03:13:45', '2026-03-26 03:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `if_author` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `if_author`, `user_id`, `parent_id`, `name`, `email`, `description`, `approved`, `created_at`, `updated_at`) VALUES
(3, 19, 'yes', 43, NULL, 'Vishakha Chavan', 'vishakha@example.com', 'hi', 'yes', '2026-04-03 08:49:16', '2026-04-03 08:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_06_141634_create_blogs_table', 1),
(5, '2025_02_06_155306_create_categories_table', 1),
(6, '2025_02_06_155346_create_tags_table', 1),
(7, '2025_02_06_155445_create_blog_category_table', 1),
(8, '2025_02_06_155615_create_blog_tag_table', 1),
(9, '2025_02_06_160257_create_comments_table', 1),
(10, '2025_02_11_112252_increase_post_desc_limit', 1),
(11, '2025_02_12_075611_create_rich_texts_table', 1),
(12, '2025_02_15_170928_add_parent_id_to_comments_table', 1),
(13, '2025_02_16_151454_add_approve_field_to_comments', 1),
(14, '2025_11_17_145513_create_admins_table', 1),
(15, '2025_11_20_125259_add_userid_to_categories', 1),
(16, '2025_11_20_125317_add_userid_to_tags', 1),
(17, '2025_11_21_123134_add_google_id_to_users_table', 1),
(18, '2025_11_22_172638_set_default_description_in_users_table_to_null', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rich_texts`
--

CREATE TABLE `rich_texts` (
  `id` bigint UNSIGNED NOT NULL,
  `record_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_id` bigint UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Cj1vD7MhKFV2wFjP5WT4OjFzMpmwA4Y0HeLMlo9Q', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidjE3MG9RTGZobzRZb2ZSUWU2OW9PeHJtZjF3VlJiQWR0NkVnTGdUNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3QvcHJvY29kZWJsb2dzL3B1YmxpYz9wYWdlPTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787331565),
('Ern2WNgYvlgHECQV4A5I6W4fcq6DZBQ4L1OGn6ZH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidnJKbUZLVGR6cnpScUI1bkNkWWlueXhhWjNMekswMlZEbURlczRCQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9wcm9jb2RlYmxvZ3MudGVzdDo4MDgwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1782284643),
('hsGhute9r197F1ny2U4QT93RFGRXrhY9Q91oYRDk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDNocjZNWmhiWEtIRkFiemQzUkN0Ykc0bGhtUXl5ZFVXV05rcUhRYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9wcm9jb2RlYmxvZ3MudGVzdDo4MDgwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774961520),
('xeBNbM66imKBwOLEcUkCd8yc6ICwqXWMwBNAEsH9', 43, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUkxUM1pvcmpibHp4cFQ3cHV1RUxSdGRwdDVTUXMxSFFhd1htSWRuNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODA6Imh0dHA6Ly9wcm9jb2RlYmxvZ3MudGVzdDo4MDgwL2Jsb2cvMTkvaW50cm9kdWN0aW9uLXRvLWxhcmF2ZWwtYS1iZWdpbm5lci1zLWd1aWRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDM7fQ==', 1775226152),
('xw4zCvzi9LFShBlUI6u8Q1nqSscTB15ad7qsh8iu', 43, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZFRRUGx1ZDUxYmFkbFQxZWFQc3R4RHV4NUNja0lGTUdBdkxTTXhFOCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vcHJvY29kZWJsb2dzLnRlc3Q6ODA4MC8/cGFnZT0yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDM7fQ==', 1774533734);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(4, 43, 'Laravel', '2026-03-26 02:59:23', '2026-03-26 02:59:23'),
(5, 43, 'PHP', '2026-03-26 02:59:29', '2026-03-26 02:59:29'),
(6, 43, 'MVC', '2026-03-26 02:59:45', '2026-03-26 02:59:45'),
(7, 43, 'Blade', '2026-03-26 02:59:51', '2026-03-26 02:59:51'),
(8, 43, 'Eloquent ORM', '2026-03-26 03:00:03', '2026-03-26 03:00:03'),
(9, 43, 'Laravel Authentication', '2026-03-26 03:00:17', '2026-03-26 03:00:17'),
(10, 43, 'REST API', '2026-03-26 03:02:23', '2026-03-26 03:02:23'),
(11, 43, 'JSON', '2026-03-26 03:02:33', '2026-03-26 03:02:33'),
(12, 43, 'React.js', '2026-03-26 03:04:26', '2026-03-26 03:04:26'),
(13, 43, 'JavaScript', '2026-03-26 03:04:36', '2026-03-26 03:04:36'),
(14, 43, 'Hooks', '2026-03-26 03:04:50', '2026-03-26 03:04:50'),
(15, 43, 'API Calls', '2026-03-26 03:05:01', '2026-03-26 03:05:01'),
(16, 43, 'Django', '2026-03-26 03:05:29', '2026-03-26 03:05:29'),
(17, 43, 'Python', '2026-03-26 03:05:42', '2026-03-26 03:05:42'),
(18, 43, 'Node.js', '2026-03-26 03:06:08', '2026-03-26 03:06:08'),
(19, 43, 'Express.js', '2026-03-26 03:06:24', '2026-03-26 03:06:24'),
(20, 43, 'MongoDB', '2026-03-26 03:06:36', '2026-03-26 03:06:36'),
(21, 43, 'npm', '2026-03-26 03:06:41', '2026-03-26 03:06:41'),
(22, 43, 'Git', '2026-03-26 03:07:46', '2026-03-26 03:07:46'),
(23, 43, 'GitHub', '2026-03-26 03:07:58', '2026-03-26 03:07:58'),
(24, 43, 'DevOps', '2026-03-26 03:08:09', '2026-03-26 03:08:09'),
(25, 43, 'SQL', '2026-03-26 03:09:44', '2026-03-26 03:09:44'),
(26, 43, 'NoSQL', '2026-03-26 03:09:56', '2026-03-26 03:09:56'),
(27, 43, 'Databases', '2026-03-26 03:10:11', '2026-03-26 03:10:11'),
(28, 43, 'MySQL', '2026-03-26 03:10:22', '2026-03-26 03:10:22'),
(30, 43, 'PostgreSQL', '2026-03-26 03:12:26', '2026-03-26 03:12:26'),
(31, 43, 'SASS', '2026-03-26 03:13:09', '2026-03-26 03:13:09'),
(32, 43, 'CSS', '2026-03-26 03:13:19', '2026-03-26 03:13:19'),
(33, 43, 'Styling', '2026-03-26 03:13:30', '2026-03-26 03:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `x_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `img`, `email`, `email_verified_at`, `password`, `description`, `x_twitter`, `facebook`, `instagram`, `linkedin`, `remember_token`, `created_at`, `updated_at`) VALUES
(43, NULL, 'Vishakha Chavan', NULL, 'vishakha@example.com', '2026-03-26 02:42:17', '$2y$12$7URJZwrU6F6FCWBSLgRHwOWK6PitxWpwt5R6WV1I281nOqsjSGSZ2', 'Hello, there! I\'m Vishakha Chavan who\'s a Full Stack Developer and upskilling my skills in Laravel. This is a simple blog project I have created on my own.', NULL, NULL, NULL, NULL, NULL, '2026-03-26 02:40:46', '2026-03-26 02:42:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_category_blog_id_cat_id_unique` (`blog_id`,`cat_id`),
  ADD KEY `blog_category_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_tag_blog_id_tag_id_unique` (`blog_id`,`tag_id`),
  ADD KEY `blog_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comments_email_unique` (`email`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rich_texts`
--
ALTER TABLE `rich_texts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rich_texts_field_record_type_record_id_unique` (`field`,`record_type`,`record_id`),
  ADD KEY `rich_texts_record_type_record_id_index` (`record_type`,`record_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`),
  ADD KEY `tags_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rich_texts`
--
ALTER TABLE `rich_texts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD CONSTRAINT `blog_category_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_category_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD CONSTRAINT `blog_tag_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

