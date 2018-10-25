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
                    'titulo' => 'Agendamento[ExibirProfissional]',
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
                ),
                68 => array(
                    'id' => '69',
                    'titulo' => 'Cliente[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001000101',
                    'url_action' => 'clientes.create',
                    'url_model' => 'clientes',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de cliente.'
                ),
                69 => array(
                    'id' => '70',
                    'titulo' => 'Cliente[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001000110',
                    'url_action' => 'clientes.store',
                    'url_model' => 'clientes',
                    'descricao' => 'Salva o cliente.'
                ),
                70 => array(
                    'id' => '71',
                    'titulo' => 'Cliente[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001000111',
                    'url_action' => 'clientes.destroy',
                    'url_model' => 'clientes',
                    'descricao' => 'Exclui o cliente.'
                ),
                71 => array(
                    'id' => '72',
                    'titulo' => 'Cliente[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001001000',
                    'url_action' => 'clientes.edit',
                    'url_model' => 'clientes',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                72 => array(
                    'id' => '73',
                    'titulo' => 'Cliente[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001001001',
                    'url_action' => 'clientes.update',
                    'url_model' => 'clientes',
                    'descricao' => 'Atualiza os dados do cliente.'
                ),
                73 => array(
                    'id' => '74',
                    'titulo' => 'Cliente[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001001010',
                    'url_action' => 'clientes.index',
                    'url_model' => 'clientes',
                    'descricao' => 'Lista todos os clientes.'
                ),
                74 => array(
                    'id' => '75',
                    'titulo' => 'Cliente[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001001011',
                    'url_action' => 'clientes.show',
                    'url_model' => 'clientes',
                    'descricao' => 'Exibe os dados do cliente.'
                ),
                75 => array(
                    'id' => '76',
                    'titulo' => 'Consulta[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001001100',
                    'url_action' => 'consultas.create',
                    'url_model' => 'consultas',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de consulta.'
                ),
                76 => array(
                    'id' => '77',
                    'titulo' => 'Consulta[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001001101',
                    'url_action' => 'consultas.store',
                    'url_model' => 'consultas',
                    'descricao' => 'Salva a consulta.'
                ),
                77 => array(
                    'id' => '78',
                    'titulo' => 'Consulta[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001001110',
                    'url_action' => 'consultas.destroy',
                    'url_model' => 'consultas',
                    'descricao' => 'Exclui a consulta.'
                ),
                78 => array(
                    'id' => '79',
                    'titulo' => 'Consulta[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001001111',
                    'url_action' => 'consultas.edit',
                    'url_model' => 'consultas',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                79 => array(
                    'id' => '80',
                    'titulo' => 'Consulta[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001010000',
                    'url_action' => 'consultas.update',
                    'url_model' => 'consultas',
                    'descricao' => 'Atualiza os dados da consulta.'
                ),
                80 => array(
                    'id' => '81',
                    'titulo' => 'Consulta[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001010001',
                    'url_action' => 'consultas.index',
                    'url_model' => 'consultas',
                    'descricao' => 'Lista todas as consultas.'
                ),
                81 => array(
                    'id' => '82',
                    'titulo' => 'Consulta[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001010010',
                    'url_action' => 'consultas.show',
                    'url_model' => 'consultas',
                    'descricao' => 'Exibe os dados da consulta.'
                ),
                82 => array(
                    'id' => '83',
                    'titulo' => 'CupomDesconto[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001010011',
                    'url_action' => 'cupom_descontos.create',
                    'url_model' => 'cupom_descontos',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de cupom de desconto.'
                ),
                83 => array(
                    'id' => '84',
                    'titulo' => 'CupomDesconto[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001010100',
                    'url_action' => 'cupom_descontos.store',
                    'url_model' => 'cupom_descontos',
                    'descricao' => 'Salva o cupom de desconto.'
                ),
                84 => array(
                    'id' => '85',
                    'titulo' => 'CupomDesconto[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001010101',
                    'url_action' => 'cupom_descontos.destroy',
                    'url_model' => 'cupom_descontos',
                    'descricao' => 'Exclui o cupom de desconto.'
                ),
                85 => array(
                    'id' => '86',
                    'titulo' => 'CupomDesconto[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001010110',
                    'url_action' => 'cupom_descontos.edit',
                    'url_model' => 'cupom_descontos',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                86 => array(
                    'id' => '87',
                    'titulo' => 'CupomDesconto[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001010111',
                    'url_action' => 'cupom_descontos.update',
                    'url_model' => 'cupom_descontos',
                    'descricao' => 'Atualiza os dados do cupom de desconto.'
                ),
                87 => array(
                    'id' => '88',
                    'titulo' => 'CupomDesconto[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001011000',
                    'url_action' => 'cupom_descontos.index',
                    'url_model' => 'cupom_descontos',
                    'descricao' => 'Lista todos os do cupons de desconto.'
                ),
                88 => array(
                    'id' => '89',
                    'titulo' => 'CupomDesconto[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001011001',
                    'url_action' => 'cupom_descontos.show',
                    'url_model' => 'cupom_descontos',
                    'descricao' => 'Exibe os dados do do cupom de desconto.'
                ),
                89 => array(
                    'id' => '90',
                    'titulo' => 'Documento[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001011010',
                    'url_action' => 'documentos.get-user-by-cpf',
                    'url_model' => 'documentos',
                    'descricao' => 'Exibe o usuário por CPF.'
                ),
                90 => array(
                    'id' => '91',
                    'titulo' => 'Empresa[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001011011',
                    'url_action' => 'empresas.create',
                    'url_model' => 'empresas',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de empresa.'
                ),
                91 => array(
                    'id' => '92',
                    'titulo' => 'Empresa[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001011100',
                    'url_action' => 'empresas.store',
                    'url_model' => 'empresas',
                    'descricao' => 'Salva a empresa.'
                ),
                92 => array(
                    'id' => '93',
                    'titulo' => 'Empresa[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001011101',
                    'url_action' => 'empresas.destroy',
                    'url_model' => 'empresas',
                    'descricao' => 'Exclui a empresa.'
                ),
                93 => array(
                    'id' => '94',
                    'titulo' => 'Empresa[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001011110',
                    'url_action' => 'empresas.edit',
                    'url_model' => 'empresas',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                94 => array(
                    'id' => '95',
                    'titulo' => 'Empresa[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001011111',
                    'url_action' => 'empresas.update',
                    'url_model' => 'empresas',
                    'descricao' => 'Atualiza os dados da empresa.'
                ),
                95 => array(
                    'id' => '96',
                    'titulo' => 'Empresa[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001100000',
                    'url_action' => 'empresas.index',
                    'url_model' => 'empresas',
                    'descricao' => 'Lista todas as empresas.'
                ),
                96 => array(
                    'id' => '97',
                    'titulo' => 'Empresa[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001100001',
                    'url_action' => 'empresas.show',
                    'url_model' => 'empresas',
                    'descricao' => 'Exibe os dados da empresa.'
                ),
                97 => array(
                    'id' => '98',
                    'titulo' => 'Endereco[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001100010',
                    'url_action' => 'enderecos.create',
                    'url_model' => 'enderecos',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de endereço.'
                ),
                98 => array(
                    'id' => '99',
                    'titulo' => 'Endereco[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001100011',
                    'url_action' => 'enderecos.store',
                    'url_model' => 'enderecos',
                    'descricao' => 'Salva o endereço.'
                ),
                99 => array(
                    'id' => '100',
                    'titulo' => 'Endereco[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001100100',
                    'url_action' => 'enderecos.destroy',
                    'url_model' => 'enderecos',
                    'descricao' => 'Exclui o endereço.'
                ),
                100 => array(
                    'id' => '101',
                    'titulo' => 'Endereco[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001100101',
                    'url_action' => 'enderecos.edit',
                    'url_model' => 'enderecos',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                101 => array(
                    'id' => '102',
                    'titulo' => 'Endereco[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001100110',
                    'url_action' => 'enderecos.update',
                    'url_model' => 'enderecos',
                    'descricao' => 'Atualiza os dados do endereço.'
                ),
                102 => array(
                    'id' => '103',
                    'titulo' => 'Endereco[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001100111',
                    'url_action' => 'enderecos.index',
                    'url_model' => 'enderecos',
                    'descricao' => 'Lista todos os endereços.'
                ),
                103 => array(
                    'id' => '104',
                    'titulo' => 'Endereco[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001101000',
                    'url_action' => 'enderecos.show',
                    'url_model' => 'enderecos',
                    'descricao' => 'Exibe os dados do endereço.'
                ),
                104 => array(
                    'id' => '105',
                    'titulo' => 'Entidade[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001101001',
                    'url_action' => 'entidades.create',
                    'url_model' => 'entidades',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de entidade.'
                ),
                105 => array(
                    'id' => '106',
                    'titulo' => 'Entidade[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001101010',
                    'url_action' => 'entidades.store',
                    'url_model' => 'entidades',
                    'descricao' => 'Salva a entidade.'
                ),
                106 => array(
                    'id' => '107',
                    'titulo' => 'Entidade[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001101011',
                    'url_action' => 'entidades.destroy',
                    'url_model' => 'entidades',
                    'descricao' => 'Exclui a entidade.'
                ),
                107 => array(
                    'id' => '108',
                    'titulo' => 'Entidade[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001101100',
                    'url_action' => 'entidades.edit',
                    'url_model' => 'entidades',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                108 => array(
                    'id' => '109',
                    'titulo' => 'Entidade[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001101101',
                    'url_action' => 'entidades.update',
                    'url_model' => 'entidades',
                    'descricao' => 'Atualiza os dados da entidade'
                ),
                109 => array(
                    'id' => '110',
                    'titulo' => 'Entidade[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001101110',
                    'url_action' => 'entidades.index',
                    'url_model' => 'entidades',
                    'descricao' => 'Lista todos as entidades.'
                ),
                110 => array(
                    'id' => '111',
                    'titulo' => 'Entidade[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001101111',
                    'url_action' => 'entidades.show',
                    'url_model' => 'entidades',
                    'descricao' => 'Exibe os dados da entidade.'
                ),
                111 => array(
                    'id' => '112',
                    'titulo' => 'GrupoProcedimento[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001110000',
                    'url_action' => 'grupo_procedimentos.create',
                    'url_model' => 'grupo_procedimentos',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de grupo de procedimento.'
                ),
                112 => array(
                    'id' => '113',
                    'titulo' => 'GrupoProcedimento[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001110001',
                    'url_action' => 'grupo_procedimentos.store',
                    'url_model' => 'grupo_procedimentos',
                    'descricao' => 'Salva o grupo de procedimento.'
                ),
                113 => array(
                    'id' => '114',
                    'titulo' => 'GrupoProcedimento[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001110010',
                    'url_action' => 'grupo_procedimentos.destroy',
                    'url_model' => 'grupo_procedimentos',
                    'descricao' => 'Exclui o grupo de procedimento.'
                ),
                114 => array(
                    'id' => '115',
                    'titulo' => 'GrupoProcedimento[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001110011',
                    'url_action' => 'grupo_procedimentos.edit',
                    'url_model' => 'grupo_procedimentos',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                115 => array(
                    'id' => '116',
                    'titulo' => 'GrupoProcedimento[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001110100',
                    'url_action' => 'grupo_procedimentos.update',
                    'url_model' => 'grupo_procedimentos',
                    'descricao' => 'Atualiza os dados do grupo de procedimento.'
                ),
                116 => array(
                    'id' => '117',
                    'titulo' => 'GrupoProcedimento[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001110101',
                    'url_action' => 'grupo_procedimentos.index',
                    'url_model' => 'grupo_procedimentos',
                    'descricao' => 'Lista todos os grupos de procedimento.'
                ),
                117 => array(
                    'id' => '118',
                    'titulo' => 'GrupoProcedimento[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001110110',
                    'url_action' => 'grupo_procedimentos.show',
                    'url_model' => 'grupo_procedimentos',
                    'descricao' => 'Exibe os dados do grupo de procedimento.'
                ),
                118 => array(
                    'id' => '119',
                    'titulo' => 'ItemCheckup[ExcluirConsulta]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001110111',
                    'url_action' => 'item-checkups-consulta.destroy',
                    'url_model' => 'item_checkups',
                    'descricao' => 'Exclui o item checkup de consulta.'
                ),
                119 => array(
                    'id' => '120',
                    'titulo' => 'ItemCheckup[AdicionarConsulta]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001111000',
                    'url_action' => 'item-checkups-consulta.store',
                    'url_model' => 'item_checkups',
                    'descricao' => 'Salva o item checkup de consulta.'
                ),
                120 => array(
                    'id' => '121',
                    'titulo' => 'ItemCheckup[ExcluirProcedimento]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001111001',
                    'url_action' => 'item-checkups-exame.destroy',
                    'url_model' => 'item_checkups',
                    'descricao' => 'Exclui o item checkup de procedimento.'
                ),
                121 => array(
                    'id' => '122',
                    'titulo' => 'ItemCheckup[adicionarProcedimento]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001111010',
                    'url_action' => 'item-checkups-exame.store',
                    'url_model' => 'item_checkups',
                    'descricao' => 'Salva o item checkup de procedimento.'
                ),
                122 => array(
                    'id' => '123',
                    'titulo' => 'Itemmenu[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001111011',
                    'url_action' => 'itemmenus.create',
                    'url_model' => 'itemmenus',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de item de menu.'
                ),
                123 => array(
                    'id' => '124',
                    'titulo' => 'Itemmenu[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001111100',
                    'url_action' => 'itemmenus.store',
                    'url_model' => 'itemmenus',
                    'descricao' => 'Salva o item de menu.'
                ),
                124 => array(
                    'id' => '125',
                    'titulo' => 'Itemmenu[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001111101',
                    'url_action' => 'itemmenus.destroy',
                    'url_model' => 'itemmenus',
                    'descricao' => 'Exclui o item de menu.'
                ),
                125 => array(
                    'id' => '126',
                    'titulo' => 'Itemmenu[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001111110',
                    'url_action' => 'itemmenus.edit',
                    'url_model' => 'itemmenus',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                126 => array(
                    'id' => '127',
                    'titulo' => 'Itemmenu[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0001111111',
                    'url_action' => 'itemmenus.update',
                    'url_model' => 'itemmenus',
                    'descricao' => 'Atualiza os dados do item de menu.'
                ),
                127 => array(
                    'id' => '128',
                    'titulo' => 'Itemmenu[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010000000',
                    'url_action' => 'itemmenus.index',
                    'url_model' => 'itemmenus',
                    'descricao' => 'Lista todos os itens de menu.'
                ),
                128 => array(
                    'id' => '129',
                    'titulo' => 'Itemmenu[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010000001',
                    'url_action' => 'itemmenus.show',
                    'url_model' => 'itemmenus',
                    'descricao' => 'Exibe os dados do item de menu.'
                ),
                129 => array(
                    'id' => '130',
                    'titulo' => 'Atendimento[ExibirData]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010000010',
                    'url_action' => 'mostrar-data-atendimento',
                    'url_model' => 'atendimentos',
                    'descricao' => 'Exibe a data do atendimento.'
                ),
                130 => array(
                    'id' => '131',
                    'titulo' => 'Preco[ExibirData]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010000011',
                    'url_action' => 'mostrar-data-preco',
                    'url_model' => 'precos',
                    'descricao' => 'Exibe a data do preço.'
                ),
                131 => array(
                    'id' => '132',
                    'titulo' => 'Preco[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010000100',
                    'url_action' => 'precos.create',
                    'url_model' => 'precos',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de preço.'
                ),
                132 => array(
                    'id' => '133',
                    'titulo' => 'Preco[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010000101',
                    'url_action' => 'precos.store',
                    'url_model' => 'precos',
                    'descricao' => 'Salva o preço.'
                ),
                133 => array(
                    'id' => '134',
                    'titulo' => 'Preco[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010000110',
                    'url_action' => 'precos.destroy',
                    'url_model' => 'precos',
                    'descricao' => 'Exclui o preço.'
                ),
                134 => array(
                    'id' => '135',
                    'titulo' => 'Preco[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010000111',
                    'url_action' => 'precos.edit',
                    'url_model' => 'precos',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                135 => array(
                    'id' => '136',
                    'titulo' => 'Preco[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010001000',
                    'url_action' => 'precos.update',
                    'url_model' => 'precos',
                    'descricao' => 'Atualiza os dados do preço.'
                ),
                136 => array(
                    'id' => '137',
                    'titulo' => 'Preco[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010001001',
                    'url_action' => 'precos.index',
                    'url_model' => 'precos',
                    'descricao' => 'Lista todos os preços.'
                ),
                137 => array(
                    'id' => '138',
                    'titulo' => 'Logradouro[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010001010',
                    'url_action' => 'logradouros.show',
                    'url_model' => 'logradouros',
                    'descricao' => 'Exibe os dados do logradouro.'
                ),
                138 => array(
                    'id' => '139',
                    'titulo' => 'Logradouro[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010001011',
                    'url_action' => 'logradouros.create',
                    'url_model' => 'logradouros',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de logradouro.'
                ),
                139 => array(
                    'id' => '140',
                    'titulo' => 'Logradouro[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010001100',
                    'url_action' => 'logradouros.store',
                    'url_model' => 'logradouros',
                    'descricao' => 'Salva o logradouro.'
                ),
                140 => array(
                    'id' => '141',
                    'titulo' => 'Logradouro[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010001101',
                    'url_action' => 'logradouros.destroy',
                    'url_model' => 'logradouros',
                    'descricao' => 'Exclui o logradouro.'
                ),
                141 => array(
                    'id' => '142',
                    'titulo' => 'Logradouro[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010001110',
                    'url_action' => 'logradouros.edit',
                    'url_model' => 'logradouros',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                142 => array(
                    'id' => '143',
                    'titulo' => 'Logradouro[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010001111',
                    'url_action' => 'logradouros.update',
                    'url_model' => 'logradouros',
                    'descricao' => 'Atualiza os dados do logradouro.'
                ),
                143 => array(
                    'id' => '144',
                    'titulo' => 'Logradouro[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010010000',
                    'url_action' => 'logradouros.index',
                    'url_model' => 'logradouros',
                    'descricao' => 'Lista todos os logradouros.'
                ),
                144 => array(
                    'id' => '145',
                    'titulo' => 'Preco[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010010001',
                    'url_action' => 'precos.show',
                    'url_model' => 'precos',
                    'descricao' => 'Exibe o preços.'
                ),
                145 => array(
                    'id' => '146',
                    'titulo' => 'Menu[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010010010',
                    'url_action' => 'menus.create',
                    'url_model' => 'menus',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de menu.'
                ),
                146 => array(
                    'id' => '147',
                    'titulo' => 'Menu[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010010011',
                    'url_action' => 'menus.store',
                    'url_model' => 'menus',
                    'descricao' => 'Salva o menu.'
                ),
                147 => array(
                    'id' => '148',
                    'titulo' => 'Menu[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010010100',
                    'url_action' => 'menus.destroy',
                    'url_model' => 'menus',
                    'descricao' => 'Exclui o menu.'
                ),
                148 => array(
                    'id' => '149',
                    'titulo' => 'Menu[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010010101',
                    'url_action' => 'menus.edit',
                    'url_model' => 'menus',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                149 => array(
                    'id' => '150',
                    'titulo' => 'Menu[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010010110',
                    'url_action' => 'menus.update',
                    'url_model' => 'menus',
                    'descricao' => 'Atualiza os dados do menu.'
                ),
                150 => array(
                    'id' => '151',
                    'titulo' => 'Menu[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010010111',
                    'url_action' => 'menus.index',
                    'url_model' => 'menus',
                    'descricao' => 'Lista todos os menus.'
                ),
                151 => array(
                    'id' => '152',
                    'titulo' => 'Menu[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010011000',
                    'url_action' => 'menus.show',
                    'url_model' => 'menus',
                    'descricao' => 'Exibe os dados do menu.'
                ),
                152 => array(
                    'id' => '153',
                    'titulo' => 'Mensagem[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010011001',
                    'url_action' => 'listar-notificacoes',
                    'url_model' => 'mensagems',
                    'descricao' => 'Lista todos as mensagens.'
                ),
                153 => array(
                    'id' => '154',
                    'titulo' => 'Mensagem[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010011010',
                    'url_action' => 'exibir-notificacao',
                    'url_model' => 'mensagems',
                    'descricao' => 'Exibe os dados da mensagem.'
                ),
                154 => array(
                    'id' => '155',
                    'titulo' => 'Perfiluser[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010011011',
                    'url_action' => 'perfilusers.create',
                    'url_model' => 'perfilusers',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de perfil de usuário.'
                ),
                155 => array(
                    'id' => '156',
                    'titulo' => 'Perfiluser[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010011100',
                    'url_action' => 'perfilusers.store',
                    'url_model' => 'perfilusers',
                    'descricao' => 'Salva o perfil de usuário.'
                ),
                156 => array(
                    'id' => '157',
                    'titulo' => 'Perfiluser[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010011101',
                    'url_action' => 'perfilusers.destroy',
                    'url_model' => 'perfilusers',
                    'descricao' => 'Exclui o perfil de usuário.'
                ),
                157 => array(
                    'id' => '158',
                    'titulo' => 'Perfiluser[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010011110',
                    'url_action' => 'perfilusers.edit',
                    'url_model' => 'perfilusers',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                158 => array(
                    'id' => '159',
                    'titulo' => 'Perfiluser[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010011111',
                    'url_action' => 'perfilusers.update',
                    'url_model' => 'perfilusers',
                    'descricao' => 'Atualiza os dados do perfil de usuário.'
                ),
                159 => array(
                    'id' => '160',
                    'titulo' => 'Perfiluser[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010100000',
                    'url_action' => 'perfilusers.index',
                    'url_model' => 'perfilusers',
                    'descricao' => 'Lista todos os perfis de usuário.'
                ),
                160 => array(
                    'id' => '161',
                    'titulo' => 'Perfiluser[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010100001',
                    'url_action' => 'perfilusers.show',
                    'url_model' => 'perfilusers',
                    'descricao' => 'Exibe os dados do perfil de usuário.'
                ),
                161 => array(
                    'id' => '162',
                    'titulo' => 'Permissao[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010100010',
                    'url_action' => 'permissaos.create',
                    'url_model' => 'permissaos',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de permissão.'
                ),
                162 => array(
                    'id' => '163',
                    'titulo' => 'Permissao[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010100011',
                    'url_action' => 'permissaos.store',
                    'url_model' => 'permissaos',
                    'descricao' => 'Salva a permissão.'
                ),
                163 => array(
                    'id' => '164',
                    'titulo' => 'Permissao[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010100100',
                    'url_action' => 'permissaos.destroy',
                    'url_model' => 'permissaos',
                    'descricao' => 'Exclui a permissão.'
                ),
                164 => array(
                    'id' => '165',
                    'titulo' => 'Permissao[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010100101',
                    'url_action' => 'permissaos.edit',
                    'url_model' => 'permissaos',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                165 => array(
                    'id' => '166',
                    'titulo' => 'Permissao[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010100110',
                    'url_action' => 'permissaos.update',
                    'url_model' => 'permissaos',
                    'descricao' => 'Atualiza os dados da permissão.'
                ),
                166 => array(
                    'id' => '167',
                    'titulo' => 'Permissao[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010100111',
                    'url_action' => 'permissaos.index',
                    'url_model' => 'permissaos',
                    'descricao' => 'Lista todas as permissões.'
                ),
                167 => array(
                    'id' => '168',
                    'titulo' => 'Permissao[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010101000',
                    'url_action' => 'permissaos.show',
                    'url_model' => 'permissaos',
                    'descricao' => 'Exibe os dados da permissão.'
                ),
                168 => array(
                    'id' => '169',
                    'titulo' => 'Plano[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010101001',
                    'url_action' => 'planos.create',
                    'url_model' => 'planos',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de permissão.'
                ),
                169 => array(
                    'id' => '170',
                    'titulo' => 'Plano[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010101010',
                    'url_action' => 'planos.store',
                    'url_model' => 'planos',
                    'descricao' => 'Salva o plano.'
                ),
                170 => array(
                    'id' => '171',
                    'titulo' => 'Plano[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010101011',
                    'url_action' => 'planos.destroy',
                    'url_model' => 'planos',
                    'descricao' => 'Exclui o plano.'
                ),
                171 => array(
                    'id' => '172',
                    'titulo' => 'Plano[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010101100',
                    'url_action' => 'planos.edit',
                    'url_model' => 'planos',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                172 => array(
                    'id' => '173',
                    'titulo' => 'Plano[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010101101',
                    'url_action' => 'planos.update',
                    'url_model' => 'planos',
                    'descricao' => 'Atualiza os dados do plano.'
                ),
                173 => array(
                    'id' => '174',
                    'titulo' => 'Plano[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010101110',
                    'url_action' => 'planos.index',
                    'url_model' => 'planos',
                    'descricao' => 'Lista todos os planos.'
                ),
                174 => array(
                    'id' => '175',
                    'titulo' => 'Plano[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010101111',
                    'url_action' => 'planos.show',
                    'url_model' => 'planos',
                    'descricao' => 'Exibe os dados do plano.'
                ),
                175 => array(
                    'id' => '176',
                    'titulo' => 'Procedimento[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010110000',
                    'url_action' => 'procedimentos.create',
                    'url_model' => 'procedimentos',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de procedimento.'
                ),
                176 => array(
                    'id' => '177',
                    'titulo' => 'Procedimento[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010110001',
                    'url_action' => 'procedimentos.store',
                    'url_model' => 'procedimentos',
                    'descricao' => 'Salva o procedimento.'
                ),
                177 => array(
                    'id' => '178',
                    'titulo' => 'Procedimento[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010110010',
                    'url_action' => 'procedimentos.destroy',
                    'url_model' => 'procedimentos',
                    'descricao' => 'Exclui o procedimento.'
                ),
                178 => array(
                    'id' => '179',
                    'titulo' => 'Procedimento[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010110011',
                    'url_action' => 'procedimentos.edit',
                    'url_model' => 'procedimentos',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                179 => array(
                    'id' => '180',
                    'titulo' => 'Procedimento[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010110100',
                    'url_action' => 'procedimentos.update',
                    'url_model' => 'procedimentos',
                    'descricao' => 'Atualiza os dados do procedimento.'
                ),
                180 => array(
                    'id' => '181',
                    'titulo' => 'Procedimento[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010110101',
                    'url_action' => 'procedimentos.index',
                    'url_model' => 'procedimentos',
                    'descricao' => 'Lista todos os procedimentos.'
                ),
                181 => array(
                    'id' => '182',
                    'titulo' => 'Procedimento[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010110110',
                    'url_action' => 'procedimentos.show',
                    'url_model' => 'procedimentos',
                    'descricao' => 'Exibe os dados do procedimento.'
                ),
                182 => array(
                    'id' => '183',
                    'titulo' => 'Profissional[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010110111',
                    'url_action' => 'profissionals.create',
                    'url_model' => 'profissionals',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de profissional.'
                ),
                183 => array(
                    'id' => '184',
                    'titulo' => 'Profissional[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010111000',
                    'url_action' => 'profissionals.store',
                    'url_model' => 'profissionals',
                    'descricao' => 'Salva o profissional.'
                ),
                184 => array(
                    'id' => '185',
                    'titulo' => 'Profissional[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010111001',
                    'url_action' => 'profissionals.destroy',
                    'url_model' => 'profissionals',
                    'descricao' => 'Exclui o profissional.'
                ),
                185 => array(
                    'id' => '186',
                    'titulo' => 'Profissional[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010111010',
                    'url_action' => 'profissionals.edit',
                    'url_model' => 'profissionals',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                186 => array(
                    'id' => '187',
                    'titulo' => 'Profissional[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010111011',
                    'url_action' => 'profissionals.update',
                    'url_model' => 'profissionals',
                    'descricao' => 'Atualiza os dados do profissional.'
                ),
                187 => array(
                    'id' => '188',
                    'titulo' => 'Profissional[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010111100',
                    'url_action' => 'profissionals.index',
                    'url_model' => 'profissionals',
                    'descricao' => 'Lista todos os profissionais.'
                ),
                188 => array(
                    'id' => '189',
                    'titulo' => 'Profissional[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010111101',
                    'url_action' => 'profissionals.show',
                    'url_model' => 'profissionals',
                    'descricao' => 'Exibe os dados do profissional.'
                ),
                189 => array(
                    'id' => '190',
                    'titulo' => 'Profissional[ListarporClinica]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010111110',
                    'url_action' => 'listar-profissionals-por-clinica',
                    'url_model' => 'profissionals',
                    'descricao' => 'Exibe os dados do profissional.'
                ),
                190 => array(
                    'id' => '191',
                    'titulo' => 'RegistroLog[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0010111111',
                    'url_action' => 'registro_logs.create',
                    'url_model' => 'registro_logs',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de registro de log.'
                ),
                191 => array(
                    'id' => '192',
                    'titulo' => 'RegistroLog[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011000000',
                    'url_action' => 'registro_logs.store',
                    'url_model' => 'registro_logs',
                    'descricao' => 'Salva o registro de log.'
                ),
                192 => array(
                    'id' => '193',
                    'titulo' => 'RegistroLog[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011000001',
                    'url_action' => 'registro_logs.destroy',
                    'url_model' => 'registro_logs',
                    'descricao' => 'Exclui o registro de log.'
                ),
                193 => array(
                    'id' => '194',
                    'titulo' => 'RegistroLog[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011000010',
                    'url_action' => 'registro_logs.edit',
                    'url_model' => 'registro_logs',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                194 => array(
                    'id' => '195',
                    'titulo' => 'RegistroLog[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011000011',
                    'url_action' => 'registro_logs.update',
                    'url_model' => 'registro_logs',
                    'descricao' => 'Atualiza os dados do registro de log.'
                ),
                195 => array(
                    'id' => '196',
                    'titulo' => 'RegistroLog[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011000100',
                    'url_action' => 'registro_logs.index',
                    'url_model' => 'registro_logs',
                    'descricao' => 'Lista todos os registros de log.'
                ),
                196 => array(
                    'id' => '197',
                    'titulo' => 'RegistroLog[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011000101',
                    'url_action' => 'registro_logs.show',
                    'url_model' => 'registro_logs',
                    'descricao' => 'Exibe os dados do registro de log.'
                ),
                197 => array(
                    'id' => '198',
                    'titulo' => 'Representante[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011000110',
                    'url_action' => 'representantes.create',
                    'url_model' => 'representantes',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de representante.'
                ),
                198 => array(
                    'id' => '199',
                    'titulo' => 'Representante[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011000111',
                    'url_action' => 'representantes.store',
                    'url_model' => 'representantes',
                    'descricao' => 'Salva o representante.'
                ),
                199 => array(
                    'id' => '200',
                    'titulo' => 'Representante[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011001000',
                    'url_action' => 'representantes.destroy',
                    'url_model' => 'representantes',
                    'descricao' => 'Exclui o representante.'
                ),
                200 => array(
                    'id' => '201',
                    'titulo' => 'Representante[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011001001',
                    'url_action' => 'representantes.edit',
                    'url_model' => 'representantes',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                201 => array(
                    'id' => '202',
                    'titulo' => 'Representante[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011001010',
                    'url_action' => 'representantes.update',
                    'url_model' => 'representantes',
                    'descricao' => 'Atualiza os dados do representante.'
                ),
                202 => array(
                    'id' => '203',
                    'titulo' => 'Representante[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011001011',
                    'url_action' => 'representantes.index',
                    'url_model' => 'representantes',
                    'descricao' => 'Lista todos os representantes.'
                ),
                203 => array(
                    'id' => '204',
                    'titulo' => 'Representante[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011001100',
                    'url_action' => 'representantes.show',
                    'url_model' => 'representantes',
                    'descricao' => 'Exibe os dados do representante.'
                ),
                204 => array(
                    'id' => '205',
                    'titulo' => 'Representante[CriarModal]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011001101',
                    'url_action' => 'representantes.createModal',
                    'url_model' => 'representantes',
                    'descricao' => 'Cria modal para representantes.'
                ),
                205 => array(
                    'id' => '206',
                    'titulo' => 'Representante[ExibirModal]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011001110',
                    'url_action' => 'representantes.showModal',
                    'url_model' => 'representantes',
                    'descricao' => 'Cria modal para exibir os dados do representante.'
                ),
                206 => array(
                    'id' => '207',
                    'titulo' => 'Representante[EditarModal]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011001111',
                    'url_action' => 'representantes.editModal',
                    'url_model' => 'representantes',
                    'descricao' => 'Cria modal para editar os dados do representante.'
                ),
                207 => array(
                    'id' => '208',
                    'titulo' => 'ServicoAdicional[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011010000',
                    'url_action' => 'servico_adicionals.create',
                    'url_model' => 'servico_adicionals',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de serviço adicional.'
                ),
                208 => array(
                    'id' => '209',
                    'titulo' => 'ServicoAdicional[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011010001',
                    'url_action' => 'servico_adicionals.store',
                    'url_model' => 'servico_adicionals',
                    'descricao' => 'Salva o serviço adicional.'
                ),
                209 => array(
                    'id' => '210',
                    'titulo' => 'ServicoAdicional[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011010010',
                    'url_action' => 'servico_adicionals.destroy',
                    'url_model' => 'servico_adicionals',
                    'descricao' => 'Exclui o serviço adicional.'
                ),
                210 => array(
                    'id' => '211',
                    'titulo' => 'ServicoAdicional[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011010011',
                    'url_action' => 'servico_adicionals.edit',
                    'url_model' => 'servico_adicionals',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                211 => array(
                    'id' => '212',
                    'titulo' => 'ServicoAdicional[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011010100',
                    'url_action' => 'servico_adicionals.update',
                    'url_model' => 'servico_adicionals',
                    'descricao' => 'Atualiza os dados do serviço adicional.'
                ),
                212 => array(
                    'id' => '213',
                    'titulo' => 'ServicoAdicional[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011010101',
                    'url_action' => 'servico_adicionals.index',
                    'url_model' => 'servico_adicionals',
                    'descricao' => 'Lista todos os serviços adicionais.'
                ),
                213 => array(
                    'id' => '214',
                    'titulo' => 'ServicoAdicional[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011010110',
                    'url_action' => 'servico_adicionals.show',
                    'url_model' => 'servico_adicionals',
                    'descricao' => 'Exibe os dados do serviço adicional.'
                ),
                214 => array(
                    'id' => '215',
                    'titulo' => 'TermosCondicoes[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011010111',
                    'url_action' => 'termos-condicoes.create',
                    'url_model' => 'termos-condicoes',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de termos e condições.'
                ),
                215 => array(
                    'id' => '216',
                    'titulo' => 'TermosCondicoes[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011011000',
                    'url_action' => 'termos-condicoes.store',
                    'url_model' => 'termos-condicoes',
                    'descricao' => 'Salva os termos e condições.'
                ),
                216 => array(
                    'id' => '217',
                    'titulo' => 'TermosCondicoes[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011011001',
                    'url_action' => 'termos-condicoes.destroy',
                    'url_model' => 'termos-condicoes',
                    'descricao' => 'Exclui os termos e condições.'
                ),
                217 => array(
                    'id' => '218',
                    'titulo' => 'TermosCondicoes[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011011010',
                    'url_action' => 'termos-condicoes.edit',
                    'url_model' => 'termos-condicoes',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                218 => array(
                    'id' => '219',
                    'titulo' => 'TermosCondicoes[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011011011',
                    'url_action' => 'termos-condicoes.update',
                    'url_model' => 'termos-condicoes',
                    'descricao' => 'Atualiza os dados dos termos e condições.'
                ),
                219 => array(
                    'id' => '220',
                    'titulo' => 'TermosCondicoes[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011011100',
                    'url_action' => 'termos-condicoes.index',
                    'url_model' => 'termos-condicoes',
                    'descricao' => 'Lista todos os termos e condições.'
                ),
                220 => array(
                    'id' => '221',
                    'titulo' => 'TermosCondicoes[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011011101',
                    'url_action' => 'termos-condicoes.show',
                    'url_model' => 'termos-condicoes',
                    'descricao' => 'Exibe os dados dos termos e condições.'
                ),
                221 => array(
                    'id' => '222',
                    'titulo' => 'Tipoatendimento[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011011110',
                    'url_action' => 'tipo_atendimentos.create',
                    'url_model' => 'tipo_atendimentos',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de tipo de atendimento.'
                ),
                222 => array(
                    'id' => '223',
                    'titulo' => 'Tipoatendimento[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011011111',
                    'url_action' => 'tipo_atendimentos.store',
                    'url_model' => 'tipo_atendimentos',
                    'descricao' => 'Salva o tipo de atendimento.'
                ),
                223 => array(
                    'id' => '224',
                    'titulo' => 'Tipoatendimento[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011100000',
                    'url_action' => 'tipo_atendimentos.destroy',
                    'url_model' => 'tipo_atendimentos',
                    'descricao' => 'Exclui o tipo de atendimento.'
                ),
                224 => array(
                    'id' => '225',
                    'titulo' => 'Tipoatendimento[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011100001',
                    'url_action' => 'tipo_atendimentos.edit',
                    'url_model' => 'tipo_atendimentos',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                225 => array(
                    'id' => '226',
                    'titulo' => 'Tipoatendimento[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011100010',
                    'url_action' => 'tipo_atendimentos.update',
                    'url_model' => 'tipo_atendimentos',
                    'descricao' => 'Atualiza os dados do tipo de atendimento.'
                ),
                226 => array(
                    'id' => '227',
                    'titulo' => 'Tipoatendimento[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011100011',
                    'url_action' => 'tipo_atendimentos.index',
                    'url_model' => 'tipo_atendimentos',
                    'descricao' => 'Lista todos os tipos de atendimento.'
                ),
                227 => array(
                    'id' => '228',
                    'titulo' => 'Tipoatendimento[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011100100',
                    'url_action' => 'tipo_atendimentos.show',
                    'url_model' => 'tipo_atendimentos',
                    'descricao' => 'Exibe os dados do tipo de atendimento.'
                ),
                228 => array(
                    'id' => '229',
                    'titulo' => 'TipoLog[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011100101',
                    'url_action' => 'tipo_logs.create',
                    'url_model' => 'tipo_logs',
                    'descricao' => 'Realiza a exibição do formulário de cadastro de tipo de log.'
                ),
                229 => array(
                    'id' => '230',
                    'titulo' => 'TipoLog[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011100110',
                    'url_action' => 'tipo_logs.store',
                    'url_model' => 'tipo_logs',
                    'descricao' => 'Salva o tipo de log.'
                ),
                230 => array(
                    'id' => '231',
                    'titulo' => 'TipoLog[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011100111',
                    'url_action' => 'tipo_logs.destroy',
                    'url_model' => 'tipo_logs',
                    'descricao' => 'Exclui o tipo de log.'
                ),
                231 => array(
                    'id' => '232',
                    'titulo' => 'TipoLog[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011101000',
                    'url_action' => 'tipo_logs.edit',
                    'url_model' => 'tipo_logs',
                    'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                232 => array(
                    'id' => '233',
                    'titulo' => 'TipoLog[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011101001',
                    'url_action' => 'tipo_logs.update',
                    'url_model' => 'tipo_logs',
                    'descricao' => 'Atualiza os dados do tipo de log.'
                ),
                233 => array(
                    'id' => '234',
                    'titulo' => 'TipoLog[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011101010',
                    'url_action' => 'tipo_logs.index',
                    'url_model' => 'tipo_logs',
                    'descricao' => 'Lista todos os tipos de log.'
                ),
                234 => array(
                    'id' => '235',
                    'titulo' => 'TipoLog[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0011101011',
                    'url_action' => 'tipo_logs.show',
                    'url_model' => 'tipo_logs',
                    'descricao' => 'Exibe os dados do tipo de log.'
                )
                
            )
        );
    }
}
