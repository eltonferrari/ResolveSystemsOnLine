<?php

	class MinhaExceptionCustomizada extends Exception {

		private $erro = '';

		public function __construct($erro) {
			$this->erro = $erro;
		}

		public function exibirMensagemErroCustomizada() {
			echo "";
		}

		public function exibirMensagemErroArrayVazio() {
			echo 'vazioooo';
		}
	}
?>