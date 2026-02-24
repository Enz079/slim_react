## Su Linux
`MY_UID=$(id -u) MY_GID=$(id -g) docker-compose up`

## Su Windows
`docker-compose up`

## Es
Implementare delle API REST sulla tabella alunni <br>

GET            /alunni           AlunniController:index <br>
GET            /alunni/{id}    AlunniController:show <br>
POST         /alunni           AlunniController:create <br>
PUT            /alunni/{id}    AlunniController:update <br>
DELETE     /alunni/{id}    AlunniController:destroy <br>

Utilizzare curl per testare le rotte: <br>

curl http://localhost:8080/alunni <br>
curl http://localhost:8080/alunni/2 <br>
curl -X POST http://localhost:8080/alunni -d '{"nome": "Claudio", "cognome": "Benve"}' -H "Content-Type: application/json" <br>
curl -X PUT http://localhost:8080/alunni/2 -d '{"nome": "Claudio", "cognome": "Benvenuti"}' -H "Content-Type: application/json" <br>
curl -X DELETE http://localhost:8080/alunni/2 <br>
