Em uma **entrevista para vaga com PHP**, especialmente se for focada em desenvolvimento web, 
você pode esperar uma **combinação de perguntas técnicas, práticas e conceituais**, além de **perguntas comportamentais**.

Aqui vai um panorama completo:

# ✅ 1. Perguntas Técnicas de PHP Puro
Essas verificam seu domínio da linguagem.

  * **Sintaxe básica e tipos**:
    * Diferença entre `==` e `===`
    * Como funciona o `include`, `require`, `require_once`
    * O que são variáveis globais em PHP?

  * **Funções e arrays**:
    * Como usar array_map, array_filter, explode, implode
    * Diferença entre isset(), empty(), is_null()
  
  * **Manipulação de strings e datas**
    * Uso de `date()`, `strtotime()`
    * Funções de string: `substr`, `str_replace`, `preg_match`

  * **Orientação a Objetos (OOP)**:
    * O que são classes, herança, interfaces, traits
    * Diferença entre `public`, ``private, ``protected
    * O que é um **autoload**?

### 🔐 2. Segurança
Essas são essenciais em qualquer sistema web.

  * Como proteger contra **SQL Injection**?
  * O que é XSS e como evitar?
  * Como funciona a hash de senhas com password_hash() e password_verify()?

### 🛠️ 3. Banco de Dados e PDO
  * Diferença entre mysqli e PDO
  * Como usar prepared statements?
  * Como fazer um CRUD simples usando PDO?

### 🌐 4. Web e Formulários
 * Como funciona o envio de dados por POST e GET?
 * Como validar e sanitizar entradas?
 * Como fazer upload de arquivos com PHP?

### 🧱 5. Estrutura de Projetos e Boas Práticas
  * Você segue padrão MVC? Mesmo em PHP puro?
  * Como você organiza arquivos e funções?
  * Como você trata erros? Usa try/catch?

### 🧰 6. Laravel (se for exigido na vaga)
  * O que é uma rota, controller, migration?
  * Como funciona Eloquent ORM?
  * O que são middlewares e service providers?

### 🤖 7. Perguntas Práticas (teste técnico ou ao vivo)
Você pode ser desafiado a:
  * Criar um CRUD simples
  * Fazer login/logout com sessões
  * Escrever uma função para validar CPF, e-mail ou senha
  * Refatorar um código confuso
  * Corrigir bugs em um script PHP

### 🧠 8. Comportamentais / Soft Skills
  * Como você lida com prazos e bugs?
  * Você já trabalhou com equipes ou sozinho?
  * Como você lida com código legado?
  * Já usou Git? Sabe fazer merge, pull request?

### 📝 Dica Final
Antes da entrevista:
  * Treine alguns desafios no Hackerrank ou Exercism
  * Reveja os principais comandos SQL
  * Prepare exemplos práticos de projetos em PHP que você já fez (como esse seu CRUD)


==================================================================================

# Respostas

### ✅ == (igualdade com conversão de tipo)
 * Compara apenas os valores, ignorando os tipos.
 * PHP tenta converter os tipos antes de comparar.

🔸 Exemplo:
```php
var_dump(5 == "5");   // true
var_dump(0 == false); // true
var_dump(null == 0);  // true

```

### ✅ === (identidade ou igualdade estrita)
 * Compara valor E tipo.
 * Não faz conversão de tipo.

🔸 Exemplo:
```php
var_dump(5 === "5");   // false (número vs string)
var_dump(0 === false); // false (inteiro vs booleano)
var_dump(null === 0);  // false
var_dump(5 === 5);     // true

```

### 🛡️ Dica de segurança:
Sempre que possível, use `===` para evitar erros lógicos e falhas de segurança, especialmente ao comparar valores vindos de formulários ou banco de dados.


========================================================================================


Os comandos `include`, `require` e `require_once` são usados para inserir e reutilizar arquivos (como cabeçalhos, funções, classes, conexões com banco de dados, etc.). Mas eles têm diferenças importantes em como lidam com erros e repetição.

### ✅ include
 * Inclui e executa um arquivo PHP.
 * **Se o arquivo não existir, gera um aviso (**Warning**) e o script continua executando.

