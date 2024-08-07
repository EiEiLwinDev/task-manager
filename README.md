Run on development environment
--------------------------------
# step1
git clone https://github.com/EiEiLwinDev/task-manager.git

# step 2
cd /task-manager
composer install
npm install

# step 3
<!-- copy .env.example to .env
change your db name and password in .env file -->
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
git clone https://github.com/EiEiLwinDev/task-manager.git
cd task-manager
composer install
npm install

# step 9
<!-- copy .env.example to .env
change your db name and password in .env file -->
php artisan migrate

# step 10
npm run build

# step 11
wirte config for apache or nginx ( depend on you installed above )

# step 12
connect with your domain ( if domain doesn't exit , create domain first) 

# step 13
install ssh

# step 14
restart server

# step 15
accept from browser via your domain


