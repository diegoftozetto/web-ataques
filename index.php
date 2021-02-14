<?php
require_once "php/includes/config.php";
?>

<html lang="pt-br">

<head>
  <?php
  require_once "php/includes/head.php";
  ?>
</head>

<body>
  <?php
  require_once "php/includes/navbar.php"
  ?>

  <div class="container">
    <!-- <h5>Nome: Diego França Tozetto</h5>
    <h5>Data: 14/02/2021</h5>
    <h5>Desenvolvimento Web com Frameworks Modernos</h5> -->
    <h4 class="mt-4 mb-4" id="title">Segurança: Ataques a aplicações WEB</h4>
    <p align="justify">Trabalho desenvolvido para a disciplina de segurança, com o intuito de demonstrar os ataques SQL Injection, CSRF 
    e XSS, bem como suas possíveis defesas.</p>
    <div class="mt-4">
      <p class="icone icone-option mt-2"><b>SQL INJECTION</b></p>
      <div class="description" align="justify">
        <b class="backgroud-gray">- O que é SQL Injection?</b>
        <p>SQL Injection é um ataque que que consiste na inserção ou “injeção” de instruções SQL por meio de um entrada qualquer.</p>
        <div class="alert alert-secondary" role="alert">
          Ex: ' OR 1=1 --
        </div>
        <b class="backgroud-gray">- Tipos de SQL Injection:</b>
        <p>Existem diversos tipos de SQL Injection sendo algumas mais complexas que outras. Entre as mais comuns está o Blind SQL Injection 
        e o SQL Injection (Union Attacks).</p>
        <u>Blind SQL Injection:</u>
        <p>É um tipo de ataque de injeção de SQL que faz perguntas verdadeiras ou falsas ao banco de dados e determina a resposta com base 
        na resposta do site.</p>
        <u>SQL Injection (Union Attacks):</u>
        <p>Quando um site é vulnerável à injeção de SQL e os resultados da consulta são retornados nas respostas do site, a palavra-chave 
        UNION pode ser usada para recuperar dados de outras tabelas no banco de dados. Isso resulta em um ataque UNION de injeção de 
        SQL.</p>
        <b class="backgroud-gray">- Quais os impactos do ataque SQL Injection?</b>
        <p>Um vulnerabilidade de injeção SQL pode resultar em acesso não autorizado a dados confidenciais, sua modificação e até mesmo a 
        sua remoção do banco de dados.</p>
        <p>As principais consequências com relação à segurança são: confidencialidade, autenticação, autorização e integridade.</p>
        <b class="backgroud-gray">- Como se prevenir do SQL Injection?</b>
        <p>Determinar se a entrada fornecida pelo usuário é maliciosa ou não, é um a tarefa difícil. Por isso, a maneira mais interessante 
        de fazer isso é escapar de caracteres especiais na entrada do usuário.</p>
      </div>
    </div>
    <div class="mt-4">
      <p class="icone icone-option mt-2"><b>XSS (Cross-Site Scripting)</b></p>
      <div class="description" align="justify">
        <b class="backgroud-gray">- O que é XSS?</b>
        <p>XSS é um ataque que consiste na inserção de código malicioso em um site. O código malicioso pode conter instruções javascript, 
        marcação ou qualquer outro tipo de conteúdo que o browser possa executar. Ataques XSS podem manipular o navegador em uma 
        infinidade de maneiras, porém as mais utilizadas são roubo de cookies ou sessões, fazendo o navegador entregar estes dados a 
        um servidor remotamente.</p>
        <div class="alert alert-secondary" role="alert">
          Ex: &lt;script&gt;window.alert('Teste XSS');&lt;/script&gt;
        </div>
        <b class="backgroud-gray">- Tipos de XSS:</b>
        <p>Existem três tipos de XSS, conforme destacado nos itens abaixo.</p>
        <u>Reflected XSS:</u>
        <p>O código é entregue para aplicação e devolvido como parte integrante do código de resposta, permitindo que seja executado 
        pelo navegador do próprio usuário.</p>
        <u>Dom Based XSS:</u>
        <p>Realiza modificação das propriedades dos objetos diretamente no navegador do usuário alvo, não dependendo de nenhum interação 
        por parte do servidor que hospeda o aplicativo web.</p>
        <u>Stored XSS:</u>
        <p>É aquele em que o script injetado é armazenado permanentemente nos servidores de destino, como em um banco de dados, em um 
        fórum de mensagens, campo de comentários etc, desse modo, se tornar visível para os usuários que acessem ao site.</p>
        <b class="backgroud-gray">- Quais os impactos do ataque XSS?</b>
        <p>Um usuário mal intencionado pode realizar diversos tipos de ataques com base na relação de confiança entre o usuário e a 
        plataforma, que possibilidade a utilização da falha para a distribuição de phishing e facilitação de fraudes.</br></br>
        Ex: Sequestro de sessão de usuários, alteração do código HTML, redirecionar o usuário para sites maliciosos, alteração do 
        objeto DOM.</p>
        <b class="backgroud-gray">- Como se prevenir do XSS?</b>
        <p>É crucial sanitizar todas as entadas e saídas da aplicação, nunca inserir a entrada do usuário diretamente no banco de dados, 
        definir um rigoroso conjunto de padrões permitidos, sempre escapar os dados, implementar filtro de aplicações web 
        (Web Application Firewall) etc.</p>
      </div>
    </div>
    <div class="mt-4">
      <p class="icone icone-option mt-2"><b>CSRF (Cross-site request forgery)</b></p>
      <div class="description" align="justify">
        <b class="backgroud-gray">- O que é CSRF?</b>
        <p>CSRF é um ataque em que os usuários são induzidos a executar ações que não pretendiam realizar.
        Para isso geralmente o atacante se utiliza de engenharia social, enviando links que enganam o usuário,
        que quando clicados levam a vítima a realizar ações de sua escolha. Um ataque CSRF tem como alvo aplicativos da Web 
        que não conseguem diferenciar entre solicitações válidas e solicitações falsificadas controladas pelo invasor.</p>
        <b class="backgroud-gray">- Quais os impactos do ataque CSRF?</b>
        <p>Se o ataque for bem-sucedido diferentes ações podem ocorrer, tais como: 
        solicitações de alteração de senha, transferência de fundos, adquirir um produto, remoção de conta etc.</p>
        <b class="backgroud-gray">- Como se prevenir do CSRF?</b>
        <ul>
          <li>-Incluir tokens nas solicitações relevantes (Criar um campo oculto com um token único, gerado por um por usuário);</li>
          <li>-Adicionar atributo SameSite;</li>
          <li>-Outros: reautenticação e captcha;</li>
        </ul>

        <u>-SameSite:</u>
        <p>Os navegadores modernos já implementam o chamado SameSite, que resolve completamente o problema do CSRF. Com 
        SameSite, é possível especificar em qual circustância o navegador deve enviar o cookie em uma requisição. Ao definir o 
        atributo em cookies de sessão, a aplicação pode impedir o comportamento padrão do navegador de adicionar cookies 
        automaticamente a solicitações, independentemente de onde eles se originam.</p>

        <div class="alert alert-secondary" role="alert">
          Ex: set-cookie: cookie=value; path=/; secure; httponly; samesite=lax
        </div>        

        <ul>
          <li>Strict: Quando o atributo SameSite é definido como Strict, o cookie não será enviado junto com solicitações iniciadas por
          sites de terceiros.</li>
          <li>Lax: O cookie será enviado junto com a solicitação GET iniciada por um site de terceiros.</li>
          <li>None: Os cookies são enviados em todas as solicitações.</li>
        </ul>
      </div>
    </div>
    <div class="mt-4">
      <span class="icone icone-option mt-2"><b>Referências</b></span>
      <p class="description" align="justify">
        <u>- SQL Injection:</u></br>
        OWASP (org.). <b>SQL Injection</b>. Disponível em: <a href="https://owasp.org/www-community/attacks/SQL_Injection" 
        target="_blank">https://owasp.org/www-community/attacks/SQL_Injection</a>. Acesso em: 07 jan. 2021.</br>
        PortSwigger (org.). <b>SQL Injection</b>. Disponível em: <a href="https://portswigger.net/web-security/sql-injection" 
        target="_blank">https://portswigger.net/web-security/sql-injection</a>. Acesso em: 07 jan. 2021.</br>
        <u>- XSS:</u></br>
        Blockbit (org.). <b>O que é Cross-site Scripting (XSS)?</b>. Disponível em: <a href="https://www.blockbit.com/pt/blog/o-que-e-o-cross-site-scripting-xss/" 
        target="_blank">https://www.blockbit.com/pt/blog/o-que-e-o-cross-site-scripting-xss/</a>. Acesso em: 10 jan. 2021.</br>
        OWASP (org.). <b>Cross Site Scripting (XSS)</b>. Disponível em: <a href="https://owasp.org/www-community/attacks/xss/" 
        target="_blank">https://owasp.org/www-community/attacks/xss/</a>. Acesso em: 10 jan. 2021.</br>
        PortSwigger (org.). <b>Cross-site scripting</b>. Disponível em: <a href="https://portswigger.net/web-security/cross-site-scripting" 
        target="_blank">https://portswigger.net/web-security/cross-site-scripting</a>. Acesso em: 10 jan. 2021.</br>
        <u>- CSRF:</u></br>
        Imperva (org.). <b>Cross site request forgery (CSRF) attack</b>. Disponível em: <a href="https://www.imperva.com/learn/application-security/csrf-cross-site-request-forgery/" 
        target="_blank">https://www.imperva.com/learn/application-security/csrf-cross-site-request-forgery/</a>. Acesso em: 15 jan. 2021.</br>
        OWASP (org.). <b>Cross Site Request Forgery (CSRF)</b>. Disponível em: <a href="https://owasp.org/www-community/attacks/csrf" 
        target="_blank">https://owasp.org/www-community/attacks/csrf</a>. Acesso em: 15 jan. 2021.</br>
        PortSwigger (org.). <b>Cross-site request forgery (CSRF)</b>. Disponível em: <a href="https://portswigger.net/web-security/csrf" 
        target="_blank">https://portswigger.net/web-security/csrf</a>. Acesso em: 15 jan. 2021.</br>
      </p>
    </div>
  </div>

  <?php
  require_once "php/includes/head-script.php"
  ?>
</body>

</html>