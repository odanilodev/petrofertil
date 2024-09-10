<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CADASTRAR PRODUTO</h2>
        </div>
        <!-- Formulário de Cadastro -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data"
                        action="<?= site_url('P_produtos/insere_produto') ?>">
                        <div class="header">
                            <h2>Formulário de Cadastro</h2>
                        </div>
                        <input type="hidden" name="id" value="<?= isset($produto['id']) ? $produto['id'] : '' ?>">
                        <div class="body">
                            <!-- Seção de Dados do Produto -->
                            <div class="row">
                                
                                <div class="col-md-4">
                                    <label>Nome</label>
                                    <select name="nome" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        <option value="PTF ORG 100"
                                            <?= (isset($produto['nome']) && $produto['nome'] === 'PTF ORG 100') ? 'selected' : '' ?>>
                                            PTF ORG 100</option>
                                        <option value="PTF ORG 95"
                                            <?= (isset($produto['nome']) && $produto['nome'] === 'PTF ORG 95') ? 'selected' : '' ?>>
                                            PTF ORG 95</option>
                                        <option value="PTF ORG 50"
                                            <?= (isset($produto['nome']) && $produto['nome'] === 'PTF ORG 50') ? 'selected' : '' ?>>
                                            PTF ORG 50</option>
                                        <option value="PTF ORG 30"
                                            <?= (isset($produto['nome']) && $produto['nome'] === 'PTF ORG 30') ? 'selected' : '' ?>>
                                            PTF ORG 30</option>
                                        <option value="Outros"
                                            <?= (isset($produto['nome']) && $produto['nome'] === 'Outros') ? 'selected' : '' ?>>
                                            Outros</option>
                                    </select>
                                </div>
                               
                           <!--     <div class="col-sm-4">
									<label>Prazo de pagamento (em dias)</label>
									<select name="prazo_pagamento" class="form-control show-tick">
										<option>Selecione</option>
										<option php $cliente['prazo_pagamento'] == '15' ? 'selected' : '' ?> value="15">15</option>
										<option <php $cliente['prazo_pagamento'] == '30' ? 'selected' : '' ?> value="30">30</option>
										<option php $cliente['prazo_pagamento'] == '45' ? 'selected' : '' ?> value="45">45</option>
										<option php $cliente['prazo_pagamento'] == '60' ? 'selected' : '' ?> value="60">60</option>
									</select>
								</div> -->
                

                            </div>
                            <!-- Fim da Seção de Dados do Produto -->

                            <!-- Seção de Matéria-Prima -->
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Matéria-Prima</label>
                                    <div style="margin-bottom: 10px" id="materias-primas" class="form-inline">
                                        <?php
                                    // Verifica se há dados de matéria-prima e se é um array
                                    if (isset($produto['materia_prima']) && $produto['materia_prima'] != 'null' ) {
                                                $materia_prima = json_decode($produto['materia_prima']);
                                                foreach($materia_prima as $m){
                                                    echo '<div class="d-inline-block">';
                                                    echo "<input type='text' name='materia_prima[]' value='".$m."' class='form-control mb-2 mr-sm-2' placeholder='Digite a matéria-prima'>";
                                                    echo '<button type="button" class="btn btn-danger mb-2 mr-sm-2" onclick="removerMateriaPrima(this)">Remover</button>';
                                                    echo '</div>';
                                                }
                                    }
                                    ?>
                                    </div>
                                    <button type="button" class="btn btn-success" onclick="addMateriaPrima()">Adicionar
                                        Matéria-Prima</button>
                                </div>
                            </div>
                            <!-- Fim da Seção de Matéria-Prima -->

                            <!-- Outras Seções do Formulário -->
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                            <!-- Fim de Outras Seções do Formulário -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclua o Bootstrap (JS) aqui -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
    #materias-primas div {
        margin-bottom: 10px;
    }
    </style>

    <script>
    // Função para adicionar campos de entrada para matéria-prima dinamicamente
    function addMateriaPrima() {
        var materiaPrimaDiv = document.getElementById('materias-primas');

        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'materia_prima[]';
        input.className = 'form-control mb-2 mr-sm-2';
        input.placeholder = 'Digite a matéria-prima';

        var removerBotao = document.createElement('button');
        removerBotao.type = 'button';
        removerBotao.className = 'btn btn-danger mb-2 mr-sm-2';
        removerBotao.innerHTML = 'Remover';
        removerBotao.onclick = function() {
            materiaPrimaDiv.removeChild(div);
        };

        var div = document.createElement('div');
        div.className = 'd-inline-block';
        div.appendChild(input);
        div.appendChild(removerBotao);

        materiaPrimaDiv.appendChild(div);
    }

    // Função para remover campo de entrada de matéria-prima
    function removerMateriaPrima(element) {
        var materiaPrimaDiv = document.getElementById('materias-primas');
        materiaPrimaDiv.removeChild(element.parentNode);
    }
    </script>
</section>