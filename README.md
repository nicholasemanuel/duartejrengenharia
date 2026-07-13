# Duarte JR Engenharia e Construções 🏗️

Landing Page institucional de alta conversão para o escritório **Duarte JR Engenharia e Construções**, sediado em São Francisco do Conde - BA. O site funciona como um cartão de visitas digital de alto padrão, focado em captação de leads, contendo design moderno, animações fluidas e otimizações locais de SEO.

---

## 🛠️ Tecnologias Utilizadas

- **Framework Principal:** [Astro Civil (Static Site Generation)](https://astro.build)
- **Estilização:** Vanilla CSS (Design Editorial / Orgânico)
- **Linguagens:** TypeScript (Lógica client-side) e PHP (Script de e-mail de backend)
- **SEO & Metadados:** JSON-LD Schema (LocalBusiness estruturado), Sitemaps integrados e tags OpenGraph
- **Hospedagem de Destino:** [Hostinger](https://www.hostinger.com.br/)

---

## ✨ Funcionalidades e Diferenciais

### 1. 🛡️ Tripla Proteção Anti-Spam Invisível (Sem Captchas)
Para manter o design limpo e evitar fricção no preenchimento de formulários de orçamento, o site utiliza um sistema anti-spam inteligente e silencioso:
- **Honeypot:** Campo oculto invisível para humanos. Se robôs o preencherem, o envio é abortado simulando sucesso.
- **Temporizador de Digitação:** Ignora envios de formulário feitos em menos de 3 segundos (tempo comum de bots automatizados).
- **Validação de Comportamento:** Monitora eventos de interações físicas do hardware (movimento do mouse, foco em teclas, toque em tela) para atestar que o usuário é um humano real.

### 2. 📧 Integração de E-mail Autônoma (Hostinger PHP)
- **Script contato.php:** O site envia os dados dos leads diretamente a partir da hospedagem Hostinger via PHP `mail()` para `contato@duartejrengenharia.com.br`.
- **Formatação do Lead:** A mensagem do e-mail é gerada em formato de relatório monoespaçado limpo e profissional contendo Nome, E-mail, Telefone, Tipo de Serviço solicitado e Detalhes da obra.
- **Fallback Mailto:** Se a requisição de rede falhar ou a hospedagem não possuir o serviço PHP ativo no momento, o formulário aciona um fallback automático que abre o cliente de e-mail padrão do usuário (Gmail, Outlook, etc.) com todos os campos preenchidos e o corpo formatado pronto para envio.

### 3. 💬 Canal Direto via WhatsApp
- Botão flutuante fixado no canto inferior direito com animação de pulso sutil e contínua para atrair a atenção do usuário sem prejudicar o design.
- Botão na barra lateral de orçamento para contato ágil.

### 4. 📈 Otimização SEO Local
- **robots.txt e Sitemaps:** Integrados e atualizados na build para apontar para `https://duartejrengenharia.com.br/sitemap-index.xml`.
- **JSON-LD:** Tags estruturadas injetadas para ranquear os serviços de engenharia civil localmente no Google em São Francisco do Conde - BA.

---

## 📂 Estrutura de Arquivos Principais

```
DuarteEngenharia/
├── public/
│   ├── contato.php              # Script PHP de e-mail integrado para Hostinger
│   ├── faviconduarte.png        # Favicon oficial em alta definição
│   ├── logo-principal-duarte.png # Logo ampliado do header/footer
│   ├── robots.txt               # Regras de crawlers
│   └── images/                  # Imagens e Renders 3D do Hero/Serviços
├── src/
│   ├── components/
│   │   └── SEO.astro            # Tags de metadados, Favicon e OpenGraph
│   ├── layouts/
│   │   └── BaseLayout.astro     # Estrutura global, Header, Footer e Scripts gerais
│   ├── pages/
│   │   └── index.astro          # Conteúdo principal (Hero, Serviços, Sobre, Orçamento)
│   └── styles/
│       └── global.css           # Estilizações base do design system e animações
├── astro.config.mjs             # Configuração do Astro e Sitemap integrado
├── tsconfig.json                # Mapeamento de TypeScript e Aliases
└── package.json                 # Dependências e scripts npm
```

---

## 🚀 Como Executar o Projeto Localmente

### Pré-requisitos
Certifique-se de possuir o [Node.js](https://nodejs.org) (v18 ou superior) instalado em sua máquina.

### Passos
1. Clone este repositório.
2. Instale as dependências:
   ```bash
   npm install
   ```
3. Inicie o servidor de desenvolvimento:
   ```bash
   npm run dev
   ```
   *O site estará disponível no endereço local: [http://localhost:4321](http://localhost:4321).*

4. Gere a build otimizada de produção:
   ```bash
   npm run build
   ```

---
