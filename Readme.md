## 2025 52.BASE module for voids.nu

#### Laravel Forge deploy script example

```
$CREATE_RELEASE()

cd $FORGE_RELEASE_DIRECTORY

$FORGE_COMPOSER install --no-dev --no-interaction --prefer-dist --optimize-autoloader

npm install && npm ci && npm run build

ln -sfn $MODULE_APP_PUBLIC_PATH $FORGE_RELEASE_DIRECTORY

$ACTIVATE_RELEASE()

cd $MODULE_APP_MODULES_PATH

ln -sfn $FORGE_SITE_PATH $MODULE_NAME

cd $MODULE_APP_PATH

$FORGE_COMPOSER dump-autoload
$FORGE_PHP artisan optimize
```