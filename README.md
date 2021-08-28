1-after clone and configurations like" composer install ,generate key,set database in  .env file  "
2-import the collection to your postman the file exist in this repository named by "userapi.postman_collection.json" in the main folder
3- run command "php artisan  migrate:fresh --seed"  this will generate all tables data
4-run command "php artisan serve" 
5- go to your postman after importing  userapi.postman_collection.json  if you run in the locale  escape this step if not change  url "http://127.0.0.1:8000" to your "host:port"
6- register a HR_user "http://127.0.0.1:8000/api/auth/register"  then save the token to use it in all api  Authorization Bearer " put token here"