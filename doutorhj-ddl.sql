-- $ php artisan make:auth
-- $ php artisan make:seeder UsersTableSeeder
-- $ php artisan db:seed --class=UsersTableSeeder
--------------------------------------------------------
--  DDL for Table ROLES
-- TABELA DO VOYAGER
-- $ php artisan migrate:rollback
--------------------------------------------------------

CREATE TABLE roles (
	id SERIAL 			NOT NULL, 
	name 				VARCHAR(255), 
	display_name 		VARCHAR(255), 
	created_at 			TIMESTAMP DEFAULT NOW(), 
	updated_at 			TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

CREATE TABLE roles_backup (
	id SERIAL 			NOT NULL, 
	name 				VARCHAR(255), 
	display_name 		VARCHAR(255), 
	created_at 			TIMESTAMP DEFAULT NOW(), 
	updated_at 			TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

--------------------------------------------------------
--  DDL for Table MENUS
-- $ php artisan make:migration create_menus_table
-- php artisan make:controller MenuController --resource --model=Menu
--------------------------------------------------------

CREATE TABLE menus (
  id          	SERIAL NOT NULL, 
  titulo      	VARCHAR(150) NOT NULL, 
  descricao		TEXT  NOT NULL, 
  ic_menu_class     	VARCHAR(250), 
  created TIMESTAMP DEFAULT NOW(),
  modified TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id));

--------------------------------------------------------
--  DDL for Table ITEMMENUS
-- $ php artisan make:migration create_itemmenus_table
-- $ php artisan make:migration add_menu_id_to_itemmenus_table
--php artisan make:controller ItemmenuController --resource --model=Itemmenu
--------------------------------------------------------
  
CREATE TABLE itemmenus (
  id              	SERIAL NOT NULL, 
  titulo           	VARCHAR(150) NOT NULL, 
  url             	TEXT NOT NULL, 
  ic_item_class         	VARCHAR(250), 
  ordemexibicao   	int4 NOT NULL, 
  menu_id 		int4 NOT NULL,
  created 			TIMESTAMP DEFAULT NOW(),
  modified 			TIMESTAMP DEFAULT NOW(),
  FOREIGN KEY (menu_id) REFERENCES menus(id),
  PRIMARY KEY (id));
  
--------------------------------------------------------
--  DDL for Table PERMISSAOS
-- $ php artisan make:migration create_permissaos_table
--------------------------------------------------------

CREATE TABLE permissaos (
  id              	SERIAL NOT NULL,
  titulo          	VARCHAR(150) NOT NULL,
  acesso_privado  	BOOLEAN DEFAULT FALSE NOT NULL,
  codigo_permissao 	VARCHAR(32) NOT NULL,
  url             	TEXT NOT NULL,
  url_alternativa 	TEXT,
  descricao     	TEXT,
  created 			TIMESTAMP DEFAULT NOW(),
  modified 			TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id));
  
--------------------------------------------------------
--  DDL for Table PERFILUSERS
-- $ php artisan make:migration create_perfilusers_table
--------------------------------------------------------

CREATE TABLE perfilusers (
  id              	SERIAL NOT NULL,
  titulo          	VARCHAR(150) NOT NULL,
  descricao       	TEXT,
  tipo_permissao 	int4 NOT NULL,
  created 			TIMESTAMP DEFAULT NOW(),
  modified 			TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id));
  
--------------------------------------------------------
--  DDL for Table USERS
-- $ php artisan make:migration create_users_table
-- $ php artisan make:migration add_perfiluser_id_to_users_table
--------------------------------------------------------

CREATE TABLE users (
	id SERIAL 			NOT NULL, 
	name 				VARCHAR(250) NOT NULL, 
	email 				VARCHAR(250) NOT NULL, 
	password 			TEXT NOT NULL, 
	remember_token 		VARCHAR(100), 
	avatar 				TEXT DEFAULT 'users/default.png', 
	perfiluser_id 			INT4,
	created_at 			TIMESTAMP DEFAULT NOW(), 
	updated_at 			TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY (perfiluser_id) REFERENCES perfilusers(id),
	PRIMARY KEY (id)
);
  
