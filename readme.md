# SAMP - Sistema de Amparo ao Programador

### Dependências
Copie o arquivo **.env.example** para **.env**. Se você alterou algo no arquivo **docker-compose.yml**, atente para que as configurações  DB e APP_URL do **.env** estão de acordo com as configurações geradas para os containers do docker.
Para executar o sistema em ambiente local é preciso ter o [docker](https://docs.docker.com/install/), [docker compose](https://docs.docker.com/compose/install/) e o [tusk](https://github.com/rliebz/tusk) instalados em sua máquina, para instalar o tusk execute:

    $ sudo su 
    # curl -sL https://git.io/tusk | bash -s -- -b /usr/local/bin latest
    # exit

 com isso, dentro da pasta principal do projeto, execute o seguinte comando:

    $ tusk setup

Esse comando, vai:

 - Fazer o pull das imagens docker;
 - Criar os containers docker;
 - Criar os volumes usados pelo docker;
 - Executar as instruções contidas em package.json;
 - Rodar o composer;
 - Rodar as migrations;
 - Rodar as seeders;

Se tudo ocorrer bem você pode acessar acessar seu sistema em [http://localhost:8080](http://localhost:8080) e o banco de dados em [http://localhost:8081](http://localhost:8081)

Para mais informações sobre tusk rode:

    $ tusk -h
