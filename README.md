## 家計管理補助ツールの紹介


## ツール開発の経緯

　近年、社会情勢の不透明さから、様々な不安に見舞われる傾向がみられ、経済的な不安というのも表出していることが			
見受けられる。			
			
　また、それとは反対に、FIREと呼ばれる早期に経済的な自立を得て、リタイアをするということを望む人も増加している。			
			
　それぞれ、原因は異なるるものの、自身の経済状況について安定を図りたいという傾向は存在している。			
			
　そのためには、収入はもちろん、自身が1ヶ月過ごすためにはいくらかかるかを把握してなければならない。
家計簿をつけていれば大まかな金額はわかるが、今までの金額から平均値を割り出しておけば、			
大きく外れる金額とはならないだろう。			
			
　そして、仮に雇用が無くなったとしても、自身の保有資産と平均の支出額を知っておけば、次の職を探すためのリミットが
ある程度正確に把握できるため、方針も立てやすくなるだろう。			
			
　本ツールでは、毎月の支出額を記録することで、平均金額の算出と現時点での保有財産から、どれくらいの期間無収入での生活が			
可能であるかを割り出すことを目的とする。			


## 実装する機能

■ログイン機能	
 
　・金額の記録及び平均値の算出のため、個人を識別する	
	
■支出表示・登録・確認・修正・削除機能	


　・ログインしたユーザごとに、登録されている金額を表示する。	

　・1ヶ月単位で、食費や日用品といった支出項目ごとの支出金額を登録する。	

　・金額を登録した日を確認できるようにする。	

　・項目や月が誤っていた場合に、金額を修正することを可能とする。	

　・各項目ごとに、登録してきたデータをもとにして推移が分かる棒グラフを作成する。	

　・その月のデータを削除したい場合に、削除できるようにする。	
	
■固定費計算処理機能	

　・蓄積していた支出金額をもとに、平均値を求める	

　(0円で登録している月も含める)	

　・1ヶ月の支出として外せない項目(＝固定費)を選択して、保有資産と比較して何か月無収入で過ごせるかを計算する。	

　(算出を行う際には、小数点以下切り捨てで月数を算出する)	

## 使用した言語／技術

　・PHP(8.0.7)

　・Laravel(6.20.27)
 
　・JavaScript(chart.js)
 
　・MySQL

　・heroku
 
## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
