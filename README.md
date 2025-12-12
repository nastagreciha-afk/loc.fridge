log error
docker exec -it fridge-php bash
cd /var/www
chown -R www-data:www-data storage bootstrap/cache
chmod -R u+rwX storage bootstrap/cache

add premission
sudo chmod -R u+rwX /home/nastanasta/projects/loc.fridge/storage /home/nastanasta/projects/loc.fridge/bootstrap/cache
