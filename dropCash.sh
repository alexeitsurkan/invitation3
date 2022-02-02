sudo chmod -R 777 runtime
sudo chmod -R 777 database
sudo chmod -R 777 web/assets
sudo chmod -R 777 node_modules
sudo chmod -R 777 vendor
sudo chmod -R 777 package-lock.json


rm -r runtime/cache
rm -r runtime/debug
rm -r runtime/logs

rm -r web/assets
mkdir web/assets
sudo chmod -R 777 web/assets