--------------------------------------------------------
--  DDL for Table CARGO
-- LARAVEL MIGRATION
-- $ php artisan make:migration create_cargos_table
-- $ php artisan make:model Cargo --migration
-- $ php artisan make:controller CargoController --resource --model=Cargo
--------------------------------------------------------

CREATE TABLE cargos  (
	id SERIAL 				NOT NULL,
	cd_cargo 				VARCHAR(10), 
	ds_cargo 				VARCHAR(150),
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

COMMENT ON COLUMN cargos.cd_cargo IS 'CÓDIGO DO CARGO CBO OBTIDO NO MINISTÉRIO DO TRABALHO.';
COMMENT ON COLUMN cargos.ds_cargo IS 'DESCRIÇÃO DO CARGO CONFORME MINISTÉRIO DO TRABALHO.';
   
--------------------------------------------------------
--  DDL for Table PROFISSIONAL_ESPECIALIDADE
-- $ php artisan make:migration create_profissional_especialidades_table
--------------------------------------------------------

CREATE TABLE profissional_especialidades (
	id SERIAL 				NOT NULL,
	cd_especialidade 		INT4, 
	ds_especialidade 		VARCHAR(100),
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

COMMENT ON COLUMN profissional_especialidades.id IS 'IDENTIFICADOR DE ESPECIALIDADE.';
COMMENT ON COLUMN profissional_especialidades.cd_especialidade IS 'CÓDIGO DE ESPECIALIDADE.';
COMMENT ON COLUMN profissional_especialidades.ds_especialidade IS 'DESCRIÇÃO DA ESPECIALIDADE.';

--------------------------------------------------------
--  DDL for Table PROFISSIONAL
-- $ php artisan make:migration create_profissionals_table
-- $ php artisan make:migration add_user_id_to_profissionals_table
-- $ php artisan make:migration add_profissional_especialidade_id_to_profissionals_table
-- $ php artisan make:migration add_cargo_id_to_profissionals_table
--------------------------------------------------------

CREATE TABLE profissionals (
	id SERIAL 				NOT NULL, 
	nm_primario 			VARCHAR(50), 
	nm_secundario 			VARCHAR(50), 
	cs_sexo 				VARCHAR(1), 
	dt_nascimento 			TIMESTAMP, 
	tp_profissional 		VARCHAR(1),
	cs_status 				VARCHAR(1), 
	user_id 				INT4,
	profissional_especialidade_id INT4, 
	cargo_id 				INT4,
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (profissional_especialidade_id) REFERENCES profissional_especialidades(id),
	FOREIGN KEY (cargo_id) REFERENCES cargos(id),
	PRIMARY KEY (id)
);

COMMENT ON COLUMN profissionals.tp_profissional IS 'M => MÉDICO O => OPERADOR L => PROFISSIONAL LIBERAL A => ADMINISTRADOR';
COMMENT ON COLUMN profissionals.cs_status IS 'A => ATIVO I => INATIVO';

--------------------------------------------------------
--  DDL for Table PACIENTE
-- $ php artisan make:migration create_pacientes_table
-- $ php artisan make:migration add_user_id_to_pacientes_table
-- $ php artisan make:migration add_cargo_id_to_pacientes_table
--------------------------------------------------------

CREATE TABLE pacientes (
	id SERIAL 				NOT NULL, 
	nm_primario 			VARCHAR(50), 
	nm_secundario			VARCHAR(50), 
	cs_sexo 				VARCHAR(1), 
	dt_nascimento 			DATE, 
	user_id 				INT4,
	cargo_id 				INT4,
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (cargo_id) REFERENCES cargos(id),
	PRIMARY KEY (id)
);

COMMENT ON COLUMN pacientes.id IS 'IDENTIFICADOR DA PESSOA.';
COMMENT ON COLUMN pacientes.cargo_id IS 'CARGO DO PACIENTE.';
COMMENT ON COLUMN pacientes.nm_primario IS 'PRIMEIRO NOME.';
COMMENT ON COLUMN pacientes.nm_secundario IS 'SOBRENOME.';
COMMENT ON COLUMN pacientes.cs_sexo IS 'M => MASCULINO F => FEMININO';
COMMENT ON COLUMN pacientes.dt_nascimento IS 'DATA DE NASCIMENTO.';

--------------------------------------------------------
--  DDL for Table CLINICA
-- $ php artisan make:migration create_clinicas_table
-- $ php artisan make:migration add_profissional_id_to_clinicas_table
--------------------------------------------------------

CREATE TABLE clinicas (
	id SERIAL 				NOT NULL, 
	nm_razao_social 		VARCHAR(50), 
	nm_nome_fantasia 		VARCHAR(50),
	profissional_id 		INT4,
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY (profissional_id) REFERENCES profissionals(id),
	PRIMARY KEY (id)
);

COMMENT ON COLUMN clinicas.nm_razao_social IS 'ASSINATURA PELOS QUAIS É CONHECIDA UMA EMPRESA COMERCIAL.';
COMMENT ON COLUMN clinicas.nm_nome_fantasia IS 'NOME FANTASIA, NOME DE FANTASIA, TAMBÉM CHAMADO NOME DE MARCA, NOME COMERCIAL OU NOME DE FACHADA, É A DESIGNAÇÃO POPULAR DE TÍTULO DE ESTABELECIMENTO UTILIZADA POR UMA INSTITUIÇÃO.';

--------------------------------------------------------
--  DDL for Table AGENDAMENTO
-- $ php artisan make:migration create_agendamentos_table
-- $ php artisan make:migration add_profissional_id_to_agendamentos_table
-- $ php artisan make:migration add_clinica_id_to_agendamentos_table
-- $ php artisan make:migration add_paciente_id_to_agendamentos_table
--------------------------------------------------------

CREATE TABLE agendamentos (
	id SERIAL 				NOT NULL, 
	bo_contato_inicial 		VARCHAR(1) DEFAULT 'N', 
	bo_contato_final 		VARCHAR(1) DEFAULT 'N', 
	te_ticket 				VARCHAR(10), 
	dt_consulta_primaria 	TIMESTAMP, 
	dt_consulta_secundaria 	TIMESTAMP, 
	bo_consulta_consumada 	VARCHAR(1) DEFAULT 'N',
	te_observacoes 			VARCHAR(100),
	profissional_id 		INT4, 
	clinica_id 				INT4, 
	paciente_id 			INT4,
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY (profissional_id) REFERENCES profissionals(id),
	FOREIGN KEY (clinica_id) REFERENCES clinicas(id),
	FOREIGN KEY (paciente_id) REFERENCES pacientes(id),
	PRIMARY KEY (id)
);

COMMENT ON COLUMN agendamentos.bo_contato_inicial IS 'TRUE INDICA QUE O CONTATO REALIZADO PARA DEFINIR DATA E HORA DA CONSULTA JÁ FOI REALIZADO.';
COMMENT ON COLUMN agendamentos.bo_contato_final IS 'TRUE INDICA QUE O CONTATO TELEFÔNICO REALIZADO APÓS CONSULTA FOI REALIZADO.';
COMMENT ON COLUMN agendamentos.te_ticket IS 'TICKET QUE FOI GERADO NO MOMENTO DA VENDA DA CONSULTA.';
COMMENT ON COLUMN agendamentos.dt_consulta_primaria IS 'INDICA A DATA E A HORA QUE O PACIENTE DESEJA A CONSULTA.';
COMMENT ON COLUMN agendamentos.dt_consulta_secundaria IS 'SE A DATA E HORA DA PRIMEIRA CONSULTA NÃO ESTIVEREM DISPONÍVEIS SERÁ ADOTADA ESTA DATA E HORA.';
COMMENT ON COLUMN agendamentos.bo_consulta_consumada IS 'TRUE SE A CONSULTA FOI REALIZADA.';
  
--------------------------------------------------------
--  DDL for Table CATEGORIES
-- TABELA DO VOYAGER
--------------------------------------------------------

CREATE TABLE categorias (
	id SERIAL 				NOT NULL,
	parent_id 				INT4,
	cvx_order 				INT4 DEFAULT 1, 
	name 					VARCHAR(255), 
	slug 					VARCHAR(255),
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

--------------------------------------------------------
--  DDL for Table ESTADO
-- $ php artisan make:migration create_estados_table
--------------------------------------------------------

CREATE TABLE estados(
	id SERIAL 				NOT NULL,
	ds_estado 				VARCHAR(30), 
	cd_ibge 				INT4, 
	sg_estado 				VARCHAR(2),
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

COMMENT ON COLUMN estados.id IS 'IDENTIFICADOR DO ESTADO';
COMMENT ON COLUMN estados.ds_estado IS 'DESCRIÇÃO DO ESTADO CONFORME IBGE';
COMMENT ON COLUMN estados.cd_ibge IS 'CÓDIGO IBGE DO ESTADO';
COMMENT ON COLUMN estados.sg_estado IS 'SIGLA DO ESTADO';

--------------------------------------------------------
--  DDL for Table CIDADE
-- $ php artisan make:migration create_cidades_table
-- $ php artisan make:migration add_estado_id_to_cidades_table
--------------------------------------------------------

CREATE TABLE cidades (
	id SERIAL 				NOT NULL,
	nm_cidade 				VARCHAR(80), 
	cd_ibge 				VARCHAR(25), 
	sg_cidade 				VARCHAR(4),
--	ds_estado 				VARCHAR(30),
--	sg_estado 				VARCHAR(2),
	estado_id 				INT4,
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY (estado_id) REFERENCES estados(id),
	PRIMARY KEY (id)
);

COMMENT ON COLUMN cidades.id IS 'IDENTIFICADOR DA CIDADE.';
COMMENT ON COLUMN cidades.estado_id IS 'IDENTIFICADOR DO ESTADO.';
COMMENT ON COLUMN cidades.nm_cidade IS 'NOME DA CIDADE CONFORME IBGE.';
COMMENT ON COLUMN cidades.sg_cidade IS 'SIGLA DA CIDADE CONFORME IBGE.';

--------------------------------------------------------
--  DDL for Table CONTATO
-- $ php artisan make:migration create_contatos_table
--------------------------------------------------------

CREATE TABLE contatos (
	id SERIAL 				NOT NULL,
	tp_contato 				VARCHAR(5), 
	ds_contato 				VARCHAR(30),
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

COMMENT ON COLUMN contatos.id IS 'IDENTIFICADOR DO CONTATO.';
COMMENT ON COLUMN contatos.tp_contato IS 'FR => FIXO RESIDENCIALFP => FIXO PESSOAL  CP => CELULAR PESSOAL  CC => CELULAR COMERCIAL  EP => E-MAIL PESSOAL  EC => E-MAIL COMERCIAL  FX => FAX';
COMMENT ON COLUMN contatos.ds_contato IS 'INFORMAÇÃO DE CONTATO EM FUNÇÃO DO TIPO.';
COMMENT ON TABLE contatos  IS 'FR => FIXO RESIDENCIALFP => FIXO PESSOAL  CP => CELULAR PESSOAL  CC => CELULAR COMERCIAL  EP => E-MAIL PESSOAL  EC => E-MAIL COMERCIAL  FX => FAX';

--------------------------------------------------------
--  DDL for Table DOCUMENTO
-- $ php artisan make:migration create_documentos_table
-- $ php artisan make:migration add_estado_id_to_documentos_table
--------------------------------------------------------

CREATE TABLE documentos (
	id SERIAL 				NOT NULL,
	tp_documento 			VARCHAR(3), 
	te_documento	 		FLOAT4, 
	nr_serie 				INT4, 
	dt_expedicao 			TIMESTAMP, 
	dt_validade 			TIMESTAMP, 
	sg_orgao_expedidor 		VARCHAR(7),
	estado_id 				INT4,
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY (estado_id) REFERENCES estados(id),
	PRIMARY KEY (id)
);

COMMENT ON COLUMN documentos.estado_id IS 'UF ONDE O DOCUMENTO FOI EMITIDO.';
COMMENT ON COLUMN documentos.tp_documento IS 'TIPO DE DOCUMENTO. RG, CPF, CNPJ, CRM, CRN, CRF.';
COMMENT ON COLUMN documentos.te_documento IS 'NÚMERO DO DOCUMENTO.';
COMMENT ON COLUMN documentos.nr_serie IS 'NÚMERO DE SÉRIE DO DOCUMENTO SE EXISTIR.';
COMMENT ON COLUMN documentos.dt_expedicao IS 'DATA EM QUE O DOCUMENTO FOI EXPEDIDO.';
COMMENT ON COLUMN documentos.dt_validade IS 'DATA DE VALIDADE DO DOCUMENTO.';
COMMENT ON COLUMN documentos.sg_orgao_expedidor IS 'SIGLA DO ÓRGÃO QUE EMITIU O DOCUMENTO.';
COMMENT ON TABLE documentos  IS 'TABELA ONDE SÃO REGISTRADOS TODOS OS DOCUMENTOS QUE EXISTEM CADASTRADOS NO SISTEMA.';

--------------------------------------------------------
--  DDL for Table ENDERECO
-- $ php artisan make:migration create_enderecos_table
-- $ php artisan make:migration add_cidade_id_to_enderecos_table
--------------------------------------------------------

CREATE TABLE enderecos (
	id SERIAL 				NOT NULL,
	sg_logradouro 			VARCHAR(10), 
	te_endereco 			VARCHAR(255), 
	nr_logradouro 			VARCHAR(10), 
	te_bairro 				VARCHAR(30), 
	nr_cep 					VARCHAR(9), 
	te_complemento_logradouro VARCHAR(1000), 
	nr_latitude_gps 		FLOAT8 DEFAULT 0.0, 
	nr_longitute_gps 		FLOAT8 DEFAULT 0.0,
	cidade_id 				INT4,
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY (cidade_id) REFERENCES cidades(id),
	PRIMARY KEY (id)
);

--------------------------------------------------------
--  DDL for Table DOUTORHJ_CONSULTA
-- $ php artisan make:migration create_doutorhj_consultas_table
--------------------------------------------------------

CREATE TABLE doutorhj_consultas (
	id SERIAL 				NOT NULL,
	cd_consulta 			VARCHAR(10), 
	ds_consulta 			VARCHAR(100),
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

COMMENT ON COLUMN doutorhj_consultas.cd_consulta IS 'CÓDIGO DE CONSULTAS S1 SAÚDE.';
COMMENT ON COLUMN doutorhj_consultas.ds_consulta IS 'DESCRIÇÃO DE CONSULTA UTILIZADA INTERNAMENTE PELA S1 SAÚDE.';

--------------------------------------------------------
--  DDL for Table DOUTORHJ_PROCEDIMENTO
-- $ php artisan make:migration create_doutorhj_procedimentos_table
--------------------------------------------------------

CREATE TABLE doutorhj_procedimentos (
	id SERIAL 				NOT NULL,
	cd_procedimento 		VARCHAR(10), 
	ds_procedimento 		VARCHAR(100),
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

COMMENT ON COLUMN doutorhj_procedimentos.cd_procedimento IS 'CÓDIGO DO PROCEDIMENTO UTILIZADO PELA S1 SAÚDE.';
COMMENT ON COLUMN doutorhj_procedimentos.ds_procedimento IS 'DESCRIÇÃO DO PROCEDIMENTO UTILIZADO INTERNAMENTE PELA S1 SAÚDE.';

--------------------------------------------------------
--  DDL for Table MENUS
-- TABELA DO VOYAGER
--------------------------------------------------------

CREATE TABLE menus(
	id SERIAL 				NOT NULL,
	name 					VARCHAR(255), 
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

CREATE TABLE menus_backup(
	id SERIAL 				NOT NULL,
	name 					VARCHAR(255), 
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

--------------------------------------------------------
--  DDL for Table MENU_ITEMS
-- TABELA DO VOYAGER
--------------------------------------------------------

CREATE TABLE menu_items (
	id SERIAL 				NOT NULL,
	title 					VARCHAR(255), 
	url 					VARCHAR(255), 
	target 					VARCHAR(255) DEFAULT '_self', 
	icon_class 				VARCHAR(255), 
	color 					VARCHAR(255), 
	cvx_order 					BIGINT, 
	route 					VARCHAR(255), 
	parameters 				TEXT,
	parent_id 				INT4,
	menu_id 				INT4,
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY (menu_id) REFERENCES menus(id),
	PRIMARY KEY (id)
);

CREATE TABLE menu_items_backup (
	id SERIAL 				NOT NULL,
	title 					VARCHAR(255), 
	url 					VARCHAR(255), 
	target 					VARCHAR(255) DEFAULT '_self', 
	icon_class 				VARCHAR(255), 
	color 					VARCHAR(255), 
	cvx_order 					BIGINT, 
	route 					VARCHAR(255), 
	parameters 				TEXT,
	parent_id 				INT4,
	menu_id 				INT4,
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY (menu_id) REFERENCES menus(id),
	PRIMARY KEY (id)
);

--------------------------------------------------------
--  DDL for Table PERMISSION_GROUPS
-- TABELA DO VOYAGER
--------------------------------------------------------

CREATE TABLE permission_groups (
	id SERIAL 				NOT NULL,
	name 					VARCHAR(255),
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

--------------------------------------------------------
--  DDL for Table PERMISSIONS
-- TABELA DO VOYAGER
--------------------------------------------------------

CREATE TABLE permissions (
	id SERIAL 				NOT NULL, 
	key 					VARCHAR(255), 
	table_name 				VARCHAR(255) DEFAULT NULL, 
	permission_group_id 	INT4,
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY (permission_group_id) REFERENCES permission_groups(id),
	PRIMARY KEY (id)
);

--------------------------------------------------------
--  DDL for Table POSTS
-- TABELA DO VOYAGER
--------------------------------------------------------

CREATE TABLE posts (
	id SERIAL 				NOT NULL,
	title 					VARCHAR(255), 
	seo_title 				VARCHAR(255), 
	excerpt 				TEXT, 
	body 					TEXT, 
	image 					VARCHAR(255), 
	slug 					VARCHAR(255), 
	meta_description 		TEXT, 
	meta_keywords 			TEXT, 
	status 					VARCHAR(255) DEFAULT 'DRAFT', 
	featured 				VARCHAR(1) DEFAULT '0', 
	author_id 				INT4,
	categoria_id 			INT4,
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
--	FOREIGN KEY (author_id) REFERENCES authors(id),
	FOREIGN KEY (categoria_id) REFERENCES menus(id),
	PRIMARY KEY (id)
);

---------mapping tables---------------------------------

--------------------------------------------------------
--  DDL for Table MENU_PERFILUSER
-- $ php artisan make:migration create_menu_perfiluser_table
------------------------------------------------------------

CREATE TABLE menu_perfiluser (
  menu_id			INTEGER REFERENCES menus (id) ON UPDATE CASCADE, 
  perfiluser_id		INTEGER REFERENCES perfilusers (id) ON UPDATE CASCADE, 
  CONSTRAINT menus_perfilusers_pkey PRIMARY KEY (menu_id, perfiluser_id));

--------------------------------------------------------
--  DDL for Table PERFILUSER_PERMISSAO
-- $ php artisan make:migration create_perfiluser_permissao_table
--------------------------------------------------------  

CREATE TABLE perfiluser_permissao (
	perfiluser_id 		INTEGER REFERENCES perfilusers (id) ON UPDATE CASCADE, 
	permissao_id 		INTEGER REFERENCES permissaos (id) ON UPDATE CASCADE, 
	CONSTRAINT perfilusers_permissaos_pkey PRIMARY KEY (perfiluser_id, permissao_id)
);

--------------------------------------------------------
--  DDL for Table CLINICA_CONTATO
-- $ php artisan make:migration create_clinica_contato_table
--------------------------------------------------------

CREATE TABLE clinica_contato (
	clinica_id INTEGER references clinicas (id) ON UPDATE CASCADE,
	contato_id INTEGER references contatos (id) ON UPDATE CASCADE,
	CONSTRAINT clinicas_contatos_pkey PRIMARY KEY (clinica_id, contato_id)
);

--------------------------------------------------------
--  DDL for Table CLINICA_DOCUMENTO
-- $ php artisan make:migration create_clinica_documento_table
--------------------------------------------------------

CREATE TABLE clinica_documento (
	clinica_id INTEGER references clinicas (id) ON UPDATE CASCADE,
	documento_id INTEGER references documentos (id) ON UPDATE CASCADE,
	CONSTRAINT clinicas_documentos_pkey PRIMARY KEY (clinica_id, documento_id)
);

--------------------------------------------------------
--  DDL for Table CLINICA_ENDERECO
-- $ php artisan make:migration create_clinica_endereco_table
--------------------------------------------------------

CREATE TABLE clinica_endereco (
	endereco_id INTEGER references enderecos (id) ON UPDATE CASCADE,
	documento_id INTEGER references documentos (id) ON UPDATE CASCADE,
	CONSTRAINT clinicas_enderecos_pkey PRIMARY KEY (clinica_id, endereco_id)
);

--------------------------------------------------------
--  DDL for Table DOCUMENTO_PACIENTE
-- $ php artisan make:migration create_documento_paciente_table
--------------------------------------------------------

CREATE TABLE documento_paciente (
	documento_id INTEGER references documentos (id) ON UPDATE CASCADE,
	paciente_id INTEGER references pacientes (id) ON UPDATE CASCADE,
	CONSTRAINT documento_pacientes_pkey PRIMARY KEY (documento_id, paciente_id)
);
--------------------------------------------------------
--  DDL for Table ENDERECO_PACIENTE
-- $ php artisan make:migration create_endereco_paciente_table
--------------------------------------------------------

CREATE TABLE endereco_paciente (
	endereco_id INTEGER references enderecos (id) ON UPDATE CASCADE,
	paciente_id INTEGER references pacientes (id) ON UPDATE CASCADE,
	CONSTRAINT endereco_pacientes_pkey PRIMARY KEY (endereco_id, paciente_id)
);

--------------------------------------------------------
--  DDL for Table PERMISSION_ROLE
--------------------------------------------------------

CREATE TABLE permission_role (
	permission_id INTEGER references permissions (id) ON UPDATE CASCADE,
	role_id INTEGER references roles (id) ON UPDATE CASCADE,
	CONSTRAINT permission_roles_pkey PRIMARY KEY (permission_id, role_id)
);

--------------------------------------------------------
--  DDL for Table CONTATO_PACIENTE
-- $ php artisan make:migration create_contato_paciente_table
--------------------------------------------------------

CREATE TABLE contato_paciente (
	contato_id INTEGER references contatos (id) ON UPDATE CASCADE,
	paciente_id INTEGER references pacientes (id) ON UPDATE CASCADE,
	CONSTRAINT contato_pacientes_pkey PRIMARY KEY (contato_id, paciente_id)
);

--------------------------------------------------------
--  DDL for Table CONTATO_PROFISSIONAL
-- $ php artisan make:migration create_contato_profissional_table
--------------------------------------------------------

CREATE TABLE contato_profissional (
	contato_id INTEGER references contatos (id) ON UPDATE CASCADE,
	profissional_id INTEGER references profissionals (id) ON UPDATE CASCADE,
	CONSTRAINT contato_profissionals_pkey PRIMARY KEY (contato_id, profissional_id)
);

--------------------------------------------------------
--  DDL for Table DOCUMENTO_PROFISSIONAL
-- $ php artisan make:migration create_documento_profissional_table
--------------------------------------------------------

CREATE TABLE documento_profissional (
	documento_id INTEGER references documentos (id) ON UPDATE CASCADE,
	profissional_id INTEGER references profissionals (id) ON UPDATE CASCADE,
	CONSTRAINT documento_profissionals_pkey PRIMARY KEY (documento_id, profissional_id)
);
  
  
--------------------------------------------------------
--  DDL for Table PROFISSIONAL_ENDERECO
-- $ php artisan make:migration create_endereco_profissional_table
--------------------------------------------------------
  
CREATE TABLE endereco_profissional (
	endereco_id INTEGER references enderecos (id) ON UPDATE CASCADE,
	profissional_id INTEGER references profissionals (id) ON UPDATE CASCADE,
	CONSTRAINT endereco_profissionals_pkey PRIMARY KEY (endereco_id, profissional_id)
);

--------------------------------------------------------
--  DDL for Table SETTINGS
-- TABELA DO VOYAGER
--------------------------------------------------------

CREATE TABLE settings (
	id SERIAL 				NOT NULL, 
	key 					VARCHAR(255), 
	display_name 			VARCHAR(255), 
	value					TEXT,
	details					TEXT,
	type 					VARCHAR(255), 
	cvx_order 				INT4,
	cvx_group 				VARCHAR(255), 
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);
--------------------------------------------------------
--  DDL for Table TRANSLATIONS
-- TABELA DO VOYAGER
--------------------------------------------------------

CREATE TABLE translations (
	id SERIAL 				NOT NULL, 
	table_name 				VARCHAR(255), 
	column_name 			VARCHAR(255), 
	foreign_key				INT4,
	locale					VARCHAR(255), 
	value 					TEXT, 
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

--------------------------------------------------------
--  DDL for Table DATA_TYPES
-- TABELA DO VOYAGER
--------------------------------------------------------

CREATE TABLE data_types (
	id SERIAL 				NOT NULL, 
	name 					VARCHAR(255), 
	slug 					VARCHAR(255), 
	display_name_singular 	VARCHAR(255), 
	display_name_plural 	VARCHAR(255), 
	icon 					VARCHAR(255), 
	model_name 				VARCHAR(255), 
	description 			VARCHAR(255), 
	generate_permissions 	VARCHAR(1), 
	server_side				INT4,
	controller				VARCHAR(255), 
	policy_name 			VARCHAR(255), 
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

--------------------------------------------------------
--  DDL for Table DATA_ROWS
-- TABELA DO VOYAGER
--------------------------------------------------------

CREATE TABLE data_rows (
	id SERIAL 				NOT NULL, 
	field 					VARCHAR(255), 
	type 					VARCHAR(255),
	display_name 			VARCHAR(255), 
	required 				VARCHAR(1),
	browse 					VARCHAR(1),
	read 					VARCHAR(1),
	edit 					VARCHAR(1),
	add 					VARCHAR(1),
	delete 					VARCHAR(1),
	details 				TEXT,
	cvx_order					INT4,
	data_type_id			INT4,	
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY (data_type_id) REFERENCES data_types(id),
	PRIMARY KEY (id)
);

--------------------------------------------------------
--  DDL for Table PAGES
-- TABELA DO VOYAGER
--------------------------------------------------------

CREATE TABLE pages (
	id SERIAL 				NOT NULL, 
	title 					VARCHAR(255), 
	excerpt 				TEXT,
	body 					TEXT,
	image 					VARCHAR(255),
	slug 					VARCHAR(255),
	meta_description 		TEXT,
	meta_keywords 			TEXT,
	status 					VARCHAR(255),
	author_id			INT4,	
	created_at 				TIMESTAMP DEFAULT NOW(), 
	updated_at 				TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

CREATE OR REPLACE FUNCTION public.unaccent(text)
  RETURNS text AS
$BODY$ select translate($1,'ÀÁÂÃÄÅAAAÈÉÊËEEEEEÌÍÎÏIIIIÒÓÔÕÖØOOOÙÚÛÜUUUUUUàáâãäåaaaèéêëeeeeeìíîïiiiiòóôõöøoooùúûüuuuuuÇçÑñÝýÿCcCcCcCcDdÐdGgGgGgGgHhHh','AAAAAAAAAEEEEEEEEEIIIIIIIIOOOOOOOOOUUUUUUUUUUaaaaaaaaaeeeeeeeeeiiiiiiiiooooooooouuuuuuuuuCcNnYyyCcCcCcCcDdDdGgGgGgGgHhHh');

$BODY$
  LANGUAGE sql IMMUTABLE STRICT
  COST 100;
ALTER FUNCTION public.unaccent(text)
  OWNER TO postgres;
 

CREATE OR REPLACE FUNCTION public.to_str(text)
  RETURNS text AS
$BODY$ select LOWER(unaccent($1));

$BODY$
  LANGUAGE sql IMMUTABLE STRICT
  COST 100;
ALTER FUNCTION public.to_str(text)
  OWNER TO postgres;
  
