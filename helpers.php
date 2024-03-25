<?php

//Estrutura da função


/**
 * @param string $data Mostra o tempo decorrido de uma postagem, por exemplo: postagem a 5 dias
 * @return string
 * 
 */
function contarTempo(string $data): string
{
    $agora = strtotime(date('Y-m-d H:i:s'));
    echo $tempo = strtotime($data);
    $diferenca = $agora - $tempo;

    $segundos = $diferenca;
    $minutos = round($diferenca /60);
    $horas = round($diferenca /3600);
    $dias = round($diferenca /86400);
    $semanas = round($diferenca /604800);
    $meses = round($diferenca /2419200);
    $anos = round($diferenca /29030400);
    //echo '<hr>';
    //var_dump($minutos);
    if($segundos <= 60)
    {
        return ' Agora';
    }elseif($minutos <= 60)
    {
        return $minutos == 1 ? ' Há 1 minuto' : ' Há ' .$minutos.' minutos';
    }elseif($horas <= 24)
    {
        return $horas == 1 ? ' Há 1 hora' : 'Há ' .$horas.' horas';
    }elseif($dias <= 7)
    {
        return $dias == 1 ? ' Ontem' : 'Há '.$dias.' dias';
    }elseif($semanas <= 4)
    {
        return $semanas == 1 ? ' Há uma semana' : ' Há '.$semanas.' semanas';
    }elseif($meses <= 12)
    {
        return $meses == 1 ? ' Há um mês' : ' Há '.$meses.' dias';
    }
    else{
        return $anos == 1 ? ' Há 1 ano' : ' Há '.$anos.' anos';
    }
        
}


/**
 * @param string $email Faz a validação de Email
 * @return bool
 * 
 */

//EMAIL VALIDAÇÃO
function validarEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


/**
 * @param string $url Faz a validação de ULR
 * @return bool
 */

//URL VALIDAÇÃO
function validarUrl(string $url): bool
{
    if(mb_strlen($url) < 10){
        return false;
    }
    if(!str_contains($url, '.')){
        return false;
    }
    if(str_contains($url, 'https://') or str_contains($url, 'htpp://')){
        return true;
    }
    return false;
}


/**
 * @param string $url Validação de URL
 * @return bool
 */
function validarUrlComFiltro(string $url): bool
{
    return filter_var($url, FILTER_VALIDATE_URL);
}


function localhost(): bool
{
    $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
    if(!$servidor == 'localhost'){
        return true;
    }
    return false;
}


/**
 * Monta url de acordo com o ambiente
 * @param string $url parte de url ex. Admin
 * @return string url completa
 */
function url(string $url): string
{
    $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
    $ambiente = ($servidor == 'localhost' ? URL_DESENVOLVIMENTO : URL_PRODUCAO);

    return $ambiente.'/'.$url;
}

//EXEMPLO BÁICO DE ARREYS MANIPULANDO A DATA
function dataAtual(): string
{
    $diaMes = date('d');
    $diaSemana = date('w');
    $mes = date('n') - 1; // o menos 1 é porque os arreys começam a contagem do 0 e não do 1
    $ano = date('Y');

    $nomesDiasDasemana = ['domingo', 'segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo'];
    $nomeDosMeses = ['janeiro','fevereiro','março','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro'
    ];

    $dataFormatada = $nomesDiasDasemana[$diaSemana].', '.$diaMes.' de '.$nomeDosMeses[$mes].' de '.$ano;
    return $dataFormatada;
}

function slug(string $string): string
{
    $mapa['a'] = 'qweertyuiopsadfghjkkkkkkkkkxzcvbnm';
    $mapa['b'] = 'áéíóúÁÉÍÓÚÀÈÌÒÙàèìòù';
    $mapa['c'] = '"!@#$%¨&*()_+|\¹²³£¢¬§°ºª~´/*,.;?';
    
    $slug = mb_convert_encoding($string,'UTF-8');

    $slug = strip_tags(trim($slug)); //Apaga as tags e espaços
    $slug = str_replace(' ', '-', $slug); //insere um outro valor nos espaços de acordo com a minha vontade

    return strtolower(mb_convert_encoding($string,'UTF-8'));
}

//VER O MATCH E O Swith pra economiza código. eles fazem a mesma função do if e else, mas de maneira resumida.