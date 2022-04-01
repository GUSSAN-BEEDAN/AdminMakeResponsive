# baserCMS 4系 管理画面 レスポンシブ化 プラグイン
baserCMSのadmin-third、admin-secondの両テーマ共にレスポンシブ化するプラグインです。
（admin-secondは、Daruma&Namio(tsukurun)さん作成の「adminGoResponsiveプラグイン」のcssおよびjsを利用させていただきました。）


## 要件・仕様など
本プラグインは、プラグインをインストール後レスポンシブ化設定を有効にすると、使用している管理テーマを判定して、レスポンシブ化に必要なcssをアドオンします。

admin-third管理テーマについては、基本的にデフォルトのstyle.cssのブレークポイントを利用してレスポンシブ化対応を行いました。
- タブレット対応 max-width:768px（既存のブレークポイント）
- スマホ対応 max-width:499px を追加。レイアウトが崩れない最小表示幅を350pxとして設計。

対応バージョンは、baserCMS4系のみ。
- v.4.5.0以降の動作は確認済みです。管理画面で個人的に利用していない機能のUIなど、デバッグが行き届いていませんがよければ試してみてください。
v.4.4.8以前のバージョンでは、cssの内容が現状とはだいぶ違っていて（特にtoolbar.cssのfontawesomeの扱いなど）現状では表示が相当乱れてしまいます。今後、下位バージョンも対応できるように改修したいと思っています。
- なお、v.4.1.8以前は、管理テーマ切り替え機能自体が未実装ですが、admin-secondのレスポンシブ化のみ動作すると思います。


## インストール
1. 圧縮ファイルを解凍後、生成されたフォルダ名 AdminMakeResponsive［-masterやバージョン名］を AdminMakeResponsive にリネームし、/app/Plugin/AdminMakeResponsive として配置します。
2. 管理画面のプラグイン管理に入り、表示されている AdminMakeResponsive プラグイン をインストールして下さい。
3. プラグインのインストール後、AdminMakeResponsive 管理ページにアクセスします。
4. admin-third管理テーマをレスポンシブ化させる場合は、有効にする にチェックを入れて保存してください。


## ご注意
- 管理画面の改造などをされている場合は、画面が崩れる可能性があります。
画面のレイアウトが崩れるなど表示かおかしい場合は、baserCMSおよびブラウザのキャッシュをクリアするなどしてみてください。
それでも画面のレイアウトが崩れるなどの問題が改善しない場合は、チェックボックスをオフにして使用を停止してください。
- バージョンが更新され、admin-third管理テーマのCSSが大幅に変更された場合は、画面が崩れるケースもありますのでその点はご承知ください。
- Daruma&Namio(tsukurun)さん作成の「adminGoResponsiveプラグイン」を有効にした状態で本プラグインを使用した場合、表示が崩れます。同時使用は避けてください。


## 謝辞
本プラグイン作成に際し、Daruma&Namio(tsukurun)さん作成の「adminGoResponsiveプラグイン」を参考にさせていただきました。
また、admin-second管理テーマのレスポンシブ化に関しては、ログイン画面の一部レイアウトの修正を行いましたが、ほぼ、「adminGoResponsiveプラグイン」のCSSおよびjsをそのまま使用させていただいています。
ありがとうございました。


## ライセンス
Copyright (c) 2022 GUSSAN(beedan)
Released under the MIT license
https://opensource.org/licenses/mit-license.php
