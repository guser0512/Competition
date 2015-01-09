-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 19, 2014 at 09:21 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `competition`
-- 
CREATE DATABASE `competition` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `competition`;

-- --------------------------------------------------------

-- 
-- Table structure for table `tg_admin`
-- 

CREATE TABLE `tg_admin` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `uniqid` char(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` char(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `level` int(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `tg_admin`
-- 

INSERT INTO `tg_admin` VALUES (1, '5d915b47fb938b30258578f9276441b137fabf0d', 'admin@sea.com', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'admin', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `tg_question_pd`
-- 

CREATE TABLE `tg_question_pd` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `content` varchar(400) NOT NULL,
  `answer` int(1) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

-- 
-- Dumping data for table `tg_question_pd`
-- 

INSERT INTO `tg_question_pd` VALUES (1, '全新一代Lexus ES300h油电混合动力车型，采用阿特金森循环发动机、高达12.5：1的高压缩比和电水泵大大提升了车辆的燃油经济性。', 1);
INSERT INTO `tg_question_pd` VALUES (2, '全新雷克萨斯CT200h混合动力车型，纤维织物材质可以提供三种内室颜色。', 0);
INSERT INTO `tg_question_pd` VALUES (3, '在为顾客进行产品介绍时，为顾客树立有利于我们的选择标准，是确立竞争优势的关键。', 1);
INSERT INTO `tg_question_pd` VALUES (4, '雷克萨斯混合动力汽车系统，可以表现出令人叹服的澎湃动力、静谧性、平顺性、低油耗、低排放的驾控体验。', 1);
INSERT INTO `tg_question_pd` VALUES (5, 'CT200h中的数字200代表着雷克萨斯家族车系中的车型。', 0);
INSERT INTO `tg_question_pd` VALUES (6, '全新一代Lexus ES全系配备智能钥匙、一键式启动和巡航控制系统。', 1);
INSERT INTO `tg_question_pd` VALUES (7, '全新一代Lexus ES配备了Remote Touch信息操作系统，新增加的ENTER键让操作更简单、更自由，集成的7英寸VGA液晶显示屏，整合LEXUS雷克萨斯原厂硬盘导航系统、蓝牙免提通话、音响控制、以及LEXUS?G-BOOK雷克萨斯智能副驾等先进功能。', 0);
INSERT INTO `tg_question_pd` VALUES (8, '全新雷克萨斯ES车型至今已经是第六代了。', 1);
INSERT INTO `tg_question_pd` VALUES (9, '邀约顾客到店是从顾客记住销售顾问的电话开始的！', 0);
INSERT INTO `tg_question_pd` VALUES (10, '雷克萨斯GS450h属于前驱方式。', 0);
INSERT INTO `tg_question_pd` VALUES (11, '雷达萨斯LS600hL的驱动为全轮四轮驱动。', 0);
INSERT INTO `tg_question_pd` VALUES (12, '雷克萨斯的品牌口号是“矢志不渝、追求完美”。 ', 1);
INSERT INTO `tg_question_pd` VALUES (13, '混合动力车已经开始逐渐在取代主流的燃油发动机汽车，这种混合动力装置既发挥了发动机持续工作时间长、动力性好的优点，又可以发挥电动机无污染、低噪声的好处，二者“并肩战斗”，取长补短。', 1);
INSERT INTO `tg_question_pd` VALUES (14, '雷克萨斯油电混合动力属于强混合动力。', 1);
INSERT INTO `tg_question_pd` VALUES (15, 'LEXUS 雷克萨斯特别为中国大陆销售的油电混合动力车辆提供了4 年或10万公里的免费保修免费保养服务。', 0);
INSERT INTO `tg_question_pd` VALUES (16, '混合动力车型分为弱混、中混、强混、三种类型，雷克萨斯混合动力属于三种类型中的强混。', 1);
INSERT INTO `tg_question_pd` VALUES (17, '全新一代Lexus ES配备的全新6速手自一体智能电子控制自动变速系统ECT-i，实现一流的紧凑、轻量化设计、流畅的换挡感觉、优秀的驾驶性能、出色的驾驶静谧性。', 1);
INSERT INTO `tg_question_pd` VALUES (18, '雷克萨斯混合动力汽车为了降低发动机的负荷，增加其输出功率在车辆的辅助设备中采用了先进的电子式空调压缩机和电子水泵总成。', 1);
INSERT INTO `tg_question_pd` VALUES (19, '全新一代Lexus ES前排副驾采用两级爆燃式SRS气囊，可以帮助减少乘客身体单一部位承受的冲击力。', 0);
INSERT INTO `tg_question_pd` VALUES (20, '混合动力车与电动车相比最大的区别在于可以自动充电在行驶性能方面胜过电动车。', 1);
INSERT INTO `tg_question_pd` VALUES (21, 'CT200h的后备箱在不折叠的情况下拥有378升的容积。', 0);
INSERT INTO `tg_question_pd` VALUES (22, '雷克萨斯CT200h的轴距是2650mm。', 0);
INSERT INTO `tg_question_pd` VALUES (23, '全新雷克萨斯CT200h混合动力车型，最小转弯半径为5.2米。', 1);
INSERT INTO `tg_question_pd` VALUES (24, '销售就是营造一个积极良好的购买氛围，让顾客去”感受”，从而影响顾客的购买决定！', 1);
INSERT INTO `tg_question_pd` VALUES (25, '全新一代Lexus ES不具备外后视镜加热功能除霜功能。', 0);
INSERT INTO `tg_question_pd` VALUES (26, '顾客进店看展车时，我们应该马上带领顾客到驾驶席感受车内的先进设施。', 0);
INSERT INTO `tg_question_pd` VALUES (27, '留住顾客心的最佳时机是对顾客进行详细的产品介绍。', 0);
INSERT INTO `tg_question_pd` VALUES (28, 'ECVT电子无级变速器有效的提高了动力输出。', 0);
INSERT INTO `tg_question_pd` VALUES (29, '全新一代Lexus ES250共分为3款，起价399000元。', 0);
INSERT INTO `tg_question_pd` VALUES (30, '全新一代Lexus ES配备了先进的LDA（胎压监测系统）当车辆发生车道偏离时，蜂鸣器响起并且车道偏离侧的车道标记呈黄色闪烁。', 0);
INSERT INTO `tg_question_pd` VALUES (31, '雷克萨斯混合动力质保期是6年15万公里。', 0);
INSERT INTO `tg_question_pd` VALUES (32, '雷克萨斯6年15万公里免费保养保修其中包括四条轮胎。', 0);
INSERT INTO `tg_question_pd` VALUES (33, '全新一代Lexus ES采用了WIL颈椎伤害缓和座椅，保证了乘客的安全。', 1);
INSERT INTO `tg_question_pd` VALUES (34, 'CT200h的压缩比可达 12:1。', 0);
INSERT INTO `tg_question_pd` VALUES (35, 'CT200h的前风挡采用了防紫外线带除冰功能的玻璃。', 1);
INSERT INTO `tg_question_pd` VALUES (36, 'CT200h混合动力前桥悬挂采用的是独立麦弗逊滑柱式悬架并带有横向稳定杆。', 1);
INSERT INTO `tg_question_pd` VALUES (37, '全新一代Lexus ES的设计理念是豪华与先进智能的新感觉。', 1);
INSERT INTO `tg_question_pd` VALUES (38, '弱混合动力（也称轻混合动力）弱混合动力以发动机为主动力源，主要停车或起步阶段使用电动机作为辅助动力，是一种比较简单的混合动力系统，只能在一定程度上节约燃油。', 1);
INSERT INTO `tg_question_pd` VALUES (39, '制动能量回收系统回收车辆在制动或惯性滑行中释放出的多余能量，并通过发电机将其转化为电能，再储存在蓄电池中。', 1);
INSERT INTO `tg_question_pd` VALUES (40, '混合动力车型就是具备了两种动力的汽车为混合动力。', 0);
INSERT INTO `tg_question_pd` VALUES (41, 'CT200h必须使用95号汽油。', 0);
INSERT INTO `tg_question_pd` VALUES (42, '我们主动邀请顾客进行试乘试驾不如等顾客自己主动提出试乘试驾的要求，这样顾客会有更大的满足感', 0);
INSERT INTO `tg_question_pd` VALUES (43, '阿特金森循环就是通过推迟进气门关闭，在压缩冲程时从进气门排出部分燃气，减少进气量，使压缩冲程的位移小于做功冲程位移，在提升压缩比的同时实现了节能减排。', 1);
INSERT INTO `tg_question_pd` VALUES (44, '全新一代Lexus ES全系配备了10向电动可调前排座椅带腰部支撑。', 1);
INSERT INTO `tg_question_pd` VALUES (45, '强混合动力与弱混合动力相比主要区别在于强混合动力系统可以单独利用电动机行驶，弱混合动力系统必须依赖发动机同时工作。强混合动力系统可以更好的做到发动机和电动机完美结合，达到动力方面1 加1 大于2 的结果。', 1);
INSERT INTO `tg_question_pd` VALUES (46, 'CT200h轮胎尺寸是225（45）R17。', 0);
INSERT INTO `tg_question_pd` VALUES (47, '全新一代Lexus ES配备的Nanoe微水离子发生器，含水量大约是普通负离子的1000倍，可以更有效的除菌、除臭、护肤。', 1);
INSERT INTO `tg_question_pd` VALUES (48, '全新一代Lexus ES300h油电混合动力车型，专门设计了蓄电池组冷却循环系统，实现了宽敞的后备箱空间、提高了电池组的冷却性、大大提升了车内厢静谧性。', 1);
INSERT INTO `tg_question_pd` VALUES (49, 'CT200h的发动机盖采用的材料是铝合金材质。', 1);
INSERT INTO `tg_question_pd` VALUES (50, 'CT200h的每百公里综合油耗为4.3升。', 0);
INSERT INTO `tg_question_pd` VALUES (51, '全新一代ES车型定位包括运动、个人用途、商务用途、传统兼具。', 1);
INSERT INTO `tg_question_pd` VALUES (52, '全新一代Lexus ES车身尺寸进一步加长，前后轴距达到了2775mm。', 0);
INSERT INTO `tg_question_pd` VALUES (53, 'CT200h混合动力的主要构件有阿特金森循环发动机，ECVT电子无级变速器，PCU能量控制单元，直流镍氢电池组。', 1);
INSERT INTO `tg_question_pd` VALUES (54, '强混合动力按照功能性可分为两大类：一.可单独使用EV模式驱动车辆，实现节省燃油的混合动力。二.不是单独使用EV模式，其构造原理相对简单的弱混合动力。', 1);
INSERT INTO `tg_question_pd` VALUES (55, '雷克萨斯ct200h分为三种工作模式，第一种ECO模式，第二种NORMAL模式，第三种SPORT模式。', 0);
INSERT INTO `tg_question_pd` VALUES (56, '混合动力车与普通汽车相比最大的区别在于同时装配发动机和电动机并且综合了两大动力各自的优点，在环保性能和行驶性能方面都胜过普通汽车。', 1);
INSERT INTO `tg_question_pd` VALUES (57, '全新一代Lexus ES250推荐燃油等级为93号或更高。', 0);
INSERT INTO `tg_question_pd` VALUES (58, '在我们为顾客介绍混合动力车型时，一定要特别介绍该车的节油性。', 0);
INSERT INTO `tg_question_pd` VALUES (59, '全新一代Lexus ES配备了先进的TPMS（车道偏离警示系统）可以实时显示每个轮胎气压，行驶前自动检查，提高安全性。', 0);
INSERT INTO `tg_question_pd` VALUES (60, '全新一代Lexus ES车型在外观设计方面，车侧窗设计采用优雅流线型设计，同时确保了乘降车时头部空间。', 1);
INSERT INTO `tg_question_pd` VALUES (61, '顾客在签署订单时通常都是理性的。', 0);
INSERT INTO `tg_question_pd` VALUES (62, '在LEXUS雷克萨斯LS600hL传动系统电子无级变速器ECVT结构中五大结构分别是 ：（1）发电机（2）动力分离装置（3）电动机（4）两段式电动机减速装置（5）四驱传动装置 。', 1);
INSERT INTO `tg_question_pd` VALUES (63, '镍氢电池组电压通常应保持在直流DC/ 260V左右。', 0);
INSERT INTO `tg_question_pd` VALUES (64, '在和顾客沟通的过程中我们尽量让顾客点头，因为顾客点头认同的频次是和成交几率成正比的。', 1);
INSERT INTO `tg_question_pd` VALUES (65, '全新一代Lexus ES最小转弯半径为5.5米。', 0);
INSERT INTO `tg_question_pd` VALUES (66, 'LEXUS雷克萨斯混合动力电池组采用的是锂电池，与镍氢电池相比其优点：能量密度高 、无辐射污染 、安全可靠 、使用期长 。', 0);
INSERT INTO `tg_question_pd` VALUES (67, '全新一代ES轴距是2820mm。', 1);
INSERT INTO `tg_question_pd` VALUES (68, 'Lexus Hybrid Drive（简称LHD）的工作方式分为哪五阶段：起步阶段、匀速行驶阶段、加速阶段、制动阶段、停止阶段。', 1);
INSERT INTO `tg_question_pd` VALUES (69, '雷克萨斯油电混合动力技术（LHD）的工作方式，在车辆起步阶段由电动机为车辆提供动力，此时发动机不介入真正实现无排放、无污染、不产生任何油耗。', 1);
INSERT INTO `tg_question_pd` VALUES (70, '在与顾客进行价格谈判时所使用的七步筛选法，是根据不同顾客对我们的优惠政策及谈判方式的接纳程度设计的。', 1);
INSERT INTO `tg_question_pd` VALUES (71, '我们要与一进店就要求价格优惠的顾客进行价格谈判，因为这样的顾客购车意向很强。', 0);
INSERT INTO `tg_question_pd` VALUES (72, '强混合动力（也称完全混合动力）是指发动机和电动机都可单独作为动力源驱动车辆，也可以协同合作，从而可以大幅度节省燃油，并减少二氧化碳的排放。', 1);
INSERT INTO `tg_question_pd` VALUES (73, '雷克萨斯ct200h采用CVT变速箱，换挡平顺无顿挫感。', 0);
INSERT INTO `tg_question_pd` VALUES (74, '雷达萨斯RX450h的驱动为全时驱动模式。', 0);
INSERT INTO `tg_question_pd` VALUES (75, '在与顾客进行价格谈判时，差异化服务不会对提升顾客满意度有帮助。', 0);
INSERT INTO `tg_question_pd` VALUES (76, '雷克萨斯混合动力的制动系统前制动盘是通风式。', 1);
INSERT INTO `tg_question_pd` VALUES (77, '邀请顾客试乘试驾是树立销售顾问专家效应的最佳时机。', 1);
INSERT INTO `tg_question_pd` VALUES (78, '雷克萨斯ct200h在ev模式下的续航里程是1公里。', 0);
INSERT INTO `tg_question_pd` VALUES (79, 'CT200h混合动力后桥悬挂采用的是独立双叉式悬架带横向稳定杆。', 1);
INSERT INTO `tg_question_pd` VALUES (80, '全新一代Lexus ES前排座椅背板的设计更加轻薄且预留出后排乘客膝部空间位置。', 1);
INSERT INTO `tg_question_pd` VALUES (81, '全新一代Lexus ES全系配备了215/55R17 93V型号的轮胎。', 0);
INSERT INTO `tg_question_pd` VALUES (82, '全新雷克萨斯CT200h混合动力车型，全系配备了一键式启动功能。', 1);
INSERT INTO `tg_question_pd` VALUES (83, '全新雷克萨斯CT200h混合动力车型，全系配备了205/55 R16型号的轮胎。', 1);
INSERT INTO `tg_question_pd` VALUES (84, '对意向客户要100 %主动建议试乘试驾。', 1);
INSERT INTO `tg_question_pd` VALUES (85, '在对顾客进行电话跟踪时，将最主要的目标放在最先提出可以提升成交几率。', 0);
INSERT INTO `tg_question_pd` VALUES (86, '雨量感应式雨刮器的优势在于可根据雨量大小自动调整频率。', 1);
INSERT INTO `tg_question_pd` VALUES (87, '更大的双腔前（后）排侧面SRS气囊：覆盖乘全新一代Lexus ES采用客的胸部、腹部和腰部，提供周到安全的保护。', 0);
INSERT INTO `tg_question_pd` VALUES (88, '全新雷克萨斯CT200h混合动力车型，只有豪华版配备了双区域独立控制自动空调系统，并带有花粉过滤功能。', 0);
INSERT INTO `tg_question_pd` VALUES (89, '全新一代Lexus ES在车身空气动力学设计方面采用了先进的技术，在A柱旁和后尾灯处增加了导流片使气流更贴近车身，提高车身稳定性。', 1);
INSERT INTO `tg_question_pd` VALUES (90, '在顾客试驾环节，当顾客提出问题时销售顾问应当马上予以回答。', 0);
INSERT INTO `tg_question_pd` VALUES (91, '2010年Lexus ES车型在全球各地区销售中，北美地区所占比例最大。', 0);
INSERT INTO `tg_question_pd` VALUES (92, '全新一代Lexus ES推出了多种独特的颜色，最新的白金灰金属色比传统银色反光度和对比度更高，三维感更强。', 1);
INSERT INTO `tg_question_pd` VALUES (93, 'G-book导航系统在5年内可以免费使用。', 0);
INSERT INTO `tg_question_pd` VALUES (94, '"试乘试驾过程中换驾驶员时,熄火拔钥匙,并对其进行功能讲解。"', 1);
INSERT INTO `tg_question_pd` VALUES (95, '制动能量回收系统包括与车型相适配的发电机、蓄电池。', 0);
INSERT INTO `tg_question_pd` VALUES (96, 'LEXUS雷克萨斯的专业选材师，根据每段木材的纹理和质感特点，选择与内饰最为匹配的部分，分别打磨成型。堪称质感、美感与豪华感的完美融合。', 1);
INSERT INTO `tg_question_pd` VALUES (97, '进店的顾客常见的分为四种类型，分别是和蔼型、社交型、分析型、主导型', 1);
INSERT INTO `tg_question_pd` VALUES (98, '在顾客试驾环节时，可以让顾客的家人、朋友做到副驾驶席，销售顾问坐到后排。', 0);
INSERT INTO `tg_question_pd` VALUES (99, '全新一代Lexus ES全系配备了HID高强度近光照明大灯带自动水平调节。', 0);
INSERT INTO `tg_question_pd` VALUES (100, '目前国内Lexus Hybrid Drive雷克萨斯油电混合动力家族成员一共有四名。', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `tg_question_xz`
-- 

CREATE TABLE `tg_question_xz` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `content` varchar(800) NOT NULL,
  `mark_a` varchar(100) default NULL,
  `mark_b` varchar(100) default NULL,
  `mark_c` varchar(100) default NULL,
  `mark_d` varchar(100) default NULL,
  `answer` int(1) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

-- 
-- Dumping data for table `tg_question_xz`
-- 

INSERT INTO `tg_question_xz` VALUES (1, '近几年，汽车市场环境及消费意识形态的变化不包括', '燃油价格居高不下', '环境污染日益严重', '追求高价格高油耗的高端车型', '追求长轴距及宽敞的后排\r\n\r\n乘坐空间', 3);
INSERT INTO `tg_question_xz` VALUES (2, '全新一代IS首要的研发目标是', '驾驶乐趣', '长轴距大\r\n\r\n空间', '环保以及安静', '高效节能', 1);
INSERT INTO `tg_question_xz` VALUES (3, 'LEXUS雷克萨斯全新一代IS的产品定位是', '豪华轿车', '运动轿车', '高端运动轿车', '入门级豪华运动轿车', 4);
INSERT INTO `tg_question_xz` VALUES (4, 'LEXUS雷克萨斯 IS第一代诞生时间是', '1996年', '1998年', '1999年', '1997年', 3);
INSERT INTO `tg_question_xz` VALUES (5, '全新一代IS的目标客户设定为', '积极向上具有个性的\r\n\r\n年轻男性', '45—50岁的成功企业家', '国有企业管理层', '高级企业管理者', 1);
INSERT INTO `tg_question_xz` VALUES (6, '全新一代LEXUS雷克萨斯 IS为第几代车型', '第一代', '\r\n\r\n第二代', '第三代', '第四代', 3);
INSERT INTO `tg_question_xz` VALUES (7, '下列哪个车系不是IS250的主要市场竞争对手', '奔驰C\r\n\r\n级', '宝马3系列', '奥迪A4L', '大众迈腾', 4);
INSERT INTO `tg_question_xz` VALUES (8, '雷克萨斯 IS C 车型最早诞生于', '2001年', '2005年', '2007年', '2009年', 4);
INSERT INTO `tg_question_xz` VALUES (9, '雷克萨斯 IS C 顶篷开启最短用时为', '18秒', '21秒', '27秒', '36秒', 2);
INSERT INTO `tg_question_xz` VALUES (10, '雷克萨斯IS F 中的“F”标志起源于', '富士山', 'Fuji\r\n\r\n赛道', '英文fly', '“旗帜”的变形设计', 2);
INSERT INTO `tg_question_xz` VALUES (11, 'LEXUS雷克萨斯 IS F 车型最早诞生于', '2001年', '2005年', '2007年', '2010年', 3);
INSERT INTO `tg_question_xz` VALUES (12, '全新一代IS的产地是哪里', '美国', '中国', '加拿大', '日\r\n\r\n本', 4);
INSERT INTO `tg_question_xz` VALUES (13, '全新一代IS 250整车长×宽×高为', '4665×1810×1430', '4761×1826×1439', '4624×1811×1455', '4591×1770×1444', 1);
INSERT INTO `tg_question_xz` VALUES (14, '全新一代IS FSPORT运动版与普通版在车身尺寸上的\r\n\r\n区别是', '宽度增加5mm', '高度增加5mm', '长度增加5mm', '轴距缩小5毫米', 3);
INSERT INTO `tg_question_xz` VALUES (15, '全新一代IS轴距相较旧款', '加长70mm', '缩短\r\n\r\n70mm', '加长75mm', '缩短75mm', 1);
INSERT INTO `tg_question_xz` VALUES (16, '全新一代IS的风阻系数是', '0.24', '0.25', '0.26', '0.28', 4);
INSERT INTO `tg_question_xz` VALUES (17, '全新一代IS整备质量为', '1715公斤', '1705公斤', '1605公斤', '1615公斤', 3);
INSERT INTO `tg_question_xz` VALUES (18, '全新一代IS油箱容积为', '77升', '76升', '66升', '67升', 3);
INSERT INTO `tg_question_xz` VALUES (19, '全新一代IS综合油耗为（升/100公里）', '8.6\r\n\r\n（升/100公里）', '7.6（升/100公里）', '6.6（升/100公里）', '9.6（升/100公里）', 1);
INSERT INTO `tg_question_xz` VALUES (20, '全新一代IS可达到的最高时速为', '240（公里/小时）\r\n\r\n', '225（公里/小时）', '245（公里/小时）', '250（公里/小时）', 2);
INSERT INTO `tg_question_xz` VALUES (21, '全新一代IS 0-100公里/小时加速时间为', '7.0秒', '6.7\r\n\r\n秒', '6.1秒', '8.2秒', 4);
INSERT INTO `tg_question_xz` VALUES (22, '全新一代IS的最小转弯半径为', '5.1米', '5.2米', '5.3米\r\n\r\n', '5.4米', 2);
INSERT INTO `tg_question_xz` VALUES (23, '全新一代IS前大灯采用的光源是', 'LED大灯', '卤素大\r\n\r\n灯', '卤素大灯+透镜', '氙气大灯', 4);
INSERT INTO `tg_question_xz` VALUES (24, '全新一代IS的前大灯不具备的功能是哪项', '自动灯光\r\n\r\n控制系统', '远光灯自动控制系统AHB', '大灯带自动水平调节', '夜视照明功能', 4);
INSERT INTO `tg_question_xz` VALUES (25, '以下哪一个不属于全新一代IS灯组所配备的功能', 'AHB远光灯自动控制系统', '投射式HID高强度氙气光源', '独立的LED日间行车灯', '前大灯随动转向\r\n\r\n功能', 4);
INSERT INTO `tg_question_xz` VALUES (26, '以下哪一个不属于全新一代IS外后视镜所配备的功\r\n\r\n能', '带有除雾功能', '倒车可视角度自动调节', '采用镀银涂层技术', '自动防炫目', 3);
INSERT INTO `tg_question_xz` VALUES (27, '全新一代IS的后组合灯没有采用LED光源的是', '后尾\r\n\r\n灯', '后牌照灯', '倒车灯', '刹车灯', 3);
INSERT INTO `tg_question_xz` VALUES (28, '全新一代IS轮胎规格为', '225/45R17', '225/55R16', '225/50R17', '245/40R18', 1);
INSERT INTO `tg_question_xz` VALUES (29, '全新一代IS后备箱容积为', '475L', '485L', '470L', '480L', 4);
INSERT INTO `tg_question_xz` VALUES (30, '全新一代IS车身没有安装空气扰流鳍的部位是', '前后\r\n\r\n灯罩', '车底', '后保险杠底部', '车外后视镜', 3);
INSERT INTO `tg_question_xz` VALUES (31, '全新一代IS F SPORT在外观上与普通版的区别主要\r\n\r\n在哪方面', '面积更大的下格栅设计', '明显的F标志', '增加鲨鱼鳍式车顶天线', '采用LED前大灯', 1);
INSERT INTO `tg_question_xz` VALUES (32, '全新一代IS F SPORT运动版与普通版在外观设计上\r\n\r\n的不同点不包括', '车身独有的F 徽标', 'LED雾灯', '网状前格栅', '前格栅更突出制动器冷却口的造型', 2);
INSERT INTO `tg_question_xz` VALUES (33, '以下对全新一代IS装备的LED日间行车灯描述不正确\r\n\r\n的是', '由9颗LED灯泡组成', '采用全新的独立布局式', '无接缝、非灯泡式技术', '具有低能耗、高亮度\r\n\r\n等优势', 1);
INSERT INTO `tg_question_xz` VALUES (34, '以下对全新一代IS装备的AHB远光灯自动控制系统描\r\n\r\n述不正确的是', '安装在风挡玻璃上的摄像机会自动进行检测', '如检测到对向车道有车辆接近，远光\r\n\r\n灯会转为近光灯照明', '系统会自动进行远/近光切换', '车辆转向时，系统会根据方向盘转动角度自动\r\n\r\n调整灯光照射角度', 4);
INSERT INTO `tg_question_xz` VALUES (35, '全新一代IS后排座椅采用的折叠方式为', '60:40:00', '40:20:40', '50:50:00', '不可折叠', 1);
INSERT INTO `tg_question_xz` VALUES (36, '对于全新一代IS采用的激光钎焊技术描述不正确的\r\n\r\n是', 'LEXUS雷克萨斯首次应用', '车顶和车顶侧梁直接有激光钎焊接合', '采用黑色装饰条对焊点进行\r\n\r\n装饰', '车顶和车顶侧梁见不用再添加装饰条', 3);
INSERT INTO `tg_question_xz` VALUES (37, '置于中央控制面板上方VGA液晶显示屏大小为', '5英\r\n\r\n寸', '7英寸', '8英寸', '10英寸', 2);
INSERT INTO `tg_question_xz` VALUES (38, '全新一代IS空调系统首次采用了何种技术', '双区独立\r\n\r\n控制技术', '触控温度调节技术', '自动恒温技术', '负离子空气净化技术', 2);
INSERT INTO `tg_question_xz` VALUES (39, '全新一代IS内部空间得到显著提升，选出一下数据错\r\n\r\n误的一项', '后排座椅空间增加50mm', '后排膝部空间增加85mm', '后排座椅到车门的距离增加\r\n\r\n40mm   ', '后排座椅椅垫长度增加20mm', 4);
INSERT INTO `tg_question_xz` VALUES (40, '全新一代IS F SPORT运动版驾驶员座椅的特殊性体\r\n\r\n现在', '“一体式”制造工艺', '“纯手工”制造', '“真皮”包裹', '“软硬不同”填充材质', 1);
INSERT INTO `tg_question_xz` VALUES (41, '全新一代IS F SPORT运动版的驾驶模式选择不同点\r\n\r\n是', '包含Normal模式', '包含ECO模式', '包含SPORT模式', '包含SPORT+模式', 4);
INSERT INTO `tg_question_xz` VALUES (42, '以下不属于全新一代IS车内空间提升参数的是', '后排\r\n\r\n座椅空间增加50mm', '优化前排座椅靠背厚度', '膝部空间比现款增加85mm', '后排座椅到车门最小\r\n\r\n距离比现款增加40mm ', 2);
INSERT INTO `tg_question_xz` VALUES (43, '以下对全新一代IS方向盘描述不正确的是', '采用LFA\r\n\r\n的方向盘设计理念', '红色真皮包裹', '具备换挡拨片功能', '三幅式设计', 2);
INSERT INTO `tg_question_xz` VALUES (44, '以下哪一项不是全新一代IS F SPORT车型的专属设\r\n\r\n计', '比普通版更大的下格栅的面积', '内室采用运动版专属色', '以驾驶者为中心的驾驶舱设计', '“一\r\n\r\n体式”制造工艺座椅', 3);
INSERT INTO `tg_question_xz` VALUES (45, '全新一代IS F SPORT运动版与普通版在内室设计上\r\n\r\n的不同点不包括', '方向盘独有的F徽标', '独特的红色真皮方向盘', '源于LFA的可移动炫酷仪表盘', '运\r\n\r\n动版脚踏板', 2);
INSERT INTO `tg_question_xz` VALUES (46, '以下哪点不属于全新一代IS在内室设计变化', 'VGA显\r\n\r\n示屏位置升高', '空调出风口形状变化', '座椅调节按钮位置变化', '新增的LED模拟时钟', 3);
INSERT INTO `tg_question_xz` VALUES (47, '以下哪款车型采用了源于LFA的可移动式炫酷仪表盘\r\n\r\n？', '全新一代IS 250精英版', '全新一代IS 250典雅版', '全新一代IS 250 F SPORT运动版', '全新一代\r\n\r\nIS 250尊贵版', 3);
INSERT INTO `tg_question_xz` VALUES (48, '关于全新一代IS换档杆的变化描述不正确的是', '取消\r\n\r\n了阶梯式换档操作', '造型设计发生改变', '亚光金属与真皮结合', '全真皮包裹', 4);
INSERT INTO `tg_question_xz` VALUES (49, '全新一代IS的驾驶席座椅配有几组记忆功能', '2组', '3\r\n\r\n组', '4组', '无记忆', 2);
INSERT INTO `tg_question_xz` VALUES (50, '全新一代IS的前排座椅配有几向调节功能', '4向', '6向\r\n\r\n', '8向', '10向', 3);
INSERT INTO `tg_question_xz` VALUES (51, '全新一代IS的方向盘采用哪种调节方式', '手动2向', '\r\n\r\n电动2向', '手动4向', '电动4向', 4);
INSERT INTO `tg_question_xz` VALUES (52, '关于全新一代IS采用轻量化的车身结构描述不正确的\r\n\r\n是', '采用激光螺旋焊接', '采用热冲压高抗拉强度钢板', '采用车体粘接技术', '采用全铝车身结构', 4);
INSERT INTO `tg_question_xz` VALUES (53, '以下哪个装备为全新一代IS F SPORT运动版独有的', 'EPS电动助力转向', '发动机发生器', '驾驶模式选择', '多连杆后悬架带横向稳定杆', 2);
INSERT INTO `tg_question_xz` VALUES (54, '全新一代IS的发动机使用了什么结构', 'V型6缸增压发\r\n\r\n动机', 'V型6缸直喷发动机', 'V型8缸直喷发动机', '直列6缸增压发动机', 2);
INSERT INTO `tg_question_xz` VALUES (55, '下列选项中，哪个不是全新一代IS搭载的4GR-FSE发\r\n\r\n动机配备的技术', '带有智能正时可变气门控制系统', '铝制压铸缸体', '搭载缸内直喷系统', '反置式进\r\n\r\n气歧管', 4);
INSERT INTO `tg_question_xz` VALUES (56, '全新一代IS 250 发动机参数为', '最大功率为：\r\n\r\n153kw/6400rpm 最大扭矩为：252Nm/4800rpm ', '最大功率为：155kw/6000rpm  最大扭矩为：\r\n\r\n350Nm/4200rpm', '最大功率为：180kw/6500rpm  最大扭矩为：270Nm/4500rpm', '最大功率为\r\n\r\n：180kw/6000rpm最大扭矩为：300Nm/5000rpm', 1);
INSERT INTO `tg_question_xz` VALUES (57, '全新一代IS的压缩比为', '11.0:1', '12.0:1', '13.0:1', '14.0:1', 2);
INSERT INTO `tg_question_xz` VALUES (58, '全新一代IS 250 变速箱为', '8速手自一体变速箱', '6\r\n\r\n速手自一体变速箱', 'CVT无级变速箱', 'DSG双离合变速箱', 2);
INSERT INTO `tg_question_xz` VALUES (59, '全新一代IS 250 最高时速（公里/小时）为', '210', '215', '220', '225', 4);
INSERT INTO `tg_question_xz` VALUES (60, '全新一代IS 采用的驱动形式为', '前轮驱动', '后轮驱\r\n\r\n动', '全时四驱', '适时四驱', 2);
INSERT INTO `tg_question_xz` VALUES (61, '全新一代IS转向系统采用的助力形式为', '液压转向助\r\n\r\n力', '电动转向助力', '电动液压转向助力', '无', 2);
INSERT INTO `tg_question_xz` VALUES (62, '全新一代IS 250 悬挂形式为', '前：麦弗逊悬架 后：\r\n\r\n麦弗逊悬架', '前：多连杆独立悬挂 后：五连杆独立悬挂', '前：独立双叉式悬架带横向稳定杆 后：多\r\n\r\n连杆悬架带横向稳定杆', '前：空气悬架  后：多连杆式独立悬挂', 3);
INSERT INTO `tg_question_xz` VALUES (63, '全新一代IS 采用的制动盘形式为', '前：16寸通风式  \r\n\r\n后：16寸通风式', '前：16寸通风式  后：16寸实心式', '前：17寸通风式  后：17寸通风式', '前：17\r\n\r\n寸通风式  后：17寸实心式', 0);
INSERT INTO `tg_question_xz` VALUES (64, '全新一代IS推荐使用的燃油等级是什么', '90号或以上\r\n\r\n', '93号或以上', '95号或以上', '98号或以上', 3);
INSERT INTO `tg_question_xz` VALUES (65, '全新一代IS 250的Mark Levinson音响系统提供了多\r\n\r\n少个扬声器', '14个', '15个', '16个', '19个', 2);
INSERT INTO `tg_question_xz` VALUES (66, '以下对于LEXUS雷克萨斯导航系统描述不正确的是', '\r\n\r\n语音识别', '提供即时交通信息', '3D导航', '40G内存空间', 4);
INSERT INTO `tg_question_xz` VALUES (67, '以下不属于LEXUS G-BOOK雷克萨斯智能副驾系统\r\n\r\n的功能为', 'G-BOOK话务员服务', '通过WIFI网络实现车载机的G-BOOK通信', '可远程控制车辆', '可\r\n\r\n遥控驾驶', 4);
INSERT INTO `tg_question_xz` VALUES (68, '自适应巡航控制系统可实现何种功能', '自动驾驶', '自\r\n\r\n动保持与前车距离', '自动泊车', '夜视功能', 2);
INSERT INTO `tg_question_xz` VALUES (69, '全新一代IS采用的全新多媒体系统配备了几个USB接\r\n\r\n口', '1个', '2个', '3个', '4个', 2);
INSERT INTO `tg_question_xz` VALUES (70, '全新一代IS空调系统最小支持最小变化为', '0.5摄氏\r\n\r\n度', '1摄氏度', '1.5摄氏度', '2摄氏度', 1);
INSERT INTO `tg_question_xz` VALUES (71, '以下哪一项不属于全新一代IS自动空调系统的功能', '\r\n\r\n采用LEXUS雷克萨斯首创的触控温度调节调节', '可以滤掉尾气的新型滤清器', '高对比度的液晶显示\r\n\r\n屏', '可自动调整风向', 4);
INSERT INTO `tg_question_xz` VALUES (72, '2013版多媒体系统在仪表板中可显示的信息描述不\r\n\r\n正确的是', '显示手机来电信息', '显示音频播放曲目', '显示3D导航地图', '显示方向盘可以进行操作的\r\n\r\n功能项', 3);
INSERT INTO `tg_question_xz` VALUES (73, '全新一代IS装备的自适应巡航控制系统有几种控制模\r\n\r\n式？', '1种', '2种', '3种', '4种', 2);
INSERT INTO `tg_question_xz` VALUES (74, '以下哪一项不属于ECO模式所采取的节能措施', '限制\r\n\r\n发动机输出功率', '控制节气门开度', '降低车速', '限制空调温度', 3);
INSERT INTO `tg_question_xz` VALUES (75, '自适应巡航控制系统可实现何种功能', '自动驾驶', '自\r\n\r\n动保持与前车距离', '自动泊车', '夜视功能', 2);
INSERT INTO `tg_question_xz` VALUES (76, '在坡道起步时，全新一代IS上坡辅助系统在松开制动\r\n\r\n踏板时会继续保持多久的制动力', '1秒', '2秒', '3秒', '4秒', 2);
INSERT INTO `tg_question_xz` VALUES (77, '为缓冲对行人的碰撞冲击全新一代IS采用了何种配\r\n\r\n置', '加长碰撞缓冲区', '车头采用柔性材质', '弹起式发动机罩', '优化发动机罩结构', 3);
INSERT INTO `tg_question_xz` VALUES (78, '车道偏离警告系统的作用为', '当车辆偏离车道，系统\r\n\r\n通过蜂鸣器提醒驾驶者', '警示后方来车', '当车辆偏离车道，系统自动调整转向', '提供超车安全距离\r\n\r\n提醒', 1);
INSERT INTO `tg_question_xz` VALUES (79, '下列选项中哪一个不是全新一代IS倒车雷达的新特\r\n\r\n征', '数量由6个增加为8个', '蜂鸣器可暂时调为静音', '采用世界上最小规格的传感器', '增强装饰圈效\r\n\r\n果', 4);
INSERT INTO `tg_question_xz` VALUES (80, '下列选项哪一个不是全新一代IS预碰撞安全系统的措\r\n\r\n施及功能', '车头前端安装毫米级微波雷达', '系统预判可能碰撞会发出提醒', '系统预判即将碰撞会自\r\n\r\n动调整转向', '系统预判碰撞不可避免会辅助驾驶者制动', 3);
INSERT INTO `tg_question_xz` VALUES (81, '在坡道起步时，全新一代IS上坡辅助系统在松开制动\r\n\r\n踏板时会继续保持多久的制动力', '1秒', '2秒', '3秒', '4秒', 2);
INSERT INTO `tg_question_xz` VALUES (82, '全新一代IS在车体连接上除采用激光螺旋焊接技术外\r\n\r\n还采用了何种技术', '接触点焊技术', '自攻铆接技术', '车体粘结技术', '叠边压接技术', 3);
INSERT INTO `tg_question_xz` VALUES (83, '若与行人发生碰撞全新一代IS所配备的弹起式发动机\r\n\r\n罩将弹起多高', '30mm', '50mm', '70mm', '90mm', 3);
INSERT INTO `tg_question_xz` VALUES (84, '全新一代IS驾驶席和前排乘客座椅采用几级式气囊', '\r\n\r\n一级式SRS气囊', '二级式SR气囊', '三级式SRS气囊', '四级式SRS气囊', 2);
INSERT INTO `tg_question_xz` VALUES (85, '全新一代IS配备的气囊数量为', '6个', '8个', '10个', '12个', 3);
INSERT INTO `tg_question_xz` VALUES (86, '以下不属于全新一代IS为轻量化车身结构采取的措施\r\n\r\n是', '采用了热冲压和高抗拉强度钢板', '充分利用车体粘结技术、激光螺旋焊接及点焊工艺', '低质量\r\n\r\n的悬架系统', '全铝车身', 4);
INSERT INTO `tg_question_xz` VALUES (87, '对全新一代IS装备的并线盲点监视器（BSM）描述不\r\n\r\n正确的是', '系统增加了RCTA（倒车侧后方盲点警示系统）', '系统自动判断有车辆车外后视镜的盲点\r\n\r\n区域是否有车辆', '如果盲点区域有车辆，系统会自动向驾驶员发出警告', '蜂鸣器会持续鸣响', 4);
INSERT INTO `tg_question_xz` VALUES (88, '全新一代IS与三款竞品车型之间轴距最短的车型为', '\r\n\r\n宝马3系', '奥迪A4l', '奔驰C300', 'IS250', 3);
INSERT INTO `tg_question_xz` VALUES (89, '宝马3系配备的防爆轮胎劣势体现在', '爆胎后只能缓\r\n\r\n慢行驶', '轮胎更换困难，成本高', '轮胎需进行复杂保养', '爆胎概率增高', 2);
INSERT INTO `tg_question_xz` VALUES (90, '地图更新服务的特点描述不正确的是？', '中国首创地\r\n\r\n图更新服务', '更新范围覆盖全国所有地区（不含港澳台）', '顾客需要手动选择更新范围', '在道路开\r\n\r\n通后最快一个月即可更新地图', 3);
INSERT INTO `tg_question_xz` VALUES (91, '地图更新（自动更新）在什么时间启动？', 'ACC \r\n\r\nOFF时', '设定目的地时', '播放CD时', '使用话务员服务时', 2);
INSERT INTO `tg_question_xz` VALUES (92, '不可以通过此应用确认车辆信息的是', '车窗', '门锁', '\r\n\r\n后备箱', '反光镜', 4);
INSERT INTO `tg_question_xz` VALUES (93, '不可以可以通过远程操作完成的动作', '开启锁定车门\r\n\r\n', '关闭电动车窗', '启动发动机', '关闭双闪灯', 3);
INSERT INTO `tg_question_xz` VALUES (94, '13年新增的预定服务是？', '高尔夫球场预定服务', '\r\n\r\n酒店预订服务', '机票预定服务', '高尔尔夫球练习场预定服务', 1);
INSERT INTO `tg_question_xz` VALUES (95, '高尔夫球场的预定范围', '华北地区', '华南地区', '沿海\r\n\r\n地区', '全国', 4);
INSERT INTO `tg_question_xz` VALUES (96, '地图更新服务的特点描述不正确的是？', '中国首创地\r\n\r\n图更新服务', '更新范围覆盖全国所有地区（不含港澳台）', '顾客需要手动选择更新范围', '在道路开\r\n\r\n通后最快一个月即可更新地图', 3);
INSERT INTO `tg_question_xz` VALUES (97, '如果忘记ID和密码怎么办？', '致电呼叫中心', '联系经\r\n\r\n销店', '致电TMCI', '致电中国电信', 1);
INSERT INTO `tg_question_xz` VALUES (98, '关于试乘车销售时的操作和服务期，正确的表述是？\r\n\r\n', '和G-BOOK一样，需要开通操作', '和G-BOOK不一样，无需开通操作', '和G-BOOK一样，开通后4\r\n\r\n年免费服务', '和G-BOOK不一样，交车前需要进行地图更新操作，2年免费', 4);
INSERT INTO `tg_question_xz` VALUES (99, '即将在上海车展推出的城际间高速路交通信息服务的\r\n\r\n覆盖区域是？', '北京', '珠三角区域', '长三角区域', '华南区域', 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `tg_systerm_c`
-- 

CREATE TABLE `tg_systerm_c` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `tg_systerm_c`
-- 

INSERT INTO `tg_systerm_c` VALUES (1, 'competition_time', '3');

-- --------------------------------------------------------

-- 
-- Table structure for table `tg_user`
-- 

CREATE TABLE `tg_user` (
  `id` int(5) unsigned NOT NULL auto_increment COMMENT '自动编码',
  `uniqid` char(40) NOT NULL COMMENT '验证登陆唯一标示符',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` char(40) NOT NULL COMMENT '密码',
  `grade` int(5) NOT NULL default '-9999',
  `correct` int(4) unsigned default NULL,
  `wrong` int(4) unsigned default NULL,
  `skip` int(4) unsigned default NULL,
  `level` int(1) unsigned NOT NULL default '0',
  `reg_time` datetime NOT NULL,
  `is_competed` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tg_user`
-- 

