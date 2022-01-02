# min-advertisering-system

## Step One Clone Repo

    git clone git@github.com:coder0010/reach-network

or you can download it by the desktop application of github

    https://github.com/coder0010/reach-network

Switch to the repo folder

    cd reach-network

---
## Step Two Prepare Project

1 Prepare the project

    bashes/refresh-project.sh

2 Copy .env.example file and make the required configuration changes in the .env file

    cp .env.example ./.env

3 Run this command

    php project/artisan server:setup
        * choose Create_Database
        * Then choose Migrate_and_Seed

4- Run Schedule and test reminder

    * php project/artisan schedule:work
    * php project/artisan reminder daily