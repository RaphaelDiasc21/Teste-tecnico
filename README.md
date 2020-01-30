# Teste-tecnico
Rest API para gerenciamento de planos e clientes

# Teste-tecnico
Api Rest com Laravel e Vuejs

API - Desenvolvida utilizando Laravel com banco de dados sqlite
 - Funcionalidades (Features)
    - CRUD completo de clientes junto com as devidas validações, respeitando as regras de negócio como,
    não excluir clientes de São Paulo com Plano free, validar inputs obrigatórios para inserção de clientes no banco de dados,
    verificar disponibilidade de plano (Se existe ou não o plano no momento do cadastro do cliente)
    - Leitura no banco de dados sobre os planos existentes.
    - Exclusão de planos por cliente
    - Adicionar planos ao cliente
    
  - Arquitetura
    - Além das duas tabelas obrigatórias, criei mais uma que serve de elo (pivot) para o relacionamento N:N entre os clientes e planos
    (1 cliente pode ter 1 ou mais planos, sendo que por consequencia, planos podem ter N clientes)
    - A api foi desenvolvida orientado ao padrão de projeto MVC, com apenas umas modificações levando em conta a inexistência das 'Views'
    sendo uma API.
          - Controllers: Localizados na pasta "Controllers" dentro de App;
          - Models - Localizados na pasta App,
          - Services - Localizados na pasta "Services" dentro de App;
  
    - Tomei a liberdade para alterar a estrutura padrão de pastas do Laravel, sendo colocadas todas as pastas que levam a lógica de negócio, bem como os controllers, rotas e services dentro da pasta 'App'. Levando como objetivo concentrar e separar a lógica do projeto dos demais arquivos e pastas que compoem o funcionamento do framework
    
    - Os cadastros iniciais pedidos no teste, já estão inseridos no banco de dados, através dos Seeders do Laravel.
    
 Frontend - Desenvolvido utilizando Vuejs e Bootstrap
   - Funcionalidades (Features)
       - CRD dos clientes, comunicando diretamente com a AP
       - Devido ao tempo, não consegui implementar no front end a funcionalidade de atualizar os dados dos clientes, porém, a API responde a tal funcionalidade perfeitamente.
       - Exlclusão de planos de assinatura para cada cliente
       
   - Arquitetura - Single page application (SPA)
      - Tomei a decisão de desenvolver o front end em formato SPA, devido as facilidades que o Vuejs já traz por padrão nesse formato.

  - O projeto buildado se encontra na pasta 'dist'
  - Deixei junto na pasta frontend, todo o código que desenvolvi para o frontend
