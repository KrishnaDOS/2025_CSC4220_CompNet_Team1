# CSC4220_CompNet
CSC 4220 Computer Networks Team #1 Spring 2025
Our website is made up of an Ionos domain & AWS EC2 VM.

The Ionos domain is compnet2025.com accessable with https://www.compnet2025.com or my email us as Groupmembername@mail.compnet2025.com!
The webserver is https secured and has a secured firewall to prevent access from unknown IPs to the ssh console as well as utilizing Public/Private key encryption for access.
We set up our DNS manually as well as the mailserver. Unfortunately due to the free nature of our AWS instance we cannot enable mail sending as AWS blocks port 25 to prevent spam. If this were a real-world machine we would be able to instantly gain that capability if we were to switch to a paid version of the EC2 machine. 
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
```
