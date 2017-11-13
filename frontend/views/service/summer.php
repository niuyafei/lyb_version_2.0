<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/28
 * Time: 上午10:40
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "延伸服务";
?>
<div class="container">
	<h2 class="text-center m-t-30">延伸服务</h2>
	<hr class="cont-tit-border">
	<ul class="nav nav-tabs m-t-30 view-tab-menu" role="tablist">
		<li>
			<a href="<?= Url::to(['service/index']); ?>">背景提升</a>
		</li>
		<li>
			<a href="<?= Url::to(['service/interview']); ?>">面试特训</a>
		</li>
		<li class="active">
			<a href="#">夏校项目</a>
		</li>
		<li>
			<a href="<?= Url::to(['service/practice']); ?>">实习项目</a>
		</li>
	</ul>
	<div class="border-color p-20 p-b-0 p-b-20 view-tab-cont">
		<div class="p-l-20 p-r-20 p-t-10">
			<h4 class="color-blue m-0">项目介绍</h4>
			<hr class="cont-tit-border-zhuanti pull-left">
			<p class="clear">Summer School，美国夏校，一种试水性质的迷你留学，是一种以学为主的暑期游学方式(不同于一般的夏令营)。</p>

			<p>每年暑假6月下旬至8月底，美国许多高校为国内外高中生和本科生开设专业课或语言课程。<br />被Summer School录取的学生可直接进入国外名校进行短期学习，如哈佛、耶鲁、哥伦比亚、斯坦福等美国名校。

			</p>

			<p>不同于其他的游学项目，夏校是让你在美国高等学府去体验原汁原味的大学生活，有的学校甚至为每位学生准备一张和本科生一样的学生卡，<br />让你在大学校园里畅通无阻，因为这个夏天你就是他们的一员。

			</p>
			<br />
			<p>参加summer school对申请美国本科/研究生留学是有很大益处的：</p>

			<p>1. 参加美国夏校将有助于丰富你的个人国际化背景，提升软实力。</p>

			<p>2. 有机会获得国外教授的含金量很高的推荐信，为你的留学申请增加筹码。美国夏校一般都是小班授课，学生会有很多机会和教授接触。<br />如果你在美国夏校中给教授留下了深刻的印象，可以请他写一封推荐信。

			</p>

			<p>3. 选择美国夏校学分课程的话，若成绩合格，在正式留学后，可以实现学分转换，从而免修相关课程。</p>

			<p>4. 全天候的英语语言环境，让英语能力获得质的飞跃!</p>

			<p>5. 体验美国一流大学的校园生活。<br />Summer School并非是每个学校想开就可以开的，只有那些兼具知名度和学术实力，并且拥有足够资金和人力的学校才会开设。

			</p>
			<div class="m-t-30">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#zonghe" role="tab" data-toggle="tab">综合类</a>
					</li>
					<li role="presentation">
						<a href="#yinyue" role="tab" data-toggle="tab">音乐电影类</a>
					</li>
				</ul>
				<div class="tab-content m-t-20">
					<div role="tabpanel" class="tab-pane fade in active" id="zonghe">
						<table class="table table-bordered clear zhuanti-table">
							<thead>
							<tr>
								<th class="text-center" width="120">学校名称</th>
								<th class="text-center" width="100">本次级别</th>
								<th class="text-center" width="120">招生对象/要求</th>
								<th class="text-center" width="150">课程情况</th>
								<th class="text-center" width="125">开课时间</th>
								<th class="text-center" width="105">报名截止时间</th>
								<th class="text-center">备注</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td class="text-center">哈佛大学</td>
								<td class="text-center">语言班</td>
								<td class="text-center">学生/已工作者</td>
								<td class="text-center">英语听说读写<br />（初级班、高级班）</td>
								<td class="text-center">6月21日-8月8日</td>
								<td class="text-center">4月15日</td>
								<td class="text-center">学校给办学生签证；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">耶鲁大学</td>
								<td class="text-center">高中班</td>
								<td class="text-center">高二、高三学生</td>
								<td class="text-center">5门：英语发音、托福考试辅导、SAT考试辅导、体育、英文写作</td>
								<td class="text-center">7月21日-8月8日</td>
								<td class="text-center">3月20日</td>
								<td class="text-center">学校出I-20证明、含食宿</td>
							</tr>
							<tr>
								<td class="text-center">耶鲁大学</td>
								<td class="text-center">高中班</td>
								<td class="text-center">高二、高三学生</td>
								<td class="text-center">5门：英语发音、托福考试辅导、SAT考试辅导、体育、英文写作</td>
								<td class="text-center">7月21日-8月8日</td>
								<td class="text-center">3月20日</td>
								<td class="text-center">学校出I-20证明、含食宿</td>
							</tr>
							<tr>
								<td class="text-center">哥伦比亚大学</td>
								<td class="text-center">本科/研究生班</td>
								<td class="text-center">在职须有学士以上学位<br />托福100分或雅思7.0</td>
								<td class="text-center">25门课可选</td>
								<td class="text-center">7月7日-8月15日</td>
								<td class="text-center">3月20日</td>
								<td class="text-center">学校出I-20证明（最少2门课）</td>
							</tr>

							<tr>
								<td class="text-center">芝加哥大学</td>
								<td class="text-center">本科生/高中生</td>
								<td class="text-center">本科生（含已毕业）；托福105分</td>
								<td class="text-center">25门课可选</td>
								<td class="text-center">7月14日-8月3日</td>
								<td class="text-center">本科生4月1日<br />高中生5月1日</td>
								<td class="text-center">有校方面试；学校出I-20证明（最少2门课）</td>
							</tr>

							<tr>
								<td class="text-center">霍普金斯大学</td>
								<td>本科生/高中生</td>
								<td>托福100分；16岁以上</td>
								<td>25门课可选</td>
								<td>6月30日-8月1日</td>
								<td>2月28日</td>
								<td>学校出I-20证明（最少2门课）；有语言测试；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">霍普金斯大学</td>
								<td>语言班</td>
								<td>学生/已工作者</td>
								<td>英语听说读写</td>
								<td>6月30日-8月1日</td>
								<td>3月15日</td>
								<td>学校给办学生签证；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">布朗大学</td>
								<td>大学体验班</td>
								<td>初三学生/高中生</td>
								<td>50门课可选</td>
								<td>7月14日-8月8日</td>
								<td>3月31日</td>
								<td>学校出I-20证明；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">布朗大学</td>
								<td>语言班</td>
								<td>初三学生/高中生</td>
								<td>托福突击班、文书辅导班、面试辅导班</td>
								<td>7月14日-8月1日</td>
								<td>3月31日</td>
								<td>学校出I-20证明；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">华盛顿-圣路易斯大学（中部）</td>
								<td>暑期学分班</td>
								<td>高中生，托福90分</td>
								<td>29门课可选</td>
								<td>7月13号-8月15号</td>
								<td>4月1日</td>
								<td>学校提供I-20</td>
							</tr>
							<tr>
								<td class="text-center">弗吉尼亚大学</td>
								<td>暑期学分班</td>
								<td>最少高二毕业，托福90分</td>
								<td>24门课可选</td>
								<td>7月14日-8月3日</td>
								<td>3月3日</td>
								<td>学校出I-20证明（选最少2门课）</td>
							</tr>
							<tr>
								<td class="text-center">弗吉尼亚大学</td>
								<td>语言班</td>
								<td>学生/已工作者</td>
								<td>英语听说读写</td>
								<td>7月13日-8月8日</td>
								<td>3月15日</td>
								<td>学校给办学生签证</td>
							</tr>
							<tr>
								<td class="text-center">乔治城大学</td>
								<td>暑期学分班</td>
								<td>本科生，托福90分</td>
								<td>50多门课可选</td>
								<td>7月6日-8月8日</td>
								<td>3月15日</td>
								<td>学校办学生签证；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">乔治城大学</td>
								<td>大学备考班</td>
								<td>高二、高三学生</td>
								<td>SAT考试辅导班，英文写作班，数学班</td>
								<td>6月22日-7月12日</td>
								<td>3月15号</td>
								<td>需要WES认证；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">乔治城大学</td>
								<td>大学预科班</td>
								<td>高二高三学生；托福100分</td>
								<td>6门：医学、法律、国际关系、国际经济、英文写作、经济学</td>
								<td>7月6日-8月8日</td>
								<td>3月15日</td>
								<td>需要WES认证；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">乔治城大学</td>
								<td>语言班</td>
								<td>学生/已工作者</td>
								<td>英语听力和口语（初级班、高级班）</td>
								<td>7月14日-8月1日</td>
								<td>3月15日</td>
								<td>学校办学生签证；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">华盛顿大学（西雅图）</td>
								<td>暑期学分班<br />（唯一不不要求托福）</td>
								<td>大学生/已毕业本科生</td>
								<td>70多门课可选</td>
								<td>7月24日-8月22日</td>
								<td>3月15日</td>
								<td>无宿舍，住公寓；包含伙食费、旅游签证</td>
							</tr>
							<tr>
								<td class="text-center">马塞诸塞阿姆河斯特大学</td>
								<td>暑期学分班</td>
								<td>本科生，托福50分</td>
								<td>必修课：科学技术/如何报考美国研究生</td>
								<td>8月3日-8月23日</td>
								<td>5月1日</td>
								<td>学校给办I-20表；托福低于80，须上英文课；托福高于80，可选政治课或再生能源课；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">加州戴维斯大学</td>
								<td>暑期学分班</td>
								<td>大学生/已工作者；托福80分</td>
								<td>60多门课可选</td>
								<td>6月23日-8月1日</td>
								<td>4月1日</td>
								<td>学校提供I-20</td>
							</tr>
							<tr>
								<td class="text-center">加州戴维斯大学</td>
								<td>暑期学分班</td>
								<td>大学生/已工作者；托福80分</td>
								<td>60多门课可选</td>
								<td>8月4日-9月12日</td>
								<td>4月1日</td>
								<td>学校提供I-20</td>
							</tr>
							<tr>
								<td class="text-center">特拉华州大学</td>
								<td>暑期学分班</td>
								<td>16-19岁中学生，托福80分</td>
								<td>15门课可选</td>
								<td>7月14日-8月16日</td>
								<td>4月1日</td>
								<td>学校提供I-20；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">伯克利音乐学院（音乐学院前3）</td>
								<td>暑期课程班</td>
								<td>高中生、大学生</td>
								<td>爵士、摇滚、现代音乐(R&B),黑人音乐(Funk)</td>
								<td>7月12日-8月15日</td>
								<td>4月1日</td>
								<td>中级以上，报名时提交演奏短片；学校办理签证；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">葛迪思音乐学院（音乐学院前5）</td>
								<td>暑期课程班</td>
								<td>乐器/钢琴/作曲14-19岁；指挥/唱歌14-22岁</td>
								<td>乐器/钢琴/作曲/指挥/唱歌（只能选1门）</td>
								<td>7月7日-7月26日</td>
								<td>4月1日</td>
								<td>中级以上，报名时提交演奏短片；可与学院乐队一起演出；旅游签证；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">纽约视觉艺术学院（摄影专业第一）</td>
								<td>暑期课程班</td>
								<td>高中生、大学生</td>
								<td>艺术基础课</td>
								<td>7月14日-8月1日</td>
								<td>3月15日</td>
								<td>含食宿</td>
							</tr>
							<tr>
								<td class="text-center">芝加哥艺术学院（艺术专业第3</td>
								<td>暑期课程班</td>
								<td>高中生、大学生</td>
								<td>艺术基础课</td>
								<td>7月21日-8月1日</td>
								<td>4月1日</td>
								<td>含食宿</td>
							</tr>
							<tr>
								<td class="text-center">芝加哥艺术学院（艺术专业第3</td>
								<td>暑期课程班</td>
								<td>高中生、大学生</td>
								<td>艺术基础课</td>
								<td>7月7日-8月1日</td>
								<td>3月15日</td>
								<td>含食宿</td>
							</tr>
							<tr>
								<td class="text-center">马塞诸塞艺术学院（艺术综合第22）</td>
								<td>暑期课程班</td>
								<td>高二、高三学生</td>
								<td>必修课：绘画/三维绘画/艺术基本科<br />选修课：图像设计/油画/时尚设计/绘画技巧/摄影</td>
								<td>7月21日-8月16日</td>
								<td>4月1日</td>
								<td>学校办I-20表，无学分报名须：两封推荐信，文书，两份报名表（有学分申请须另加一个 Portfolio）；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">Syracuse雪城大学艺术学院</td>
								<td>暑期课程班</td>
								<td>12-20岁</td>
								<td>芭蕾舞</td>
								<td>7月7日-7月26日</td>
								<td>4月1日</td>
								<td>旅游签证；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">斯坦福大学</td>
								<td>大学体验班</td>
								<td>初中生</td>
								<td>地球科学，物理科学，创作写作等5类课程可选择</td>
								<td>7月21日-8月1日</td>
								<td>4月1日</td>
								<td>11-13岁，需要托福或其他标准化考试成绩，；含食宿</td>
							</tr>
							<tr>
								<td class="text-center">斯坦福大学</td>
								<td>大学体验班</td>
								<td>高中生</td>
								<td>数学，生物科学，商业等八大类约50门课程可以选择</td>
								<td>7月13日-8月8日</td>
								<td>4月1日</td>
								<td>需要托福或其他标准化考试成绩；含食宿</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="yinyue">
						<table class="table table-bordered clear zhuanti-table">
							<thead>
							<tr>
								<th class="text-center" width="120">项目名称</th>
								<th class="text-center" width="120">学校</th>
								<th class="text-center" width="120">开始日期</th>
								<th class="text-center" width="120">结束日期</th>
								<th class="text-center" width="125">学费+食宿费</th>
								<th class="text-center" width="105">申请要求</th>
								<th class="text-center">项目简介</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td class="text-center">音乐制作</td>
								<td class="text-center">纽约大学</td>
								<td class="text-center">6月29日</td>
								<td class="text-center">7月11日</td>
								<td class="text-center">TBA</td>
								<td class="text-center">托福100分</td>
								<td class="text-center">学习音乐制作的技术</td>
							</tr>
							<tr>
								<td class="text-center">音乐商务</td>
								<td class="text-center">纽约大学</td>
								<td class="text-center">7月6日</td>
								<td class="text-center">7月10日</td>
								<td class="text-center">$1,638</td>
								<td class="text-center">录制视频<br />托福100分</td>
								<td class="text-center">学习如何打造艺术家品牌,成为优秀音乐制作人</td>
							</tr>
							<tr>
								<td class="text-center">电影制作</td>
								<td class="text-center">纽约电影学院</td>
								<td class="text-center">7月6日</td>
								<td class="text-center">7月28日</td>
								<td class="text-center">$10,800</td>
								<td class="text-center">托福68分</td>
								<td class="text-center">八周内学习电影制作基础技术</td>
							</tr>
							<tr>
								<td class="text-center">电影表演</td>
								<td class="text-center">纽约电影学院</td>
								<td class="text-center">7月6日</td>
								<td class="text-center">7月28日</td>
								<td class="text-center">$9,800</td>
								<td class="text-center">托福68分</td>
								<td class="text-center">学习电影表演基本技能</td>
							</tr>
							<tr>
								<td class="text-center">音乐与表演艺术</td>
								<td class="text-center">纽约大学</td>
								<td class="text-center">7月13日</td>
								<td class="text-center">7月24日</td>
								<td class="text-center">$2,812</td>
								<td class="text-center">录制视频<br />托福100分</td>
								<td class="text-center">学习电影表演基本技能</td>
							</tr>
							<tr>
								<td class="text-center">表演艺术<br />（声乐与乐器）</td>
								<td class="text-center">伯克利音乐学院</td>
								<td class="text-center">7月11日</td>
								<td class="text-center">8月14日</td>
								<td class="text-center">$8,538</td>
								<td class="text-center">15-22周岁</td>
								<td class="text-center">学习声乐或乐器表演，有奖学金面试机会</td>
							</tr>
							<tr>
								<td class="text-center">电影制作</td>
								<td class="text-center">耶鲁大学</td>
								<td class="text-center">7月7日</td>
								<td class="text-center">8月8日</td>
								<td class="text-center">$10,000</td>
								<td class="text-center">托福100分</td>
								<td class="text-center">学习电影制作和编剧（含6个学分及以上）</td>
							</tr>
							<tr>
								<td class="text-center">电影制作</td>
								<td class="text-center">南加大</td>
								<td class="text-center">6月15日</td>
								<td class="text-center">7月16日</td>
								<td class="text-center">$9,408</td>
								<td class="text-center">托福100分</td>
								<td class="text-center">全美最好的电影制作项目,有四个专业:电影制作入门/编剧/计算机制图，动漫/电影 & 电视商务</td>
							</tr>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<hr class="border-dashed" />
		</div>

		<div class="p-l-20 p-r-20 p-t-10">
			<h4 class="color-blue m-0">价格详情</h4>
			<hr class="cont-tit-border-zhuanti pull-left">
			<p class="clear">根据具体的服务情况进行定价。</p>
			<hr class="border-dashed" />
		</div>
		<div class="p-l-20 p-r-20 p-t-10">
			<h4 class="color-blue m-0">咨询方式</h4>
			<hr class="cont-tit-border-zhuanti pull-left">
			<p class="clear">如果您对本项目有兴趣或者有疑问，欢迎拨打留洋帮客服电话 <span class="color-blue">4006100025</span>，或者添加小助手微信 <span class="color-blue">lybkf888</span> 与我们联系。</p>
		</div>
	</div>
	<div class="border-color p-20 p-b-0 m-t-20 p-b-20">
		<div class="row m-t-10">
			<div class="col-xs-7 p-l-30">
				<p>客服热线：400 610 0025</p>
				<br />
				<p>官方网站：liuyangbang.cn</p>
				<br />
				<p>邮箱地址：lyb@liuyangbang.cn</p>
				<br />
				<p>中国办公室：北京市东城区东四十条甲22号南新仓商务大厦A座1510 100007</p>
				<br />
				<p>美国办公室：1133 15th St.NW 8th Floor Washington，DC USA 20005</p>
			</div>
			<div class="col-xs-5 p-r-30">
				<div class="row m-t-30">
					<div class="col-xs-6 text-center">
						<img src="<?= Url::to("/img/qrcord_01.jpg"); ?>" />
						<p class="color-blue">留洋帮公众号</p>
					</div>
					<div class="col-xs-6 text-center">
						<img src="<?= Url::to("/img/qrcord_01.jpg"); ?>" />
						<p class="color-blue">留洋帮小助手</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center m-t-50">
		<a href="" class="btn btn-blue btn-big-size btn-lg" data-toggle="modal" data-target="#order">咨询详情</a>
	</div>
