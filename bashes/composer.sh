rm -rfv vendor/ public/storage .phpstorm.meta.php _ide_helper.php bootstrap/cache/*.tmp bootstrap/cache/*.php &&
composer install && composer update && composer fund
