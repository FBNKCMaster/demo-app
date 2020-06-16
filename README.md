A demo app to test <a href="https://github.com/FBNKCMaster/xTenant">xTenant</a> package

------

## INSTALLATION

Clone the repository

    git clone https://github.com/FBNKCMaster/demo-app.git

Switch to the repo folder

    cd demo-app

Install all the dependencies using composer

    composer install

Copy the .env.example file and edit it to match your configuration

    cp .env.example .env

Generate a new key

    php artisan key:generate

Serve app

    valet link demo-app

Make sure you can now access the app at: http://demo-app.test