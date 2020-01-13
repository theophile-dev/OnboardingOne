# OnboardingOne

## Setup

Clone the repository :
```
git clone https://github.com/theophile-dev/OnboardingOne.git
```

Setup .env with your DATABASE_URL 

Create database :
```
doctrine:database:create
```

Run migrations :
```
doctrine:migrations:migrate
```

Load fixtures
```
php bin/console doctrine:fixtures:load
```

To test the mailer you can install maildev :
```
sudo npm install -g maildev
```

Due to certificate issue you must start maildev with :
```
sudo maildev --hide-extensions STARTTLS
```
The MailDev webapp is now running at http://0.0.0.0:1080

You can now start the server with the Symfony CLI :
```
symfony server:start
```
