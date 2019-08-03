# goodsApplication

商品管理システム

## 説明

goodsApplicationは下記情報を持つ商品データの登録・検索・変更・削除を行うWebアプリケーションです。

- 商品画像
- 商品タイトル（最大半角100文字）
- 説明文（最大半角500文字）
- 価格
- 管理店舗ID

## 開発環境

||バージョン情報|
|:---|:---|
|OS|Ubuntu 18.04.2 LTS（AWS EC2）|
|HTTP Server|Nginx 1.14.0|
|Framework|Laravel 5.8.29|
|Language|PHP 7.2.20|
|DB|MySQL 5.7.27|


## API

|操作|URI|HTTPメソッド|
|:---|:---|:---|
|登録|/goods/|POST|
|検索|/goods/{good}|GET|
|変更|/goods/{good}|PUT/PATCH|
|削除|/goods/{good}|DELTE|

## 作者

[@makotom0330_2](https://twitter.com/makotom0330_2)


