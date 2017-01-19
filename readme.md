# Laravelのプロジェクトのレポジトリ

このレポジトリをダウンロードして日本語化されたLaravelのプロジェクトを作成します。手順は以下。

## レポジトリのインストール

SSHを利用しているなら、以下をコマンドラインで実行してレポジトリをインストールします。

```
git clone git@github.com:lotsofbytes/larajapan.git
```

あるいは、Httpsを使用するなら、以下を実行します。

```
git clone https://github.com/lotsofbytes/larajapan.git
```

```
chmod -R a+w storage
```
インストール後は、以下を実行してください。

```
composer install
```

## .envの編集

.env.example をコピーして、.env　を作成し編集して以下のように設定します。*****の部分を適切な値に変更してください。
注意：以下の例はmysqlあるいはmariaDBを使用。

```
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
DB_CONNECTION=mysql
DB_DATABASE=*****
DB_USERNAME=*****
DB_PASSWORD=*****
MAIL_DRIVER=sendmail
```

その後、以下を実行して.env内のAPP_KEYを更新します。

```
php artisan key:generate
```

## DBを作成

.envで指定したDBを作成。

```
echo 'CREATE DATABASE larajapan CHARACTER SET utf8' | mysql -u root -p
```

```
php artisan migrate
```

## ウェブサーバーの立ち上げ

最後に以下を実行して、ウェブサーバーを立ち上げると、

```
php artisan serve
```

以下のアドレスでブラウザーからアクセスできます。

http://localhost:8000


