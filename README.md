<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Phone Book.</h1>
    <br>
</p>

Steps to install project:
=========================

* Clone repository from github
* Run in console from project root directory ```composer update```
* Run in console from project root directory ```php init```
* Create mysql db named `phonebooktest` and check config to connection with db in `common/config/main-local.php`
* Run in console from root directory ```run yii rbac/init``` (see console/controllers/RbacController.php)
* Run in console migration ```yii migrate m211112_113015_contacts```

__Or create DB from dump (without running migrations)located in this path `dump-db/phonebooktest`__

