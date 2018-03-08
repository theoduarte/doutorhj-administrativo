<?php

use Illuminate\Database\Seeder;

class ProcedimentosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('procedimentos')->delete();
        
        \DB::table('procedimentos')->insert(array (
            0 => 
            array (
                'id' => '8381',
                'cd_procedimento' => '10101012',
            'ds_procedimento' => 'Em consultório (no horário normal ou preestabelecido)																																			',
            ),
            1 => 
            array (
                'id' => '8382',
                'cd_procedimento' => '10101020',
                'ds_procedimento' => 'Em domicílio	                                                                                                                                                                                ',
            ),
            2 => 
            array (
                'id' => '8383',
                'cd_procedimento' => '10101039',
                'ds_procedimento' => 'Em pronto socorro	                                                                                                                                                                            ',
            ),
            3 => 
            array (
                'id' => '8388',
                'cd_procedimento' => '10104011',
            'ds_procedimento' => 'Atendimento do intensivista diarista (por dia e por paciente)	                                                                                                                                ',
            ),
            4 => 
            array (
                'id' => '8434',
                'cd_procedimento' => '20103182',
                'ds_procedimento' => 'Desvios posturais da coluna vertebral	                                                                                                                                                        ',
            ),
            5 => 
            array (
                'id' => '8450',
                'cd_procedimento' => '20103344',
                'ds_procedimento' => 'Miopatias	                                                                                                                                                                                    ',
            ),
            6 => 
            array (
                'id' => '8459',
                'cd_procedimento' => '20103441',
                'ds_procedimento' => 'Paraparesia/tetraparesia	                                                                                                                                                                    ',
            ),
            7 => 
            array (
                'id' => '8460',
                'cd_procedimento' => '20103450',
                'ds_procedimento' => 'Paraplegia e tetraplegia	                                                                                                                                                                    ',
            ),
            8 => 
            array (
                'id' => '8461',
                'cd_procedimento' => '20103468',
                'ds_procedimento' => 'Parkinson	                                                                                                                                                                                    ',
            ),
            9 => 
            array (
                'id' => '8463',
                'cd_procedimento' => '20103514',
                'ds_procedimento' => 'Patologia osteomioarticular em diferentes segmentos da coluna	                                                                                                                                ',
            ),
            10 => 
            array (
                'id' => '8465',
                'cd_procedimento' => '20103484',
                'ds_procedimento' => 'Patologia osteomioarticular em um membro	                                                                                                                                                    ',
            ),
            11 => 
            array (
                'id' => '8466',
                'cd_procedimento' => '20103506',
                'ds_procedimento' => 'Patologia osteomioarticular em um segmento da coluna	                                                                                                                                        ',
            ),
            12 => 
            array (
                'id' => '8484',
                'cd_procedimento' => '20103689',
                'ds_procedimento' => 'Retardo do desenvolvimento psicomotor	                                                                                                                                                        ',
            ),
            13 => 
            array (
                'id' => '8487',
                'cd_procedimento' => '20103719',
                'ds_procedimento' => 'Sinusites	                                                                                                                                                                                    ',
            ),
            14 => 
            array (
                'id' => '8494',
                'cd_procedimento' => '20104316',
            'ds_procedimento' => 'Curativo de ouvido (cada)	                                                                                                                                                                    ',
            ),
            15 => 
            array (
                'id' => '8520',
                'cd_procedimento' => '20201028',
                'ds_procedimento' => 'Acompanhamento peroperatório	                                                                                                                                                                ',
            ),
            16 => 
            array (
                'id' => '8556',
                'cd_procedimento' => '30101948',
                'ds_procedimento' => 'Cantoplastia ungueal	                                                                                                                                                                        ',
            ),
            17 => 
            array (
                'id' => '8575',
                'cd_procedimento' => '30101301',
                'ds_procedimento' => 'Enxerto cartilaginoso	                                                                                                                                                                        ',
            ),
            18 => 
            array (
                'id' => '8576',
                'cd_procedimento' => '30101310',
                'ds_procedimento' => 'Enxerto composto	                                                                                                                                                                            ',
            ),
            19 => 
            array (
                'id' => '8577',
                'cd_procedimento' => '30101328',
                'ds_procedimento' => 'Enxerto de mucosa	                                                                                                                                                                            ',
            ),
            20 => 
            array (
                'id' => '8582',
                'cd_procedimento' => '30101379',
                'ds_procedimento' => 'Escalpo total - tratamento cirúrgico	                                                                                                                                                        ',
            ),
            21 => 
            array (
                'id' => '8625',
                'cd_procedimento' => '30101824',
                'ds_procedimento' => 'Tratamento cirúrgico de bridas constrictivas	                                                                                                                                                ',
            ),
            22 => 
            array (
                'id' => '8640',
                'cd_procedimento' => '30201055',
                'ds_procedimento' => 'Excisão em cunha	                                                                                                                                                                            ',
            ),
            23 => 
            array (
                'id' => '8641',
                'cd_procedimento' => '30201063',
                'ds_procedimento' => 'Frenotomia labial	                                                                                                                                                                            ',
            ),
            24 => 
            array (
                'id' => '8647',
                'cd_procedimento' => '30202019',
                'ds_procedimento' => 'Alongamento cirúrgico do palato mole	                                                                                                                                                        ',
            ),
            25 => 
            array (
                'id' => '8650',
                'cd_procedimento' => '30202043',
                'ds_procedimento' => 'Excisão de tumor de boca com mandibulectomia	                                                                                                                                                ',
            ),
            26 => 
            array (
                'id' => '8657',
                'cd_procedimento' => '30202124',
                'ds_procedimento' => 'Palatoplastia parcial	                                                                                                                                                                        ',
            ),
            27 => 
            array (
                'id' => '8675',
                'cd_procedimento' => '30205034',
                'ds_procedimento' => 'Adeno-amigdalectomia	                                                                                                                                                                        ',
            ),
            28 => 
            array (
                'id' => '8678',
                'cd_procedimento' => '30205050',
                'ds_procedimento' => 'Amigdalectomia das palatinas	                                                                                                                                                                ',
            ),
            29 => 
            array (
                'id' => '8683',
                'cd_procedimento' => '30205107',
                'ds_procedimento' => 'Corpo estranho de faringe - retirada sob anestesia geral	                                                                                                                                    ',
            ),
            30 => 
            array (
                'id' => '8685',
                'cd_procedimento' => '30205140',
                'ds_procedimento' => 'Faringolaringectomia	                                                                                                                                                                        ',
            ),
            31 => 
            array (
                'id' => '8686',
                'cd_procedimento' => '30205158',
                'ds_procedimento' => 'Faringolaringoesofagectomia total	                                                                                                                                                            ',
            ),
            32 => 
            array (
                'id' => '8694',
                'cd_procedimento' => '30205220',
                'ds_procedimento' => 'Tonsilectomia a laser	                                                                                                                                                                        ',
            ),
            33 => 
            array (
                'id' => '8696',
                'cd_procedimento' => '30205247',
            'ds_procedimento' => 'Uvulopalatofaringoplastia (qualquer técnica)	                                                                                                                                                ',
            ),
            34 => 
            array (
                'id' => '8698',
                'cd_procedimento' => '30206014',
                'ds_procedimento' => 'Alargamento de traqueostomia	                                                                                                                                                                ',
            ),
            35 => 
            array (
                'id' => '8700',
                'cd_procedimento' => '30206030',
                'ds_procedimento' => 'Aritenoidectomia ou aritenopexia via externa	                                                                                                                                                ',
            ),
            36 => 
            array (
                'id' => '8704',
                'cd_procedimento' => '30206120',
                'ds_procedimento' => 'Laringectomia parcial	                                                                                                                                                                        ',
            ),
            37 => 
            array (
                'id' => '8707',
                'cd_procedimento' => '30206200',
                'ds_procedimento' => 'Laringotraqueoplastia	                                                                                                                                                                        ',
            ),
            38 => 
            array (
                'id' => '8744',
                'cd_procedimento' => '30208050',
                'ds_procedimento' => 'Osteotomia tipo Lefort I	                                                                                                                                                                    ',
            ),
            39 => 
            array (
                'id' => '8745',
                'cd_procedimento' => '30208068',
                'ds_procedimento' => 'Osteotomia tipo Lefort II	                                                                                                                                                                    ',
            ),
            40 => 
            array (
                'id' => '8757',
                'cd_procedimento' => '30209030',
                'ds_procedimento' => 'Osteoplastias do arco zigomático	                                                                                                                                                            ',
            ),
            41 => 
            array (
                'id' => '8761',
                'cd_procedimento' => '30210119',
                'ds_procedimento' => 'Exérese de tumor maligno de pele	                                                                                                                                                            ',
            ),
            42 => 
            array (
                'id' => '8773',
                'cd_procedimento' => '30211050',
                'ds_procedimento' => 'Mandibulectomia total	                                                                                                                                                                        ',
            ),
            43 => 
            array (
                'id' => '8775',
                'cd_procedimento' => '30212014',
                'ds_procedimento' => 'Cervicotomia exploradora	                                                                                                                                                                    ',
            ),
            44 => 
            array (
                'id' => '8781',
                'cd_procedimento' => '30212073',
                'ds_procedimento' => 'Exérese de cisto tireoglosso	                                                                                                                                                                ',
            ),
            45 => 
            array (
                'id' => '8783',
                'cd_procedimento' => '30212090',
                'ds_procedimento' => 'Linfadenectomia profunda	                                                                                                                                                                    ',
            ),
            46 => 
            array (
                'id' => '8785',
                'cd_procedimento' => '30212111',
                'ds_procedimento' => 'Neuroblastoma cervical - exérese	                                                                                                                                                            ',
            ),
            47 => 
            array (
                'id' => '8798',
                'cd_procedimento' => '30213053',
                'ds_procedimento' => 'Tireoidectomia total	                                                                                                                                                                        ',
            ),
            48 => 
            array (
                'id' => '8804',
                'cd_procedimento' => '30215013',
                'ds_procedimento' => 'Cranioplastia	                                                                                                                                                                                ',
            ),
            49 => 
            array (
                'id' => '8808',
                'cd_procedimento' => '30215056',
                'ds_procedimento' => 'Retirada de cranioplastia	                                                                                                                                                                    ',
            ),
            50 => 
            array (
                'id' => '8809',
                'cd_procedimento' => '30215072',
                'ds_procedimento' => 'Tratamento cirúrgico da craniossinostose	                                                                                                                                                    ',
            ),
            51 => 
            array (
                'id' => '8814',
                'cd_procedimento' => '30301033',
                'ds_procedimento' => 'Blefarorrafia	                                                                                                                                                                                ',
            ),
            52 => 
            array (
                'id' => '8816',
                'cd_procedimento' => '30301050',
                'ds_procedimento' => 'Cantoplastia lateral	                                                                                                                                                                        ',
            ),
            53 => 
            array (
                'id' => '8837',
                'cd_procedimento' => '30301262',
                'ds_procedimento' => 'Triquíase com ou sem enxerto	                                                                                                                                                                ',
            ),
            54 => 
            array (
                'id' => '8859',
                'cd_procedimento' => '30303087',
                'ds_procedimento' => 'Sutura de conjuntiva	                                                                                                                                                                        ',
            ),
            55 => 
            array (
                'id' => '8860',
                'cd_procedimento' => '30303095',
                'ds_procedimento' => 'Transplante de limbo	                                                                                                                                                                        ',
            ),
            56 => 
            array (
                'id' => '8863',
                'cd_procedimento' => '30304024',
                'ds_procedimento' => 'Ceratectomia superficial - monocular	                                                                                                                                                        ',
            ),
            57 => 
            array (
                'id' => '8868',
                'cd_procedimento' => '30304040',
                'ds_procedimento' => 'PTK ceratectomia fototerapêutica - monocular	                                                                                                                                                ',
            ),
            58 => 
            array (
                'id' => '8869',
                'cd_procedimento' => '30304059',
                'ds_procedimento' => 'Recobrimento conjuntival	                                                                                                                                                                    ',
            ),
            59 => 
            array (
                'id' => '8871',
                'cd_procedimento' => '30304075',
                'ds_procedimento' => 'Tarsoconjuntivoceratoplastia	                                                                                                                                                                ',
            ),
            60 => 
            array (
                'id' => '8886',
                'cd_procedimento' => '30307040',
                'ds_procedimento' => 'Implante de silicone intravítreo	                                                                                                                                                            ',
            ),
            61 => 
            array (
                'id' => '8893',
                'cd_procedimento' => '30307112',
                'ds_procedimento' => 'Vitrectomia anterior	                                                                                                                                                                        ',
            ),
            62 => 
            array (
                'id' => '8897',
                'cd_procedimento' => '30308038',
                'ds_procedimento' => 'Sutura de esclera	                                                                                                                                                                            ',
            ),
            63 => 
            array (
                'id' => '8903',
                'cd_procedimento' => '30310032',
                'ds_procedimento' => 'Cirurgias fistulizantes antiglaucomatosas	                                                                                                                                                    ',
            ),
            64 => 
            array (
                'id' => '8904',
                'cd_procedimento' => '30310040',
                'ds_procedimento' => 'Cirurgias fistulizantes com implantes valvulares	                                                                                                                                            ',
            ),
            65 => 
            array (
                'id' => '8906',
                'cd_procedimento' => '30310067',
            'ds_procedimento' => 'Fototrabeculoplastia (laser)	                                                                                                                                                                ',
            ),
            66 => 
            array (
                'id' => '8907',
                'cd_procedimento' => '30310075',
                'ds_procedimento' => 'Goniotomia ou trabeculotomia	                                                                                                                                                                ',
            ),
            67 => 
            array (
                'id' => '8908',
                'cd_procedimento' => '30310083',
            'ds_procedimento' => 'Iridectomia (laser ou cirúrgica)	                                                                                                                                                            ',
            ),
            68 => 
            array (
                'id' => '8909',
                'cd_procedimento' => '30310091',
                'ds_procedimento' => 'Iridociclectomia	                                                                                                                                                                            ',
            ),
            69 => 
            array (
                'id' => '8911',
                'cd_procedimento' => '30310113',
            'ds_procedimento' => 'Sinequiotomia (laser)	                                                                                                                                                                        ',
            ),
            70 => 
            array (
                'id' => '9085',
                'cd_procedimento' => '30601169',
            'ds_procedimento' => 'Toracoplastia (qualquer técnica)	                                                                                                                                                            ',
            ),
            71 => 
            array (
                'id' => '9097',
                'cd_procedimento' => '30602050',
                'ds_procedimento' => 'Drenagem de abscesso de mama	                                                                                                                                                                ',
            ),
            72 => 
            array (
                'id' => '9102',
                'cd_procedimento' => '30602106',
                'ds_procedimento' => 'Fistulectomia de mama	                                                                                                                                                                        ',
            ),
            73 => 
            array (
                'id' => '9103',
                'cd_procedimento' => '30602114',
                'ds_procedimento' => 'Ginecomastia - unilateral	                                                                                                                                                                    ',
            ),
            74 => 
            array (
                'id' => '9105',
                'cd_procedimento' => '30602149',
                'ds_procedimento' => 'Mastectomia radical ou radical modificada	                                                                                                                                                    ',
            ),
            75 => 
            array (
                'id' => '9111',
                'cd_procedimento' => '30602190',
                'ds_procedimento' => 'Quadrantectomia e linfadenectomia axilar	                                                                                                                                                    ',
            ),
            76 => 
            array (
                'id' => '9126',
                'cd_procedimento' => '30701058',
                'ds_procedimento' => 'Deltopeitoral	                                                                                                                                                                                ',
            ),
            77 => 
            array (
                'id' => '9128',
                'cd_procedimento' => '30701074',
                'ds_procedimento' => 'Digital do hallux	                                                                                                                                                                            ',
            ),
            78 => 
            array (
                'id' => '9129',
                'cd_procedimento' => '30701082',
                'ds_procedimento' => 'Dorsal do pé	                                                                                                                                                                                ',
            ),
            79 => 
            array (
                'id' => '9130',
                'cd_procedimento' => '30701090',
                'ds_procedimento' => 'Escapular	                                                                                                                                                                                    ',
            ),
            80 => 
            array (
                'id' => '9133',
                'cd_procedimento' => '30701120',
                'ds_procedimento' => 'Inguino-cural	                                                                                                                                                                                ',
            ),
            81 => 
            array (
                'id' => '9136',
                'cd_procedimento' => '30701155',
                'ds_procedimento' => 'Outros transplantes cutâneos	                                                                                                                                                                ',
            ),
            82 => 
            array (
                'id' => '9137',
                'cd_procedimento' => '30701163',
                'ds_procedimento' => 'Paraescapular	                                                                                                                                                                                ',
            ),
            83 => 
            array (
                'id' => '9139',
                'cd_procedimento' => '30701180',
                'ds_procedimento' => 'Temporal	                                                                                                                                                                                    ',
            ),
            84 => 
            array (
                'id' => '9141',
                'cd_procedimento' => '30702011',
            'ds_procedimento' => 'Grande dorsal (latissimus dorsi)	                                                                                                                                                            ',
            ),
            85 => 
            array (
                'id' => '9144',
                'cd_procedimento' => '30702046',
            'ds_procedimento' => 'Reto abdominal (rectus abdominis)	                                                                                                                                                            ',
            ),
            86 => 
            array (
                'id' => '9146',
                'cd_procedimento' => '30702062',
            'ds_procedimento' => 'Serrato maior (serratus)	                                                                                                                                                                    ',
            ),
            87 => 
            array (
                'id' => '9150',
                'cd_procedimento' => '30702089',
            'ds_procedimento' => 'Trapézio (trapezius)	                                                                                                                                                                        ',
            ),
            88 => 
            array (
                'id' => '9152',
                'cd_procedimento' => '30703026',
            'ds_procedimento' => 'Extensor comum dos dedos (extensor digitorum longus)	                                                                                                                                        ',
            ),
            89 => 
            array (
                'id' => '9155',
                'cd_procedimento' => '30703050',
            'ds_procedimento' => 'Grande dorsal (latissimus dorsi)	                                                                                                                                                            ',
            ),
            90 => 
            array (
                'id' => '9160',
                'cd_procedimento' => '30703107',
            'ds_procedimento' => 'Primeiro radial externo (extensor carpi radialis longus)	                                                                                                                                    ',
            ),
            91 => 
            array (
                'id' => '9163',
                'cd_procedimento' => '30703131',
            'ds_procedimento' => 'Sartório (sartorius)	                                                                                                                                                                        ',
            ),
            92 => 
            array (
                'id' => '9164',
                'cd_procedimento' => '30703140',
            'ds_procedimento' => 'Semimembranoso (semimembranosus)	                                                                                                                                                            ',
            ),
            93 => 
            array (
                'id' => '9166',
                'cd_procedimento' => '30703166',
            'ds_procedimento' => 'Serrato maior (serratus)	                                                                                                                                                                    ',
            ),
            94 => 
            array (
                'id' => '9167',
                'cd_procedimento' => '30703174',
            'ds_procedimento' => 'Supinador longo (brachioradialis)	                                                                                                                                                            ',
            ),
            95 => 
            array (
                'id' => '9172',
                'cd_procedimento' => '30704049',
                'ds_procedimento' => 'Osteocutâneos de costela	                                                                                                                                                                    ',
            ),
            96 => 
            array (
                'id' => '9205',
                'cd_procedimento' => '30712017',
                'ds_procedimento' => 'Áxilo-palmar ou pendente	                                                                                                                                                                    ',
            ),
            97 => 
            array (
                'id' => '9206',
                'cd_procedimento' => '30712025',
                'ds_procedimento' => 'Bota com ou sem salto	                                                                                                                                                                        ',
            ),
            98 => 
            array (
                'id' => '9207',
                'cd_procedimento' => '30712033',
                'ds_procedimento' => 'Colar	                                                                                                                                                                                        ',
            ),
            99 => 
            array (
                'id' => '9212',
                'cd_procedimento' => '30712084',
                'ds_procedimento' => 'Inguino-maleolar	                                                                                                                                                                            ',
            ),
            100 => 
            array (
                'id' => '9213',
                'cd_procedimento' => '30712092',
                'ds_procedimento' => 'Luva	                                                                                                                                                                                        ',
            ),
            101 => 
            array (
                'id' => '9214',
                'cd_procedimento' => '30712106',
                'ds_procedimento' => 'Minerva ou Risser para escoliose	                                                                                                                                                            ',
            ),
            102 => 
            array (
                'id' => '9216',
                'cd_procedimento' => '30712122',
                'ds_procedimento' => 'Spica-gessada	                                                                                                                                                                                ',
            ),
            103 => 
            array (
                'id' => '9217',
                'cd_procedimento' => '30712130',
                'ds_procedimento' => 'Tipo Velpeau	                                                                                                                                                                                ',
            ),
            104 => 
            array (
                'id' => '9221',
                'cd_procedimento' => '30713048',
                'ds_procedimento' => 'Enxertos em outras pseudartroses	                                                                                                                                                            ',
            ),
            105 => 
            array (
                'id' => '9238',
                'cd_procedimento' => '30715105',
                'ds_procedimento' => 'Dorso curvo / escoliose / giba costal - tratamento cirúrgico	                                                                                                                                ',
            ),
            106 => 
            array (
                'id' => '9261',
                'cd_procedimento' => '30715342',
            'ds_procedimento' => 'Tratamento conservador do traumatismo raquimedular (por dia)	                                                                                                                                ',
            ),
            107 => 
            array (
                'id' => '9289',
                'cd_procedimento' => '30719011',
                'ds_procedimento' => 'Artrodese - tratamento cirúrgico	                                                                                                                                                            ',
            ),
            108 => 
            array (
                'id' => '9290',
                'cd_procedimento' => '30719135',
                'ds_procedimento' => 'Artrodiastase - tratamento cirúrgico com fixador externo	                                                                                                                                    ',
            ),
            109 => 
            array (
                'id' => '9291',
                'cd_procedimento' => '30719020',
                'ds_procedimento' => 'Artroplastia com implante - tratamento cirúrgico	                                                                                                                                            ',
            ),
            110 => 
            array (
                'id' => '9316',
                'cd_procedimento' => '30720176',
                'ds_procedimento' => 'Tratamento cirúrgico de fraturas com fixador externo	                                                                                                                                        ',
            ),
            111 => 
            array (
                'id' => '9320',
                'cd_procedimento' => '30721032',
                'ds_procedimento' => 'Artrodese entre os ossos do carpo	                                                                                                                                                            ',
            ),
            112 => 
            array (
                'id' => '9328',
                'cd_procedimento' => '30721121',
                'ds_procedimento' => 'Encurtamento rádio/ulnar	                                                                                                                                                                    ',
            ),
            113 => 
            array (
                'id' => '9335',
                'cd_procedimento' => '30721210',
                'ds_procedimento' => 'Pseudartroses - tratamento cirúrgico	                                                                                                                                                        ',
            ),
            114 => 
            array (
                'id' => '9338',
                'cd_procedimento' => '30721245',
                'ds_procedimento' => 'Sinovectomia de punho - tratamento cirúrgico	                                                                                                                                                ',
            ),
            115 => 
            array (
                'id' => '9342',
                'cd_procedimento' => '30722047',
                'ds_procedimento' => 'Alongamento/transporte ósseo com fixador externo	                                                                                                                                            ',
            ),
            116 => 
            array (
                'id' => '9357',
                'cd_procedimento' => '30722217',
                'ds_procedimento' => 'Capsulectomias única MF e IF	                                                                                                                                                                ',
            ),
            117 => 
            array (
                'id' => '9371',
                'cd_procedimento' => '30722390',
                'ds_procedimento' => 'Fratura/artrodese com fixador externo	                                                                                                                                                        ',
            ),
            118 => 
            array (
                'id' => '9387',
                'cd_procedimento' => '30722551',
                'ds_procedimento' => 'Plástica ungueal	                                                                                                                                                                            ',
            ),
            119 => 
            array (
                'id' => '9392',
                'cd_procedimento' => '30722608',
                'ds_procedimento' => 'Pseudartrose com perda de substâncias de metacarpiano e falanges	                                                                                                                            ',
            ),
            120 => 
            array (
                'id' => '9400',
                'cd_procedimento' => '30722683',
                'ds_procedimento' => 'Reimplante do polegar	                                                                                                                                                                        ',
            ),
            121 => 
            array (
                'id' => '9410',
                'cd_procedimento' => '30722780',
                'ds_procedimento' => 'Sequestrectomias	                                                                                                                                                                            ',
            ),
            122 => 
            array (
                'id' => '9430',
                'cd_procedimento' => '30724040',
                'ds_procedimento' => 'Artrodiastase de quadril	                                                                                                                                                                    ',
            ),
            123 => 
            array (
                'id' => '9448',
                'cd_procedimento' => '30724228',
                'ds_procedimento' => 'Osteotomia - fixador externo	                                                                                                                                                                ',
            ),
            124 => 
            array (
                'id' => '9469',
                'cd_procedimento' => '30725160',
                'ds_procedimento' => 'Tratamento cirúrgico de fraturas com fixador externo	                                                                                                                                        ',
            ),
            125 => 
            array (
                'id' => '9489',
                'cd_procedimento' => '30726212',
                'ds_procedimento' => 'Meniscorrafia - tratamento cirúrgico	                                                                                                                                                        ',
            ),
            126 => 
            array (
                'id' => '9540',
                'cd_procedimento' => '30729106',
                'ds_procedimento' => 'Deformidade dos dedos - tratamento cirúrgico	                                                                                                                                                ',
            ),
            127 => 
            array (
                'id' => '9562',
                'cd_procedimento' => '30729335',
                'ds_procedimento' => 'Tratamento cirúrgico de polidactilia simples	                                                                                                                                                ',
            ),
            128 => 
            array (
                'id' => '9584',
                'cd_procedimento' => '30731070',
                'ds_procedimento' => 'Tenoartroplastia para ossos do carpo	                                                                                                                                                        ',
            ),
            129 => 
            array (
                'id' => '9585',
                'cd_procedimento' => '30731089',
                'ds_procedimento' => 'Tenodese	                                                                                                                                                                                    ',
            ),
            130 => 
            array (
                'id' => '9596',
                'cd_procedimento' => '30731194',
                'ds_procedimento' => 'Tenossinovites infecciosas - drenagem	                                                                                                                                                        ',
            ),
            131 => 
            array (
                'id' => '9597',
                'cd_procedimento' => '30731208',
                'ds_procedimento' => 'Tenotomia	                                                                                                                                                                                    ',
            ),
            132 => 
            array (
                'id' => '9619',
                'cd_procedimento' => '30733022',
                'ds_procedimento' => 'Sinovectomia parcial ou subtotal	                                                                                                                                                            ',
            ),
            133 => 
            array (
                'id' => '9626',
                'cd_procedimento' => '30734029',
                'ds_procedimento' => 'Sinovectomia parcial ou subtotal	                                                                                                                                                            ',
            ),
            134 => 
            array (
                'id' => '9629',
                'cd_procedimento' => '30735076',
                'ds_procedimento' => 'Instabilidade multidirecional	                                                                                                                                                                ',
            ),
            135 => 
            array (
                'id' => '9630',
                'cd_procedimento' => '30735041',
                'ds_procedimento' => 'Lesão labral	                                                                                                                                                                                ',
            ),
            136 => 
            array (
                'id' => '9634',
                'cd_procedimento' => '30735025',
                'ds_procedimento' => 'Sinovectomia parcial ou subtotal	                                                                                                                                                            ',
            ),
            137 => 
            array (
                'id' => '8915',
                'cd_procedimento' => '30311047',
                'ds_procedimento' => 'Estrabismo horizontal - monocular	                                                                                                                                                            ',
            ),
            138 => 
            array (
                'id' => '8924',
                'cd_procedimento' => '30312086',
                'ds_procedimento' => 'Retinopexia com introflexão escleral	                                                                                                                                                        ',
            ),
            139 => 
            array (
                'id' => '8927',
                'cd_procedimento' => '30312116',
                'ds_procedimento' => 'Retinotomia relaxante	                                                                                                                                                                        ',
            ),
            140 => 
            array (
                'id' => '8933',
                'cd_procedimento' => '30313066',
                'ds_procedimento' => 'Sondagem das vias lacrimais - com ou sem lavagem	                                                                                                                                            ',
            ),
            141 => 
            array (
                'id' => '8945',
                'cd_procedimento' => '30402026',
            'ds_procedimento' => 'Biópsia (orelha externa)	                                                                                                                                                                    ',
            ),
            142 => 
            array (
                'id' => '8959',
                'cd_procedimento' => '30403081',
                'ds_procedimento' => 'Mastoidectomia simples ou radical modificada	                                                                                                                                                ',
            ),
            143 => 
            array (
                'id' => '8962',
                'cd_procedimento' => '30403162',
                'ds_procedimento' => 'Paracentese do tímpano, unilateral, em hospital/anest. geral	                                                                                                                                ',
            ),
            144 => 
            array (
                'id' => '8966',
                'cd_procedimento' => '30403146',
                'ds_procedimento' => 'Timpanotomia exploradora - unilateral	                                                                                                                                                        ',
            ),
            145 => 
            array (
                'id' => '8976',
                'cd_procedimento' => '30404096',
                'ds_procedimento' => 'Neurectomia vestibular para fossa média ou posterior	                                                                                                                                        ',
            ),
            146 => 
            array (
                'id' => '8983',
                'cd_procedimento' => '30501059',
                'ds_procedimento' => 'Biópsia de nariz	                                                                                                                                                                            ',
            ),
            147 => 
            array (
                'id' => '8988',
                'cd_procedimento' => '30501474',
            'ds_procedimento' => 'Corpos estranhos - retirada sob anestesia geral / hospital (nariz) - por videoendoscopia	                                                                                                    ',
            ),
            148 => 
            array (
                'id' => '8994',
                'cd_procedimento' => '30501156',
                'ds_procedimento' => 'Epistaxe - tamponamento  antero-posterior	                                                                                                                                                    ',
            ),
            149 => 
            array (
                'id' => '8995',
                'cd_procedimento' => '30501164',
                'ds_procedimento' => 'Epistaxe - tamponamento anterior	                                                                                                                                                            ',
            ),
            150 => 
            array (
                'id' => '8996',
                'cd_procedimento' => '30501172',
                'ds_procedimento' => 'Epistaxe - tamponamento antero-posterior sob anestesia geral	                                                                                                                                ',
            ),
            151 => 
            array (
                'id' => '9006',
                'cd_procedimento' => '30501261',
                'ds_procedimento' => 'Ozena - tratamento cirúrgico	                                                                                                                                                                ',
            ),
            152 => 
            array (
                'id' => '9007',
                'cd_procedimento' => '30501504',
                'ds_procedimento' => 'Ozena - tratamento cirúrgico por videoendoscopia	                                                                                                                                            ',
            ),
            153 => 
            array (
                'id' => '9010',
                'cd_procedimento' => '30501288',
                'ds_procedimento' => 'Polipectomia - unilateral	                                                                                                                                                                    ',
            ),
            154 => 
            array (
                'id' => '9015',
                'cd_procedimento' => '30501334',
                'ds_procedimento' => 'Rinectomia total	                                                                                                                                                                            ',
            ),
            155 => 
            array (
                'id' => '9020',
                'cd_procedimento' => '30501539',
                'ds_procedimento' => 'Septoplastia por videoendoscopia	                                                                                                                                                            ',
            ),
            156 => 
            array (
                'id' => '9024',
                'cd_procedimento' => '30501407',
                'ds_procedimento' => 'Tratamento cirúrgico do rinofima	                                                                                                                                                            ',
            ),
            157 => 
            array (
                'id' => '9027',
                'cd_procedimento' => '30501431',
                'ds_procedimento' => 'Tumor intranasal - exérese por rinotomia lateral	                                                                                                                                            ',
            ),
            158 => 
            array (
                'id' => '9029',
                'cd_procedimento' => '30501458',
                'ds_procedimento' => 'Turbinectomia ou turbinoplastia - unilateral	                                                                                                                                                ',
            ),
            159 => 
            array (
                'id' => '9037',
                'cd_procedimento' => '30502047',
                'ds_procedimento' => 'Cisto naso-alveolar e globular - exérese	                                                                                                                                                    ',
            ),
            160 => 
            array (
                'id' => '9039',
                'cd_procedimento' => '30502071',
                'ds_procedimento' => 'Etmoidectomia externa	                                                                                                                                                                        ',
            ),
            161 => 
            array (
                'id' => '9040',
                'cd_procedimento' => '30502080',
                'ds_procedimento' => 'Etmoidectomia intranasal	                                                                                                                                                                    ',
            ),
            162 => 
            array (
                'id' => '9041',
                'cd_procedimento' => '30502314',
                'ds_procedimento' => 'Etmoidectomia intranasal por videoendoscopia	                                                                                                                                                ',
            ),
            163 => 
            array (
                'id' => '9043',
                'cd_procedimento' => '30502101',
                'ds_procedimento' => 'Exérese de tumor de seios paranasais por via endoscopica	                                                                                                                                    ',
            ),
            164 => 
            array (
                'id' => '9047',
                'cd_procedimento' => '30502144',
                'ds_procedimento' => 'Maxilectomia parcial	                                                                                                                                                                        ',
            ),
            165 => 
            array (
                'id' => '9054',
                'cd_procedimento' => '30502225',
                'ds_procedimento' => 'Sinusectomia fronto-etmoidal por via externa	                                                                                                                                                ',
            ),
            166 => 
            array (
                'id' => '9055',
                'cd_procedimento' => '30502209',
                'ds_procedimento' => 'Sinusectomia maxilar - via endonasal	                                                                                                                                                        ',
            ),
            167 => 
            array (
                'id' => '9056',
                'cd_procedimento' => '30502322',
                'ds_procedimento' => 'Sinusectomia maxilar - via endonasal por videoendoscopia	                                                                                                                                    ',
            ),
            168 => 
            array (
                'id' => '9067',
                'cd_procedimento' => '30601029',
            'ds_procedimento' => 'Costectomia (porte para 1 arco costal, 30% deste porte para cada arco adicional)	                                                                                                            ',
            ),
            169 => 
            array (
                'id' => '9082',
                'cd_procedimento' => '30601290',
                'ds_procedimento' => 'Ressutura de parede torácica	                                                                                                                                                                ',
            ),
            170 => 
            array (
                'id' => '9084',
                'cd_procedimento' => '30601150',
                'ds_procedimento' => 'Toracectomia	                                                                                                                                                                                ',
            ),
            171 => 
            array (
                'id' => '10275',
                'cd_procedimento' => '31101550',
                'ds_procedimento' => 'Nefrectomia radical laparoscópica unilateral	                                                                                                                                                ',
            ),
            172 => 
            array (
                'id' => '10277',
                'cd_procedimento' => '31101194',
                'ds_procedimento' => 'Nefrectomia total unilateral	                                                                                                                                                                ',
            ),
            173 => 
            array (
                'id' => '10280',
                'cd_procedimento' => '31101216',
                'ds_procedimento' => 'Nefrolitotomia anatrófica unilateral	                                                                                                                                                        ',
            ),
            174 => 
            array (
                'id' => '10281',
                'cd_procedimento' => '31101224',
                'ds_procedimento' => 'Nefrolitotomia percutânea unilateral	                                                                                                                                                        ',
            ),
            175 => 
            array (
                'id' => '10282',
                'cd_procedimento' => '31101232',
                'ds_procedimento' => 'Nefrolitotomia simples unilateral	                                                                                                                                                            ',
            ),
            176 => 
            array (
                'id' => '10288',
                'cd_procedimento' => '31101283',
                'ds_procedimento' => 'Nefropexia unilateral	                                                                                                                                                                        ',
            ),
            177 => 
            array (
                'id' => '10295',
                'cd_procedimento' => '31101348',
                'ds_procedimento' => 'Pielolitotomia com nefrolitotomia simples unilateral	                                                                                                                                        ',
            ),
            178 => 
            array (
                'id' => '10297',
                'cd_procedimento' => '31101356',
                'ds_procedimento' => 'Pielolitotomia unilateral	                                                                                                                                                                    ',
            ),
            179 => 
            array (
                'id' => '10298',
                'cd_procedimento' => '31101364',
                'ds_procedimento' => 'Pieloplastia	                                                                                                                                                                                ',
            ),
            180 => 
            array (
                'id' => '10301',
                'cd_procedimento' => '31101380',
                'ds_procedimento' => 'Pielotomia exploradora unilateral	                                                                                                                                                            ',
            ),
            181 => 
            array (
                'id' => '10305',
                'cd_procedimento' => '31101429',
            'ds_procedimento' => 'Sinfisiotomia (rim em ferradura)	                                                                                                                                                            ',
            ),
            182 => 
            array (
                'id' => '10328',
                'cd_procedimento' => '31102204',
                'ds_procedimento' => 'Reimplante uretero-vesical unilateral - via combinada	                                                                                                                                        ',
            ),
            183 => 
            array (
                'id' => '10331',
                'cd_procedimento' => '31102247',
                'ds_procedimento' => 'Ureterectomia unilateral	                                                                                                                                                                    ',
            ),
            184 => 
            array (
                'id' => '10334',
                'cd_procedimento' => '31102271',
                'ds_procedimento' => 'Ureteroileocistostomia unilateral	                                                                                                                                                            ',
            ),
            185 => 
            array (
                'id' => '10335',
                'cd_procedimento' => '31102280',
                'ds_procedimento' => 'Ureteroileostomia cutânea unilateral	                                                                                                                                                        ',
            ),
            186 => 
            array (
                'id' => '10343',
                'cd_procedimento' => '31102344',
                'ds_procedimento' => 'Ureteroplastia unilateral	                                                                                                                                                                    ',
            ),
            187 => 
            array (
                'id' => '10344',
                'cd_procedimento' => '31102352',
                'ds_procedimento' => 'Ureterorrenolitotomia unilateral	                                                                                                                                                            ',
            ),
            188 => 
            array (
                'id' => '10349',
                'cd_procedimento' => '31102417',
                'ds_procedimento' => 'Ureterossigmoidostomia unilateral	                                                                                                                                                            ',
            ),
            189 => 
            array (
                'id' => '10350',
                'cd_procedimento' => '31102425',
                'ds_procedimento' => 'Ureterostomia cutânea unilateral	                                                                                                                                                            ',
            ),
            190 => 
            array (
                'id' => '10354',
                'cd_procedimento' => '31102468',
                'ds_procedimento' => 'Ureteroureterocistoneostomia	                                                                                                                                                                ',
            ),
            191 => 
            array (
                'id' => '10366',
                'cd_procedimento' => '31103081',
                'ds_procedimento' => 'Cistectomia total	                                                                                                                                                                            ',
            ),
            192 => 
            array (
                'id' => '10368',
                'cd_procedimento' => '31103561',
                'ds_procedimento' => 'Cistolitotripsia a laser	                                                                                                                                                                    ',
            ),
            193 => 
            array (
                'id' => '10372',
                'cd_procedimento' => '31103146',
            'ds_procedimento' => 'Cistolitotripsia transuretral (U.S., E.H., E.C.)	                                                                                                                                            ',
            ),
            194 => 
            array (
                'id' => '10373',
                'cd_procedimento' => '31103154',
                'ds_procedimento' => 'Cistoplastia redutora	                                                                                                                                                                        ',
            ),
            195 => 
            array (
                'id' => '10374',
                'cd_procedimento' => '31103162',
            'ds_procedimento' => 'Cistorrafia (trauma)	                                                                                                                                                                        ',
            ),
            196 => 
            array (
                'id' => '10376',
                'cd_procedimento' => '31103189',
                'ds_procedimento' => 'Cistostomia com procedimento endoscópico	                                                                                                                                                    ',
            ),
            197 => 
            array (
                'id' => '10383',
                'cd_procedimento' => '31103243',
                'ds_procedimento' => 'Diverticulectomia vesical	                                                                                                                                                                    ',
            ),
            198 => 
            array (
                'id' => '10398',
                'cd_procedimento' => '31103480',
                'ds_procedimento' => 'Neobexiga cutânea continente	                                                                                                                                                                ',
            ),
            199 => 
            array (
                'id' => '10401',
                'cd_procedimento' => '31103502',
                'ds_procedimento' => 'Neobexiga uretral continente	                                                                                                                                                                ',
            ),
            200 => 
            array (
                'id' => '10410',
                'cd_procedimento' => '31103464',
                'ds_procedimento' => 'Vesicostomia cutânea	                                                                                                                                                                        ',
            ),
            201 => 
            array (
                'id' => '10432',
                'cd_procedimento' => '31104215',
                'ds_procedimento' => 'Uretrostomia	                                                                                                                                                                                ',
            ),
            202 => 
            array (
                'id' => '10446',
                'cd_procedimento' => '31201148',
                'ds_procedimento' => 'Prostatavesiculectomia radical laparoscópica	                                                                                                                                                ',
            ),
            203 => 
            array (
                'id' => '10449',
                'cd_procedimento' => '31202020',
                'ds_procedimento' => 'Drenagem de abscesso	                                                                                                                                                                        ',
            ),
            204 => 
            array (
                'id' => '10470',
                'cd_procedimento' => '31204023',
                'ds_procedimento' => 'Drenagem de abscesso	                                                                                                                                                                        ',
            ),
            205 => 
            array (
                'id' => '10477',
                'cd_procedimento' => '31205046',
                'ds_procedimento' => 'Vasectomia unilateral	                                                                                                                                                                        ',
            ),
            206 => 
            array (
                'id' => '10488',
                'cd_procedimento' => '31206107',
                'ds_procedimento' => 'Hipospadia - por estágio	                                                                                                                                                                    ',
            ),
            207 => 
            array (
                'id' => '10489',
                'cd_procedimento' => '31206115',
                'ds_procedimento' => 'Hipospadia distal - tratamento em 1 tempo	                                                                                                                                                    ',
            ),
            208 => 
            array (
                'id' => '10492',
                'cd_procedimento' => '31206158',
                'ds_procedimento' => 'Neofaloplastia - por estágio	                                                                                                                                                                ',
            ),
            209 => 
            array (
                'id' => '10500',
                'cd_procedimento' => '31206239',
                'ds_procedimento' => 'Priapismo - tratamento cirúrgico	                                                                                                                                                            ',
            ),
            210 => 
            array (
                'id' => '10505',
                'cd_procedimento' => '31301029',
                'ds_procedimento' => 'Biópsia de vulva	                                                                                                                                                                            ',
            ),
            211 => 
            array (
                'id' => '10507',
                'cd_procedimento' => '31301045',
            'ds_procedimento' => 'Clitorectomia (parcial ou total)	                                                                                                                                                            ',
            ),
            212 => 
            array (
                'id' => '10515',
                'cd_procedimento' => '31301126',
                'ds_procedimento' => 'Vulvectomia ampliada	                                                                                                                                                                        ',
            ),
            213 => 
            array (
                'id' => '10520',
                'cd_procedimento' => '31302033',
            'ds_procedimento' => 'Colpocleise (Lefort)	                                                                                                                                                                        ',
            ),
            214 => 
            array (
                'id' => '10521',
                'cd_procedimento' => '31302041',
                'ds_procedimento' => 'Colpoplastia anterior	                                                                                                                                                                        ',
            ),
            215 => 
            array (
                'id' => '10522',
                'cd_procedimento' => '31302050',
                'ds_procedimento' => 'Colpoplastia posterior com perineorrafia	                                                                                                                                                    ',
            ),
            216 => 
            array (
                'id' => '10525',
                'cd_procedimento' => '31302084',
                'ds_procedimento' => 'Exérese de cisto vaginal	                                                                                                                                                                    ',
            ),
            217 => 
            array (
                'id' => '10529',
                'cd_procedimento' => '31302122',
            'ds_procedimento' => 'Neovagina (cólon, delgado, tubo de pele)	                                                                                                                                                    ',
            ),
            218 => 
            array (
                'id' => '10538',
                'cd_procedimento' => '31303200',
            'ds_procedimento' => 'Histerectomia subtotal laparoscópica com ou sem anexectomia, uni ou bilateral (via alta)	                                                                                                    ',
            ),
            219 => 
            array (
                'id' => '10547',
                'cd_procedimento' => '31303269',
            'ds_procedimento' => 'Implante de dispositivo intra-uterino (DIU) não hormonal	                                                                                                                                    ',
            ),
            220 => 
            array (
                'id' => '10556',
                'cd_procedimento' => '31304028',
                'ds_procedimento' => 'Neossalpingostomia distal	                                                                                                                                                                    ',
            ),
            221 => 
            array (
                'id' => '10576',
                'cd_procedimento' => '31307035',
            'ds_procedimento' => 'Culdoplastia (Mac Call, Moschowicz, etc.)	                                                                                                                                                    ',
            ),
            222 => 
            array (
                'id' => '10585',
                'cd_procedimento' => '31307086',
                'ds_procedimento' => 'Ligadura de veia ovariana	                                                                                                                                                                    ',
            ),
            223 => 
            array (
                'id' => '10591',
                'cd_procedimento' => '31307116',
                'ds_procedimento' => 'Omentectomia	                                                                                                                                                                                ',
            ),
            224 => 
            array (
                'id' => '10606',
                'cd_procedimento' => '31309046',
            'ds_procedimento' => 'Cerclagem do colo uterino (qualquer técnica)	                                                                                                                                                ',
            ),
            225 => 
            array (
                'id' => '10630',
                'cd_procedimento' => '31401082',
                'ds_procedimento' => 'Implante de cateter intracraniano	                                                                                                                                                            ',
            ),
            226 => 
            array (
                'id' => '10632',
                'cd_procedimento' => '31401104',
                'ds_procedimento' => 'Implante de eletrodos cerebral ou medular	                                                                                                                                                    ',
            ),
            227 => 
            array (
                'id' => '10633',
                'cd_procedimento' => '31401112',
                'ds_procedimento' => 'Implante estereotáxico de cateter para braquiterapia	                                                                                                                                        ',
            ),
            228 => 
            array (
                'id' => '10637',
                'cd_procedimento' => '31401155',
                'ds_procedimento' => 'Microcirurgia para tumores intracranianos	                                                                                                                                                    ',
            ),
            229 => 
            array (
                'id' => '10638',
                'cd_procedimento' => '31401163',
                'ds_procedimento' => 'Microcirurgia por via transesfenoidal	                                                                                                                                                        ',
            ),
            230 => 
            array (
                'id' => '10639',
                'cd_procedimento' => '31401171',
                'ds_procedimento' => 'Microcirurgia vascular intracraniana	                                                                                                                                                        ',
            ),
            231 => 
            array (
                'id' => '10644',
                'cd_procedimento' => '31401244',
                'ds_procedimento' => 'Terceiro ventriculostomia	                                                                                                                                                                    ',
            ),
            232 => 
            array (
                'id' => '10655',
                'cd_procedimento' => '31403018',
                'ds_procedimento' => 'Biópsia de nervo	                                                                                                                                                                            ',
            ),
            233 => 
            array (
                'id' => '10656',
                'cd_procedimento' => '31403026',
                'ds_procedimento' => 'Bloqueio de nervo periférico	                                                                                                                                                                ',
            ),
            234 => 
            array (
                'id' => '10658',
                'cd_procedimento' => '31403042',
                'ds_procedimento' => 'Enxerto de nervo	                                                                                                                                                                            ',
            ),
            235 => 
            array (
                'id' => '10673',
                'cd_procedimento' => '31403212',
                'ds_procedimento' => 'Microneurólise intraneural ou intrafascicular de dois ou mais nervos	                                                                                                                        ',
            ),
            236 => 
            array (
                'id' => '10677',
                'cd_procedimento' => '31403255',
                'ds_procedimento' => 'Microneurorrafia de dedos da mão	                                                                                                                                                            ',
            ),
            237 => 
            array (
                'id' => '10686',
                'cd_procedimento' => '31403344',
                'ds_procedimento' => 'Simpatectomia	                                                                                                                                                                                ',
            ),
            238 => 
            array (
                'id' => '10692',
                'cd_procedimento' => '31405010',
                'ds_procedimento' => 'Bloqueio do sistema nervoso autônomo	                                                                                                                                                        ',
            ),
            239 => 
            array (
                'id' => '10695',
                'cd_procedimento' => '31501028',
                'ds_procedimento' => 'Retirada para transplante	                                                                                                                                                                    ',
            ),
            240 => 
            array (
                'id' => '10700',
                'cd_procedimento' => '31503020',
            'ds_procedimento' => 'Transplante cardiopulmonar (receptor)	                                                                                                                                                        ',
            ),
            241 => 
            array (
                'id' => '10701',
                'cd_procedimento' => '31504019',
            'ds_procedimento' => 'Transplante pulmonar (doador)	                                                                                                                                                                ',
            ),
            242 => 
            array (
                'id' => '10706',
                'cd_procedimento' => '31506046',
                'ds_procedimento' => 'Nefrectomia laparoscópica em doador vivo	                                                                                                                                                    ',
            ),
            243 => 
            array (
                'id' => '10707',
                'cd_procedimento' => '31506011',
            'ds_procedimento' => 'Transplante renal (receptor)	                                                                                                                                                                ',
            ),
            244 => 
            array (
                'id' => '10708',
                'cd_procedimento' => '31507026',
            'ds_procedimento' => 'Transplante pancreático (doador)	                                                                                                                                                            ',
            ),
            245 => 
            array (
                'id' => '10711',
                'cd_procedimento' => '31602010',
                'ds_procedimento' => 'Analgesia controlada pelo paciente - por dia subseqüente	                                                                                                                                    ',
            ),
            246 => 
            array (
                'id' => '10712',
                'cd_procedimento' => '31602029',
                'ds_procedimento' => 'Analgesia por dia subseqüente. Acompanhamento de analgesia por cateter peridural	                                                                                                            ',
            ),
            247 => 
            array (
                'id' => '10721',
                'cd_procedimento' => '31602118',
                'ds_procedimento' => 'Bloqueio de nervo periférico	                                                                                                                                                                ',
            ),
            248 => 
            array (
                'id' => '10738',
                'cd_procedimento' => '40102025',
                'ds_procedimento' => 'Manometria computadorizada anorretal	                                                                                                                                                        ',
            ),
            249 => 
            array (
                'id' => '10746',
                'cd_procedimento' => '40102084',
                'ds_procedimento' => 'pH-metria esofágica computadorizada com um canal	                                                                                                                                            ',
            ),
            250 => 
            array (
                'id' => '10749',
                'cd_procedimento' => '40103030',
                'ds_procedimento' => 'Análise computadorizada do segmento anterior - monocular	                                                                                                                                    ',
            ),
            251 => 
            array (
                'id' => '10750',
                'cd_procedimento' => '40103048',
            'ds_procedimento' => 'Audiometria (tipo Von Bekesy)	                                                                                                                                                                ',
            ),
            252 => 
            array (
                'id' => '10751',
                'cd_procedimento' => '40103064',
            'ds_procedimento' => 'Audiometria de tronco cerebral (PEA) BERA	                                                                                                                                                    ',
            ),
            253 => 
            array (
                'id' => '10756',
                'cd_procedimento' => '40103110',
            'ds_procedimento' => 'Audiometria vocal com mensagem competitiva (SSI, SSW)	                                                                                                                                        ',
            ),
            254 => 
            array (
                'id' => '10761',
                'cd_procedimento' => '40103170',
                'ds_procedimento' => 'EEG de rotina	                                                                                                                                                                                ',
            ),
            255 => 
            array (
                'id' => '10768',
                'cd_procedimento' => '40103285',
                'ds_procedimento' => 'Eletroglotografia	                                                                                                                                                                            ',
            ),
            256 => 
            array (
                'id' => '10770',
                'cd_procedimento' => '40103315',
                'ds_procedimento' => 'Eletroneuromiografia de MMII	                                                                                                                                                                ',
            ),
            257 => 
            array (
                'id' => '10771',
                'cd_procedimento' => '40103323',
                'ds_procedimento' => 'Eletroneuromiografia de MMSS	                                                                                                                                                                ',
            ),
            258 => 
            array (
                'id' => '10779',
                'cd_procedimento' => '40103404',
                'ds_procedimento' => 'Espectrografia vocal	                                                                                                                                                                        ',
            ),
            259 => 
            array (
                'id' => '10782',
                'cd_procedimento' => '40103439',
                'ds_procedimento' => 'Impedanciometria	                                                                                                                                                                            ',
            ),
            260 => 
            array (
                'id' => '10785',
                'cd_procedimento' => '40103463',
                'ds_procedimento' => 'Otoemissões evocadas transientes	                                                                                                                                                            ',
            ),
            261 => 
            array (
                'id' => '10788',
                'cd_procedimento' => '40103510',
            'ds_procedimento' => 'Poligrafia de recém-nascido (maior ou igual 2 horas) (PG/RN)	                                                                                                                                ',
            ),
            262 => 
            array (
                'id' => '10792',
                'cd_procedimento' => '40103552',
                'ds_procedimento' => 'Posturografia	                                                                                                                                                                                ',
            ),
            263 => 
            array (
                'id' => '10793',
                'cd_procedimento' => '40103560',
                'ds_procedimento' => 'Potencial evocado - P300	                                                                                                                                                                    ',
            ),
            264 => 
            array (
                'id' => '10797',
                'cd_procedimento' => '40103595',
            'ds_procedimento' => 'Potencial evocado gênito-cortical (PEGC)	                                                                                                                                                    ',
            ),
            265 => 
            array (
                'id' => '10798',
                'cd_procedimento' => '40103609',
            'ds_procedimento' => 'Potencial evocado motor - PEM (bilateral)	                                                                                                                                                    ',
            ),
            266 => 
            array (
                'id' => '10805',
                'cd_procedimento' => '40103650',
                'ds_procedimento' => 'Registro do nistagmo pendular	                                                                                                                                                                ',
            ),
            267 => 
            array (
                'id' => '10814',
                'cd_procedimento' => '40103765',
                'ds_procedimento' => 'Videonistagmografia infravermelha	                                                                                                                                                            ',
            ),
            268 => 
            array (
                'id' => '10816',
                'cd_procedimento' => '40104028',
                'ds_procedimento' => 'Cronaximetria	                                                                                                                                                                                ',
            ),
            269 => 
            array (
                'id' => '10830',
                'cd_procedimento' => '40201023',
            'ds_procedimento' => 'Anuscopia (interna e externa)	                                                                                                                                                                ',
            ),
            270 => 
            array (
                'id' => '10834',
                'cd_procedimento' => '40201066',
                'ds_procedimento' => 'Cistoscopia e/ou uretroscopia	                                                                                                                                                                ',
            ),
            271 => 
            array (
                'id' => '10840',
                'cd_procedimento' => '40201120',
                'ds_procedimento' => 'Endoscopia digestiva alta	                                                                                                                                                                    ',
            ),
            272 => 
            array (
                'id' => '10841',
                'cd_procedimento' => '40201333',
                'ds_procedimento' => 'Endoscopia digestiva alta com cromoscopia	                                                                                                                                                    ',
            ),
            273 => 
            array (
                'id' => '10843',
                'cd_procedimento' => '40201147',
                'ds_procedimento' => 'Enteroscopia	                                                                                                                                                                                ',
            ),
            274 => 
            array (
                'id' => '10845',
                'cd_procedimento' => '40201163',
                'ds_procedimento' => 'Laparoscopia	                                                                                                                                                                                ',
            ),
            275 => 
            array (
                'id' => '10847',
                'cd_procedimento' => '40201171',
                'ds_procedimento' => 'Retossigmoidoscopia flexível	                                                                                                                                                                ',
            ),
            276 => 
            array (
                'id' => '10872',
                'cd_procedimento' => '40202704',
                'ds_procedimento' => 'Colonoscopia com estenostomia	                                                                                                                                                                ',
            ),
            277 => 
            array (
                'id' => '10874',
                'cd_procedimento' => '40202712',
                'ds_procedimento' => 'Colonoscopia com mucosectomia	                                                                                                                                                                ',
            ),
            278 => 
            array (
                'id' => '10882',
                'cd_procedimento' => '40202208',
                'ds_procedimento' => 'Diverticulotomia	                                                                                                                                                                            ',
            ),
            279 => 
            array (
                'id' => '10888',
                'cd_procedimento' => '40202038',
                'ds_procedimento' => 'Endoscopia digestiva alta com biópsia e/ou citologia	                                                                                                                                        ',
            ),
            280 => 
            array (
                'id' => '10891',
                'cd_procedimento' => '40202267',
                'ds_procedimento' => 'Estenostomia endoscópica	                                                                                                                                                                    ',
            ),
            281 => 
            array (
                'id' => '10892',
                'cd_procedimento' => '40202283',
                'ds_procedimento' => 'Gastrostomia endoscópica	                                                                                                                                                                    ',
            ),
            282 => 
            array (
                'id' => '10895',
                'cd_procedimento' => '40202313',
                'ds_procedimento' => 'Hemostasias de cólon	                                                                                                                                                                        ',
            ),
            283 => 
            array (
                'id' => '10898',
                'cd_procedimento' => '40202356',
                'ds_procedimento' => 'Jejunostomia endoscópica	                                                                                                                                                                    ',
            ),
            284 => 
            array (
                'id' => '10902',
                'cd_procedimento' => '40202763',
                'ds_procedimento' => 'Laringoscopia/traqueoscopia com laser para exérese de papiloma/tumor	                                                                                                                        ',
            ),
            285 => 
            array (
                'id' => '10907',
                'cd_procedimento' => '40202470',
                'ds_procedimento' => 'Mucosectomia	                                                                                                                                                                                ',
            ),
            286 => 
            array (
                'id' => '10930',
                'cd_procedimento' => '40301036',
                'ds_procedimento' => 'Acetaminofen	                                                                                                                                                                                ',
            ),
            287 => 
            array (
                'id' => '10932',
                'cd_procedimento' => '40301052',
                'ds_procedimento' => 'Acetona, dosagem no soro	                                                                                                                                                                    ',
            ),
            288 => 
            array (
                'id' => '9642',
                'cd_procedimento' => '30736021',
                'ds_procedimento' => 'Sinovectomia parcial ou subtotal	                                                                                                                                                            ',
            ),
            289 => 
            array (
                'id' => '9647',
                'cd_procedimento' => '30737028',
                'ds_procedimento' => 'Sinovectomia parcial ou subtotal	                                                                                                                                                            ',
            ),
            290 => 
            array (
                'id' => '9651',
                'cd_procedimento' => '30738032',
                'ds_procedimento' => 'Desbridamento do labrum ou ligamento redondo com ou sem condroplastia	                                                                                                                        ',
            ),
            291 => 
            array (
                'id' => '9663',
                'cd_procedimento' => '30801079',
            'ds_procedimento' => 'Traqueoplastia (qualquer via)	                                                                                                                                                                ',
            ),
            292 => 
            array (
                'id' => '9664',
                'cd_procedimento' => '30801087',
            'ds_procedimento' => 'Traqueorrafia (qualquer via)	                                                                                                                                                                ',
            ),
            293 => 
            array (
                'id' => '9666',
                'cd_procedimento' => '30801095',
                'ds_procedimento' => 'Traqueostomia	                                                                                                                                                                                ',
            ),
            294 => 
            array (
                'id' => '9668',
                'cd_procedimento' => '30801117',
                'ds_procedimento' => 'Traqueostomia mediastinal	                                                                                                                                                                    ',
            ),
            295 => 
            array (
                'id' => '9669',
                'cd_procedimento' => '30801141',
                'ds_procedimento' => 'Traqueotomia ou fechamento cirúrgico	                                                                                                                                                        ',
            ),
            296 => 
            array (
                'id' => '9671',
                'cd_procedimento' => '30802016',
                'ds_procedimento' => 'Broncoplastia e/ou arterioplastia	                                                                                                                                                            ',
            ),
            297 => 
            array (
                'id' => '9673',
                'cd_procedimento' => '30802024',
                'ds_procedimento' => 'Broncotomia e/ou broncorrafia	                                                                                                                                                                ',
            ),
            298 => 
            array (
                'id' => '9676',
                'cd_procedimento' => '30803012',
                'ds_procedimento' => 'Bulectomia unilateral	                                                                                                                                                                        ',
            ),
            299 => 
            array (
                'id' => '9683',
                'cd_procedimento' => '30803055',
                'ds_procedimento' => 'Drenagem tubular aberta de cavidade pulmonar	                                                                                                                                                ',
            ),
            300 => 
            array (
                'id' => '9685',
                'cd_procedimento' => '30803063',
                'ds_procedimento' => 'Embolectomia pulmonar	                                                                                                                                                                        ',
            ),
            301 => 
            array (
                'id' => '9688',
                'cd_procedimento' => '30803217',
                'ds_procedimento' => 'Lobectomia pulmonar por videotoracoscopia	                                                                                                                                                    ',
            ),
            302 => 
            array (
                'id' => '9690',
                'cd_procedimento' => '30803225',
                'ds_procedimento' => 'Metastasectomia pulmonar unilateral por videotoracoscopia	                                                                                                                                    ',
            ),
            303 => 
            array (
                'id' => '9693',
                'cd_procedimento' => '30803128',
                'ds_procedimento' => 'Pneumorrafia	                                                                                                                                                                                ',
            ),
            304 => 
            array (
                'id' => '9695',
                'cd_procedimento' => '30803144',
            'ds_procedimento' => 'Posicionamento de agulhas radiativas por toracotomia (braquiterapia)	                                                                                                                        ',
            ),
            305 => 
            array (
                'id' => '9697',
                'cd_procedimento' => '30803233',
                'ds_procedimento' => 'Segmentectomia por videotoracoscopia	                                                                                                                                                        ',
            ),
            306 => 
            array (
                'id' => '9702',
                'cd_procedimento' => '30804035',
                'ds_procedimento' => 'Pleurectomia	                                                                                                                                                                                ',
            ),
            307 => 
            array (
                'id' => '9705',
                'cd_procedimento' => '30804175',
                'ds_procedimento' => 'Pleurodese por video	                                                                                                                                                                        ',
            ),
            308 => 
            array (
                'id' => '9706',
                'cd_procedimento' => '30804051',
                'ds_procedimento' => 'Pleuroscopia	                                                                                                                                                                                ',
            ),
            309 => 
            array (
                'id' => '9708',
                'cd_procedimento' => '30804060',
            'ds_procedimento' => 'Pleurostomia (aberta)	                                                                                                                                                                        ',
            ),
            310 => 
            array (
                'id' => '9714',
                'cd_procedimento' => '30804124',
                'ds_procedimento' => 'Tenda pleural	                                                                                                                                                                                ',
            ),
            311 => 
            array (
                'id' => '9716',
                'cd_procedimento' => '30804132',
                'ds_procedimento' => 'Toracostomia com drenagem pleural fechada	                                                                                                                                                    ',
            ),
            312 => 
            array (
                'id' => '9717',
                'cd_procedimento' => '30804140',
                'ds_procedimento' => 'Tratamento operatório da hemorragia intrapleural	                                                                                                                                            ',
            ),
            313 => 
            array (
                'id' => '9731',
                'cd_procedimento' => '30805236',
                'ds_procedimento' => 'Mediastinoscopia, via cervical por vídeo	                                                                                                                                                    ',
            ),
            314 => 
            array (
                'id' => '9734',
                'cd_procedimento' => '30805244',
                'ds_procedimento' => 'Mediastinotomia extrapleural por via posterior por vídeo	                                                                                                                                    ',
            ),
            315 => 
            array (
                'id' => '9740',
                'cd_procedimento' => '30805295',
                'ds_procedimento' => 'Retirada de corpo estranho do mediastino	                                                                                                                                                    ',
            ),
            316 => 
            array (
                'id' => '9741',
                'cd_procedimento' => '30805155',
            'ds_procedimento' => 'Timectomia (qualquer via)	                                                                                                                                                                    ',
            ),
            317 => 
            array (
                'id' => '9742',
                'cd_procedimento' => '30805279',
                'ds_procedimento' => 'Timectomia por vídeo	                                                                                                                                                                        ',
            ),
            318 => 
            array (
                'id' => '9743',
                'cd_procedimento' => '30805163',
            'ds_procedimento' => 'Tratamento da mediastinite (qualquer via)	                                                                                                                                                    ',
            ),
            319 => 
            array (
                'id' => '9744',
                'cd_procedimento' => '30805287',
                'ds_procedimento' => 'Tratamento da mediastinite por vídeo	                                                                                                                                                        ',
            ),
            320 => 
            array (
                'id' => '9750',
                'cd_procedimento' => '30806046',
                'ds_procedimento' => 'Implante de marca-passo diafragmático definitivo	                                                                                                                                            ',
            ),
            321 => 
            array (
                'id' => '9763',
                'cd_procedimento' => '30902029',
                'ds_procedimento' => 'Cirurgia multivalvar	                                                                                                                                                                        ',
            ),
            322 => 
            array (
                'id' => '9764',
                'cd_procedimento' => '30902037',
                'ds_procedimento' => 'Comissurotomia valvar	                                                                                                                                                                        ',
            ),
            323 => 
            array (
                'id' => '9766',
                'cd_procedimento' => '30902053',
                'ds_procedimento' => 'Troca valvar	                                                                                                                                                                                ',
            ),
            324 => 
            array (
                'id' => '9767',
                'cd_procedimento' => '30903017',
                'ds_procedimento' => 'Aneurismectomia de VE	                                                                                                                                                                        ',
            ),
            325 => 
            array (
                'id' => '9770',
                'cd_procedimento' => '30903041',
                'ds_procedimento' => 'Ventriculectomia parcial	                                                                                                                                                                    ',
            ),
            326 => 
            array (
                'id' => '9772',
                'cd_procedimento' => '30904021',
                'ds_procedimento' => 'Implante de desfibrilador interno, placas e eletrodos	                                                                                                                                        ',
            ),
            327 => 
            array (
                'id' => '9780',
                'cd_procedimento' => '30904129',
                'ds_procedimento' => 'Troca de gerador	                                                                                                                                                                            ',
            ),
            328 => 
            array (
                'id' => '9786',
                'cd_procedimento' => '30905060',
                'ds_procedimento' => 'Perfusionista	                                                                                                                                                                                ',
            ),
            329 => 
            array (
                'id' => '9787',
                'cd_procedimento' => '30906016',
                'ds_procedimento' => 'Aneurisma de aorta abdominal infra-renal	                                                                                                                                                    ',
            ),
            330 => 
            array (
                'id' => '9788',
                'cd_procedimento' => '30906024',
                'ds_procedimento' => 'Aneurisma de aorta abdominal supra-renal	                                                                                                                                                    ',
            ),
            331 => 
            array (
                'id' => '9800',
                'cd_procedimento' => '30906385',
            'ds_procedimento' => 'Arterioplastia da femoral profunda (profundoplastia)	                                                                                                                                        ',
            ),
            332 => 
            array (
                'id' => '9801',
                'cd_procedimento' => '30906164',
                'ds_procedimento' => 'Cateterismo da artéria radial - para PAM	                                                                                                                                                    ',
            ),
            333 => 
            array (
                'id' => '9803',
                'cd_procedimento' => '30906180',
                'ds_procedimento' => 'Endarterectomia aorto-ilíaca	                                                                                                                                                                ',
            ),
            334 => 
            array (
                'id' => '9807',
                'cd_procedimento' => '30906229',
                'ds_procedimento' => 'Ponte aorto-bifemoral	                                                                                                                                                                        ',
            ),
            335 => 
            array (
                'id' => '9808',
                'cd_procedimento' => '30906237',
                'ds_procedimento' => 'Ponte aorto-biilíaca	                                                                                                                                                                        ',
            ),
            336 => 
            array (
                'id' => '9809',
                'cd_procedimento' => '30906245',
                'ds_procedimento' => 'Ponte aorto-femoral - unilateral	                                                                                                                                                            ',
            ),
            337 => 
            array (
                'id' => '9811',
                'cd_procedimento' => '30906261',
                'ds_procedimento' => 'Ponte axilo-bifemoral	                                                                                                                                                                        ',
            ),
            338 => 
            array (
                'id' => '9813',
                'cd_procedimento' => '30906288',
                'ds_procedimento' => 'Ponte distal	                                                                                                                                                                                ',
            ),
            339 => 
            array (
                'id' => '9815',
                'cd_procedimento' => '30906300',
                'ds_procedimento' => 'Ponte fêmoro-femoral cruzada	                                                                                                                                                                ',
            ),
            340 => 
            array (
                'id' => '9816',
                'cd_procedimento' => '30906318',
                'ds_procedimento' => 'Ponte fêmoro-femoral ipsilateral	                                                                                                                                                            ',
            ),
            341 => 
            array (
                'id' => '9820',
                'cd_procedimento' => '30906350',
                'ds_procedimento' => 'Pontes transcervicais - qualquer tipo	                                                                                                                                                        ',
            ),
            342 => 
            array (
                'id' => '9850',
                'cd_procedimento' => '30908078',
                'ds_procedimento' => 'Fístula arteriovenosa direta	                                                                                                                                                                ',
            ),
            343 => 
            array (
                'id' => '9859',
                'cd_procedimento' => '30910021',
                'ds_procedimento' => 'Aneurismas rotos ou trombosados - outros	                                                                                                                                                    ',
            ),
            344 => 
            array (
                'id' => '9862',
                'cd_procedimento' => '30910056',
                'ds_procedimento' => 'Aneurismas rotos ou trombosados de axilar, femoral, poplítea	                                                                                                                                ',
            ),
            345 => 
            array (
                'id' => '9880',
                'cd_procedimento' => '30911095',
                'ds_procedimento' => 'Cateterismo E e estudo cineangiográfico da aorta e/ou seus ramos	                                                                                                                            ',
            ),
            346 => 
            array (
                'id' => '9895',
                'cd_procedimento' => '30912067',
                'ds_procedimento' => 'Atriosseptostomia por lâmina	                                                                                                                                                                ',
            ),
            347 => 
            array (
                'id' => '9897',
                'cd_procedimento' => '30912075',
                'ds_procedimento' => 'Emboloterapia	                                                                                                                                                                                ',
            ),
            348 => 
            array (
                'id' => '9898',
                'cd_procedimento' => '30912091',
                'ds_procedimento' => 'Implante de prótese intravascular na aorta/pulmonar ou ramos com ou sem angioplastia	                                                                                                        ',
            ),
            349 => 
            array (
                'id' => '9928',
                'cd_procedimento' => '30914051',
                'ds_procedimento' => 'Linfadenectomia cervical	                                                                                                                                                                    ',
            ),
            350 => 
            array (
                'id' => '9934',
                'cd_procedimento' => '30914086',
                'ds_procedimento' => 'Linfangioplastia	                                                                                                                                                                            ',
            ),
            351 => 
            array (
                'id' => '9944',
                'cd_procedimento' => '30915031',
                'ds_procedimento' => 'Pericardiocentese	                                                                                                                                                                            ',
            ),
            352 => 
            array (
                'id' => '9946',
                'cd_procedimento' => '30915066',
                'ds_procedimento' => 'Pericardiotomia / Pericardiectomia por vídeo	                                                                                                                                                ',
            ),
            353 => 
            array (
                'id' => '9947',
                'cd_procedimento' => '30916011',
                'ds_procedimento' => 'Hipotermia profunda com ou sem parada circulatória total	                                                                                                                                    ',
            ),
            354 => 
            array (
                'id' => '9949',
                'cd_procedimento' => '30917026',
                'ds_procedimento' => 'Cardiomioplastia	                                                                                                                                                                            ',
            ),
            355 => 
            array (
                'id' => '9954',
                'cd_procedimento' => '31001033',
                'ds_procedimento' => 'Autotransplante com microcirurgia	                                                                                                                                                            ',
            ),
            356 => 
            array (
                'id' => '9956',
                'cd_procedimento' => '31001300',
                'ds_procedimento' => 'Esofagectomia distal com ou sem toracotomia por videolaparoscopia	                                                                                                                            ',
            ),
            357 => 
            array (
                'id' => '9957',
                'cd_procedimento' => '31001041',
                'ds_procedimento' => 'Esofagectomia distal com toracotomia	                                                                                                                                                        ',
            ),
            358 => 
            array (
                'id' => '9958',
                'cd_procedimento' => '31001050',
                'ds_procedimento' => 'Esofagectomia distal sem toracotomia	                                                                                                                                                        ',
            ),
            359 => 
            array (
                'id' => '9959',
                'cd_procedimento' => '31001254',
                'ds_procedimento' => 'Esofagectomia subtotal com linfadenectomia com ou sem toracotomia	                                                                                                                            ',
            ),
            360 => 
            array (
                'id' => '9960',
                'cd_procedimento' => '31001068',
            'ds_procedimento' => 'Esofagoplastia (coloplastia)	                                                                                                                                                                ',
            ),
            361 => 
            array (
                'id' => '9964',
                'cd_procedimento' => '31001343',
                'ds_procedimento' => 'Esofagorrafia torácica por videotoracoscopia	                                                                                                                                                ',
            ),
            362 => 
            array (
                'id' => '9965',
                'cd_procedimento' => '31001220',
                'ds_procedimento' => 'Esofagostomia	                                                                                                                                                                                ',
            ),
            363 => 
            array (
                'id' => '9992',
                'cd_procedimento' => '31002064',
                'ds_procedimento' => 'Gastrectomia parcial com linfadenectomia	                                                                                                                                                    ',
            ),
            364 => 
            array (
                'id' => '9995',
                'cd_procedimento' => '31002315',
                'ds_procedimento' => 'Gastrectomia parcial com vagotomia por videolaparoscopia	                                                                                                                                    ',
            ),
            365 => 
            array (
                'id' => '9997',
                'cd_procedimento' => '31002323',
                'ds_procedimento' => 'Gastrectomia parcial sem vagotomia por videolaparoscopia	                                                                                                                                    ',
            ),
            366 => 
            array (
                'id' => '10001',
                'cd_procedimento' => '31002331',
                'ds_procedimento' => 'Gastrectomia total com linfadenectomia por videolaparoscopia	                                                                                                                                ',
            ),
            367 => 
            array (
                'id' => '10002',
                'cd_procedimento' => '31002129',
                'ds_procedimento' => 'Gastrectomia total via abdominal	                                                                                                                                                            ',
            ),
            368 => 
            array (
                'id' => '10005',
                'cd_procedimento' => '31002358',
                'ds_procedimento' => 'Gastroenteroanastomose por videolaparoscopia	                                                                                                                                                ',
            ),
            369 => 
            array (
                'id' => '10008',
                'cd_procedimento' => '31002145',
                'ds_procedimento' => 'Gastrorrafia	                                                                                                                                                                                ',
            ),
            370 => 
            array (
                'id' => '10010',
                'cd_procedimento' => '31002153',
                'ds_procedimento' => 'Gastrotomia com sutura de varizes	                                                                                                                                                            ',
            ),
            371 => 
            array (
                'id' => '10011',
                'cd_procedimento' => '31002170',
                'ds_procedimento' => 'Gastrotomia para qualquer finalidade	                                                                                                                                                        ',
            ),
            372 => 
            array (
                'id' => '10012',
                'cd_procedimento' => '31002161',
                'ds_procedimento' => 'Gastrotomia para retirada de CE ou lesão isolada	                                                                                                                                            ',
            ),
            373 => 
            array (
                'id' => '10015',
                'cd_procedimento' => '31002196',
                'ds_procedimento' => 'Piloroplastia	                                                                                                                                                                                ',
            ),
            374 => 
            array (
                'id' => '10022',
                'cd_procedimento' => '31002412',
                'ds_procedimento' => 'Vagotomia superseletiva ou vagotomia gástrica proximal por videolaparoscopia	                                                                                                                ',
            ),
            375 => 
            array (
                'id' => '10031',
                'cd_procedimento' => '31003583',
                'ds_procedimento' => 'Apendicectomia por videolaparoscopia	                                                                                                                                                        ',
            ),
            376 => 
            array (
                'id' => '10038',
                'cd_procedimento' => '31003591',
                'ds_procedimento' => 'Cirurgia de abaixamento por videolaparoscopia	                                                                                                                                                ',
            ),
            377 => 
            array (
                'id' => '10041',
                'cd_procedimento' => '31003168',
                'ds_procedimento' => 'Colectomia parcial com colostomia	                                                                                                                                                            ',
            ),
            378 => 
            array (
                'id' => '10043',
                'cd_procedimento' => '31003176',
                'ds_procedimento' => 'Colectomia parcial sem colostomia	                                                                                                                                                            ',
            ),
            379 => 
            array (
                'id' => '10048',
                'cd_procedimento' => '31003648',
                'ds_procedimento' => 'Colectomia total com ileostomia por videolaparoscopia	                                                                                                                                        ',
            ),
            380 => 
            array (
                'id' => '10059',
                'cd_procedimento' => '31003672',
                'ds_procedimento' => 'Enterectomia segmentar por videolaparoscopia	                                                                                                                                                ',
            ),
            381 => 
            array (
                'id' => '10062',
                'cd_procedimento' => '31003303',
                'ds_procedimento' => 'Enterocolite necrotizante - tratamento cirúrgico	                                                                                                                                            ',
            ),
            382 => 
            array (
                'id' => '10064',
                'cd_procedimento' => '31003699',
            'ds_procedimento' => 'Enteropexia (qualquer segmento) por videolaparoscopia	                                                                                                                                        ',
            ),
            383 => 
            array (
                'id' => '10068',
                'cd_procedimento' => '31003702',
                'ds_procedimento' => 'Esvaziamento pélvico anterior ou posterior por videolaparoscopia	                                                                                                                            ',
            ),
            384 => 
            array (
                'id' => '10070',
                'cd_procedimento' => '31003710',
                'ds_procedimento' => 'Esvaziamento pélvico total por videolaparoscopia	                                                                                                                                            ',
            ),
            385 => 
            array (
                'id' => '10072',
                'cd_procedimento' => '31003370',
                'ds_procedimento' => 'Fechamento de colostomia ou enterostomia	                                                                                                                                                    ',
            ),
            386 => 
            array (
                'id' => '10081',
                'cd_procedimento' => '31003478',
                'ds_procedimento' => 'Membrana duodenal - tratamento cirúrgico	                                                                                                                                                    ',
            ),
            387 => 
            array (
                'id' => '10087',
                'cd_procedimento' => '31003761',
                'ds_procedimento' => 'Piloromiotomia por videolaparoscopia	                                                                                                                                                        ',
            ),
            388 => 
            array (
                'id' => '10092',
                'cd_procedimento' => '31003788',
                'ds_procedimento' => 'Proctocolectomia total por videolaparoscopia	                                                                                                                                                ',
            ),
            389 => 
            array (
                'id' => '10094',
                'cd_procedimento' => '31003559',
                'ds_procedimento' => 'Retossigmoidectomia abdominal	                                                                                                                                                                ',
            ),
            390 => 
            array (
                'id' => '10097',
                'cd_procedimento' => '31004016',
                'ds_procedimento' => 'Abscesso anorretal - drenagem	                                                                                                                                                                ',
            ),
            391 => 
            array (
                'id' => '10098',
                'cd_procedimento' => '31004024',
                'ds_procedimento' => 'Abscesso isquio-retal - drenagem	                                                                                                                                                            ',
            ),
            392 => 
            array (
                'id' => '10100',
                'cd_procedimento' => '31004040',
                'ds_procedimento' => 'Corpo estranho do reto - retirada	                                                                                                                                                            ',
            ),
            393 => 
            array (
                'id' => '10107',
                'cd_procedimento' => '31004105',
                'ds_procedimento' => 'Fissurectomia com ou sem esfincterotomia	                                                                                                                                                    ',
            ),
            394 => 
            array (
                'id' => '10109',
                'cd_procedimento' => '31004121',
                'ds_procedimento' => 'Fistulectomia anal em dois tempos	                                                                                                                                                            ',
            ),
            395 => 
            array (
                'id' => '10133',
                'cd_procedimento' => '31005039',
                'ds_procedimento' => 'Anastomose biliodigestiva intra-hepática	                                                                                                                                                    ',
            ),
            396 => 
            array (
                'id' => '10140',
                'cd_procedimento' => '31005470',
                'ds_procedimento' => 'Colecistectomia com colangiografia por videolaparoscopia	                                                                                                                                    ',
            ),
            397 => 
            array (
                'id' => '10142',
                'cd_procedimento' => '31005489',
                'ds_procedimento' => 'Colecistectomia com fístula biliodigestiva por videolaparoscopia	                                                                                                                            ',
            ),
            398 => 
            array (
                'id' => '10144',
                'cd_procedimento' => '31005497',
                'ds_procedimento' => 'Colecistectomia sem colangiografia por videolaparoscopia	                                                                                                                                    ',
            ),
            399 => 
            array (
                'id' => '10145',
                'cd_procedimento' => '31005136',
                'ds_procedimento' => 'Colecistojejunostomia	                                                                                                                                                                        ',
            ),
            400 => 
            array (
                'id' => '10148',
                'cd_procedimento' => '31005519',
                'ds_procedimento' => 'Colecistostomia por videolaparoscopia	                                                                                                                                                        ',
            ),
            401 => 
            array (
                'id' => '10153',
                'cd_procedimento' => '31005535',
                'ds_procedimento' => 'Colédoco-duodenostomia por videolaparoscopia	                                                                                                                                                ',
            ),
            402 => 
            array (
                'id' => '10156',
                'cd_procedimento' => '31005543',
                'ds_procedimento' => 'Coledocotomia ou coledocostomia com colecistectomia por videolaparoscopia	                                                                                                                    ',
            ),
            403 => 
            array (
                'id' => '10158',
                'cd_procedimento' => '31005551',
                'ds_procedimento' => 'Coledocotomia ou coledocostomia sem colecistectomia por videolaparoscopia	                                                                                                                    ',
            ),
            404 => 
            array (
                'id' => '10169',
                'cd_procedimento' => '31005276',
                'ds_procedimento' => 'Hepatorrafia	                                                                                                                                                                                ',
            ),
            405 => 
            array (
                'id' => '10176',
                'cd_procedimento' => '31005306',
                'ds_procedimento' => 'Lobectomia hepática esquerda	                                                                                                                                                                ',
            ),
            406 => 
            array (
                'id' => '10178',
                'cd_procedimento' => '31005314',
                'ds_procedimento' => 'Papilotomia transduodenal	                                                                                                                                                                    ',
            ),
            407 => 
            array (
                'id' => '10190',
                'cd_procedimento' => '31005403',
                'ds_procedimento' => 'Sequestrectomia hepática	                                                                                                                                                                    ',
            ),
            408 => 
            array (
                'id' => '10209',
                'cd_procedimento' => '31007023',
                'ds_procedimento' => 'Esplenectomia parcial	                                                                                                                                                                        ',
            ),
            409 => 
            array (
                'id' => '10212',
                'cd_procedimento' => '31007066',
                'ds_procedimento' => 'Esplenectomia total por videolaparoscopia	                                                                                                                                                    ',
            ),
            410 => 
            array (
                'id' => '10213',
                'cd_procedimento' => '31007040',
                'ds_procedimento' => 'Esplenorrafia	                                                                                                                                                                                ',
            ),
            411 => 
            array (
                'id' => '10220',
                'cd_procedimento' => '31008054',
                'ds_procedimento' => 'Epiploplastia	                                                                                                                                                                                ',
            ),
            412 => 
            array (
                'id' => '10224',
                'cd_procedimento' => '31008097',
                'ds_procedimento' => 'Retirada de cateter Tenckhoff	                                                                                                                                                                ',
            ),
            413 => 
            array (
                'id' => '10232',
                'cd_procedimento' => '31009085',
                'ds_procedimento' => 'Herniorrafia crural - unilateral	                                                                                                                                                            ',
            ),
            414 => 
            array (
                'id' => '10234',
                'cd_procedimento' => '31009093',
                'ds_procedimento' => 'Herniorrafia epigástrica	                                                                                                                                                                    ',
            ),
            415 => 
            array (
                'id' => '10237',
                'cd_procedimento' => '31009336',
                'ds_procedimento' => 'Herniorrafia inguinal - unilateral por videolaparoscopia	                                                                                                                                    ',
            ),
            416 => 
            array (
                'id' => '10240',
                'cd_procedimento' => '31009140',
                'ds_procedimento' => 'Herniorrafia recidivante	                                                                                                                                                                    ',
            ),
            417 => 
            array (
                'id' => '10249',
                'cd_procedimento' => '31009247',
                'ds_procedimento' => 'Paracentese abdominal	                                                                                                                                                                        ',
            ),
            418 => 
            array (
                'id' => '10258',
                'cd_procedimento' => '31101038',
                'ds_procedimento' => 'Adrenalectomia unilateral	                                                                                                                                                                    ',
            ),
            419 => 
            array (
                'id' => '10261',
                'cd_procedimento' => '31101062',
                'ds_procedimento' => 'Autotransplante renal unilateral	                                                                                                                                                            ',
            ),
            420 => 
            array (
                'id' => '10265',
                'cd_procedimento' => '31101097',
                'ds_procedimento' => 'Endopielotomia percutânea unilateral	                                                                                                                                                        ',
            ),
            421 => 
            array (
                'id' => '10271',
                'cd_procedimento' => '31101151',
                'ds_procedimento' => 'Nefrectomia parcial com ureterectomia	                                                                                                                                                        ',
            ),
            422 => 
            array (
                'id' => '10272',
                'cd_procedimento' => '31101569',
                'ds_procedimento' => 'Nefrectomia parcial laparoscópica unilateral	                                                                                                                                                ',
            ),
            423 => 
            array (
                'id' => '10274',
                'cd_procedimento' => '31101178',
                'ds_procedimento' => 'Nefrectomia parcial unilateral extracorpórea	                                                                                                                                                ',
            ),
        ));
        
        
    }
}