# rodiosheek-blog
Ссылка на блог http://rodiosheek-blog.comli.com/

Дизайн блога разработан с применением HTML, CSS и JS фреймворка Bootstrap (http://getbootstrap.com).

Блог построен на реализации простейшей MVC. Отдельно разделены данные, отображения и методы.

При обращении к файлу index.php регистрируется контроллер управления всем функционалом сайта (MainController). 

К конструкторе класса MainController  организован автозагрузчик используемых классов( DB_Connenction, LoginLogout, Records, Comments etc.)
для упрощения подключения этих классов. 

-- DB_Connection отвечает за соединение с базой данных, 
использует данные соединения хранящееся в отдельном файле для удобства изменения при переносе на хостинг

-- LoginLogout – авторизация или выходи пользователя, для хранения пароля используется алгоритм хеширования MD5.

-- Records – добавление, удаление и вывод в браузер записей блога

-- Comments – добавление и удаление комментариев

-- MainController обработка возможных действий на сайте. Методом switch-case осуществляется перебор соответствующих действий (action).

Для авторизации на сайте применяются сессии.