<?php
include 'conexao.php';

// 1. Busca os destinatários para o formulário
$sql = "SELECT * FROM destinatarios";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$lista_destinatarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 2. Busca as prioridades
$sql_p = "SELECT * FROM prioridades";
$stmt_p = $conexao->prepare($sql_p);
$stmt_p->execute();
$lista_prioridades = $stmt_p->fetchAll(PDO::FETCH_ASSOC);

// 3. Busca os chamados
$sql_busca = "SELECT 
                d.id_destinatario, 
                d.nome_destinatario,
                c.id_chamado,
                c.titulo_chamado,
                c.mensagem_chamado,
                c.prioridade_chamado
              FROM destinatarios AS d
              INNER JOIN chamados AS c
              ON d.id_destinatario = c.id_destinatario";

$stmt_busca = $conexao->prepare($sql_busca);
$stmt_busca->execute();
$lista_chamados = $stmt_busca->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Chamados</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .form {
            width: 290px;
            padding: 10px;
            margin-bottom: 25px;
            background: white;
            border: 1px solid #ddd;
        }

        input, select, textarea {
            width: 100%;
            margin-bottom: 10px;
        }

        textarea {
            resize: none;
        }

        /* DIV GERAL (onde ficam todos os bloquinhos lado a lado) */
        .mostra {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            max-width: 900px;
            width: 100%;
        }

        /* CADA BLOQUINHO / CARD */
        .bloquinho {
            border: 1px solid black;
            padding: 12px;
            width: 250px;
            background: white;
        }

        .bloquinho div {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <header>
        <h2>Sistema de Chamados</h2>
    </header>

    <section id="formulario">
        <form action="gravar_chamado.php" method="post" class="form">
            <label for="destinatario_chamado">Destinatário</label>
            <select name="destinatario_chamado" id="destinatario_chamado">
                <?php foreach($lista_destinatarios as $destinatario): ?>
                    <option value="<?= $destinatario['id_destinatario'] ?>"><?= $destinatario['nome_destinatario'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="titulo_chamado">Título</label>
            <input type="text" name="titulo_chamado" id="titulo_chamado">

            <label for="mensagem_chamado">Mensagem</label>
            <textarea name="mensagem_chamado" id="mensagem_chamado" cols="30" rows="3"></textarea>

            <label for="prioridade_chamado">Prioridade</label>
            <select name="prioridade_chamado" id="prioridade_chamado">
                <?php foreach($lista_prioridades as $prioridade): ?>
                    <option value="<?= $prioridade['id_prioridade'] ?>"><?= $prioridade['tipo_prioridade'] ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Enviar</button>
        </form>
    </section>

    <!-- LISTAGEM EM CARDS (DIV MOSTRA) -->
    <section class="mostra">
        <?php if (count($lista_chamados) === 0): ?>
            <p>Nenhum chamado cadastrado ainda.</p>
        <?php endif; ?>

        <?php foreach($lista_chamados as $chamado): ?>
            <div class="bloquinho">
                <div class="id">
                    <strong>ID:</strong> <?= $chamado['id_chamado'] ?>
                </div>

                <div class="destinatario">
                    <strong>Para:</strong> <?= $chamado['nome_destinatario'] ?>
                </div>

                <div class="titulo">
                    <strong>Título:</strong> <?= $chamado['titulo_chamado'] ?>
                </div>

                <div class="mensagem">
                    <strong>Mensagem:</strong> <?= $chamado['mensagem_chamado'] ?>
                </div>

                <div class="prioridade">
                    <form action="atualizar_prioridade.php" method="POST" style="display: flex; gap: 5px;">
                        <input type="hidden" name="id_chamado" value="<?= $chamado['id_chamado'] ?>">
                        <select name="prioridade_chamado" style="margin-bottom:0;">
                            <?php foreach ($lista_prioridades as $opcao): ?>
                                <?php $selected = ($chamado['prioridade_chamado'] == $opcao['id_prioridade']) ? "selected" : ""; ?>
                                <option value="<?= $opcao['id_prioridade'] ?>" <?= $selected ?>><?= $opcao['tipo_prioridade'] ?></option>
                            <?php endforeach; ?>
                        </select>       
                        <button type="submit">Mudar</button>                                    
                    </form>
                </div>

                <div class="acoes">
                    <form action="deletar_chamado.php" method="GET">
                        <input type="hidden" name="id_chamado" value="<?= $chamado['id_chamado'] ?>">
                        <button type="submit" onclick="return confirm('Deseja realmente deletar esse chamado?')">Deletar</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</body>
</html>