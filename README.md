🚀 Sistema de Gerenciamento de Provedores de Internet
<div align="center"> <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel" width="100"> <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Vue.js_Logo_2.svg" alt="Vue.js" width="85"> <img src="https://sweetalert2.github.io/images/SweetAlert2.png" alt="SweetAlert2" width="120"> </div>
🌟 Visão Geral

Sistema completo para gerenciamento de provedores de internet com autenticação por times, dashboard administrativo e geração de contratos profissionais.

Laravel Version
PHP Version
License
✨ Recursos Principais
Funcionalidade	Descrição
👥 Autenticação por Times	Sistema de permissões com Owner/Membro/Convidado
📊 Dashboard Administrativo	Estatísticas de usuários e planos ativos
📝 Geração de Contratos	Exportação para .docx com PHPWord
📱 API Integradas	ViaCEP e ReceitaWS para autopreenchimento
🧩 Formulários Dinâmicos	Validação em tempo real com AJAX
📋 Tabelas Inteligentes	DataTables com exportação CSV/PDF
🛠️ Tecnologias e Bibliotecas
📚 Bibliotecas Frontend
bash

npm install sweetalert2 inputmask

Biblioteca	Função	Documentação
SweetAlert2	Notificações e alertas interativos	Docs
Inputmask	Máscaras para campos de formulário	Docs
DataTables	Tabelas interativas com filtros	Docs
📦 Bibliotecas Backend
bash

composer require phpoffice/phpword

Biblioteca	Função	Documentação
PHPWord	Geração de documentos .docx	Docs
Laravel Jetstream	Autenticação com Teams	Docs
🔌 APIs Integradas
API	Função	Documentação
ViaCEP	Busca de endereços por CEP	Docs
ReceitaWS	Validação de CNPJ e dados de empresas	Docs
📦 Pré-requisitos

    PHP 8.1+

    Composer 2.5+

    Node.js 18+

    Banco de dados (MySQL/PostgreSQL/SQLite)

🚀 Instalação Passo a Passo
bash

# Clone o repositório
git clone https://github.com/seu-usuario/projeto-smart.git
cd projeto-smart

# Instale as dependências do PHP
composer install

# Instale as dependências do JavaScript
npm install

# Instale bibliotecas adicionais
npm install sweetalert2 inputmask
composer require phpoffice/phpword

# Configure o ambiente
cp .env.example .env
php artisan key:generate

# Configure o banco de dados no arquivo .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smart_db
DB_USERNAME=root
DB_PASSWORD=

# Execute as migrações com dados de exemplo
php artisan migrate --seed

# Compile os assets
npm run dev

# Inicie o servidor
php artisan serve

Acesse o sistema em: http://localhost:8000
👤 Credenciais de Teste

Administrador:

    Email: admin@smart.com

    Senha: password

Provedor:

    Email: provider@smart.com

    Senha: password

🖥️ Uso das Bibliotecas
SweetAlert2 (Notificações)
javascript

// Exemplo de uso
Swal.fire({
  title: 'Sucesso!',
  text: 'Operação realizada com sucesso',
  icon: 'success',
  confirmButtonText: 'OK'
});

Inputmask (Máscaras)
javascript

// Exemplo para CNPJ
Inputmask('99.999.999/9999-99').mask('#cnpj');

// Exemplo para CEP
Inputmask('99999-999').mask('#cep');

PHPWord (Contratos)
php

use PhpOffice\PhpWord\PhpWord;

public function generateContract(User $user)
{
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();
    
    $section->addText("CONTRATO DE PRESTAÇÃO DE SERVIÇOS", ['bold' => true]);
    $section->addText("Contratante: {$user->company_name}");
    $section->addText("CNPJ: {$user->cnpj}");
    
    // ... conteúdo do contrato
    
    $filename = "contrato-{$user->id}.docx";
    $phpWord->save($filename, 'Word2007', true);
    
    return response()->download($filename);
}

📂 Estrutura de Diretórios

app/
├── Http/Controllers/     # Controladores
├── Models/               # Modelos Eloquent
├── Providers/            # Service Providers
database/
├── factories/            # Factories
├── migrations/           # Migrations
├── seeders/              # Seeders
resources/
├── js/                   # JavaScript/Vue components
├── views/                # Blade templates
routes/
├── web.php               # Rotas principais

🔌 Integração com APIs Externas
ViaCEP
javascript

// resources/js/components/AddressForm.vue
fetch(`https://viacep.com.br/ws/${cep}/json/`)
  .then(response => response.json())
  .then(data => {
    this.form.street = data.logradouro;
    this.form.neighborhood = data.bairro;
    this.form.city = data.localidade;
    this.form.state = data.uf;
  });

ReceitaWS
php

// app/Http/Controllers/ProviderController.php
public function validateCnpj($cnpj)
{
    $response = Http::get("https://www.receitaws.com.br/v1/cnpj/{$cnpj}");
    
    if ($response->successful() && $response['status'] === 'OK') {
        return response()->json([
            'company_name' => $response['nome'],
            'trade_name' => $response['fantasia']
        ]);
    }
    
    return response()->json(['error' => 'CNPJ inválido'], 400);
}

🤝 Contribuição

    Faça um fork do projeto

    Crie uma branch (git checkout -b feature/nova-funcionalidade)

    Commit suas alterações (git commit -m 'Adiciona nova funcionalidade')

    Push para a branch (git push origin feature/nova-funcionalidade)

    Abra um Pull Request

📜 Licença

Este projeto está licenciado sob a Licença MIT.
📬 Contato

Para suporte ou dúvidas, entre em contato:

    Email: contato@smarttelecom.com.br

    GitHub: @seu-usuario

<div align="center"> <p>Desenvolvido com ❤️ usando Laravel e Vue.js</p> <img src="https://laravel.com/img/logotype.min.svg" alt="Laravel" width="200"> </div>
New chat
