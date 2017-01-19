# Laravelのプロジェクトのレポジトリ

このレポジトリをダウンロードして日本語化されたLaravelのプロジェクトを作成します。手順は以下。

1．レポジトリのインストール

SSHを利用しているなら、以下をコマンドラインで実行してレポジトリをインストールします。

<code>git clone git@github.com:lotsofbytes/larajapan.git</code>

あるいは、Httpsを使用するなら、以下を実行します。

<code>git clone https://github.com/lotsofbytes/larajapan.git</code>

インストール後は、以下を実行してください。

<code>composer install</code>

<code>chmod -R a+w storage</code>

2．.envの編集

.env.example をコピーして、.env　を作成し編集して以下のように設定します。*****の部分を適切な値に変更してください。
注意：以下の例はmysqlあるいはmariaDBを使用。

<code>APP_ENV=production</code>

<code>APP_KEY=</code>

<code>APP_DEBUG=false</code>

<code>DB_CONNECTION=mysql</code>

<code>DB_DATABASE=*****</code>

<code>DB_USERNAME=*****</code>

<code>DB_PASSWORD=*****</code>

<code>MAIL_DRIVER=sendmail</code>

その後、以下を実行します。

<code>php artisan key:generate</code>

3．DBを作成

.envで指定したDBを作成。

<code>echo 'CREATE DATABASE larajapan CHARACTER SET utf8' | mysql -u root -p</code>

<code>php artisan migrate</code>

4. ウェブサーバーの立ち上げ

最後に以下を実行して、ウェブサーバーを立ち上げると、

<code>php artisan serve</code>

以下のアドレスでブラウザーからアクセスできます。

http://localhost:8000


