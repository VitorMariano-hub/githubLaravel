# Buscar usuario Github

Definido as rotas para index e pesquisa ambas redirecionado para o Controller 'GitController'.  

No GitController foram definidos os métodos (__construct, index e show)  

* __construct: está recebendo a classe GitHubApiService via injeção de dependencia para ser utilizado no momento em que o controller é chamado.  
* index: está chamando o método getUserData dentro da classe GitHubApiService através da referencia $this-> passando o nome de usuario (VitorMariano-hub) como parametro, dessa forma eu tenho um usuario padrão ao iniciar a aplicacao.  
* show:  está chamando o método getUserData dentro da classe GitHubApiService através da referencia $this-> e passando o parametro da requisição que vem do form para pesquisa.  

Ambos os métodos retornam o valor da consulta para a view home.  

A classe responsavel por realizar a consulta na api via curl está em Services/GitHubApiService essa classe está separada do Controller e possui o método para buscar usuarios 'getUserData'  

* getUserData: está envolvido em um try-catch para manipulação de exceções, chamando a api do github através de curl e retornando a resposta via json.  

![bears](https://i.postimg.cc/g0mcm8MY/Capturar.png)  

![bears](https://i.postimg.cc/ZRjxV8Q0/Captur.png)



