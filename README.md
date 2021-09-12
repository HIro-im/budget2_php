## 家計管理補助ツールの紹介


## ツール開発の経緯

　近年、社会情勢の不透明さから、様々な不安に見舞われる傾向がみられ、中でも経済的な不安は看過できない    
不安要素であると考えられる。			
			
　また、それとは反対にFIREと呼ばれる早期に経済的な自立を得て、リタイアをするということを望む人も増加している。			
			
　それぞれ、原因は異なるるものの、自身の経済状況について安定を図りたいという傾向は存在している。			
			
　そのためには、収入はもちろん、自身が1ヶ月過ごすためにはいくらかかるかを把握してなければならない。  
家計簿をつけていれば大まかな金額はわかるが、今までの金額から平均値を割り出しておけば、大きく外れる  
金額とはならないだろう。			
			
　そして、仮に雇用が無くなったとしても、自身の保有資産と平均の支出額を知っておけば、次の職を探すための期限が  
ある程度正確に把握できるため、方針も立てやすくなる。			
			
　本ツールでは、毎月の支出額を記録することで、平均金額の算出と現時点での保有資産から、どれくらいの期間無収入での  
生活が可能であるかを割り出すことを目的とする。			


## 実装する機能

■ログイン機能	
 
　・金額の記録及び平均値の算出のため、個人を識別する	
 
![スクリーンショット (6)](https://user-images.githubusercontent.com/82436202/132971737-303cf193-593e-47c0-9aa4-c48b385100b8.png)


	
■支出表示・登録・確認・修正・削除機能	


　・ログインしたユーザごとに、登録されている金額を表示する。	

　(1ヶ月単位で、食費や日用品といった支出項目ごとの支出金額を登録する。)	
 
 ![スクリーンショット (10)](https://user-images.githubusercontent.com/82436202/132972195-b229f21b-117e-4259-91f8-c9945214d96f.png)


　・項目や月が誤っていた場合に、金額を修正することを可能とする。	
 
 ![スクリーンショット (13)](https://user-images.githubusercontent.com/82436202/132972447-1dde8e1a-c0c2-4b20-9d4e-fe4667c87b5f.png)


　・その月のデータを削除したい場合に、削除できるようにする。	
 
 ![スクリーンショット (15)](https://user-images.githubusercontent.com/82436202/132972476-7fe7b0be-b479-4cce-b472-a4082d0c376f.png)


　・各項目ごとに、登録してきたデータをもとにして推移が分かる棒グラフを作成する。	

![スクリーンショット (19)](https://user-images.githubusercontent.com/82436202/132972565-9a05907a-0bac-4f11-a5bc-eed63c2adc50.png)

	
■固定費計算処理機能	

　・1ヶ月の支出として外せない項目(＝固定費)を選択して、保有資産と比較して何か月無収入で過ごせるかを計算する。	

　(算出を行う際には、小数点以下切り捨てで月数を算出する)	

![スクリーンショット (23)](https://user-images.githubusercontent.com/82436202/132972937-08ca61cb-bf5d-4ad2-b71b-c60980ef2e58.png)


　・蓄積していた支出金額をもとに、平均値を求める	

　(0円で登録している月も含める)	
 
![スクリーンショット (20)](https://user-images.githubusercontent.com/82436202/132972909-130da897-d5f5-418d-b3e4-ba2220737b4a.png)

※上記は、全ての項目を固定費として選択した結果を表示


## 使用した言語／技術

　・PHP(8.0.7)

　・Laravel(6.20.27)
 
　・JavaScript(chart.js)
 
　・MySQL  
  (ほとんどクエリビルダで参照していますが、ほんの一部だけ自分でSQLを書いています)

　・Heroku
 
 ## 工夫した点／頑張った点
 
 ・項目追加を簡単にできるようにした
→例えば、【冠婚葬祭費】という項目を追加したい、という要件が発生した場合、
 
 ・
 
 ## 不足している部分
 
 ・見た目の部分が全然改修できなかったこと  
→全体的に、Laravelのログインの表示画面をそのまま使っているのと、金額一覧や詳細画面の表示は、ほとんど参考にした教材と変わらないので、  
 これらをもっと見やすい形式やオリジナルな要素を検討できなかったのが工夫不足であると感じます。  
 (他の方のポートフォリオを見ると、見栄えの部分で見劣りすると感じます)
 
 ・リファクタリングが不足していたこと
 
 ・技術面でAWSやDockerといった頻出の技術に触れられなかったこと  
→ようやく、AWSについては勉強し始めたものの、まだそれを組み込んだWebアプリを作るに至れていないので、ある程度知識が固まったら、  
 取り入れたアプリを作れるようにしたいです。

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
