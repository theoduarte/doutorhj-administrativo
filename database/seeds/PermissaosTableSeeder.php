<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissaosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissaos')->delete();
        
        DB::table('permissaos')->insert(
            array(
                0 => array(
                    'id' => '1',
                    'titulo' => 'User[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000001',
					'url_action' => 'users.create',
					'url_model' => 'users',
					'descricao' => 'Realiza a exibição do formulário de cadastro de usuário.'
                ),
                1 => array(
                    'id' => '2',
                    'titulo' => 'User[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000010',
					'url_action' => 'users.store',
					'url_model' => 'users',
					'descricao' => 'Salva o usuário.'
                ),
                2 => array(
                    'id' => '3',
                    'titulo' => 'User[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000011',
					'url_action' => 'users.destroy',
					'url_model' => 'users',
					'descricao' => 'Exclui o usuário.'
                ),
                3 => array(
                    'id' => '4',
                    'titulo' => 'User[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000100',
					'url_action' => 'users.edit',
					'url_model' => 'users',
					'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                4 => array(
                    'id' => '5',
                    'titulo' => 'User[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000101',
					'url_action' => 'users.update',
					'url_model' => 'users',
					'descricao' => 'Atualiza os dados do usuário.'
                ),
                5 => array(
                    'id' => '6',
                    'titulo' => 'User[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000110',
					'url_action' => 'users.index',
					'url_model' => 'users',
					'descricao' => 'Lista todos os usuário.'
                ),
                6 => array(
                    'id' => '7',
                    'titulo' => 'User[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000111',
					'url_action' => 'users.show',
					'url_model' => 'users',
					'descricao' => 'Exibe os dados do usuário.'
                ),
                7 => array(
                    'id' => '8',
                    'titulo' => 'Agendamento[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000001000',
                    'url_action' => 'adicionar-agendamento',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Salva um agendamento.'
                ),
                8 => array(
                    'id' => '9',
                    'titulo' => 'Agendamento[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000001001',
                    'url_action' => 'agenda.index',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Lista todos os agendamentos.'
                ),
                9 => array(
                    'id' => '10',
                    'titulo' => 'Agendamento[Agendar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000001010',
                    'url_action' => 'agendar-atendimento',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Realiza o agendamento de atendimento.'
                ),
                10 => array(
                    'id' => '11',
                    'titulo' => 'Agendamento[Cancelar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000001011',
                    'url_action' => 'cancelar-atendimento',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Realiza o cancelamento de agendamento.'
                ),
                11 => array(
                    'id' => '12',
                    'titulo' => 'Agendamento[Confirmar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000001100',
                    'url_action' => 'confirmar-agendamento',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Realiza a confirmação de agendamento.'
                ),
                12 => array(
                    'id' => '13',
                    'titulo' => 'Profissional[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000001101',
                    'url_action' => 'exibir-profissional',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Exibe os dados do profissional.'
                ),
                13 => array(
                    'id' => '14',
                    'titulo' => 'Agendamento[AlterarStatus]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000001110',
                    'url_action' => 'alterar-status-agendamento',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Altera o status do agendamento.'
                ),
                14 => array(
                    'id' => '15',
                    'titulo' => 'Agendamento[ConsultarEspecialidades]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000001111',
                    'url_action' => 'consultar-especialidades',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Consultar as especialidades.'
                ),
                15 => array(
                    'id' => '16',
                    'titulo' => 'Agendamento[ExibirLocalAtendimento]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000010000',
                    'url_action' => 'exibir-local-atendimento',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Exibe os locais de atendimento.'
                ),
                16 => array(
                    'id' => '17',
                    'titulo' => 'Agendamento[CriarAgendamentoAtendimento]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000010001',
                    'url_action' => 'create-new-agendamento-atendimento',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Cria um novo agendamento para o atendimento.'
                ),
                17 => array(
                    'id' => '18',
                    'titulo' => 'Agendamento[ListarFilialporProcedimento]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000010010',
                    'url_action' => 'get-active-filials-by-clinica-procedimento',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Lista filiais por procedimento.'
                ),
                18 => array(
                    'id' => '19',
                    'titulo' => 'Agendamento[ListarFilialporProfissional]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000010011',
                    'url_action' => 'get-active-filials-by-clinica-profissional-consulta',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Lista filiais por profissional.'
                ),
                19 => array(
                    'id' => '20',
                    'titulo' => 'Agendamento[ListarProfissionalporClinica]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000010100',
                    'url_action' => 'get-active-profissionals-by-clinica-consulta ',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Lista profissionais por clínica.'
                ),
                20 => array(
                    'id' => '21',
                    'titulo' => 'Agendamento[ListarHorarios]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000010101',
                    'url_action' => 'listar-horarios',
                    'url_model' => 'agendamentos',
                    'descricao' => 'Lista horários dos agendamentos.'
                ),
                21 => array(
                    'id' => '22',
                    'titulo' => 'Cargo[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000010110',
                    'url_action' => 'cargos.create',
                    'url_model' => 'cargos',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de cargo.'
                ),
                22 => array(
                    'id' => '23',
                    'titulo' => 'Cargo[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000010111',
                    'url_action' => 'cargos.store',
                    'url_model' => 'cargos',
                    'descricao' => 'Salva o cargo.'
                ),
                23 => array(
                    'id' => '24',
                    'titulo' => 'Cargo[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000011000',
                    'url_action' => 'cargos.destroy',
                    'url_model' => 'cargos',
                    'descricao' => 'Exclui o cargo.'
                ),
                24 => array(
                    'id' => '25',
                    'titulo' => 'Cargo[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000011001',
                    'url_action' => 'cargos.edit',
                    'url_model' => 'cargos',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                25 => array(
                    'id' => '26',
                    'titulo' => 'Cargo[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000011010',
                    'url_action' => 'cargos.update',
                    'url_model' => 'cargos',
                    'descricao' => 'Atualiza os dados do cargo.'
                ),
                26 => array(
                    'id' => '27',
                    'titulo' => 'Cargo[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000011011',
                    'url_action' => 'cargos.index',
                    'url_model' => 'cargos',
                    'descricao' => 'Lista todos os cargo.'
                ),
                27 => array(
                    'id' => '28',
                    'titulo' => 'Cargo[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000011100',
                    'url_action' => 'cargos.show',
                    'url_model' => 'cargos',
                    'descricao' => 'Exibe os dados do cargo.'
                ),
                28 => array(
                    'id' => '29',
                    'titulo' => 'Filial[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000011101',
                    'url_action' => 'adicionar-filial',
                    'url_model' => 'filials',
                    'descricao' => 'Salva uma filial.'
                ),
                29 => array(
                    'id' => '30',
                    'titulo' => 'Filial[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000011110',
                    'url_action' => 'excluir-filial',
                    'url_model' => 'filials',
                    'descricao' => 'Exclui uma filial.'
                ),
                30 => array(
                    'id' => '31',
                    'titulo' => 'Clinica[AdicionarPrecoConsulta]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000011111',
                    'url_action' => 'add-precificacao-consulta',
                    'url_model' => 'clinicas',
                    'descricao' => 'Adiciona preço a uma consulta.'
                ),
                31 => array(
                    'id' => '32',
                    'titulo' => 'Clinica[AdicionarPrecoProcedimento]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000100000',
                    'url_action' => 'add-precificacao-procedimento',
                    'url_model' => 'clinicas',
                    'descricao' => 'Adiciona preço a um procedimento.'
                ),
                32 => array(
                    'id' => '33',
                    'titulo' => 'Clinica[AdicionarProfissionalClinica]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000100001',
                    'url_action' => 'adicionar-profissional',
                    'url_model' => 'clinicas',
                    'descricao' => 'Adiciona um profissional a uma clínica.'
                ),
                33 => array(
                    'id' => '34',
                    'titulo' => 'Clinica[ListarProfissionalporClinica]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000100010',
                    'url_action' => 'listar-profissionals',
                    'url_model' => 'clinicas',
                    'descricao' => 'Lista profissionais por clínica.'
                ),
                34 => array(
                    'id' => '35',
                    'titulo' => 'Clinica[ListarConsultaporClinica]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000100011',
                    'url_action' => 'listar-consultas',
                    'url_model' => 'clinicas',
                    'descricao' => 'Lista consultas por clínica.'
                ),
                35 => array(
                    'id' => '36',
                    'titulo' => 'Clinica[ExcluirPrecoConsulta]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000100100',
                    'url_action' => 'delete-precificacao-consulta',
                    'url_model' => 'clinicas',
                    'descricao' => 'Exclui preço por consulta.'
                ),
                36 => array(
                    'id' => '37',
                    'titulo' => 'Clinica[ExcluirPrecoProcedimento]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000100101',
                    'url_action' => 'delete-precificacao-procedimento',
                    'url_model' => 'clinicas',
                    'descricao' => 'Exclui preço por procedimento.'
                ),
                37 => array(
                    'id' => '38',
                    'titulo' => 'Clinica[ExcluirProfissionalClinica]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000100110',
                    'url_action' => 'excluir-profissional',
                    'url_model' => 'clinicas',
                    'descricao' => 'Excluir profissional por clínica'
                ),
                38 => array(
                    'id' => '39',
                    'titulo' => 'Clinica[EditarPrecoConsulta]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000100111',
                    'url_action' => 'edit-precificacao-consulta',
                    'url_model' => 'clinicas',
                    'descricao' => 'Edita preço de consulta da clínica.'
                ),
                39 => array(
                    'id' => '40',
                    'titulo' => 'Clinica[EditarPrecoProcedimento]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000101000',
                    'url_action' => 'edit-precificacao-procedimento',
                    'url_model' => 'clinicas',
                    'descricao' => 'Edita preço de procedimento da clínica.'
                ),
                40 => array(
                    'id' => '41',
                    'titulo' => 'Clinica[ListarProcedimento]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000101001',
                    'url_action' => 'listar-procedimentos',
                    'url_model' => 'clinicas',
                    'descricao' => 'Listar procedimentos por clínica.'
                ),
                41 => array(
                    'id' => '42',
                    'titulo' => 'Clinica[MostrarProfissional]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000101010',
                    'url_action' => 'mostrar-profissional',
                    'url_model' => 'clinicas',
                    'descricao' => 'Mostrar profissional por clínica.'
                ),
                42 => array(
                    'id' => '43',
                    'titulo' => 'Clinica[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000101011',
                    'url_action' => 'clinicas.create',
                    'url_model' => 'clinicas',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de clínica.'
                ),
                43 => array(
                    'id' => '44',
                    'titulo' => 'Clinica[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000101100',
                    'url_action' => 'clinicas.store',
                    'url_model' => 'clinicas',
                    'descricao' => 'Salva a clínica.'
                ),
                44 => array(
                    'id' => '45',
                    'titulo' => 'Clinica[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000101101',
                    'url_action' => 'clinicas.destroy',
                    'url_model' => 'clinicas',
                    'descricao' => 'Exclui a clínica.'
                ),
                45 => array(
                    'id' => '46',
                    'titulo' => 'Clinica[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000101110',
                    'url_action' => 'clinicas.edit',
                    'url_model' => 'clinicas',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                46 => array(
                    'id' => '47',
                    'titulo' => 'Clinica[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000101111',
                    'url_action' => 'clinicas.update',
                    'url_model' => 'clinicas',
                    'descricao' => 'Atualiza os dados da clínica.'
                ),
                47 => array(
                    'id' => '48',
                    'titulo' => 'Clinica[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000110000',
                    'url_action' => 'clinicas.index',
                    'url_model' => 'clinicas',
                    'descricao' => 'Lista todas as clínicas.'
                ),
                48 => array(
                    'id' => '49',
                    'titulo' => 'Clinica[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000110001',
                    'url_action' => 'clinicas.show',
                    'url_model' => 'clinicas',
                    'descricao' => 'Exibe os dados da clínica.'
                ),
                49 => array(
                    'id' => '50',
                    'titulo' => 'TagPopular[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000110010',
                    'url_action' => 'adicionar-tag-popular',
                    'url_model' => 'tag_populars',
                    'descricao' => 'Salva a tag popular.'
                ),
                50 => array(
                    'id' => '51',
                    'titulo' => 'TagPopular[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000110011',
                    'url_action' => 'excluir-tag-popular',
                    'url_model' => 'tag_populars',
                    'descricao' => 'Exclui uma tag popular.'
                ),
                51 => array(
                    'id' => '52',
                    'titulo' => 'TagPopular[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000110100',
                    'url_action' => 'exibir-tag-popular',
                    'url_model' => 'tag_populars',
                    'descricao' => 'Exibe uma tag popular.'
                ),
                52 => array(
                    'id' => '53',
                    'titulo' => 'Checkup[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000110101',
                    'url_action' => 'checkups.create',
                    'url_model' => 'checkups',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de checkup.'
                ),
                53 => array(
                    'id' => '54',
                    'titulo' => 'Checkup[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000110110',
                    'url_action' => 'checkups.store',
                    'url_model' => 'checkups',
                    'descricao' => 'Salva o checkup.'
                ),
                54 => array(
                    'id' => '55',
                    'titulo' => 'Checkup[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000110111',
                    'url_action' => 'checkups.destroy',
                    'url_model' => 'checkups',
                    'descricao' => 'Exclui o checkup.'
                ),
                55 => array(
                    'id' => '56',
                    'titulo' => 'Checkup[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000111000',
                    'url_action' => 'checkups.edit',
                    'url_model' => 'checkups',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                56 => array(
                    'id' => '57',
                    'titulo' => 'Checkup[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000111001',
                    'url_action' => 'checkups.update',
                    'url_model' => 'checkups',
                    'descricao' => 'Atualiza os dados do checkup.'
                ),
                57 => array(
                    'id' => '58',
                    'titulo' => 'Checkup[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000111010',
                    'url_action' => 'checkups.index',
                    'url_model' => 'checkups',
                    'descricao' => 'Lista todos os checkups.'
                ),
                58 => array(
                    'id' => '59',
                    'titulo' => 'Checkup[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000111011',
                    'url_action' => 'checkups.show',
                    'url_model' => 'checkups',
                    'descricao' => 'Exibe os dados do checkup.'
                ),
                59 => array(
                    'id' => '60',
                    'titulo' => 'Checkup[Configurar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000111100',
                    'url_action' => 'checkups.configure',
                    'url_model' => 'checkups',
                    'descricao' => 'configura um checkup.'
                ),
                60 => array(
                    'id' => '61',
                    'titulo' => 'Checkup[ListarClinicaPorConsulta]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000111101',
                    'url_action' => 'get-active-clinicas-by-consulta',
                    'url_model' => 'checkups',
                    'descricao' => 'Lista clínicas ativas por consulta.'
                ),
                61 => array(
                    'id' => '62',
                    'titulo' => 'Checkup[ListarClinicaPorEspecialidade]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000111110',
                    'url_action' => 'get-active-clinicas-by-especialidade',
                    'url_model' => 'checkups',
                    'descricao' => 'Lista clínicas ativas por especialidade.'
                ),
                62 => array(
                    'id' => '63',
                    'titulo' => 'Checkup[ListarClinicaPorProcedimento]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000111111',
                    'url_action' => 'get-active-clinicas-by-procedimento',
                    'url_model' => 'checkups',
                    'descricao' => 'Lista clínicas ativas por procedimentos.'
                ),
                63 => array(
                    'id' => '64',
                    'titulo' => 'Checkup[ListarConsultaPorEspecialidade]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001000000',
                    'url_action' => 'get-active-consultas-by-especialidade',
                    'url_model' => 'checkups',
                    'descricao' => 'Lista consultas ativas por especialidade.'
                ),
                64 => array(
                    'id' => '65',
                    'titulo' => 'Checkup[ListarProcedimentoPorGrupoProcedimento]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001000001',
                    'url_action' => 'get-active-procedimentos-by-grupo-procedimento',
                    'url_model' => 'checkups',
                    'descricao' => 'Lista procedimentos por grupo de procedimento.'
                ),
                65 => array(
                    'id' => '66',
                    'titulo' => 'Checkup[ListarProfissionalPorClinica]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001000010',
                    'url_action' => 'get-active-profissionals-by-clinica',
                    'url_model' => 'checkups',
                    'descricao' => 'Lista profissionais ativos por clínica.'
                ),
                66 => array(
                    'id' => '67',
                    'titulo' => 'Checkup[ListarAtendimentoPorConsulta]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001000011',
                    'url_action' => 'get-atendimento-values-by-consulta',
                    'url_model' => 'checkups',
                    'descricao' => 'Lista atendimentos ativos por consulta.'
                ),
                67 => array(
                    'id' => '68',
                    'titulo' => 'Checkup[ListarAtendimentoPorProcedimento]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001000100',
                    'url_action' => 'get-atendimento-values-by-procedimento',
                    'url_model' => 'checkups',
                    'descricao' => 'Lista atendimentos ativos por procedimento.'
                )
                
                /*
                 * |        | GET|HEAD  | /                                                                                                                              |                                                     | Closure                                                                            | web          |
|        | GET|HEAD  | clientes                                                                                                                       | clientes.index                                      | App\Http\Controllers\ClienteController@index                                       | web,auth     |
|        | POST      | clientes                                                                                                                       | clientes.store                                      | App\Http\Controllers\ClienteController@store                                       | web,auth     |
|        | GET|HEAD  | clientes/create                                                                                                                | clientes.create                                     | App\Http\Controllers\ClienteController@create                                      | web,auth     |
|        | DELETE    | clientes/{cliente}                                                                                                             | clientes.destroy                                    | App\Http\Controllers\ClienteController@destroy                                     | web,auth     |
|        | PUT|PATCH | clientes/{cliente}                                                                                                             | clientes.update                                     | App\Http\Controllers\ClienteController@update                                      | web,auth     |
|        | GET|HEAD  | clientes/{cliente}                                                                                                             | clientes.show                                       | App\Http\Controllers\ClienteController@show                                        | web,auth     |
|        | GET|HEAD  | clientes/{cliente}/edit                                                                                                        | clientes.edit                                       | App\Http\Controllers\ClienteController@edit                                        | web,auth     |
|        | GET|HEAD  | consultas                                                                                                                      | consultas.index                                     | App\Http\Controllers\ConsultaController@index                                      | web,auth     |
|        | POST      | consultas                                                                                                                      | consultas.store                                     | App\Http\Controllers\ConsultaController@store                                      | web,auth     |
|        | GET|HEAD  | consultas/create                                                                                                               | consultas.create                                    | App\Http\Controllers\ConsultaController@create                                     | web,auth     |
|        | DELETE    | consultas/{consulta}                                                                                                           | consultas.destroy                                   | App\Http\Controllers\ConsultaController@destroy                                    | web,auth     |
|        | PUT|PATCH | consultas/{consulta}                                                                                                           | consultas.update                                    | App\Http\Controllers\ConsultaController@update                                     | web,auth     |
|        | GET|HEAD  | consultas/{consulta}                                                                                                           | consultas.show                                      | App\Http\Controllers\ConsultaController@show                                       | web,auth     |
|        | GET|HEAD  | consultas/{consulta}/edit                                                                                                      | consultas.edit                                      | App\Http\Controllers\ConsultaController@edit                                       | web,auth     |
|        | GET|HEAD  | cupom_descontos                                                                                                                | cupom_descontos.index                               | App\Http\Controllers\CupomDescontoController@index                                 | web,auth     |
|        | POST      | cupom_descontos                                                                                                                | cupom_descontos.store                               | App\Http\Controllers\CupomDescontoController@store                                 | web,auth     |
|        | GET|HEAD  | cupom_descontos/create                                                                                                         | cupom_descontos.create                              | App\Http\Controllers\CupomDescontoController@create                                | web,auth     |
|        | DELETE    | cupom_descontos/{cupom_desconto}                                                                                               | cupom_descontos.destroy                             | App\Http\Controllers\CupomDescontoController@destroy                               | web,auth     |
|        | PUT|PATCH | cupom_descontos/{cupom_desconto}                                                                                               | cupom_descontos.update                              | App\Http\Controllers\CupomDescontoController@update                                | web,auth     |
|        | GET|HEAD  | cupom_descontos/{cupom_desconto}                                                                                               | cupom_descontos.show                                | App\Http\Controllers\CupomDescontoController@show                                  | web,auth     |
|        | GET|HEAD  | cupom_descontos/{cupom_desconto}/edit                                                                                          | cupom_descontos.edit                                | App\Http\Controllers\CupomDescontoController@edit                                  | web,auth     |
|        | GET|HEAD  | documentos/getUserByCpf/{cpf}                                                                                                  | documentos.get-user-by-cpf                          | App\Http\Controllers\DocumentoController@getUserByCpf                              | web,auth     |
|        | POST      | empresas                                                                                                                       | empresas.store                                      | App\Http\Controllers\EmpresaController@store                                       | web,auth     |
|        | GET|HEAD  | empresas                                                                                                                       | empresas.index                                      | App\Http\Controllers\EmpresaController@index                                       | web,auth     |
|        | GET|HEAD  | empresas/create                                                                                                                | empresas.create                                     | App\Http\Controllers\EmpresaController@create                                      | web,auth     |
|        | GET|HEAD  | empresas/{empresa}                                                                                                             | empresas.show                                       | App\Http\Controllers\EmpresaController@show                                        | web,auth     |
|        | DELETE    | empresas/{empresa}                                                                                                             | empresas.destroy                                    | App\Http\Controllers\EmpresaController@destroy                                     | web,auth     |
|        | PUT|PATCH | empresas/{empresa}                                                                                                             | empresas.update                                     | App\Http\Controllers\EmpresaController@update                                      | web,auth     |
|        | GET|HEAD  | empresas/{empresa}/edit                                                                                                        | empresas.edit                                       | App\Http\Controllers\EmpresaController@edit                                        | web,auth     |
|        | GET|HEAD  | enderecos                                                                                                                      | enderecos.index                                     | App\Http\Controllers\EnderecoController@index                                      | web,auth     |
|        | POST      | enderecos                                                                                                                      | enderecos.store                                     | App\Http\Controllers\EnderecoController@store                                      | web,auth     |
|        | GET|HEAD  | enderecos/create                                                                                                               | enderecos.create                                    | App\Http\Controllers\EnderecoController@create                                     | web,auth     |
|        | PUT|PATCH | enderecos/{endereco}                                                                                                           | enderecos.update                                    | App\Http\Controllers\EnderecoController@update                                     | web,auth     |
|        | GET|HEAD  | enderecos/{endereco}                                                                                                           | enderecos.show                                      | App\Http\Controllers\EnderecoController@show                                       | web,auth     |
|        | DELETE    | enderecos/{endereco}                                                                                                           | enderecos.destroy                                   | App\Http\Controllers\EnderecoController@destroy                                    | web,auth     |
|        | GET|HEAD  | enderecos/{endereco}/edit                                                                                                      | enderecos.edit                                      | App\Http\Controllers\EnderecoController@edit                                       | web,auth     |
|        | POST      | entidades                                                                                                                      | entidades.store                                     | App\Http\Controllers\EntidadeController@store                                      | web,auth     |
|        | GET|HEAD  | entidades                                                                                                                      | entidades.index                                     | App\Http\Controllers\EntidadeController@index                                      | web,auth     |
|        | GET|HEAD  | entidades/create                                                                                                               | entidades.create                                    | App\Http\Controllers\EntidadeController@create                                     | web,auth     |
|        | DELETE    | entidades/{entidade}                                                                                                           | entidades.destroy                                   | App\Http\Controllers\EntidadeController@destroy                                    | web,auth     |
|        | PUT|PATCH | entidades/{entidade}                                                                                                           | entidades.update                                    | App\Http\Controllers\EntidadeController@update                                     | web,auth     |
|        | GET|HEAD  | entidades/{entidade}                                                                                                           | entidades.show                                      | App\Http\Controllers\EntidadeController@show                                       | web,auth     |
|        | GET|HEAD  | entidades/{entidade}/edit                                                                                                      | entidades.edit                                      | App\Http\Controllers\EntidadeController@edit                                       | web,auth     |
|        | GET|HEAD  | grupo_procedimentos                                                                                                            | grupo_procedimentos.index                           | App\Http\Controllers\GrupoProcedimentoController@index                             | web,auth     |
|        | POST      | grupo_procedimentos                                                                                                            | grupo_procedimentos.store                           | App\Http\Controllers\GrupoProcedimentoController@store                             | web,auth     |
|        | GET|HEAD  | grupo_procedimentos/create                                                                                                     | grupo_procedimentos.create                          | App\Http\Controllers\GrupoProcedimentoController@create                            | web,auth     |
|        | PUT|PATCH | grupo_procedimentos/{grupo_procedimento}                                                                                       | grupo_procedimentos.update                          | App\Http\Controllers\GrupoProcedimentoController@update                            | web,auth     |
|        | DELETE    | grupo_procedimentos/{grupo_procedimento}                                                                                       | grupo_procedimentos.destroy                         | App\Http\Controllers\GrupoProcedimentoController@destroy                           | web,auth     |
|        | GET|HEAD  | grupo_procedimentos/{grupo_procedimento}                                                                                       | grupo_procedimentos.show                            | App\Http\Controllers\GrupoProcedimentoController@show                              | web,auth     |
|        | GET|HEAD  | grupo_procedimentos/{grupo_procedimento}/edit                                                                                  | grupo_procedimentos.edit                            | App\Http\Controllers\GrupoProcedimentoController@edit                              | web,auth     |
|        | GET|HEAD  | home                                                                                                                           | home                                                | App\Http\Controllers\HomeController@index                                          | web,auth     |
|        | DELETE    | item-checkups-consulta.destroy/{checkupId}/checkupId/{consultaId}/consultaId/{clinicas}/clinicas/{profissionals}/profissionals | item-checkups-consulta.destroy                      | App\Http\Controllers\ItemCheckupsController@destroy                                | web,auth     |
|        | POST      | item-checkups-consulta.store/{checkup}                                                                                         | item-checkups-consulta.store                        | App\Http\Controllers\ItemCheckupsController@store                                  | web,auth     |
|        | DELETE    | item-checkups-exame.destroy/{checkupId}/checkupId/{procedimentoId}/procedimentoId/{clinicas}/clinicas                          | item-checkups-exame.destroy                         | App\Http\Controllers\ItemCheckupsController@destroyExame                           | web,auth     |
|        | POST      | item-checkups-exame.store/{checkup}                                                                                            | item-checkups-exame.store                           | App\Http\Controllers\ItemCheckupsController@storeExame                             | web,auth     |
|        | POST      | itemmenus                                                                                                                      | itemmenus.store                                     | App\Http\Controllers\ItemmenuController@store                                      | web,auth     |
|        | GET|HEAD  | itemmenus                                                                                                                      | itemmenus.index                                     | App\Http\Controllers\ItemmenuController@index                                      | web,auth     |
|        | GET|HEAD  | itemmenus/create                                                                                                               | itemmenus.create                                    | App\Http\Controllers\ItemmenuController@create                                     | web,auth     |
|        | DELETE    | itemmenus/{itemmenu}                                                                                                           | itemmenus.destroy                                   | App\Http\Controllers\ItemmenuController@destroy                                    | web,auth     |
|        | GET|HEAD  | itemmenus/{itemmenu}                                                                                                           | itemmenus.show                                      | App\Http\Controllers\ItemmenuController@show                                       | web,auth     |
|        | PUT|PATCH | itemmenus/{itemmenu}                                                                                                           | itemmenus.update                                    | App\Http\Controllers\ItemmenuController@update                                     | web,auth     |
|        | GET|HEAD  | itemmenus/{itemmenu}/edit                                                                                                      | itemmenus.edit                                      | App\Http\Controllers\ItemmenuController@edit                                       | web,auth     |
|        | POST      | load-data-atendimento                                                                                                          | mostrar-data-atendimento                            | App\Http\Controllers\AtendimentoController@loadAtendimentoShow                     | web,auth     |
|        | GET|HEAD  | load-data-preco/{id}                                                                                                           | mostrar-data-preco                                  | App\Http\Controllers\PrecoController@loadPrecoShow                                 | web,auth     |
|        | POST      | logradouros                                                                                                                    | logradouros.store                                   | App\Http\Controllers\LogradouroController@store                                    | web,auth     |
|        | GET|HEAD  | logradouros                                                                                                                    | logradouros.index                                   | App\Http\Controllers\LogradouroController@index                                    | web,auth     |
|        | GET|HEAD  | logradouros/create                                                                                                             | logradouros.create                                  | App\Http\Controllers\LogradouroController@create                                   | web,auth     |
|        | DELETE    | logradouros/{logradouro}                                                                                                       | logradouros.destroy                                 | App\Http\Controllers\LogradouroController@destroy                                  | web,auth     |
|        | GET|HEAD  | logradouros/{logradouro}                                                                                                       | logradouros.show                                    | App\Http\Controllers\LogradouroController@show                                     | web,auth     |
|        | PUT|PATCH | logradouros/{logradouro}                                                                                                       | logradouros.update                                  | App\Http\Controllers\LogradouroController@update                                   | web,auth     |
|        | GET|HEAD  | logradouros/{logradouro}/edit                                                                                                  | logradouros.edit                                    | App\Http\Controllers\LogradouroController@edit                                     | web,auth     |
|        | GET|HEAD  | menus                                                                                                                          | menus.index                                         | App\Http\Controllers\MenuController@index                                          | web,auth     |
|        | POST      | menus                                                                                                                          | menus.store                                         | App\Http\Controllers\MenuController@store                                          | web,auth     |
|        | GET|HEAD  | menus/create                                                                                                                   | menus.create                                        | App\Http\Controllers\MenuController@create                                         | web,auth     |
|        | GET|HEAD  | menus/{menu}                                                                                                                   | menus.show                                          | App\Http\Controllers\MenuController@show                                           | web,auth     |
|        | PUT|PATCH | menus/{menu}                                                                                                                   | menus.update                                        | App\Http\Controllers\MenuController@update                                         | web,auth     |
|        | DELETE    | menus/{menu}                                                                                                                   | menus.destroy                                       | App\Http\Controllers\MenuController@destroy                                        | web,auth     |
|        | GET|HEAD  | menus/{menu}/edit                                                                                                              | menus.edit                                          | App\Http\Controllers\MenuController@edit                                           | web,auth     |
|        | GET|HEAD  | notificacoes                                                                                                                   | listar-notificacoes                                 | App\Http\Controllers\MensagemController@getListaNotificacoes                       | web,auth     |
|        | GET|HEAD  | notificacoes/visualizado/{id}                                                                                                  | exibir-notificacao                                  | App\Http\Controllers\MensagemController@setStatusVisualizado                       | web,auth     |
|        | POST      | password/email                                                                                                                 | password.email                                      | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail              | web,guest    |
|        | POST      | password/reset                                                                                                                 |                                                     | App\Http\Controllers\Auth\ResetPasswordController@reset                            | web,guest    |
|        | GET|HEAD  | password/reset                                                                                                                 | password.request                                    | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm             | web,guest    |
|        | GET|HEAD  | password/reset/{token}                                                                                                         | password.reset                                      | App\Http\Controllers\Auth\ResetPasswordController@showResetForm                    | web,guest    |
|        | GET|HEAD  | perfilusers                                                                                                                    | perfilusers.index                                   | App\Http\Controllers\PerfiluserController@index                                    | web,auth     |
|        | POST      | perfilusers                                                                                                                    | perfilusers.store                                   | App\Http\Controllers\PerfiluserController@store                                    | web,auth     |
|        | GET|HEAD  | perfilusers/create                                                                                                             | perfilusers.create                                  | App\Http\Controllers\PerfiluserController@create                                   | web,auth     |
|        | GET|HEAD  | perfilusers/{perfiluser}                                                                                                       | perfilusers.show                                    | App\Http\Controllers\PerfiluserController@show                                     | web,auth     |
|        | PUT|PATCH | perfilusers/{perfiluser}                                                                                                       | perfilusers.update                                  | App\Http\Controllers\PerfiluserController@update                                   | web,auth     |
|        | DELETE    | perfilusers/{perfiluser}                                                                                                       | perfilusers.destroy                                 | App\Http\Controllers\PerfiluserController@destroy                                  | web,auth     |
|        | GET|HEAD  | perfilusers/{perfiluser}/edit                                                                                                  | perfilusers.edit                                    | App\Http\Controllers\PerfiluserController@edit                                     | web,auth     |
|        | POST      | permissaos                                                                                                                     | permissaos.store                                    | App\Http\Controllers\PermissaoController@store                                     | web,auth     |
|        | GET|HEAD  | permissaos                                                                                                                     | permissaos.index                                    | App\Http\Controllers\PermissaoController@index                                     | web,auth     |
|        | GET|HEAD  | permissaos/create                                                                                                              | permissaos.create                                   | App\Http\Controllers\PermissaoController@create                                    | web,auth     |
|        | GET|HEAD  | permissaos/{permissao}                                                                                                         | permissaos.show                                     | App\Http\Controllers\PermissaoController@show                                      | web,auth     |
|        | PUT|PATCH | permissaos/{permissao}                                                                                                         | permissaos.update                                   | App\Http\Controllers\PermissaoController@update                                    | web,auth     |
|        | DELETE    | permissaos/{permissao}                                                                                                         | permissaos.destroy                                  | App\Http\Controllers\PermissaoController@destroy                                   | web,auth     |
|        | GET|HEAD  | permissaos/{permissao}/edit                                                                                                    | permissaos.edit                                     | App\Http\Controllers\PermissaoController@edit                                      | web,auth     |
|        | GET|HEAD  | planos                                                                                                                         | planos.index                                        | App\Http\Controllers\PlanoController@index                                         | web,auth     |
|        | POST      | planos                                                                                                                         | planos.store                                        | App\Http\Controllers\PlanoController@store                                         | web,auth     |
|        | GET|HEAD  | planos/create                                                                                                                  | planos.create                                       | App\Http\Controllers\PlanoController@create                                        | web,auth     |
|        | GET|HEAD  | planos/{plano}                                                                                                                 | planos.show                                         | App\Http\Controllers\PlanoController@show                                          | web,auth     |
|        | PUT|PATCH | planos/{plano}                                                                                                                 | planos.update                                       | App\Http\Controllers\PlanoController@update                                        | web,auth     |
|        | DELETE    | planos/{plano}                                                                                                                 | planos.destroy                                      | App\Http\Controllers\PlanoController@destroy                                       | web,auth     |
|        | GET|HEAD  | planos/{plano}/edit                                                                                                            | planos.edit                                         | App\Http\Controllers\PlanoController@edit                                          | web,auth     |
|        | GET|HEAD  | precos                                                                                                                         | precos.index                                        | App\Http\Controllers\PrecoController@index                                         | web,auth     |
|        | POST      | precos                                                                                                                         | precos.store                                        | App\Http\Controllers\PrecoController@store                                         | web,auth     |
|        | GET|HEAD  | precos/create                                                                                                                  | precos.create                                       | App\Http\Controllers\PrecoController@create                                        | web,auth     |
|        | GET|HEAD  | precos/{preco}                                                                                                                 | precos.show                                         | App\Http\Controllers\PrecoController@show                                          | web,auth     |
|        | DELETE    | precos/{preco}                                                                                                                 | precos.destroy                                      | App\Http\Controllers\PrecoController@destroy                                       | web,auth     |
|        | PUT|PATCH | precos/{preco}                                                                                                                 | precos.update                                       | App\Http\Controllers\PrecoController@update                                        | web,auth     |
|        | GET|HEAD  | precos/{preco}/edit                                                                                                            | precos.edit                                         | App\Http\Controllers\PrecoController@edit                                          | web,auth     |
|        | POST      | procedimentos                                                                                                                  | procedimentos.store                                 | App\Http\Controllers\ProcedimentoController@store                                  | web,auth     |
|        | GET|HEAD  | procedimentos                                                                                                                  | procedimentos.index                                 | App\Http\Controllers\ProcedimentoController@index                                  | web,auth     |
|        | GET|HEAD  | procedimentos/create                                                                                                           | procedimentos.create                                | App\Http\Controllers\ProcedimentoController@create                                 | web,auth     |
|        | DELETE    | procedimentos/{procedimento}                                                                                                   | procedimentos.destroy                               | App\Http\Controllers\ProcedimentoController@destroy                                | web,auth     |
|        | PUT|PATCH | procedimentos/{procedimento}                                                                                                   | procedimentos.update                                | App\Http\Controllers\ProcedimentoController@update                                 | web,auth     |
|        | GET|HEAD  | procedimentos/{procedimento}                                                                                                   | procedimentos.show                                  | App\Http\Controllers\ProcedimentoController@show                                   | web,auth     |
|        | GET|HEAD  | procedimentos/{procedimento}/edit                                                                                              | procedimentos.edit                                  | App\Http\Controllers\ProcedimentoController@edit                                   | web,auth     |
|        | GET|HEAD  | profissionais/{idClinica}                                                                                                      | listar-profissionals-por-clinica                    | App\Http\Controllers\ProfissionalController@getProfissionaisPorClinica             | web,auth     |
|        | POST      | profissionals                                                                                                                  | profissionals.store                                 | App\Http\Controllers\ProfissionalController@store                                  | web,auth     |
|        | GET|HEAD  | profissionals                                                                                                                  | profissionals.index                                 | App\Http\Controllers\ProfissionalController@index                                  | web,auth     |
|        | GET|HEAD  | profissionals/create                                                                                                           | profissionals.create                                | App\Http\Controllers\ProfissionalController@create                                 | web,auth     |
|        | PUT|PATCH | profissionals/{profissional}                                                                                                   | profissionals.update                                | App\Http\Controllers\ProfissionalController@update                                 | web,auth     |
|        | DELETE    | profissionals/{profissional}                                                                                                   | profissionals.destroy                               | App\Http\Controllers\ProfissionalController@destroy                                | web,auth     |
|        | GET|HEAD  | profissionals/{profissional}                                                                                                   | profissionals.show                                  | App\Http\Controllers\ProfissionalController@show                                   | web,auth     |
|        | GET|HEAD  | profissionals/{profissional}/edit                                                                                              | profissionals.edit                                  | App\Http\Controllers\ProfissionalController@edit                                   | web,auth     |
|        | GET|HEAD  | register                                                                                                                       | register                                            | App\Http\Controllers\Auth\RegisterController@showRegistrationForm                  | web,guest    |
|        | POST      | register                                                                                                                       |                                                     | App\Http\Controllers\Auth\RegisterController@register                              | web,guest    |
|        | GET|HEAD  | registro_logs                                                                                                                  | registro_logs.index                                 | App\Http\Controllers\RegistroLogController@index                                   | web,auth     |
|        | POST      | registro_logs                                                                                                                  | registro_logs.store                                 | App\Http\Controllers\RegistroLogController@store                                   | web,auth     |
|        | GET|HEAD  | registro_logs/create                                                                                                           | registro_logs.create                                | App\Http\Controllers\RegistroLogController@create                                  | web,auth     |
|        | GET|HEAD  | registro_logs/{registro_log}                                                                                                   | registro_logs.show                                  | App\Http\Controllers\RegistroLogController@show                                    | web,auth     |
|        | PUT|PATCH | registro_logs/{registro_log}                                                                                                   | registro_logs.update                                | App\Http\Controllers\RegistroLogController@update                                  | web,auth     |
|        | DELETE    | registro_logs/{registro_log}                                                                                                   | registro_logs.destroy                               | App\Http\Controllers\RegistroLogController@destroy                                 | web,auth     |
|        | GET|HEAD  | registro_logs/{registro_log}/edit                                                                                              | registro_logs.edit                                  | App\Http\Controllers\RegistroLogController@edit                                    | web,auth     |
|        | GET|HEAD  | representantes                                                                                                                 | representantes.index                                | App\Http\Controllers\RepresentanteController@index                                 | web,auth     |
|        | POST      | representantes                                                                                                                 | representantes.store                                | App\Http\Controllers\RepresentanteController@store                                 | web,auth     |
|        | GET|HEAD  | representantes/create                                                                                                          | representantes.create                               | App\Http\Controllers\RepresentanteController@create                                | web,auth     |
|        | GET|HEAD  | representantes/createModal/{idEmpresa}                                                                                         | representantes.createModal                          | App\Http\Controllers\RepresentanteController@createModal                           | web,auth     |
|        | GET|HEAD  | representantes/{id}/editModal                                                                                                  | representantes.editModal                            | App\Http\Controllers\RepresentanteController@editModal                             | web,auth     |
|        | GET|HEAD  | representantes/{id}/showModal                                                                                                  | representantes.showModal                            | App\Http\Controllers\RepresentanteController@showModal                             | web,auth     |
|        | GET|HEAD  | representantes/{representante}                                                                                                 | representantes.show                                 | App\Http\Controllers\RepresentanteController@show                                  | web,auth     |
|        | PUT|PATCH | representantes/{representante}                                                                                                 | representantes.update                               | App\Http\Controllers\RepresentanteController@update                                | web,auth     |
|        | DELETE    | representantes/{representante}                                                                                                 | representantes.destroy                              | App\Http\Controllers\RepresentanteController@destroy                               | web,auth     |
|        | GET|HEAD  | representantes/{representante}/edit                                                                                            | representantes.edit                                 | App\Http\Controllers\RepresentanteController@edit                                  | web,auth     |
|        | GET|HEAD  | servico_adicionals                                                                                                             | servico_adicionals.index                            | App\Http\Controllers\ServicoAdicionalController@index                              | web,auth     |
|        | POST      | servico_adicionals                                                                                                             | servico_adicionals.store                            | App\Http\Controllers\ServicoAdicionalController@store                              | web,auth     |
|        | GET|HEAD  | servico_adicionals/create                                                                                                      | servico_adicionals.create                           | App\Http\Controllers\ServicoAdicionalController@create                             | web,auth     |
|        | DELETE    | servico_adicionals/{servico_adicional}                                                                                         | servico_adicionals.destroy                          | App\Http\Controllers\ServicoAdicionalController@destroy                            | web,auth     |
|        | PUT|PATCH | servico_adicionals/{servico_adicional}                                                                                         | servico_adicionals.update                           | App\Http\Controllers\ServicoAdicionalController@update                             | web,auth     |
|        | GET|HEAD  | servico_adicionals/{servico_adicional}                                                                                         | servico_adicionals.show                             | App\Http\Controllers\ServicoAdicionalController@show                               | web,auth     |
|        | GET|HEAD  | servico_adicionals/{servico_adicional}/edit                                                                                    | servico_adicionals.edit                             | App\Http\Controllers\ServicoAdicionalController@edit                               | web,auth     |
|        | GET|HEAD  | termos-condicoes                                                                                                               | termos-condicoes.index                              | App\Http\Controllers\TermosCondicoesController@index                               | web,auth     |
|        | POST      | termos-condicoes                                                                                                               | termos-condicoes.store                              | App\Http\Controllers\TermosCondicoesController@store                               | web,auth     |
|        | GET|HEAD  | termos-condicoes/create                                                                                                        | termos-condicoes.create                             | App\Http\Controllers\TermosCondicoesController@create                              | web,auth     |
|        | PUT|PATCH | termos-condicoes/{termos_condico}                                                                                              | termos-condicoes.update                             | App\Http\Controllers\TermosCondicoesController@update                              | web,auth     |
|        | GET|HEAD  | termos-condicoes/{termos_condico}                                                                                              | termos-condicoes.show                               | App\Http\Controllers\TermosCondicoesController@show                                | web,auth     |
|        | DELETE    | termos-condicoes/{termos_condico}                                                                                              | termos-condicoes.destroy                            | App\Http\Controllers\TermosCondicoesController@destroy                             | web,auth     |
|        | GET|HEAD  | termos-condicoes/{termos_condico}/edit                                                                                         | termos-condicoes.edit                               | App\Http\Controllers\TermosCondicoesController@edit                                | web,auth     |
|        | GET|HEAD  | tipo_atendimentos                                                                                                              | tipo_atendimentos.index                             | App\Http\Controllers\TipoatendimentoController@index                               | web,auth     |
|        | POST      | tipo_atendimentos                                                                                                              | tipo_atendimentos.store                             | App\Http\Controllers\TipoatendimentoController@store                               | web,auth     |
|        | GET|HEAD  | tipo_atendimentos/create                                                                                                       | tipo_atendimentos.create                            | App\Http\Controllers\TipoatendimentoController@create                              | web,auth     |
|        | DELETE    | tipo_atendimentos/{tipo_atendimento}                                                                                           | tipo_atendimentos.destroy                           | App\Http\Controllers\TipoatendimentoController@destroy                             | web,auth     |
|        | GET|HEAD  | tipo_atendimentos/{tipo_atendimento}                                                                                           | tipo_atendimentos.show                              | App\Http\Controllers\TipoatendimentoController@show                                | web,auth     |
|        | PUT|PATCH | tipo_atendimentos/{tipo_atendimento}                                                                                           | tipo_atendimentos.update                            | App\Http\Controllers\TipoatendimentoController@update                              | web,auth     |
|        | GET|HEAD  | tipo_atendimentos/{tipo_atendimento}/edit                                                                                      | tipo_atendimentos.edit                              | App\Http\Controllers\TipoatendimentoController@edit                                | web,auth     |
|        | GET|HEAD  | tipo_logs                                                                                                                      | tipo_logs.index                                     | App\Http\Controllers\TipoLogController@index                                       | web,auth     |
|        | POST      | tipo_logs                                                                                                                      | tipo_logs.store                                     | App\Http\Controllers\TipoLogController@store                                       | web,auth     |
|        | GET|HEAD  | tipo_logs/create                                                                                                               | tipo_logs.create                                    | App\Http\Controllers\TipoLogController@create                                      | web,auth     |
|        | GET|HEAD  | tipo_logs/{tipo_log}                                                                                                           | tipo_logs.show                                      | App\Http\Controllers\TipoLogController@show                                        | web,auth     |
|        | DELETE    | tipo_logs/{tipo_log}                                                                                                           | tipo_logs.destroy                                   | App\Http\Controllers\TipoLogController@destroy                                     | web,auth     |
|        | PUT|PATCH | tipo_logs/{tipo_log}                                                                                                           | tipo_logs.update                                    | App\Http\Controllers\TipoLogController@update                                      | web,auth     |
|        | GET|HEAD  | tipo_logs/{tipo_log}/edit                                                                                                      | tipo_logs.edit                                      | App\Http\Controllers\TipoLogController@edit                                        | web,auth     |
|        | GET|HEAD  | users                                                                                                                          | users.index                                         | App\Http\Controllers\UserController@index                                          | web,auth     |
|        | POST      | users                                                                                                                          | users.store                                         | App\Http\Controllers\UserController@store                                          | web,auth     |
|        | GET|HEAD  | users/create                                                                                                                   | users.create                                        | App\Http\Controllers\UserController@create                                         | web,auth     |
|        | GET|HEAD  | users/{user}                                                                                                                   | users.show                                          | App\Http\Controllers\UserController@show                                           | web,auth     |
|        | DELETE    | users/{user}                                                                                                                   | users.destroy                                       | App\Http\Controllers\UserController@destroy                                        | web,auth     |
|        | PUT|PATCH | users/{user}                                                                                                                   | users.update                                        | App\Http\Controllers\UserController@update                                         | web,auth     |
|        | GET|HEAD  | users/{user}/edit                                                                                                              | users.edit                                          | App\Http\Controllers\UserController@edit                                           | web,auth     |
                 */
                
            )
        );
    }
}
