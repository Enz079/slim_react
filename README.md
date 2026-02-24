## Su Linux
`MY_UID=$(id -u) MY_GID=$(id -g) docker-compose up`

## Su Windows
`docker-compose up`

## Es
Implementare delle API REST sulla tabella alunni

GET            /alunni           AlunniController:index
GET            /alunni/{id}    AlunniController:show
POST         /alunni           AlunniController:create
PUT            /alunni/{id}    AlunniController:update
DELETE     /alunni/{id}    AlunniController:destroy

Utilizzare curl per testare le rotte:

curl http://localhost:8080/alunni
curl http://localhost:8080/alunni/2
curl -X POST http://localhost:8080/alunni -d '{"nome": "Claudio", "cognome": "Benve"}' -H "Content-Type: application/json"
curl -X PUT http://localhost:8080/alunni/2 -d '{"nome": "Claudio", "cognome": "Benvenuti"}' -H "Content-Type: application/json"
curl -X DELETE http://localhost:8080/alunni/2
