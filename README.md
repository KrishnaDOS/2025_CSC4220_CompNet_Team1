# WEB SITE DECOMMISIONED - AWS FREE TIER LIMIT REACHED. CONTACT SITE ADMIN AIDEN BLANCHARD TO RESTART SITE IF NEEDED.

# CSC4220_CompNet
CSC 4220 Computer Networks Team #1 Spring 2025
Project Overview

This project is a web application developed for CSC 4220 Computer Networks (Spring 2025) by Team #1. The application is hosted on an AWS EC2 instance and is accessible via the Ionos domain compnet2025.com. The website is secured with HTTPS and features a custom DNS setup, a mail server, Wireshark to investigate suspicious connections, and a firewall to restrict unauthorized access.
# Key Features:

Secure HTTPS Server: The web server is configured with SSL/TLS certificates to ensure secure communication between the client and server.

reCAPTCHA Integration: The login and signup forms are protected with Google reCAPTCHA to prevent automated abuse.

Responsive Design: The website is designed to be responsive and user-friendly, with a modern dark theme.

Team Member Profiles: The website includes individual profile pages for each team member (Aditya, Aiden, and Krishna), showcasing their contributions to the project.

Firewall & SSH Security: The AWS EC2 instance is secured with a firewall that restricts SSH access to known IPs and uses public/private key encryption for authentication.

# Technical Details:

Frontend: The frontend is built using HTML, CSS, and JavaScript. It includes interactive forms for login and signup, with client-side validation and reCAPTCHA integration.

Backend: The backend is powered by Node.js and Express.js. It handles form submissions, reCAPTCHA verification, and serves static files.

DNS Configuration: The DNS records are manually configured to point the domain compnet2025.com to the AWS EC2 instance. The mail server is also set up, though outgoing emails are restricted due to AWS's free-tier limitations on port 25.

Security: The server uses HTTPS with custom SSL certificates, and the firewall is configured to block unauthorized access to the SSH port.


# Challenges:

Mail Server Limitations: Due to AWS's restrictions on port 25 for free-tier instances, the mail server cannot send outgoing emails. This limitation can be resolved by upgrading to a paid AWS plan.

DNS Configuration: Setting up the DNS records manually required careful attention to detail, especially for the mail server and reverse DNS (PTR) records.

Node JS. HTTPS Configuration: Setting  up the node.js server to accept HTTPS traffic was a main sticking point in getting the Google Captcha set up correctly.

Database Integration: Attaching our front end to the database took longer than expected due to the aforementioned Node JS. configuration issues, as such you may need to pardon our lack of full database integration for the time being.

# Future Improvements:

Email Functionality: Upgrade the AWS instance to enable outgoing email functionality.

Enhanced Security: Add additional security measures such as rate limiting, IP whitelisting, and more robust CSRF protection.

# Accessing the Website:

Visit the live site at https://www.compnet2025.com

For any inquiries, you can reach out to the team members via their respective emails:

Aditya: aditya@mail.compnet2025.com

Aiden: aiden@mail.compnet2025.com

Krishna: krishna@mail.compnet2025.com

# DNS Entry

``` bash
DNS records
name	class	type	data	time to live
www.compnet2025.com	IN	A	44.202.251.70	3600s	(01:00:00)
compnet2025.com	IN	MX	
preference:	0
exchange:	mail.compnet2025.com
	3600s	(01:00:00)
compnet2025.com	IN	NS	ns1061.ui-dns.de	86400s	(1.00:00:00)
compnet2025.com	IN	NS	ns1110.ui-dns.com	86400s	(1.00:00:00)
compnet2025.com	IN	NS	ns1027.ui-dns.biz	86400s	(1.00:00:00)
compnet2025.com	IN	NS	ns1089.ui-dns.org	86400s	(1.00:00:00)
compnet2025.com	IN	SOA	
server:	ns1061.ui-dns.de
email:	hostmaster@1und1.com
serial:	2017060123
refresh:	28800
retry:	7200
expire:	604800
minimum ttl:	600
	86400s	(1.00:00:00)
70.251.202.44.in-addr.arpa	IN	PTR	ec2-44-202-251-70.compute-1.amazonaws.com	300s	(00:05:00)
251.202.44.in-addr.arpa	IN	NS	ns1-24-us-east-1.ec2-rdns.amazonaws.com	300s	(00:05:00)
251.202.44.in-addr.arpa	IN	NS	ns2-24-us-east-1.ec2-rdns.amazonaws.com	300s	(00:05:00)
251.202.44.in-addr.arpa	IN	NS	ns3-24-us-east-1.ec2-rdns.amazonaws.com	300s	(00:05:00)
251.202.44.in-addr.arpa	IN	NS	ns4-24-us-east-1.ec2-rdns.amazonaws.com	300s	(00:05:00)
251.202.44.in-addr.arpa	IN	SOA	
server:	ns-1511.awsdns-60.org
email:	awsdns-hostmaster@amazon.com
serial:	1
refresh:	7200
retry:	900
expire:	1209600
minimum ttl:	86400

DNS records
name	class	type	data	time to live
www.compnet2025.com	IN	A	44.202.251.70	3600s
compnet2025.com	IN	MX	preference: 0, exchange: mail.compnet2025.com	3600s
compnet2025.com	IN	NS	ns1061.ui-dns.de	86400s
compnet2025.com	IN	NS	ns1110.ui-dns.com	86400s
compnet2025.com	IN	NS	ns1027.ui-dns.biz	86400s
compnet2025.com	IN	NS	ns1089.ui-dns.org	86400s

```
