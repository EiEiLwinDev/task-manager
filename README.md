Run on development environment
--------------------------------
# step1
 composer install
# step 2
npm install
# step 3
php artisan migrate
# step 4
php artisan serve
# step 5
npm run dev

Deploy on productions
------------------------
# step 1
login as root into your server

# step 2
create new user ( optional )

# step 3 ( if create new user )
granting administrative privileges

# step 4 
setting firewall 

To do firewall setting , run the following cmd

ufw app list ( check installed ufw list)

ufw allow OpenSSH ( allow ssh)

ufw enable 

ufw status ( check ufw status )

# step 5
install php

# step 6
install apache or nginx ( as you wish )

# step 7 
install mysql

# step 8
place your project under www folder
cd /www
git clone http:git.com/EiEiLwinDev/task-manager.git
cd task-manager
composer install
npm install
npm run build

# step 9
wirte config for apache or nginx ( depend on you installed above )

# step 10
connect with your domain ( if domain doesn't exit , create domain first) 

# step 11
install ssh

# step 12
restart server

# step 13
accept from browser


