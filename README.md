---

# Job Platform

Uma plataforma de empregos para conectar alunos e empresas, desenvolvida com Laravel.

## Visão Geral

Esta aplicação permite que:

- Alunos se candidatem a vagas e conversem com empresas.
- Empresas criem e gerenciem ofertas de emprego.
- Administradores monitorem atividades e estatísticas.

## Funcionalidades

- Registro e login com papéis (aluno, empresa, admin).
- CRUD de ofertas de emprego.
- Sistema de candidaturas com avaliação e chat.
- Suporte multilíngue (PT/EN).
- Notificações em tempo real.
- Dashboard administrativo.

## Tecnologias

- **Backend**: Laravel 10, PHP 8.1
- **Frontend**: Blade, Tailwind CSS
- **Banco de Dados**: MySQL, Redis
- **CI/CD**: GitHub Actions

---

## Instalação Local

Siga os passos abaixo para configurar o ambiente local:

### 1. Clone o Repositório
```bash
git clone https://github.com/smpsandro1239/empregabilidade-amar-terra-verde.git
cd empregabilidade-amar-terra-verde
```

### 2. Instale as Dependências
```bash
composer install
npm install
npm run dev
```

### 3. Configure o Arquivo `.env`
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Execute as Migrações do Banco de Dados
```bash
php artisan migrate
```

### 5. Inicie o Servidor Local
```bash
php artisan serve
```

---

## Testes

1. Configure o arquivo `.env.testing` para usar SQLite em memória.
2. Execute os testes:
   ```bash
   php artisan test
   ```

---

## Deploy

Para instruções completas sobre deploy, consulte [`docs/deploy.md`](docs/deploy.md).

### Resumo do Processo:
1. Clone o repositório no servidor (ex.: `/var/www/yourapp`).
2. Instale as dependências e configure o arquivo `.env`.
3. Configure o Nginx e SSL com Certbot.
4. Use GitHub Actions para automação do CI/CD.

---

## Documentação

A documentação completa está disponível na pasta `docs/`. Consulte-a para detalhes sobre instalação, uso e desenvolvimento.

---

## Contribuição

Contribuições são bem-vindas! Para contribuir:

1. Faça um fork do repositório.
2. Crie uma branch para sua feature ou correção:
   ```bash
   git checkout -b minha-feature
   ```
3. Envie um Pull Request (PR) com suas alterações.

Certifique-se de seguir as convenções do Laravel e adicionar testes para suas alterações.

---

## Licença

Este projeto está licenciado sob a licença MIT. Consulte o arquivo [LICENSE](LICENSE) para mais detalhes.

---

Espero que isso atenda às suas necessidades! Se precisar de ajustes ou melhorias, é só avisar! 😊
