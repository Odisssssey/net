<h1>Типовой сервис вопросов и ответов.</h1>

<h2>Функционал</h2>
<h3>Описание пользовательской части<h3>
- Пользователи могут просматривать категории, вопросы и ответы.
- Любой пользователь может задать вопрос, указав своё имя, адрес электронной почты, выбрав категорию и написав текст вопроса.
- Вопросы без ответов не публикуются на сайте.

<h3>Возможности администратора<h3>
- Просматривать список администраторов.
- Создавать новых администраторов.
- Изменять пароли существующих администраторов.
- Удалять существующих администраторов.
- Просматривать список тем. По каждой теме в списке видно сколько всего вопросов в ней, сколько опубликовано, сколько без ответов.
- Создавать новые темы.
- Удалять существующие темы и все вопросы в них.
- Просматривать вопросы в каждой теме. По каждому вопросу видно дату создания, статус (ожидает ответа / опубликован / скрыт).
- Удалять любой вопрос из темы.
- Скрывать опубликованные вопросы.
- Публиковать скрытые вопросы.
- Редактировать автора, текст вопроса и текст ответа.
- Перемещать вопрос из одной темы в другую.
- Добавлять ответ на вопрос с публикацией на сайте, либо со скрытием вопроса.
- Видеть список всех вопросов без ответа во всех темах в порядке их добавления. И иметь возможность их редактировать и удалять.

<h3>Дополнительные возможности<h3>
- Действия администраторов журналируются в файл User_can.txt, расположенный в корне.
- Блокировка вопросов по ключевым словам.
- Возможность подключения Телеграм-бота, с оповещением о принятии вопроса и ответе на вопрос.

<h2>Инструкции</h2>
Для создания данного сервиса на своем сервере нужно перенести все <i>файлы</i>(и файлы в папках) на свой <i>сервер</i>.
Далее вам потребуется создать базу данных. Ее можно создать при помощи sql запроса написанного в файле <i>faq.sql</i>.

Если у вас нет программы <i>composer<i>, то ее нужно <a href="https://getcomposer.org/">скачать с сайта</a>.
После нужно внести изменения в локальный файл <i>composer.json</i>.
Вставив строчки:
<pre>
{
    "require": {
        "twig/twig": "^1.24",
        "laravel/installer": "^1.3",
    }
}
</pre>
И запустить следующую команду: <i>composer update</i>.

Когда будет скачены все требуемые файлы, нужно перенести папук <i>vendor</i>в корень сайта.

Затем нужно изменить файл <i>config.class.php</i>.
Заполнив поля:

<code>
  $host = "Ваш хостинг";
  $name = "лгоин";
  $pass = "пароль";
</code>

Сервис готов к использованию!

<h2>Первые шаги</h2>
Для использования сервиса требуется создать пользователя-администратора.
Это можно сделать при помощи sql-запроса:
<code>INSERT INTO user (login, password, isAdmin) VALUES(admin, admin, 1)</code>

<h2>Настройкаа бота</h2>
В файле bot.php нужно вписать токен своего бота
<code>$botToken = "токен вашего бота";</code>
Токен имеет следующий вид:
<code>287541774:AAHJFWm6Ed-cYXo96E884wEY7Zdy_dv62ek</code>

Хороших вопросов и корректных ответов!)
