<?php
/**
 * Duarte JR Engenharia - Script de Envio de E-mail
 * Desenvolvido para rodar em servidores Hostinger (PHP)
 */

// Definir cabeçalhos para resposta JSON
header('Content-Type: application/json; charset=utf-8');

// Configurações de destino
$email_destinatario = 'contato@duartejrengenharia.com.br';
$assunto_prefixo = 'Solicitação de Orçamento - Duarte JR';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
    exit;
}

// 1. Anti-spam invisível no Servidor (Honeypot)
// Se o campo oculto 'website' for preenchido, é um bot de spam
if (!empty($_POST['website'])) {
    // Retorna sucesso simulado para enganar o bot e evitar tentativas secundárias
    echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso!']);
    exit;
}

// 2. Receber e Higienizar os dados do POST
$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
$servico_tipo = filter_input(INPUT_POST, 'service-type', FILTER_SANITIZE_SPECIAL_CHARS);
$mensagem = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

// Validação simples
if (!$nome || !$email || !$telefone || !$servico_tipo || !$mensagem) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos corretamente.']);
    exit;
}

// Mapeamento de tipos de serviço legíveis
$servicos = [
    'projetos' => 'Projetos (Estrutural / Complementar)',
    'execucao' => 'Execução de Obras',
    'consultoria' => 'Consultoria Técnica',
    'gerenciamento' => 'Gerenciamento Completo',
    'outro' => 'Outro'
];
$servico_label = isset($servicos[$servico_tipo]) ? $servicos[$servico_tipo] : $servico_tipo;

// 3. Formatação Profissional do E-mail (Texto Plano Estruturado)
$data_envio = date('d/m/Y H:i:s');
$corpo_email = "
NOVO CONTATO DE ORÇAMENTO - DUARTE JR
==================================================

DADOS DO LEAD
--------------------------------------------------
Nome Completo:     {$nome}
E-mail:            {$email}
Telefone/WhatsApp: {$telefone}
Tipo de Serviço:   {$servico_label}

MENSAGEM / ESPECIFICAÇÕES DO PROJETO
--------------------------------------------------
{$mensagem}

==================================================
Mensagem enviada do site oficial Duarte JR Engenharia.
Hospedagem: Hostinger
Data/Hora do Envio: {$data_envio}
";

// 4. Configurar Cabeçalhos do E-mail (Segurança e RFC-conforme)
// Usamos o próprio e-mail do destinatário ou do domínio como Remetente ('From')
// para evitar que o provedor Hostinger classifique o envio como spam devido a SPF/DMARC.
$dominio = 'duartejrengenharia.com.br';
$from_email = 'no-reply@' . $dominio;

// Cabeçalhos HTTP para e-mail profissional
$headers = [];
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/plain; charset=utf-8';
$headers[] = 'From: Duarte JR Web <' . $from_email . '>';
$headers[] = 'Reply-To: ' . $nome . ' <' . $email . '>';
$headers[] = 'X-Mailer: PHP/' . phpversion();

// 5. Executar o envio da função mail() do PHP
$assunto = $assunto_prefixo . ' - ' . $nome;
$envio_sucesso = mail($email_destinatario, $assunto, $corpo_email, implode("\r\n", $headers));

if ($envio_sucesso) {
    echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso!']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Falha interna ao enviar o e-mail no servidor Hostinger.']);
}
