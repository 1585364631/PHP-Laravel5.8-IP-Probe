# PHP-Laravel5.8-IP-Probe
基于Laravel5.8开发的简易IP探针系统

# 由于项目为IP探针项目，所以不提供演示地址

# 项目部署
## 1.解压项目部署到Laravel环境网站上  
## 2.将项目下.env.example改为.env文件  
## 3.mysql中创建新的数据库  
## 4.修改.env文件中的数据库和发邮件配置信息  
```env
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

MAIL_DRIVER=smtp
MAIL_HOST=mail.qq.com
MAIL_PORT=465
MAIL_USERNAME=邮箱用户名
MAIL_PASSWORD=邮箱密码
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=邮箱用户名
MAIL_FROM_NAME="IP探针"
```
## 5.恢复伪静态文件  
### 5.1 nginx伪静态  
```conf
location / {
                # First attempt to serve request as file, then
                # as directory, then fall back to displaying a 404.
                # try_files $uri $uri/ =404;
                try_files $uri $uri/ /index.php?$query_string;
}
```
### 5.2 apache伪静态  
```conf
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

```

## 6.执行命令安装相关依赖
```bash
composer install
```

## 7.执行迁移文件命令
```bash
php artisan migrate
```

## 8.修改AppController控制器中的邮件接收人
