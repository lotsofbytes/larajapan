# Laravelのテンプレート

SSHを設定しているなら、以下をコマンドラインで実行してレポジトリをインストールします。

<code>git clone git@github.com:lotsofbytes/larajapan.git</code>

あるいは、Httpsを使用するなら、以下を実行します。

<code>git clone https://github.com/lotsofbytes/larajapan.git</code>

インストール後は、以下を実行してください。

<code>composer install</code>

.env.example をコピーして、.env　を作成します。

その後、以下を実行します。

<code>php artisan key:generate</code>

最後に以下を実行して、ウェブサーバーを立ち上げると、

<code>php artisan serve</code>

以下のアドレスでブラウザーからアクセスできます。

http://localhost:8000


