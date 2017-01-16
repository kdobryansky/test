/**
*  структура таблицы автор
 */
DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=Myisam DEFAULT CHARSET=utf8;

/* данные авторов */
INSERT INTO author (id, name) VALUES (1, 'Иванов'), (2, 'Петров'), (3, 'Сидоров'), (4, 'Трамп'), (5, 'Путин'), (6, 'Обама');



/**
* структура таблицы книга
*/
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=Myisam DEFAULT CHARSET=utf8;

/* данные книг */
INSERT INTO book (id, title) VALUES (1, 'Капитал'), (2, 'Идиот'), (3, 'Горе от ума'), (4, 'Сталкер'), (5, 'На западном фронте без перемен'), (6, 'Война и Мир');


/**
* структура таблицы связей многое ко многому
*/
DROP TABLE IF EXISTS `author_book_relation`;
CREATE TABLE `author_book_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY (`author_id`),
  KEY (`book_id`)
) ENGINE=Myisam DEFAULT CHARSET=utf8;

/* данные таблицы связей */
INSERT INTO author_book_relation (`author_id`, `book_id`) VALUES (1, 1), (1, 2); /* У Иванова 2 книги: капитал и идиот */
INSERT INTO author_book_relation (`author_id`, `book_id`) VALUES (4, 1), (4, 4), (4, 6); /* У Трампа Капитал, Сталкер и Война и Мир */
INSERT INTO author_book_relation (`author_id`, `book_id`) VALUES (5, 1); /* У Путина Капитал */
INSERT INTO author_book_relation (`author_id`, `book_id`) VALUES (6, 1); /* У Обамы Капитал */

/* итого книгу 1 (Капитал) писали 4 автора */


/**
* выборка, получающая все книги, у которых >= 3х авторов
*/
SELECT book_id, COUNT(*) as author_number FROM author_book_relation GROUP BY book_id HAVING COUNT(*) >= 3;