<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcedimentosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('procedimentos')->delete();
        
        DB::table('procedimentos')->insert(
            array(
                0 => array(
                    'id' => '8381',
                    'cd_procedimento' => '10101012',
                    'ds_procedimento' => 'Em consultório (no horário normal ou preestabelecido)',
                    'especialidade_id' => null
                ),
                1 => array(
                    'id' => '8382',
                    'cd_procedimento' => '10101020',
                    'ds_procedimento' => 'Em domicílio',
                    'especialidade_id' => null
                ),
                2 => array(
                    'id' => '8383',
                    'cd_procedimento' => '10101039',
                    'ds_procedimento' => 'Em pronto socorro	        ',
                    'especialidade_id' => null
                ),
                3 => array(
                    'id' => '8388',
                    'cd_procedimento' => '10104011',
                    'ds_procedimento' => 'Atendimento do intensivista diarista (por dia e por paciente)	     ',
                    'especialidade_id' => null
                ),
                4 => array(
                    'id' => '8434',
                    'cd_procedimento' => '20103182',
                    'ds_procedimento' => 'Desvios posturais da coluna vertebral	     ',
                    'especialidade_id' => null
                ),
                5 => array(
                    'id' => '8450',
                    'cd_procedimento' => '20103344',
                    'ds_procedimento' => 'Miopatias    ',
                    'especialidade_id' => null
                ),
                6 => array(
                    'id' => '8459',
                    'cd_procedimento' => '20103441',
                    'ds_procedimento' => 'Paraparesia/tetraparesia	',
                    'especialidade_id' => null
                ),
                7 => array(
                    'id' => '8460',
                    'cd_procedimento' => '20103450',
                    'ds_procedimento' => 'Paraplegia e tetraplegia	',
                    'especialidade_id' => null
                ),
                8 => array(
                    'id' => '8461',
                    'cd_procedimento' => '20103468',
                    'ds_procedimento' => 'Parkinson    ',
                    'especialidade_id' => null
                ),
                9 => array(
                    'id' => '8463',
                    'cd_procedimento' => '20103514',
                    'ds_procedimento' => 'Patologia osteomioarticular em diferentes segmentos da coluna	     ',
                    'especialidade_id' => null
                ),
                10 => array(
                    'id' => '8465',
                    'cd_procedimento' => '20103484',
                    'ds_procedimento' => 'Patologia osteomioarticular em um membro	 ',
                    'especialidade_id' => null
                ),
                11 => array(
                    'id' => '8466',
                    'cd_procedimento' => '20103506',
                    'ds_procedimento' => 'Patologia osteomioarticular em um segmento da coluna ',
                    'especialidade_id' => null
                ),
                12 => array(
                    'id' => '8484',
                    'cd_procedimento' => '20103689',
                    'ds_procedimento' => 'Retardo do desenvolvimento psicomotor	     ',
                    'especialidade_id' => null
                ),
                13 => array(
                    'id' => '8487',
                    'cd_procedimento' => '20103719',
                    'ds_procedimento' => 'Sinusites    ',
                    'especialidade_id' => null
                ),
                14 => array(
                    'id' => '8494',
                    'cd_procedimento' => '20104316',
                    'ds_procedimento' => 'Curativo de ouvido (cada)	',
                    'especialidade_id' => null
                ),
                15 => array(
                    'id' => '8520',
                    'cd_procedimento' => '20201028',
                    'ds_procedimento' => 'Acompanhamento peroperatório ',
                    'especialidade_id' => null
                ),
                16 => array(
                    'id' => '8556',
                    'cd_procedimento' => '30101948',
                    'ds_procedimento' => 'Cantoplastia ungueal	    ',
                    'especialidade_id' => null
                ),
                17 => array(
                    'id' => '8575',
                    'cd_procedimento' => '30101301',
                    'ds_procedimento' => 'Enxerto cartilaginoso	    ',
                    'especialidade_id' => null
                ),
                18 => array(
                    'id' => '8576',
                    'cd_procedimento' => '30101310',
                    'ds_procedimento' => 'Enxerto composto	        ',
                    'especialidade_id' => null
                ),
                19 => array(
                    'id' => '8577',
                    'cd_procedimento' => '30101328',
                    'ds_procedimento' => 'Enxerto de mucosa	        ',
                    'especialidade_id' => null
                ),
                20 => array(
                    'id' => '8582',
                    'cd_procedimento' => '30101379',
                    'ds_procedimento' => 'Escalpo total - tratamento cirúrgico	     ',
                    'especialidade_id' => null
                ),
                21 => array(
                    'id' => '8625',
                    'cd_procedimento' => '30101824',
                    'ds_procedimento' => 'Tratamento cirúrgico de bridas constrictivas ',
                    'especialidade_id' => null
                ),
                22 => array(
                    'id' => '8640',
                    'cd_procedimento' => '30201055',
                    'ds_procedimento' => 'Excisão em cunha	        ',
                    'especialidade_id' => null
                ),
                23 => array(
                    'id' => '8641',
                    'cd_procedimento' => '30201063',
                    'ds_procedimento' => 'Frenotomia labial	        ',
                    'especialidade_id' => null
                ),
                24 => array(
                    'id' => '8647',
                    'cd_procedimento' => '30202019',
                    'ds_procedimento' => 'Alongamento cirúrgico do palato mole	     ',
                    'especialidade_id' => null
                ),
                25 => array(
                    'id' => '8650',
                    'cd_procedimento' => '30202043',
                    'ds_procedimento' => 'Excisão de tumor de boca com mandibulectomia ',
                    'especialidade_id' => null
                ),
                26 => array(
                    'id' => '8657',
                    'cd_procedimento' => '30202124',
                    'ds_procedimento' => 'Palatoplastia parcial	    ',
                    'especialidade_id' => null
                ),
                27 => array(
                    'id' => '8675',
                    'cd_procedimento' => '30205034',
                    'ds_procedimento' => 'Adeno-amigdalectomia	    ',
                    'especialidade_id' => null
                ),
                28 => array(
                    'id' => '8678',
                    'cd_procedimento' => '30205050',
                    'ds_procedimento' => 'Amigdalectomia das palatinas ',
                    'especialidade_id' => null
                ),
                29 => array(
                    'id' => '8683',
                    'cd_procedimento' => '30205107',
                    'ds_procedimento' => 'Corpo estranho de faringe - retirada sob anestesia geral	         ',
                    'especialidade_id' => null
                ),
                30 => array(
                    'id' => '8685',
                    'cd_procedimento' => '30205140',
                    'ds_procedimento' => 'Faringolaringectomia	    ',
                    'especialidade_id' => null
                ),
                31 => array(
                    'id' => '8686',
                    'cd_procedimento' => '30205158',
                    'ds_procedimento' => 'Faringolaringoesofagectomia total	         ',
                    'especialidade_id' => null
                ),
                32 => array(
                    'id' => '8694',
                    'cd_procedimento' => '30205220',
                    'ds_procedimento' => 'Tonsilectomia a laser	    ',
                    'especialidade_id' => null
                ),
                33 => array(
                    'id' => '8696',
                    'cd_procedimento' => '30205247',
                    'ds_procedimento' => 'Uvulopalatofaringoplastia (qualquer técnica) ',
                    'especialidade_id' => null
                ),
                34 => array(
                    'id' => '8698',
                    'cd_procedimento' => '30206014',
                    'ds_procedimento' => 'Alargamento de traqueostomia ',
                    'especialidade_id' => null
                ),
                35 => array(
                    'id' => '8700',
                    'cd_procedimento' => '30206030',
                    'ds_procedimento' => 'Aritenoidectomia ou aritenopexia via externa ',
                    'especialidade_id' => null
                ),
                36 => array(
                    'id' => '8704',
                    'cd_procedimento' => '30206120',
                    'ds_procedimento' => 'Laringectomia parcial	    ',
                    'especialidade_id' => null
                ),
                37 => array(
                    'id' => '8707',
                    'cd_procedimento' => '30206200',
                    'ds_procedimento' => 'Laringotraqueoplastia	    ',
                    'especialidade_id' => null
                ),
                38 => array(
                    'id' => '8744',
                    'cd_procedimento' => '30208050',
                    'ds_procedimento' => 'Osteotomia tipo Lefort I	',
                    'especialidade_id' => null
                ),
                39 => array(
                    'id' => '8745',
                    'cd_procedimento' => '30208068',
                    'ds_procedimento' => 'Osteotomia tipo Lefort II	',
                    'especialidade_id' => null
                ),
                40 => array(
                    'id' => '8757',
                    'cd_procedimento' => '30209030',
                    'ds_procedimento' => 'Osteoplastias do arco zigomático	         ',
                    'especialidade_id' => null
                ),
                41 => array(
                    'id' => '8761',
                    'cd_procedimento' => '30210119',
                    'ds_procedimento' => 'Exérese de tumor maligno de pele	         ',
                    'especialidade_id' => null
                ),
                42 => array(
                    'id' => '8773',
                    'cd_procedimento' => '30211050',
                    'ds_procedimento' => 'Mandibulectomia total	    ',
                    'especialidade_id' => null
                ),
                43 => array(
                    'id' => '8775',
                    'cd_procedimento' => '30212014',
                    'ds_procedimento' => 'Cervicotomia exploradora	',
                    'especialidade_id' => null
                ),
                44 => array(
                    'id' => '8781',
                    'cd_procedimento' => '30212073',
                    'ds_procedimento' => 'Exérese de cisto tireoglosso ',
                    'especialidade_id' => null
                ),
                45 => array(
                    'id' => '8783',
                    'cd_procedimento' => '30212090',
                    'ds_procedimento' => 'Linfadenectomia profunda	',
                    'especialidade_id' => null
                ),
                46 => array(
                    'id' => '8785',
                    'cd_procedimento' => '30212111',
                    'ds_procedimento' => 'Neuroblastoma cervical - exérese	         ',
                    'especialidade_id' => null
                ),
                47 => array(
                    'id' => '8798',
                    'cd_procedimento' => '30213053',
                    'ds_procedimento' => 'Tireoidectomia total	    ',
                    'especialidade_id' => null
                ),
                48 => array(
                    'id' => '8804',
                    'cd_procedimento' => '30215013',
                    'ds_procedimento' => 'Cranioplastia',
                    'especialidade_id' => null
                ),
                49 => array(
                    'id' => '8808',
                    'cd_procedimento' => '30215056',
                    'ds_procedimento' => 'Retirada de cranioplastia	',
                    'especialidade_id' => null
                ),
                50 => array(
                    'id' => '8809',
                    'cd_procedimento' => '30215072',
                    'ds_procedimento' => 'Tratamento cirúrgico da craniossinostose	 ',
                    'especialidade_id' => null
                ),
                51 => array(
                    'id' => '8814',
                    'cd_procedimento' => '30301033',
                    'ds_procedimento' => 'Blefarorrafia',
                    'especialidade_id' => null
                ),
                52 => array(
                    'id' => '8816',
                    'cd_procedimento' => '30301050',
                    'ds_procedimento' => 'Cantoplastia lateral	    ',
                    'especialidade_id' => null
                ),
                53 => array(
                    'id' => '8837',
                    'cd_procedimento' => '30301262',
                    'ds_procedimento' => 'Triquíase com ou sem enxerto ',
                    'especialidade_id' => null
                ),
                54 => array(
                    'id' => '8859',
                    'cd_procedimento' => '30303087',
                    'ds_procedimento' => 'Sutura de conjuntiva	    ',
                    'especialidade_id' => null
                ),
                55 => array(
                    'id' => '8860',
                    'cd_procedimento' => '30303095',
                    'ds_procedimento' => 'Transplante de limbo	    ',
                    'especialidade_id' => null
                ),
                56 => array(
                    'id' => '8863',
                    'cd_procedimento' => '30304024',
                    'ds_procedimento' => 'Ceratectomia superficial - monocular	     ',
                    'especialidade_id' => null
                ),
                57 => array(
                    'id' => '8868',
                    'cd_procedimento' => '30304040',
                    'ds_procedimento' => 'PTK ceratectomia fototerapêutica - monocular ',
                    'especialidade_id' => null
                ),
                58 => array(
                    'id' => '8869',
                    'cd_procedimento' => '30304059',
                    'ds_procedimento' => 'Recobrimento conjuntival	',
                    'especialidade_id' => null
                ),
                59 => array(
                    'id' => '8871',
                    'cd_procedimento' => '30304075',
                    'ds_procedimento' => 'Tarsoconjuntivoceratoplastia ',
                    'especialidade_id' => null
                ),
                60 => array(
                    'id' => '8886',
                    'cd_procedimento' => '30307040',
                    'ds_procedimento' => 'Implante de silicone intravítreo	         ',
                    'especialidade_id' => null
                ),
                61 => array(
                    'id' => '8893',
                    'cd_procedimento' => '30307112',
                    'ds_procedimento' => 'Vitrectomia anterior	    ',
                    'especialidade_id' => null
                ),
                62 => array(
                    'id' => '8897',
                    'cd_procedimento' => '30308038',
                    'ds_procedimento' => 'Sutura de esclera	        ',
                    'especialidade_id' => null
                ),
                63 => array(
                    'id' => '8903',
                    'cd_procedimento' => '30310032',
                    'ds_procedimento' => 'Cirurgias fistulizantes antiglaucomatosas	 ',
                    'especialidade_id' => null
                ),
                64 => array(
                    'id' => '8904',
                    'cd_procedimento' => '30310040',
                    'ds_procedimento' => 'Cirurgias fistulizantes com implantes valvulares     ',
                    'especialidade_id' => null
                ),
                65 => array(
                    'id' => '8906',
                    'cd_procedimento' => '30310067',
                    'ds_procedimento' => 'Fototrabeculoplastia (laser) ',
                    'especialidade_id' => null
                ),
                66 => array(
                    'id' => '8907',
                    'cd_procedimento' => '30310075',
                    'ds_procedimento' => 'Goniotomia ou trabeculotomia ',
                    'especialidade_id' => null
                ),
                67 => array(
                    'id' => '8908',
                    'cd_procedimento' => '30310083',
                    'ds_procedimento' => 'Iridectomia (laser ou cirúrgica)	         ',
                    'especialidade_id' => null
                ),
                68 => array(
                    'id' => '8909',
                    'cd_procedimento' => '30310091',
                    'ds_procedimento' => 'Iridociclectomia	        ',
                    'especialidade_id' => null
                ),
                69 => array(
                    'id' => '8911',
                    'cd_procedimento' => '30310113',
                    'ds_procedimento' => 'Sinequiotomia (laser)	    ',
                    'especialidade_id' => null
                ),
                70 => array(
                    'id' => '9085',
                    'cd_procedimento' => '30601169',
                    'ds_procedimento' => 'Toracoplastia (qualquer técnica)	         ',
                    'especialidade_id' => null
                ),
                71 => array(
                    'id' => '9097',
                    'cd_procedimento' => '30602050',
                    'ds_procedimento' => 'Drenagem de abscesso de mama ',
                    'especialidade_id' => null
                ),
                72 => array(
                    'id' => '9102',
                    'cd_procedimento' => '30602106',
                    'ds_procedimento' => 'Fistulectomia de mama	    ',
                    'especialidade_id' => null
                ),
                73 => array(
                    'id' => '9103',
                    'cd_procedimento' => '30602114',
                    'ds_procedimento' => 'Ginecomastia - unilateral	',
                    'especialidade_id' => null
                ),
                74 => array(
                    'id' => '9105',
                    'cd_procedimento' => '30602149',
                    'ds_procedimento' => 'Mastectomia radical ou radical modificada	 ',
                    'especialidade_id' => null
                ),
                75 => array(
                    'id' => '9111',
                    'cd_procedimento' => '30602190',
                    'ds_procedimento' => 'Quadrantectomia e linfadenectomia axilar	 ',
                    'especialidade_id' => null
                ),
                76 => array(
                    'id' => '9126',
                    'cd_procedimento' => '30701058',
                    'ds_procedimento' => 'Deltopeitoral',
                    'especialidade_id' => null
                ),
                77 => array(
                    'id' => '9128',
                    'cd_procedimento' => '30701074',
                    'ds_procedimento' => 'Digital do hallux	        ',
                    'especialidade_id' => null
                ),
                78 => array(
                    'id' => '9129',
                    'cd_procedimento' => '30701082',
                    'ds_procedimento' => 'Dorsal do pé',
                    'especialidade_id' => null
                ),
                79 => array(
                    'id' => '9130',
                    'cd_procedimento' => '30701090',
                    'ds_procedimento' => 'Escapular    ',
                    'especialidade_id' => null
                ),
                80 => array(
                    'id' => '9133',
                    'cd_procedimento' => '30701120',
                    'ds_procedimento' => 'Inguino-cural',
                    'especialidade_id' => null
                ),
                81 => array(
                    'id' => '9136',
                    'cd_procedimento' => '30701155',
                    'ds_procedimento' => 'Outros transplantes cutâneos ',
                    'especialidade_id' => null
                ),
                82 => array(
                    'id' => '9137',
                    'cd_procedimento' => '30701163',
                    'ds_procedimento' => 'Paraescapular',
                    'especialidade_id' => null
                ),
                83 => array(
                    'id' => '9139',
                    'cd_procedimento' => '30701180',
                    'ds_procedimento' => 'Temporal    ',
                    'especialidade_id' => null
                ),
                84 => array(
                    'id' => '9141',
                    'cd_procedimento' => '30702011',
                    'ds_procedimento' => 'Grande dorsal (latissimus dorsi)	         ',
                    'especialidade_id' => null
                ),
                85 => array(
                    'id' => '9144',
                    'cd_procedimento' => '30702046',
                    'ds_procedimento' => 'Reto abdominal (rectus abdominis)	         ',
                    'especialidade_id' => null
                ),
                86 => array(
                    'id' => '9146',
                    'cd_procedimento' => '30702062',
                    'ds_procedimento' => 'Serrato maior (serratus)	',
                    'especialidade_id' => null
                ),
                87 => array(
                    'id' => '9150',
                    'cd_procedimento' => '30702089',
                    'ds_procedimento' => 'Trapézio (trapezius)	    ',
                    'especialidade_id' => null
                ),
                88 => array(
                    'id' => '9152',
                    'cd_procedimento' => '30703026',
                    'ds_procedimento' => 'Extensor comum dos dedos (extensor digitorum longus) ',
                    'especialidade_id' => null
                ),
                89 => array(
                    'id' => '9155',
                    'cd_procedimento' => '30703050',
                    'ds_procedimento' => 'Grande dorsal (latissimus dorsi)	         ',
                    'especialidade_id' => null
                ),
                90 => array(
                    'id' => '9160',
                    'cd_procedimento' => '30703107',
                    'ds_procedimento' => 'Primeiro radial externo (extensor carpi radialis longus)	         ',
                    'especialidade_id' => null
                ),
                91 => array(
                    'id' => '9163',
                    'cd_procedimento' => '30703131',
                    'ds_procedimento' => 'Sartório (sartorius)	    ',
                    'especialidade_id' => null
                ),
                92 => array(
                    'id' => '9164',
                    'cd_procedimento' => '30703140',
                    'ds_procedimento' => 'Semimembranoso (semimembranosus)	         ',
                    'especialidade_id' => null
                ),
                93 => array(
                    'id' => '9166',
                    'cd_procedimento' => '30703166',
                    'ds_procedimento' => 'Serrato maior (serratus)	',
                    'especialidade_id' => null
                ),
                94 => array(
                    'id' => '9167',
                    'cd_procedimento' => '30703174',
                    'ds_procedimento' => 'Supinador longo (brachioradialis)	         ',
                    'especialidade_id' => null
                ),
                95 => array(
                    'id' => '9172',
                    'cd_procedimento' => '30704049',
                    'ds_procedimento' => 'Osteocutâneos de costela	',
                    'especialidade_id' => null
                ),
                96 => array(
                    'id' => '9205',
                    'cd_procedimento' => '30712017',
                    'ds_procedimento' => 'Áxilo-palmar ou pendente	',
                    'especialidade_id' => null
                ),
                97 => array(
                    'id' => '9206',
                    'cd_procedimento' => '30712025',
                    'ds_procedimento' => 'Bota com ou sem salto	    ',
                    'especialidade_id' => null
                ),
                98 => array(
                    'id' => '9207',
                    'cd_procedimento' => '30712033',
                    'ds_procedimento' => 'Colar',
                    'especialidade_id' => null
                ),
                99 => array(
                    'id' => '9212',
                    'cd_procedimento' => '30712084',
                    'ds_procedimento' => 'Inguino-maleolar	        ',
                    'especialidade_id' => null
                ),
                100 => array(
                    'id' => '9213',
                    'cd_procedimento' => '30712092',
                    'ds_procedimento' => 'Luva',
                    'especialidade_id' => null
                ),
                101 => array(
                    'id' => '9214',
                    'cd_procedimento' => '30712106',
                    'ds_procedimento' => 'Minerva ou Risser para escoliose	         ',
                    'especialidade_id' => null
                ),
                102 => array(
                    'id' => '9216',
                    'cd_procedimento' => '30712122',
                    'ds_procedimento' => 'Spica-gessada',
                    'especialidade_id' => null
                ),
                103 => array(
                    'id' => '9217',
                    'cd_procedimento' => '30712130',
                    'ds_procedimento' => 'Tipo Velpeau',
                    'especialidade_id' => null
                ),
                104 => array(
                    'id' => '9221',
                    'cd_procedimento' => '30713048',
                    'ds_procedimento' => 'Enxertos em outras pseudartroses	         ',
                    'especialidade_id' => null
                ),
                105 => array(
                    'id' => '9238',
                    'cd_procedimento' => '30715105',
                    'ds_procedimento' => 'Dorso curvo / escoliose / giba costal - tratamento cirúrgico	     ',
                    'especialidade_id' => null
                ),
                106 => array(
                    'id' => '9261',
                    'cd_procedimento' => '30715342',
                    'ds_procedimento' => 'Tratamento conservador do traumatismo raquimedular (por dia)	     ',
                    'especialidade_id' => null
                ),
                107 => array(
                    'id' => '9289',
                    'cd_procedimento' => '30719011',
                    'ds_procedimento' => 'Artrodese - tratamento cirúrgico	         ',
                    'especialidade_id' => null
                ),
                108 => array(
                    'id' => '9290',
                    'cd_procedimento' => '30719135',
                    'ds_procedimento' => 'Artrodiastase - tratamento cirúrgico com fixador externo	         ',
                    'especialidade_id' => null
                ),
                109 => array(
                    'id' => '9291',
                    'cd_procedimento' => '30719020',
                    'ds_procedimento' => 'Artroplastia com implante - tratamento cirúrgico     ',
                    'especialidade_id' => null
                ),
                110 => array(
                    'id' => '9316',
                    'cd_procedimento' => '30720176',
                    'ds_procedimento' => 'Tratamento cirúrgico de fraturas com fixador externo ',
                    'especialidade_id' => null
                ),
                111 => array(
                    'id' => '9320',
                    'cd_procedimento' => '30721032',
                    'ds_procedimento' => 'Artrodese entre os ossos do carpo	         ',
                    'especialidade_id' => null
                ),
                112 => array(
                    'id' => '9328',
                    'cd_procedimento' => '30721121',
                    'ds_procedimento' => 'Encurtamento rádio/ulnar	',
                    'especialidade_id' => null
                ),
                113 => array(
                    'id' => '9335',
                    'cd_procedimento' => '30721210',
                    'ds_procedimento' => 'Pseudartroses - tratamento cirúrgico	     ',
                    'especialidade_id' => null
                ),
                114 => array(
                    'id' => '9338',
                    'cd_procedimento' => '30721245',
                    'ds_procedimento' => 'Sinovectomia de punho - tratamento cirúrgico ',
                    'especialidade_id' => null
                ),
                115 => array(
                    'id' => '9342',
                    'cd_procedimento' => '30722047',
                    'ds_procedimento' => 'Alongamento/transporte ósseo com fixador externo     ',
                    'especialidade_id' => null
                ),
                116 => array(
                    'id' => '9357',
                    'cd_procedimento' => '30722217',
                    'ds_procedimento' => 'Capsulectomias única MF e IF ',
                    'especialidade_id' => null
                ),
                117 => array(
                    'id' => '9371',
                    'cd_procedimento' => '30722390',
                    'ds_procedimento' => 'Fratura/artrodese com fixador externo	     ',
                    'especialidade_id' => null
                ),
                118 => array(
                    'id' => '9387',
                    'cd_procedimento' => '30722551',
                    'ds_procedimento' => 'Plástica ungueal	        ',
                    'especialidade_id' => null
                ),
                119 => array(
                    'id' => '9392',
                    'cd_procedimento' => '30722608',
                    'ds_procedimento' => 'Pseudartrose com perda de substâncias de metacarpiano e falanges	 ',
                    'especialidade_id' => null
                ),
                120 => array(
                    'id' => '9400',
                    'cd_procedimento' => '30722683',
                    'ds_procedimento' => 'Reimplante do polegar	    ',
                    'especialidade_id' => null
                ),
                121 => array(
                    'id' => '9410',
                    'cd_procedimento' => '30722780',
                    'ds_procedimento' => 'Sequestrectomias	        ',
                    'especialidade_id' => null
                ),
                122 => array(
                    'id' => '9430',
                    'cd_procedimento' => '30724040',
                    'ds_procedimento' => 'Artrodiastase de quadril	',
                    'especialidade_id' => null
                ),
                123 => array(
                    'id' => '9448',
                    'cd_procedimento' => '30724228',
                    'ds_procedimento' => 'Osteotomia - fixador externo ',
                    'especialidade_id' => null
                ),
                124 => array(
                    'id' => '9469',
                    'cd_procedimento' => '30725160',
                    'ds_procedimento' => 'Tratamento cirúrgico de fraturas com fixador externo ',
                    'especialidade_id' => null
                ),
                125 => array(
                    'id' => '9489',
                    'cd_procedimento' => '30726212',
                    'ds_procedimento' => 'Meniscorrafia - tratamento cirúrgico	     ',
                    'especialidade_id' => null
                ),
                126 => array(
                    'id' => '9540',
                    'cd_procedimento' => '30729106',
                    'ds_procedimento' => 'Deformidade dos dedos - tratamento cirúrgico ',
                    'especialidade_id' => null
                ),
                127 => array(
                    'id' => '9562',
                    'cd_procedimento' => '30729335',
                    'ds_procedimento' => 'Tratamento cirúrgico de polidactilia simples ',
                    'especialidade_id' => null
                ),
                128 => array(
                    'id' => '9584',
                    'cd_procedimento' => '30731070',
                    'ds_procedimento' => 'Tenoartroplastia para ossos do carpo	     ',
                    'especialidade_id' => null
                ),
                129 => array(
                    'id' => '9585',
                    'cd_procedimento' => '30731089',
                    'ds_procedimento' => 'Tenodese    ',
                    'especialidade_id' => null
                ),
                130 => array(
                    'id' => '9596',
                    'cd_procedimento' => '30731194',
                    'ds_procedimento' => 'Tenossinovites infecciosas - drenagem	     ',
                    'especialidade_id' => null
                ),
                131 => array(
                    'id' => '9597',
                    'cd_procedimento' => '30731208',
                    'ds_procedimento' => 'Tenotomia    ',
                    'especialidade_id' => null
                ),
                132 => array(
                    'id' => '9619',
                    'cd_procedimento' => '30733022',
                    'ds_procedimento' => 'Sinovectomia parcial ou subtotal	         ',
                    'especialidade_id' => null
                ),
                133 => array(
                    'id' => '9626',
                    'cd_procedimento' => '30734029',
                    'ds_procedimento' => 'Sinovectomia parcial ou subtotal	         ',
                    'especialidade_id' => null
                ),
                134 => array(
                    'id' => '9629',
                    'cd_procedimento' => '30735076',
                    'ds_procedimento' => 'Instabilidade multidirecional ',
                    'especialidade_id' => null
                ),
                135 => array(
                    'id' => '9630',
                    'cd_procedimento' => '30735041',
                    'ds_procedimento' => 'Lesão labral',
                    'especialidade_id' => null
                ),
                136 => array(
                    'id' => '9634',
                    'cd_procedimento' => '30735025',
                    'ds_procedimento' => 'Sinovectomia parcial ou subtotal	         ',
                    'especialidade_id' => null
                ),
                137 => array(
                    'id' => '8915',
                    'cd_procedimento' => '30311047',
                    'ds_procedimento' => 'Estrabismo horizontal - monocular	         ',
                    'especialidade_id' => null
                ),
                138 => array(
                    'id' => '8924',
                    'cd_procedimento' => '30312086',
                    'ds_procedimento' => 'Retinopexia com introflexão escleral	     ',
                    'especialidade_id' => null
                ),
                139 => array(
                    'id' => '8927',
                    'cd_procedimento' => '30312116',
                    'ds_procedimento' => 'Retinotomia relaxante	    ',
                    'especialidade_id' => null
                ),
                140 => array(
                    'id' => '8933',
                    'cd_procedimento' => '30313066',
                    'ds_procedimento' => 'Sondagem das vias lacrimais - com ou sem lavagem     ',
                    'especialidade_id' => null
                ),
                141 => array(
                    'id' => '8945',
                    'cd_procedimento' => '30402026',
                    'ds_procedimento' => 'Biópsia (orelha externa)	',
                    'especialidade_id' => null
                ),
                142 => array(
                    'id' => '8959',
                    'cd_procedimento' => '30403081',
                    'ds_procedimento' => 'Mastoidectomia simples ou radical modificada ',
                    'especialidade_id' => null
                ),
                143 => array(
                    'id' => '8962',
                    'cd_procedimento' => '30403162',
                    'ds_procedimento' => 'Paracentese do tímpano, unilateral, em hospital/anest. geral	     ',
                    'especialidade_id' => null
                ),
                144 => array(
                    'id' => '8966',
                    'cd_procedimento' => '30403146',
                    'ds_procedimento' => 'Timpanotomia exploradora - unilateral	     ',
                    'especialidade_id' => null
                ),
                145 => array(
                    'id' => '8976',
                    'cd_procedimento' => '30404096',
                    'ds_procedimento' => 'Neurectomia vestibular para fossa média ou posterior ',
                    'especialidade_id' => null
                ),
                146 => array(
                    'id' => '8983',
                    'cd_procedimento' => '30501059',
                    'ds_procedimento' => 'Biópsia de nariz	        ',
                    'especialidade_id' => null
                ),
                147 => array(
                    'id' => '8988',
                    'cd_procedimento' => '30501474',
                    'ds_procedimento' => 'Corpos estranhos - retirada sob anestesia geral / hospital (nariz) - por videoendoscopia      ',
                    'especialidade_id' => null
                ),
                148 => array(
                    'id' => '8994',
                    'cd_procedimento' => '30501156',
                    'ds_procedimento' => 'Epistaxe - tamponamento  antero-posterior	 ',
                    'especialidade_id' => null
                ),
                149 => array(
                    'id' => '8995',
                    'cd_procedimento' => '30501164',
                    'ds_procedimento' => 'Epistaxe - tamponamento anterior	         ',
                    'especialidade_id' => null
                ),
                150 => array(
                    'id' => '8996',
                    'cd_procedimento' => '30501172',
                    'ds_procedimento' => 'Epistaxe - tamponamento antero-posterior sob anestesia geral	     ',
                    'especialidade_id' => null
                ),
                151 => array(
                    'id' => '9006',
                    'cd_procedimento' => '30501261',
                    'ds_procedimento' => 'Ozena - tratamento cirúrgico ',
                    'especialidade_id' => null
                ),
                152 => array(
                    'id' => '9007',
                    'cd_procedimento' => '30501504',
                    'ds_procedimento' => 'Ozena - tratamento cirúrgico por videoendoscopia     ',
                    'especialidade_id' => null
                ),
                153 => array(
                    'id' => '9010',
                    'cd_procedimento' => '30501288',
                    'ds_procedimento' => 'Polipectomia - unilateral	',
                    'especialidade_id' => null
                ),
                154 => array(
                    'id' => '9015',
                    'cd_procedimento' => '30501334',
                    'ds_procedimento' => 'Rinectomia total	        ',
                    'especialidade_id' => null
                ),
                155 => array(
                    'id' => '9020',
                    'cd_procedimento' => '30501539',
                    'ds_procedimento' => 'Septoplastia por videoendoscopia	         ',
                    'especialidade_id' => null
                ),
                156 => array(
                    'id' => '9024',
                    'cd_procedimento' => '30501407',
                    'ds_procedimento' => 'Tratamento cirúrgico do rinofima	         ',
                    'especialidade_id' => null
                ),
                157 => array(
                    'id' => '9027',
                    'cd_procedimento' => '30501431',
                    'ds_procedimento' => 'Tumor intranasal - exérese por rinotomia lateral     ',
                    'especialidade_id' => null
                ),
                158 => array(
                    'id' => '9029',
                    'cd_procedimento' => '30501458',
                    'ds_procedimento' => 'Turbinectomia ou turbinoplastia - unilateral ',
                    'especialidade_id' => null
                ),
                159 => array(
                    'id' => '9037',
                    'cd_procedimento' => '30502047',
                    'ds_procedimento' => 'Cisto naso-alveolar e globular - exérese	 ',
                    'especialidade_id' => null
                ),
                160 => array(
                    'id' => '9039',
                    'cd_procedimento' => '30502071',
                    'ds_procedimento' => 'Etmoidectomia externa	    ',
                    'especialidade_id' => null
                ),
                161 => array(
                    'id' => '9040',
                    'cd_procedimento' => '30502080',
                    'ds_procedimento' => 'Etmoidectomia intranasal	',
                    'especialidade_id' => null
                ),
                162 => array(
                    'id' => '9041',
                    'cd_procedimento' => '30502314',
                    'ds_procedimento' => 'Etmoidectomia intranasal por videoendoscopia ',
                    'especialidade_id' => null
                ),
                163 => array(
                    'id' => '9043',
                    'cd_procedimento' => '30502101',
                    'ds_procedimento' => 'Exérese de tumor de seios paranasais por via endoscopica	         ',
                    'especialidade_id' => null
                ),
                164 => array(
                    'id' => '9047',
                    'cd_procedimento' => '30502144',
                    'ds_procedimento' => 'Maxilectomia parcial	    ',
                    'especialidade_id' => null
                ),
                165 => array(
                    'id' => '9054',
                    'cd_procedimento' => '30502225',
                    'ds_procedimento' => 'Sinusectomia fronto-etmoidal por via externa ',
                    'especialidade_id' => null
                ),
                166 => array(
                    'id' => '9055',
                    'cd_procedimento' => '30502209',
                    'ds_procedimento' => 'Sinusectomia maxilar - via endonasal	     ',
                    'especialidade_id' => null
                ),
                167 => array(
                    'id' => '9056',
                    'cd_procedimento' => '30502322',
                    'ds_procedimento' => 'Sinusectomia maxilar - via endonasal por videoendoscopia	         ',
                    'especialidade_id' => null
                ),
                168 => array(
                    'id' => '9067',
                    'cd_procedimento' => '30601029',
                    'ds_procedimento' => 'Costectomia (porte para 1 arco costal, 30% deste porte para cada arco adicional)	  ',
                    'especialidade_id' => null
                ),
                169 => array(
                    'id' => '9082',
                    'cd_procedimento' => '30601290',
                    'ds_procedimento' => 'Ressutura de parede torácica ',
                    'especialidade_id' => null
                ),
                170 => array(
                    'id' => '9084',
                    'cd_procedimento' => '30601150',
                    'ds_procedimento' => 'Toracectomia',
                    'especialidade_id' => null
                ),
                171 => array(
                    'id' => '10275',
                    'cd_procedimento' => '31101550',
                    'ds_procedimento' => 'Nefrectomia radical laparoscópica unilateral ',
                    'especialidade_id' => null
                ),
                172 => array(
                    'id' => '10277',
                    'cd_procedimento' => '31101194',
                    'ds_procedimento' => 'Nefrectomia total unilateral ',
                    'especialidade_id' => null
                ),
                173 => array(
                    'id' => '10280',
                    'cd_procedimento' => '31101216',
                    'ds_procedimento' => 'Nefrolitotomia anatrófica unilateral	     ',
                    'especialidade_id' => null
                ),
                174 => array(
                    'id' => '10281',
                    'cd_procedimento' => '31101224',
                    'ds_procedimento' => 'Nefrolitotomia percutânea unilateral	     ',
                    'especialidade_id' => null
                ),
                175 => array(
                    'id' => '10282',
                    'cd_procedimento' => '31101232',
                    'ds_procedimento' => 'Nefrolitotomia simples unilateral	         ',
                    'especialidade_id' => null
                ),
                176 => array(
                    'id' => '10288',
                    'cd_procedimento' => '31101283',
                    'ds_procedimento' => 'Nefropexia unilateral	    ',
                    'especialidade_id' => null
                ),
                177 => array(
                    'id' => '10295',
                    'cd_procedimento' => '31101348',
                    'ds_procedimento' => 'Pielolitotomia com nefrolitotomia simples unilateral ',
                    'especialidade_id' => null
                ),
                178 => array(
                    'id' => '10297',
                    'cd_procedimento' => '31101356',
                    'ds_procedimento' => 'Pielolitotomia unilateral	',
                    'especialidade_id' => null
                ),
                179 => array(
                    'id' => '10298',
                    'cd_procedimento' => '31101364',
                    'ds_procedimento' => 'Pieloplastia',
                    'especialidade_id' => null
                ),
                180 => array(
                    'id' => '10301',
                    'cd_procedimento' => '31101380',
                    'ds_procedimento' => 'Pielotomia exploradora unilateral	         ',
                    'especialidade_id' => null
                ),
                181 => array(
                    'id' => '10305',
                    'cd_procedimento' => '31101429',
                    'ds_procedimento' => 'Sinfisiotomia (rim em ferradura)	         ',
                    'especialidade_id' => null
                ),
                182 => array(
                    'id' => '10328',
                    'cd_procedimento' => '31102204',
                    'ds_procedimento' => 'Reimplante uretero-vesical unilateral - via combinada ',
                    'especialidade_id' => null
                ),
                183 => array(
                    'id' => '10331',
                    'cd_procedimento' => '31102247',
                    'ds_procedimento' => 'Ureterectomia unilateral	',
                    'especialidade_id' => null
                ),
                184 => array(
                    'id' => '10334',
                    'cd_procedimento' => '31102271',
                    'ds_procedimento' => 'Ureteroileocistostomia unilateral	         ',
                    'especialidade_id' => null
                ),
                185 => array(
                    'id' => '10335',
                    'cd_procedimento' => '31102280',
                    'ds_procedimento' => 'Ureteroileostomia cutânea unilateral	     ',
                    'especialidade_id' => null
                ),
                186 => array(
                    'id' => '10343',
                    'cd_procedimento' => '31102344',
                    'ds_procedimento' => 'Ureteroplastia unilateral	',
                    'especialidade_id' => null
                ),
                187 => array(
                    'id' => '10344',
                    'cd_procedimento' => '31102352',
                    'ds_procedimento' => 'Ureterorrenolitotomia unilateral	         ',
                    'especialidade_id' => null
                ),
                188 => array(
                    'id' => '10349',
                    'cd_procedimento' => '31102417',
                    'ds_procedimento' => 'Ureterossigmoidostomia unilateral	         ',
                    'especialidade_id' => null
                ),
                189 => array(
                    'id' => '10350',
                    'cd_procedimento' => '31102425',
                    'ds_procedimento' => 'Ureterostomia cutânea unilateral	         ',
                    'especialidade_id' => null
                ),
                190 => array(
                    'id' => '10354',
                    'cd_procedimento' => '31102468',
                    'ds_procedimento' => 'Ureteroureterocistoneostomia ',
                    'especialidade_id' => null
                ),
                191 => array(
                    'id' => '10366',
                    'cd_procedimento' => '31103081',
                    'ds_procedimento' => 'Cistectomia total	        ',
                    'especialidade_id' => null
                ),
                192 => array(
                    'id' => '10368',
                    'cd_procedimento' => '31103561',
                    'ds_procedimento' => 'Cistolitotripsia a laser	',
                    'especialidade_id' => null
                ),
                193 => array(
                    'id' => '10372',
                    'cd_procedimento' => '31103146',
                    'ds_procedimento' => 'Cistolitotripsia transuretral (U.S., E.H., E.C.)     ',
                    'especialidade_id' => null
                ),
                194 => array(
                    'id' => '10373',
                    'cd_procedimento' => '31103154',
                    'ds_procedimento' => 'Cistoplastia redutora	    ',
                    'especialidade_id' => null
                ),
                195 => array(
                    'id' => '10374',
                    'cd_procedimento' => '31103162',
                    'ds_procedimento' => 'Cistorrafia (trauma)	    ',
                    'especialidade_id' => null
                ),
                196 => array(
                    'id' => '10376',
                    'cd_procedimento' => '31103189',
                    'ds_procedimento' => 'Cistostomia com procedimento endoscópico	 ',
                    'especialidade_id' => null
                ),
                197 => array(
                    'id' => '10383',
                    'cd_procedimento' => '31103243',
                    'ds_procedimento' => 'Diverticulectomia vesical	',
                    'especialidade_id' => null
                ),
                198 => array(
                    'id' => '10398',
                    'cd_procedimento' => '31103480',
                    'ds_procedimento' => 'Neobexiga cutânea continente ',
                    'especialidade_id' => null
                ),
                199 => array(
                    'id' => '10401',
                    'cd_procedimento' => '31103502',
                    'ds_procedimento' => 'Neobexiga uretral continente ',
                    'especialidade_id' => null
                ),
                200 => array(
                    'id' => '10410',
                    'cd_procedimento' => '31103464',
                    'ds_procedimento' => 'Vesicostomia cutânea	    ',
                    'especialidade_id' => null
                ),
                201 => array(
                    'id' => '10432',
                    'cd_procedimento' => '31104215',
                    'ds_procedimento' => 'Uretrostomia',
                    'especialidade_id' => null
                ),
                202 => array(
                    'id' => '10446',
                    'cd_procedimento' => '31201148',
                    'ds_procedimento' => 'Prostatavesiculectomia radical laparoscópica ',
                    'especialidade_id' => null
                ),
                203 => array(
                    'id' => '10449',
                    'cd_procedimento' => '31202020',
                    'ds_procedimento' => 'Drenagem de abscesso	    ',
                    'especialidade_id' => null
                ),
                204 => array(
                    'id' => '10470',
                    'cd_procedimento' => '31204023',
                    'ds_procedimento' => 'Drenagem de abscesso	    ',
                    'especialidade_id' => null
                ),
                205 => array(
                    'id' => '10477',
                    'cd_procedimento' => '31205046',
                    'ds_procedimento' => 'Vasectomia unilateral	    ',
                    'especialidade_id' => null
                ),
                206 => array(
                    'id' => '10488',
                    'cd_procedimento' => '31206107',
                    'ds_procedimento' => 'Hipospadia - por estágio	',
                    'especialidade_id' => null
                ),
                207 => array(
                    'id' => '10489',
                    'cd_procedimento' => '31206115',
                    'ds_procedimento' => 'Hipospadia distal - tratamento em 1 tempo	 ',
                    'especialidade_id' => null
                ),
                208 => array(
                    'id' => '10492',
                    'cd_procedimento' => '31206158',
                    'ds_procedimento' => 'Neofaloplastia - por estágio ',
                    'especialidade_id' => null
                ),
                209 => array(
                    'id' => '10500',
                    'cd_procedimento' => '31206239',
                    'ds_procedimento' => 'Priapismo - tratamento cirúrgico	         ',
                    'especialidade_id' => null
                ),
                210 => array(
                    'id' => '10505',
                    'cd_procedimento' => '31301029',
                    'ds_procedimento' => 'Biópsia de vulva	        ',
                    'especialidade_id' => null
                ),
                211 => array(
                    'id' => '10507',
                    'cd_procedimento' => '31301045',
                    'ds_procedimento' => 'Clitorectomia (parcial ou total)	         ',
                    'especialidade_id' => null
                ),
                212 => array(
                    'id' => '10515',
                    'cd_procedimento' => '31301126',
                    'ds_procedimento' => 'Vulvectomia ampliada	    ',
                    'especialidade_id' => null
                ),
                213 => array(
                    'id' => '10520',
                    'cd_procedimento' => '31302033',
                    'ds_procedimento' => 'Colpocleise (Lefort)	    ',
                    'especialidade_id' => null
                ),
                214 => array(
                    'id' => '10521',
                    'cd_procedimento' => '31302041',
                    'ds_procedimento' => 'Colpoplastia anterior	    ',
                    'especialidade_id' => null
                ),
                215 => array(
                    'id' => '10522',
                    'cd_procedimento' => '31302050',
                    'ds_procedimento' => 'Colpoplastia posterior com perineorrafia	 ',
                    'especialidade_id' => null
                ),
                216 => array(
                    'id' => '10525',
                    'cd_procedimento' => '31302084',
                    'ds_procedimento' => 'Exérese de cisto vaginal	',
                    'especialidade_id' => null
                ),
                217 => array(
                    'id' => '10529',
                    'cd_procedimento' => '31302122',
                    'ds_procedimento' => 'Neovagina (cólon, delgado, tubo de pele)	 ',
                    'especialidade_id' => null
                ),
                218 => array(
                    'id' => '10538',
                    'cd_procedimento' => '31303200',
                    'ds_procedimento' => 'Histerectomia subtotal laparoscópica com ou sem anexectomia, uni ou bilateral (via alta)      ',
                    'especialidade_id' => null
                ),
                219 => array(
                    'id' => '10547',
                    'cd_procedimento' => '31303269',
                    'ds_procedimento' => 'Implante de dispositivo intra-uterino (DIU) não hormonal	         ',
                    'especialidade_id' => null
                ),
                220 => array(
                    'id' => '10556',
                    'cd_procedimento' => '31304028',
                    'ds_procedimento' => 'Neossalpingostomia distal	',
                    'especialidade_id' => null
                ),
                221 => array(
                    'id' => '10576',
                    'cd_procedimento' => '31307035',
                    'ds_procedimento' => 'Culdoplastia (Mac Call, Moschowicz, etc.)	 ',
                    'especialidade_id' => null
                ),
                222 => array(
                    'id' => '10585',
                    'cd_procedimento' => '31307086',
                    'ds_procedimento' => 'Ligadura de veia ovariana	',
                    'especialidade_id' => null
                ),
                223 => array(
                    'id' => '10591',
                    'cd_procedimento' => '31307116',
                    'ds_procedimento' => 'Omentectomia',
                    'especialidade_id' => null
                ),
                224 => array(
                    'id' => '10606',
                    'cd_procedimento' => '31309046',
                    'ds_procedimento' => 'Cerclagem do colo uterino (qualquer técnica) ',
                    'especialidade_id' => null
                ),
                225 => array(
                    'id' => '10630',
                    'cd_procedimento' => '31401082',
                    'ds_procedimento' => 'Implante de cateter intracraniano	         ',
                    'especialidade_id' => null
                ),
                226 => array(
                    'id' => '10632',
                    'cd_procedimento' => '31401104',
                    'ds_procedimento' => 'Implante de eletrodos cerebral ou medular	 ',
                    'especialidade_id' => null
                ),
                227 => array(
                    'id' => '10633',
                    'cd_procedimento' => '31401112',
                    'ds_procedimento' => 'Implante estereotáxico de cateter para braquiterapia ',
                    'especialidade_id' => null
                ),
                228 => array(
                    'id' => '10637',
                    'cd_procedimento' => '31401155',
                    'ds_procedimento' => 'Microcirurgia para tumores intracranianos	 ',
                    'especialidade_id' => null
                ),
                229 => array(
                    'id' => '10638',
                    'cd_procedimento' => '31401163',
                    'ds_procedimento' => 'Microcirurgia por via transesfenoidal	     ',
                    'especialidade_id' => null
                ),
                230 => array(
                    'id' => '10639',
                    'cd_procedimento' => '31401171',
                    'ds_procedimento' => 'Microcirurgia vascular intracraniana	     ',
                    'especialidade_id' => null
                ),
                231 => array(
                    'id' => '10644',
                    'cd_procedimento' => '31401244',
                    'ds_procedimento' => 'Terceiro ventriculostomia	',
                    'especialidade_id' => null
                ),
                232 => array(
                    'id' => '10655',
                    'cd_procedimento' => '31403018',
                    'ds_procedimento' => 'Biópsia de nervo	        ',
                    'especialidade_id' => null
                ),
                233 => array(
                    'id' => '10656',
                    'cd_procedimento' => '31403026',
                    'ds_procedimento' => 'Bloqueio de nervo periférico ',
                    'especialidade_id' => null
                ),
                234 => array(
                    'id' => '10658',
                    'cd_procedimento' => '31403042',
                    'ds_procedimento' => 'Enxerto de nervo	        ',
                    'especialidade_id' => null
                ),
                235 => array(
                    'id' => '10673',
                    'cd_procedimento' => '31403212',
                    'ds_procedimento' => 'Microneurólise intraneural ou intrafascicular de dois ou mais nervos  ',
                    'especialidade_id' => null
                ),
                236 => array(
                    'id' => '10677',
                    'cd_procedimento' => '31403255',
                    'ds_procedimento' => 'Microneurorrafia de dedos da mão	         ',
                    'especialidade_id' => null
                ),
                237 => array(
                    'id' => '10686',
                    'cd_procedimento' => '31403344',
                    'ds_procedimento' => 'Simpatectomia',
                    'especialidade_id' => null
                ),
                238 => array(
                    'id' => '10692',
                    'cd_procedimento' => '31405010',
                    'ds_procedimento' => 'Bloqueio do sistema nervoso autônomo	     ',
                    'especialidade_id' => null
                ),
                239 => array(
                    'id' => '10695',
                    'cd_procedimento' => '31501028',
                    'ds_procedimento' => 'Retirada para transplante	',
                    'especialidade_id' => null
                ),
                240 => array(
                    'id' => '10700',
                    'cd_procedimento' => '31503020',
                    'ds_procedimento' => 'Transplante cardiopulmonar (receptor)	     ',
                    'especialidade_id' => null
                ),
                241 => array(
                    'id' => '10701',
                    'cd_procedimento' => '31504019',
                    'ds_procedimento' => 'Transplante pulmonar (doador) ',
                    'especialidade_id' => null
                ),
                242 => array(
                    'id' => '10706',
                    'cd_procedimento' => '31506046',
                    'ds_procedimento' => 'Nefrectomia laparoscópica em doador vivo	 ',
                    'especialidade_id' => null
                ),
                243 => array(
                    'id' => '10707',
                    'cd_procedimento' => '31506011',
                    'ds_procedimento' => 'Transplante renal (receptor) ',
                    'especialidade_id' => null
                ),
                244 => array(
                    'id' => '10708',
                    'cd_procedimento' => '31507026',
                    'ds_procedimento' => 'Transplante pancreático (doador)	         ',
                    'especialidade_id' => null
                ),
                245 => array(
                    'id' => '10711',
                    'cd_procedimento' => '31602010',
                    'ds_procedimento' => 'Analgesia controlada pelo paciente - por dia subseqüente	         ',
                    'especialidade_id' => null
                ),
                246 => array(
                    'id' => '10712',
                    'cd_procedimento' => '31602029',
                    'ds_procedimento' => 'Analgesia por dia subseqüente. Acompanhamento de analgesia por cateter peridural	  ',
                    'especialidade_id' => null
                ),
                247 => array(
                    'id' => '10721',
                    'cd_procedimento' => '31602118',
                    'ds_procedimento' => 'Bloqueio de nervo periférico ',
                    'especialidade_id' => null
                ),
                248 => array(
                    'id' => '10738',
                    'cd_procedimento' => '40102025',
                    'ds_procedimento' => 'Manometria computadorizada anorretal	     ',
                    'especialidade_id' => null
                ),
                249 => array(
                    'id' => '10746',
                    'cd_procedimento' => '40102084',
                    'ds_procedimento' => 'pH-metria esofágica computadorizada com um canal     ',
                    'especialidade_id' => null
                ),
                250 => array(
                    'id' => '10749',
                    'cd_procedimento' => '40103030',
                    'ds_procedimento' => 'Análise computadorizada do segmento anterior - monocular	         ',
                    'especialidade_id' => null
                ),
                251 => array(
                    'id' => '10750',
                    'cd_procedimento' => '40103048',
                    'ds_procedimento' => 'Audiometria (tipo Von Bekesy) ',
                    'especialidade_id' => null
                ),
                252 => array(
                    'id' => '10751',
                    'cd_procedimento' => '40103064',
                    'ds_procedimento' => 'Audiometria de tronco cerebral (PEA) BERA	 ',
                    'especialidade_id' => null
                ),
                253 => array(
                    'id' => '10756',
                    'cd_procedimento' => '40103110',
                    'ds_procedimento' => 'Audiometria vocal com mensagem competitiva (SSI, SSW) ',
                    'especialidade_id' => null
                ),
                254 => array(
                    'id' => '10761',
                    'cd_procedimento' => '40103170',
                    'ds_procedimento' => 'EEG de rotina',
                    'especialidade_id' => null
                ),
                255 => array(
                    'id' => '10768',
                    'cd_procedimento' => '40103285',
                    'ds_procedimento' => 'Eletroglotografia	        ',
                    'especialidade_id' => null
                ),
                256 => array(
                    'id' => '10770',
                    'cd_procedimento' => '40103315',
                    'ds_procedimento' => 'Eletroneuromiografia de MMII ',
                    'especialidade_id' => null
                ),
                257 => array(
                    'id' => '10771',
                    'cd_procedimento' => '40103323',
                    'ds_procedimento' => 'Eletroneuromiografia de MMSS ',
                    'especialidade_id' => null
                ),
                258 => array(
                    'id' => '10779',
                    'cd_procedimento' => '40103404',
                    'ds_procedimento' => 'Espectrografia vocal	    ',
                    'especialidade_id' => null
                ),
                259 => array(
                    'id' => '10782',
                    'cd_procedimento' => '40103439',
                    'ds_procedimento' => 'Impedanciometria	        ',
                    'especialidade_id' => null
                ),
                260 => array(
                    'id' => '10785',
                    'cd_procedimento' => '40103463',
                    'ds_procedimento' => 'Otoemissões evocadas transientes	         ',
                    'especialidade_id' => null
                ),
                261 => array(
                    'id' => '10788',
                    'cd_procedimento' => '40103510',
                    'ds_procedimento' => 'Poligrafia de recém-nascido (maior ou igual 2 horas) (PG/RN)	     ',
                    'especialidade_id' => null
                ),
                262 => array(
                    'id' => '10792',
                    'cd_procedimento' => '40103552',
                    'ds_procedimento' => 'Posturografia',
                    'especialidade_id' => null
                ),
                263 => array(
                    'id' => '10793',
                    'cd_procedimento' => '40103560',
                    'ds_procedimento' => 'Potencial evocado - P300	',
                    'especialidade_id' => null
                ),
                264 => array(
                    'id' => '10797',
                    'cd_procedimento' => '40103595',
                    'ds_procedimento' => 'Potencial evocado gênito-cortical (PEGC)	 ',
                    'especialidade_id' => null
                ),
                265 => array(
                    'id' => '10798',
                    'cd_procedimento' => '40103609',
                    'ds_procedimento' => 'Potencial evocado motor - PEM (bilateral)	 ',
                    'especialidade_id' => null
                ),
                266 => array(
                    'id' => '10805',
                    'cd_procedimento' => '40103650',
                    'ds_procedimento' => 'Registro do nistagmo pendular ',
                    'especialidade_id' => null
                ),
                267 => array(
                    'id' => '10814',
                    'cd_procedimento' => '40103765',
                    'ds_procedimento' => 'Videonistagmografia infravermelha	         ',
                    'especialidade_id' => null
                ),
                268 => array(
                    'id' => '10816',
                    'cd_procedimento' => '40104028',
                    'ds_procedimento' => 'Cronaximetria',
                    'especialidade_id' => null
                ),
                269 => array(
                    'id' => '10830',
                    'cd_procedimento' => '40201023',
                    'ds_procedimento' => 'Anuscopia (interna e externa) ',
                    'especialidade_id' => null
                ),
                270 => array(
                    'id' => '10834',
                    'cd_procedimento' => '40201066',
                    'ds_procedimento' => 'Cistoscopia e/ou uretroscopia ',
                    'especialidade_id' => null
                ),
                271 => array(
                    'id' => '10840',
                    'cd_procedimento' => '40201120',
                    'ds_procedimento' => 'Endoscopia digestiva alta	',
                    'especialidade_id' => null
                ),
                272 => array(
                    'id' => '10841',
                    'cd_procedimento' => '40201333',
                    'ds_procedimento' => 'Endoscopia digestiva alta com cromoscopia	 ',
                    'especialidade_id' => null
                ),
                273 => array(
                    'id' => '10843',
                    'cd_procedimento' => '40201147',
                    'ds_procedimento' => 'Enteroscopia',
                    'especialidade_id' => null
                ),
                274 => array(
                    'id' => '10845',
                    'cd_procedimento' => '40201163',
                    'ds_procedimento' => 'Laparoscopia',
                    'especialidade_id' => null
                ),
                275 => array(
                    'id' => '10847',
                    'cd_procedimento' => '40201171',
                    'ds_procedimento' => 'Retossigmoidoscopia flexível ',
                    'especialidade_id' => null
                ),
                276 => array(
                    'id' => '10872',
                    'cd_procedimento' => '40202704',
                    'ds_procedimento' => 'Colonoscopia com estenostomia ',
                    'especialidade_id' => null
                ),
                277 => array(
                    'id' => '10874',
                    'cd_procedimento' => '40202712',
                    'ds_procedimento' => 'Colonoscopia com mucosectomia ',
                    'especialidade_id' => null
                ),
                278 => array(
                    'id' => '10882',
                    'cd_procedimento' => '40202208',
                    'ds_procedimento' => 'Diverticulotomia	        ',
                    'especialidade_id' => null
                ),
                279 => array(
                    'id' => '10888',
                    'cd_procedimento' => '40202038',
                    'ds_procedimento' => 'Endoscopia digestiva alta com biópsia e/ou citologia ',
                    'especialidade_id' => null
                ),
                280 => array(
                    'id' => '10891',
                    'cd_procedimento' => '40202267',
                    'ds_procedimento' => 'Estenostomia endoscópica	',
                    'especialidade_id' => null
                ),
                281 => array(
                    'id' => '10892',
                    'cd_procedimento' => '40202283',
                    'ds_procedimento' => 'Gastrostomia endoscópica	',
                    'especialidade_id' => null
                ),
                282 => array(
                    'id' => '10895',
                    'cd_procedimento' => '40202313',
                    'ds_procedimento' => 'Hemostasias de cólon	    ',
                    'especialidade_id' => null
                ),
                283 => array(
                    'id' => '10898',
                    'cd_procedimento' => '40202356',
                    'ds_procedimento' => 'Jejunostomia endoscópica	',
                    'especialidade_id' => null
                ),
                284 => array(
                    'id' => '10902',
                    'cd_procedimento' => '40202763',
                    'ds_procedimento' => 'Laringoscopia/traqueoscopia com laser para exérese de papiloma/tumor  ',
                    'especialidade_id' => null
                ),
                285 => array(
                    'id' => '10907',
                    'cd_procedimento' => '40202470',
                    'ds_procedimento' => 'Mucosectomia',
                    'especialidade_id' => null
                ),
                286 => array(
                    'id' => '10930',
                    'cd_procedimento' => '40301036',
                    'ds_procedimento' => 'Acetaminofen',
                    'especialidade_id' => null
                ),
                287 => array(
                    'id' => '10932',
                    'cd_procedimento' => '40301052',
                    'ds_procedimento' => 'Acetona, dosagem no soro	',
                    'especialidade_id' => null
                ),
                288 => array(
                    'id' => '9642',
                    'cd_procedimento' => '30736021',
                    'ds_procedimento' => 'Sinovectomia parcial ou subtotal	         ',
                    'especialidade_id' => null
                ),
                289 => array(
                    'id' => '9647',
                    'cd_procedimento' => '30737028',
                    'ds_procedimento' => 'Sinovectomia parcial ou subtotal	         ',
                    'especialidade_id' => null
                ),
                290 => array(
                    'id' => '9651',
                    'cd_procedimento' => '30738032',
                    'ds_procedimento' => 'Desbridamento do labrum ou ligamento redondo com ou sem condroplastia  ',
                    'especialidade_id' => null
                ),
                291 => array(
                    'id' => '9663',
                    'cd_procedimento' => '30801079',
                    'ds_procedimento' => 'Traqueoplastia (qualquer via) ',
                    'especialidade_id' => null
                ),
                292 => array(
                    'id' => '9664',
                    'cd_procedimento' => '30801087',
                    'ds_procedimento' => 'Traqueorrafia (qualquer via) ',
                    'especialidade_id' => null
                ),
                293 => array(
                    'id' => '9666',
                    'cd_procedimento' => '30801095',
                    'ds_procedimento' => 'Traqueostomia',
                    'especialidade_id' => null
                ),
                294 => array(
                    'id' => '9668',
                    'cd_procedimento' => '30801117',
                    'ds_procedimento' => 'Traqueostomia mediastinal	',
                    'especialidade_id' => null
                ),
                295 => array(
                    'id' => '9669',
                    'cd_procedimento' => '30801141',
                    'ds_procedimento' => 'Traqueotomia ou fechamento cirúrgico	     ',
                    'especialidade_id' => null
                ),
                296 => array(
                    'id' => '9671',
                    'cd_procedimento' => '30802016',
                    'ds_procedimento' => 'Broncoplastia e/ou arterioplastia	         ',
                    'especialidade_id' => null
                ),
                297 => array(
                    'id' => '9673',
                    'cd_procedimento' => '30802024',
                    'ds_procedimento' => 'Broncotomia e/ou broncorrafia ',
                    'especialidade_id' => null
                ),
                298 => array(
                    'id' => '9676',
                    'cd_procedimento' => '30803012',
                    'ds_procedimento' => 'Bulectomia unilateral	    ',
                    'especialidade_id' => null
                ),
                299 => array(
                    'id' => '9683',
                    'cd_procedimento' => '30803055',
                    'ds_procedimento' => 'Drenagem tubular aberta de cavidade pulmonar ',
                    'especialidade_id' => null
                ),
                300 => array(
                    'id' => '9685',
                    'cd_procedimento' => '30803063',
                    'ds_procedimento' => 'Embolectomia pulmonar	    ',
                    'especialidade_id' => null
                ),
                301 => array(
                    'id' => '9688',
                    'cd_procedimento' => '30803217',
                    'ds_procedimento' => 'Lobectomia pulmonar por videotoracoscopia	 ',
                    'especialidade_id' => null
                ),
                302 => array(
                    'id' => '9690',
                    'cd_procedimento' => '30803225',
                    'ds_procedimento' => 'Metastasectomia pulmonar unilateral por videotoracoscopia	         ',
                    'especialidade_id' => null
                ),
                303 => array(
                    'id' => '9693',
                    'cd_procedimento' => '30803128',
                    'ds_procedimento' => 'Pneumorrafia',
                    'especialidade_id' => null
                ),
                304 => array(
                    'id' => '9695',
                    'cd_procedimento' => '30803144',
                    'ds_procedimento' => 'Posicionamento de agulhas radiativas por toracotomia (braquiterapia)  ',
                    'especialidade_id' => null
                ),
                305 => array(
                    'id' => '9697',
                    'cd_procedimento' => '30803233',
                    'ds_procedimento' => 'Segmentectomia por videotoracoscopia	     ',
                    'especialidade_id' => null
                ),
                306 => array(
                    'id' => '9702',
                    'cd_procedimento' => '30804035',
                    'ds_procedimento' => 'Pleurectomia',
                    'especialidade_id' => null
                ),
                307 => array(
                    'id' => '9705',
                    'cd_procedimento' => '30804175',
                    'ds_procedimento' => 'Pleurodese por video	    ',
                    'especialidade_id' => null
                ),
                308 => array(
                    'id' => '9706',
                    'cd_procedimento' => '30804051',
                    'ds_procedimento' => 'Pleuroscopia',
                    'especialidade_id' => null
                ),
                309 => array(
                    'id' => '9708',
                    'cd_procedimento' => '30804060',
                    'ds_procedimento' => 'Pleurostomia (aberta)	    ',
                    'especialidade_id' => null
                ),
                310 => array(
                    'id' => '9714',
                    'cd_procedimento' => '30804124',
                    'ds_procedimento' => 'Tenda pleural',
                    'especialidade_id' => null
                ),
                311 => array(
                    'id' => '9716',
                    'cd_procedimento' => '30804132',
                    'ds_procedimento' => 'Toracostomia com drenagem pleural fechada	 ',
                    'especialidade_id' => null
                ),
                312 => array(
                    'id' => '9717',
                    'cd_procedimento' => '30804140',
                    'ds_procedimento' => 'Tratamento operatório da hemorragia intrapleural     ',
                    'especialidade_id' => null
                ),
                313 => array(
                    'id' => '9731',
                    'cd_procedimento' => '30805236',
                    'ds_procedimento' => 'Mediastinoscopia, via cervical por vídeo	 ',
                    'especialidade_id' => null
                ),
                314 => array(
                    'id' => '9734',
                    'cd_procedimento' => '30805244',
                    'ds_procedimento' => 'Mediastinotomia extrapleural por via posterior por vídeo	         ',
                    'especialidade_id' => null
                ),
                315 => array(
                    'id' => '9740',
                    'cd_procedimento' => '30805295',
                    'ds_procedimento' => 'Retirada de corpo estranho do mediastino	 ',
                    'especialidade_id' => null
                ),
                316 => array(
                    'id' => '9741',
                    'cd_procedimento' => '30805155',
                    'ds_procedimento' => 'Timectomia (qualquer via)	',
                    'especialidade_id' => null
                ),
                317 => array(
                    'id' => '9742',
                    'cd_procedimento' => '30805279',
                    'ds_procedimento' => 'Timectomia por vídeo	    ',
                    'especialidade_id' => null
                ),
                318 => array(
                    'id' => '9743',
                    'cd_procedimento' => '30805163',
                    'ds_procedimento' => 'Tratamento da mediastinite (qualquer via)	 ',
                    'especialidade_id' => null
                ),
                319 => array(
                    'id' => '9744',
                    'cd_procedimento' => '30805287',
                    'ds_procedimento' => 'Tratamento da mediastinite por vídeo	     ',
                    'especialidade_id' => null
                ),
                320 => array(
                    'id' => '9750',
                    'cd_procedimento' => '30806046',
                    'ds_procedimento' => 'Implante de marca-passo diafragmático definitivo     ',
                    'especialidade_id' => null
                ),
                321 => array(
                    'id' => '9763',
                    'cd_procedimento' => '30902029',
                    'ds_procedimento' => 'Cirurgia multivalvar	    ',
                    'especialidade_id' => null
                ),
                322 => array(
                    'id' => '9764',
                    'cd_procedimento' => '30902037',
                    'ds_procedimento' => 'Comissurotomia valvar	    ',
                    'especialidade_id' => null
                ),
                323 => array(
                    'id' => '9766',
                    'cd_procedimento' => '30902053',
                    'ds_procedimento' => 'Troca valvar',
                    'especialidade_id' => null
                ),
                324 => array(
                    'id' => '9767',
                    'cd_procedimento' => '30903017',
                    'ds_procedimento' => 'Aneurismectomia de VE	    ',
                    'especialidade_id' => null
                ),
                325 => array(
                    'id' => '9770',
                    'cd_procedimento' => '30903041',
                    'ds_procedimento' => 'Ventriculectomia parcial	',
                    'especialidade_id' => null
                ),
                326 => array(
                    'id' => '9772',
                    'cd_procedimento' => '30904021',
                    'ds_procedimento' => 'Implante de desfibrilador interno, placas e eletrodos ',
                    'especialidade_id' => null
                ),
                327 => array(
                    'id' => '9780',
                    'cd_procedimento' => '30904129',
                    'ds_procedimento' => 'Troca de gerador	        ',
                    'especialidade_id' => null
                ),
                328 => array(
                    'id' => '9786',
                    'cd_procedimento' => '30905060',
                    'ds_procedimento' => 'Perfusionista',
                    'especialidade_id' => null
                ),
                329 => array(
                    'id' => '9787',
                    'cd_procedimento' => '30906016',
                    'ds_procedimento' => 'Aneurisma de aorta abdominal infra-renal	 ',
                    'especialidade_id' => null
                ),
                330 => array(
                    'id' => '9788',
                    'cd_procedimento' => '30906024',
                    'ds_procedimento' => 'Aneurisma de aorta abdominal supra-renal	 ',
                    'especialidade_id' => null
                ),
                331 => array(
                    'id' => '9800',
                    'cd_procedimento' => '30906385',
                    'ds_procedimento' => 'Arterioplastia da femoral profunda (profundoplastia) ',
                    'especialidade_id' => null
                ),
                332 => array(
                    'id' => '9801',
                    'cd_procedimento' => '30906164',
                    'ds_procedimento' => 'Cateterismo da artéria radial - para PAM	 ',
                    'especialidade_id' => null
                ),
                333 => array(
                    'id' => '9803',
                    'cd_procedimento' => '30906180',
                    'ds_procedimento' => 'Endarterectomia aorto-ilíaca ',
                    'especialidade_id' => null
                ),
                334 => array(
                    'id' => '9807',
                    'cd_procedimento' => '30906229',
                    'ds_procedimento' => 'Ponte aorto-bifemoral	    ',
                    'especialidade_id' => null
                ),
                335 => array(
                    'id' => '9808',
                    'cd_procedimento' => '30906237',
                    'ds_procedimento' => 'Ponte aorto-biilíaca	    ',
                    'especialidade_id' => null
                ),
                336 => array(
                    'id' => '9809',
                    'cd_procedimento' => '30906245',
                    'ds_procedimento' => 'Ponte aorto-femoral - unilateral	         ',
                    'especialidade_id' => null
                ),
                337 => array(
                    'id' => '9811',
                    'cd_procedimento' => '30906261',
                    'ds_procedimento' => 'Ponte axilo-bifemoral	    ',
                    'especialidade_id' => null
                ),
                338 => array(
                    'id' => '9813',
                    'cd_procedimento' => '30906288',
                    'ds_procedimento' => 'Ponte distal',
                    'especialidade_id' => null
                ),
                339 => array(
                    'id' => '9815',
                    'cd_procedimento' => '30906300',
                    'ds_procedimento' => 'Ponte fêmoro-femoral cruzada ',
                    'especialidade_id' => null
                ),
                340 => array(
                    'id' => '9816',
                    'cd_procedimento' => '30906318',
                    'ds_procedimento' => 'Ponte fêmoro-femoral ipsilateral	         ',
                    'especialidade_id' => null
                ),
                341 => array(
                    'id' => '9820',
                    'cd_procedimento' => '30906350',
                    'ds_procedimento' => 'Pontes transcervicais - qualquer tipo	     ',
                    'especialidade_id' => null
                ),
                342 => array(
                    'id' => '9850',
                    'cd_procedimento' => '30908078',
                    'ds_procedimento' => 'Fístula arteriovenosa direta ',
                    'especialidade_id' => null
                ),
                343 => array(
                    'id' => '9859',
                    'cd_procedimento' => '30910021',
                    'ds_procedimento' => 'Aneurismas rotos ou trombosados - outros	 ',
                    'especialidade_id' => null
                ),
                344 => array(
                    'id' => '9862',
                    'cd_procedimento' => '30910056',
                    'ds_procedimento' => 'Aneurismas rotos ou trombosados de axilar, femoral, poplítea	     ',
                    'especialidade_id' => null
                ),
                345 => array(
                    'id' => '9880',
                    'cd_procedimento' => '30911095',
                    'ds_procedimento' => 'Cateterismo E e estudo cineangiográfico da aorta e/ou seus ramos	 ',
                    'especialidade_id' => null
                ),
                346 => array(
                    'id' => '9895',
                    'cd_procedimento' => '30912067',
                    'ds_procedimento' => 'Atriosseptostomia por lâmina ',
                    'especialidade_id' => null
                ),
                347 => array(
                    'id' => '9897',
                    'cd_procedimento' => '30912075',
                    'ds_procedimento' => 'Emboloterapia',
                    'especialidade_id' => null
                ),
                348 => array(
                    'id' => '9898',
                    'cd_procedimento' => '30912091',
                    'ds_procedimento' => 'Implante de prótese intravascular na aorta/pulmonar ou ramos com ou sem angioplastia  ',
                    'especialidade_id' => null
                ),
                349 => array(
                    'id' => '9928',
                    'cd_procedimento' => '30914051',
                    'ds_procedimento' => 'Linfadenectomia cervical	',
                    'especialidade_id' => null
                ),
                350 => array(
                    'id' => '9934',
                    'cd_procedimento' => '30914086',
                    'ds_procedimento' => 'Linfangioplastia	        ',
                    'especialidade_id' => null
                ),
                351 => array(
                    'id' => '9944',
                    'cd_procedimento' => '30915031',
                    'ds_procedimento' => 'Pericardiocentese	        ',
                    'especialidade_id' => null
                ),
                352 => array(
                    'id' => '9946',
                    'cd_procedimento' => '30915066',
                    'ds_procedimento' => 'Pericardiotomia / Pericardiectomia por vídeo ',
                    'especialidade_id' => null
                ),
                353 => array(
                    'id' => '9947',
                    'cd_procedimento' => '30916011',
                    'ds_procedimento' => 'Hipotermia profunda com ou sem parada circulatória total	         ',
                    'especialidade_id' => null
                ),
                354 => array(
                    'id' => '9949',
                    'cd_procedimento' => '30917026',
                    'ds_procedimento' => 'Cardiomioplastia	        ',
                    'especialidade_id' => null
                ),
                355 => array(
                    'id' => '9954',
                    'cd_procedimento' => '31001033',
                    'ds_procedimento' => 'Autotransplante com microcirurgia	         ',
                    'especialidade_id' => null
                ),
                356 => array(
                    'id' => '9956',
                    'cd_procedimento' => '31001300',
                    'ds_procedimento' => 'Esofagectomia distal com ou sem toracotomia por videolaparoscopia	 ',
                    'especialidade_id' => null
                ),
                357 => array(
                    'id' => '9957',
                    'cd_procedimento' => '31001041',
                    'ds_procedimento' => 'Esofagectomia distal com toracotomia	     ',
                    'especialidade_id' => null
                ),
                358 => array(
                    'id' => '9958',
                    'cd_procedimento' => '31001050',
                    'ds_procedimento' => 'Esofagectomia distal sem toracotomia	     ',
                    'especialidade_id' => null
                ),
                359 => array(
                    'id' => '9959',
                    'cd_procedimento' => '31001254',
                    'ds_procedimento' => 'Esofagectomia subtotal com linfadenectomia com ou sem toracotomia	 ',
                    'especialidade_id' => null
                ),
                360 => array(
                    'id' => '9960',
                    'cd_procedimento' => '31001068',
                    'ds_procedimento' => 'Esofagoplastia (coloplastia) ',
                    'especialidade_id' => null
                ),
                361 => array(
                    'id' => '9964',
                    'cd_procedimento' => '31001343',
                    'ds_procedimento' => 'Esofagorrafia torácica por videotoracoscopia ',
                    'especialidade_id' => null
                ),
                362 => array(
                    'id' => '9965',
                    'cd_procedimento' => '31001220',
                    'ds_procedimento' => 'Esofagostomia',
                    'especialidade_id' => null
                ),
                363 => array(
                    'id' => '9992',
                    'cd_procedimento' => '31002064',
                    'ds_procedimento' => 'Gastrectomia parcial com linfadenectomia	 ',
                    'especialidade_id' => null
                ),
                364 => array(
                    'id' => '9995',
                    'cd_procedimento' => '31002315',
                    'ds_procedimento' => 'Gastrectomia parcial com vagotomia por videolaparoscopia	         ',
                    'especialidade_id' => null
                ),
                365 => array(
                    'id' => '9997',
                    'cd_procedimento' => '31002323',
                    'ds_procedimento' => 'Gastrectomia parcial sem vagotomia por videolaparoscopia	         ',
                    'especialidade_id' => null
                ),
                366 => array(
                    'id' => '10001',
                    'cd_procedimento' => '31002331',
                    'ds_procedimento' => 'Gastrectomia total com linfadenectomia por videolaparoscopia	     ',
                    'especialidade_id' => null
                ),
                367 => array(
                    'id' => '10002',
                    'cd_procedimento' => '31002129',
                    'ds_procedimento' => 'Gastrectomia total via abdominal	         ',
                    'especialidade_id' => null
                ),
                368 => array(
                    'id' => '10005',
                    'cd_procedimento' => '31002358',
                    'ds_procedimento' => 'Gastroenteroanastomose por videolaparoscopia ',
                    'especialidade_id' => null
                ),
                369 => array(
                    'id' => '10008',
                    'cd_procedimento' => '31002145',
                    'ds_procedimento' => 'Gastrorrafia',
                    'especialidade_id' => null
                ),
                370 => array(
                    'id' => '10010',
                    'cd_procedimento' => '31002153',
                    'ds_procedimento' => 'Gastrotomia com sutura de varizes	         ',
                    'especialidade_id' => null
                ),
                371 => array(
                    'id' => '10011',
                    'cd_procedimento' => '31002170',
                    'ds_procedimento' => 'Gastrotomia para qualquer finalidade	     ',
                    'especialidade_id' => null
                ),
                372 => array(
                    'id' => '10012',
                    'cd_procedimento' => '31002161',
                    'ds_procedimento' => 'Gastrotomia para retirada de CE ou lesão isolada     ',
                    'especialidade_id' => null
                ),
                373 => array(
                    'id' => '10015',
                    'cd_procedimento' => '31002196',
                    'ds_procedimento' => 'Piloroplastia',
                    'especialidade_id' => null
                ),
                374 => array(
                    'id' => '10022',
                    'cd_procedimento' => '31002412',
                    'ds_procedimento' => 'Vagotomia superseletiva ou vagotomia gástrica proximal por videolaparoscopia	      ',
                    'especialidade_id' => null
                ),
                375 => array(
                    'id' => '10031',
                    'cd_procedimento' => '31003583',
                    'ds_procedimento' => 'Apendicectomia por videolaparoscopia	     ',
                    'especialidade_id' => null
                ),
                376 => array(
                    'id' => '10038',
                    'cd_procedimento' => '31003591',
                    'ds_procedimento' => 'Cirurgia de abaixamento por videolaparoscopia ',
                    'especialidade_id' => null
                ),
                377 => array(
                    'id' => '10041',
                    'cd_procedimento' => '31003168',
                    'ds_procedimento' => 'Colectomia parcial com colostomia	         ',
                    'especialidade_id' => null
                ),
                378 => array(
                    'id' => '10043',
                    'cd_procedimento' => '31003176',
                    'ds_procedimento' => 'Colectomia parcial sem colostomia	         ',
                    'especialidade_id' => null
                ),
                379 => array(
                    'id' => '10048',
                    'cd_procedimento' => '31003648',
                    'ds_procedimento' => 'Colectomia total com ileostomia por videolaparoscopia ',
                    'especialidade_id' => null
                ),
                380 => array(
                    'id' => '10059',
                    'cd_procedimento' => '31003672',
                    'ds_procedimento' => 'Enterectomia segmentar por videolaparoscopia ',
                    'especialidade_id' => null
                ),
                381 => array(
                    'id' => '10062',
                    'cd_procedimento' => '31003303',
                    'ds_procedimento' => 'Enterocolite necrotizante - tratamento cirúrgico     ',
                    'especialidade_id' => null
                ),
                382 => array(
                    'id' => '10064',
                    'cd_procedimento' => '31003699',
                    'ds_procedimento' => 'Enteropexia (qualquer segmento) por videolaparoscopia ',
                    'especialidade_id' => null
                ),
                383 => array(
                    'id' => '10068',
                    'cd_procedimento' => '31003702',
                    'ds_procedimento' => 'Esvaziamento pélvico anterior ou posterior por videolaparoscopia	 ',
                    'especialidade_id' => null
                ),
                384 => array(
                    'id' => '10070',
                    'cd_procedimento' => '31003710',
                    'ds_procedimento' => 'Esvaziamento pélvico total por videolaparoscopia     ',
                    'especialidade_id' => null
                ),
                385 => array(
                    'id' => '10072',
                    'cd_procedimento' => '31003370',
                    'ds_procedimento' => 'Fechamento de colostomia ou enterostomia	 ',
                    'especialidade_id' => null
                ),
                386 => array(
                    'id' => '10081',
                    'cd_procedimento' => '31003478',
                    'ds_procedimento' => 'Membrana duodenal - tratamento cirúrgico	 ',
                    'especialidade_id' => null
                ),
                387 => array(
                    'id' => '10087',
                    'cd_procedimento' => '31003761',
                    'ds_procedimento' => 'Piloromiotomia por videolaparoscopia	     ',
                    'especialidade_id' => null
                ),
                388 => array(
                    'id' => '10092',
                    'cd_procedimento' => '31003788',
                    'ds_procedimento' => 'Proctocolectomia total por videolaparoscopia ',
                    'especialidade_id' => null
                ),
                389 => array(
                    'id' => '10094',
                    'cd_procedimento' => '31003559',
                    'ds_procedimento' => 'Retossigmoidectomia abdominal ',
                    'especialidade_id' => null
                ),
                390 => array(
                    'id' => '10097',
                    'cd_procedimento' => '31004016',
                    'ds_procedimento' => 'Abscesso anorretal - drenagem ',
                    'especialidade_id' => null
                ),
                391 => array(
                    'id' => '10098',
                    'cd_procedimento' => '31004024',
                    'ds_procedimento' => 'Abscesso isquio-retal - drenagem	         ',
                    'especialidade_id' => null
                ),
                392 => array(
                    'id' => '10100',
                    'cd_procedimento' => '31004040',
                    'ds_procedimento' => 'Corpo estranho do reto - retirada	         ',
                    'especialidade_id' => null
                ),
                393 => array(
                    'id' => '10107',
                    'cd_procedimento' => '31004105',
                    'ds_procedimento' => 'Fissurectomia com ou sem esfincterotomia	 ',
                    'especialidade_id' => null
                ),
                394 => array(
                    'id' => '10109',
                    'cd_procedimento' => '31004121',
                    'ds_procedimento' => 'Fistulectomia anal em dois tempos	         ',
                    'especialidade_id' => null
                ),
                395 => array(
                    'id' => '10133',
                    'cd_procedimento' => '31005039',
                    'ds_procedimento' => 'Anastomose biliodigestiva intra-hepática	 ',
                    'especialidade_id' => null
                ),
                396 => array(
                    'id' => '10140',
                    'cd_procedimento' => '31005470',
                    'ds_procedimento' => 'Colecistectomia com colangiografia por videolaparoscopia	         ',
                    'especialidade_id' => null
                ),
                397 => array(
                    'id' => '10142',
                    'cd_procedimento' => '31005489',
                    'ds_procedimento' => 'Colecistectomia com fístula biliodigestiva por videolaparoscopia	 ',
                    'especialidade_id' => null
                ),
                398 => array(
                    'id' => '10144',
                    'cd_procedimento' => '31005497',
                    'ds_procedimento' => 'Colecistectomia sem colangiografia por videolaparoscopia	         ',
                    'especialidade_id' => null
                ),
                399 => array(
                    'id' => '10145',
                    'cd_procedimento' => '31005136',
                    'ds_procedimento' => 'Colecistojejunostomia	    ',
                    'especialidade_id' => null
                ),
                400 => array(
                    'id' => '10148',
                    'cd_procedimento' => '31005519',
                    'ds_procedimento' => 'Colecistostomia por videolaparoscopia	     ',
                    'especialidade_id' => null
                ),
                401 => array(
                    'id' => '10153',
                    'cd_procedimento' => '31005535',
                    'ds_procedimento' => 'Colédoco-duodenostomia por videolaparoscopia ',
                    'especialidade_id' => null
                ),
                402 => array(
                    'id' => '10156',
                    'cd_procedimento' => '31005543',
                    'ds_procedimento' => 'Coledocotomia ou coledocostomia com colecistectomia por videolaparoscopia	',
                    'especialidade_id' => null
                ),
                403 => array(
                    'id' => '10158',
                    'cd_procedimento' => '31005551',
                    'ds_procedimento' => 'Coledocotomia ou coledocostomia sem colecistectomia por videolaparoscopia	',
                    'especialidade_id' => null
                ),
                404 => array(
                    'id' => '10169',
                    'cd_procedimento' => '31005276',
                    'ds_procedimento' => 'Hepatorrafia',
                    'especialidade_id' => null
                ),
                405 => array(
                    'id' => '10176',
                    'cd_procedimento' => '31005306',
                    'ds_procedimento' => 'Lobectomia hepática esquerda ',
                    'especialidade_id' => null
                ),
                406 => array(
                    'id' => '10178',
                    'cd_procedimento' => '31005314',
                    'ds_procedimento' => 'Papilotomia transduodenal	',
                    'especialidade_id' => null
                ),
                407 => array(
                    'id' => '10190',
                    'cd_procedimento' => '31005403',
                    'ds_procedimento' => 'Sequestrectomia hepática	',
                    'especialidade_id' => null
                ),
                408 => array(
                    'id' => '10209',
                    'cd_procedimento' => '31007023',
                    'ds_procedimento' => 'Esplenectomia parcial	    ',
                    'especialidade_id' => null
                ),
                409 => array(
                    'id' => '10212',
                    'cd_procedimento' => '31007066',
                    'ds_procedimento' => 'Esplenectomia total por videolaparoscopia	 ',
                    'especialidade_id' => null
                ),
                410 => array(
                    'id' => '10213',
                    'cd_procedimento' => '31007040',
                    'ds_procedimento' => 'Esplenorrafia',
                    'especialidade_id' => null
                ),
                411 => array(
                    'id' => '10220',
                    'cd_procedimento' => '31008054',
                    'ds_procedimento' => 'Epiploplastia',
                    'especialidade_id' => null
                ),
                412 => array(
                    'id' => '10224',
                    'cd_procedimento' => '31008097',
                    'ds_procedimento' => 'Retirada de cateter Tenckhoff ',
                    'especialidade_id' => null
                ),
                413 => array(
                    'id' => '10232',
                    'cd_procedimento' => '31009085',
                    'ds_procedimento' => 'Herniorrafia crural - unilateral	         ',
                    'especialidade_id' => null
                ),
                414 => array(
                    'id' => '10234',
                    'cd_procedimento' => '31009093',
                    'ds_procedimento' => 'Herniorrafia epigástrica	',
                    'especialidade_id' => null
                ),
                415 => array(
                    'id' => '10237',
                    'cd_procedimento' => '31009336',
                    'ds_procedimento' => 'Herniorrafia inguinal - unilateral por videolaparoscopia	         ',
                    'especialidade_id' => null
                ),
                416 => array(
                    'id' => '10240',
                    'cd_procedimento' => '31009140',
                    'ds_procedimento' => 'Herniorrafia recidivante	',
                    'especialidade_id' => null
                ),
                417 => array(
                    'id' => '10249',
                    'cd_procedimento' => '31009247',
                    'ds_procedimento' => 'Paracentese abdominal	    ',
                    'especialidade_id' => null
                ),
                418 => array(
                    'id' => '10258',
                    'cd_procedimento' => '31101038',
                    'ds_procedimento' => 'Adrenalectomia unilateral	',
                    'especialidade_id' => null
                ),
                419 => array(
                    'id' => '10261',
                    'cd_procedimento' => '31101062',
                    'ds_procedimento' => 'Autotransplante renal unilateral	         ',
                    'especialidade_id' => null
                ),
                420 => array(
                    'id' => '10265',
                    'cd_procedimento' => '31101097',
                    'ds_procedimento' => 'Endopielotomia percutânea unilateral	     ',
                    'especialidade_id' => null
                ),
                421 => array(
                    'id' => '10271',
                    'cd_procedimento' => '31101151',
                    'ds_procedimento' => 'Nefrectomia parcial com ureterectomia	     ',
                    'especialidade_id' => null
                ),
                422 => array(
                    'id' => '10272',
                    'cd_procedimento' => '31101569',
                    'ds_procedimento' => 'Nefrectomia parcial laparoscópica unilateral ',
                    'especialidade_id' => null
                ),
                423 => array(
                    'id' => '10274',
                    'cd_procedimento' => '31101178',
                    'ds_procedimento' => 'Nefrectomia parcial unilateral extracorpórea ',
                    'especialidade_id' => null
                ),
                424 => array(
                    'id' => '10276',
                    'cd_procedimento' => '85400025',
                    'ds_procedimento' => 'Ajuste Oclusal por desgaste seletivo',
                    'especialidade_id' => '233'
                ),
                
                // ODONTOLOGIA
                425 => array(
                    'id' => '156',
                    'cd_consulta' => '85400025',
                    'ds_procedimento' => 'Ajuste Oclusal por desgaste seletivo	 ',
                    'especialidade_id' => 233
                ),
                426 => array(
                    'id' => '157',
                    'cd_consulta' => '85100013',
                    'ds_procedimento' => 'Capeamento pulpar direto	   ',
                    'especialidade_id' => 233
                ),
                427 => array(
                    'id' => '158',
                    'cd_consulta' => '85200018',
                    'ds_procedimento' => 'Clareamento de dente desvitalizado	     ',
                    'especialidade_id' => 233
                ),
                428 => array(
                    'id' => '159',
                    'cd_consulta' => '85100064',
                    'ds_procedimento' => 'Faceta direta em resina fotopolimerizável	        ',
                    'especialidade_id' => 233
                ),
                429 => array(
                    'id' => '160',
                    'cd_consulta' => '85400211',
                    'ds_procedimento' => 'Núcleo de preenchimento	       ',
                    'especialidade_id' => 233
                ),
                430 => array(
                    'id' => '161',
                    'cd_consulta' => '85400505',
                    'ds_procedimento' => 'Remoção de trabalho protético	         ',
                    'especialidade_id' => 233
                ),
                431 => array(
                    'id' => '162',
                    'cd_consulta' => '85100099',
                    'ds_procedimento' => 'Restauração de amálgama - 1 face	     ',
                    'especialidade_id' => 233
                ),
                432 => array(
                    'id' => '163',
                    'cd_consulta' => '85100102',
                    'ds_procedimento' => 'Restauração de amálgama - 2 faces	     ',
                    'especialidade_id' => 233
                ),
                433 => array(
                    'id' => '164',
                    'cd_consulta' => '85100110',
                    'ds_procedimento' => 'Restauração de amálgama - 3 faces	     ',
                    'especialidade_id' => 233
                ),
                434 => array(
                    'id' => '165',
                    'cd_consulta' => '85100129',
                    'ds_procedimento' => 'Restauração de amálgama - 4 faces	     ',
                    'especialidade_id' => 233
                ),
                435 => array(
                    'id' => '166',
                    'cd_consulta' => '85100196',
                    'ds_procedimento' => 'Restauração em resina fotopolimerizável 1 face	    ',
                    'especialidade_id' => 233
                ),
                436 => array(
                    'id' => '167',
                    'cd_consulta' => '85100200',
                    'ds_procedimento' => 'Restauração em resina fotopolimerizável 2 faces	    ',
                    'especialidade_id' => 233
                ),
                437 => array(
                    'id' => '168',
                    'cd_consulta' => '85100218',
                    'ds_procedimento' => 'Restauração em resina fotopolimerizável 3 faces	    ',
                    'especialidade_id' => 233
                ),
                438 => array(
                    'id' => '169',
                    'cd_consulta' => '85100226',
                    'ds_procedimento' => 'Restauração em resina fotopolimerizável 4 faces	    ',
                    'especialidade_id' => 233
                ),
                439 => array(
                    'id' => '170',
                    'cd_consulta' => '82000212',
                    'ds_procedimento' => 'Aumento de coroa clínica	   ',
                    'especialidade_id' => 233
                ),
                440 => array(
                    'id' => '171',
                    'cd_consulta' => '82000786',
                    'ds_procedimento' => 'Exérese ou excisão de cistos odontológicos	        ',
                    'especialidade_id' => 233
                ),
                441 => array(
                    'id' => '172',
                    'cd_consulta' => '82000794',
                    'ds_procedimento' => 'Exérese ou excisão de mucocele	         ',
                    'especialidade_id' => 233
                ),
                442 => array(
                    'id' => '173',
                    'cd_consulta' => '82000816',
                    'ds_procedimento' => 'Exodontia a retalho	',
                    'especialidade_id' => 233
                ),
                443 => array(
                    'id' => '174',
                    'cd_consulta' => '82000832',
                    'ds_procedimento' => 'Exodontia de permanente por indicação ortodôntica/protética	  ',
                    'especialidade_id' => 233
                ),
                444 => array(
                    'id' => '175',
                    'cd_consulta' => '82000859',
                    'ds_procedimento' => 'Exodontia de raiz residual	   ',
                    'especialidade_id' => 233
                ),
                445 => array(
                    'id' => '176',
                    'cd_consulta' => '83000089',
                    'ds_procedimento' => 'Exodontia simples de decíduo	         ',
                    'especialidade_id' => 233
                ),
                446 => array(
                    'id' => '177',
                    'cd_consulta' => '82000875',
                    'ds_procedimento' => 'Exodontia simples de permanente	         ',
                    'especialidade_id' => 233
                ),
                447 => array(
                    'id' => '178',
                    'cd_consulta' => '82000883',
                    'ds_procedimento' => 'Frenulectomia labial	       ',
                    'especialidade_id' => 233
                ),
                448 => array(
                    'id' => '179',
                    'cd_consulta' => '82000891',
                    'ds_procedimento' => 'Frenulectomia lingual	       ',
                    'especialidade_id' => 233
                ),
                449 => array(
                    'id' => '180',
                    'cd_consulta' => '82001286',
                    'ds_procedimento' => 'Remoção de dentes inclusos / impactados	 1',
                    'especialidade_id' => 233
                ),
                450 => array(
                    'id' => '181',
                    'cd_consulta' => '82001294',
                    'ds_procedimento' => 'Remoção de dentes semi-inclusos / impactados	 1  ',
                    'especialidade_id' => 233
                ),
                451 => array(
                    'id' => '182',
                    'cd_consulta' => '82001707',
                    'ds_procedimento' => 'Ulectomia	        ',
                    'especialidade_id' => 233
                ),
                452 => array(
                    'id' => '183',
                    'cd_consulta' => '82001715',
                    'ds_procedimento' => 'Ulotomia	 1      ',
                    'especialidade_id' => 233
                ),
                453 => array(
                    'id' => '184',
                    'cd_consulta' => '81000049',
                    'ds_procedimento' => 'Consulta odontológica de Urgência – Consultorio	    ',
                    'especialidade_id' => 233
                ),
                454 => array(
                    'id' => '185',
                    'cd_consulta' => '81000057',
                    'ds_procedimento' => 'Consulta odontológica de Urgência 24 hs – Pronto Socorro	  ',
                    'especialidade_id' => 233
                ),
                455 => array(
                    'id' => '186',
                    'cd_consulta' => '85300020',
                    'ds_procedimento' => 'Imobilização dentária em dentes permanentes	        ',
                    'especialidade_id' => 233
                ),
                456 => array(
                    'id' => '187',
                    'cd_consulta' => '85200034',
                    'ds_procedimento' => 'Pulpectomia	        ',
                    'especialidade_id' => 233
                ),
                457 => array(
                    'id' => '188',
                    'cd_consulta' => '85400467',
                    'ds_procedimento' => 'Recimentação de trabalhos protéticos	 ',
                    'especialidade_id' => 233
                ),
                458 => array(
                    'id' => '189',
                    'cd_consulta' => '85200042',
                    'ds_procedimento' => 'Pulpotomia	        ',
                    'especialidade_id' => 233
                ),
                459 => array(
                    'id' => '190',
                    'cd_consulta' => '85200077',
                    'ds_procedimento' => 'Remoção de núcleo intrarradicular	     ',
                    'especialidade_id' => 233
                ),
                460 => array(
                    'id' => '191',
                    'cd_consulta' => '85200093',
                    'ds_procedimento' => 'Retratamento endodôntico birradicular	 4',
                    'especialidade_id' => 233
                ),
                461 => array(
                    'id' => '192',
                    'cd_consulta' => '85200107',
                    'ds_procedimento' => 'Retratamento endodôntico multirradicular	 5      ',
                    'especialidade_id' => 233
                ),
                462 => array(
                    'id' => '193',
                    'cd_consulta' => '85200115',
                    'ds_procedimento' => 'Retratamento endodôntico unirradicular	 2',
                    'especialidade_id' => 233
                ),
                463 => array(
                    'id' => '194',
                    'cd_consulta' => '85200140',
                    'ds_procedimento' => 'Tratamento endodôntico birradicular	 1   ',
                    'especialidade_id' => 233
                ),
                464 => array(
                    'id' => '195',
                    'cd_consulta' => '83000151',
                    'ds_procedimento' => 'Tratamento endodôntico em dente decíduo	 ',
                    'especialidade_id' => 233
                ),
                465 => array(
                    'id' => '196',
                    'cd_consulta' => '85200158',
                    'ds_procedimento' => 'Tratamento endodôntico multirradicular	 2',
                    'especialidade_id' => 233
                ),
                466 => array(
                    'id' => '197',
                    'cd_consulta' => '85200166',
                    'ds_procedimento' => 'Tratamento endodôntico unirradicular	 1',
                    'especialidade_id' => 233
                ),
                467 => array(
                    'id' => '198',
                    'cd_consulta' => '98810001',
                    'ds_procedimento' => 'Documentação ortodôntica	 1 ',
                    'especialidade_id' => 233
                ),
                468 => array(
                    'id' => '199',
                    'cd_consulta' => '86000357',
                    'ds_procedimento' => 'Manutenção de aparelho ortodôntico - aparelho fixo	',
                    'especialidade_id' => 233
                ),
                469 => array(
                    'id' => '200',
                    'cd_consulta' => '84000139',
                    'ds_procedimento' => 'Atividade educativa em saúde bucal	     ',
                    'especialidade_id' => 233
                ),
                470 => array(
                    'id' => '201',
                    'cd_consulta' => '82000417',
                    'ds_procedimento' => 'Cirurgia periodontal a retalho	         ',
                    'especialidade_id' => 233
                ),
                471 => array(
                    'id' => '202',
                    'cd_consulta' => '82000557',
                    'ds_procedimento' => 'Cunha proximal	    ',
                    'especialidade_id' => 233
                ),
                472 => array(
                    'id' => '203',
                    'cd_consulta' => '85300012',
                    'ds_procedimento' => 'Dessensibilização dentária	   ',
                    'especialidade_id' => 233
                ),
                473 => array(
                    'id' => '204',
                    'cd_consulta' => '82000921',
                    'ds_procedimento' => 'Gengivectomia	    ',
                    'especialidade_id' => 233
                ),
                474 => array(
                    'id' => '205',
                    'cd_consulta' => '82000948',
                    'ds_procedimento' => 'Gengivoplastia	    ',
                    'especialidade_id' => 233
                ),
                475 => array(
                    'id' => '206',
                    'cd_consulta' => '85300039',
                    'ds_procedimento' => 'Raspagem sub-gengival/alisamento radicular	        ',
                    'especialidade_id' => 233
                ),
                476 => array(
                    'id' => '207',
                    'cd_consulta' => '85300047',
                    'ds_procedimento' => 'Raspagem supra-gengival	       ',
                    'especialidade_id' => 233
                ),
                477 => array(
                    'id' => '208',
                    'cd_consulta' => '81000014',
                    'ds_procedimento' => 'Condicionamento em Odontologia	         ',
                    'especialidade_id' => 233
                ),
                478 => array(
                    'id' => '209',
                    'cd_consulta' => '84000031',
                    'ds_procedimento' => 'Aplicação de cariostático	   ',
                    'especialidade_id' => 233
                ),
                479 => array(
                    'id' => '210',
                    'cd_consulta' => '84000074',
                    'ds_procedimento' => 'Aplicação de selante de fóssulas e fissuras	        ',
                    'especialidade_id' => 233
                ),
                480 => array(
                    'id' => '211',
                    'cd_consulta' => '84000090',
                    'ds_procedimento' => 'Aplicação tópica de flúor	   ',
                    'especialidade_id' => 233
                ),
                481 => array(
                    'id' => '212',
                    'cd_consulta' => '84000198',
                    'ds_procedimento' => 'Profilaxia: polimento coronário	         ',
                    'especialidade_id' => 233
                ),
                482 => array(
                    'id' => '213',
                    'cd_consulta' => '85400068',
                    'ds_procedimento' => 'Conserto em prótese total (exclusivamente em consultório)	  ',
                    'especialidade_id' => 233
                ),
                483 => array(
                    'id' => '214',
                    'cd_consulta' => '85400076',
                    'ds_procedimento' => 'Coroa provisória com pino	   ',
                    'especialidade_id' => 233
                ),
                484 => array(
                    'id' => '215',
                    'cd_consulta' => '85400084',
                    'ds_procedimento' => 'Coroa provisória sem pino	   ',
                    'especialidade_id' => 233
                ),
                485 => array(
                    'id' => '216',
                    'cd_consulta' => '85400092',
                    'ds_procedimento' => 'Coroa total acrílica prensada	 1       ',
                    'especialidade_id' => 233
                ),
                486 => array(
                    'id' => '217',
                    'cd_consulta' => '85400106',
                    'ds_procedimento' => 'Coroa total em cerâmica pura	 7       ',
                    'especialidade_id' => 233
                ),
                487 => array(
                    'id' => '218',
                    'cd_consulta' => '85400114',
                    'ds_procedimento' => 'Coroa total em cerômero	 4     ',
                    'especialidade_id' => 233
                ),
                488 => array(
                    'id' => '219',
                    'cd_consulta' => '85400149',
                    'ds_procedimento' => 'Coroa total metálica	 3     ',
                    'especialidade_id' => 233
                ),
                489 => array(
                    'id' => '220',
                    'cd_consulta' => '85400157',
                    'ds_procedimento' => 'Coroa total metalo cerâmica	 8 ',
                    'especialidade_id' => 233
                ),
                490 => array(
                    'id' => '221',
                    'cd_consulta' => '85400173',
                    'ds_procedimento' => 'Coroa total metalo plástica – resina acrílica	 2  ',
                    'especialidade_id' => 233
                ),
                491 => array(
                    'id' => '222',
                    'cd_consulta' => '85400181',
                    'ds_procedimento' => 'Faceta em cerâmica pura	 8     ',
                    'especialidade_id' => 233
                ),
                492 => array(
                    'id' => '223',
                    'cd_consulta' => '85400220',
                    'ds_procedimento' => 'Núcleo metálico fundido	 1     ',
                    'especialidade_id' => 233
                ),
                493 => array(
                    'id' => '224',
                    'cd_consulta' => '81000294',
                    'ds_procedimento' => 'Levantamento radiográfico (exame radiodôntico)	 1  ',
                    'especialidade_id' => 233
                ),
                494 => array(
                    'id' => '225',
                    'cd_consulta' => '81000375',
                    'ds_procedimento' => 'Radiografia interproximal - bite-wing	 ',
                    'especialidade_id' => 233
                ),
                495 => array(
                    'id' => '226',
                    'cd_consulta' => '81000383',
                    'ds_procedimento' => 'Radiografia oclusal	',
                    'especialidade_id' => 233
                ),
                496 => array(
                    'id' => '227',
                    'cd_consulta' => '81000405',
                    'ds_procedimento' => 'Radiografia panorâmica de mandíbula/maxila (ortopantomografia)',
                    'especialidade_id' => 233
                ),
                497 => array(
                    'id' => '228',
                    'cd_consulta' => '81000421',
                    'ds_procedimento' => 'Radiografia periapical	       ',
                    'especialidade_id' => 233
                ),
                
                // DERMATOLOGIA
                498 => array(
                    'id' => '229',
                    'cd_consulta' => '41301390',
                    'ds_procedimento' => 'COLETA DE RASPADO DÉRMICO EM LESÕES E SÍTIOS ESPECÍFICOS PARA BACILOSCOPIA',
                    'especialidade_id' => 198
                ),
                499 => array(
                    'id' => '230',
                    'cd_consulta' => '41301226',
                    'ds_procedimento' => 'EXAME MICOLÓGICO DIRETO (POR LOCAL)',
                    'especialidade_id' => 198
                ),
                500 => array(
                    'id' => '231',
                    'cd_consulta' => '41301218',
                    'ds_procedimento' => 'EXAME MICOLÓGICO – CULTURA E IDENTIFICAÇÃO DE COLÔNIA',
                    'especialidade_id' => 198
                ),
                501 => array(
                    'id' => '232',
                    'cd_consulta' => '40307123',
                    'ds_procedimento' => 'HIPERSENSIBILIDADE RETARDADA (INTRADERMO REAÇÃO IDER) CANDIDINA, CAXUMBA, ESTREPTOQUINASE-DORNASE, PPD, TRICOFITINA, VÍRUS VACINAL, OUTRO(S), CADA      ',
                    'especialidade_id' => 198
                ),
                502 => array(
                    'id' => '233',
                    'cd_consulta' => '41301331',
                    'ds_procedimento' => 'TRICOGRAMA',
                    'especialidade_id' => 198
                ),
                503 => array(
                    'id' => '234',
                    'cd_consulta' => '20104014',
                    'ds_procedimento' => 'ACTINOTERAPIA (POR SESSÃO)',
                    'especialidade_id' => 198
                ),
                504 => array(
                    'id' => '235',
                    'cd_consulta' => '20104332',
                    'ds_procedimento' => 'BOTA DE UNNA - CONFECÇÃO',
                    'especialidade_id' => 198
                ),
                505 => array(
                    'id' => '236',
                    'cd_consulta' => '20104073',
                    'ds_procedimento' => 'CRIOTERAPIA (GRUPO DE ATÉ 5 LESÕES)',
                    'especialidade_id' => 198
                ),
                506 => array(
                    'id' => '237',
                    'cd_consulta' => '30101352',
                    'ds_procedimento' => 'EPILAÇÃO POR ELETRÓLISE (POR SESSÃO)',
                    'especialidade_id' => 198
                ),
                507 => array(
                    'id' => '238',
                    'cd_consulta' => '30101646',
                    'ds_procedimento' => 'INFILTRAÇÃO INTRALESIONAL, CICATRICIAL E HEMANGIOMAS – POR SESSÃO',
                    'especialidade_id' => 198
                ),
                508 => array(
                    'id' => '239',
                    'cd_consulta' => '30101107',
                    'ds_procedimento' => 'CAUTERIZAÇÃO QUÍMICA (POR GRUPO DE ATÉ 5 LESÕES)',
                    'especialidade_id' => 198
                ),
                509 => array(
                    'id' => '240',
                    'cd_consulta' => '30101417',
                    'ds_procedimento' => 'ESFOLIAÇÃO QUÍMICA SUPERFICIAL (POR SESSÃO) ',
                    'especialidade_id' => 198
                ),
                510 => array(
                    'id' => '241',
                    'cd_consulta' => '30101409',
                    'ds_procedimento' => 'ESFOLIAÇÃO QUÍMICA PROFUNDA (POR SESSÃO)  ',
                    'especialidade_id' => 198
                ),
                511 => array(
                    'id' => '242',
                    'cd_consulta' => '20104120',
                    'ds_procedimento' => 'FOTOTERAPIA COM UVA (PUVA) (POR SESSÃO)   ',
                    'especialidade_id' => 198
                ),
                512 => array(
                    'id' => '243',
                    'cd_consulta' => '30101018',
                    'ds_procedimento' => 'ABRASÃO CIRÚRGICA (POR SESSÃO)  ',
                    'especialidade_id' => 198
                ),
                513 => array(
                    'id' => '244',
                    'cd_consulta' => '30101077',
                    'ds_procedimento' => 'BIÓPSIA DE PELE, TUMORES SUPERFICIAIS, TECIDO CELULAR SUBCUTÂNEO,LINFONODO SUPERFICIAL, ETC.     ',
                    'especialidade_id' => 198
                ),
                514 => array(
                    'id' => '245',
                    'cd_consulta' => '30101255',
                    'ds_procedimento' => 'CURETAGEM SIMPLES DE LESÕES DE PELE (POR GRUPO DE ATÉ 5 LESÕES)',
                    'especialidade_id' => 198
                ),
                515 => array(
                    'id' => '246',
                    'cd_consulta' => '30730031',
                    'ds_procedimento' => 'DESBRIDAMENTO CIRÚRGICO DE FERIDAS OU EXTREMIDADES ',
                    'especialidade_id' => 198
                ),
                516 => array(
                    'id' => '247',
                    'cd_consulta' => '30101298',
                    'ds_procedimento' => 'ELETROCOAGULAÇÃO DE LESÕES DE PELE E MUCOSAS – COM OU SEM CURETAGEM (POR GRUPO DE ATÉ 5 LESÕES)  ',
                    'especialidade_id' => 198
                ),
                517 => array(
                    'id' => '248',
                    'cd_consulta' => '30101450',
                    'ds_procedimento' => 'EXÉRESE E SUTURA DE LESÕES (CIRCULARES OU NÃO) COM ROTAÇÃO DE RETALHOS CUTÂNEOS ',
                    'especialidade_id' => 198
                ),
                518 => array(
                    'id' => '249',
                    'cd_consulta' => '30201055',
                    'ds_procedimento' => 'EXCISÃO EM CUNHA     ',
                    'especialidade_id' => 198
                ),
                519 => array(
                    'id' => '250',
                    'cd_consulta' => '30101921',
                    'ds_procedimento' => 'EXÉRESE E SUTURA DE HEMANGIOMA, LINFANGIOMA OU NEVUS (POR GRUPO DE ATÉ 5 LESÕES)',
                    'especialidade_id' => 198
                ),
                520 => array(
                    'id' => '251',
                    'cd_consulta' => '30101662',
                    'ds_procedimento' => 'MATRICECTOMIA POR DOBRA UNGUEAL ',
                    'especialidade_id' => 198
                ),
                521 => array(
                    'id' => '252',
                    'cd_consulta' => '30101670',
                    'ds_procedimento' => 'PLÁSTICA EM Z OU W   ',
                    'especialidade_id' => 198
                ),
                522 => array(
                    'id' => '253',
                    'cd_consulta' => '30101492',
                    'ds_procedimento' => 'EXÉRESE E SUTURA SIMPLES DE PEQUENAS LESÕES (POR GRUPO DE ATÉ 5 LESÕES) ',
                    'especialidade_id' => 198
                ),
                523 => array(
                    'id' => '254',
                    'cd_consulta' => '30101093',
                    'ds_procedimento' => 'CALOSIDADE E/OU MAL PERFURANTE – DESBASTAMENTO (POR LESÃO) ',
                    'especialidade_id' => 198
                ),
                524 => array(
                    'id' => '255',
                    'cd_consulta' => '30101468',
                    'ds_procedimento' => 'EXÉRESE DE LESÃO / TUMOR DE PELE E MUCOSAS',
                    'especialidade_id' => 198
                ),
                525 => array(
                    'id' => '256',
                    'cd_consulta' => '30101484',
                    'ds_procedimento' => 'EXÉRESE DE UNHA      ',
                    'especialidade_id' => 198
                ),
                526 => array(
                    'id' => '257',
                    'cd_consulta' => '30907071',
                    'ds_procedimento' => 'FULGURAÇÃO DE TELANGIECTASIAS (POR GRUPO) ',
                    'especialidade_id' => 198
                ),
                527 => array(
                    'id' => '258',
                    'cd_consulta' => '30101620',
                    'ds_procedimento' => 'INCISÃO E DRENAGEM DE ABSCESSO, HEMATOMA OU PANARÍCIO',
                    'especialidade_id' => 198
                ),
                528 => array(
                    'id' => '259',
                    'cd_consulta' => '30101735',
                    'ds_procedimento' => 'RETIRADA DE CORPO ESTRANHO SUBCUTÂNEO     ',
                    'especialidade_id' => 198
                ),
                529 => array(
                    'id' => '260',
                    'cd_consulta' => '30101506',
                    'ds_procedimento' => 'EXÉRESE TANGENCIAL (SHAVING) – (POR GRUPO DE ATÉ 5 LESÕES)',
                    'especialidade_id' => 198
                ),
                530 => array(
                    'id' => '261',
                    'cd_consulta' => '30101840',
                    'ds_procedimento' => 'TRATAMENTO DA MIIASE FURUNCULOIDE (POR LESÃO)',
                    'especialidade_id' => 198
                ),
                531 => array(
                    'id' => '262',
                    'cd_consulta' => '30101441',
                    'ds_procedimento' => 'EXÉRESE DE LESÃO COM AUTO-ENXERTIA        ',
                    'especialidade_id' => 198
                ),
                532 => array(
                    'id' => '263',
                    'cd_consulta' => '30101247',
                    'ds_procedimento' => 'CURETAGEM E ELETROCOAGULAÇÃO DE CA DE PELE (POR LESÃO) ',
                    'especialidade_id' => 198
                ),
                533 => array(
                    'id' => '264',
                    'cd_consulta' => '30210119',
                    'ds_procedimento' => 'EXÉRESE DE TUMOR MALIGNO DE PELE',
                    'especialidade_id' => 198
                ),
                534 => array(
                    'id' => '265',
                    'cd_consulta' => '30101638',
                    'ds_procedimento' => 'INCISÃO E DRENAGEM DE FLEGMÃO   ',
                    'especialidade_id' => 198
                ),
                535 => array(
                    'id' => '266',
                    'cd_consulta' => '30101654',
                    'ds_procedimento' => 'LASERCIRURGIA (POR SESSÃO)      ',
                    'especialidade_id' => 198
                ),
                536 => array(
                    'id' => '267',
                    'cd_consulta' => '30101204',
                    'ds_procedimento' => 'CRIOCIRURGIA (NITROGÊNIO LÍQUIDO) DE NEOPLASIAS CUTÂNEAS',
                    'especialidade_id' => 198
                ),
                
                // OFTALMOLOGIA
                537 => array(
                    'id' => '268',
                    'cd_consulta' => '41301072',
                    'ds_procedimento' => 'CAMPIMETRIA MANUAL – MONOCULAR	',
                    'especialidade_id' => 220
                ),
                538 => array(
                    'id' => '269',
                    'cd_consulta' => '41301129',
                    'ds_procedimento' => 'CURVA TENSIONAL DIÁRIA – BINOCULAR	',
                    'especialidade_id' => 220
                ),
                539 => array(
                    'id' => '270',
                    'cd_consulta' => '41301200',
                    'ds_procedimento' => 'EXAME DE MOTILIDADE OCULAR (TESTE ORTÓPTICO) – BINOCULAR  ',
                    'especialidade_id' => 220
                ),
                540 => array(
                    'id' => '271',
                    'cd_consulta' => '40103250',
                    'ds_procedimento' => 'ELETRO-RETINOGRAFIA – MONOCULAR   ',
                    'especialidade_id' => 220
                ),
                541 => array(
                    'id' => '272',
                    'cd_consulta' => '40103242',
                    'ds_procedimento' => 'ELETRO-OCULOGRAFIA – MONOCULAR',
                    'especialidade_id' => 220
                ),
                542 => array(
                    'id' => '273',
                    'cd_consulta' => '41301250',
                    'ds_procedimento' => 'MAPEAMENTO DE RETINA (OFTALMOSCOPIA INDIRETA) – MONOCULAR ',
                    'especialidade_id' => 220
                ),
                543 => array(
                    'id' => '274',
                    'cd_consulta' => '41301277',
                    'ds_procedimento' => 'OFTALMODINAMOMETRIA – MONOCULAR   ',
                    'especialidade_id' => 220
                ),
                544 => array(
                    'id' => '275',
                    'cd_consulta' => '40103633',
                    'ds_procedimento' => 'POTENCIAL EVOCADO VISUAL (PEV)',
                    'especialidade_id' => 220
                ),
                545 => array(
                    'id' => '276',
                    'cd_consulta' => '41301315',
                    'ds_procedimento' => 'RETINOGRAFIA (SÓ HONORÁRIO) MONOCULAR       ',
                    'especialidade_id' => 220
                ),
                546 => array(
                    'id' => '277',
                    'cd_consulta' => '41301013',
                    'ds_procedimento' => 'ANGIOFLUORESCEINOGRAFIA – MONOCULAR         ',
                    'especialidade_id' => 220
                ),
                547 => array(
                    'id' => '278',
                    'cd_consulta' => '20101198',
                    'ds_procedimento' => 'TESTE E ADAPTAÇÃO DE LENTE DE CONTATO (SESSÃO) - BINOCULAR',
                    'especialidade_id' => 220
                ),
                548 => array(
                    'id' => '279',
                    'cd_consulta' => '41301323',
                    'ds_procedimento' => 'TONOMETRIA – BINOCULAR      ',
                    'especialidade_id' => 220
                ),
                549 => array(
                    'id' => '280',
                    'cd_consulta' => '41301366',
                    'ds_procedimento' => 'VISÃO SUBNORMAL – MONOCULAR ',
                    'especialidade_id' => 220
                ),
                550 => array(
                    'id' => '281',
                    'cd_consulta' => '41501012',
                    'ds_procedimento' => 'BIOMETRIA ULTRASSÔNICA – MONOCULAR',
                    'especialidade_id' => 220
                ),
                551 => array(
                    'id' => '282',
                    'cd_consulta' => '41501128',
                    'ds_procedimento' => 'PAQUIMETRIA ULTRASSÔNICA – MONOCULAR        ',
                    'especialidade_id' => 220
                ),
                552 => array(
                    'id' => '283',
                    'cd_consulta' => '41301269',
                    'ds_procedimento' => 'MICROSCOPIA ESPECULAR DE CÓRNEA – MONOCULAR ',
                    'especialidade_id' => 220
                ),
                553 => array(
                    'id' => '284',
                    'cd_consulta' => '41301242',
                    'ds_procedimento' => 'GONIOSCOPIA – BINOCULAR     ',
                    'especialidade_id' => 220
                ),
                554 => array(
                    'id' => '285',
                    'cd_consulta' => '41301307',
                    'ds_procedimento' => 'POTENCIAL DE ACUIDADE VISUAL – MONOCULAR    ',
                    'especialidade_id' => 220
                ),
                555 => array(
                    'id' => '286',
                    'cd_consulta' => '41301439',
                    'ds_procedimento' => 'FUNDOSCOPIA SOB MEDRÍASES - BINOCULAR       ',
                    'especialidade_id' => 220
                ),
                556 => array(
                    'id' => '287',
                    'cd_consulta' => '41301080',
                    'ds_procedimento' => 'CERATOSCOPIA COMPUTADORIZADA – MONOCULAR    ',
                    'especialidade_id' => 220
                ),
                557 => array(
                    'id' => '288',
                    'cd_consulta' => '41401301',
                    'ds_procedimento' => 'TESTE PROVOCATIVO PARA GLAUCOMA – BINOCULAR ',
                    'especialidade_id' => 220
                ),
                558 => array(
                    'id' => '289',
                    'cd_consulta' => '41301153',
                    'ds_procedimento' => 'ESTÉREO-FOTO DE PAPILA – MONOCULAR',
                    'especialidade_id' => 220
                ),
                559 => array(
                    'id' => '290',
                    'cd_consulta' => '41401271',
                    'ds_procedimento' => 'TESTE DE SENSIBILIDADE DE CONTRASTE OU DE CORES – MONOCULAR   ',
                    'especialidade_id' => 220
                ),
                560 => array(
                    'id' => '291',
                    'cd_consulta' => '41301420',
                    'ds_procedimento' => 'BIOMICROSCOPIA DE FUNDO     ',
                    'especialidade_id' => 220
                ),
                561 => array(
                    'id' => '292',
                    'cd_consulta' => '41301030',
                    'ds_procedimento' => 'AVALIAÇÃO ÓRBITO-PALPEBRAL-EXOFTALMOMETRIA – BINOCULAR    ',
                    'especialidade_id' => 220
                ),
                562 => array(
                    'id' => '293',
                    'cd_consulta' => '40103137',
                    'ds_procedimento' => 'CAMPIMETRIA COMPUTADORIZADA – MONOCULAR     ',
                    'especialidade_id' => 220
                ),
                563 => array(
                    'id' => '294',
                    'cd_consulta' => '41301170',
                    'ds_procedimento' => 'AVALIAÇÃO DE VIAS LACRIMAIS – MONOCULAR     ',
                    'especialidade_id' => 220
                ),
                564 => array(
                    'id' => '295',
                    'cd_consulta' => '40103021',
                    'ds_procedimento' => 'ANÁLISE COMPUTADORIZADA DE PAPILA E/OU FIBRAS NERVOSAS – MONOCULAR      ',
                    'especialidade_id' => 220
                ),
                565 => array(
                    'id' => '296',
                    'cd_consulta' => '41203011',
                    'ds_procedimento' => 'BETATERAPIA (PLACA DE ESTRÔNCIO) – POR CAMPO',
                    'especialidade_id' => 220
                ),
                566 => array(
                    'id' => '297',
                    'cd_consulta' => '20104081',
                    'ds_procedimento' => 'CURATIVOS EM GERAL COM ANESTESIA, EXCETO QUEIMADOS        ',
                    'especialidade_id' => 220
                ),
                567 => array(
                    'id' => '298',
                    'cd_consulta' => '20103239',
                    'ds_procedimento' => 'EXERCÍCIOS DE ORTÓPTICA (POR SESSÃO)        ',
                    'especialidade_id' => 220
                ),
                568 => array(
                    'id' => '299',
                    'cd_consulta' => '30303028',
                    'ds_procedimento' => 'BIÓPSIA DE CONJUNTIVA       ',
                    'especialidade_id' => 220
                ),
                569 => array(
                    'id' => '300',
                    'cd_consulta' => '30303044',
                    'ds_procedimento' => 'INFILTRAÇÃO SUBCONJUNTIVAL  ',
                    'especialidade_id' => 220
                ),
                570 => array(
                    'id' => '301',
                    'cd_consulta' => '30303060',
                    'ds_procedimento' => 'PTERÍGIO – EXÉRESE',
                    'especialidade_id' => 220
                ),
                571 => array(
                    'id' => '302',
                    'cd_consulta' => '30303079',
                    'ds_procedimento' => 'RECONSTITUIÇÃO DE FUNDO DE SACO   ',
                    'especialidade_id' => 220
                ),
                572 => array(
                    'id' => '303',
                    'cd_consulta' => '30303087',
                    'ds_procedimento' => 'SUTURA DE CONJUNTIVA        ',
                    'especialidade_id' => 220
                ),
                573 => array(
                    'id' => '304',
                    'cd_consulta' => '30303109',
                    'ds_procedimento' => 'TUMOR DE CONJUNTIVA – EXÉRESE ',
                    'especialidade_id' => 220
                ),
                574 => array(
                    'id' => '305',
                    'cd_consulta' => '30303010',
                    'ds_procedimento' => 'AUTOTRANSPLANTE CONJUNTIVAL ',
                    'especialidade_id' => 220
                ),
                575 => array(
                    'id' => '306',
                    'cd_consulta' => '30304016',
                    'ds_procedimento' => 'CAUTERIZAÇÃO DE CÓRNEA      ',
                    'especialidade_id' => 220
                ),
                576 => array(
                    'id' => '307',
                    'cd_consulta' => '30304032',
                    'ds_procedimento' => 'CORPO ESTRANHO DA CÓRNEA – RETIRADA         ',
                    'especialidade_id' => 220
                ),
                577 => array(
                    'id' => '308',
                    'cd_consulta' => '30304059',
                    'ds_procedimento' => 'RECOBRIMENTO CONJUNTIVAL    ',
                    'especialidade_id' => 220
                ),
                578 => array(
                    'id' => '309',
                    'cd_consulta' => '30304067',
                    'ds_procedimento' => 'SUTURA DE CÓRNEA (COM OU SEM HÉRNIA DE ÍRIS)',
                    'especialidade_id' => 220
                ),
                579 => array(
                    'id' => '310',
                    'cd_consulta' => '31501010',
                    'ds_procedimento' => 'TRANSPLANTE DE CÓRNEA       ',
                    'especialidade_id' => 220
                ),
                580 => array(
                    'id' => '311',
                    'cd_consulta' => '30304075',
                    'ds_procedimento' => 'TARSOCONJUNTIVOCERATOPLASTIA',
                    'especialidade_id' => 220
                ),
                581 => array(
                    'id' => '312',
                    'cd_consulta' => '30304091',
                    'ds_procedimento' => 'FOTOABLAÇÃO DE SUPERFÍCIE CONVENCIONAL – PRK',
                    'especialidade_id' => 220
                ),
                582 => array(
                    'id' => '313',
                    'cd_consulta' => '30304105',
                    'ds_procedimento' => 'DELAMINAÇÃO CORNEANA COM FOTOABLAÇÃO ESTROMAL – LASIK     ',
                    'especialidade_id' => 220
                ),
                583 => array(
                    'id' => '314',
                    'cd_consulta' => '30305012',
                    'ds_procedimento' => 'PARACENTESE DA CÂMARA ANTERIOR',
                    'especialidade_id' => 220
                ),
                584 => array(
                    'id' => '315',
                    'cd_consulta' => '30305047',
                    'ds_procedimento' => 'RETIRADA DE CORPO ESTRANHO DA CÂMARA ANTERIOR   ',
                    'especialidade_id' => 220
                ),
                585 => array(
                    'id' => '316',
                    'cd_consulta' => '30305039',
                    'ds_procedimento' => 'REMOÇÃO DE HIFEMA ',
                    'especialidade_id' => 220
                ),
                586 => array(
                    'id' => '317',
                    'cd_consulta' => '30305020',
                    'ds_procedimento' => 'RECONSTRUÇÃO DA CÂMARA ANTERIOR   ',
                    'especialidade_id' => 220
                ),
                587 => array(
                    'id' => '318',
                    'cd_consulta' => '30306019',
                    'ds_procedimento' => 'CAPSULOTOMIA YAG OU CIRÚRGICA ',
                    'especialidade_id' => 220
                ),
                588 => array(
                    'id' => '319',
                    'cd_consulta' => '30306043',
                    'ds_procedimento' => 'FACECTOMIA SEM IMPLANTE     ',
                    'especialidade_id' => 220
                ),
                589 => array(
                    'id' => '320',
                    'cd_consulta' => '30306035',
                    'ds_procedimento' => 'FACECTOMIA COM LENTE INTRA-OCULAR SEM FACOEMULSIFICAÇÃO   ',
                    'especialidade_id' => 220
                ),
                590 => array(
                    'id' => '321',
                    'cd_consulta' => '30306060',
                    'ds_procedimento' => 'IMPLANTE SECUNDÁRIO / EXPLANTE / FIXAÇÃO ESCLERAL OU IRIANA   ',
                    'especialidade_id' => 220
                ),
                591 => array(
                    'id' => '322',
                    'cd_consulta' => '30307074',
                    'ds_procedimento' => 'RETIRADA DE CORPO ESTRANHO  ',
                    'especialidade_id' => 220
                ),
                592 => array(
                    'id' => '323',
                    'cd_consulta' => '30307040',
                    'ds_procedimento' => 'IMPLANTE DE SILICONE INTRAVÍTREO  ',
                    'especialidade_id' => 220
                ),
                593 => array(
                    'id' => '324',
                    'cd_consulta' => '30307120',
                    'ds_procedimento' => 'VITRECTOMIA VIAS PARS PLANA ',
                    'especialidade_id' => 220
                ),
                594 => array(
                    'id' => '325',
                    'cd_consulta' => '30307104',
                    'ds_procedimento' => 'VITRECTOMIA A CÉU ABERTO – CERATOPRÓTESE    ',
                    'especialidade_id' => 220
                ),
                595 => array(
                    'id' => '326',
                    'cd_consulta' => '30307066',
                    'ds_procedimento' => 'MEMBRANECTOMIA EPI OU SUB-RETINIANA         ',
                    'especialidade_id' => 220
                ),
                596 => array(
                    'id' => '327',
                    'cd_consulta' => '30307058',
                    'ds_procedimento' => 'INFUSÃO DE PERFLUOCARBONO   ',
                    'especialidade_id' => 220
                ),
                597 => array(
                    'id' => '328',
                    'cd_consulta' => '30307090',
                    'ds_procedimento' => 'TROCA FLUIDO GASOSA         ',
                    'especialidade_id' => 220
                ),
                598 => array(
                    'id' => '329',
                    'cd_consulta' => '30307031',
                    'ds_procedimento' => 'ENDOLASER/ENDODIATERMIA     ',
                    'especialidade_id' => 220
                ),
                599 => array(
                    'id' => '330',
                    'cd_consulta' => '30307015',
                    'ds_procedimento' => 'BIÓPSIA DE TUMOR VIA PARS PLANA   ',
                    'especialidade_id' => 220
                ),
                600 => array(
                    'id' => '331',
                    'cd_consulta' => '30307023',
                    'ds_procedimento' => 'BIÓPSIA DE VÍTREO VIA PARS PLANA  ',
                    'especialidade_id' => 220
                ),
                601 => array(
                    'id' => '332',
                    'cd_consulta' => '30307112',
                    'ds_procedimento' => 'VITRECTOMIA ANTERIOR        ',
                    'especialidade_id' => 220
                ),
                602 => array(
                    'id' => '333',
                    'cd_consulta' => '30308046',
                    'ds_procedimento' => 'EXÉRESE DE TUMOR DE ESCLERA ',
                    'especialidade_id' => 220
                ),
                603 => array(
                    'id' => '334',
                    'cd_consulta' => '30308038',
                    'ds_procedimento' => 'SUTURA DE ESCLERA ',
                    'especialidade_id' => 220
                ),
                604 => array(
                    'id' => '335',
                    'cd_consulta' => '30308020',
                    'ds_procedimento' => 'ENXERTO DE ESCLERA (QUALQUER TÉCNICA)       ',
                    'especialidade_id' => 220
                ),
                605 => array(
                    'id' => '336',
                    'cd_consulta' => '30309018',
                    'ds_procedimento' => 'ENUCLEAÇÃO OU EVISCERAÇÃO COM OU SEM IMPLANTE   ',
                    'especialidade_id' => 220
                ),
                606 => array(
                    'id' => '337',
                    'cd_consulta' => '30309026',
                    'ds_procedimento' => 'INJEÇÃO RETROBULBAR         ',
                    'especialidade_id' => 220
                ),
                607 => array(
                    'id' => '338',
                    'cd_consulta' => '30309034',
                    'ds_procedimento' => 'RECONSTITUIÇÃO DE GLOBO OCULAR COM LESÃO DE ESTRUTURAS INTRA-OCULARES   ',
                    'especialidade_id' => 220
                ),
                608 => array(
                    'id' => '339',
                    'cd_consulta' => '30310016',
                    'ds_procedimento' => 'BIÓPSIA DE ÍRIS E CORPO CILIAR',
                    'especialidade_id' => 220
                ),
                609 => array(
                    'id' => '340',
                    'cd_consulta' => '30310032',
                    'ds_procedimento' => 'CIRURGIAS FISTULIZANTES ANTIGLAUCOMATOSAS   ',
                    'especialidade_id' => 220
                ),
                610 => array(
                    'id' => '341',
                    'cd_consulta' => '30310067',
                    'ds_procedimento' => 'FOTOTRABECULOPLASTIA (LASER)',
                    'especialidade_id' => 220
                ),
                611 => array(
                    'id' => '342',
                    'cd_consulta' => '30310083',
                    'ds_procedimento' => 'IRIDECTOMIA (LASER OU CIRÚRGICA)  ',
                    'especialidade_id' => 220
                ),
                612 => array(
                    'id' => '343',
                    'cd_consulta' => '30310091',
                    'ds_procedimento' => 'IRIDOCICLECTOMIA  ',
                    'especialidade_id' => 220
                ),
                613 => array(
                    'id' => '344',
                    'cd_consulta' => '30310024',
                    'ds_procedimento' => 'CICLOTERAPIA – QUALQUER TÉCNICA   ',
                    'especialidade_id' => 220
                ),
                614 => array(
                    'id' => '345',
                    'cd_consulta' => '30310040',
                    'ds_procedimento' => 'CIRURGIAS FISTULIZANTES COM IMPLANTES VALVULARES',
                    'especialidade_id' => 220
                ),
                615 => array(
                    'id' => '346',
                    'cd_consulta' => '30310059',
                    'ds_procedimento' => 'DRENAGEM DE DESCOLAMENTO DE COROIDE         ',
                    'especialidade_id' => 220
                ),
                616 => array(
                    'id' => '347',
                    'cd_consulta' => '30310113',
                    'ds_procedimento' => 'SINEQUIOTOMIA (LASER)       ',
                    'especialidade_id' => 220
                ),
                617 => array(
                    'id' => '348',
                    'cd_consulta' => '30310105',
                    'ds_procedimento' => 'SINEQUIOTOMIA (CIRÚRGICA)   ',
                    'especialidade_id' => 220
                ),
                618 => array(
                    'id' => '349',
                    'cd_consulta' => '30310075',
                    'ds_procedimento' => 'GONIOTOMIA OU TRABECULOTOMIA',
                    'especialidade_id' => 220
                ),
                619 => array(
                    'id' => '350',
                    'cd_consulta' => '30311012',
                    'ds_procedimento' => 'BIÓPSIA DE MÚSCULOS         ',
                    'especialidade_id' => 220
                ),
                620 => array(
                    'id' => '351',
                    'cd_consulta' => '30311047',
                    'ds_procedimento' => 'ESTRABISMO HORIZONTAL – MONOCULAR ',
                    'especialidade_id' => 220
                ),
                621 => array(
                    'id' => '352',
                    'cd_consulta' => '30302021',
                    'ds_procedimento' => 'DESCOMPRESSÃO DE ÓRBITA OU NERVO ÓTICO      ',
                    'especialidade_id' => 220
                ),
                622 => array(
                    'id' => '353',
                    'cd_consulta' => '30302137',
                    'ds_procedimento' => 'TUMOR DE ÓRBITA – EXÉRESE   ',
                    'especialidade_id' => 220
                ),
                623 => array(
                    'id' => '354',
                    'cd_consulta' => '30302102',
                    'ds_procedimento' => 'RECONSTITUIÇÃO DE PAREDES ORBITÁRIAS        ',
                    'especialidade_id' => 220
                ),
                624 => array(
                    'id' => '355',
                    'cd_consulta' => '30302013',
                    'ds_procedimento' => 'CORREÇÃO DA ENOFTALMIA      ',
                    'especialidade_id' => 220
                ),
                625 => array(
                    'id' => '356',
                    'cd_consulta' => '30302080',
                    'ds_procedimento' => 'IMPLANTE SECUNDÁRIO DE ÓRBITA ',
                    'especialidade_id' => 220
                ),
                626 => array(
                    'id' => '357',
                    'cd_consulta' => '30302129',
                    'ds_procedimento' => 'RECONSTRUÇÃO TOTAL DA CAVIDADE ORBITAL – POR ESTÁGIO      ',
                    'especialidade_id' => 220
                ),
                627 => array(
                    'id' => '358',
                    'cd_consulta' => '30302056',
                    'ds_procedimento' => 'EXÉRESE DE TUMOR COM ABORDAGEM CRANIOFACIAL ONCOLÓGICA (TEMPO FACIAL) PÁLPEBRA, CAVIDADE ORBITÁRIA E OLHOS',
                    'especialidade_id' => 220
                ),
                628 => array(
                    'id' => '359',
                    'cd_consulta' => '30302048',
                    'ds_procedimento' => 'EXENTERAÇÃO DE ÓRBITA       ',
                    'especialidade_id' => 220
                ),
                629 => array(
                    'id' => '360',
                    'cd_consulta' => '30301017',
                    'ds_procedimento' => 'ABSCESSO DE PÁLPEBRA – DRENAGEM   ',
                    'especialidade_id' => 220
                ),
                630 => array(
                    'id' => '361',
                    'cd_consulta' => '30301025',
                    'ds_procedimento' => 'BIÓPSIA DE PÁLPEBRA         ',
                    'especialidade_id' => 220
                ),
                631 => array(
                    'id' => '362',
                    'cd_consulta' => '30301033',
                    'ds_procedimento' => 'BLEFARORRAFIA ',
                    'especialidade_id' => 220
                ),
                632 => array(
                    'id' => '363',
                    'cd_consulta' => '30301076',
                    'ds_procedimento' => 'COLOBOMA – COM PLÁSTICA     ',
                    'especialidade_id' => 220
                ),
                633 => array(
                    'id' => '364',
                    'cd_consulta' => '30301041',
                    'ds_procedimento' => 'CALÁZIO       ',
                    'especialidade_id' => 220
                ),
                634 => array(
                    'id' => '365',
                    'cd_consulta' => '30301122',
                    'ds_procedimento' => 'EPILAÇÃO      ',
                    'especialidade_id' => 220
                ),
                635 => array(
                    'id' => '366',
                    'cd_consulta' => '30301114',
                    'ds_procedimento' => 'EPICANTO – CORREÇÃO CIRÚRGICA – UNILATERAL  ',
                    'especialidade_id' => 220
                ),
                636 => array(
                    'id' => '367',
                    'cd_consulta' => '30301084',
                    'ds_procedimento' => 'CORREÇÃO CIRÚRGICA DE ECTRÓPIO OU ENTRÓPIO  ',
                    'especialidade_id' => 220
                ),
                637 => array(
                    'id' => '368',
                    'cd_consulta' => '30301181',
                    'ds_procedimento' => 'PTOSE PALPEBRAL – CORREÇÃO CIRÚRGICA – UNILATERAL         ',
                    'especialidade_id' => 220
                ),
                638 => array(
                    'id' => '369',
                    'cd_consulta' => '30301211',
                    'ds_procedimento' => 'SIMBLÉFARO COM OU SEM ENXERTO – CORREÇÃO CIRÚRGICA        ',
                    'especialidade_id' => 220
                ),
                639 => array(
                    'id' => '370',
                    'cd_consulta' => '30301238',
                    'ds_procedimento' => 'SUTURA DE PÁLPEBRA',
                    'especialidade_id' => 220
                ),
                640 => array(
                    'id' => '371',
                    'cd_consulta' => '30301262',
                    'ds_procedimento' => 'TRIQUÍASE COM OU SEM ENXERTO',
                    'especialidade_id' => 220
                ),
                641 => array(
                    'id' => '372',
                    'cd_consulta' => '30301270',
                    'ds_procedimento' => 'XANTELASMA PALPEBRAL – EXÉRESE – UNILATERAL ',
                    'especialidade_id' => 220
                ),
                642 => array(
                    'id' => '373',
                    'cd_consulta' => '30301246',
                    'ds_procedimento' => 'TARSORRAFIA   ',
                    'especialidade_id' => 220
                ),
                643 => array(
                    'id' => '374',
                    'cd_consulta' => '30301254',
                    'ds_procedimento' => 'TELECANTO – CORREÇÃO CIRÚRGICA – UNILATERAL ',
                    'especialidade_id' => 220
                ),
                644 => array(
                    'id' => '375',
                    'cd_consulta' => '30301203',
                    'ds_procedimento' => 'RETRAÇÃO PALPEBRAL',
                    'especialidade_id' => 220
                ),
                645 => array(
                    'id' => '376',
                    'cd_consulta' => '30301068',
                    'ds_procedimento' => 'CANTOPLASTIA MEDIAL         ',
                    'especialidade_id' => 220
                ),
                646 => array(
                    'id' => '377',
                    'cd_consulta' => '30301050',
                    'ds_procedimento' => 'CANTOPLASTIA LATERAL        ',
                    'especialidade_id' => 220
                ),
                647 => array(
                    'id' => '378',
                    'cd_consulta' => '30301157',
                    'ds_procedimento' => 'LAGOFTALMO – CORREÇÃO CIRÚRGICA   ',
                    'especialidade_id' => 220
                ),
                648 => array(
                    'id' => '379',
                    'cd_consulta' => '30301130',
                    'ds_procedimento' => 'EPILAÇÃO DE CÍLIOS (DIATERMO-COAGULAÇÃO)    ',
                    'especialidade_id' => 220
                ),
                649 => array(
                    'id' => '380',
                    'cd_consulta' => '30301165',
                    'ds_procedimento' => 'PÁLPEBRA – RECONSTRUÇÃO PARCIAL (COM OU SEM RESSECÇÃO DE TUMOR)         ',
                    'especialidade_id' => 220
                ),
                650 => array(
                    'id' => '381',
                    'cd_consulta' => '30301173',
                    'ds_procedimento' => 'PÁLPEBRA – RECONSTRUÇÃO TOTAL (COM OU SEM RESSECÇÃO DE TUMOR) – POR ESTÁGIO   ',
                    'especialidade_id' => 220
                ),
                651 => array(
                    'id' => '382',
                    'cd_consulta' => '30301220',
                    'ds_procedimento' => 'SUPERCÍLIO – RECONSTRUÇÃO TOTAL   ',
                    'especialidade_id' => 220
                ),
                652 => array(
                    'id' => '383',
                    'cd_consulta' => '30301106',
                    'ds_procedimento' => 'DERMATOCALAZE OU BLEFAROCALAZE – UNILATERAL ',
                    'especialidade_id' => 220
                ),
                653 => array(
                    'id' => '384',
                    'cd_consulta' => '30301149',
                    'ds_procedimento' => 'FISSURA PALPEBRAL – CORREÇÃO CIRÚRGICA      ',
                    'especialidade_id' => 220
                ),
                654 => array(
                    'id' => '385',
                    'cd_consulta' => '30312043',
                    'ds_procedimento' => 'FOTOCOAGULAÇÃO (LASER) – POR SESSÃO – MONOCULAR ',
                    'especialidade_id' => 220
                ),
                655 => array(
                    'id' => '386',
                    'cd_consulta' => '30312108',
                    'ds_procedimento' => 'RETINOPEXIA PROFILÁTICA (CRIOPEXIA)         ',
                    'especialidade_id' => 220
                ),
                656 => array(
                    'id' => '387',
                    'cd_consulta' => '30312086',
                    'ds_procedimento' => 'RETINOPEXIA COM INTROFLEXÃO ESCLERAL        ',
                    'especialidade_id' => 220
                ),
                657 => array(
                    'id' => '388',
                    'cd_consulta' => '30312094',
                    'ds_procedimento' => 'RETINOPEXIA PNEUMÁTICA      ',
                    'especialidade_id' => 220
                ),
                658 => array(
                    'id' => '389',
                    'cd_consulta' => '30312060',
                    'ds_procedimento' => 'PANCRIOTERAPIA PERIFÉRICA   ',
                    'especialidade_id' => 220
                ),
                659 => array(
                    'id' => '390',
                    'cd_consulta' => '30312019',
                    'ds_procedimento' => 'APLICAÇÃO DE PLACA RADIATIVA EPISCLERAL     ',
                    'especialidade_id' => 220
                ),
                660 => array(
                    'id' => '391',
                    'cd_consulta' => '30312078',
                    'ds_procedimento' => 'REMOÇÃO DE IMPLANTE EPISCLERAL',
                    'especialidade_id' => 220
                ),
                661 => array(
                    'id' => '392',
                    'cd_consulta' => '30312027',
                    'ds_procedimento' => 'BIÓPSIA DE RETINA ',
                    'especialidade_id' => 220
                ),
                662 => array(
                    'id' => '393',
                    'cd_consulta' => '30312035',
                    'ds_procedimento' => 'EXÉRESE DE TUMOR DE COROIDE E/OU CORPO CILIAR   ',
                    'especialidade_id' => 220
                ),
                663 => array(
                    'id' => '394',
                    'cd_consulta' => '30313023',
                    'ds_procedimento' => 'DACRIOCISTECTOMIA – UNILATERAL',
                    'especialidade_id' => 220
                ),
                664 => array(
                    'id' => '395',
                    'cd_consulta' => '30313031',
                    'ds_procedimento' => 'DACRIOCISTORRINOSTOMIA COM OU SEM INTUBAÇÃO – UNILATERAL  ',
                    'especialidade_id' => 220
                ),
                665 => array(
                    'id' => '396',
                    'cd_consulta' => '30313040',
                    'ds_procedimento' => 'FECHAMENTO DOS PONTOS LACRIMAIS   ',
                    'especialidade_id' => 220
                ),
                666 => array(
                    'id' => '397',
                    'cd_consulta' => '30301190',
                    'ds_procedimento' => 'RESSECÇÃO DE TUMORES PALPEBRAIS   ',
                    'especialidade_id' => 220
                ),
                667 => array(
                    'id' => '398',
                    'cd_consulta' => '30313066',
                    'ds_procedimento' => 'SONDAGEM DAS VIAS LACRIMAIS – COM OU SEM LAVAGEM',
                    'especialidade_id' => 220
                ),
                668 => array(
                    'id' => '399',
                    'cd_consulta' => '30313074',
                    'ds_procedimento' => 'RECONSTITUIÇÃO DE PONTOS LACRIMAIS',
                    'especialidade_id' => 220
                ),
                669 => array(
                    'id' => '400',
                    'cd_consulta' => '30313058',
                    'ds_procedimento' => 'RECONSTITUIÇÃO DE VIAS LACRIMAIS COM SILICONE OU OUTRO MATERIAL',
                    'especialidade_id' => 220
                ),
                670 => array(
                    'id' => '401',
                    'cd_consulta' => '30313015',
                    'ds_procedimento' => 'CIRURGIA DA GLÂNDULA LACRIMAL',
                    'especialidade_id' => 220
                ),
                
                // UROLOGIA
                671 => array(
                    'id' => '671',
                    'cd_consulta' => '40201066',
                    'ds_procedimento' => 'CISTOSCOPIA E/OU URETROSCOPIA',
                    'especialidade_id' => 232
                ),
                672 => array(
                    'id' => '672',
                    'cd_consulta' => '41501241',
                    'ds_procedimento' => 'PERFIL DE PRESSÃO URETRAL',
                    'especialidade_id' => 232
                ),
                673 => array(
                    'id' => '673',
                    'cd_consulta' => '41301358',
                    'ds_procedimento' => 'UROFLUXOMETRIA    ',
                    'especialidade_id' => 232
                ),
                674 => array(
                    'id' => '674',
                    'cd_consulta' => '41501250',
                    'ds_procedimento' => 'PRESSÃO INTRA ABDOMINAL UROLÓGICA',
                    'especialidade_id' => 232
                ),
                675 => array(
                    'id' => '675',
                    'cd_consulta' => '41301340',
                    'ds_procedimento' => 'URODINÂMICA COMPLETA        ',
                    'especialidade_id' => 232
                ),
                676 => array(
                    'id' => '676',
                    'cd_consulta' => '41501020',
                    'ds_procedimento' => 'CAVERNOSOMETRIA   ',
                    'especialidade_id' => 232
                ),
                677 => array(
                    'id' => '677',
                    'cd_consulta' => '41501047',
                    'ds_procedimento' => 'DOPPLERMETRIA DOS CORDÕES ESPERMÁTICOS ',
                    'especialidade_id' => 232
                ),
                678 => array(
                    'id' => '678',
                    'cd_consulta' => '41501268',
                    'ds_procedimento' => 'PRESSÃO ARTERIAL PENIANA    ',
                    'especialidade_id' => 232
                ),
                679 => array(
                    'id' => '679',
                    'cd_consulta' => '41301145',
                    'ds_procedimento' => 'EREÇÃO FÁRMACO-INDUZIDA     ',
                    'especialidade_id' => 232
                ),
                680 => array(
                    'id' => '680',
                    'cd_consulta' => '41301285',
                    'ds_procedimento' => 'PENISCOPIA (INCLUI BOLSA ESCROTAL)     ',
                    'especialidade_id' => 232
                ),
                681 => array(
                    'id' => '681',
                    'cd_consulta' => '40312321',
                    'ds_procedimento' => 'SEMIOLOGIA PARA IMPOTÊNCIA  ',
                    'especialidade_id' => 232
                ),
                682 => array(
                    'id' => '682',
                    'cd_consulta' => '20104049',
                    'ds_procedimento' => 'CATETERISMO VESICAL EM RETENÇÃO URINÁRIA         ',
                    'especialidade_id' => 232
                ),
                683 => array(
                    'id' => '683',
                    'cd_consulta' => '20104340',
                    'ds_procedimento' => 'CATETERISMO DE CANAIS EJACULADORES     ',
                    'especialidade_id' => 232
                ),
                684 => array(
                    'id' => '684',
                    'cd_consulta' => '20104057',
                    'ds_procedimento' => 'CAUTERIZAÇÃO QUÍMICA VESICAL',
                    'especialidade_id' => 232
                ),
                685 => array(
                    'id' => '685',
                    'cd_consulta' => '20104111',
                    'ds_procedimento' => 'DILATAÇÃO URETRAL (SESSÃO)  ',
                    'especialidade_id' => 232
                ),
                686 => array(
                    'id' => '686',
                    'cd_consulta' => '20104154',
                    'ds_procedimento' => 'INSTILAÇÃO VESICAL OU URETRAL',
                    'especialidade_id' => 232
                ),
                687 => array(
                    'id' => '687',
                    'cd_consulta' => '20104359',
                    'ds_procedimento' => 'MASSAGEM PROSTÁTICA         ',
                    'especialidade_id' => 232
                ),
                688 => array(
                    'id' => '688',
                    'cd_consulta' => '20204043',
                    'ds_procedimento' => 'PRIAPISMO – TRATAMENTO NÃO CIRÚRGICO   ',
                    'especialidade_id' => 232
                ),
                689 => array(
                    'id' => '689',
                    'cd_consulta' => '31101070',
                    'ds_procedimento' => 'BIÓPSIA RENAL CIRÚRGICA UNILATERAL     ',
                    'especialidade_id' => 232
                ),
                690 => array(
                    'id' => '690',
                    'cd_consulta' => '31101135',
                    'ds_procedimento' => 'MARSUPIALIZAÇÃO DE CISTOS RENAIS UNILATERAL      ',
                    'especialidade_id' => 232
                ),
                691 => array(
                    'id' => '691',
                    'cd_consulta' => '31101119',
                    'ds_procedimento' => 'FÍSTULA PIELO-CUTÂNEA – TRATAMENTO CIRÚRGICO     ',
                    'especialidade_id' => 232
                ),
                692 => array(
                    'id' => '692',
                    'cd_consulta' => '31307086',
                    'ds_procedimento' => 'LIGADURA DE VEIA OVARIANA   ',
                    'especialidade_id' => 232
                ),
                693 => array(
                    'id' => '693',
                    'cd_consulta' => '31101127',
                    'ds_procedimento' => 'LOMBOTOMIA EXPLORADORA      ',
                    'especialidade_id' => 232
                ),
                694 => array(
                    'id' => '694',
                    'cd_consulta' => '31101160',
                    'ds_procedimento' => 'NEFRECTOMIA PARCIAL UNILATERAL         ',
                    'especialidade_id' => 232
                ),
                695 => array(
                    'id' => '695',
                    'cd_consulta' => '31101194',
                    'ds_procedimento' => 'NEFRECTOMIA TOTAL UNILATERAL',
                    'especialidade_id' => 232
                ),
                696 => array(
                    'id' => '696',
                    'cd_consulta' => '31506038',
                    'ds_procedimento' => 'NEFRECTOMIA EM DOADOR VIVO  ',
                    'especialidade_id' => 232
                ),
                697 => array(
                    'id' => '697',
                    'cd_consulta' => '31101232',
                    'ds_procedimento' => 'NEFROLITOTOMIA SIMPLES UNILATERAL      ',
                    'especialidade_id' => 232
                ),
                698 => array(
                    'id' => '698',
                    'cd_consulta' => '31101291',
                    'ds_procedimento' => 'NEFRORRAFIA (TRAUMA) UNILATERAL        ',
                    'especialidade_id' => 232
                ),
                699 => array(
                    'id' => '699',
                    'cd_consulta' => '31101283',
                    'ds_procedimento' => 'NEFROPEXIA UNILATERAL       ',
                    'especialidade_id' => 232
                ),
                700 => array(
                    'id' => '700',
                    'cd_consulta' => '31101305',
                    'ds_procedimento' => 'NEFROSTOMIA A CÉU ABERTO UNILATERAL    ',
                    'especialidade_id' => 232
                ),
                701 => array(
                    'id' => '701',
                    'cd_consulta' => '31101313',
                    'ds_procedimento' => 'NEFROSTOMIA PERCUTÂNEA UNILATERAL      ',
                    'especialidade_id' => 232
                ),
                702 => array(
                    'id' => '702',
                    'cd_consulta' => '31101208',
                    'ds_procedimento' => 'NEFRO OU PIELOENTEROCISTOSTOMIA UNILATERAL       ',
                    'especialidade_id' => 232
                ),
                703 => array(
                    'id' => '703',
                    'cd_consulta' => '31101321',
                    'ds_procedimento' => 'NEFROURETERECTOMIA COM RESSECÇÃO VESICAL UNILATERAL         ',
                    'especialidade_id' => 232
                ),
                704 => array(
                    'id' => '704',
                    'cd_consulta' => '31101356',
                    'ds_procedimento' => 'PIELOLITOTOMIA UNILATERAL   ',
                    'especialidade_id' => 232
                ),
                705 => array(
                    'id' => '705',
                    'cd_consulta' => '31101330',
                    'ds_procedimento' => 'PIELOLITOTOMIA COM NEFROLITOTOMIA ANATRÓFICA UNILATERAL     ',
                    'especialidade_id' => 232
                ),
                706 => array(
                    'id' => '706',
                    'cd_consulta' => '31101348',
                    'ds_procedimento' => 'PIELOLITOTOMIA COM NEFROLITOTOMIA SIMPLES UNILATERAL        ',
                    'especialidade_id' => 232
                ),
                707 => array(
                    'id' => '707',
                    'cd_consulta' => '31101372',
                    'ds_procedimento' => 'PIELOSTOMIA UNILATERAL      ',
                    'especialidade_id' => 232
                ),
                708 => array(
                    'id' => '708',
                    'cd_consulta' => '31101380',
                    'ds_procedimento' => 'PIELOTOMIA EXPLORADORA UNILATERAL      ',
                    'especialidade_id' => 232
                ),
                709 => array(
                    'id' => '709',
                    'cd_consulta' => '31101410',
                    'ds_procedimento' => 'REVASCULARIZAÇÃO RENAL – QUALQUER TÉCNICA        ',
                    'especialidade_id' => 232
                ),
                710 => array(
                    'id' => '710',
                    'cd_consulta' => '31101429',
                    'ds_procedimento' => 'SINFISIOTOMIA (RIM EM FERRADURA)       ',
                    'especialidade_id' => 232
                ),
                711 => array(
                    'id' => '711',
                    'cd_consulta' => '31506011',
                    'ds_procedimento' => 'TRANSPLANTE RENAL (RECEPTOR)',
                    'especialidade_id' => 232
                ),
                712 => array(
                    'id' => '712',
                    'cd_consulta' => '31101470',
                    'ds_procedimento' => 'TUMORES RETRO-PERITONEAIS MALIGNOS UNILATERAIS – EXÉRESE    ',
                    'especialidade_id' => 232
                ),
                713 => array(
                    'id' => '713',
                    'cd_consulta' => '31101453',
                    'ds_procedimento' => 'TUMOR RENAL – ENUCLEAÇÃO UNILATERAL    ',
                    'especialidade_id' => 232
                ),
                714 => array(
                    'id' => '714',
                    'cd_consulta' => '31101445',
                    'ds_procedimento' => 'TRATAMENTO CIRÚRGICO DA FÍSTULA PIELO-INTESTINAL ',
                    'especialidade_id' => 232
                ),
                715 => array(
                    'id' => '715',
                    'cd_consulta' => '31101011',
                    'ds_procedimento' => 'ABSCESSO RENAL OU PERI-RENAL – DRENAGEM CIRÚRGICA',
                    'especialidade_id' => 232
                ),
                716 => array(
                    'id' => '716',
                    'cd_consulta' => '31101020',
                    'ds_procedimento' => 'ABSCESSO RENAL OU PERI-RENAL – DRENAGEM PERCUTÂNEA',
                    'especialidade_id' => 232
                ),
                717 => array(
                    'id' => '717',
                    'cd_consulta' => '40813878',
                    'ds_procedimento' => 'NEFROSTOMIA PERCUTÂNEA ORIENTADA POR RX, US, TC OU RM       ',
                    'especialidade_id' => 232
                ),
                718 => array(
                    'id' => '718',
                    'cd_consulta' => '31101046',
                    'ds_procedimento' => 'ANGIOPLASTIA RENAL UNILATERAL A CÉU ABERTO       ',
                    'especialidade_id' => 232
                ),
                719 => array(
                    'id' => '719',
                    'cd_consulta' => '31101054',
                    'ds_procedimento' => 'ANGIOPLASTIA RENAL UNILATERAL TRANSLUMINAL       ',
                    'especialidade_id' => 232
                ),
                720 => array(
                    'id' => '720',
                    'cd_consulta' => '31101089',
                    'ds_procedimento' => 'CISTO RENAL – ESCLEROTERAPIA PERCUTÂNEA – POR CISTO         ',
                    'especialidade_id' => 232
                ),
                721 => array(
                    'id' => '721',
                    'cd_consulta' => '31101593',
                    'ds_procedimento' => 'CISTO DE SUPRA-RENAL - TRATAMENTO CIRÚRGICO      ',
                    'especialidade_id' => 232
                ),
                722 => array(
                    'id' => '722',
                    'cd_consulta' => '31101178',
                    'ds_procedimento' => 'NEFRECTOMIA PARCIAL UNILATERAL EXTRACORPÓREA     ',
                    'especialidade_id' => 232
                ),
                723 => array(
                    'id' => '723',
                    'cd_consulta' => '31101186',
                    'ds_procedimento' => 'NEFRECTOMIA RADICAL UNILATERAL         ',
                    'especialidade_id' => 232
                ),
                724 => array(
                    'id' => '724',
                    'cd_consulta' => '31101216',
                    'ds_procedimento' => 'NEFROLITOTOMIA ANATRÓFICA UNILATERAL   ',
                    'especialidade_id' => 232
                ),
                725 => array(
                    'id' => '725',
                    'cd_consulta' => '31101364',
                    'ds_procedimento' => 'PIELOPLASTIA      ',
                    'especialidade_id' => 232
                ),
                726 => array(
                    'id' => '726',
                    'cd_consulta' => '31101062',
                    'ds_procedimento' => 'AUTOTRANSPLANTE RENAL UNILATERAL       ',
                    'especialidade_id' => 232
                ),
                727 => array(
                    'id' => '727',
                    'cd_consulta' => '31101224',
                    'ds_procedimento' => 'NEFROLITOTOMIA PERCUTÂNEA UNILATERAL   ',
                    'especialidade_id' => 232
                ),
                728 => array(
                    'id' => '728',
                    'cd_consulta' => '31101240',
                    'ds_procedimento' => 'NEFROLITOTRIPSIA EXTRACORPÓREA – 1ª SESSÃO       ',
                    'especialidade_id' => 232
                ),
                729 => array(
                    'id' => '729',
                    'cd_consulta' => '31101259',
                    'ds_procedimento' => 'NEFROLITOTRIPSIA EXTRACORPÓREA – REAPLICAÇÕES (ATÉ 3 MESES) ',
                    'especialidade_id' => 232
                ),
                730 => array(
                    'id' => '730',
                    'cd_consulta' => '31101275',
                    'ds_procedimento' => 'NEFROLITOTRIPSIA PERCUTÂNEA UNILATERAL (MEC., E.H., OU US)  ',
                    'especialidade_id' => 232
                ),
                731 => array(
                    'id' => '731',
                    'cd_consulta' => '31101097',
                    'ds_procedimento' => 'ENDOPIELOTOMIA PERCUTÂNEA UNILATERAL   ',
                    'especialidade_id' => 232
                ),
                732 => array(
                    'id' => '732',
                    'cd_consulta' => '31101038',
                    'ds_procedimento' => 'ADRENALECTOMIA UNILATERAL   ',
                    'especialidade_id' => 232
                ),
                733 => array(
                    'id' => '733',
                    'cd_consulta' => '31101488',
                    'ds_procedimento' => 'ADRENALECTOMIA LAPAROSCÓPICA UNILATERAL',
                    'especialidade_id' => 232
                ),
                734 => array(
                    'id' => '734',
                    'cd_consulta' => '31101585',
                    'ds_procedimento' => 'NEFRECTOMIA TOTAL UNILATERAL POR VIDEOLAPAROSCOPIA',
                    'especialidade_id' => 232
                ),
                735 => array(
                    'id' => '735',
                    'cd_consulta' => '31307213',
                    'ds_procedimento' => 'LIGADURA DE VEIA OVARIANA LAPAROSCÓPICA',
                    'especialidade_id' => 232
                ),
                736 => array(
                    'id' => '736',
                    'cd_consulta' => '31102018',
                    'ds_procedimento' => 'BIÓPSIA CIRÚRGICA DE URETER UNILATERAL ',
                    'especialidade_id' => 232
                ),
                737 => array(
                    'id' => '737',
                    'cd_consulta' => '31102026',
                    'ds_procedimento' => 'BIÓPSIA ENDOSCÓPICA DE URETER UNILATERAL         ',
                    'especialidade_id' => 232
                ),
                738 => array(
                    'id' => '738',
                    'cd_consulta' => '31102085',
                    'ds_procedimento' => 'DILATAÇÃO ENDOSCÓPICA UNILATERAL       ',
                    'especialidade_id' => 232
                ),
                739 => array(
                    'id' => '739',
                    'cd_consulta' => '31102123',
                    'ds_procedimento' => 'FÍSTULA URETERO-VAGINAL UNILATERAL (TRATAMENTO CIRÚRGICO)   ',
                    'especialidade_id' => 232
                ),
                740 => array(
                    'id' => '740',
                    'cd_consulta' => '31102115',
                    'ds_procedimento' => 'FÍSTULA URETERO-INTESTINAL UNILATERAL (TRATAMENTO CIRÚRGICO)',
                    'especialidade_id' => 232
                ),
                741 => array(
                    'id' => '741',
                    'cd_consulta' => '31102107',
                    'ds_procedimento' => 'FÍSTULA URETERO-CUTÂNEA UNILATERAL (TRATAMENTO CIRÚRGICO)   ',
                    'especialidade_id' => 232
                ),
                742 => array(
                    'id' => '742',
                    'cd_consulta' => '31102131',
                    'ds_procedimento' => 'MEATOTOMIA ENDOSCÓPICA UNILATERAL      ',
                    'especialidade_id' => 232
                ),
                743 => array(
                    'id' => '743',
                    'cd_consulta' => '31102220',
                    'ds_procedimento' => 'RETIRADA ENDOSCÓPICA DE CÁLCULO DE URETER UNILATERAL        ',
                    'especialidade_id' => 232
                ),
                744 => array(
                    'id' => '744',
                    'cd_consulta' => '31102255',
                    'ds_procedimento' => 'URETEROCELE UNILATERAL – RESSECÇÃO A CÉU ABERTO  ',
                    'especialidade_id' => 232
                ),
                745 => array(
                    'id' => '745',
                    'cd_consulta' => '31102263',
                    'ds_procedimento' => 'URETEROCELES – TRATAMENTO ENDOSCÓPICO – UNILATERAL',
                    'especialidade_id' => 232
                ),
                746 => array(
                    'id' => '746',
                    'cd_consulta' => '31102247',
                    'ds_procedimento' => 'URETERECTOMIA UNILATERAL    ',
                    'especialidade_id' => 232
                ),
                747 => array(
                    'id' => '747',
                    'cd_consulta' => '31102573',
                    'ds_procedimento' => 'URETEROENTEROSTOMIA CUTÂNEA - UNILATERAL         ',
                    'especialidade_id' => 232
                ),
                748 => array(
                    'id' => '748',
                    'cd_consulta' => '31102344',
                    'ds_procedimento' => 'URETEROPLASTIA UNILATERAL   ',
                    'especialidade_id' => 232
                ),
                749 => array(
                    'id' => '749',
                    'cd_consulta' => '31102468',
                    'ds_procedimento' => 'URETEROURETEROCISTONEOSTOMIA',
                    'especialidade_id' => 232
                ),
                750 => array(
                    'id' => '750',
                    'cd_consulta' => '31102476',
                    'ds_procedimento' => 'URETEROURETEROSTOMIA UNILATERAL        ',
                    'especialidade_id' => 232
                ),
                751 => array(
                    'id' => '751',
                    'cd_consulta' => '31102301',
                    'ds_procedimento' => 'URETEROLITOTOMIA UNILATERAL ',
                    'especialidade_id' => 232
                ),
                752 => array(
                    'id' => '752',
                    'cd_consulta' => '31102298',
                    'ds_procedimento' => 'URETERÓLISE UNILATERAL      ',
                    'especialidade_id' => 232
                ),
                753 => array(
                    'id' => '753',
                    'cd_consulta' => '31102425',
                    'ds_procedimento' => 'URETEROSTOMIA CUTÂNEA UNILATERAL       ',
                    'especialidade_id' => 232
                ),
                754 => array(
                    'id' => '754',
                    'cd_consulta' => '31102034',
                    'ds_procedimento' => 'CATETERISMO URETERAL UNILATERAL        ',
                    'especialidade_id' => 232
                ),
                755 => array(
                    'id' => '755',
                    'cd_consulta' => '31102204',
                    'ds_procedimento' => 'REIMPLANTE URETERO-VESICAL UNILATERAL – VIA COMBINADA       ',
                    'especialidade_id' => 232
                ),
                756 => array(
                    'id' => '756',
                    'cd_consulta' => '31102417',
                    'ds_procedimento' => 'URETEROSSIGMOIDOSTOMIA UNILATERAL      ',
                    'especialidade_id' => 232
                ),
                757 => array(
                    'id' => '757',
                    'cd_consulta' => '31102280',
                    'ds_procedimento' => 'URETEROILEOSTOMIA CUTÂNEA UNILATERAL   ',
                    'especialidade_id' => 232
                ),
                758 => array(
                    'id' => '758',
                    'cd_consulta' => '31102271',
                    'ds_procedimento' => 'URETEROILEOCISTOSTOMIA UNILATERAL      ',
                    'especialidade_id' => 232
                ),
                759 => array(
                    'id' => '759',
                    'cd_consulta' => '31103480',
                    'ds_procedimento' => 'NEOBEXIGA CUTÂNEA CONTINENTE',
                    'especialidade_id' => 232
                ),
                760 => array(
                    'id' => '760',
                    'cd_consulta' => '31103502',
                    'ds_procedimento' => 'NEOBEXIGA URETRAL CONTINENTE',
                    'especialidade_id' => 232
                ),
                761 => array(
                    'id' => '761',
                    'cd_consulta' => '31102042',
                    'ds_procedimento' => 'COLOCAÇÃO CIRÚRGICA DE DUPLO J UNILATERAL        ',
                    'especialidade_id' => 232
                ),
                762 => array(
                    'id' => '762',
                    'cd_consulta' => '31102050',
                    'ds_procedimento' => 'COLOCAÇÃO CISTOSCÓPICA DE DUPLO J UNILATERAL     ',
                    'especialidade_id' => 232
                ),
                763 => array(
                    'id' => '763',
                    'cd_consulta' => '31102069',
                    'ds_procedimento' => 'COLOCAÇÃO NEFROSCÓPICA DE DUPLO J UNILATERAL     ',
                    'especialidade_id' => 232
                ),
                764 => array(
                    'id' => '764',
                    'cd_consulta' => '31102077',
                    'ds_procedimento' => 'COLOCAÇÃO URETEROSCÓPICA DE DUPLO J UNILATERAL   ',
                    'especialidade_id' => 232
                ),
                765 => array(
                    'id' => '765',
                    'cd_consulta' => '31102310',
                    'ds_procedimento' => 'URETEROLITOTRIPSIA EXTRACORPÓREA – 1ª SESSÃO     ',
                    'especialidade_id' => 232
                ),
                766 => array(
                    'id' => '766',
                    'cd_consulta' => '31102328',
                    'ds_procedimento' => 'URETEROLITOTRIPSIA EXTRACORPÓREA – REAPLICAÇÕES (ATÉ 3 MESES)         ',
                    'especialidade_id' => 232
                ),
                767 => array(
                    'id' => '767',
                    'cd_consulta' => '31102433',
                    'ds_procedimento' => 'URETEROTOMIA INTERNA PERCUTÂNEA UNILATERAL       ',
                    'especialidade_id' => 232
                ),
                768 => array(
                    'id' => '768',
                    'cd_consulta' => '31102441',
                    'ds_procedimento' => 'URETEROTOMIA INTERNA URETEROSCÓPICA FLEXÍVEL UNILATERAL     ',
                    'especialidade_id' => 232
                ),
                769 => array(
                    'id' => '769',
                    'cd_consulta' => '31102522',
                    'ds_procedimento' => 'URETEROPLASTIA LAPAROSCÓPICA UNILATERAL',
                    'especialidade_id' => 232
                ),
                770 => array(
                    'id' => '770',
                    'cd_consulta' => '31102492',
                    'ds_procedimento' => 'URETEROLITOTOMIA LAPAROSCÓPICA UNILATERAL        ',
                    'especialidade_id' => 232
                ),
                771 => array(
                    'id' => '771',
                    'cd_consulta' => '40201287',
                    'ds_procedimento' => 'URETEROSCOPIA RÍGIDA UNILATERAL        ',
                    'especialidade_id' => 232
                ),
                772 => array(
                    'id' => '772',
                    'cd_consulta' => '31102409',
                    'ds_procedimento' => 'URETEROSSIGMOIDOPLASTIA UNILATERAL     ',
                    'especialidade_id' => 232
                ),
                773 => array(
                    'id' => '773',
                    'cd_consulta' => '31102352',
                    'ds_procedimento' => 'URETERORRENOLITOTOMIA UNILATERAL       ',
                    'especialidade_id' => 232
                ),
                774 => array(
                    'id' => '774',
                    'cd_consulta' => '31102360',
                    'ds_procedimento' => 'URETERORRENOLITOTRIPSIA FLEXÍVEL A LASER UNILATERAL         ',
                    'especialidade_id' => 232
                ),
                775 => array(
                    'id' => '775',
                    'cd_consulta' => '31103030',
                    'ds_procedimento' => 'BIÓPSIA ENDOSCÓPICA DE BEXIGA (INCLUI CISTOSCOPIA)',
                    'especialidade_id' => 232
                ),
                776 => array(
                    'id' => '776',
                    'cd_consulta' => '31103049',
                    'ds_procedimento' => 'BIÓPSIA VESICAL A CÉU ABERTO',
                    'especialidade_id' => 232
                ),
                777 => array(
                    'id' => '777',
                    'cd_consulta' => '31103065',
                    'ds_procedimento' => 'CISTECTOMIA PARCIAL         ',
                    'especialidade_id' => 232
                ),
                778 => array(
                    'id' => '778',
                    'cd_consulta' => '31103081',
                    'ds_procedimento' => 'CISTECTOMIA TOTAL ',
                    'especialidade_id' => 232
                ),
                779 => array(
                    'id' => '779',
                    'cd_consulta' => '31103073',
                    'ds_procedimento' => 'CISTECTOMIA RADICAL (INCLUI PRÓSTATA OU ÚTERO)   ',
                    'especialidade_id' => 232
                ),
                780 => array(
                    'id' => '780',
                    'cd_consulta' => '31103251',
                    'ds_procedimento' => 'ENTEROCISTOPLASTIA (AMPLIAÇÃO VESICAL) ',
                    'especialidade_id' => 232
                ),
                781 => array(
                    'id' => '781',
                    'cd_consulta' => '31103170',
                    'ds_procedimento' => 'CISTOSTOMIA CIRÚRGICA       ',
                    'especialidade_id' => 232
                ),
                782 => array(
                    'id' => '782',
                    'cd_consulta' => '31103197',
                    'ds_procedimento' => 'CISTOSTOMIA POR PUNÇÃO COM TROCATER    ',
                    'especialidade_id' => 232
                ),
                783 => array(
                    'id' => '783',
                    'cd_consulta' => '31103162',
                    'ds_procedimento' => 'CISTORRAFIA (TRAUMA)        ',
                    'especialidade_id' => 232
                ),
                784 => array(
                    'id' => '784',
                    'cd_consulta' => '31103154',
                    'ds_procedimento' => 'CISTOPLASTIA REDUTORA       ',
                    'especialidade_id' => 232
                ),
                785 => array(
                    'id' => '785',
                    'cd_consulta' => '31103200',
                    'ds_procedimento' => 'COLO DE DIVERTÍCULO – RESSECÇÃO ENDOSCÓPICA      ',
                    'especialidade_id' => 232
                ),
                786 => array(
                    'id' => '786',
                    'cd_consulta' => '31103219',
                    'ds_procedimento' => 'COLO VESICAL – RESSECÇÃO ENDOSCÓPICA   ',
                    'especialidade_id' => 232
                ),
                787 => array(
                    'id' => '787',
                    'cd_consulta' => '31103570',
                    'ds_procedimento' => 'COLO VESICAL - RESSECÇÃO CIRÚRGICA     ',
                    'especialidade_id' => 232
                ),
                788 => array(
                    'id' => '788',
                    'cd_consulta' => '31103243',
                    'ds_procedimento' => 'DIVERTICULECTOMIA VESICAL   ',
                    'especialidade_id' => 232
                ),
                789 => array(
                    'id' => '789',
                    'cd_consulta' => '31103278',
                    'ds_procedimento' => 'EXTROFIA VESICAL – TRATAMENTO CIRÚRGICO',
                    'especialidade_id' => 232
                ),
                790 => array(
                    'id' => '790',
                    'cd_consulta' => '31103286',
                    'ds_procedimento' => 'FÍSTULA VÉSICO-CUTÂNEA – TRATAMENTO CIRÚRGICO    ',
                    'especialidade_id' => 232
                ),
                791 => array(
                    'id' => '791',
                    'cd_consulta' => '31103316',
                    'ds_procedimento' => 'FÍSTULA VÉSICO-UTERINA – TRATAMENTO CIRÚRGICO    ',
                    'especialidade_id' => 232
                ),
                792 => array(
                    'id' => '792',
                    'cd_consulta' => '31103324',
                    'ds_procedimento' => 'FÍSTULA VÉSICO-VAGINAL – TRATAMENTO CIRÚRGICO    ',
                    'especialidade_id' => 232
                ),
                793 => array(
                    'id' => '793',
                    'cd_consulta' => '31103294',
                    'ds_procedimento' => 'FÍSTULA VÉSICO-ENTÉRICA – TRATAMENTO CIRÚRGICO   ',
                    'especialidade_id' => 232
                ),
                794 => array(
                    'id' => '794',
                    'cd_consulta' => '31103308',
                    'ds_procedimento' => 'FÍSTULA VÉSICO-RETAL – TRATAMENTO CIRÚRGICO      ',
                    'especialidade_id' => 232
                ),
                795 => array(
                    'id' => '795',
                    'cd_consulta' => '31103359',
                    'ds_procedimento' => 'INCONTINÊNCIA URINÁRIA – TRATAMENTO CIRÚRGICO SUPRA-PÚBICO  ',
                    'especialidade_id' => 232
                ),
                796 => array(
                    'id' => '796',
                    'cd_consulta' => '31103499',
                    'ds_procedimento' => 'NEOBEXIGA RETAL CONTINENTE  ',
                    'especialidade_id' => 232
                ),
                797 => array(
                    'id' => '797',
                    'cd_consulta' => '31103391',
                    'ds_procedimento' => 'PÓLIPOS VESICAIS – RESSECÇÃO ENDOSCÓPICA         ',
                    'especialidade_id' => 232
                ),
                798 => array(
                    'id' => '798',
                    'cd_consulta' => '31103405',
                    'ds_procedimento' => 'PUNÇÃO E ASPIRAÇÃO VESICAL  ',
                    'especialidade_id' => 232
                ),
                799 => array(
                    'id' => '799',
                    'cd_consulta' => '31103430',
                    'ds_procedimento' => 'RETENÇÃO POR COÁGULO – ASPIRAÇÃO VESICAL         ',
                    'especialidade_id' => 232
                ),
                800 => array(
                    'id' => '800',
                    'cd_consulta' => '31103588',
                    'ds_procedimento' => 'TUMOR VESICAL, RESSECÇÃO A CÉU ABERTO  ',
                    'especialidade_id' => 232
                ),
                801 => array(
                    'id' => '801',
                    'cd_consulta' => '31103456',
                    'ds_procedimento' => 'TUMOR VESICAL – RESSECÇÃO ENDOSCÓPICA – POR LESÃO',
                    'especialidade_id' => 232
                ),
                802 => array(
                    'id' => '802',
                    'cd_consulta' => '31103022',
                    'ds_procedimento' => 'BEXIGA PSOICA     ',
                    'especialidade_id' => 232
                ),
                803 => array(
                    'id' => '803',
                    'cd_consulta' => '31103090',
                    'ds_procedimento' => 'CISTOLITOTOMIA    ',
                    'especialidade_id' => 232
                ),
                804 => array(
                    'id' => '804',
                    'cd_consulta' => '31103138',
                    'ds_procedimento' => 'CISTOLITOTRIPSIA PERCUTÂNEA (U.S., E.H., E.C.)   ',
                    'especialidade_id' => 232
                ),
                805 => array(
                    'id' => '805',
                    'cd_consulta' => '31103367',
                    'ds_procedimento' => 'INCONTINÊNCIA URINÁRIA – TRATAMENTO ENDOSCÓPICO (INJEÇÃO)   ',
                    'especialidade_id' => 232
                ),
                806 => array(
                    'id' => '806',
                    'cd_consulta' => '31103383',
                    'ds_procedimento' => 'PÓLIPOS VESICAIS – RESSECÇÃO CIRÚRGICA ',
                    'especialidade_id' => 232
                ),
                807 => array(
                    'id' => '807',
                    'cd_consulta' => '31103464',
                    'ds_procedimento' => 'VESICOSTOMIA CUTÂNEA        ',
                    'especialidade_id' => 232
                ),
                808 => array(
                    'id' => '808',
                    'cd_consulta' => '31103413',
                    'ds_procedimento' => 'REIMPLANTE URETERO-VESICAL À BOARI – UNILATERAL  ',
                    'especialidade_id' => 232
                ),
                809 => array(
                    'id' => '809',
                    'cd_consulta' => '31103103',
                    'ds_procedimento' => 'CISTOLITOTRIPSIA EXTRACORPÓREA – 1ª SESSÃO       ',
                    'especialidade_id' => 232
                ),
                810 => array(
                    'id' => '810',
                    'cd_consulta' => '31103111',
                    'ds_procedimento' => 'CISTOLITOTRIPSIA EXTRACORPÓREA – REAPLICAÇÕES (ATÉ 3 MESES) ',
                    'especialidade_id' => 232
                ),
                811 => array(
                    'id' => '811',
                    'cd_consulta' => '31103146',
                    'ds_procedimento' => 'CISTOLITOTRIPSIA TRANSURETRAL (U.S., E.H., E.C.) ',
                    'especialidade_id' => 232
                ),
                812 => array(
                    'id' => '812',
                    'cd_consulta' => '31102530',
                    'ds_procedimento' => 'CORREÇÃO LAPAROSCÓPICA DE REFLUXO VESICO-URETERAL UNILATERAL',
                    'especialidade_id' => 232
                ),
                813 => array(
                    'id' => '813',
                    'cd_consulta' => '31103448',
                    'ds_procedimento' => 'TUMOR VESICAL – FOTOCOAGULAÇÃO A LASER – POR LESÃO',
                    'especialidade_id' => 232
                ),
                814 => array(
                    'id' => '814',
                    'cd_consulta' => '31103057',
                    'ds_procedimento' => 'CÁLCULO VESICAL – EXTRAÇÃO ENDOSCÓPICA ',
                    'especialidade_id' => 232
                ),
                815 => array(
                    'id' => '815',
                    'cd_consulta' => '31103340',
                    'ds_procedimento' => 'INCONTINÊNCIA URINÁRIA – SUSPENSÃO ENDOSCÓPICA DE COLO      ',
                    'especialidade_id' => 232
                ),
                816 => array(
                    'id' => '816',
                    'cd_consulta' => '31103332',
                    'ds_procedimento' => 'INCONTINÊNCIA URINÁRIA – “SLING” VAGINAL OU ABDOMINAL       ',
                    'especialidade_id' => 232
                ),
                817 => array(
                    'id' => '817',
                    'cd_consulta' => '31104010',
                    'ds_procedimento' => 'ABSCESSO PERIURETRAL – TRATAMENTO CIRÚRGICO      ',
                    'especialidade_id' => 232
                ),
                818 => array(
                    'id' => '818',
                    'cd_consulta' => '31104029',
                    'ds_procedimento' => 'BIÓPSIA ENDOSCÓPICA DE URETRA',
                    'especialidade_id' => 232
                ),
                819 => array(
                    'id' => '819',
                    'cd_consulta' => '31104037',
                    'ds_procedimento' => 'CORPO ESTRANHO OU CÁLCULO – EXTRAÇÃO CIRÚRGICA   ',
                    'especialidade_id' => 232
                ),
                820 => array(
                    'id' => '820',
                    'cd_consulta' => '31104045',
                    'ds_procedimento' => 'CORPO ESTRANHO OU CÁLCULO – EXTRAÇÃO ENDOSCÓPICA ',
                    'especialidade_id' => 232
                ),
                821 => array(
                    'id' => '821',
                    'cd_consulta' => '31104053',
                    'ds_procedimento' => 'DIVERTÍCULO URETRAL – TRATAMENTO CIRÚRGICO       ',
                    'especialidade_id' => 232
                ),
                822 => array(
                    'id' => '822',
                    'cd_consulta' => '31104061',
                    'ds_procedimento' => 'ELETROCOAGULAÇÃO ENDOSCÓPICA',
                    'especialidade_id' => 232
                ),
                823 => array(
                    'id' => '823',
                    'cd_consulta' => '31104070',
                    'ds_procedimento' => 'ESFINCTEROTOMIA   ',
                    'especialidade_id' => 232
                ),
                824 => array(
                    'id' => '824',
                    'cd_consulta' => '31104088',
                    'ds_procedimento' => 'FÍSTULA URETRO-CUTÂNEA – CORREÇÃO CIRÚRGICA      ',
                    'especialidade_id' => 232
                ),
                825 => array(
                    'id' => '825',
                    'cd_consulta' => '31104100',
                    'ds_procedimento' => 'FÍSTULA URETRO-VAGINAL – CORREÇÃO CIRÚRGICA      ',
                    'especialidade_id' => 232
                ),
                826 => array(
                    'id' => '826',
                    'cd_consulta' => '31104096',
                    'ds_procedimento' => 'FÍSTULA URETRO-RETAL – CORREÇÃO CIRÚRGICA        ',
                    'especialidade_id' => 232
                ),
                827 => array(
                    'id' => '827',
                    'cd_consulta' => '31104118',
                    'ds_procedimento' => 'INCONTINÊNCIA URINÁRIA MASCULINA – TRATAMENTO CIRÚRGICO (EXCLUI IMPLANTE DE ESFINCTER ARTIFICIAL)',
                    'especialidade_id' => 232
                ),
                828 => array(
                    'id' => '828',
                    'cd_consulta' => '31104142',
                    'ds_procedimento' => 'MEATOTOMIA URETRAL',
                    'especialidade_id' => 232
                ),
                829 => array(
                    'id' => '829',
                    'cd_consulta' => '31104134',
                    'ds_procedimento' => 'MEATOPLASTIA (RETALHO CUTÂNEO)         ',
                    'especialidade_id' => 232
                ),
                830 => array(
                    'id' => '830',
                    'cd_consulta' => '31104150',
                    'ds_procedimento' => 'NEOURETRA PROXIMAL (CISTOURETROPLASTIA)',
                    'especialidade_id' => 232
                ),
                831 => array(
                    'id' => '831',
                    'cd_consulta' => '31104258',
                    'ds_procedimento' => 'RESSECÇÃO DE CORDA DA URETRA',
                    'especialidade_id' => 232
                ),
                832 => array(
                    'id' => '832',
                    'cd_consulta' => '31104169',
                    'ds_procedimento' => 'RESSECÇÃO DE CARÚNCULA      ',
                    'especialidade_id' => 232
                ),
                833 => array(
                    'id' => '833',
                    'cd_consulta' => '31104177',
                    'ds_procedimento' => 'RESSECÇÃO DE VÁLVULA URETRAL POSTERIOR ',
                    'especialidade_id' => 232
                ),
                834 => array(
                    'id' => '834',
                    'cd_consulta' => '31104215',
                    'ds_procedimento' => 'URETROSTOMIA      ',
                    'especialidade_id' => 232
                ),
                835 => array(
                    'id' => '835',
                    'cd_consulta' => '31104266',
                    'ds_procedimento' => 'URETROTOMIA EXTERNA PARA RETIRADA DE CÁLCULO OU CORPO ESTRANHO        ',
                    'especialidade_id' => 232
                ),
                836 => array(
                    'id' => '836',
                    'cd_consulta' => '31104223',
                    'ds_procedimento' => 'URETROTOMIA INTERNA – POR SEGMENTO     ',
                    'especialidade_id' => 232
                ),
                837 => array(
                    'id' => '837',
                    'cd_consulta' => '31104193',
                    'ds_procedimento' => 'URETROPLASTIA ANTERIOR      ',
                    'especialidade_id' => 232
                ),
                838 => array(
                    'id' => '838',
                    'cd_consulta' => '31104207',
                    'ds_procedimento' => 'URETROPLASTIA POSTERIOR     ',
                    'especialidade_id' => 232
                ),
                839 => array(
                    'id' => '839',
                    'cd_consulta' => '31104185',
                    'ds_procedimento' => 'TUMOR URETRAL – EXCISÃO – POR LESÃO    ',
                    'especialidade_id' => 232
                ),
                840 => array(
                    'id' => '840',
                    'cd_consulta' => '31104231',
                    'ds_procedimento' => 'URETROTOMIA INTERNA COM PRÓTESE ENDOURETRAL      ',
                    'especialidade_id' => 232
                ),
                841 => array(
                    'id' => '841',
                    'cd_consulta' => '31201024',
                    'ds_procedimento' => 'ABSCESSO DE PRÓSTATA – DRENAGEM        ',
                    'especialidade_id' => 232
                ),
                842 => array(
                    'id' => '842',
                    'cd_consulta' => '31201032',
                    'ds_procedimento' => 'BIÓPSIA PROSTÁTICA – ATÉ 8 FRAGMENTOS  ',
                    'especialidade_id' => 232
                ),
                843 => array(
                    'id' => '843',
                    'cd_consulta' => '31201121',
                    'ds_procedimento' => 'PROSTATECTOMIA A CÉU ABERTO ',
                    'especialidade_id' => 232
                ),
                844 => array(
                    'id' => '844',
                    'cd_consulta' => '31201113',
                    'ds_procedimento' => 'PROSTATAVESICULECTOMIA RADICAL         ',
                    'especialidade_id' => 232
                ),
                845 => array(
                    'id' => '845',
                    'cd_consulta' => '31201130',
                    'ds_procedimento' => 'RESSECÇÃO ENDOSCÓPICA DA PRÓSTATA      ',
                    'especialidade_id' => 232
                ),
                846 => array(
                    'id' => '846',
                    'cd_consulta' => '31201091',
                    'ds_procedimento' => 'HIPERTROFIA PROSTÁTICA – IMPLANTE DE PRÓTESE     ',
                    'especialidade_id' => 232
                ),
                847 => array(
                    'id' => '847',
                    'cd_consulta' => '31201164',
                    'ds_procedimento' => 'HIPERTROFIA PROSTÁTICA - TRATAMENTO POR DIATEMIA ',
                    'especialidade_id' => 232
                ),
                848 => array(
                    'id' => '848',
                    'cd_consulta' => '31201105',
                    'ds_procedimento' => 'HIPERTROFIA PROSTÁTICA – TRATAMENTO POR DILATAÇÃO',
                    'especialidade_id' => 232
                ),
                849 => array(
                    'id' => '849',
                    'cd_consulta' => '31201067',
                    'ds_procedimento' => 'HEMORRAGIA DA LOJA PROSTÁTICA – EVACUAÇÃO E IRRIGAÇÃO       ',
                    'especialidade_id' => 232
                ),
                850 => array(
                    'id' => '850',
                    'cd_consulta' => '31201075',
                    'ds_procedimento' => 'HEMORRAGIA DA LOJA PROSTÁTICA – REVISÃO ENDOSCÓPICA         ',
                    'especialidade_id' => 232
                ),
                851 => array(
                    'id' => '851',
                    'cd_consulta' => '31201016',
                    'ds_procedimento' => 'ABLAÇÃO PROSTÁTICA A LASER  ',
                    'especialidade_id' => 232
                ),
                852 => array(
                    'id' => '852',
                    'cd_consulta' => '31201059',
                    'ds_procedimento' => 'ELETROVAPORIZAÇÃO DE PRÓSTATA',
                    'especialidade_id' => 232
                ),
                853 => array(
                    'id' => '853',
                    'cd_consulta' => '31202012',
                    'ds_procedimento' => 'BIÓPSIA ESCROTAL  ',
                    'especialidade_id' => 232
                ),
                854 => array(
                    'id' => '854',
                    'cd_consulta' => '31202020',
                    'ds_procedimento' => 'DRENAGEM DE ABSCESSO        ',
                    'especialidade_id' => 232
                ),
                855 => array(
                    'id' => '855',
                    'cd_consulta' => '31202047',
                    'ds_procedimento' => 'EXÉRESE DE CISTO ESCROTAL   ',
                    'especialidade_id' => 232
                ),
                856 => array(
                    'id' => '856',
                    'cd_consulta' => '31202055',
                    'ds_procedimento' => 'PLÁSTICA ESCROTAL ',
                    'especialidade_id' => 232
                ),
                857 => array(
                    'id' => '857',
                    'cd_consulta' => '31202071',
                    'ds_procedimento' => 'RESSECÇÃO PARCIAL DA BOLSA ESCROTAL    ',
                    'especialidade_id' => 232
                ),
                858 => array(
                    'id' => '858',
                    'cd_consulta' => '31203027',
                    'ds_procedimento' => 'BIÓPSIA UNILATERAL DE TESTÍCULO        ',
                    'especialidade_id' => 232
                ),
                859 => array(
                    'id' => '859',
                    'cd_consulta' => '31203043',
                    'ds_procedimento' => 'HIDROCELE UNILATERAL – CORREÇÃO CIRÚRGICA        ',
                    'especialidade_id' => 232
                ),
                860 => array(
                    'id' => '860',
                    'cd_consulta' => '31203078',
                    'ds_procedimento' => 'ORQUIECTOMIA UNILATERAL     ',
                    'especialidade_id' => 232
                ),
                861 => array(
                    'id' => '861',
                    'cd_consulta' => '31203060',
                    'ds_procedimento' => 'ORQUIDOPEXIA UNILATERAL     ',
                    'especialidade_id' => 232
                ),
                862 => array(
                    'id' => '862',
                    'cd_consulta' => '31203086',
                    'ds_procedimento' => 'PUNÇÃO DA VAGINAL ',
                    'especialidade_id' => 232
                ),
                863 => array(
                    'id' => '863',
                    'cd_consulta' => '31203094',
                    'ds_procedimento' => 'REPARAÇÃO PLÁSTICA (TRAUMA) ',
                    'especialidade_id' => 232
                ),
                864 => array(
                    'id' => '864',
                    'cd_consulta' => '31203108',
                    'ds_procedimento' => 'TORÇÃO DE TESTÍCULO – CURA CIRÚRGICA   ',
                    'especialidade_id' => 232
                ),
                865 => array(
                    'id' => '865',
                    'cd_consulta' => '31203124',
                    'ds_procedimento' => 'VARICOCELE UNILATERAL – CORREÇÃO CIRÚRGICA       ',
                    'especialidade_id' => 232
                ),
                866 => array(
                    'id' => '866',
                    'cd_consulta' => '31203140',
                    'ds_procedimento' => 'ORQUIECTOMIA INTRA-ABDOMINAL LAPAROSCÓPICA UNILATERAL       ',
                    'especialidade_id' => 232
                ),
                867 => array(
                    'id' => '867',
                    'cd_consulta' => '31203159',
                    'ds_procedimento' => 'CORREÇÃO LAPAROSCÓPICA DE VARICOCELE UNILATERAL  ',
                    'especialidade_id' => 232
                ),
                868 => array(
                    'id' => '868',
                    'cd_consulta' => '40201163',
                    'ds_procedimento' => 'LAPAROSCOPIA      ',
                    'especialidade_id' => 232
                ),
                869 => array(
                    'id' => '869',
                    'cd_consulta' => '31204015',
                    'ds_procedimento' => 'BIÓPSIA DE EPIDÍDIMO        ',
                    'especialidade_id' => 232
                ),
                870 => array(
                    'id' => '870',
                    'cd_consulta' => '31204023',
                    'ds_procedimento' => 'DRENAGEM DE ABSCESSO        ',
                    'especialidade_id' => 232
                ),
                871 => array(
                    'id' => '871',
                    'cd_consulta' => '31204031',
                    'ds_procedimento' => 'EPIDIDIMECTOMIA UNILATERAL  ',
                    'especialidade_id' => 232
                ),
                872 => array(
                    'id' => '872',
                    'cd_consulta' => '31204066',
                    'ds_procedimento' => 'EXÉRESE DE CISTO UNILATERAL ',
                    'especialidade_id' => 232
                ),
                873 => array(
                    'id' => '873',
                    'cd_consulta' => '31204040',
                    'ds_procedimento' => 'EPIDIDIMOVASOPLASTIA UNILATERAL        ',
                    'especialidade_id' => 232
                ),
                874 => array(
                    'id' => '874',
                    'cd_consulta' => '31204058',
                    'ds_procedimento' => 'EPIDIDIMOVASOPLASTIA UNILATERAL MICROCIRÚRGICA   ',
                    'especialidade_id' => 232
                ),
                875 => array(
                    'id' => '875',
                    'cd_consulta' => '31205011',
                    'ds_procedimento' => 'ESPERMATOCELECTOMIA UNILATERAL         ',
                    'especialidade_id' => 232
                ),
                876 => array(
                    'id' => '876',
                    'cd_consulta' => '31205020',
                    'ds_procedimento' => 'EXPLORAÇÃO CIRÚRGICA DO DEFERENTE UNILATERAL     ',
                    'especialidade_id' => 232
                ),
                877 => array(
                    'id' => '877',
                    'cd_consulta' => '31205089',
                    'ds_procedimento' => 'VASOSTOMIA',
                    'especialidade_id' => 232
                ),
                878 => array(
                    'id' => '878',
                    'cd_consulta' => '31205046',
                    'ds_procedimento' => 'VASECTOMIA UNILATERAL       ',
                    'especialidade_id' => 232
                ),
                879 => array(
                    'id' => '879',
                    'cd_consulta' => '31205070',
                    'ds_procedimento' => 'CIRURGIA ESTERILIZADORA MASCULINA      ',
                    'especialidade_id' => 232
                ),
                880 => array(
                    'id' => '880',
                    'cd_consulta' => '31205054',
                    'ds_procedimento' => 'VASO-VASOSTOMIA MICROCIRÚRGICA UNILATERAL        ',
                    'especialidade_id' => 232
                ),
                881 => array(
                    'id' => '881',
                    'cd_consulta' => '31206018',
                    'ds_procedimento' => 'AMPUTAÇÃO PARCIAL ',
                    'especialidade_id' => 232
                ),
                882 => array(
                    'id' => '882',
                    'cd_consulta' => '31206026',
                    'ds_procedimento' => 'AMPUTAÇÃO TOTAL   ',
                    'especialidade_id' => 232
                ),
                883 => array(
                    'id' => '883',
                    'cd_consulta' => '31206034',
                    'ds_procedimento' => 'BIÓPSIA PENIANA   ',
                    'especialidade_id' => 232
                ),
                884 => array(
                    'id' => '884',
                    'cd_consulta' => '31206042',
                    'ds_procedimento' => 'DOENÇA DE PEYRONIE – TRATAMENTO CIRÚRGICO        ',
                    'especialidade_id' => 232
                ),
                885 => array(
                    'id' => '885',
                    'cd_consulta' => '31206085',
                    'ds_procedimento' => 'EPISPADIA COM INCONTINÊNCIA – TRATAMENTO CIRÚRGICO',
                    'especialidade_id' => 232
                ),
                886 => array(
                    'id' => '886',
                    'cd_consulta' => '31206069',
                    'ds_procedimento' => 'EMASCULAÇÃO       ',
                    'especialidade_id' => 232
                ),
                887 => array(
                    'id' => '887',
                    'cd_consulta' => '31206050',
                    'ds_procedimento' => 'ELETROCOAGULAÇÃO DE LESÕES CUTÂNEAS    ',
                    'especialidade_id' => 232
                ),
                888 => array(
                    'id' => '888',
                    'cd_consulta' => '31206093',
                    'ds_procedimento' => 'FRATURA DE PÊNIS – TRATAMENTO CIRÚRGICO',
                    'especialidade_id' => 232
                ),
                889 => array(
                    'id' => '889',
                    'cd_consulta' => '31206115',
                    'ds_procedimento' => 'HIPOSPADIA DISTAL – TRATAMENTO EM 1 TEMPO        ',
                    'especialidade_id' => 232
                ),
                890 => array(
                    'id' => '890',
                    'cd_consulta' => '31206174',
                    'ds_procedimento' => 'PARAFIMOSE – REDUÇÃO MANUAL OU CIRÚRGICA         ',
                    'especialidade_id' => 232
                ),
                891 => array(
                    'id' => '891',
                    'cd_consulta' => '31206140',
                    'ds_procedimento' => 'IMPLANTE DE PRÓTESE SEMI-RÍGIDA (EXCLUI PRÓTESES INFLÁVEIS) ',
                    'especialidade_id' => 232
                ),
                892 => array(
                    'id' => '892',
                    'cd_consulta' => '31206212',
                    'ds_procedimento' => 'PLÁSTICA DO FREIO BÁLANO-PREPUCIAL     ',
                    'especialidade_id' => 232
                ),
                893 => array(
                    'id' => '893',
                    'cd_consulta' => '31206220',
                    'ds_procedimento' => 'POSTECTOMIA       ',
                    'especialidade_id' => 232
                ),
                894 => array(
                    'id' => '894',
                    'cd_consulta' => '31206239',
                    'ds_procedimento' => 'PRIAPISMO – TRATAMENTO CIRÚRGICO       ',
                    'especialidade_id' => 232
                ),
                895 => array(
                    'id' => '895',
                    'cd_consulta' => '31206204',
                    'ds_procedimento' => 'PLÁSTICA DE CORPO CAVERNOSO ',
                    'especialidade_id' => 232
                ),
                896 => array(
                    'id' => '896',
                    'cd_consulta' => '31206190',
                    'ds_procedimento' => 'PLÁSTICA – RETALHO CUTÂNEO À DISTÂNCIA ',
                    'especialidade_id' => 232
                ),
                897 => array(
                    'id' => '897',
                    'cd_consulta' => '31206131',
                    'ds_procedimento' => 'IMPLANTE DE PRÓTESE PENIANA INFLÁVEL   ',
                    'especialidade_id' => 232
                ),
                898 => array(
                    'id' => '898',
                    'cd_consulta' => '31206263',
                    'ds_procedimento' => 'REVASCULARIZAÇÃO PENIANA    ',
                    'especialidade_id' => 232
                ),
                899 => array(
                    'id' => '899',
                    'cd_consulta' => '30914043',
                    'ds_procedimento' => 'LINFADENECTOMIA INGUINAL OU ILÍACA     ',
                    'especialidade_id' => 232
                ),
                900 => array(
                    'id' => '900',
                    'cd_consulta' => '30914078',
                    'ds_procedimento' => 'LINFADENECTOMIA RETROPERITONEAL        ',
                    'especialidade_id' => 232
                ),
                901 => array(
                    'id' => '901',
                    'cd_consulta' => '30914060',
                    'ds_procedimento' => 'LINFADENECTOMIA PÉLVICA     ',
                    'especialidade_id' => 232
                ),
                902 => array(
                    'id' => '902',
                    'cd_consulta' => '30914140',
                    'ds_procedimento' => 'LINFADENECTOMIA PÉLVICA LAPAROSCÓPICA  ',
                    'especialidade_id' => 232
                ),
                903 => array(
                    'id' => '903',
                    'cd_consulta' => '30914159',
                    'ds_procedimento' => 'LINFADENECTOMIA RETROPERITONEAL LAPAROSCÓPICA    ',
                    'especialidade_id' => 232
                ),
                904 => array(
                    'id' => '904',
                    'cd_consulta' => '30914116',
                    'ds_procedimento' => 'MARSUPIALIZAÇÃO DE LINFOCELE',
                    'especialidade_id' => 232
                ),
                905 => array(
                    'id' => '905',
                    'cd_consulta' => '30914167',
                    'ds_procedimento' => 'MARSUPIALIZAÇÃO LAPAROSCÓPICA DE LINFOCELE       ',
                    'especialidade_id' => 232
                ),
                
                // GINECOLOGIA
                971 => array(
                    'id' => '971',
                    'cd_consulta' => '41301102',
                    'ds_procedimento' => 'COLPOSCOPIA (CÉRVICE UTERINA E VAGINA)',
                    'especialidade_id' => 204
                ),
                972 => array(
                    'id' => '972',
                    'cd_consulta' => '41301188',
                    'ds_procedimento' => 'EXAME A FRESCO DO CONTEÚDO VAGINAL E CERVICAL      ',
                    'especialidade_id' => 204
                ),
                973 => array(
                    'id' => '973',
                    'cd_consulta' => '31307060',
                    'ds_procedimento' => 'LAPAROSCOPIA GINECOLÓGICA COM OU SEM BIÓPSIA (INCLUI CROMOTUBAGEM)  ',
                    'especialidade_id' => 204
                ),
                974 => array(
                    'id' => '974',
                    'cd_consulta' => '41401247',
                    'ds_procedimento' => 'TESTE DE HUHNER ',
                    'especialidade_id' => 204
                ),
                975 => array(
                    'id' => '975',
                    'cd_consulta' => '20202016',
                    'ds_procedimento' => 'CARDIOTOCOGRAFIA ANTEPARTO  ',
                    'especialidade_id' => 204
                ),
                976 => array(
                    'id' => '976',
                    'cd_consulta' => '20202024',
                    'ds_procedimento' => 'CARDIOTOCOGRAFIA INTRAPARTO (POR HORA) ATÉ 6 HORAS EXTERNA          ',
                    'especialidade_id' => 204
                ),
                977 => array(
                    'id' => '977',
                    'cd_consulta' => '40201155',
                    'ds_procedimento' => 'HISTEROSCOPIA DIAGNÓSTICA COM BIÓPSIA  ',
                    'especialidade_id' => 204
                ),
                978 => array(
                    'id' => '978',
                    'cd_consulta' => '41301056',
                    'ds_procedimento' => 'BIÓPSIA DO VILO CORIAL      ',
                    'especialidade_id' => 204
                ),
                979 => array(
                    'id' => '979',
                    'cd_consulta' => '41301110',
                    'ds_procedimento' => 'CORDOCENTESE    ',
                    'especialidade_id' => 204
                ),
                980 => array(
                    'id' => '980',
                    'cd_consulta' => '40201015',
                    'ds_procedimento' => 'AMNIOSCOPIA',
                    'especialidade_id' => 204
                ),
                981 => array(
                    'id' => '981',
                    'cd_consulta' => '31303196',
                    'ds_procedimento' => 'CAUTERIZAÇÃO QUÍMICA, OU ELETROCAUTERIZAÇÃO, OU CRIOCAUTERIZAÇÃO DE LESÕES DE COLO UTERINO (POR SESSÃO)    ',
                    'especialidade_id' => 204
                ),
                982 => array(
                    'id' => '982',
                    'cd_consulta' => '31303170',
                    'ds_procedimento' => 'HISTEROSCOPIA CIRÚRGICA COM BIÓPSIA E/OU CURETAGEM UTERINA, LISE DE SINÉQUIAS, RETIRADA DE CORPO ESTRANHO  ',
                    'especialidade_id' => 204
                ),
                983 => array(
                    'id' => '983',
                    'cd_consulta' => '31303188',
                    'ds_procedimento' => 'HISTEROSCOPIA COM RESSECTOSCÓPIO PARA MIOMECTOMIA, POLIPECTOMIA, METROPLASTIA, ENDOMETRECTOMIA E RESSECÇÃO DE SINÉQUIAS',
                    'especialidade_id' => 204
                ),
                984 => array(
                    'id' => '984',
                    'cd_consulta' => '31302130',
                    'ds_procedimento' => 'CAUTERIZAÇÃO QUÍMICA, OU ELETROCAUTERIZAÇÃO, OU CRIOCAUTERIZAÇÃO DE LESÕES DA VAGINA (POR GRUPO DE ATÉ 5 LESÕES)       ',
                    'especialidade_id' => 204
                ),
                985 => array(
                    'id' => '985',
                    'cd_consulta' => '31301010',
                    'ds_procedimento' => 'BARTOLINECTOMIA UNILATERAL  ',
                    'especialidade_id' => 204
                ),
                986 => array(
                    'id' => '986',
                    'cd_consulta' => '31301029',
                    'ds_procedimento' => 'BIÓPSIA DE VULVA',
                    'especialidade_id' => 204
                ),
                987 => array(
                    'id' => '987',
                    'cd_consulta' => '31301045',
                    'ds_procedimento' => 'CLITORECTOMIA (PARCIAL OU TOTAL)  ',
                    'especialidade_id' => 204
                ),
                988 => array(
                    'id' => '988',
                    'cd_consulta' => '31301070',
                    'ds_procedimento' => 'EXÉRESE DE GLÂNDULA DE SKENE',
                    'especialidade_id' => 204
                ),
                989 => array(
                    'id' => '989',
                    'cd_consulta' => '31306047',
                    'ds_procedimento' => 'PERINEORRAFIA (NÃO OBSTÉTRICA) E/OU EPISIOTOMIA E/OU EPISIORRAFIA   ',
                    'especialidade_id' => 204
                ),
                990 => array(
                    'id' => '990',
                    'cd_consulta' => '31301088',
                    'ds_procedimento' => 'EXÉRESE DE LESÃO DA VULVA E/OU DO PERÍNEO (POR GRUPO DE ATÉ 5 LESÕES)    ',
                    'especialidade_id' => 204
                ),
                991 => array(
                    'id' => '991',
                    'cd_consulta' => '31302114',
                    'ds_procedimento' => 'HIMENOTOMIA',
                    'especialidade_id' => 204
                ),
                992 => array(
                    'id' => '992',
                    'cd_consulta' => '31301100',
                    'ds_procedimento' => 'INCISÃO E DRENAGEM DA GLÂNDULA DE BARTHOLIN OU SKENE    ',
                    'especialidade_id' => 204
                ),
                993 => array(
                    'id' => '993',
                    'cd_consulta' => '31301118',
                    'ds_procedimento' => 'MARSUPIALIZAÇÃO DA GLÂNDULA DE BARTHOLIN           ',
                    'especialidade_id' => 204
                ),
                994 => array(
                    'id' => '994',
                    'cd_consulta' => '31301096',
                    'ds_procedimento' => 'HIPERTROFIA DOS PEQUENOS LÁBIOS – CORREÇÃO CIRÚRGICA    ',
                    'especialidade_id' => 204
                ),
                995 => array(
                    'id' => '995',
                    'cd_consulta' => '31306039',
                    'ds_procedimento' => 'CORREÇÃO DE ROTURA PERINEAL DE III GRAU (COM LESÃO DO ESFINCTER) E RECONSTITUIÇÃO POR PLÁSTICA – QUALQUER TÉCNICA      ',
                    'especialidade_id' => 204
                ),
                996 => array(
                    'id' => '996',
                    'cd_consulta' => '31301126',
                    'ds_procedimento' => 'VULVECTOMIA AMPLIADA (NÃO INCLUI A LINFADENECTOMIA)',
                    'especialidade_id' => 204
                ),
                997 => array(
                    'id' => '997',
                    'cd_consulta' => '31301134',
                    'ds_procedimento' => 'VULVECTOMIA SIMPLES         ',
                    'especialidade_id' => 204
                ),
                998 => array(
                    'id' => '998',
                    'cd_consulta' => '31302017',
                    'ds_procedimento' => 'BIÓPSIA DE VAGINA           ',
                    'especialidade_id' => 204
                ),
                999 => array(
                    'id' => '999',
                    'cd_consulta' => '31302025',
                    'ds_procedimento' => 'COLPECTOMIA',
                    'especialidade_id' => 204
                ),
                1000 => array(
                    'id' => '1000',
                    'cd_consulta' => '31302033',
                    'ds_procedimento' => 'COLPOCLEISE (LEFORT)        ',
                    'especialidade_id' => 204
                ),
                1001 => array(
                    'id' => '1001',
                    'cd_consulta' => '31302041',
                    'ds_procedimento' => 'COLPOPLASTIA ANTERIOR       ',
                    'especialidade_id' => 204
                ),
                1002 => array(
                    'id' => '1002',
                    'cd_consulta' => '31302050',
                    'ds_procedimento' => 'COLPOPLASTIA POSTERIOR COM PERINEORRAFIA           ',
                    'especialidade_id' => 204
                ),
                1003 => array(
                    'id' => '1003',
                    'cd_consulta' => '31302076',
                    'ds_procedimento' => 'COLPOTOMIA OU CULDOCENTESE  ',
                    'especialidade_id' => 204
                ),
                1004 => array(
                    'id' => '1004',
                    'cd_consulta' => '31302122',
                    'ds_procedimento' => 'NEOVAGINA (CÓLON, DELGADO, TUBO DE PELE)           ',
                    'especialidade_id' => 204
                ),
                1005 => array(
                    'id' => '1005',
                    'cd_consulta' => '31302068',
                    'ds_procedimento' => 'COLPORRAFIA OU COLPOPERINEOPLASTIA INCLUINDO RESSECÇÃO DE SEPTO OU RESSUTURA DE PAREDE VAGINAL        ',
                    'especialidade_id' => 204
                ),
                1006 => array(
                    'id' => '1006',
                    'cd_consulta' => '31302084',
                    'ds_procedimento' => 'EXÉRESE DE CISTO VAGINAL    ',
                    'especialidade_id' => 204
                ),
                1007 => array(
                    'id' => '1007',
                    'cd_consulta' => '31302092',
                    'ds_procedimento' => 'EXTRAÇÃO DE CORPO ESTRANHO COM ANESTESIA GERAL OU BLOQUEIO          ',
                    'especialidade_id' => 204
                ),
                1008 => array(
                    'id' => '1008',
                    'cd_consulta' => '31302106',
                    'ds_procedimento' => 'FÍSTULA GINECOLÓGICA – TRATAMENTO CIRÚRGICO        ',
                    'especialidade_id' => 204
                ),
                1009 => array(
                    'id' => '1009',
                    'cd_consulta' => '31103375',
                    'ds_procedimento' => 'INCONTINÊNCIA URINÁRIA COM COLPOPLASTIA ANTERIOR – TRATAMENTO CIRÚRGICO (COM OU SEM USO DE PRÓTESE)   ',
                    'especialidade_id' => 204
                ),
                1010 => array(
                    'id' => '1010',
                    'cd_consulta' => '31303021',
                    'ds_procedimento' => 'BIÓPSIA DO COLO UTERINO     ',
                    'especialidade_id' => 204
                ),
                1011 => array(
                    'id' => '1011',
                    'cd_consulta' => '31303030',
                    'ds_procedimento' => 'BIÓPSIA DO ENDOMÉTRIO       ',
                    'especialidade_id' => 204
                ),
                1012 => array(
                    'id' => '1012',
                    'cd_consulta' => '31303056',
                    'ds_procedimento' => 'CURETAGEM GINECOLÓGICA SEMIÓTICA E/OU TERAPÊUTICA COM OU SEM DILATAÇÃO DE COLO UTERINO    ',
                    'especialidade_id' => 204
                ),
                1013 => array(
                    'id' => '1013',
                    'cd_consulta' => '31303064',
                    'ds_procedimento' => 'DILATAÇÃO DO COLO UTERINO   ',
                    'especialidade_id' => 204
                ),
                1014 => array(
                    'id' => '1014',
                    'cd_consulta' => '31303072',
                    'ds_procedimento' => 'EXCISÃO DE PÓLIPO CERVICAL  ',
                    'especialidade_id' => 204
                ),
                1015 => array(
                    'id' => '1015',
                    'cd_consulta' => '31303110',
                    'ds_procedimento' => 'HISTERECTOMIA TOTAL AMPLIADA – QUALQUER VIA – (NÃO INCLUI A LINFADENECTOMIA PÉLVICA) ',
                    'especialidade_id' => 204
                ),
                1016 => array(
                    'id' => '1016',
                    'cd_consulta' => '31303102',
                    'ds_procedimento' => 'HISTERECTOMIA TOTAL – QUALQUER VIA',
                    'especialidade_id' => 204
                ),
                1017 => array(
                    'id' => '1017',
                    'cd_consulta' => '31303080',
                    'ds_procedimento' => 'HISTERECTOMIA SUBTOTAL COM OU SEM ANEXECTOMIA, UNI OU BILATERAL – QUALQUER VIA       ',
                    'especialidade_id' => 204
                ),
                1018 => array(
                    'id' => '1018',
                    'cd_consulta' => '31303129',
                    'ds_procedimento' => 'HISTERECTOMIA TOTAL COM ANEXECTOMIA UNI OU BILATERAL – QUALQUER VIA ',
                    'especialidade_id' => 204
                ),
                1019 => array(
                    'id' => '1019',
                    'cd_consulta' => '31303145',
                    'ds_procedimento' => 'MIOMECTOMIA UTERINA         ',
                    'especialidade_id' => 204
                ),
                1020 => array(
                    'id' => '1020',
                    'cd_consulta' => '31303153',
                    'ds_procedimento' => 'TRAQUELECTOMIA – AMPUTAÇÃO, CONIZAÇÃO – (COM OU SEM CIRURGIA DE ALTA FREQUÊNCIA / CAF)    ',
                    'especialidade_id' => 204
                ),
                1021 => array(
                    'id' => '1021',
                    'cd_consulta' => '31304044',
                    'ds_procedimento' => 'SALPINGECTOMIA UNI OU BILATERAL   ',
                    'especialidade_id' => 204
                ),
                1022 => array(
                    'id' => '1022',
                    'cd_consulta' => '31304036',
                    'ds_procedimento' => 'RECANALIZAÇÃO TUBÁRIA – QUALQUER TÉCNICA, UNI OU BILATERAL (COM MICROSCÓPIO OU LUPA) ',
                    'especialidade_id' => 204
                ),
                1023 => array(
                    'id' => '1023',
                    'cd_consulta' => '31304010',
                    'ds_procedimento' => 'CIRURGIA ESTERILIZADORA FEMININA  ',
                    'especialidade_id' => 204
                ),
                1024 => array(
                    'id' => '1024',
                    'cd_consulta' => '31305016',
                    'ds_procedimento' => 'OOFORECTOMIA UNI OU BILATERAL OU OOFOROPLASTIA UNI OU BILATERAL     ',
                    'especialidade_id' => 204
                ),
                1025 => array(
                    'id' => '1025',
                    'cd_consulta' => '31309046',
                    'ds_procedimento' => 'CERCLAGEM DO COLO UTERINO – QUALQUER TÉCNICA       ',
                    'especialidade_id' => 204
                ),
                1026 => array(
                    'id' => '1026',
                    'cd_consulta' => '31309208',
                    'ds_procedimento' => 'CESARIANA COM HISTERECTOMIA ',
                    'especialidade_id' => 204
                ),
                1027 => array(
                    'id' => '1027',
                    'cd_consulta' => '31309062',
                    'ds_procedimento' => 'CURETAGEM PÓS-ABORTAMENTO   ',
                    'especialidade_id' => 204
                ),
                1028 => array(
                    'id' => '1028',
                    'cd_consulta' => '31303285',
                    'ds_procedimento' => 'HISTERECTOMIA PUERPERAL     ',
                    'especialidade_id' => 204
                ),
                1029 => array(
                    'id' => '1029',
                    'cd_consulta' => '31309100',
                    'ds_procedimento' => 'INVERSÃO UTERINA AGUDA – REDUÇÃO MANUAL',
                    'especialidade_id' => 204
                ),
                1030 => array(
                    'id' => '1030',
                    'cd_consulta' => '31309119',
                    'ds_procedimento' => 'INVERSÃO UTERINA – TRATAMENTO CIRÚRGICO',
                    'especialidade_id' => 204
                ),
                1031 => array(
                    'id' => '1031',
                    'cd_consulta' => '31309135',
                    'ds_procedimento' => 'PARTO MÚLTIPLO (CADA UM SUBSEQUENTE AO INICIAL)    ',
                    'especialidade_id' => 204
                ),
                1032 => array(
                    'id' => '1032',
                    'cd_consulta' => '31309089',
                    'ds_procedimento' => 'GRAVIDEZ ECTÓPICA – CIRURGIA',
                    'especialidade_id' => 204
                ),
                1033 => array(
                    'id' => '1033',
                    'cd_consulta' => '31309151',
                    'ds_procedimento' => 'REVISÃO OBSTÉTRICA DE PARTO OCORRIDO FORA DO HOSPITAL (INCLUI EXAME, DEQUITAÇÃO E SUTURA DE LACERAÇÕES ATÉ DE 2º GRAU) ',
                    'especialidade_id' => 204
                ),
                1034 => array(
                    'id' => '1034',
                    'cd_consulta' => '31309127',
                    'ds_procedimento' => 'PARTO (VIA VAGINAL)         ',
                    'especialidade_id' => 204
                ),
                1035 => array(
                    'id' => '1035',
                    'cd_consulta' => '31309054',
                    'ds_procedimento' => 'CESARIANA  ',
                    'especialidade_id' => 204
                ),
                1036 => array(
                    'id' => '1036',
                    'cd_consulta' => '31309097',
                    'ds_procedimento' => 'MATURAÇÃO CERVICAL PARA INDUÇÃO DE ABORTAMENTO OU DE TRABALHO DE PARTO   ',
                    'especialidade_id' => 204
                ),
                1037 => array(
                    'id' => '1037',
                    'cd_consulta' => '31309038',
                    'ds_procedimento' => 'ASSISTÊNCIA AO TRABALHO DE PARTO, POR HORA (ATÉ O LIMITE DE 6 HORAS). NÃO SERÁ PAGA SE O PARTO OCORRER NA PRIMEIRA HORA APÓS O INÍCIO DA ASSISTÊNCIA. APÓS A PRIMEIRA HORA, ALÉM DA ASSISTÊNCIA, REMUNERA-SE O PARTO (VIA BAIXA OU CESARIANA)       ',
                    'especialidade_id' => 204
                ),
                1038 => array(
                    'id' => '1038',
                    'cd_consulta' => '30602050',
                    'ds_procedimento' => 'DRENAGEM DE ABSCESSO DE MAMA',
                    'especialidade_id' => 204
                ),
                1039 => array(
                    'id' => '1039',
                    'cd_consulta' => '30602017',
                    'ds_procedimento' => 'BIÓPSIA INCISIONAL DE MAMA  ',
                    'especialidade_id' => 204
                ),
                1040 => array(
                    'id' => '1040',
                    'cd_consulta' => '30602084',
                    'ds_procedimento' => 'EXÉRESE DE MAMA SUPRA-NUMERÁRIA – UNILATERAL       ',
                    'especialidade_id' => 204
                ),
                1041 => array(
                    'id' => '1041',
                    'cd_consulta' => '30602092',
                    'ds_procedimento' => 'EXÉRESE DE NÓDULO           ',
                    'especialidade_id' => 204
                ),
                1042 => array(
                    'id' => '1042',
                    'cd_consulta' => '30602157',
                    'ds_procedimento' => 'MASTECTOMIA SIMPLES         ',
                    'especialidade_id' => 204
                ),
                1043 => array(
                    'id' => '1043',
                    'cd_consulta' => '30602149',
                    'ds_procedimento' => 'MASTECTOMIA RADICAL OU RADICAL MODIFICADA – QUALQUER TÉCNICA        ',
                    'especialidade_id' => 204
                ),
                1044 => array(
                    'id' => '1044',
                    'cd_consulta' => '30602181',
                    'ds_procedimento' => 'PUNÇÃO OU BIÓPSIA PERCUTÂNEA DE AGULHA FINA – POR NÓDULO (MÁXIMO DE 3 NÓDULOS POR MAMA)   ',
                    'especialidade_id' => 204
                ),
                1045 => array(
                    'id' => '1045',
                    'cd_consulta' => '30602203',
                    'ds_procedimento' => 'QUADRANTECTOMIA – RESSECÇÃO SEGMENTAR  ',
                    'especialidade_id' => 204
                ),
                1046 => array(
                    'id' => '1046',
                    'cd_consulta' => '30602190',
                    'ds_procedimento' => 'QUADRANTECTOMIA E LINFADENECTOMIA AXILAR           ',
                    'especialidade_id' => 204
                ),
                1047 => array(
                    'id' => '1047',
                    'cd_consulta' => '30602114',
                    'ds_procedimento' => 'GINECOMASTIA – UNILATERAL   ',
                    'especialidade_id' => 204
                ),
                1048 => array(
                    'id' => '1048',
                    'cd_consulta' => '30602041',
                    'ds_procedimento' => 'CORREÇÃO DE INVERSÃO PAPILAR – UNILATERAL          ',
                    'especialidade_id' => 204
                ),
                1049 => array(
                    'id' => '1049',
                    'cd_consulta' => '30602238',
                    'ds_procedimento' => 'RECONSTRUÇÃO MAMÁRIA COM RETALHO MUSCULAR OU MIOCUTÂNEO – UNILATERAL',
                    'especialidade_id' => 204
                ),
                1050 => array(
                    'id' => '1050',
                    'cd_consulta' => '30602300',
                    'ds_procedimento' => 'RESSECÇÃO DOS DUCTOS PRINCIPAIS DA MAMA – UNILATERAL    ',
                    'especialidade_id' => 204
                ),
                1051 => array(
                    'id' => '1051',
                    'cd_consulta' => '30602106',
                    'ds_procedimento' => 'FISTULECTOMIA DE MAMA       ',
                    'especialidade_id' => 204
                ),
                1052 => array(
                    'id' => '1052',
                    'cd_consulta' => '30602130',
                    'ds_procedimento' => 'LINFADENECTOMIA AXILAR      ',
                    'especialidade_id' => 204
                ),
                1053 => array(
                    'id' => '1053',
                    'cd_consulta' => '30602068',
                    'ds_procedimento' => 'DRENAGEM E/OU ASPIRAÇÃO DE SEROMA ',
                    'especialidade_id' => 204
                ),
                1054 => array(
                    'id' => '1054',
                    'cd_consulta' => '30602025',
                    'ds_procedimento' => 'COLETA DE FLUXO PAPILAR DE MAMA   ',
                    'especialidade_id' => 204
                ),
                1055 => array(
                    'id' => '1055',
                    'cd_consulta' => '30602173',
                    'ds_procedimento' => 'MASTOPLASTIA EM MAMA OPOSTA APÓS RECONSTRUÇÃO DA CONTRALATERAL      ',
                    'especialidade_id' => 204
                ),
                1056 => array(
                    'id' => '1056',
                    'cd_consulta' => '30602211',
                    'ds_procedimento' => 'RECONSTRUÇÃO DA PLACA ARÉOLO MAMILAR – UNILATERAL  ',
                    'especialidade_id' => 204
                ),
                1057 => array(
                    'id' => '1057',
                    'cd_consulta' => '30602262',
                    'ds_procedimento' => 'RECONSTRUÇÃO DA MAMA COM PRÓTESE E/OU EXPANSOR     ',
                    'especialidade_id' => 204
                ),
                1058 => array(
                    'id' => '1058',
                    'cd_consulta' => '30602076',
                    'ds_procedimento' => 'EXÉRESE DE LESÃO DA MAMA POR MARCAÇÃO ESTEREOTÁXICA OU ROLL         ',
                    'especialidade_id' => 204
                ),
                1059 => array(
                    'id' => '1059',
                    'cd_consulta' => '31308031',
                    'ds_procedimento' => 'INSEMINAÇÃO ARTIFICIAL      ',
                    'especialidade_id' => 204
                ),
                1060 => array(
                    'id' => '1060',
                    'cd_consulta' => '31308040',
                    'ds_procedimento' => 'TRANSFERÊNCIA DE EMBRIÃO PARA O ÚTERO  ',
                    'especialidade_id' => 204
                ),
                1061 => array(
                    'id' => '1061',
                    'cd_consulta' => '31308023',
                    'ds_procedimento' => 'GIFT (TRANSFERÊNCIA DE GAMETAS PARA AS TROMPAS)    ',
                    'especialidade_id' => 204
                ),
                1062 => array(
                    'id' => '1062',
                    'cd_consulta' => '31307078',
                    'ds_procedimento' => 'LIBERAÇÃO DE ADERÊNCIAS PÉLVICAS COM OU SEM RESSECÇÃO DE CISTOS PERITONIAIS OU SALPINGÓLISE           ',
                    'especialidade_id' => 204
                ),
                1063 => array(
                    'id' => '1063',
                    'cd_consulta' => '31307043',
                    'ds_procedimento' => 'ENDOMETRIOSE PERITONEAL – TRATAMENTO CIRÚRGICO     ',
                    'especialidade_id' => 204
                ),
                1064 => array(
                    'id' => '1064',
                    'cd_consulta' => '31307140',
                    'ds_procedimento' => 'SECÇÃO DE LIGAMENTOS ÚTERO-SACROS    ',
                    'especialidade_id' => 204
                ),
                1065 => array(
                    'id' => '1065',
                    'cd_consulta' => '31307108',
                    'ds_procedimento' => 'NEURECTOMIA PRÉ-SACRAL OU DO NERVO GÊNITO-FEMORAL  ',
                    'especialidade_id' => 204
                ),
                1066 => array(
                    'id' => '1066',
                    'cd_consulta' => '31307086',
                    'ds_procedimento' => 'LIGADURA DE VEIA OVARIANA   ',
                    'especialidade_id' => 204
                ),
                1067 => array(
                    'id' => '1067',
                    'cd_consulta' => '31307132',
                    'ds_procedimento' => 'RESSECÇÃO OU LIGADURA DE VARIZES PÉLVICAS          ',
                    'especialidade_id' => 204
                ),
                1068 => array(
                    'id' => '1068',
                    'cd_consulta' => '31307051',
                    'ds_procedimento' => 'EPIPLOPLASTIA OU APLICAÇÃO DE MEMBRANAS ANTIADERENTES   ',
                    'especialidade_id' => 204
                ),
                1069 => array(
                    'id' => '1069',
                    'cd_consulta' => '31307019',
                    'ds_procedimento' => 'CÂNCER DE OVÁRIO (DEBULKING)',
                    'especialidade_id' => 204
                ),
                1070 => array(
                    'id' => '1070',
                    'cd_consulta' => '31307027',
                    'ds_procedimento' => 'CIRURGIA (VIA ALTA OU BAIXA) DO PROLAPSO DE CÚPULA VAGINAL (FIXAÇÃO SACRAL OU NO LIGAMENTO SACRO-ESPINHOSO) QUALQUER TÉCNICA',
                    'especialidade_id' => 204
                ),
                
                // CARDIOLOGIA
                1171 => array(
                    'id' => '1171',
                    'cd_consulta' => '40101010',
                    'ds_procedimento' => 'ECG CONVENCIONAL DE ATÉ 12 DERIVAÇÕES',
                    'especialidade_id' => 186
                ),
                1172 => array(
                    'id' => '1172',
                    'cd_consulta' => '40101045',
                    'ds_procedimento' => 'TESTE ERGOMÉTRICO CONVENCIONAL – 3 OU MAIS DERIVAÇÕES SIMULTÂNEAS (INCLUI ECG BASAL CONVENCIONAL)     ',
                    'especialidade_id' => 186
                ),
                1173 => array(
                    'id' => '1173',
                    'cd_consulta' => '40101037',
                    'ds_procedimento' => 'TESTE ERGOMÉTRICO COMPUTADORIZADO (INCLUI ECG BASAL CONVENCIONAL) ',
                    'especialidade_id' => 186
                ),
                1174 => array(
                    'id' => '1174',
                    'cd_consulta' => '20102097',
                    'ds_procedimento' => 'SISTEMA HOLTER - 12 HORAS - 2 OU MAIS CANAIS    ',
                    'especialidade_id' => 186
                ),
                1175 => array(
                    'id' => '1175',
                    'cd_consulta' => '40101029',
                    'ds_procedimento' => 'ECG DE ALTA RESOLUÇÃO',
                    'especialidade_id' => 186
                ),
                1176 => array(
                    'id' => '1176',
                    'cd_consulta' => '41401190',
                    'ds_procedimento' => 'TESTE DE EXERCÍCIO EM ERGÔMETRO COM MEDIDA DE GASES EXPIRADOS (TESTE CARDIOPULMONAR DE EXERCÍCIO) COM QUALQUER ERGÔMETRO',
                    'especialidade_id' => 186
                ),
                1177 => array(
                    'id' => '1177',
                    'cd_consulta' => '40101053',
                    'ds_procedimento' => 'VARIABILIDADE DA FREQUÊNCIA CARDÍACA   ',
                    'especialidade_id' => 186
                ),
                1178 => array(
                    'id' => '1178',
                    'cd_consulta' => '20201052',
                    'ds_procedimento' => 'CARDIOVERSÃO ELÉTRICA ELETIVA (AVALIAÇÃO CLÍNICA, ELETROCARDIOGRÁFICA, INDISPENSÁVEL À DESFIBRILAÇÃO) ',
                    'especialidade_id' => 186
                ),
                1179 => array(
                    'id' => '1179',
                    'cd_consulta' => '30904099',
                    'ds_procedimento' => 'IMPLANTE DE MARCA-PASSO TEMPORÁRIO À BEIRA DO LEITO      ',
                    'especialidade_id' => 186
                ),
                1180 => array(
                    'id' => '1180',
                    'cd_consulta' => '20201036',
                    'ds_procedimento' => 'ASSISTÊNCIA CARDIOLÓGICA PEROPERATÓRIA EM CIRURGIA GERAL E EM PARTO (PRIMEIRA HORA) ',
                    'especialidade_id' => 186
                ),
                1181 => array(
                    'id' => '1181',
                    'cd_consulta' => '20201044',
                    'ds_procedimento' => 'ASSISTÊNCIA CARDIOLÓGICA PEROPERATÓRIA EM CIRURGIA GERAL E EM PARTO (HORAS SUPLEMENTARES) – MÁXIMO DE 4 HORAS  ',
                    'especialidade_id' => 186
                ),
                1182 => array(
                    'id' => '1182',
                    'cd_consulta' => '30904013',
                    'ds_procedimento' => 'CÁRDIO-ESTIMULAÇÃO TRANSESOFÁGICA (CETE), TERAPÊUTICA OU DIAGNÓSTICA       ',
                    'especialidade_id' => 186
                ),
                1183 => array(
                    'id' => '1183',
                    'cd_consulta' => '20186027',
                    'ds_procedimento' => 'CARDIOVERSÃO ELÉTRICA DE EMERGÊNCIA    ',
                    'especialidade_id' => 186
                ),
                1184 => array(
                    'id' => '1184',
                    'cd_consulta' => '20186035',
                    'ds_procedimento' => 'CARDIOVERSÃO QUÍMICA DE ARRITMIA PAROXÍSTA EM EMERGÊNCIA ',
                    'especialidade_id' => 186
                ),
                1185 => array(
                    'id' => '1185',
                    'cd_consulta' => '20101015',
                    'ds_procedimento' => 'ACOMPANHAMENTO CLÍNICO AMBULATORIAL PÓS-TRANSPLANTE RENAL – POR AVALIAÇÃO  ',
                    'especialidade_id' => 186
                ),
                1186 => array(
                    'id' => '1186',
                    'cd_consulta' => '20101023',
                    'ds_procedimento' => 'ANÁLISE DA PROPORCIONALIDADE CINEANTROPOMÉTRICA ',
                    'especialidade_id' => 186
                ),
                1187 => array(
                    'id' => '1187',
                    'cd_consulta' => '20101074',
                    'ds_procedimento' => 'AVALIAÇÃO NUTROLÓGICA (INCLUI CONSULTA)',
                    'especialidade_id' => 186
                ),
                1188 => array(
                    'id' => '1188',
                    'cd_consulta' => '20101082',
                    'ds_procedimento' => 'AVALIAÇÃO NUTROLÓGICA PRÉ E PÓS-CIRURGIA BARIÁTRICA (INCLUI CONSULTA)      ',
                    'especialidade_id' => 186
                ),
                1189 => array(
                    'id' => '1189',
                    'cd_consulta' => '20101090',
                    'ds_procedimento' => 'AVALIAÇÃO DA COMPOSIÇÃO CORPORAL POR ANTROPOMETRIA (INCLUI CONSULTA)       ',
                    'especialidade_id' => 186
                ),
                1190 => array(
                    'id' => '1190',
                    'cd_consulta' => '20101104',
                    'ds_procedimento' => 'AVALIAÇÃO DA COMPOSIÇÃO CORPORAL POR BIOIMPEDANCIOMETRIA ',
                    'especialidade_id' => 186
                ),
                1191 => array(
                    'id' => '1191',
                    'cd_consulta' => '20101112',
                    'ds_procedimento' => 'AVALIAÇÃO DA COMPOSIÇÃO CORPORAL POR PESAGEM HIDROSTÁTICA',
                    'especialidade_id' => 186
                ),
                1192 => array(
                    'id' => '1192',
                    'cd_consulta' => '20101120',
                    'ds_procedimento' => 'CONTROLE ANTI-DOPING (POR PERÍODO DE 2 HORAS) – DURANTE COMPETIÇÕES        ',
                    'especialidade_id' => 186
                ),
                1193 => array(
                    'id' => '1193',
                    'cd_consulta' => '20101139',
                    'ds_procedimento' => 'CONTROLE ANTI-DOPING (POR PERÍODO DE 2 HORAS) – FORA DE COMPETIÇÕES        ',
                    'especialidade_id' => 186
                ),
                1194 => array(
                    'id' => '1194',
                    'cd_consulta' => '20101155',
                    'ds_procedimento' => 'PRESTAÇÃO DE SERVIÇOS EM DELEGAÇÕES OU COMPETIÇÕES ESPORTIVAS     ',
                    'especialidade_id' => 186
                ),
                1195 => array(
                    'id' => '1195',
                    'cd_consulta' => '20101171',
                    'ds_procedimento' => 'REJEIÇÃO DE ENXERTO RENAL – TRATAMENTO AMBULATORIAL – AVALIAÇÃO CLÍNICA DIÁRIA      ',
                    'especialidade_id' => 186
                ),
                1196 => array(
                    'id' => '1196',
                    'cd_consulta' => '20101201',
                    'ds_procedimento' => 'AVALIAÇÃO CLÍNICA E ELETRÔNICA DE PACIENTE PORTADOR DE MARCA-PASSO OU SINCRONIZADOR OU DESFIBRILADOR, CARDÍACOS',
                    'especialidade_id' => 186
                ),
                1197 => array(
                    'id' => '1197',
                    'cd_consulta' => '20101210',
                    'ds_procedimento' => 'ACOMPANHAMENTO CLÍNICO AMBULATORIAL PÓS-TRANSPLANTE DE CÓRNEA – POR AVALIAÇÃO DO 11º AO 30º DIA ATÉ 3 AVALIAÇÕES        ',
                    'especialidade_id' => 186
                ),
                1198 => array(
                    'id' => '1198',
                    'cd_consulta' => '20101228',
                    'ds_procedimento' => 'ACOMPANHAMENTO CLÍNICO AMBULATORIAL PÓS-TRANSPLANTE DE MEDULA ÓSSEA        ',
                    'especialidade_id' => 186
                ),
                1199 => array(
                    'id' => '1199',
                    'cd_consulta' => '20101236',
                    'ds_procedimento' => 'TESTE DE AVALIAÇÃO GERIÁTRICA AMPLA – AGA       ',
                    'especialidade_id' => 186
                ),
                1200 => array(
                    'id' => '1200',
                    'cd_consulta' => '20101244',
                    'ds_procedimento' => 'AVALIAÇÃO E SELEÇÃO PARA IMPLANTE COCLEAR UNILATERAL     ',
                    'especialidade_id' => 186
                ),
                1201 => array(
                    'id' => '1201',
                    'cd_consulta' => '20101252',
                    'ds_procedimento' => 'ATIVAÇÃO DO IMPLANTE COCLEAR UNILATERAL',
                    'especialidade_id' => 186
                ),
                1202 => array(
                    'id' => '1202',
                    'cd_consulta' => '20101260',
                    'ds_procedimento' => 'MAPEAMENTO E BALANCEAMENTO DOS ELETRODOS DO IMPLANTE COCLEAR UNILATERAL    ',
                    'especialidade_id' => 186
                ),
                1203 => array(
                    'id' => '1203',
                    'cd_consulta' => '20101279',
                    'ds_procedimento' => 'POTENCIAL EVOCADO ELETRICAMENTE NO SISTEMA AUDITIVO CENTRAL       ',
                    'especialidade_id' => 186
                ),
                1204 => array(
                    'id' => '1204',
                    'cd_consulta' => '20101287',
                    'ds_procedimento' => 'REFLEXO ESTAPEDIANO ELICIADO ELETRICAMENTE UNILATERAL    ',
                    'especialidade_id' => 186
                ),
                1205 => array(
                    'id' => '1205',
                    'cd_consulta' => '20101295',
                    'ds_procedimento' => 'TROCA DO PROCESSADOR DE ÁUDIO DO IMPLANTE COCLEAR UNILATERAL      ',
                    'especialidade_id' => 186
                ),
                1206 => array(
                    'id' => '1206',
                    'cd_consulta' => '20102011',
                    'ds_procedimento' => 'HOLTER DE 24 HORAS – 2 OU MAIS CANAIS – ANALÓGICO        ',
                    'especialidade_id' => 186
                ),
                1207 => array(
                    'id' => '1207',
                    'cd_consulta' => '20102020',
                    'ds_procedimento' => 'HOLTER DE 24 HORAS – 3 CANAIS – DIGITAL',
                    'especialidade_id' => 186
                ),
                1208 => array(
                    'id' => '1208',
                    'cd_consulta' => '20102038',
                    'ds_procedimento' => 'MONITORIZAÇÃO AMBULATORIAL DA PRESSÃO ARTERIAL – MAPA (24 HORAS)  ',
                    'especialidade_id' => 186
                ),
                1209 => array(
                    'id' => '1209',
                    'cd_consulta' => '20102062',
                    'ds_procedimento' => 'MONITOR DE EVENTOS SINTOMÁTICOS POR 15 A 30 DIAS (LOOPER)',
                    'especialidade_id' => 186
                ),
                1210 => array(
                    'id' => '1210',
                    'cd_consulta' => '20102070',
                    'ds_procedimento' => 'TILT TESTE  ',
                    'especialidade_id' => 186
                ),
                1211 => array(
                    'id' => '1211',
                    'cd_consulta' => '20102089',
                    'ds_procedimento' => 'SISTEMA HOLTER - 12 HORAS - 1 CANAL    ',
                    'especialidade_id' => 186
                ),
                1212 => array(
                    'id' => '1212',
                    'cd_consulta' => '20102100',
                    'ds_procedimento' => 'SISTEMA HOLTER - 24 HORAS - 1 CANAL    ',
                    'especialidade_id' => 186
                ),
                1213 => array(
                    'id' => '1213',
                    'cd_consulta' => '20102119',
                    'ds_procedimento' => 'MONITORIZAÇÃO ELETROCARDIOGRÁFICA PROGRAMADA COM TRANSCRIÇÃO - NÃO CONTÍNUA',
                    'especialidade_id' => 186
                ),
                1214 => array(
                    'id' => '1214',
                    'cd_consulta' => '20102127',
                    'ds_procedimento' => 'HOLTER 7 DIAS        ',
                    'especialidade_id' => 186
                ),
                1215 => array(
                    'id' => '1215',
                    'cd_consulta' => '20102135',
                    'ds_procedimento' => 'HOLTER CEREBRAL      ',
                    'especialidade_id' => 186
                ),
                1216 => array(
                    'id' => '1216',
                    'cd_consulta' => '20102143',
                    'ds_procedimento' => 'TILT TESTE COM PROVAS FARMACOLÓGICAS   ',
                    'especialidade_id' => 186
                ),
                
                // CBHPM 2016
                1217 => array(
                    'id' => '1217',
                    'cd_consulta' => '40301010',
                    'ds_procedimento' => '3-METIL HISTIDINA, DOSAGEM NO SORO',
                    'especialidade_id' => null
                ),
                1218 => array(
                    'id' => '1218',
                    'cd_consulta' => '40301028',
                    'ds_procedimento' => '5-NUCLEOTIDASE     ',
                    'especialidade_id' => null
                ),
                1219 => array(
                    'id' => '1219',
                    'cd_consulta' => '40301036',
                    'ds_procedimento' => 'ACETAMINOFEN       ',
                    'especialidade_id' => null
                ),
                1220 => array(
                    'id' => '1220',
                    'cd_consulta' => '40301044',
                    'ds_procedimento' => 'ACETILCOLINESTERASE, EM ERITRÓCITOS',
                    'especialidade_id' => null
                ),
                1221 => array(
                    'id' => '1221',
                    'cd_consulta' => '40301052',
                    'ds_procedimento' => 'ACETONA, DOSAGEM NO SORO',
                    'especialidade_id' => null
                ),
                1222 => array(
                    'id' => '1222',
                    'cd_consulta' => '40301060',
                    'ds_procedimento' => 'ÁCIDO ASCÓRBICO (VITAMINA C)',
                    'especialidade_id' => null
                ),
                1223 => array(
                    'id' => '1223',
                    'cd_consulta' => '40301079',
                    'ds_procedimento' => 'ÁCIDO BETA HIDROXI BUTÍRICO ',
                    'especialidade_id' => null
                ),
                1224 => array(
                    'id' => '1224',
                    'cd_consulta' => '40301087',
                    'ds_procedimento' => 'ÁCIDO FÓLICO, DOSAGEM NOS ERITRÓCITOS',
                    'especialidade_id' => null
                ),
                1225 => array(
                    'id' => '1225',
                    'cd_consulta' => '40301095',
                    'ds_procedimento' => 'ÁCIDO GLIOXÍLICO   ',
                    'especialidade_id' => null
                ),
                1226 => array(
                    'id' => '1226',
                    'cd_consulta' => '40301109',
                    'ds_procedimento' => 'ÁCIDO LÁCTICO (LACTATO)',
                    'especialidade_id' => null
                ),
                1227 => array(
                    'id' => '1227',
                    'cd_consulta' => '40301117',
                    'ds_procedimento' => 'ÁCIDO ORÓTICO      ',
                    'especialidade_id' => null
                ),
                1228 => array(
                    'id' => '1228',
                    'cd_consulta' => '40301125',
                    'ds_procedimento' => 'ÁCIDO OXÁLICO      ',
                    'especialidade_id' => null
                ),
                1229 => array(
                    'id' => '1229',
                    'cd_consulta' => '40301133',
                    'ds_procedimento' => 'ÁCIDO PIRÚVICO     ',
                    'especialidade_id' => null
                ),
                1230 => array(
                    'id' => '1230',
                    'cd_consulta' => '40301141',
                    'ds_procedimento' => 'ÁCIDO SIÁLICO      ',
                    'especialidade_id' => null
                ),
                1231 => array(
                    'id' => '1231',
                    'cd_consulta' => '40301150',
                    'ds_procedimento' => 'ÁCIDO ÚRICO        ',
                    'especialidade_id' => null
                ),
                1232 => array(
                    'id' => '1232',
                    'cd_consulta' => '40301168',
                    'ds_procedimento' => 'ÁCIDO VALPRÓICO    ',
                    'especialidade_id' => null
                ),
                1233 => array(
                    'id' => '1233',
                    'cd_consulta' => '40301176',
                    'ds_procedimento' => 'ÁCIDOS BILIARES    ',
                    'especialidade_id' => null
                ),
                1234 => array(
                    'id' => '1234',
                    'cd_consulta' => '40301184',
                    'ds_procedimento' => 'ÁCIDOS GRAXOS LIVRES',
                    'especialidade_id' => null
                ),
                1235 => array(
                    'id' => '1235',
                    'cd_consulta' => '40301192',
                    'ds_procedimento' => 'ÁCIDOS ORGÂNICOS (PERFIL QUANTITATIVO)',
                    'especialidade_id' => null
                ),
                1236 => array(
                    'id' => '1236',
                    'cd_consulta' => '40301206',
                    'ds_procedimento' => 'ACILCARNITINAS (PERFIL QUALITATIVO)',
                    'especialidade_id' => null
                ),
                1237 => array(
                    'id' => '1237',
                    'cd_consulta' => '40301214',
                    'ds_procedimento' => 'ACILCARNITINAS (PERFIL QUANTITATIVO)',
                    'especialidade_id' => null
                ),
                1238 => array(
                    'id' => '1238',
                    'cd_consulta' => '40301222',
                    'ds_procedimento' => 'ALBUMINA           ',
                    'especialidade_id' => null
                ),
                1239 => array(
                    'id' => '1239',
                    'cd_consulta' => '40301230',
                    'ds_procedimento' => 'ALDOLASE           ',
                    'especialidade_id' => null
                ),
                1240 => array(
                    'id' => '1240',
                    'cd_consulta' => '40301249',
                    'ds_procedimento' => 'ALFA-1-ANTITRIPSINA, DOSAGEM NO SORO',
                    'especialidade_id' => null
                ),
                1241 => array(
                    'id' => '1241',
                    'cd_consulta' => '40301257',
                    'ds_procedimento' => 'ALFA-1-GLICOPROTEÍNA ÁCIDA',
                    'especialidade_id' => null
                ),
                1242 => array(
                    'id' => '1242',
                    'cd_consulta' => '40301265',
                    'ds_procedimento' => 'ALFA-2-MACROGLOBULINA',
                    'especialidade_id' => null
                ),
                1243 => array(
                    'id' => '1243',
                    'cd_consulta' => '40301273',
                    'ds_procedimento' => 'ALUMÍNIO, DOSAGEM NO SORO          ',
                    'especialidade_id' => null
                ),
                1244 => array(
                    'id' => '1244',
                    'cd_consulta' => '40301281',
                    'ds_procedimento' => 'AMILASE',
                    'especialidade_id' => null
                ),
                1245 => array(
                    'id' => '1245',
                    'cd_consulta' => '40302130',
                    'ds_procedimento' => 'AMILASE OU ALFA-AMILASE, ISOENZIMAS',
                    'especialidade_id' => null
                ),
                1246 => array(
                    'id' => '1246',
                    'cd_consulta' => '40301290',
                    'ds_procedimento' => 'AMINOÁCIDOS, FRACIONAMENTO E QUANTIFICAÇÃO ',
                    'especialidade_id' => null
                ),
                1247 => array(
                    'id' => '1247',
                    'cd_consulta' => '40301303',
                    'ds_procedimento' => 'AMIODARONA         ',
                    'especialidade_id' => null
                ),
                1248 => array(
                    'id' => '1248',
                    'cd_consulta' => '40301311',
                    'ds_procedimento' => 'AMITRIPTILINA, NORTRIPTILINA (CADA)',
                    'especialidade_id' => null
                ),
                1249 => array(
                    'id' => '1249',
                    'cd_consulta' => '40301320',
                    'ds_procedimento' => 'AMÔNIA ',
                    'especialidade_id' => null
                ),
                1250 => array(
                    'id' => '1250',
                    'cd_consulta' => '40301338',
                    'ds_procedimento' => 'ANFETAMINAS, DOSAGEM   ',
                    'especialidade_id' => null
                ),
                1251 => array(
                    'id' => '1251',
                    'cd_consulta' => '40301346',
                    'ds_procedimento' => 'ANTIBIÓTICOS, DOSAGEM NO SORO, CADA',
                    'especialidade_id' => null
                ),
                1252 => array(
                    'id' => '1252',
                    'cd_consulta' => '40301354',
                    'ds_procedimento' => 'APOLIPOPROTEÍNA A (APO A)          ',
                    'especialidade_id' => null
                ),
                1253 => array(
                    'id' => '1253',
                    'cd_consulta' => '40301362',
                    'ds_procedimento' => 'APOLIPOPROTEÍNA B (APO B)          ',
                    'especialidade_id' => null
                ),
                1254 => array(
                    'id' => '1254',
                    'cd_consulta' => '40301370',
                    'ds_procedimento' => 'BARBITÚRICOS, ANTIDEPRESSIVOS TRICÍCLICOS (CADA)       ',
                    'especialidade_id' => null
                ),
                1255 => array(
                    'id' => '1255',
                    'cd_consulta' => '40301745',
                    'ds_procedimento' => 'BENZODIAZEPÍNICOS E SIMILARES (CADA)       ',
                    'especialidade_id' => null
                ),
                1256 => array(
                    'id' => '1256',
                    'cd_consulta' => '40301389',
                    'ds_procedimento' => 'BETA-GLICURONIDASE ',
                    'especialidade_id' => null
                ),
                1257 => array(
                    'id' => '1257',
                    'cd_consulta' => '40301397',
                    'ds_procedimento' => 'BILIRRUBINAS (DIRETA, INDIRETA E TOTAL)    ',
                    'especialidade_id' => null
                ),
                1258 => array(
                    'id' => '1258',
                    'cd_consulta' => '40301400',
                    'ds_procedimento' => 'CÁLCIO ',
                    'especialidade_id' => null
                ),
                1259 => array(
                    'id' => '1259',
                    'cd_consulta' => '40301419',
                    'ds_procedimento' => 'CÁLCIO IÔNICO      ',
                    'especialidade_id' => null
                ),
                1260 => array(
                    'id' => '1260',
                    'cd_consulta' => '40301427',
                    'ds_procedimento' => 'CAPACIDADE DE FIXAÇÃO DE FERRO     ',
                    'especialidade_id' => null
                ),
                1261 => array(
                    'id' => '1261',
                    'cd_consulta' => '40301435',
                    'ds_procedimento' => 'CARBAMAZEPINA      ',
                    'especialidade_id' => null
                ),
                1262 => array(
                    'id' => '1262',
                    'cd_consulta' => '40301443',
                    'ds_procedimento' => 'CARNITINA LIVRE    ',
                    'especialidade_id' => null
                ),
                1263 => array(
                    'id' => '1263',
                    'cd_consulta' => '40301451',
                    'ds_procedimento' => 'CARNITINA TOTAL E FRAÇÕES          ',
                    'especialidade_id' => null
                ),
                1264 => array(
                    'id' => '1264',
                    'cd_consulta' => '40301460',
                    'ds_procedimento' => 'CAROTENO           ',
                    'especialidade_id' => null
                ),
                1265 => array(
                    'id' => '1265',
                    'cd_consulta' => '40301478',
                    'ds_procedimento' => 'CERULOPLASMINA     ',
                    'especialidade_id' => null
                ),
                1266 => array(
                    'id' => '1266',
                    'cd_consulta' => '40301486',
                    'ds_procedimento' => 'CICLOSPORINA, METHOTREXATE - CADA  ',
                    'especialidade_id' => null
                ),
                1267 => array(
                    'id' => '1267',
                    'cd_consulta' => '40301494',
                    'ds_procedimento' => 'CLEARANCE DE ÁCIDO ÚRICO           ',
                    'especialidade_id' => null
                ),
                1268 => array(
                    'id' => '1268',
                    'cd_consulta' => '40301508',
                    'ds_procedimento' => 'CLEARANCE DE CREATININA',
                    'especialidade_id' => null
                ),
                1269 => array(
                    'id' => '1269',
                    'cd_consulta' => '40301516',
                    'ds_procedimento' => 'CLEARANCE DE FOSFATO   ',
                    'especialidade_id' => null
                ),
                1270 => array(
                    'id' => '1270',
                    'cd_consulta' => '40301524',
                    'ds_procedimento' => 'CLEARANCE DE URÉIA ',
                    'especialidade_id' => null
                ),
                1271 => array(
                    'id' => '1271',
                    'cd_consulta' => '40301532',
                    'ds_procedimento' => 'CLEARANCE OSMOLAR  ',
                    'especialidade_id' => null
                ),
                1272 => array(
                    'id' => '1272',
                    'cd_consulta' => '40301540',
                    'ds_procedimento' => 'CLOMIPRAMINA       ',
                    'especialidade_id' => null
                ),
                1273 => array(
                    'id' => '1273',
                    'cd_consulta' => '40301559',
                    'ds_procedimento' => 'CLORO  ',
                    'especialidade_id' => null
                ),
                1274 => array(
                    'id' => '1274',
                    'cd_consulta' => '40301567',
                    'ds_procedimento' => 'COBRE  ',
                    'especialidade_id' => null
                ),
                1275 => array(
                    'id' => '1275',
                    'cd_consulta' => '40301575',
                    'ds_procedimento' => 'COCAÍNA, DOSAGEM   ',
                    'especialidade_id' => null
                ),
                1276 => array(
                    'id' => '1276',
                    'cd_consulta' => '40301583',
                    'ds_procedimento' => 'COLESTEROL (HDL)   ',
                    'especialidade_id' => null
                ),
                1277 => array(
                    'id' => '1277',
                    'cd_consulta' => '40301591',
                    'ds_procedimento' => 'COLESTEROL (LDL)   ',
                    'especialidade_id' => null
                ),
                1278 => array(
                    'id' => '1278',
                    'cd_consulta' => '40302695',
                    'ds_procedimento' => 'COLESTEROL (VLDL)  ',
                    'especialidade_id' => null
                ),
                1279 => array(
                    'id' => '1279',
                    'cd_consulta' => '40301605',
                    'ds_procedimento' => 'COLESTEROL TOTAL   ',
                    'especialidade_id' => null
                ),
                1280 => array(
                    'id' => '1280',
                    'cd_consulta' => '40301613',
                    'ds_procedimento' => 'COTININA           ',
                    'especialidade_id' => null
                ),
                1281 => array(
                    'id' => '1281',
                    'cd_consulta' => '40301621',
                    'ds_procedimento' => 'CREATINA           ',
                    'especialidade_id' => null
                ),
                1282 => array(
                    'id' => '1282',
                    'cd_consulta' => '40301630',
                    'ds_procedimento' => 'CREATININA         ',
                    'especialidade_id' => null
                ),
                1283 => array(
                    'id' => '1283',
                    'cd_consulta' => '40301664',
                    'ds_procedimento' => 'CREATINO FOSFOQUINASE - FRAÇÃO MB - ATIVIDADE          ',
                    'especialidade_id' => null
                ),
                1284 => array(
                    'id' => '1284',
                    'cd_consulta' => '40301656',
                    'ds_procedimento' => 'CREATINO FOSFOQUINASE - FRAÇÃO MB - MASSA  ',
                    'especialidade_id' => null
                ),
                1285 => array(
                    'id' => '1285',
                    'cd_consulta' => '40301648',
                    'ds_procedimento' => 'CREATINO FOSFOQUINASE TOTAL (CK)   ',
                    'especialidade_id' => null
                ),
                1286 => array(
                    'id' => '1286',
                    'cd_consulta' => '40301672',
                    'ds_procedimento' => 'CROMATOGRAFIA DE AMINOÁCIDOS (PERFIL QUALITATITIVO)    ',
                    'especialidade_id' => null
                ),
                1287 => array(
                    'id' => '1287',
                    'cd_consulta' => '40301680',
                    'ds_procedimento' => 'CURVA GLICÊMICA (4 DOSAGENS) VIA ORAL OU ENDOVENOSA    ',
                    'especialidade_id' => null
                ),
                1288 => array(
                    'id' => '1288',
                    'cd_consulta' => '40301699',
                    'ds_procedimento' => 'DESIDROGENASE ALFA-HIDROXIBUTÍRICA ',
                    'especialidade_id' => null
                ),
                1289 => array(
                    'id' => '1289',
                    'cd_consulta' => '40301702',
                    'ds_procedimento' => 'DESIDROGENASE GLUTÂMICA',
                    'especialidade_id' => null
                ),
                1290 => array(
                    'id' => '1290',
                    'cd_consulta' => '40301710',
                    'ds_procedimento' => 'DESIDROGENASE ISOCÍTRICA           ',
                    'especialidade_id' => null
                ),
                1291 => array(
                    'id' => '1291',
                    'cd_consulta' => '40301729',
                    'ds_procedimento' => 'DESIDROGENASE LÁCTICA  ',
                    'especialidade_id' => null
                ),
                1292 => array(
                    'id' => '1292',
                    'cd_consulta' => '40301737',
                    'ds_procedimento' => 'DESIDROGENASE LÁCTICA - ISOENZIMAS FRACIONADAS         ',
                    'especialidade_id' => null
                ),
                1293 => array(
                    'id' => '1293',
                    'cd_consulta' => '40301753',
                    'ds_procedimento' => 'DIGITOXINA OU DIGOXINA ',
                    'especialidade_id' => null
                ),
                1294 => array(
                    'id' => '1294',
                    'cd_consulta' => '40301761',
                    'ds_procedimento' => 'ELETROFERESE DE PROTEÍNAS          ',
                    'especialidade_id' => null
                ),
                1295 => array(
                    'id' => '1295',
                    'cd_consulta' => '40301770',
                    'ds_procedimento' => 'ELETROFORESE DE GLICOPROTEÍNAS     ',
                    'especialidade_id' => null
                ),
                1296 => array(
                    'id' => '1296',
                    'cd_consulta' => '40301788',
                    'ds_procedimento' => 'ELETROFORESE DE LIPOPROTEÍNAS      ',
                    'especialidade_id' => null
                ),
                1297 => array(
                    'id' => '1297',
                    'cd_consulta' => '40302717',
                    'ds_procedimento' => 'ELETROFORESE DE PROTEÍNAS DE ALTA RESOLUÇÃO',
                    'especialidade_id' => null
                ),
                1298 => array(
                    'id' => '1298',
                    'cd_consulta' => '40301796',
                    'ds_procedimento' => 'ENOLASE',
                    'especialidade_id' => null
                ),
                1299 => array(
                    'id' => '1299',
                    'cd_consulta' => '40301800',
                    'ds_procedimento' => 'ETOSSUXIMIDA       ',
                    'especialidade_id' => null
                ),
                1300 => array(
                    'id' => '1300',
                    'cd_consulta' => '40301818',
                    'ds_procedimento' => 'FENILALANINA, DOSAGEM  ',
                    'especialidade_id' => null
                ),
                1301 => array(
                    'id' => '1301',
                    'cd_consulta' => '40301826',
                    'ds_procedimento' => 'FENITOÍNA          ',
                    'especialidade_id' => null
                ),
                1302 => array(
                    'id' => '1302',
                    'cd_consulta' => '40301834',
                    'ds_procedimento' => 'FENOBARBITAL       ',
                    'especialidade_id' => null
                ),
                1303 => array(
                    'id' => '1303',
                    'cd_consulta' => '40301842',
                    'ds_procedimento' => 'FERRO SÉRICO       ',
                    'especialidade_id' => null
                ),
                1304 => array(
                    'id' => '1304',
                    'cd_consulta' => '40301850',
                    'ds_procedimento' => 'FORMALDEÍDO        ',
                    'especialidade_id' => null
                ),
                1305 => array(
                    'id' => '1305',
                    'cd_consulta' => '40301869',
                    'ds_procedimento' => 'FOSFATASE ÁCIDA FRAÇÃO PROSTÁTICA  ',
                    'especialidade_id' => null
                ),
                1306 => array(
                    'id' => '1306',
                    'cd_consulta' => '40301877',
                    'ds_procedimento' => 'FOSFATASE ÁCIDA TOTAL  ',
                    'especialidade_id' => null
                ),
                1307 => array(
                    'id' => '1307',
                    'cd_consulta' => '40301885',
                    'ds_procedimento' => 'FOSFATASE ALCALINA ',
                    'especialidade_id' => null
                ),
                1308 => array(
                    'id' => '1308',
                    'cd_consulta' => '40301893',
                    'ds_procedimento' => 'FOSFATASE ALCALINA COM FRACIONAMENTO DE ISOENZIMAS     ',
                    'especialidade_id' => null
                ),
                1309 => array(
                    'id' => '1309',
                    'cd_consulta' => '40301907',
                    'ds_procedimento' => 'FOSFATASE ALCALINA FRAÇÃO ÓSSEA - ELISA    ',
                    'especialidade_id' => null
                ),
                1310 => array(
                    'id' => '1310',
                    'cd_consulta' => '40301915',
                    'ds_procedimento' => 'FOSFATASE ALCALINA TERMO-ESTÁVEL   ',
                    'especialidade_id' => null
                ),
                1311 => array(
                    'id' => '1311',
                    'cd_consulta' => '40301923',
                    'ds_procedimento' => 'FOSFOLIPÍDIOS      ',
                    'especialidade_id' => null
                ),
                1312 => array(
                    'id' => '1312',
                    'cd_consulta' => '40301931',
                    'ds_procedimento' => 'FÓSFORO',
                    'especialidade_id' => null
                ),
                1313 => array(
                    'id' => '1313',
                    'cd_consulta' => '40301940',
                    'ds_procedimento' => 'FÓSFORO, PROVA DE REABSORÇÃO TUBULAR       ',
                    'especialidade_id' => null
                ),
                1314 => array(
                    'id' => '1314',
                    'cd_consulta' => '40301958',
                    'ds_procedimento' => 'FRUTOSAMINAS (PROTEÍNAS GLICOSILADAS)      ',
                    'especialidade_id' => null
                ),
                1315 => array(
                    'id' => '1315',
                    'cd_consulta' => '40301966',
                    'ds_procedimento' => 'FRUTOSE',
                    'especialidade_id' => null
                ),
                1316 => array(
                    'id' => '1316',
                    'cd_consulta' => '40301974',
                    'ds_procedimento' => 'GALACTOSE          ',
                    'especialidade_id' => null
                ),
                1317 => array(
                    'id' => '1317',
                    'cd_consulta' => '40301982',
                    'ds_procedimento' => 'GALACTOSE 1-FOSFATOURIDIL TRANSFERASE, DOSAGEM         ',
                    'especialidade_id' => null
                ),
                1318 => array(
                    'id' => '1318',
                    'cd_consulta' => '40301990',
                    'ds_procedimento' => 'GAMA-GLUTAMIL TRANSFERASE          ',
                    'especialidade_id' => null
                ),
                1319 => array(
                    'id' => '1319',
                    'cd_consulta' => '40302016',
                    'ds_procedimento' => 'GASOMETRIA (PH, PCO2, SA, O2, EXCESSO BASE)',
                    'especialidade_id' => null
                ),
                1320 => array(
                    'id' => '1320',
                    'cd_consulta' => '40302024',
                    'ds_procedimento' => 'GASOMETRIA + HB + HT + NA + K + CL + CA + GLICOSE + LACTATO (QUANDO EFETUADO NO GASÔMETRO) ',
                    'especialidade_id' => null
                ),
                1321 => array(
                    'id' => '1321',
                    'cd_consulta' => '40302032',
                    'ds_procedimento' => 'GLICEMIA APÓS SOBRECARGA COM DEXTROSOL OU GLICOSE      ',
                    'especialidade_id' => null
                ),
                1322 => array(
                    'id' => '1322',
                    'cd_consulta' => '40302040',
                    'ds_procedimento' => 'GLICOSE',
                    'especialidade_id' => null
                ),
                1323 => array(
                    'id' => '1323',
                    'cd_consulta' => '40302059',
                    'ds_procedimento' => 'GLICOSE-6-FOSFATO DEIDROGENASE (G6FD)      ',
                    'especialidade_id' => null
                ),
                1324 => array(
                    'id' => '1324',
                    'cd_consulta' => '40302067',
                    'ds_procedimento' => 'HAPTOGLOBINA       ',
                    'especialidade_id' => null
                ),
                1325 => array(
                    'id' => '1325',
                    'cd_consulta' => '40302075',
                    'ds_procedimento' => 'HEMOGLOBINA GLICADA (A1 TOTAL)     ',
                    'especialidade_id' => null
                ),
                1326 => array(
                    'id' => '1326',
                    'cd_consulta' => '40302733',
                    'ds_procedimento' => 'HEMOGLOBINA GLICADA (FRAÇÃO A1C)   ',
                    'especialidade_id' => null
                ),
                1327 => array(
                    'id' => '1327',
                    'cd_consulta' => '40302083',
                    'ds_procedimento' => 'HEMOGLOBINA PLASMÁTICA LIVRE       ',
                    'especialidade_id' => null
                ),
                1328 => array(
                    'id' => '1328',
                    'cd_consulta' => '40302091',
                    'ds_procedimento' => 'HEXOSAMINIDASE A   ',
                    'especialidade_id' => null
                ),
                1329 => array(
                    'id' => '1329',
                    'cd_consulta' => '40302105',
                    'ds_procedimento' => 'HIDROXIPROLINA     ',
                    'especialidade_id' => null
                ),
                1330 => array(
                    'id' => '1330',
                    'cd_consulta' => '40302113',
                    'ds_procedimento' => 'HOMOCISTEÍNA       ',
                    'especialidade_id' => null
                ),
                1331 => array(
                    'id' => '1331',
                    'cd_consulta' => '40302121',
                    'ds_procedimento' => 'IMIPRAMINA - DESIPRAMINA           ',
                    'especialidade_id' => null
                ),
                1332 => array(
                    'id' => '1332',
                    'cd_consulta' => '40302725',
                    'ds_procedimento' => 'IMUNOFIXAÇÃO - CADA FRAÇÃO         ',
                    'especialidade_id' => null
                ),
                1333 => array(
                    'id' => '1333',
                    'cd_consulta' => '40302148',
                    'ds_procedimento' => 'ISOMERASE FOSFOHEXOSE  ',
                    'especialidade_id' => null
                ),
                1334 => array(
                    'id' => '1334',
                    'cd_consulta' => '40302156',
                    'ds_procedimento' => 'ISONIAZIDA         ',
                    'especialidade_id' => null
                ),
                1335 => array(
                    'id' => '1335',
                    'cd_consulta' => '40302164',
                    'ds_procedimento' => 'LACTOSE, TESTE DE TOLERÂNCIA       ',
                    'especialidade_id' => null
                ),
                1336 => array(
                    'id' => '1336',
                    'cd_consulta' => '40302741',
                    'ds_procedimento' => 'LAMOTRIGINA        ',
                    'especialidade_id' => null
                ),
                1337 => array(
                    'id' => '1337',
                    'cd_consulta' => '40302172',
                    'ds_procedimento' => 'LEUCINO AMINOPEPTIDASE ',
                    'especialidade_id' => null
                ),
                1338 => array(
                    'id' => '1338',
                    'cd_consulta' => '40302180',
                    'ds_procedimento' => 'LIDOCAINA          ',
                    'especialidade_id' => null
                ),
                1339 => array(
                    'id' => '1339',
                    'cd_consulta' => '40302199',
                    'ds_procedimento' => 'LIPASE ',
                    'especialidade_id' => null
                ),
                1340 => array(
                    'id' => '1340',
                    'cd_consulta' => '40302202',
                    'ds_procedimento' => 'LIPASE LIPOPROTÉICA',
                    'especialidade_id' => null
                ),
                1341 => array(
                    'id' => '1341',
                    'cd_consulta' => '40302636',
                    'ds_procedimento' => 'LIPÍDIOS TOTAIS    ',
                    'especialidade_id' => null
                ),
                1342 => array(
                    'id' => '1342',
                    'cd_consulta' => '40302210',
                    'ds_procedimento' => 'LIPOPROTEÍNA (A) - LP (A)          ',
                    'especialidade_id' => null
                ),
                1343 => array(
                    'id' => '1343',
                    'cd_consulta' => '40302229',
                    'ds_procedimento' => 'LÍTIO  ',
                    'especialidade_id' => null
                ),
                1344 => array(
                    'id' => '1344',
                    'cd_consulta' => '40302237',
                    'ds_procedimento' => 'MAGNÉSIO           ',
                    'especialidade_id' => null
                ),
                1345 => array(
                    'id' => '1345',
                    'cd_consulta' => '40302644',
                    'ds_procedimento' => 'MALTOSE, TESTE DE TOLERÂNCIA       ',
                    'especialidade_id' => null
                ),
                1346 => array(
                    'id' => '1346',
                    'cd_consulta' => '40302245',
                    'ds_procedimento' => 'MIOGLOBINA, DOSAGEM',
                    'especialidade_id' => null
                ),
                1347 => array(
                    'id' => '1347',
                    'cd_consulta' => '40302652',
                    'ds_procedimento' => 'MUCOPOLISSACARIDOSE, PESQUISA      ',
                    'especialidade_id' => null
                ),
                1348 => array(
                    'id' => '1348',
                    'cd_consulta' => '40302660',
                    'ds_procedimento' => 'MUCOPROTEÍNAS      ',
                    'especialidade_id' => null
                ),
                1349 => array(
                    'id' => '1349',
                    'cd_consulta' => '40302253',
                    'ds_procedimento' => 'NITROGÊNIO AMONIACAL   ',
                    'especialidade_id' => null
                ),
                1350 => array(
                    'id' => '1350',
                    'cd_consulta' => '40302261',
                    'ds_procedimento' => 'NITROGÊNIO TOTAL   ',
                    'especialidade_id' => null
                ),
                1351 => array(
                    'id' => '1351',
                    'cd_consulta' => '40302679',
                    'ds_procedimento' => 'OCITOCINASE, DOSAGEM   ',
                    'especialidade_id' => null
                ),
                1352 => array(
                    'id' => '1352',
                    'cd_consulta' => '40302270',
                    'ds_procedimento' => 'OSMOLALIDADE       ',
                    'especialidade_id' => null
                ),
                1353 => array(
                    'id' => '1353',
                    'cd_consulta' => '40302288',
                    'ds_procedimento' => 'OXCARBAZEPINA, DOSAGEM ',
                    'especialidade_id' => null
                ),
                1354 => array(
                    'id' => '1354',
                    'cd_consulta' => '40302768',
                    'ds_procedimento' => 'PAPP-A ',
                    'especialidade_id' => null
                ),
                1355 => array(
                    'id' => '1355',
                    'cd_consulta' => '40302776',
                    'ds_procedimento' => 'PEPTÍDEO NATRIURÉTICO BNP/PROBNP   ',
                    'especialidade_id' => null
                ),
                1356 => array(
                    'id' => '1356',
                    'cd_consulta' => '40302750',
                    'ds_procedimento' => 'PERFIL LIPÍDICO / LIPIDOGRAMA (LÍPIDIOS TOTAIS, COLESTEROL, TRIGLICERÍDIOS E ELETROFORESE LIPOPROTEÍNAS)           ',
                    'especialidade_id' => null
                ),
                1357 => array(
                    'id' => '1357',
                    'cd_consulta' => '40302296',
                    'ds_procedimento' => 'PIRUVATO QUINASE   ',
                    'especialidade_id' => null
                ),
                1358 => array(
                    'id' => '1358',
                    'cd_consulta' => '40302300',
                    'ds_procedimento' => 'PORFIRINAS QUANTITATIVAS (CADA)    ',
                    'especialidade_id' => null
                ),
                1359 => array(
                    'id' => '1359',
                    'cd_consulta' => '40302318',
                    'ds_procedimento' => 'POTÁSSIO           ',
                    'especialidade_id' => null
                ),
                1360 => array(
                    'id' => '1360',
                    'cd_consulta' => '40302326',
                    'ds_procedimento' => 'PRÉ-ALBUMINA       ',
                    'especialidade_id' => null
                ),
                1361 => array(
                    'id' => '1361',
                    'cd_consulta' => '40302334',
                    'ds_procedimento' => 'PRIMIDONA          ',
                    'especialidade_id' => null
                ),
                1362 => array(
                    'id' => '1362',
                    'cd_consulta' => '40302342',
                    'ds_procedimento' => 'PROCAINAMIDA       ',
                    'especialidade_id' => null
                ),
                1363 => array(
                    'id' => '1363',
                    'cd_consulta' => '40302687',
                    'ds_procedimento' => 'PROCALCITONINA     ',
                    'especialidade_id' => null
                ),
                1364 => array(
                    'id' => '1364',
                    'cd_consulta' => '40302350',
                    'ds_procedimento' => 'PROPANOLOL         ',
                    'especialidade_id' => null
                ),
                1365 => array(
                    'id' => '1365',
                    'cd_consulta' => '40302369',
                    'ds_procedimento' => 'PROTEÍNA LIGADORA DO RETINOL       ',
                    'especialidade_id' => null
                ),
                1366 => array(
                    'id' => '1366',
                    'cd_consulta' => '40302377',
                    'ds_procedimento' => 'PROTEÍNAS TOTAIS   ',
                    'especialidade_id' => null
                ),
                1367 => array(
                    'id' => '1367',
                    'cd_consulta' => '40302385',
                    'ds_procedimento' => 'PROTEÍNAS TOTAIS ALBUMINA E GLOBULINA      ',
                    'especialidade_id' => null
                ),
                1368 => array(
                    'id' => '1368',
                    'cd_consulta' => '40302393',
                    'ds_procedimento' => 'QUINIDINA          ',
                    'especialidade_id' => null
                ),
                1369 => array(
                    'id' => '1369',
                    'cd_consulta' => '40302407',
                    'ds_procedimento' => 'RESERVA ALCALINA (BICARBONATO)     ',
                    'especialidade_id' => null
                ),
                1370 => array(
                    'id' => '1370',
                    'cd_consulta' => '40302415',
                    'ds_procedimento' => 'SACAROSE, TESTE DE TOLERÂNCIA      ',
                    'especialidade_id' => null
                ),
                1371 => array(
                    'id' => '1371',
                    'cd_consulta' => '40302423',
                    'ds_procedimento' => 'SÓDIO  ',
                    'especialidade_id' => null
                ),
                1372 => array(
                    'id' => '1372',
                    'cd_consulta' => '40302431',
                    'ds_procedimento' => 'SUCCINIL ACETONA   ',
                    'especialidade_id' => null
                ),
                1373 => array(
                    'id' => '1373',
                    'cd_consulta' => '40302440',
                    'ds_procedimento' => 'SULFONAMIDAS LIVRE E ACETILADA (% DE ACETILAÇÃO)       ',
                    'especialidade_id' => null
                ),
                1374 => array(
                    'id' => '1374',
                    'cd_consulta' => '40302458',
                    'ds_procedimento' => 'TACROLIMUS         ',
                    'especialidade_id' => null
                ),
                1375 => array(
                    'id' => '1375',
                    'cd_consulta' => '40302466',
                    'ds_procedimento' => 'TÁLIO, DOSAGEM     ',
                    'especialidade_id' => null
                ),
                1376 => array(
                    'id' => '1376',
                    'cd_consulta' => '40302474',
                    'ds_procedimento' => 'TEOFILINA          ',
                    'especialidade_id' => null
                ),
                1377 => array(
                    'id' => '1377',
                    'cd_consulta' => '40302482',
                    'ds_procedimento' => 'TESTE DE TOLERÂNCIA A INSULINA OU HIPOGLICEMIANTES ORAIS (ATÉ 6 DOSAGENS)          ',
                    'especialidade_id' => null
                ),
                1378 => array(
                    'id' => '1378',
                    'cd_consulta' => '40302709',
                    'ds_procedimento' => 'TESTE ORAL DE TOLERÂNCIA À GLICOSE - 2 DOSAGENS        ',
                    'especialidade_id' => null
                ),
                1379 => array(
                    'id' => '1379',
                    'cd_consulta' => '40302490',
                    'ds_procedimento' => 'TIROSINA           ',
                    'especialidade_id' => null
                ),
                1380 => array(
                    'id' => '1380',
                    'cd_consulta' => '40302504',
                    'ds_procedimento' => 'TRANSAMINASE OXALACÉTICA (AMINO TRANSFERASE ASPARTATO) ',
                    'especialidade_id' => null
                ),
                1381 => array(
                    'id' => '1381',
                    'cd_consulta' => '40302512',
                    'ds_procedimento' => 'TRANSAMINASE PIRÚVICA (AMINO TRANSFERASE DE ALANINA)   ',
                    'especialidade_id' => null
                ),
                1382 => array(
                    'id' => '1382',
                    'cd_consulta' => '40302520',
                    'ds_procedimento' => 'TRANSFERRINA       ',
                    'especialidade_id' => null
                ),
                1383 => array(
                    'id' => '1383',
                    'cd_consulta' => '40302539',
                    'ds_procedimento' => 'TRIAZOLAM          ',
                    'especialidade_id' => null
                ),
                1384 => array(
                    'id' => '1384',
                    'cd_consulta' => '40302547',
                    'ds_procedimento' => 'TRIGLICERÍDEOS     ',
                    'especialidade_id' => null
                ),
                1385 => array(
                    'id' => '1385',
                    'cd_consulta' => '40302555',
                    'ds_procedimento' => 'TRIMIPRAMINA       ',
                    'especialidade_id' => null
                ),
                1386 => array(
                    'id' => '1386',
                    'cd_consulta' => '40302563',
                    'ds_procedimento' => 'TRIPSINA IMUNO REATIVA (IRT)       ',
                    'especialidade_id' => null
                ),
                1387 => array(
                    'id' => '1387',
                    'cd_consulta' => '40302571',
                    'ds_procedimento' => 'TROPONINA          ',
                    'especialidade_id' => null
                ),
                1388 => array(
                    'id' => '1388',
                    'cd_consulta' => '40302580',
                    'ds_procedimento' => 'URÉIA  ',
                    'especialidade_id' => null
                ),
                1389 => array(
                    'id' => '1389',
                    'cd_consulta' => '40302598',
                    'ds_procedimento' => 'UROBILINOGÊNIO     ',
                    'especialidade_id' => null
                ),
                1390 => array(
                    'id' => '1390',
                    'cd_consulta' => '40302830',
                    'ds_procedimento' => 'VITAMINA "D" 25 HIDROXI, DOSAGEM (VITAMINA D3)         ',
                    'especialidade_id' => null
                ),
                1391 => array(
                    'id' => '1391',
                    'cd_consulta' => '40302601',
                    'ds_procedimento' => 'VITAMINA A, DOSAGEM',
                    'especialidade_id' => null
                ),
                1392 => array(
                    'id' => '1392',
                    'cd_consulta' => '40302784',
                    'ds_procedimento' => 'VITAMINA B1, DOSAGEM   ',
                    'especialidade_id' => null
                ),
                1393 => array(
                    'id' => '1393',
                    'cd_consulta' => '40302792',
                    'ds_procedimento' => 'VITAMINA B2, DOSAGEM   ',
                    'especialidade_id' => null
                ),
                1394 => array(
                    'id' => '1394',
                    'cd_consulta' => '40302806',
                    'ds_procedimento' => 'VITAMINA B3, DOSAGEM   ',
                    'especialidade_id' => null
                ),
                1395 => array(
                    'id' => '1395',
                    'cd_consulta' => '40302814',
                    'ds_procedimento' => 'VITAMINA B6, DOSAGEM   ',
                    'especialidade_id' => null
                ),
                1396 => array(
                    'id' => '1396',
                    'cd_consulta' => '40302822',
                    'ds_procedimento' => 'VITAMINA D2, DOSAGEM   ',
                    'especialidade_id' => null
                ),
                1397 => array(
                    'id' => '1397',
                    'cd_consulta' => '40302610',
                    'ds_procedimento' => 'VITAMINA E         ',
                    'especialidade_id' => null
                ),
                1398 => array(
                    'id' => '1398',
                    'cd_consulta' => '40302849',
                    'ds_procedimento' => 'VITAMINA K, DOSAGEM',
                    'especialidade_id' => null
                ),
                1399 => array(
                    'id' => '1399',
                    'cd_consulta' => '40302628',
                    'ds_procedimento' => 'XILOSE, TESTE DE ABSORÇÃO À        ',
                    'especialidade_id' => null
                ),
                1400 => array(
                    'id' => '1400',
                    'cd_consulta' => '40303012',
                    'ds_procedimento' => 'ALFA -1-ANTITRIPSINA, (FEZES)      ',
                    'especialidade_id' => null
                ),
                1401 => array(
                    'id' => '1401',
                    'cd_consulta' => '40303020',
                    'ds_procedimento' => 'ANAL SWAB, PESQUISA DE OXIÚRUS     ',
                    'especialidade_id' => null
                ),
                1402 => array(
                    'id' => '1402',
                    'cd_consulta' => '40303039',
                    'ds_procedimento' => 'COPROLÓGICO FUNCIONAL (CARACTERES, PH, DIGESTIBILIDADE, AMÔNIA, ÁCIDOS ORGÂNICOS E INTERPRETAÇÃO)      ',
                    'especialidade_id' => null
                ),
                1403 => array(
                    'id' => '1403',
                    'cd_consulta' => '40303047',
                    'ds_procedimento' => 'EOSINÓFILOS, PESQUISA NAS FEZES    ',
                    'especialidade_id' => null
                ),
                1404 => array(
                    'id' => '1404',
                    'cd_consulta' => '40303179',
                    'ds_procedimento' => 'ESTEATÓCRITO, TRIAGEM PARA GORDURA FECAL   ',
                    'especialidade_id' => null
                ),
                1405 => array(
                    'id' => '1405',
                    'cd_consulta' => '40303187',
                    'ds_procedimento' => 'ESTERCOBILINOGÊNIO FECAL, DOSAGEM  ',
                    'especialidade_id' => null
                ),
                1406 => array(
                    'id' => '1406',
                    'cd_consulta' => '40303055',
                    'ds_procedimento' => 'GORDURA FECAL, DOSAGEM ',
                    'especialidade_id' => null
                ),
                1407 => array(
                    'id' => '1407',
                    'cd_consulta' => '40303063',
                    'ds_procedimento' => 'HEMATOXILINA FÉRRICA, PESQUISA DE PROTOZOÁRIOS         ',
                    'especialidade_id' => null
                ),
                1408 => array(
                    'id' => '1408',
                    'cd_consulta' => '40303071',
                    'ds_procedimento' => 'IDENTIFICAÇÃO DE HELMINTOS, EXAME DE FRAGMENTOS        ',
                    'especialidade_id' => null
                ),
                1409 => array(
                    'id' => '1409',
                    'cd_consulta' => '40303080',
                    'ds_procedimento' => 'LARVAS (FEZES), PESQUISA           ',
                    'especialidade_id' => null
                ),
                1410 => array(
                    'id' => '1410',
                    'cd_consulta' => '40303098',
                    'ds_procedimento' => 'LEUCÓCITOS E HEMÁCIAS, PESQUISA NAS FEZES  ',
                    'especialidade_id' => null
                ),
                1411 => array(
                    'id' => '1411',
                    'cd_consulta' => '40303101',
                    'ds_procedimento' => 'LEVEDURAS, PESQUISA',
                    'especialidade_id' => null
                ),
                1412 => array(
                    'id' => '1412',
                    'cd_consulta' => '40303110',
                    'ds_procedimento' => 'PARASITOLÓGICO     ',
                    'especialidade_id' => null
                ),
                1413 => array(
                    'id' => '1413',
                    'cd_consulta' => '40303128',
                    'ds_procedimento' => 'PARASITOLÓGICO, COLHEITA MÚLTIPLA COM FORNECIMENTO DO LÍQUIDO CONSERVANTE          ',
                    'especialidade_id' => null
                ),
                1414 => array(
                    'id' => '1414',
                    'cd_consulta' => '40303136',
                    'ds_procedimento' => 'SANGUE OCULTO, PESQUISA',
                    'especialidade_id' => null
                ),
                1415 => array(
                    'id' => '1415',
                    'cd_consulta' => '40303144',
                    'ds_procedimento' => 'SHISTOSSOMA, PESQUISA OVOS EM FRAGMENTOS MUCOSA APÓS BIÓPSIA RETAL ',
                    'especialidade_id' => null
                ),
                1416 => array(
                    'id' => '1416',
                    'cd_consulta' => '40303152',
                    'ds_procedimento' => 'SUBSTÂNCIAS REDUTORAS NAS FEZES    ',
                    'especialidade_id' => null
                ),
                1417 => array(
                    'id' => '1417',
                    'cd_consulta' => '40303160',
                    'ds_procedimento' => 'TRIPSINA, PROVA DE (DIGESTÃO DA GELATINA)  ',
                    'especialidade_id' => null
                ),
                1418 => array(
                    'id' => '1418',
                    'cd_consulta' => '40304019',
                    'ds_procedimento' => 'ANTICOAGULANTE LÚPICO, PESQUISA    ',
                    'especialidade_id' => null
                ),
                1419 => array(
                    'id' => '1419',
                    'cd_consulta' => '40304663',
                    'ds_procedimento' => 'ALFA-2ANTIPLASMINA, TESTE FUNCIONAL',
                    'especialidade_id' => null
                ),
                1420 => array(
                    'id' => '1420',
                    'cd_consulta' => '40304027',
                    'ds_procedimento' => 'ANTICORPO ANTI A E B   ',
                    'especialidade_id' => null
                ),
                1421 => array(
                    'id' => '1421',
                    'cd_consulta' => '40304671',
                    'ds_procedimento' => 'ANTICORPO ANTIMIELOPEROXIDASE, MPO ',
                    'especialidade_id' => null
                ),
                1422 => array(
                    'id' => '1422',
                    'cd_consulta' => '40304035',
                    'ds_procedimento' => 'ANTICORPOS ANTIPLAQUETÁRIOS, CITOMETRIA DE FLUXO       ',
                    'especialidade_id' => null
                ),
                1423 => array(
                    'id' => '1423',
                    'cd_consulta' => '40304043',
                    'ds_procedimento' => 'ANTICORPOS IRREGULARES ',
                    'especialidade_id' => null
                ),
                1424 => array(
                    'id' => '1424',
                    'cd_consulta' => '40304051',
                    'ds_procedimento' => 'ANTICORPOS IRREGULARES, PESQUISA (MEIO SALINO A TEMPERATURA AMBIENTE E 37º E TESTE INDIRETO DE COOMBS) ',
                    'especialidade_id' => null
                ),
                1425 => array(
                    'id' => '1425',
                    'cd_consulta' => '40304060',
                    'ds_procedimento' => 'ANTITROMBINA III, DOSAGEM          ',
                    'especialidade_id' => null
                ),
                1426 => array(
                    'id' => '1426',
                    'cd_consulta' => '40304078',
                    'ds_procedimento' => 'ATIVADOR TISSULAR DE PLASMINOGÊNIO (TPA)   ',
                    'especialidade_id' => null
                ),
                1427 => array(
                    'id' => '1427',
                    'cd_consulta' => '40304930',
                    'ds_procedimento' => 'BAÇO, EXAME DE ESFREGAÇO DE ASPIRADO       ',
                    'especialidade_id' => null
                ),
                1428 => array(
                    'id' => '1428',
                    'cd_consulta' => '40304086',
                    'ds_procedimento' => 'CD... (ANTÍGENO DE DIF. CELULAR, CADA DETERMINAÇÃO)    ',
                    'especialidade_id' => null
                ),
                1429 => array(
                    'id' => '1429',
                    'cd_consulta' => '40304795',
                    'ds_procedimento' => 'CÉLULAS LE         ',
                    'especialidade_id' => null
                ),
                1430 => array(
                    'id' => '1430',
                    'cd_consulta' => '40304094',
                    'ds_procedimento' => 'CITOQUÍMICA PARA CLASSIFICAR LEUCEMIA: ESTERASE, FOSFATASE LEUCOCITÁRIA, PAS, PEROXIDASE OU SB, ETC - CADA         ',
                    'especialidade_id' => null
                ),
                1431 => array(
                    'id' => '1431',
                    'cd_consulta' => '40304922',
                    'ds_procedimento' => 'COAGULOGRAMA (TS, TC, PROVA DO LAÇO, RETRAÇÃO DO COÁGULO, CONTAGEM DE PLAQUETAS, TEMPO DE PROTOMBINA, TEMPO DE TROMBOPLASTINA, PARCIAL ATIVADO)      ',
                    'especialidade_id' => null
                ),
                1432 => array(
                    'id' => '1432',
                    'cd_consulta' => '40304809',
                    'ds_procedimento' => 'CONSUMO DE PROTROMBINA ',
                    'especialidade_id' => null
                ),
                1433 => array(
                    'id' => '1433',
                    'cd_consulta' => '40304108',
                    'ds_procedimento' => 'COOMBS DIRETO      ',
                    'especialidade_id' => null
                ),
                1434 => array(
                    'id' => '1434',
                    'cd_consulta' => '40304884',
                    'ds_procedimento' => 'COOMBS INDIRETO    ',
                    'especialidade_id' => null
                ),
                1435 => array(
                    'id' => '1435',
                    'cd_consulta' => '40304906',
                    'ds_procedimento' => 'DÍMERO D           ',
                    'especialidade_id' => null
                ),
                1436 => array(
                    'id' => '1436',
                    'cd_consulta' => '40304116',
                    'ds_procedimento' => 'ENZIMAS ERITROCITÁRIAS, (ADENILATOQUINASE, DESIDROGENASE LÁCTICA, FOSFOFRUCTOQUINASE, FOSFOGLICERATO QUINASE, GLICERALDEÍDO, 3 - FOSFATO DESIDROGENASE, GLICOSE FOSFATO ISOMERASE, GLICOSE 6 - FOSFATO DESIDROGENASE, GLUTATION PEROXIDASE, GLUTATION',
                    'especialidade_id' => null
                ),
                1437 => array(
                    'id' => '1437',
                    'cd_consulta' => '40304817',
                    'ds_procedimento' => 'ENZIMAS ERITROCITÁRIAS, RASTREIO PARA DEFICIÊNCIA      ',
                    'especialidade_id' => null
                ),
                1438 => array(
                    'id' => '1438',
                    'cd_consulta' => '40304825',
                    'ds_procedimento' => 'ESPLENOGRAMA (CITOLOGIA)           ',
                    'especialidade_id' => null
                ),
                1439 => array(
                    'id' => '1439',
                    'cd_consulta' => '40304868',
                    'ds_procedimento' => 'ESTREPTOZIMA       ',
                    'especialidade_id' => null
                ),
                1440 => array(
                    'id' => '1440',
                    'cd_consulta' => '40304132',
                    'ds_procedimento' => 'FALCIZAÇÃO, TESTE DE   ',
                    'especialidade_id' => null
                ),
                1441 => array(
                    'id' => '1441',
                    'cd_consulta' => '40304140',
                    'ds_procedimento' => 'FATOR 4 PLAQUETÁRIO, DOSAGENS      ',
                    'especialidade_id' => null
                ),
                1442 => array(
                    'id' => '1442',
                    'cd_consulta' => '40304159',
                    'ds_procedimento' => 'FATOR II, DOSAGEM  ',
                    'especialidade_id' => null
                ),
                1443 => array(
                    'id' => '1443',
                    'cd_consulta' => '40304167',
                    'ds_procedimento' => 'FATOR IX, DOSAGEM  ',
                    'especialidade_id' => null
                ),
                1444 => array(
                    'id' => '1444',
                    'cd_consulta' => '40304175',
                    'ds_procedimento' => 'FATOR V, DOSAGEM   ',
                    'especialidade_id' => null
                ),
                1445 => array(
                    'id' => '1445',
                    'cd_consulta' => '40304680',
                    'ds_procedimento' => 'FATOR VII          ',
                    'especialidade_id' => null
                ),
                1446 => array(
                    'id' => '1446',
                    'cd_consulta' => '40304183',
                    'ds_procedimento' => 'FATOR VIII, DOSAGEM',
                    'especialidade_id' => null
                ),
                1447 => array(
                    'id' => '1447',
                    'cd_consulta' => '40304191',
                    'ds_procedimento' => 'FATOR VIII, DOSAGEM DO ANTÍGENO (VON WILLEBRAND)       ',
                    'especialidade_id' => null
                ),
                1448 => array(
                    'id' => '1448',
                    'cd_consulta' => '40304205',
                    'ds_procedimento' => 'FATOR VIII, DOSAGEM DO INIBIDOR    ',
                    'especialidade_id' => null
                ),
                1449 => array(
                    'id' => '1449',
                    'cd_consulta' => '40304213',
                    'ds_procedimento' => 'FATOR X, DOSAGEM   ',
                    'especialidade_id' => null
                ),
                1450 => array(
                    'id' => '1450',
                    'cd_consulta' => '40304221',
                    'ds_procedimento' => 'FATOR XI, DOSAGEM  ',
                    'especialidade_id' => null
                ),
                1451 => array(
                    'id' => '1451',
                    'cd_consulta' => '40304230',
                    'ds_procedimento' => 'FATOR XII, DOSAGEM ',
                    'especialidade_id' => null
                ),
                1452 => array(
                    'id' => '1452',
                    'cd_consulta' => '40304698',
                    'ds_procedimento' => 'FATOR XIII, DOSAGEM, TESTE FUNCIONAL       ',
                    'especialidade_id' => null
                ),
                1453 => array(
                    'id' => '1453',
                    'cd_consulta' => '40304248',
                    'ds_procedimento' => 'FATOR XIII, PESQUISA   ',
                    'especialidade_id' => null
                ),
                1454 => array(
                    'id' => '1454',
                    'cd_consulta' => '40304256',
                    'ds_procedimento' => 'FENOTIPAGEM DO SISTEMA RH-HR (ANTI RHO(D) + ANTI RH(C) + ANTI RH(E)',
                    'especialidade_id' => null
                ),
                1455 => array(
                    'id' => '1455',
                    'cd_consulta' => '40304264',
                    'ds_procedimento' => 'FIBRINOGÊNIO, TESTE FUNCIONAL, DOSAGEM     ',
                    'especialidade_id' => null
                ),
                1456 => array(
                    'id' => '1456',
                    'cd_consulta' => '40304272',
                    'ds_procedimento' => 'FILÁRIA, PESQUISA  ',
                    'especialidade_id' => null
                ),
                1457 => array(
                    'id' => '1457',
                    'cd_consulta' => '40304280',
                    'ds_procedimento' => 'GRUPO ABO, CLASSIFICAÇÃO REVERSA   ',
                    'especialidade_id' => null
                ),
                1458 => array(
                    'id' => '1458',
                    'cd_consulta' => '40304299',
                    'ds_procedimento' => 'GRUPO SANGUÍNEO ABO, E FATOR RHO (INCLUI DU)           ',
                    'especialidade_id' => null
                ),
                1459 => array(
                    'id' => '1459',
                    'cd_consulta' => '40304302',
                    'ds_procedimento' => 'HAM, TESTE DE (HEMÓLISE ÁCIDA)     ',
                    'especialidade_id' => null
                ),
                1460 => array(
                    'id' => '1460',
                    'cd_consulta' => '40304310',
                    'ds_procedimento' => 'HEINZ, CORPÚSCULOS, PESQUISA       ',
                    'especialidade_id' => null
                ),
                1461 => array(
                    'id' => '1461',
                    'cd_consulta' => '40304329',
                    'ds_procedimento' => 'HEMÁCIAS FETAIS, PESQUISA          ',
                    'especialidade_id' => null
                ),
                1462 => array(
                    'id' => '1462',
                    'cd_consulta' => '40304337',
                    'ds_procedimento' => 'HEMATÓCRITO, DETERMINAÇÃO DO       ',
                    'especialidade_id' => null
                ),
                1463 => array(
                    'id' => '1463',
                    'cd_consulta' => '40304353',
                    'ds_procedimento' => 'HEMOGLOBINA (ELETROFORESE OU HPLC) ',
                    'especialidade_id' => null
                ),
                1464 => array(
                    'id' => '1464',
                    'cd_consulta' => '40304833',
                    'ds_procedimento' => 'HEMOGLOBINA INSTALBILIDADE A 37 GRAUS C    ',
                    'especialidade_id' => null
                ),
                1465 => array(
                    'id' => '1465',
                    'cd_consulta' => '40304345',
                    'ds_procedimento' => 'HEMOGLOBINA, DOSAGEM   ',
                    'especialidade_id' => null
                ),
                1466 => array(
                    'id' => '1466',
                    'cd_consulta' => '40304841',
                    'ds_procedimento' => 'HEMOGLOBINA, SOLUBILIDADE (HBS E HBD)      ',
                    'especialidade_id' => null
                ),
                1467 => array(
                    'id' => '1467',
                    'cd_consulta' => '40304850',
                    'ds_procedimento' => 'HEMOGLOBINOPATIA - TRIAGEM (EL.HB., HEMOGLOB. FETAL. RETICULÓCITOS, CORPOS DE H, T. FALCIZAÇÃO HEMÁCIAS, RESIST. OSMÓTICA, TERMO ESTABILIDADE)       ',
                    'especialidade_id' => null
                ),
                1468 => array(
                    'id' => '1468',
                    'cd_consulta' => '40304361',
                    'ds_procedimento' => 'HEMOGRAMA COM CONTAGEM DE PLAQUETAS OU FRAÇÕES (ERITROGRAMA, LEUCOGRAMA, PLAQUETAS)',
                    'especialidade_id' => null
                ),
                1469 => array(
                    'id' => '1469',
                    'cd_consulta' => '40304370',
                    'ds_procedimento' => 'HEMOSSEDIMENTAÇÃO, (VHS)           ',
                    'especialidade_id' => null
                ),
                1470 => array(
                    'id' => '1470',
                    'cd_consulta' => '40304388',
                    'ds_procedimento' => 'HEMOSSIDERINA (SIDERÓCITOS), SANGUE OU URINA           ',
                    'especialidade_id' => null
                ),
                1471 => array(
                    'id' => '1471',
                    'cd_consulta' => '40304396',
                    'ds_procedimento' => 'HEPARINA, DOSAGEM  ',
                    'especialidade_id' => null
                ),
                1472 => array(
                    'id' => '1472',
                    'cd_consulta' => '40304701',
                    'ds_procedimento' => 'IMUNOFENOTIPAGEM PARA DOENÇA RESIDUAL MÍNIMA (*)       ',
                    'especialidade_id' => null
                ),
                1473 => array(
                    'id' => '1473',
                    'cd_consulta' => '40304710',
                    'ds_procedimento' => 'IMUNOFENOTIPAGEM PARA HEMOGLOBINÚRIA PAROXISTICA NOTURNA (*)       ',
                    'especialidade_id' => null
                ),
                1474 => array(
                    'id' => '1474',
                    'cd_consulta' => '40304728',
                    'ds_procedimento' => 'IMUNOFENOTIPAGEM PARA LEUCEMIAS AGUDAS OU SINDROME MIELODISPLÁSICA (*) ',
                    'especialidade_id' => null
                ),
                1475 => array(
                    'id' => '1475',
                    'cd_consulta' => '40304736',
                    'ds_procedimento' => 'IMUNOFENOTIPAGEM PARA LINFOMA NÃO HODGKIN / SINDROME LINFOPROLIFERATIVA CRÔNICA (*)',
                    'especialidade_id' => null
                ),
                1476 => array(
                    'id' => '1476',
                    'cd_consulta' => '40304744',
                    'ds_procedimento' => 'IMUNOFENOTIPAGEM PARA PERFIL IMUNE (*)     ',
                    'especialidade_id' => null
                ),
                1477 => array(
                    'id' => '1477',
                    'cd_consulta' => '40304752',
                    'ds_procedimento' => 'INIBIDOR DO FATOR IX, DOSAGEM      ',
                    'especialidade_id' => null
                ),
                1478 => array(
                    'id' => '1478',
                    'cd_consulta' => '40304400',
                    'ds_procedimento' => 'INIBIDOR DO TPA (PAI)  ',
                    'especialidade_id' => null
                ),
                1479 => array(
                    'id' => '1479',
                    'cd_consulta' => '40304760',
                    'ds_procedimento' => 'INIBIDOR DOS FATORES DA HEMOSTASIA, TRIAGEM',
                    'especialidade_id' => null
                ),
                1480 => array(
                    'id' => '1480',
                    'cd_consulta' => '40304418',
                    'ds_procedimento' => 'LEUCÓCITOS, CONTAGEM   ',
                    'especialidade_id' => null
                ),
                1481 => array(
                    'id' => '1481',
                    'cd_consulta' => '40304949',
                    'ds_procedimento' => 'LINFONODO, EXAME DE ESFREGAÇO DE ASPIRADO  ',
                    'especialidade_id' => null
                ),
                1482 => array(
                    'id' => '1482',
                    'cd_consulta' => '40304485',
                    'ds_procedimento' => 'MEDULA ÓSSEA, ASPIRAÇÃO PARA MIELOGRAMA OU MICROBIOLÓGICO          ',
                    'especialidade_id' => null
                ),
                1483 => array(
                    'id' => '1483',
                    'cd_consulta' => '40304434',
                    'ds_procedimento' => 'META-HEMOGLOBINA, DETERMINAÇÃO DA  ',
                    'especialidade_id' => null
                ),
                1484 => array(
                    'id' => '1484',
                    'cd_consulta' => '40304892',
                    'ds_procedimento' => 'MIELOGRAMA         ',
                    'especialidade_id' => null
                ),
                1485 => array(
                    'id' => '1485',
                    'cd_consulta' => '40304450',
                    'ds_procedimento' => 'PLAQUETAS, TESTE DE AGREGAÇÃO (POR AGENTE AGREGANTE), CADA         ',
                    'especialidade_id' => null
                ),
                1486 => array(
                    'id' => '1486',
                    'cd_consulta' => '40304469',
                    'ds_procedimento' => 'PLASMINOGÊNIO, DOSAGEM ',
                    'especialidade_id' => null
                ),
                1487 => array(
                    'id' => '1487',
                    'cd_consulta' => '40304477',
                    'ds_procedimento' => 'PLASMÓDIO, PESQUISA',
                    'especialidade_id' => null
                ),
                1488 => array(
                    'id' => '1488',
                    'cd_consulta' => '40304493',
                    'ds_procedimento' => 'PRODUTOS DE DEGRADAÇÃO DA FIBRINA, QUALITATIVO         ',
                    'especialidade_id' => null
                ),
                1489 => array(
                    'id' => '1489',
                    'cd_consulta' => '40304779',
                    'ds_procedimento' => 'PRODUTOS DE DEGRADAÇÃO DA FIBRINA, QUANTITATIVO        ',
                    'especialidade_id' => null
                ),
                1490 => array(
                    'id' => '1490',
                    'cd_consulta' => '40304507',
                    'ds_procedimento' => 'PROTEÍNA C         ',
                    'especialidade_id' => null
                ),
                1491 => array(
                    'id' => '1491',
                    'cd_consulta' => '40304787',
                    'ds_procedimento' => 'PROTEÍNA S LIVRE, DOSAGEM          ',
                    'especialidade_id' => null
                ),
                1492 => array(
                    'id' => '1492',
                    'cd_consulta' => '40304515',
                    'ds_procedimento' => 'PROTEÍNA S, TESTE FUNCIONAL        ',
                    'especialidade_id' => null
                ),
                1493 => array(
                    'id' => '1493',
                    'cd_consulta' => '40304523',
                    'ds_procedimento' => 'PROTOPORFIRINA ERITROCITÁRIA LIVRE - ZINCO ',
                    'especialidade_id' => null
                ),
                1494 => array(
                    'id' => '1494',
                    'cd_consulta' => '40304531',
                    'ds_procedimento' => 'PROVA DO LAÇO      ',
                    'especialidade_id' => null
                ),
                1495 => array(
                    'id' => '1495',
                    'cd_consulta' => '40304540',
                    'ds_procedimento' => 'RESISTÊNCIA GLOBULAR, CURVA DE     ',
                    'especialidade_id' => null
                ),
                1496 => array(
                    'id' => '1496',
                    'cd_consulta' => '40304558',
                    'ds_procedimento' => 'RETICULÓCITOS, CONTAGEM',
                    'especialidade_id' => null
                ),
                1497 => array(
                    'id' => '1497',
                    'cd_consulta' => '40304566',
                    'ds_procedimento' => 'RETRAÇÃO DO COÁGULO',
                    'especialidade_id' => null
                ),
                1498 => array(
                    'id' => '1498',
                    'cd_consulta' => '40304574',
                    'ds_procedimento' => 'RISTOCETINA, CO-FATOR, TESTE FUNCIONAL, DOSAGEM        ',
                    'especialidade_id' => null
                ),
                1499 => array(
                    'id' => '1499',
                    'cd_consulta' => '40304876',
                    'ds_procedimento' => 'SULFO-HEMOGLOBINA, DETERMINAÇÃO DA ',
                    'especialidade_id' => null
                ),
                1500 => array(
                    'id' => '1500',
                    'cd_consulta' => '40304582',
                    'ds_procedimento' => 'TEMPO DE COAGULAÇÃO',
                    'especialidade_id' => null
                ),
                1501 => array(
                    'id' => '1501',
                    'cd_consulta' => '40304590',
                    'ds_procedimento' => 'TEMPO DE PROTROMBINA   ',
                    'especialidade_id' => null
                ),
                1502 => array(
                    'id' => '1502',
                    'cd_consulta' => '40304604',
                    'ds_procedimento' => 'TEMPO DE REPTILASE ',
                    'especialidade_id' => null
                ),
                1503 => array(
                    'id' => '1503',
                    'cd_consulta' => '40304914',
                    'ds_procedimento' => 'TEMPO DE SANGRAMENTO (DUKE)        ',
                    'especialidade_id' => null
                ),
                1504 => array(
                    'id' => '1504',
                    'cd_consulta' => '40304612',
                    'ds_procedimento' => 'TEMPO DE SANGRAMENTO DE IVY        ',
                    'especialidade_id' => null
                ),
                1505 => array(
                    'id' => '1505',
                    'cd_consulta' => '40304620',
                    'ds_procedimento' => 'TEMPO DE TROMBINA  ',
                    'especialidade_id' => null
                ),
                1506 => array(
                    'id' => '1506',
                    'cd_consulta' => '40304639',
                    'ds_procedimento' => 'TEMPO DE TROMBOPLASTINA PARCIAL ATIVADA    ',
                    'especialidade_id' => null
                ),
                1507 => array(
                    'id' => '1507',
                    'cd_consulta' => '40304647',
                    'ds_procedimento' => 'TRIPANOSSOMA, PESQUISA ',
                    'especialidade_id' => null
                ),
                1508 => array(
                    'id' => '1508',
                    'cd_consulta' => '40304655',
                    'ds_procedimento' => 'TROMBOELASTOGRAMA  ',
                    'especialidade_id' => null
                ),
                1509 => array(
                    'id' => '1509',
                    'cd_consulta' => '40305015',
                    'ds_procedimento' => '1,25-DIHIDROXI VITAMINA D          ',
                    'especialidade_id' => null
                ),
                1510 => array(
                    'id' => '1510',
                    'cd_consulta' => '40305740',
                    'ds_procedimento' => '11-DESOXICORTICOSTERONA',
                    'especialidade_id' => null
                ),
                1511 => array(
                    'id' => '1511',
                    'cd_consulta' => '40316017',
                    'ds_procedimento' => '17-ALFA-HIDROXIPROGESTERONA        ',
                    'especialidade_id' => null
                ),
                1512 => array(
                    'id' => '1512',
                    'cd_consulta' => '40305040',
                    'ds_procedimento' => '17-CETOGÊNICOS (17-CGS)',
                    'especialidade_id' => null
                ),
                1513 => array(
                    'id' => '1513',
                    'cd_consulta' => '40305058',
                    'ds_procedimento' => '17-CETOGÊNICOS CROMATOGRAFIA       ',
                    'especialidade_id' => null
                ),
                1514 => array(
                    'id' => '1514',
                    'cd_consulta' => '40305066',
                    'ds_procedimento' => '17-CETOSTERÓIDES (17-CTS) - CROMATOGRAFIA  ',
                    'especialidade_id' => null
                ),
                1515 => array(
                    'id' => '1515',
                    'cd_consulta' => '40305074',
                    'ds_procedimento' => '17-CETOSTERÓIDES RELAÇÃO ALFA/BETA ',
                    'especialidade_id' => null
                ),
                1516 => array(
                    'id' => '1516',
                    'cd_consulta' => '40305082',
                    'ds_procedimento' => '17-CETOSTERÓIDES TOTAIS (17-CTS)   ',
                    'especialidade_id' => null
                ),
                1517 => array(
                    'id' => '1517',
                    'cd_consulta' => '40305783',
                    'ds_procedimento' => '17-HIDROXICORTICOSTERÓIDES (17-OHS)',
                    'especialidade_id' => null
                ),
                1518 => array(
                    'id' => '1518',
                    'cd_consulta' => '40305090',
                    'ds_procedimento' => '17-HIDROXIPREGNENOLONA ',
                    'especialidade_id' => null
                ),
                1519 => array(
                    'id' => '1519',
                    'cd_consulta' => '40316025',
                    'ds_procedimento' => '3 ALFA ANDROSTONEDIOL GLUCORONÍDEO (3ALFDADIOL)        ',
                    'especialidade_id' => null
                ),
                1520 => array(
                    'id' => '1520',
                    'cd_consulta' => '40305112',
                    'ds_procedimento' => 'ÁCIDO 5 HIDRÓXI INDOL ACÉTICO, DOSAGEM NA URINA        ',
                    'especialidade_id' => null
                ),
                1521 => array(
                    'id' => '1521',
                    'cd_consulta' => '40305120',
                    'ds_procedimento' => 'ÁCIDO HOMO VANÍLICO',
                    'especialidade_id' => null
                ),
                1522 => array(
                    'id' => '1522',
                    'cd_consulta' => '40316033',
                    'ds_procedimento' => 'ÁCIDO VANILMANDÉLICO (VMA)         ',
                    'especialidade_id' => null
                ),
                1523 => array(
                    'id' => '1523',
                    'cd_consulta' => '40316041',
                    'ds_procedimento' => 'ADRENOCORTICOTRÓFICO, HORMÔNIO (ACTH)      ',
                    'especialidade_id' => null
                ),
                1524 => array(
                    'id' => '1524',
                    'cd_consulta' => '40316050',
                    'ds_procedimento' => 'ALDOSTERONA        ',
                    'especialidade_id' => null
                ),
                1525 => array(
                    'id' => '1525',
                    'cd_consulta' => '40316068',
                    'ds_procedimento' => 'ALFA-FETOPROTEÍNA  ',
                    'especialidade_id' => null
                ),
                1526 => array(
                    'id' => '1526',
                    'cd_consulta' => '40305163',
                    'ds_procedimento' => 'AMP CÍCLICO        ',
                    'especialidade_id' => null
                ),
                1527 => array(
                    'id' => '1527',
                    'cd_consulta' => '40316076',
                    'ds_procedimento' => 'ANDROSTENEDIONA    ',
                    'especialidade_id' => null
                ),
                1528 => array(
                    'id' => '1528',
                    'cd_consulta' => '40316084',
                    'ds_procedimento' => 'ANTICORPO ANTI-RECEPTOR DE TSH (TRAB)      ',
                    'especialidade_id' => null
                ),
                1529 => array(
                    'id' => '1529',
                    'cd_consulta' => '40316092',
                    'ds_procedimento' => 'ANTICORPOS ANTIINSULINA',
                    'especialidade_id' => null
                ),
                1530 => array(
                    'id' => '1530',
                    'cd_consulta' => '40316106',
                    'ds_procedimento' => 'ANTICORPOS ANTITIREÓIDE (TIREOGLOBULINA)   ',
                    'especialidade_id' => null
                ),
                1531 => array(
                    'id' => '1531',
                    'cd_consulta' => '40316114',
                    'ds_procedimento' => 'ANTÍGENO AUSTRÁLIA (HBSAG)         ',
                    'especialidade_id' => null
                ),
                1532 => array(
                    'id' => '1532',
                    'cd_consulta' => '40316122',
                    'ds_procedimento' => 'ANTÍGENO CARCINOEMBRIOGÊNICO (CEA) ',
                    'especialidade_id' => null
                ),
                1533 => array(
                    'id' => '1533',
                    'cd_consulta' => '40316130',
                    'ds_procedimento' => 'ANTÍGENO ESPECÍFICO PROSTÁTICO LIVRE (PSA LIVRE)       ',
                    'especialidade_id' => null
                ),
                1534 => array(
                    'id' => '1534',
                    'cd_consulta' => '40316149',
                    'ds_procedimento' => 'ANTÍGENO ESPECÍFICO PROSTÁTICO TOTAL (PSA) ',
                    'especialidade_id' => null
                ),
                1535 => array(
                    'id' => '1535',
                    'cd_consulta' => '40316157',
                    'ds_procedimento' => 'ANTI-TPO           ',
                    'especialidade_id' => null
                ),
                1536 => array(
                    'id' => '1536',
                    'cd_consulta' => '40316165',
                    'ds_procedimento' => 'CALCITONINA        ',
                    'especialidade_id' => null
                ),
                1537 => array(
                    'id' => '1537',
                    'cd_consulta' => '40316173',
                    'ds_procedimento' => 'CATECOLAMINAS      ',
                    'especialidade_id' => null
                ),
                1538 => array(
                    'id' => '1538',
                    'cd_consulta' => '40316181',
                    'ds_procedimento' => 'COMPOSTO S (11 - DESOXICORTISOL)   ',
                    'especialidade_id' => null
                ),
                1539 => array(
                    'id' => '1539',
                    'cd_consulta' => '40316190',
                    'ds_procedimento' => 'CORTISOL           ',
                    'especialidade_id' => null
                ),
                1540 => array(
                    'id' => '1540',
                    'cd_consulta' => '40305210',
                    'ds_procedimento' => 'CORTISOL LIVRE     ',
                    'especialidade_id' => null
                ),
                1541 => array(
                    'id' => '1541',
                    'cd_consulta' => '40316203',
                    'ds_procedimento' => 'CRESCIMENTO, HORMÔNIO DO (HGH)     ',
                    'especialidade_id' => null
                ),
                1542 => array(
                    'id' => '1542',
                    'cd_consulta' => '40305228',
                    'ds_procedimento' => 'CURVA GLICÊMICA (6 DOSAGENS)       ',
                    'especialidade_id' => null
                ),
                1543 => array(
                    'id' => '1543',
                    'cd_consulta' => '40305236',
                    'ds_procedimento' => 'CURVA INSULÍNICA (6 DOSAGENS)      ',
                    'especialidade_id' => null
                ),
                1544 => array(
                    'id' => '1544',
                    'cd_consulta' => '40316211',
                    'ds_procedimento' => 'DEHIDROEPIANDROSTERONA (DHEA)      ',
                    'especialidade_id' => null
                ),
                1545 => array(
                    'id' => '1545',
                    'cd_consulta' => '40316220',
                    'ds_procedimento' => 'DEHIDROTESTOSTERONA (DHT)          ',
                    'especialidade_id' => null
                ),
                1546 => array(
                    'id' => '1546',
                    'cd_consulta' => '40305279',
                    'ds_procedimento' => 'DOSAGEM DE RECEPTOR DE PROGESTERONA OU DE ESTROGÊNIO   ',
                    'especialidade_id' => null
                ),
                1547 => array(
                    'id' => '1547',
                    'cd_consulta' => '40316238',
                    'ds_procedimento' => 'DROGAS (IMUNOSSUPRESSORA, ANTICONVULSIVANTE, DIGITÁLICO, ETC.) CADA',
                    'especialidade_id' => null
                ),
                1548 => array(
                    'id' => '1548',
                    'cd_consulta' => '40305287',
                    'ds_procedimento' => 'ENZIMA CONVERSORA DA ANGIOTENSINA (ECA)    ',
                    'especialidade_id' => null
                ),
                1549 => array(
                    'id' => '1549',
                    'cd_consulta' => '40305295',
                    'ds_procedimento' => 'ERITROPOIETINA     ',
                    'especialidade_id' => null
                ),
                1550 => array(
                    'id' => '1550',
                    'cd_consulta' => '40316246',
                    'ds_procedimento' => 'ESTRADIOL          ',
                    'especialidade_id' => null
                ),
                1551 => array(
                    'id' => '1551',
                    'cd_consulta' => '40316254',
                    'ds_procedimento' => 'ESTRIOL',
                    'especialidade_id' => null
                ),
                1552 => array(
                    'id' => '1552',
                    'cd_consulta' => '40305597',
                    'ds_procedimento' => 'ESTROGÊNIOS TOTAIS (FENOLESTERÓIDES)       ',
                    'especialidade_id' => null
                ),
                1553 => array(
                    'id' => '1553',
                    'cd_consulta' => '40316262',
                    'ds_procedimento' => 'ESTRONA',
                    'especialidade_id' => null
                ),
                1554 => array(
                    'id' => '1554',
                    'cd_consulta' => '40316270',
                    'ds_procedimento' => 'FERRITINA          ',
                    'especialidade_id' => null
                ),
                1555 => array(
                    'id' => '1555',
                    'cd_consulta' => '40316289',
                    'ds_procedimento' => 'FOLÍCULO ESTIMULANTE, HORMÔNIO (FSH)       ',
                    'especialidade_id' => null
                ),
                1556 => array(
                    'id' => '1556',
                    'cd_consulta' => '40305341',
                    'ds_procedimento' => 'GAD-AB-ANTIDESCARBOXILASE DO ÁCIDO ',
                    'especialidade_id' => null
                ),
                1557 => array(
                    'id' => '1557',
                    'cd_consulta' => '40316297',
                    'ds_procedimento' => 'GASTRINA           ',
                    'especialidade_id' => null
                ),
                1558 => array(
                    'id' => '1558',
                    'cd_consulta' => '40316300',
                    'ds_procedimento' => 'GLOBULINA DE LIGAÇÃO DE HORMÔNIOS SEXUAIS (SHBG)       ',
                    'especialidade_id' => null
                ),
                1559 => array(
                    'id' => '1559',
                    'cd_consulta' => '40316319',
                    'ds_procedimento' => 'GLOBULINA TRANSPORTADORA DA TIROXINA (TBG) ',
                    'especialidade_id' => null
                ),
                1560 => array(
                    'id' => '1560',
                    'cd_consulta' => '40305368',
                    'ds_procedimento' => 'GLUCAGON, DOSAGEM  ',
                    'especialidade_id' => null
                ),
                1561 => array(
                    'id' => '1561',
                    'cd_consulta' => '40316327',
                    'ds_procedimento' => 'GONADOTRÓFICO CORIÔNICO, HORMÔNIO (HCG)    ',
                    'especialidade_id' => null
                ),
                1562 => array(
                    'id' => '1562',
                    'cd_consulta' => '40305384',
                    'ds_procedimento' => 'HORMÔNIO ANTIDIURÉTICO (VASOPRESSINA)      ',
                    'especialidade_id' => null
                ),
                1563 => array(
                    'id' => '1563',
                    'cd_consulta' => '40305759',
                    'ds_procedimento' => 'HORMÔNIO GONODOTROFICO CORIONICO QUALITATIVO (HCG-BETA-HCG)        ',
                    'especialidade_id' => null
                ),
                1564 => array(
                    'id' => '1564',
                    'cd_consulta' => '40305767',
                    'ds_procedimento' => 'HORMÔNIO GONODOTROFICO CORIONICO QUANTITATIVO (HCG-BETA-HCG)       ',
                    'especialidade_id' => null
                ),
                1565 => array(
                    'id' => '1565',
                    'cd_consulta' => '40316335',
                    'ds_procedimento' => 'HORMÔNIO LUTEINIZANTE (LH)         ',
                    'especialidade_id' => null
                ),
                1566 => array(
                    'id' => '1566',
                    'cd_consulta' => '40305406',
                    'ds_procedimento' => 'IGF BP3 (PROTEÍNA LIGADORA DOS FATORES DE CRESCIMENTO "INSULIN-LIKE")  ',
                    'especialidade_id' => null
                ),
                1567 => array(
                    'id' => '1567',
                    'cd_consulta' => '40316343',
                    'ds_procedimento' => 'IMUNOGLOBULINA (IGE)   ',
                    'especialidade_id' => null
                ),
                1568 => array(
                    'id' => '1568',
                    'cd_consulta' => '40316351',
                    'ds_procedimento' => 'ÍNDICE DE TIROXINA LIVRE (ITL)     ',
                    'especialidade_id' => null
                ),
                1569 => array(
                    'id' => '1569',
                    'cd_consulta' => '40316360',
                    'ds_procedimento' => 'INSULINA           ',
                    'especialidade_id' => null
                ),
                1570 => array(
                    'id' => '1570',
                    'cd_consulta' => '40305600',
                    'ds_procedimento' => 'IODO PROTÉICO (PBI)',
                    'especialidade_id' => null
                ),
                1571 => array(
                    'id' => '1571',
                    'cd_consulta' => '40305619',
                    'ds_procedimento' => 'LACTOGÊNICO PLACENTÁRIO HORMÔNIO   ',
                    'especialidade_id' => null
                ),
                1572 => array(
                    'id' => '1572',
                    'cd_consulta' => '40305422',
                    'ds_procedimento' => 'LEPTINA',
                    'especialidade_id' => null
                ),
                1573 => array(
                    'id' => '1573',
                    'cd_consulta' => '40305775',
                    'ds_procedimento' => 'MACROPROLACTINA    ',
                    'especialidade_id' => null
                ),
                1574 => array(
                    'id' => '1574',
                    'cd_consulta' => '40316378',
                    'ds_procedimento' => 'MARCADORES TUMORAIS (CA 19.9, CA 125, CA 72-4, CA 15-3, ETC.) CADA ',
                    'especialidade_id' => null
                ),
                1575 => array(
                    'id' => '1575',
                    'cd_consulta' => '40305449',
                    'ds_procedimento' => 'N-TELOPEPTÍDEO     ',
                    'especialidade_id' => null
                ),
                1576 => array(
                    'id' => '1576',
                    'cd_consulta' => '40316386',
                    'ds_procedimento' => 'OSTEOCALCINA       ',
                    'especialidade_id' => null
                ),
                1577 => array(
                    'id' => '1577',
                    'cd_consulta' => '40305465',
                    'ds_procedimento' => 'PARATORMÔNIO - PTH OU FRAÇÃO (CADA)',
                    'especialidade_id' => null
                ),
                1578 => array(
                    'id' => '1578',
                    'cd_consulta' => '40316394',
                    'ds_procedimento' => 'PEPTÍDEO C         ',
                    'especialidade_id' => null
                ),
                1579 => array(
                    'id' => '1579',
                    'cd_consulta' => '40305490',
                    'ds_procedimento' => 'PIRIDINOLINA       ',
                    'especialidade_id' => null
                ),
                1580 => array(
                    'id' => '1580',
                    'cd_consulta' => '40305503',
                    'ds_procedimento' => 'PREGNANDIOL        ',
                    'especialidade_id' => null
                ),
                1581 => array(
                    'id' => '1581',
                    'cd_consulta' => '40305511',
                    'ds_procedimento' => 'PREGNANTRIOL       ',
                    'especialidade_id' => null
                ),
                1582 => array(
                    'id' => '1582',
                    'cd_consulta' => '40316408',
                    'ds_procedimento' => 'PROGESTERONA       ',
                    'especialidade_id' => null
                ),
                1583 => array(
                    'id' => '1583',
                    'cd_consulta' => '40316416',
                    'ds_procedimento' => 'PROLACTINA         ',
                    'especialidade_id' => null
                ),
                1584 => array(
                    'id' => '1584',
                    'cd_consulta' => '40305546',
                    'ds_procedimento' => 'PROVA DO LH-RH, DOSAGEM DO FSH SEM FORNECIMENTO DE MEDICAMENTO (CADA)  ',
                    'especialidade_id' => null
                ),
                1585 => array(
                    'id' => '1585',
                    'cd_consulta' => '40305554',
                    'ds_procedimento' => 'PROVA DO LH-RH, DOSAGEM DO LH SEM FORNECIMENTO DE MEDICAMENTO (CADA)   ',
                    'especialidade_id' => null
                ),
                1586 => array(
                    'id' => '1586',
                    'cd_consulta' => '40305562',
                    'ds_procedimento' => 'PROVA DO TRH-HPR, DOSAGEM DO HPR SEM FORNECIMENTO DO MATERIAL (CADA)   ',
                    'especialidade_id' => null
                ),
                1587 => array(
                    'id' => '1587',
                    'cd_consulta' => '40305570',
                    'ds_procedimento' => 'PROVA DO TRH-TSH, DOSAGEM DO TSH SEM FORNECIMENTO DO MATERIAL (CADA)   ',
                    'especialidade_id' => null
                ),
                1588 => array(
                    'id' => '1588',
                    'cd_consulta' => '40305589',
                    'ds_procedimento' => 'PROVA PARA DIABETE INSÍPIDO (RESTRIÇÃO HÍDRICA NACL 3% VASOPRESSINA)   ',
                    'especialidade_id' => null
                ),
                1589 => array(
                    'id' => '1589',
                    'cd_consulta' => '40305627',
                    'ds_procedimento' => 'PROVAS DE FUNÇÃO TIREOIDEANA (T3, T4, ÍNDICES E TSH)   ',
                    'especialidade_id' => null
                ),
                1590 => array(
                    'id' => '1590',
                    'cd_consulta' => '40316424',
                    'ds_procedimento' => 'PTH    ',
                    'especialidade_id' => null
                ),
                1591 => array(
                    'id' => '1591',
                    'cd_consulta' => '40316432',
                    'ds_procedimento' => 'RENINA ',
                    'especialidade_id' => null
                ),
                1592 => array(
                    'id' => '1592',
                    'cd_consulta' => '40316440',
                    'ds_procedimento' => 'SOMATOMEDINA C (IGF1)  ',
                    'especialidade_id' => null
                ),
                1593 => array(
                    'id' => '1593',
                    'cd_consulta' => '40305635',
                    'ds_procedimento' => 'SOMATOTRÓFICO CORIÔNICO (HCS OU PHL)       ',
                    'especialidade_id' => null
                ),
                1594 => array(
                    'id' => '1594',
                    'cd_consulta' => '40316459',
                    'ds_procedimento' => 'SULFATO DE DEHIDROEPIANDROSTERONA (S-DHEA) ',
                    'especialidade_id' => null
                ),
                1595 => array(
                    'id' => '1595',
                    'cd_consulta' => '40316467',
                    'ds_procedimento' => 'T3 LIVRE           ',
                    'especialidade_id' => null
                ),
                1596 => array(
                    'id' => '1596',
                    'cd_consulta' => '40316475',
                    'ds_procedimento' => 'T3 RETENÇÃO        ',
                    'especialidade_id' => null
                ),
                1597 => array(
                    'id' => '1597',
                    'cd_consulta' => '40316483',
                    'ds_procedimento' => 'T3 REVERSO         ',
                    'especialidade_id' => null
                ),
                1598 => array(
                    'id' => '1598',
                    'cd_consulta' => '40316491',
                    'ds_procedimento' => 'T4 LIVRE           ',
                    'especialidade_id' => null
                ),
                1599 => array(
                    'id' => '1599',
                    'cd_consulta' => '40316505',
                    'ds_procedimento' => 'TESTOSTERONA LIVRE ',
                    'especialidade_id' => null
                ),
                1600 => array(
                    'id' => '1600',
                    'cd_consulta' => '40316513',
                    'ds_procedimento' => 'TESTOSTERONA TOTAL ',
                    'especialidade_id' => null
                ),
                1601 => array(
                    'id' => '1601',
                    'cd_consulta' => '40316521',
                    'ds_procedimento' => 'TIREOESTIMULANTE, HORMÔNIO (TSH)   ',
                    'especialidade_id' => null
                ),
                1602 => array(
                    'id' => '1602',
                    'cd_consulta' => '40316530',
                    'ds_procedimento' => 'TIREOGLOBULINA     ',
                    'especialidade_id' => null
                ),
                1603 => array(
                    'id' => '1603',
                    'cd_consulta' => '40316548',
                    'ds_procedimento' => 'TIROXINA (T4)      ',
                    'especialidade_id' => null
                ),
                1604 => array(
                    'id' => '1604',
                    'cd_consulta' => '40316556',
                    'ds_procedimento' => 'TRIIODOTIRONINA (T3)   ',
                    'especialidade_id' => null
                ),
                1605 => array(
                    'id' => '1605',
                    'cd_consulta' => '40316564',
                    'ds_procedimento' => 'VASOPRESSINA (ADH) ',
                    'especialidade_id' => null
                ),
                1606 => array(
                    'id' => '1606',
                    'cd_consulta' => '40316572',
                    'ds_procedimento' => 'VITAMINA B12       ',
                    'especialidade_id' => null
                ),
                1607 => array(
                    'id' => '1607',
                    'cd_consulta' => '40306011',
                    'ds_procedimento' => 'ADENOVÍRUS, IGG    ',
                    'especialidade_id' => null
                ),
                1608 => array(
                    'id' => '1608',
                    'cd_consulta' => '40306020',
                    'ds_procedimento' => 'ADENOVÍRUS, IGM    ',
                    'especialidade_id' => null
                ),
                1609 => array(
                    'id' => '1609',
                    'cd_consulta' => '40307905',
                    'ds_procedimento' => 'ALÉRGENOS - PERFIL ANTIGÊNICO (PAINEL C/36 ANTÍGENOS)  ',
                    'especialidade_id' => null
                ),
                1610 => array(
                    'id' => '1610',
                    'cd_consulta' => '40308308',
                    'ds_procedimento' => 'AMEBÍASE, IGG      ',
                    'especialidade_id' => null
                ),
                1611 => array(
                    'id' => '1611',
                    'cd_consulta' => '40308316',
                    'ds_procedimento' => 'AMEBÍASE, IGM      ',
                    'especialidade_id' => null
                ),
                1612 => array(
                    'id' => '1612',
                    'cd_consulta' => '40306054',
                    'ds_procedimento' => 'ANTI-ACTINA        ',
                    'especialidade_id' => null
                ),
                1613 => array(
                    'id' => '1613',
                    'cd_consulta' => '40306046',
                    'ds_procedimento' => 'ANTICANDIDA - IGG E IGM (CADA)     ',
                    'especialidade_id' => null
                ),
                1614 => array(
                    'id' => '1614',
                    'cd_consulta' => '40306135',
                    'ds_procedimento' => 'ANTICARDIOLIPINA - IGA ',
                    'especialidade_id' => null
                ),
                1615 => array(
                    'id' => '1615',
                    'cd_consulta' => '40306143',
                    'ds_procedimento' => 'ANTICARDIOLIPINA - IGG ',
                    'especialidade_id' => null
                ),
                1616 => array(
                    'id' => '1616',
                    'cd_consulta' => '40306151',
                    'ds_procedimento' => 'ANTICARDIOLIPINA - IGM ',
                    'especialidade_id' => null
                ),
                1617 => array(
                    'id' => '1617',
                    'cd_consulta' => '40306160',
                    'ds_procedimento' => 'ANTICENTRÔMERO     ',
                    'especialidade_id' => null
                ),
                1618 => array(
                    'id' => '1618',
                    'cd_consulta' => '40308219',
                    'ds_procedimento' => 'ANTICORPO ANTI SACCHARAMYCES - ASCA',
                    'especialidade_id' => null
                ),
                1619 => array(
                    'id' => '1619',
                    'cd_consulta' => '40306178',
                    'ds_procedimento' => 'ANTICORPO ANTI-DNASE B ',
                    'especialidade_id' => null
                ),
                1620 => array(
                    'id' => '1620',
                    'cd_consulta' => '40306186',
                    'ds_procedimento' => 'ANTICORPO ANTI-HORMÔNIO DO CRESCIMENTO     ',
                    'especialidade_id' => null
                ),
                1621 => array(
                    'id' => '1621',
                    'cd_consulta' => '40306194',
                    'ds_procedimento' => 'ANTICORPO ANTIVÍRUS DA HEPATITE E (TOTAL)  ',
                    'especialidade_id' => null
                ),
                1622 => array(
                    'id' => '1622',
                    'cd_consulta' => '40306259',
                    'ds_procedimento' => 'ANTICORPOS ANTIENDOMISIO - IGG, IGM, IGA (CADA)        ',
                    'especialidade_id' => null
                ),
                1623 => array(
                    'id' => '1623',
                    'cd_consulta' => '40306208',
                    'ds_procedimento' => 'ANTICORPOS ANTI-ILHOTA DE LANGHERANS       ',
                    'especialidade_id' => null
                ),
                1624 => array(
                    'id' => '1624',
                    'cd_consulta' => '40306216',
                    'ds_procedimento' => 'ANTICORPOS ANTI-INFLUENZA A, IGG   ',
                    'especialidade_id' => null
                ),
                1625 => array(
                    'id' => '1625',
                    'cd_consulta' => '40306224',
                    'ds_procedimento' => 'ANTICORPOS ANTI-INFLUENZA A, IGM   ',
                    'especialidade_id' => null
                ),
                1626 => array(
                    'id' => '1626',
                    'cd_consulta' => '40306232',
                    'ds_procedimento' => 'ANTICORPOS ANTI-INFLUENZA B, IGG   ',
                    'especialidade_id' => null
                ),
                1627 => array(
                    'id' => '1627',
                    'cd_consulta' => '40306240',
                    'ds_procedimento' => 'ANTICORPOS ANTI-INFLUENZA B, IGM   ',
                    'especialidade_id' => null
                ),
                1628 => array(
                    'id' => '1628',
                    'cd_consulta' => '40306267',
                    'ds_procedimento' => 'ANTICORPOS NATURAIS - ISOAGLUTININAS, PESQUISAS        ',
                    'especialidade_id' => null
                ),
                1629 => array(
                    'id' => '1629',
                    'cd_consulta' => '40306275',
                    'ds_procedimento' => 'ANTICORPOS NATURAIS - ISOAGLUTININAS, TITULAGEM        ',
                    'especialidade_id' => null
                ),
                1630 => array(
                    'id' => '1630',
                    'cd_consulta' => '40306283',
                    'ds_procedimento' => 'ANTICORTEX SUPRA-RENAL ',
                    'especialidade_id' => null
                ),
                1631 => array(
                    'id' => '1631',
                    'cd_consulta' => '40307930',
                    'ds_procedimento' => 'ANTIDESOXIRIBONUCLEASE B, NEUTRALIZAÇÃO QUANTITATIVA   ',
                    'especialidade_id' => null
                ),
                1632 => array(
                    'id' => '1632',
                    'cd_consulta' => '40307913',
                    'ds_procedimento' => 'ANTI-DMP           ',
                    'especialidade_id' => null
                ),
                1633 => array(
                    'id' => '1633',
                    'cd_consulta' => '40306062',
                    'ds_procedimento' => 'ANTI-DNA           ',
                    'especialidade_id' => null
                ),
                1634 => array(
                    'id' => '1634',
                    'cd_consulta' => '40306291',
                    'ds_procedimento' => 'ANTIESCLERODERMA (SCL 70)          ',
                    'especialidade_id' => null
                ),
                1635 => array(
                    'id' => '1635',
                    'cd_consulta' => '40307948',
                    'ds_procedimento' => 'ANTIFÍGADO (GLOMÉRULO, TUB. RENAL CORTE RIM DE RATO), IFI          ',
                    'especialidade_id' => null
                ),
                1636 => array(
                    'id' => '1636',
                    'cd_consulta' => '40307956',
                    'ds_procedimento' => 'ANTÍGENOS METÍLICOS SOLÚVEIS DO BCG (1 APLICAÇÃO)      ',
                    'especialidade_id' => null
                ),
                1637 => array(
                    'id' => '1637',
                    'cd_consulta' => '40306305',
                    'ds_procedimento' => 'ANTIGLIADINA (GLÚTEN) - IGA        ',
                    'especialidade_id' => null
                ),
                1638 => array(
                    'id' => '1638',
                    'cd_consulta' => '40306313',
                    'ds_procedimento' => 'ANTIGLIADINA (GLÚTEN) - IGG        ',
                    'especialidade_id' => null
                ),
                1639 => array(
                    'id' => '1639',
                    'cd_consulta' => '40306321',
                    'ds_procedimento' => 'ANTIGLIADINA (GLÚTEN) - IGM        ',
                    'especialidade_id' => null
                ),
                1640 => array(
                    'id' => '1640',
                    'cd_consulta' => '40307921',
                    'ds_procedimento' => 'ANTI-HIALURONIDASE, DETERMINAÇÃO DA',
                    'especialidade_id' => null
                ),
                1641 => array(
                    'id' => '1641',
                    'cd_consulta' => '40306070',
                    'ds_procedimento' => 'ANTI-JO1           ',
                    'especialidade_id' => null
                ),
                1642 => array(
                    'id' => '1642',
                    'cd_consulta' => '40306089',
                    'ds_procedimento' => 'ANTI-LA/SSB        ',
                    'especialidade_id' => null
                ),
                1643 => array(
                    'id' => '1643',
                    'cd_consulta' => '40306097',
                    'ds_procedimento' => 'ANTI-LKM-1         ',
                    'especialidade_id' => null
                ),
                1644 => array(
                    'id' => '1644',
                    'cd_consulta' => '40306330',
                    'ds_procedimento' => 'ANTIMEMBRANA BASAL ',
                    'especialidade_id' => null
                ),
                1645 => array(
                    'id' => '1645',
                    'cd_consulta' => '40306348',
                    'ds_procedimento' => 'ANTIMICROSSOMAL    ',
                    'especialidade_id' => null
                ),
                1646 => array(
                    'id' => '1646',
                    'cd_consulta' => '40306356',
                    'ds_procedimento' => 'ANTIMITOCONDRIA    ',
                    'especialidade_id' => null
                ),
                1647 => array(
                    'id' => '1647',
                    'cd_consulta' => '40306364',
                    'ds_procedimento' => 'ANTIMITOCONDRIA, M2',
                    'especialidade_id' => null
                ),
                1648 => array(
                    'id' => '1648',
                    'cd_consulta' => '40306372',
                    'ds_procedimento' => 'ANTIMÚSCULO CARDÍACO   ',
                    'especialidade_id' => null
                ),
                1649 => array(
                    'id' => '1649',
                    'cd_consulta' => '40306380',
                    'ds_procedimento' => 'ANTIMÚSCULO ESTRIADO   ',
                    'especialidade_id' => null
                ),
                1650 => array(
                    'id' => '1650',
                    'cd_consulta' => '40306399',
                    'ds_procedimento' => 'ANTIMÚSCULO LISO   ',
                    'especialidade_id' => null
                ),
                1651 => array(
                    'id' => '1651',
                    'cd_consulta' => '40306402',
                    'ds_procedimento' => 'ANTINEUTRÓFILOS (ANCA) C           ',
                    'especialidade_id' => null
                ),
                1652 => array(
                    'id' => '1652',
                    'cd_consulta' => '40306410',
                    'ds_procedimento' => 'ANTINEUTRÓFILOS (ANCA) P           ',
                    'especialidade_id' => null
                ),
                1653 => array(
                    'id' => '1653',
                    'cd_consulta' => '40306429',
                    'ds_procedimento' => 'ANTIPARIETAL       ',
                    'especialidade_id' => null
                ),
                1654 => array(
                    'id' => '1654',
                    'cd_consulta' => '40306437',
                    'ds_procedimento' => 'ANTIPEROXIDASE TIREOIDEANA         ',
                    'especialidade_id' => null
                ),
                1655 => array(
                    'id' => '1655',
                    'cd_consulta' => '40306100',
                    'ds_procedimento' => 'ANTI-RNP           ',
                    'especialidade_id' => null
                ),
                1656 => array(
                    'id' => '1656',
                    'cd_consulta' => '40306119',
                    'ds_procedimento' => 'ANTI-RO/SSA        ',
                    'especialidade_id' => null
                ),
                1657 => array(
                    'id' => '1657',
                    'cd_consulta' => '40306127',
                    'ds_procedimento' => 'ANTI-SM',
                    'especialidade_id' => null
                ),
                1658 => array(
                    'id' => '1658',
                    'cd_consulta' => '40306445',
                    'ds_procedimento' => 'ASLO   ',
                    'especialidade_id' => null
                ),
                1659 => array(
                    'id' => '1659',
                    'cd_consulta' => '40308405',
                    'ds_procedimento' => 'ASLO, QUANTITATIVO ',
                    'especialidade_id' => null
                ),
                1660 => array(
                    'id' => '1660',
                    'cd_consulta' => '40306453',
                    'ds_procedimento' => 'ASPERGILUS, REAÇÃO SOROLÓGICA      ',
                    'especialidade_id' => null
                ),
                1661 => array(
                    'id' => '1661',
                    'cd_consulta' => '40306461',
                    'ds_procedimento' => 'AVIDEZ DE IGG PARA TOXOPLASMOSE, CITOMEGALIA, RUBÉLOA, EB E OUTROS, CADA           ',
                    'especialidade_id' => null
                ),
                1662 => array(
                    'id' => '1662',
                    'cd_consulta' => '40306470',
                    'ds_procedimento' => 'BETA-2-MICROGLOBULINA  ',
                    'especialidade_id' => null
                ),
                1663 => array(
                    'id' => '1663',
                    'cd_consulta' => '40306488',
                    'ds_procedimento' => 'BIOTINIDASE ATIVIDADE DA, QUALITATIVO      ',
                    'especialidade_id' => null
                ),
                1664 => array(
                    'id' => '1664',
                    'cd_consulta' => '40306496',
                    'ds_procedimento' => 'BLASTOMICOSE, REAÇÃO SOROLÓGICA    ',
                    'especialidade_id' => null
                ),
                1665 => array(
                    'id' => '1665',
                    'cd_consulta' => '40306500',
                    'ds_procedimento' => 'BRUCELA - IGG      ',
                    'especialidade_id' => null
                ),
                1666 => array(
                    'id' => '1666',
                    'cd_consulta' => '40306518',
                    'ds_procedimento' => 'BRUCELA - IGM      ',
                    'especialidade_id' => null
                ),
                1667 => array(
                    'id' => '1667',
                    'cd_consulta' => '40306526',
                    'ds_procedimento' => 'BRUCELA, PROVA RÁPIDA  ',
                    'especialidade_id' => null
                ),
                1668 => array(
                    'id' => '1668',
                    'cd_consulta' => '40306534',
                    'ds_procedimento' => 'C1Q    ',
                    'especialidade_id' => null
                ),
                1669 => array(
                    'id' => '1669',
                    'cd_consulta' => '40306542',
                    'ds_procedimento' => 'C3 PROATIVADOR     ',
                    'especialidade_id' => null
                ),
                1670 => array(
                    'id' => '1670',
                    'cd_consulta' => '40306550',
                    'ds_procedimento' => 'C3A (FATOR B)      ',
                    'especialidade_id' => null
                ),
                1671 => array(
                    'id' => '1671',
                    'cd_consulta' => '40306569',
                    'ds_procedimento' => 'CA 50  ',
                    'especialidade_id' => null
                ),
                1672 => array(
                    'id' => '1672',
                    'cd_consulta' => '40306577',
                    'ds_procedimento' => 'CA-242 ',
                    'especialidade_id' => null
                ),
                1673 => array(
                    'id' => '1673',
                    'cd_consulta' => '40306585',
                    'ds_procedimento' => 'CA-27-29           ',
                    'especialidade_id' => null
                ),
                1674 => array(
                    'id' => '1674',
                    'cd_consulta' => '40306593',
                    'ds_procedimento' => 'CAXUMBA, IGG       ',
                    'especialidade_id' => null
                ),
                1675 => array(
                    'id' => '1675',
                    'cd_consulta' => '40306607',
                    'ds_procedimento' => 'CAXUMBA, IGM       ',
                    'especialidade_id' => null
                ),
                1676 => array(
                    'id' => '1676',
                    'cd_consulta' => '40306615',
                    'ds_procedimento' => 'CHAGAS IGG         ',
                    'especialidade_id' => null
                ),
                1677 => array(
                    'id' => '1677',
                    'cd_consulta' => '40306623',
                    'ds_procedimento' => 'CHAGAS IGM         ',
                    'especialidade_id' => null
                ),
                1678 => array(
                    'id' => '1678',
                    'cd_consulta' => '40306631',
                    'ds_procedimento' => 'CHLAMYDIA - IGG    ',
                    'especialidade_id' => null
                ),
                1679 => array(
                    'id' => '1679',
                    'cd_consulta' => '40306640',
                    'ds_procedimento' => 'CHLAMYDIA - IGM    ',
                    'especialidade_id' => null
                ),
                1680 => array(
                    'id' => '1680',
                    'cd_consulta' => '40306658',
                    'ds_procedimento' => 'CISTICERCOSE, AC   ',
                    'especialidade_id' => null
                ),
                1681 => array(
                    'id' => '1681',
                    'cd_consulta' => '40306666',
                    'ds_procedimento' => 'CITOMEGALOVÍRUS IGG',
                    'especialidade_id' => null
                ),
                1682 => array(
                    'id' => '1682',
                    'cd_consulta' => '40306674',
                    'ds_procedimento' => 'CITOMEGALOVÍRUS IGM',
                    'especialidade_id' => null
                ),
                1683 => array(
                    'id' => '1683',
                    'cd_consulta' => '40306682',
                    'ds_procedimento' => 'CLOSTRIDIUM DIFFICILE, TOXINA A    ',
                    'especialidade_id' => null
                ),
                1684 => array(
                    'id' => '1684',
                    'cd_consulta' => '40306690',
                    'ds_procedimento' => 'COMPLEMENTO C2     ',
                    'especialidade_id' => null
                ),
                1685 => array(
                    'id' => '1685',
                    'cd_consulta' => '40306704',
                    'ds_procedimento' => 'COMPLEMENTO C3     ',
                    'especialidade_id' => null
                ),
                1686 => array(
                    'id' => '1686',
                    'cd_consulta' => '40307999',
                    'ds_procedimento' => 'COMPLEMENTO C3, C4 - TURBID. OU NEFOLOMÉTRICO C3A      ',
                    'especialidade_id' => null
                ),
                1687 => array(
                    'id' => '1687',
                    'cd_consulta' => '40306712',
                    'ds_procedimento' => 'COMPLEMENTO C4     ',
                    'especialidade_id' => null
                ),
                1688 => array(
                    'id' => '1688',
                    'cd_consulta' => '40306720',
                    'ds_procedimento' => 'COMPLEMENTO C5     ',
                    'especialidade_id' => null
                ),
                1689 => array(
                    'id' => '1689',
                    'cd_consulta' => '40306739',
                    'ds_procedimento' => 'COMPLEMENTO CH-100 ',
                    'especialidade_id' => null
                ),
                1690 => array(
                    'id' => '1690',
                    'cd_consulta' => '40306747',
                    'ds_procedimento' => 'COMPLEMENTO CH-50  ',
                    'especialidade_id' => null
                ),
                1691 => array(
                    'id' => '1691',
                    'cd_consulta' => '40306755',
                    'ds_procedimento' => 'CRIO-AGLUTININA, GLOBULINA, DOSAGEM, CADA  ',
                    'especialidade_id' => null
                ),
                1692 => array(
                    'id' => '1692',
                    'cd_consulta' => '40306763',
                    'ds_procedimento' => 'CRIO-AGLUTININA, GLOBULINA, PESQUISA, CADA ',
                    'especialidade_id' => null
                ),
                1693 => array(
                    'id' => '1693',
                    'cd_consulta' => '40308014',
                    'ds_procedimento' => 'CRIOGLOBULINAS, CARACTERIZAÇÃO - IMUNOELETROFORESE     ',
                    'especialidade_id' => null
                ),
                1694 => array(
                    'id' => '1694',
                    'cd_consulta' => '40306771',
                    'ds_procedimento' => 'CROSS MATCH (PROVA CRUZADA DE HISTOCOMPATIBILIDADE PARA TRANSPLANTE RENAL)         ',
                    'especialidade_id' => null
                ),
                1695 => array(
                    'id' => '1695',
                    'cd_consulta' => '40306780',
                    'ds_procedimento' => 'CULTURA OU ESTIMULAÇÃO DOS LINFÓCITOS "IN VITRO" POR CONCANAVALINA, PHA OU POKWEED ',
                    'especialidade_id' => null
                ),
                1696 => array(
                    'id' => '1696',
                    'cd_consulta' => '40306798',
                    'ds_procedimento' => 'DENGUE - IGG E IGM (CADA)          ',
                    'especialidade_id' => null
                ),
                1697 => array(
                    'id' => '1697',
                    'cd_consulta' => '40308022',
                    'ds_procedimento' => 'DNCB - TESTE DE CONTATO',
                    'especialidade_id' => null
                ),
                1698 => array(
                    'id' => '1698',
                    'cd_consulta' => '40306801',
                    'ds_procedimento' => 'ECHOVÍRUS (PAINEL) SOROLOGIA PARA  ',
                    'especialidade_id' => null
                ),
                1699 => array(
                    'id' => '1699',
                    'cd_consulta' => '40306810',
                    'ds_procedimento' => 'EQUINOCOCOSE (HIDATIDOSE), REAÇÃO SOROLÓGICA           ',
                    'especialidade_id' => null
                ),
                1700 => array(
                    'id' => '1700',
                    'cd_consulta' => '40306828',
                    'ds_procedimento' => 'EQUINOCOCOSE, IDR  ',
                    'especialidade_id' => null
                ),
                1701 => array(
                    'id' => '1701',
                    'cd_consulta' => '40306836',
                    'ds_procedimento' => 'ESPOROTRICOSE, REAÇÃO SOROLÓGICA   ',
                    'especialidade_id' => null
                ),
                1702 => array(
                    'id' => '1702',
                    'cd_consulta' => '40306844',
                    'ds_procedimento' => 'ESPOROTRIQUINA, IDR',
                    'especialidade_id' => null
                ),
                1703 => array(
                    'id' => '1703',
                    'cd_consulta' => '40306852',
                    'ds_procedimento' => 'FATOR ANTINÚCLEO, (FAN)',
                    'especialidade_id' => null
                ),
                1704 => array(
                    'id' => '1704',
                    'cd_consulta' => '40306860',
                    'ds_procedimento' => 'FATOR REUMATÓIDE, QUANTITATIVO     ',
                    'especialidade_id' => null
                ),
                1705 => array(
                    'id' => '1705',
                    'cd_consulta' => '40308030',
                    'ds_procedimento' => 'FATOR REUMATÓIDE, TESTE DO LÁTEX (QUALITATIVO)         ',
                    'especialidade_id' => null
                ),
                1706 => array(
                    'id' => '1706',
                    'cd_consulta' => '40306879',
                    'ds_procedimento' => 'FILARIA SOROLOGIA  ',
                    'especialidade_id' => null
                ),
                1707 => array(
                    'id' => '1707',
                    'cd_consulta' => '40308049',
                    'ds_procedimento' => 'FREI (LINFOGRANULOMA VENÉREO), IDER',
                    'especialidade_id' => null
                ),
                1708 => array(
                    'id' => '1708',
                    'cd_consulta' => '40306887',
                    'ds_procedimento' => 'GENOTIPAGEM DO SISTEMA HLA         ',
                    'especialidade_id' => null
                ),
                1709 => array(
                    'id' => '1709',
                    'cd_consulta' => '40306895',
                    'ds_procedimento' => 'GIARDIA, REAÇÃO SOROLÓGICA         ',
                    'especialidade_id' => null
                ),
                1710 => array(
                    'id' => '1710',
                    'cd_consulta' => '40308324',
                    'ds_procedimento' => 'GONOCOCO - IGG     ',
                    'especialidade_id' => null
                ),
                1711 => array(
                    'id' => '1711',
                    'cd_consulta' => '40308332',
                    'ds_procedimento' => 'GONOCOCO - IGM     ',
                    'especialidade_id' => null
                ),
                1712 => array(
                    'id' => '1712',
                    'cd_consulta' => '40306909',
                    'ds_procedimento' => 'HELICOBACTER PYLORI - IGA          ',
                    'especialidade_id' => null
                ),
                1713 => array(
                    'id' => '1713',
                    'cd_consulta' => '40306917',
                    'ds_procedimento' => 'HELICOBACTER PYLORI - IGG          ',
                    'especialidade_id' => null
                ),
                1714 => array(
                    'id' => '1714',
                    'cd_consulta' => '40306925',
                    'ds_procedimento' => 'HELICOBACTER PYLORI - IGM          ',
                    'especialidade_id' => null
                ),
                1715 => array(
                    'id' => '1715',
                    'cd_consulta' => '40306933',
                    'ds_procedimento' => 'HEPATITE A - HAV - IGG ',
                    'especialidade_id' => null
                ),
                1716 => array(
                    'id' => '1716',
                    'cd_consulta' => '40306941',
                    'ds_procedimento' => 'HEPATITE A - HAV - IGM ',
                    'especialidade_id' => null
                ),
                1717 => array(
                    'id' => '1717',
                    'cd_consulta' => '40306950',
                    'ds_procedimento' => 'HEPATITE B - HBCAC - IGG (ANTI-CORE IGG OU ACOREG)     ',
                    'especialidade_id' => null
                ),
                1718 => array(
                    'id' => '1718',
                    'cd_consulta' => '40306968',
                    'ds_procedimento' => 'HEPATITE B - HBCAC - IGM (ANTI-CORE IGM OU ACOREM)     ',
                    'especialidade_id' => null
                ),
                1719 => array(
                    'id' => '1719',
                    'cd_consulta' => '40306976',
                    'ds_procedimento' => 'HEPATITE B - HBEAC (ANTI HBE)      ',
                    'especialidade_id' => null
                ),
                1720 => array(
                    'id' => '1720',
                    'cd_consulta' => '40306984',
                    'ds_procedimento' => 'HEPATITE B - HBEAG (ANTÍGENO "E")  ',
                    'especialidade_id' => null
                ),
                1721 => array(
                    'id' => '1721',
                    'cd_consulta' => '40306992',
                    'ds_procedimento' => 'HEPATITE B - HBSAC (ANTI-ANTÍGENO DE SUPERFÍCIE)       ',
                    'especialidade_id' => null
                ),
                1722 => array(
                    'id' => '1722',
                    'cd_consulta' => '40307018',
                    'ds_procedimento' => 'HEPATITE B - HBSAG (AU, ANTÍGENO AUSTRÁLIA)',
                    'especialidade_id' => null
                ),
                1723 => array(
                    'id' => '1723',
                    'cd_consulta' => '40307026',
                    'ds_procedimento' => 'HEPATITE C - ANTI-HCV  ',
                    'especialidade_id' => null
                ),
                1724 => array(
                    'id' => '1724',
                    'cd_consulta' => '40307034',
                    'ds_procedimento' => 'HEPATITE C - ANTI-HCV - IGM        ',
                    'especialidade_id' => null
                ),
                1725 => array(
                    'id' => '1725',
                    'cd_consulta' => '40307042',
                    'ds_procedimento' => 'HEPATITE C - IMUNOBLOT ',
                    'especialidade_id' => null
                ),
                1726 => array(
                    'id' => '1726',
                    'cd_consulta' => '40307050',
                    'ds_procedimento' => 'HEPATITE DELTA, ANTICORPO IGG      ',
                    'especialidade_id' => null
                ),
                1727 => array(
                    'id' => '1727',
                    'cd_consulta' => '40307069',
                    'ds_procedimento' => 'HEPATITE DELTA, ANTICORPO IGM      ',
                    'especialidade_id' => null
                ),
                1728 => array(
                    'id' => '1728',
                    'cd_consulta' => '40307077',
                    'ds_procedimento' => 'HEPATITE DELTA, ANTÍGENO           ',
                    'especialidade_id' => null
                ),
                1729 => array(
                    'id' => '1729',
                    'cd_consulta' => '40308235',
                    'ds_procedimento' => 'HER-2 - DOSAGEM DO RECEPTOR        ',
                    'especialidade_id' => null
                ),
                1730 => array(
                    'id' => '1730',
                    'cd_consulta' => '40307085',
                    'ds_procedimento' => 'HERPES SIMPLES - IGG   ',
                    'especialidade_id' => null
                ),
                1731 => array(
                    'id' => '1731',
                    'cd_consulta' => '40307093',
                    'ds_procedimento' => 'HERPES SIMPLES - IGM   ',
                    'especialidade_id' => null
                ),
                1732 => array(
                    'id' => '1732',
                    'cd_consulta' => '40307107',
                    'ds_procedimento' => 'HERPES ZOSTER - IGG',
                    'especialidade_id' => null
                ),
                1733 => array(
                    'id' => '1733',
                    'cd_consulta' => '40307115',
                    'ds_procedimento' => 'HERPES ZOSTER - IGM',
                    'especialidade_id' => null
                ),
                1734 => array(
                    'id' => '1734',
                    'cd_consulta' => '40308081',
                    'ds_procedimento' => 'HIDATIDOSE (EQUINOCOCOSE) IDI DUPLA',
                    'especialidade_id' => null
                ),
                1735 => array(
                    'id' => '1735',
                    'cd_consulta' => '40307123',
                    'ds_procedimento' => 'HIPERSENSIBILIDADE RETARDADA (INTRADERMO REAÇÃO IDER ) CANDIDINA, CAXUMBA, ESTREPTOQUINASE-DORNASE, PPD, TRICOFITINA, VÍRUS VACINAL, OUTRO(S), CADA  ',
                    'especialidade_id' => null
                ),
                1736 => array(
                    'id' => '1736',
                    'cd_consulta' => '40307131',
                    'ds_procedimento' => 'HISTAMINA, DOSAGEM ',
                    'especialidade_id' => null
                ),
                1737 => array(
                    'id' => '1737',
                    'cd_consulta' => '40307140',
                    'ds_procedimento' => 'HISTONA',
                    'especialidade_id' => null
                ),
                1738 => array(
                    'id' => '1738',
                    'cd_consulta' => '40307158',
                    'ds_procedimento' => 'HISTOPLASMOSE, REAÇÃO SOROLÓGICA   ',
                    'especialidade_id' => null
                ),
                1739 => array(
                    'id' => '1739',
                    'cd_consulta' => '40307166',
                    'ds_procedimento' => 'HIV - ANTÍGENO P24 ',
                    'especialidade_id' => null
                ),
                1740 => array(
                    'id' => '1740',
                    'cd_consulta' => '40307174',
                    'ds_procedimento' => 'HIV1 OU HIV2, PESQUISA DE ANTICORPOS       ',
                    'especialidade_id' => null
                ),
                1741 => array(
                    'id' => '1741',
                    'cd_consulta' => '40307182',
                    'ds_procedimento' => 'HIV1+ HIV2, (DETERMINAÇÃO CONJUNTA), PESQUISA DE ANTICORPOS        ',
                    'especialidade_id' => null
                ),
                1742 => array(
                    'id' => '1742',
                    'cd_consulta' => '40307190',
                    'ds_procedimento' => 'HLA-DR ',
                    'especialidade_id' => null
                ),
                1743 => array(
                    'id' => '1743',
                    'cd_consulta' => '40307204',
                    'ds_procedimento' => 'HLA-DR+DQ          ',
                    'especialidade_id' => null
                ),
                1744 => array(
                    'id' => '1744',
                    'cd_consulta' => '40307212',
                    'ds_procedimento' => 'HTLV1 OU HTLV2 PESQUISA DE ANTICORPO (CADA)',
                    'especialidade_id' => null
                ),
                1745 => array(
                    'id' => '1745',
                    'cd_consulta' => '40307220',
                    'ds_procedimento' => 'IGA    ',
                    'especialidade_id' => null
                ),
                1746 => array(
                    'id' => '1746',
                    'cd_consulta' => '40307239',
                    'ds_procedimento' => 'IGA NA SALIVA      ',
                    'especialidade_id' => null
                ),
                1747 => array(
                    'id' => '1747',
                    'cd_consulta' => '40307247',
                    'ds_procedimento' => 'IGD    ',
                    'especialidade_id' => null
                ),
                1748 => array(
                    'id' => '1748',
                    'cd_consulta' => '40307255',
                    'ds_procedimento' => 'IGE, GRUPO ESPECÍFICO, CADA        ',
                    'especialidade_id' => null
                ),
                1749 => array(
                    'id' => '1749',
                    'cd_consulta' => '40307263',
                    'ds_procedimento' => 'IGE, POR ALÉRGENO, CADA (CADA)     ',
                    'especialidade_id' => null
                ),
                1750 => array(
                    'id' => '1750',
                    'cd_consulta' => '40307271',
                    'ds_procedimento' => 'IGE, TOTAL         ',
                    'especialidade_id' => null
                ),
                1751 => array(
                    'id' => '1751',
                    'cd_consulta' => '40307280',
                    'ds_procedimento' => 'IGG    ',
                    'especialidade_id' => null
                ),
                1752 => array(
                    'id' => '1752',
                    'cd_consulta' => '40307298',
                    'ds_procedimento' => 'IGG, SUBCLASSES 1,2,3,4 (CADA)     ',
                    'especialidade_id' => null
                ),
                1753 => array(
                    'id' => '1753',
                    'cd_consulta' => '40307301',
                    'ds_procedimento' => 'IGM    ',
                    'especialidade_id' => null
                ),
                1754 => array(
                    'id' => '1754',
                    'cd_consulta' => '40307310',
                    'ds_procedimento' => 'IMUNOCOMPLEXOS CIRCULANTES         ',
                    'especialidade_id' => null
                ),
                1755 => array(
                    'id' => '1755',
                    'cd_consulta' => '40307328',
                    'ds_procedimento' => 'IMUNOCOMPLEXOS CIRCULANTES, COM CÉLULAS RAJI           ',
                    'especialidade_id' => null
                ),
                1756 => array(
                    'id' => '1756',
                    'cd_consulta' => '40307336',
                    'ds_procedimento' => 'IMUNOELETROFORESE (ESTUDO DA GAMOPATIA)    ',
                    'especialidade_id' => null
                ),
                1757 => array(
                    'id' => '1757',
                    'cd_consulta' => '40307344',
                    'ds_procedimento' => 'INIBIDOR DE C1 ESTERASE',
                    'especialidade_id' => null
                ),
                1758 => array(
                    'id' => '1758',
                    'cd_consulta' => '40307352',
                    'ds_procedimento' => 'ISOSPORA, PESQUISA DE ANTÍGENO     ',
                    'especialidade_id' => null
                ),
                1759 => array(
                    'id' => '1759',
                    'cd_consulta' => '40307360',
                    'ds_procedimento' => 'ITO (CANCRO MOLE), IDER',
                    'especialidade_id' => null
                ),
                1760 => array(
                    'id' => '1760',
                    'cd_consulta' => '40307379',
                    'ds_procedimento' => 'KVEIM (SARCOIDOSE), IDER           ',
                    'especialidade_id' => null
                ),
                1761 => array(
                    'id' => '1761',
                    'cd_consulta' => '40307387',
                    'ds_procedimento' => 'LEGIONELLA - IGG E IGM (CADA)      ',
                    'especialidade_id' => null
                ),
                1762 => array(
                    'id' => '1762',
                    'cd_consulta' => '40307395',
                    'ds_procedimento' => 'LEISHMANIOSE - IGG E IGM (CADA)    ',
                    'especialidade_id' => null
                ),
                1763 => array(
                    'id' => '1763',
                    'cd_consulta' => '40307409',
                    'ds_procedimento' => 'LEPTOSPIROSE - IGG ',
                    'especialidade_id' => null
                ),
                1764 => array(
                    'id' => '1764',
                    'cd_consulta' => '40307417',
                    'ds_procedimento' => 'LEPTOSPIROSE - IGM ',
                    'especialidade_id' => null
                ),
                1765 => array(
                    'id' => '1765',
                    'cd_consulta' => '40307425',
                    'ds_procedimento' => 'LEPTOSPIROSE, AGLUTINAÇÃO          ',
                    'especialidade_id' => null
                ),
                1766 => array(
                    'id' => '1766',
                    'cd_consulta' => '40307433',
                    'ds_procedimento' => 'LINFÓCITOS T "HELPER" CONTAGEM DE (IF COM OKT-4) (CD-4+) CITOMETRIA DE FLUXO       ',
                    'especialidade_id' => null
                ),
                1767 => array(
                    'id' => '1767',
                    'cd_consulta' => '40307441',
                    'ds_procedimento' => 'LINFÓCITOS T SUPRESSORES CONTAGEM DE (IF COM OKT-8) (D-8) CITOMETRIA DE FLUXO      ',
                    'especialidade_id' => null
                ),
                1768 => array(
                    'id' => '1768',
                    'cd_consulta' => '40307450',
                    'ds_procedimento' => 'LISTERIOSE, REAÇÃO SOROLÓGICA      ',
                    'especialidade_id' => null
                ),
                1769 => array(
                    'id' => '1769',
                    'cd_consulta' => '40307468',
                    'ds_procedimento' => 'LYME - IGG         ',
                    'especialidade_id' => null
                ),
                1770 => array(
                    'id' => '1770',
                    'cd_consulta' => '40307476',
                    'ds_procedimento' => 'LYME - IGM         ',
                    'especialidade_id' => null
                ),
                1771 => array(
                    'id' => '1771',
                    'cd_consulta' => '40307484',
                    'ds_procedimento' => 'MALÁRIA - IGG      ',
                    'especialidade_id' => null
                ),
                1772 => array(
                    'id' => '1772',
                    'cd_consulta' => '40307492',
                    'ds_procedimento' => 'MALÁRIA - IGM      ',
                    'especialidade_id' => null
                ),
                1773 => array(
                    'id' => '1773',
                    'cd_consulta' => '40307506',
                    'ds_procedimento' => 'MANTOUX, IDER      ',
                    'especialidade_id' => null
                ),
                1774 => array(
                    'id' => '1774',
                    'cd_consulta' => '40307514',
                    'ds_procedimento' => 'MCA (ANTÍGENO CÁRCINO-MAMÁRIO)     ',
                    'especialidade_id' => null
                ),
                1775 => array(
                    'id' => '1775',
                    'cd_consulta' => '40307522',
                    'ds_procedimento' => 'MICOPLASMA PNEUMONIAE - IGG        ',
                    'especialidade_id' => null
                ),
                1776 => array(
                    'id' => '1776',
                    'cd_consulta' => '40307530',
                    'ds_procedimento' => 'MICOPLASMA PNEUMONIAE - IGM        ',
                    'especialidade_id' => null
                ),
                1777 => array(
                    'id' => '1777',
                    'cd_consulta' => '40307565',
                    'ds_procedimento' => 'MONONUCLEOSE - EPSTEIN BARR - IGG  ',
                    'especialidade_id' => null
                ),
                1778 => array(
                    'id' => '1778',
                    'cd_consulta' => '40307573',
                    'ds_procedimento' => 'MONONUCLEOSE, ANTI-VCA (EBV) IGG   ',
                    'especialidade_id' => null
                ),
                1779 => array(
                    'id' => '1779',
                    'cd_consulta' => '40307581',
                    'ds_procedimento' => 'MONONUCLEOSE, ANTI-VCA (EBV) IGM   ',
                    'especialidade_id' => null
                ),
                1780 => array(
                    'id' => '1780',
                    'cd_consulta' => '40308340',
                    'ds_procedimento' => 'MONONUCLEOSE, SOROLOGIA PARA (MONOTESTE OU PAUL-BUNNEL), CADA      ',
                    'especialidade_id' => null
                ),
                1781 => array(
                    'id' => '1781',
                    'cd_consulta' => '40307590',
                    'ds_procedimento' => 'MONTENEGRO, IDER   ',
                    'especialidade_id' => null
                ),
                1782 => array(
                    'id' => '1782',
                    'cd_consulta' => '40308090',
                    'ds_procedimento' => 'NBT ESTIMULADO     ',
                    'especialidade_id' => null
                ),
                1783 => array(
                    'id' => '1783',
                    'cd_consulta' => '40307603',
                    'ds_procedimento' => 'OUTROS TESTES BIOQUÍMICOS PARA DETERMINAÇÃO DO RISCO FETAL (CADA)  ',
                    'especialidade_id' => null
                ),
                1784 => array(
                    'id' => '1784',
                    'cd_consulta' => '40308413',
                    'ds_procedimento' => 'PARACOCCIDIOIDOMICOSE, ANTICORPOS TOTAIS / IGG         ',
                    'especialidade_id' => null
                ),
                1785 => array(
                    'id' => '1785',
                    'cd_consulta' => '40307611',
                    'ds_procedimento' => 'PARVOVÍRUS - IGG, IGM (CADA)       ',
                    'especialidade_id' => null
                ),
                1786 => array(
                    'id' => '1786',
                    'cd_consulta' => '40307620',
                    'ds_procedimento' => 'PEPTÍDIO INTESTINAL VASOATIVO, DOSAGEM     ',
                    'especialidade_id' => null
                ),
                1787 => array(
                    'id' => '1787',
                    'cd_consulta' => '40308243',
                    'ds_procedimento' => 'POLIOMELITE SOROLOGIA  ',
                    'especialidade_id' => null
                ),
                1788 => array(
                    'id' => '1788',
                    'cd_consulta' => '40307638',
                    'ds_procedimento' => 'PPD (TUBERCULINA), IDER',
                    'especialidade_id' => null
                ),
                1789 => array(
                    'id' => '1789',
                    'cd_consulta' => '40308251',
                    'ds_procedimento' => 'PROTEÍNA AMILOIDE A',
                    'especialidade_id' => null
                ),
                1790 => array(
                    'id' => '1790',
                    'cd_consulta' => '40308383',
                    'ds_procedimento' => 'PROTEÍNA C REATIVA, QUALITATIVA    ',
                    'especialidade_id' => null
                ),
                1791 => array(
                    'id' => '1791',
                    'cd_consulta' => '40308391',
                    'ds_procedimento' => 'PROTEÍNA C REATIVA, QUANTITATIVA   ',
                    'especialidade_id' => null
                ),
                1792 => array(
                    'id' => '1792',
                    'cd_consulta' => '40307654',
                    'ds_procedimento' => 'PROTEÍNA C, TESTE IMUNOLÓGICO      ',
                    'especialidade_id' => null
                ),
                1793 => array(
                    'id' => '1793',
                    'cd_consulta' => '40307662',
                    'ds_procedimento' => 'PROTEÍNA EOSINOFÍLICA CATIÔNICA (ECP)      ',
                    'especialidade_id' => null
                ),
                1794 => array(
                    'id' => '1794',
                    'cd_consulta' => '40308375',
                    'ds_procedimento' => 'PSITACOSE - IGA    ',
                    'especialidade_id' => null
                ),
                1795 => array(
                    'id' => '1795',
                    'cd_consulta' => '40308359',
                    'ds_procedimento' => 'PSITACOSE - IGG    ',
                    'especialidade_id' => null
                ),
                1796 => array(
                    'id' => '1796',
                    'cd_consulta' => '40308367',
                    'ds_procedimento' => 'PSITACOSE - IGM    ',
                    'especialidade_id' => null
                ),
                1797 => array(
                    'id' => '1797',
                    'cd_consulta' => '40307689',
                    'ds_procedimento' => 'REAÇÃO SOROLÓGICA PARA COXSACKIE, NEUTRALIZAÇÃO IGG    ',
                    'especialidade_id' => null
                ),
                1798 => array(
                    'id' => '1798',
                    'cd_consulta' => '40307697',
                    'ds_procedimento' => 'RUBÉOLA - IGG      ',
                    'especialidade_id' => null
                ),
                1799 => array(
                    'id' => '1799',
                    'cd_consulta' => '40307700',
                    'ds_procedimento' => 'RUBÉOLA - IGM      ',
                    'especialidade_id' => null
                ),
                1800 => array(
                    'id' => '1800',
                    'cd_consulta' => '40308120',
                    'ds_procedimento' => 'SARAMPO - ANTICORPOS IGG           ',
                    'especialidade_id' => null
                ),
                1801 => array(
                    'id' => '1801',
                    'cd_consulta' => '40308138',
                    'ds_procedimento' => 'SARAMPO - ANTICORPOS IGM           ',
                    'especialidade_id' => null
                ),
                1802 => array(
                    'id' => '1802',
                    'cd_consulta' => '40307719',
                    'ds_procedimento' => 'SCHISTOSOMOSE - IGG',
                    'especialidade_id' => null
                ),
                1803 => array(
                    'id' => '1803',
                    'cd_consulta' => '40307727',
                    'ds_procedimento' => 'SCHISTOSOMOSE - IGM',
                    'especialidade_id' => null
                ),
                1804 => array(
                    'id' => '1804',
                    'cd_consulta' => '40308278',
                    'ds_procedimento' => 'SCHISTOSOMOSE, PESQUISA',
                    'especialidade_id' => null
                ),
                1805 => array(
                    'id' => '1805',
                    'cd_consulta' => '40307735',
                    'ds_procedimento' => 'SÍFILIS - FTA-ABS-IGG  ',
                    'especialidade_id' => null
                ),
                1806 => array(
                    'id' => '1806',
                    'cd_consulta' => '40307743',
                    'ds_procedimento' => 'SÍFILIS - FTA-ABS-IGM  ',
                    'especialidade_id' => null
                ),
                1807 => array(
                    'id' => '1807',
                    'cd_consulta' => '40307751',
                    'ds_procedimento' => 'SÍFILIS - TPHA     ',
                    'especialidade_id' => null
                ),
                1808 => array(
                    'id' => '1808',
                    'cd_consulta' => '40307760',
                    'ds_procedimento' => 'SÍFILIS - VDRL     ',
                    'especialidade_id' => null
                ),
                1809 => array(
                    'id' => '1809',
                    'cd_consulta' => '40308286',
                    'ds_procedimento' => 'SÍFILIS ANTICORPO TOTAL',
                    'especialidade_id' => null
                ),
                1810 => array(
                    'id' => '1810',
                    'cd_consulta' => '40308294',
                    'ds_procedimento' => 'SÍFILIS IGM        ',
                    'especialidade_id' => null
                ),
                1811 => array(
                    'id' => '1811',
                    'cd_consulta' => '40307778',
                    'ds_procedimento' => 'TESTE DE INIBIÇÃO DA MIGRAÇÃO DOS LINFÓCITOS (PARA CADA ANTÍGENO)  ',
                    'especialidade_id' => null
                ),
                1812 => array(
                    'id' => '1812',
                    'cd_consulta' => '40307786',
                    'ds_procedimento' => 'TESTE RESPIRATÓRIO PARA H. PYLORI  ',
                    'especialidade_id' => null
                ),
                1813 => array(
                    'id' => '1813',
                    'cd_consulta' => '40307794',
                    'ds_procedimento' => 'TOXOCARA CANNIS - IGG  ',
                    'especialidade_id' => null
                ),
                1814 => array(
                    'id' => '1814',
                    'cd_consulta' => '40307808',
                    'ds_procedimento' => 'TOXOCARA CANNIS - IGM  ',
                    'especialidade_id' => null
                ),
                1815 => array(
                    'id' => '1815',
                    'cd_consulta' => '40307816',
                    'ds_procedimento' => 'TOXOPLASMINA, IDER ',
                    'especialidade_id' => null
                ),
                1816 => array(
                    'id' => '1816',
                    'cd_consulta' => '40308154',
                    'ds_procedimento' => 'TOXOPLASMOSE - IGA ',
                    'especialidade_id' => null
                ),
                1817 => array(
                    'id' => '1817',
                    'cd_consulta' => '40307824',
                    'ds_procedimento' => 'TOXOPLASMOSE IGG   ',
                    'especialidade_id' => null
                ),
                1818 => array(
                    'id' => '1818',
                    'cd_consulta' => '40307832',
                    'ds_procedimento' => 'TOXOPLASMOSE IGM   ',
                    'especialidade_id' => null
                ),
                1819 => array(
                    'id' => '1819',
                    'cd_consulta' => '40307840',
                    'ds_procedimento' => 'UREASE, TESTE RÁPIDO PARA HELICOBACTER PYLORI          ',
                    'especialidade_id' => null
                ),
                1820 => array(
                    'id' => '1820',
                    'cd_consulta' => '40308162',
                    'ds_procedimento' => 'VARICELA, IGG      ',
                    'especialidade_id' => null
                ),
                1821 => array(
                    'id' => '1821',
                    'cd_consulta' => '40308170',
                    'ds_procedimento' => 'VARICELA, IGM      ',
                    'especialidade_id' => null
                ),
                1822 => array(
                    'id' => '1822',
                    'cd_consulta' => '40307859',
                    'ds_procedimento' => 'VÍRUS SINCICIAL RESPIRATÓRIO - ELISA - IGG ',
                    'especialidade_id' => null
                ),
                1823 => array(
                    'id' => '1823',
                    'cd_consulta' => '40308197',
                    'ds_procedimento' => 'VÍRUS, (SINCICIAL, RESPIRATÓRIO) PESQUISA DIRETA       ',
                    'especialidade_id' => null
                ),
                1824 => array(
                    'id' => '1824',
                    'cd_consulta' => '40307867',
                    'ds_procedimento' => 'WAALER-ROSE (FATOR REUMATÓIDE)     ',
                    'especialidade_id' => null
                ),
                1825 => array(
                    'id' => '1825',
                    'cd_consulta' => '40308200',
                    'ds_procedimento' => 'WEIL FELIX (RICKETSIOSE), REAÇÃO DE AGLUTINAÇÃO        ',
                    'especialidade_id' => null
                ),
                1826 => array(
                    'id' => '1826',
                    'cd_consulta' => '40307875',
                    'ds_procedimento' => 'WESTERN BLOT (ANTICORPOS ANTI-HIV) ',
                    'especialidade_id' => null
                ),
                1827 => array(
                    'id' => '1827',
                    'cd_consulta' => '40307883',
                    'ds_procedimento' => 'WESTERN BLOT (ANTICORPOS ANTI-HTVI OU HTLVII) (CADA)   ',
                    'especialidade_id' => null
                ),
                1828 => array(
                    'id' => '1828',
                    'cd_consulta' => '40307891',
                    'ds_procedimento' => 'WIDAL, REAÇÃO DE   ',
                    'especialidade_id' => null
                ),
                1829 => array(
                    'id' => '1829',
                    'cd_consulta' => '40309010',
                    'ds_procedimento' => 'ADENOSINA DE AMINASE (ADA)         ',
                    'especialidade_id' => null
                ),
                1830 => array(
                    'id' => '1830',
                    'cd_consulta' => '40309304',
                    'ds_procedimento' => 'ANTICORPO ANTIESPERMATOZÓIDE       ',
                    'especialidade_id' => null
                ),
                1831 => array(
                    'id' => '1831',
                    'cd_consulta' => '40309029',
                    'ds_procedimento' => 'BIOQUÍMICA ICR (PROTEÍNAS + PANDY + GLICOSE + CLORO)   ',
                    'especialidade_id' => null
                ),
                1832 => array(
                    'id' => '1832',
                    'cd_consulta' => '40309037',
                    'ds_procedimento' => 'CÉLULAS, CONTAGEM TOTAL E ESPECÍFICA       ',
                    'especialidade_id' => null
                ),
                1833 => array(
                    'id' => '1833',
                    'cd_consulta' => '40309045',
                    'ds_procedimento' => 'CÉLULAS, PESQUISA DE CÉLULAS NEOPLÁSICAS (CITOLOGIA ONCÓTICA)      ',
                    'especialidade_id' => null
                ),
                1834 => array(
                    'id' => '1834',
                    'cd_consulta' => '40309401',
                    'ds_procedimento' => 'CLEMENTS, TESTE    ',
                    'especialidade_id' => null
                ),
                1835 => array(
                    'id' => '1835',
                    'cd_consulta' => '40309053',
                    'ds_procedimento' => 'CRIPTOCOCOSE, CÂNDIDA, ASPÉRGILUS (LÁTEX)  ',
                    'especialidade_id' => null
                ),
                1836 => array(
                    'id' => '1836',
                    'cd_consulta' => '40309509',
                    'ds_procedimento' => 'CRISTAIS COM LUZ POLARIZADA, PESQUISA      ',
                    'especialidade_id' => null
                ),
                1837 => array(
                    'id' => '1837',
                    'cd_consulta' => '40309061',
                    'ds_procedimento' => 'ELETROFORESE DE PROTEÍNAS NO LÍQUOR, COM CONCENTRAÇÃO  ',
                    'especialidade_id' => null
                ),
                1838 => array(
                    'id' => '1838',
                    'cd_consulta' => '40309410',
                    'ds_procedimento' => 'ESPECTROFOTOMETRIA DE LÍQUIDO AMNIÓTICO    ',
                    'especialidade_id' => null
                ),
                1839 => array(
                    'id' => '1839',
                    'cd_consulta' => '40309312',
                    'ds_procedimento' => 'ESPERMOGRAMA (CARACTERES FÍSICOS, PH, FLUDIFICAÇÃO, MOTILIDADE, VITALIDADE, CONTAGEM E MORFOLOGIA)     ',
                    'especialidade_id' => null
                ),
                1840 => array(
                    'id' => '1840',
                    'cd_consulta' => '40309320',
                    'ds_procedimento' => 'ESPERMOGRAMA E TESTE DE PENETRAÇÃO "IN VITRO", VELOCIDADE PENETRAÇÃO VERTICAL, COLOCAÇÃO VITAL, TESTE DE REVITALIZAÇÃO   ',
                    'especialidade_id' => null
                ),
                1841 => array(
                    'id' => '1841',
                    'cd_consulta' => '40309428',
                    'ds_procedimento' => 'FOSFOLIPÍDIOS (RELAÇÃO LECITINA/ESFINGOMIELINA)        ',
                    'especialidade_id' => null
                ),
                1842 => array(
                    'id' => '1842',
                    'cd_consulta' => '40309070',
                    'ds_procedimento' => 'H. INFLUENZAE, S. PNEUMONIEAE, N. MENINGITIDIS A, B E C W135 (CADA)',
                    'especialidade_id' => null
                ),
                1843 => array(
                    'id' => '1843',
                    'cd_consulta' => '40309088',
                    'ds_procedimento' => 'HAEMOPHILUS INFLUENZAE - PESQUISA DE ANTICORPOS (CADA) ',
                    'especialidade_id' => null
                ),
                1844 => array(
                    'id' => '1844',
                    'cd_consulta' => '40309096',
                    'ds_procedimento' => 'ÍNDICE DE IMUNOPRODUÇÃO (ELETROF. E IGG EM SORO E LÍQUOR)          ',
                    'especialidade_id' => null
                ),
                1845 => array(
                    'id' => '1845',
                    'cd_consulta' => '40309100',
                    'ds_procedimento' => 'LCR AMBULATORIAL ROTINA (ASPECTOS COR + ÍNDICE DE COR + CONTAGEM GLOBAL E ESPECÍFICA DE LEUCÓCITOS E HEMÁCIAS + CITOLOGIA ONCÓTICA + PROTEÍNA + GLICOSE + CLORO + ELETROFORESE COM CONCENTRAÇÃO + IGG + REAÇÕES PARA NEUROCISTICERCOSE (2) + REAÇÕES PARA NEUROLES (2)   ',
                    'especialidade_id' => null
                ),
                1846 => array(
                    'id' => '1846',
                    'cd_consulta' => '40309118',
                    'ds_procedimento' => 'LCR HOSPITALAR NEUROLOGIA (ASPECTOS COR + ÍNDICES DE COR + CONTAGEM GLOBAL E ESPECÍFICA DE LEUCÓCITOS E HEMÁCIAS + PROTEÍNA + GLICOSE + CLORO + REAÇÕES PARA NEUROCISTICERCOSE (2) + REAÇÕES PARA NEUROLUES (2) + BACTERIOSCOPIA + CULTURA + LÁTEX PARA BACTÉRIAS        ',
                    'especialidade_id' => null
                ),
                1847 => array(
                    'id' => '1847',
                    'cd_consulta' => '40309126',
                    'ds_procedimento' => 'LCR PRONTO SOCORRO (ASPECTOS COR + ÍNDICE DE COR + CONTAGEM GLOBAL E ESPECÍFICA DE LEUCÓCITOS E HEMÁCIAS + PROTEÍNA + GLICOSE + CLORO + LACTATO + BACTERIOSCOPIA + CULTURA + LÁTEX PARA BACTÉRIAS)   ',
                    'especialidade_id' => null
                ),
                1848 => array(
                    'id' => '1848',
                    'cd_consulta' => '40309436',
                    'ds_procedimento' => 'MATURIDADE PULMONAR FETAL          ',
                    'especialidade_id' => null
                ),
                1849 => array(
                    'id' => '1849',
                    'cd_consulta' => '40309177',
                    'ds_procedimento' => 'NONNE-APPLE; REAÇÃO',
                    'especialidade_id' => null
                ),
                1850 => array(
                    'id' => '1850',
                    'cd_consulta' => '40309134',
                    'ds_procedimento' => 'PESQUISA DE BANDAS OLIGOCLONAIS POR ISOFOCALIZAÇÃO     ',
                    'especialidade_id' => null
                ),
                1851 => array(
                    'id' => '1851',
                    'cd_consulta' => '40309142',
                    'ds_procedimento' => 'PROTEÍNA MIELINA BÁSICA, ANTICORPO ANTI    ',
                    'especialidade_id' => null
                ),
                1852 => array(
                    'id' => '1852',
                    'cd_consulta' => '40309150',
                    'ds_procedimento' => 'PUNÇÃO CISTERNAL SUBOCCIPTAL COM MANOMETRIA PARA COLETA DE LÍQUIDO CEFALORRAQUEANO ',
                    'especialidade_id' => null
                ),
                1853 => array(
                    'id' => '1853',
                    'cd_consulta' => '40309169',
                    'ds_procedimento' => 'PUNÇÃO LOMBAR COM MANOMETRIA PARA COLETA DE LÍQUIDO CEFALORRAQUEANO',
                    'especialidade_id' => null
                ),
                1854 => array(
                    'id' => '1854',
                    'cd_consulta' => '40309517',
                    'ds_procedimento' => 'RAGÓCITOS, PESQUISA',
                    'especialidade_id' => null
                ),
                1855 => array(
                    'id' => '1855',
                    'cd_consulta' => '40309444',
                    'ds_procedimento' => 'ROTINA DO LÍQUIDO AMNIÓTICO-AMNIOGRAMA (CITOLÓGICO ESPECTROFOTOMETRIA, CREATININA E TESTE DE CLEMENTS) ',
                    'especialidade_id' => null
                ),
                1856 => array(
                    'id' => '1856',
                    'cd_consulta' => '40309525',
                    'ds_procedimento' => 'ROTINA LÍQUIDO SINOVIAL - CARACTERES FÍSICOS, CITOLOGIA, PROTEÍNAS, ÁCIDO ÚRICO, LÁTEX P/ F.R., BACT.  ',
                    'especialidade_id' => null
                ),
                1857 => array(
                    'id' => '1857',
                    'cd_consulta' => '40309185',
                    'ds_procedimento' => 'TAKATA-ARA, REAÇÃO ',
                    'especialidade_id' => null
                ),
                1858 => array(
                    'id' => '1858',
                    'cd_consulta' => '40310019',
                    'ds_procedimento' => 'A FRESCO, EXAME    ',
                    'especialidade_id' => null
                ),
                1859 => array(
                    'id' => '1859',
                    'cd_consulta' => '40310418',
                    'ds_procedimento' => 'ANTIBIOGRAMA (TESTE DE SENSIBILIDADE E ANTIBIÓTICOS E QUIMIOTERÁPICOS), POR BACTÉRIA - NÃO AUTOMATIZADO',
                    'especialidade_id' => null
                ),
                1860 => array(
                    'id' => '1860',
                    'cd_consulta' => '40310426',
                    'ds_procedimento' => 'ANTIBIOGRAMA AUTOMATIZADO          ',
                    'especialidade_id' => null
                ),
                1861 => array(
                    'id' => '1861',
                    'cd_consulta' => '40310035',
                    'ds_procedimento' => 'ANTIBIOGRAMA P/ BACILOS ÁLCOOL-RESISTENTES - DROGAS DE 2 LINHAS    ',
                    'especialidade_id' => null
                ),
                1862 => array(
                    'id' => '1862',
                    'cd_consulta' => '40310043',
                    'ds_procedimento' => 'ANTÍGENOS FÚNGICOS, PESQUISA       ',
                    'especialidade_id' => null
                ),
                1863 => array(
                    'id' => '1863',
                    'cd_consulta' => '40310051',
                    'ds_procedimento' => 'B.A.A.R. (ZIEHL OU FLUORESCÊNCIA, PESQUISA DIRETA E APÓS HOMOGENEIZAÇÃO)           ',
                    'especialidade_id' => null
                ),
                1864 => array(
                    'id' => '1864',
                    'cd_consulta' => '40310060',
                    'ds_procedimento' => 'BACTERIOSCOPIA (GRAM, ZIEHL, ALBERT ETC), POR LÂMINA   ',
                    'especialidade_id' => null
                ),
                1865 => array(
                    'id' => '1865',
                    'cd_consulta' => '40310078',
                    'ds_procedimento' => 'CHLAMYDIA, CULTURA ',
                    'especialidade_id' => null
                ),
                1866 => array(
                    'id' => '1866',
                    'cd_consulta' => '40310361',
                    'ds_procedimento' => 'CITOMEGALOVÍRUS - SHELL VIAL       ',
                    'especialidade_id' => null
                ),
                1867 => array(
                    'id' => '1867',
                    'cd_consulta' => '40310086',
                    'ds_procedimento' => 'CÓLERA - IDENTIFICAÇÃO (SOROTIPAGEM INCLUÍDA)          ',
                    'especialidade_id' => null
                ),
                1868 => array(
                    'id' => '1868',
                    'cd_consulta' => '40310094',
                    'ds_procedimento' => 'CORPÚSCULOS DE DONOVANI, PESQUISA DIRETA DE',
                    'especialidade_id' => null
                ),
                1869 => array(
                    'id' => '1869',
                    'cd_consulta' => '40310108',
                    'ds_procedimento' => 'CRIPTOCOCO (TINTA DA CHINA), PESQUISA DE   ',
                    'especialidade_id' => null
                ),
                1870 => array(
                    'id' => '1870',
                    'cd_consulta' => '40310116',
                    'ds_procedimento' => 'CRIPTOSPORIDIUM, PESQUISA          ',
                    'especialidade_id' => null
                ),
                1871 => array(
                    'id' => '1871',
                    'cd_consulta' => '40310400',
                    'ds_procedimento' => 'CULTURA AUTOMATIZADA   ',
                    'especialidade_id' => null
                ),
                1872 => array(
                    'id' => '1872',
                    'cd_consulta' => '40310124',
                    'ds_procedimento' => 'CULTURA BACTERIANA (EM DIVERSOS MATERIAIS BIOLÓGICOS)  ',
                    'especialidade_id' => null
                ),
                1873 => array(
                    'id' => '1873',
                    'cd_consulta' => '40310132',
                    'ds_procedimento' => 'CULTURA PARA BACTÉRIAS ANAERÓBICAS ',
                    'especialidade_id' => null
                ),
                1874 => array(
                    'id' => '1874',
                    'cd_consulta' => '40310140',
                    'ds_procedimento' => 'CULTURA PARA FUNGOS',
                    'especialidade_id' => null
                ),
                1875 => array(
                    'id' => '1875',
                    'cd_consulta' => '40310159',
                    'ds_procedimento' => 'CULTURA PARA MYCOBACTERIUM         ',
                    'especialidade_id' => null
                ),
                1876 => array(
                    'id' => '1876',
                    'cd_consulta' => '40310167',
                    'ds_procedimento' => 'CULTURA QUANTITATIVA DE SECREÇÕES PULMONARES, QUANDO NECESSITAR TRATAMENTO PRÉVIO C/ N.C.A.',
                    'especialidade_id' => null
                ),
                1877 => array(
                    'id' => '1877',
                    'cd_consulta' => '40310175',
                    'ds_procedimento' => 'CULTURA, FEZES: SALMONELA, SHIGELLAE E ESC. COLI ENTEROPATOGÊNICAS, ENTEROINVASORA (SOROL. INCLUÍDA) + CAMPYLOBACTER SP. + E. COLI ENTERO-HEMORRÁGICA',
                    'especialidade_id' => null
                ),
                1878 => array(
                    'id' => '1878',
                    'cd_consulta' => '40310183',
                    'ds_procedimento' => 'CULTURA, FEZES: SALMONELLA, SHIGELLA E ESCHERICHIA COLI ENTEROPATOGÊNICAS (SOROLOGIA INCLUÍDA)         ',
                    'especialidade_id' => null
                ),
                1879 => array(
                    'id' => '1879',
                    'cd_consulta' => '40310191',
                    'ds_procedimento' => 'CULTURA, HERPESVÍRUS OU OUTRO      ',
                    'especialidade_id' => null
                ),
                1880 => array(
                    'id' => '1880',
                    'cd_consulta' => '40310205',
                    'ds_procedimento' => 'CULTURA, MICOPLASMA OU UREAPLASMA  ',
                    'especialidade_id' => null
                ),
                1881 => array(
                    'id' => '1881',
                    'cd_consulta' => '40310213',
                    'ds_procedimento' => 'CULTURA, URINA COM CONTAGEM DE COLÔNIAS    ',
                    'especialidade_id' => null
                ),
                1882 => array(
                    'id' => '1882',
                    'cd_consulta' => '40310221',
                    'ds_procedimento' => 'ESTREPTOCOCOS - A, TESTE RÁPIDO    ',
                    'especialidade_id' => null
                ),
                1883 => array(
                    'id' => '1883',
                    'cd_consulta' => '40310230',
                    'ds_procedimento' => 'FUNGOS, PESQUISA DE (A FRESCO LACTOFENOL, TINTA DA CHINA)          ',
                    'especialidade_id' => null
                ),
                1884 => array(
                    'id' => '1884',
                    'cd_consulta' => '40310280',
                    'ds_procedimento' => 'HANSEN, PESQUISA DE (POR MATERIAL) ',
                    'especialidade_id' => null
                ),
                1885 => array(
                    'id' => '1885',
                    'cd_consulta' => '40310248',
                    'ds_procedimento' => 'HEMOCULTURA (POR AMOSTRA)          ',
                    'especialidade_id' => null
                ),
                1886 => array(
                    'id' => '1886',
                    'cd_consulta' => '40310256',
                    'ds_procedimento' => 'HEMOCULTURA AUTOMATIZADA (POR AMOSTRA)     ',
                    'especialidade_id' => null
                ),
                1887 => array(
                    'id' => '1887',
                    'cd_consulta' => '40310264',
                    'ds_procedimento' => 'HEMOCULTURA PARA BACTÉRIAS ANAERÓBIAS (POR AMOSTRA)    ',
                    'especialidade_id' => null
                ),
                1888 => array(
                    'id' => '1888',
                    'cd_consulta' => '40310272',
                    'ds_procedimento' => 'HEMOPHILUS (BORDETELLA) PERTUSSIS  ',
                    'especialidade_id' => null
                ),
                1889 => array(
                    'id' => '1889',
                    'cd_consulta' => '40310434',
                    'ds_procedimento' => 'LEISHMANIA, PESQUISA   ',
                    'especialidade_id' => null
                ),
                1890 => array(
                    'id' => '1890',
                    'cd_consulta' => '40310299',
                    'ds_procedimento' => 'LEPTOSPIRA (CAMPO ESCURO APÓS CONCENTRAÇÃO) PESQUISA   ',
                    'especialidade_id' => null
                ),
                1891 => array(
                    'id' => '1891',
                    'cd_consulta' => '40310302',
                    'ds_procedimento' => 'MICROORGANISMOS - TESTE DE SENSIBILIDADE A DROGAS MIC, POR DROGA TESTADA           ',
                    'especialidade_id' => null
                ),
                1892 => array(
                    'id' => '1892',
                    'cd_consulta' => '40310370',
                    'ds_procedimento' => 'MICROSPORÍDIA, PESQUISA NAS FEZES  ',
                    'especialidade_id' => null
                ),
                1893 => array(
                    'id' => '1893',
                    'cd_consulta' => '40310310',
                    'ds_procedimento' => 'PARACOCCIDIOIDES, PESQUISA DE      ',
                    'especialidade_id' => null
                ),
                1894 => array(
                    'id' => '1894',
                    'cd_consulta' => '40310329',
                    'ds_procedimento' => 'PNEUMOCYSTI CARINII, PESQUISA POR COLORAÇÃO ESPECIAL   ',
                    'especialidade_id' => null
                ),
                1895 => array(
                    'id' => '1895',
                    'cd_consulta' => '40310337',
                    'ds_procedimento' => 'ROTAVÍRUS, PESQUISA, ELISA         ',
                    'especialidade_id' => null
                ),
                1896 => array(
                    'id' => '1896',
                    'cd_consulta' => '40310388',
                    'ds_procedimento' => 'SARCOPTES SCABEI, PESQUISA         ',
                    'especialidade_id' => null
                ),
                1897 => array(
                    'id' => '1897',
                    'cd_consulta' => '40310345',
                    'ds_procedimento' => 'TREPONEMA (CAMPO ESCURO)           ',
                    'especialidade_id' => null
                ),
                1898 => array(
                    'id' => '1898',
                    'cd_consulta' => '40310353',
                    'ds_procedimento' => 'VACINA AUTÓGENA    ',
                    'especialidade_id' => null
                ),
                1899 => array(
                    'id' => '1899',
                    'cd_consulta' => '40311015',
                    'ds_procedimento' => 'ÁCIDO CÍTRICO      ',
                    'especialidade_id' => null
                ),
                1900 => array(
                    'id' => '1900',
                    'cd_consulta' => '40311236',
                    'ds_procedimento' => '2,5-HEXANODIONA, DOSAGEM NA URINA  ',
                    'especialidade_id' => null
                ),
                1901 => array(
                    'id' => '1901',
                    'cd_consulta' => '40311260',
                    'ds_procedimento' => 'ACIDEZ TITULÁVEL   ',
                    'especialidade_id' => null
                ),
                1902 => array(
                    'id' => '1902',
                    'cd_consulta' => '40311023',
                    'ds_procedimento' => 'ÁCIDO HOMOGENTÍSICO',
                    'especialidade_id' => null
                ),
                1903 => array(
                    'id' => '1903',
                    'cd_consulta' => '40311031',
                    'ds_procedimento' => 'ALCAPTONÚRIA, PESQUISA ',
                    'especialidade_id' => null
                ),
                1904 => array(
                    'id' => '1904',
                    'cd_consulta' => '40311279',
                    'ds_procedimento' => 'BARTITURATOS, PESQUISA ',
                    'especialidade_id' => null
                ),
                1905 => array(
                    'id' => '1905',
                    'cd_consulta' => '40311287',
                    'ds_procedimento' => 'BETA MERCAPTO-LACTATO-DISULFIDÚRIA, PESQUISA           ',
                    'especialidade_id' => null
                ),
                1906 => array(
                    'id' => '1906',
                    'cd_consulta' => '40311040',
                    'ds_procedimento' => 'CÁLCULOS URINÁRIOS ',
                    'especialidade_id' => null
                ),
                1907 => array(
                    'id' => '1907',
                    'cd_consulta' => '40311058',
                    'ds_procedimento' => 'CATECOLAMINAS FRACIONADAS - DOPAMINA, EPINEFRINA, NOREPINEFRINA (CADA) ',
                    'especialidade_id' => null
                ),
                1908 => array(
                    'id' => '1908',
                    'cd_consulta' => '40311244',
                    'ds_procedimento' => 'CISTINA',
                    'especialidade_id' => null
                ),
                1909 => array(
                    'id' => '1909',
                    'cd_consulta' => '40311066',
                    'ds_procedimento' => 'CISTINÚRIA, PESQUISA   ',
                    'especialidade_id' => null
                ),
                1910 => array(
                    'id' => '1910',
                    'cd_consulta' => '40311295',
                    'ds_procedimento' => 'CONTAGEM SEDIMENTAR DE ADDIS       ',
                    'especialidade_id' => null
                ),
                1911 => array(
                    'id' => '1911',
                    'cd_consulta' => '40311074',
                    'ds_procedimento' => 'COPROPORFIRINA III ',
                    'especialidade_id' => null
                ),
                1912 => array(
                    'id' => '1912',
                    'cd_consulta' => '40311082',
                    'ds_procedimento' => 'CORPOS CETÔNICOS, PESQUISA         ',
                    'especialidade_id' => null
                ),
                1913 => array(
                    'id' => '1913',
                    'cd_consulta' => '40311090',
                    'ds_procedimento' => 'CROMATOGRAFIA DE AÇÚCARES          ',
                    'especialidade_id' => null
                ),
                1914 => array(
                    'id' => '1914',
                    'cd_consulta' => '40311104',
                    'ds_procedimento' => 'DISMORFISMO ERITROCITÁRIO, PESQUISA (CONTRASTE DE FASE)',
                    'especialidade_id' => null
                ),
                1915 => array(
                    'id' => '1915',
                    'cd_consulta' => '40311309',
                    'ds_procedimento' => 'ELETROFORESE DE PROTEÍNAS URINÁRIAS, COM CONCENTRAÇÃO  ',
                    'especialidade_id' => null
                ),
                1916 => array(
                    'id' => '1916',
                    'cd_consulta' => '40311112',
                    'ds_procedimento' => 'ERROS INATOS DO METABOLISMO BATERIAS DE TESTES QUÍMICOS DE TRIAGEM EM URINA (MÍNIMO DE 6 TESTES)       ',
                    'especialidade_id' => null
                ),
                1917 => array(
                    'id' => '1917',
                    'cd_consulta' => '40311317',
                    'ds_procedimento' => 'FENILCETONÚRIA, PESQUISA           ',
                    'especialidade_id' => null
                ),
                1918 => array(
                    'id' => '1918',
                    'cd_consulta' => '40311120',
                    'ds_procedimento' => 'FRUTOSÚRIA, PESQUISA   ',
                    'especialidade_id' => null
                ),
                1919 => array(
                    'id' => '1919',
                    'cd_consulta' => '40311139',
                    'ds_procedimento' => 'GALACTOSÚRIA, PESQUISA ',
                    'especialidade_id' => null
                ),
                1920 => array(
                    'id' => '1920',
                    'cd_consulta' => '40311325',
                    'ds_procedimento' => 'HISTIDINA, PESQUISA',
                    'especialidade_id' => null
                ),
                1921 => array(
                    'id' => '1921',
                    'cd_consulta' => '40311333',
                    'ds_procedimento' => 'INCLUSÃO CITOMEGÁLICA, PESQUISA DE CÉLULAS COM         ',
                    'especialidade_id' => null
                ),
                1922 => array(
                    'id' => '1922',
                    'cd_consulta' => '40311147',
                    'ds_procedimento' => 'LIPÓIDES, PESQUISA ',
                    'especialidade_id' => null
                ),
                1923 => array(
                    'id' => '1923',
                    'cd_consulta' => '40311155',
                    'ds_procedimento' => 'MELANINA, PESQUISA ',
                    'especialidade_id' => null
                ),
                1924 => array(
                    'id' => '1924',
                    'cd_consulta' => '40311163',
                    'ds_procedimento' => 'METANEFRINAS URINÁRIAS, DOSAGEM    ',
                    'especialidade_id' => null
                ),
                1925 => array(
                    'id' => '1925',
                    'cd_consulta' => '40311171',
                    'ds_procedimento' => 'MICROALBUMINÚRIA   ',
                    'especialidade_id' => null
                ),
                1926 => array(
                    'id' => '1926',
                    'cd_consulta' => '40311341',
                    'ds_procedimento' => 'MIOGLOBINA, PESQUISA   ',
                    'especialidade_id' => null
                ),
                1927 => array(
                    'id' => '1927',
                    'cd_consulta' => '40311350',
                    'ds_procedimento' => 'OSMOLALIDADE, DETERMINAÇÃO         ',
                    'especialidade_id' => null
                ),
                1928 => array(
                    'id' => '1928',
                    'cd_consulta' => '40311180',
                    'ds_procedimento' => 'PESQUISA OU DOSAGEM DE UM COMPONENTE URINÁRIO          ',
                    'especialidade_id' => null
                ),
                1929 => array(
                    'id' => '1929',
                    'cd_consulta' => '40311252',
                    'ds_procedimento' => 'PORFOBILINOGÊNIO   ',
                    'especialidade_id' => null
                ),
                1930 => array(
                    'id' => '1930',
                    'cd_consulta' => '40311198',
                    'ds_procedimento' => 'PORFOBILINOGÊNIO, PESQUISA         ',
                    'especialidade_id' => null
                ),
                1931 => array(
                    'id' => '1931',
                    'cd_consulta' => '40311201',
                    'ds_procedimento' => 'PROTEÍNAS DE BENCE JONES, PESQUISA ',
                    'especialidade_id' => null
                ),
                1932 => array(
                    'id' => '1932',
                    'cd_consulta' => '40311368',
                    'ds_procedimento' => 'PROVA DE CONCENTRAÇÃO (FISHBERG OU VOLHARD)',
                    'especialidade_id' => null
                ),
                1933 => array(
                    'id' => '1933',
                    'cd_consulta' => '40311376',
                    'ds_procedimento' => 'PROVA DE DILUIÇÃO  ',
                    'especialidade_id' => null
                ),
                1934 => array(
                    'id' => '1934',
                    'cd_consulta' => '40311210',
                    'ds_procedimento' => 'ROTINA DE URINA (CARACTERES FÍSICOS, ELEMENTOS ANORMAIS E SEDIMENTOSCOPIA)         ',
                    'especialidade_id' => null
                ),
                1935 => array(
                    'id' => '1935',
                    'cd_consulta' => '40311384',
                    'ds_procedimento' => 'SOBRECARGA DE ÁGUA, PROVA          ',
                    'especialidade_id' => null
                ),
                1936 => array(
                    'id' => '1936',
                    'cd_consulta' => '40311392',
                    'ds_procedimento' => 'TIROSINOSE, PESQUISA   ',
                    'especialidade_id' => null
                ),
                1937 => array(
                    'id' => '1937',
                    'cd_consulta' => '40311228',
                    'ds_procedimento' => 'UROPORFIRINAS, DOSAGEM ',
                    'especialidade_id' => null
                ),
                1938 => array(
                    'id' => '1938',
                    'cd_consulta' => '40312011',
                    'ds_procedimento' => 'CRISTALIZAÇÃO DO MUCO CERVICAL, PEQUISA    ',
                    'especialidade_id' => null
                ),
                1939 => array(
                    'id' => '1939',
                    'cd_consulta' => '40312020',
                    'ds_procedimento' => 'CROMATINA SEXUAL, PESQUISA         ',
                    'especialidade_id' => null
                ),
                1940 => array(
                    'id' => '1940',
                    'cd_consulta' => '40312070',
                    'ds_procedimento' => 'GASTROACIDOGRAMA - SECREÇÃO BASAL PARA 60 E 4 AMOSTRAS APÓS O ESTÍMULO (FORNECIMENTO DE MATERIAL INCLUSIVE TUBAGEM) TESTE           ',
                    'especialidade_id' => null
                ),
                1941 => array(
                    'id' => '1941',
                    'cd_consulta' => '40312089',
                    'ds_procedimento' => 'HOLLANDER (INCLUSIVE TUBAGEM) TESTE',
                    'especialidade_id' => null
                ),
                1942 => array(
                    'id' => '1942',
                    'cd_consulta' => '40312046',
                    'ds_procedimento' => 'IONTOFORESE PARA A COLETA DE SUOR, COM DOSAGEM DE CLORO',
                    'especialidade_id' => null
                ),
                1943 => array(
                    'id' => '1943',
                    'cd_consulta' => '40312054',
                    'ds_procedimento' => 'MUCO-NASAL, PESQUISA DE EOSINÓFILOS E MASTÓCITOS       ',
                    'especialidade_id' => null
                ),
                1944 => array(
                    'id' => '1944',
                    'cd_consulta' => '40312097',
                    'ds_procedimento' => 'PANCREOZIMA - SECRETINA NO SUCO DUODENAL, TESTE        ',
                    'especialidade_id' => null
                ),
                1945 => array(
                    'id' => '1945',
                    'cd_consulta' => '40312062',
                    'ds_procedimento' => 'PERFIL METABÓLICO P/ LITÍASE RENAL: SANGUE (CA, P, AU, CR) URINA: (CA, AU, P, CITR, PESQ. CISTINA) AMP-CÍCLICO     ',
                    'especialidade_id' => null
                ),
                1946 => array(
                    'id' => '1946',
                    'cd_consulta' => '40312127',
                    'ds_procedimento' => 'PERFIL REUMATOLÓGICO (ÁCIDO ÚRICO, ELETROFORESE DE PROTEÍNAS, FAN, VHS, PROVA DO LÁTEX P/F. R, W. ROSE)',
                    'especialidade_id' => null
                ),
                1947 => array(
                    'id' => '1947',
                    'cd_consulta' => '40312135',
                    'ds_procedimento' => 'PH - TORNASSOL     ',
                    'especialidade_id' => null
                ),
                1948 => array(
                    'id' => '1948',
                    'cd_consulta' => '40312143',
                    'ds_procedimento' => 'PROVA ATIVIDADE DE FEBRE REUMÁTICA (ASLO, ELETROFORESE DE PROTEÍNAS, MUCO-PROTEÍNAS E PROTEÍNA "C" REATIVA)        ',
                    'especialidade_id' => null
                ),
                1949 => array(
                    'id' => '1949',
                    'cd_consulta' => '40312151',
                    'ds_procedimento' => 'PROVAS DE FUNÇÃO HEPÁTICA (BILIRRUBINAS, ELETROFORESE DE PROTEÍNAS. FA, TGO, TGP E GAMA-PGT)           ',
                    'especialidade_id' => null
                ),
                1950 => array(
                    'id' => '1950',
                    'cd_consulta' => '40312100',
                    'ds_procedimento' => 'ROTINA DA BILES A, B, C E DO SUCO DUODENAL (CARACTERES FÍSICOS E MICROSCÓPICOS INCLUSIVE TUBAGEM)      ',
                    'especialidade_id' => null
                ),
                1951 => array(
                    'id' => '1951',
                    'cd_consulta' => '40312178',
                    'ds_procedimento' => 'TESTE DO PEZINHO AMPLIADO (TSH NEONATAL + 17 OH PROGESTERONA + FENILALANINA + TRIPSINA IMUNO-REATIVA + ELETROFORESE DE HB PARA TRIAGEM DE HEMOPATIAS)',
                    'especialidade_id' => null
                ),
                1952 => array(
                    'id' => '1952',
                    'cd_consulta' => '40312160',
                    'ds_procedimento' => 'TESTE DO PEZINHO BÁSICO (TSH NEONATAL + FENILALANINA + ELETROFORESE DE HB PARA TRIAGEM DE HEMOPATIAS)  ',
                    'especialidade_id' => null
                ),
                1953 => array(
                    'id' => '1953',
                    'cd_consulta' => '40312119',
                    'ds_procedimento' => 'TUBAGEM DUODENAL   ',
                    'especialidade_id' => null
                ),
                1954 => array(
                    'id' => '1954',
                    'cd_consulta' => '40313018',
                    'ds_procedimento' => 'ÁCIDO DELTA AMINOLEVULÍNICO (PARA CHUMBO INORGÂNICO)   ',
                    'especialidade_id' => null
                ),
                1955 => array(
                    'id' => '1955',
                    'cd_consulta' => '40313298',
                    'ds_procedimento' => 'ÁCIDO ACÉTICO      ',
                    'especialidade_id' => null
                ),
                1956 => array(
                    'id' => '1956',
                    'cd_consulta' => '40313026',
                    'ds_procedimento' => 'ÁCIDO DELTA AMINOLEVULÍNICO DESIDRATASE (PARA CHUMBO INORGÂNICO)   ',
                    'especialidade_id' => null
                ),
                1957 => array(
                    'id' => '1957',
                    'cd_consulta' => '40313034',
                    'ds_procedimento' => 'ÁCIDO FENILGLIOXÍLICO (PARA ESTIRENO)      ',
                    'especialidade_id' => null
                ),
                1958 => array(
                    'id' => '1958',
                    'cd_consulta' => '40313042',
                    'ds_procedimento' => 'ÁCIDO HIPÚRICO (PARA TOLUENO)      ',
                    'especialidade_id' => null
                ),
                1959 => array(
                    'id' => '1959',
                    'cd_consulta' => '40313050',
                    'ds_procedimento' => 'ÁCIDO MANDÉLICO (PARA ESTIRENO)    ',
                    'especialidade_id' => null
                ),
                1960 => array(
                    'id' => '1960',
                    'cd_consulta' => '40313301',
                    'ds_procedimento' => 'ÁCIDO METIL MALÔNICO   ',
                    'especialidade_id' => null
                ),
                1961 => array(
                    'id' => '1961',
                    'cd_consulta' => '40313069',
                    'ds_procedimento' => 'ÁCIDO METILHIPÚRICO (PARA XILENOS) ',
                    'especialidade_id' => null
                ),
                1962 => array(
                    'id' => '1962',
                    'cd_consulta' => '40313077',
                    'ds_procedimento' => 'ÁCIDO SALICÍLICO   ',
                    'especialidade_id' => null
                ),
                1963 => array(
                    'id' => '1963',
                    'cd_consulta' => '40313085',
                    'ds_procedimento' => 'AZIDA SÓDICA, TESTE DA (PARA DEISSULFETO DE CARBONO)   ',
                    'especialidade_id' => null
                ),
                1964 => array(
                    'id' => '1964',
                    'cd_consulta' => '40313093',
                    'ds_procedimento' => 'CARBOXIHEMOGLOBINA (PARA MONÓXIDO DE CARBONO DICLOROMETANO)        ',
                    'especialidade_id' => null
                ),
                1965 => array(
                    'id' => '1965',
                    'cd_consulta' => '40313107',
                    'ds_procedimento' => 'CHUMBO ',
                    'especialidade_id' => null
                ),
                1966 => array(
                    'id' => '1966',
                    'cd_consulta' => '40313115',
                    'ds_procedimento' => 'COLINESTERASE (PARA CARBAMATOS ORGANOFOSFORADOS)       ',
                    'especialidade_id' => null
                ),
                1967 => array(
                    'id' => '1967',
                    'cd_consulta' => '40313123',
                    'ds_procedimento' => 'COPROPORFIRINAS (PARA CHUMBO INORGÂNICO)   ',
                    'especialidade_id' => null
                ),
                1968 => array(
                    'id' => '1968',
                    'cd_consulta' => '40313310',
                    'ds_procedimento' => 'CROMO  ',
                    'especialidade_id' => null
                ),
                1969 => array(
                    'id' => '1969',
                    'cd_consulta' => '40313131',
                    'ds_procedimento' => 'DIALDEÍDO MALÔNICO ',
                    'especialidade_id' => null
                ),
                1970 => array(
                    'id' => '1970',
                    'cd_consulta' => '40313140',
                    'ds_procedimento' => 'ETANOL ',
                    'especialidade_id' => null
                ),
                1971 => array(
                    'id' => '1971',
                    'cd_consulta' => '40313158',
                    'ds_procedimento' => 'FENOL (PARA BENZENO, FENOL)        ',
                    'especialidade_id' => null
                ),
                1972 => array(
                    'id' => '1972',
                    'cd_consulta' => '40313166',
                    'ds_procedimento' => 'FLÚOR (PARA FLUORETOS) ',
                    'especialidade_id' => null
                ),
                1973 => array(
                    'id' => '1973',
                    'cd_consulta' => '40313174',
                    'ds_procedimento' => 'FORMOLDEÍDO        ',
                    'especialidade_id' => null
                ),
                1974 => array(
                    'id' => '1974',
                    'cd_consulta' => '40313182',
                    'ds_procedimento' => 'META-HEMOGLOBINA (PARA ANILINA NITROBENZENO)           ',
                    'especialidade_id' => null
                ),
                1975 => array(
                    'id' => '1975',
                    'cd_consulta' => '40313190',
                    'ds_procedimento' => 'METAIS AL, AS, CD, CR, MN, HG, NI, ZN, CO, OUTRO (S) ABSORÇÃO ATÔMICA (CADA)       ',
                    'especialidade_id' => null
                ),
                1976 => array(
                    'id' => '1976',
                    'cd_consulta' => '40313204',
                    'ds_procedimento' => 'METANOL',
                    'especialidade_id' => null
                ),
                1977 => array(
                    'id' => '1977',
                    'cd_consulta' => '40313344',
                    'ds_procedimento' => 'METIL ETIL CETONA  ',
                    'especialidade_id' => null
                ),
                1978 => array(
                    'id' => '1978',
                    'cd_consulta' => '40313212',
                    'ds_procedimento' => 'P-AMINOFENOL (PARA ANILINA)        ',
                    'especialidade_id' => null
                ),
                1979 => array(
                    'id' => '1979',
                    'cd_consulta' => '40313220',
                    'ds_procedimento' => 'P-NITROFENOL (PARA NITROBENZENO)   ',
                    'especialidade_id' => null
                ),
                1980 => array(
                    'id' => '1980',
                    'cd_consulta' => '40313239',
                    'ds_procedimento' => 'PROTOPORFIRINAS LIVRES (PARA CHUMBO INORGÂNICO)        ',
                    'especialidade_id' => null
                ),
                1981 => array(
                    'id' => '1981',
                    'cd_consulta' => '40313247',
                    'ds_procedimento' => 'PROTOPORFIRINAS ZN (PARA CHUMBO INORGÂNICO)',
                    'especialidade_id' => null
                ),
                1982 => array(
                    'id' => '1982',
                    'cd_consulta' => '40313336',
                    'ds_procedimento' => 'SALICILATOS, PESQUISA  ',
                    'especialidade_id' => null
                ),
                1983 => array(
                    'id' => '1983',
                    'cd_consulta' => '40313255',
                    'ds_procedimento' => 'SELÊNIO, DOSAGEM   ',
                    'especialidade_id' => null
                ),
                1984 => array(
                    'id' => '1984',
                    'cd_consulta' => '40313263',
                    'ds_procedimento' => 'SULFATOS ORGÂNICOS OU INORGÂNICOS, PESQUISA (CADA)     ',
                    'especialidade_id' => null
                ),
                1985 => array(
                    'id' => '1985',
                    'cd_consulta' => '40313271',
                    'ds_procedimento' => 'TIOCIANATO (PARA CIANETOS NITRILAS ALIFÁTICAS)         ',
                    'especialidade_id' => null
                ),
                1986 => array(
                    'id' => '1986',
                    'cd_consulta' => '40313280',
                    'ds_procedimento' => 'TRICLOROCOMPOSTOS TOTAIS (PARA TETRACLOROETILENO, TRICLOROETANO, TRICLOROETILENO)  ',
                    'especialidade_id' => null
                ),
                1987 => array(
                    'id' => '1987',
                    'cd_consulta' => '40313328',
                    'ds_procedimento' => 'ZINCO  ',
                    'especialidade_id' => null
                ),
                1988 => array(
                    'id' => '1988',
                    'cd_consulta' => '40314014',
                    'ds_procedimento' => 'APOLIPOPROTEÍNA E, GENOTIPAGEM     ',
                    'especialidade_id' => null
                ),
                1989 => array(
                    'id' => '1989',
                    'cd_consulta' => '40314260',
                    'ds_procedimento' => 'AMPLIFICAÇÃO DE MATERIAL POR BIOLOGIA MOLECULAR (OUTROS AGENTES)   ',
                    'especialidade_id' => null
                ),
                1990 => array(
                    'id' => '1990',
                    'cd_consulta' => '40314243',
                    'ds_procedimento' => 'CHLAMYDIA POR BIOLOGIA MOLECULAR   ',
                    'especialidade_id' => null
                ),
                1991 => array(
                    'id' => '1991',
                    'cd_consulta' => '40314251',
                    'ds_procedimento' => 'CITOGENÉTICA DE MEDULA ÓSSEA       ',
                    'especialidade_id' => null
                ),
                1992 => array(
                    'id' => '1992',
                    'cd_consulta' => '40314022',
                    'ds_procedimento' => 'CITOMEGALOVÍRUS - QUALITATIVO, POR PCR     ',
                    'especialidade_id' => null
                ),
                1993 => array(
                    'id' => '1993',
                    'cd_consulta' => '40314030',
                    'ds_procedimento' => 'CITOMEGALOVÍRUS - QUANTITATIVO, POR PCR    ',
                    'especialidade_id' => null
                ),
                1994 => array(
                    'id' => '1994',
                    'cd_consulta' => '40314049',
                    'ds_procedimento' => 'CROMOSSOMO PHILADELFIA ',
                    'especialidade_id' => null
                ),
                1995 => array(
                    'id' => '1995',
                    'cd_consulta' => '40314057',
                    'ds_procedimento' => 'FATOR V DE LAYDEN POR PCR          ',
                    'especialidade_id' => null
                ),
                1996 => array(
                    'id' => '1996',
                    'cd_consulta' => '40314065',
                    'ds_procedimento' => 'FIBROSE CÍSTICA, PESQUISA DE UMA MUTAÇÃO   ',
                    'especialidade_id' => null
                ),
                1997 => array(
                    'id' => '1997',
                    'cd_consulta' => '40314073',
                    'ds_procedimento' => 'HEPATITE B (QUALITATIVO) PCR       ',
                    'especialidade_id' => null
                ),
                1998 => array(
                    'id' => '1998',
                    'cd_consulta' => '40314081',
                    'ds_procedimento' => 'HEPATITE B (QUANTITATIVO) PCR      ',
                    'especialidade_id' => null
                ),
                1999 => array(
                    'id' => '1999',
                    'cd_consulta' => '40314111',
                    'ds_procedimento' => 'HEPATITE C - GENOTIPAGEM           ',
                    'especialidade_id' => null
                ),
                2000 => array(
                    'id' => '2000',
                    'cd_consulta' => '40314090',
                    'ds_procedimento' => 'HEPATITE C (QUALITATIVO) POR PCR   ',
                    'especialidade_id' => null
                ),
                2001 => array(
                    'id' => '2001',
                    'cd_consulta' => '40314103',
                    'ds_procedimento' => 'HEPATITE C (QUANTITATIVO) POR PCR  ',
                    'especialidade_id' => null
                ),
                2002 => array(
                    'id' => '2002',
                    'cd_consulta' => '40314120',
                    'ds_procedimento' => 'HIV - CARGA VIRAL PCR  ',
                    'especialidade_id' => null
                ),
                2003 => array(
                    'id' => '2003',
                    'cd_consulta' => '40314138',
                    'ds_procedimento' => 'HIV - QUALITATIVO POR PCR          ',
                    'especialidade_id' => null
                ),
                2004 => array(
                    'id' => '2004',
                    'cd_consulta' => '40314146',
                    'ds_procedimento' => 'HIV, GENOTIPAGEM   ',
                    'especialidade_id' => null
                ),
                2005 => array(
                    'id' => '2005',
                    'cd_consulta' => '40314154',
                    'ds_procedimento' => 'HPV (VÍRUS DO PAPILOMA HUMANO) + SUBTIPAGEM QUANDO NECESSÁRIO PCR  ',
                    'especialidade_id' => null
                ),
                2006 => array(
                    'id' => '2006',
                    'cd_consulta' => '40314162',
                    'ds_procedimento' => 'HTLV I / II POR PCR (CADA)         ',
                    'especialidade_id' => null
                ),
                2007 => array(
                    'id' => '2007',
                    'cd_consulta' => '40314170',
                    'ds_procedimento' => 'MYCOBACTÉRIA PCR   ',
                    'especialidade_id' => null
                ),
                2008 => array(
                    'id' => '2008',
                    'cd_consulta' => '40314189',
                    'ds_procedimento' => 'PARVOVÍRUS POR PCR ',
                    'especialidade_id' => null
                ),
                2009 => array(
                    'id' => '2009',
                    'cd_consulta' => '40314286',
                    'ds_procedimento' => 'PESQUISA DE MUTAÇÃO DE ALELO ESPECÍFICO POR PCR        ',
                    'especialidade_id' => null
                ),
                2010 => array(
                    'id' => '2010',
                    'cd_consulta' => '40314278',
                    'ds_procedimento' => 'PESQUISA DE OUTROS AGENTES POR PCR ',
                    'especialidade_id' => null
                ),
                2011 => array(
                    'id' => '2011',
                    'cd_consulta' => '40314197',
                    'ds_procedimento' => 'PROTEÍNA S TOTAL + LIVRE, DOSAGEM  ',
                    'especialidade_id' => null
                ),
                2012 => array(
                    'id' => '2012',
                    'cd_consulta' => '40314308',
                    'ds_procedimento' => 'QUANTIFICAÇÃO DE OUTROS AGENTES POR PCR    ',
                    'especialidade_id' => null
                ),
                2013 => array(
                    'id' => '2013',
                    'cd_consulta' => '40314294',
                    'ds_procedimento' => 'RESISTÊNCIA A AGENTES ANTI VIRAIS POR BIOLOGIA MOLECULAR (CADA DROGA)  ',
                    'especialidade_id' => null
                ),
                2014 => array(
                    'id' => '2014',
                    'cd_consulta' => '40314200',
                    'ds_procedimento' => 'RUBÉOLA POR PCR    ',
                    'especialidade_id' => null
                ),
                2015 => array(
                    'id' => '2015',
                    'cd_consulta' => '40314219',
                    'ds_procedimento' => 'SÍFILIS POR PCR    ',
                    'especialidade_id' => null
                ),
                2016 => array(
                    'id' => '2016',
                    'cd_consulta' => '40314227',
                    'ds_procedimento' => 'TOXOPLASMOSE POR PCR   ',
                    'especialidade_id' => null
                ),
                2017 => array(
                    'id' => '2017',
                    'cd_consulta' => '40314235',
                    'ds_procedimento' => 'X FRÁGIL POR PCR   ',
                    'especialidade_id' => null
                )
            ));
    }
}           