</div>
<?php
$form = ActiveForm::begin([
	'action' => ['service/create'],
	'method' => 'post'
])
?>
	<div class="modal" tabindex="-1" role="dialog" id="order">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title color-blue">预约咨询</h4>
				</div>
				<div class="modal-body">
					<p class="color-red"><small>我们会在24小时内联系您，请保持手机畅通。</small></p>
					<form class="m-t-20">
						<div class="form-group">
							<?= $form->field($model, "username")->textInput(['placeholder' => '姓名'])->label(false); ?>
							<!--						<input type="text" class="form-control" placeholder="姓名">-->
						</div>
						<div class="form-group">
							<?= $form->field($model, 'phone')->textInput(['placeholder' => '手机号'])->label(false); ?>
							<!--						<input type="text" class="form-control" placeholder="手机号">-->
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-blue submit">提交</button>
				</div>
			</div>
		</div>
	</div>
<?php ActiveForm::end(); ?>
<?php
$js = <<<JS
	$(".submit").click(function(){
		var username = $("input[name='ServiceForm[username]']").val();
		var phone = $("input[name='ServiceForm[phone]']").val();
		var csrf = $("input[name='_csrf-frontend']").val();
		var type = 3;
		if(!phone.match(/^(((13[0-9]{1})|159|153)+\d{8})$/)){
			layer.open({
				title:'警告信息',
				content:'手机号码不正确',
			});
			return false;
		}
		$.post("/service/create", {"_csrf-frontend":csrf,"Service[username]":username,"Service[phone]":phone,"Service[type]:":type}, function(re){
			if(re){
				layer.open({
		            title:'success',
		            'content':'预约成功'
		        });
				$("#order").modal("toggle");
			}else{
				alert("保存失败");
			}
		});
	});
JS;

$this->registerJs($js);
?>