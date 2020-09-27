# RAILWAT RESERVATION SYSTEM

Write about project

## Installation

Download xamp for windows [xamp](https://www.apachefriends.org/download_success.html).

```bash
Install into your windows machine. 
```

## Clone project in htdocs

```python
git clone https://github.com/sarabjit-90/railway_reservation_system.git

```
### set base url in config file.
```
application/config/config.php
```
### import database in mysql Database and configure.
```
application/config/database.php
Inside database.php file..

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root', //mysql user name
	'password' => '', //mysql password
	'database' => 'railway_reservation_system', // add database name here
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
 


```


## License
[Sarvjit Singh](linkedin.com)