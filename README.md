# Buscar usuario Github

Definido as rotas para index e pesquisa ambas redirecionado para o Controller 'GitController'.  

No GitController foram definidos os métodos (__construct, index e show)  

* __construct: está recebendo a classe GitHubApiService via injeção de dependencia para ser utilizado no momento em que o controller é chamado.  
* index: está chamando o método getUserData dentro da classe GitHubApiService através da referencia $this-> passando o nome de usuario (VitorMariano-hub) como parametro, dessa forma eu tenho um usuario padrão ao iniciar a aplicacao.  
* show:  está chamando o método getUserData dentro da classe GitHubApiService através da referencia $this-> e passando o parametro da requisição que vem do form para pesquisa.  

Ambos os métodos fazem validação verificando se a api retorna algum erro, caso sim retornam o valor da consulta para a view home.  

A classe responsavel por realizar a consulta na api está em Services/GitHubApiService essa classe está separada do Controller e possui o método para buscar usuarios 'getUserData'  

* getUserData: está envolvido em um try-catch para manipulação de exceções e verificando se existe resposta api e retornando a resposta via json.  

A View home está chamando a cdn do bootstrap, nela contém verificação se a variavel 'error' está presente, caso sim mostra a mensagem, e também verifica se a variavel 'user' está presente, caso sim mostra o usuario.

![bears](https://i.postimg.cc/g0mcm8MY/Capturar.png)  

![bears](https://i.postimg.cc/ZRjxV8Q0/Captur.png)  

![bears](https://i.postimg.cc/1XFYR9rD/Ca.png)  



