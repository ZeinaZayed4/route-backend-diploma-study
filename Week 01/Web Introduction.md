# Introduction

## Web (World Wide Web - WWW)
- An information system that allows content sharing over the internet through user-friendly ways.
- It's a system of interconnected public webpages and other resources, accessed via web browsers.
- These pages and documents are linked together using hyperlinks.
- [It's different from the internet](#internet).

## How does the Web Work?
- It operates on a client-server model where browsers (like Chrome, Firefox, Edge) request pages from web servers using HTTP/HTTPS protocols.
- Each resource has a unique address called a URL (Uniform Resource Locator).

## Internet
- It is a global network of interconnected computer networks.
- While the web is one of many applications built on top of the internet.

## Server
- It is a computer or software program that provides services, resources, or data to other computers (clients) over a network.
- The term can refer to both the physical hardware and the software running on it.
- Types of servers:
  1. Web Servers:
     - Serve web pages and content to browsers.
     - Examples: Apache, Nginx, IIS.
     - Handle HTTP requests and send back HTML, CSS, images.
  2. Database Servers:
     - Store and manage databases.
     - Examples: MySQL, PostgreSQL, Microsoft SQL Server.
     - Handle queries and data operations.
  3. File Servers:
     - Store and share files across a network.
     - Allow multiple users to access shared documents.
     - Examples: Windows File Server, Samba.
  4. Mail Servers:
     - Handle email sending and receiving.
     - Examples: Microsoft Exchange, Postfix.
     - Manage email accounts and routing.
  5. Application Servers:
     - Run business applications and logic.
     - Examples: Tomcat, Node.js runtime.
     - Process complex operations and calculations.
- How do the servers work?
  - Servers follow a client-server model where they "listen" for requests from client devices (computers, phones) and respond with the requested information or services.
  - They typically run 24/7 to ensure availability.
- Server hardware:
  - Physical servers are usually more powerful than regular computers, featuring:
    - Multiple CPUs.
    - Large amounts of RAM.
    - High-capacity storage systems.
    - Redundant power supplies.
    - Network connections.

## Client-Server Architecture
- It is the fundamental model that governs how the internet works.
- It's a distributed computing approach where tasks are divided between service providers (servers) and service requesters (clients).
- How does the architecture work?
  1. Request-Response Cycle:
     - Client sends a request to server (e.g., clicking a link).
     - Server processes the request.
     - Server sends back a response (e.g., web page data).
     - Client receives and displays the response.
  2. Communication Protocols:
     - HTTP/HTTPS - for web browsing.
     - SMTP - for email sending.
     - FTP - for file transfers.
     - DNS - for domain name resolution.
     - TCP/IP - underlying network communication.
  3. Addressing System:
     - IP addresses - unique numerical identifiers for devices.
     - Domain names - human-readable addresses (like google.com).
     - URLs - complete addresses of specific resources.
     - Ports - specific communication endpoints on servers.
    
## Front-End (Client-Side)
- Everything users see and interact with directly in their web browser.
- Front-end developers focus on the user experience and interface.
- Technologies:
  - HTML (HyperText Markup Language):
    - structures web page content.
  - CSS (Cascading Style Sheets):
    - controls visual styling and layout.
  - JavaScript:
    - adds interactivity and dynamic behavior.
  - Frameworks:
    - like, React, Vue.js, Angular.
  - Tools:
    - like, Webpack, Sass, TypeScript.

## Back-End (Server-Side)
- This is the behind-the-scene logic that powers the application, but users never see directly.
- It runs on servers and handles data processing.
- Technologies:
  - Programming languages:
    - like, PHP, Node.js, Python, Java, Ruby, C#.
  - Databases:
    - like, MySQL, MongoDB, PostgreSQL.
  - Servers:
    - like, Apache, Nginx.
  - Cloud services:
    - like, AWS, Google Cloud, Azure.
  - API and web services.
