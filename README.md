# Job Platform

Uma plataforma de empregos para conectar alunos e empresas, desenvolvida com Laravel.

## Visão Geral

Esta aplicação permite que:

-   Alunos se candidatem a vagas e conversem com empresas.
-   Empresas criem e gerenciem ofertas de emprego.
-   Administradores monitorem atividades e estatísticas.

## Funcionalidades

-   Registro e login com papéis (aluno, empresa, admin).
-   CRUD de ofertas de emprego.
-   Sistema de candidaturas com avaliação e chat.
-   Suporte multilíngue (PT/EN).
-   Notificações em tempo real.
-   Dashboard administrativo.

## Tecnologias

-   Laravel 10, PHP 8.1
-   Blade, Tailwind CSS
-   MySQL, Redis
-   GitHub Actions para CI/CD

## Instalação Local

1. Clone o repositório:
   `bash
    git clone https://github.com/smpsandro1239
empregabilidade-amar-terra-verde.git
    cd empregabilidade-amar-terra-verde
    `
   Instale dependências:
   bash

Collapse

Wrap

Copy
composer install
npm install
npm run dev
Configure .env:
bash

Collapse

Wrap

Copy
cp .env.example .env
php artisan key:generate
Execute migrações:
bash

Collapse

Wrap

Copy
php artisan migrate
Inicie o servidor:
bash

Collapse

Wrap

Copy
php artisan serve
Testes
Configure .env.testing com SQLite em memória.
Rode:
bash

Collapse

Wrap

Copy
php artisan test
Deploy
Veja instruções completas em docs/deploy.md.
Resumo:
Clone no servidor: /var/www/yourapp.
Instale dependências e configure .env.
Configure Nginx e SSL com Certbot.
Use GitHub Actions para CI/CD.
Documentação
Consulte docs/ para detalhes sobre instalação, uso e desenvolvimento.
Contribuição
Fork o repositório, crie uma branch, e envie um PR.
Siga as convenções do Laravel e adicione testes.
Licença
MIT

text

Collapse

Wrap

Copy

---

#### 9.3 Commit da Documentação

```bash
git add docs/ README.md
git commit -m "Fase 9: Adição de documentação detalhada e atualização do README"
git push origin main
```
