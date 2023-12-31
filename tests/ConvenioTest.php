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

use TIExpert\WSBoletoSantander\Convenio;
use TIExpert\WSBoletoSantander\Config;

/**
 * Testes unitários para a classe Convenio
 * 
 * @author Hiago Junior <hiago_j@hotmail.com>
 */
class ConvenioTest extends \PHPUnit_Framework_TestCase {

    private $convenioObj;

    /**
     * @author Hiago Junior <hiago_j@hotmail.com>
     * @test
     */
    public function seConvenioForInstanciadoComParametrosNulosEntaoSuasPropriedadesDevemSerValoresPadroesDeConfiguracao() {
        $this->convenioObj = new Convenio(NULL, NULL);
        $config = Config::getInstance();

        $this->assertEquals($config->getConvenio("banco_padrao"), $this->convenioObj->getCodigoBanco());
        $this->assertEquals($config->getConvenio("convenio_padrao"), $this->convenioObj->getCodigoConvenio());
    }

    /**
     * @author Hiago Junior <hiago_j@hotmail.com>
     * @test
     */
    public function testeAcessorDaPropriedadeCodigoBanco() {
        $validParam = "0033";

        $this->convenioObj = new Convenio("CÓDIGO ERRADO", NULL);
        $this->convenioObj->setCodigoBanco($validParam);
        $this->assertEquals($validParam, $this->convenioObj->getCodigoBanco());
    }

    /**
     * @author Hiago Junior <hiago_j@hotmail.com>
     * @test
     */
    public function testeAcessorDaPropriedadeCodigoConvenio() {
        $validParam = 123456;

        $this->convenioObj = new Convenio(NULL, "CONVÊNIO ERRADO");
        $this->convenioObj->setCodigoConvenio($validParam);
        $this->assertEquals($validParam, $this->convenioObj->getCodigoConvenio());
    }

    /**
     * @author Hiago Junior <hiago_j@hotmail.com>
     * @test
     */
    public function oArrayExportadoDevePossuirAsMesmasChavesUtilizadasPeloWSdoBanco(){
        $chaveConvenioBanco = array("CONVENIO.COD-BANCO", "CONVENIO.COD-CONVENIO");
        
        $this->convenioObj = new Convenio();
        $export = $this->convenioObj->exportarArray();
        
        foreach ($chaveConvenioBanco as $chave) {
            $this->assertArrayHasKey($chave, $export);
        }
    }
}
