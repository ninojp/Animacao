	function validaCampos() {
		if (document.form_inserir_autor.input_estudio.value == "") {
			alert ("O Campo Estúdio precisa ser preenchido!");
			document.form_inserir_autor.input_estudio.focus();
			return false;
		}
	}
	function validaCampoNome() {
		if (document.form_inserir_anime.personagens.value == "") {
			alert ("O Campo Personagens precisa ser preenchido!");
			document.form_inserir_anime.personagens.focus();
			return false;
		}
	}
	function validaInputIMG() {
		if (document.form_img_anime.caminho_img_anime.value == "") {
			alert ("É Preciso selecionar uma imagem para prosseguir!");
			document.form_img_anime.caminho_img_anime.focus();
			return false;
		}
	}
	function validaInputImgSerie() {
		if (document.form_img_serie.caminho_img_serie.value == "") {
			alert ("É Preciso selecionar uma imagem para prosseguir!");
			document.form_img_serie.caminho_img_serie.focus();
			return false;
		}
	}
	function validaInputImgOva() {
		if (document.inserir_genero.caminho_img_ova.value == "") {
			alert ("É Preciso selecionar uma imagem para prosseguir!");
			document.inserir_genero.caminho_img_ova.focus();
			return false;
		}
	}
	function validaInputImgEspecial() {
		if (document.form_img_especial.caminho_img_especial.value == "") {
			alert ("É Preciso selecionar uma imagem para prosseguir!");
			document.form_img_especial.caminho_img_especial.focus();
			return false;
		}
	}
	function validaInputImgOna() {
		if (document.form_img_ona.caminho_img_ona.value == "") {
			alert ("É Preciso selecionar uma imagem para prosseguir!");
			document.form_img_ona.caminho_img_ona.focus();
			return false;
		}
	}
	function validaInputImgFilme() {
		if (document.form_img_filme.caminho_img_filme.value == "") {
			alert ("É Preciso selecionar uma imagem para prosseguir!");
			document.form_img_filme.caminho_img_filme.focus();
			return false;
		}
	}
	function validaFormGenero() {
		if (document.inserir_genero.genero_anime.value == "") {
			alert ("É Preciso selecionar um GENERO!");
			document.inserir_genero.genero_anime.focus();
			return false;
		}
	}