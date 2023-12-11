<?php

/*
 * Copyright 2023 Hiago.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace TIExpert\WSBoletoSantander;

/**
 * Interface que define as ações necessárias para exportar as propriedades de uma classe.
 * 
 * Idealmente, o array exportado deve ser associativo e suas chaves devem ser as mesmas utilizadas pelo WS do banco.
 * 
 * @author Hiago Junior <hiago_j@hotmail.com>
 */
interface PropriedadesExportaveisParaArrayInterface {

    /** Exporta um array associativo no qual as chaves são as propriedades representadas como no WebService do Santander
     * 
     * @return array
     */
    public function exportarArray();
}
