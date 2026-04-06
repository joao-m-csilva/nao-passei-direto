### Sistema de Gestão de Alunos (CRUD)
Este projeto foi desenvolvido para o Hackathon da comunidade Kiza Dev, com o objetivo de entregar uma aplicação funcional para o gerenciamento de estudantes, integrando um sistema de autenticação e uma interface moderna.

## Sobre o Projeto
A aplicação foca em um ciclo completo de CRUD (Create, Read, Update, Delete) para o cadastro de alunos, protegida por um sistema de login para garantir a integridade dos dados.

## Depoimentos dos participantes:

**[Isa]**
>A princípio, para mim, como uma iniciante, nunca nem pensei em estar mexendo agora com Banco de Dados, já que sinto lacunas na minha lógica e aquela famosa sensação de "não estar apta ainda" me fizeram ficar meio receosa de escolher esse projeto para fazer. Ademais, ao longo da jornada, consegui compreender o básico e captar as ideias principais para se construir um projeto full-stack, o que aprendi com isso? Notei que tenho muito a aprender ainda kkkkk

>Mas, com a companhia dos membros tornou essa jornada bem mais proveitosa, apesar de todos ajudarem da sua maneira (quem dropou, não tem problema... faz parte kk) trago uma ressalva especial ao @João Marcos e @davi., que sempre estiveram ativos aqui e me ensinaram MUITA coisa^^ Vocês acabaram se tornando um networking profissional que quero levar para a vida! Realmente, tenho muito a aprender com vocês.

>Trazendo aqui no final alguns ensinamentos principais:
>-IA ajuda SOMENTE se tu souber o que está fazendo, caso contrário, vai ser um tiro no pé enquanto está no meio do escuro;
>-A participação de todos foi esperada, mas, aprendi a me adaptar caso os planejamentos mudem de rumo;
>-Aprendi a ser mais humilde ainda, compreender que "não sei quase nada" e que tenho um caminho árduo pela frente e muito a aprender com nossos Seniors;
>-A comunicação é importante, mas a empatia é uma competência que deve ser mais trabalhada por nós como seres humanos;
>-Tudo bem não ser produtiva 100% das vezes, tudo bem não saber, tudo bem pedir ajuda... a vida como um todo é uma troca de pilares entre Ser Experiente VS Ser Leigo.

**[Davi]**
>Nesse projeto aprendi a utilizar o JavaScript para formulário, foi muito difícil, pois ainda estou no básico em JavaScript, mas com ajuda do Chat GPT e Youtube consegui ter a resolução do sistema de e-mail do Login. Na questão de HTML e CSS foi ótima, pois já utilizo a bastante tempo, mas ainda tenho que melhorar. Não aproveitei esse protejo para aprender Banco de Dados, pois tive que recorrer a utilizar o meu tempo em tarefas da escola. Agradeço aos todos que participaram, em especifico, a @Isa_Dev e o @João Marcos, pois estiveram me ajudando e ativos nessa jornada.

**[João]**
>O projeto foi concluído com todas as páginas funcionais e o CRUD operando conforme o esperado. Durante o percurso, enfrentamos a saída de alguns membros e a rotatividade de contribuições, mas fiz questão de integrar o que foi entregue por cada um ao resultado final.

>Houve um impasse inicial sobre a tecnologia a ser utilizada (Node.js vs. PHP). Mantive a sugestão do PHP por ser uma linguagem mais acessível para quem está começando na área, o que permitiu que o grupo avançasse com menos barreiras técnicas. Além disso, migramos o banco de dados para MySQL, pois sua configuração e sintaxe se mostraram muito mais amigáveis do que o SQLite para o nível de aprendizado em que estávamos. O projeto final é uma colagem dessas ideias e esforços, o que justifica o uso do "meme do cavalo" como logo: uma representação real e honesta de como um trabalho em grupo se molda na prática.

>Após a estrutura estar pronta, trabalhei individualmente na correção de bugs e na segurança. Implementei proteções contra SQL Injection, um tema que não aprofundamos em grupo para não confundir quem ainda estava assimilando o básico do PHP, mas que é essencial para um sistema funcional. Também garanti que o sistema de Logout destruísse a sessão por completo, impedindo que se volte às páginas restritas pelo histórico do navegador.

>Aprendizados extraídos desse projeto:

>Planejamento e Layout: A importância de desenhar no Figma e ter o objetivo visual claro antes de começar a codar.

>Empatia e Colaboração: Entender que trabalhar em grupo exige respeitar o tempo de aprendizado do outro. Não adianta tentar impor soluções avançadas se a base ainda não está consolidada; é preciso ajudar de acordo com o nível de cada um.

>O papel da IA e da pesquisa: A experiência mostrou que a IA pode atrapalhar se você não dominar o fundamento. Muitas vezes ela sugeria soluções de CSS extremamente complexas que ignoramos. A melhor escolha foi parar, assistir a um vídeo de poucos minutos sobre posicionamento de elementos e resolver o problema na mão. Entender a lógica foi mais produtivo do que tentar "investigar" as sugestões complexas sugeridas pelas LLMS.

>O resultado final pode não ter atingido a perfeição estética que imaginamos no início, mas é um trabalho honesto. Foi construído quebrando o código centenas de vezes até dar certo. O sistema está entregue: o CRUD funciona, existe um script de seed para testes de volume e a segurança de acesso está validada.

## Tecnologias Utilizadas
Back-end: PHP 8.x
Banco de Dados: MySQL
Front-end: HTML5, CSS3 (Flexbox e Grid)

## Instalação e Configuração do Ambiente

### WINDOWS

Abra o terminal e instale o Scoop:
`Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser`
`Invoke-RestMethod -Uri https://get.scoop.sh | Invoke-Expression`

Instale o PHP:
`scoop install php`

### MACOS
Recomenda-se o uso do Homebrew para gerenciar as versões e extensões:
`/bin/bash -c "$(curl -fsSL https://www.google.com/search?q=https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"`

Depois de instalar o brew: 
`brew install php`

### LINUX (Ubuntu/Debian)
Instale o PHP e as extensões necessárias para conexão com o banco de dados:
`sudo apt update`
`sudo apt install php php-mysql php-pdo`

Configuração do Banco de Dados
Certifique-se de ter o MySQL instalado (versão Community recomendada).

Configure uma nova conexão chamada localhost.

Crie uma nova database.

Altere as variáveis no arquivo src/includes/acess_db.php:

$db_user = seu usuário do mysql

$db_pass = sua senha do mysql

dbname = nome da database criada

Importe o arquivo .sql localizado na pasta src/database para gerar as tabelas e o usuário administrador inicial.

Ajuste de Buffer (Importante para o Seed)
Para que a barra de progresso da geração de dados funcione corretamente no navegador, localize seu arquivo php.ini e altere a seguinte diretiva:
output_buffering = Off

### Iniciando o servidor
Navegue até a pasta raiz do projeto via terminal e execute:
`php -S localhost:8000`

Para acessar a aplicação, utilize as credenciais padrão:
Email: admin2@hackathon.com
Senha: 123456