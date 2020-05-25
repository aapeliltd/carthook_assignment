/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : carthook

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 25/05/2020 01:48:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `comments_post_id_index`(`post_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 1, 'laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo necessitatibus\ndolor quam autem quasi\nreiciendis et nam sapiente accusantium', '2020-05-24 11:07:41', '2020-05-24 11:07:41');
INSERT INTO `comments` VALUES (2, 1, 'est natus enim nihil est dolore omnis voluptatem numquam\net omnis occaecati quod ullam at\nvoluptatem error expedita pariatur\nnihil sint nostrum voluptatem reiciendis et', '2020-05-24 11:07:41', '2020-05-24 11:07:41');
INSERT INTO `comments` VALUES (3, 1, 'quia molestiae reprehenderit quasi aspernatur\naut expedita occaecati aliquam eveniet laudantium\nomnis quibusdam delectus saepe quia accusamus maiores nam est\ncum et ducimus et vero voluptates excepturi deleniti ratione', '2020-05-24 11:07:41', '2020-05-24 11:07:41');
INSERT INTO `comments` VALUES (4, 1, 'non et atque\noccaecati deserunt quas accusantium unde odit nobis qui voluptatem\nquia voluptas consequuntur itaque dolor\net qui rerum deleniti ut occaecati', '2020-05-24 11:07:41', '2020-05-24 11:07:41');
INSERT INTO `comments` VALUES (5, 1, 'harum non quasi et ratione\ntempore iure ex voluptates in ratione\nharum architecto fugit inventore cupiditate\nvoluptates magni quo et', '2020-05-24 11:07:41', '2020-05-24 11:07:41');
INSERT INTO `comments` VALUES (6, 10, 'exercitationem et id quae cum omnis\nvoluptatibus accusantium et quidem\nut ipsam sint\ndoloremque illo ex atque necessitatibus sed', '2020-05-24 13:27:17', '2020-05-24 13:27:17');
INSERT INTO `comments` VALUES (7, 10, 'occaecati laudantium ratione non cumque\nearum quod non enim soluta nisi velit similique voluptatibus\nesse laudantium consequatur voluptatem rem eaque voluptatem aut ut\net sit quam', '2020-05-24 13:27:17', '2020-05-24 13:27:17');
INSERT INTO `comments` VALUES (8, 10, 'illum et alias quidem magni voluptatum\nab soluta ea qui saepe corrupti hic et\ncum repellat esse\nest sint vel veritatis officia consequuntur cum', '2020-05-24 13:27:17', '2020-05-24 13:27:17');
INSERT INTO `comments` VALUES (9, 10, 'id est iure occaecati quam similique enim\nab repudiandae non\nillum expedita quam excepturi soluta qui placeat\nperspiciatis optio maiores non doloremque aut iusto sapiente', '2020-05-24 13:27:17', '2020-05-24 13:27:17');
INSERT INTO `comments` VALUES (10, 10, 'eum accusamus aut delectus\narchitecto blanditiis quia sunt\nrerum harum sit quos quia aspernatur vel corrupti inventore\nanimi dicta vel corporis', '2020-05-24 13:27:17', '2020-05-24 13:27:17');
INSERT INTO `comments` VALUES (11, 16, 'sunt qui consequatur similique recusandae repellendus voluptates eos et\nvero nostrum fugit magnam aliquam\nreprehenderit nobis voluptatem eos consectetur possimus\net perferendis qui ea fugiat sit doloremque', '2020-05-24 17:02:32', '2020-05-24 17:02:32');
INSERT INTO `comments` VALUES (12, 16, 'eos ullam dolorem impedit labore mollitia\nrerum non dolores\nmolestiae dignissimos qui maxime sed voluptate consequatur\ndoloremque praesentium magnam odio iste quae totam aut', '2020-05-24 17:02:32', '2020-05-24 17:02:32');
INSERT INTO `comments` VALUES (13, 16, 'qui adipisci eveniet excepturi iusto magni et\nenim ducimus asperiores blanditiis nemo\ncommodi nihil ex\nenim rerum vel nobis nostrum et non', '2020-05-24 17:02:32', '2020-05-24 17:02:32');
INSERT INTO `comments` VALUES (14, 16, 'et inventore sapiente sed\nsunt similique fugiat officia velit doloremque illo eligendi quas\nsed rerum in quidem perferendis facere molestias\ndolore dolor voluptas nam vel quia', '2020-05-24 17:02:32', '2020-05-24 17:02:32');
INSERT INTO `comments` VALUES (15, 16, 'dignissimos itaque ab et tempore odio omnis voluptatem\nitaque perferendis rem repellendus tenetur nesciunt velit\nqui cupiditate recusandae\nquis debitis dolores aliquam nam', '2020-05-24 17:02:32', '2020-05-24 17:02:32');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (17, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (18, '2020_05_23_090353_create_users_table', 1);
INSERT INTO `migrations` VALUES (19, '2020_05_23_090419_create_posts_table', 1);
INSERT INTO `migrations` VALUES (20, '2020_05_23_090435_create_comments_table', 1);
INSERT INTO `migrations` VALUES (21, '2020_05_23_120603_add_username_to_users', 2);

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `posts_user_id_index`(`user_id`) USING BTREE,
  FULLTEXT INDEX `search`(`title`)
) ENGINE = MyISAM AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit', 'quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto', 1, '2020-05-24 09:29:27', '2020-05-24 09:29:27');
INSERT INTO `posts` VALUES (2, 'qui est esse', 'est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla', 1, '2020-05-24 09:29:27', '2020-05-24 09:29:27');
INSERT INTO `posts` VALUES (3, 'ea molestias quasi exercitationem repellat qui ipsa sit aut', 'et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut', 1, '2020-05-24 09:29:27', '2020-05-24 09:29:27');
INSERT INTO `posts` VALUES (4, 'eum et est occaecati', 'ullam et saepe reiciendis voluptatem adipisci\nsit amet autem assumenda provident rerum culpa\nquis hic commodi nesciunt rem tenetur doloremque ipsam iure\nquis sunt voluptatem rerum illo velit', 1, '2020-05-24 09:29:27', '2020-05-24 09:29:27');
INSERT INTO `posts` VALUES (5, 'nesciunt quas odio', 'repudiandae veniam quaerat sunt sed\nalias aut fugiat sit autem sed est\nvoluptatem omnis possimus esse voluptatibus quis\nest aut tenetur dolor neque', 1, '2020-05-24 09:29:27', '2020-05-24 09:29:27');
INSERT INTO `posts` VALUES (6, 'dolorem eum magni eos aperiam quia', 'ut aspernatur corporis harum nihil quis provident sequi\nmollitia nobis aliquid molestiae\nperspiciatis et ea nemo ab reprehenderit accusantium quas\nvoluptate dolores velit et doloremque molestiae', 1, '2020-05-24 09:29:27', '2020-05-24 09:29:27');
INSERT INTO `posts` VALUES (7, 'magnam facilis autem', 'dolore placeat quibusdam ea quo vitae\nmagni quis enim qui quis quo nemo aut saepe\nquidem repellat excepturi ut quia\nsunt ut sequi eos ea sed quas', 1, '2020-05-24 09:29:27', '2020-05-24 09:29:27');
INSERT INTO `posts` VALUES (8, 'dolorem dolore est ipsam', 'dignissimos aperiam dolorem qui eum\nfacilis quibusdam animi sint suscipit qui sint possimus cum\nquaerat magni maiores excepturi\nipsam ut commodi dolor voluptatum modi aut vitae', 1, '2020-05-24 09:29:27', '2020-05-24 09:29:27');
INSERT INTO `posts` VALUES (9, 'nesciunt iure omnis dolorem tempora et accusantium', 'consectetur animi nesciunt iure dolore\nenim quia ad\nveniam autem ut quam aut nobis\net est aut quod aut provident voluptas autem voluptas', 1, '2020-05-24 09:29:27', '2020-05-24 09:29:27');
INSERT INTO `posts` VALUES (10, 'optio molestias id quia eum', 'quo et expedita modi cum officia vel magni\ndoloribus qui repudiandae\nvero nisi sit\nquos veniam quod sed accusamus veritatis error', 1, '2020-05-24 09:29:27', '2020-05-24 09:29:27');
INSERT INTO `posts` VALUES (11, 'aut amet sed', 'libero voluptate eveniet aperiam sed\nsunt placeat suscipit molestias\nsimilique fugit nam natus\nexpedita consequatur consequatur dolores quia eos et placeat', 10, '2020-05-24 16:42:50', '2020-05-24 16:42:50');
INSERT INTO `posts` VALUES (12, 'ratione ex tenetur perferendis', 'aut et excepturi dicta laudantium sint rerum nihil\nlaudantium et at\na neque minima officia et similique libero et\ncommodi voluptate qui', 10, '2020-05-24 16:42:50', '2020-05-24 16:42:50');
INSERT INTO `posts` VALUES (13, 'beatae soluta recusandae', 'dolorem quibusdam ducimus consequuntur dicta aut quo laboriosam\nvoluptatem quis enim recusandae ut sed sunt\nnostrum est odit totam\nsit error sed sunt eveniet provident qui nulla', 10, '2020-05-24 16:42:50', '2020-05-24 16:42:50');
INSERT INTO `posts` VALUES (14, 'qui qui voluptates illo iste minima', 'aspernatur expedita soluta quo ab ut similique\nexpedita dolores amet\nsed temporibus distinctio magnam saepe deleniti\nomnis facilis nam ipsum natus sint similique omnis', 10, '2020-05-24 16:42:50', '2020-05-24 16:42:50');
INSERT INTO `posts` VALUES (15, 'id minus libero illum nam ad officiis', 'earum voluptatem facere provident blanditiis velit laboriosam\npariatur accusamus odio saepe\ncumque dolor qui a dicta ab doloribus consequatur omnis\ncorporis cupiditate eaque assumenda ad nesciunt', 10, '2020-05-24 16:42:50', '2020-05-24 16:42:50');
INSERT INTO `posts` VALUES (16, 'quaerat velit veniam amet cupiditate aut numquam ut sequi', 'in non odio excepturi sint eum\nlabore voluptates vitae quia qui et\ninventore itaque rerum\nveniam non exercitationem delectus aut', 10, '2020-05-24 16:42:50', '2020-05-24 16:42:50');
INSERT INTO `posts` VALUES (17, 'quas fugiat ut perspiciatis vero provident', 'eum non blanditiis soluta porro quibusdam voluptas\nvel voluptatem qui placeat dolores qui velit aut\nvel inventore aut cumque culpa explicabo aliquid at\nperspiciatis est et voluptatem dignissimos dolor itaque sit nam', 10, '2020-05-24 16:42:50', '2020-05-24 16:42:50');
INSERT INTO `posts` VALUES (18, 'laboriosam dolor voluptates', 'doloremque ex facilis sit sint culpa\nsoluta assumenda eligendi non ut eius\nsequi ducimus vel quasi\nveritatis est dolores', 10, '2020-05-24 16:42:50', '2020-05-24 16:42:50');
INSERT INTO `posts` VALUES (19, 'temporibus sit alias delectus eligendi possimus magni', 'quo deleniti praesentium dicta non quod\naut est molestias\nmolestias et officia quis nihil\nitaque dolorem quia', 10, '2020-05-24 16:42:50', '2020-05-24 16:42:50');
INSERT INTO `posts` VALUES (20, 'at nam consequatur ea labore ea harum', 'cupiditate quo est a modi nesciunt soluta\nipsa voluptas error itaque dicta in\nautem qui minus magnam et distinctio eum\naccusamus ratione error aut', 10, '2020-05-24 16:42:50', '2020-05-24 16:42:50');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Sincere@april.biz', 'Leanne Graham', '2020-05-24 08:03:18', '2020-05-24 08:03:18', 'Bret');
INSERT INTO `users` VALUES (2, 'Shanna@melissa.tv', 'Ervin Howell', '2020-05-24 08:03:18', '2020-05-24 08:03:18', 'Antonette');
INSERT INTO `users` VALUES (3, 'Nathan@yesenia.net', 'Clementine Bauch', '2020-05-24 08:03:18', '2020-05-24 08:03:18', 'Samantha');
INSERT INTO `users` VALUES (4, 'Julianne.OConner@kory.org', 'Patricia Lebsack', '2020-05-24 08:03:18', '2020-05-24 08:03:18', 'Karianne');
INSERT INTO `users` VALUES (5, 'Lucio_Hettinger@annie.ca', 'Chelsey Dietrich', '2020-05-24 08:03:18', '2020-05-24 08:03:18', 'Kamren');
INSERT INTO `users` VALUES (6, 'Karley_Dach@jasper.info', 'Mrs. Dennis Schulist', '2020-05-24 08:03:18', '2020-05-24 08:03:18', 'Leopoldo_Corkery');
INSERT INTO `users` VALUES (7, 'Telly.Hoeger@billy.biz', 'Kurtis Weissnat', '2020-05-24 08:03:18', '2020-05-24 08:03:18', 'Elwyn.Skiles');
INSERT INTO `users` VALUES (8, 'Sherwood@rosamond.me', 'Nicholas Runolfsdottir V', '2020-05-24 08:03:18', '2020-05-24 08:03:18', 'Maxime_Nienow');
INSERT INTO `users` VALUES (9, 'Chaim_McDermott@dana.io', 'Glenna Reichert', '2020-05-24 08:03:18', '2020-05-24 08:03:18', 'Delphine');
INSERT INTO `users` VALUES (10, 'Rey.Padberg@karina.biz', 'Clementina DuBuque', '2020-05-24 08:03:18', '2020-05-24 08:03:18', 'Moriah.Stanton');

SET FOREIGN_KEY_CHECKS = 1;
