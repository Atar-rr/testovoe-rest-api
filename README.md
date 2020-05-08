# testovoe-rest-api

<b>GET запросы:</b>

http://example.com/api/users/show - список всех пользователей

http://example.com/api/users/{id} - данные пользователя по id

<b>POST запросы:</b>

http://example.com/api/users/new - добавить нового пользователя, для этого в теле запроса необходимо передать json вида {"name":"<Имя>"}. Уникальный id пользователя будет сформирован сервером.

<b>DELETE запросы:</b>

http://example.com/api/users/{id} - удаление пользователя по id

<b>PATCH запросы:</b>

http://example.com/api/users/{id} - изменение пользователя по id