```php
include 'menu.php';

```

🔹 Se `menu.php` não for encontrado:

```plaintext

Warning: include(menu.php): failed to open stream...
(Script continua rodando)

```

### ✅ require
 * Também inclui e executa um arquivo PHP.
 * **Se o arquivo não existir, gera um erro fatal (**Fatal error**) e o script para imediatamente.
```php
require 'config.php';

```
🔹 Se `config.php` não for encontrado:


```plaintext

Fatal error: require(): Failed opening required 'config.php'
(Script para aqui)

```


### ✅ require_once
 * Funciona como **require**, mas garante que o arquivo só será incluído uma vez, mesmo que você o chame de novo.
 * Evita problemas de redeclaração de funções, variáveis ou classes.

```php
require_once 'conexao.php';

```

🔹 Útil quando você precisa garantir que um arquivo não será carregado duas vezes por acidente.



### 💡 Quando usar o quê?
 * Use `require` ou `require_once` para arquivos essenciais (ex: conexão com banco, arquivos de configuração).
 * Use `include` para elementos não críticos (ex: blocos opcionais, menus, banners).
 * Use `require_once` para evitar duplicações, especialmente com funções ou classes.



### ✅ Funções com arrays em PHP
🔹 `array_map()`
Aplica uma função em cada elemento de um array e retorna um novo array com os resultados.

```php
$numeros = [1, 2, 3];
$dobrados = array_map(function($n) {
    return $n * 2;
}, $numeros);

print_r($dobrados); // [2, 4, 6]
```


🔹 `array_filter()`
Filtra os elementos de um array com base em uma função de condição.
```php
$valores = [1, 2, 3, 4, 5];

$pares = array_filter($valores, function($n) {
    return $n % 2 === 0;
});

print_r($pares); // [1 => 2, 3 => 4]

```
>Repare que as chaves originais são mantidas.

🔹 `explode()`
Divide uma string em partes, transformando em um array, usando um delimitador.
```php

$frase = "PHP é incrível";
$palavras = explode(" ", $frase);

print_r($palavras); // ["PHP", "é", "incrível"]

```

🔹 `implode()`
Faz o oposto de `explode()`: junta os elementos de um array em uma string, com um separador.
```php

$itens = ["maçã", "banana", "laranja"];
$texto = implode(", ", $itens);

echo $texto; // maçã, banana, laranja

```

### ✅ Validação: `isset()`, `empty()` e `is_null()`
Essas funções testam se variáveis existem ou têm conteúdo. Vamos comparar:

Função	                     Verifica se...	                                Exemplo
`isset()`	                  A variável existe e não é null	                `isset($x)`
`empty()`	                  A variável não existe ou tem valor “vazio”	    `empty($x)`
`is_null()`	                A variável tem valor `null`	                   `is_null($x)`


🔸 `isset()`
```php
$x = null;
var_dump(isset($x)); // false (porque é null)

$y = "";
var_dump(isset($y)); // true (existe e não é null)

```

🔸 `empty()`
```php
$a = "";
$b = 0;
$c = null;
$d = [];

var_dump(empty($a)); // true
var_dump(empty($b)); // true
var_dump(empty($c)); // true
var_dump(empty($d)); // true

```

🔸 `is_null()`

```php

$z = null;
var_dump(is_null($z)); // true

$t = 0;
var_dump(is_null($t)); // false

```

✅ **Resumo final:**

| Valor        | `isset()` | `empty()` | `is_null()`               |
|--------------|-----------|-----------|---------------------------|
| `""`         | ✅         | ✅         | ❌                         |
| `0`          | ✅         | ✅         | ❌                         |
| `null`       | ❌         | ✅         | ✅                         |
| `[]`         | ✅         | ✅         | ❌                         |
| não definida | ❌         | ✅         | ⚠️ erro (se usada sem `isset`) |



### 💡 Dicas:
 * Para usar emojis como ✅, ❌ e ⚠️, você pode simplesmente copiá-los e colá-los direto no .md.
 * Para destacar o código (isset()), use crase simples: `isset()`
 * Para criar negrito ou títulos, use ** ou # conforme o nível desejado.



