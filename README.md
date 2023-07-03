# Implementação do Padrão de Repositório no Laravel 10
Este guia explica como implementar o Padrão de Repositório que é Patter em uma aplicação Laravel. O Padrão de Repositório é usado para desacoplar a lógica de negócios da lógica de acesso a dados, tornando o código mais manutenível e testável. Uso de Banco de Dados MYSQL para subir Migrations e a aplcação já está Dockerizada.

- Estrutura de Diretórios

app/
│── Http/
│   └── Controllers/
│       ├── ExchangeController.php
│       └── TradeController.php
│── Models/
│   ├── Exchange.php
│   └── Trade.php
│── Repository/
│   ├── AbstractRepository.php
│   ├── ExchangeRepository.php
│   └── TradeRepository.php
│── Services/
│   ├── ExchangeService.php
│   └── TradeService.php


### 1. Criar Model
Começamos criando os modelos que representam as entidades na base de dados. No exemplo, temos dois modelos, Trade e Exchange.

Exemplo de Model Trade em app/Models/Trade.php

### 2. Criar Repositórios
Os repositórios são responsáveis pela lógica de acesso aos dados. Você deve criar uma classe de repositório abstrata que possa ser estendida por repositórios específicos de modelos.

### 3. Criar Serviços
As classes de serviço contêm a lógica de negócios da aplicação. Eles utilizam os repositórios para acessar os dados.

Exemplo de classe de serviço TradeService em app/Services/TradeService.php:

Exemplo de Repositório TradeRepository em app/Repository/TradeRepository.php

### 4. Criar Controllers
Os controladores manipulam as requisições HTTP e utilizam os serviços para executar a lógica de negócios.

Exemplo de Controlador TradeController em app/Http/Controllers/TradeController.php

### Conclusão
Com a estrutura acima, você pode desacoplar sua lógica de negócios da lógica de acesso a dados, tornando seu código mais limpo, manutenível e testável. O Padrão de Repositório é altamente benéfico para projetos em grande escala ou projetos que podem crescer em complexidade ao longo do tempo.

### Autor:
Emerson Amorim
            
###I Like of (fórmula da relatividade)
   
$$E=mc^2$$

Inline $$E=mc^2$$ Inline，Inline $$E=mc^2$$ Inline。

$$\(\sqrt{3x-1}+(1+x)^2\)$$
                    
$$\sin(\alpha)^{\theta}=\sum_{i=0}^{n}(x^i + \cos(f))$$
                
